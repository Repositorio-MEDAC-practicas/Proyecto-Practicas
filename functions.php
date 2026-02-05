<?php

/* ================= ENQUEUE ASSETS ================= */

function freesoul_assets() {

  /* ================= CSS ================= */

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

  // ================= LOADER CSS =================

  wp_enqueue_style(
    'freesoul-loader',
    get_template_directory_uri() . '/assets/css/loader.css',
    [],
    filemtime( get_template_directory() . '/assets/css/loader.css' )
  );

  // ================= PAGE: BEBIDAS =================

  if (
    is_page('bebidas') ||
    is_page('drinks') ||
    is_page('boissons')
  ) {

    wp_enqueue_style(
      'freesoul-bebidas',
      get_template_directory_uri() . '/assets/css/page-bebidas.css',
      [],
      time()
    );

  }

  // ================= PAGE: EVENTOS =================

  if (
    is_page('eventos') ||
    is_page('events') ||
    is_page('evenements')
  ) {

    wp_enqueue_style(
      'freesoul-eventos',
      get_template_directory_uri() . '/assets/css/eventos.css',
      ['freesoul-main'],
      time()
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

  // ================= LOADER JS =================

  wp_enqueue_script(
    'freesoul-loader',
    get_template_directory_uri() . '/assets/js/loader.js',
    [],
    filemtime( get_template_directory() . '/assets/js/loader.js' ),
    true
  );

  // ================= PAGE: EVENTOS JS =================

  if (
    is_page('eventos') ||
    is_page('events') ||
    is_page('evenements')
  ) {

    wp_enqueue_script(
      'freesoul-eventos',
      get_template_directory_uri() . '/assets/js/eventos.js',
      [],
      time(),
      true
    );

  }

}

add_action('wp_enqueue_scripts', 'freesoul_assets');



/* ================= LEGAL PAGES CSS ================= */

function freesoul_enqueue_legal_styles() {

  if (
    is_page([
      'privacidad',
      'privacy',
      'confidentialite',
      'cookies',
      'cookies-en',
      'cookies-fr'
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



/* ================= POLYLANG STRINGS ================= */

if ( function_exists( 'pll_register_string' ) ) {

  /* ---------- HEADER ---------- */

  pll_register_string( 'menu_bebidas', 'Bebidas', 'Header' );
  pll_register_string( 'menu_tienda', 'Tienda', 'Header' );
  pll_register_string( 'menu_eventos', 'Eventos', 'Header' );
  pll_register_string( 'menu_news', 'Noticias', 'Header' );

  pll_register_string( 'toggle_dark', 'Modo oscuro', 'Header' );
  pll_register_string( 'toggle_light', 'Modo claro', 'Header' );

  /* ---------- FOOTER ---------- */

  pll_register_string( 'footer_claim_1', 'Bebidas sin alcohol para celebrar con estilo.', 'Footer' );
  pll_register_string( 'footer_claim_2', 'Elegir también es brindar.', 'Footer' );

  pll_register_string( 'footer_descubre', 'Descubre', 'Footer' );
  pll_register_string( 'footer_catalogo', 'Catálogo', 'Footer' );
  pll_register_string( 'footer_sobre', 'Sobre la marca', 'Footer' );
  pll_register_string( 'footer_eventos', 'Eventos', 'Footer' );

  pll_register_string( 'footer_profesional', 'Profesional', 'Footer' );
  pll_register_string( 'footer_distribucion', 'Distribución', 'Footer' );
  pll_register_string( 'footer_proveedores', 'Proveedores', 'Footer' );
  pll_register_string( 'footer_contacto', 'Contacto', 'Footer' );

  pll_register_string( 'footer_idiomas', 'Idiomas', 'Footer' );

  pll_register_string( 'footer_join', 'Únete a la comunidad', 'Footer' );
  pll_register_string( 'footer_promos', 'Promos, lanzamientos y cultura sin alcohol.', 'Footer' );
  pll_register_string( 'footer_email', 'Tu email', 'Footer' );
  pll_register_string( 'footer_subscribe', 'Suscribirme', 'Footer' );

  /* ---------- HOME ---------- */

  pll_register_string( 'hero_title_1', 'Celebra diferente.', 'Home' );
  pll_register_string( 'hero_sub_1', 'Bebidas sin alcohol para noches inolvidables.', 'Home' );
  pll_register_string( 'hero_buy', 'Comprar', 'Home' );

  pll_register_string( 'hero_events', 'Eventos', 'Home' );
  pll_register_string( 'hero_and', 'y', 'Home' );
  pll_register_string( 'hero_companies', 'empresas.', 'Home' );
  pll_register_string( 'hero_sub_2', 'Soluciones premium sin alcohol para hostelería.', 'Home' );
  pll_register_string( 'hero_contact', 'Contacto profesional', 'Home' );

  /* ---------- CATEGORIES ---------- */

  pll_register_string( 'cat_title', '¿Qué te apetece hoy?', 'Home' );
  pll_register_string( 'cat_beer', 'Cervezas 0.0', 'Home' );
  pll_register_string( 'cat_spirits', 'Destilados', 'Home' );
  pll_register_string( 'cat_cider', 'Sidras', 'Home' );
  pll_register_string( 'cat_wine', 'Vinos', 'Home' );

  /* ---------- EVENTOS PAGE ---------- */

  pll_register_string( 'eventos_hero_title', 'Eventos sin alcohol que sí molan', 'Eventos' );
  pll_register_string( 'eventos_hero_subtitle', 'Packs premium para bodas, fiestas privadas y empresas.', 'Eventos' );
  pll_register_string( 'eventos_hero_cta', 'Solicitar presupuesto', 'Eventos' );

  pll_register_string( 'eventos_intro_title', 'Celebraciones pensadas para disfrutar', 'Eventos' );
  pll_register_string( 'eventos_intro_lead', 'Cada evento es único, y en Free Soul lo tratamos como tal.', 'Eventos' );

  pll_register_string(
    'eventos_intro_text',
    'Seleccionamos bebidas sin alcohol que destacan por su sabor y su presencia, diseñando propuestas pensadas para sorprender y encajar con la atmósfera de tu celebración. Bodas, cumpleaños o eventos corporativos: tú celebras, nosotros nos ocupamos del resto.',
    'Eventos'
  );

}
