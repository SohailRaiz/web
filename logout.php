<?php 


//taken help from this link: http://www.homeandlearn.co.uk/php/php14p4.html


session_start(); 
session_destroy();
header("location: home.php");
?>
