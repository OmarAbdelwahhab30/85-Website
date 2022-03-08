<?php
$pageTitle = 'Profile';

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
                <div class="col">
                    <h3 class="page-title">الملف الشخصي</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=URLROOT?>AdminController/index"></a>لوحة التحكم</li>
                        <li class="breadcrumb-item active">الملف الشخصي</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <?php
        if(!empty($_SESSION['update'])){
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        } else if(!empty($_SESSION['alert'])){
            ?>
            <div class="alert alert-success" role="alert">
                <?=$_SESSION['alert']; ?>
            </div>
                <?php
            unset($_SESSION['alert']);
        }else if(!empty($_SESSION['errors'])){
            ?>
            <div class="alert alert-danger" role="alert">
                <?=$_SESSION['errors']; ?>
            </div>
            <?php
            unset($_SESSION['errors']);
        }else
        {?>
            <div></div>
            <?php
        }
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto profile-image">
                            <a href="#">
                                <img class="rounded-circle" alt="User Image" src="<?= ADMIN_PHOTOS_PATH_SHOW.$image ?>">
                            </a>
                        </div>
                        
                        <div class="col ml-md-n2 profile-user-info">
                            <h4 class="user-name mb-0"><?=$_SESSION['username']?></h4>

                            <div class="user-Location">كود المسئول :C#<?=$_SESSION['userid']?></div>
                            
                            <?php
                                if($_SESSION['image'] != ''){ ?>
                                    <button form='updatePhoto' type='submit' class="btn btn-primary submit-btn" > الصوره الافتراضيه</button>
                                <?php }
                            ?>
                            
                            

                        </div>
                        
                    </div>
                    <form id='updatePhoto' action="<?= URLROOT ?>AdminController/editPhoto" method='post' enctype="multipart/form-data">
                        <input type="file" class='upload' name='File'>
                        <input type="hidden" name='userid' value="<?= $_SESSION['userid'] ?>">
                        <button type='submit' class="btn btn-primary submit-btn" >تغيير الصوره</button>
                    </form>
                    
                    
                    
                </div>
                
                <div class="profile-menu">
                    <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#per_details_tab">حول</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#password_tab">كلمة السر</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content profile-tab-cont">

                    <!-- Personal Details Tab -->
                    <div class="tab-pane fade show active" id="per_details_tab">

                        <!-- Personal Details -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>بيانات شخصية</span>
                                            <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>تعديل</a>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">الاسم:</p>
                                            <p class="col-sm-10"><?=$_SESSION['username']?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">تاريخ الميلاد:</p>
                                            <p class="col-sm-10"><?=$_SESSION['dob']?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">البريد الإلكتروني:</p>
                                            <p class="col-sm-10"><?=$_SESSION['email']?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">رقم الهاتف:</p>
                                            <p class="col-sm-10"><?=$_SESSION['phone']?></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Edit Details Modal -->
                                <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered" role="document" >
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title">البيانات الشخصية</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="<?= URLROOT ?>AdminController/editAdmin">
                                                    <input type="hidden" name="user_id" value="">
                                                    <div class="row form-row">
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>اسم المسئول</label>
                                                                <input type="text" class="form-control" value="<?=$_SESSION['username']?>" name='username'>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>تاريخ الميلاد</label>
                                                                <div>
                                                                    <input type="date" id="birthday" value="<?=$_SESSION['dob']?>" name="birthday">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>البريد الإلكتروني</label>
                                                                <input type="email" class="form-control" value="<?=$_SESSION['email']?>" name='email'>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>رقم الهاتف</label>
                                                                <input type="text" value="<?=$_SESSION['phone']?>" class="form-control" name='phone'>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <button type="submit" class="btn btn-primary btn-block">حفظ التغييرات</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Edit Details Modal -->

                            </div>


                        </div>
                        <!-- /Personal Details -->

                    </div>
                    <!-- /Personal Details Tab -->

                    <!-- Change Password Tab -->
                    <div id="password_tab" class="tab-pane fade">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">تغيير كلمة السر</h5>
                                <div class="row">
                                    <div class="col-md-10 col-lg-6">
                                        <form action='<?= URLROOT ?>AdminController/editPassword' method='POST'>
                                            <div class="form-group">
                                                <label>كلمة السر القديمة</label>
                                                <input type="password" name='oldpassword' class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>كلمة السر الجديدة</label>
                                                <input type="password" name='newpassword1' class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>تأكيد كلمة السر الجديدة</label>
                                                <input type="password" name='newpassword2' class="form-control">
                                            </div>
                                            <button class="btn btn-primary" type="submit">حفظ التغييرات</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Change Password Tab -->

                </div>
            </div>
        </div>

    </div>
</div>
<!-- /Page Wrapper -->
<?php
include INCLUDES_ADMIN_PATH."/footer.php";

?>