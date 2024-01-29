<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
    $mail->isSMTP(); // gửi mail SMTP
    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'ntbinh14122004@gmail.com'; // SMTP username
    $mail->Password = 'itht atsz wtyj fhlf'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 587; // TCP port to connect to
    //Recipients
    $mail->setFrom('ntbinh14122004@gmail.com', 'Mailer');
    $mail->addAddress('ntbinh14122004@gmail.com', 'Joe User'); // Add a recipient
    // $mail->addAddress('ellen@example.com'); // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    //  $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
    // Attachments
    //  $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
    //   $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
    // Content
    $mail->isHTML(true);   // Set email format to HTML
    $mail->Subject = 'Chu de email';

    $mail->Body = '
    <table border = "1">
    <tr>
    <td>Stt</td>
    <td>Name</td>
    <td>Price</td>
    <td>SoLuong</td>
    <td>Gia</td>
    </tr>
    bbcbd
    </table>
    
    ';


    $mail->AltBody = '';
    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
