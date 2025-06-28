<?php
// login.php
session_start();
include 'classes/db1.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin'] = $admin['username'];
        header("Location: adminPage.php");
    } else {
        echo "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel = "stylesheet" type = "text/css" href = "css/authentication.css">
    <style>
        body { font-family: Arial, sans-serif; }
        .form-container { width: 300px; margin: auto; padding: 20px; border: 1px solid #ccc; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Admin Login</h2>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Login">
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
