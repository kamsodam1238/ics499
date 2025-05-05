<?php
// Start session and load database connection
session_start();
require '../database/database.php';

// Redirect to cart if no items are in the session cart
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit();
}

// Fetch selected books from the database
$cart_books = [];
$book_ids = $_SESSION['cart'];

if (!empty($book_ids)) {
    $placeholders = implode(',', array_fill(0, count($book_ids), '?'));
    $stmt = $pdo->prepare("SELECT * FROM Books WHERE ID IN ($placeholders)");
    $stmt->execute($book_ids);
    $cart_books = $stmt->fetchAll();
}

// Clear the cart after confirming the order
$_SESSION['cart'] = [];

// Calculate the pickup date (2 business days from today)
function getPickupDate($days) {
    $date = new DateTime();
    while ($days > 0) {
        $date->modify('+1 day');
        if (!in_array($date->format('N'), ['6', '7'])) { // 6 = Saturday, 7 = Sunday
            $days--;
        }
    }
    return $date->format('l, F j, Y');
}

$pickupDate = getPickupDate(2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Order Confirmation</title>
  <!-- Load Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">

  <!-- Confirmation message -->
  <h2 class="mb-4 text-success text-center">✅ Purchase Confirmed!</h2>

  <!-- Pickup date shown dynamically -->
  <p class="text-center">
    Your books will be ready for pickup on <strong><?= $pickupDate ?></strong>.
  </p>

  <!-- List of purchased books -->
  <div class="card mt-4">
    <div class="card-header bg-dark text-white">
      Purchased Items
    </div>
    <ul class="list-group list-group-flush">
      <?php foreach ($cart_books as $book): ?>
        <li class="list-group-item">
          <strong><?= htmlspecialchars($book['title']) ?></strong>
          by <?= htmlspecialchars($book['leadCreative']) ?> (<?= $book['yearReleased'] ?>)
        </li>
      <?php endforeach; ?>
    </ul>
  </div>

  <!-- Navigation -->
  <div class="text-center mt-4">
    <a href="../home.php" class="btn btn-primary">⬅ Return to Homepage</a>
  </div>

</div>
</body>
</html>
