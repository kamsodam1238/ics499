<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap and script imported -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="json/jscript.js"></script>
    <link href="css/style.css" rel="stylesheet">
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
            <div class="col text-start h-auto col-4">Logo</div>
            <div class="col">Menu</div>
            <div class="col">Column</div>
            <div class="col-1 col-fluid dropdown " >
                <a href="#" class="d-flex align-items-center text-white text-decoration-none " data-bs-toggle="dropdown">
                    <img src="images/icons8-test-account-color-96.png" alt="profile login" width="50" height="50">
                </a>
                <ul class="dropdown-menu bg-secondary">
                <li><a class="dropdown-item" href="/profile/signup.html">User Login</a></li>
                    <li><a class="dropdown-item" href="#">Staff Login</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Main page content with auto scaling according to the content on the page -->
    <main class="col">
        <div>