<?php
	require_once './class/Validate.class.php';
	require_once './class/HTML.class.php';
	require_once './connect.php';

	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}

	$error = '';
	$outValidate =array();
	$id = $_GET['id'] ?? '';
	$action = $_GET['action'];
	$flagRedirect = false;
	$titlePage = '';

	// ACTION EDIT
	if($action == 'edit'){
		$id = mysqli_real_escape_string($connect, $id);
		$query = "SELECT `name`, `status`, `ordering` FROM `group` WHERE id = '" . $id . "'";
		$outValidate = $database->singleRecord($query);
		$linkForm = 'form.php?action=edit&id=' . $id;
		if(empty($outValidate)) $flagRedirect = true;
		$titlePage = 'EDIT GROUP';
	} else if($action == 'add'){
		// ACTION ADD
		$linkForm = 'form.php?action=add&id=' . $id;
		$titlePage = 'ADD GROUP';
	} else{
		$flagRedirect = true;
	}

	// Redirect page
	if($flagRedirect == true){
		header('location: error.php');
		exit();
	}
	
	if (!empty($_POST)) {
		if($_SESSION['token'] ?? null == $_POST['token']){
			// refresh page
			unset($_SESSION['token']);
			header('location: ' . $linkForm);
			exit();
		} else{
			$_SESSION['token'] = $_POST['token'];
		}
		$source = array('name' => $_POST['name'], 'status' => $_POST['status'], 'ordering' => $_POST['ordering']);
		$validate = new Validate($source);
		$validate	->addRule('name', 'string', 2, 50)
					->addRule('ordering', 'int', 1, 10) 
					->addRule('status', 'status');
 
		$validate->run();

		$outValidate = $validate->getResult();
		// VALIDATE
		if (!$validate->isValid()) {
			$error = $validate->showErrors();
		} else {
			// INSERT TO DATABASE
			if($action == 'edit'){
				$where = array(array('id',$id));
				$database->update($outValidate, $where);
			
			} else{
				$database->insert($outValidate);
				$outValidate = array();
			}
			$success = '<div class="success">Success</div>';
		}
	}
	$arrStatus = array(2 => 'Select status', 0 => 'Inactive', 1 => 'Active');
	$status = HTML::createSelectbox($arrStatus, 'status', isset($outValidate['status']) ? $outValidate['status'] : '');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title><?php echo $titlePage; ?></title>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="./js/my-js.js"></script>
</head>

<body>
	<div id="wrapper">
		<div class="title"><?php echo $titlePage; ?></div>
		<div id="form">
			<?php 	echo $error;
					echo isset($success) ? $success : '';
			?>
			<form action="<?php echo $linkForm; ?>" method="post" name="add-form">
				<div class="row">
					<p>Name</p>
					<input name="name" type="text" value="<?php echo isset($outValidate['name']) ? $outValidate['name'] : ''; ?>">
				</div>
				<div class="row">
					<p>Status</p>
					<?php echo $status; ?>
				</div>
				<div class="row">
					<p>Ordering</p>
					<input name="ordering" type="text" value="<?php echo isset($outValidate['ordering']) ? $outValidate['ordering'] : ''; ?>">
				</div>

				<div class="row">
					<input type="submit" value="Update" name="submit">
					<input type="button" value="Cancel" name="cancel" id="cancel-button">
					<input type="hidden" value="<?php echo time(); ?>" name="token" />
				</div>
			</form>
		</div>

	</div>
</body>

</html>