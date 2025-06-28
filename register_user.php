<?php
include_once 'classes/db1.php';

// Example user data
$username = 'PESITM';
$password = 'PESITM'; // Plain password

// Hash the password before storing it in the database
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert the user into the database
$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $hashedPassword);

if ($stmt->execute()) {
    echo "New user registered successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
