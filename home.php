<?php include("includes/header.php"); ?>

<main class="container mt-5">
  <div class="container mt-5">
    <form action="/search/search_result.php" method="GET" class="d-flex" role="search">
      <input class="form-control me-2" type="search" name="query" placeholder="Search books..." aria-label="Search" required>
      <button class="btn btn-outline-primary" type="submit">Search</button>
    </form>
  </div>
  <!-- Book Carousel Section -->
  <div class="container mt-5">
    <h2 class="mb-4 text-center">Featured Books</h2>

    <!-- Bootstrap Carousel with static image links -->
    <div id="bookCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
      <div class="carousel-inner">

        <!-- Slide 1 (active) -->
        <div class="carousel-item active text-center">
          <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=300&h=400&q=80"
            class="d-block mx-auto" alt="Book Cover">
          <h5 class="mt-3">The Hidden Shelf</h5>
          <p class="text-muted">Jesse Porter</p>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item text-center">
          <img src="https://images.unsplash.com/photo-1553729459-efe14ef6055d?auto=format&fit=crop&w=300&h=400&q=80"
            class="d-block mx-auto" alt="Library Book">
          <h5 class="mt-3">Borrowed Time</h5>
          <p class="text-muted">Jackson Morrison</p>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item text-center">
          <img src="https://images.unsplash.com/photo-1516979187457-637abb4f9353?auto=format&fit=crop&w=300&h=400&q=80"
            class="d-block mx-auto" alt="Literature Stack">
          <h5 class="mt-3">Whispers of Paper</h5>
          <p class="text-muted">Nancy Waters</p>
        </div>

        <!-- Slide 4 -->
        <div class="carousel-item text-center">
          <img src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&w=300&h=400&q=80"
            class="d-block mx-auto" alt="Open Book">
          <h5 class="mt-3">Through the Spine</h5>
          <p class="text-muted">Tony Anderson</p>
        </div>

        <!-- Slide 5 -->
        <div class="carousel-item text-center">
          <img src="https://images.unsplash.com/photo-1524985069026-dd778a71c7b4?auto=format&fit=crop&w=300&h=400&q=80"
            class="d-block mx-auto" alt="Books on Desk">
          <h5 class="mt-3">Flames and Ink</h5>
          <p class="text-muted">Patricia Barrett</p>
        </div>

        <!-- Slide 6 -->
        <div class="carousel-item text-center">
          <img src="https://images.unsplash.com/photo-1528207776546-365bb710ee93?auto=format&fit=crop&w=300&h=400&q=80"
            class="d-block mx-auto" alt="Book Collection">
          <h5 class="mt-3">The Forgotten Shelf</h5>
          <p class="text-muted">Shannon Thomas</p>
        </div>

        <!-- Slide 7 -->
        <div class="carousel-item text-center">
          <img src="https://images.unsplash.com/photo-1495446815901-a7297e633e8d?auto=format&fit=crop&w=300&h=400&q=80"
            class="d-block mx-auto" alt="Vintage Book">
          <h5 class="mt-3">Vintage Pages</h5>
          <p class="text-muted">Tina Hensley</p>
        </div>

        <!-- Slide 8 -->
        <div class="carousel-item text-center">
          <img src="https://images.unsplash.com/photo-1516979187457-637abb4f9353?auto=format&fit=crop&w=300&h=400&q=80"
            class="d-block mx-auto" alt="Stacked Books">

          <h5 class="mt-3">Stacked Wisdom</h5>
          <p class="text-muted">Brianna Curtis</p>
        </div>

        <!-- Slide 9 -->
        <div class="carousel-item text-center">
          <img src="https://images.unsplash.com/photo-1528207776546-365bb710ee93?auto=format&fit=crop&w=300&h=400&q=80"
            class="d-block mx-auto" alt="Classic Book Stack">


          <h5 class="mt-3">Timeless Reads</h5>
          <p class="text-muted">Christina Ortiz</p>
        </div>

        <!-- Slide 10 -->
        <div class="carousel-item text-center">
          <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=300&h=400&q=80"
            class="d-block mx-auto" alt="Fantasy Book">
          <h5 class="mt-3">Fantasy Realm</h5>
          <p class="text-muted">Cindy Williams</p>
        </div>

      </div>

      <!-- Carousel Controls (Previous / Next) -->
      <button class="carousel-control-prev" type="button" data-bs-target="#bookCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>

      <button class="carousel-control-next" type="button" data-bs-target="#bookCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <!-- View all books -->
  <div class="text-center mt-4">
  <a href="../books/books.php" class="btn btn-primary btn-lg">📚 View All Books</a>
</div>


</main>

<?php include("includes/footer.php"); ?>