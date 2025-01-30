<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funda of Web IT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
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
                                    <button type="submit" class="btn btn-primary">Search</button>
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
                                                foreach($result as $row) {
                                                    ?>
                                                    <div class="form-group mb-3">
                                                        <label for="">Recipe Name:</label>
                                                        <input type="text" value="<?= htmlspecialchars($row['recipeName']); ?>" class="form-control" readonly>
                                                        <button class="btn btn-info mt-2" onclick="alert('Name: <?= addslashes(htmlspecialchars($row['recipeName'])); ?>\nInstructions: <?= addslashes(htmlspecialchars($row['instructions'])); ?>\nCalories: <?= $row['calories']; ?>\nProtein: <?= $row['protein']; ?>\nCarbohydrates: <?= $row['carbohydrates']; ?>\nFats: <?= $row['fats']; ?>\nRating: <?= $row['rating']; ?>')">View Details</button>
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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>