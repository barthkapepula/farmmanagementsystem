function register() {
    // Dummy registration function for illustration purposes
    var newEmail = document.getElementById("newEmail").value;
    var newPassword = document.getElementById("newPassword").value;
    var confirmPassword = document.getElementById("confirmPassword").value;

    // Check if passwords match
    if (newPassword !== confirmPassword) {
        alert("Passwords do not match. Please try again.");
        return;
    }

    // Perform actual registration logic (e.g., send data to server)
    // For simplicity, redirect to login page after registration
    alert("Registration successful. You can now login.");
    window.location.href = "login.php";
}
