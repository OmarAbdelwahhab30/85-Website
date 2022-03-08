<!DOCTYPE html>
<html lang="ar">

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

    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="<?=URLROOT?>UserAssets/plugins/fancybox/jquery.fancybox.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?=URLROOT?>UserAssets/css/style.css">

</head>
<body>
<?php
$std = !empty($data['std'])? $data['std']:"";

// var_dump($data);
?>
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
                            <li class="breadcrumb-item active" aria-current="page">صفحة الملعب</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">الملعب</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <!-- Pitch Widget -->
            <div class="card">
                <div class="card-body">
                    <div class="pitch-widget">
                        <div class="pitch-info-left">
                            <div class="pitch-img">
                                <img src="<?=URLROOT?>UserAssets/img/pitches/<?=$std[0]->img?>" class="img-fluid" alt="Pitch">
                            </div>
                            <div class="pitch-info-cont">
                                <h4 class="pitch-name"><?=$std[0]->std_name?></h4>
                                <p class="pitch-department"><?=$std[0]->std_size?></p>
                                <div class="pitch-details">
                                    <p class="pitch-location"><i class="fas fa-map-marker-alt"></i><?=$std[0]->std_loc?>
                                        <a href="<?=$std[0]->std_link?>" target="_blank">موقع الملعب</a>
                                    </p>
                                    <ul class="pitch-gallery">
                                        <li>
                                            <a href="<?=URLROOT?>UserAssets/img/pitches/<?=$std[0]->img?>" data-fancybox="gallery">
                                                <img src="<?=URLROOT?>UserAssets/img/pitches/<?=$std[0]->img?>" alt="Pitch">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?=URLROOT?>UserAssets/img/pitches/<?=$std[0]->img?>-1.png" data-fancybox="gallery">
                                                <img  src="<?=URLROOT?>UserAssets/img/pitches/<?=$std[0]->img?>-1.png" alt="Pitch">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?=URLROOT?>UserAssets/img/pitches/<?=$std[0]->img?>-2.png" data-fancybox="gallery">
                                                <img src="<?=URLROOT?>UserAssets/img/pitches/<?=$std[0]->img?>-2.png" alt="Pitch">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?=URLROOT?>UserAssets/img/pitches/<?=$std[0]->img?>-3.png" data-fancybox="gallery">
                                                <img src="<?=URLROOT?>UserAssets/img/pitches/<?=$std[0]->img?>-3.png" alt="Pitch">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="pitch-info-right">

                            <div class="pitch-infos">
                                <ul>
                                    <li><i class="fas fa-map-marker-alt"></i><?=$std[0]->std_loc?></li>
                                    <li><i class="far fa-money-bill-alt"></i>سعر الساعة <?=$std[0]->hour_price?> EGP</li>
                                </ul>
                            </div>
                            <div class="pitch-booking">
                                <a class="apt-btn" href="<?=URLROOT?>UserController/booking/<?=$std[0]->id?>">احجز موعدًا</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /pitch Widget -->

            <!-- pitch Details Tab -->
            <div class="card">
                <div class="card-body pt-0">

                    <!-- Tab Menu -->
                    <nav class="user-tabs mb-4">
                        <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" href="#pitch_overview" data-toggle="tab">نظرة عامة</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#pitch_reviews" data-toggle="tab">الآراء</a>
                            </li>

                        </ul>
                    </nav>
                    <!-- /Tab Menu -->

                    <!-- Tab Content -->
                    <div class="tab-content pt-0">

                        <!-- Overview Content -->
                        <div role="tabpanel" id="pitch_overview" class="tab-pane fade show active">
                            <div class="row">
                                <div class="col-md-12 col-lg-9">

                                    <!-- About Details -->
                                    <div class="widget about-widget">
                                        <h4 class="widget-title">عن الملعب</h4>
                                        <ul class="clearfix">
                                            <li>المساحة : 7x7</li>
                                            <li>نوع العشب : صناعي</li>
                                            <li>خارجي</li>
                                            <li>العنوان : المنصورة</li>
                                            <li>نوع الحجز : ساعة - ساعتين</li>
                                            <li>المواعيد المتاحة: <?=$std[0]->availability?></li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <!-- /About Details -->

                                    <!-- service Details -->
                                    <div class="widget service-widget">
                                        <h4 class="widget-title">الخدمات</h4>
                                        <div class="experience-box">
                                            <div class="service-listt">
                                                <ul class="experience-list">
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <img class="icon" src="<?=URLROOT?>UserAssets/img/features/parking.png" alt="Feature">
                                                                <a href="#/" class="name">موقف سيارات</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <img class="icon" src="<?=URLROOT?>UserAssets/img/features/prayer.png" alt="Feature">
                                                                <a href="#/" class="name">مصلى</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <img class="icon" src="<?=URLROOT?>UserAssets/img/features/water.png" alt="Feature">
                                                                <a href="#/" class="name">مياه شرب </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <img class="icon" src="<?=URLROOT?>UserAssets/img/features/shower.png" alt="Feature">
                                                                <a href="#/" class="name">دشات استحمام</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <img class="icon" src="<?=URLROOT?>UserAssets/img/features/toilet.png" alt="Feature">
                                                                <a href="#/" class="name"> دورة مياه</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <img class="icon" src="<?=URLROOT?>UserAssets/img/features/whistle.png" alt="Feature">
                                                                <a href="#/" class="name"> صافرة</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <img class="icon" src="<?=URLROOT?>UserAssets/img/features/ball.png" alt="Feature">
                                                                <a href="#/" class="name"> كرة</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <img class="icon" src="<?=URLROOT?>UserAssets/img/features/shirt.png" alt="Feature">
                                                                <a href="#/" class="name"> بدل تمرين للفرق</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- /service Details -->

                                    <!-- Experience Details -->
                                    <div class="widget experience-widget">
                                        <h4 class="widget-title">سياسة الإلغاء</h4>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">يسمح بإلغاء الحجز بحد أقصى قبل 72 ساعة من موعد اللعب.</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">يجب دفع مبلغ تأميني بقيمة 100 جنيه مصري (في غضون 24 ساعة بعد إجراء الحجز الأول ويتم دفعه مرة واحدة فقط) ويمكن استرداده إذا كنت ترغب في إيقاف الحجوزات في الملعب.</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">في حال الرغبة بإلغاء الحجز خارج فترة السماح يرجى التواصل مع إدارة الملعب وسيتم أخذ 50% من مبلغ الحجز في حال عدم حصول الملعب على حجز آخر لنفس الفترة الملغاة.</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">عند التغيب بدون أي عذر وبدون إخبار إدارة الملعب سيتم أخذ مبلغ التأمين كاملاً (100% من المبلغ).</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Experience Details -->

                                    <!-- map Details -->
                                    <div class="widget map-widget">
                                        <h4 class="widget-title">موقع الملعب </h4>
                                        <div class="experiencee-box">
                                            <div class="google-maps">
                                                <?=$std[0]->iframe?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /map Details -->

                                </div>
                            </div>
                        </div>
                        <!-- /Overview Content -->

                        <!-- Reviews Content -->
                        <div role="tabpanel" id="pitch_reviews" class="tab-pane fade">

                            <!-- Review Listing -->
                            <div class="widget review-listing">
                                <ul class="comments-list">

                                    <!-- Comment List -->

                                    <!-- Comment List -->
                                    <?php
                                    if(!empty($data['reviews'])){
                                        foreach($data['reviews'] as $onerow){ ?>
                                            <li>
                                                <div class="comment">
                                                    <img class="avatar avatar-sm rounded-circle" alt="User Image" src=<?=($onerow->image!='')? USER_PHOTOS_PATH_SHOW.$onerow->image:USER_PHOTOS_PATH_SHOW.'user.png'?>>
                                                    <div class="comment-body">
                                                        <div class="meta-data">
                                                            <span class="comment-author"> <?= $onerow->username ?></span>
                                                            <span class="comment-date"><?= $onerow->date ?></span>

                                                        </div>
                                                        <p class="comment-content">
                                                            <?= $onerow->comment ?>
                                                        </p>

                                                    </div>
                                                </div>
                                            </li>

                                        <?php }
                                    } else { ?>
                                        <li class='comment'>
                                            <p class="comment-content">
                                                لا توجد مراجعات لهذا الملعب
                                            </p>

                                        </li>
                                    <?php }

                                    ?>

                                    <!-- /Comment List -->

                                </ul>



                            </div>
                            <!-- /Review Listing -->

                            <!-- Write Review -->
                            <div class="write-review">
                                <h4>أكتب رأيك  <strong>ل<?=$std[0]->std_name?></strong></h4>

                                <!-- Write Review Form -->
                                <form action='<?= URLROOT ?>UserController/addReview' method='POST'>

                                    <div class="form-group">
                                        <label>تقييمك</label>
                                        <textarea id="review_desc" name='comment' maxlength="100" class="form-control"></textarea>
                                        <input type="hidden" name='std_id' value="<?=$std[0]->id?>">
                                        <div class="d-flex justify-content-between mt-3"><small class="text-muted"><span id="chars">100</span> الأحرف المتبقية</small></div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="terms-accept">
                                        </div>
                                    </div>
                                    <div class="submit-section">
                                        <button type="submit" class="btn btn-primary submit-btn">أضف التقييم</button>
                                    </div>
                                </form>
                                <!-- /Write Review Form -->

                            </div>
                            <!-- /Write Review -->

                        </div>
                        <!-- /Reviews Content -->

                    </div>
                </div>
            </div>
            <!-- /pitch Details Tab -->

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

<!-- Fancybox JS -->
<script src="<?=URLROOT?>UserAssets/plugins/fancybox/jquery.fancybox.min.js"></script>

<!-- Custom JS -->
<script src="<?=URLROOT?>UserAssets/js/script.js"></script>

</body>

</html>