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

    public static function forget() {
        echo "Desde olvide";

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

        }
    }

    public static function reset() {
        echo "Desde reestablecer";

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

        }
    }

    public static function message() {
        echo "Desde mensaje";
    }

    public static function confirm() {
        echo "Desde confirmar";
    }
}