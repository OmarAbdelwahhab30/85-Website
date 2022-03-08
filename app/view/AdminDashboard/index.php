<?php
$pageTitle = 'Dashboard';
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
                        <h3 class="page-title">أهلا بك!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">لوحة التحكم</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
										<span class="dash-widget-icon text-primary border-primary">
											<i class="fa fa-futbol-o"></i>
										</span>
                                <div class="dash-count">
                                    <h3><?=$data['stadium_no']?></h3>
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                <h6 class="text-muted">الملاعب</h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary w-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
										<span class="dash-widget-icon text-success">
											<i class="fe fe-users"></i>
										</span>
                                <div class="dash-count">
                                    <h3><?=$data['user_no']?></h3>
                                </div>
                            </div>
                            <div class="dash-widget-info">

                                <h6 class="text-muted">العملاء</h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success w-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
										<span class="dash-widget-icon text-danger border-danger">
											<i class="fe fe-layout"></i>
										</span>
                                <div class="dash-count">
                                    <h3><?=$data['reservation_no']?></h3>
                                </div>
                            </div>
                            <div class="dash-widget-info">

                                <h6 class="text-muted">المواعيد المحجوزة</h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-danger w-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
										<span class="dash-widget-icon text-warning border-warning">
											<i class="fe fe-money"></i>
										</span>
                                <div class="dash-count">
                                    <h3><?=$data['profits']?></h3>
                                </div>
                            </div>
                            <div class="dash-widget-info">

                                <h6 class="text-muted">الأرباح</h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-warning w-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6">

                    <!-- Sales Chart -->
                    <div class="card card-chart">
                        <div class="card-header">
                            <h4 class="card-title">الأرباح</h4>
                        </div>
                        <div class="card-body">
                            <div id="morrisArea"></div>
                        </div>
                    </div>
                    <!-- /Sales Chart -->

                </div>
                <div class="col-md-12 col-lg-6">

                    <!-- Invoice Chart -->
                    <div class="card card-chart">
                        <div class="card-header">
                            <h4 class="card-title">الاحصائيات</h4>
                        </div>
                        <div class="card-body">
                            <div id="morrisLine"></div>
                        </div>
                    </div>
                    <!-- /Invoice Chart -->

                </div>
            </div>
            <div class="row">
                <div class="col-md-6 d-flex">

                    <!-- Recent Orders -->
                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h4 class="card-title">قائمة الملاعب</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                    <tr>
                                        <th>أسم الملعب</th>
                                        <th>المساحة</th>
                                        <th>الأرباح</th>
                                        <th>المراجعات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(!empty($data['stadiums'])){
                                        foreach($data['stadiums'] as $onerow){ ?>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="profile.php"><?= $onerow->std_name ?></a>
                                                    </h2>
                                                </td>
                                                <td><?= $onerow->std_size ?></td>
                                                <td><?= $onerow->std_profits ?></td>
                                                <td>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star-o text-secondary"></i>
                                                </td>
                                            </tr>
                                        <?php }

                                    } else{ ?>
                                        <tr>
                                            <td>
                                                لا توجد ملاعب
                                            </td>
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
                <div class="col-md-6 d-flex">

                    <!-- Feed Activity -->
                    <div class="card  card-table flex-fill">
                        <div class="card-header">
                            <h4 class="card-title">قائمة العملاء</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                    <tr>
                                        <th>اسم العميل</th>
                                        <th>رقم الهاتف</th>
                                        <th>البريد الألكتروني</th>
                                        <th>اخر زياره</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(!empty($data['users'])){
                                        foreach($data['users'] as $onerow){ ?>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="profile.php"><?= $onerow->username ?></a>
                                                    </h2>
                                                </td>
                                                <td><?= $onerow->phone ?></td>
                                                <td><?= $onerow->email ?></td>
                                                <td class="text-right"><?= $onerow->last_seen ?></td>
                                            </tr>

                                        <?php }
                                    } else { ?>
                                        <tr>
                                            <td>
                                                لا يوجد عملاء
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /Feed Activity -->

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <!-- Recent Orders -->
                    <div class="card card-table">
                        <div class="card-header">
                            <h4 class="card-title">قائمة المواعيد</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0">
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
                                    if(!empty($data['reservations'])){
                                        foreach($data['reservations'] as $onerow ){ ?>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="profile.php"><?= $onerow->std_name ?></a>
                                                    </h2>
                                                </td>
                                                <td><?= $onerow->std_size ?></td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="profile.php"><?= $onerow->username ?></a>
                                                    </h2>
                                                </td>
                                                <td><?= $onerow->res_day ?> <span class="text-primary d-block"><?= $onerow->res_start ?></span></td>
                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status_1" class="check" checked>
                                                        <label for="status_1" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <?= $onerow->cost ?>
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
                    <!-- /Recent Orders -->

                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
<?php

include INCLUDES_ADMIN_PATH."/footer.php";
?>