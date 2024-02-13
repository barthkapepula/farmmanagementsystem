<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

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

    // Retrieve form data
    $productName = $_POST["productName"];
    $category = $_POST["category"];
    $quantity = $_POST["quantity"];
    $pricePerUnit = $_POST["pricePerUnit"];
   
    // Prepare and execute the SQL query
    $sql = "INSERT INTO livestock_products (category, name, price, quantity) VALUES ('$category', '$productName', $pricePerUnit, $quantity)";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Product added successfully'); window.location.href = 'index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();

} else {
    // Redirect if the form is not submitted
    header("Location: index.php");
    exit();
}

?>
