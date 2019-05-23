<?php
namespace App\subject;

use PDO;
use App\Message\Message;
use App\Model\Database;

class subject extends Database{
    public $id;
    public $subName;
    public $fullMarks;
    public $passMarks;
    public $qcMarks;
    public $mcqMarks;
    public $practicalMarks;

    public function setData($receieveDataArray){

        //here id further use for retrive data from database:
        if(array_key_exists("id",$receieveDataArray)){
            $this->id = $receieveDataArray['id'];
        }
        if(array_key_exists("subName",$receieveDataArray)){
            $this->subName = $receieveDataArray['subName'];
        }
        if(array_key_exists("fullMarks",$receieveDataArray)){
            $this->fullMarks = $receieveDataArray['fullMarks'];
        }
        if(array_key_exists("passMarks",$receieveDataArray)){
            $this->passMarks = $receieveDataArray['passMarks'];
        }
        if(array_key_exists("qcMarks",$receieveDataArray)){
            $this->qcMarks = $receieveDataArray['qcMarks'];
        }
        if(array_key_exists("mcqMarks",$receieveDataArray)){
            $this->mcqMarks = $receieveDataArray['mcqMarks'];
        }
        if(array_key_exists("practicalMarks",$receieveDataArray)){
            $this->practicalMarks = $receieveDataArray['practicalMarks'];
        }
    }

    public function store(){
        $subName = $this->subName;
        $fullMarks = $this->fullMarks;
        $passMarks = $this->passMarks;
        $qcMarks = $this->qcMarks;
        $mcqMarks = $this->mcqMarks;
        $practicalMarks = $this->practicalMarks;
        $sqlQuery = "INSERT INTO subject (`id`, `sub_name`, `full_marks`, `pass_marks`, qc_marks, mcq_marks, practical_marks)
                    SELECT MAX(id)+1,?, ?, ?, ?, ?, ?
                    FROM `subject` WHERE id<500";
        $dataArray = array($subName, $fullMarks, $passMarks, $qcMarks, $mcqMarks, $practicalMarks);
//var_dump($sqlQuery); die;
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
        $sqlQuery = "select * from subject where is_trashed = 'No' order by sub_name";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of index()

    public function indexWithoutOptional(){
        $sqlQuery = "select * from subject where id<500 AND is_trashed = 'No' order by sub_name";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of indexWithoutOptional()

    public function view(){
        $sqlQuery = "select * from subject where id = $this->id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();

        return $singleData;
    }//end of view()

    public function update(){
        $subName = $this->subName;
        $fullMarks = $this->fullMarks;
        $passMarks = $this->passMarks; 
        $qcMarks = $this->qcMarks;
        $mcqMarks = $this->mcqMarks;
        $practicalMarks = $this->practicalMarks;
        if ($subName==''|| $fullMarks=='' || $passMarks=='') {
            Message::message("Field Must Not Be Empty");
        }else{
            $sqlQuery = "UPDATE subject SET sub_name = ?, full_marks = ?, pass_marks = ?, qc_marks=?, mcq_marks=?, practical_marks=? WHERE id = $this->id;";
            $dataArray = array($subName,$fullMarks,$passMarks,$qcMarks,$mcqMarks,$practicalMarks) ;

            $STH = $this->DBH->prepare($sqlQuery);

            $result = $STH->execute($dataArray);

            if($result){
                Message::message("Success! data has been updated.");
            }
            else{
                Message::message("Error! data has not been updated.");
            }
        }
    }// end of update()

}//end of subject Class
