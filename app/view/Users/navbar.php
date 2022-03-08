<?php
if($_SESSION['image'] == ''){
    $image = STATIC_IMAGE;
} else {
    $image = $_SESSION['image'];
}
?>
<nav class="navbar navbar-expand-lg header-nav">
    <div class="navbar-header">
        <a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
        </a>
        <a href="index.php" class="navbar-brand logo">
            <img src="<?=URLROOT?>UserAssets/img/main%20logo5.png" class="img-fluid" alt="Logo">
        </a>
    </div>
    <div class="main-menu-wrapper">
        <div class="menu-header">
            <a href="index.php" class="menu-logo">
                <img src="<?=URLROOT?>UserAssets/img/main%20logo5.png" class="img-fluid" alt="Logo">
            </a>
            <a id="menu_close" class="menu-close" href="javascript:void(0);">
                <i class="fas fa-times"></i>
            </a>
        </div>
        <ul class="main-nav">
            <li class="nav-item active">
                <a class="main-nav header-home"href="<?=URLROOT?>UserController/index">الرئيسية</a>
            </li>
        </ul>
    </div>
    <ul class="nav header-navbar-rht">
        <!--<li class="nav-item">
            <a class="nav-link header-login" href="login.php">سجل دخول/أنشئ حساب</a>
        </li>-->
        <!-- User Menu -->
        <li class="nav-item dropdown has-arrow logged-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="<?= USER_PHOTOS_PATH_SHOW.$image?>" width="31" alt="User">
								</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        <img src="<?= USER_PHOTOS_PATH_SHOW.$image?>" alt="User Image" class="avatar-img rounded-circle">
                    </div>
                    <div class="user-text">
                        <h6><?= $_SESSION['username'] ?></h6>
                        <p class="text-muted mb-0">عميل</p>
                    </div>
                </div>
                <a class="dropdown-item" href="<?=URLROOT?>UserController/client_dashboard">لوحة التحكم</a>
                <a class="dropdown-item" href="<?=URLROOT?>UserController/profile_settings">إعدادات الملف الشخصي</a>
                <a class="dropdown-item" href="<?=URLROOT?>IndexController/logout">تسجيل الخروج</a>
            </div>
        </li>
        <!-- /User Menu -->

    </ul>
</nav>