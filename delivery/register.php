<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Register - Farm Delivery System</title>
    <!-- Add your CSS stylesheets and Bootstrap here -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h2>Register</h2>

        <!-- Registration Form -->
        <div class="register-container">
            <label for="newEmail">Email:</label>
            <input type="text" id="newEmail" name="newEmail" required>

            <label for="newPassword">Password:</label>
            <input type="password" id="newPassword" name="newPassword" required>

            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>

            <button onclick="register()">Register</button>
        </div>

        <!-- Toggle to Login Form -->
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </div>

    <script src="register.js"></script>
</body>

</html>
