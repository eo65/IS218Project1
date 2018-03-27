<?php
	session_start();
	echo "Welcome, ". $_SESSION["fname"]. " ". $_SESSION["lname"]. "! <br>";
	$_POST=array();
?>