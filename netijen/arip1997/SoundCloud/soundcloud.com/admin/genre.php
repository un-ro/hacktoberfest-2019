<?php include('../config/conn.php'); ?>
<html>
<head>
<title>SoundCloud - Administrator Page</title>
<link rel="stylesheet" href="../css/style.css">
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
<div class="content1">
<p><h1>Genre Data</h1></p>
<br><br>
<form action="config/addGenre.php" method="post">
    <div style="width: 59%;margin: 0 auto;text-align: left;padding-bottom:15px;">
    Add Genre = <input type="text" name="genre" class="in_pass">&nbsp;&nbsp;
    <input type="submit" name="submit" value="ADD" class="g-opacity-transition sc-button sc-button-medium signupButton sc-button-cta"></div>
</form>
<center>
<table width="800" border="0" cellpadding="5">
<tr style="background: linear-gradient(#f70,#f30);">
    <th align="center">No</th>
    <th align="center">Genre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
</tr>
<?php 
$no = 1;
$query = "SELECT * FROM genre";
# Get the query result
$result = mysqli_query($con, $query);

while($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td align="center" style="border-bottom:1px solid grey;"><?php echo $no++; ?></td>
    <td align="center" style="border-bottom:1px solid grey;"><?php echo $row["genre"]; ?><a href="config/delGenre.php?id=<?php echo $row["id_genre"]; ?>"><button style="float:right;" class="g-opacity-transition sc-button sc-button-medium signupButton sc-button-cta">X</button></a></td>
</tr>
<?php } ?>
</table>
</center>
</div>
</body>
</html>