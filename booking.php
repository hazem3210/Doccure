<?php
session_start();
 if($_SESSION["type"]==1)
 {
	header("location: access-den.php");
    exit();
 }
?>

<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/booking.html  30 Nov 2019 04:12:16 GMT -->
<head>
		<meta charset="utf-8">
		<title>Doccure</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link href="assets/img/favicon.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	
	</head>
	<body>

		<!-- Main Wrapper -->
		<?php include("navbar.php"); ?>
			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Booking</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Booking</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">
				
					<div class="row">
						<div class="col-12">
						
							<div class="card">
								<div class="card-body">
									<div class="booking-doc-info">
									<?php 
										$id=$_GET["id"];
										$q="SELECT * FROM doctors WHERE id=$id";
										include("conn.php");
										$result=$conn->query($q);
										$doctor=$result->fetch_assoc();
										?>
										<a href="doctor-profile.php<?= $id ?>" class="booking-doc-img">
											<img src="<?= $doctor["image_path"]==null? "assets/img/default.png" : $doctor["image_path"] ?>" alt="User Image">
										</a>
										<div class="doctor-profile.php<?= $id ?>">
											<h4><a href="doctor-profile.html">Dr. <?= $doctor["firstname"]. " ". $doctor["lastname"] ?></a></h4>
										
											<p class="text-muted mb-3"><i class="fas fa-map-marker-alt"></i> <?= $doctor["country"]==null? "" : $doctor["country"] ?></p>
											<p class="doc-location">
												<i class="far fa-money-bill-alt"></i> $<?= $doctor["pricing"]==null? "0" : $doctor["pricing"] ?>
											</p>
										</div>
									</div>
								</div>
							</div>
							<form  action="booking-success.php" method="GET">
							<input type="number" name="doc_id" hidden value="<?= $id?>" />
							<input type="number" name="pat_id" hidden value="<?= $_SESSION["user"]?>" />
								<div class="row">
									<div class="col-md-6">
										<div class="card">
										<div class="card-body">
											<h3>Choose your Appointment Date</h3>
											<input type="date" class="form-control" required name="Appt_date" >
										</div>
									</div>
									</div>
									<div class="col-md-6">
										<div class="card">
										<div class="card-body">
											<h3>Choose your Appointment Time</h3>
											<input type="time" class="form-control" required name="Appt_time" >
										</div>
									</div>
									</div>
								</div>
								
							
							
							<!-- Schedule Widget -->
							
							<!-- /Schedule Widget -->
							
							<!-- Submit Section -->
							<div class="submit-section proceed-btn text-right">
								<button type="submit" class="btn btn-primary submit-btn">Make Appointment</button>
							</div>
							<!-- /Submit Section -->
						</form>
						</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content -->
   
			
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- doccure/booking.html  30 Nov 2019 04:12:16 GMT -->
</html>