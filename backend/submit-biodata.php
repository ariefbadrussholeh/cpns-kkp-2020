<head>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<?php 
  require './backend/functions.php';

  if(isset($_POST["biodata"])){
      var_dump($_POST);
      if(insert($_POST) > 0) {
          echo "
          <script>
              alert('data berhasil ditambahkan');
              document.location.href='index.php';
          </script>
          ";
      } else {
          echo "
          <script>
              alert('data gagal ditambahkan');
              document.location.href='index.php';
          </script>
          ";
      }
  }
?>