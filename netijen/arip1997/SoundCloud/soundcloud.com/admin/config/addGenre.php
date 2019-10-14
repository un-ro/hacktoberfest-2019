<?php
    session_start();
    include('../../config/conn.php');
    
    $genre = $_POST["genre"];
    
    $sql = "INSERT INTO genre (genre) VALUES (UPPER('$genre'))";
    if (mysqli_query($con, $sql)) {
        header("Location:../genre.php");
    }
    mysqli_close($con);
?>