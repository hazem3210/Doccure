<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/  30 Nov 2019 04:11:34 GMT -->
<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Doccure</title>
		
		<!-- Favicons -->
		<link type="image/x-icon" href="assets/img/favicon.png" rel="icon">
		
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
			
			<!-- Home Banner -->
			<section class="section section-search" style="height: 80vh ;">
				<div class="container-fluid">
					<?php
					if(! isset($_SESSION["user"]))
					{
					echo' <div class="banner-wrapper">
						<div class="banner-header text-center">
							<h1>Choose Doctor, Make an Appointment</h1>
							<p>Discover the best Doctors nearest to you.</p>
						</div>
                         
						<!-- Search -->
						<div class="text-center login-link">
							<a href="login.php" class="btn btn-success btn-lg px-5 mt-5">Login / Signup</a>

						</div>'; }
						else
						{
							$id=$_SESSION["user"];
							$q="SELECT * FROM users where id=$id";
							include("conn.php");
							$tmp=$conn->query($q);
							$user=$tmp->fetch_assoc();
							if($user["type"]==0){
							echo '<div class="banner-wrapper">
							<div class="banner-header text-center">
								<h1>Hello'.$user["email"].'</h1>
								<p>Manage Your appointments.</p>
							</div>
							<div class="text-center login-link">
							<a href="patient-dashboard.php" class="btn btn-success btn-lg px-5 mt-5">Go TO Dashboard</a>

						</div>
							';
							}
							else if($user["type"]==1){
								echo '<div class="banner-wrapper">
							<div class="banner-header text-center">
								<h1>Hello'.$user["email"].'</h1>
								<p>Manage Your appointments.</p>
							</div>
							<div class="text-center login-link">
							<a href="doctor-dashboard.php" class="btn btn-success btn-lg px-5 mt-5">Go TO Dashboard</a>

						</div>
							';
							}

						}
						
						?>
						<!-- /Search -->
						
					</div>
				</div>
			</section>
			<!-- /Home Banner -->
			  
			
		   
	   </div>
	   <!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slick JS -->
		<script src="assets/js/slick.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- doccure/  30 Nov 2019 04:11:53 GMT -->
</html>