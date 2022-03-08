
<!-- Main Wrapper -->
<div class="main-wrapper">

    <!-- Header -->
    <div class="header">

        <!-- Logo -->
        <div class="header-right">
            <a href="<?=URLROOT?>AdminController/index" class="logo">
                <img src="<?=URLROOT?>assets/img/main%20logo5.png" alt="Logo">
            </a>
            <a href="index.html" class="logo logo-small">
                <img src="<?=URLROOT?>AdminAssets/img/main%20logo%203.png" alt="Logo" width="30" height="30">
            </a>
        </div>
        <!-- /Logo -->

        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fe fe-text-align-right"></i>
        </a>

       

        <!-- Mobile Menu Toggle -->
        <a class="mobile_btn" id="mobile_btn">
            <i class="fa fa-bars"></i>
        </a>
        <!-- /Mobile Menu Toggle -->

        <!-- Header Right Menu -->
        <ul class="nav user-menu">


            <!-- User Menu -->
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <span class="user-img"><img class="rounded-circle" src="<?= ADMIN_PHOTOS_PATH_SHOW.$image ?>" width="31" alt="user"></span>
                </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <img src="<?= ADMIN_PHOTOS_PATH_SHOW.$image ?>" alt="User Image" class="avatar-img rounded-circle">
                        </div>
                        <div class="user-text">
                            <h6><?=$_SESSION['username']?></h6>
                            <p class="text-muted mb-0">مسئول</p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="<?=URLROOT?>AdminController/AdminProfile">ملفي الشخصي</a>
                    <a class="dropdown-item" href="<?=URLROOT?>IndexController/LockScreen">قفل الشاشة</a>
                    <a class="dropdown-item" href="<?=URLROOT?>IndexController/logout">تسجيل خروج</a>
                </div>
            </li>
            <!-- /User Menu -->

        </ul>
        <!-- /Header Right Menu -->

    </div>
    <!-- /Header -->
