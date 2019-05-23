<?php
namespace App\group;

use PDO;
use App\Message\Message;
use App\Model\Database;

class group extends Database{
    public $id;
    public $groupName;

    public function setData($receieveDataArray){

        //here id further use for retrive data from database:
        if(array_key_exists("id",$receieveDataArray)){
            $this->id = $receieveDataArray['id'];
        }
        if(array_key_exists("groupName",$receieveDataArray)){
            $this->groupName = $receieveDataArray['groupName'];
        }
    }

    public function store(){
        $groupName = $this->groupName;

        $sqlQuery = "INSERT INTO grp (group_name) VALUES (?);";
        $dataArray = array($groupName);

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
        $sqlQuery = "SELECT * FROM grp WHERE is_trashed = 'No' order by id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of index()

    public function view(){
        $sqlQuery = "SELECT * FROM grp WHERE id = $this->id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();

        return $singleData;
    }//end of view()

    public function update(){
        $groupName = $this->groupName;
        if ($groupName=='') {
            Message::message("Field Must Not Be Empty");
        }else{
            $sqlQuery = "UPDATE grp SET group_name = ? WHERE id = $this->id;";
            $dataArray = array($groupName) ;

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

}//end of group class