<html>
<head>
<title>SoundCloud - Administrator Page</title>
<link rel="stylesheet" href="css/style.css">
<style>
    audio {
        width: 120px;
    }
    img {
        width:120px;
    }
    .gallery-msc {
        margin:10px; 
        border:1px solid #000; 
        display:inline-block;
    }
    </style>
</head>

<body>
<?php include 'include/header.php'; ?>
<div class="content">
<p><h1>ADMINISTRATOR PAGE</h1></p>
<p style='font-size:20px;'>You have already sign in as <i style='color:red;'><?php echo $_SESSION['username']; ?></i></p>
</div>
</body>
</html>