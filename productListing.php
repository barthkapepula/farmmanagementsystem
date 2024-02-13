<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Farm Management System</title>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="script.js"></script>

    <style>
    body {
        margin: 0;
        font-family: "Montserrat", sans-serif;
    }

    .navbar {
        overflow: hidden;
        background-color: #000;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
    }

    .navbar a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    .navbar a:hover {
        background-color: #ddd;
        color: black;
    }

    .main-content {
        margin-top: 60px; /* Adjust according to your navbar height */
        padding: 20px;
    }

    input[type=text] {
        padding: 8px;
        margin: 8px;
        box-sizing: border-box;
    }

    /* Slideshow CSS */
    .slideshow-container {
        max-width: 100%;
        position: relative;
        margin: auto;
    }

    .mySlides {
        display: none;
        width: 100%;
    }

    /* Title CSS */
    .title {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

</style>

    
    </head>
<body class="w3-content">
    <!-- Sticky Navigation Bar -->
<div class="navbar">
    <a href="#home">Home</a>
    <a href="#login">Login as a Farmer</a>
    <a href="#purchase">Purchase Goods</a>
    <input type="text" placeholder="Search...">
</div>
<!-- Search field -->
<div class="w3-container w3-padding">
    <input type="text" id="searchInput" placeholder="Search products..." oninput="searchProducts()">
</div>

<!-- Product slideshow -->
<div class="w3-content w3-section" style="max-width:100%">
    <img class="mySlides" src="slide1.png" >
    <img class="mySlides" src="slide2.jpg" >
    <img class="mySlides" src="slide3.jpg" >
</div>



<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
    <div class="w3-bar-item w3-padding-24 w3-wide">Farm Logo</div>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

    <!-- Push down content on small screens -->
    <div class="w3-hide-large" style="margin-top:83px"></div>


<!-- Product categories -->
<div class="w3-row w3-grayscale" id="productContainer"></div>

<!-- Product categories -->
<div class="w3-row w3-grayscale">
    <!-- Animals category -->
    <div class="w3-col l4 s6">
        <div class="w3-container">
            <!-- Add image for animals -->
            <img src="animal.jpg" style="width:100%">
            <p>Animals</p>
            <!-- Add animal products with prices and a button to add to the cart -->
            <button class="w3-button w3-black" onclick="addToCart('Goat', 50)">Add to Cart</button>
        </div>
    </div>

    <!-- Produce category -->
    <div class="w3-col l4 s6">
        <div class="w3-container">
            <!-- Add image for produce -->
            <img src="produce.jpg" style="width:100%">
            <p>Produce</p>
            <!-- Add produce items with prices and a button to add to the cart -->
            <button class="w3-button w3-black" onclick="addToCart('Maize', 10)">Add to Cart</button>
        </div>
    </div>

    <!-- Fruits category -->
    <div class="w3-col l4 s6">
        <div class="w3-container">
            <!-- Add image for fruits -->
            <img src="fruits.jpg" style="width:100%">
            <p>Fruits</p>
            <!-- Add fruit items with prices and a button to add to the cart -->
            <button class="w3-button w3-black" onclick="addToCart('Banana', 5)">Add to Cart</button>
        </div>
    </div>
</div>
<script>
        // Fetch products from the server
        fetch('api.php')
        .then(response => response.json())
        .then(products => displayProducts(products))
        .catch(error => console.error('Error fetching products:', error));

    function displayProducts(products) {
        const productContainer = document.getElementById('productContainer');

        products.forEach(product => {
            const productElement = document.createElement('div');
            productElement.className = 'w3-col l4 s6';
            productElement.innerHTML = `
                <div class="w3-container">
                    <img src="placeholder.jpg" style="width:100%">
                    <p>${product.name}</p>
                    <p>${product.category}</p>
                    <p>${product.price} ZMW</p>
                    <button class="w3-button w3-black" onclick="addToCart('${product.name}', ${product.price})">Add to Cart</button>
                </div>
            `;

            productContainer.appendChild(productElement);
        });
    }

    // Add more products and categories
var products = [
    { name: 'Goat', category: 'Animals', price: 200 },
    { name: 'Maize', category: 'Produce', price: 10 },
    { name: 'Banana', category: 'Fruits', price: 5 }
    // Add more products as needed
];

// Display initial products
displayProducts(products);

// Function to search products
function searchProducts() {
    var searchInput = document.getElementById("searchInput").value.toLowerCase();
    var filteredProducts = products.filter(product => product.name.toLowerCase().includes(searchInput));
    displayProducts(filteredProducts);
}

// Function to display products
function displayProducts(products) {
    var productContainer = document.getElementById('productContainer');
    productContainer.innerHTML = '';

    products.forEach(product => {
        var productElement = document.createElement('div');
        productElement.className = 'w3-col l4 s6';
        productElement.innerHTML = `
            <div class="w3-container">
                <img src="placeholder.jpg" style="width:100%">
                <p>${product.name}</p>
                <p>${product.category}</p>
                <p>${product.price} ZMW</p>
                <button class="w3-button w3-black" onclick="addToCart('${product.name}', ${product.price})">Add to Cart</button>
            </div>
        `;

        productContainer.appendChild(productElement);
    });
}

// Slideshow script
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slideIndex++;
    if (slideIndex > slides.length) { slideIndex = 1 }
    slides[slideIndex - 1].style.display = "block";

    setTimeout(showSlides, 2000); // Change slide every 2 seconds
}
</script>



</script>
</body>
</html>
