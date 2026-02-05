<?php get_header(); ?>

<!-- ================= HERO SLIDER ================= -->

<section class="hero-slider">

  <!-- SLIDE 1 -->
  <div class="slide active" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/imagenes/hero1.png')">
    <div class="hero-overlay"></div>

    <div class="hero-content">
      <h1><?php echo pll__('Celebra diferente.'); ?></h1>
      <p><?php echo pll__('Bebidas sin alcohol para noches inolvidables.'); ?></p>

      <div class="hero-ctas">

        <a href="#catalog" class="btn-outline btn-cart">

          <svg class="cart-icon" viewBox="0 0 24 24" fill="none">
            <path d="M4 5h2l2.5 10h8l2-6H7"
              stroke="currentColor"
              stroke-width="1.6"
              stroke-linecap="round"
              stroke-linejoin="round"/>
            <circle cx="10" cy="20" r="1.3"/>
            <circle cx="17" cy="20" r="1.3"/>
          </svg>

          <?php echo pll__('Comprar'); ?>
        </a>

      </div>
    </div>
  </div>

  <!-- SLIDE 2 -->
  <div class="slide" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/imagenes/hero2.jpg')">
    <div class="hero-overlay"></div>

    <div class="hero-content">

      <h1 class="hero-split">
        <?php echo pll__('Eventos'); ?><br>
        <span><?php echo pll__('y'); ?></span><br>
        <?php echo pll__('empresas.'); ?>
      </h1>

      <p><?php echo pll__('Soluciones premium sin alcohol para hostelería.'); ?></p>

      <div class="hero-ctas">
        <a href="#b2b" class="btn-main"><?php echo pll__('Contacto profesional'); ?></a>
      </div>

    </div>
  </div>

  <!-- DOTS -->
  <div class="slider-dots">
    <span class="dot active"></span>
    <span class="dot"></span>
  </div>

</section>

<!-- ================= CATEGORIES ================= -->

<section id="categories" class="categories">
  <h2><?php echo pll__('¿Qué te apetece hoy?'); ?></h2>

  <div class="cat-grid">
    <div class="cat-item">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/cerveza.png">
      <h3><?php echo pll__('Cervezas 0.0'); ?></h3>
    </div>

    <div class="cat-item">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/destilados.png">
      <h3><?php echo pll__('Destilados'); ?></h3>
    </div>

    <div class="cat-item">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/sidras.png">
      <h3><?php echo pll__('Sidras'); ?></h3>
    </div>

    <div class="cat-item">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/vino.png">
      <h3><?php echo pll__('Vinos'); ?></h3>
    </div>
  </div>
</section>

<!-- ================= LIFESTYLE ================= -->

<section class="lifestyle">
  <h2><?php echo pll__('Celebrar con conciencia'); ?></h2>
  <p><?php echo pll__('Descubre nuevas formas de brindar y disfrutar sin alcohol.'); ?></p>

  <div class="life-grid">
    <div>
      <h3>🌿 <?php echo pll__('Ingredientes naturales'); ?></h3>
      <p><?php echo pll__('Botánicos y frutas.'); ?></p>
    </div>

    <div>
      <h3>🥂 <?php echo pll__('Para cualquier ocasión'); ?></h3>
      <p><?php echo pll__('Fiestas y eventos.'); ?></p>
    </div>

    <div>
      <h3>🎉 <?php echo pll__('Nueva cultura social'); ?></h3>
      <p><?php echo pll__('Elegir también es celebrar.'); ?></p>
    </div>
  </div>
</section>

<section class="party-strip">
  <h2><?php echo pll__('Elegir también es celebrar'); ?></h2>
</section>

<!-- ================= CATALOG ================= -->

<section id="catalog" class="catalog">

<h2><?php echo pll__('Lo más buscado'); ?></h2>

<div class="product-grid">

  <article class="product">
    <div class="product-img">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/vino-natureo.png">
      <div class="product-overlay">
        <h4><?php echo pll__('Notas de cata'); ?></h4>
        <p><?php echo pll__('Burbuja fina · cítricos · flor blanca'); ?></p>
      </div>
    </div>

    <h3>Natureo</h3>
    <span>€12,90</span>
    <button class="btn-add"><?php echo pll__('Añadir'); ?></button>
  </article>

  <article class="product">
    <div class="product-img">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/cerveza-heineken.png">
      <div class="product-overlay">
        <h4><?php echo pll__('Notas de cata'); ?></h4>
        <p><?php echo pll__('Malta · herbal · refrescante'); ?></p>
      </div>
    </div>

    <h3>Heineken 0.0</h3>
    <span>€3,00</span>
    <button class="btn-add"><?php echo pll__('Añadir'); ?></button>
  </article>

  <article class="product">
    <div class="product-img">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/ginebra-tanqueray.png">
      <div class="product-overlay">
        <h4><?php echo pll__('Notas de cata'); ?></h4>
        <p><?php echo pll__('Enebro · lima · botánicos'); ?></p>
      </div>
    </div>

    <h3>Tanqueray 0.0</h3>
    <span>€14,90</span>
    <button class="btn-add"><?php echo pll__('Añadir'); ?></button>
  </article>

</div>
</section>

<!-- ================= B2B ================= -->

<section id="b2b" class="b2b">
  <div class="b2b-box">
    <h2><?php echo pll__('Eventos sin alcohol que sí molan'); ?></h2>
    <p><?php echo pll__('Empresas · Catering · Hostelería'); ?></p>
    <a class="btn-main"><?php echo pll__('Contacto profesional'); ?></a>
  </div>
</section>

<?php get_footer(); ?>
