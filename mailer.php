<?php
require "C:/xampp/htdocs/Remixology Kitchen/vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);


    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->Username = "Remixologykitchen@gmail.com";
    $mail->Password = "tpca stmk hmrd tsfc";

    $mail->isHTML(true);
    return $mail;