<?php

  /* ================= PÁG ENLAZADAS ================= */

require_once get_template_directory() . '/inc/polylang.php';
require_once get_template_directory() . '/inc/woocommerce.php';
require_once get_template_directory() . '/inc/2fa.php';


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

/* ================= ORB ================= */

wp_enqueue_style(
  'freesoul-orb',
  get_template_directory_uri() . '/assets/css/orb.css',
  ['freesoul-main'], 
  filemtime( get_template_directory() . '/assets/css/orb.css' )
);

/* ================= CATALOGO NORMAL ================= */

if ( is_page_template('page-catalogo.php') ) {

  wp_enqueue_style(
    'freesoul-catalogo',
    get_template_directory_uri() . '/assets/css/catalogo.css',
    [],
    filemtime( get_template_directory() . '/assets/css/catalogo.css' )
  );

}


/* ================= CATALOGO B2B ================= */

if ( is_page_template('page-catalogo-b2b.php') ) {

  wp_enqueue_style(
    'freesoul-catalogo',
    get_template_directory_uri() . '/assets/css/catalogo.css',
    [],
    filemtime( get_template_directory() . '/assets/css/catalogo.css' )
  );
  wp_enqueue_style(
    'freesoul-catalogo-b2b',
    get_template_directory_uri() . '/assets/css/catalogo-b2b.css',
    ['freesoul-catalogo'],
    filemtime( get_template_directory() . '/assets/css/catalogo-b2b.css' )
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


  /* ================= PAGE: NOTICIAS ================= */

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

/* ================= PAGE: SOBRE LA MARCA ================= */

// CSS Sobre la marca
if ( is_page(['sobre-la-marca','about-the-brand','a-propos-de-la-marque']) ) {
    wp_enqueue_style(
        'sobre-la-marca-css',
        get_template_directory_uri() . '/assets/css/sobre-la-marca.css',
        [],
        filemtime( get_template_directory() . '/assets/css/sobre-la-marca.css' )
    );
}

// JS Preguntas Frecuentes
if ( is_page(['sobre-la-marca','about-the-brand','a-propos-de-la-marque']) ) {
    wp_enqueue_script(
        'sobre-la-marca-js',
        get_template_directory_uri() . '/assets/js/sobre-la-marca.js',
        [],
        filemtime( get_template_directory() . '/assets/js/sobre-la-marca.js' ),
        true
    );
}

/* ================= PAGE: PREGUNTAS FRECUENTES ================= */

if ( is_page('preguntas-frecuentes') ) {
    wp_enqueue_style(
        'preguntas-frecuentes-css',
        get_template_directory_uri() . '/assets/css/preguntas-frecuentes.css',
        [],
        filemtime( get_template_directory() . '/assets/css/preguntas-frecuentes.css' )
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

/* ================= CSS 2FA ================= */

if ( is_page('verificacion-2fa') ) {

  wp_enqueue_style(
    'freesoul-2fa',
    get_template_directory_uri() . '/assets/css/verificacion-2fa.css',
    [],
    time()
  );

}

/* ================= PAGE: CONTACTO ================= */

if ( is_page_template('page-contacto.php') ) {

  wp_enqueue_style(
    'freesoul-contacto',
    get_template_directory_uri() . '/assets/css/contacto.css',
    ['freesoul-main'],
    filemtime( get_template_directory() . '/assets/css/contacto.css' )
  );

}

  /* ================= JS ================= */

  wp_enqueue_script(
    'freesoul-main',
    get_template_directory_uri() . '/assets/js/main.js',
    [],
    filemtime( get_template_directory() . '/assets/js/main.js' ),
    true
  );

  wp_enqueue_script(
    'freesoul-header',
    get_template_directory_uri() . '/assets/js/header.js',
    [],
    filemtime( get_template_directory() . '/assets/js/header.js' ),
    true
  );

  wp_enqueue_script(
    'freesoul-loader',
    get_template_directory_uri() . '/assets/js/loader.js',
    [],
    filemtime( get_template_directory() . '/assets/js/loader.js' ),
    true
  );


/* ================= ORB JS ================= */

wp_enqueue_script(
    'orb',
    get_template_directory_uri() . '/assets/js/orb.js',
    [],
    time(),
    true
);


  /* ================= EVENTOS JS ================= */

  if ( is_page(['eventos','events','evenements']) ) {

    wp_enqueue_script(
      'freesoul-eventos',
      get_template_directory_uri() . '/assets/js/eventos.js',
      [],
      filemtime( get_template_directory() . '/assets/js/eventos.js' ),
      true
    );

  }


  /* ================= NOTICIAS JS ================= */

  if ( is_page(['noticias','news','nouvelles']) ) {

    wp_enqueue_script(
      'freesoul-noticias',
      get_template_directory_uri() . '/assets/js/noticias.js',
      [],
      filemtime( get_template_directory() . '/assets/js/noticias.js' ),
      true
    );

  }


/* ================= CATALOGO JS ================= */

if (
  is_page_template('page-catalogo.php') ||
  is_page_template('page-catalogo-b2b.php')
) {

  wp_enqueue_script(
    'freesoul-catalogo',
    get_template_directory_uri() . '/assets/js/catalogo.js',
    [],
    filemtime( get_template_directory() . '/assets/js/catalogo.js' ),
    true
  );

}

/* ================= CONTACTO JS ================= */

if ( is_page_template('page-contacto.php') ) {

  wp_enqueue_script(
    'freesoul-contacto',
    get_template_directory_uri() . '/assets/js/contacto.js',
    [],
    filemtime( get_template_directory() . '/assets/js/contacto.js' ),
    true
  );

}

  /* ================= FAQ JS ================= */

  if ( is_page('preguntas-frecuentes') ) {

    wp_enqueue_script(
      'freesoul-faq',
      get_template_directory_uri() . '/assets/js/preguntas-frecuentes.js',
      [],
      filemtime( get_template_directory() . '/assets/js/preguntas-frecuentes.js' ),
      true
    );

  }


  /* ================= WOO FIX CARRITO ================= */

  if ( class_exists('WooCommerce') ) {

    wp_enqueue_script('wc-cart-fragments');

    if ( is_shop() || is_product() || is_cart() ) {
      wp_enqueue_script('wc-add-to-cart');
    }

  }

}
add_action('wp_enqueue_scripts', 'freesoul_assets');


/* ================= WOO — MY ACCOUNT ================= */

function cargar_css_my_account() {

  if ( function_exists('is_account_page') && is_account_page() ) {

    wp_enqueue_style(
      'my-account-css',
      get_template_directory_uri() . '/assets/css/my-account.css',
      [],
      filemtime( get_template_directory() . '/assets/css/my-account.css' )
    );

  }

}
add_action('wp_enqueue_scripts', 'cargar_css_my_account');


/* ================= LEGAL ================= */

function freesoul_enqueue_legal_styles() {

  if ( is_page([
    'privacidad','privacy','confidentialite',
    'cookies','cookies-en','cookies-fr',
    'aviso-legal','legal-notice','mentions-legales',
    'condiciones','terms','conditions'
  ]) ) {

    wp_enqueue_style(
      'freesoul-legal',
      get_template_directory_uri() . '/assets/css/legal.css',
      [],
      filemtime( get_template_directory() . '/assets/css/legal.css' )
    );

  }

}
add_action('wp_enqueue_scripts', 'freesoul_enqueue_legal_styles');


/* ================= EVENTOS FORM ================= */

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
  $body .= "Nombre: $name\nEmail: $email\nTeléfono: $phone\n";
  $body .= "Tipo de evento: $type\nFecha: $date\nAsistentes: $guests\n";
  $body .= "Pack: $pack\n\nMensaje:\n$message";

  $headers = [
    'Content-Type: text/plain; charset=UTF-8',
    'From: Free Soul <no-reply@freesoul.test>',
    "Reply-To: $name <$email>"
  ];

  wp_mail( $to, $subject, $body, $headers );

  wp_redirect( add_query_arg('enviado','1', wp_get_referer()) . '#form-eventos' );
  exit;

}

/* ================= CONTACTO FORM ================= */

add_action( 'admin_post_nopriv_freesoul_contact_form', 'freesoul_handle_contact_form' );
add_action( 'admin_post_freesoul_contact_form', 'freesoul_handle_contact_form' );

function freesoul_handle_contact_form() {

  // SEGURIDAD
  if (
    ! isset( $_POST['freesoul_nonce'] ) ||
    ! wp_verify_nonce( $_POST['freesoul_nonce'], 'freesoul_contact_nonce' )
  ) {
    wp_die( 'Security check failed' );
  }

  // HONEYPOT (anti spam)
  if ( ! empty( $_POST['website'] ) ) {
    wp_redirect( add_query_arg('error','1', wp_get_referer()) . '#contacto-form' );
    exit;
  }

  // SANITIZAR
  $nombre  = sanitize_text_field( $_POST['nombre'] ?? '' );
  $email   = sanitize_email( $_POST['email'] ?? '' );
  $motivo  = sanitize_text_field( $_POST['motivo'] ?? '' );
  $mensaje = sanitize_textarea_field( $_POST['mensaje'] ?? '' );

  // VALIDACIÓN
  if ( empty($nombre) || empty($email) || empty($mensaje) || ! is_email($email) ) {
    wp_redirect( add_query_arg('error','1', wp_get_referer()) . '#contacto-form' );
    exit;
  }

  // DESTINO
  $to = get_option( 'admin_email' );

  // ASUNTO
  $subject = "Nuevo mensaje Free Soul - $motivo";

  // CUERPO
  $body  = "Nuevo mensaje desde contacto:\n\n";
  $body .= "Nombre: $nombre\n";
  $body .= "Email: $email\n";
  $body .= "Motivo: $motivo\n\n";
  $body .= "Mensaje:\n$mensaje";

  // HEADERS
  $headers = [
    'Content-Type: text/plain; charset=UTF-8',
    'From: Free Soul <no-reply@freesoul.test>',
    "Reply-To: $nombre <$email>"
  ];

  // ENVÍO
  $enviado = wp_mail( $to, $subject, $body, $headers );

  // REDIRECCIÓN
  if ( $enviado ) {
    wp_redirect( add_query_arg('enviado','1', wp_get_referer()) . '#contacto-form' );
  } else {
    wp_redirect( add_query_arg('error','1', wp_get_referer()) . '#contacto-form' );
  }

  exit;
}