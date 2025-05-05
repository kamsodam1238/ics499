<?php
// Start session and restrict access to admins
session_start();
require '../database/database.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../profile/admin_login.php");
    exit();
}

$message = '';

// Handle new user form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $role = $_POST['role'];
    $stmt = $pdo->prepare("INSERT INTO users (fname, lname, uname, email, password, role) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$fname, $lname, $uname, $email, $password, $role]);
    $message = "Account created.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Add Account</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h3 class="mb-4">Add New Account</h3>

  <!-- Button to the dashboard -->
  <a href="admin_dashboard.php" class="btn btn-outline-dark mb-3">⬅ Back to Dashboard</a>

  <!-- New user creation form -->
  <form method="POST" class="bg-white p-4 rounded shadow">
    <div class="row mb-3">
      <div class="col"><input type="text" name="fname" class="form-control" placeholder="First Name" required></div>
      <div class="col"><input type="text" name="lname" class="form-control" placeholder="Last Name" required></div>
    </div>
    <div class="mb-3"><input type="text" name="uname" class="form-control" placeholder="Username" required></div>
    <div class="mb-3"><input type="email" name="email" class="form-control" placeholder="Email" required></div>
    <div class="mb-3"><input type="password" name="password" class="form-control" placeholder="Password" required></div>
    <div class="mb-3">
      <select name="role" class="form-select">
        <option value="user">User</option>
        <option value="admin">Admin</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>

  <!-- Display confirmation message -->
  <?php if ($message): ?><div class="alert alert-success mt-3"><?= $message ?></div><?php endif; ?>
</div>
</body>
</html>