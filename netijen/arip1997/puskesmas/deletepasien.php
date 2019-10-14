<?php

include 'koneksi.php';

$kode_pasien = $_POST["id"];

$query = "DELETE FROM pasien WHERE kode_pasien = '$kode_pasien'";

if (mysqli_query($koneksi, $query)) {
    header("Location:tampilPasien.php");
} else {
    $error = urldecode("<div class='alert alert-danger' role='alert'>Data tidak berhasil di delete</div>");
    header("Location:tampilPasien.php?error=$error");
}

mysqli_close($koneksi); 

?>