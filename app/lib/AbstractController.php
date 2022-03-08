<?php
namespace PHPMVC\lib;

class AbstractController
{

    public function Model($modelname)
    {
        require_once APP_PATH.DS."MODELS".DS.$modelname.".php";
        $modelname = "PHPMVC\MODELS\\" . $modelname;
        return new $modelname();
    }

    public function Route($view,$data= array(),$data2 = array()){
        if (file_exists(VIEW_PATH.DS.$view.".php")){
            require_once VIEW_PATH.DS.$view.".php";
        }else {
            require_once APP_PATH.DS."view".DS."notfound".DS."notfound.php";
        }
    }

    //Check If user is logged ...
    public function isLoggedIn() {
        if (isset($_SESSION['userid'])) {
            return true;
        } else {
            return false;
        }
    }

    //check if is admin

    public function isAdmin()
    {
        if (isset($_SESSION['isadmin'])){
            if ($_SESSION['isadmin'] == 1 ){
                return true;
            }else{
                return false;
            }
        }
        return false;
    }
}
