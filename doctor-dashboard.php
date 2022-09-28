<?php include("check-sess.php"); ?>

<?php

 if($_SESSION["type"]==0)
 {
	header("location: access-den.php");
    exit();
 }
?>
<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/doctor-dashboard.html  30 Nov 2019 04:12:03 GMT -->
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
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Dashboard</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<!-- Profile Sidebar -->
						<?php include("doctor-panel.php"); ?>
						<!-- / Profile Sidebar -->
						
						<div class="col-md-7 col-lg-8 col-xl-9">

							
							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-4">Patient Appoinment</h4>
									<div class="appointments">
										<?php
										$docid=$_SESSION["user"];
										$q="SELECT * FROM appointments WHERE doctor_id=$docid AND status=0";
										include("conn.php");
										$results=$conn->query($q);
										foreach($results as $r)
										{
											$patid=$r["patient_id"];
										$q="SELECT * FROM patients WHERE id=$patid";
										$tmp=$conn->query($q);
										$patient=$tmp->fetch_assoc();
										$q="SELECT * FROM users WHERE id=$patid";
										$tmp=$conn->query($q);
										$user=$tmp->fetch_assoc();

										?>
										<!-- Appointment List -->
										<div class="appointment-list">
											<div class="profile-info-widget">
												<a href="#" class="booking-doc-img">
													<img src="<?= $patient["image_path"]==null? "assets/img/default.png" : $patient["image_path"] ?>" alt="User Image">
												</a>
												<div class="profile-det-info">
													<h3><a href="#"><?= $patient["firstname"]. " ". $patient["lastname"] ?></a></h3>
													<div class="patient-details">
														<h5><i class="far fa-clock"></i><?= $r["appt_date"] ?>, <?= $r["appt_time"] ?></h5>
														<h5><i class="fas fa-map-marker-alt"></i> <?= $patient["state"] ?>, <?= $patient["country"] ?></h5>
														<h5><i class="fas fa-envelope"></i> <?= $user["email"] ?></h5>
														<h5 class="mb-0"><i class="fas fa-phone"></i> <?= $patient["mobile"] ?></h5>
													</div>
												</div>
											</div>
											<div class="appointment-action">
												
												<a href="doctor-accept-appt.php?id=<?= $r["id"] ?>" class="btn btn-sm bg-success-light">
													<i class="fas fa-check"></i> Accept
												</a>
												<a href="doctor-cancel-appt.php?id=<?= $r["id"] ?>" class="btn btn-sm bg-danger-light">
													<i class="fas fa-times"></i> Cancel
												</a>
											</div>
										</div>
										<?php } ?>
										<!-- /Appointment List -->
										
									</div>
								</div>
							</div>

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
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Circle Progress JS -->
		<script src="assets/js/circle-progress.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- doccure/doctor-dashboard.html  30 Nov 2019 04:12:09 GMT -->
</html>