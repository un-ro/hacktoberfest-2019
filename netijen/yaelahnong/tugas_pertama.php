<?php 
  $nama_satu = "Marino imola";
  $umur_satu = 15;
  $hobi_satu = "main musik, main game";
  $tinggi_satu = 170;
  
  $nama_dua = "Mahyuni";
  $umur_dua = 15;
  $hobi_dua = "berenang,masak";
  $tinggi_dua = 160;

  $nama_tiga = "Salsabila Fauziah Khalda";
  $umur_tiga = 16;
  $hobi_tiga = "makan";
  $tinggi_tiga = 160;

  $rata_rata = ($tinggi_satu + $tinggi_dua + $tinggi_tiga) / 3;

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
    <style>
      .user{
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
      }

      .tentang_user span{
        font-weight: 600;
        font-size: 24px;
      }
      .tentang_user p{
        font-weight: 300;
        font-size: 16px;
        letter-spacing: 1.5px;
      }
      .card-body{
        box-shadow: 2px 5px 10px rgba(0,0,0,0.1);
        border-radius: 10px;
      }
      .card{
        border-radius: 10px
      }
      #btn-profile-2{
          position: relative;
          top: 48px;
      }
      #btn-profile-3{
        position: relative;
        top: 72px;
      }
      
    </style>
    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
  </head>
  <body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Kelompok 9</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="tugas_pertama.php">Tugas pertama</a>
    <a class="p-2 text-dark" href="tugas_kedua.php">Tugas kedua</a>
    <a class="p-2 text-dark" href="#">Tugas ketiga</a>
    <a class="p-2 text-dark" href="#">Tugas keempat</a>
  </nav>
  <a class="btn btn-outline-success" href="index.php">Home</a>
</div>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Tugas pertama</h1>
  <p class="lead">dibawah ini adalah anggota Kelompok 9</p>
</div>

<div class="container">
  <div class="card-deck mb-3 text-center">
    <!-- PROFILE 1 -->
      <div class="card mb-4 shadow-sm">
          <div class="card-body">
            <!-- GAMBAR LO -->
            <img class="user" src="img/profile1.jpg">
            <ul class="list-unstyled mt-3 mb-4">
              <div class="tentang_user">
                <span><?= $nama_satu ?></span> <p>berumur <?= $umur_satu ?> tahun, mempunyai hobi <?= $hobi_satu ?> ia bercita-cita menjadi spiderman waktu kecil, sekarang ia ingin menjadi orang sukses demi masa depan yang lebih baik<p>
              </div>
            </ul>
            <button type="button" class="btn btn-lg btn-block btn-success" id="btn-profile-1">Lebih lanjut</button>
          </div>
      </div>
    <!-- END PROFILE 1 -->

    <!-- PROFILE 2 -->
      <div class="card mb-4 shadow-sm">
          <div class="card-body">
            <!-- GAMBAR LO -->
            <img class="user" src="img/yuni.jpg">
            <ul class="list-unstyled mt-3 mb-4">
              <div class="tentang_user">
                <span>Mahyuni</span> <p>berumur <?= $umur_dua ?> tahun,ingin mempunyai sesuatu yang diinginkan ,dan juga bisa membanggakan orang tua .Dan ingin menjadi wanita berkarir</p>

              </div>
            </ul>
            <button type="button" class="btn btn-lg btn-block btn-success" id="btn-profile-2">Lebih lanjut</button>
          </div>
      </div>
    <!-- END PROFILE 2 -->

   <!-- PROFILE 3 -->
      <div class="card mb-4 shadow-sm">
          <div class="card-body">
            <!-- GAMBAR LO -->
            <img class="user" src="img/eca.jpg">
            <ul class="list-unstyled mt-3 mb-4">
              <!-- TENTANG USER -->
              <div class="tentang_user">
                <span>Salsabila Fauziah Khalda</span> <p>
                berumur <?= $umur_tiga ?> tahun, ingin menjadi someone yang sukses, hobby <?= $hobi_tiga ?> kayanya 
                </p>
              </div>
              <!-- END OF TENTANG USER -->
            </ul>
            <button type="button" class="btn btn-lg btn-block btn-success" id="btn-profile-3">Lebih lanjut</button>
          </div>
      </div>
    <!-- END PROFILE 3 -->
  </div>
  <div class="pricing-header px-2 py-2 pt-md-2 pb-md-2 mx-auto text-center">
    <p class="lead">Rata-rata tinggi kami = <?php printf("%.1f", $rata_rata) ?></p>
  </div>

  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <small class="d-block mb-3 text-muted">&copy; 2017-2019</small>
        <p class="lead">#PWPB_1</p>
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
