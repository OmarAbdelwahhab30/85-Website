<?php


namespace PHPMVC\controllers;
use PHPMVC\LIB\AbstractController;

class GoInController extends AbstractController
{

    private $UserModel;

    public function __Construct()
    {
        $this->UserModel = $this->Model("GoInModel");
        if ($this->isLoggedIn()){
            if ($this->isAdmin()) {
                header("Location:" . URLROOT . "AdminController/index");
                exit();
            }else{
                header("Location:" . URLROOT . "UserController/index");
                exit();
            }
        }

    }

    public function register()
    {
        $data = [
            'username' => '',
            'phone' => '',
            'email' => '',
            'password' => '',
            'dob' => ''
        ];

        $_SESSION['alert'] = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'phone' => trim($_POST['phone']),
                'password' => trim($_POST['password']),
                'email' => trim($_POST['email']),
                'dob' => date('Y-m-d', strtotime($_POST['dob']))
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";


            //Validate username on letters/numbers
            if (empty($data['username'])) {
                $error = 'من فضلك , أدخل اسم المستخدم';
                $this->Route('GoIn/register');
            } elseif (!preg_match($nameValidation, $data['username'])) {
                $error = 'اسم المستخدم يجب ان يحتوى على حروف وأرقام فقط ';
                $this->Route('GoIn/register');
                //check if the username duplicated ?
            } elseif ($this->UserModel->IsUsernameDuplicated($data['username'])) {
                $_SESSION['alert'] = 'الاسم الذي اخترته موجود بالفعل , اختر اسما اخر';
                $this->Route('GoIn/register');
            }

            //validate email
            if (empty($data['email'])) {
                $_SESSION['alert'] = 'من فضلك أدخل البريد الالكتروني';
                $this->Route('GoIn/register');
            } elseif ($this->UserModel->IsEmailDuplicated($data['email'])) {
                $_SESSION['alert'] = 'البريد الالكتروني الذي اخترته موجود بالفعل , اختر بريدا الكترونيا اخر';
                $this->Route('GoIn/register');
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $_SESSION['alert'] = 'Please include an `@` in the email address  ';
                $this->Route('GoIn/register');
            }

            //phone number
            if (empty($data['phone'])) {
                $_SESSION['alert'] = 'من فضلك ادخل رقم الهاتف';
                $this->Route('GoIn/register');
            } elseif (strlen($data['phone']) > 11 || strlen($data['phone']) < 11) {
                $_SESSION['alert'] = 'يجب ان يحتوي رقم الهاتف على 11 رقما ';
                $this->Route('GoIn/register');
            } else {
                //Check if phone exists.
                if ($this->UserModel->IsPhoneDuplicated($data['phone'])) {
                    $_SESSION['alert'] = 'هذا الرقم موجود بالفعل ';
                    $this->Route('GoIn/register');
                }
            }


            // Validate password on length, numeric values,
            if (empty($data['password'])) {
                $_SESSION['alert'] = 'من فضلك أدخل كلمة المرور';
                $this->Route('GoIn/register');
            } elseif (strlen($data['password']) < 8) {
                $_SESSION['alert'] = '   يجب ان تحتوي كلمة المرور على 8 أحرف تشمل رقم واحد على الأقل  ';
                $this->Route('GoIn/register');
            } elseif (preg_match($passwordValidation, $data['password'])) {
                $_SESSION['alert'] = ' يجب ان تحتوي كلمة المرور على 8 أحرف تشمل رقم واحد على الأقل  ';
                $this->Route('GoIn/register');
            }

            // Make sure that errors are empty
            if (empty($_SESSION['alert'])) {

                // Hash password
                $data['password'] = md5($data['password']);

                //Register user from MODELS function
                if ($this->UserModel->register($data)) {

                    //TO GET ALL USER INFO (STD CLASS)
                    $loggedInUser = $this->UserModel->login($data['phone'], $data['password']);

                    // create session user

                    $this->createUserSession($loggedInUser);

                    //Redirect to the home page
                    if ($this->isAdmin()) {
                        $this->Route('AdminDashboard/index');
                    } else {
                        header("Location:".URLROOT."UserController/index");
                        exit();
                    }
                } else {
                    $this->Route('notfound/wentwrong');
                }

            }
        } else {
            $this->Route('GoIn/register');
        }
    }

    public function login()
    {
        $data = [
            'phone' => '',
            'password' => '',
        ];
        $_SESSION['alert'] = "";

        //Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'phone' => trim($_POST['phone']),
                'password' => trim($_POST['password']),
            ];
            //Validate phone number
            if (empty($data['phone'])) {
                $_SESSION['alert'] = 'من فضلك , أدخل رقم الهاتف';
                $this->Route('GoIn/login');
            }

            //Validate password
            if (empty($data['password'])) {
                $_SESSION['alert'] = 'من فضلك , أدخل كلمة المرور';
                $this->Route('GoIn/login');
            }

            //Check if no error
            if (empty($_SESSION['alert'])) {
                $data['password'] = md5($data['password']);
                $loggedInUser = $this->UserModel->login($data['phone'], $data['password']);

                if ($loggedInUser) {
                        // create session user

                        $this->createUserSession($loggedInUser);

                        //Redirect to the home page
                        if($this->isAdmin()){
                            header("Location:".URLROOT."AdminController/index");
                        }else{
                            header("Location:".URLROOT."UserController/index");
                        }

                } else {
                    $_SESSION['alert'] = 'رقم هاتفك أو كلمة المرور غير صحيحة , من فضلك أعد المحاولة ';
                    $this->Route('GoIn/login');
                }
            }

        }
        $this->Route('GoIn/login');
    }

    public function createUserSession($userData)
    {

        $_SESSION['userid'] = $userData->userid;

        $_SESSION['username'] =$userData->username ;
        $_SESSION['email'] = $userData->email;

        $_SESSION['phone'] = $userData->phone ;

        $_SESSION['isadmin'] = $userData->isadmin ;
        $_SESSION['dob']  = $userData->dob ;
        $_SESSION['image'] = $userData->image;
        $_SESSION['lock_screen'] = false;

    }

    public function forget_password()
    {
        $_SESSION['alert'] = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $email = trim($_POST['email']);
            $_SESSION['email_verification_code'] = $email;
            if (empty($email)) {
                $_SESSION['alert'] = 'تأكد من ادخال بريد الكتروني';
                $this->Route('GoIn/forget-password');
            } elseif ($this->UserModel->CheckUserEmail($email)) {
                $this->code_password($email);
                header("Location:" . URLROOT . "GoInController/code_password/" . $email);
            } else {
                $_SESSION['alert'] = 'البريد الالكتروني الذي أدخلته غير موجود, حاول مرة أخرى  ';
                $this->Route('GoIn/forget-password');
            }
        }else {
            $this->Route('GoIn/forget-password');
        }
    }

    public function code_password($UserEmail)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->SendVerificationCode($UserEmail);
        } else {
            $this->Route('GoIn/code_password');
        }
    }

    public function SendVerificationCode($UserEmail)
    {
        require_once LIB_PATH . "\mail.php";
        $mail->setFrom('PlayGround8545@gmail.com', 'PlayGround 85_45');
        $mail->addAddress($UserEmail);               //Name is optional
        $mail->Subject = 'رسالة تأكيد كلمة المرور';
        $mail->Body = "كود التحقق الخاص بك هو " . $this->ImportRandomVerificationCode();
        $mail->send();
    }

    public function ImportRandomVerificationCode()
    {
        $_SESSION['code'] = rand(2000600, 5902005010);
        return $_SESSION['code'];
    }

    public function CheckCodeValidity()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $code = trim($_POST['code']);
            if ($code === $_SESSION['code']) {
                $this->Route('GoIn/renew_password');
            } else {
                $_SESSION['alert'] = 'كود التحقق الذي أدخلته غير صحيح , عاود المحاولة';
                $this->Route("GoIn/forget-password");
            }
        } else {
            $this->Route("notfound/notfound");
        }
    }

    public function renew_password()
    {
        $_SESSION['alert'] = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $password = trim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));
            $confirmpassword = trim(filter_input(INPUT_POST, "confirmpassword", FILTER_SANITIZE_STRING));
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";


            // Validate password on length, numeric values,
            if (empty($password) || empty($confirmpassword)) {
                $_SESSION['alert'] = 'من فضلك أدخل كلمة المرور';
                $this->Route("GoIn/renew_password");
            } elseif (strlen($password) < 8) {
                $_SESSION['alert'] = '   يجب ان تحتوي كلمة المرور على 8 أحرف تشمل رقم واحد على الأقل  ';
                $this->Route("GoIn/renew_password");

            } elseif (preg_match($passwordValidation, $password)) {
                $_SESSION['alert'] = ' يجب ان تحتوي كلمة المرور على 8 أحرف تشمل رقم واحد على الأقل  ';
                $this->Route("GoIn/renew_password");

            } elseif ($password != $confirmpassword) {
                $_SESSION['alert'] = "تأكد من تطابق كلمتي المرور";
                $this->Route("GoIn/renew_password");

            } else {
                if ($this->UserModel->UpdateUserPassword($password, $_SESSION['email_verification_code'])) {
                    $_SESSION['alert'] = 'تم تعديل كلمة المرور بنجاح';
                    $this->Route('User/UserHome');
                } else {
                    $this->Route("notfound/wentwrong");
                }
            }
        } else {
            $this->Route("notfound/notfound");
        }
    }

    public function notfound()
    {
        $this->Route('notfound/notfound');
    }
}