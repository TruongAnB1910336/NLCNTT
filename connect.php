<?php
$conn= new mysqli("localhost","root","","nlcntt");
// echo "connect database success";
if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
    exit();
  }
  $conn -> set_charset("utf8");
?>