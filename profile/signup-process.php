<?php
// Establish a connection to the database
$conn = include './database/database.php';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];

    // Construct the SQL query
    $sql = "INSERT INTO Users.logon (Username, Pass) 
            VALUES ('$uname, $password')";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>