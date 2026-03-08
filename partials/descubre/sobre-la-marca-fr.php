<?php
/*
Template Name: À propos de la marque
*/
get_header();
?>
<section class="descubre-page sobre-la-marca-page">

<!-- MOUSSE DE BIÈRE -->
<div class="beer-foam">
  <!-- COUCHE SUPÉRIEURE -->
<svg class="waves espuma" xmlns="http://www.w3.org/2000/svg" viewBox="0 -80 1200 180" preserveAspectRatio="none">

  <!-- MOUSSE -->
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

  <!-- BIÈRE -->
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
  <!-- BULLES (APRÈS SVG) -->
  <div class="beer-bubbles">
    <span></span><span></span><span></span><span></span><span></span>
    <span></span><span></span><span></span><span></span><span></span>
    <span></span><span></span><span></span><span></span><span></span>
    <span></span><span></span><span></span><span></span><span></span>
  </div>
</div>

  <!-- TITRE -->
  <section class="titulo">
    <div class="privacy-wrap"><div class="privacy-bg"></div>
      <h1><?php echo pll__('À propos de la marque'); ?></h1><br>
      <p class="lead">
        <?php echo pll__('Découvrez notre histoire, notre philosophie et notre engagement envers les boissons sans alcool premium.'); ?>
      </p>
    </div>
  </section>

  <!-- HISTOIRE -->
  <section class="privacy-section">
    <div class="privacy-wrap"><div class="privacy-bg"></div>
      <h2><?php echo pll__('Notre histoire'); ?></h2><br>

      <p>
        <?php echo pll__('Free Soul est née avec l’idée de redéfinir notre façon de célébrer. Nous croyons que porter un toast ne dépend pas de l’alcool, mais du moment, de la compagnie et de l’expérience.'); ?>
      </p>

      <p>
        <?php echo pll__('Nous sélectionnons des boissons sans alcool qui conservent la complexité, la saveur et l’esthétique des grandes occasions. Notre objectif est d’offrir des alternatives premium pour ceux qui souhaitent profiter sans alcool.'); ?>
      </p>
    </div>
  </section>

  <!-- PHILOSOPHIE -->
  <section class="privacy-section">
    <div class="privacy-wrap"><div class="privacy-bg"></div>
      <h2><?php echo pll__('Notre philosophie'); ?></h2><br>

      <p>
        <?php echo pll__('Choisir de ne pas boire d’alcool ne signifie pas renoncer au rituel. Cela signifie choisir comment vous voulez profiter de chaque moment.'); ?>
      </p>

      <p>
        <?php echo pll__('Nous promouvons une culture de célébration inclusive, sophistiquée et consciente, où chacun peut se sentir partie prenante du moment.'); ?>
      </p>
    </div>
  </section>

  <!-- FUTUR -->
  <section class="privacy-section">
    <div class="privacy-wrap"><div class="privacy-bg"></div>
      <h2><?php echo pll__('Regard vers l’avenir'); ?></h2><br>

      <p>
        <?php echo pll__('Nous continuons à élargir notre sélection avec de nouvelles offres internationales et à collaborer avec le secteur de l’hôtellerie et les organisateurs d’événements.'); ?>
      </p>

      <p>
        <?php echo pll__('Notre engagement est clair : célébrer autrement, sans compromettre la qualité ni le style.'); ?>
      </p>
    </div>
  </section>

</section>

<?php get_footer(); ?>