<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Farm Management System</title>
  <meta content="Farm Management System for Livestock, Crops, and Machinery" name="description">
  <meta content="farm, livestock, crops, machinery" name="keywords">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- CSS Files -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="..assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="..assets/plugins/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="..assets/plugins/aos/aos.css" rel="stylesheet">
  <link href="..assets/plugins/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="..assets/plugins/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-pzjeHYb8Od8HJbjkuWIC3BfKnSNnixjSdJ+gKrdpGN/XK8H5c5frI3kXgmwd5qhyJ0s31AFObZYYh9XKRD9LAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  

</head>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Farm Management System</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
                        <a class="nav-link" href="addLivestock.php">Add Livestock</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Check Stock</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Log out</a>
                    </li>
                </ul>
      </div>
    </div>
  </nav>
<body>

  
  <!-- ======= Livestock Form Section ======= -->
  <section id="livestock-form" class="livestock-form sections-bg">
    <div class="container" data-aos="fade-up">

    <div class="livestock-form">
    <div class="form-container">
      <div class="section-header">
        <h2>Add Livestock Product</h2>
      
      <form action="process_livestock.php" method="post">
        <div class="mb-3">
            
          <label for="productName" class="form-label">Product Name</label>
          <input type="text" class="form-control" id="productName" name="productName" required>
        </div>

        <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <select class="form-select" id="category" name="category" required>
            <option value="animals">Animals</option>
            <option value="fruits">Fruits</option>
            <option value="birds">Birds</option>
            <option value="vegetables">Vegetables</option>
            <option value="others">Others</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="quantity" class="form-label">Quantity</label>
          <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>

        <div class="mb-3">
          <label for="pricePerUnit" class="form-label">Price per Unit (ZMW)</label>
          <input type="number" step="0.01" class="form-control" id="pricePerUnit" name="pricePerUnit" required>
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Product</button>
      </form>

    </div>
  </section><!-- End Livestock Form Section -->

  </body>

</html>