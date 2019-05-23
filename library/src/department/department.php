<?php
namespace App\department;

use PDO;
use App\Message\Message;
use App\Model\Database;

class department extends Database{
    public $id;
    public $deptName;

    public function setData($receieveDataArray){
        //here id further use for retrive data from database:
        if(array_key_exists("id",$receieveDataArray)){
            $this->id = $receieveDataArray['id'];
        }
        if(array_key_exists("deptName",$receieveDataArray)){
            $this->deptName = $receieveDataArray['deptName'];
        }
    }

    public function store(){
        $deptName = $this->deptName;

        $sqlQuery = "INSERT INTO dept (dept_name) VALUES (?);";
        $dataArray = array($deptName);

        $STH = $this->DBH->prepare($sqlQuery); //for data insert into database we have to use prepare//
        $result = $STH->execute($dataArray);

        if($result){
            Message::message("Success! data has been inserted.");
        }
        else{
            Message::message("Error! data has not been inserted.");
        }
    }//end of store()

    public function index(){
        $sqlQuery = "select * from dept order by id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of index()

    public function view(){
        $sqlQuery = "select * from dept where id = $this->id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();

        return $singleData;
    }//end of view()

    public function update(){
        $deptName = $this->deptName;
        if ($deptName=='') {
            Message::message("Field Must Not Be Empty");
        }else{
            $sqlQuery = "UPDATE dept SET dept_name = ? WHERE id = $this->id;";
            $dataArray = array($deptName) ;

            $STH = $this->DBH->prepare($sqlQuery);

            $result = $STH->execute($dataArray);

            if($result){
                Message::message("Success! data has been updated.");
            }
            else{
                Message::message("Error! data has not been Updated.");
            }
        }
    }// end of update()

}//end of department class