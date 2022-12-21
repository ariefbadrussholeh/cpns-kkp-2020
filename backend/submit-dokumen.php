<head>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<?php 
  include "$_SERVER[DOCUMENT_ROOT]/server.php";

  if(isset($_POST["dokumen"]) && isset($_FILES)){

    $nik = $_POST["nik"];
    $email = $_POST["email"];
    $position = $_POST["position"];
    $time = $_POST["time"];
    $location = $_POST["location"];

    date_default_timezone_set('Asia/Jakarta');
    $document_submitted_at = date('d-m-Y H:i:s', time());

    $tmp_loc = $_FILES['ijazah']['tmp_name'];
    $path = $_FILES['ijazah']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    
    $ijazah = "ijazah_".$nik.".".$ext;

    $target_path = "$_SERVER[DOCUMENT_ROOT]/storage/ijazah/";
    move_uploaded_file($tmp_loc, $target_path.$ijazah);
    
    $tmp_loc = $_FILES['cv']['tmp_name'];
    $path = $_FILES['cv']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    
    $cv = "cv_".$nik.".".$ext;

    $target_path = "$_SERVER[DOCUMENT_ROOT]/storage/cv/";
    move_uploaded_file($tmp_loc, $target_path.$cv);

    $query = "UPDATE users SET position_apply='$position', time_test='$time', location_test='$location', cv='$cv', ijazah='$ijazah', document_submitted_at='$document_submitted_at' WHERE email = '$email'";
    $get = mysqli_query($conn, $query);
    if($get){
        echo '<script type="text/javascript">
        $(document).ready(function(){
            Swal.fire({
                icon: "success",
                title: "Sukses",
                text: "Dokumen anda berhasil di submit!",
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href="../dashboard.php";
                }
            });
        }) 
        </script>';
    }else{
        echo '<script type="text/javascript">
            $(document).ready(function(){
                Swal.fire({
                    icon: "error",
                    title: "Wooops...",
                    text: "Terjadi kesalahan, coba beberapa saat lagi!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href="../dokumen.php";
                    }
                });
            }) 
            </script>';
    }
  }
?>
