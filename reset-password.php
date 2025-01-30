<?php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM users
        WHERE reset_token_hash = ?";


$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    die("Token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("Token has expired");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title style="color:#be872c;font-size:medium;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Reset Password</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body style="background:rgb(244, 230, 210,0.9);">

    <h1>Reset Password</h1>

    <form method="post" action="process-reset-password.php" style="shadow-box:rgba(0,0,0,0.2);">

        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>" style="color:#be872c; ">

        <label for="password" style="color:#be872c; font-size:medium; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">New password</label>
        <input type="password" id="password" name="password">

        <label for="password_confirmation" style="color:#be872c; font-size:medium; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Repeat password</label>
        <input type="password" id="password_confirmation"
               name="password_confirmation">

        <button style="background-color: #f4e6d2; border-style: solid; border-color:#be872c; color:#be872c;">Send</button>
    </form>

</body>
</html>


