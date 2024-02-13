<?php
// Your database connection details
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

// Process the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize data
    $itemList = isset($_POST['item-list']) ? $conn->real_escape_string($_POST['item-list']) : '';
    $phone = isset($_POST['phone']) ? $conn->real_escape_string($_POST['phone']) : '';
    $email = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : '';

    // Validate required fields
    if (empty($itemList) || empty($phone) || empty($email)) {
        echo "Please fill in all required fields.";
    } else {
        // Insert data into the 'orders' table
        $sql = "INSERT INTO orders (item_list, phone, email) VALUES ('$itemList', '$phone', '$email')";

        if ($conn->query($sql) === TRUE) {
            // Order placed successfully
            echo "Thank you for your order!";
            
            // Redirect to index.php after a short delay
            echo "<script>
                    setTimeout(function() {
                        window.location.href = 'index.php';
                    }, 3000);
                 </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>
