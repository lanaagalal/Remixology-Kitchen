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
      $ingredientList = isset($_POST['ingredients']) ? $_POST['ingredients'] : array();
      

      $userID=$_COOKIE['userID'];
      $recipeInsert = $conn->prepare("INSERT INTO recipes (recipeName, instructions, calories, rating, protein, carbohydrates, fats, userID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
      $recipeInsert->bind_param("ssssssss", $recipeName, $instructions, $calories, $rating, $protein, $carbohydrates, $fats, $userID);
      $recipeInsert->execute();

      $recipeID = $conn->insert_id;
      
      $ingredientInsert = $conn->prepare("INSERT INTO recipe_ingredients (recipeID, ingredientName) VALUES (?, ?)");
      
      
      foreach ($ingredientList as $ingredient) {
         $ingredientInsert->bind_param("ss", $recipeID, $ingredient);
          if ($ingredientInsert->execute() === false) {
              echo "Error inserting ingredient: {$conn->error}";
          }
      }
      
      $ingredientInsert->close();
      $recipeInsert->close();
      }
   
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Form</title>
	<link rel="stylesheet" href="InputRecipe.css">
</head>
<body>

<div class="wrapper">
    <div class="title">
      Your Recipe
    </div>
    <form action="" method="post">
       <div class="inputfield">
          <label>Recipe Name</label>
          <input type="text" class="input" name="recipeName">
       </div>  
        <div class="inputfield">
          <label>Instructions</label>
          <textarea class="textarea" name="instructions"></textarea>
       </div>  
       <div class="inputfield">
          <label>rating</label>
          <input type="text" class="input" name="rating">
       </div>  
      <div class="inputfield">
          <label>Calories</label>
          <input type="text" class="input" name="calories">
       </div> 
        <div class="inputfield">
          <label>Protein</label>
          <input type="text" class="input" name="protein">
       </div> 
        <div class="inputfield">
          <label>carbohydrates</label>
          <input type="text" class="input" name="carbohydrates">
       </div> 
      <div class="inputfield">
          <label>Fats</label>
          <input type="text" class="input" name="fats">
       </div> 
       <label style="color: #be872c;">ingredients</label>
      <div class="inputfield terms">
         <label class="checkbox-label">
           <input type="checkbox" name="ingredients[]" value="7 spices">
           <span class="checkmark"></span>
           7 spices
         </label>
         <label class="checkbox-label">
           <input type="checkbox" name="ingredients[]" value="Eggs">
           <span class="checkmark"></span>
           Eggs
         </label>
         <label class="checkbox-label">
            <input type="checkbox" name="ingredients[]" value="apple">
            <span class="checkmark"></span>
            apple
        </label>
        <label class="checkbox-label">
            <input type="checkbox" name="ingredients[]" value="banana">
            <span class="checkmark"></span>
            Banana
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
         <input type="checkbox" name="ingredients[]" value="grapes">
         <span class="checkmark"></span>
         grapes
      </label>

      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="kiwi">
         <span class="checkmark"></span>
         kiwi
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
         <input type="checkbox" name="ingredients[]" value="biscut">
         <span class="checkmark"></span>
         biscut
      </label>
      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="honey">
         <span class="checkmark"></span>
         honey
      </label>

      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="garlic">
         <span class="checkmark"></span>
         garlic
      </label>

      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="broccoli">
         <span class="checkmark"></span>
         broccoli
      </label>

      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="bread">
         <span class="checkmark"></span>
         bread
      </label>


      <label class="checkbox-label">
           <input type="checkbox" name="ingredients[]" value="cinnamon">
            <span class="checkmark"></span>
            cinnamon
      </label>

      <label class="checkbox-label">
           <input type="checkbox" name="ingredients[]" value="tomato">
            <span class="checkmark"></span>
            tomato
      </label>
      <label class="checkbox-label">
           <input type="checkbox" name="ingredients[]" value="cucumber">
            <span class="checkmark"></span>
            cucumber
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

      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="orange">
         <span class="checkmark"></span>
         orange
      </label>
      
      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="onion">
         <span class="checkmark"></span>
         onion
      </label>

      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="ginger">
         <span class="checkmark"></span>
         ginger
      </label>

      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="vinegar">
         <span class="checkmark"></span>
         vinegar
      </label>

      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="pepper">
         <span class="checkmark"></span>
         pepper
      </label>

      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="curry">
         <span class="checkmark"></span>
         curry
      </label>

      <label class="checkbox-label">
         <input type="checkbox" name="ingredients[]" value="salmon">
         <span class="checkmark"></span>
         salmon
      </label>
      </div> 
       <div class="inputfield">
        <input type="submit" value="DONE" class="btn" name="Done">
      </div>
    </form>
</div>	
	
</body>
</html>