<?php
	require_once('WEBHOST.php');
	require_once('DBCONNECT.php');
	$date = $_GET['date'];
	$time = $_GET['time'];
	$event_Id = $_GET['eventId'];
	$venue = $_GET['venue'];

	$dateTimestamp = strtotime($date);
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
	<body class="container">
		<?php
			if($date == '' || $time == '' || $dateTimestamp < strtotime("02-03-2017") || $dateTimestamp > strtotime("03-03-2017")){
				print"
					<div class='jumbotron'>
						<h1>Error in date.</h1>
						<a href='".WEB_HOST."/updatePage.php?event_id=".$event_Id."'><button type='button' class='col-xs-12 btn btn-primary'>Go Back</button></a>
					</div>
				";
			}else{
				$dateTime = $date." ".$time; 
				$sql = "UPDATE `".DB."`.`events` SET date_time='$dateTime', venue='$venue' WHERE event_id='$event_Id';";
				$response = mysqli_query($con,$sql) or die("Error: ".mysqli_error($con));
				if($response && $response=true){
					print"
						<div class='jumbotron'>
							<h1>Updated Successfully.</h1>
							<a href='".WEB_HOST."/updatePage.php?event_id=".$event_Id."'><button type='button' class='col-xs-12 btn btn-primary'>Go Back</button></a>
						</div>
					";
				}else{
					print"
						<div class='jumbotron'>
							<h1>Query Failed, try again</h1>
							<a href='".WEB_HOST."/updatePage.php?event_id=".$event_Id."'><button type='button' class='col-xs-12 btn btn-primary'>Go Back</button></a>
						</div>
					";
				}
			}
		?>
	</body>
</html>