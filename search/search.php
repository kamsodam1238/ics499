<?php

//Include Header
require '../includes/header.php';
// Include database connection
require '../database/database.php';

// Get the search query from the URL and trim whitespace
$query = isset($_GET['query']) ? trim($_GET['query']) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta and title -->
    <meta charset="UTF-8">
    <title>Search Results</title>

    <!-- Custom styles and Bootstrap -->
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <!-- Display the search term -->
    <h2 class="mb-4">Search Results for: <em><?= htmlspecialchars($query) ?></em></h2>

    <?php
    if ($query) {
        // Add wildcards for partial match
        $searchTerm = '%' . $query . '%';

        // Prepare SQL query to search by title or leadCreative (author)
        $stmt = $pdo->prepare("SELECT * FROM Books WHERE title LIKE ? OR leadCreative LIKE ?");
        $stmt->execute([$searchTerm, $searchTerm]);

        // Fetch all matching results
        $books = $stmt->fetchAll();

        // If books are found, display them in a table
        if (count($books) > 0): ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Year</th>
                            <th>Format</th>
                            <th>Language</th>
                            <th>In Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($books as $book): ?>
                            <tr>
                                <!-- Display each book's info -->
                                <td><?= htmlspecialchars($book['title']) ?></td>
                                <td><?= htmlspecialchars($book['leadCreative']) ?></td>
                                <td><?= $book['yearReleased'] ?></td>
                                <td><?= $book['format'] ?></td>
                                <td><?= $book['language'] ?></td>
                                <td><?= $book['quantInStock'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <!-- Show message if no results found -->
            <div class="alert alert-warning">No results found.</div>
        <?php endif;

    } else {
        // If no query was entered
        echo "<div class='alert alert-danger'>No search term provided.</div>";
    }
    ?>
</div>
</body>
</html>
<?php
//include footer
require '../includes/footer.php';
?>
