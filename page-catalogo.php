
<section id="grid-catalogo" class="catalogo-grid">

<?php

$productos = [

  [
    'title' => 'Estrella Galicia 0.0',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/botella-estrella-galicia-00.png',
    'desc'  => pll__('Suave y equilibrada'),
    'cat'   => 'cervezas',
    'price' => 2.80,
  ],

  [
    'title' => 'Cruzcampo Gran Reserva 0.0',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/cerveza-cruzcampo-gran-reserva-00.png',
    'desc'  => pll__('Cuerpo intenso y tostado'),
    'cat'   => 'cervezas',
    'price' => 3.60,
  ],

  [
    'title' => 'Gran Vía 0.0',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/cerveza-granvia-00-tostada.png',
    'desc'  => pll__('Tostada y redonda'),
    'cat'   => 'cervezas',
    'price' => 2.95,
  ],

  [
    'title' => 'Mahou Tostada 0.0',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/cerveza-mahou-00-tostada.png',
    'desc'  => pll__('Notas de cereal y caramelo'),
    'cat'   => 'cervezas',
    'price' => 3.10,
  ],

  [
    'title' => 'Heineken 0.0',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/heineken-00.png',
    'desc'  => pll__('Refrescante y herbal'),
    'cat'   => 'cervezas',
    'price' => 3.00,
  ],

  [
    'title' => 'Cava Maset Zero',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/cava-maset-zero-alcohol.png',
    'desc'  => pll__('Burbuja fina y elegante'),
    'cat'   => 'vinos',
    'price' => 11.90,
  ],

  [
    'title' => 'French Bloom 0.0',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/espumoso-sin-alcohol-french-bloo.png',
    'desc'  => pll__('Aromas florales'),
    'cat'   => 'vinos',
    'price' => 18.50,
  ],

  [
    'title' => 'Natureo Espumoso',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/natureo-espumoso-sin-alcohol-00.png',
    'desc'  => pll__('Afrutado y fresco'),
    'cat'   => 'vinos',
    'price' => 12.40,
  ],

  [
    'title' => 'Captain Morgan Gold 0.0',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/licor-captain-morgan-spiced-gold-sin-alcohol-00.png',
    'desc'  => pll__('Vainilla y especias'),
    'cat'   => 'destilados',
    'price' => 15.90,
  ],

  [
    'title' => 'Beefeater 0.0',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/licor-beefeater-sin-alcohol-00.png',
    'desc'  => pll__('Botánicos clásicos'),
    'cat'   => 'destilados',
    'price' => 16.90,
  ],

  [
    'title' => 'Tanqueray 0.0',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/licor-tanqueray-sin-alcohol-00.png',
    'desc'  => pll__('Ginebra cítrica'),
    'cat'   => 'destilados',
    'price' => 17.50,
  ],

  [
    'title' => 'Sidra El Gaitero 0.0',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/sidra-el-gaitero-00.png',
    'desc'  => pll__('Manzana natural'),
    'cat'   => 'sidras',
    'price' => 4.20,
  ],

  [
    'title' => 'Sidra Maeloc',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/sidra-maeloc-sin.png',
    'desc'  => pll__('Afrutada y aromática'),
    'cat'   => 'sidras',
    'price' => 4.50,
  ],

  [
    'title' => 'Sidra Trabanco 0.0',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/sidra-trabanco-sin-alcohol.png',
    'desc'  => pll__('Asturiana y seca'),
    'cat'   => 'sidras',
    'price' => 4.80,
  ],

];


foreach ($productos as $producto) :
?>

<article
  class="catalogo-card"
  data-nombre="<?php echo strtolower($producto['title']); ?>"
  data-categoria="<?php echo $producto['cat']; ?>"
  data-price="<?php echo $producto['price']; ?>"
>

  <div class="catalogo-img">
    <img src="<?php echo esc_url($producto['image']); ?>" alt="">
  </div>

  <div class="catalogo-info">

    <h3><?php echo esc_html($producto['title']); ?></h3>

    <p><?php echo esc_html($producto['desc']); ?></p>

    <strong class="catalogo-price">
      <?php echo number_format($producto['price'], 2, ',', '.') . '€'; ?>
    </strong>

  </div>

  <!-- CONTROL CARRITO -->
  <div class="catalogo-cart-control">

    <button class="cart-minus">−</button>

    <span class="cart-qty">0</span>

    <button class="cart-plus">+</button>

  </div>

</article>

<?php endforeach; ?>

</section>

<!-- ================= PAGINACION ================= -->

<div class="catalogo-pagination" id="catalogoPagination"></div>

</main>

<?php get_footer(); ?>
<?php
/*
Template Name: Catálogo
*/
get_header();
?>

<main class="catalogo-page">

<section class="catalogo-hero">
  <div class="overlay"></div>

  <div class="hero-content hero-lower catalogo-hero-content">
    <h1><?php echo pll__('Catálogo'); ?></h1>

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

