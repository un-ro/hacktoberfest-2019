<?php

$koneksi = mysqli_connect("localhost","root","","testdb");

$resultfilm = mysqli_query($koneksi,"SELECT* FROM film");
$resultlink = mysqli_query($koneksi,"SELECT* FROM tbl_link");
$resultkategori = mysqli_query($koneksi,"SELECT* FROM tbl_linkfoto");

?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Complete Corportate Website</title>

      <!-- stylesheet -->
      <link rel="stylesheet" href="style.css">

      <!-- google fonts -->
      <link href="https://fonts.googleapis.com/css?family=Darker+Grotesque:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

      <!-- bootstrap -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

      <!-- for on scroll animations -->
      <link rel="stylesheet" href="https://cdn.rawgit.com/daneden/animate.css/v3.1.0/animate.min.css">
      <script src="https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js"></script>

      
<body>
      
<a name="home"></a>
      <div class="wrapper">

            <!--------------- hero section starts here --------------->

            <div class="video-container">
                  <video playsinline autoplay muted loop id="bgvid">
                        <source src="videoplayback.mp4" type="video/mp4">
                  </video>
            </div>

            <div class="header">
                  <h1>We Crawl From Dunia21</h1>
            </div>

            <!--------------- hero section ends here --------------->

            <!--------------- navbar starts here --------------->

            <nav class="nav">
                  <span id="brand">
                        <a href="index.html">Dunia21 Crawler</a>
                  </span>

                  <ul id="menu">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">film</a></li>
                        <li><a href="#services">Kategori</a></li>

                  </ul>

                  <div id="toggle">
                        <div class="span">menu</div>
                  </div>

            </nav>

            <div id="resize">
                  <div class="close-btn">close</div>

                  <ul id="menu">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">film</a></li>
                        <li><a href="#services">Kategori</a></li>
                  </ul>
            </div>

            


            <div class="content">
                  <!--------------- Film section Start --------------->

            <a name="about"></a>

<section class="story">
<?php while($row=mysqli_fetch_assoc($resultfilm)): ?>

       <div class="container-fluid">

             <div class="section-data">

                   <div class="row">
                  
                  <div class="team-title">
                                          
                 </div>
                         <div class="col-md-2"></div>
                         <div class="col-md-2 section-heading wow fadeInUp" data-wow-delay="0.3s">
                         <h5><?php echo $row["film_nama"]; ?></h5>
                         
                         </div>
                         <div class="col-md-2 section-heading wow fadeInUp" data-wow-delay="0.4s">
                         <img src="<?php echo $row["film_linkfoto"]; ?>" alt="">
                                         
                         </div>
                   </div>
                  
                   <div class="row">
                         <div class="col-md-4"></div>
                         <div class="col-md-6 section-subheading wow fadeInUp" data-wow-delay="0.5s"><h3><?php echo $row["film_kategori"]; ?></h3></div>
                   </div>

                   <div class="row">
                         <div class="col-md-4"></div>
                         <div class="col-md-8 more wow fadeInUp" data-wow-delay="0.7s">
                               <button id="btn" onclick="location.href='<?php echo $row["film_link"]; ?>'">Know More</button>       
                        </div>
                   </div>

             </div>

       </div>
       <?php endwhile; ?>
</section>

 <!--------------- Film section ends --------------->

      </div>
        




                 <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>

// navigation starts here
$("#toggle").click(function() {
            $(this).toggleClass('on');
            $("#resize").toggleClass("active");
      });
      $("#resize ul li a").click(function() {
            $(this).toggleClass('on');
            $("#resize").toggleClass("active");
      });
      $(".close-btn").click(function() {
            $(this).toggleClass('on');
            $("#resize").toggleClass("active");
      });

$(function () {
  $(document).scroll(function () {
    var $nav = $(".nav");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  });
});

new WOW().init();

// Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });


</script>
</body>
</html>