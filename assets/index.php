<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Farm Management System</title>
  <meta content="Farm Management System for Livestock, Crops, and Machinery" name="description">
  <meta content="farm, livestock, crops, machinery" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/farm-favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- CSS Files -->
  <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/plugins/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/plugins/aos/aos.css" rel="stylesheet">
  <link href="assets/plugins/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/plugins/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-pzjeHYb8Od8HJbjkuWIC3BfKnSNnixjSdJ+gKrdpGN/XK8H5c5frI3kXgmwd5qhyJ0s31AFObZYYh9XKRD9LAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <script>
 // Initialize an empty cart array
var cart = [];

// Attach click event handler to "Add to Cart" buttons
document.addEventListener('DOMContentLoaded', function () {
  var addToCartButtons = document.querySelectorAll('.btn-primary');

  addToCartButtons.forEach(function (button) {
    button.addEventListener('click', function () {
      // Extract product information and add to the cart
      var portfolioItem = button.closest('.portfolio-item');
      var productName = portfolioItem.querySelector('h4 a').innerText;
      var productPrice = portfolioItem.querySelector('p:nth-of-type(1)').innerText;

      var cartItem = {
        name: productName,
        price: productPrice
      };

      cart.push(cartItem);

      // Display the updated cart
      displayCart();

      // Alert when the button is clicked
      alert('Item added to the cart!');
    });
  });

  // Optionally, add a click event handler for the "Checkout" button
  var checkoutButton = document.getElementById('checkout-button');
  if (checkoutButton) {
    checkoutButton.addEventListener('click', function () {
      // Display the final list of selected items
      var itemList = cart.map(item => item.name + ' - ' + item.price).join('\n');
      var confirmationMessage = 'Checkout:\n' + itemList;
      alert(confirmationMessage);

      // Redirect to the confirmation page
      window.location.href = 'confirmation.html';
    });
  }
});

// Function to display the cart contents
function displayCart() {
  var cartContainer = document.getElementById('cart-container');
  var cartList = document.createElement('ul');

  cart.forEach(function (item) {
    var cartItem = document.createElement('li');
    cartItem.innerText = item.name + ' - ' + item.price;
    cartList.appendChild(cartItem);
  });

  // Clear previous content and append the updated cart
  cartContainer.innerHTML = '';
  cartContainer.appendChild(cartList);
}

// Make an AJAX request to the PHP script
var checkoutButton = document.getElementById('checkout-button');
if (checkoutButton) {
  checkoutButton.addEventListener('click', function () {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'process_order.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        // Display the server response (you can customize this based on your needs)
        alert(xhr.responseText);

        // Optionally, update the cart display or redirect to a thank you page
        // ...
      }
    };

    // Send the cart data to the server
    xhr.send('itemList=' + JSON.stringify(cart));
  });
}


  </script>

</head>

<body>

  <!-- ======= Header ======= -->
  <section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contactfms@gmail.com">contactfms@fgmailcom</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+260975700685</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </section><!-- End Top Bar -->

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#about">About</a></li>     
          <li class="dropdown"><a href="index.php"><span>Farm</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="/livestock/login.php">Livestock</a></li>
              <li class="dropdown"><a href="/crops/login.php"><span>Crops</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">Fruits</a></li>
                  <li><a href="#">Vegetables</a></li>
                  <li><a href="#">Seeds</a></li>
                </ul>
              </li>
              <li><a href="#">Machinery</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h2>Welcome to <span>Farm Management System</span></h2>
          <p>Efficiently manage your farm with our system. Track livestock, crops, and machinery seamlessly.</p>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started">Learn More</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="assets/img/farm-hero-img.svg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
        </div>
      </div>
    </div>

    <div class="icon-boxes position-relative">
      <div class="container position-relative">
        <div class="row gy-4 mt-5">

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-cow"></i></div>
              <h4 class="title"><a href="./livestock/login.php" class="stretched-link">Livestock Management</a></h4>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-tree"></i></div>
              <h4 class="title"><a href="./crops/login.php" class="stretched-link">Crop Management</a></h4>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
    <div class="icon-box">
        <div class="icon"><i class="bi bi-truck"></i></div>
        <h4 class="title"><a href="./delivery/login.php" class="stretched-link">Delivery</a></h4>
    </div>
