<?php
include "$_SERVER[DOCUMENT_ROOT]/server.php";

if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $get = mysqli_query($conn, $query);

    if ($get->num_rows > 0){
        $row = mysqli_fetch_assoc($get);
        session_start();
        $_SESSION['email'] = $row['email'];
        header("Location: ../../dashboard.php");
    }else{
        header("Location: ../../login.php");
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}