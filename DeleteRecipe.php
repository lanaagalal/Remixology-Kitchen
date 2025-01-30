

<?php
    include("connection.php");
    if(isset($_GET['recipeID'])){
      $recipeID=$_GET['recipeID'];
      $sql="DELETE FROM recipes WHERE recipeID = '$recipeID'";
      $result= mysqli_query($conn,$sql);
      if($result== true)
      {
        echo "Deleted";
      }
    }

?>