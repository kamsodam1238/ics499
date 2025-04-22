<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connect to the database
require('../database/database.php'); // Make sure the path is correct

// Sanitize and prepare input
$fname   = htmlspecialchars($_POST['fname']);
$lname   = htmlspecialchars($_POST['lname']);
$uname   = htmlspecialchars($_POST['uname']);
$email   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$pass    = password_hash($_POST['password'], PASSWORD_DEFAULT); // Securely hash the password
$address = htmlspecialchars($_POST['address']);
$city    = htmlspecialchars($_POST['city']);
$state   = htmlspecialchars($_POST['state']);

try {
    // Check if user already exists by username or email
    $check = $pdo->prepare("SELECT * FROM users WHERE uname = ? OR email = ?");
    $check->execute([$uname, $email]);

    if ($check->rowCount() > 0) {
        echo "Username or email already exists.";
    } else {
        // Insert new user
        $stmt = $pdo->prepare("INSERT INTO users (fname, lname, uname, email, password, address, city, state)
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$fname, $lname, $uname, $email, $pass, $address, $city, $state]);
        echo "Registration successful!";
        header('Location: login.php'); // redirect after login
    }
} catch (PDOException $e) {
    // Show database errors
    echo "Error: " . $e->getMessage();
}
?>
