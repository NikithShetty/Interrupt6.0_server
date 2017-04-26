<?php
	require_once('WEBHOST.php');
	require_once('DBCONNECT.php');
	$name = $_GET['name'];
	$usn= strtoupper($_GET['usn']);
	$college= $_GET['college'];
    $email = $_GET['email'];
	$eventId = $_GET['event_name'];
	$phno = $_GET['phno'];
	$userName = $_GET['username'];
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
			
			if($name == '' || $email== '' || $eventId=='' || $phno==''){
				
				print"
					<div class='jumbotron'>
						<h2>please fill all values</h2>
					</div>
					<a href='".WEB_HOST."/registrationPage.php?usrnm=".$userName."'><button type='submit' class='col-xs-12 btn btn-primary'>Back to registration page</button></a>";
			} else if(!preg_match("/^\d{10,11}$/", $phno, $match)){
				print"
					<div class='jumbotron'>
						<h2>Enter correct phone number</h2>
					</div>
					<a href='".WEB_HOST."/registrationPage.php?usrnm=".$userName."'><button type='submit' class='col-xs-12 btn btn-primary'>Back to registration page</button></a>";
			}else if(!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email, $match)){
				print"
					<div class='jumbotron'>
						<h2>Enter correct email</h2>
					</div>
					<a href='".WEB_HOST."/registrationPage.php?usrnm=".$userName."'><button type='submit' class='col-xs-12 btn btn-primary'>Back to registration page</button></a>";
			} else {
				
				$sql1 = "SELECT * FROM `".DB."`.`registration` WHERE name='$name' and email='$email' and phno='$phno' and event_id='$eventId';";
				$res = mysqli_query($con,$sql1) or die("Error: ".mysqli_error($con));
				$row = mysqli_fetch_assoc($res);

				if(isset($row)){
				
					print"
						<div style='min-height: 100%;min-height: 100vh;display: flex;align-items: center;'>
							<div class='col-xs-10 col-xs-offset-1 jumbotron'>
								<h1>Error</h1>
								<h3>Already registered for the same event.</h3>
								<a href='".WEB_HOST."/registrationPage.php?usrnm=".$userName."'><button type='submit' class='col-xs-12 btn btn-primary'>Back to registration page</button></a>
							</div>
						</div>
						";
				
				} else {	
					
					$sql="INSERT INTO `".DB."`.`registration` (`event_id`, `name`, `college`, `phno`, `email`, `USN`, `regBy`) VALUES ('$eventId', '$name', '$college', '$phno', '$email', '$usn', '$userName');";
					$result = mysqli_query($con,$sql) or die("Error: ".mysqli_error($con));
					if($result && $response=true){

						header("Location: ".WEB_HOST."/email.php?name=".$name."&email=".$email."&eventId=".$eventId."&username=".$userName);
					 
					}
				}
			}
		?>
	</body>
</html>