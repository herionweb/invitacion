<?php

require ("./PHPMailer/SMTP.php");
require ("./PHPMailer/PHPMailer.php");
require ("./PHPMailer/Exception.php");



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$guestNumber = $_POST['guest-number'];
$names = $_POST['name-and-lastName'];
$message = $_POST['message'];
$respect = $_POST['name'];

if (!empty($respect)) {
    header('Location: https://bodarobertoycrista.com');
    return false;
}

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();      
    $mail->Host       = 'smtp.gmail.com';             
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'bodarobertoycrista@gmail.com';                  
    $mail->Password   = 'cgxrxdlehnjtoqfx';                              
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
    $mail->Port       = 465;                                   
    

    $mail->setFrom('boda@bodarobertoycrista.com'); 
    $mail->addAddress('boda@bodarobertoycrista.com');     
    $mail->addReplyTo('boda@bodarobertoycrista.com', 'Boda Roberto y Crista'); 
    
    $mail->isHTML(true);                                  
    $mail->CharSet = 'UTF-8';
    $mail->Subject = $names;
    $mail->Body    = "<div style='background-color:#d5d4c8; padding:20px;'><p><i>Número de Invitados:</i> <b>{$guestNumber}</b></p><p><b>{$names}</b></p>
    <p>{$message}</p></div>";
    $mail->AltBody = 'Tu email no admite código HTML';

    $mail->send();
    header('Location: https://bodarobertoycrista.com/gracias.html');
} catch (Exception $e) {
    echo "Intentalo de nuevo porfavor";
}
?>