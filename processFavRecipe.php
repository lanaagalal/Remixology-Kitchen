<?php
    include('connection.php');
    if(isset($_GET['recipeID'])) {
        $recipeID = $_GET['recipeID'];
        $userID = isset($_COOKIE['userID']) ? $_COOKIE['userID'] : '';
        $sql = "SELECT * from clients_favrecipies WHERE recipeID='$recipeID' and userID='$userID';";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            echo '<p class="error-msg">This recipe is already added to the favourites</p>';
        } else {
            $sql = "INSERT INTO clients_favrecipies (recipeID, userID) VALUES ('$recipeID', '$userID');";
            if(mysqli_query($conn, $sql)){
                echo '<p class="success-msg">Record added successfully</p>';
            }
        }
        include('Favourites.php');
    }
    ?>