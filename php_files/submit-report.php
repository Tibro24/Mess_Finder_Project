<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['user_id'])) {
        header("Location: /PUC_project_git/Mess_Finder_Project/html_files/login.html");
        exit();
    }
    include 'db_connect.php';

    $reporter_id = $_SESSION['user_id'];
    $listing_id = $_POST['listing_id'];
    $reason = $_POST['reason'];
    $description = $_POST['description'];

    $sql = "INSERT INTO `reports` (`listing_id`, `reporter_id`, `reason`, `description`, `created_at`) 
    VALUES ('$listing_id', '$reporter_id', '$reason', '$description', current_timestamp())";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Report submitted. Thank you — our team will review it.');
                window.location.href = '/PUC_project_git/Mess_Finder_Project/html_files/seat.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>