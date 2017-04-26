<?php
	require_once('WEBHOST.php');
	require_once('DBCONNECT.php');
	$event_Id = $_GET['event_id'];

	$sql="SELECT * FROM `".DB."`.`registration` where event_id='$event_Id'";
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
		<table class="table-bordered">
			<thead>
				<tr>
					<th>Reg No.</th>
					<th>Participant Name</th>
					<th>USN</th>
					<th>College</th>
					<th>Ph No.</th>
					<th>email</th>
					<th>Registered By</th>
				</tr>
			</thead>
			<tbody>
				<?php
					while($row=mysqli_fetch_assoc($result)){
						print"
							<tr>
								<td>".$row['slno']."</td>
								<td>".$row['name']."</td>
								<td>".$row['USN']."</td>
								<td>".$row['college']."</td>
								<td>".$row['phno']."</td>
								<td>".$row['email']."</td>
								<td>".$row['regBy']."</td>
							</tr>
						";
					}
				?>
			</tbody>
		</table>
		<br><br><br>
		<a href='<?php echo WEB_HOST."/event_redirect.php?event_id=".$event_Id; ?>' class='col-xs-10 col-xs-offset-1 btn btn-primary'>Back</a>
	</body>
</html>