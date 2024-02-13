<?php
$servername = "localhost";
$username = "root";
$password = "fms";
$dbname = "your_database_name"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Uncomment the following line if you want to set the character set
// $conn->set_charset("utf8");

// You can add more configuration or initialization here if needed

// Close the connection after including this file
// $conn->close();

// Return the connection object so it can be reused in other files
return $conn;
?>
