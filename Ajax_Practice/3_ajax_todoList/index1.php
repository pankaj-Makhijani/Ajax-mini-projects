<?php
$con = mysqli_connect('localhost', 'root', '', 'demo');
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>PHP Todo List</title>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
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
	<script>
		function insert_data() {
			var textbox = jQuery('#title').val();
			if (textbox == '') {
				jQuery('.error').html('Please enter value');
			} else {
				jQuery.ajax({
					url: 'insert.php',
					method: 'post',
					data: 'textbox=' + textbox,
					success: function(result) {
						jQuery('#row_data').prepend('<tr id="row' + result + '"><td width="92%">' + textbox + '</td><td><a href="javascript:void(0)" onclick=delete_data("' + result + '")>Delete</a></td></tr>');
					}
				})
			}
		}

		function delete_data(id) {
			jQuery.ajax({
				url: 'delete.php',
				method: 'post',
				data: 'id=' + id,
				success: function(result) {
					jQuery('#row' + id).slideUp();
				}
			})
		}
	</script>
</head>

<body>
	<div id="container">
		<h1>PHP Todo List with Ajax</h1>
		<div id="option">
			<form method="post">
				<div id="textbox"><input type="textbox" id="title" name="title" style="width:100%;padding:15px;" /></div>
				<div id="button"><input type="button" onclick="insert_data()" value="Submit" id="submit" name="submit" style="padding:15px;" /></div>
			</form>
			<div class="error"></div>
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
						<tr id="row<?php echo $row['id'] ?>">
							<td width="92%"><?php echo $row['title'] ?></td>
							<td><a href="javascript:void(0)" onclick="delete_data('<?php echo $row['id'] ?>')">Delete</a></td>
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