<?php
/*
Template Name: Bebidas
*/

get_header();
?>

<main class="page-content">

  <section id="categories" class="categories">

    <div class="catalog-search">
      <input
        type="search"
        class="buscador"
        placeholder="<?php echo pll__('Buscar'); ?>"
      >

      <button class="buscador">
        <?php echo pll__('Buscar'); ?>
      </button>
    </div>

    <?php for ($i = 0; $i < 4; $i++): ?>

      <div class="cat-grid">

        <div class="cat-item">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/cerveza.png">
          <h3><?php echo pll__('Cervezas 0.0'); ?></h3>
        </div>

        <div class="cat-item">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/destilados.png">
          <h3><?php echo pll__('Destilados'); ?></h3>
        </div>

        <div class="cat-item">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/sidras.png">
          <h3><?php echo pll__('Sidras'); ?></h3>
        </div>

        <div class="cat-item">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/vino.png">
          <h3><?php echo pll__('Vinos'); ?></h3>
        </div>

      </div>

    <?php endfor; ?>

  </section>

</main>

<?php get_footer(); ?>
