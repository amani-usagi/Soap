<?php
require "lib/nusoap.php";
include "db.php";

$client = new nusoap_client("http://localhost/SOAP/service.php?wsdl");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>SOAP: Client</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		.link {
			padding: 10px;
			font-weight: bold;
			text-decoration: none;
		}
	</style>
</head>

<body>
	<div class="container">
		<span class="text-info"><?php echo $conn_msg; ?></span>
		<div class="panel-heading">
			<h2>Student Search</h2>
			<a class="link" href="./register.php">Register</a>
			<a class="link" href="./read.php">Read</a>
		</div>
		<form class="form-inline" action="" method="POST">
			<div class="form-group">
				<label for="name">Student Number</label>
				<input type="text" name="student_id" class="form-control" placeholder="Enter Student Number" autocomplete="off" required />
			</div>
			<br><br>
			<button type="submit" name="submit" class="btn btn-primary">Submit</button>
		</form>
		<p>&nbsp;</p>
		<p>

			<?php
			if (isset($_POST['submit'])) {
				$student_id = trim($_POST['student_id']);
				$response = $client->call('get_details', array("student_id" => $student_id));

				if (!empty($response))
					echo $response;
				else
					echo "Details do not exist :-(";
			}
			?>
		</p>
	</div>
</body>

</html>