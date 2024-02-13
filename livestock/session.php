<?php
// Start the session
session_start();

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "fms";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Example validation (you should replace this with your own logic)
if ($username === 'your_username' && $password === 'your_password') {
    // Get the user's ID from your database (replace this with your database query)
    $user_id = 1; // Replace this with the actual user ID from your database

    // Set session variables
    $_SESSION['user_id'] = $user_id;
    $_SESSION['username'] = $username;

    // Redirect to the dashboard or any other secure page
    header("Location: dashboard.php");
    exit();
} else {
    // Display an error message
    $error_message = "Invalid username or password";
}

// Close the database connection
$conn->close();
?>
