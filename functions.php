<?php

require_once get_template_directory() . '/inc/polylang.php';


/* ================= ENQUEUE ASSETS ================= */

function freesoul_assets() {

  /* ================= CSS BASE ================= */

  wp_enqueue_style(
    'freesoul-main',
    get_template_directory_uri() . '/assets/css/main.css',
    [],
    time()
  );

  wp_enqueue_style(
    'freesoul-header',
    get_template_directory_uri() . '/assets/css/header.css',
    [],
    time()
  );

  wp_enqueue_style(
    'freesoul-footer',
    get_template_directory_uri() . '/assets/css/footer.css',
    [],
    time()
  );

  wp_enqueue_style(
    'freesoul-loader',
    get_template_directory_uri() . '/assets/css/loader.css',
    [],
    filemtime( get_template_directory() . '/assets/css/loader.css' )
  );


  /* ================= PAGE: CATALOGO ================= */

  if (
    is_page('catalogo') ||
    is_page('catalog') ||
    is_page('catalogue')
  ) {

    wp_enqueue_style(
      'freesoul-catalogo',
      get_template_directory_uri() . '/assets/css/catalogo.css',
      [],
      filemtime( get_template_directory() . '/assets/css/catalogo.css' )
    );

  }


  /* ================= SUBCATEGORÍAS ================= */

  $catalogo_pages = [
    'cervezas',
    'destilados',
    'sidras',
    'vinos'
  ];

  if ( is_page( $catalogo_pages ) ) {

    wp_enqueue_style(
      'freesoul-catalogo-sub',
      get_template_directory_uri() . '/assets/css/catalogo.css',
      [],
      filemtime( get_template_directory() . '/assets/css/catalogo.css' )
    );

  }


  /* ================= PAGE: EVENTOS ================= */

  if (
    is_page('eventos') ||
    is_page('events') ||
    is_page('evenements')
  ) {

    wp_enqueue_style(
      'freesoul-eventos',
      get_template_directory_uri() . '/assets/css/eventos.css',
      ['freesoul-main'],
      filemtime( get_template_directory() . '/assets/css/eventos.css' )
    );

  }

  // ================= PAGE: NOTICIAS CSS =================

  if (
    is_page('noticias') ||
    is_page('news') ||
    is_page('nouvelles')
  ) {

    wp_enqueue_style(
      'freesoul-noticias',
      get_template_directory_uri() . '/assets/css/noticias.css',
      ['freesoul-main'],
      time()
    );

  }
/* ================= PAGE: PREGUNTAS FRECUENTES ================= */

// CSS Preguntas Frecuentes
if ( is_page('preguntas-frecuentes') ) {
    wp_enqueue_style(
        'preguntas-frecuentes-css',
        get_template_directory_uri() . '/assets/css/preguntas-frecuentes.css',
        [],
        filemtime( get_template_directory() . '/assets/css/preguntas-frecuentes.css' )
    );
}

// JS Preguntas Frecuentes
if ( is_page('preguntas-frecuentes') ) {
    wp_enqueue_script(
        'preguntas-frecuentes-js',
        get_template_directory_uri() . '/assets/js/preguntas-frecuentes.js',
        [],
        filemtime( get_template_directory() . '/assets/js/preguntas-frecuentes.js' ),
        true
    );
}
  /* ================= WOO — CART ================= */

  if ( function_exists('is_cart') && is_cart() ) {

    wp_enqueue_style(
      'freesoul-cart',
      get_template_directory_uri() . '/assets/css/cart.css',
      [],
      filemtime( get_template_directory() . '/assets/css/cart.css' )
    );

  }


  /* ================= WOO — CHECKOUT ================= */

  if ( function_exists('is_checkout') && is_checkout() ) {

    wp_enqueue_style(
      'freesoul-checkout',
      get_template_directory_uri() . '/assets/css/checkout.css',
      [],
      filemtime( get_template_directory() . '/assets/css/checkout.css' )
    );

  }


  /* ================= JS ================= */

  wp_enqueue_script(
    'freesoul-main',
    get_template_directory_uri() . '/assets/js/main.js',
    [],
    time(),
    true
  );

  wp_enqueue_script(
    'freesoul-header',
    get_template_directory_uri() . '/assets/js/header.js',
    [],
    time(),
    true
  );

  wp_enqueue_script(
    'freesoul-loader',
    get_template_directory_uri() . '/assets/js/loader.js',
    [],
    filemtime( get_template_directory() . '/assets/js/loader.js' ),
    true
  );


  /* ================= EVENTOS JS ================= */

  if (
    is_page('eventos') ||
    is_page('events') ||
    is_page('evenements')
  ) {

    wp_enqueue_script(
      'freesoul-eventos',
      get_template_directory_uri() . '/assets/js/eventos.js',
      [],
      filemtime( get_template_directory() . '/assets/js/eventos.js' ),
      true
    );

  }

  // ================= PAGE: NOTICIAS JS =================

  if (
    is_page('noticias') ||
    is_page('news') ||
    is_page('nouvelles')
  ) {

    wp_enqueue_script(
      'freesoul-noticias',
      get_template_directory_uri() . '/assets/js/noticias.js',
      [],
      time(),
      true
    );

  }



add_action('wp_enqueue_scripts', 'freesoul_assets');

  /* ================= CATALOGO JS ================= */

  if (
    is_page('catalogo') ||
    is_page('catalog') ||
    is_page('catalogue')
  ) {

    wp_enqueue_script(
      'freesoul-catalogo',
      get_template_directory_uri() . '/assets/js/catalogo.js',
      [],
      filemtime( get_template_directory() . '/assets/js/catalogo.js' ),
      true
    );

    // Cargar AJAX 
  wp_enqueue_script('wc-add-to-cart');

    }

  }

