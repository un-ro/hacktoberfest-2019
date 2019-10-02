<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="radio" name="jeniskel" value="laki-laki">Laki-laki<br>
        <input type="radio" name="jeniskel" value="perempuan">perempuan<br>
        <p>Penghasilan</p>
        <input type="radio" name="in" value=">500.0000"> >500.0000 <br>
        <input type="radio" name="in" value=">1000.0000"> >1000.0000 <br>
        <input type="submit" value="Simpan" name="sbmt">
    </form>

<?php if(isset($_POST['sbmt'])): ?>
    Jenis Kelamin : <?php echo $_POST['jeniskel']; ?><br>
<?php
    if(isset($_POST['in'])){
    $income = $_POST['in'];
    echo "Penghasilan : ".$income."<br>";
}
?>
    <?php endif; ?>



</body>
</html>