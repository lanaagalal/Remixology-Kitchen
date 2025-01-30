<?php
include('connection.php');

setcookie("firstname", '', time() - (100000) , '/');
setcookie("email", '',  time() - (100000) , '/');
setcookie("password", '',  time() - (100000) , '/');
header('location:Index.php');
?>