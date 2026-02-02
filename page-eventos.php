<?php
/*
Template Name: Eventos
*/
get_header();
?>

<main class="eventos-page">

  <!-- HERO -->
  <section class="eventos-hero">
    <div class="overlay"></div>
    <div class="hero-content hero-lower">

      <h1><?php echo pll__('Eventos sin alcohol que sí molan'); ?></h1>

      <p><?php echo pll__('Packs premium para bodas, fiestas privadas y empresas.'); ?></p>

      <a href="#form-eventos" class="btn-main">
        <?php echo pll__('Solicitar presupuesto'); ?>
      </a>

    </div>
  </section>

  <!-- INTRO -->
  <section class="eventos-intro-full">

    <div class="intro-wrap">

      <h2><?php echo pll__('Celebraciones pensadas para disfrutar'); ?></h2>

      <p class="intro-lead">
        <?php echo pll__('Cada evento es único, y en Free Soul lo tratamos como tal.'); ?>
      </p>

      <p>
        <?php echo pll__('Seleccionamos bebidas sin alcohol que destacan por su sabor y su presencia, diseñando propuestas pensadas para sorprender y encajar con la atmósfera de tu celebración. Bodas, cumpleaños o eventos corporativos: tú celebras, nosotros nos ocupamos del resto.'); ?>
      </p>

    </div>

  </section>

  <!-- COMO FUNCIONA -->
  <section class="eventos-how">
    <h2><?php echo pll__('Cómo lo hacemos posible'); ?></h2>

    <div class="how-grid">

      <div class="how-step">
        <span class="step-number">1</span>
        <h3><?php echo pll__('Elegimos sabores premium'); ?></h3>
        <p><?php echo pll__('Seleccionamos bebidas sin alcohol que destacan por su complejidad, aromas y presencia en copa.'); ?></p>
      </div>

      <div class="how-step">
        <span class="step-number">2</span>
        <h3><?php echo pll__('Personalizamos tu pack'); ?></h3>
        <p><?php echo pll__('Calculamos la cantidad ideal y combinaciones según tu evento y número de invitados.'); ?></p>
      </div>

      <div class="how-step">
        <span class="step-number">3</span>
        <h3><?php echo pll__('Coordinamos la entrega'); ?></h3>
        <p><?php echo pll__('Nos encargamos de la logística y coordinamos para que llegue todo a tiempo y sin complicaciones.'); ?></p>
      </div>

    </div>
  </section>

  <!-- METRICAS -->
  <section class="eventos-metricas">

    <div class="metricas-grid">

      <div class="metrica">
        <strong>+120</strong>
        <span><?php echo pll__('eventos organizados'); ?></span>
      </div>

      <div class="metrica">
        <strong>+18.000</strong>
        <span><?php echo pll__('invitados atendidos'); ?></span>
      </div>

      <div class="metrica">
        <strong><?php echo pll__('Logística'); ?></strong>
        <span><?php echo pll__('en toda España'); ?></span>
      </div>

      <div class="metrica">
        <strong><?php echo pll__('Marcas'); ?></strong>
        <span><?php echo pll__('premium seleccionadas'); ?></span>
      </div>

    </div>

  </section>

  <!-- PACKS -->
  <section class="eventos-packs">

    <h2><?php echo pll__('Nuestros packs para eventos'); ?></h2>

    <div class="packs-grid">

      <article class="pack" data-pack="<?php echo pll__('Pack Fiesta 50'); ?>">
        <h3><?php echo pll__('Pack Fiesta 50'); ?></h3>
        <p><?php echo pll__('50 bebidas variadas'); ?></p>
        <ul>
          <li><?php echo pll__('Cervezas 0.0'); ?></li>
          <li><?php echo pll__('Vinos sin alcohol'); ?></li>
          <li><?php echo pll__('Destilados premium'); ?></li>
        </ul>
        <span class="pack-price">Desde 199€</span>
        <button class="btn-outline select-pack"><?php echo pll__('Elegir pack'); ?></button>
      </article>

      <article class="pack destacado" data-pack="<?php echo pll__('Pack Evento 150'); ?>">
        <h3><?php echo pll__('Pack Evento 150'); ?></h3>
        <p><?php echo pll__('Ideal para celebraciones grandes'); ?></p>
        <ul>
          <li><?php echo pll__('Selección completa'); ?></li>
          <li><?php echo pll__('Mejor precio por unidad'); ?></li>
          <li><?php echo pll__('Asesoramiento incluido'); ?></li>
        </ul>
        <span class="pack-price">Desde 499€</span>
        <button class="btn-main select-pack"><?php echo pll__('Elegir pack'); ?></button>
      </article>

      <article class="pack" data-pack="<?php echo pll__('Pack Boda 300'); ?>">
        <h3><?php echo pll__('Pack Boda 300'); ?></h3>
        <p><?php echo pll__('Eventos premium'); ?></p>
        <ul>
          <li><?php echo pll__('Gama alta'); ?></li>
          <li><?php echo pll__('Personalizado'); ?></li>
          <li><?php echo pll__('Logística incluida'); ?></li>
        </ul>
        <span class="pack-price">Desde 899€</span>
        <button class="btn-outline select-pack"><?php echo pll__('Elegir pack'); ?></button>
      </article>

    </div>

  </section>

  <!-- FORM -->
  <section id="form-eventos" class="eventos-form">

    <div class="form-wrap">

      <div class="form-copy">
        <h2><?php echo pll__('Solicita tu presupuesto'); ?></h2>
        <p><?php echo pll__('Cuéntanos cómo es tu evento y te enviaremos una propuesta personalizada sin compromiso.'); ?></p>
      </div>

      <form class="form-eventos">

        <div class="form-grid">

          <input type="text" name="nombre" placeholder="<?php echo pll__('Nombre completo'); ?>" required>
          <input type="email" name="email" placeholder="<?php echo pll__('Email'); ?>" required>
          <input type="tel" name="telefono" placeholder="<?php echo pll__('Teléfono'); ?>">

          <select name="tipo_evento">
            <option value=""><?php echo pll__('Tipo de evento'); ?></option>
            <option><?php echo pll__('Boda'); ?></option>
            <option><?php echo pll__('Cumpleaños'); ?></option>
            <option><?php echo pll__('Empresa'); ?></option>
            <option><?php echo pll__('Fiesta privada'); ?></option>
          </select>

          <input type="date" name="fecha">

          <input type="number" name="asistentes" placeholder="<?php echo pll__('Número de asistentes'); ?>">

          <input type="hidden" name="pack" id="packInput">

        </div>

        <textarea name="mensaje" placeholder="<?php echo pll__('Cuéntanos qué necesitas...'); ?>"></textarea>

        <button type="submit" class="btn-main"><?php echo pll__('Enviar solicitud'); ?></button>

      </form>

    </div>

  </section>

</main>

<?php get_footer(); ?>