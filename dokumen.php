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
    $nik = read("SELECT nik FROM users WHERE email = '$email'")[0]['nik'];
  ?>

  <body>
    <?php include './public/component/header.php'?>
    <div class="container">
      <?php include './public/component/navbar.php'?>
      <div class="flex">
        <h1>Dokumen Peserta</h1>
        <form action="Test.php" method="POST" enctype="multipart/form-data">
          <div class="input-group">
            <h5>Melamar Posisi</h5>
            <div class="flex-container">
              <div>
                <div class="radio-group">
                  <input type="radio" id="biro-perencanaan" name="position" value="Biro Perencanaan" required>
                  <label for="biro-perencanaan" class="radio">Biro Perencanaan</label>
                </div>
                <div class="radio-group">
                  <input type="radio" id="biro-sdm-aparatur" name="position" value="Biro SDM Aparatur" required>
                  <label for="biro-sdm-aparatur" class="radio">Biro SDM Aparatur</label>
                </div>
                <div class="radio-group">
                  <input type="radio" id="biro-hukum-organisasi" name="position" value="Biro Hukum dan Organisasi" required>
                  <label for="biro-hukum-organisasi" class="radio">Biro Hukum dan Organisasi</label>
                </div>
              </div>
              <div>
                <div class="radio-group">
                  <input type="radio" id="biro-humas-ln" name="position" value="Biro Humas dan Kerjasama Luar Negeri" required>
                  <label for="biro-humas-ln" class="radio">Biro Humas dan Kerjasama Luar Negeri</label>
                </div>
                <div class="radio-group">
                  <input type="radio" id="biro-umum-pengadaan" name="position" value="Biro Umum dan Pengadaan Barang/Jasa" required>
                  <label for="biro-umum-pengadaan" class="radio" >Biro Umum dan Pengadaan Barang/Jasa</label>
                </div>
                <div class="radio-group">
                  <input type="radio" id="biro-pusat-data" name="position" value="Biro Pusat Data, Statistik, dan Organisasi" required>
                  <label for="biro-pusat-data" class="radio">Biro Pusat Data, Statistik, dan Informasi</label>
                </div>
              </div>
            </div>
          </div>
          <div class="input-group">
            <h5>Ijazah</h5>
            <div id="ijazah-drop" class="file-drop">
              <img src="./public/img/upload.svg" alt="">
              <p id="ijazah-title">Drag & Drop untuk upload Ijazah</p>
            </div>
            <input type="file" id="ijazah" name="ijazah" accept="application/pdf" hidden required>
          </div>
          <div class="input-group">
            <h5>CV</h5>
            <div id="cv-drop" class="file-drop">
              <img src="./public/img/upload.svg" alt="">
              <p id="cv-title">Drag & Drop untuk upload CV</p>
            </div>
            <input type="file" id="cv" name="cv" accept="application/pdf" hidden required>
          </div>
          <div class="input-group">
            <h5>Lokasi Ujian</h5>
            <div class="flex-container2">
              <div class="radio-group">
                <input type="radio" id="madiun" name="location" value="Madiun" required>
                <label for="madiun" class="radio">Madiun</label>
              </div>
              <div class="radio-group">
                <input type="radio" id="surabaya" name="location" value="Surabaya" required>
                <label for="surabaya" class="radio">Surabaya</label>
              </div>
              <div class="radio-group">
                <input type="radio" id="malang" name="location" value="Malang" required>
                <label for="malang" class="radio">Malang</label>
              </div>
              <div class="radio-group">
                <input type="radio" id="jember" name="location" value="jember" required>
                <label for="jember" class="radio">Jember</label>
              </div>
            </div>
          </div>
          <div class="input-group">
            <h5>Waktu Ujian</h5>
            <div class="flex-container2">
              <div class="radio-group">
                <input type="radio" id="tujuh" name="time" value="07.30 - 09.30" required>
                <label for="tujuh" class="radio">07.30 - 09.30</label>
              </div>
              <div class="radio-group">
                <input type="radio" id="sepuluh" name="time" value="10.00 - 12.00" required>
                <label for="sepuluh" class="radio">10.00 - 12.00</label>
              </div>
              <div class="radio-group">
                <input type="radio" id="dua-belas" name="time" value="12.30 - 14.30" required>
                <label for="dua-belas" class="radio">12.30 - 14.30</label>
              </div>
              <div class="radio-group">
                <input type="radio" id="tiga" name="time" value="15.00 - 17.00" required>
                <label for="tiga" class="radio">15.00 - 17.00</label>
              </div>
            </div>
          </div>
          <button type="button" onclick="validateSubmitDocument()">Submit</button>
          <button type="submit" name="dokumen" hidden id="submit-document">Submit</button>
        </form>
      </div>
      <!-- Ini untuk kondisi sudah mengisi biodata -->
      <div class="done" style="display: none;">
        <img src="./public/img/success icon component.svg" alt="">
        <p>Anda sudah mengumpulkan berkas pendaftaran</p>
      </div>
    </div>
    <!-- Javascript -->
    <script src="./public/js/navbar-toggle.js"></script>
    <script src="./public/js/drop-file.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      function validateSubmitDocument() {
        const submitDocument = document.getElementById("submit-document");
        $(document).ready(function () {
          Swal.fire({
            icon: "question",
            title: "Anda yakin ingin submit?",
            showDenyButton: true,
            confirmButtonText: "Iya",
            denyButtonText: `Tidak`,
          }).then((result) => {
            if (result.isConfirmed) {
              submitDocument.click()
            }
          });
        });
      }
    </script>
  </body>
</html>
