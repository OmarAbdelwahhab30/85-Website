<?php


namespace PHPMVC\models;

use PHPMVC\LIB\Database;

class UserModel
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function GetAllStaduimsInfo()
    {
        $this->db->query('SELECT * FROM stadiums');

        $StadiumsInfo = $this->db->resultSet();

        $this->db->execute();

        if ($StadiumsInfo){
            return $StadiumsInfo;
        }else{
            return "No Stadiums to show";
        }
    }

    public function GetStadiumByID($std_id)
    {
        $this->db->query('SELECT * FROM stadiums WHERE id = :id');

        $this->db->bindValues(":id",$std_id);

        $StadiumsInfo = $this->db->resultSet();

        $this->db->execute();

        if ($StadiumsInfo){
            return $StadiumsInfo;
        }else{
            return "No Stadiums to show";
        }
    }
    public function update($table ,$values, $conditions){
        $statement = "UPDATE $table SET $values WHERE $conditions";

        $this->db->query($statement);

        return $this->db->execute();

    }


    public function select($values ,$table, $conditions){
        $statement = "SELECT $values from $table WHERE $conditions";

        $this->db->prepareAndExecute($statement);

        return $this->db->resultSet();

    }


    public function selectWithJoin($values ,$table1, $table2 ,$conditions){
        $statment = "SELECT $values from $table1 Join $table2 ON $conditions";

        $this->db->prepareAndExecute($statment);

        return $this->db->resultSet();
    }

    public function insert($table ,$values){
        $statement = "INSERT INTO $table SET $values";

        $this->db->query($statement);

        return $this->db->execute();

    }

    public function IsBookingAllowed($date,$hour,$stdid)
    {
        $this->db->query('SELECT id FROM reservation WHERE res_day = :res_day AND res_start = :res_start AND stadium_id = :stadium_id');

        $this->db->bindValues(":res_day",$date);

        $this->db->bindValues(":res_start",$hour);

        $this->db->bindValues(":stadium_id",$stdid);

        $this->db->execute();

        if ($this->db->rowCount()>0){
            return false;
        }
        return true;
    }

    public function RECORD_BOOKING($stdArray,$date,$hour)
    {
        $this->db->query('INSERT INTO reservation (user_id,stadium_id,res_day,res_start,cost) VALUES(:user_id,:stadium_id,:res_day,:res_start,:cost)');
        $this->db->bindValues(':user_id',$_SESSION['userid']);
        $this->db->bindValues(':stadium_id',$stdArray->id);
        $this->db->bindValues(':res_day', $date);
        $this->db->bindValues(':res_start', $hour);
        $this->db->bindValues(':cost',$stdArray->hour_price);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }



}