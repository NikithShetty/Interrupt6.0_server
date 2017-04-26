<?php	
	require_once('WEBHOST.php');
	require_once('DBCONNECT.php');

	$username = $_GET['usrnm'];
	$sql = "SELECT * FROM `".DB."`.`events`";
	$res = mysqli_query($con,$sql) or die("Error: ".mysqli_error($con));

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
	<div style=" min-height: 100%;min-height: 100vh;display: flex;align-items: center;">
		<form class="col-xs-10 col-xs-offset-1" action="<?php echo WEB_HOST;?>/registration.php" method="GET">
			<input type="hidden" name="username" value="<?php echo $username?>">
		    <div class="form-group">
				<label for="name">Participant Name<span style="color:red">*</span>:</label>
				<input type="text" class="form-control" name="name" placeholder="Enter name" required>
		    </div>
		    <div class="form-group">
				<label for="usn">USN:</label>
				<input type="text" class="form-control" name="usn" placeholder="Enter USN">
		    </div>
		    <div class="form-group">
				<label for="college">College:</label>
				<input type="text" class="form-control" name="college" value="Dr. AIT">
		    </div>
		    <div class="form-group">
				<label for="phno">Phone Number<span style="color:red">*</span>:</label>
				<input type="number" class="form-control" name="phno" placeholder="Enter phone number" pattern="^\d{10,11}$" required>
		    </div>
		    <div class="form-group">
				<label for="email">Email<span style="color:red">*</span>:</label>
				<input type="text" class="form-control" name="email" placeholder="Enter email" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required>
		    </div>
		    <div class="form-group">
				<label for="event_id">Event<span style="color:red">*</span>:</label>
				<select name="event_name">
					<?php
						while($row=mysqli_fetch_assoc($res)){
							print"<option value='".$row['event_id']."'>".$row['event_name']." - ".$row['fee']."</option>";
						}
					?>
				</select>
		    </div>
		    <button type="reset" class="col-xs-5 btn btn-primary">Reset</button>
		    <button type="submit" class="col-xs-5 col-xs-offset-2 btn btn-primary">Submit</button>
		    <br><br><br>
		    <a href="<?php echo WEB_HOST;?>/loginInfo.html" type="submit" class="col-xs-12 btn btn-primary">Logout</a>
		    <br><br><br><br><br>
		</form>
	</div>
	</body>
</html>