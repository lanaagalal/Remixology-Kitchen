<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style4.css">
    <title>Forget Password</title>
</head>
<body style="background-image: linear-gradient(rgba(249, 243, 234,0.9),rgba(244, 230, 210,0.9),rgba(213, 170, 157,0.9)),url(LOGINBACK.jpg);">
    <div>
        
        <div class="login-container" id="login" style=" margin-top:5%; margin-left: 33%;">
            <h1 style="color: #be872c; margin-top: 10%; margin-left:20%; margin-bottom:10%;">
                Forget Password</h1>
            <form action="send-password-reset.php" method="POST">
                <div class="input-box" style="box-shadow: rgba(0,0,0,0.3);">
                    <input type="email" class="input-field" placeholder="Email" name="email">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class="submit" value="Send" name="login">
                </div>
                <div class="two">
                    <label style="margin-left:6%; margin-top:10%"><a href="login.php">Back to login</a></label>
                </div>
            </form>

        </div>
    </div>
    
</body>