<?php
// dashboard.php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

echo "Welcome, " . $_SESSION['admin'] . "!";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .logout-btn { margin-top: 20px; }
    </style>
</head>
<body>
    <h2>Admin Dashboard</h2>
    <p>This is the admin panel.</p>
    <a class="logout-btn" href="logout.php">Logout</a>
</body>
</html>
