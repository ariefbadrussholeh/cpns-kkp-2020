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
    $biodata_submitted_at = $calon_pegawai["biodata_submitted_at"];
    $document_submitted_at = $calon_pegawai["document_submitted_at"];
    $status = $calon_pegawai['status'];
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
                <div class="number box-unfinished" id="doc-box">3</div>
                <h1 class="unfinished" id="doc-h1">Seleksi Berkas</h1>
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
                <div class="number box-unfinished" id="lolos-box">4</div>
                <h1 class="unfinished" id="lolos-h1">Lolos</h1>
              </div>
              <div class="group1">
                <p id="ack" style="text-align: center;">-</p>
                <form id="form-download" action="./backend/download.php" method="post">
                  <input type="text" name="photo" value="<?= $calon_pegawai['photo'] ?>" hidden>
                  <input type="text" name="nik" value="<?= $calon_pegawai['nik'] ?>" hidden>
                  <input type="text" name="name" value="<?= $calon_pegawai['name'] ?>" hidden>
                  <input type="text" name="position-apply" value="<?= $calon_pegawai['position_apply'] ?>" hidden>
                  <input type="text" name="location-test" value="<?= $calon_pegawai['location_test'] ?>" hidden>
                  <input type="text" name="time-test" value="<?= $calon_pegawai['time_test'] ?>" hidden>
                  <button disabled id="download">Unduh Kartu Peserta</button>
                </form>
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
    <input type="text" id="bio" value="<?= $biodata_submitted_at ?>" hidden>
    <input type="text" id="doc" value="<?= $document_submitted_at ?>" hidden>
    <input type="text" id="status" value="<?= $status ?>" hidden>
    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./public/js/navbar-toggle.js"></script>
    <script>
      const bioSubmitAt = document.getElementById("bio").value;
      const docSubmitAt = document.getElementById("doc").value;
      const status = document.getElementById("status").value;

      const bioBox = document.getElementById("bio-box");
      const bioH1 = document.getElementById("bio-h1");
      const docBox = document.getElementById("doc-box");
      const docH1 = document.getElementById("doc-h1");
      const lolosBox = document.getElementById("lolos-box");
      const lolosH1 = document.getElementById("lolos-h1");
      const download = document.getElementById("download");
      const ack = document.getElementById("ack");

      if(bioSubmitAt != "" && status == ""){
        bioBox.style.backgroundColor = "#dfc435";
        bioH1.style.color = "#dfc435";
      } else if(bioSubmitAt != "" && status != "") {
        bioBox.style.backgroundColor = "#69aa63";
        bioH1.style.color = "#69aa63";
      }
      if(docSubmitAt != "" && status == ""){
        docBox.style.backgroundColor = "#dfc435";
        docH1.style.color = "#dfc435";
      } else if(docSubmitAt != "" && status != "") {
        docBox.style.backgroundColor = "#69aa63";
        docH1.style.color = "#69aa63";
      }
      if(docSubmitAt != "" && bioSubmitAt != "" && status == ""){
        lolosBox.style.backgroundColor = "#dfc435";
        lolosH1.style.color = "#dfc435";
      } else if (status == "passed"){
        lolosBox.style.backgroundColor = "#69aa63";
        lolosH1.style.color = "#69aa63";
        ack.innerHTML = "Selamat anda dinyatakan lolos seleksi berkas. Silahkan cetak kartu ujian";
        ack.style.color = "#69aa63";
        download.disabled = false;
      } else if (status == "failed") {
        lolosBox.style.backgroundColor = "red";
        lolosH1.style.color = "red";
        ack.innerHTML = "Mohon maaf anda belum lolos seleksi berkas. Silahkan menunggu tahun depan";
        ack.style.color = "red";
      }
      </script>
  </body>
</html>
