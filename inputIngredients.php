
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product Filter And Search</title>
    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap"
      rel="stylesheet"
    />
    <!-- Stylesheet -->
  </head>
  <body>
    <style>
        * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    border: none;
    outline: none;
    font-family: "Poppins", sans-serif;
  }
  body {
    background-color: #d5aa9d;
  }
  .wrapper {
    width: 95%;
    margin: 0 auto;
  }
  #search-container {
    margin: 1em 0;
  }
  #search-container input {
    background-color: transparent;
    width: 40%;
    border-bottom: 2px solid #110f29;
    padding: 1em 0.3em;
  }
  #search-container input:focus {
    border-bottom-color: white;
  }
  #search-container button {
    padding: 1em 2em;
    margin-left: 1em;
    background-color: white;
    color: black;
    border-radius: 5px;
    margin-top: 0.5em;
  }
  .button-value {
    border: 2px solid white;
    padding: 1em 2.2em;
    border-radius: 3em;
    background-color: transparent;
    color: black;
    cursor: pointer;
  }
  .active {
    background-color: transparent;
    color: #ffffff;
  }
  #products {
    display: grid;
    grid-template-columns: auto auto auto;
    grid-column-gap: 1.5em;
    padding: 2em 0;
  }
  .card {
    display:inline-block;
    margin: 1em;
    background-color: #ffffff;
    max-width: 18em;
    margin-top: 1em;
    padding: 1em;
    border-radius: 5px;
    box-shadow: 1em 2em 2.5em rgba(1, 2, 68, 0.08);
  }
  .image-container {
    text-align: center;
  }
  img {
    max-width: 100%;
    object-fit: contain;
    height: 15em;
  }
  .container {
    padding-top: 1em;
    color: #110f29;
  }
  .container h5 {
    font-weight: 500;
  }
  .hide {
    display: none;
  }

  @media screen and (max-width: 720px) {
    img {
      max-width: 100%;
      object-fit: contain;
      height: 10em;
    }
    .card {
      max-width: 10em;
      margin-top: 1em;
    }
    #products {
      grid-template-columns: auto auto;
      grid-column-gap: 1em;
    }
  }
    </style>
    <div class="wrapper">
      <div id="search-container">
        <input
          type="search"
          id="search-input"
          placeholder="Search product name here.."
        />
        <button id="search">Search</button>
      </div>
      <div id="buttons">
        <button class="button-value" onclick="filterProduct('all')">All</button>
        <button class="button-value" onclick="filterProduct('Vegetable')">
            Vegetable
        </button>
        <button class="button-value" onclick="filterProduct('Fruit')">
          Fruit
        </button>
        <button class="button-value" onclick="filterProduct('Spice')">
          Spice
        </button>
        <button class="button-value" onclick="filterProduct('Protein')">
            Protein
          </button>
          <button class="button-value" onclick="filterProduct('Liquid')">
            Liquid
          </button>
          <button class="button-value" onclick="filterProduct('Other')">
            other
          </button>
          
        <form id="product-form" action="processInputIngredients.php" method="POST">
          <div id="products"></div><!--??-->
            <div id="submit-container">
              <button id="submit-button" name="submitButton" class="button-value">Submit</button>
            </div>
        </form>
      </div>
    </div>
    <script>
    let products = {
    data: [
        {
            productName: "Banana",
            category: "Fruit",
            price: "0.49",
            image: "banana.jpg"
        },
        {
            productName: "Carrot",
            category: "Vegetable",
            price: "0.69",
            image: "carrot.jpg"
        },
        {
            productName: "Apple",
            category: "Fruit",
            price: "0.79",
            image: "apple.jpg"
        },
        {
            productName: "Lemon",
            category: "Vegetable",
            price: "0.59",
            image: "Lemon.jpg"
        },
        {
            productName: "Onion",
            category: "Vegetable",
            price: "0.39",
            image: "onion.jpg"
        },
        {
            productName: "Garlic",
            category: "Vegetable",
            price: "1.29",
            image: "garlic.jpg"
        },
        {
            productName: "Strawberry",
            category: "Fruit",
            price: "1.29",
            image: "strawberry.jpg"
        },
        {
            productName: "Broccoli",
            category: "Vegetable",
            price: "1.49",
            image: "broccoli.jpg"
        },
        {
            productName: "Tomato",
            category: "Vegetable",
            price: "0.89",
            image: "tomato.jpg"
        },
        {
            productName: "Cucumber",
            category: "Vegetable",
            price: "0.79",
            image: "cucumber.jpg"
        },
        {
            productName: "Ginger",
            category: "Spice",
            price: "2.99",
            image: "ginger.jpg"
        },
        {
            productName: "Cinnamon",
            category: "Spice",
            price: "3.49",
            image: "cinamon.jpg"
        },
        {
            productName: "Parsley",
            category: "Vegetable",
            price: "3.99",
            image: "Prsley.jpg"
        },
        {
            productName: "Vinegar",
            category: "Liquid",
            price: "3.99",
            image: "vinegar.jpg"
        },
        {
            productName: "Coriander",
            category: "Vegetable",
            price: "1.99",
            image: "coriander.jpg"
        },
        {
            productName: "Bay Leaf",
            category: "Spice",
            price: "2.79",
            image: "bay-leaf.jpg"
        },
        {
            productName: "Rosemary",
            category: "Spice",
            price: "3.49",
            image: "rosemary.jpg"
        },
        {
            productName: "Curry",
            category: "Spice",
            price: "2.99",
            image: "curry.jpg"
        },
        {
            productName: "7 Spices",
            category: "Spice",
            price: "5.49",
            image: "seven-spices.jpg"
        },
        {
            productName: "Salt",
            category: "Spice",
            price: "1.29",
            image: "salt.jpg"
        },
        {
            productName: "Paprika",
            category: "Spice",
            price: "2.29",
            image: "paprika.jpg"
        },
        {
            productName: "Pepper",
            category: "Vegetable",
            price: "1.79",
            image: "pepper.jpg"
        },
        
            {
                productName: "Chicken Breast",
                category: "Protein",
                price: "3.99",
                image: "chicken-breast.jpg"
            },
            {
                productName: "Salmon Fillet",
                category: "Protein",
                price: "5.49",
                image: "SALMON-FILLET.jpg."
            },
            {
                productName: "Tofu",
                category: "Protein",
                price: "2.49",
                image: "tofu.jpg"
            },
            {
                productName: "Lean Beef Steak",
                category: "Protein",
                price: "6.99",
                image: "lean-beef-steak.jpg"
            },
            {
                productName: "Eggs",
                category: "Protein",
                price: "2.29",
                image: "eggs.jpg"
            },
            {
                productName: "fish",
                category: "Protein",
                price: "3.29",
                image: "fish.jpg"
            },
            {
                productName: "tuna",
                category: "Protein",
                price: "2.29",
                image: "tuna.jpg"
            },
            {
                productName: "Greek Yogurt",
                category: "Other",
                price: "1.99",
                image: "greek-yogurt.jpg"
            },
            {
                productName: "Cottage Cheese",
                category: "Other",
                price: "3.49",
                image: "cottage-cheese.jpg"
            },
            {
                productName: "Quinoa",
                category: "Protein",
                price: "3.79",
                image: "quinoa.jpg"
            },
            {
                productName: "Lentils",
                category: "Other",
                price: "1.99",
                image: "lentils.jpg"
            },
            {
                productName: "Milk",
                category: "Liquid",
                price: "1.99",
                image: "milk.jpg"
            },
            {
                productName: "Oil",
                category: "Liquid",
                price: "2.00",
                image: "oil.jpg"
            },{
                productName: "olive oil",
                category: "Liquid",
                price: "1.99",
                image: "olive.jpg"
            },
            {
                productName: "Water",
                category: "Liquid",
                price: "0.99",
                image: "water.jpg"
            },
            {
                productName: "Pasta",
                category: "Other",
                price: "1.99",
                image: "pasta.jpg"
            },
            {
                productName: "Bread",
                category: "Other",
                price: "2.49",
                image: "bread.jpg"
            },
            {
                productName: "Butter",
                category: "Other",
                price: "3.49",
                image: "butter.jpg"
            },
            {
                productName: "Cheese",
                category: "Other",
                price: "4.99",
                image: "cheese.jpg"
            },
            {
                productName: "chicken stock",
                category: "Other",
                price: "4.99",
                image: "chicken-stock.jpg"
            },
            {
                productName: "Yogurt",
                category: "Other",
                price: "1.79",
                image: "yougurt.jpg"
            },
            {
                productName: "Cumin",
                category: "Spice",
                price: "0.79",
                image: "cumin.jpg"
            },
            {
                productName: "Mango",
                category: "Fruit",
                price: "1.99",
                image: "mango.jpg"
            },
            {
                productName: "Grapes",
                category: "Fruit",
                price: "2.49",
                image: "grapes.jpg"
            },
            {
                productName: "Pineapple",
                category: "Fruit",
                price: "1.99",
                image: "pineapple.jpg"
            },
            {
                productName: "Watermelon",
                category: "Fruit",
                price: "3.99",
                image: "watermelon.jpg"
            },
            {
                productName: "Kiwi",
                category: "Fruit",
                price: "1.49",
                image: "kiwi.jpg"
            },
            {
                productName: "Pear",
                category: "Fruit",
                price: "0.89",
                image: "pear.jpg"
            },
            {
                productName: "Peach",
                category: "Fruit",
                price: "1.39",
                image: "peach.jpg"
            },
            {
                productName: "Blueberry",
                category: "Fruit",
                price: "2.99",
                image: "blueberry.jpg"
            },
            {
                productName: "Cherry",
                category: "Fruit",
                price: "2.79",
                image: "cherry.jpg"
            },
            {
                productName: "Raspberry",
                category: "Fruit",
                price: "3.49",
                image: "raspberry.jpg"
            },
            {
                productName: "Cantaloupe",
                category: "Fruit",
                price: "2.99",
                image: "cantaloupe.jpg"
            },
            {
                productName: "Apricot",
                category: "Fruit",
                price: "1.79",
                image: "apricot.jpg"
            },
            {
                productName: "Plum",
                category: "Fruit",
                price: "1.69",
                image: "plum.jpg"
            },
            {
                productName: "Coconut",
                category: "Fruit",
                price: "1.99",
                image: "coconut.jpg"
            },
            {
                productName: "Dragon Fruit",
                category: "Fruit",
                price: "4.99",
                image: "dragon-fruit.jpg"
            },
            {
                productName: "Baking powder",
                category: "Spice",
                price: "0.79",
                image: "baking-powder.jpg"
            },
            {
                productName: "Toast",
                category: "Other",
                price: "2.79",
                image: "toast.jpg"
            },
            {
                productName: "Cereal",
                category: "Other",
                price: "3.99",
                image: "cereal.jpg"
            },
            {
                productName: "Honey",
                category: "Other",
                price: "3.99",
                image: "Honey.jpg"
            },
            {
                productName: "Biscut",
                category: "Other",
                price: "3.99",
                image: "biscut.jpg"
            },
            {
                productName: "Basmati Rice",
                category: "Other",
                price: "3.99",
                image: "basmati-rice.jpg"
            },
            {
                productName: "Brown Rice",
                category: "Other",
                price: "2.49",
                image: "brown-rice.jpg"
            },
            {
                productName: "White Rice",
                category: "Other",
                price: "1.99",
                image: "rice.jpg"
            },
            {
                productName: "Barley",
                category: "Other",
                price: "2.99",
                image: "barley.jpg"
            },
            {
                productName: "Couscous",
                category: "Other",
                price: "3.49",
                image: "couscous.jpg"
            },        
            {
            productName: "black Pepper",
            category: "Spice",
            price: "1.79",
            image: "black-pepper.jpg"
            },
            {
            productName: "soy sauce",
            category: "Other",
            price: "1.79",
            image: "soy.jpg"
            },
            {
            productName: "Orange",
            category: "Fruit",
            price: "0.79",
            image: "orange.jpg"
            },
            ],
          };
    const productForm = document.getElementById("product-form"); 
    for (let i of products.data) {
    	let checkbox = document.createElement("input");
   	    checkbox.setAttribute("type", "checkbox");
   	    checkbox.setAttribute("name", "selected[]");
   	    checkbox.setAttribute("value", i.productName.toLowerCase());
   	    checkbox.classList.add("product-checkbox");
   	    
        let card = document.createElement("div");
        let div=document.getElementById("products");
        card.classList.add("card", i.category, "hide");
        let imgContainer = document.createElement("div");
        imgContainer.classList.add("image-container");
        let image = document.createElement("img");
        image.setAttribute("src", i.image);
        imgContainer.style.display="inline-block";
        image.addEventListener("click", () => {
            let checkbox = document.getElementById(`${i.productName.toLowerCase()}-checkbox`);
            checkbox.checked = !checkbox.checked;
        });
        imgContainer.appendChild(image);
        card.appendChild(imgContainer);
        let container = document.createElement("div");
        container.classList.add("container");

        let name = document.createElement("h5");
        name.classList.add("product-name");
        name.innerText = i.productName.toUpperCase();

        let price = document.createElement("h6");
       // price.innerText = "$" + i.price;

        container.appendChild(name);
        container.appendChild(price);
        card.appendChild(container);
        card.appendChild(checkbox); // Append checkbox to the form
        productForm.appendChild(card);
      }

      function filterProduct(value) {
        let buttons = document.querySelectorAll(".button-value");
        buttons.forEach((button) => {
          if (value.toUpperCase() == button.innerText.toUpperCase()) {
            button.classList.add("active");
          } else {
            button.classList.remove("active");
          }
        });
      
        let elements = document.querySelectorAll(".card");
        elements.forEach((element) => {
          if (value == "all") {
            element.classList.remove("hide");
          } else {
            if (element.classList.contains(value)) {
              element.classList.remove("hide");
            } else {
              element.classList.add("hide");
            }
          }
        });
      }
      
      //Search button click
      document.getElementById("search").addEventListener("click", () => {
        //initializations
        let searchInput = document.getElementById("search-input").value;
        let elements = document.querySelectorAll(".product-name");
        let cards = document.querySelectorAll(".card");
      
        //loop through all elements
        elements.forEach((element, index) => {
          //check if text includes the search value
          if (element.innerText.includes(searchInput.toUpperCase())) {
            //display matching card
            cards[index].classList.remove("hide");
          } else {
            //hide others
            cards[index].classList.add("hide");
          }
        });
      });
      // Trigger search on Enter key press
    document.getElementById("search-input").addEventListener("keypress", (event) => {
        if (event.key === "Enter") {
            event.preventDefault(); // Prevent form submission
            document.getElementById("search").click(); // Trigger the search button click
        }
    });
    document.getElementById("submit-button").addEventListener("click", function() {
    	  // Submit the form
    	  document.querySelector("form").submit();
    	});

      //Initially display all products
      window.onload = () => {
        filterProduct("all");
      };
        </script>
      </body>
    </html>