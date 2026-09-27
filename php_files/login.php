<?php
session_start();
include "db_connect.php";

if (isset($_POST['login'])) {

    $username = $_POST['full_name'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM users WHERE full_name = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user && $password === $user['password']) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        if($user['role'] === 'admin'){
            header("Location: admin.php");
        } else{
            header("Location: index.php");
        }
        exit();
    } else {
        echo "Wrong username or password.";
    }
}
?>