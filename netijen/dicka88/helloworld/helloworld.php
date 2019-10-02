<?php
function show($date){
  $dayInInd   = explode(" ","Senin Selasa Rabu Kamis Jumat Sabtu Minggu");
  $monthInInd = explode(" ", "zero Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
  
  $date  = strtotime($date);
  $tgl   = date('d', $date);
  $hari  = $dayInInd[ltrim($tgl, "0")];
  $bulan = $monthInInd[date('m', $date)];
  $tahun = date('Y', $date);
  return $hari.", ".$tgl." ".$bulan." ".$tahun;
}


//call date in indonesian name
$breakline = "<br>";
$tanggal = '2019-10-02';
echo show($tanggal);
echo $breakline;
echo "Hello World";
echo $breakline;
echo "I am PHP ".phpversion();
