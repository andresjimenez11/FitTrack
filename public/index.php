<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use MVC\Router;
$router = new Router();

// Login
$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

// Crear cuenta
$router->get('/crear', [LoginController::class, 'create']);
$router->post('/crear', [LoginController::class, 'create']);

// Olvide mi password
$router->get('/recuperar', [LoginController::class, 'forget']);
$router->post('/recuperar', [LoginController::class, 'forget']);

// Confirmación nuevo password
$router->get('/reestablecer', [LoginController::class, 'reset']);
$router->post('/reestablecer', [LoginController::class, 'reset']);

// Confirmación de cuenta
$router->get('/mensaje', [LoginController::class, 'message']);
$router->get('/confirmar', [LoginController::class, 'confirm']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();