<?php
 include 'koneksi.php';
// menangkap data yang di kirim dari form
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$tempat = $_POST['tempat'];
$tanggal = $_POST['tanggal'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];
$notelp = $_POST['notelp'];
 
// menginput data ke database
$query=mysqli_query($koneksi,"insert into pasien(kode_pasien,nama_pasien,tempat_lahir,tanggal_lahir,jk,alamat,no_telp)
values('$kode','$nama','$tempat','$tanggal','$jk','$alamat','$notelp')");
 
if($query==1){
    header("location:index.php");
}else{
    echo"gagal tambah data";
}
 
?>