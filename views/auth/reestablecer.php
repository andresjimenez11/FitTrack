<div class="contenedor reestablecer">
    <?php include_once __DIR__ . '/../templates/nombre-sitio.php'; ?>

    <div class="contenedor-sm contenedor-formulario">
        <p class="descripcion-pagina">Crear Nueva Contraseña</p>

        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

        <?php if($mostrar) { ?>

        <form class="formulario" method="POST" novalidate>
            
            <div class="campo">
                <label for="password">Contraseña</label>
                <input
                    type="password"
                    id="password"
                    placeholder="Tu Contraseña"
                    name="password"
                />
            </div>
             <div class="campo">
                <label for="password2">Repite Contraseña</label>
                <input
                    type="password"
                    id="password2"
                    placeholder="Repite tu Contraseña"
                    name="password2"
                />
            </div>

            <input type="submit" class="boton" value="Guardar Contraseña">
        </form>

        <?php } ?>
        <div class="acciones">
            <a href="/crear">¿No tienes una cuenta? Crear Cuenta</a>
            <a href="/recuperar">¿Olvidaste tu contraseña?</a>
        </div>
    </div><!--.contenedor -->
</div>