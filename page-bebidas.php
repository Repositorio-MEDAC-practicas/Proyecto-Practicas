<?php
/*
Template Name: Bebidas
*/

get_header();

/* ====== OBTENER URLs DE LAS PÁGINAS ====== */

function fs_get_page_url($slug) {
  $page = get_page_by_path($slug);
  if (!$page) return '#';

  $page_id = function_exists('pll_get_post')
    ? pll_get_post($page->ID)
    : $page->ID;

  return get_permalink($page_id);
}

$urls = [
  'cervezas'   => fs_get_page_url('cervezas'),
  'destilados' => fs_get_page_url('destilados'),
  'sidras'     => fs_get_page_url('sidras'),
  'vinos'      => fs_get_page_url('vinos'),
  'espumosos'  => fs_get_page_url('espumosos'),
  'vermut'     => fs_get_page_url('vermut'),
  'cocteles'   => fs_get_page_url('cocteles'),
];
?>

<main class="page-content">

  <section id="categories" class="categories">

    <div class="cat-grid">

      <div class="cat-item">
        <a href="<?php echo esc_url($urls['cervezas']); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/ChatGPT Image 3 feb 2026, 01_09_20.png">
          <h3>Cervezas</h3>
        </a>
      </div>

      <div class="cat-item">
        <a href="<?php echo esc_url($urls['destilados']); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/placeholder-1-e1533569576673-960x960.png">
          <h3>Destilados</h3>
        </a>
      </div>

      <div class="cat-item">
        <a href="<?php echo esc_url($urls['sidras']); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/placeholder-1-e1533569576673-960x960.png">
          <h3>Sidras</h3>
        </a>
      </div>

      <div class="cat-item">
        <a href="<?php echo esc_url($urls['vinos']); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/ChatGPT Image 3 feb 2026, 01_10_32.png">
          <h3>Vinos</h3>
        </a>
      </div>

    </div>

    <div class="cat-grid">

      <div class="cat-item">
        <a href="<?php echo esc_url($urls['espumosos']); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/placeholder-1-e1533569576673-960x960.png">
          <h3>Espumosos</h3>
        </a>
      </div>

      <div class="cat-item">
        <a href="<?php echo esc_url($urls['vermut']); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/placeholder-1-e1533569576673-960x960.png">
          <h3>Vermut</h3>
        </a>
      </div>

      <div class="cat-item">
        <a href="<?php echo esc_url($urls['cocteles']); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/placeholder-1-e1533569576673-960x960.png">
          <h3>Cócteles</h3>
        </a>
      </div>

    </div>

  </section>

</main>

<?php get_footer(); ?>
