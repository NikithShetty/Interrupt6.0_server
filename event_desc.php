<?php
	require_once('WEBHOST.php');
	require_once('DBCONNECT.php');
	$event = $_GET['event'];
	
	/* check connection */
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}		

	$sql="SELECT * FROM events where event_name='$event'";
	$result = mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($result)
 ?>

<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8"> 
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php
			print"
				<div class='row' stylesheet='background-color: grey'>
					<img class='col-xs-12' src='".$row['img_url']."'/><br>
					<h1 class='col-xs-10 col-xs-offset-1'>".$row['event_name']."</h1>
				</div>
				<div class='container'>
					<div class='form-group'>
						<p class='col-xs-12 lead'>".$row['event_desc']."</p>
				    </div>
				    <div class='form-group'>
						<p class='col-xs-12'><b>Date & Time : </b>".$row['date_time']."</p>
				    </div>
				    <div class='form-group'>
						<p class='col-xs-12'><b>Venue : </b>".$row['venue']."</p>
				    </div>
				</div>
				<div class='footer jumbotron'>
					<a href='".WEB_HOST."/buttons.php'><button type='button' class='col-xs-10 col-xs-offset-1 btn btn-primary'>Back</button></a>
				</div>
		    ";
		?>
	</body>
</html>