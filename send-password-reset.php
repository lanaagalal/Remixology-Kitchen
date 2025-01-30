<?php

$email = $_POST["email"];

$token = bin2hex(random_bytes(16));

$token_hash = hash("sha256", $token);

$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

$mysqli = require __DIR__ . "/database.php";

$sql = "UPDATE users
        SET reset_token_hash = ?,
        reset_token_expires_at = ?
        WHERE email = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("sss", $token_hash, $expiry, $email);

$stmt->execute();

if($mysqli->affected_rows)
{
        $mail=require __DIR__ ."/mailer.php";
        $mail->setFrom("RemixologyKitchen@gmail.com");
        $mail->addAddress($email);
        $mail->Subject = "Password Reset";

        $mail->Body = <<<END

        click <a href="http://localhost/Remixology%20Kitchen/reset-password.php?token=$token">HERE</a>

        END;
        try{
                $mail->send();
        }catch(Exception $e){
                echo"Message could not be sent. Mailer error: {$mail->ErrorInfo}";
        }
}
echo '<p style="color:#be872c; font-size:medium; text-align:center;">Message Sent, please check your inbox<p>';
include("forget-password.php");