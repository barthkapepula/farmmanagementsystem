<?php
// Include the database connection file
include 'init_database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $category = $_POST['category'];
    $item = $_POST['item'];
    $quantity = $_POST['quantity'];
    $unit = $_POST['unit'];
    $price = $_POST['price'];
    $address = $_POST['address'];

    // Insert data into the delivery table
    $insertSQL = "INSERT INTO delivery (category, item, quantity, unit, price, address)
                  VALUES ('$category', '$item', $quantity, '$unit', $price, '$address')";

    if ($conn->query($insertSQL) === TRUE) {
        // Data inserted successfully
        http_response_code(200); // OK
    } else {
        // Error in SQL query
        http_response_code(500); // Internal Server Error
    }

    // Close the database connection
    $conn->close();
}
?>
