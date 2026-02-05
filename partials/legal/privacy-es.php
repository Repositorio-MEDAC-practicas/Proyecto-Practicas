<?php
/*
Template Name: Política de Privacidad
*/
get_header();
?>

<main class="privacy-page">

  <!-- HEADER SIMPLE -->
  <section class="privacy-header">
    <div class="privacy-wrap">
      <h1><?php echo pll__('Política de Privacidad'); ?></h1>
      <p class="lead">
        <?php echo pll__('Esta política explica cómo se recogen, utilizan y protegen sus datos personales en este sitio web.'); ?>
      </p>
    </div>
  </section>

  <!-- INTRO -->
  <section class="privacy-section">
    <div class="privacy-wrap">
      <p>
        <?php echo pll__('Free Soul Drink se compromete a proteger la privacidad de los usuarios y a tratar sus datos personales conforme al Reglamento General de Protección de Datos (RGPD) y la legislación española vigente.'); ?>
      </p>
    </div>
  </section>

  <!-- RESPONSABLE -->
  <section class="privacy-section alt">
    <div class="privacy-wrap">
      <h2><?php echo pll__('Responsable del tratamiento'); ?></h2>
      <p>
        <?php echo pll__('Free Soul Drink, con domicilio en [Dirección completa], y correo electrónico [Email de contacto].'); ?>
      </p>
    </div>
  </section>

  <!-- DATOS -->
  <section class="privacy-section">
    <div class="privacy-wrap">
      <h2><?php echo pll__('Datos que recopilamos'); ?></h2>
      <ul class="privacy-list">
        <li><?php echo pll__('Datos identificativos (nombre, correo electrónico, teléfono).'); ?></li>
        <li><?php echo pll__('Datos de navegación y uso del sitio web.'); ?></li>
        <li><?php echo pll__('Información facilitada a través de formularios.'); ?></li>
      </ul>
    </div>
  </section>

  <!-- FINALIDAD -->
  <section class="privacy-section alt">
    <div class="privacy-wrap">
      <h2><?php echo pll__('Finalidad del tratamiento'); ?></h2>
      <p>
        <?php echo pll__('Los datos se utilizan para gestionar solicitudes, prestar servicios, mejorar la experiencia del usuario y cumplir obligaciones legales.'); ?>
      </p>
    </div>
  </section>

  <!-- BASE LEGAL -->
  <section class="privacy-section">
    <div class="privacy-wrap">
      <h2><?php echo pll__('Base legal para el tratamiento'); ?></h2>
      <p>
        <?php echo pll__('La base jurídica es el consentimiento del usuario, la ejecución de un contrato y el cumplimiento de obligaciones legales.'); ?>
      </p>
    </div>
  </section>

  <!-- DESTINATARIOS -->
  <section class="privacy-section alt">
    <div class="privacy-wrap">
      <h2><?php echo pll__('Destinatarios de los datos'); ?></h2>
      <p>
        <?php echo pll__('No se cederán datos a terceros salvo obligación legal o proveedores que presten servicios bajo contrato.'); ?>
      </p>
    </div>
  </section>

  <!-- DERECHOS -->
  <section class="privacy-section">
    <div class="privacy-wrap">
      <h2><?php echo pll__('Derechos del usuario'); ?></h2>
      <p>
        <?php echo pll__('Puede ejercer los derechos de acceso, rectificación, supresión, oposición, limitación y portabilidad escribiendo a [Email de contacto].'); ?>
      </p>
    </div>
  </section>

  <!-- CONSERVACION -->
  <section class="privacy-section alt">
    <div class="privacy-wrap">
      <h2><?php echo pll__('Plazo de conservación'); ?></h2>
      <p>
        <?php echo pll__('Los datos se conservarán durante el tiempo necesario para cumplir con la finalidad para la que se recabaron y las obligaciones legales.'); ?>
      </p>
    </div>
  </section>

  <!-- SEGURIDAD -->
  <section class="privacy-section">
    <div class="privacy-wrap">
      <h2><?php echo pll__('Medidas de seguridad'); ?></h2>
      <p>
        <?php echo pll__('Aplicamos medidas técnicas y organizativas adecuadas para proteger sus datos personales.'); ?>
      </p>
    </div>
  </section>

</main>

<?php get_footer(); ?>