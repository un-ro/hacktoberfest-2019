<?php 

  $kubus = "<img src='img/kubus.gif' class='card-img-top'>";
  $tetrahedron = "<img src='img/tetrahedron.gif' width='150px' class='card-img-top'>";
  $kerucut = "<img src='img/kerucut.gif' width='150px' class='card-img-top'>";
  $balok = "<img src='img/balok.gif' width='150px' class='card-img-top'>";
  $prisma = "<img src='img/prisma.gif' width='150px' class='card-img-top'>";
  $limas_segiempat = "<img src='img/limas_segiempat.gif' width='150px' class='card-img-top'>";

  const luas_kubus = "L = 6 x s²";
  const volume_tetrahedron = "V = 1/3 x Lsegitiga x Tlimas";
  const luas_kerucut = "L = πr (r + s)";
  const luas_balok = "L = 2 (p x l + p x t +  l x t)";
  const luas_prisma = "L = t × ( a1 + a2 + a3) + (2 × La)";
  const volume_limas_segiempat = "V = ⅓ × L alas × t";

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Tugas PWPB</title>


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="css/Bootstrap.min.css">

    <!-- LOGO AS -->
    <link rel="icon" href="img/logo.png">
    <!-- Custom styles for this template -->
    <style>
      /*CSS INTERNAL*/
    </style>
  </head>
  <body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Kelompok 9</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="tugas_pertama.php">Tugas pertama</a>
    <a class="p-2 text-dark" href="tugas_kedua.php">Tugas kedua</a>
    <a class="p-2 text-dark" href="tugas_ketiga.php">Tugas ketiga</a>
    <a class="p-2 text-dark" href="#">Tugas keempat</a>
  </nav>
  <a class="btn btn-outline-success" href="index.php">Home</a>
</div>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Tugas kedua</h1>
  <p class="lead">dibawah ini adalah kumpulan bangun ruang</p>
</div>

  <div class="container">
    <div class="card-deck mb-3 text-center">
    <!-- BARIS PERTAMA -->
      <div class="card mb-4 shadow-sm">
        <div class="card-body">
          <!-- <img src="img/kubus.gif" width="150px" class="card-img-top"> -->
            <?php echo $kubus ; ?>
        
            <p class="card-text bg-light">Luas</p>
            <p class="card-text bg-light"><?php echo luas_kubus; ?></p>
          <button type="button" class="btn btn-lg btn-block btn-success">Lebih lanjut</button>
        </div>
      </div>

      <div class="card mb-4 shadow-sm"> 
        <div class="card-body">
          <!-- <img src="img/tetrahedron.gif" width="150px" class="card-img-top"> -->
          <?php echo $tetrahedron; ?>
          <p class="card-text bg-light">Volume</p>
          <p class="card-text bg-light"><?php echo volume_tetrahedron; ?></p>
          <button type="button" class="btn btn-lg btn-block btn-success">Lebih lanjut</button>
        </div>
      </div>

      <div class="card mb-4 shadow-sm">
        <div class="card-body">
          <!-- <img src="img/kerucut.gif" width="150px" class="card-img-top"> -->
          <?php echo $kerucut; ?>
          <p class="card-text bg-light">Luas</p>
          <p class="card-text bg-light"><?php echo luas_kerucut; ?></p>
          <button type="button" class="btn btn-lg btn-block btn-success">Lebih lanjut</button>
        </div>
      </div>
    </div>
    <!-- END OF BARIS PERTAMA -->

    <!-- BARIS KEDUA -->
    <div class="card-deck mb-3 text-center">
      <div class="card mb-4 shadow-sm">
          <div class="card-body">
            <!-- <img src="img/balok.gif" width="150px" class="card-img-top"> -->
            <?php echo $balok; ?>
            <p class="card-text bg-light">Luas</p>
            <p class="card-text bg-light"><?php echo luas_balok; ?></p>
            <button type="button" class="btn btn-lg btn-block btn-success">Lebih lanjut</button>
          </div>
      </div>
      <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <!-- GAMBAR LO -->
          <!-- <img src="img/prisma.gif" width="150px" class="card-img-top"> -->
          <?php echo $prisma; ?>
           <p class="card-text bg-light">Luas</p>
           <p class="card-text bg-light"><?php echo luas_prisma?></p>
          <button type="button" class="btn btn-lg btn-block btn-success">Lebih lanjut</button>
        </div>
      </div>
      <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <!-- GAMBAR LO -->
          <!-- <img src="img/limas_segiempat.gif" width="150px" class="card-img-top"> -->
          <?php echo $limas_segiempat; ?>
            <p class="card-text bg-light">Luas</p>
            <p class="card-text bg-light"><?php echo volume_limas_segiempat; ?></p>
          <button type="button" class="btn btn-lg btn-block btn-success">Lebih lanjut</button>
        </div>
      </div>
    </div>
  </div>
  <!-- END OF BARIS KEDUA -->

  <div class="container">
  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <small class="d-block mb-3 text-muted">&copy; 2019</small>
        <p class="lead">#PWPB_XIRPL3</p>
      </div>
      <div class="col-6 col-md">
        <h5>Features</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Cool stuff</a></li>
          <li><a class="text-muted" href="#">Random feature</a></li>
          <li><a class="text-muted" href="#">Team feature</a></li>
          <li><a class="text-muted" href="#">Stuff for developers</a></li>
          <li><a class="text-muted" href="#">Another one</a></li>
          <li><a class="text-muted" href="#">Last time</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Resources</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Resource</a></li>
          <li><a class="text-muted" href="#">Resource name</a></li>
          <li><a class="text-muted" href="#">Another resource</a></li>
          <li><a class="text-muted" href="#">Final resource</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>About</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Team</a></li>
          <li><a class="text-muted" href="#">Locations</a></li>
          <li><a class="text-muted" href="#">Privacy</a></li>
          <li><a class="text-muted" href="#">Terms</a></li>
        </ul>
      </div>
    </div>
  </footer>
</div>
</body>
</html>