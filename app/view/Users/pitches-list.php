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
						<div class="col-md-8 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?=URLROOT?>UserController/index">الرئيسية</a></li>
									<li class="breadcrumb-item active" aria-current="page">قائمة الملاعب</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12 col-lg-8 col-xl-9 cardd">

                            <?php
                            if (!empty($data)) {
                                foreach ($data as $std) {
                                    ?>
                            <!--Pitch Widget-->
							<div class="card" >
								<div class="card-body" >
									<div class="pitch-widget" >
										<div class="pitch-info-left" >
											<div class="pitch-img" >
												<a href = "<?=URLROOT?>UserController/pitch_profile/<?=$std->id?>">
													<img src = "<?=URLROOT?>UserAssets/img/pitches/<?=$std->img?>.png" class="img-fluid" alt = "Pitch" >
												</a >
											</div >
											<div class="pitch-info-cont" >
												<h4 class="pitch-name" ><a href="<?=URLROOT?>UserController/pitch_profile/<?=$std->id?>" ><?=$std->std_name?></a></h4 >
												<p class="pitch-department" ><?=$std->std_size?></p >
												<div class="pitch-details" >
                                                    <p class="pitch-location" ><i class="fas fa-map-marker-alt" ></i ><?=$std->std_loc?>
                                                      <a href ="<?=$std->std_link?>" target = "_blank" > موقع الملعب </a >
                                                    </p >
                                                    <ul class="pitch-gallery" >
														<li >
															<a href = "<?=URLROOT?>UserAssets/img/pitches/pitch-5.png" data-fancybox = "gallery" >
																<img src = "<?=URLROOT?>UserAssets/img/pitches/pitch-5.png" alt = "Pitch" >
															</a >
														</li >
														<li >
															<a href = "<?=URLROOT?>UserAssets/img/pitches/pitch-5-1.png" data-fancybox = "gallery" >
																<img  src = "<?=URLROOT?>UserAssets/img/pitches/pitch-5-1.png" alt = "Pitch" >
															</a >
														</li >
														<li >
															<a href = "<?=URLROOT?>UserAssets/img/pitches/pitch-5-2.png" data - fancybox = "gallery" >
																<img src = "<?=URLROOT?>UserAssets/img/pitches/pitch-5-2.png" alt = "Pitch" >
															</a >
														</li >
														<li >
															<a href = "<?=URLROOT?>UserAssets/img/pitches/pitch-5-3.png" data - fancybox = "gallery" >
																<img src = "<?=URLROOT?>UserAssets/img/pitches/pitch-5-3.png" alt = "Pitch" >
															</a >
														</li >
													</ul >
												</div >
											</div >
										</div >
										<div class="pitch-info-right" >
											<div class="pitch-infos" >
												<ul >
											        <li ><i class="fas fa-map-marker-alt" ></i ><?=$std->std_loc?></li >
											        <li ><i class="far fa-money-bill-alt" ></i > سعر الساعة EGP <?=$std->hour_price?> </li >
												</ul >
											</div >
											<div class="pitch-booking" >
												<a class="view-pro-btn" href = "<?=URLROOT?>UserController/pitch_profile/<?=$std->id?>" > عرض التفاصيل </a >
												<a class="apt-btn" href = "<?=URLROOT?>UserController/booking/<?=$std->id?>" > أحجز الأن </a >
											</div >
										</div >
									</div >
								</div >
							</div >
							<!--Pitch Widget-- >
                            <?php
                                }
                            }
                            ?>
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
		
		<!-- Custom JS -->
		<script src="<?=URLROOT?>UserAssets/js/script.js"></script>
		
	</body>

</html>