<?php
$servername = "localhost";
$db = "data";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
return $conn;
?>
