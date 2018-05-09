<?php
/*
Author: Joseph Dominic Ambrocio
Website: https://www.facebook.com/dominic.ambrocio.5/
*/

session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: login.php"); // Redirecting To Home Page
}
?>