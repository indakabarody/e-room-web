<?php

if($_SERVER['REQUEST_METHOD']=='POST') {

  $response = array();

  $namaPeminjam = $_POST['namaPeminjam'];
  $ruang = $_POST['ruang'];
  $tanggal = $_POST['tanggal'];
  $jamAwal = $_POST['jamAwal'];
  $jamAkhir = $_POST['jamAkhir'];
  $keperluan = $_POST['keperluan'];
  $statusPeminjaman = "PENDING";

  require_once('dbConnect.php');
  date_default_timezone_set('Asia/Jakarta');
  $today = date("Y-m-d");

  if ($tanggal >= $today) {
    if ($jamAwal >= 7 && $jamAwal <= 20 && $jamAkhir >= 7 && $jamAkhir <= 19) {
      $sql = "INSERT INTO peminjaman (namaPeminjam, ruang, tanggal, jamAwal, jamAkhir, keperluan, statusPeminjaman)
      VALUES('$namaPeminjam', '$ruang', '$tanggal', '$jamAwal', '$jamAkhir', '$keperluan', '$statusPeminjaman')";
      if(mysqli_query($con,$sql)) {
        $response["value"] = 1;
        $response["message"] = "Permintaan berhasil dikirim";
        echo json_encode($response);
      } else {
        $response["value"] = 0;
        $response["message"] = "Permintaan gagal dikirim. Silakan coba lagi.";
        echo json_encode($response);
      }
      mysqli_close($con);
    } else {
      $response["value"] = 0;
      $response["message"] = "Jam valid 07:00 pagi sampai 19:59 malam.";
      echo json_encode($response);
    }
  } else {
    $response["value"] = 0;
    $response["message"] = "Masukkan tanggal yang valid.";
    echo json_encode($response);
  }

} else {
  $response["value"] = 0;
  $response["message"] = "Gagal mengakses server. Silakan coba lagi.";
  echo json_encode($response);
}