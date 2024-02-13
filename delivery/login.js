function login() {
    // Dummy login function for illustration purposes
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    // Check credentials (replace with actual authentication logic)
    if (email === "user@example.com" && password === "password") {
        // Show the delivery form (redirect to delivery.php in a real-world scenario)
        window.location.href = "delivery.php";
    } else {
        alert("Invalid credentials. Please try again.");
    }
}
