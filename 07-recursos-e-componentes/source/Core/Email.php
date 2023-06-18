<?php 

namespace Source\Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email
{
    /** @var array */
    private $data;

    /** @var PHPMailer */
    private $mail;

    /** @var Message */
    private $message;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);

        $this->message = new Message();

        // Setup
        $this->mail->isSMTP();
        $this->mail->setLanguage(CONF_MAIL_OPTION_LANG);
        $this->mail->isHTML(CONF_MAIL_OPTION_HTML);
        $this->mail->SMTPAuth = CONF_MAIL_OPTION_AUTH;
        $this->mail->SMTPSecure = CONF_MAIL_OPTION_SECURE;
        $this->mail->CharSet = CONF_MAIL_OPTION_CHARSET;

        // Auth
        $this->mail->Host = CONF_MAIL_HOST;
        $this->mail->Port = CONF_MAIL_PORT;
        $this->mail->Username = CONF_MAIL_USER;
        $this->mail->Password = CONF_MAIL_PASS;
    }

    // Responsavel por compor o email e alimentar as propriedades. 
    public function bootstrap(string $subject, string $message, string $toEmail, string $toName) : Email
    {
        // Fazemos isso para poder resetar a propriedade em um objeto que iremos configurar.
        $this->data = new \stdClass();

        $this->data->subject = $subject;
        $this->data->message = $message;
        $this->data->toEmail = $toEmail;
        $this->data->toName = $toName;

        return $this;
    }

    // Função responsavel por setar anexos ao e-mail que iremos enviar.
    public function attach(string $filePath, string $fileName) : Email
    {
        $this->data->attach[$filePath] = $fileName;

        return $this;
    }

    // Aqui vamos fazer o envio e a validação necessaria.
    // Esses argumentos são passados como default caso nenhuma sender e name forem mandados.
    public function send($fromEmail = CONF_MAIL_SENDER['address'], $fromName = CONF_MAIL_SENDER['name']) : bool
    {
        // Caso o método bootstrap não tenha sido rodado ainda. 
        if (empty($this->data)) {
            $this->message->error("Erro ao enviar, favor verique os seus dados");
            
            return false;
        }

        if (!is_email($this->data->toEmail)) {
            $this->message->warning("O e-mail de destinatário não é válido");

            return false;
        }

        if (!is_email($fromEmail)) {
            $this->message->warning("O e-mail de remetente não é válido");

            return false;
        }

        try {
            $this->mail->Subject = $this->data->Subject;
            $this->mail->msgHTML($this->data->message);
            $this->mail->addAddress($this->data->toEmail, $this->data->toName);
            $this->mail->setFrom($fromEmail, $fromName);

            if (!empty($this->data->attach)) {
                foreach($this->data->attach as $path => $name) {
                    $this->mail->addAttachment($path, $name);
                }
            }
            
            $this->mail->send();

            return true;

        } catch (Exception $exception) {
            $this->message->error($exception->getMessage());

            return false;
        }
    }

    // Vamos precisar de uma forma de acessar o PHPMailer e utilizar seus métodos, essa função 
    // Retorna um objeto da classe PHPMailer que já foi instanciada no método __construct.
    public function mail() : PHPMailer
    {
        return $this->mail;
    } 

    // Retorna um objeto da classe Message que já foi instanciada no método __construct.
    public function message() : Message
    {
        return $this->message;
    } 
}


?>