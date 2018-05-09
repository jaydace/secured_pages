<?php
/*
Author: Joseph Dominic Ambrocio
Website: https://www.facebook.com/dominic.ambrocio.5/
*/

$con = mysqli_connect("localhost","root","","register");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>