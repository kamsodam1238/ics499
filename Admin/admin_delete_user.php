<?php
// Start session and allow only admin to delete
session_start();
require '../database/database.php';

// Delete user by ID
if (isset($_GET['id']) && isset($_SESSION['admin_id'])) {
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}

header("Location: admin_users.php");
exit();
?>