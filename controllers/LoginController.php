<?php

namespace Controllers;
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
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

        }

         // Render
        $router->render('auth/create', [
            'titulo' => 'Crea tu cuenta'
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