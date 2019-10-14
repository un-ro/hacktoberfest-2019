<html>
<head>
<title>SoundCloud - Free Stream Music</title>
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
<div class="register">
<form action="config/register.php" method="post">
<?php
if (isset($_GET["msg"])) {
    echo '<span class="error-txt">'.$_GET["msg"].'</span>';
}
?>
    <table align="center" cellpadding="8">
        <tr>
            <td>Name</td>
            <td>:</td>
            <td><input class="in_pass" type="text" name="nama" required></td>
        </tr>
        <tr>
            <td>Address</td>
            <td>:</td>
            <td><input class="in_pass" type="text" name="alamat" required></td>
        </tr>
        <tr>
            <td>No Telp</td>
            <td>:</td>
            <td><input class="in_pass" type="text" name="notelp" required></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><input class="in_pass" type="email" name="email" placeholder="example@gmail.com" required></td>
        </tr>
        <tr>
            <td colspan="3" style="border-bottom:1px solid grey;"></td>
        </tr>
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
        </tr>
        <tr>
            <td></td>
            <td colspan="2" align="right"><input class="g-opacity-transition sc-button sc-button-medium signupButton sc-button-cta" type="submit" name="submit" value="Create Account"></td>
        </tr>
    </table>
    <br>
    You have an account? <a href="signin.php">Sign in</a>
</form>
</div>
</body>
</html>