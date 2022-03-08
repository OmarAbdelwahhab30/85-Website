<!DOCTYPE html>  
<html lang="ar"> 

<head> 
  <meta charset="utf-8"> 
  <title>85:45</title> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0"> 
   
  <!-- Favicons --> 
  <link href="<?=URLROOT?>UserAssets/img/main%20logo%203.png"- rel="icon"> 
   
  <!-- Bootstrap CSS --> 
  <link rel="stylesheet" href="<?=URLROOT?>UserAssets/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="<?=URLROOT?>UserAssets/css/bootstrap-rtl.css"> 
  <link rel="stylesheet" href="<?=URLROOT?>UserAssets/css/bootstrap-rtl.min.css"> 
         
   
  <!-- Fontawesome CSS --> 
  <link rel="stylesheet" href="<?=URLROOT?>UserAssets/plugins/fontawesome/css/fontawesome.min.css"> 
  <link rel="stylesheet" href="<?=URLROOT?>UserAssets/plugins/fontawesome/css/all.min.css"> 
   
  <!-- Main CSS --> 
  <link rel="stylesheet" href="<?=URLROOT?>UserAssets/css/style.css"> 
     
 </head> 
 <body class="account-page"> 
       
  <!-- Main Wrapper --> 
  <div class="main-wrapper"> 
   
   <!-- Header --> 
   <header class="header"> 
   
     <div class="navbar-header"> 
      <a href="index.php" class="navbar-brand logo"> 
       <img src="<?=URLROOT?>UserAssets/img/main%20logo%203.png" class="img-fluid" alt="Logo"> 
      </a> 
     </div> 
     <div class="main-menu-wrapper"> 
      <div class="menu-header"> 
       <a href="index.php" class="menu-logo"> 
        <img src="<?=URLROOT?>UserAssets/img/main%20logo%203.png" class="img-fluid" alt="Logo"> 
       </a> 
      </div> 
    </div> 
   </header> 
   <!-- /Header --> 
    
   <!-- Page Content --> 
   <div class="content"> 
    <div class="container-fluid"> 
     <div class="row"> 
      <div class="col-md-8 offset-md-2"> 
       
       <!-- Account Content --> 
       <div class="account-content"> 
        <div class="row align-items-center justify-content-center"> 
         <div class="col-md-7 col-lg-6 login-left"> 
          <img src="<?=URLROOT?>UserAssets/img/owner%20register.png" class="img-fluid" alt="Login Banner"> 
         </div> 
         <div class="col-md-12 col-lg-6 login-right"> 
          <div class="login-header"> 
           <h3>أدخال ملعب جديد <a href="<?= URLROOT ?>AdminController/index"> الرجوع ل الصفحه الرئيسية</a></h3> 
          </div> 
          <?php
            if(!empty($_SESSION['update'])){ ?>
                  <div class='alert alert-success'><?= $_SESSION['update'] ?></div>
             <?php 
             unset($_SESSION['update']);
            }else if (!empty($_SESSION['errors'])){ ?>
                  <div class='alert alert-danger'><?php foreach($_SESSION['errors'] as $onerow){
                    echo $onerow;
                  }  ?></div>
            <?php unset($_SESSION['errors']); }
                  
          ?>
           
          <!-- Register Form --> 
          <form action='<?= URLROOT?>AdminController/addStaduim' method='post' enctype="multipart/form-data"> 
           <div class="form-group form-focus"> 
            <input type="text" class="form-control floating" name='stdName'> 
            <label class="focus-label">أسم الملعب</label> 
           </div> 
            <div class="form-group form-focus"> 
            <input type="text" class="form-control floating" name='availability'> 
            <label class="focus-label"> اوقات العمل</label> 
           </div> 
           <div class="form-group form-focus"> 
            <input type="text" class="form-control floating" name='location'> 
            <label class="focus-label"> موقع الملعب</label> 
           </div> 
            <div class="form-group form-focus"> 
            <input type="text" class="form-control floating" name='hourPrice'> 
            <label class="focus-label"> تمن الساعه</label>  
           </div>
           <div class="form-group form-focus"> 
            <input type="text" class="form-control floating" name='stdsize'> 
            <label class="focus-label"> حجم الملعب </label>  
           </div>  
           <div class="form-group form-focus"> 
            <input type="File" class="form-control floating" name='File'>  
           </div> 
            <div class="form-group form-focus"> 
            <textarea name="iframe" class="form-control"  cols="50"></textarea>
            <label class="focus-label"> iframe</label>   
           </div> 
            <div class="form-group form-focus"> 
            <input type="text" class="form-control floating" name='googlelink'> 
            <label class="focus-label">  google map link</label>  
           </div>
            <input type="hidden" value="<?= $_SESSION['userid'] ?>" class="form-control floating" name='userid'>   
          
           <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">أنشئ حساب </button> 
           <div class="login-or"> 
            <span class="or-line"></span> 
           </div> 
          </form> 
          <!-- /Register Form --> 
           
         </div> 
        </div> 
       </div> 
       <!-- /Account Content --> 
         
      </div> 
     </div> 
 
    </div> 
 
   </div>   
   <!-- /Page Content --> 
    
    <!-- Footer --> 
   <footer class="footer"> 
    <!-- Footer Bottom --> 
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
    <!-- /Footer Bottom --> 
     
   </footer> 
   <!-- /Footer --> 
      
  </div> 
  <!-- /Main Wrapper --> 
    
  <!-- jQuery --> 
  <script src="<?=URLROOT?>UserAssets/js/jquery.min.js"></script> 
   
  <!-- Bootstrap Core JS --> 
  <script src="<?=URLROOT?>UserAssets/js/popper.min.js"></script> 
  <script src="<?=URLROOT?>UserAssets/js/bootstrap.min.js"></script> 
   
  <!-- Custom JS --> 
  <script src="<?=URLROOT?>UserAssets/js/script.js"></script> 
   
 </body> 
</html>