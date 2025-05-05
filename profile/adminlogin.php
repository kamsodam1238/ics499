<?php
session_start();
require '../database/database.php';

$message = '';

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_input = trim($_POST['user_input']);
    $password = $_POST['password'];

    // Check for match by username or email
    $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ? OR email = ?");
    $stmt->execute([$user_input, $user_input]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_username'] = $admin['username'];
        header('Location: ../Admin/admin_dashboard.php'); // Change to your admin page
        exit();
    } else {
        $message = "Invalid username/email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6 bg-white p-4 rounded shadow">
        <h3 class="mb-4 text-center">Admin Login</h3>

        <?php if ($message): ?>
          <div class="alert alert-danger"><?= $message ?></div>
        <?php endif; ?>

        <form method="POST">
          <div class="mb-3">
            <label for="user_input" class="form-label">Username or Email</label>
            <input type="text" name="user_input" id="user_input" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
