<html>
<head>
    <title>SoundCloud - Free Stream Music</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include 'include/header.php'; ?>
    <?php
$username = $_SESSION["username"];
if(!isset($username)) {
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Please Sign in to Upload...');
    window.location.href='signin.php';
    </script>");
}
?>
<div class="content">
    <div class="uploadMain__content">
      <h1 class="uploadMain__title sc-type-light m-notVerified">
        Select your tracks / albums here
      </h1><br>
        <form enctype="multipart/form-data" method="post" action="config/movefile.php">
            <div class="uploadMain__chooser">
                <div class="chooseFiles"><input type="file" name="file">
                    <input type="submit" class="chooseFiles__button sc-button sc-button-cta sc-button-large" style="min-width: 150px; max-height: 50px;" value="Procced" name="submit">
                </div>
            </div>
        </form>
    </div>
</div>

<!-- <div class="sidebar">
<?php include('include/sidebar.php'); ?>
</div> -->
</body>

</html>