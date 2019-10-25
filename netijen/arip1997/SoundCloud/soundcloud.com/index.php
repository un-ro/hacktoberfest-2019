<?php include('config/conn.php'); ?>
<html>
<head>
<title>SoundCloud - Free Stream Music</title>
<link rel="stylesheet" href="css/style.css">
<style>
    audio
    {
    width: 160px;
    box-shadow: 0px 5px 5px 0px #f70;
    }
    /* audio {
        width: 160px;
    } */
    img {
        width:160px;
        height:160px;
    }
    .gallery-msc {
        margin:10px; 
        border:1px solid #000; 
        display:inline-block;
    }
    .t-song {
        position:absolute;
        background:#0006;
        width:154px;
        color:white;
        padding:3px;
    }
    </style>
    <script type="text/javascript">
    document.addEventListener('play', function(e){
    var audios = document.getElementsByTagName('audio');
    for(var i = 0, len = audios.length; i < len;i++){
        if(audios[i] != e.target){
            audios[i].pause();
        }
    }
}, true);
</script>
</head>

<body>
<?php include 'include/header.php'; ?>
<div class="leftside">
<?php 
    $query1 = "SELECT * FROM genre";
    # Get the query result
    $result1 = mysqli_query($con, $query1);

    while ($row1 = mysqli_fetch_assoc($result1)) { 
?>
<div class="index1">
<h1><em><?php echo $row1["genre"]; ?></em></h1><hr>
<?php 
    $query = "SELECT * FROM song WHERE id_genre = '".$row1["id_genre"]."'";
    # Get the query result
    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($result)) { 
?>
    
    <div class="gallery-msc">
        <span class="t-song"><?php echo $row["file"]; ?></span>
        <img src="img/upload/<?php echo $row["image"]; ?>">
        <audio controls>
        <source src="img/upload/<?php echo $row["file"]; ?>" type="audio/mpeg">
        Your browser does not support the audio element.
        </audio>
    </div>
<?php } ?>
</div>
<?php } ?>
</div>
<div class="sidebar">
<?php include('include/sidebar.php'); ?>
</div>
</body>
</html>