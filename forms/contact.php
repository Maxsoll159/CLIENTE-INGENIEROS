<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/vendor/PHPMailer-6.8.0/src/Exception.php';
require '../assets/vendor/PHPMailer-6.8.0/src/PHPMailer.php';
require '../assets/vendor/PHPMailer-6.8.0/src/SMTP.php';

$mail = new PHPMailer(true);

try {        
    $mail->isSMTP();                                        
    $mail->Host       = 'mail.warairaingenieros.com';        
    $mail->SMTPAuth   = true;                                
    $mail->Username   = 'prueba@warairaingenieros.com';      
    $mail->Password   = 'prueba123456789';                  
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         
    $mail->Port       = 465;       

    //Recipients
    $mail->setFrom('prueba@warairaingenieros.com');
    $mail->addAddress('prueba@warairaingenieros.com');

    $body = !empty($_POST['message']) ? $_POST['message'] : '';

    //Content
    $mail->isHTML(true);
    $mail->Subject = !empty($_POST['subject']) ? $_POST['subject'] : '';
    $mail->Body    = $body;

    $mail->send();

    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
