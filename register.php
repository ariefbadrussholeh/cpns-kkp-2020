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
    <link rel="stylesheet" href="./public/css/style.css" />
    <script src="https://kit.fontawesome.com/67af74f10d.js" crossorigin="anonymous"></script>
    <title>Registrasi - Seleksi Penerimaan CPNS KKP 2022</title>
  </head>

  <?php
    error_reporting(0);
    session_start();
    if (isset($_SESSION['email'])){
        header("Location: ../login.php");
    }
  ?>

  <body class="bg-grey">
    <div class="logo">
      <img src="./public/img/Logo Kementrian.png" alt="Kementrian Kelautan dan Perikanan" />
      <img src="./public/img/Logo Prov Jawa Timur.png" alt="Provinsi Jawa Timur" />
    </div>
    <h1 class="title">Kementrian Kelautan dan Perikanan</h1>
    <div class="card">
      <h2>Registrasi</h2>
      <form action="./backend/auth/register.php" method="POST">
        <div id="form-nik">
          <label for="nik">NIK</label>
          <div class="input-group">
            <input type="text" name="nik" id="nik" placeholder="Masukkan nomor KTP anda" autocomplete="off" onchange="validateNIK()" />
            <p id="error-nik" class="error"></p>
          </div>
<!--          <button type="button" id="btn-verify" onclick="verification()">Registrasi</button>-->
        </div>
        <div class="" id="form-register">
          <div class="input-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Masukkan email anda" autocomplete="off" onchange="validateEmail()" />
            <p id="error-email" class="error"></p>
          </div>
          <div class="input-group">
            <label for="password">Kata sandi</label>
            <input type="password" name="password" id="password" placeholder="Masukkan kata sandi" autocomplete="off" onchange="validatePwd()" /><i class="far fa-eye" id="password-toggle" style="margin-left: -40px; cursor: pointer"></i>
            <p id="error-pwd" class="error"></p>
          </div>
          <div class="input-group">
            <label for="confirm-password">Konfirmasi kata sandi</label>
            <input type="password" name="confirm-password" id="confirm-password" placeholder="Konfirmasi kata sandi" autocomplete="off" onchange="validateConfirmPwd()" /><i
              class="far fa-eye"
              id="confirm-password-toggle"
              style="margin-left: -40px; cursor: pointer"
            ></i>
            <p id="error-confirm-pwd" class="error"></p>
          </div>
          <button type="submit" name="register" onclick="registration()">Registrasi</button>
        </div>
      </form>
    </div>
    <img class="frame" src="./public/img/Frame.svg" alt="frame" />
    
    <!-- Javascript -->
    <script src="./public/js/password-toggle.js"></script>
    <script src="./public/js/form-validation.js"></script>
  </body>
</html>

<?php
//    $nik = $_POST['nik'];
//    $email = $_POST['email'];
//    $password = md5($_POST['password']);
//
//    $query = "SELECT * FROM users WHERE email = '$email' AND nik = '$nik'";
//    $get = pg_query($connect, $query);
//
//    $data = array();
//
//    if (pg_num_rows($get) > 0){
//        echo "Email or nik already exist";
//    }else{
//        $query_insert = "INSERT INTO users(nik, email, password) VALUES ('$nik', '$email', '$password')";
//        $insert = pg_query($connect, $query_insert);
//
//        if ($insert){
//            echo "Register success";
//        }else{
//            echo "Register failed";
//        }
//    }
//?>