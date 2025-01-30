<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Recipe</title>
	<link rel="stylesheet" href="InputRecipe.css">
</head>
<?php include("Script.php");?>
<body>

<div class="wrapper">
   <div class="title">
      Edit Your Recipe
   </div>
    <?php
    include("connection.php");
    if(isset($_GET['recipeID'])){
      $recipeID=$_GET['recipeID'];
      $sql="Select * from recipes where recipeID='$recipeID'";
      $result= mysqli_query($conn,$sql);

      if(mysqli_num_rows($result)> 0)
      {
         foreach($result as $recipe){

      ?>
         
   <form method="post">
      <div class="inputfield">
          <label>Recipe Name</label>
          <input type="text" class="input" value="<?= $recipe['recipeName'];?>" name="recipeName">
       </div>  
        <div class="inputfield">
          <label>Instructions</label>
          <textarea class="textarea" name="instructions"><?= $recipe['instructions'];?></textarea>
         </div>  
       <div class="inputfield">
          <label>rating</label>
          <input type="text" class="input" value="<?= $recipe['rating'];?>" name="rating">
       </div>  
      <div class="inputfield">
          <label>Calories</label>
          <input type="text" class="input" value="<?= $recipe['calories'];?>" name="calories">
       </div> 
        <div class="inputfield">
          <label>Protein</label>
          <input type="text" class="input" value="<?= $recipe['protein'];?>" name="protein">
       </div> 
        <div class="inputfield">
          <label>carbohydrates</label>
          <input type="text" class="input" value="<?= $recipe['carbohydrates'];?>" name="carbohydrates">
       </div> 
      <div class="inputfield">
          <label>Fats</label>
          <input type="text" class="input" value="<?= $recipe['fats'];?>" name="fats">
       </div> 
       <label style="color: #be872c;">Ingredients:</label>
      <div class="inputfield terms">
         <label class="checkbox-label">
           <input type="checkbox" name="ingredients[]" value="7 spices">
           <span class="checkmark"></span>
           7 spices
         </label>
         <label class="checkbox-label">
            <input type="checkbox" name="ingredients[]" value="apple">
            <span class="checkmark"></span>
            apple
        </label>
        <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="apricot">
         <span class="checkmark"></span>
         apricot
     </label>
     <label class="checkbox-label">
      <input type="checkbox" name="ingredients[]" value="baking powder">
      <span class="checkmark"></span>
      baking powder
      </label>

      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="basmati rice">
         <span class="checkmark"></span>
         basmati rice
      </label>

      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="bay leaf">
         <span class="checkmark"></span>
         bay leaf
      </label>

      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="black paper">
         <span class="checkmark"></span>
         black paper
      </label>

      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="blueberry">
         <span class="checkmark"></span>
         blueberry
      </label>

      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="bread">
         <span class="checkmark"></span>
         bread
      </label>

      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="broccoli">
         <span class="checkmark"></span>
         broccoli
      </label>

      <label class="checkbox-label">
           <input type="checkbox" name="ingredients[]" value="cinnamon">
            <span class="checkmark"></span>
            cinnamon
      </label>


      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="butter">
         <span class="checkmark"></span>
         butter
      </label>


      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="cantaloupe">
         <span class="checkmark"></span>
         cantaloupe
      </label>

      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="carrot">
         <span class="checkmark"></span>
         carrot
      </label>

      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="cereal">
         <span class="checkmark"></span>
         cereal
      </label>

      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="cheese">
         <span class="checkmark"></span>
         cheese
      </label>

      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="cherry">
         <span class="checkmark"></span>
         cherry
      </label>

      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="chicken breast">
         <span class="checkmark"></span>
         chicken breast
      </label>

      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="chicken stock">
         <span class="checkmark"></span>
         chicken stock
      </label>

      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="coconut">
         <span class="checkmark"></span>
         coconut
      </label>

      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="coriander">
         <span class="checkmark"></span>
         coriander
      </label>

      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="cottage cheese">
         <span class="checkmark"></span>
         cottage cheese
      </label>


      </div> 
       <div class="inputfield">
        <input type="submit" value="Update Recipe[]" class="btn" name="Done">
      </div>
   </form>

         <?php
         }
      }
      else
      {
         ?>
         <h4>No Record Found</h4>
         <?php
      }
   } 
     ?>

     <?php
       if(isset($_POST['Done'])){
         include('connection.php');
         $recipeName=$_POST['recipeName'];
         $instructions=$_POST['instructions'];
         $rating=$_POST['rating'];
         $calories=$_POST['calories'];
         $protein=$_POST['protein'];
         $carbohydrates=$_POST['carbohydrates'];
         $fats=$_POST['fats'];
         $ingredientList=$_POST['ingredients'];
         $recipeID=$_GET['recipeID'];

         $sql= "UPDATE recipes
         SET recipeName = '$recipeName',
             instructions = '$instructions',
             calories = $calories,
             rating = $rating,
             protein = $protein,
             carbohydrates = $carbohydrates,
             fats = $fats
         WHERE recipeID = '$recipeID'";

         $deleteSql = "DELETE FROM recipe_ingredients WHERE recipeID = ?";
         $deleteStmt = $conn->prepare($deleteSql);
         $deleteStmt->bind_param("i", $recipeID);
         $deleteStmt->execute();
         $deleteStmt->close();
 
         // Insert new ingredients
         $ingredientInsert = $conn->prepare("INSERT INTO recipe_ingredients (recipeID, ingredientName) VALUES (?, ?)");
      
      
      foreach ($ingredientList as $ingredient) {
         $ingredientInsert->bind_param("ss", $recipeID, $ingredient);
          if ($ingredientInsert->execute() === false) {
              echo "Error inserting ingredient: {$conn->error}";
          }
      }
      
      
         
              
 }


         $result=mysqli_query($conn, $sql);
        
       
     ?> 
</div>	
	
</body>
</html>