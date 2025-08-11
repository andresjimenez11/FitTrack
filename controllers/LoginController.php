<?php

namespace Controllers;

use Classes\Email;
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
        
        $alertas = [];
        $usuario = new Usuario;

        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuario->sincronizar($_POST); // Rellenar formulario
            $alertas = $usuario->validarNuevaCuenta();

            if(empty($alertas)) {

                //Comprobar si usuario esta registrado
                $existeUsuario = Usuario::where('email', $usuario->email);
                if($existeUsuario) {
                    Usuario::setAlerta('error', 'El usuario ya está registrado.');
                    $alertas = Usuario::getAlertas();
                } else {
                    // Hashear password
                    $usuario->hashPassword();

                    // Eliminar password2
                    unset($usuario->password2);

                    // Generar el token
                    $usuario->crearToken();
                    
                    // Crear usuario
                    $resultado = $usuario->guardar();                    
                    
                    // Enviar email
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarConfirmacion();
                    
                    if($resultado) {
                        header('Location: /mensaje');
                    }
                }
            }
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
        
        $token = s($_GET['token']); // Obtener token de URL, se sanitiza

        if(!$token) header('Location: /');

        // Encontrar al usuario
        $usuario = Usuario::where('token', $token);

        if(empty($usuario)) {

            // No encuentra usuario con ese token
            Usuario::setAlerta('error', 'Token no válido');

        } else {
            // Confirmar la cuenta
            $usuario->confirmado = 1;
            $usuario->token = null;
            
            // Eliminar password2
            unset($usuario->password2);

            $usuario->guardar();

            Usuario::setAlerta('exito', 'Cuenta creada correctamente');
        }

        $alertas = Usuario::getAlertas();
       
        // Render
        $router->render('auth/confirmar', [
            'titulo' => 'Confirmar',
            'alertas' => $alertas
        ]);
    }
}