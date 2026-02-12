<?php
/*
Template Name: Noticias
*/
get_header();
?>

<main class="eventos-page">

    <section class="top">
        <h1><?php echo pll__('15% DE DESCUENTO EN CERVEZAS'); ?></h1>
    </section>
    <section class="inbox">
        <h2 class="fecha"><?php echo pll__('1 de Enero'); ?></h2><h2>🎉 <?php echo pll__('Nuevo descuento disponible'); ?><br><br>
<?php echo pll__('¡Buenas noticias! Durante esta semana tienes un 15% de descuento en nuestra selección de cervezas.'); ?><br> <?php echo pll__('Aprovecha la oferta antes del domingo.'); ?></h2>
    </section>
    <section class="inbox">
        <h2 class="fecha"><?php echo pll__('25 de Enero'); ?></h2><h2>🆕 <?php echo pll__('Nuevas bebidas añadidas al catálogo'); ?><br><br>
<?php echo pll__('Hemos incorporado nuevas opciones a nuestra carta, incluyendo whisky sin alcohol y gin 0.0 premium.'); ?><br> <?php echo pll__('¡Échales un vistazo y descubre tu favorita!'); ?></h2>
    </section>
    <section class="inbox">
        <h2 class="fecha"><?php echo pll__('12 de Febrero'); ?></h2><h2>⚠️ <?php echo pll__('Incidencia técnica temporal'); ?><br><br>
<?php echo pll__('Estamos experimentando algunos problemas técnicos en la página de pagos.'); ?><br> <?php echo pll__('Nuestro equipo ya está trabajando para solucionarlo lo antes posible.'); ?><br> <?php echo pll__('Disculpa las molestias.'); ?></h2>
    </section>
    <section class="inbox">
        <h2 class="fecha"><?php echo pll__('17 de Febrero'); ?></h2><h2>🍾 <?php echo pll__('Vuelta de un producto muy solicitado'); ?><br><br>
<?php echo pll__('¡Está de vuelta!'); ?><br><?php echo pll__('La bebida sin alcohol más pedida por nuestros clientes ya vuelve a estar disponible en stock.'); ?><br> <?php echo pll__('No te quedes sin ella.'); ?></h2>
    </section>
    <section class="inbox">
        <h2 class="fecha"><?php echo pll__('29 de Febrero'); ?></h2><h2>ℹ️ <?php echo pll__('Cambios en el horario de atención'); ?><br><br>
<?php echo pll__('Con motivo de mantenimiento,'); ?><br> <?php echo pll__('nuestro servicio de atención al cliente no estará disponible el jueves de 22:00 a 00:00.'); ?><br> <?php echo pll__('La web seguirá funcionando con normalidad.'); ?></h2>
    </section>

</main>

<?php get_footer(); ?>