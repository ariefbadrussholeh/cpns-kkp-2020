<head>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<?php 
    include "$_SERVER[DOCUMENT_ROOT]/cpns-kkp/server.php";

    if(isset($_POST["biodata"]) && isset($_FILES)){
        $nik = $_POST["nik"];
        $email = $_POST["email"];   
        $name = $_POST["name"];
        $dob = $_POST["date"];
        $sex = $_POST["sex"];
        $address = $_POST["address"];

        date_default_timezone_set('Asia/Jakarta');
        $biodata_submitted_at = date('d-m-Y H:i:s', time());

        $tmp_loc = $_FILES['photo']['tmp_name'];
        $path = $_FILES['photo']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        
        $photo = $nik.".".$ext;
        
        $target_path = "$_SERVER[DOCUMENT_ROOT]/cpns-kkp/storage/photo/";
        move_uploaded_file($tmp_loc, $target_path.$photo);

        $query = "UPDATE users SET name='$name', dob='$dob', sex='$sex', address='$address', photo='$photo', biodata_submitted_at='$biodata_submitted_at' WHERE email = '$email'";
        $get = mysqli_query($conn, $query);
        if($get){
            echo '<script type="text/javascript">
            $(document).ready(function(){
                Swal.fire({
                    icon: "success",
                    title: "Sukses",
                    text: "Biodata anda berhasil di submit!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href="../dashboard.php";
                    }
                });
            }) 
            </script>';
        }
    }


?>