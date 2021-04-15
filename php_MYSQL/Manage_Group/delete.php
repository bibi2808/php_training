<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>PHP FILE</title>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#cancel-button').click(function() {
				window.location = 'index.php';
			});
		});
	</script>
</head>

<body>
	<?php
		require_once('./connect.php');
		$id	= $_GET['id'];
		$query = "SELECT * FROM `group` WHERE `id` = '$id'";
		$item = $database->singleRecord($query);
		if(!empty($item)){
			$status = $item['status'] == 0 ? 'Inactive' : 'Active';
			$xhtml = '<div class="row">
						<p>ID:</p> ' . $item['id'] . '
						<p>Group Name: </p>' . $item['name'] . '
						<p>Status:</p>' . $status .'
						<p>Ordering:</p>' . $item['ordering'] .'
					</div>
					<div class="row">
						<input type="hidden" name="id" value="' . $item['id'] . '">
						<input type="submit" value="Delete" name="submit">
						<input type="button" value="Cancel" name="cancel" id="cancel-button">
					</div>';
		} else {
			$xhtml = "Something was wrong";
		}
		if(isset($_POST['submit'])){
			$id = $_POST['id'];
			$query = "DELETE FROM `group` WHERE `id` = $id";
			$database->query($query);
			$xhtml = 'Success';
			header("Location: index.php");
			exit();
		}
	?>
	<div id="wrapper">
		<div class="title">DELETE FILE</div>
		<div id="form">

			<form action="" method="post" name="main-form">
				<?php 
					echo $xhtml;
					// header("Location: index.php");
					// exit();
				?>
			</form>

		</div>

	</div>
</body>

</html>