<?php
    session_start();
    include('conn.php');
    
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $notelp = $_POST["notelp"];
    $email = $_POST["email"];
    $uname = $_POST["username"];
    $pass = $_POST["password"];
    
    $sql = "INSERT INTO login (nama, alamat, no_telp, username, password, email) VALUES ('$nama', '$alamat', '$notelp', '$uname', '$pass', '$email')";
    if (mysqli_query($con, $sql)) {
        echo ("<script LANGUAGE='JavaScript'>
                window.alert('Now, you can sign in. Thanks...');
                window.location.href='signin.php';
                </script>");
        header("Location:../signin.php");
    }
    mysqli_close($con);
?>