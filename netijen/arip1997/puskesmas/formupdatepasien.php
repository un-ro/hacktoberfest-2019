<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Update Pasien</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php
    include 'koneksi.php';
$kode_pasien = $_POST["id"];
$query = "SELECT * FROM pasien WHERE kode_pasien = '$kode_pasien'";
$result = mysqli_query($koneksi, $query);

$item = ''; 
if(mysqli_num_rows($result) == 1) {
    $item = mysqli_fetch_assoc($result);
} else {
    echo " tidak ditemukan";
}
?>
<div class="container">
<h2 align="center">Data Pasien</h2>
<form method="post" action="prosesUpdatePasien.php">
        <div class="form-group">
            <label>Kode Pasien</label>
            <input type="text" class="form-control" name="kode" placeholder="Kode Pasien" value="<?php echo $item["kode_pasien"] ?>" readonly="true">
        </div>
        <div class="form-group">
            <label>Nama Pasien</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Pasien" value="<?php echo $item["nama_pasien"] ?>">
        </div>
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat" placeholder="Tempat Lahir" value="<?php echo $item["tempat_lahir"] ?>">
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" class="form-control" name="tanggal" value="<?php echo $item["tanggal_lahir"] ?>">
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" name="jk" type="radio" name="jk" value="Pria" <?php if($item['jk'] == "Pria") { echo 'checked'; } ?>>
                <label class="form-check-label">Pria</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="jk" type="radio" name="jk" value="Perempuan" <?php if($item['jk'] == "Perempuan") { echo 'checked'; } ?>>
            <label class="form-check-label">Perempuan</label>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo $item["alamat"] ?>">
        </div>
        <div class="form-group">
            <label>No Telepon</label>
            <input type="text" class="form-control" name="notelp" placeholder="No Telepon" value="<?php echo $item["no_telp"] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
    
</body>
</html>