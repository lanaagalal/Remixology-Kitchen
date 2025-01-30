<!DOCTYPE html>
  
<html>
    <head>
        <title>Remixology Kitchen</title>
        <link rel="stylesheet" href="style2.css"/>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
        
    </head>
    <body>
        <div class="banner">
                <video autoplay loop muted plays-inline class="back-video">
                <source src="vid.mp4" type="video/mp4">
                </video>
            <nav class="navbar">
                <img src="Orange Simple Food Logo (4).png"  class="logo" style="height: 150px; width:200px ;zoom:auto;"/>
                <ul class="navbar-list">
                    <li><a href="#">Home</a></li>
                    <li><a href="#feature">Our Story</a></li>
                    <li><a href="search.php">search</a></li>
                    <li><a href="#footer">Contact</a></li>
                </ul>
                <div class="profile-dropdown">
                    <div onclick="toggle()" class="profile-dropdown-btn">
                        <div class="profile-img">
                            <i class='bx bxs-circle'></i>
                        </div>
                        <p style="font-size:medium; color:#be872c;font-family:system-ui">
                            <?php
                               echo $_COOKIE['firstname'];
                            ?>
                            <i class='bx bx-chevron-down'></i>
                        </p>
                    </div>
                
                    <ul class="profile-dropdown-list">
                        <li class="profile-dropdown-list-item">
                            <a href="InputRecipe.php">
                                <i class='bx bx-user' ></i>
                                Input Recipe
                            </a>
                        </li>

                        <li class="profile-dropdown-list-item">
                        <a href="UserRecipes.php" >
                        <i class='bx bx-user' ></i>
                            Your Kitchen
                        </a>
                        </li>

                        <li class="profile-dropdown-list-item">
                        <a href="Favourites.php" >
                        <i class='bx bx-user' ></i>
                            Your Favourites
                        </a>
                        </li>

                    <?php if($_COOKIE['userID']=="15") {
                        ?>

                        <li class="profile-dropdown-list-item">
                            <a href="send-email-form.php">
                            <i class='bx bx-user'></i>
                                send Email
                            </a>
                        </li>


                        <?php
                    }
                    ?>
                        
                    


                         <hr  />
                        <li class="profile-dropdown-list-item">
                        <a href="logout.php">
                        <i class='bx bx-log-out' ></i>
                        LOG OUT
                        </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="content">
                <h1>Ingredients Remix Generator</h1>
                <p>Turning Ingredients into Delicious Creations</p>
                <div>
                    <button type="button"><span></span><a href="inputIngredients.php" style="text-decoration: none;color: inherit;">Input Ingredients</a></button>
                    <button type="button"><span></span><a href="recommendations.php" style="text-decoration: none;color: inherit;">Recommendations</a></button>
                </div>
            </div>
    
        </div>

        <section id="feature">
            <div class="title-text">
                <p>Our Story</p><br><br>
                <h1>Why Ingredients Remix Kitchen</h1>
            </div>
            <div class="feature-box">
                <div class="features">
                    <h1>Mission</h1>
                    <div class="features-desc">
                        <div class="feature-icon">
                            <i class='bx bx-book-reader'></i>
                        </div>                        
                        <div class="feature-text">
                            <p>Empower home cooks to create delicious meals while reducing food waste. Believe in the potential of every ingredient to become extraordinary.</p>
                        </div>
                    </div> 

                    <h1>Founding</h1>
                    <div class="features-desc">
                        <div class="feature-icon">
                            <i class='bx bx-heart'></i>
                        </div>                        
                        <div class="feature-text">
                            <p>Founded in 2024 by Lana Ahmed, Ahmed ElTohamy, Mohamed Adel and Mohamed Ashraf.
                                Desire to make cooking more sustainable and accessible.</p>
                        </div>
                    </div>  

                    <h1> Platform Features </h1>
                    <div class="features-desc">
                        <div class="feature-icon">
                            <i class='bx bxs-message-square-check'></i>
                        </div>                        
                        <div class="feature-text">
                            <p>Provide solutions for utilizing ingredients before they expire.
                                Offer ingredient-based recipe suggestions, can also be for people who make diet.
                            </p>
                        </div>
                    </div>
                    
                    <h1> Support and Inspiration </h1>
                    <div class="features-desc">
                        <div class="feature-icon">
                            <i class='bx bxs-bowl-hot'></i>
                        </div>                        
                        <div class="feature-text">
                            <p>Inspire and support users in their cooking journey.
                                Help users whip up quick weeknight dinners or gourmet feasts.
                                Offer ingredient-based recipe suggestions, can also be for people who make diet.
                            </p>
                        </div>
                    </div>
        
                    <h1> Community Engagement </h1>
                    <div class="features-desc">
                        <div class="feature-icon">
                            <i class='bx bx-happy-heart-eyes'></i>
                        </div>                        
                        <div class="feature-text">
                            <p>
                                Foster a community of passionate individuals.
                                Connect like-minded users who care about cooking and sustainability.
                                Together, redefine cooking at home and reduce the carbon footprint.
                            </p>
                        </div>
                    </div>

                </div>
                <div class="features-img">
                    <img src="Brown Modern Hiring Chef Poster.png" alt="Feature Image"/>
                </div>
            </div>
        </section>
        <br>
        <br>
        <section id="top-recipes">
            <div class="title-text">
                <p>Top Recipes</p><br><br>
                <h1>We talk food language</h1>
            </div>
            <div class="recipe-box">
                <div class="single-recipe">
                    <img src="Playful Sandwiches Restaurant Menu Ad Instagram Post.png"/>
                    <div class="overlay"></div>
                    <div class="recipe-desc">
                        <h3>Croissant Sandwich</h3>
                        <hr>
                        <p><b>ingredients:</b><br/>2 Large Croissants<br>
                            2-3 Slices of Gouda Cheese<br>
                            2 Large/4 Small Slices of Prosciutto<br>
                            1 tsp Honey Mustard<br>
                            3 tsp Olive Oil<br>
                            <b>Prepration</b><br>
                            Preheat your oven to 350°F (175°C).<br>
                            Slice the croissants in half horizontally.<br>
                            Spread honey mustard on the bottom half of each croissant.<br>
                            Layer Gouda cheese slices on top of the honey mustard.<br>
                            Place Prosciutto slices on the cheese.<br>
                            Brush the croissants with olive oil.<br>
                            Bake in the preheated oven for 5-7 minutes.
                        </p>
                    </div>
                </div>
                <div class="single-recipe">
                    <img src="brown cookies Instagram Post.png" />
                    <div class="overlay"></div>
                    <div class="recipe-desc">
                        <h3>Cookies</h3>
                        <hr>
                        <p><b>ingredients</b><br/>1 cup (2 sticks) unsalted butter<br/>
                            1 cup granulated sugar
                            1 cup packed brown sugar
                            2 large eggs
                            1 teaspoon vanilla extract
                            3 cups all-purpose flour
                            1 teaspoon baking soda
                            1/2 teaspoon salt
                            2 cups chocolate chips<br>
                            <b>Prepration</b><br> 
                            Preheat your oven to 350°F (175°C).<br>
                            In a large mixing bowl, cream together the softened butter, granulated sugar, and brown sugar until smooth.<br>
                            Beat in the eggs, one at a time, then stir in the vanilla extract.<br>

                            In a separate bowl, combine the flour, baking soda, and salt.<br>
                            Gradually add the dry ingredients to the wet ingredients.<br>
                            Fold in the chocolate chips.<br>
                            Bake in the preheated oven for 8 to 10 minutes.<br>
                    </div>
                </div>
                <div class="single-recipe">
                    <img src="Green Bold Fresh Salad Instagram Post.png"/>
                    <div class="overlay"></div>
                    <div class="recipe-desc">
                        <h3>Ceaser Salad</h3>
                        <hr>
                        <p>
                            <b>ingredients</b><br>
                            Romaine lettuce, washed and chopped<br>
                            Croutons (store-bought or homemade)<br>
                            Grated Parmesan cheese<br>
                            Caesar dressing (store-bought or homemade)<br>
                            Optional: Grilled chicken or shrimp for protein<br>
                           <b>Preparation</b><br>
                            Wash and chop the Romaine lettuce into bite-sized pieces.<br>
                            If using grilled chicken or shrimp, prepare and cook them.<br>
                            In a large salad bowl, combine the chopped Romaine lettuce with croutons and grated Parmesan cheese.<br>
                            Gently toss the salad ingredients together until evenly coated with the dressing.

                        </p>
                    </div>
                </div>
                <div class="single-recipe">
                    <img src="Italian Pasta Promotion Food Instagram Post.png"/>
                    <div class="overlay"></div>
                    <div class="recipe-desc">
                        <h3>fettuccine pasta</h3>
                        <hr>
                        <p>
                            <b>ingredients</b>
                            8 ounces fettuccine pasta<
                            2 boneless, skinless chicken breasts, thinly sliced<
                            2 cloves garlic, minced
                            1 cup cherry tomatoes, halved
                            2 cups baby spinach
                            1/2 cup heavy cream
                            1/4 cup grated Parmesan cheese
                            <b>Prepration</b><br>
                            Cook the fettuccine pasta.<br>
                            Heat the olive oil over medium heat. Add the sliced chicken breasts.<br>
                            Add minced garlic and sauté until fragrant. Add the cherry tomatoes and cook until they start to soften.<br>
                            Stir in the baby spinach and cook until wilted.<br>
                            Pour in the heavy cream and bring to a simmer.<br>
                            Return the cooked chicken to the skillet and add the cooked fettuccine pasta.
                            Add grated Parmesan cheese.
                        </p>
                    </div>
                </div>

            </div>
        </section>
        
            <div class="container">
                <div class="veiw-box">
                    <div id="testimonials">
                        <div class="user">
                            <img src="vicky-hladynets-C8Ta0gwPbQg-unsplash.jpg" alt="person"/>
                            <p>As someone who loves to cook but often finds themselves with random 
                                ingredients in the fridge, Remixology Kitchen has been a game-changer for me. 
                                I can't count how many times I've searched for recipes using ingredients 
                                I already have on hand and found delicious meal ideas within seconds. 
                                It's not just convenient; it's inspiring! Plus,
                                the recipes are always clear and easy to follow, making cooking a breeze. </p>
                                <h3>joumana tarek</h3>
                        </div>

                        <div class="user space">
                            <img src="jake-nackos-IF9TK5Uy-KI-unsplash.jpg" alt="person"/>
                            <p>Being a college student on a budget, cooking at home is not only a necessity but also a challenge. 
                                Remixology Kitchen has been my go-to solution for affordable and tasty meal ideas. 
                                I love how I can search for recipes based on the ingredients I already have in my dorm room.
                                 It's helped me become more creative with my cooking while saving money on groceries. Plus, the step-by-step instructions make it easy for even a beginner like me to whip up delicious meals. </p>
                                <h3>Rabab salah</h3>
                        </div>

                        <div class="user">
                            <img src="michael-dam-mEZ3PoFGs_k-unsplash.jpg" alt="person"/>
                            <p>"As a busy parent, I'm always looking for quick and easy meal solutions that my family will love. 
                                Remixology Kitchen has been a lifesaver for me! I love how I can simply input the ingredients I have on hand, and voila,
                                I have a variety of recipe options to choose from. 
                                It's like having a personal chef at my fingertips! The recipes are delicious. 
                                </p>
                                <h3>joumana ahmed</h3>
                        </div>
                    </div>
                    <div class="controls">
                        <i id="control1"></i>
                        <i id="control2" class="active"></i>
                        <i id="control3"></i>
                    </div>
                    
                </div>
            </div>
            <script>
                var testimonials=document.getElementById('testimonials');
                var control1=document.getElementById('control1');
                var control2=document.getElementById('control2');
                var control2=document.getElementById('control2');

                control1.onclick=function(){
                    testimonials.style.transform="translateX(870px)";
                    control1.classList.add("active");
                    control2.classList.remove("active");
                    control3.classList.remove("active");

                }
                control2.onclick=function(){
                    testimonials.style.transform="translateX(0px)";
                    control1.classList.remove("active");
                    control2.classList.add("active");
                    control3.classList.remove("active");

                }
                control3.onclick=function(){
                    testimonials.style.transform="translateX(-870px)";
                    control1.classList.remove("active");
                    control2.classList.remove("active");
                    control3.classList.add("active");

                }

            </script>

        <section id="footer">
            <img src="tt.png" class="footer-img" />
            <div class="title-text">
                <p>Contact</p><br>
                <h1>Remixology Kitchen</h1>
            </div>
            <div class="footer-row">
                <div class="footer-left">
                    <h1>Website Developers</h1> 
                    <p><i class='bx bx-laptop'></i>Lana Ahmed Galal</p>
                    <p><i class='bx bx-laptop'></i>Ahmed Ahmed Eltohamy</p>
                    <p><i class='bx bx-laptop'></i>Mohamed Adel</p>
                    <p><i class='bx bx-laptop'></i> Muhamed Ashraf</p>

                </div>
                <div class="footer-right">
                    <h1>Get In Touch</h1>
                    <p>WWW.RemixologyKitchen.com<i class='bx bx-search-alt-2'></i></p>
                    <a href="mailto:RemixologyKitchen@gmail.com" class="email-link" >RemixologyKitchen@gmail.com <i class='bx bxs-envelope'></i></a>
                    <p>+20 101 0085069 <i class='bx bxs-phone'></i></p>
                    <p>15668<i class='bx bxs-phone-call'></i></p>
                </div>
            </div>
            <div class="social-links">
                <div class="button">
                    <div class="icon">
                        <i class='bx bxl-facebook'></i>     
                    </div>
                </div>
                <div class="button">
                    <div class="icon">
                        <i class='bx bxl-instagram'></i>    
                    </div>
                </div>
                <div class="button">
                    <div class="icon">
                        <i class='bx bxl-twitter'></i>  
                    </div>
                </div>
                <div class="button">
                    <div class="icon">
                        <i class='bx bxl-youtube'></i>
                    </div>
                </div>
            </div>
        </section>
        <script src="script.js"></script>
        <script>
            var scroll = new SmoothScroll('a[href*="#"]', {
                speed: 1000,
                speedAsDuration: true
            });
        </script>
        <script>
            window.onscroll = function() {
                var navbar = document.querySelector('.navbar');
                if (window.pageYOffset > 0) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            };
        </script>
        
                   

    </body>
</html>