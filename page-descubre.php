<?php
/*
Template Name: Descubre
*/
get_header();
?>

<main class="descubre-page">

<?php
$slug = get_post_field( 'post_name', get_post() );

/* ================= SOBRE LA MARCA ================= */

if ( in_array( $slug, ['sobre-la-marca','about-the-brand','a-propos-de-la-marque'] ) ) {

  if ( $slug === 'sobre-la-marca' ) {
    include get_template_directory() . '/partials/descubre/sobre-la-marca-es.php';
  }

  if ( $slug === 'about-the-brand' ) {
    include get_template_directory() . '/partials/descubre/sobre-la-marca-en.php';
  }

  if ( $slug === 'a-propos-de-la-marque' ) {
    include get_template_directory() . '/partials/descubre/sobre-la-marca-fr.php';
  }

}

?>

</main>

<?php get_footer(); ?>
