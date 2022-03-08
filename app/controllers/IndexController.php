<?php

namespace PHPMVC\controllers;
use PHPMVC\LIB\AbstractController;

class IndexController extends AbstractController
{

    private $adminModel;
    private $UserModel;

    public function __Construct()
    {
        $this->adminModel = $this->Model("AdminModel");
        $this->UserModel = $this->Model("UserModel");
    }

    public function default()
    {
        if (!($this->isLoggedIn())){
            header("Location:".URLROOT."IndexController/index_2");
            exit();
        }else{
            if ($this->isAdmin()){
                header("Location:".URLROOT."AdminController/index");
            }else{
                header("Location:".URLROOT."UserController/index");
            }
        }
    }

    public function signup()
    {
        $this->Route('GoIn/signup');
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('location:'.URLROOT."IndexController/default");
        exit();
    }
    public function notfound()
    {
        $this->Route('notfound/notfound');
    }

    public function LockScreen()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['alert'] = "";
            $password = md5(trim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING)));
            $bool = $this->adminModel->CheckLockPassword($password, $_SESSION['userid']);
            if ($bool) {
                $_SESSION['lock_screen'] = false;
                header("Location:".URLROOT."AdminController/index");
                exit();
            } else {
                $_SESSION['alert'] = "كلمة السر غير صحيحة, من فضلك أعد المحاولة";
                $this->Route("AdminDashboard/lock-screen");
            }
        } else {
            $_SESSION['lock_screen'] = true;
            $this->Route("AdminDashboard/lock-screen");
        }
    }

    public function index_2()
    {
        $data = $this->UserModel->GetAllStaduimsInfo();
        $this->Route("Users/index-2",$data);
    }
}