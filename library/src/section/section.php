<?php
namespace App\section;

use PDO;
use App\Message\Message;
use App\Model\Database;

class section extends Database{
    public $id;
    public $secId;
    public $secName;

    public function setData($receieveDataArray){

        //here id further use for retrive data from database:
        if(array_key_exists("id",$receieveDataArray)){
            $this->id = $receieveDataArray['id'];
        }
        if(array_key_exists("secId",$receieveDataArray)){
            $this->secId = $receieveDataArray['secId'];
        }
        if(array_key_exists("secName",$receieveDataArray)){
            $this->secName = $receieveDataArray['secName'];
        }
    }

      public function store(){
        $secName = $this->secName;

        $sqlQuery = "INSERT INTO section (sec_name) VALUES (?);";
        $dataArray = array($secName);

        $STH = $this->DBH->prepare($sqlQuery); //for data insert into database we have to use prepare//
        $result = $STH->execute($dataArray);

        if($result){
            Message::message("Data has been inserted successfully!");
        }
        else{
            Message::message("Error in data insertion!");
        }
    }//end of store()



    public function index(){
        $sqlQuery = "select * from section where is_trashed = 'No' order by id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of index()


    public function view(){
        $sqlQuery = "select * from section where id = $this->id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();

        return $singleData;
    }//end of view()

    public function viewSingleSection(){
        $sqlQuery = "select * from section where id = $this->secId";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();
        return $singleData;
    }//end of viewSingleSection()

    public function update(){
        $secName = $this->secName;
        if ($secName=='') {
            Message::message("Field Must Not Be Empty");
        }else{
            $sqlQuery = "UPDATE section SET sec_name = ? WHERE id = $this->id;";
            $dataArray = array($secName) ;

            $STH = $this->DBH->prepare($sqlQuery);

            $result = $STH->execute($dataArray);


            if($result){
                Message::message("Success! Data has been Updated Successfully!");
            }
            else{
                Message::message("Error! Data has not been Updated.");
            }
        }
    }// end of update()


}//end of term class