<!DOCTYPE html>
<html>
    <head>
        <title>Create Tables</title>
    </head>
    <body>
        <?php
        $servername="Localhost";
        $username= "root";
        $password= "";
        $dbname= "RemixologyKitchen";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("connection failed: ". $conn->connect_error);
        }
        /*$sql = "create table users( 
            userID int(6) unsigned Auto_increment primary key,
            firstname varchar(30) not null,
            lastname varchar(30) not null,
            email varchar(50) unique, 
            age integer Not Null,
            gender varchar(20),
            pass varchar(20) Not Null
            )";
            if(mysqli_query($conn,$sql)) {
                echo "Table users created succesfully";
            }
            else {
                echo "Error creating table: ". $conn->error;
            }


            $sql = "create table ingredients(
                ingredientName varchar(30) not null primary key)";

                if(mysqli_query($conn,$sql)) {
                    echo "Table ingrediants created succesfully";
                }
                else {
                    echo "Error creating table: ". $conn->error;
                }


                $sql = "create table recipes( 
                    recipeID int(6) unsigned Auto_increment primary key,
                    recipeName varchar(30) not null,
                    instructions varchar(1000),
                    calories float(4) Not Null,
                    rating float(2),
                    protein float(3) Not Null,
                    carbohydrates float(3) Not Null, 
                    fats float(3) Not Null ,
                    UserID integer, 
                    foreign key(userID) refrences Users(userID))";
    
                    if(mysqli_query($conn,$sql)) {
                        echo "Table recipes created succesfully";
                    }
                    else {
                        echo "Error creating table: ". $conn->error;
                    }

                    $sql ="Create table Recipe_Ingredients (
                        recipeID varchar(30),
                        ingredientID varchar(30),
                        primary key(recipeID,ingredientID),
                        foreign key (ingredientID) refrences ingredients(ingredientID),
                        foreign key(recipeID) refrences recipe(recipeID)";
        
                        if(mysqli_query($conn,$sql)) {
                            echo "Table created Recipe_Ingredients succesfully";
                        }
                        else {
                            echo "Error creating table: ". $conn->error;
                        }*/

                        $sql ="CREATE TABLE Clients_FavRecipies (
                            userID INT(11),
                            recipeID INT(11),
                            PRIMARY KEY(userID, recipeID),
                            FOREIGN KEY(recipeID) REFERENCES recipes(recipeID),
                            FOREIGN KEY(userID) REFERENCES Users(userID)
                        )";
                        if(mysqli_query($conn,$sql)) {
                            echo "Table Client_Ingredients created succesfully";
                        }
                        else {
                            echo "Error creating table: ". $conn->error;
                        }

            $close=$conn->close();
        ?>
    </body>
</html>