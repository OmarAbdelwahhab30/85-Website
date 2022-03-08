<?php


namespace PHPMVC\models;


use PHPMVC\LIB\Database;

class GoInModel
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function IsUsernameDuplicated($username)
    {
        $this->db->query('SELECT username FROM users WHERE username = :username ');

        $this->db->bindValues(':username',$username);

        $this->db->execute();

        if ($this->db->rowCount()>0){
            return true;
        }
        return false;
    }
    public function IsPhoneDuplicated($phone)
    {
        $this->db->query('SELECT phone FROM users WHERE phone = :phone ');

        $this->db->bindValues(':phone',$phone);

        $this->db->execute();

        if ($this->db->rowCount()>0){
            return true;
        }
        return false;
    }

    public function IsEmailDuplicated($email)
    {
        $this->db->query('SELECT email FROM users WHERE email = :email ');

        $this->db->bindValues(':email',$email);

        $this->db->execute();

        if ($this->db->rowCount()>0){
            return true;
        }
        return false;
    }

    public function CheckUserEmail($email)
    {
        $this->db->query('SELECT email FROM users WHERE email = :email ');

        $this->db->bindValues(':email',$email);

        $this->db->execute();

        if ($this->db->rowCount()>0){
            return true;
        }
        return false;
    }

    public function register($data) {
        $this->db->query('INSERT INTO users (username, email, phone, password) VALUES(:username,:email ,:phone, :password)');
        $this->db->bindValues(':username', $data['username']);
        $this->db->bindValues(':email', $data['email']);
        $this->db->bindValues(':phone', $data['phone']);
        $this->db->bindValues(':password', $data['password']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($phone,$password)
    {
        $this->db->query('SELECT * FROM users WHERE phone = :phone');

        $this->db->bindValues(':phone', $phone);

        $row = $this->db->single();

        $hashedPassword = isset($row->password)? $row->password:null;
        $phone_number = isset($row->phone)? $row->phone:null;
            if (($hashedPassword==$password) && $phone_number == $phone) {
               return $row;
            }
            return false;
    }


    public function UpdateUserPassword($password,$email)
    {
        $this->db->query('UPDATE users SET password = :password  WHERE email = :email');

        $this->db->bindValues(':password', md5($password));
        $this->db->bindValues(':email', $email);

        if ($this->db->execute()){
            unset($_SESSION['email_verification_code'],$_SESSION['code']);
            return true;
        }
        return false;
    }

}