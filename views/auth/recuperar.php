<div class="contenedor recuperar">
    <?php include_once __DIR__ . '/../templates/nombre-sitio.php'; ?>

    <div class="contenedor-sm contenedor-formulario">
        <p class="descripcion-pagina">Recuperar Contraseña</p>

        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

        <form class="formulario" method="POST" action="/recuperar" novalidate>
            <div class="campo">
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    placeholder="Tu Email"
                    name="email"
                />
            </div>
            

            <input type="submit" class="boton" value="Enviar Instrucciones">
        </form>
        <div class="acciones">
            <a href="/crear">¿No tienes una cuenta? Crear Cuenta</a>
            <a href="/">¿Ya tienes una cuenta? Iniciar Sesión</a>
        </div>
    </div><!--.contenedor -->
</div>