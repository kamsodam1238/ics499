<?php
//Include Header
require '../includes/header.php';
session_start();
require '../database/database.php';

$message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_input = trim($_POST['user_input']);
    $password = $_POST['password'];

    // Query by either username or email
    $stmt = $pdo->prepare("SELECT * FROM users WHERE uname = ? OR email = ?");
    $stmt->execute([$user_input, $user_input]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['uname'];
        header('Location: ../home.php'); // redirect after login
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
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-white p-4 rounded shadow">
            <h3 class="mb-4 text-center">User Login</h3>

            <!-- Display error message -->
            <?php if ($message): ?>
                <div class="alert alert-danger"><?= $message ?></div>
            <?php endif; ?>

            <!-- Login Form -->
            <form method="POST">
                <div class="mb-3">
                    <label for="user_input" class="form-label">Username or Email</label>
                    <input type="text" id="user_input" name="user_input" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>

            <!-- Register link -->
            <p class="text-center mt-3">
                Don't have an account? <a href="signup.html">Register here</a>
            </p>
        </div>
    </div>
</div>
</body>
</html>
<?php
//include footer
require '../includes/footer.php';
?>