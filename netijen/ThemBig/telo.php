<?php

  $header = getallheaders();
  header('Content-Type: Application/json');
  echo json_encode($header);
?>
