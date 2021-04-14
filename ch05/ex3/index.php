<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>Insert title here</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<div class="content">
		<h1>PHP Upload</h1>
		<?php
			require_once 'PhanSo.class.php';

			$ps = new PhanSo(2,44);
			$ps->showPS();
			echo '<hr />';
			$ps->rutGon();
			$ps->showPS();
			echo '<pre>';
			print_r($ps);
			echo '</pre>';
		?>
	</div>
</body>

</html>