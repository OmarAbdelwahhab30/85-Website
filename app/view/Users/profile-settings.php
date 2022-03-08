<!DOCTYPE html>
<html lang="ar">

<?php
// var_dump($_SESSION);
if($_SESSION['image'] == ''){
    $image = STATIC_IMAGE;
} else {
    $image = $_SESSION['image'];
}
?>

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

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="<?=URLROOT?>UserAssets/css/bootstrap-datetimepicker.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="<?=URLROOT?>UserAssets/plugins/select2/css/select2.min.css">

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
                            <li class="breadcrumb-item active" aria-current="page">إعدادات الملف الشخصي</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">إعدادات الملف الشخصي</h2>
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
                include_once 'sidebar.php';
                ?>
                <!-- /Profile Sidebar -->

                <div class="col-md-7 col-lg-8 col-xl-9">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            if(!empty($_SESSION['errors'])){
                                foreach($_SESSION['errors'] as $onerow){ ?>
                                    <div class="alert alert-danger"><?= $onerow ?></div>
                                <?php }
                                unset($_SESSION['errors']);
                            }elseif(isset($_SESSION['update'])){ ?>
                                <div class="alert alert-success"><?= $_SESSION['update'] ?></div>
                                <?php  unset($_SESSION['update']);
                            }
                            ?>

                            <!-- Profile Settings Form -->
                            <form id='image' action="<?= URLROOT ?>UserController/updatePhoto" method='post' enctype="multipart/form-data"></form>
                            <form id='normal' action='<?= URLROOT?>UserController/editProfile' method='post' enctype="multipart/form-data">
                                <div class="row form-row">
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <div class="change-avatar">
                                                <div class="profile-img">
                                                    <img style="border-radius: 50%; width: 100px; height: 100px" src="<?=USER_PHOTOS_PATH_SHOW.$image?>">
                                                </div>
                                                <div class="upload-img">
                                                    <div class="change-photo-btn">
                                                        <span><i class="fa fa-upload"></i>حمل الصورة</span>
                                                        <input form ='normal' form='image' type="file" class="upload" name="File">
                                                    </div>
                                                    <small class="form-text text-muted">مسموح JPG, GIF أو PNG. أقصى حجم 2 ميجا بايت</small>
                                                </div>
                                                <?php
                                                if($_SESSION['image']!= ''){ ?>
                                                    <button form='image' type="submit" class="btn btn-primary submit-btn">الصوره الاساسيه</button>
                                                <?php }
                                                ?>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>الاسم الأول</label>
                                            <input type="text" name='username' class="form-control" value="<?=$_SESSION['username']?>">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>تاريخ الميلاد</label>
                                            <div class="cal-icon">
                                                <input type="date" name='dob' class="form-control" value="<?=$_SESSION['dob']?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>البريد الإلكتروني</label>
                                            <input type="email" name='email' class="form-control" value="<?= $_SESSION['email'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>رقم الهاتف</label>
                                            <input type="text" name='phone' class="form-control" value="<?= $_SESSION['phone'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">حفظ التغييرات</button>
                                </div>
                            </form>
                            <!-- /Profile Settings Form -->

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

<!-- Select2 JS -->
<script src="<?=URLROOT?>UserAssets/plugins/select2/js/select2.min.js"></script>

<!-- Datetimepicker JS -->
<script src="<?=URLROOT?>UserAssets/js/moment.min.js"></script>
<script src="<?=URLROOT?>UserAssets/js/bootstrap-datetimepicker.min.js"></script>

<!-- Sticky Sidebar JS -->
<script src="<?=URLROOT?>UserAssets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
<script src="<?=URLROOT?>UserAssets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

<!-- Custom JS -->
<script src="<?=URLROOT?>UserAssets/js/script.js"></script>

</body>

</html>