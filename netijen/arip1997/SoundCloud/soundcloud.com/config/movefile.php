<?php
if(@$_POST['submit']=="Procced") {
  if ($_FILES['file']['name'] != "") {
    if (($_FILES['file']['type'] == "audio/mpeg") || ($_FILES['file']['type'] == "application/force-download")) {
      if ($_FILES["file"]["size"] < 10000000) {            
        move_uploaded_file($_FILES["file"]["tmp_name"], "../img/upload/" . $_FILES["file"]["name"]);
        echo "File has been stored in your uploads directory.";
        header('Location:../upload-next.php?name='.$_FILES["file"]["name"].'&size='.$_FILES["file"]["size"].'');
      } else {
        echo "Please upload a file that is under 2 mb!";
      }
    } else {
      echo "Please upload a mp3 file!";
      exit;
    }
  } else {
    echo "Please enter a file.";
  }
}
?> 