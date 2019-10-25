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
<div class="resetpass">
<form action="config/resetpass.php" method="post">
<?php
if (isset($_GET["msg"])) {
    echo '<span class="error-txt">'.$_GET["msg"].'</span>';
}
?>
    <table align="center" cellpadding="5">
        <tr>
            <td>Current Password</td>
            <td>:</td>
            <td><input class="in_pass" type="password" name="oldpass" required>
            <input type="hidden" name="username" value="<?php echo $_SESSION["username"]; ?>"></td>
        </tr>
        <tr>
            <td>New Password</td>
            <td>:</td>
            <td><input class="in_pass" type="password" name="newpass" required></td>
        </tr>
        <tr>
            <td>Confirm Password</td>
            <td>:</td>
            <td><input class="in_pass" type="password" name="curpass" required></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2" align="right"><input class="g-opacity-transition sc-button sc-button-medium signupButton sc-button-cta" type="submit" name="submit" value="Reset Password"></td>
        </tr>
    </table>
</form>
</div>
</body>
</html>