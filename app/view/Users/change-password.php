<!DOCTYPE html> 
<html lang="ar">
<head>
		<meta charset="utf-8">
		<title>Doccure</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link href="<?=URLROOT?>UserAssets/img/main%20logo4.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?=URLROOT?>UserAssets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=URLROOT?>UserAssets/css/bootstrap-rtl.min.css">
		<link rel="stylesheet" href="<?=URLROOT?>UserAssets/css/bootstrap-rtl.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="<?=URLROOT?>UserAssets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="<?=URLROOT?>UserAssets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="<?=URLROOT?>UserAssets/css/style.css">
	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			 <!-- Header -->
			<header class="header">
				<?php
				include "navbar.php";
                ?>
			</header>
			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
									<li class="breadcrumb-item active" aria-current="page">تغيير كلمة السر</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">تغيير كلمة السر</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<?php
							include_once 'sidebar.php';
						?>
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
								<?php
									if(!empty($_SESSION['update'])){ ?>
										<div class="alert alert-success"> <?= $_SESSION['update'] ?> </div>                          <!--for password update --> 
									<?php 	unset($_SESSION['update']);
									} else if(!empty($_SESSION['alert'])){
										?>
										<div class="alert alert-danger" role="alert">
											<?=$_SESSION['alert']; ?>                 
										</div>
											<?php
										unset($_SESSION['alert']);
								}?>
									<div class="row">
										<div class="col-md-12 col-lg-6">
										
											<!-- Change Password Form -->
											<form action="<?=URLROOT?>UserController/editPassword" method='post'>
												<div class="form-group">
													<label>كلمة السر القديمة</label>
													<input type="password" name='oldpassword' class="form-control">
												</div>
												<div class="form-group">
													<label>كلمة السر الجديدة</label>
													<input type="password" name='newpassword1' class="form-control">
												</div>
												<div class="form-group">
													<label>تأكيد كلمة السر الجديدة</label>
													<input type="password" name='newpassword2' class="form-control">
												</div>
												<div class="submit-section">
													<button type="submit" class="btn btn-primary submit-btn">حفظ التغييرات</button>
												</div>
											</form>
											<!-- /Change Password Form -->
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
			<footer class="footer">
                <div class="footer-bottom">
					<div class="container-fluid">
					
						<!-- Copyright -->
						<div class="copyright">
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="copyright-text">
										<p class="mb-0"><a href="#">Designing &amp; Developing:Team 85:45</a></p>
									</div>
								</div>
							</div>
						</div>
						<!-- /Copyright -->
					</div>
				</div>
				
			</footer>
			<!-- /Footer --> 
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="<?=URLROOT?>UserAssets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="<?=URLROOT?>UserAssets/js/popper.min.js"></script>
		<script src="<?=URLROOT?>UserAssets/js/bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="<?=URLROOT?>UserAssets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="<?=URLROOT?>UserAssets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="<?=URLROOT?>UserAssets/js/script.js"></script>
		
	</body>

</html>