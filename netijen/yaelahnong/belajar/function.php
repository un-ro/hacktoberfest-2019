<?php 
    // Built-in function
    // echo date("l", mktime(0,0,0,12,23,1970));

    // User-defined function
    function salam($nama){
        return "Selamat Datang, $nama!";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Latihan Function</title>
</head>
<body>
    <h1><?= salam("Admin"); ?></h1>
</body>
</html>