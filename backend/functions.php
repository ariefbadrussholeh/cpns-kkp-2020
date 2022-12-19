<?php 
include "$_SERVER[DOCUMENT_ROOT]/cpns-kkp/server.php";

function read($query){
  global $conn;
  $get = mysqli_query($conn, $query);
  $rows = [];
  while($row = mysqli_fetch_assoc($get)){
      $rows[] = $row;
  }

  return $rows;
}

function insert($data){

}

?>