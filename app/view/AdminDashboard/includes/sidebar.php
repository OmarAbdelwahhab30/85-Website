<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>الرئيسية</span>
                </li>
                <li class="<?= isset($pageTitle) && $pageTitle=='Dashboard'? 'active':''?>">
                    <a href="<?=URLROOT?>AdminController/index"><i class="fe fe-home"></i> <span>لوحة التحكم</span></a>
                </li>
                <li class="<?=isset($pageTitle) && $pageTitle=='Appointement List'? 'active':''?>">
                    <a href="<?=URLROOT?>AdminController/appointment"><i class="fe fe-layout"></i> <span>المواعيد المحجوزة</span></a>
                </li>
                <li class="<?=isset($pageTitle) && $pageTitle=='Pitches List'? 'active':''?>">
                    <a href="<?=URLROOT?>AdminController/playgrounds"><i class="fa fa-futbol-o"></i> <span>الملاعب</span></a>
                </li>
                <li class="<?=isset($pageTitle) && $pageTitle=='Users'? 'active':''?>">
                    <a href="<?=URLROOT?>AdminController/clients"><i class="fe fe-users"></i> <span>العملاء</span></a>
                </li>
                <li class="<?=isset($pageTitle) && $pageTitle=='Transaction List'? 'active':''?>">
                    <a href="<?=URLROOT?>AdminController/transactions"><i class="fe fe-activity"></i> <span>المعاملات</span></a>
                </li>
                <li class="<?=isset($pageTitle) && $pageTitle=='Reviews'? 'active':''?>">
                    <a href="<?=URLROOT?>AdminController/reviews"><i class="fe fe-activity"></i> <span>المراجعات</span></a>
                </li>
                <li class="">
                    <a href="<?=URLROOT?>AdminController/createStadium"><i class="fe fe-activity"></i> <span>انشاء ملعب</span></a>
                </li>
                <li class="<?=isset($pageTitle) && $pageTitle=='Adminstration'? 'active':''?>">
                    <a href="<?=URLROOT?>AdminController/Administration"><i class="fe fe-star-o"></i> <span>تعيين مسؤول</span></a>
                </li>
                <li class="menu-title">
                    <span>الصفحات</span>
                </li>
                <li class="<?=isset($pageTitle) && $pageTitle=='Profile'? 'active':''?>">
                    <a href="<?=URLROOT?>AdminController/AdminProfile"><i class="fe fe-user-plus"></i> <span>الملف الشخصي</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-lock"></i> <span> المصادقة </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="<?=URLROOT?>IndexController/LockScreen"> قفل الشاشة </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->