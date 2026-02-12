<?php

/* =====================================================
   POLYLANG STRINGS — GLOBAL
===================================================== */

add_action('init', function () {

    if ( ! function_exists('pll_register_string') ) {
        return;
    }

    /* =====================================================
       HEADER
    ===================================================== */

    pll_register_string( 'menu_catalogo', 'Catálogo', 'Header' );
    pll_register_string( 'menu_eventos', 'Eventos', 'Header' );
    pll_register_string( 'menu_news', 'Noticias', 'Header' );
    pll_register_string( 'menu_tienda', 'Tienda', 'Header' );

    pll_register_string( 'toggle_dark', 'Modo oscuro', 'Header' );
    pll_register_string( 'toggle_light', 'Modo claro', 'Header' );

    /* =====================================================
       FOOTER — BRAND
    ===================================================== */

    pll_register_string( 'footer_claim_1', 'Bebidas sin alcohol para celebrar con estilo.', 'Footer' );
    pll_register_string( 'footer_claim_2', 'Elegir también es brindar.', 'Footer' );

    pll_register_string( 'footer_join', 'Únete a la comunidad', 'Footer' );
    pll_register_string( 'footer_promos', 'Promos, lanzamientos y cultura sin alcohol.', 'Footer' );
    pll_register_string( 'footer_email', 'Tu email', 'Footer' );
    pll_register_string( 'footer_subscribe', 'Suscribirme', 'Footer' );

    /* =====================================================
       FOOTER — DESCUBRE
    ===================================================== */

    pll_register_string( 'footer_descubre', 'Descubre', 'Footer' );
    pll_register_string( 'footer_catalogo', 'Catálogo', 'Footer' );
    pll_register_string( 'footer_noticias', 'Noticias', 'Footer' );
    pll_register_string( 'footer_faq', 'Preguntas frecuentes', 'Footer' );
    pll_register_string( 'footer_sobre', 'Sobre la marca', 'Footer' );

    /* =====================================================
       FOOTER — PROFESIONAL
    ===================================================== */

    pll_register_string( 'footer_profesional', 'Profesional', 'Footer' );
    pll_register_string( 'footer_contacto', 'Contacto', 'Footer' );
    pll_register_string( 'footer_distribucion', 'Distribución', 'Footer' );
    pll_register_string( 'footer_eventos', 'Eventos', 'Footer' );
    pll_register_string( 'footer_proveedores', 'Proveedores', 'Footer' );

    /* =====================================================
       FOOTER — LEGAL
    ===================================================== */

    pll_register_string( 'footer_legal', 'Legal', 'Footer' );
    pll_register_string( 'footer_aviso', 'Aviso legal', 'Footer' );
    pll_register_string( 'footer_condiciones', 'Condiciones de uso', 'Footer' );
    pll_register_string( 'footer_cookies', 'Política de Cookies', 'Footer' );
    pll_register_string( 'footer_privacidad', 'Política de Privacidad', 'Footer' );

    /* =====================================================
       HOME
    ===================================================== */

    pll_register_string( 'hero_and', 'y', 'Home' );
    pll_register_string( 'hero_buy', 'Comprar', 'Home' );
    pll_register_string( 'hero_companies', 'empresas.', 'Home' );
    pll_register_string( 'hero_contact', 'Contacto profesional', 'Home' );
    pll_register_string( 'hero_events', 'Eventos', 'Home' );

    pll_register_string( 'hero_sub_1', 'Bebidas sin alcohol para noches inolvidables.', 'Home' );
    pll_register_string( 'hero_sub_2', 'Soluciones premium sin alcohol para hostelería.', 'Home' );
    pll_register_string( 'hero_title_1', 'Celebra diferente.', 'Home' );

    /* =====================================================
       EVENTOS
    ===================================================== */

    pll_register_string( 'eventos_hero_cta', 'Solicitar presupuesto', 'Eventos' );
    pll_register_string( 'eventos_hero_subtitle', 'Packs premium para bodas, fiestas privadas y empresas.', 'Eventos' );
    pll_register_string( 'eventos_hero_title', 'Eventos sin alcohol que sí molan', 'Eventos' );

    pll_register_string( 'eventos_intro_lead', 'Cada evento es único, y en Free Soul lo tratamos como tal.', 'Eventos' );
    pll_register_string( 'eventos_intro_title', 'Celebraciones pensadas para disfrutar', 'Eventos' );

    pll_register_string(
        'eventos_intro_text',
        'Seleccionamos bebidas sin alcohol que destacan por su sabor y su presencia, diseñando propuestas pensadas para sorprender y encajar con la atmósfera de tu celebración.',
        'Eventos'
    );

    /* =====================================================
       CATALOGO
    ===================================================== */

    $group = 'Catálogo';

    pll_register_string('catalogo', 'Catálogo', $group);
    pll_register_string('catalogo_desc', 'Explora nuestra selección premium de bebidas sin alcohol.', $group);
    pll_register_string('catalogo_search', 'Buscar bebida...', $group);

    pll_register_string('catalogo_todos', 'Todos', $group);
    pll_register_string('catalogo_cervezas', 'Cervezas', $group);
    pll_register_string('catalogo_vinos', 'Vinos', $group);
    pll_register_string('catalogo_destilados', 'Destilados', $group);
    pll_register_string('catalogo_sidras', 'Sidras', $group);

    pll_register_string('catalogo_sort', 'Ordenar por', $group);
    pll_register_string('catalogo_relevancia', 'Relevancia', $group);
    pll_register_string('catalogo_price_asc', 'Precio: menor a mayor', $group);
    pll_register_string('catalogo_price_desc', 'Precio: mayor a menor', $group);
    pll_register_string('catalogo_alpha_asc', 'Nombre: A–Z', $group);
    pll_register_string('catalogo_alpha_desc', 'Nombre: Z–A', $group);

    /* =====================================================
       CATALOGO — PRODUCTOS
    ===================================================== */

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


  /* ---------- NOTICIAS ---------- */

  pll_register_string( 'news_discount_beer', '15% DE DESCUENTO EN CERVEZAS', 'Noticias' );
  pll_register_string( 'news_discount_title', 'Nuevo descuento disponible', 'Noticias' );
  pll_register_string( 'news_date_jan1', '1 de Enero', 'Noticias' );
  pll_register_string( 'news_new_discount', '¡Buenas noticias! Durante esta semana tienes un 15% de descuento en nuestra selección de cervezas.', 'Noticias' );
  pll_register_string( 'news_new_drinks', 'Nuevas bebidas añadidas al catálogo', 'Noticias' );
  pll_register_string( 'news_offer_ends', 'Aprovecha la oferta antes del domingo.', 'Noticias' );
  pll_register_string('news_jan25', '25 de Enero', 'Noticias');
  pll_register_string('news_new_drinks', 'Hemos incorporado nuevas opciones a nuestra carta, incluyendo whisky sin alcohol y gin 0.0 premium.', 'Noticias');
  pll_register_string('news_check_favorites', '¡Échales un vistazo y descubre tu favorita!', 'Noticias');
  pll_register_string('news_technical_issue', 'Incidencia técnica temporal', 'Noticias');
  pll_register_string('news_12_febrero', '12 de Febrero', 'Noticias');
  pll_register_string('news_payment_issue', 'Estamos experimentando algunos problemas técnicos en la página de pagos.', 'Noticias');
  pll_register_string('news_team_working', 'Nuestro equipo ya está trabajando para solucionarlo lo antes posible.', 'Noticias');
  pll_register_string('news_vuelta_producto', 'Vuelta de un producto muy solicitado', 'Noticias');
  pll_register_string('news_17_febrero', '17 de Febrero', 'Noticias');
  pll_register_string('news_back_product', '¡Está de vuelta!', 'Noticias');
  pll_register_string('news_most_requested_back', 'La bebida sin alcohol más pedida por nuestros clientes ya vuelve a estar disponible en stock.', 'Noticias');
  pll_register_string('news_dont_miss_it', 'No te quedes sin ella.', 'Noticias');
  pll_register_string('news_schedule_changes', 'Cambios en el horario de atención', 'Noticias');
  pll_register_string('news_feb29', '29 de Febrero', 'Noticias');
  pll_register_string('news_maintenance_notice', 'Con motivo de mantenimiento,', 'Noticias');
  pll_register_string('news_customer_service_hours', 'nuestro servicio de atención al cliente no estará disponible el jueves de 22:00 a 00:00.', 'Noticias');
  pll_register_string('news_website_normal', 'La web seguirá funcionando con normalidad.', 'Noticias');

});
