<?php include('../config/conn.php'); ?>
<html>
<head>
<title>SoundCloud - Administrator Page</title>
<link rel="stylesheet" href="../css/style.css">
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
<div class="content1">
<p><h1>User's Data</h1></p>
<br><br>
<center>
<table width="800" border="0" cellpadding="5">
<tr style="background: linear-gradient(#f70,#f30);">
    <th align="center">No</th>
    <th align="center">Nama</th>
    <th align="center">Alamat</th>
    <th align="center">No Telp</th>
    <tH align="center">Email</th>
</tr>
<?php 
$no = 1;
$query = "SELECT * FROM login where level = 2";
# Get the query result
$result = mysqli_query($con, $query);

while($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td align="center" style="border-bottom:1px solid grey;"><?php echo $no++; ?></td>
    <td align="center" style="border-bottom:1px solid grey;"><?php echo $row["nama"]; ?></td>
    <td align="center" style="border-bottom:1px solid grey;"><?php echo $row["alamat"]; ?></td>
    <td align="center" style="border-bottom:1px solid grey;"><?php echo $row["no_telp"]; ?></td>
    <td align="center" style="border-bottom:1px solid grey;"><?php echo $row["email"]; ?></td>
</tr>
<?php } ?>
</table>
</center>
</div>
</body>
</html>