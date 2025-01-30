<?php
include("connection.php");

// Prepare the SQL statement
$query = "SELECT * FROM recipes WHERE userID = ?";
$stmt = $conn->prepare($query);

// Check if preparation succeeded
if (!$stmt) {
    die('Error preparing statement: ' . $conn->error);
}

// Bind the parameter
$stmt->bind_param("s", $_COOKIE['userID']);

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Your Kitchen</title>
</head>
<body style="background-color: antiquewhite; color:#be872c;">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Your Kitchen</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr style="background-color:#f9f3ea ;">
                                <td>Recipe ID</td>
                                <td>Recipe Name</td>
                                <td>Instructions</td>
                                <td>Ingredients</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            <?php
                            while($row = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?php echo $row['recipeID']; ?></td>
                                    <td><?php echo $row['recipeName']; ?></td>
                                    <td><?php echo $row['instructions']; ?></td>
                                    <td>
                                 <?php
                                    $recipeID = $row['recipeID'];
                                    // Corrected SQL query with proper syntax
                                    $ingredientSql = "SELECT ingredientName FROM recipe_ingredients WHERE recipeID = ?";
                                    $stmt = $conn->prepare($ingredientSql);
                                    $stmt->bind_param("i", $recipeID);  // Assuming recipeID is an integer
                                    $stmt->execute();
                                    $ingredientResult = $stmt->get_result();

                                    $ingredients = [];
                                    while ($ingredientRow = $ingredientResult->fetch_assoc()) {
                                    $ingredients[] = htmlspecialchars($ingredientRow['ingredientName']);
                                    }
                                        echo implode(", ", $ingredients);  // Display all ingredients as a comma-separated list
                                        $stmt->close();
                                    ?>
                                    </td>
                                    <td><a href="EditRecipe.php?recipeID=<?php echo $row['recipeID']; ?>" class="btn btn-primary">Edit</a></td>
                                    <td><a href="DeleteRecipe.php?recipeID=<?php echo $row['recipeID']; ?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
