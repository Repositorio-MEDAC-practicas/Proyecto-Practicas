<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<header class="freesoul-header">

<div class="top-bar">

  <button
    class="modo-oscuro-y-claro"
    id="themeToggle"
    data-dark="<?php echo pll__('Modo oscuro'); ?>"
    data-light="<?php echo pll__('Modo claro'); ?>"
  >
    <?php echo pll__('Modo oscuro'); ?>
  </button>

<div class="top-lang">
  <?php pll_the_languages([
    'show_flags' => 0,
    'show_names' => 0,
    'show_codes' => 1,
    'dropdown'   => 0
  ]); ?>
</div>

</div>

<div class="header-inner">

  <!-- LEFT -->
  <nav class="nav-left">

    <?php
    $bebidas = get_page_by_path('bebidas');

    if ($bebidas) {
      $translated = pll_get_post($bebidas->ID);
      echo '<a href="' . get_permalink($translated) . '">';
      echo pll__('Bebidas');
      echo '</a>';
    }
    ?>

    <a href="<?php echo pll_home_url() . '#catalog'; ?>">
      <?php echo pll__('Tienda'); ?>
    </a>

  </nav>

  <!-- LOGO -->
  <div class="header-logo">
    <a href="<?php echo pll_home_url(); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/logo.png" alt="Free Soul Drinks">
    </a>
  </div>

  <!-- RIGHT -->
  <nav class="nav-right">

<?php
$eventos = get_page_by_path('eventos');

if ($eventos) {
  $translated = pll_get_post($eventos->ID);
  echo '<a href="' . get_permalink($translated) . '">';
  echo pll__('Eventos');
  echo '</a>';
}
?>

    <a href="<?php echo pll_home_url() . '#news'; ?>">
      <?php echo pll__('Noticias'); ?>
    </a>

  </nav>

  <!-- MOBILE -->
  <button class="burger" aria-label="<?php echo pll__('Abrir menú'); ?>">
    <span></span>
    <span></span>
    <span></span>
  </button>

</div>

</header>