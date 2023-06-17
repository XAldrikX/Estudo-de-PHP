<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.04 - Utilizando um componente");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ instance ] https://packagist.org/packages/phpmailer/phpmailer
 */
fullStackPHPClassSession("instance", __LINE__);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as MailException;

$phpMailer = new PHPMailer();

var_dump($phpMailer instanceof PHPMailer);


/*
 * [ configure ]
 */
fullStackPHPClassSession("configure", __LINE__);

try {
    // Parametro true serve para habilitar as exceções.
    $mail = new PHPMailer(true);

    // CONFIG
    $mail->isSMTP();
    $mail->setLanguage('br');
    $mail->isHTML(true);
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->CharSet = 'utf-8';

    // AUTH
    $mail->Host = 'sandbox.smtp.mailtrap.io';
    $mail->Username = '13d40519896a58';
    $mail->Password = '2894321bf07f5a';
    $mail->Port = 2525;

    // MAIL
    $mail->setFrom('nicolasbortoli2010@hotmail.com', 'Nicolas Bortoli');
    $mail->Subject = 'Este é meu envio via componente FSPHP';
    $mail->msgHTML('<h1>Olá mundo</h1><p>Esse é o meu primeiro disparo de e-mail.</p>');

    // SEND
    $mail->addAddress('nicolasbortoli2010@hotmail.com', 'Nicolas Bortoli');
    $send = $mail->send();

    var_dump($send);

} catch (MailException $exception) {
    var_dump($exception->getMessage());
}