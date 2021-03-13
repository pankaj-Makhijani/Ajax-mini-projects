<?php
$con = mysqli_connect('localhost', 'root', '', 'demo');
$error = '';
if (isset($_POST['submit'])) {
	$textbox = $_POST['textbox'];
	if ($textbox == '') {
		$error = 'Please enter value';
	} else {
		$sql = "insert into todo_list(title) values('$textbox')";
		mysqli_query($con, $sql);
	}
}

if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$sql = "delete from todo_list where id=$id";
	mysqli_query($con, $sql);
	header('location:index.php');
}
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>PHP Todo List</title>
	<style>
		body {
			width: 80%;
			margin: auto;
			font-family: arial;
		}

		#container {
			margin-top: 100px;
		}

		#container h1 {
			text-align: center;
		}

		#option #textbox {
			width: 82%;
			float: left;
		}

		#option #button {
			width: 16%;
			float: right;
		}

		#row_data {
			width: 91%;
		}

		#row_data td {
			border: 1px solid #ddd;
			padding: 8px;
		}

		#row_data tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		.clear {
			clear: both;
		}

		.error {
			color: red;
			font-size: 14px
		}
	</style>
</head>

<body>
	<div id="container">
		<h1>PHP todo List</h1>
		<div id="option">
			<form method="post">
				<div id="textbox"><input type="textbox" id="textbox" name="textbox" style="width:100%;padding:15px;" /></div>
				<div id="button"><input type="submit" id="submit" name="submit" style="padding:15px;" /></div>
			</form>
			<div class="error"><?php echo $error ?></div>
		</div>
		<div class="clear">&nbsp;</div>
		<div id="display">
			<?php
			$sql = "select * from todo_list order by id desc";
			$res = mysqli_query($con, $sql);
			$count = mysqli_num_rows($res);
			if ($count > 0) {
			?>
				<table id="row_data">
					<?php
					while ($row = mysqli_fetch_assoc($res)) {
					?>
						<tr>
							<td width="92%"><?php echo $row['title'] ?></td>
							<td><a href="index.php?delete=<?php echo $row['id'] ?>">Delete</a></td>
						</tr>
					<?php
					}
					?>
				</table>
			<?php } else {
				echo "No data found";
			} ?>
		</div>
	</div>
</body>

</html>