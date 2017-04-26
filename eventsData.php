<?php
	require_once('WEBHOST.php');
	require_once('DBCONNECT.php');

	$sql="SELECT * FROM events;";
	$result = mysqli_query($con,$sql);
	$array = array();
	while($row=mysqli_fetch_assoc($result)){
		$array[]=$row;
	}
	echo json_encode($array);
	exit(0);
?>