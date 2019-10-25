<?php
require "simpleGrab.php";

//Get ID Kota
$mainUrl = "https://www.jadwalsholat.org/adzan/monthly.php";
$kota = file_get_contents($mainUrl);
$listKota = getStringBetween($kota, 'class="inputcity">', '</select>');
$arrKota = getKota($listKota);

$parseJson = [];
for($i=0; $i<count($arrKota); $i++) {
    $parseJson[] = [
        'id' => $arrKota[$i][0],
        'name' => $arrKota[$i][1]
    ];
}

echo json_encode($parseJson);