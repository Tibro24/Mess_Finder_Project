<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'db_connect.php';

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $university = $_POST['university'];
    $city = $_POST['city'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql =  "INSERT INTO `users` (`full_name`, `email`, `phone`, `university`, `city`, `password`, `created_at`) 
    VALUES ('$full_name', '$email', '$phone', '$university', '$city', '$password', current_timestamp())";
    if (mysqli_query($conn, $sql)) {
         echo "<script>
                alert('Registration successful! Welcome, $full_Name.');
                window.location.href = '/PUC_project_git/Mess_Finder_Project/html_files/index.html';
            </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>