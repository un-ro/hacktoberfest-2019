<?php
    include('conn.php');
    session_start();
    @$username = $_SESSION["username"];
    $level = @$_SESSION["level"];
    
    $nm_song = $_POST["nm_song"];
    $file_song = $_POST["file_song"];
    $size = $_POST["size"];
    $genre = $_POST["genre"];
    $desc = $_POST["desc"];
    $file_name = $_FILES["file"]["name"];

    $id_user = $_POST["id"];

    $nama_folder = "../img/upload";
    $tmp = $_FILES["file"]["tmp_name"];
    $file_name = $_FILES["file"]["name"];
    $path = "$nama_folder/$file_name";
    $tipe_file = array("image/jpeg", "image/jpg", "image/gif", "image/png");

    $ukuran = $_FILES["file"]["size"];
    if ($ukuran > 800000) {
        header('Location:../upload-next.php?name='.$file_song.'&size='.$size.'&error=error-size');
    }
            
    if (move_uploaded_file($tmp,$path)) {
        // Insert query command
        $sql = "INSERT INTO song (id_genre, id_user, name_song, size, file, image, description) VALUES ('$genre', '$id_user', '$nm_song', '$size', '$file_song', '$file_name', '$desc')";
        $query = mysqli_query($con, $sql); 
        header("Location:../index.php");
    } else {
        $error = urldecode("Data tidak berhasil ditambahakan");
        header('Location:../upload-next.php?name='.$file_song.'&size='.$size.'&error=error-upload');
    }
    

    mysqli_close($con);
?>