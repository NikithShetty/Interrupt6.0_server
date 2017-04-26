<?php
	require_once('WEBHOST.php');
	require_once('DBCONNECT.php');
	$sendTo = $_GET['para'];
	if($sendTo=="ALL"){
		$sql = "SELECT * FROM ".DB.".regLogin";
		$result = mysqli_query($con,$sql) or die("Error: ".mysqli_error($con));
	}else {
		$sql = "SELECT * FROM ".DB.".regLogin where UserName='".$sendTo."'";
		$result = mysqli_query($con,$sql) or die("Error: ".mysqli_error($con));
	}

	while ($row=mysqli_fetch_assoc($result)) {
		$subject="Interrupt Registration App and Login details";
		$body="This is your username and password for Interrupt 6.0 registration.\r\nPlease donot share these credentials with anyone.\r\nUsername : ".$row['userName']."\r\nPassword : ".$row['password']."\r\nPlease download the app from the following link : \r\nhttps://drive.google.com/open?id=0B20HGuddMVgOeWsyajMxNXZhaG9LbGNfTVNjaEtRcGctTW80\r\nPlease Note : \r\n1. For login, enter your username as is, i.e., in capitals.\r\n2. USN of the participant should be entered in capitals. ex: 1DA13ME852 \r\nFor app queries please contact - Nikith : 9844266782";
		$headers="From: interrupt6.0@dr-ait.org";
		$emailTo=$row['email'];
		if(mail($emailTo, $subject, $body, $headers)){
			print "email sent to ".$row['userName']."\r\n";
		}	else{
			print "error sending email";
		}
	}
?>