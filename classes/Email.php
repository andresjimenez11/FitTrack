<?php 
namespace Classes;
use PHPMailer\PHPMailer\PHPMailer;

class Email {
    protected $email;
    protected $nombre;
    protected $token;

    public function __construct($email, $nombre, $token) {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = $_ENV['SMTP_HOST'] ?? 'localhost';
        $mail->SMTPAuth   = true;
        $mail->Port       = (int)($_ENV['SMTP_PORT'] ?? 25);
        $mail->Username   = $_ENV['SMTP_USERNAME'] ?? '';
        $mail->Password   = $_ENV['SMTP_PASSWORD'] ?? '';

        $secure = strtolower($_ENV['SMTP_SECURE'] ?? 'tls');
        if ($secure === 'tls') {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        } elseif ($secure === 'ssl') {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        }

        $mail->SMTPDebug = (int)($_ENV['SMTP_DEBUG'] ?? 0);

        $mail->setFrom($_ENV['SMTP_FROM_EMAIL'], $_ENV['SMTP_FROM_NAME']);
        $mail->addAddress($this->email, $this->nombre);
        $mail->Subject = 'Confirma tu cuenta';
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $frontend = rtrim($_ENV['APP_URL'], '/');
        $link = "{$frontend}/confirmar?token={$this->token}";

        $contenido  = "<html>";
        $contenido .= "<p>Hola <strong>{$this->nombre}</strong>. Has creado tu cuenta en FitTrack, solo debes confirmarla en el siguiente enlace:</p>";
        $contenido .= "<p>Presiona aquí: <a href='{$link}'>Confirma tu cuenta</a></p>";
        $contenido .= "<p>Si tú no creaste esta cuenta, puedes ignorar este mensaje.</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        $mail->send();
    }

    public function enviarInstrucciones() {
        
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = $_ENV['SMTP_HOST'] ?? 'localhost';
        $mail->SMTPAuth   = true;
        $mail->Port       = (int)($_ENV['SMTP_PORT'] ?? 25);
        $mail->Username   = $_ENV['SMTP_USERNAME'] ?? '';
        $mail->Password   = $_ENV['SMTP_PASSWORD'] ?? '';

        $secure = strtolower($_ENV['SMTP_SECURE'] ?? 'tls');
        if ($secure === 'tls') {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        } elseif ($secure === 'ssl') {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        }

        $mail->SMTPDebug = (int)($_ENV['SMTP_DEBUG'] ?? 0);

        $mail->setFrom($_ENV['SMTP_FROM_EMAIL'], $_ENV['SMTP_FROM_NAME']);
        $mail->addAddress($this->email, $this->nombre);
        $mail->Subject = 'Reestablecer tu Contraseña';
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $frontend = rtrim($_ENV['APP_URL'], '/');
        $link = "{$frontend}/reestablecer?token={$this->token}";

        $contenido = "<html>";
        $contenido .= "<p>Hola <strong>" . $this->nombre . ".</strong> Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo.</p>";
        $contenido .= "<p>Presiona aquí: <a href='{$link}'>Reestablecer Contraseña</a></p>";
        $contenido .= "<p>Si tu no solicitaste esto, puedes ignorar el mensaje.</p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;
        
        //Enviar email
        $mail->send();
    }
}