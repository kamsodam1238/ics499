<?php
// Start session to track user cart
session_start();
require '../database/database.php';

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
  <h2 class="mb-4 text-center">📚 Available Books</h2>

  <div class="text-end mb-3">
    <a href="../cart/cart.php" class="btn btn-warning">🛒 View Cart</a>
  </div>

  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach ($books as $book): ?>
      <div class="col">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($book['title']) ?></h5>
            <p class="card-text"><?= htmlspecialchars($book['description']) ?></p>
            <p><strong>Author:</strong> <?= htmlspecialchars($book['leadCreative']) ?></p>
            <p><strong>Year:</strong> <?= htmlspecialchars($book['yearReleased']) ?></p>
            <p><strong>Language:</strong> <?= htmlspecialchars($book['language']) ?></p>
            <form action="../cart/cart.php" method="POST">
              <input type="hidden" name="book_id" value="<?= $book['ID'] ?>">
              <button type="submit" name="add_to_cart" class="btn btn-outline-primary w-100">Add to Cart</button>
            </form>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
</body>
</html>