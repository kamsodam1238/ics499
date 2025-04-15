<?php
// Database connection parameters
$host = 'localhost';        // Host name (usually localhost)
$db   = 'user_registration';    // Name of your database
$user = 'root';        // Your MySQL username
$pass = 'root';    // Your MySQL password

try {
    // Create a new PDO (PHP Data Object) instance to connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);

    // Set PDO to throw exceptions if any errors occur (for better error handling)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If connection fails, show error and stop execution
    die("Database connection failed: " . $e->getMessage());
}
?>