</div><!-- End Icon Box -->


          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-calendar"></i></div>
              <h4 class="title"><a href="confirmation.html" class="stretched-link">Confirm your order today</a></h4>
            </div>
          </div><!--End Icon Box -->

        </div>
      </div>
    </div>

    </div>
  </section>
  <!-- End Hero Section -->

  <main id="main">

  
   <!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio sections-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>Our Products</h2>
      <p>Explore our categories: Birds, Animals, Fruits, Vegetables, and Others.</p>
    </div>

    <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

      <div>
        <ul class="portfolio-flters">
          <li data-filter="*" class="filter-active">All</li>
          <li data-filter=".filter-birds">Birds</li>
          <li data-filter=".filter-animals">Animals</li>
          <li data-filter=".filter-fruits">Fruits</li>
          <li data-filter=".filter-vegetables">Vegetables</li>
          <li data-filter=".filter-others">Others</li>
        </ul><!-- End Portfolio Filters -->
      </div>

      <div class="row gy-4 portfolio-container">

        <!-- Sample Portfolio Items (Replace with your own content) -->

        <!-- Birds Category -->
<div class="col-xl-4 col-md-6 portfolio-item filter-birds">
  <div class="portfolio-wrap">
    <a href="assets/img/bird1.jpg" data-gallery="portfolio-gallery-birds" class="glightbox"><img src="assets/img/bird1.jpg" class="img-fluid" alt=""></a>
    <div class="portfolio-info">
      <h4><a href="portfolio-details.html" title="More Details">Chicken</a></h4>
      <p><strong>Price per Unit:</strong> ZMW19.99</p>
      <p><strong>Description:</strong> The chicken were produced by our Local farmers</p>
      <button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
    </div>
  </div>
</div><!-- End Portfolio Item -->

<!-- Animals Category -->
<div class="col-xl-4 col-md-6 portfolio-item filter-animals">
  <div class="portfolio-wrap">
    <a href="assets/img/an1.jpg" data-gallery="portfolio-gallery-animals" class="glightbox"><img src="assets/img/an1.jpg" class="img-fluid" alt=""></a>
    <div class="portfolio-info">
      <h4><a href="portfolio-details.html" title="More Details">Cows</a></h4>
      <p><strong>Price per Unit:</strong> ZMW2,000.00</p>
      <p><strong>Description:</strong> Healthy Cows keept locally by our local farmers.</p>
      <button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
    </div>
  </div>
</div><!-- End Portfolio Item -->

<!-- Fruits Category -->
<div class="col-xl-4 col-md-6 portfolio-item filter-fruits">
  <div class="portfolio-wrap">
    <a href="assets/img/fruits1.jpg" data-gallery="portfolio-gallery-fruits" class="glightbox"><img src="assets/img/fruits1.jpg" class="img-fluid" alt=""></a>
    <div class="portfolio-info">
      <h4><a href="portfolio-details.html" title="More Details">Lemon</a></h4>
      <p><strong>Price per Unit:</strong> ZMW5.00</p>
      <p><strong>Description:</strong> Fresh and delicious fruits from our local farmers.</p>
      <button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
    </div>
  </div>
</div><!-- End Portfolio Item -->

<!-- Vegetables Category -->
<div class="col-xl-4 col-md-6 portfolio-item filter-vegetables">
  <div class="portfolio-wrap">
    <a href="assets/img/veg1.jpg" data-gallery="portfolio-gallery-vegetables" class="glightbox"><img src="assets/img/veg1.jpg" class="img-fluid" alt=""></a>
    <div class="portfolio-info">
      <h4><a href="portfolio-details.html" title="More Details">Carrot</a></h4>
      <p><strong>Price per Unit:</strong> ZMW 30.99</p>
      <p><strong>Description:</strong> Locally grown, carrot for a healthy lifestyle.</p>
      <button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
    </div>
  </div>
