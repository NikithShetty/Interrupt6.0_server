<?php
	require_once('WEBHOST.php');
	require_once('DBCONNECT.php');

	if(isset($_GET['event_id'])){
		$event_Id = $_GET['event_id'];

		$sql="SELECT slno, event_id, registration.name as pname,regLogin.name as rname, college, phno, timestamp  FROM `".DB."`.registration, `".DB."`.regLogin where registration.regBy=regLogin.userName and event_id='$event_Id' order by timestamp desc;";
	}else{
		$sql="SELECT slno, event_id, registration.name as pname,regLogin.name as rname, college, phno, timestamp  FROM `".DB."`.registration, `".DB."`.regLogin where registration.regBy=regLogin.userName order by timestamp desc";
	}
	
	$result = mysqli_query($con,$sql) or die("Error: ".mysqli_error($con));
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="refresh" content="60" > 
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body class="container">
		<h2 class="jumbotron"><?php echo mysqli_num_rows($result) ?></h2>
		<table class="table-bordered" align="center">
			<thead>
				<tr>
					<th>Reg No.</th>
					<th>Event_id</th>
					<th>Registered By</th>
					<th>Participant Name</th>
					<th>College</th>
					<th>Ph No.</th>
					<th>Timestamp</th>
				</tr>
			</thead>
			<tbody>
				<?php
					while($row=mysqli_fetch_assoc($result)){
						print"
							<tr>
								<td>".$row['slno']."</td>
								<td>".$row['event_id']."</td>
								<td>".$row['rname']."</td>
								<td>".$row['pname']."</td>
								<td>".$row['college']."</td>
								<td>".$row['phno']."</td>
								<td>".$row['timestamp']."</td>
							</tr>
						";
					}
				?>
			</tbody>
		</table>
	</body>
</html>