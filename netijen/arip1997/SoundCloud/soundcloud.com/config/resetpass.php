<?php
    session_start();
    include('conn.php');

    $oldpass = $_POST["oldpass"];
    $newpass = $_POST["newpass"];
    $curpass = $_POST["curpass"];
    $username = $_POST["username"];

    $query = "SELECT * FROM login WHERE username = '".$_SESSION["username"]."'";
    # Get the query result
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    if ($oldpass != $row["password"]) {
        $msg = "Wrong Current Password!";
        header("Location:../resetpass.php?msg=$msg");
    } else if ($curpass != $newpass) {
        $msg = "Confirm Password doesn't match!";
        header("Location:../resetpass.php?msg=$msg");
    } else {
        $update = "UPDATE login SET password = '".$newpass."' WHERE username = '".$username."'";
        
        if (mysqli_query($con, $update)) {
            header("Location:../resetpass.php");
        }
    }
?>