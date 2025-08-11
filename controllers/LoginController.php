<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class LoginController {
    public static function login(Router $router) {

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

        }

        // Render
        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesión'
        ]);
    }

    public static function logout() {
        echo "Desde logout";
    }

    public static function create(Router $router) {
        
        $usuario = new Usuario;

        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuario->sincronizar($_POST); // Rellenar formulario

            $alertas = $usuario->validarNuevaCuenta();

        }

         // Render
        $router->render('auth/create', [
            'titulo' => 'Crea tu cuenta',
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function forget(Router $router) {

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
        }

         // Render
        $router->render('auth/recuperar', [
            'titulo' => 'Recuperar Contraseña'
        ]);
    }

    public static function reset(Router $router) {

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

        }

         // Render
        $router->render('auth/reestablecer', [
            'titulo' => 'Reestablecer Contraseña'
        ]);
    }

    public static function message(Router $router) {
        
        // Render
        $router->render('auth/mensaje', [
            'titulo' => 'Cuenta Cuenta Existosamente'
        ]);
    }

    public static function confirm(Router $router) {
        
        // Render
        $router->render('auth/confirmar', [
            'titulo' => 'Confirmar'
        ]);
    }
}