<!-- ================= ORDENAR (CUSTOM) ================= -->

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
      PRODUCTOS DEL CATALOGO

<section id="grid-catalogo" class="catalogo-grid">

<?php

$productos = [

  [
    'title' => 'Estrella Galicia 0.0',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/botella-estrella-galicia-00.png',
    'desc'  => pll__('Suave y equilibrada'),
    'cat'   => 'cervezas',
    'price' => 2.80,
  ],

  [
    'title' => 'Cruzcampo Gran Reserva 0.0',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/cerveza-cruzcampo-gran-reserva-00.png',
    'desc'  => pll__('Cuerpo intenso y tostado'),
    'cat'   => 'cervezas',
    'price' => 3.60,
  ],

  [
    'title' => 'Gran Vía 0.0',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/cerveza-granvia-00-tostada.png',
    'desc'  => pll__('Tostada y redonda'),
    'cat'   => 'cervezas',
    'price' => 2.95,
  ],

  [
    'title' => 'Mahou Tostada 0.0',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/cerveza-mahou-00-tostada.png',
    'desc'  => pll__('Notas de cereal y caramelo'),
    'cat'   => 'cervezas',
    'price' => 3.10,
  ],

  [
    'title' => 'Heineken 0.0',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/heineken-00.png',
    'desc'  => pll__('Refrescante y herbal'),
    'cat'   => 'cervezas',
    'price' => 3.00,
  ],

  [
    'title' => 'Cava Maset Zero',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/cava-maset-zero-alcohol.png',
    'desc'  => pll__('Burbuja fina y elegante'),
    'cat'   => 'vinos',
    'price' => 11.90,
  ],

  [
    'title' => 'French Bloom 0.0',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/espumoso-sin-alcohol-french-bloo.png',
    'desc'  => pll__('Aromas florales'),
    'cat'   => 'vinos',
    'price' => 18.50,
  ],

  [
    'title' => 'Natureo Espumoso',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/natureo-espumoso-sin-alcohol-00.png',
    'desc'  => pll__('Afrutado y fresco'),
    'cat'   => 'vinos',
    'price' => 12.40,
  ],

  [
    'title' => 'Captain Morgan Gold 0.0',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/licor-captain-morgan-spiced-gold-sin-alcohol-00.png',
    'desc'  => pll__('Vainilla y especias'),
    'cat'   => 'destilados',
    'price' => 15.90,
  ],

  [
    'title' => 'Beefeater 0.0',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/licor-beefeater-sin-alcohol-00.png',
    'desc'  => pll__('Botánicos clásicos'),
    'cat'   => 'destilados',
    'price' => 16.90,
  ],

  [
    'title' => 'Tanqueray 0.0',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/licor-tanqueray-sin-alcohol-00.png',
    'desc'  => pll__('Ginebra cítrica'),
    'cat'   => 'destilados',
    'price' => 17.50,
  ],

  [
    'title' => 'Sidra El Gaitero 0.0',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/sidra-el-gaitero-00.png',
    'desc'  => pll__('Manzana natural'),
    'cat'   => 'sidras',
    'price' => 4.20,
  ],

  [
    'title' => 'Sidra Maeloc',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/sidra-maeloc-sin.png',
    'desc'  => pll__('Afrutada y aromática'),
    'cat'   => 'sidras',
    'price' => 4.50,
  ],

  [
    'title' => 'Sidra Trabanco 0.0',
    'image' => get_template_directory_uri() . '/assets/imagenes/catalogo/sidra-trabanco-sin-alcohol.png',
    'desc'  => pll__('Asturiana y seca'),
    'cat'   => 'sidras',
    'price' => 4.80,
  ],

];


foreach ($productos as $producto) :
?>

<article
  class="catalogo-card"
  data-nombre="<?php echo strtolower($producto['title']); ?>"
  data-categoria="<?php echo $producto['cat']; ?>"
  data-price="<?php echo $producto['price']; ?>"
>

  <div class="catalogo-img">
    <img src="<?php echo esc_url($producto['image']); ?>" alt="">
  </div>

  <div class="catalogo-info">

    <h3><?php echo esc_html($producto['title']); ?></h3>

    <p><?php echo esc_html($producto['desc']); ?></p>

    <strong class="catalogo-price">
      <?php echo number_format($producto['price'], 2, ',', '.') . '€'; ?>
    </strong>

  </div>

  <!-- CONTROL CARRITO -->
  <div class="catalogo-cart-control">

    <button class="cart-minus">−</button>

    <span class="cart-qty">0</span>

    <button class="cart-plus">+</button>

  </div>

</article>

<?php endforeach; ?>

</section>

<!-- ================= PAGINACION ================= -->

<div class="catalogo-pagination" id="catalogoPagination"></div>

</main>

<?php get_footer(); ?>
