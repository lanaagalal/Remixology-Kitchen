<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recipes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4e6d2; /* Updated background color */
            color: #be872c; /* Updated text color */
            padding: 20px;
            line-height: 1.6;
        }
        h2 {
            color: #4CAF50;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
        }
        .recipe-item {
            background-color: #ffffff;
            border: 1px solid #ddd;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-top: 10px;
            position: relative;
        }
        .recipe-details {
            display: none;
            padding-top: 10px;
        }
        .no-results {
            font-style: italic;
            color: #999;
        }
        button.view-more, .btn.btn-info {
            background-color: #4CAF50; /* Green background for buttons */
            color: white; /* White text for buttons */
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        button.view-more {
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .favorite-btn {
            cursor: pointer;
            font-size: 1.5em;
            color: grey; /* Default color for favorite button */
        }
        .favorite-btn.active {
            color: red; /* Color when the icon is active */
        }
    </style>
</head>
<body>
    <?php
    if (isset($_POST['submitButton'])) {
        include("connection.php");
        $selectedIngredients = $_POST['selected'];
        $placeholders = implode(',', array_fill(0, count($selectedIngredients), '?'));
        $query = "SELECT r.recipeID, r.recipeName, r.instructions, r.calories, r.protein, r.carbohydrates, r.fats 
                  FROM recipes r
                  JOIN recipe_ingredients ri ON r.recipeID = ri.recipeID
                  WHERE ri.ingredientName IN ($placeholders)
                  GROUP BY r.recipeID";
        $stmt = mysqli_prepare($conn, $query);
        if (!$stmt) {
            die("MySQL prepare error: " . mysqli_error($conn));
        }
        $types = str_repeat('s', count($selectedIngredients));
        mysqli_stmt_bind_param($stmt, $types, ...$selectedIngredients);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($result === false) {
            die("Query failed: " . mysqli_error($conn));
        }
        if (mysqli_num_rows($result) > 0) {
            echo "<h2>Recipes containing selected ingredients:</h2>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='recipe-item'>";
                echo "<p><strong>" . htmlspecialchars($row['recipeName']) . "</strong></p>";
                echo "<button onclick='toggleDetails(this)' class='view-more'>View More</button>";
                echo "<div class='recipe-details'>";
                echo "<p>Instructions: " . nl2br(htmlspecialchars($row['instructions'])) . "</p>";
                echo "<p>Calories: " . htmlspecialchars($row['calories']) . "</p>";
                echo "<p>Protein: " . htmlspecialchars($row['protein']) . "g</p>";
                echo "<p>Carbs: " . htmlspecialchars($row['carbohydrates']) . "g</p>";
                echo "<p>Fats: " . htmlspecialchars($row['fats']) . "g</p>";
                echo "<a href='processFavRecipe.php?recipeID=" . $row['recipeID'] . "'><button id='favoriteButton' class='btn btn-custom favorite-btn' type='button' onclick='toggleFavorite(this)'>♥</button></a>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p class='no-results'>No recipes found with the selected ingredients.</p>";
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    ?>
    <script>
        function toggleDetails(button) {
            var detailsDiv = button.nextElementSibling;
            detailsDiv.style.display = detailsDiv.style.display === 'block' ? 'none' : 'block';
        }
    </script>
</body>
</html>
