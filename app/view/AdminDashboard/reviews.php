<?php
$pageTitle='Reviews';
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
								<h3 class="page-title">المراجعات</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?=URLROOT?>AdminController/index">لوحة التحكم</a></li>
									<li class="breadcrumb-item active">المراجعات</li>
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
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>اسم العميل</th>
													<th>اسم الملعب</th>
													<th>التقييم</th>
													<th>الوصف</th>
													<th>التاريخ</th>
													<th>إجراء</th>
												</tr>
											</thead>
											<tbody>
												<?php
													if(!empty($data['reviews'])){
														
														foreach($data['reviews'] as $one_row){ ?>
															<tr id='<?= $one_row->id ?>'>
																<td>
																	<h2 class="table-avatar">
																		<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?= ($one_row->image!='')? USER_PHOTOS_PATH_SHOW.$one_row->image: USER_PHOTOS_PATH_SHOW.'user.png' ?>" alt="User Image"></a>
																		<a href="profile.html"><?= $one_row->username ?> </a>
																	</h2>
																</td>
																<td>
																	<h2 class="table-avatar">
																		<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?= PITCHES_PHOTOS_PATH_SHOW.$one_row->img ?>" alt="User Image"></a>
																		<a href="profile.html"><?= $one_row->std_name ?></a>
																	</h2>
																</td>
																
																<td>
																	<i class="fe fe-star text-warning"></i>
																	<i class="fe fe-star text-warning"></i>
																	<i class="fe fe-star text-warning"></i>
																	<i class="fe fe-star-o text-secondary"></i>
																	<i class="fe fe-star-o text-secondary"></i>
																</td>
																
																<td>
																<?= $one_row->comment ?>
																</td>
																	<td><?= $one_row->res_day ?> <br><small><?= $one_row->res_start ?></small></td>
																<td class="text-right">
																	<div class="actions">
																		<a class="btn btn-sm bg-danger-light " data-role='delete' data-id="<?= $one_row->id ?>" href="#">
																			<i class="fe fe-trash"></i> حذف
																		</a>
																		
																	</div>
																</td>
															</tr>
														<?php }
													} else { ?>
														<tr>
															<td>
																لا توجد حجوزات
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
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
			
			<!-- Delete Modal -->
			<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
					<!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">حذف</h4>
								<input type="hidden" id='id' class='form-control'>
								<p class="mb-4">هل أنت متأكد من أنك تريد الحذف؟</p>
								<button type="button" id='delete' class="btn btn-primary">حفظ</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Delete Modal -->
<?php
include INCLUDES_ADMIN_PATH."/footer.php";

?>		
		
		
		<script type="text/javascript">
    $(document).ready(function(){
        
        $(document).on('click','a[data-role=delete]',function(){
            var id = $(this).data('id');

            $('#id').val(id);

            $('#delete_modal').modal('toggle');
        });

        $('#delete').click(function(){
            var id 	= $('#id').val();


            $.ajax({
                url : '<?=URLROOT?>AdminController/deleteReview',
                method : 'POST',
                data : {id : id},
                success : function(response){

                    $('#delete_modal').modal('toggle');
                    location.reload();

                }

            })
        });

    });
</script>		


