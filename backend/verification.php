<head>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<?php 
  include "$_SERVER[DOCUMENT_ROOT]/cpns-kkp/server.php";

  if(isset($_GET)){
    $email = $_GET['email'];
    $status = $_GET['status'];
    $verified_by = $_GET['verified_by'];

    date_default_timezone_set('Asia/Jakarta');
    $verified_at = date('d-m-Y H:i:s', time());

    $query = "UPDATE users SET status='$status', verified_by='$verified_by', verified_at='$verified_at' WHERE email = '$email'";
    $get = mysqli_query($conn, $query);
    if($get){
        echo '<script type="text/javascript">
        $(document).ready(function(){
            Swal.fire({
                icon: "success",
                title: "Sukses",
                text: "Verifikasi berhasil!",
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href="../admin/dashboard.php";
                }
            });
        }) 
        </script>';
    }
  }
?>