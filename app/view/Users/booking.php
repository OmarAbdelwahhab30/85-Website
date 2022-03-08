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
        <link rel="stylesheet" href="<?=URLROOT?>UserAssets/plugins/booking/bootstrap-responsive.css">
        <link rel="stylesheet" href="<?=URLROOT?>UserAssets/plugins/booking/bootstrap-datepicker.css">


		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="<?=URLROOT?>UserAssets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="<?=URLROOT?>UserAssets/plugins/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		
		<!-- Main CSS -->
		<link rel="stylesheet" href="<?=URLROOT?>UserAssets/css/style.css">
        <link rel="stylesheet" href="<?=URLROOT?>UserAssets/plugins/booking/booking-style.css">
        <link rel="stylesheet" href="<?=URLROOT?>UserAssets/plugins/booking/bootstrap-responsive.css">
    
	</head>
	<body>
    <?php
        $std = !empty($data)? $data[0]:'';
    ?>
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
									<li class="breadcrumb-item active" aria-current="page">حجز المواعيد</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">حجز المواعيد</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">
				
					<div class="row">
						<div class="col-12">
						
							<div class="card">
								<div class="card-body">
									<div class="booking-pitch-info">
										<a href="pitch-profile.php" class="booking-pitch-img">
											<img src="<?=URLROOT?>UserAssets/img/pitches/<?=$std->img?>-1.png" alt="User Image">
										</a>
										<div class="booking-info">
											<h4><a href="pitch-profile.php"><?=$std->std_name?></a></h4>
											<div class="rating">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star"></i>
												<span class="d-inline-block average-rating">35</span>
											</div>
											<p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i><?=$std->std_loc?></p>
										</div>
									</div>
								</div>
							</div>
                            <ul class="experience-list">
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <a href="" class="name">يتم اختيار يوم الحجز من تاريخ الغد وحتى شهر من الان </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">

                                            <a class="name">  قبل اتمام الحجز , نحيط علم حضراتك باتفاقيات الحجز عبر الرابط التالي   <a href="<?=URLROOT?>UserController/pitch_profile/<?=$std->id?>">اضغط هنا</a>  </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <?php
                            $nextmonth = date('Y-m-d', strtotime('+1 month'));
                            $NextDayOfToday = date('Y-m-d', strtotime(' +1 day'));
                            ?>
							<!-- Schedule Widget -->
                              <div class="row justify-content-center mx-0">
                                  <div class="col-lg-10 bookk">
                                      <div class="card border-0">

                                          <?php
                                          if (!empty($_SESSION['alert'])){
                                              ?>
                                              <div class="alert alert-danger" role="alert">
                                                  <?php
                                                  echo $_SESSION['alert'];
                                                  unset($_SESSION['alert']);
                                                  ?>
                                              </div>
                                              <?php
                                          }
                                          ?>

                                          <form  method="post" action="<?=URLROOT?>UserController/booking/<?=$std->id?>">
                                               <div style="margin-right: 355px;margin-top: 20px;">
                                                 <h5>اختر تاريخ الحجز المناسب لديك </h5>
                                                     <input  type="date" style="width: 250px;" name="date1" min="<?=date('Y-m-d', strtotime(' +1 day')) ?>" max="<?=$nextmonth?>" required>
                                               </div>
                                              <div class="card-body p-3 p-sm-5">
                                                  <div class="row text-center mx-0">
                                                      <div class="col-md-2 col-4 my-1 px-2 bookk">
                                                          <div class="cell py-1">
												             <label class="booking-radio">
													            <input type="radio" value="02:00pm" name="radio" required>
													            <span class="checkmark"></span>
												             </label>
                                                              02:00م</div>
                                                      </div>
                                                      <div class="col-md-2 col-4 my-1 px-2 bookk">
                                                          <div class="cell py-1">
                                                             <label class="booking-radio">
													            <input type="radio" value="03:00pm" name="radio" required>
													            <span class="checkmark"></span>
												             </label>
                                                              03:00م</div>
                                                      </div>
                                                      <div class="col-md-2 col-4 my-1 px-2 bookk">
                                                          <div class="cell py-1">
                                                              <label class="booking-radio">
													            <input type="radio" value="04:00pm" name="radio" required>
													            <span class="checkmark"></span>
												             </label>
                                                              04:00م</div>
                                                      </div>
                                                      <div class="col-md-2 col-4 my-1 px-2 bookk">
                                                          <div class="cell py-1">
                                                              <label class="booking-radio">
													            <input type="radio" value="05:00pm" name="radio" required>
													            <span class="checkmark"></span>
												             </label>
                                                              05:00م</div>
                                                      </div>
                                                      <div class="col-md-2 col-4 my-1 px-2 bookk">
                                                          <div class="cell py-1">
                                                              <label class="booking-radio">
													            <input type="radio" value="06:00pm" name="radio" required>
													            <span class="checkmark"></span>
												             </label>
                                                              06:00م</div>
                                                      </div>
                                                      <div class="col-md-2 col-4 my-1 px-2 bookk">
                                                          <div class="cell py-1">
                                                              <label class="booking-radio">
													            <input type="radio" value="07:00pm" name="radio" required>
													            <span class="checkmark"></span>
												             </label>
                                                              07:00م</div>
                                                      </div>
                                                  </div>
                                                  <div class="row text-center mx-0">
                                                      <div class="col-md-2 col-4 my-1 px-2 bookk">
                                                          <div class="cell py-1">
                                                              <label class="booking-radio">
													            <input type="radio" value="08:00pm" name="radio" required>
													            <span class="checkmark"></span>
												             </label>
                                                              08:00م</div>
                                                      </div>
                                                      <div class="col-md-2 col-4 my-1 px-2 bookk">
                                                          <div class="cell py-1">
                                                              <label class="booking-radio">
													            <input type="radio" value="09:00pm" name="radio" required>
													            <span class="checkmark"></span>
												             </label>
                                                              09:00م</div>
                                                      </div>
                                                      <div class="col-md-2 col-4 my-1 px-2 bookk">
                                                          <div class="cell py-1">
                                                              <label class="booking-radio">
													            <input type="radio" value="10:00pm" name="radio" required>
													            <span class="checkmark"></span>
												             </label>10:00م</div>
                                                      </div>
                                                      <div class="col-md-2 col-4 my-1 px-2 bookk">
                                                          <div class="cell py-1">
                                                              <label class="booking-radio">
													            <input type="radio" value="11:00pm" name="radio" required>
													            <span class="checkmark"></span>
												             </label>
                                                              11:00م</div>
                                                      </div>
                                                      <div class="col-md-2 col-4 my-1 px-2 bookk">
                                                          <div class="cell py-1">
                                                              <label class="booking-radio">
													            <input type="radio" value="12:00am" name="radio" required>
													            <span class="checkmark"></span>
												             </label>
                                                              12:00ص</div>
                                                      </div>
                                                      <div class="col-md-2 col-4 my-1 px-2 bookk">
                                                          <div class="cell py-1">
                                                              <label class="booking-radio">
													            <input type="radio" value="01:00am" name="radio" required>
													            <span class="checkmark"></span>
												             </label>
                                                              01:00ص</div>
                                                      </div>
                                                  </div>
                                                  <div class="row text-center mx-0">
                                                      <div class="col-md-2 col-4 my-1 px-2 bookk">
                                                          <div class="cell py-1">
                                                              <label class="booking-radio">
													            <input type="radio" value="02:00am" name="radio" required>
													            <span class="checkmark"></span>
												             </label>
                                                              02:00ص</div>
                                                      </div>
                                                  </div>
                                              </div>
                                      </div>
                                  </div>
                              </div>

							<!-- /Schedule Widget -->

							<!-- Submit Section -->
							<div class="submit-section proceed-btn text-right submitt">
								<button class="btn btn-primary submit-btn" type="submit"> استمر لإكمال الحجز</button>
							</div>
                            </form>

                            <!-- /Submit Section -->

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
        <script src="<?=URLROOT?>UserAssets/plugins/booking/booking-jquery.js"></script>
        <script src="<?=URLROOT?>UserAssets/plugins/booking/bootstrap-datepicker.js"></script>
        <script src="<?=URLROOT?>UserAssets/plugins/booking/booking-bootstrap.js"></script>
        <script src="<?=URLROOT?>UserAssets/plugins/booking/booking-js.js"></script>
		
	</body>

</html>