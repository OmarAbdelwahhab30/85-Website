<?php
include INCLUDES_PATH."/header.php";
?>
<body class="account-page">

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<header class="header">
				
					<div class="navbar-header">
						<a href="index.html" class="navbar-brand logo">
							<img src="<?=URLROOT?>assets/img/main logo 3.png" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index.html" class="menu-logo">
								<img src="<?=URLROOT?>assets/img/main logo 3.png" class="img-fluid" alt="Logo">
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
										<img src="<?=URLROOT?>assets/img/reset%20pass.png" class="img-fluid" alt="Login Banner">
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>هل نسيت كلمة السر ؟</h3>
											<p class="small text-muted">أدخل بياناتك ليتم إرسال لك كود استعادة كلمة السر</p>
										</div>
										
										<!-- Forgot Password Form -->
										<form method="post" action="<?=URLROOT?>GoInController/forget_password">
											<div class="form-group form-focus">
												<input type="email" name="email" class="form-control floating">
												<label class="focus-label">أدخل  البريد الالكتروني الخاص بك </label>
											</div>
											<div>
												<a class="forgot-link" href="<?=URLROOT?>GoInController/login">تذكرت كلمة السر ؟</a>
											</div>
                                            <?php
                                            if (!empty($_SESSION['alert']))   {                                     ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <?php
                                                    echo $_SESSION['alert'];
                                                    unset($_SESSION['alert']);
                                                    ?>
                                                </div>
                                                <?php
                                            }
                                            ?>
											<button  class="btn btn-primary btn-block btn-lg login-btn" type="submit"> التالي</button>
										</form>
										<!-- /Forgot Password Form -->
										
									</div>
								</div>
							</div>
							<!-- /Account Content -->
							
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
<?php
include INCLUDES_PATH."/footer.php";
?>