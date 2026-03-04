<?php
/*
Template Name: Sobre la marca
*/
get_header();
?>
<section class="descubre-page sobre-la-marca-page">

<!-- ESPUMA DE LA CERVEZA -->
<div class="beer-foam">
  <!-- CAPA SUPERIOR -->
<svg class="waves espuma" xmlns="http://www.w3.org/2000/svg" viewBox="0 -80 1200 180" preserveAspectRatio="none">

  <!-- ESPUMA -->
  <path fill="#ffffff" class="espuma" d="M0 50 Q150 70 300 50 T600 50 T900 50 T1200 50 L1200 110 L0 110 Z">
    <animate
      attributeName="d"
      dur="2.5s"
      repeatCount="indefinite"
      values="
      M0 -70 Q150 -60 300 -70 T600 -70 T900 -70 T1200 -70 L1200 110 L0 110 Z;
      M0 -70 Q150 -80 300 -70 T600 -70 T900 -70 T1200 -70 L1200 110 L0 110 Z;
      M0 -70 Q150 -60 300 -70 T600 -70 T900 -70 T1200 -70 L1200 110 L0 110 Z
      "
      keyTimes="0;0.5;1"
      keySplines="0.42 0 0.58 1;0.42 0 0.58 1"
      calcMode="spline" />
  </path>

  <!-- CERVEZA -->
  <path fill="#f6c31a" class="cerveza" d="M0 50 Q150 70 300 50 T600 50 T900 50 T1200 50 L1200 110 L0 110 Z">
    <animate
      attributeName="d"
      dur="2.5s"
      repeatCount="indefinite"
      values="
      M0 90 Q150 100 300 90 T600 90 T900 90 T1200 90 L1200 110 L0 110 Z;
      M0 90 Q150 80 300 90 T600 90 T900 90 T1200 90 L1200 110 L0 110 Z;
      M0 90 Q150 100 300 90 T600 90 T900 90 T1200 90 L1200 110 L0 110 Z
      "
      keyTimes="0;0.5;1"
      keySplines="0.42 0 0.58 1;0.42 0 0.58 1"
      calcMode="spline" />
  </path>
</svg>
  <!-- BURBUJAS (DESPUÉS DE LOS SVG) -->
  <div class="beer-bubbles">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>    
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>    
  </div>
</div>

  <!-- TÍTULO -->
  <section class="titulo">
    <div class="privacy-wrap"><div class="privacy-bg"></div>
      <h1><?php echo pll__('About the Brand'); ?></h1><br>
      <p class="lead">
        <?php echo pll__('Discover our story, philosophy, and commitment to premium alcohol-free beverages.'); ?>
      </p>
    </div>
  </section>

  <!-- HISTORIA -->
  <section class="privacy-section">
    <div class="privacy-wrap"><div class="privacy-bg"></div>
      <h2><?php echo pll__('Our Story'); ?></h2><br>

      <p>
        <?php echo pll__('Free Soul was born with the idea of redefining the way we celebrate. We believe that making a toast does not depend on alcohol, but on the moment, the company, and the experience.'); ?>
      </p>

      <p>
        <?php echo pll__('We carefully select alcohol-free beverages that maintain the complexity, flavor, and aesthetics of great occasions. Our goal is to offer premium alternatives for those who want to enjoy without alcohol.'); ?>
      </p>
    </div>
  </section>

  <!-- FILOSOFÍA -->
  <section class="privacy-section">
    <div class="privacy-wrap"><div class="privacy-bg"></div>
      <h2><?php echo pll__('Our Philosophy'); ?></h2><br>

      <p>
        <?php echo pll__('Choosing not to drink alcohol does not mean giving up the ritual. It means choosing how you want to enjoy every moment.'); ?>
      </p>

      <p>
        <?php echo pll__('We advocate for an inclusive, sophisticated, and mindful culture of celebration, where everyone can feel part of the moment.'); ?>
      </p>
    </div>
  </section>

  <!-- FUTURO -->
  <section class="privacy-section">
    <div class="privacy-wrap"><div class="privacy-bg"></div>
      <h2><?php echo pll__('Looking to the Future'); ?></h2><br>

      <p>
        <?php echo pll__('We continue expanding our selection with new international offerings and working with hospitality professionals and event organizers.'); ?>
      </p>

      <p>
        <?php echo pll__('Our commitment is clear: celebrate differently, without compromising on quality or style.'); ?>
      </p>
    </div>
  </section>

</section>

<?php get_footer(); ?>