<?php
$servername = "localhost";
$db = "data";
$username = "root";
$password = "root";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "connection succssful";
return $conn;
?>
