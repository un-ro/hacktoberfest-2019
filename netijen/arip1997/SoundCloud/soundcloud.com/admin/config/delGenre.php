<?php
    session_start();
    include('../../config/conn.php');
    
    $idGenre = $_GET["id"];
    
    $sql = "DELETE FROM genre WHERE id_genre = '$idGenre'";
    if (mysqli_query($con, $sql)) {
        header("Location:../genre.php");
    }
    mysqli_close($con);
?>