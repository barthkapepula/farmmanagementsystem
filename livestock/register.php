<?php
$db = new mysqli('localhost', 'root', '', 'fms');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO farmers (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$hashedPassword')";
        if ($db->query($sql) === TRUE) {
            echo '<script>alert("Registration successful.");</script>';
            echo '<script>window.location = "addLivestock.php";</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
    } elseif (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM farmers WHERE email='$email'";
        $result = $db->query($sql);

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                echo "Login successful";
            } else {
                echo "Login failed";
            }
        } else {
            echo "Login failed";
        }
    }
}

$db->close();
?>
