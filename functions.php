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

  // CSS SOLO para la página Bebidas
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

  // CSS SOLO para la página Eventos (todas las traducciones)
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

  // JS SOLO para la página Eventos
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

  // HERO
  pll_register_string( 'eventos_hero_title', 'Eventos sin alcohol que sí molan', 'Eventos' );
  pll_register_string( 'eventos_hero_subtitle', 'Packs premium para bodas, fiestas privadas y empresas.', 'Eventos' );
  pll_register_string( 'eventos_hero_cta', 'Solicitar presupuesto', 'Eventos' );

  // INTRO
  pll_register_string( 'eventos_intro_title', 'Celebraciones pensadas para disfrutar', 'Eventos' );
  pll_register_string( 'eventos_intro_lead', 'Cada evento es único, y en Free Soul lo tratamos como tal.', 'Eventos' );

  pll_register_string(
    'eventos_intro_text',
    'Seleccionamos bebidas sin alcohol que destacan por su sabor y su presencia, diseñando propuestas pensadas para sorprender y encajar con la atmósfera de tu celebración. Bodas, cumpleaños o eventos corporativos: tú celebras, nosotros nos ocupamos del resto.',
    'Eventos'
  );

  // HOW
  pll_register_string( 'eventos_how_title', 'Cómo lo hacemos posible', 'Eventos' );

  pll_register_string( 'eventos_how_1_title', 'Elegimos sabores premium', 'Eventos' );
  pll_register_string(
    'eventos_how_1_text',
    'Seleccionamos bebidas sin alcohol que destacan por su complejidad, aromas y presencia en copa.',
    'Eventos'
  );

  pll_register_string( 'eventos_how_2_title', 'Personalizamos tu pack', 'Eventos' );
  pll_register_string(
    'eventos_how_2_text',
    'Calculamos la cantidad ideal y combinaciones según tu evento y número de invitados.',
    'Eventos'
  );

  pll_register_string( 'eventos_how_3_title', 'Coordinamos la entrega', 'Eventos' );
  pll_register_string(
    'eventos_how_3_text',
    'Nos encargamos de la logística y coordinamos para que llegue todo a tiempo y sin complicaciones.',
    'Eventos'
  );

  // METRICAS
  pll_register_string( 'eventos_metricas_1', 'eventos organizados', 'Eventos' );
  pll_register_string( 'eventos_metricas_2', 'invitados atendidos', 'Eventos' );
  pll_register_string( 'eventos_metricas_3', 'en toda España', 'Eventos' );
  pll_register_string( 'eventos_metricas_4', 'premium seleccionadas', 'Eventos' );

  // PACKS
  pll_register_string( 'eventos_packs_title', 'Nuestros packs para eventos', 'Eventos' );

  pll_register_string( 'eventos_pack_1_title', 'Pack Fiesta 50', 'Eventos' );
  pll_register_string( 'eventos_pack_1_desc', '50 bebidas variadas', 'Eventos' );

  pll_register_string( 'eventos_pack_2_title', 'Pack Evento 150', 'Eventos' );
  pll_register_string( 'eventos_pack_2_desc', 'Ideal para celebraciones grandes', 'Eventos' );

  pll_register_string( 'eventos_pack_3_title', 'Pack Boda 300', 'Eventos' );
  pll_register_string( 'eventos_pack_3_desc', 'Eventos premium', 'Eventos' );

  pll_register_string( 'eventos_pack_btn', 'Elegir pack', 'Eventos' );

  // FORM
  pll_register_string( 'eventos_form_title', 'Solicita tu presupuesto', 'Eventos' );

  pll_register_string(
    'eventos_form_text',
    'Cuéntanos cómo es tu evento y te enviaremos una propuesta personalizada sin compromiso.',
    'Eventos'
  );

  pll_register_string( 'eventos_form_submit', 'Enviar solicitud', 'Eventos' );

/* ===== EVENTOS — EXTRAS PACKS ===== */

pll_register_string( 'eventos_pack_wines', 'Vinos sin alcohol', 'Eventos' );
pll_register_string( 'eventos_pack_spirits', 'Destilados premium', 'Eventos' );

pll_register_string( 'eventos_pack_full', 'Selección completa', 'Eventos' );
pll_register_string( 'eventos_pack_bestprice', 'Mejor precio por unidad', 'Eventos' );
pll_register_string( 'eventos_pack_advice', 'Asesoramiento incluido', 'Eventos' );

pll_register_string( 'eventos_pack_highend', 'Gama alta', 'Eventos' );
pll_register_string( 'eventos_pack_custom', 'Personalizado', 'Eventos' );
pll_register_string( 'eventos_pack_logistics', 'Logística incluida', 'Eventos' );

/* ===== EVENTOS — FORM ===== */

pll_register_string( 'eventos_form_title', 'Solicita tu presupuesto', 'Eventos' );

pll_register_string(
  'eventos_form_text',
  'Cuéntanos cómo es tu evento y te enviaremos una propuesta personalizada sin compromiso.',
  'Eventos'
);

pll_register_string( 'eventos_form_name', 'Nombre completo', 'Eventos' );
pll_register_string( 'eventos_form_email', 'Email', 'Eventos' );
pll_register_string( 'eventos_form_phone', 'Teléfono', 'Eventos' );

pll_register_string( 'eventos_form_type', 'Tipo de evento', 'Eventos' );
pll_register_string( 'eventos_form_wedding', 'Boda', 'Eventos' );
pll_register_string( 'eventos_form_birthday', 'Cumpleaños', 'Eventos' );
pll_register_string( 'eventos_form_company', 'Empresa', 'Eventos' );
pll_register_string( 'eventos_form_private', 'Fiesta privada', 'Eventos' );

pll_register_string( 'eventos_form_guests', 'Número de asistentes', 'Eventos' );

pll_register_string( 'eventos_form_message', 'Cuéntanos qué necesitas...', 'Eventos' );

pll_register_string( 'eventos_form_submit', 'Enviar solicitud', 'Eventos' );
}