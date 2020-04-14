<?php
$your_email = "naumanahmed19@gmail.com";

use PHPMailer\PHPMailer\PHPMailer;
require('phpMailer/PHPMailer.php');
require('phpMailer/SMTP.php');
$mail = new PHPMailer();

var_dump($_POST);

if (!empty($_POST)) {


    // For Using SMTP uncomment following and add your Server settings

    //   $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    //   $mail->isSMTP();                                      // Set mailer to use SMTP
    //   $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
    //   $mail->SMTPAuth = true;                               // Enable SMTP authentication
    //   $mail->Username = 'user@example.com';                 // SMTP username
    //   $mail->Password = 'secret';                           // SMTP password
    //   $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    //   $mail->Port = 587;


    //Recipients
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress($your_email);

    //Content
    $mail->isHTML(true);        // Set email format to HTML

    $mail->Subject = !empty($_POST['subject']) ? $_POST['subject'] : 'Message From Contact Form';

    $mail->Body  = !empty($_POST['name']) ? 'Name: '.$_POST['name'] .'<br>' : '';
    $mail->Body .= !empty($_POST['subject']) ? 'Subject: '.$_POST['subject'] .'<br>' : '';
    $mail->Body .= !empty($_POST['company']) ? 'Company: '.$_POST['company'] .'<br>' : '';
    $mail->Body .= !empty($_POST['phone']) ? 'Phone: '.$_POST['phone'] .'<br>' : '';
    $mail->Body .= 'Message:<br>';
    $mail->Body .= $_POST['message'];

    if (!$mail->Send()) {
        echo "Error sending: " . $mail->ErrorInfo;;
    } else {
        echo 'Message has been sent';
    }
}

