<?php
$pageTitle='Appointement List';
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
                        <h3 class="page-title">المواعيد المحجوزة</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=URLROOT?>AdminController/index">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">المواعيد المحجوزة</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-md-12">

                    <!-- Recent Orders -->
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="datatable table table-hover table-center mb-0">
                                    <thead>
                                    <tr>
                                        <th>الملعب</th>
                                        <th>المساحة</th>
                                        <th>العميل</th>
                                        <th>موعد الحجز</th>
                                        <th>الحالة</th>
                                        <th>المبلغ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $reservations = $data['reservations'];
                                   
                                    if(!empty($reservations)){
                                        foreach($reservations as $onerow){ ?>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?= PITCHES_PHOTOS_PATH_SHOW.$onerow->img ?>" alt="User Image"></a>
                                                        <a href="profile.php"><?= $onerow->std_name ?></a>
                                                    </h2>
                                                </td>
                                                <td><?= $onerow->std_size ?></td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?= ($onerow->image!='')? USER_PHOTOS_PATH_SHOW.$onerow->image: USER_PHOTOS_PATH_SHOW.'user.png' ?>" alt="User Image"></a>
                                                        <a href="profile.php"> <?= $onerow->username ?> </a>
                                                    </h2>
                                                </td>
                                                <td> <?= $onerow->res_day ?> <span class="text-primary d-block"><?= $onerow->res_start ?></span></td>
                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status_1" class="check" checked>
                                                        <label for="status_1" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?= $onerow->cost ?>
                                                </td>
                                            </tr>

                                        <?php }?>

                                    <?php } else { ?>
                                        <tr>
                                            <td><?= 'لا توجد حجوزات' ?></td>
                                        </tr>
                                    <?php }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /Recent Orders -->

                </div>
            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->


<?php
include INCLUDES_ADMIN_PATH."/footer.php";

?>