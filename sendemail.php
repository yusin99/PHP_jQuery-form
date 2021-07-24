<?php
error_reporting(E_ALL ^ E_DEPRECATED);
use PHPMailer\PHPMailer\PHPMailer;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function send_mail($to, $subject, $body)
{
    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    $username = "promodevweb@gmail.com"; 
    $password = 'awxohmumqfjulbsv';

    $mail->IsSMTP();
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true,
        ),
    );
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->Username = $username;
    $mail->Password = $password;

    $mail->SetFrom($username, $username);
    $mail->AddReplyTo($username, $username);
    $mail->Subject = $subject;
    $mail->MsgHTML($body);
    $address = $to;
    $mail->AddAddress($address, $username);

    return $mail->Send();
}