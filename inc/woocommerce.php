<?php

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}


/* ================= WOO SUPPORT ================= */

function freesoul_add_woocommerce_support() {
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'freesoul_add_woocommerce_support');


/* ================= EMPTY CART ================= */

add_action('init', function () {

    if (isset($_GET['freesoul-empty-cart'])) {

        if (function_exists('WC') && WC()->cart) {
            WC()->cart->empty_cart();
        }

        wp_safe_redirect(wc_get_cart_url());
        exit;
    }

});


/* ================= ICONO CARRITO ================= */

add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {

    ob_start();

    if (function_exists('WC') && WC()->cart) {
        $count = WC()->cart->get_cart_contents_count();
    } else {
        $count = 0;
    }

    if ($count > 0) {
        ?>
        <span id="freesoul-cart-count" class="freesoul-cart-count">
            <?php echo $count; ?>
        </span>
        <?php
    } else {
        ?>
        <span id="freesoul-cart-count" class="freesoul-cart-count" style="display:none;"></span>
        <?php
    }

    $fragments['#freesoul-cart-count'] = ob_get_clean();

    return $fragments;

});


/* ================= B2B ROLE ================= */

add_action('init', function () {

    if (!get_role('b2b_client')) {
        add_role(
            'b2b_client',
            'Cliente B2B',
            [
                'read' => true
            ]
        );
    }

});


/* ================= ACCESS CONTROL ================= */

add_action('template_redirect', function () {

    // 1. Obligar login en tienda
    if ((is_woocommerce() || is_cart() || is_checkout()) && !is_user_logged_in()) {

        wp_redirect(wc_get_page_permalink('myaccount'));
        exit;
    }

    // 2. Bloquear productos B2B por URL
    if (is_product() && !current_user_can('b2b_client')) {

        $product_id = get_queried_object_id();

        if ($product_id && has_term('b2b', 'product_cat', $product_id)) {
            wp_redirect(home_url());
            exit;
        }

    }

});


/* ================= FILTRAR PRODUCTOS ================= */

add_action('pre_get_posts', function ($query) {

    if (is_admin()) return;

    $post_type = $query->get('post_type');

    if ($post_type === 'product' || (is_array($post_type) && in_array('product', $post_type))) {

        if (!current_user_can('b2b_client')) {

            $tax_query = (array) $query->get('tax_query');

            $tax_query[] = [
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => ['b2b'], // categoría mayorista
                'operator' => 'NOT IN',
            ];

            $query->set('tax_query', $tax_query);
        }

    }

});


/* ================= REGISTRO B2B ================= */

// Checkbox en registro
add_action('woocommerce_register_form', function() {
    ?>

    <p class="form-row form-row-wide">
        <label>
            <input type="checkbox" name="b2b" value="1">
            Soy mayorista
        </label>
    </p>

    <?php
});


// Guardar solicitud B2B
add_action('woocommerce_created_customer', function($customer_id) {

    if (isset($_POST['b2b']) && $_POST['b2b'] == 1) {

        update_user_meta($customer_id, 'b2b_pending', 1);

    }

});


/* ================= AVISO B2B ================= */

add_action('woocommerce_before_my_account', function() {

    if (!is_user_logged_in()) return;

    $user_id = get_current_user_id();
    $pending = get_user_meta($user_id, 'b2b_pending', true);

    if ($pending) {
        echo '<div style="background:#fff3cd;padding:15px;margin-bottom:20px;border-radius:6px;">
            Tu cuenta mayorista está pendiente de aprobación.
        </div>';
    }

});


/* ================= APROBACIÓN MANUAL ================= */

// Para admin: aprobar usuario
// (se hace desde WordPress → Usuarios → cambiar rol a b2b_client)


add_action('set_user_role', function($user_id, $role) {

    if ($role === 'b2b_client') {
        delete_user_meta($user_id, 'b2b_pending');
    }

}, 10, 2);


/* ================= PRECIO B2B ================= */

// Campo en admin
add_action('woocommerce_product_options_pricing', function() {

    woocommerce_wp_text_input([
        'id' => '_b2b_price',
        'label' => 'Precio B2B',
        'desc_tip' => true,
        'description' => 'Precio especial mayoristas'
    ]);

});

// Guardar precio
add_action('woocommerce_process_product_meta', function($post_id) {

    if (isset($_POST['_b2b_price'])) {
        update_post_meta($post_id, '_b2b_price', $_POST['_b2b_price']);
    }

});


// Mostrar precio B2B
add_filter('woocommerce_product_get_price', 'freesoul_b2b_price', 10, 2);
add_filter('woocommerce_product_get_regular_price', 'freesoul_b2b_price', 10, 2);

function freesoul_b2b_price($price, $product) {

    if (is_user_logged_in() && current_user_can('b2b_client')) {

        $b2b_price = get_post_meta($product->get_id(), '_b2b_price', true);

        if ($b2b_price !== '') {
            return $b2b_price;
        }

    }

    return $price;
}


/* ================= OCULTAR PRECIO SIN LOGIN ================= */

add_filter('woocommerce_get_price_html', function($price) {

    if (!is_user_logged_in()) {
        return '<a href="' . wc_get_page_permalink('myaccount') . '">Inicia sesión para ver precios</a>';
    }

    return $price;

});


/* ================= SOLO LOGUEADOS COMPRAN ================= */

add_filter('woocommerce_is_purchasable', function($purchasable) {

    if (!is_user_logged_in()) return false;

    return $purchasable;

});
