<?php
// Include the database connection file
include 'init_database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle AJAX request to calculate the price
    $quantity = $_POST['quantity'];
    $unit = $_POST['unit'];
    
    $unitPrice = ($unit === 'kg') ? 20 : 5;
    $totalPrice = $quantity * $unitPrice;

    echo number_format($totalPrice, 2);
}
?>
