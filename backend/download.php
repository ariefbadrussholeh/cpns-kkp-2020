<?php 
include "../backend/fpdf185/fpdf.php";

var_dump($_POST);

class PDF extends FPDF {
  // Page header
  function Header() {
    // Logo
    $this->Image('../public/img/Logo Kementrian.png',10, 10, -300);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(60);
    // Title
    $this->Cell(55,10,'KARTU PESERTA',1,0,'C');
    $this->Cell(70,10,'UJIAN CPNS KKP 2022',1,0,'C');
    // Line break
    $this->Ln(70);
  }

  // Page footer
  function Footer() {
      // Position at 1.5 cm from bottom
      $this->SetY(-15);
      // Arial italic 8
      $this->SetFont('Arial','I',8);
      // Page number
      $this->Cell(0,10,'Kementrian Kelautan dan Perikanan Provinsi Jawa TImur',0,0,'C');
  }
}
ob_start();
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->Image('../storage/photo/'.$_POST['photo'], 90, 30, 25);
$pdf->Cell(0,10,'NAMA                  : '.$_POST['name'],0,1);
$pdf->Cell(0,10,'NIK                      : '.$_POST['nik'],0,1);
$pdf->Cell(0,10,'POSISI                : '.$_POST['position-apply'],0,1);
$pdf->Cell(0,10,'TANGGAL TES   : '.$_POST['time-test'],0,1) ;
$pdf->Cell(0,10,'LOKASI TES       : '.$_POST['location-test'],0,1) ;
$pdf->Output('D', 'kartu-ujian_'.$_POST['nik'].'.pdf');
ob_end_flush(); 
