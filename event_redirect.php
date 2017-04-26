<?php
	require_once('WEBHOST.php');
	require_once('DBCONNECT.php');
	$event_Id = $_GET['event_id'];
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
		<div style='min-height: 100%;min-height: 100vh;display: flex;align-items: center;'>
			<div class='col-xs-10 col-xs-offset-1 jumbotron'>
				<a href='<?php echo WEB_HOST."/details.php?event_id=".$event_Id; ?>' class='btn btn-primary col-xs-12'>View registeration data</a>
				<br><br><br>
				<a href='<?php echo WEB_HOST."/updatePage.php?event_id=".$event_Id; ?>' class='btn btn-primary col-xs-12'>Update Info</a>
				<br><br><br>
		    	<a href="<?php echo WEB_HOST;?>/loginInfo.html" type="submit" class="col-xs-12 btn btn-primary">Logout</a>
			</div>
		</div>
	</body>
</html>
