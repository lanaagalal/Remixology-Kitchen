<?php
$servername="Localhost";
$username="root";
$password="";
$db="ingredients";
$conn=new mysqli($servername,$username,$password,$db);
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
if(isset($_POST['name'])){
    $sql="Insert into ingredients (name)"
    ." values('".$_POST['name']."')";
    if(mysqli_query($conn,$sql)){
      echo"Record added successfully";
}else{
    echo"Error adding record: ".$conn->error;
}
}
else{
    echo"Please write first name or last name";
    
}