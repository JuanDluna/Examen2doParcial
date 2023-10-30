<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$username = $_SESSION["username"];
$email = $_SESSION["useremail"];
$fecha_actual = date("d/m/Y");
$message_aceptado =
    "
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f2f2f2;
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 600px;
                margin: 0 auto;
                background-color: #fff;
                padding: 20px;
            }
            h1 {
                color: #007BFF;
            }
            p {
                color: #333;
            }
            .signature {
                text-align: center;
                margin-top: 20px;
            }
            .signature img{
                max-width: 150px;
            }
        </style>
    </head>
    <div class='container'>
        <body>
            <h1>Bienvenido a SOFTIX!</h1>

            <p>Estimado $username,</p>
            <p>En nombre de todo el equipo de SOFTIX, me complace informarte que has sido seleccionado para unirte a nuestra empresa. Felicidades, te damos la m&aacute;s cordial bienvenida!</p>
            <p>Tu entusiasmo y experiencia en la programaci&oacute;n destacaron entre nuestros candidatos, y estamos seguros de que ser&aacute;s un valioso miembro de nuestro equipo. Estamos ansiosos por trabajar contigo y aprovechar tus habilidades para lograr nuestros objetivos comunes.</p>
            <p>A continuaci&oacute;n, te proporcionamos algunos detalles clave para tu proceso de incorporaci&oacute;n:</p>
            <p><strong>Fecha de Ingreso:</strong> $fecha_actual</p>
            <p><strong>Horario:</strong> 09:00 - 17:00</p>
            <p><strong>Ubicaci&oacute:</strong> Av. Universidad # 940, Ciudad Universitaria, C.P. 20100, Aguascalientes, Ags. M&eacute;xico</p>
            <p><strong>Documentaci&oacute;n Requerida:</strong> e-firma, carta de recomendaci&oacute;n y piedra lunar</p>

            <p>Te pedimos que completes y env&iacute;es la documentaci&oacute;n requerida antes de tu fecha de ingreso. Adem&aacute;s, estaremos organizando una sesi&oacute;n de orientaci&oacute;n para brindarte m&aacute;s informaci&oacute;n sobre nuestra empresa y tus responsabilidades.</p>
            <p>Nuestro equipo de Recursos Humanos se pondr&aacute; en contacto contigo para guiarte a trav&eacute;s de los detalles espec&iacute;ficos y responder a cualquier pregunta que puedas tener.</p>
            <p>Estamos entusiasmados de tenerte en nuestro equipo y esperamos con ansias tu contribuci&oacute;n a SOFTIX. Una vez m&aacute;s, felicidades por esta nueva etapa en tu carrera.</p>
            <p>Atentamente,</p>
            <div class='signature'>
                <img src='Firma.png' alt='Firma del Director' width='200' height='200'>
                <hr>
                <p>CEO. Ing. Juan De Luna</p>
            </div>

    </body>
    </html>
";
$message_rechazado =
    "
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f2f2f2;
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 600px;
                margin: 0 auto;
                background-color: #fff;
                padding: 20px;
            }
            h1 {
                color: #007BFF;
            }
            p {
                color: #333;
            }
            .signature {
                text-align: center;
                margin-top: 20px;
            }
            .signature img {
                max-width: 150px;
            }
        </style>
    </head>
    <body>
    <div class='container'>
        <h1>&iexcl;Gracias por tu inter&eacute;s en SOFTIX!</h1>
        <p>Estimado " . htmlentities($username, ENT_QUOTES, 'UTF-8') . ",</p>
        <p>Lamentamos informarte que, despu&eacute;s de revisar tu solicitud, no hemos podido seleccionarte para unirte a nuestro equipo en este momento. Valoramos tu inter&eacute;s y apreciamos el tiempo y esfuerzo que invertiste en el proceso de selecci&oacute;n.</p>
        <p>Te animamos a seguir desarrollando tus habilidades y experiencia, y a considerar postularte nuevamente en el futuro. Nuestra empresa est&aacute; en constante crecimiento, y tu perfil podr&iacute;a ser una excelente coincidencia en futuras oportunidades.</p>
        <p>Agradecemos tu comprensi&oacute;n y te deseamos mucho &eacute;xito en tu b&uacute;squeda de empleo.</p>
        <p>Atentamente,</p>
        <div class='signature'>
            <img src='Firma.png' alt='Firma del Director' width='200' height='200'>
            <hr>
            <p>CEO. Ing. Juan De Luna</p>
        </div>
    </div>
    </body>
    </html>
";

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'urielaoac@gmail.com';
    $mail->Password = 'xmaqsmnfktniwlbg';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    $mail->setFrom('urielaoac@gmail.com', 'Equipo de SOFTIX');
    $mail->addAddress($email, $username);

    $mail->isHTML(true);
    $mail->Subject = 'Aplicacion a SOFTIX';
    $mail->Body = $message_rechazado; //if si aceptado o rechazado
    $mail->addAttachment('Firma.png');

    $mail->send();
    echo 'Mensaje enviado';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>