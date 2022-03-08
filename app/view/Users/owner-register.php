<!DOCTYPE html> 
<html lang="ar">
	
<head>
		<meta charset="utf-8">
		<title>85:45</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link href="<?=URLROOT?>UserAssets/img/main%20logo%203.png"- rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?=URLROOT?>UserAssets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=URLROOT?>UserAssets/css/bootstrap-rtl.css">
		<link rel="stylesheet" href="<?=URLROOT?>UserAssets/css/bootstrap-rtl.min.css">
        
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="<?=URLROOT?>UserAssets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="<?=URLROOT?>UserAssets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="<?=URLROOT?>UserAssets/css/style.css">
    
	</head>
	<body class="account-page">
      
		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<header class="header">
				
					<div class="navbar-header">
						<a href="index.php" class="navbar-brand logo">
							<img src="<?=URLROOT?>UserAssets/img/main%20logo%203.png" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index.php" class="menu-logo">
								<img src="<?=URLROOT?>UserAssets/img/main%20logo%203.png" class="img-fluid" alt="Logo">
							</a>
						</div>
                    </div>
			</header>
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
										<img src="<?=URLROOT?>UserAssets/img/owner%20register.png" class="img-fluid" alt="Login Banner">
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>إنشاء حساب لصاحب الملعب <a href="register.php">ليس لديك ملعب ؟</a></h3>
										</div>
										
										<!-- Register Form -->
										<form action="owner-register.php">
											<div class="form-group form-focus">
												<input type="text" class="form-control floating">
												<label class="focus-label">الاسم</label>
											</div>
                                            <div class="form-group form-focus">
												<input type="text" class="form-control floating">
												<label class="focus-label">البريد الإلكتروني</label>
											</div>
											<div class="form-group form-focus">
												<input type="text" class="form-control floating">
												<label class="focus-label">رقم الهاتف</label>
											</div>
                                            <div class="form-group form-focus">
                                                <input type="password" id="txtPassword" class="form-control floating" name="txtPassword" />
												<label class="focus-label">كلمة السر</label>
                                                <div id="btnToggle" class="toggle"><i id="eyeIcon" class="fa fa-eye"></i></div> 
											</div>
											<div>
												<a class="forgot-link" href="login.php">لديك حساب ؟</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">أنشئ حساب </button>
											<div class="login-or">
												<span class="or-line"></span>
											</div>
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
   
				<!-- Footer -->
			<footer class="footer">
				<!-- Footer Bottom -->
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
				<!-- /Footer Bottom -->
				
			</footer>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="<?=URLROOT?>UserAssets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="<?=URLROOT?>UserAssets/js/popper.min.js"></script>
		<script src="<?=URLROOT?>UserAssets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="<?=URLROOT?>UserAssets/js/script.js"></script>
		
	</body>
</html>