<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "RemixologyKitchen";

    $mysqli= new mysqli(hostname:$host, 
        username:$username, 
        password:$password, 
        database:$dbname);

    if ($mysqli->connect_error) {
        die("Connection error: ". $mysqli->connect_error);
    }
    else
    return $mysqli;