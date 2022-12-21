<head>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<?php

include "$_SERVER[DOCUMENT_ROOT]/cpns-kkp/server.php";

if (isset($_POST['register'])){
    $nik = $_POST['nik'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM users WHERE email = '$email' AND nik = '$nik'";
    $get = mysqli_query($conn, $query);

    if ($get->num_rows > 0){
        echo '<script type="text/javascript">
            $(document).ready(function(){
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: "Woops! Email Sudah Terdaftar.",
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href="../../register.php";
                    }
                });
            }) 
        </script>';
    }else{
        $insert_query = "INSERT INTO users(nik, email, password) VALUES ('$nik', '$email', '$password')";
        $insert = mysqli_query($conn, $insert_query);

        if ($insert){
            echo '<script type="text/javascript">
                $(document).ready(function(){
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil",
                        text: "Selamat, registrasi berhasil!",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href="../../login.php";
                        }
                    });
                }) 
            </script>';
        }else{
            echo '<script type="text/javascript">
                $(document).ready(function(){
                    Swal.fire({
                        icon: "error",
                        title: "Wooops..",
                        text: "Gagal mendaftar. Cobalah beberapa saat lagi.",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href="../../register.php";
                        }
                    });
                }) 
            </script>';
        }
    }
}else{
    echo '<script type="text/javascript">
        $(document).ready(function(){
            Swal.fire({
                icon: "error",
                title: "Wooops..",
                text: "Terjadi kesalahan.",
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href="../../register.php";
                }
            });
        }) 
    </script>';
}

