<?php
// Start session and restrict to logged-in admins only
session_start();
require '../database/database.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../profile/admin_login.php");
    exit();
}

// Fetch all users from database
$stmt = $pdo->query("SELECT id, fname, lname, uname, email, role, created_at FROM users ORDER BY role ASC, created_at ASC");
$users = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Users</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="mb-4">User Management</h2>

  <!-- Button to the dashboard -->
  <a href="admin_dashboard.php" class="btn btn-outline-dark mb-3">⬅ Back to Dashboard</a>

  <!-- Link to add new user -->
  <a href="admin_add_user.php" class="btn btn-success mb-3">➕ Add New Account</a>

  <!-- Display all users and their roles in a table -->
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Created</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
      <tr>
        <td><?= $user['id'] ?></td>
        <td><?= htmlspecialchars($user['fname'] . ' ' . $user['lname']) ?></td>
        <td><?= htmlspecialchars($user['uname']) ?></td>
        <td><?= htmlspecialchars($user['email']) ?></td>
        <td><span class="badge bg-<?= $user['role'] === 'admin' ? 'primary' : 'secondary' ?>"><?= ucfirst($user['role']) ?></span></td>
        <td><?= $user['created_at'] ?></td>
        <td>
          <!-- Links to edit and delete user -->
          <a href="admin_edit_user.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="admin_delete_user.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
</body>
</html>