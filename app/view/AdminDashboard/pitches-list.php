<?php
$pageTitle = 'Pitches List';
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
                        <h3 class="page-title">قائمة الملاعب</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=URLROOT?>AdminController/index">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">الملاعب</li>
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
                                        <th>الملعب</th>
                                        <th>المساحة</th>
                                        <th>تاريخ الانضمام</th>
                                        <th>الأرباح</th>
                                        <th>حالة الحساب</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $stadiums = $data['stadiums'];
                                    if(!empty($stadiums)){
                                        foreach($stadiums as $onerow){ ?>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?= PITCHES_PHOTOS_PATH_SHOW.$onerow->img ?>" alt="User Image"></a>
                                                        <a href="profile.php"><?= $onerow->std_name ?></a>
                                                    </h2>
                                                </td>
                                                <td><?= $onerow->std_size ?></td>

                                                <td><?php
                                                    list($date,$time) = explode(' ',$onerow->std_joinDate);
                                                    echo $date;

                                                    ?> <br><small><?= $time ?></small></td>

                                                <td><?= $onerow->std_profits ?></td>

                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status_1" class="check" checked>
                                                        <label for="status_1" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>
                                            </tr>

                                        <?php }
                                    } else { ?>
                                        <tr>
                                            <td><?= 'لا توجد ملاعب' ?></td>
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
<?php
include INCLUDES_ADMIN_PATH."/footer.php";

?>