</div><!-- End Portfolio Item -->

<!-- Others Category -->
<div class="col-xl-4 col-md-6 portfolio-item filter-others">
  <div class="portfolio-wrap">
    <a href="assets/img/seed7.jpg" data-gallery="portfolio-gallery-others" class="glightbox"><img src="assets/img/seed7.jpg" class="img-fluid" alt=""></a>
    <div class="portfolio-info">
      <h4><a href="portfolio-details.html" title="More Details">Cafee seeds</a></h4>
      <p><strong>Price per Unit:</strong> ZMW9.99/ Kg</p>
      <p><strong>Description:</strong> A unique item that adds character to your space.</p>
      <button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
    </div>
  </div>
</div><!-- End Portfolio Item -->

        <!-- Birds Category -->
        <div class="col-xl-4 col-md-6 portfolio-item filter-birds">
          <div class="portfolio-wrap">
            <a href="assets/img/bird2.jpg" data-gallery="portfolio-gallery-birds" class="glightbox"><img src="assets/img/bird2.jpg" class="img-fluid" alt=""></a>
            <div class="portfolio-info">
              <h4><a href="portfolio-details.html" title="More Details">Dack</a></h4>
              <p><strong>Price per Unit:</strong> ZMW 300.99</p>
              <p><strong>Description:</strong> They were kept and maintained by our Local farmers</p>
              <button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
            </div>
          </div>
        </div><!-- End Portfolio Item -->
        
        <!-- Animals Category -->
        <div class="col-xl-4 col-md-6 portfolio-item filter-animals">
          <div class="portfolio-wrap">
            <a href="assets/img/an2.jpg" data-gallery="portfolio-gallery-animals" class="glightbox"><img src="assets/img/an2.jpg" class="img-fluid" alt=""></a>
            <div class="portfolio-info">
              <h4><a href="portfolio-details.html" title="More Details">Sheeps</a></h4>
              <p><strong>Price per Unit:</strong> ZMW 2,000.00</p>
              <p><strong>Description:</strong> Healthy sheeps nourished by our local zambian farmers.</p>
              <button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
            </div>
          </div>
        </div><!-- End Portfolio Item -->
        <!-- Others Category -->
<div class="col-xl-4 col-md-6 portfolio-item filter-others">
  <div class="portfolio-wrap">
    <a href="assets/img/seed3.jpg" data-gallery="portfolio-gallery-others" class="glightbox"><img src="assets/img/seed3.jpg" class="img-fluid" alt=""></a>
    <div class="portfolio-info">
      <h4><a href="portfolio-details.html" title="More Details">Rice </a></h4>
      <p><strong>Price per Unit:</strong> ZMW 150.00/ Kg</p>
      <p><strong>Description:</strong> A premium quality of rice good for our customers' consumptions.</p>
      <button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
    </div>
  </div>
</div><!-- End Portfolio Item -->
        
        <!-- Fruits Category -->
        <div class="col-xl-4 col-md-6 portfolio-item filter-fruits">
          <div class="portfolio-wrap">
            <a href="assets/img/fruits2.jpg" data-gallery="portfolio-gallery-fruits" class="glightbox"><img src="assets/img/fruits2.jpg" class="img-fluid" alt=""></a>
            <div class="portfolio-info">
              <h4><a href="portfolio-details.html" title="More Details">Orange</a></h4>
              <p><strong>Price per Unit:</strong> ZMW 10.00</p>
              <p><strong>Description:</strong> Fresh and delicious fruits from our local farmers.</p>
              <button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
            </div>
          </div>
        </div><!-- End Portfolio Item -->
        
        <!-- Vegetables Category -->
        <div class="col-xl-4 col-md-6 portfolio-item filter-vegetables">
          <div class="portfolio-wrap">
            <a href="assets/img/veg2.jpg" data-gallery="portfolio-gallery-vegetables" class="glightbox"><img src="assets/img/veg2.jpg" class="img-fluid" alt=""></a>
            <div class="portfolio-info">
              <h4><a href="portfolio-details.html" title="More Details">Green Beans</a></h4>
              <p><strong>Price per Unit:</strong> ZMW 30.99</p>
              <p><strong>Description:</strong> Locally grown, green beans for a healthy lifestyle.</p>
              <button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
            </div>
          </div>
        </div><!-- End Portfolio Item -->

                <!-- Birds Category -->
