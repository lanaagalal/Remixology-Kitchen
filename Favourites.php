<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User's Favorite Recipes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>

    .error-msg {
    color: #ff0000; /* Red color for errors */
    background-color: #ffecec; /* Light red background */
    border: 1px solid #d60000; /* Darker red border */
    padding: 10px;
    border-radius: 5px;
    margin: 5px 590px;
    text-align: center;
    
    display: inline-block;
    }

.success-msg {
    color: #008000; /* Green color for success */
    background-color: #ecffec; /* Light green background */
    border: 1px solid #006400; /* Dark green border */
    padding: 10px;
    border-radius: 5px;
    margin: 10px 0;
    margin: 5px 590px;
    text-align: center;
    
    display: inline-block;
}

        body {
            color: #be872c;
            background-color: #f9f3ea;
            font-family: 'Arial', sans-serif;
        }
        .card-custom {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: 0.3s;
        }
        .card-custom:hover {
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .card-header-custom {
            background-color: #f4e6d2;
            color:  #be872c;
        }
        .btn-custom {
            background-color: #f4e6d2;
            color:  #be872c;
            border: none;
        }
        .btn-custom:hover {
            background-color: #d5aa9d;
        }
        .details {
            background-color:#f9f3ea;
            padding: 10px;
            border-radius: 15px;
            display: none; /* Hidden by default */
        }
        .header-link {
            text-decoration: none;
            color: #be872c;
        }
        .header-link:hover {
            color: #be872c;
        }
    </style>
</head>
<body>
    <?php
    include('connection.php');
    $userID = isset($_COOKIE['userID']) ? $_COOKIE['userID'] : '';
    $favRecipesQuery = "SELECT r.recipeID, r.recipeName, r.Instructions, r.calories, r.fats, r.carbohydrates, r.protein 
                        FROM recipes r 
                        INNER JOIN clients_favrecipies cf ON r.recipeID = cf.recipeID 
                        WHERE cf.userID = '$userID'";
    $favRecipesResult = mysqli_query($conn, $favRecipesQuery);
    ?>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-custom">
                    <div class="card-header card-header-custom text-center">
                        <h3>Your Favourite recipes</h3>
                    </div>
                    <div class="card-body">
                        <?php if (mysqli_num_rows($favRecipesResult) > 0): ?>
                            <?php while ($row = mysqli_fetch_assoc($favRecipesResult)): ?>
                                <div class="mb-4">
                                    <h5>Recipe Name:<?=" ".htmlspecialchars($row['recipeName']) ?></h5>
                                    <button type="button" class="btn btn-custom" onclick="toggleDetails('details<?= $row['recipeID'] ?>')">View Details</button>
                                    <div id="details<?= $row['recipeID'] ?>" class="details">
                                        <p><strong>Instructions:</strong> <?= nl2br(htmlspecialchars($row['Instructions'])) ?></p>
                                        <p><strong>Protein:</strong> <?= htmlspecialchars($row['protein']) ?> grams</p>
                                        <p><strong>Calories:</strong> <?= htmlspecialchars($row['calories']) ?> kcal</p>
                                        <p><strong>Carbohydrates:</strong> <?= htmlspecialchars($row['carbohydrates']) ?> grams</p>
                                        <p><strong>Fats:</strong> <?= htmlspecialchars($row['fats']) ?> grams</p>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <p class="text-center">No Recipes found</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleDetails(id) {
            var element = document.getElementById(id);
            element.style.display = (element.style.display === 'none' || !element.style.display) ? 'block' : 'none';
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
