<!DOCTYPE html>
<html>
    <head>
        <title>Create Database</title>
    </head>
    <body>
        <?php
        $servername="Localhost";
        $username= "root";
        $password= "";
        $conn=new mysqli($servername, $username, $password);
        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }
        $sql = "create database RemixologyKitchen";
        if($conn->query( $sql) === TRUE) {
            echo "Database is created succsesfully";
        }
        else {
            echo "Error the table does not been created";
        }
        $close=$conn->close();
        ?>
    </body>
</html>
