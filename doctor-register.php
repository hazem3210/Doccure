<?php

$isFound=true;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(! (empty($_POST["email"]) || empty($_POST["pass"]) || empty($_POST["name"])))
	{
	$email=$_POST["email"];
	
	$q="SELECT * FROM users Where email='$email' ";
	include("conn.php");
	$patient=$conn->query($q);
	if($patient->num_rows==0)
	{
	$name=$_POST["name"];
	$pass=$_POST["pass"];
	$hash=md5($pass);
	$q="INSERT INTO users(email,hash_password,type) Values('$email','$hash',1)";
	$user=$conn->query($q);
	if($user)
	{
	$tname=explode(" ",$name,2);
	$fname=$tname[0];
	$lname=$tname[1];

	$q="SELECT * FROM users Where email='$email' ";
	$insert=$conn->query($q);
	$id=$insert->fetch_assoc()['id'];
	$q="INSERT INTO doctors(id,firstname,lastname) Values($id,'$fname','$lname')";
	$finish=$conn->query($q);
	if($finish)
	{
		header("location: doctorlogin.php");
		exit();
	}
}
}
else
	{
		$isFound=false;
	}
	}
	
}
?>

<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/doctor-register.html  30 Nov 2019 04:12:15 GMT -->
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
	<body class="account-page">

		<!-- Main Wrapper -->
		<?php include("navbar.php");
		
			 ?>
						<!-- /Header -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8 offset-md-2">
						
							<!-- Account Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/login-banner.png" class="img-fluid" alt="Login Banner">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Doctor Register <a href="register.php">Not a Doctor?</a></h3>
										</div>
										
										<!-- Register Form -->
										<form action="doctor-register.php" method="POST">
											<div class="form-group form-focus">
												<input type="text" class="form-control floating" required name="name">
												<label class="focus-label">Name</label>
											</div>
											<div class="form-group form-focus">
												<input type="email" class="form-control floating" required name="email">
												<label class="focus-label">Email Address</label>
											</div>
											<div class="form-group form-focus">
												<input type="password" class="form-control floating" required name="pass">
												<label class="focus-label">Create Password</label>
											</div>
											<?php 
											if(!$isFound)
											echo '<p class="text-danger">The Email have been already used!</p>';
											?>
											<div class="text-right">
												<a class="forgot-link" href="doctorlogin.php">Already have an account?</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
											
										</form>
										<!-- /Register Form -->
										
									</div>
								</div>
							</div>
							<!-- /Account Content -->
								
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

<!-- doccure/doctor-register.html  30 Nov 2019 04:12:16 GMT -->
</html>