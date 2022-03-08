<?php
    include INCLUDES_PATH."/header.php";
?>
	<body class="account-page">

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<header class="header">
				
					<div class="navbar-header">
						<a href="" class="navbar-brand logo">
                            <img src="<?=URLROOT?>assets/img/main%20logo%203.png" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="" class="menu-logo">
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
								
							<!-- Register Content -->
							<div class="account-content">

								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="<?=URLROOT?>assets/img/register.png"  class="img-fluid" alt="Doccure Register">
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
                                        }
                                        ?>
                                        <div class="login-header">

                                        <h3>أنشئ حساب</h3>
										</div>
										
										<!-- Register Form -->
										<form method="post" action="<?=URLROOT?>GoInController/register">
											<div class="form-group form-focus">
												<input type="text" name="username" required class="form-control floating">
												<label class="focus-label">الاسم</label>
											</div>
                                            <div class="form-group form-focus">
                                                <input type="email"  name="email" required class="form-control floating">
                                                <label class="focus-label"> البريد الالكتروني </label>
                                            </div>
											<div class="form-group form-focus">
												<input type="tel"  name="phone" class="form-control floating"  pattern="^01[0-2]\d{1,8}$" required />
												<label class="focus-label"> رقم الهاتف</label>
                                                <label style="color: #a7a2a2"> Ex: 010 XXXX XXXX </label>
                                            </div>
											<div class="form-group form-focus">
                                                <input required type="password"  id="txtPassword" class="form-control floating" name="password" />
												<label class="focus-label">كلمة السر</label>
                                                <div id="btnToggle" class="toggle"><i id="eyeIcon" class="fa fa-eye"></i></div> 
											</div>
                                            <div class="form-group form-focus">
                                                <input required type="date"  id="txtPassword" class="form-control floating" name="dob" />
                                                <label class="focus-label">تاريخ الميلاد</label>
                                            </div>
											<div>
												<a class="forgot-link" href="<?=URLROOT?>GoInController/login">لديك حساب ؟</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" name="submit" type="submit">أنشئ حساب </button>
											<div class="login-or">
												<span class="or-line"></span>
											</div>
										</form>
										<!-- /Register Form -->
										
									</div>
								</div>
							</div>
							<!-- /Register Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
            <?php
                include INCLUDES_PATH."/footer.php";
            ?>