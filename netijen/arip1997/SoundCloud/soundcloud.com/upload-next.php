<?php
    include('config/conn.php');
    @$username = $_SESSION["username"];
    $level = @$_SESSION["level"];
?>

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
<?php 
    $name_song = $_GET["name"];
    $size = $_GET["size"];

    $select = "SELECT * FROM login WHERE username = '$username'";
    $query = mysqli_query($con, $select);
    $row = mysqli_fetch_assoc($query);
?>
<div class="upload-next">
<h1><?php echo $name_song; ?></h1><br><br>
<form action="config/upload-file.php" method="post" enctype="multipart/form-data">
    <center>
    <table cellpadding="10" border="0" width="600">
        <tr>
            <th>Image</th>
            <th style="border-left:1px solid grey;">Name Song</th>
        </tr>
        <tr>
            <th><input type="file" name="file"></th>
            <th style="border-left:1px solid grey;"><input type="text" name="nm_song">
            <input type="text" name="file_song" value="<?php echo $name_song; ?>">
            <input type="hidden" name="size" value="<?php echo $size; ?>">
            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
            </th>
        </tr>
        <tr>
            <td></td>
            <th style="border-left:1px solid grey;">Genre</th>
        </tr>
        <tr>
            <td></td>
            <th style="border-left:1px solid grey;">
            <select name="genre">
                <?php 
                include('config/conn.php');
                $query = "SELECT * FROM genre";
                # Get the query result
                $result = mysqli_query($con, $query);
                
                while($row = mysqli_fetch_assoc($result)) {
                ?>
                <option value="<?php echo $row["id_genre"]; ?>"><?php echo $row["genre"]; ?></option>
                <?php } ?>
            </select>
            </th>
        </tr>
        <tr>
            <th></th>
            <th style="border-left:1px solid grey;">Descriptions</th>
        </tr>
        <tr>
            <th></th>
            <th style="border-left:1px solid grey;"><textarea name="desc" cols="31"></textarea></th>
        </tr>
        <tr>
            <th colspan="2"><input type="submit" name="submit" value="Save" class="chooseFiles__button sc-button sc-button-cta sc-button-large" style="float:right; width:100%;"></th>
        </tr>
    </table>
    </center>
</form>
</div>
</body>
</html>