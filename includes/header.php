<?php
// Start session only if it hasn't already been started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap and script imported -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../json/jscript.js"></script>
    <link href="../css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>

<body>
    <!-- Fixed header, smooth transitions between screen sizes with a background color and text color -->
    <div class="fixed-header container-fluid text-center bg-primary text-white">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col text-start h-auto col-1"><a href="../home.php" class="navbar-brand text-white text-decoration-none"> Logo </a></div>
            <div class="col animated-gradient-text fw-bold">WELCOME TO BOOK SPOT</div>
            <div class="col-1 col-fluid dropdown ">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none"
                    id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="Profile" width="50" height="50" class="rounded-circle">
                </a>
                <ul class="dropdown-menu dropdown-menu-end text-small" aria-labelledby="profileDropdown">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><a class="dropdown-item" href="/profile/logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a class="dropdown-item" href="/profile/login.php">User Login</a></li>
                        <li><a class="dropdown-item" href="/profile/adminlogin.php">Staff Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Main page content with auto scaling according to the content on the page -->
    <main class="col">
        <div>