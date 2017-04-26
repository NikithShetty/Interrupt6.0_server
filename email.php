<?php
	require_once('WEBHOST.php');
	require_once('DBCONNECT.php');
	$name=$_GET['name'];
	$eventId=$_GET['eventId'];
	$emailTo=$_GET['email'];
	$regBy = $_GET['username'];

	$sql = "SELECT * FROM ".DB.".events where event_id='$eventId'";
	$result = mysqli_query($con,$sql) or die("Error: ".mysqli_error($con));
	$row=mysqli_fetch_assoc($result);

	$reg_sql = "SELECT slno FROM ".DB.".registration WHERE event_id='$eventId' AND email='$emailTo' AND name='$name'";
	$reg_result = mysqli_query($con,$reg_sql) or die("Error: ".mysqli_error($con));
	$reg_row=mysqli_fetch_assoc($reg_result);

	$subject="Interrupt Event Ticket";
	$body="Thank you ".$name.", you have registered successfully for ".$row['event_name'].".\r\nYour reg. no. is ".$reg_row['slno'].". Please be present 15 minutes before the start of the event.\r\nTime: ".$row['date_time']."\r\nVenue: ".$row['venue']."\r\nPlease do like and share Interrupt 6.0 FB Page: http://www.facebook.com/Interrupt6AIT\r\n\r\nThis token is NON-TRANSFERABLE and NON REFUNDABLE.\r\nThis is an auto generated email please donot respond to this mail.";
	$headers="From: interrupt6.0@dr-ait.org";

	if(mail($emailTo, $subject, $body, $headers)){
		
	}	else{
		print "error sending email";
	}
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
				<h1>Registered successfully.</h1>
				<h3>Email will be sent shortly. Please check the spam folder if you don't see the email in the Inbox.</h3>
				<p>Your reg number is : <?php echo $reg_row['slno'] ?></p>
				<a href='<?php echo WEB_HOST;?>/registrationPage.php?usrnm=<?php print "".$regBy;?>'><button type='submit' class='col-xs-12 btn btn-primary'>Back to registration page</button></a>
			</div>
		</div>
	</body>
</html>
