<?php
namespace App\activation;
use PDO;
use App\Message\Message;
use App\Model\Database;

class activation extends Database{
    public $id;
    public $startDate;
    public $endDate;
    public $amount;
    public $remarks;

    public function setData($receieveDataArray){

        //here id further use for retrive data from database:
        if(array_key_exists("id",$receieveDataArray)){
            $this->id = $receieveDataArray['id'];
        }
        if(array_key_exists("startDate",$receieveDataArray)){
            $this->startDate = $receieveDataArray['startDate'];
        }
        if(array_key_exists("endDate",$receieveDataArray)){
            $this->endDate = $receieveDataArray['endDate'];
        }
        if(array_key_exists("amount",$receieveDataArray)){
            $this->amount = $receieveDataArray['amount'];
        }
        if(array_key_exists("remarks",$receieveDataArray)){
            $this->remarks = $receieveDataArray['remarks'];
        }
    }

      public function store(){
        $sqlQuery = "INSERT INTO `app_activation` (`id`, `start_date`, `end_date`, `paid_amount`, `remarks`) VALUES (NULL,?,?,?,?)";
        $dataArray = array($this->startDate,$this->endDate,$this->amount,$this->remarks);

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
        $sqlQuery = "select * from app_activation order by id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of index()


    public function view(){
        $sqlQuery = "select * from app_activation where id = $this->id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();

        return $singleData;
    }//end of view()


    public function update(){
        $endDate = $this->endDate;
        if ($endDate=='') {
            Message::message("Field Must Not Be Empty");
        }else{
            $sqlQuery = "UPDATE app_activation SET end_date = ?, start_date=now() WHERE id = $this->id;";
            $dataArray = array($this->endDate) ;

            $STH = $this->DBH->prepare($sqlQuery);

            $result = $STH->execute($dataArray);


            if($result){
                Message::message("Success! Data has been Updated.");
            }
            else{
                Message::message("Error! Data has not been Updated.");
            }
        }
    }// end of update()


}//end of term class