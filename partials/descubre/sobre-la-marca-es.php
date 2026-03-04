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
      <h1><?php echo pll__('Sobre la marca'); ?></h1><br>
      <p class="lead">
        <?php echo pll__('Descubre nuestra historia, filosofía y compromiso con las bebidas sin alcohol premium.'); ?>
      </p>
    </div>
  </section>

  <!-- HISTORIA -->
  <section class="privacy-section">
    <div class="privacy-wrap"><div class="privacy-bg"></div>
      <h2><?php echo pll__('Nuestra historia'); ?></h2><br>

      <p>
        <?php echo pll__('Free Soul nace con la idea de redefinir la forma en la que celebramos. Creemos que brindar no depende del alcohol, sino del momento, de la compañía y de la experiencia.'); ?>
      </p>

      <p>
        <?php echo pll__('Seleccionamos bebidas sin alcohol que mantienen la complejidad, el sabor y la estética de las grandes ocasiones. Nuestro objetivo es ofrecer alternativas premium para quienes quieren disfrutar sin alcohol.'); ?>
      </p>
    </div>
  </section>

  <!-- FILOSOFÍA -->
  <section class="privacy-section">
    <div class="privacy-wrap"><div class="privacy-bg"></div>
      <h2><?php echo pll__('Nuestra filosofía'); ?></h2><br>

      <p>
        <?php echo pll__('Elegir no beber alcohol no significa renunciar al ritual. Significa elegir cómo quieres disfrutar cada momento.'); ?>
      </p>

      <p>
        <?php echo pll__('Apostamos por una cultura de celebración inclusiva, sofisticada y consciente, donde cada persona pueda sentirse parte del momento.'); ?>
      </p>
    </div>
  </section>

  <!-- FUTURO -->
  <section class="privacy-section">
    <div class="privacy-wrap"><div class="privacy-bg"></div>
      <h2><?php echo pll__('Mirando al futuro'); ?></h2><br>

      <p>
        <?php echo pll__('Seguimos ampliando nuestra selección con nuevas propuestas internacionales y trabajando con hostelería y organizadores de eventos.'); ?>
      </p>

      <p>
        <?php echo pll__('Nuestro compromiso es claro: brindar diferente, sin renunciar a la calidad ni al estilo.'); ?>
      </p>
    </div>
  </section>

</section>

<?php get_footer(); ?>