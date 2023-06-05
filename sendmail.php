<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

function send_mail($email){
    $ramdom=rand(0, 999999);
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 0;// Enable verbose debug output
        $mail->isSMTP();// g?i mail SMTP
        $mail->Host = 'svr1.amzgroup.vn';// Set the SMTP server to send through
        $mail->SMTPAuth = true;// Enable SMTP authentication
        $mail->Username = 'no-reply@amzgroup.vn';// SMTP username
        $mail->Password = 'no-reply@123#'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port = 465; // TCP port to connect to
        $mail->setFrom('no-reply@amzgroup.vn', 'AMZ Group Server ' . $ramdom . '');
        $mail->addAddress($email, $email); // Add a recipient
        $mail->isHTML(true);   // Set email format to HTML
        $mail->Subject = 'AMZ Group Server ' . $ramdom . ' - Login Code';
        $mail->Body = 'Hi <b>' . $email . '</b>. This is the Login code for you: <b>' . md5(session_id()).'</b>';
        $mail->AltBody = 'AMZ Group Login Code';
        $mail->send();
    } catch (Exception $e) {
    }
}
