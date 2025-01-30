<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funda of Web IT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <style>
        
        .hidden {
            display: none;
        }
        #details {
            background-color: #f4e6d2;
            color: #be872c;
        }
        .favorite-btn {
    cursor: pointer;
    font-size: 1.5em;
    color: grey; /* Default color */
}
.favorite-btn.active {
    color: red; /* Color when the icon is active */
}

    </style>
</head>
<body style="color:#be872c; background-color:#f4e6d2;">
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h4>search for your favourite recipe</h4>
                    </div>
                    <div class="card-body">

                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" name="recipeName" value="<?php if(isset($_GET['recipeName'])){echo $_GET['recipeName'];} ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary" style="color: #be872c; background-color:#f4e6d2; border-radius:  10%; border-color:#be872c;">Search</button>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","remixologyKitchen");
                                    if(isset($_GET['recipeName']))
                                    {
                                        $recipeName = $_GET['recipeName'];

                                        $query = "SELECT * FROM recipes WHERE recipeName LIKE ?";
                                        if ($stmt = mysqli_prepare($con, $query)) {
                                            mysqli_stmt_bind_param($stmt, "s", $recipeName);
                                            mysqli_stmt_execute($stmt);
                                            $result = mysqli_stmt_get_result($stmt);
                                            
                                            $count = mysqli_num_rows($result);

                                            echo "<p>$count recipe(s) found for '$recipeName'.</p>";

                                            if ($count > 0) {
                                                foreach($result as $index => $row) {
                                                    $detailsId = "details" . $index; // Unique ID for each detail section
                                                    ?>
                                                    <div class="form-group mb-3">
                                                        
                                                        <label for="">Recipe Name:</label>
                                                        <input type="text" value="<?= htmlspecialchars($row['recipeName']); ?>" class="form-control" readonly>
                                                        <a href="processFavRecipe.php?recipeID=<?php echo $row['recipeID']; ?>"><button id="favoriteButton" class="btn btn-custom favorite-btn" type="button" onclick="toggleFavorite(this)">♥</button></a>                                                        <button type="button" class="btn btn-info mt-2" onclick="toggleDetails('<?= $detailsId; ?>')">View Details</button>
                                                        <div id="<?= $detailsId; ?>" class="hidden">
                                                            <p>Instructions: <?= htmlspecialchars($row['instructions']); ?></p>
                                                            <p>Protein: <?= $row['protein']; ?></p>
                                                            <p>Carbohydrates: <?= $row['carbohydrates']; ?></p>
                                                            <p>Fats: <?= $row['fats']; ?></p>
                                                            <p>Rating: <?= $row['rating']; ?></p>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            } else {
                                                echo "No Record Found";
                                            }

                                            mysqli_stmt_close($stmt);
                                        } else {
                                            echo "ERROR: Could not prepare query: " . mysqli_error($con);
                                        }
                                    }
                                ?>

                            </div>
                        </div>

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
        function toggleFavorite(element) {
    element.classList.toggle('active'); // This method toggles the 'active' class
}



    </script>
<script>
        function toggleFavorite(recipeId) {
            $.ajax({
                url: 'add_to_favorites.php',  // This is the PHP file that handles the database operation
                type: 'POST',
                data: {recipeID: recipeId},
                success: function(response) {
                    alert(response);  // Alert the message from the server
                },
                error: function() {
                    alert('Error adding to favorites');
                }
            });
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>