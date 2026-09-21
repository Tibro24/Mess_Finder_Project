<?php

$host = "localhost";
$username = "root";
$db_password = "";
$database = "messfinderbd";

$conn = mysqli_connect($host, $username, $db_password, $database);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>