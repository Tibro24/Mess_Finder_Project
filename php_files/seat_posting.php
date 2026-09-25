<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['user_id'])) {
        header("Location: /PUC_project_git/Mess_Finder_Project/html_files/login.html");
        exit();
    }
    include 'db_connect.php';

    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $city = $_POST['city'];
    $area = $_POST['area'];
    $monthly_rent = $_POST['monthly_rent'];
    $seat_type = $_POST['seat_type'];
    $food = $_POST['food'];
    $bathroom = $_POST['bathroom'];
    $internet = $_POST['internet'];
    $electricity = $_POST['electricity'];
    $available_from = $_POST['available_from'];
    $description = $_POST['description'];

    //Handle photo
    $file_name = '';
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
        $file_name = time() . '_' . $_FILES['photo']['name'];
        $img_temp_name = $_FILES['photo']['tmp_name'];
        $img_loc = "../mess_photos/" . $file_name;
        move_uploaded_file($img_temp_name, $img_loc);
    }

    $sql = "INSERT INTO `listings` (`user_id`, `title`, `city`, `area`, `monthly_rent`, `seat_type`, `food`, `bathroom`, `internet`, `electricity`, `available_from`, `description`, `photo`, `created_at`) 
    VALUES ('$user_id', '$title', '$city', '$area', '$monthly_rent', '$seat_type', '$food', '$bathroom', '$internet', '$electricity', '$available_from', '$description', '$file_name', current_timestamp())";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Listing posted successfully!');
                window.location.href = '/PUC_project_git/Mess_Finder_Project/php_files/index.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>