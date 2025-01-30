<?php
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

require "C:/xampp/htdocs/Remixology Kitchen/vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->Username = "Remixologykitchen@gmail.com";
    $mail->Password = "tpca stmk hmrd tsfc";

    // Sender and recipient settings
    $mail->setFrom($email, $name);
    $mail->addAddress("Remixologykitchen@gmail.com", "Remixologykitchen");
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Send email
    $mail->send();
    echo "Email sent";
} catch (Exception $e) {
    echo "Error sending email: {$mail->ErrorInfo}";
}
?>
