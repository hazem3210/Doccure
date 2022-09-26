<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
                                            <?php
                                            include("conn.php");
                                            $id=$_SESSION["user"];
                                            $q="SELECT * FROM patients WHERE id=$id";
                                            $result=$conn->query($q);
                                            $patient=$result->fetch_assoc();
                                            ?>
											<img src="<?= $patient["image_path"]==null? "assets/img/default.png" : $patient["image_path"] ?>" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3><?= $patient["firstname"]. " ". $patient["lastname"] ?></h3>
											<div class="patient-details">
												<?php 
                                                if($patient["date_of_birth"]!=null){
                                                    $years= floor((time()-strtotime($patient["date_of_birth"]))/31557600);
                                                echo'<h5><i class="fas fa-birthday-cake"></i> '. $patient["date_of_birth"]. ' , '.$years.'</h5>';
                                                }
                                                if($patient["country"]!=null || $patient["state"]!=null){
												echo'<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> '.$patient["state"].', '.$patient["country"].'</h5>';
                                                }
                                                ?>
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li>
												<a href="patient-dashboard.php">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li>
												<a href="doctors.php">
													<i class="fas fa-user-md"></i>
													<span>Doctors</span>
												</a>
											</li>
											<li>
												<a href="profile-settings.php">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											<li>
												<a href="change-password.php">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
												<a href="logout.php">
													<i class="fas fa-sign-out-alt"></i>
													<span>Logout</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>

							</div>
						</div>