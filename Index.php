<style>
    <?php include("msg.css");?>
</style>
<?php

include("Script.php");
if(isset($_POST['Register'])&&isset($_POST['email'])&&isset($_POST['password'])) {
    include('connection.php');
    if($conn->connect_error) {
        die("connection failed: ".$conn->connect_error);
    }

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password.'RemixologyKitchen'); // Encrypt the password
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    
    if (strlen($_POST["password"]) < 8) {
        echo"<p class='error-msg'>Your password must be at least 8 character</p>";
}
    
    else if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
        echo"<p class='error-msg'>Password must contain at least one letter</p>";

    }
    
    else if ( ! preg_match("/[0-9]/", $_POST["password"])) {
        echo"<p class='error-msg'>Password must contain at least one number</p>";
    }
    else{
        $sql = "INSERT INTO users (firstname, lastname, email, pass, Birthdate, gender)
                  VALUES ('$firstname', '$lastname', '$email', '$password', '$birthdate', '$gender')";
    if(mysqli_query($conn, $sql)) {
        $_SESSION['status']='Your Registration Confirmed';
        $_SESSION['status_code']="success";
        header('location: #login');
        echo '<p class="success-msg"><b>Your Registration Confirmed</b></p>';
        $msg='Congratulations Please confirm your account from this link <br> 
        <a href="confirm.php?mail=$ema il> Confirm your account</a>';
        $msg=wordwrap($msg,70);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    }
    
}
?>

<?php
if(isset($_POST['login'])) {
    include('connection.php');
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password.'RemixologyKitchen');
    $remember = isset($_POST['remember']) ? true : false;
    
    $sql = "SELECT * FROM users WHERE email = '$email' AND pass = '$password'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) == 0) {
        echo "Wrong email or password";
    } else {
        $row = mysqli_fetch_assoc($result);
        $firstname = $row['firstname'];
        $userID = $row['userID'];
        
        // Set cookies
        setcookie("firstname", $firstname, ($remember ? time() + (100000000) : time() + (100000)), '/');
        setcookie("email", $email, ($remember ? time() + (100000000) : time() + (100000)), '/');
        setcookie("password", $password, ($remember ? time() + (100000000) : time() + (100000)), '/');
        setcookie("userID", $userID, ($remember ? time() + (100000000) : time() + (100000)), '/');

        header('location:HomePage.php');
        exit(); // Add exit after header redirect to prevent further execution of the script
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style4.css">
    <title>Remixology | Login & Registration</title>
</head>
<body>
 <div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <p><img src="Orange Simple Food Logo (4).png" /></p>
        </div>
        <div class="nav-button">
            <button class="btn white-btn" id="loginBtn" onclick="login()">Sign In</button>
            <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>
  
    <div class="form-box">

        <div class="login-container" id="login">
            <div class="top">
                <span>Don't have an account? <a href="#" onclick="register()">Sign Up</a></span>
                <header>Login</header>
            </div>
            <form action="" method="POST">
                <div class="input-box">
                    <input type="email" class="input-field" placeholder="Email" name="email">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Password" name="password">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class="submit" value="Sign In" name="login">
                </div>
            </form>
            <div class="two-col">
                <div class="one">
                    <input type="checkbox" id="login-check" name="remember">
                    <label for="login-check"> Remember Me</label>
                </div>
                <div class="two">
                    <label><a href="forget-password.php">Forgot password?</a></label>
                </div>
            </div>
        </div>

        <div class="register-container" id="register">
            <div class="top">
                <span>Have an account? <a href="#" onclick="login()">Login</a></span>
                <header>Sign Up</header>
            </div>
            <form method="POST">
                <div class="two-forms">
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Firstname" name="firstname">
                        <i class="bx bx-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Lastname" name="lastname">
                        <i class="bx bx-user"></i>
                    </div>
                </div>
                <div class="input-box">
                    <input type="email" class="input-field" placeholder="Email" name="email">
                    <i class="bx bx-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Password" name="password">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="date" class="input-field" name="birthdate">
                    <i class='bx bx-cake' ></i>
                </div> 
                <div class="input-box">
                    <input type="radio" class="input-field" name="gender" value="Male" style="height: auto; width:auto;"><label style="color: #be872c; font-size:large; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; ">Male</label><br/>
                    <input type="radio" class="input-field" name="gender" value="Female" style="height: auto; width:auto;"><label style="color: #be872c; font-size:large; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Female</label>
                </div>
               
                <div class="input-box">
                    <input type="submit" class="submit" value="Register" name="Register">
                </div>
            </form>
            <div class="two-col">
                <div class="two">
                    <label><a href="#">Terms & conditions</a></label>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
   
   function myMenuFunction() {
    var i = document.getElementById("navMenu");

    if(i.className === "nav-menu") {
        i.className += " responsive";
    } else {
        i.className = "nav-menu";
    }
   }
 
</script>

<script>

    var a = document.getElementById("loginBtn");
    var b = document.getElementById("registerBtn");
    var x = document.getElementById("login");
    var y = document.getElementById("register");

    function login() {
        x.style.left = "4px";
        y.style.right = "-520px";
        a.className += " white-btn";
        b.className = "btn";
        x.style.opacity = 1;
        y.style.opacity = 0;
    }

    function register() {
        x.style.left = "-510px";
        y.style.right = "5px";
        a.className = "btn";
        b.className += " white-btn";
        x.style.opacity = 0;
        y.style.opacity = 1;
    }

</script>

</body>
</html>
