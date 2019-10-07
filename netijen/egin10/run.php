<?php
require "simpleGrab.php";

//Get ID Kota
$mainUrl = "https://www.jadwalsholat.org/adzan/monthly.php";
$kota = file_get_contents($mainUrl);
$listKota = getStringBetween($kota, 'class="inputcity">', '</select>');
$arrKota = getKota($listKota);
$idKota = getIdKota($arrKota, strtolower($argv[1]));

//Get Waktu Sholat Today
$urlJadwal = "https://www.jadwalsholat.org/adzan/monthly.php?id=".$idKota;
$jadwal = file_get_contents($urlJadwal);
$listWaktu = getStringBetween($jadwal, '<tr class="table_highlight" align="center">', '</tr>');
$arrWaktu = getWaktu($listWaktu);
// json_encode($arrWaktu); parse to json
print_r("Waktu Sholat hari ini tanggal : ".date("d-m-Y")."\n");
print_r($arrWaktu);