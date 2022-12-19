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
  ?>

  <body>
    <?php include './public/component/header.php'?>
    <div class="container">
      <?php include './public/component/navbar.php'?>
      <section>
        <h1>Selamat Datang, <?php if(($calon_pegawai['name'] == "")) echo $calon_pegawai['nik']; else echo $calon_pegawai['name']; ?></h1>
      <main>
        <div class="box">
          <div class="box-group">
            <div class="timeline">
              <div class="title">
                <div class="number box-verified">1</div>
                <h1 class="verified">Registrasi</h1>
              </div>
              <div class="group1">
                <p>
                  <b>Jadwal</b> : 13 Desember 2022 - 13.30 WIB s.d 30 Desember 2022 - 23.59 WIB
                  <br> <br>
                  Waktu Indonesia Barat (UTC+07:00)
                </p>
              </div>
            </div>
          </div>
          <div class="group2">
            <img src="./public/img/calendar.svg" alt="" width="15px">  <b>Dilakukan Pada</b> : <?= $calon_pegawai['created_at'] ?>
          </div>
        </div>
        <div class="box">
          <div class="box-group">
            <div class="timeline">
              <div class="title">
                <div class="number box-unfinished" id="bio-box">2</div>
                <h1 class="unfinished" id="bio-h1">Biodata</h1>
              </div>
              <div class="group1">
                <p>
                  <b>Jadwal</b> : 13 Desember 2022 - 13.30 WIB s.d 30 Desember 2022 - 23.59 WIB
                  <br> <br>
                  Waktu Indonesia Barat (UTC+07:00)
                </p>
              </div>
            </div>
          </div>
          <div class="group2">
            <img src="./public/img/calendar.svg" alt="" width="15px">  <b>Dilakukan Pada</b> : <?= $calon_pegawai['biodata_submitted_at'] ?>
          </div>
        </div>
        <div class="box">
          <div class="box-group">
            <div class="timeline">
              <div class="title">
                <div class="number box-unfinished">3</div>
                <h1 class="unfinished">Seleksi Berkas</h1>
              </div>
              <div class="group1">
                <p>
                  <b>Jadwal</b> : 13 Desember 2022 - 13.30 WIB s.d 30 Desember 2022 - 23.59 WIB
                  <br> <br>
                  Waktu Indonesia Barat (UTC+07:00)
                </p>
              </div>
            </div>
          </div>
          <div class="group2">
            <img src="./public/img/calendar.svg" alt="" width="15px">  <b>Dilakukan Pada</b> : <?= $calon_pegawai['document_submitted_at'] ?>
          </div>
        </div>
        <div class="box">
          <div class="box-group">
            <div class="timeline">
              <div class="title">
                <div class="number box-unfinished">4</div>
                <h1 class="unfinished">Lolos</h1>
              </div>
              <div class="group1">
                <p style="text-align: center;">Selamat anda dinyatakan lolos seleksi pemberkasan</p>
                <button disabled>Unduh Kartu Peserta</button>
              </div>
            </div>
          </div>
          <div class="group2">
            <img src="./public/img/calendar.svg" alt="" width="15px">  <b>Dilakukan Pada</b> : <?= $calon_pegawai['verified_at'] ?>
          </div>
        </div>
        <div class="box" style="padding: 24px; background-color: #eaeaea;">
          <div class="list">
            <div style="width: 25px; height: 25px; background-color: #69aa63; border-radius: 50px; margin-right: 16px;"></div>
            <p>Telah dilakukan dan terverifikasi</p>
          </div>
          <div class="list">
            <div style="width: 25px; height: 25px; background-color: #dfc435; border-radius: 50px; margin-right: 16px;"></div>
            <p>Telah dilakukan dan menunggu validasi</p>
          </div>
          <div class="list">
            <div style="width: 25px; height: 25px; background-color: #d9d9d9; border-radius: 50px; margin-right: 16px;"></div>
            <p>Belum melakukan proses pendaftaran</p>
          </div>
        </div>
        <div class="box" style="padding: 24px; background-color: #f3e8ad;">
          Demi menghindari penyalahgunaan data pribadi, mohon untuk tidak memberikna data apapun selain yang diisikan pada Sistem Seleksi Pegawai Kementrian Kelautan dan Perikanan Prov. Jatim
        </div>
      </main>
      </section>
    </div>
    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./public/js/navbar-toggle.js"></script>
    <script>
      const cpBiodataAt = <?= $calon_pegawai['biodata_submitted_at'] ?>
      const cpDocumentAt = <?= $calon_pegawai['document_submitted_at'] ?>
      const cpVerifiedAt = <?= $calon_pegawai['verified_at'] ?>

      const bioh1 = document.getElementById("bio-h1");
      const biobox = document.getElementById("bio-box");

      if(cpBiodataAt != "0000-00-00 00:00:00" && cpVerifiedAt == "0000-00-00 00:00:00"){
        bioh1.classList.remove("unfinished")
        biobox.classList.remove("box-unfinished")
        bioh1.classList.add("waiting")
        biobox.classList.add("box-waiting")
      } else {
        bioh1.classList.remove("waiting")
        biobox.classList.remove("box-waiting")
        bioh1.classList.add("verified")
        biobox.classList.add("box-verified")
      }
    </script>
  </body>
</html>