<div class="col-xl-4 col-md-6 portfolio-item filter-birds">
  <div class="portfolio-wrap">
    <a href="assets/img/bird3.jpg" data-gallery="portfolio-gallery-birds" class="glightbox"><img src="assets/img/bird3.jpg" class="img-fluid" alt=""></a>
    <div class="portfolio-info">
      <h4><a href="portfolio-details.html" title="More Details">Pigeon</a></h4>
      <p><strong>Price per Unit:</strong> ZMW 249.99</p>
      <p><strong>Description:</strong> The Pigeon are kept in nice environments by our Local farmers</p>
      <button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
    </div>
  </div>
</div><!-- End Portfolio Item -->

<!-- Animals Category -->
<div class="col-xl-4 col-md-6 portfolio-item filter-animals">
  <div class="portfolio-wrap">
    <a href="assets/img/an3.jpg" data-gallery="portfolio-gallery-animals" class="glightbox"><img src="assets/img/an3.jpg" class="img-fluid" alt=""></a>
    <div class="portfolio-info">
      <h4><a href="portfolio-details.html" title="More Details">Goats</a></h4>
      <p><strong>Price per Unit:</strong> ZMW2,000.00</p>
      <p><strong>Description:</strong> Our goats are well nourished and kept in our farms.</p>
      <button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
    </div>
  </div>
</div><!-- End Portfolio Item -->
<!-- Vegetables Category -->
        <div class="col-xl-4 col-md-6 portfolio-item filter-vegetables">
          <div class="portfolio-wrap">
            <a href="assets/img/veg2.jpg" data-gallery="portfolio-gallery-vegetables" class="glightbox"><img src="assets/img/veg2.jpg" class="img-fluid" alt=""></a>
            <div class="portfolio-info">
              <h4><a href="portfolio-details.html" title="More Details">Green Beans</a></h4>
              <p><strong>Price per Unit:</strong> ZMW 30.99</p>
              <p><strong>Description:</strong> Locally grown, green beans for a healthy lifestyle.</p>
              <button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
            </div>
          </div>
        </div><!-- End Portfolio Item -->

<!-- Fruits Category -->
<div class="col-xl-4 col-md-6 portfolio-item filter-fruits">
  <div class="portfolio-wrap">
    <a href="assets/img/seed5.jpg" data-gallery="portfolio-gallery-fruits" class="glightbox"><img src="assets/img/seed5.jpg" class="img-fluid" alt=""></a>
    <div class="portfolio-info">
      <h4><a href="portfolio-details.html" title="More Details">Groundnuts</a></h4>
      <p><strong>Price per Unit:</strong> ZMW 10.00</p>
      <p><strong>Description:</strong> Fresh and delicious fruits from our local farmers.</p>
      <button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
    </div>
  </div>
</div><!-- End Portfolio Item -->

<!-- Vegetables Category -->
<div class="col-xl-4 col-md-6 portfolio-item filter-vegetables">
  <div class="portfolio-wrap">
    <a href="assets/img/veg3.jpg" data-gallery="portfolio-gallery-vegetables" class="glightbox"><img src="assets/img/veg3.jpg" class="img-fluid" alt=""></a>
    <div class="portfolio-info">
      <h4><a href="portfolio-details.html" title="More Details">Tomato</a></h4>
      <p><strong>Price per Unit:</strong> ZMW 20.99</p>
      <p><strong>Description:</strong> Locally grown tomatoes,for a healthy lifestyle of our customers.</p>
      <button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
    </div>
  </div>
