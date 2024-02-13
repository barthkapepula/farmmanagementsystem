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

        // Remove password hashing for simplicity
        $hashedPassword = $password;

        $sql = "INSERT INTO users (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$hashedPassword')";
        if ($db->query($sql) === TRUE) {
            echo '<script>alert("Registration successful. You can now log in.");</script>';
            echo '<script>window.location = "login.php";</script>'; 
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
    } elseif (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $db->query($sql);

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if ($password === $user['password']) {
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


<!DOCTYPE html>
<html>
<head>
    <title>User Registration and Login</title>
    <style>
        body {
            background-image: url('your-background-image.jpg');
            background-size: cover;
            background-position: center;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        h1 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin: 10px 0;
            display: none; /* Hide forms by default */
        }

        input {
            width: 95%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #0074d9;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            font-size: 18px;
            padding: 15px 0;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        h1, h2 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
            color: #000; /* Black text color */
        }

        .show {
            display: block; /* Show the form */
        }
    </style>
</head>
<body>
<div class="form-container">
    <form id="registration-form" action="" method="post" class="show">
        <h1>Registration</h1>
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="register" value="Register">
    </form>

    <form id="login-form" action="" method="post">
        <h1>Login</h1>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="login" value="Login">
    </form>

    <p>
        <a href="javascript:void(0);" onclick="toggleForm('registration-form')">Register</a> |
        <a href="javascript:void(0);" onclick="toggleForm('login-form')">Login</a>
    </p>
</div>

<script>
    function toggleForm(formId) {
        var forms = document.querySelectorAll('.form-container form');
        forms.forEach(function(form) {
            if (form.id === formId) {
                form.classList.add('show');
            } else {
                form.classList.remove('show');
            }
        });
    }
</script>
</body>
</html>

