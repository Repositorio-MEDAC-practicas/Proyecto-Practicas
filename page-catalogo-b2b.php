<?php
/*
Template Name: Catálogo B2B
*/
get_header();

/* =========================
   RESTRINGIR ACCESO
========================= */

if (!is_user_logged_in()) {
    wp_redirect(wp_login_url(get_permalink()));
    exit;
}

/* =========================
   DETECTAR USUARIO B2B
========================= */

// 🔥 ADMIN TAMBIÉN CUENTA COMO B2B
$is_b2b = current_user_can('b2b_client') || current_user_can('administrator');

?>

<main class="catalogo-page catalogo-b2b">

<!-- ================= HERO ================= -->

<section class="catalogo-hero">
  <div class="overlay"></div>

  <div class="hero-content hero-lower catalogo-hero-content">
    <h1><?php echo pll__('Catálogo B2B'); ?></h1>

    <p><?php echo pll__('Explora nuestra selección premium de bebidas sin alcohol.'); ?></p>

    <div class="catalogo-search-wrap">
      <input
        type="text"
        id="catalogoSearch"
        placeholder="<?php echo pll__('Buscar bebida...'); ?>"
      >
    </div>
  </div>
</section>

<!-- ================= FILTROS ================= -->

<section class="catalogo-filtros">
  <button class="active" data-filter="all"><?php echo pll__('Todos'); ?></button>
  <button data-filter="cervezas"><?php echo pll__('Cervezas'); ?></button>
  <button data-filter="vinos"><?php echo pll__('Vinos'); ?></button>
  <button data-filter="destilados"><?php echo pll__('Destilados'); ?></button>
  <button data-filter="sidras"><?php echo pll__('Sidras'); ?></button>
</section>

<!-- ================= ORDENAR ================= -->

<section class="catalogo-sort">

  <label><?php echo pll__('Ordenar por'); ?></label>

  <div class="custom-select" id="catalogoSort">

    <div class="custom-select-trigger">
      <?php echo pll__('Relevancia'); ?>
    </div>

    <div class="custom-options">

      <div class="custom-option" data-value="default">
        <?php echo pll__('Relevancia'); ?>
      </div>

      <div class="custom-option" data-value="price-asc">
        <?php echo pll__('Precio: menor a mayor'); ?>
      </div>

      <div class="custom-option" data-value="price-desc">
        <?php echo pll__('Precio: mayor a menor'); ?>
      </div>

      <div class="custom-option" data-value="alpha-asc">
        <?php echo pll__('Nombre: A–Z'); ?>
      </div>

      <div class="custom-option" data-value="alpha-desc">
        <?php echo pll__('Nombre: Z–A'); ?>
      </div>

    </div>

  </div>

</section>

<!-- ===================================================
      PRODUCTOS DEL CATALOGO (WooCommerce)
=================================================== -->

<section id="grid-catalogo" class="catalogo-grid">

<?php

$args = [
  'post_type'      => 'product',
  'posts_per_page' => -1,
  'post_status'    => 'publish',

  // 🔥 SOLO PRODUCTOS B2B
  'tax_query' => [
    [
      'taxonomy'         => 'product_cat',
      'field'            => 'slug',
      'terms'            => ['b2b'],
      'include_children' => true,
    ],
  ],
];

$query = new WP_Query($args);

if ($query->have_posts()) :
  while ($query->have_posts()) : $query->the_post();

    global $product;
    if (!$product) continue;

    $id    = $product->get_id();
    $title = get_the_title();
    $price = $product->get_price();

    $img = wp_get_attachment_image_url(
      $product->get_image_id(),
      'medium'
    );

    if (!$img) {
      $img = wc_placeholder_img_src();
    }

    /* =========================
       CATEGORIAS PARA FILTROS
    ========================= */

    $categorias = [];

    $terms = get_the_terms($id, 'product_cat');

    if ($terms && !is_wp_error($terms)) {
      foreach ($terms as $term) {

        // 🔥 ignoramos b2b
        if ($term->slug !== 'b2b') {
          $categorias[] = $term->slug;
        }

      }
    }

    if (empty($categorias)) {
      $categorias[] = 'all';
    }

    $categorias_string = implode(' ', $categorias);
?>

<article
  class="catalogo-card"
  data-nombre="<?php echo esc_attr(strtolower($title)); ?>"
  data-categoria="<?php echo esc_attr($categorias_string); ?>"
  data-price="<?php echo esc_attr($price); ?>"
>

  <div class="catalogo-img">
    <img src="<?php echo esc_url($img); ?>" alt="">
  </div>

  <div class="catalogo-info">

    <h3><?php echo esc_html($title); ?></h3>

    <p><?php echo esc_html( wp_strip_all_tags( get_the_excerpt() ) ); ?></p>

    <?php if ($is_b2b) : ?>

      <strong class="catalogo-price">
        <?php echo wc_price($price); ?>
      </strong>

    <?php else : ?>

      <span class="catalogo-login-msg">
        <?php echo pll__('Acceso restringido a clientes B2B'); ?>
      </span>

    <?php endif; ?>

  </div>

  <!-- ================= BOTON CARRITO ================= -->

  <div class="catalogo-cart-control">

    <?php if ($is_b2b) : ?>

      <?php
      echo sprintf(
          '<a href="%s" 
             data-quantity="1"
             data-product_id="%s"
             class="button add_to_cart_button ajax_add_to_cart">
             %s
           </a>',
          esc_url( $product->add_to_cart_url() ),
          esc_attr( $id ),
          esc_html__( 'Añadir', 'woocommerce' )
      );
      ?>

    <?php endif; ?>

  </div>

</article>

<?php
  endwhile;
  wp_reset_postdata();
else :
  echo '<p style="text-align:center">No hay productos B2B</p>';
endif;
?>

</section>

<!-- ================= PAGINACION ================= -->

<div class="catalogo-pagination" id="catalogoPagination"></div>

</main>

<?php get_footer(); ?>