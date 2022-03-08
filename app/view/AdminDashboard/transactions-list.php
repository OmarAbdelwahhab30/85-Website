<?php
$pageTitle = 'Transaction List';
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
                    <h3 class="page-title">المعاملات</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=URLROOT?>AdminController/index">لوحة التحكم</a></li>
                        <li class="breadcrumb-item active">المعاملات</li>
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
                                    <th>رقم الفاتورة</th>
                                    <th>كود العميل</th>
                                    <th>اسم العميل</th>
                                    <th>المبلغ الإجمالي</th>
                                    <th>الحالة</th>
                                    <th>إجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $reservations = $data['reservations'];
                                if(!empty($reservations)){
                                    foreach($reservations as $onerow){ ?>
                                        <tr id='<?= $onerow->id ?>'>
                                            <td data-target='res_no'><?= $onerow->id?>.#C</td>
                                            <td data-target='USERID'><?= 'C#'.$onerow->userid ?></td>
                                            <td data-target='username'><h2 class="table-avatar"><a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?= ($onerow->image!='')? USER_PHOTOS_PATH_SHOW.$onerow->image: USER_PHOTOS_PATH_SHOW.'user.png' ?>" alt="User Image"></a><a href="profile.php"><?= $onerow->username ?></h2></a></td>
                                            <td data-target='cost'><?= $onerow->cost ?></td>
                                            <td>
                                                <span class="badge badge-pill bg-success inv-badge">مدفوع</span>
                                            </td>
                                            <td>
                                                <div class="actions">
                                                    <input type="hidden" id='id' value='<?= $onerow->id ?>'>

                                                    <a href="#"  data-role='update' data-id="<?= $onerow->id ?>"  class="btn btn-sm bg-success-light mr-2">
                                                        <i class="fe fe-pencil"></i> تعديل
                                                    </a>

                                                    <a class="btn btn-sm bg-danger-light" data-role='delete' data-id="<?= $onerow->id ?>"  href="#">
                                                        <i class="fe fe-trash"></i> حذف
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php }

                                } else { ?>
                                    <tr>
                                        <td>
                                            <?= 'لا توجد حجوزات' ?>
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
<!-- Edit Details Modal -->

<div class="modal fade" id="edit_invoice_report" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تعديل تقرير الفاتورة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- form -->
                <div class=" form">

                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>رقم الفاتورة</label>
                            <h6 id="modal_body"></h6>
                            <input id='reservation_no' type="text" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>اسم العميل</label>
                            <input id='user' type="text" class='form-control'>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>المبلغ الإجمالي</label>
                            <input id='totalcost' type="text"  class="form-control" value="">
                        </div>
                    </div>
                    <input type="hidden" id='ID' class='form-control'>
                    <input type="hidden" id='userId' class='form-control'>
                </div>
                <button type="submit" id='save' data-dismis='modal' class="btn btn-primary btn-block">حفظ التغييرات</button>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>
<!-- /Edit Details Modal -->

<!-- Delete Modal -->
<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-content p-2">
                    <h4 class="modal-title">حذف</h4>
                    <p class="mb-4">هل أنت متأكد من أنك تريد الحذف؟</p>
                    <input type="hidden" id='ID_to_delete' class='form-control'>
                    <button type="button" id='sure_delete' class="btn btn-primary">حفظ</button>
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
        $(document).on('click','a[data-role=update]',function(){
            var id = $(this).data('id');
            var cost = $('#'+id).children('td[data-target=cost]').text();
            var res_no = $('#'+id).children('td[data-target=res_no]').text();
            var username = $('#'+id).children('td[data-target=username]').text();
            var userid = $('#'+id).children('td[data-target=USERID]').text();

            $('#reservation_no').val(res_no);
            $('#user').val(username);
            $('#totalcost').val(cost);
            $('#ID').val(id);
            $('#userId').val(userid);
            $('#edit_invoice_report').modal('toggle');
        });
        $('#save').click(function(){
            var id 					= $('#ID').val();
            var reservation_number  =  $('#reservation_no').val();
            if($('#user').val() !== ''){
                var user 				= $('#user').val();
            }
            var cost   				= $('#totalcost').val();
            var userid              = $('#userId').val().slice(2);


            $.ajax({
                url : '<?=URLROOT?>AdminController/edit',
                method : 'POST',
                data : {id : id, reservation_number:reservation_number , user:user , cost:cost,userid :userid},
                success : function(response){
                    $('#'+id).children('td[data-target=username]').text(user);
                    $('#'+id).children('td[data-target=cost]').text(cost);
                    $('#'+id).children('td[data-target=res_no]').text(reservation_number);
                    $('#edit_invoice_report').modal('toggle');
                }

            })
        });

        $(document).on('click','a[data-role=delete]',function(){
            var id = $(this).data('id');

            $('#ID_to_delete').val(id);

            $('#delete_modal').modal('toggle');
        });

        $('#sure_delete').click(function(){
            var id 	= $('#ID_to_delete').val();


            $.ajax({
                url : '<?=URLROOT?>AdminController/deleteCheck',
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
