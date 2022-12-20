<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="./public/img/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="./public/img/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="./public/img/favicon/favicon-16x16.png" />
    <link rel="manifest" href="./public/img/favicon/site.webmanifest" />
    <!-- Style -->
    <link rel="stylesheet" href="./public/css/style2.css" />
    <script src="https://kit.fontawesome.com/67af74f10d.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Seleksi Penerimaan CPNS KKP 2022</title>
  </head>

  <?php
    session_start();
    if (!isset($_SESSION['email'])){
        header("Location: login.php");
    } 
    $email = $_SESSION['email'];

    include "./backend/functions.php";
    $calon_pegawai = read("SELECT * FROM users WHERE email = '$email'")[0];
    $nik = $calon_pegawai['nik'];
    $biodata_submitted_at = $calon_pegawai['biodata_submitted_at'];
  ?>

  <body>
    <?php include './public/component/header.php'?>
    <div class="container">
      <?php include './public/component/navbar.php'?>
      <div class="flex" id="1">
        <h1>Biodata</h1>
        <form action="./backend/submit-biodata.php" method="POST" enctype="multipart/form-data">
          <div class="flex-container">
            <div class="upload-photos" id="upload-photos">
              <img src="./public/img/User Logo.svg" alt="">
              <p id="title">Masukkan foto berukuran 4x6</p>
            </div>
            <input type="file" name="photo" id="photo" accept="image/png, image/jpeg" hidden required>
            <div class="form-group">
              <div class="input-group">
                <label for="nik">NIK</label>
                <input type="text" value="<?= $nik ?>" disabled/>
                <input type="text" name="nik" id="nik" value="<?= $nik ?>" hidden/>
              </div>
              <div class="input-group">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" placeholder="Masukkan nama lengkap anda" autocomplete="off" required/>
              </div>
              <div class="input-group">
                <label for="date">Tanggal Lahir</label>
                <input type="date" name="date" id="date" required/>
              </div>
              <div class="input-group">
                <label for="sex">Jenis Kelamin</label>
                <select name="sex" id="sex">
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
            </div>
          </div>
          <div class="input-group">
            <label for="address">Alamat</label>
            <input type="text" name="address" id="adress" placeholder="Masukkan alamat lengkap" autocomplete="off" required/>
          </div>
          <div class="input-group">
            <input type="checkbox" id="aggreement" required>
            <label for="aggreement" class="check">saya mengaku bahwa data yang saya masukkan adalah data asli</label>
          </div>
          <input type="text" name="email" id="email" value="<?= $email ?>" hidden/>
          <button type="button" onclick="validateSubmitBiodata()">Submit</button>
          <button type="submit" name="biodata" hidden id="submit-biodata">Submit</button>
        </form>
      </div>
      <!-- Ini untuk kondisi sudah mengisi biodata -->
      <div id="2" class="done" style="display: none;">
        <img src="./public/img/success icon component.svg" alt="">
        <p>Anda sudah mengisi biodata</p>
      </div>

      <input type="text" id="submit" value="<?= $biodata_submitted_at ?>" hidden>
    </div>
    <!-- Javascript -->
    <script src="./public/js/navbar-toggle.js"></script>
    <script src="./public/js/drop-photo.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      function validateSubmitBiodata() {
        const submitBiodata = document.getElementById("submit-biodata");
        $(document).ready(function () {
          Swal.fire({
            icon: "question",
            title: "Anda yakin ingin submit?",
            showDenyButton: true,
            confirmButtonText: "Iya",
            denyButtonText: `Tidak`,
          }).then((result) => {
            if (result.isConfirmed) {
              submitBiodata.click()
            }
          });
        });
      }

      const biodataSubmittedAt = document.getElementById("submit");
      if(biodataSubmittedAt.value != ""){
        document.getElementById("1").style.display = "none";
        document.getElementById("2").style.display = "flex";
      }
    </script>
  </body>
</html>
