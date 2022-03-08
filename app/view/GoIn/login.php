<?php
include INCLUDES_PATH."/header.php";
?>
	<body class="account-page">

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<header class="header">
				
					<div class="navbar-header">
						<a href="#" class="navbar-brand logo">
							<img src="<?=URLROOT?>assets/img/main%20logo%203.png" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="#" class="menu-logo">
								<img src="<?=URLROOT?>assets/img/main%20logo%203.png" class="img-fluid" alt="Logo">
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
							
							<!-- Login Tab Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="<?=URLROOT?>assets/img/register.png" class="img-fluid" alt="Doccure Login">
									</div>
									<div class="col-md-12 col-lg-6 login-right">
                                        <?php
                                        if (!empty($_SESSION['alert']))   {                                     ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php
                                                echo $_SESSION['alert'];
                                                unset($_SESSION['alert']);
                                            ?>
                                        </div>
										<?php
                                        }?>
										<div class="login-header">
											<h3>تسجيل الدخول</h3>
										</div>
										<form method="post" action="<?=URLROOT?>GoInController/login">
											<div class="form-group form-focus">
												<input type="tel" name="phone" class="form-control floating">
												<label class="focus-label">أدخل  رقم الهاتف</label>
											</div>
											<div class="form-group form-focus">
                                                <input type="password" id="txtPassword" class="form-control floating" name="password" />
												<label class="focus-label">كلمة السر</label>
                                                <div id="btnToggle" class="toggle"><i id="eyeIcon" class="fa fa-eye"></i></div> 
											</div>
											<div>
												<a class="forgot-link" href="<?=URLROOT?>GoInController/forget_password">هل نسيت كلمة السر ؟</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" name="submit" type="submit">سجل الدخول</button>
											<div class="login-or">
												<span class="or-line"></span>
											</div>
											<div class="text-center dont-have">ليس لديك حساب ؟ <a href="<?=URLROOT?>GoInController/register">أنشئ حساب</a></div>
										</form>
									</div>
								</div>
							</div>
							<!-- /Login Tab Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   <?php
        include INCLUDES_PATH."/footer.php";
    ?>