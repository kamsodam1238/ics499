<?php
// Start session and restrict access to admin only
session_start();
require '../database/database.php';
if (!isset($_SESSION['admin_id']) || !isset($_GET['id'])) {
    header("Location: admin_users.php");
    exit();
}

$id = $_GET['id'];

// Fetch user data to be edited
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();

// Update user data on form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $stmt = $pdo->prepare("UPDATE users SET fname = ?, lname = ?, email = ?, role = ? WHERE id = ?");
    $stmt->execute([$fname, $lname, $email, $role, $id]);
    header("Location: admin_users.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit User</title>
  <!-- Load Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h3>Edit Account</h3>

  <!-- Button to the dashboard -->
  <a href="admin_dashboard.php" class="btn btn-outline-dark mb-3">⬅ Back to Dashboard</a>
  
  <!-- User edit form -->
  <form method="POST" class="bg-white p-4 rounded shadow">
    <input type="text" name="fname" class="form-control mb-2" value="<?= $user['fname'] ?>" required>
    <input type="text" name="lname" class="form-control mb-2" value="<?= $user['lname'] ?>" required>
    <input type="email" name="email" class="form-control mb-2" value="<?= $user['email'] ?>" required>
    <select name="role" class="form-select mb-2">
      <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>User</option>
      <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
    </select>
    <button type="submit" class="btn btn-warning">Update</button>
  </form>
</div>
</body>
</html>