<!DOCTYPE html>
<html>
<head>
	<title>Halo HTML</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="icon" href="assets/img/icon.jpg" type="image/jpg" sizes="16x16"> 
	<style type="text/css">
		#box-profile p {
			text-align: center;
			position: relative;
		}
	</style>
</head>
<body>
	<nav>
		<div class="menu-mobile">
			<a href="#" onclick="showMenu()">Menu</a>
		</div>
		<ul id="menu">
			<li><a href="#">HOME</a></li>
			<li><a href="#">README</a></li>
			<li><a href="#">PROFIL</a></li>
		</ul>
	</nav>
	<section id="box-profile" class="text-grey">
		<p><?php echo "Halo, ini dokumen html untuk contoh interaksi antar halaman"; ?></p>
	</section>

	<script type="text/javascript">
		// Menampilkan Menu pada Laman Responsive
		function showMenu(){
			var menu = document.getElementById("menu");
			var box = document.getElementById("box-profile");
			if(menu.style.display === "block"){
				menu.style.display = "none";
				box.style.paddingTop = "0px";
			}else{
				menu.style.display = "block";
				box.style.paddingTop = "125px";
			}
		}
	</script>
</body>
</html>
