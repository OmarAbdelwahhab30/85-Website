<!DOCTYPE html> 
<html lang="ar">
	
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
									<li class="breadcrumb-item"><a href="index.php">الرئيسية</a></li>
									<li class="breadcrumb-item active" aria-current="page">الملاعب المفضلة</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">الملاعب المفضلة</h2>
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
							<div class="row row-grid">
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="profile-widget">
										<div class="pitch-img">
											<a href="pitch-profile.php">
												<img class="img-fluid" alt="Pitch" src="<?=URLROOT?>UserAssets/img/pitches/pitch-1.png">
											</a>
											<a href="javascript:void(0)" class="fav-btn">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
										<h3 class="title">
											<a href="pitch-profile.php">ملاعب الأمل</a>
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">7x7</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<span class="d-inline-block average-rating">(17)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i>المنصورة
											</li>
											<li>
												<i class="far fa-clock"></i>متاح كل الايام
											</li>
											<li>
                                                <i class="far fa-money-bill-alt"></i>EGP 100 سعر الساعة
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="pitch-profile.php" class="btn view-btn">عرض التفاصيل</a>
											</div>
											<div class="col-6">
												<a href="booking.php" class="btn book-btn">أحجز الأن</a>
											</div>
										</div>
									</div>
									</div>
								</div>
								
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="profile-widget">
										<div class="pitch-img">
											<a href="pitch-profile.php">
												<img class="img-fluid" alt="Pitch" src="<?=URLROOT?>UserAssets/img/pitches/pitch-3.png">
											</a>
											<a href="javascript:void(0)" class="fav-btn">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
										<h3 class="title">
											<a href="pitch-profile.php">ملعب أسطورة المشاهير</a>
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">5x5</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(27)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i>المنصورة
											</li>
											<li>
												<i class="far fa-clock"></i>متاح كل الايام (عدا الجمعة)  
											</li>
											<li>
                                                <i class="far fa-money-bill-alt"></i>EGP 90 سعر الساعة
											</li>
										</ul>
									    <div class="row row-sm">
											<div class="col-6">
												<a href="pitch-profile.php" class="btn view-btn">عرض التفاصيل</a>
											</div>
											<div class="col-6">
												<a href="booking.php" class="btn book-btn">أحجز الأن</a>
											</div>
										</div>
									  </div>
									</div>
								</div>
								
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="profile-widget">
										<div class="pitch-img">
											<a href="pitch-profile.php">
												<img class="img-fluid" alt="Pitch" src="<?=URLROOT?>UserAssets/img/pitches/pitch-5.png">
											</a>
											<a href="javascript:void(0)" class="fav-btn">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
										<h3 class="title">
											<a href="pitch-profile.php">ملعب ركلة البداية</a>
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">5x5</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(66)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i>المنصورة
											</li>
											<li>
												<i class="far fa-clock"></i>متاح كل الايام عدا الجمعة و السبت(10 ص - 12 م)  
											</li>
											<li>
                                                <i class="far fa-money-bill-alt"></i>EGP 100 سعر الساعة
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="pitch-profile.php" class="btn view-btn">عرض التفاصيل</a>
											</div>
											<div class="col-6">
												<a href="booking.php" class="btn book-btn">أحجز الأن</a>
											</div>
										</div>
									  </div>
									</div>
								</div>
								
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="profile-widget">
										<div class="pitch-img">
											<a href="pitch-profile.php">
												<img class="img-fluid" alt="Pitch" src="<?=URLROOT?>UserAssets/img/pitches/pitch-2.png">
											</a>
											<a href="javascript:void(0)" class="fav-btn">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
										<h3 class="title">
											<a href="pitch-profile.php">ملعب الشرق</a>
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">5x5</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(35)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i>المنصورة
											</li>
											<li>
												<i class="far fa-clock"></i>متاح كل الايام (10 ص - 3 ص)  
											</li>
											<li>
                                                <i class="far fa-money-bill-alt"></i>EGP 75 سعر الساعة
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="pitch-profile.php" class="btn view-btn">عرض التفاصيل</a>
											</div>
											<div class="col-6">
												<a href="booking.php" class="btn book-btn">أحجز الأن</a>
											</div>
										</div>
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