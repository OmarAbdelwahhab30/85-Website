<?php


namespace PHPMVC\models;


use PHPMVC\lib\Database;

class AdminModel
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }



    public function select($values ,$table, $conditions){
        $statment = "SELECT $values from $table WHERE $conditions";

        $this->db->prepareAndExecute($statment);

        return $this->db->resultSet();

    }
    public function selectWithJoin($values ,$table1, $table2 ,$conditions){
        $statment = "SELECT $values from $table1 Join $table2 ON $conditions";

        $this->db->prepareAndExecute($statment);

        return $this->db->resultSet();

    }

    public function update($table ,$values, $conditions){
        $statment = "UPDATE $table SET $values WHERE $conditions";

        $this->db->query($statment);

        return $this->db->execute();

    }


    public function GetAllUsersInfo()
    {
        $this->db->query('SELECT * FROM users WHERE isadmin <> 1');

        $UsersInfo = $this->db->resultSet();

        $this->db->execute();

        if ($UsersInfo){
            return $UsersInfo;
        }else{
            return "No Users to show";
        }
    }

    public function IsValidPhone($phone)
    {
        $this->db->query('SELECT phone FROM users WHERE phone = :phone AND isadmin != 1');

        $this->db->bindValues(':phone', $phone);

        $this->db->execute();

        if ($this->db->rowCount() > 0) {
            return true;
        }
        return false;
    }
    public function SetAsAdminstration($phone)
    {

        $this->db->query('UPDATE users SET isadmin = :isadmin  WHERE phone = :phone');

        $this->db->bindValues(':isadmin',1 );

        $this->db->bindValues(':phone',$phone );

        if ($this->db->execute()){
            return true;
        }
        return false ;
    }

    public function CheckLockPassword($password,$userid)
    {
        $this->db->query('SELECT password FROM users WHERE userid = :userid AND password =:password' );

        $this->db->bindValues(':password', $password);

        $this->db->bindValues(':userid', $userid);

        $this->db->execute();

        if ($this->db->rowCount() == 1) {
            return true;
        }
        return false;

    }

}