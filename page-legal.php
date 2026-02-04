<?php
/*
Template Name: Legal
*/
get_header();
?>

<main class="legal-page">

<?php
$slug = get_post_field( 'post_name', get_post() );

if ( in_array( $slug, ['privacidad','privacy','confidentialite'] ) ) {

  if ( $slug === 'privacidad' ) {
    include get_template_directory() . '/partials/legal/privacy-es.php';
  }

  if ( $slug === 'privacy' ) {
    include get_template_directory() . '/partials/legal/privacy-en.php';
  }

  if ( $slug === 'confidentialite' ) {
    include get_template_directory() . '/partials/legal/privacy-fr.php';
  }

}

if ( in_array( $slug, ['cookies','cookies-en','cookies-fr'] ) ) {

  if ( $slug === 'cookies' ) {
    include get_template_directory() . '/partials/legal/cookies-es.php';
  }

  if ( $slug === 'cookies-en' ) {
    include get_template_directory() . '/partials/legal/cookies-en.php';
  }

  if ( $slug === 'cookies-fr' ) {
    include get_template_directory() . '/partials/legal/cookies-fr.php';
  }

}
?>

</main>

<?php get_footer(); ?>