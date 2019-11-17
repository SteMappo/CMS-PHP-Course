<?php 
  $connection = mysqli_connect('localhost','root','root','login');
  if (!$connection) {
  	echo "data";
  	die("database faliure" . mysqli_error($connection));
  }
?>

