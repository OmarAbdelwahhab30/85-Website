<!DOCTYPE html> 
<html lang="ar">
<?php
$std = !empty($data)? $data[0]:"";
$data =!empty($data2)? $data2:"";
?>

<head>
		<meta charset="utf-8">
		<title>85:45</title>
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
									<li class="breadcrumb-item"><a href="<?=URLROOT?>UserController/index">الرئيسية</a></li>
									<li class="breadcrumb-item active" aria-current="page">الدفع</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">الدفع</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">

					<div class="row">
                        						
						<div class="col-md-5 col-lg-4 theiaStickySidebar">
						
							<!-- Booking Summary -->
							<div class="card booking-card">
								<div class="card-header">
									<h4 class="card-title">تفاصيل الحجز</h4>
								</div>
								<div class="card-body">
								
									<!-- Booking Pitch Info -->
									<div class="booking-pitch-info">
										<a class="booking-pitch-img">
											<img style="margin-left: 10px" src="<?=URLROOT?>UserAssets/img/pitches/<?=$std->img?>.png" alt="User Image">
										</a>
										<div class="booking-info">
											<h4><a href="pitch-profile.php"><?=$std->std_name?></a></h4>
											<div class="pitch-details">
												<p class="pitch-location"><i class="fas fa-map-marker-alt"></i><?=$std->std_loc?></p>
											</div>
										</div>
									</div>
									<!-- Booking Pitch Info -->
									
									<div class="booking-summary">
										<div class="booking-item-wrap">
											<ul class="booking-date">
												<li>التاريخ<span><?=$data2['date']?></span></li>
												<li>الساعة <span><?=$data2['hour']?></span></li>
											</ul>
											<ul class="booking-fee">
												<li>سعر الساعة <span><?=$std->hour_price?>EGP</span></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- /Booking Summary -->
							
						</div>
						<div class="col-md-7 col-lg-8">
							<div class="card">
								<div class="card-body">
								
									<!-- Checkout Form -->
									<form method="post" action="<?=URLROOT?>UserController/checkout/<?=$std->id?>/<?=$data2['date']?>/<?=$data2['hour']?>">
										<!-- Personal Information -->
										<div class="info-widget">
											<h4 class="card-title">بيانات شخصية</h4>
											<div class="row">
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>البريد الإلكتروني</label>
														<input value="<?=$_SESSION['email']?>" name="email" class="form-control" type="email" >
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>رقم الهاتف</label>
														<input value="<?=$_SESSION['phone']?>" name="phone" class="form-control" type="text" >
													</div>
												</div>
											</div>
                                            <div class="payment-list">

                                                <button class="btn btn-primary submit-btn" type="submit">تأكيد الحجز</button>
                                            </div>
                                           <div class="exist-customer">
										   </div>
                                        </div>
										<!-- /Personal Information -->
                                        <?php
                                        if (!empty($_SESSION['alert'])){
                                        ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?=$_SESSION['alert']?>
                                            <?php unset($_SESSION['alert'])?>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        <!-- Cash Payment -->
                                        <ul>
                                            <li>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a>الدفع يكون نقدي حسب الشروط المتفق عليها مع صاحب الملعب</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <!-- /Cash Payment -->

									</form>
									<!-- /Checkout Form -->	
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