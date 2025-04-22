<?php include("includes/header.php"); ?>

<main class="container mt-5">
<div class="container mt-5">
  <form action="/search/search.php" method="GET" class="d-flex" role="search">
    <input class="form-control me-2" type="search" name="query" placeholder="Search books..." aria-label="Search" required>
    <button class="btn btn-outline-primary" type="submit">Search</button>
  </form>
</div>

</main>

<?php include("includes/footer.php"); ?>
