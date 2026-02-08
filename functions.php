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

  // ================= PAGE: CATALOGO =================

  if (
    is_page('catalogo') ||
    is_page('catalog') ||
    is_page('catalogue')
  ) {

    wp_enqueue_style(
      'freesoul-catalogo',
      get_template_directory_uri() . '/assets/css/catalogo.css',
      [],
      time()
    );

  }

  // ================= PAGE: SUBCATEGORÍAS =================

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
      time()
    );

  }

  // ================= PAGE: EVENTOS CSS =================

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

  // ================= PAGE: CATALOGO JS =================

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

  }

}

add_action('wp_enqueue_scripts', 'freesoul_assets');



/* ================= LEGAL PAGES CSS ================= */

function freesoul_enqueue_legal_styles() {

  if (
    is_page([

      // ================= PRIVACIDAD =================
      'privacidad',
      'privacy',
      'confidentialite',

      // ================= COOKIES =================
      'cookies',
      'cookies-en',
      'cookies-fr',

      // ================= AVISO LEGAL =================
      'aviso-legal',
      'legal-notice',
      'mentions-legales',

      // ================= CONDICIONES =================
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

  $headers = [ 'Content-Type: text/plain; charset=UTF-8' ];

  wp_mail( $to, $subject, $body, $headers );

  wp_redirect( home_url('/gracias/') );
  exit;
}


/* ================= POLYLANG STRINGS ================= */

if ( function_exists( 'pll_register_string' ) ) {

  /* ---------- HEADER ---------- */

  pll_register_string( 'menu_catalogo', 'Catálogo', 'Header' );
  pll_register_string( 'menu_eventos', 'Eventos', 'Header' );
  pll_register_string( 'menu_news', 'Noticias', 'Header' );
  pll_register_string( 'menu_tienda', 'Tienda', 'Header' );

  pll_register_string( 'toggle_dark', 'Modo oscuro', 'Header' );
  pll_register_string( 'toggle_light', 'Modo claro', 'Header' );

  /* ---------- FOOTER — BRAND ---------- */

  pll_register_string( 'footer_claim_1', 'Bebidas sin alcohol para celebrar con estilo.', 'Footer' );
  pll_register_string( 'footer_claim_2', 'Elegir también es brindar.', 'Footer' );

  pll_register_string( 'footer_join', 'Únete a la comunidad', 'Footer' );
  pll_register_string( 'footer_promos', 'Promos, lanzamientos y cultura sin alcohol.', 'Footer' );
  pll_register_string( 'footer_email', 'Tu email', 'Footer' );
  pll_register_string( 'footer_subscribe', 'Suscribirme', 'Footer' );

  /* ---------- FOOTER — DESCUBRE ---------- */

  pll_register_string( 'footer_descubre', 'Descubre', 'Footer' );
  pll_register_string( 'footer_catalogo', 'Catálogo', 'Footer' );
  pll_register_string( 'footer_noticias', 'Noticias', 'Footer' );
  pll_register_string( 'footer_faq', 'Preguntas frecuentes', 'Footer' );
  pll_register_string( 'footer_sobre', 'Sobre la marca', 'Footer' );

  /* ---------- FOOTER — PROFESIONAL ---------- */

  pll_register_string( 'footer_profesional', 'Profesional', 'Footer' );
  pll_register_string( 'footer_contacto', 'Contacto', 'Footer' );
  pll_register_string( 'footer_distribucion', 'Distribución', 'Footer' );
  pll_register_string( 'footer_eventos', 'Eventos', 'Footer' );
  pll_register_string( 'footer_proveedores', 'Proveedores', 'Footer' );

  /* ---------- FOOTER — LEGAL ---------- */

  pll_register_string( 'footer_legal', 'Legal', 'Footer' );
  pll_register_string( 'footer_aviso', 'Aviso legal', 'Footer' );
  pll_register_string( 'footer_condiciones', 'Condiciones de uso', 'Footer' );
  pll_register_string( 'footer_cookies', 'Política de Cookies', 'Footer' );
  pll_register_string( 'footer_privacidad', 'Política de Privacidad', 'Footer' );

  /* ---------- HOME ---------- */

  pll_register_string( 'hero_and', 'y', 'Home' );
  pll_register_string( 'hero_buy', 'Comprar', 'Home' );
  pll_register_string( 'hero_companies', 'empresas.', 'Home' );
  pll_register_string( 'hero_contact', 'Contacto profesional', 'Home' );
  pll_register_string( 'hero_events', 'Eventos', 'Home' );
  pll_register_string( 'hero_sub_1', 'Bebidas sin alcohol para noches inolvidables.', 'Home' );
  pll_register_string( 'hero_sub_2', 'Soluciones premium sin alcohol para hostelería.', 'Home' );
  pll_register_string( 'hero_title_1', 'Celebra diferente.', 'Home' );

  /* ---------- CATEGORIES ---------- */

  pll_register_string( 'cat_title', '¿Qué te apetece hoy?', 'Home' );
  pll_register_string( 'cat_beer', 'Cervezas 0.0', 'Home' );
  pll_register_string( 'cat_cider', 'Sidras', 'Home' );
  pll_register_string( 'cat_spirits', 'Destilados', 'Home' );
  pll_register_string( 'cat_wine', 'Vinos', 'Home' );

  /* ---------- EVENTOS — HERO ---------- */

  pll_register_string( 'eventos_hero_cta', 'Solicitar presupuesto', 'Eventos' );
  pll_register_string( 'eventos_hero_subtitle', 'Packs premium para bodas, fiestas privadas y empresas.', 'Eventos' );
  pll_register_string( 'eventos_hero_title', 'Eventos sin alcohol que sí molan', 'Eventos' );

  /* ---------- EVENTOS — INTRO ---------- */

  pll_register_string( 'eventos_intro_lead', 'Cada evento es único, y en Free Soul lo tratamos como tal.', 'Eventos' );
  pll_register_string( 'eventos_intro_title', 'Celebraciones pensadas para disfrutar', 'Eventos' );

  pll_register_string(
    'eventos_intro_text',
    'Seleccionamos bebidas sin alcohol que destacan por su sabor y su presencia, diseñando propuestas pensadas para sorprender y encajar con la atmósfera de tu celebración. Bodas, cumpleaños o eventos corporativos: tú celebras, nosotros nos ocupamos del resto.',
    'Eventos'
  );

  /* ---------- EVENTOS — HOW ---------- */

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

  /* ---------- EVENTOS — METRICAS ---------- */

  pll_register_string( 'eventos_metricas_1', 'eventos organizados', 'Eventos' );
  pll_register_string( 'eventos_metricas_2', 'invitados atendidos', 'Eventos' );
  pll_register_string( 'eventos_metricas_3', 'en toda España', 'Eventos' );
  pll_register_string( 'eventos_metricas_4', 'premium seleccionadas', 'Eventos' );

  /* ---------- EVENTOS — PACKS ---------- */

  pll_register_string( 'eventos_pack_btn', 'Elegir pack', 'Eventos' );

  pll_register_string( 'eventos_pack_1_title', 'Pack Fiesta 50', 'Eventos' );
  pll_register_string( 'eventos_pack_1_desc', '50 bebidas variadas', 'Eventos' );

  pll_register_string( 'eventos_pack_2_title', 'Pack Evento 150', 'Eventos' );
  pll_register_string( 'eventos_pack_2_desc', 'Ideal para celebraciones grandes', 'Eventos' );

  pll_register_string( 'eventos_pack_3_title', 'Pack Boda 300', 'Eventos' );
  pll_register_string( 'eventos_pack_3_desc', 'Eventos premium', 'Eventos' );

  pll_register_string( 'eventos_pack_advice', 'Asesoramiento incluido', 'Eventos' );
  pll_register_string( 'eventos_pack_bestprice', 'Mejor precio por unidad', 'Eventos' );
  pll_register_string( 'eventos_pack_custom', 'Personalizado', 'Eventos' );
  pll_register_string( 'eventos_pack_full', 'Selección completa', 'Eventos' );
  pll_register_string( 'eventos_pack_highend', 'Gama alta', 'Eventos' );
  pll_register_string( 'eventos_pack_logistics', 'Logística incluida', 'Eventos' );
  pll_register_string( 'eventos_pack_spirits', 'Destilados premium', 'Eventos' );
  pll_register_string( 'eventos_pack_wines', 'Vinos sin alcohol', 'Eventos' );

  /* ---------- EVENTOS — FORM ---------- */

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

/* ===============================
   POLYLANG — CATALOGO STRINGS
================================ */

add_action('init', function () {

  if (!function_exists('pll_register_string')) {
    return;
  }

  $group = 'Catálogo';

  // HERO
  pll_register_string('catalogo', 'Catálogo', $group);
  pll_register_string('catalogo_desc', 'Explora nuestra selección premium de bebidas sin alcohol.', $group);
  pll_register_string('catalogo_search', 'Buscar bebida...', $group);

  // FILTROS
  pll_register_string('catalogo_todos', 'Todos', $group);
  pll_register_string('catalogo_cervezas', 'Cervezas', $group);
  pll_register_string('catalogo_vinos', 'Vinos', $group);
  pll_register_string('catalogo_destilados', 'Destilados', $group);
  pll_register_string('catalogo_sidras', 'Sidras', $group);

  // ORDENAR
  pll_register_string('catalogo_sort', 'Ordenar por', $group);
  pll_register_string('catalogo_relevancia', 'Relevancia', $group);
  pll_register_string('catalogo_price_asc', 'Precio: menor a mayor', $group);
  pll_register_string('catalogo_price_desc', 'Precio: mayor a menor', $group);
  pll_register_string('catalogo_alpha_asc', 'Nombre: A–Z', $group);
  pll_register_string('catalogo_alpha_desc', 'Nombre: Z–A', $group);

/* ===============================
   POLYLANG — CATALOGO PRODUCTOS
================================ */

  if (!function_exists('pll_register_string')) return;

  $group = 'Catálogo';

  // PAGINACIÓN
  pll_register_string('catalogo_prev', 'Anterior', $group);
  pll_register_string('catalogo_next', 'Siguiente', $group);

  // DESCRIPCIONES PRODUCTOS
  pll_register_string('desc_estrella', 'Suave y equilibrada', $group);
  pll_register_string('desc_cruzcampo', 'Cuerpo intenso y tostado', $group);
  pll_register_string('desc_granvia', 'Tostada y redonda', $group);
  pll_register_string('desc_mahou', 'Notas de cereal y caramelo', $group);
  pll_register_string('desc_heineken', 'Refrescante y herbal', $group);

  pll_register_string('desc_cava', 'Burbuja fina y elegante', $group);
  pll_register_string('desc_frenchbloom', 'Aromas florales', $group);
  pll_register_string('desc_natureo', 'Afrutado y fresco', $group);

  pll_register_string('desc_captain', 'Vainilla y especias', $group);
  pll_register_string('desc_beefeater', 'Botánicos clásicos', $group);
  pll_register_string('desc_tanqueray', 'Ginebra cítrica', $group);

  pll_register_string('desc_gaitero', 'Manzana natural', $group);
  pll_register_string('desc_maeloc', 'Afrutada y aromática', $group);
  pll_register_string('desc_trabanco', 'Asturiana y seca', $group);

});

}
