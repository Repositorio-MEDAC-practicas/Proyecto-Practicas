<?php

// ============================
// HELPERS
// ============================

function freesoul_get_remote_ip() {
    return $_SERVER['REMOTE_ADDR'] ?? '';
}

function freesoul_get_ua_hash() {
    return md5($_SERVER['HTTP_USER_AGENT'] ?? 'none');
}

function freesoul_clear_2fa($token) {
    delete_transient('fs_2fa_' . $token);
    setcookie('wp_2fa_pending_auth', '', time() - 3600, '/');
}


// ============================
// LOGIN 2FA
// ============================

add_filter('authenticate', 'freesoul_handle_2fa_login', 99, 3);

function freesoul_handle_2fa_login($user, $username, $password) {

    if (is_wp_error($user) || !($user instanceof WP_User)) {
        return $user;
    }

    // evitar ajax/rest
    if (
        (defined('DOING_AJAX') && DOING_AJAX) ||
        (defined('REST_REQUEST') && REST_REQUEST)
    ) {
        return $user;
    }

    // solo customers
    if (!in_array('customer', (array) $user->roles)) {
        return $user;
    }

    // evitar duplicar 2FA
    if (isset($_COOKIE['wp_2fa_pending_auth'])) {
        return new WP_Error('2fa_required', '2FA requerido');
    }

    // generar token y código
    $token = bin2hex(random_bytes(32));
    $otp   = sprintf("%06d", mt_rand(1, 999999));

    $data = [
        'user_id'    => $user->ID,
        'otp'        => $otp,
        'attempts'   => 0,
        'ip'         => freesoul_get_remote_ip(),
        'user_agent' => freesoul_get_ua_hash()
    ];

    set_transient('fs_2fa_' . $token, $data, 5 * MINUTE_IN_SECONDS);

    setcookie('wp_2fa_pending_auth', $token, [
        'expires'  => time() + (5 * MINUTE_IN_SECONDS),
        'path'     => '/',
        'secure'   => false,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);

    // ============================
    // EMAIL
    // ============================

    $to      = $user->user_email;
    $subject = 'Código de verificación - ' . get_bloginfo('name');

    $message = "Hola {$user->display_name},\n\n";
    $message .= "Tu código de verificación es: {$otp}\n\n";
    $message .= "Caduca en 5 minutos.\n\n";
    $message .= "Si no has sido tú, ignora este mensaje.";

    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'From: Free Soul <no-reply@freesoul.test>'
    ];

    $result = wp_mail($to, $subject, $message, $headers);

    error_log('2FA MAIL RESULT: ' . ($result ? 'OK' : 'ERROR'));

    // redirigir
    wp_safe_redirect(home_url('/verificacion-2fa'));
    exit;
}


// ============================
// FORMULARIO
// ============================

add_shortcode('freesoul_2fa_form', 'freesoul_render_2fa_form');

function freesoul_render_2fa_form() {

    $err = $_GET['err'] ?? '';
    $msg = '';

    if ($err === 'invalid')  $msg = 'Código incorrecto.';
    if ($err === 'expired')  $msg = 'Sesión expirada.';
    if ($err === 'attempts') $msg = 'Demasiados intentos.';
    if ($err === 'security') $msg = 'Error de seguridad.';

    // email parcial
    $email_text = '';
    $token = $_COOKIE['wp_2fa_pending_auth'] ?? '';

    if ($token) {
        $data = get_transient('fs_2fa_' . $token);
        if ($data) {
            $user = get_user_by('id', $data['user_id']);
            if ($user) {
                $email = $user->user_email;
                $email_mask = substr($email, 0, 3) . '***' . strstr($email, '@');
                $email_text = $email_mask;
            }
        }
    }

    ob_start();
    ?>

    <div class="freesoul-2fa">

        <h2>Verificación</h2>

        <p class="fs-2fa-info">
            Te hemos enviado un código a <?php echo esc_html($email_text); ?>.
        </p>

        <?php if ($msg): ?>
            <p style="color:red;"><?php echo esc_html($msg); ?></p>
        <?php endif; ?>

        <form method="POST">

            <?php wp_nonce_field('fs_verify_2fa_action', 'fs_2fa_nonce'); ?>

            <input type="hidden" name="freesoul_action" value="verify_2fa">

            <p>
                <input type="text" name="otp_code" placeholder="Código" required maxlength="6">
            </p>

            <p>
                <button type="submit">Verificar</button>
            </p>

        </form>

    </div>

    <?php
    return ob_get_clean();
}


// ============================
// VERIFICACIÓN
// ============================

add_action('init', 'freesoul_handle_2fa_submission');

function freesoul_handle_2fa_submission() {

    if (!isset($_POST['freesoul_action']) || $_POST['freesoul_action'] !== 'verify_2fa') {
        return;
    }

    if (!isset($_POST['fs_2fa_nonce']) || !wp_verify_nonce($_POST['fs_2fa_nonce'], 'fs_verify_2fa_action')) {
        wp_die('Error de seguridad');
    }

    $token = $_COOKIE['wp_2fa_pending_auth'] ?? '';

    if (!$token) {
        wp_safe_redirect(home_url('/verificacion-2fa?err=expired'));
        exit;
    }

    $data = get_transient('fs_2fa_' . $token);

    if (!$data) {
        wp_safe_redirect(home_url('/verificacion-2fa?err=expired'));
        exit;
    }

    // seguridad
    if (
        $data['ip'] !== freesoul_get_remote_ip() ||
        $data['user_agent'] !== freesoul_get_ua_hash()
    ) {
        freesoul_clear_2fa($token);
        wp_safe_redirect(home_url('/verificacion-2fa?err=security'));
        exit;
    }

    $user_otp = sanitize_text_field($_POST['otp_code'] ?? '');

    if ($user_otp !== $data['otp']) {

        $data['attempts']++;

        if ($data['attempts'] >= 3) {
            freesoul_clear_2fa($token);
            wp_safe_redirect(home_url('/verificacion-2fa?err=attempts'));
        } else {
            set_transient('fs_2fa_' . $token, $data, 5 * MINUTE_IN_SECONDS);
            sleep(1);
            wp_safe_redirect(home_url('/verificacion-2fa?err=invalid'));
        }

        exit;
    }

    $user = get_user_by('id', $data['user_id']);

    if (!$user) {
        freesoul_clear_2fa($token);
        wp_safe_redirect(home_url('/my-account/'));
        exit;
    }

    // limpiar
    freesoul_clear_2fa($token);

    // login manual
    wp_set_current_user($user->ID);
    wp_set_auth_cookie($user->ID);
    do_action('wp_login', $user->user_login, $user);

    // redirigir correcta
    wp_safe_redirect(home_url('/my-account/'));
    exit;
}