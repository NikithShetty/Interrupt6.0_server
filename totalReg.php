<?php
	require_once('WEBHOST.php');
	require_once('DBCONNECT.php');

	$sql="SELECT `".DB."`.events.event_name, count(`".DB."`.registration.event_id) as total_count from `".DB."`.registration, `".DB."`.events where `".DB."`.events.event_id=`".DB."`.registration.event_id group by `".DB."`.registration.event_id order by total_count desc;";
	
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
		<table class="table-bordered" align="center">
			<thead>
				<tr>
					<th>Event</th>
					<th>Total Count</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sum = 0;
					while($row=mysqli_fetch_assoc($result)){
						print"
							<tr>
								<td>".$row['event_name']."</td>
								<td>".$row['total_count']."</td>
							</tr>
						";
						$sum = $sum + $row['total_count'];
					}
				?>
			</tbody>
		</table>
		<h2 class="jumbotron"><?php echo $sum ?></h2>
	</body>
</html>