<?php
/*
Template Name: Preguntas Frecuentes
*/
get_header();
?>

<div class="top">
    <h1 class="page-title"><?php echo pll__('Preguntas frecuentes'); ?></h1>
</div>

<main class="inbox">
    <section class="faq-section">

        <div class="faq-item">
            <div class="faq-question"><?php echo pll__('¿Cómo puedo navegar por el catálogo de productos?'); ?></div>
            <div class="faq-answer">
                <p><?php echo pll__('Nuestro catálogo de productos está organizado en categorías. Puedes acceder al catálogo desde el menú principal haciendo clic en "Productos". Allí encontrarás todos los productos disponibles con filtros y buscadores para facilitar tu búsqueda.'); ?></p>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question"><?php echo pll__('¿Cómo me registro o inicio sesión en el sitio?'); ?></div>
            <div class="faq-answer">
                <p><?php echo pll__('Para registrarte o iniciar sesión, haz clic en el enlace "Login/Registro" en la esquina superior. Si no tienes cuenta, completa el formulario de registro. Si ya estás registrado, introduce tu correo y contraseña para iniciar sesión.'); ?></p>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question"><?php echo pll__('¿Cómo puedo realizar un pedido de productos?'); ?></div>
            <div class="faq-answer">
                <p><?php echo pll__('Para realizar un pedido, navega por el catálogo y añade los productos deseados al carrito. Luego, ve al carrito y sigue el proceso de compra ingresando tu dirección de envío y datos de pago. Al finalizar, recibirás una confirmación por correo electrónico con los detalles del pedido.'); ?></p>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question"><?php echo pll__('¿Cómo puedo solicitar un presupuesto?'); ?></div>
            <div class="faq-answer">
                <p><?php echo pll__('Si necesitas una cotización personalizada, dirígete a la sección "Presupuestos" en el menú principal. Completa el formulario de solicitud indicando los productos o servicios de tu interés. Nuestro equipo analizará tu solicitud y te enviará un presupuesto por correo electrónico con los detalles y precios correspondientes.'); ?></p>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question"><?php echo pll__('¿Dónde encuentro información sobre eventos y noticias recientes?'); ?></div>
            <div class="faq-answer">
                <p><?php echo pll__('En la sección de "Noticias" del sitio encontrarás artículos sobre novedades y blog. Para conocer los próximos eventos, visita la página de "Eventos" desde el menú principal. Allí publicamos las fechas y detalles de los eventos relacionados con nuestros productos.'); ?></p>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question"><?php echo pll__('¿Cómo puedo contactar con atención al cliente?'); ?></div>
            <div class="faq-answer">
                <p><?php echo pll__('Puedes contactarnos a través del formulario en la página de "Contacto". Además, puedes enviarnos un correo electrónico o llamarnos directamente. Revisamos todas las consultas de clientes y te responderemos lo antes posible.'); ?></p>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question"><?php echo pll__('¿Cuál es la política de envíos y devoluciones?'); ?></div>
            <div class="faq-answer">
                <p><?php echo pll__('Nuestros envíos se realizan a través de empresas de transporte asociadas y los tiempos varían según la zona. Si necesitas devolver un producto, consulta nuestra política de devoluciones en la sección "Legal", donde explicamos los pasos y condiciones para cambios o reembolsos.'); ?></p>
            </div>
        </div>

    </section>
</main>

<?php
get_footer();
?>