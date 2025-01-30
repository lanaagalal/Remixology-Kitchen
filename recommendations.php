<?php
include("connection.php");

// Check if sort was requested and is valid, then prepare SQL query accordingly
$sort = $_GET['sort'] ?? '';
$validSorts = ['calories', 'fats', 'protein', 'carbohydrates'];
if (in_array($sort, $validSorts)) {
    $sql = "SELECT r.recipeID, r.recipeName, r.calories, r.protein, r.fats, r.carbohydrates, r.instructions, GROUP_CONCAT(ri.ingredientName SEPARATOR ', ') AS ingredients
            FROM recipes r
            JOIN recipe_ingredients ri ON r.recipeID = ri.recipeID
            GROUP BY r.RecipeID, r.recipeName, r.Calories, r.Protein, r.Fats, r.carbohydrates, r.instructions
            ORDER BY r.$sort DESC";
} else {
    $sql = "SELECT r.recipeID, r.recipeName, r.calories, r.protein, r.fats, r.carbohydrates, r.instructions, GROUP_CONCAT(ri.ingredientName SEPARATOR ', ') AS ingredients
            FROM recipes r
            JOIN recipe_ingredients ri ON r.recipeID = ri.recipeID
            GROUP BY r.recipeID, r.recipeName, r.calories, r.protein, r.fats, r.carbohydrates, r.instructions";
}

$result = $conn->query($sql);
if (!$result) {
    echo "Error in query execution: " . $conn->error;
    exit;
}

if ($result->num_rows == 0) {
    echo "No results found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recipe Recommendations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f3ea;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .content {
            width: 80%;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f4e6d2;
            color: #be872c;
        }
        tr:nth-child(even) { background-color: #f9f3ea; }
        tr:hover { background-color: #f4e6d2; }
        form { margin-top: 20px; }
        button, .toggleButton {
            padding: 8px 16px;
            background-color: #f4e6d2;
            color: #be872c;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        button:hover, .toggleButton:hover { background-color: #f4e6d2; }
        .hidden { display: none; }
    </style>
    <script>
        function toggleDetails(id) {
            var element = document.getElementById("details" + id);
            element.style.display = element.style.display === "none" ? "block" : "none";
        }
    </script>
</head>
<body>
    <div class="content">
        <h1>Recipe Recommendations</h1>
        <table>
            <tr>
                <th>Instructions</th>
                <th>Recipe ID</th>
                <th>Name</th>
                <th>Calories</th>
                <th>Protein</th>
                <th>Fats</th>
                <th>Carbohydrates</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><button class='toggleButton' onclick='toggleDetails("<?= htmlspecialchars($row['recipeID']) ?>")'>view more</button></td>
                    <td><?= htmlspecialchars($row['recipeID']) ?></td>
                    <td><?= htmlspecialchars($row['recipeName']) ?></td>
                    <td><?= htmlspecialchars($row['calories']) ?></td>
                    <td><?= htmlspecialchars($row['protein']) ?></td>
                    <td><?= htmlspecialchars($row['fats']) ?></td>
                    <td><?= htmlspecialchars($row['carbohydrates']) ?></td>
                </tr>
                <tr id='details<?= htmlspecialchars($row['recipeID']) ?>' class='hidden'>
                    <td colspan='7'>
                        <strong>Ingredients:</strong> <?= htmlspecialchars($row['ingredients']) ?><br>
                        <strong>Instructions:</strong> <?= nl2br(htmlspecialchars($row['instructions'])) ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
        <form action="" method="get">
            <button name="sort" value="calories">Sort by Calories</button>
            <button name="sort" value="fats">Sort by Fats</button>
            <button name="sort" value="protein">Sort by Protein</button>
            <button name="sort" value="carbohydrates">Sort by Carbohydrates</button>
        </form>
    </div>
</body>
</html>