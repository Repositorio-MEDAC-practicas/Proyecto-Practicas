<?php
/*
Template Name: Contacto Free Soul
*/

get_header();
?>

<main class="contacto">

    <section class="contacto-hero">
        <h1>¿Tienes algo en mente?</h1>
        <p>Escríbenos y te respondemos lo antes posible ⚡</p>
    </section>

    <section class="contacto-intro">
        <p>
            ¿Tienes una duda sobre tu pedido, necesitas información o quieres colaborar con nosotros?
            Estamos aquí para ayudarte.
        </p>
    </section>

    <section class="contacto-container">

        <div class="contacto-info">
            <h2>Contacto</h2>

            <p>Puedes escribirnos a través del formulario o directamente por email.</p>

            <p><strong>Email:</strong> contacto@freesoul.com</p>

            <p class="contacto-horario">
                <strong>Horario:</strong><br>
                Lunes a viernes — 9:00 a 18:00
            </p>
        </div>

        <div class="contacto-form" id="contacto-form">

            <!-- MENSAJES -->

            <?php if ( isset($_GET['enviado']) && $_GET['enviado'] === '1' ) : ?>
                <div class="contacto-exito">
                    Mensaje enviado 🚀 Te responderemos pronto
                </div>
            <?php endif; ?>

            <?php if ( isset($_GET['error']) && $_GET['error'] === '1' ) : ?>
                <div class="contacto-error">
                    Completa los campos correctamente.
                </div>
            <?php endif; ?>

            <!-- FORM -->

            <form method="POST" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="freesoul-form">

                <input type="hidden" name="action" value="freesoul_contact_form">

                <?php wp_nonce_field('freesoul_contact_nonce', 'freesoul_nonce'); ?>

                <!-- honeypot -->
                <input type="text" name="website" style="display:none;">

                <div class="form-group">
                    <input type="text" name="nombre" required>
                    <label>Nombre</label>
                </div>

                <div class="form-group">
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>

                <div class="form-group">
                    <select name="motivo">
                        <option value="Duda sobre pedido">Duda sobre pedido</option>
                        <option value="Información de producto">Información de producto</option>
                        <option value="Colaboración">Colaboración</option>
                        <option value="Otros">Otros</option>
                    </select>
                </div>

                <div class="form-group">
                    <textarea name="mensaje" required></textarea>
                    <label>Tu mensaje</label>
                </div>

                <button type="submit" class="contacto-btn">
                    Enviar mensaje
                </button>

                <p class="contacto-legal">
                    Nunca compartiremos tus datos.
                </p>

            </form>

        </div>

    </section>

</main>

<?php get_footer(); ?>