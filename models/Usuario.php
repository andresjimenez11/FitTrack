<?php 
namespace Model;

class Usuario extends ActiveRecord {
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'email', 'password', 'token', 'confirmado'];

    public $id;
    public $nombre;
    public $email;
    public $telefono;
    public $password;
    public $password2;
    public $token;
    public $confirmado;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->confirmado = $args['confirmado'] ?? '';
    }

    public function validarNuevaCuenta() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El nombre del usuario es obligatorio.';
        }

        if(!$this->email) {
            self::$alertas['error'][] = "Debes añadir un email";
        }

        if(!$this->password) {
            self::$alertas['error'][] = "Debes añadir un password";
        }

        if(strlen($this->password) < 8) {
            self::$alertas['error'][] = "El password debe tener mínimo 8 carácteres";
        }

        if(!$this->password2) {
            self::$alertas['error'][] = "Debes repetir el password"; 
        }

        if($this->password !== $this->password2) {
            self::$alertas['error'][] = "El password no coincide";
        }

        return self::$alertas;
    }
 
}