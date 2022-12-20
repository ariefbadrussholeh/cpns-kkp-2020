<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="../public/img/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="../public/img/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../public/img/favicon/favicon-16x16.png" />
    <link rel="manifest" href="../public/img/favicon/site.webmanifest" />
    <!-- Style -->
    <link rel="stylesheet" href="../public/css/style2.css" />
    <script src="https://kit.fontawesome.com/67af74f10d.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Admin Dashboard - Seleksi Penerimaan CPNS KKP 2022</title>
  </head>
  <?php
      error_reporting(0);
      session_start();
      if (!isset($_SESSION['admin_email'])){
          header("Location: ./login.php");
      }
      $email = $_SESSION['admin_email'];

      include "../backend/functions.php";
      $calon_pegawai = read("SELECT * FROM users WHERE status = 'passed'");
      $admin_name = read("SELECT name FROM admin WHERE email = '$email'")[0];
  ?>
  <body>
    <?php include './component/header.php'?>
    <div class="container">
      <?php include './component/navbar.php'?>
      <section>
        <h1 style="margin-bottom: 16px;">Selamat Datang, <?= $admin_name['name'] ?></h1>
        <p style="margin-bottom: 32px;">Verifikasi CPNS KKP 2022</p>
      <main>
      <div>
        <table>
          <thead>
            <th>NIK</th>
            <th>Nama</th>
            <th>Posisi</th>
            <th>Lokasi</th>
            <th>Waktu</th>
          </thead>
          <tbody>
            <?php foreach ($calon_pegawai as $row) : ?>
            <tr>
              <td><?= $row['nik'] ?></td>
              <td><?= $row['name'] ?></td>
              <td><?= $row['position_apply'] ?></td>
              <td><?= $row['location_test'] ?></td>
              <td><?= $row['time_test'] ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </main>
      </div>
      </section>
    </div>
    <!-- Javascript -->
    <script src="./js/navbar-toggle.js"></script>

  </body>
</html>
