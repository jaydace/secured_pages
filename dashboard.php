<?php
/*
Author: Joseph Dominic Ambrocio
Website: https://www.facebook.com/dominic.ambrocio.5/
*/
 
require('db.php');
include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard - Secured Page</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p>Dashboard</p>
<p>This is another secured page.</p>
<p><a href="index.php">Home</a></p>
<a href="logout.php">Logout</a>


<br /><br /><br /><br />
<br /><br />
<footer style="linear-gradient(90deg, red, yellow);">Team Bo-ok</footer> <br /><br />
 </div>
</body>
</html>
