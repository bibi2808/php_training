<?php
require_once 'class/database.class.php';
$params = array(
	'server' =>  'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'manage_user',
	'table' => 'group'
);

$database = new Database($params);

$query[]     = "SELECT `g`.`id`,`g`.`name`,`g`.`status`,`g`.`ordering`, COUNT(`u`.id) AS total";
$query[]     = "FROM `user` AS `u` RIGHT JOIN  `group` AS `g` ON `g`.`id` = `u`.`group_id`";
$query[]     = "GROUP BY `g`.`id`";
$query = implode(" ", $query);

$list = $database->listRecords($query);
echo '<pre>';
print_r($list);
echo '<pre />';
if (!empty($list)) {
	$xhtml = '';
	$i = 1;
	foreach ($list as $item) {
		$row = ($i % 2 == 0) ? 'odd' : 'even';
		$id = $item['id'];
		$status = ($item['status'] == 0) ? 'Inactive' : 'Active';
		$xhtml .= '<div class="row  ' . $row . ' ">
						<p class="no"><input type="checkbox" name="checkbox[]" value="' .$id .'"></p>
						<p class="name">'. $item['name'] .'</p>
						<p class="id">'. $id .'</p>
						<p class="size">'. $status .'</p>
						<p class="size">'. $item['ordering'] .'</p>
						<p class="size">'. $item['total'] .'</p>
						<p class="action">
							<a href="edit.php?id='. $id .'">Edit</a> |
							<a href="delete.php?id='. $id .'">Delete</a>
						</p>
					</div>';
		$i++;
	}
} else {
	$xhtml = 'Data is fetching';
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>PHP FILE - Index</title>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#multy-delete').click(function() {
				$('#main-form').submit();
			});
		});
	</script>
</head>

<body>
	<div id="wrapper">
		<div class="title">PHP FILE - Index</div>
		<div class="list">
			<form action="multy-delete.php" method="post" name="main-form" id="main-form">
				<div class="row" style="text-align:center; font-weight:bold;">
					<p class="no">No</p>
					<p class="name">Group Name</p>
					<p class="id">ID</p>
					<p class="size">Status</p>
					<p class="size">Ordering</p>
					<p class="size">Member</p>
					<p class="action">Action</p>
				</div>
				<?php
					echo $xhtml;
				?>
			</form>
		</div>

		<div id="area-button">
			<a href="add.php">Add File</a>
			<a id="multy-delete" href="#">Delete File</a>
		</div>

	</div>
</body>

</html>