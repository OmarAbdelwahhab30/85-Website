<?php


namespace PHPMVC\controllers;


use PHPMVC\lib\AbstractController;

class AdminController extends  AbstractController
{

    private $adminModel;
    private $UserModel;
    private $std;

    public function __Construct()
    {
        $this->adminModel = $this->Model("AdminModel");
        $this->UserModel = $this->Model("GoInModel");
        $this->std = $this->Model("UserModel");
        if (!($this->isLoggedIn())){
            header("Location:".URLROOT."GoInController/login");
            exit();
        }
        if ($_SESSION['lock_screen'] == true) {
            header("Location:".URLROOT."IndexController/LockScreen");
            exit();
        }
    }



    public function index()
    {
        //number of stadiums
        $numberOfStadiums = $this->adminModel->select('COUNT(id) as num','stadiums','1');

        //number of users
        $numberOfUsers = $this->adminModel->select('COUNT(userid) as num','users','isadmin=0');

        //number of reservations
        $numberOfReservations = $this->adminModel->select('COUNT(id) as num','reservation','1');

        //sum of profits
        $profits = $this->adminModel->select('SUM(std_profits) as num','stadiums','1');

        //all stadiums
        $stadiums = $this->adminModel->select('*','stadiums','1');

        // all reservations
        $reservations = $this->adminModel->selectWithJoin('username,cost,std_name,std_size,res_day,res_start',
            'users' , 'reservation',
            'users.userid = reservation.user_id JOIN stadiums ON reservation.stadium_id = stadiums.id');

        // all users
        $users = $this->adminModel->select('*','users','isadmin=0');

        $data = [
            'stadium_no'        => $numberOfStadiums[0]->num,
            'user_no'           => $numberOfUsers[0]->num,
            'reservation_no'    => $numberOfReservations[0]->num,
            'profits'           => $profits[0]->num,
            'stadiums'          => $stadiums,
            'reservations'      => $reservations,
            'users'             =>$users,
        ];
        $this->Route('AdminDashboard/index',$data);
    }

    public function reviews(){
        $reviews = $this->adminModel->selectWithJoin('res.id,username,image,img,std_name,res.comment,res.res_day,res.res_start',
        'users' , 'reservation as res',
        'users.userid = res.user_id JOIN stadiums ON res.stadium_id = stadiums.id Where appear_comment = 1');
        $data = array(
            'reviews' => $reviews,
        );

        $this->Route('AdminDashboard/reviews',$data);
    }

    public function createStadium(){
        $this->Route('AdminDashboard/create-stadium');
    }

    public function appointment()
    {
        $reservations = $this->adminModel->selectWithJoin('us.username,us.image,std.img,res.cost,std.std_name,std.std_size,res.res_day,res.res_start',
            'users as us' , 'reservation as res',
            'us.userid = res.user_id JOIN stadiums as std ON res.stadium_id = std.id');
        $data = array(
            'reservations' => $reservations,
        );
       
        $this->Route('AdminDashboard/appointment-list',$data);
    }


    public function playgrounds()
    {
        $stadiums = $this->adminModel->select('*','stadiums','1');
        $data = array(
            'stadiums' => $stadiums,
        );
        $this->Route('AdminDashboard/pitches-list',$data);
    }


    public function clients()
    {
        $data = $this->adminModel->GetAllUsersInfo();
        $this->Route('AdminDashboard/clients-list',$data);
    }

    public function Administration()
    {
        $this->Route('AdminDashboard/Administration');
    }

    public function transactions()
    {
        $reservations = $this->adminModel->selectWithJoin('id,image,userid,username,cost','users','reservation','users.userid = reservation.user_id WHERE appear_check = 1');
        $data = array(
            'reservations' => $reservations,
        );
        $this->Route('AdminDashboard/transactions-list',$data);
    }

    public function edit()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $cost = filter_var($_POST['cost'], FILTER_SANITIZE_NUMBER_INT);
            $username = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
            $reservationNumber = $_POST['reservation_number'];
            $userid = $_POST['userid'];
            $reservationId = $_POST['id'];

            $nameValidation = "/^[a-zA-Z0-9]*$/";

