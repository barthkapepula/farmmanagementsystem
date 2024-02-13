<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Login - Farm Delivery System</title>
    <!-- Add your CSS stylesheets and Bootstrap here -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h2>Login</h2>

        <!-- Login Form -->
        <div class="login-container">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button onclick="login()">Login</button>
        </div>

        <!-- Toggle to Registration Form -->
        <p>Don't have an account? <a href="register.php">Register here</a>.</p>
    </div>

    <script src="login.js"></script>
</body>

</html>
