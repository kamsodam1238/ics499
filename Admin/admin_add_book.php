<?php
// Start session and allow only admin access
session_start();
require '../database/database.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../profile/admin_login.php");
    exit();
}

// Add book data to database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO Books (title, format, yearReleased, countryOfOrigin, language, description, totalQuant, quantInStock, leadCreative, otherAuthors, distributor, edition, ISBN, deweyDecimal)
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['title'], $_POST['format'], $_POST['yearReleased'], $_POST['countryOfOrigin'],
        $_POST['language'], $_POST['description'], $_POST['totalQuant'], $_POST['quantInStock'],
        $_POST['leadCreative'], $_POST['otherAuthors'], $_POST['distributor'], $_POST['edition'],
        $_POST['ISBN'], $_POST['deweyDecimal']
    ]);
    echo "Book added.";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Book</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h3>Add New Book</h3>
  <!-- Button to the dashboard -->
  <a href="admin_dashboard.php" class="btn btn-outline-dark mb-3">⬅ Back to Dashboard</a>

  <!-- Book creation form -->
  <form method="POST" class="bg-white p-4 rounded shadow">
    <input name="title" placeholder="Title" class="form-control mb-2" required>
    <input name="format" placeholder="Format" class="form-control mb-2">
    <input name="yearReleased" placeholder="Year Released" type="number" class="form-control mb-2">
    <input name="countryOfOrigin" placeholder="Country of Origin" class="form-control mb-2">
    <input name="language" placeholder="Language" class="form-control mb-2">
    <textarea name="description" placeholder="Description" class="form-control mb-2"></textarea>
    <input name="totalQuant" placeholder="Total Quantity" type="number" class="form-control mb-2">
    <input name="quantInStock" placeholder="Quantity in Stock" type="number" class="form-control mb-2">
    <input name="leadCreative" placeholder="Lead Author" class="form-control mb-2">
    <input name="otherAuthors" placeholder="Other Authors" class="form-control mb-2">
    <input name="distributor" placeholder="Publisher" class="form-control mb-2">
    <input name="edition" placeholder="Edition" class="form-control mb-2">
    <input name="ISBN" placeholder="ISBN" class="form-control mb-2">
    <input name="deweyDecimal" placeholder="Dewey Decimal" class="form-control mb-2">
    <button type="submit" class="btn btn-success">Add Book</button>
  </form>
</div>
</body>
</html>