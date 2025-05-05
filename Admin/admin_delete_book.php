<?php
// Start session and allow only admin access
session_start();
require '../database/database.php';


// Delete book from Books table
if (isset($_GET['id']) && isset($_SESSION['admin_id'])) {
    $stmt = $pdo->prepare("DELETE FROM Books WHERE ID = ?");
    $stmt->execute([$_GET['id']]);
}

header("Location: ../home.php");
exit();
?>