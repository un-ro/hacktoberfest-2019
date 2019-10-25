<?php

include 'koneksi.php';

$kode_pasien = $_POST["kode"];
$nama_pasien = $_POST["nama"];
$tempat_lahir = $_POST["tempat"];
$tanggal_lahir = $_POST["tanggal"];
$jk = $_POST["jk"];
$alamat = $_POST["alamat"];
$no_telp = $_POST["notelp"];

$query = "UPDATE pasien SET nama_pasien = '$nama_pasien', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', jk = '$jk', alamat = '$alamat', no_telp = '$no_telp' WHERE kode_pasien = '$kode_pasien'";

if(mysqli_query($koneksi, $query)){
    header("Location:tampilPasien.php");
}else{
    $error = urldecode("<div class='alert alert-danger' role='alert'>Data tidak berhasil ditambahkan</div>");
    header("Location:tampilPasien.php?error = $error");
}

mysqli_close($koneksi);

?>