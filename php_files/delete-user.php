<?php
session_start();

include 'db_connect.php';

$id = (int) $_GET['id'];
if ($id == $_SESSION['user_id']) {
    die("You are trying to delete youn account, and U r admin");
}

mysqli_query($conn, "DELETE FROM listings WHERE user_id = $id");
mysqli_query($conn, "DELETE FROM users WHERE id = $id");

header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
?>