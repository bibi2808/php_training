<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bootstrap 101 Template</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
	<?php
		require_once 'functions.php';
		$arrQuiz = createQuestion();
				echo '<pre>';
		print_r($arrQuiz);
		echo '</pre>';

		if(!empty($arrQuiz)){
			$i = 1;
			$xhtml = '';
			foreach($arrQuiz as $key => $value){
				$optionA = createAnswer($value['id'], 'option-0', $value['option-0']);
				$optionB = createAnswer($value['id'], 'option-1', $value['option-1']);
				$optionC = createAnswer($value['id'], 'option-2', $value['option-2']);
				$optionD = createAnswer($value['id'], 'option-3', $value['option-3']);
				$xhtml .= '<div class="form-group">
							<p>'.$i.'.'.$value['question'].' </p>
							<div class="row">
								<div class="col-md-6">' . $optionA . $optionB .'</div>
								<div class="col-md-6">' . $optionC . $optionD .'</div>
							</div>
						</div>';
				$i++;
			}
		}
	?>
	<div class="container list-quiz">
		<h1 class="page-header">Trắc nghiệm trực tuyến</h1>
		<form action="#" method="post" name="test-form" id="test-form" >
			<?php echo $xhtml; ?>
			
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Hoàn thành</button>
			</div>
			
		</form>
		
	</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>