            if(preg_match($nameValidation, $username) && $username !='')
            {
                $this->adminModel->update('users',"username = '$username'","userid='$userid'");
            }
            $this->adminModel->update('reservation',"cost ='$cost'","id='$reservationId'");
        }
    }

    public function deleteCheck()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {

            $reservationId = $_POST['id'];

            $this->adminModel->update('reservation', "appear_check = 0", "id='$reservationId'");

        }
    }

    public function deleteReview()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {

            $reservationId = $_POST['id'];

            $this->adminModel->update('reservation', "appear_comment = 0", "id='$reservationId'");

        }
    }



    public function editPassword(){
        $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'oldpassword' => '',
                'newpassword1' => '',
                'newpassword2' => '',
            ];
            // sanitize data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // retrieve old password
            $oldpassword =  $this->adminModel->select('password','users',"userid = '{$_SESSION['userid']}'");

            $data = [
                'oldpassword' => trim($_POST['oldpassword']),
                'newpassword1' => trim($_POST['newpassword1']),
                'newpassword2' => trim($_POST['newpassword2']),
            ];
            // check if empty
            if(empty($data['oldpassword']) || empty($data['newpassword1']) || empty($data['newpassword2'])){
                $_SESSION['alert'] = 'يجب مليء جميع البيانات';
            } else {
                if(md5($data['oldpassword']) == $oldpassword[0]->password
                    && !preg_match($passwordValidation, $data['newpassword1'])
                    && $data['newpassword1'] == $data['newpassword2']){
                    $password=md5($data['newpassword1']);
                    $this->adminModel->update('users',"password = '$password'","userid='{$_SESSION['userid']}'");
                    $_SESSION['update'] = 'تم تحديث كلمه السر بنجاح';
                } else {
                    $_SESSION['alert'] = ' يجب ان تحتوي كلمة المرور على 8 أحرف تشمل رقم واحد على الأقل  ';
                }
            }



        }
        header('location:'.URLROOT.'AdminController/profile');
        exit;
    }

    public function editAdmin(){
        $data = [
            'username' => '',
            'phone' => '',
            'email' => '',
            'dob' => ''
        ];

        $_SESSION['errors']= array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'phone' => trim($_POST['phone']),
                'email' => trim($_POST['email']),
                'dob' => $_POST['birthday']
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";

            //Validate username on letters/numbers
            if (empty($data['username'])) {
                array_push($_SESSION['errors'], 'من فضلك , أدخل اسم المستخدم');
            } elseif (!preg_match($nameValidation, $data['username'])) {
                array_push($_SESSION['errors'],'اسم المستخدم يجب ان يحتوى على حروف وأرقام فقط ');
            }

            //validate email
            if (empty($data['email'])) {
                array_push($_SESSION['errors'],'من فضلك أدخل البريد الالكتروني');
            }else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL) ) {
                array_push($_SESSION['errors'], 'Please include an `@` in the email address');
            }

            //phone number
            if (empty($data['phone'])) {
                array_push($_SESSION['errors'],'من فضلك ادخل رقم الهاتف');
            } elseif (strlen($data['phone']) > 11 || strlen($data['phone']) < 11) {
                array_push($_SESSION['errors'],'يجب ان يحتوي رقم الهاتف على 11 رقما ');
            }

            if($this->UserModel->IsUsernameDuplicated($data['username']) && $data['username'] != $_SESSION['username']) {
                array_push($_SESSION['errors'],'الاسم الذي اخترته موجود بالفعل , اختر اسما اخر') ;
            }

            if ($this->UserModel->IsPhoneDuplicated($data['phone']) && $data['phone'] != $_SESSION['phone']) {
                array_push($_SESSION['errors'],'هذا الرقم موجود بالفعل');
            }
            elseif ($this->UserModel->IsEmailDuplicated($data['email']) && $data['email'] != $_SESSION['email']) {
                array_push($_SESSION['errors'],'البريد الالكتروني الذي اخترته موجود بالفعل , اختر بريدا الكترونيا اخر');
            }

            if(empty($_SESSION['errors'])){
                $this->adminModel->update('users',"username = '{$data['username']}',
                                                   email = '{$data['email']}',
                                                   phone = '{$data['phone']}',
                                                   dob = '{$data['dob']}'","userid='{$_SESSION['userid']}'");

                // update session data
                $_SESSION['username'] = $data['username'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['dob'] = $data['dob'];
                $_SESSION['phone'] = $data['phone'] ;

            }
        }
        header('location:'.URLROOT.'AdminController/profile');
        exit;
    }

    public  function AdminProfile()
    {
        $this->Route("AdminDashboard/profile");
    }

    public function IsValidPhone($phone)
    {
        $bool = $this->adminModel->IsValidPhone($phone);
        echo json_encode($bool);
    }

    public function SetAsAdministrator()
    {
        $phone = trim(filter_input(INPUT_POST,"phone",FILTER_SANITIZE_STRING)) ;
        $bool = $this->adminModel->IsValidPhone($phone);
        if ($bool){
            if ($this->adminModel->SetAsAdminstration($phone)){
                $_SESSION['alert'] = "تم تعيين المسؤول بنجاح " ;
                header('location:'.URLROOT.'AdminController/Administration');
            }else{
                $_SESSION['error'] = "حدث خطأ ما من فضلك أعد المحاولة" ;
                header('location:'.URLROOT.'AdminController/Administration');
            }
        }
    }

    public function addStaduim(){
        $data = [
            'stdname' => '',
            'availablility' => '',
            'location' => '',
            'hourPrice' => '',
            'stdSize' => '',
            'iFrame' => '',
            'googleLink' => '',
        ];

        $_SESSION['errors']= array();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'stdName' => trim($_POST['stdName']),
                'availability' => trim($_POST['availability']),
                'location' => trim($_POST['location']),
                'hourPrice' => trim($_POST['hourPrice']),
                'stdSize' => trim($_POST['stdsize']),
                'iFrame' => trim($_POST['iframe']),
                'googleLink' => trim($_POST['googlelink']),
                'userid' =>trim($_POST['userid']),
            ];

            $file = $_FILES['File'];     // for the image
            $filename = $file['name'];
            $filetmp = $file['tmp_name'];

            
            // if values are empty
            if (empty($data['stdName']) || empty($data['availability']) || empty($data['location']) ||
                empty($data['hourPrice']) || empty($data['iFrame']) || empty($data['googleLink']) ||
                empty($data['stdSize']) || $filename == '') {
                array_push($_SESSION['errors'], 'من فضلك أملأ جميع البيانات');
            }
            
            // if hour price have characters
            if(empty($_SESSION['errors'])){
                if(!preg_match('/^[0-9 +-]*$/', $data['hourPrice'])){
                    //variable contains char not allowed 
                    array_push($_SESSION['errors'], 'أدخل أرقام فقط في خانه تمن الساعه');
                }
    
                // if the URL is correct
                if(!preg_match("/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i", $data['googleLink'])){
                    array_push($_SESSION['errors'], 'أدخل موقع صحيح');
                }
                // for the iframe
                $data['iFrame'] = explode('&#34;',"{$data['iFrame']}");
                $all ='';
                foreach($data['iFrame'] as $one){
                    if($one != ''){
                        $all = $all. "\"" .$one;
                    }
                } 
                $all = $all. "\"";
                
                $data['iFrame'] = '<iframe src ='.$all.'></iframe>';
        
            }

           
            if(empty($_SESSION['errors'])){
                move_uploaded_file($filetmp,PITCHES_PHOTOS_PATH_UPLOAD."$filename");    // move image to file photos

                $this->std->insert('stadiums',
                "std_name ='{$data['stdName']}',availability ='{$data['availability']}',
                std_loc ='{$data['location']}',img = '{$filename}',hour_price ='{$data['hourPrice']}',std_size ='{$data['stdSize']}',
                std_joinDate =now(),std_profits ='0',owner_id ='{$_POST['userid']}',iframe='{$data['iFrame']}',
                std_link = '{$data['googleLink']}'
                ");
                $_SESSION['update'] = "تم اضافه الملعب بنجاح";
            }

            
           
        }
         header('location:'.URLROOT.'AdminController/createStadium');
         exit;
    }


    public function editPhoto(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $file = $_FILES['File'];     // for the image
            $filename = $file['name'];
            $filetmp = $file['tmp_name'];
            if($filename != ''){
                move_uploaded_file($filetmp,ADMIN_PHOTOS_PATH_UPLOAD."$filename");    // move image to file photos
                $this->adminModel->update('users',"image='$filename'","userid='{$_POST['userid']}'");
                if($_SESSION['image']!= ''){
                    unlink(ADMIN_PHOTOS_PATH_UPLOAD.$_SESSION['image']);
                }
                $_SESSION['image'] = $filename;
            } else{
                unlink(ADMIN_PHOTOS_PATH_UPLOAD.$_SESSION['image']);
                $this->adminModel->update('users',"image='$filename'","userid='{$_POST['userid']}'");
                $_SESSION['image'] = $filename;
            }
        }
        header('location:'.URLROOT.'AdminController/AdminProfile');
        exit;
    }

    public function notfound()
    {
        $this->Route('notfound/notfound');
    }
}