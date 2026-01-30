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

  // 👉 CSS SOLO para la página Bebidas
  if ( is_page('bebidas') || is_page('drinks') || is_page('boissons') ) {

    wp_enqueue_style(
      'freesoul-bebidas',
      get_template_directory_uri() . '/assets/css/page-bebidas.css',
      [],
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

}

add_action('wp_enqueue_scripts', 'freesoul_assets');


/* ================= POLYLANG STRINGS ================= */

if ( function_exists( 'pll_register_string' ) ) {

  // HEADER
  pll_register_string( 'menu_bebidas', 'Bebidas', 'Header' );
  pll_register_string( 'menu_tienda', 'Tienda', 'Header' );
  pll_register_string( 'menu_eventos', 'Eventos', 'Header' );
  pll_register_string( 'menu_news', 'Noticias', 'Header' );

  pll_register_string( 'toggle_dark', 'Modo oscuro', 'Header' );
  pll_register_string( 'toggle_light', 'Modo claro', 'Header' );

  // FOOTER
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

  // HERO
  pll_register_string( 'hero_title_1', 'Celebra diferente.', 'Home' );
  pll_register_string( 'hero_sub_1', 'Bebidas sin alcohol para noches inolvidables.', 'Home' );
  pll_register_string( 'hero_buy', 'Comprar', 'Home' );

  pll_register_string( 'hero_events', 'Eventos', 'Home' );
  pll_register_string( 'hero_and', 'y', 'Home' );
  pll_register_string( 'hero_companies', 'empresas.', 'Home' );
  pll_register_string( 'hero_sub_2', 'Soluciones premium sin alcohol para hostelería.', 'Home' );
  pll_register_string( 'hero_contact', 'Contacto profesional', 'Home' );

  // CATEGORIES
  pll_register_string( 'cat_title', '¿Qué te apetece hoy?', 'Home' );
  pll_register_string( 'cat_beer', 'Cervezas 0.0', 'Home' );
  pll_register_string( 'cat_spirits', 'Destilados', 'Home' );
  pll_register_string( 'cat_cider', 'Sidras', 'Home' );
  pll_register_string( 'cat_wine', 'Vinos', 'Home' );

  // B2B
  pll_register_string( 'b2b_title', 'Eventos sin alcohol que sí molan', 'Home' );
  pll_register_string( 'b2b_sub', 'Empresas · Catering · Hostelería', 'Home' );
  pll_register_string( 'b2b_btn', 'Contacto profesional', 'Home' );

}