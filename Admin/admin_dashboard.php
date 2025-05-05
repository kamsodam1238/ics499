<?php
// Start session and restrict access to admins only
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../profile/admin_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <!-- Load Bootstrap CSS for styling -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <!-- Page Heading -->
  <h2 class="mb-4 text-center">📘 Admin Dashboard</h2>

  <!-- Navigation buttons to various admin features -->
  <div class="row g-4">
    <!-- Button to manage all users -->
    <div class="col-md-4">
      <a href="admin_users.php" class="btn btn-outline-primary w-100 p-3">
        👥 Manage Users
      </a>
    </div>
    <!-- Button to add new user -->
    <div class="col-md-4">
      <a href="admin_add_user.php" class="btn btn-outline-success w-100 p-3">
        ➕ Add New User
      </a>
    </div>
    <!-- Button to view all books in the collection -->
    <div class="col-md-4">
      <a href="admin_view_books.php" class="btn btn-outline-info w-100 p-3">
        📖 View Books
      </a>
    </div>
    <!-- Button to add new book -->
    <div class="col-md-4">
      <a href="admin_add_book.php" class="btn btn-outline-secondary w-100 p-3">
        📚 Add New Book
      </a>
    </div>
    <!-- Button to return to home page -->
    <div class="col-md-4">
      <a href="../home.php" class="btn btn-outline-dark w-100 p-3">
        🏠 Back to Home
      </a>
    </div>
    
    <!-- Button to log out of the admin session -->
    <div class="col-md-4">
      <a href="../profile/logout.php" class="btn btn-outline-danger w-100 p-3">
        🔓 Logout
      </a>
    </div>
  </div>
</div>
</body>
</html>