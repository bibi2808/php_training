<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminLTE</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="./css/font.css">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="./css/all.min.css">
	<link rel="stylesheet" href="./css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="./css/adminlte.min.css">
</head>

<body>
	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand navbar-dark">
		<?php include_once 'html/nav-bar.php' ?>
	</nav>

	<!-- /.navbar -->
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<?php include_once 'html/sidebar.php' ?>
	</aside>


	<!-- CONTENT HEADER -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-heaeder">
			<?php include_once 'html/breadcrumb.php' ?>
		</section>

		<!-- CONTENT BODY -->
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<!-- BOX 1 -->
					<div class="col-lg-3 col-6">
						<!-- small box -->
						<div class="small-box bg-info">
							<div class="inner">
								<h3>150</h3>
								<p>New Orders</p>
							</div>
							<div class="icon">
								<i class="ion ion-bag"></i>
							</div>
							<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<!-- BOX 2 -->
					<div class="col-lg-3 col-6">
						<!-- small box -->
						<div class="small-box bg-success">
							<div class="inner">
								<h3>53<sup style="font-size: 20px">%</sup></h3>

								<p>Bounce Rate</p>
							</div>
							<div class="icon">
								<i class="ion ion-stats-bars"></i>
							</div>
							<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<!-- BOX 3 -->
					<div class="col-lg-3 col-6">
						<!-- small box -->
						<div class="small-box bg-warning">
							<div class="inner">
								<h3>44</h3>

								<p>User Registrations</p>
							</div>
							<div class="icon">
								<i class="ion ion-person-add"></i>
							</div>
							<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<!-- BOX 4 -->
					<div class="col-lg-3 col-6">
						<!-- small box -->
						<div class="small-box bg-danger">
							<div class="inner">
								<h3>65</h3>

								<p>Unique Visitors</p>
							</div>
							<div class="icon">
								<i class="ion ion-pie-graph"></i>
							</div>
							<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>




	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/adminlte.js"></script>
</body>
</body>

</html>