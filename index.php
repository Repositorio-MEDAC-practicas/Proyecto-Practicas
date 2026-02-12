<?php get_header(); ?>

<main class="site-main">

<?php
if ( have_posts() ) :
  while ( have_posts() ) :
    the_post();

    the_content();

  endwhile;
else :
?>
  <p>No hay contenido disponible.</p>
<?php
endif;
?>

</main>

<?php get_footer(); ?>
