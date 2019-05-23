<?php
namespace App\desk;

use PDO;
use App\Message\Message;
use App\Model\Database;

class desk extends Database{
    public $id;
    public $name;

    public function setData($receieveDataArray){

        //here id further use for retrive data from database:
        if(array_key_exists("id",$receieveDataArray)){
            $this->id = $receieveDataArray['id'];
        }
        if(array_key_exists("name",$receieveDataArray)){
            $this->name = $receieveDataArray['name'];
        }
    }

    public function store(){
        $name = $this->name;

        $sqlQuery = "INSERT INTO desk (name) VALUES (?);";
        $dataArray = array($name);

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
        $sqlQuery = "SELECT * FROM desk ORDER BY id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of index()

    public function view(){
        $sqlQuery = "SELECT * FROM desk WHERE id = $this->id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();

        return $singleData;
    }//end of view()

    public function update(){
        $name = $this->name;
        if ($name=='') {
            Message::message("Field Must Not Be Empty");
        }else{
            $sqlQuery = "UPDATE desk SET name = ? WHERE id = $this->id;";
            $dataArray = array($name) ;

            $STH = $this->DBH->prepare($sqlQuery);

            $result = $STH->execute($dataArray);

            if($result){
                Message::message("Success! data has been updated.");
            }
            else{
                Message::message("Error! Data has not been updated.");
            }
        }
    }// end of update()

}//end of desk class