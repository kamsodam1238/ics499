<?php
session_start();
require '../database/database.php';

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle add to cart
if (isset($_POST['add_to_cart']) && isset($_POST['book_id'])) {
    $book_id = (int) $_POST['book_id'];
    if (!in_array($book_id, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $book_id;
    }
}

// Handle remove from cart
if (isset($_GET['remove'])) {
    $remove_id = (int) $_GET['remove'];
    $_SESSION['cart'] = array_filter($_SESSION['cart'], fn($id) => $id !== $remove_id);
}

// Fetch books in cart
$cart_books = [];
if (!empty($_SESSION['cart'])) {
    $placeholders = implode(',', array_fill(0, count($_SESSION['cart']), '?'));
    $stmt = $pdo->prepare("SELECT * FROM Books WHERE ID IN ($placeholders)");
    $stmt->execute($_SESSION['cart']);
    $cart_books = $stmt->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="mb-4 text-center">🛒 Your Cart</h2>

  <div class="text-end mb-3">
    <a href="../books/books.php" class="btn btn-secondary">⬅ Back to Books</a>
  </div>

  <?php if (empty($cart_books)): ?>
    <div class="alert alert-info">Your cart is empty.</div>
  <?php else: ?>
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>Title</th>
          <th>Author</th>
          <th>Year</th>
          <th>Language</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($cart_books as $book): ?>
        <tr>
          <td><?= htmlspecialchars($book['title']) ?></td>
          <td><?= htmlspecialchars($book['leadCreative']) ?></td>
          <td><?= $book['yearReleased'] ?></td>
          <td><?= $book['language'] ?></td>
          <td>
            <a href="?remove=<?= $book['ID'] ?>" class="btn btn-sm btn-danger">Remove</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div class="text-end">
      <a href="order.php" class="btn btn-success">✅ Confirm Purchase</a>
    </div>
  <?php endif; ?>
</div>
</body>
</html>