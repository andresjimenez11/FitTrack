<div class="contenedor">
    <h1>FitTrack</h1>
    <p>Crea y gestiona tus rutinas</p>

    <div class="contenedor-sm">
        <p class="descripcion-pagin">Iniciar Sesión</p>

        <form class="formulario" method="POST" action="/">
            <div class="campo">
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    placeholder="Tu Email"
                    name="email"
                />
            </div>
            <div class="campo">
                <label for="password">Contraseña</label>
                <input
                    type="password"
                    id="password"
                    placeholder="Tu Contraseña"
                    name="password"
                />
            </div>

            <input type="submit" class="boton" value="Iniciar Sesión">
        </form>
        <div class="acciones">
            <a href="/crear">¿Aún no tienes una cuenta? Crea una!</a>
            <a href="/olvide">¿Olvidaste tu contraseña?</a>
        </div>
    </div><!--.contenedor -->
</div>