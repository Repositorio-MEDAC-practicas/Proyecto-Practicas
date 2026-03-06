<?php
/*
Template Name: About the Brand
*/
get_header();
?>
<section class="descubre-page sobre-la-marca-page">

<!-- BEER FOAM -->
<div class="beer-foam">
  <!-- TOP LAYER -->
<svg class="waves espuma" xmlns="http://www.w3.org/2000/svg" viewBox="0 -80 1200 180" preserveAspectRatio="none">

  <!-- FOAM -->
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

  <!-- BEER -->
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
  <!-- BUBBLES (AFTER SVG) -->
  <div class="beer-bubbles">
    <span></span><span></span><span></span><span></span><span></span>
    <span></span><span></span><span></span><span></span><span></span>
    <span></span><span></span><span></span><span></span><span></span>
    <span></span><span></span><span></span><span></span><span></span>
  </div>
</div>

  <!-- TITLE -->
  <section class="titulo">
    <div class="privacy-wrap"><div class="privacy-bg"></div>
      <h1><?php echo pll__('About the Brand'); ?></h1><br>
      <p class="lead">
        <?php echo pll__('Discover our history, philosophy, and commitment to premium non-alcoholic beverages.'); ?>
      </p>
    </div>
  </section>

  <!-- HISTORY -->
  <section class="privacy-section">
    <div class="privacy-wrap"><div class="privacy-bg"></div>
      <h2><?php echo pll__('Our Story'); ?></h2><br>

      <p>
        <?php echo pll__('Free Soul was born with the idea of redefining how we celebrate. We believe that toasting doesn’t depend on alcohol, but on the moment, the company, and the experience.'); ?>
      </p>

      <p>
        <?php echo pll__('We select non-alcoholic beverages that maintain the complexity, flavor, and aesthetics of great occasions. Our goal is to offer premium alternatives for those who want to enjoy without alcohol.'); ?>
      </p>
    </div>
  </section>

  <!-- PHILOSOPHY -->
  <section class="privacy-section">
    <div class="privacy-wrap"><div class="privacy-bg"></div>
      <h2><?php echo pll__('Our Philosophy'); ?></h2><br>

      <p>
        <?php echo pll__('Choosing not to drink alcohol does not mean giving up the ritual. It means choosing how you want to enjoy each moment.'); ?>
      </p>

      <p>
        <?php echo pll__('We promote a culture of inclusive, sophisticated, and mindful celebration, where everyone can feel part of the moment.'); ?>
      </p>
    </div>
  </section>

  <!-- FUTURE -->
  <section class="privacy-section">
    <div class="privacy-wrap"><div class="privacy-bg"></div>
      <h2><?php echo pll__('Looking to the Future'); ?></h2><br>

      <p>
        <?php echo pll__('We continue expanding our selection with new international offerings and collaborating with hospitality and event organizers.'); ?>
      </p>

      <p>
        <?php echo pll__('Our commitment is clear: to toast differently, without compromising quality or style.'); ?>
      </p>
    </div>
  </section>

</section>

<?php get_footer(); ?>