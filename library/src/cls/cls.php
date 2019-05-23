<?php
namespace App\cls;
use PDO;
use App\Message\Message;
use App\Model\Database;

class cls extends Database{
    public $id;
    public $cId;
    public $cName;
    public $gpaDivide;
    public $tSubject;
    public function setData($receieveDataArray){

        //here id further use for retrive data from database:
        if(array_key_exists("id",$receieveDataArray)){
            $this->id = $receieveDataArray['id'];
        }
        if(array_key_exists("cId",$receieveDataArray)){
            $this->cId = $receieveDataArray['cId'];
        }
        if(array_key_exists("cName",$receieveDataArray)){
            $this->cName = $receieveDataArray['cName'];
        }
        // if(array_key_exists("gpaDivide",$receieveDataArray)){
        //     $this->gpaDivide = $receieveDataArray['gpaDivide'];
        // }
        // if(array_key_exists("tSubject",$receieveDataArray)){
        //     $this->tSubject = $receieveDataArray['tSubject'];
        // }
    }


    public function store(){
        $cId = $this->cId;
        $cName = $this->cName;
        // $gpaDivide = $this->gpaDivide;
        // $tSubject = $this->tSubject;

        $sqlQuery = "INSERT INTO `class` (`c_id`, `c_name`) VALUES (?,?)";
        $dataArray = array($cId, $cName);

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
        $sqlQuery = "select * from class where is_trashed = 'No' order by id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of index()

    public function view(){
        $sqlQuery = "select * from class where id = $this->id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();

        return $singleData;
    }//end of view()
    public function viewSingleClass(){
        $sqlQuery = "select * from class where c_id = $this->cId";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();
        return $singleData;
    }//end of view()
    public function update(){
        $cId = $this->cId;
        $cName = $this->cName;
        // $gpaDivide = $this->gpaDivide;
        // $tSubject = $this->tSubject;

        if ($cId==''|| $cName=='') {
            Message::message("Field Must Not Be Empty");
        }else{
            $sqlQuery = "UPDATE class SET c_id = ?, c_name = ?  WHERE id = $this->id;";
            $dataArray = array($cId,$cName) ;

            $STH = $this->DBH->prepare($sqlQuery);

            $result = $STH->execute($dataArray);


            if($result){
                Message::message("Success! Data has been updated.");
            }
            else{
                Message::message("Error! Data has not been Updated.");
            }
        }
    }// end of update()
}//end of BookTitle Class