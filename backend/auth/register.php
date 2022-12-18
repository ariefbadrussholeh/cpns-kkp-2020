<?php

include "$_SERVER[DOCUMENT_ROOT]/server.php";

if (isset($_POST['register'])){
    $nik = $_POST['nik'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM users WHERE email = '$email'";
    $get = mysqli_query($conn, $query);

    if ($get->num_rows > 0){
        echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
    }else{
        $insert_query = "INSERT INTO users(nik, email, password) VALUES ('$nik', '$email', '$password')";
        $insert = mysqli_query($conn, $insert_query);

        if ($insert){
            echo "<script>alert('Selamat, registrasi berhasil!')</script>";
            header("location: ../../login.php");
        }else{
            header("location: ../../register.php");
            echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
        }
    }
}else{
    header("location: ../../register.php");
    echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
}

