<!DOCTYPE html> 
<html lang="ar">
<head>
		<meta charset="utf-8">
		<title>لوحه التحكم</title>
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
									<li class="breadcrumb-item active" aria-current="page">لوحة التحكم</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">لوحة التحكم</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						
						<!-- Profile Sidebar -->
						<?php
                        include "sidebar.php";
                        ?>
						<!-- / Profile Sidebar -->
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body pt-0">
								
									<!-- Tab Menu -->
									<nav class="user-tabs mb-4">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
											<li class="nav-item">
												<a class="nav-link active" href="#pat_appointments" data-toggle="tab">المواعيد المحجوزة</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#pat_billing" data-toggle="tab">الفواتير</a>
											</li>
										</ul>
									</nav>
									<!-- /Tab Menu -->
									
									<!-- Tab Content -->
									<div class="tab-content pt-0">
										
										<!-- Appointment Tab -->
										<div id="pat_appointments" class="tab-pane fade show active">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>الملعب</th>
																	<th>موعد الحجز</th>
																	<th>تاريخ حجز الموعد</th>
																	<th>عدد الساعات المحجوزة</th>
																	<th>المبلغ المدفوع</th>
																	<th>الحالة</th>
																	<th></th>
																</tr>
															</thead>
															<tbody>
																<?php
																	if(!empty($data['reservations'])){
																		foreach($data['reservations'] as $onerow){ ?>
																				<tr>
																					<td>
																						<h2 class="table-avatar">
																							<a href="pitch-profile.php" class="avatar avatar-sm mr-2">
																								<img class="avatar-img rounded-circle" src="<?= PITCHES_PHOTOS_PATH_SHOW.$onerow->img ?>" alt="Pitch">
																							</a>
																							<a href="pitch-profile.php"><?= $onerow->std_name ?><span><?= $onerow->std_size ?></span></a>
																						</h2>
																					</td>
																					<td><?= $onerow->res_day ?> <span class="d-block text-info"><?= $onerow->res_start ?></span></td>
																					<td><?= date('Y-m-d H:i:s') ?></td>
																					<td>ساعه</td>
																					<td><?= $onerow->cost ?></td>
																					<td><span class="badge badge-pill bg-success-light">تم</span></td>
																					<td class="text-right">
																						<div class="table-action">
																							<a href="#" class="btn btn-sm bg-info-light">
																								<i class="far fa-eye"></i> معاينة
																							</a>
																						</div>
																					</td>
																				</tr>
																		<?php }

																	} else { ?>
																			<tr>
																				<td>
																					لا يوجد حجوزات 
																				</td>
																			</tr>
																	<?php }
																?>
																
																															
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Appointment Tab -->
										
										<!-- Billing Tab -->
										<div id="pat_billing" class="tab-pane fade">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>رقم الفاتورة</th>
																	<th>الملعب</th>
																	<th>المدفوع</th>
																	<th>تاريخ الدفع</th>
																	<th></th>
																</tr>
															</thead>
															<tbody>
																<?php
																	if(!empty($data['transactions'])){
																			foreach($data['transactions'] as $onerow){ ?>
																					<tr>
																						<td>
																							<a href="invoice-view.php"><?='C#'.$onerow->id ?></a>
																						</td>
																						<td>
																							<h2 class="table-avatar">
																								<a href="pitch-profile.php" class="avatar avatar-sm mr-2">
																									<img class="avatar-img rounded-circle" src="<?= PITCHES_PHOTOS_PATH_SHOW.$onerow->img ?>" alt="User Image">
																								</a>
																								<a href="pitch-profile.php"><?= $onerow->std_name ?><span><?= $onerow->std_size ?></span></a>
																							</h2>
																						</td>
																						<td><?= $onerow->cost?></td>
																						<td><?= date('Y-m-d H:i:s') ?></td>
																						<td class="text-right">
																							<div class="table-action">
																								<a href="invoice-view.php" class="btn btn-sm bg-info-light">
																									<i class="far fa-eye"></i> معاينة
																								</a>
																							</div>
																						</td>
																					</tr>
																			<?php }
																	} else { ?>
																			<tr>
																				<td>
																					لا توجت
																				</td>
																			</tr>
																	<?php }
																?>
																
																
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Billing Tab -->
										
									</div>
									<!-- Tab Content -->
									
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