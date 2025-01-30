<?php
$servername="Localhost";
$username="root";
$password="";
$db="recipes";
$conn=new mysqli($servername,$username,$password,$db);
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
if(isset($_POST['recipeName'])&&isset($_POST['calories'])&&isset($_POST['protein'])&&isset($_POST['carbohydrates'])&&isset($_POST['fats'])){
    $sql="Insert into recipes (recipeID,recipeName,instructions,calories,carbohydrates,protein,fats,rating)"
    ." values('".$_POST['recipeID']."','".$_POST['recipeName']."','".$_POST['instructions']."','".$_POST['calories']."','".$_POST['carbohydrates']."','".$_POST['protein']."','".$_POST['fats']."','".$_POST['rating']."')";

if(mysqli_query($conn,$sql)){
    echo"Record added successfully";
}
else{
    echo"Error adding record: ".$conn->error;
}
}
else{
    echo"Please write first name or last name";
}