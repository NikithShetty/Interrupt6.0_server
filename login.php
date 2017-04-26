<?php	
	require_once('WEBHOST.php');
	$username=$_GET['username'];
	$pass=$_GET['pwd'];

	if($username=="" || $pass==""){
		print"
			<div>Enter username and password</div>
		";
		exit(0);
	} else {
		require_once('DBCONNECT.php');
		$sql1 = "SELECT * FROM `".DB."`.`regLogin` WHERE  userName='$username' and password='$pass';";
		$sql2 = "SELECT * FROM `".DB."`.`login` WHERE  event_id='$username' and password='$pass';";
		$res1 = mysqli_query($con,$sql1) or die("Error: ".mysqli_error($con));
		$res2 = mysqli_query($con,$sql2) or die("Error: ".mysqli_error($con));
		
		if(mysqli_num_rows($res1)>0){
			header("Location: ".WEB_HOST."/registrationPage.php?usrnm=".$username);
		}else if(mysqli_num_rows($res2)>0){
			header("Location: ".WEB_HOST."/event_redirect.php?event_id=".$username);
		}
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
	<body class="container">
		<div style=" min-height: 100%;min-height: 100vh;display: flex;align-items: center;">
			<div class="col-xs-10 center">
				<h1>Error</h1>
				<h3>Wrong username or password</h3>
				<a href="<?php echo WEB_HOST;?>/loginInfo.html">
					<button type="submit" class="col-xs-12 btn btn-primary">Go Back to Login Page</button>
				</a>
			</div>
		</div>
	</body>
</html>