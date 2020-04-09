<?php
require_once('dbConnect.php');
if($_SERVER['REQUEST_METHOD']=='GET') {
  $sql = "SELECT * FROM peminjaman ORDER BY idPeminjaman DESC";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('idPeminjaman'=>$row[0], 
                'namaPeminjam'=>$row[1], 'ruang'=>$row[2], 'tanggal'=>$row[3], 
                'jamAwal'=>$row[4], 'jamAkhir'=>$row[5], 'keperluan'=>$row[6], 'statusPeminjaman'=>$row[7]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}