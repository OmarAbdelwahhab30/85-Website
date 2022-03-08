<!DOCTYPE html> 
<html lang="ar">
<?php
$pageTitle = 'Lock Screen';
?>
<head>
		<meta charset="utf-8">
		<title>85:45</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link href="<?=URLROOT?>AdminAssets/img/main%20logo%203.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?=URLROOT?>AdminAssets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=URLROOT?>AdminAssets/css/bootstrap-rtl.css">
		<link rel="stylesheet" href="<?=URLROOT?>AdminAssets/css/bootstrap-rtl.min.css">
        
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="<?=URLROOT?>AdminAssets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="<?=URLROOT?>AdminAssets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="<?=URLROOT?>AdminAssets/css/style.css">
    
	</head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="<?=URLROOT?>AdminAssets/img/main%20logo7.png" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<div class="lock-user">
									<img class="rounded-circle" src="<?=URLROOT?>AdminAssets/img/profiles/user.png" alt="User Image">
									<h4><?=$_SESSION['username']?></h4>
								</div>
								
								<!-- Form -->
                                    <form method="post" action="<?=URLROOT?>IndexController/LockScreen">
                                        <div class="form-group">
                                            <input class="form-control" type="password" name="password" placeholder="كلمة السر">
                                        </div>
                                        <div class="form-group mb-0">
                                            <button class="btn btn-primary btn-block" type="submit">دخول</button>
                                        </div>
                                    </form>
								<!-- /Form -->
								
								<div class="text-center dont-have">تسجيل الدخول باسم مستخدم آخر؟ <a href="<?=URLROOT?>IndexController/logout">تسجيل الدخول</a></div>
                                <?php
                                if (!empty($_SESSION['alert'])){?>
                                    <div class="w-100 p-3">
                                        <div class="row">
                                            <div class="alert alert-danger" role="alert">
                                                <?php echo $_SESSION['alert'];
                                                unset($_SESSION['alert']);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="<?=URLROOT?>AdminAssets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="<?=URLROOT?>AdminAssets/js/popper.min.js"></script>
        <script src="<?=URLROOT?>AdminAssets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="<?=URLROOT?>AdminAssets/js/script.js"></script>
		
    </body>

</html>