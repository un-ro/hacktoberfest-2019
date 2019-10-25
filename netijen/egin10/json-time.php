<?php
require "simpleGrab.php";

$nKota = $_REQUEST["kota"];

//Get ID Kota
$mainUrl = "https://www.jadwalsholat.org/adzan/monthly.php";
$kota = file_get_contents($mainUrl);
$listKota = getStringBetween($kota, 'class="inputcity">', '</select>');
$arrKota = getKota($listKota);
$idKota = getIdKota($arrKota, strtolower($nKota));

//Get Waktu Sholat Today
$urlJadwal = "https://www.jadwalsholat.org/adzan/monthly.php?id=".$idKota;
$jadwal = file_get_contents($urlJadwal);
$listWaktu = getStringBetween($jadwal, '<tr class="table_highlight" align="center">', '</tr>');
$arrWaktu = getWaktu($listWaktu);

$parseJson = [];
for($i=0; $i<count($arrWaktu); $i++) {
    $parseJson[] = [
        'waktu' => $arrWaktu[$i][0],
        'jam' => $arrWaktu[$i][1]
    ];
}

echo json_encode($parseJson);