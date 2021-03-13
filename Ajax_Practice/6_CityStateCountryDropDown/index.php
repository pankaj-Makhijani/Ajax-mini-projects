<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Responsive Country State City Dropdown using PHP & AJAX</title>
	<script src="js/jquery.min.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>

	<style type="text/css">
		header {
			background: brown;
			height: 70px;
			text-align: center;
			color: #fff;
			width: 100%;
		}
	</style>
</head>

<body>
	<header>
		<h2>Responsive country,state,city dropdown using PHP</h2>
		<!-- <a href="http://freewebmentor.com/2014/10/facebook-style-photo-gallery-comments.html" class="stuts">Back on tutorial page</a> -->
	</header>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<br><br><br>
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<div class="col-sm-10">
							<label>Select Country</label>
							<select class="form-control" name="country" id="country">
								<option value="0">Select Country</option>
								<?php
								require_once('DbConnection.php');
								$countries = mysqli_query($connection, "SELECT * FROM country ORDER BY country");
								while ($country = mysqli_fetch_assoc($countries)) {
									echo "<option value='" . $country['id'] . "'>" . $country['country'] . "</option>";
								}
								echo mysqli_error();
								?>
							</select>
							<br>
						</div>
						<div class="col-sm-10">
							<label>Select State</label>
							<select class="form-control" name="region" id="region">
								<option value="0">Select State</option>
							</select>
							<br>
						</div>
						<div class="col-sm-10">
							<label>Select City</label>
							<select class="form-control" name="city" id="city">
								<option value="0">Select City</option>
							</select>
							<br>
						</div>
					</div>
				</form>
			</div>

		</div>
	</div>
</body>

</html>