<?php
// Start session and ensure only admin can access
session_start();
require '../database/database.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../profile/admin_login.php");
    exit();
}

// Fetch all books
$stmt = $pdo->query("SELECT * FROM Books ORDER BY title ASC");
$books = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Books</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h3 class="mb-4">📚 Book Collection</h3>
  <a href="admin_dashboard.php" class="btn btn-outline-dark mb-3">⬅ Back to Dashboard</a>
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Year</th>
        <th>Stock</th>
        <th>Language</th>
        <th>Format</th>
        <th>ISBN</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($books as $book): ?>
      <tr>
        <td><?= htmlspecialchars($book['title']) ?></td>
        <td><?= htmlspecialchars($book['leadCreative']) ?></td>
        <td><?= htmlspecialchars($book['yearReleased']) ?></td>
        <td><?= htmlspecialchars($book['quantInStock']) ?>/<?= htmlspecialchars($book['totalQuant']) ?></td>
        <td><?= htmlspecialchars($book['language']) ?></td>
        <td><?= htmlspecialchars($book['format']) ?></td>
        <td><?= htmlspecialchars($book['ISBN']) ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
</body>
</html>