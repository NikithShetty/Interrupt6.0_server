<?php
	require_once('WEBHOST.php');
	require_once('DBCONNECT.php');
	$event_id = $_GET['event_id'];
	
	/* check connection */
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}		
    $venue="";
    $date="";
    $time="";
	$sql="SELECT * FROM `".DB."`.`events` WHERE event_id='$event_id';";
	$result = mysqli_query($con,$sql) or die("Error: ".mysqli_error($con));
	$row=mysqli_fetch_assoc($result);
	$date_str = strtotime($row["date_time"]);
	$date = date("Y-m-d", $date_str);
	$time = date("H:m", $date_str);
	$venue = $row["venue"];
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
				<div class='jumbotron'>
					<h1>".$row['event_name']."</h1>
				</div><br>
				<div class='container'>
					<form class='col-xs-12' action='".WEB_HOST."/updateDateTime.php' method='GET'>
						<p class='lead'>".$row['event_desc']."</p>
						<br><br>
						<div class='form-group'>
							<p class='col-xs-12' <b>Date: </b>
								<input type='date' name='date' value='".$date."' min='2017-03-02' max='2017-03-03'>
							</p>
						</div>
						<div class='form-group'>
							<p class='col-xs-12' <b>Time: </b>
								<input type='time' name='time' value='".$time."'>
							</p>
						</div>
						<div class='form-group'>
							<label for='venue'>Venue:</label>
							<input type='text' class='form-control' name='venue' value='".$venue."' placeholder='Enter venue' required>
					    </div>
						<button type='submit' class='col-xs-12 btn btn-primary'>Change event time</button>
						<br><br>
						<input type='hidden' name='eventId' value='".$event_id."'>
					</form>
				</div>
				<div class='footer jumbotron'>
					<a href='".WEB_HOST."/event_redirect.php?event_id=".$event_id."' class='col-xs-10 col-xs-offset-1 btn btn-primary'>Back</a>
				</div>";
				/*print"
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
			    ";*/
		?>
	</body>
</html>