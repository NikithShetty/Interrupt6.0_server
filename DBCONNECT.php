<?php
	define("HOST", "198.199.121.251:3306");
	define("USER", "intr");
	define("PASS", "dr.AIT@2.k.17.6");
	define("DB", "interrupt");

	$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
?>