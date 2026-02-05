<footer class="site-footer">

  <div class="footer-inner">

    <!-- BRAND -->
    <div class="footer-brand">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/imagenes/logo.png" alt="Free Soul Drinks">
      <p>
        <?php echo pll__('Bebidas sin alcohol para celebrar con estilo.'); ?><br>
        <?php echo pll__('Elegir también es brindar.'); ?>
      </p>
    </div>

    <!-- LINKS -->
    <div class="footer-col">
      <h4><?php echo pll__('Descubre'); ?></h4>
      <a href="#"><?php echo pll__('Catálogo'); ?></a>
      <a href="#"><?php echo pll__('Sobre la marca'); ?></a>
      <a href="#"><?php echo pll__('Eventos'); ?></a>
    </div>

    <div class="footer-col">
      <h4><?php echo pll__('Profesional'); ?></h4>
      <a href="#"><?php echo pll__('Distribución'); ?></a>
      <a href="#"><?php echo pll__('Proveedores'); ?></a>
      <a href="#"><?php echo pll__('Contacto'); ?></a>
    </div>

    <!-- LEGAL (sustituye Idiomas) -->
    <div class="footer-col footer-legal">
      <h4><?php echo pll__('Legal'); ?></h4>

      <a href="<?php echo get_permalink( get_page_by_path('cookies') ); ?>">
        <?php echo pll__('Política de Cookies'); ?>
      </a>

      <a href="<?php echo get_permalink( get_page_by_path('privacidad') ); ?>">
        <?php echo pll__('Política de Privacidad'); ?>
      </a>
    </div>

    <!-- NEWSLETTER -->
    <div class="footer-newsletter">
      <h4><?php echo pll__('Únete a la comunidad'); ?></h4>
      <p><?php echo pll__('Promos, lanzamientos y cultura sin alcohol.'); ?></p>

      <form>
        <input type="email" placeholder="<?php echo pll__('Tu email'); ?>">
        <button><?php echo pll__('Suscribirme'); ?></button>
      </form>
    </div>

  </div>

  <div class="footer-bottom">

    <span>© <?php echo date('Y'); ?> Free Soul Drinks</span>

    <div class="footer-social">
      <a href="#">X</a>
      <a href="#">TikTok</a>
      <a href="#">Instagram</a>
    </div>

  </div>

</footer>

<?php wp_footer(); ?>