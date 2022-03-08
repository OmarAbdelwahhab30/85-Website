<?php
if($_SESSION['image'] == ''){
    $image = STATIC_IMAGE;
} else {
    $image = $_SESSION['image'];
}
?>
<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-pitch-img">
                    <img src="<?=USER_PHOTOS_PATH_SHOW.$image?>" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3><?=$_SESSION['username']?></h3>
                    <div class="client-details">
                        <h5><i class="fas fa-birthday-cake"></i> <?=$_SESSION['dob'] ?></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li class="active">
                        <a href="<?= URLROOT?>UserController/client_dashboard">
                            <i class="fas fa-columns"></i>
                            <span>لوحة التحكم</span>
                        </a>
                    </li>
                  
                    <li>
                        <a href="<?= URLROOT ?>UserController/profile_settings">
                            <i class="fas fa-user-cog"></i>
                            <span>إعدادات الملف الشخصي</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= URLROOT ?>UserController/change_password">
                            <i class="fas fa-lock"></i>
                            <span>تغيير كلمة السر</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= URLROOT ?>IndexController/logout">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>تسجيل خروج</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
</div>