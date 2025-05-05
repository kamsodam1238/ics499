<?php
session_start();
require '../database/database.php';

$search = $_GET['search'] ?? '';
$books = [];

if ($search) {
    $stmt = $pdo->prepare("SELECT * FROM Books WHERE title LIKE ? OR leadCreative LIKE ? OR distributor LIKE ?");
    $like = "%$search%";
    $stmt->execute([$like, $like, $like]);
    $books = $stmt->fetchAll();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Search Results</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h3>🔍 Search Results for "<?= htmlspecialchars($search) ?>"</h3>
  <a href="../books/books.php" class="btn btn-secondary mb-3">⬅ Back to Books</a>

  <?php if (empty($books)): ?>
    <div class="alert alert-warning">No books found.</div>
  <?php else: ?>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php foreach ($books as $book): ?>
        <div class="col">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($book['title']) ?></h5>
              <p class="card-text"><?= htmlspecialchars($book['description']) ?></p>
              <p><strong>Author:</strong> <?= htmlspecialchars($book['leadCreative']) ?></p>
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
  <?php endif; ?>
</div>
</body>
</html>