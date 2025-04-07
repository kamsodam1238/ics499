<?php
// Establish a connection to the database
$conn = include 'C:\xampp\htdocs\ics499\database\database.php';

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
    $sql2 = "INSERT INTO Users.Info (firstName, lastName, email, streetAddress, city, state) 
            VALUES ('$fname, $lname, $email, $address, $city, $state')";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        if($conn->query($sql2) === TRUE)
        echo "Registration successful!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>