add_action('wp_enqueue_scripts', 'freesoul_assets');


function freesoul_enqueue_legal_styles() {

  if (
    is_page([

      'privacidad',
      'privacy',
      'confidentialite',

      'cookies',
      'cookies-en',
      'cookies-fr',

      'aviso-legal',
      'legal-notice',
      'mentions-legales',

      'condiciones-de-uso',
      'terms-of-use',
      'conditions-utilisation'

    ])
  ) {

    wp_enqueue_style(
      'freesoul-legal',
      get_template_directory_uri() . '/assets/css/legal.css',
      ['freesoul-main'],
      filemtime( get_template_directory() . '/assets/css/legal.css' )
    );

  }

}

add_action('wp_enqueue_scripts', 'freesoul_enqueue_legal_styles');



/* ================= EVENTOS FORM HANDLER ================= */

add_action( 'admin_post_nopriv_freesoul_event_form', 'freesoul_handle_event_form' );
add_action( 'admin_post_freesoul_event_form', 'freesoul_handle_event_form' );

function freesoul_handle_event_form() {

  if (
    ! isset( $_POST['freesoul_nonce'] ) ||
    ! wp_verify_nonce( $_POST['freesoul_nonce'], 'freesoul_event_nonce' )
  ) {
    wp_die( 'Security check failed' );
  }

  $name    = sanitize_text_field( $_POST['name'] ?? '' );
  $email   = sanitize_email( $_POST['email'] ?? '' );
  $phone   = sanitize_text_field( $_POST['phone'] ?? '' );
  $type    = sanitize_text_field( $_POST['type'] ?? '' );
  $date    = sanitize_text_field( $_POST['date'] ?? '' );
  $guests  = sanitize_text_field( $_POST['guests'] ?? '' );
  $pack    = sanitize_text_field( $_POST['pack'] ?? '' );
  $message = sanitize_textarea_field( $_POST['message'] ?? '' );

  $to = get_option( 'admin_email' );

  $subject = 'Nueva solicitud de evento – Free Soul';

  $body  = "Nueva solicitud recibida:\n\n";
  $body .= "Nombre: $name\n";
  $body .= "Email: $email\n";
  $body .= "Teléfono: $phone\n";
  $body .= "Tipo de evento: $type\n";
  $body .= "Fecha: $date\n";
  $body .= "Asistentes: $guests\n";
  $body .= "Pack: $pack\n\n";
  $body .= "Mensaje:\n$message";

  $headers = [
    'Content-Type: text/plain; charset=UTF-8',
    'From: Free Soul <no-reply@freesoul.test>',
    "Reply-To: $name <$email>"
  ];

  wp_mail( $to, $subject, $body, $headers );

  wp_redirect(
    add_query_arg( 'enviado', '1', wp_get_referer() ) . '#form-eventos'
  );

  exit;
}

add_action('init', function () {

  if ( isset($_GET['freesoul-empty-cart']) ) {

    WC()->cart->empty_cart();

    wp_safe_redirect( wc_get_cart_url() );
    exit;

  }

});

 /* ================= Icono Carrito ================= */
add_filter( 'woocommerce_add_to_cart_fragments', function( $fragments ) {

    ob_start();
    ?>
    <span class="freesoul-cart-count">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </span>
    <?php
    $fragments['.freesoul-cart-count'] = ob_get_clean();

    return $fragments;

});
