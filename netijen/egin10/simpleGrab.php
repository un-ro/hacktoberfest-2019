<?php
/**
 * Simple Grab
 */

function getStringBetween($teks, $sebelum, $sesudah)
{
    $teks = ' '.$teks;
    $ini = strpos($teks, $sebelum);
    if($ini == 0) return '';
    $ini += strlen($sebelum);
    $panjang = strpos($teks, $sesudah, $ini) - $ini;

    return substr($teks, $ini, $panjang);
}

function getKota($listKota)
{
	$kota = explode("</option>", $listKota);
	$c = count($kota)-1;
	$arrKota = [];
	for($i=0; $i<$c; $i++) {
		$listNamaKota = explode(">", $kota[$i]);
		$idKota = explode('"', $listNamaKota[0])[1];
		$namaKota = $listNamaKota[1];
		// print_r($valKota." -> ".$namaKota."\n");
		$arrKota[] = [trim($idKota), trim($namaKota)];
	}

	return $arrKota;
}

function getIdKota($arrKota, $namaKota)
{
	$idKota = '';
	for($i=0; $i<count($arrKota); $i++) {
		if(strtolower($arrKota[$i][1]) == $namaKota) {
			$idKota = $arrKota[$i][0];
		}
	}

	return $idKota;
}

function getWaktu($listWaktu)
{
	$ketWaktu = ['Imsyak','Subuh','Terbit','Dhuha','Dzuhur','Ashar','Magrib','Isya'];
	$waktu = explode("</td>", $listWaktu);
	$c = count($waktu)-1;
	$arrWaktu = [];
	for($i=1; $i<$c; $i++)
	{
		$ex = explode("d>", $waktu[$i]);
		$arrWaktu[] = [$ketWaktu[$i-1] ,$ex[1]];
	}
	return $arrWaktu;
}