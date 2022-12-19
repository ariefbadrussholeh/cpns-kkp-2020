<head>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<?php
include "$_SERVER[DOCUMENT_ROOT]/cpns-kkp/server.php";

if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $get = mysqli_query($conn, $query);
    if ($get->num_rows > 0){
        $row = mysqli_fetch_assoc($get);
        session_start();
        $_SESSION['admin_email'] = $row['email'];
        header("Location: ../../admin/dashboard.php");
    }else{
        echo '<script type="text/javascript">
            $(document).ready(function(){
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Email atau password Anda salah. Silahkan coba lagi!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href="../../admin/login.php";
                    }
                });
            }) 
        </script>';
    }
}