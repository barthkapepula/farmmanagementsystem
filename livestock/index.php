<?php
// Replace these values with your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get opening stock of the day
$openingQuery = "SELECT category, SUM(quantity) AS opening_stock FROM livestock_products WHERE DATE(created_at) = CURRENT_DATE GROUP BY category";

$openingResult = $conn->query($openingQuery);

// Query to get available stock quantities based on categories
$query = "SELECT category, name, SUM(quantity) AS total_quantity, SUM(quantity * price) AS total_amount FROM livestock_products GROUP BY category, name";

$result = $conn->query($query);

// Define icons for each category
$categoryIcons = [
    'animals' => '🐄',
    'fruits' => '🍇',
    'birds' => '🐦',
    'vegetables' => '🥦',
    'others' => '🌟',
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Available Stocks</title>
    <meta content="Farm Management System for Livestock, Crops, and Machinery" name="description">
    <meta content="farm, livestock, crops, machinery" name="keywords">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <style>
        body {
            background-color: white;
        }

        .card-text b {
            font-weight: bold;
        }
    </style>
</head>

<body>
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

        <!-- Content Section -->
        <section id="available-stocks" class="available-stocks sections-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Available Stocks Chart</h2>
                </div>

                <?php
                $currentCategory = null;

                // Iterate through the query results
                while ($row = $result->fetch_assoc()) {
                    $category = $row['category'];
                    $productName = $row['name'];
                    $totalQuantity = $row['total_quantity'];
                    $totalAmount = $row['total_amount'];

                    // Get the opening stock for the category
                    $openingStock = 0;
                    if ($openingRow = $openingResult->fetch_assoc()) {
                        $openingStock = $openingRow['opening_stock'];
                    }

                    // Get the category icon
                    $icon = isset($categoryIcons[$category]) ? $categoryIcons[$category] : '🌟';

                    // Start a new row when a new category is encountered
                    if ($category != $currentCategory) {
                        if ($currentCategory !== null) {
                            echo "</div>";
                        }
                        echo "<div class='row'>";
                        $currentCategory = $category;
                    }

                    // Use Bootstrap card to display category, product, opening stock, quantity, and total amount with a white background
                    echo "<div class='col-md-4 mb-4'>";
                    echo "<div class='card text-center'>";
                    echo "<div class='card-body' style='background-color: #ffffff;'>";
                    echo "<h5 class='card-title'>$icon $productName</h5>";
                    echo "<p class='card-text'>Opening Stock: $openingStock</p>";
                    echo "<p class='card-text'>Quantity: $totalQuantity</p>";
                    echo "<p class='card-text'>Total Amount: <b>ZMW $totalAmount</b></p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }

                // Close the last row
                echo "</div>";
                ?>

            </div>
        </section>
        <!-- End Content Section -->

    </body>

    </html>

    <?php
    // Close the database connection
    $conn->close();
    ?>
