<?php
include 'db_connect.php';

$id = $_GET['id'];

$sql = "DELETE FROM listings WHERE id = $id";
mysqli_query($conn, $sql);

header("Location: " . $_SERVER['HTTP_REFERER']);

exit();
?>