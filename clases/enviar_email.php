<?php

use PHPMailer\PHPMailer\{PHPMailer, SMTP, Exception};

require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/Exception.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'utp0007276@alumno.utpuebla.edu.mx';                     
    $mail->Password   = 'cali40213';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
    $mail->Port       = 587;                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('utp0007276@alumno.utpuebla.edu.mx', 'TIENDA EL INGE');
    $mail->addAddress('brunogc1518@gmail.com', 'Joe User');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Detalles de su compra';

    $cuerpo = '<h4>Gracias por su compra</h4>';
    $cuerpo .= '<p>El ID de su compra es: <b>' . $id_transaccion .'</b></p>';


    $mail->Body    = utf8_decode($cuerpo);
    $mail->AltBody = 'Le enviamos los detalles de su compra';

    $mail->setLanguage('es', '../phpmailer/language/phpmailer-lang-es.php');

    $mail->send();
} catch (Exception $e) {
    echo "Error al enviar el correo electronico de la compra : {$mail->ErrorInfo}";
    //exit;
}