<?php
$pageTitle = 'Users';
include INCLUDES_ADMIN_PATH."/header.php";
include INCLUDES_ADMIN_PATH."/nav.php";
include INCLUDES_ADMIN_PATH."/sidebar.php";


?>

			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">قائمة العملاء</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?=URLROOT?>AdminController/index">لوحة التحكم</a></li>
									<li class="breadcrumb-item active">العملاء</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>كود العميل</th>
													<th>اسم العميل</th>
                                                    <th>البريد الألكتروني</th>
                                                    <th>رقم الهاتف</th>
													<th>اخر زيارة</th>
													<th>مدفوع</th>
												</tr>
											</thead>
											<tbody>
                                            <?php
                                                if (!is_string($data)){
                                                    foreach ($data as $user){
                                            ?>
												<tr>
													<td>C#<?=$user->userid?></td>
													<td>
														<h2 class="table-avatar">
															<a href="profile.php" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php 
															if($user->image != null){
																echo USER_PHOTOS_PATH_SHOW.$user->image;
															} else {
																echo USER_PHOTOS_PATH_SHOW.'user.png';
															}
															?>" alt="User Image"></a>
															<a href="profile.php"><?=$user->username?></a>
														</h2>
													</td>
													<td><?=$user->email?></td>
													<td><?=$user->phone?></td>
													<td><?=$user->last_seen?></td>
													<td>EGP100.00</td>
												</tr>
                                                <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <tr>
                                                        <td colspan="6">لا يوجد عملاء حاليا</td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
											</tbody>
										</table>
									</div>
									</div>
								</div>
							</div>
						</div>			
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->

<?php
include INCLUDES_ADMIN_PATH."/footer.php";

?>