<?php

$host        = "localhost";
$dbname      = "cpns-kkp";
$user        = "root";
$password    = "";

$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn){
    die("<script>alert('Gagal menyambungkan ke server!') </script>");
}