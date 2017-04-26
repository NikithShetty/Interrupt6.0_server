<?php
	require_once('WEBHOST.php');
	require_once('DBCONNECT.php');

	if(isset($_GET['event_id'])){
		$event_Id = $_GET['event_id'];

		$sql="SELECT * FROM `".DB."`.`login` where event_id='$event_Id'";
	}else{
		$sql="SELECT * FROM `".DB."`.`login`";
	}
	
	$result = mysqli_query($con,$sql) or die("Error: ".mysqli_error($con));
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
		<table class="table-bordered" align="center">
			<thead>
				<tr>
					<th>Event_id</th>
					<th>Login</th>
				</tr>
			</thead>
			<tbody>
				<?php
					while($row=mysqli_fetch_assoc($result)){
						print"
							<tr>
								<td>".$row['event_id']."</td>
								<td>".$row['password']."</td>
							</tr>
						";
					}
				?>
			</tbody>
		</table>
	</body>
</html>