</div><!-- End Portfolio Item -->
<!-- Fruits Category -->
<div class="col-xl-4 col-md-6 portfolio-item filter-fruits">
  <div class="portfolio-wrap">
    <a href="assets/img/slide4.jpg" data-gallery="portfolio-gallery-fruits" class="glightbox"><img src="assets/img/slide4.jpg" class="img-fluid" alt=""></a>
    <div class="portfolio-info">
      <h4><a href="portfolio-details.html" title="More Details">Maize</a></h4>
      <p><strong>Price per Unit:</strong> ZMW 450.00</p>
      <p><strong>Description:</strong> Fresh and delicious maize from our local farmers.</p>
      <button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
    </div>
  </div>
</div><!-- End Portfolio Item -->

<!-- Vegetables Category -->
<div class="col-xl-4 col-md-6 portfolio-item filter-vegetables">
  <div class="portfolio-wrap">
    <a href="assets/img/veg5.jpg" data-gallery="portfolio-gallery-vegetables" class="glightbox"><img src="assets/img/veg5.jpg" class="img-fluid" alt=""></a>
    <div class="portfolio-info">
      <h4><a href="portfolio-details.html" title="More Details">Onions</a></h4>
      <p><strong>Price per Unit:</strong> ZMW 10.99</p>
      <p><strong>Description:</strong> Locally grown, onions for a healthy lifestyle.</p>
      <button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
    </div>
  </div>
</div><!-- End Portfolio Item -->

   <!-- Others Category -->
   <div class="col-xl-4 col-md-6 portfolio-item filter-others">
    <div class="portfolio-wrap">
      <a href="assets/img/seed6.jpg" data-gallery="portfolio-gallery-others" class="glightbox"><img src="assets/img/seed6.jpg" class="img-fluid" alt=""></a>
      <div class="portfolio-info">
        <h4><a href="portfolio-details.html" title="More Details">Beans </a></h4>
        <p><strong>Price per Unit:</strong> ZMW 230.00/ Kg</p>
        <p><strong>Description:</strong> A premium quality of beans good for our customers</p>
        <button class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
      </div>
    </div>
  </div><!-- End Portfolio Item -->




        <!-- Add similar code for Animals, Fruits, Vegetables, and Others -->

      </div><!-- End Portfolio Container -->

    </div>

  </div>
</section><!-- End Portfolio Section -->

<!-- Display the cart -->
<div id="cart-container"></div>

<!-- Optionally, add a "Checkout" button -->
<button id="checkout-button">Checkout</button>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Contact</h2>
        </div>

        <div class="row gx-lg-0 gy-4">

          <div class="col-lg-4">

            <div class="info-container d-flex flex-column align-items-center justify-content-center">
              <div class="info-item d-flex">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h4>Location:</h4>
                  <p>Plot 2387, Independence Avenue, lusaka, Zambia</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h4>Email:</h4>
                  <p>fms@gmail.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-phone flex-shrink-0"></i>
                <div>
                  <h4>Call:</h4>
                  <p>+260976700685</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-clock flex-shrink-0"></i>
                <div>
                  <h4>Open Hours:</h4>
                  <p>Mon-Sat: 08AM - 9PM</p>
                </div>
              </div><!-- End Info Item -->
            </div>

          </div>

          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="7" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    
    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright <strong><span></span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- JS Files -->
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/plugins/aos/aos.js"></script>
  <script src="assets/plugins/glightbox/js/glightbox.min.js"></script>
  <script src="assets/plugins/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/plugins/swiper/swiper-bundle.min.js"></script>
  <script src="assets/plugins/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/plugins/php-email-form/validate.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  

</body>

</html>
