<?php


namespace PHPMVC\controllers;


use PHPMVC\lib\AbstractController;

class UserController extends AbstractController
{

    private $UserModel;
    /**
     * @var mixed
     */
    private $GoIn;


    public function __Construct()
    {
        $this->UserModel = $this->Model("UserModel");
        $this->GoIn = $this->Model("GoInModel");

        if (!($this->isLoggedIn())){
            header("Location:".URLROOT."IndexController/index_2");
            exit();
        }
    }

    public function index()
    {
        $data = $this->UserModel->GetAllStaduimsInfo();
        $this->Route("Users/index",$data);
    }

    public function booking($stdid)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $date = trim(filter_input(INPUT_POST, "date1", FILTER_SANITIZE_STRING));
            $hour = trim(filter_input(INPUT_POST, "radio", FILTER_SANITIZE_STRING));
            if (!$this->UserModel->IsBookingAllowed($date, $hour, $stdid)) {
                var_dump($_POST);
                $_SESSION['alert'] = "هذا الميعاد محجوز ,من فضلك اختر معادا اخر";
                header("Location:" . URLROOT . "UserController/booking/".$stdid);
            } else {
                $url  = URLROOT."UserController/checkout/".$stdid."/".$date."/".$hour;
                $_SESSION['gotoCheckout'] = true;
                header("Location:".$url);
            }

        } else {
            $data = $this->UserModel->GetStadiumByID($stdid);
            $this->Route('Users/booking', $data);
        }
    }

    public function checkout($stdid,$date,$hour)
    {

        if ($_SESSION['gotoCheckout'] == false){
            header("Location:".URLROOT."UserController/index");
            exit();
        }
        $data2 = [];
        $data2['hour'] = $hour;
        $data2['date'] = $date;
        $data = $this->UserModel->GetStadiumByID($stdid);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $val = [
                'email' => trim($_POST['email']),
                'phone' => trim($_POST['phone'])
            ];
            //validate email
            if (empty($val['email'])) {
                $_SESSION['alert'] = 'من فضلك أدخل البريد الالكتروني';
                $this->Route('Users/checkout',$data,$data2);
            } elseif (($val['email']) != $_SESSION['email']) {
                $_SESSION['alert'] = 'بريدك الالكتروني غير صحيح';
                $this->Route('Users/checkout',$data,$data2);
            } elseif (!filter_var($val['email'], FILTER_VALIDATE_EMAIL)) {
                $_SESSION['alert'] = 'يجب ان يحتوي البريد الالكتروني علة علامة @';
                $this->Route('Users/checkout',$data,$data2);
            }

            //phone number
            if (empty($val['phone'])) {
                $_SESSION['alert'] = 'من فضلك ادخل رقم الهاتف';
                $this->Route('Users/checkout',$data,$data2);
            } elseif ($_SESSION['phone'] != $val['phone']) {
                $_SESSION['alert'] = 'من فضلك , أدخل رقم هاتفك الخاص بتسجيل الدخول على هذا الموقع ';
                $this->Route('Users/checkout',$data,$data2);
            }
             if (empty($_SESSION['alert']))
             {
                 $_SESSION['gotoCheckout'] = false;
                 $this->UserModel->RECORD_BOOKING($data[0],$date,$hour);
                 $this->CreateBookingSession($hour,$date,$data);
                 $allprofits = $this->UserModel->select('std_profits','stadiums',"id = $stdid");
                 $hhh = $allprofits[0]->std_profits + $data[0]->hour_price;
                 $this->UserModel->update('stadiums',"std_profits={$hhh}","id=$stdid");
                 header("Location:".URLROOT."UserController/booking_success");
                 exit();
             }
        }else {
            $this->Route('Users/checkout', $data, $data2);
        }
    }

    public function CreateBookingSession($hour,$date,$data){
        $_SESSION['booking_hour'] = $hour;
        $_SESSION['booking_date'] = $date;
        $_SESSION['booking_std_name'] = $data[0]->std_name;

    }

    public function booking_success()
    {
        if (!isset($_SESSION['booking_std_name'])){
            header("Location:".URLROOT."UserController/index");
            exit();
        }
        $this->Route('Users/booking-success');
        $this->DestroyBookingSession();
    }

    public function DestroyBookingSession(){
        unset($_SESSION['booking_date']);
        unset($_SESSION['booking_hour']);
        unset($_SESSION['booking_std_name']);
    }

    public function client_dashboard()
    {
        $reservations = $this->UserModel->selectWithJoin('std.std_name,std.img,std.std_size,res.res_day,res.res_start,res.cost','users as us','reservation as res'
        ," us.userid = '{$_SESSION['userid']}' JOIN stadiums as std ON res.stadium_id = std.id ");

        $transactions = $this->UserModel->selectWithJoin('std.img,res.cost,res.id,std.std_size,std.std_name','users as us','reservation as res',"us.userid = '{$_SESSION['userid']}' JOIN stadiums as std ON res.stadium_id = std.id");


        $data = array(
            'reservations' => $reservations,
            'transactions' => $transactions,
        );
        $this->Route('Users/client-dashboard',$data);
    }

    public function favourites()
    {
        $this->Route('Users/favourites');
    }



    public function pitch_profile($pitch_id)
    {
        $std = $this->UserModel->GetStadiumByID($pitch_id);
        $reviews = $this->UserModel->selectWithJoin('us.username,us.image,rev.comment,rev.date','stadiums as st','reviews as rev',"st.id = rev.std_id
        JOIN users as us ON us.userid = rev.user_id WHERE rev.std_id= '$pitch_id'");
        $data = array(
            'std' => $std,
            'reviews'=>$reviews,
        );
        $this->Route('Users/pitch-profile',$data);
    }
 
    public function pitches_list()
    {
        $data = $this->UserModel->GetAllStaduimsInfo();
        $this->Route('Users/pitches-list',$data);
    }
    public function profile_settings()
    {
        $this->Route('Users/profile-settings');
    }
    public function change_password()
    {
        $this->Route('Users/change-password');
    }

    public function editProfile(){

        $data = [
            'username'  => ''   ,
            'phone'     => ''   ,
            'email'     => ''   ,
            'dob'       => ''
        ];

        $_SESSION['errors']= array();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $file = $_FILES['File'];     // for the image
            $filename = $file['name'];
            $filetmp = $file['tmp_name'];


            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'phone' => trim($_POST['phone']),
                'email' => trim($_POST['email']),
                'dob' => $_POST['dob']
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
                array_push($_SESSION['errors'], 'Please include an @ in the email address');
            }

            //phone number
            if (empty($data['phone'])) {
                array_push($_SESSION['errors'],'من فضلك ادخل رقم الهاتف');
            } elseif (strlen($data['phone']) > 11 || strlen($data['phone']) < 11) {
                array_push($_SESSION['errors'],'يجب ان يحتوي رقم الهاتف على 11 رقما ');
            }

            if($this->GoIn->IsUsernameDuplicated($data['username']) && $data['username'] != $_SESSION['username']) {
                array_push($_SESSION['errors'],'الاسم الذي اخترته موجود بالفعل , اختر اسما اخر') ;
            }

            if ($this->GoIn->IsPhoneDuplicated($data['phone']) && $data['phone'] != $_SESSION['phone']) {
                array_push($_SESSION['errors'],'هذا الرقم موجود بالفعل');
            }
            elseif ($this->GoIn->IsEmailDuplicated($data['email']) && $data['email'] != $_SESSION['email']) {
                array_push($_SESSION['errors'],'البريد الالكتروني الذي اخترته موجود بالفعل , اختر بريدا الكترونيا اخر');
            }

            if(empty($_SESSION['errors'])){
                if($filename != ''){
                    move_uploaded_file($filetmp,USER_PHOTOS_PATH_UPLOAD."$filename");    // move image to file photos
                }
                $this->UserModel->update('users',"username = '{$data['username']}',
                                                   email = '{$data['email']}',
                                                   phone = '{$data['phone']}',
                                                   image = '$filename',
                                                   dob = '{$data['dob']}'","userid='{$_SESSION['userid']}'");
                $_SESSION['update'] = 'تم تحديث البيانات بنجاح';
                // update session data
                $_SESSION['username'] = $data['username'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['dob'] = $data['dob'];
                $_SESSION['phone'] = $data['phone'] ;
                unlink(USER_PHOTOS_PATH_UPLOAD.$_SESSION['image']);
                $_SESSION['image'] = $filename ;

            }
        }
        header('location:'.URLROOT.'UserController/profile_settings');
        exit;
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
            $oldpassword =  $this->UserModel->select('password','users',"userid = '{$_SESSION['userid']}'");

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
                    $this->UserModel->update('users',"password = '$password'","userid='{$_SESSION['userid']}'");
                    $_SESSION['update'] = 'تم تحديث كلمه السر بنجاح';
                } else {
                    $_SESSION['alert'] = ' يجب ان تحتوي كلمة المرور على 8 أحرف تشمل رقم واحد على الأقل  ';
                }
            }
        }
        header('location:'.URLROOT.'UserController/change_password');
        exit;
    }

    public function updatePhoto()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->UserModel->update('users',"image = ''","userid='{$_SESSION['userid']}'");
            $_SESSION['update'] = 'تم تحديث البيانات بنجاح';
            unlink(USER_PHOTOS_PATH_UPLOAD.$_SESSION['image']);
            $_SESSION['image'] = '';
        }
        header('location:'.URLROOT.'UserController/profile_settings');
        exit;
    }


    public function addReview()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $comment = trim($_POST['comment']);
            $std_id = $_POST['std_id'];

            $this->UserModel->insert('reviews',"user_id = '{$_SESSION['userid']}',
                                                std_id = '$std_id',
                                                comment = '$comment',
                                                date = now()");
        }

        header('location:'.URLROOT.'UserController/pitch_profile/'.$std_id);
        exit;
    }

    public function notfound()
    {
        $this->Route('notfound/notfound');
    }
}