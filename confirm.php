<?php
include('connection.php');
$email=$_GET['mail'];
$sqlupdate="update users set confirm=1 where email='$email'";
$result=mysqli_query($conn,$sqlupdate);
header('location:login.php');