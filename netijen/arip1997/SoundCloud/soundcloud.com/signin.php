<html>

<head>
    <title>SoundCloud - Free Stream Music</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include 'include/header.php'; ?>

<div class="content">
<?php
if(isset($_SESSION['username'])) {
    echo "<p style='font-size:20px;'>You have already sign in as <i style='color:red;'>".$_SESSION['username']."</i></p>";
} else {
?>
<form action="config/userLogin.php" method="POST">
<table align="center" cellpadding="8">
    <tr>
        <td>Username</td>
        <td>:</td>
        <td><input class="in_pass" type="text" name="username" required></td>
    </tr>
    <tr>
        <td>Password</td>
        <td>:</td>
        <td><input class="in_pass" type="password" name="password" required></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" align="right"><input class="g-opacity-transition sc-button sc-button-medium signupButton sc-button-cta" type="submit" name="submit" value="Login"></td>
    </tr>
</table>
</form>
<?php } ?>

<p class="signin__text sc-text-light" style="margin-top:100px;">
  We may use your email and devices for updates and tips on SoundCloud's products and services, and for activities notifications. You can unsubscribe for free at any time in your notification settings.
</p>
<p class="signin__text sc-text-light">
We may use information you provide us in order to show you targeted ads as described in our <a target="_blank" href="/pages/privacy">Privacy Policy</a>.</p>
</div>
<!-- <div class="sidebar">
<?php include('include/sidebar.php'); ?>
</div> -->
</body>

</html>