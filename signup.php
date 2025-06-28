<?php
// signup.php
session_start();
include 'classes/db1.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO admins (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "Sign up successful! You can now <a href='login.php'>login</a>.";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Sign Up</title>
    <link rel = "stylesheet" type = "text/css" href = "css/authentication.css">
    <style>
        body { font-family: Arial, sans-serif; }
        .form-container { width: 300px; margin: auto; padding: 20px; border: 1px solid #ccc; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Admin Sign Up</h2>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Sign Up">
        </form>
    </div>

    <script>
    // Optional: Show/Hide Password Toggle
    function togglePassword() {
        var passwordField = document.getElementById("password");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
    </script>

</body>
</html>
