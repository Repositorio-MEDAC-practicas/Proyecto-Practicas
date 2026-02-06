<?php
/*
Template Name: Legal
*/
get_header();
?>

<main class="legal-page">

<?php
$slug = get_post_field( 'post_name', get_post() );

/* ================= PRIVACIDAD ================= */

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


/* ================= COOKIES ================= */

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


/* ================= AVISO LEGAL ================= */

if ( in_array( $slug, ['aviso-legal','legal-notice','mentions-legales'] ) ) {

  if ( $slug === 'aviso-legal' ) {
    include get_template_directory() . '/partials/legal/aviso-es.php';
  }

  if ( $slug === 'legal-notice' ) {
    include get_template_directory() . '/partials/legal/aviso-en.php';
  }

  if ( $slug === 'mentions-legales' ) {
    include get_template_directory() . '/partials/legal/aviso-fr.php';
  }

}


/* ================= CONDICIONES DE USO ================= */

if ( in_array( $slug, ['condiciones','terms','conditions'] ) ) {

  if ( $slug === 'condiciones' ) {
    include get_template_directory() . '/partials/legal/terms-es.php';
  }

  if ( $slug === 'terms' ) {
    include get_template_directory() . '/partials/legal/terms-en.php';
  }

  if ( $slug === 'conditions' ) {
    include get_template_directory() . '/partials/legal/terms-fr.php';
  }

}
?>

</main>

<?php get_footer(); ?>
