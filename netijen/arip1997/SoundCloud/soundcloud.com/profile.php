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
<div class="leftside">
<div class="index1">
<?php 
    include ('config/conn.php');
    $query1 = "SELECT * FROM login WHERE username = '$username'";
    # Get the query result
    $result1 = mysqli_query($con, $query1);

    $row1 = mysqli_fetch_assoc($result1); 
?>
<h1><em>Profile</em></h1><hr>
<center>
    <table cellpadding="5" style="margin-top:50px;">
        <tr>
            <td><img src="img/user.png"></td>
        </tr>
        <tr>
            <th align="center"><?php echo $row1["nama"]; ?></th>
        </tr>
    </table><br>
    <table cellpadding="5">
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?php echo $row1["alamat"]; ?></td>
        </tr>
        <tr>
            <td>No Telepon</td>
            <td>:</td>
            <td><?php echo $row1["no_telp"]; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><?php echo $row1["email"]; ?></td>
        </tr>
    </table>
</center>
</div>
</div>
<div class="sidebar">
<?php include('include/sidebar.php'); ?>
</div>
</body>
</html>