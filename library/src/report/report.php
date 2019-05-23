<?php
namespace App\report;

use PDO;
use PDOException;
use App\Utility\Utility;
use App\Message\Message;
use App\Model\Database;

class report extends Database{
    public $id;
    public $itemId;
    public $payType;
    public $fDate;
    public $tDate;

    public function setData($receieveDataArray,$file=0){

        //here id further use for retrive data from database:
        if(array_key_exists("id",$receieveDataArray)){
            $this->id = $receieveDataArray['id'];
        }
        if(array_key_exists("itemId",$receieveDataArray)){
            $this->itemId = $receieveDataArray['itemId'];
        }
        if(array_key_exists("payType",$receieveDataArray)){
            $this->payType = $receieveDataArray['payType'];
        }
        if(array_key_exists("fDate",$receieveDataArray)){
            $this->fDate = $receieveDataArray['fDate'];
        }
        if(array_key_exists("tDate",$receieveDataArray)){
            $this->tDate = $receieveDataArray['tDate'];
        }
        $this->file = $file;
    }

    public function index(){
        $sqlQuery = "SELECT c.c_id,c.c_name, j.id AS sub_id,j.sub_name,t.id AS term_id,t.term_name,r.yr FROM `result` r
                    LEFT JOIN class c ON c.c_id=r.c_id
                    LEFT JOIN subject j ON j.id=r.sub_id
                    LEFT JOIN term t ON t.id=r.term_id group by r.c_id, r.yr,r.sub_id,r.term_id order by r.id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of index()
    
    public function viewBookIssued(){
        $payType = $this->payType;
        if($payType==98) {
            $sqlQuery = "SELECT * FROM v_book_request
                    WHERE issue_start_date >= '$this->fDate' AND issue_start_date <= '$this->tDate'";
        }
        else if($payType==99) {
            $sqlQuery = "SELECT * FROM v_book_request
                    WHERE issue_start_date >= '$this->fDate' AND issue_start_date <= '$this->tDate' and status=2";
        }
        else if($payType==0 || $payType==1 || $payType==2) {
            $sqlQuery = "SELECT * FROM v_book_request
                    WHERE issue_start_date >= '$this->fDate' AND issue_start_date <= '$this->tDate' and status=1 and request_type = $payType";
        }
        else if($payType==3 || $payType==4 || $payType==5) {
            if($payType==3) $payType = 0;
            else if($payType==4) $payType = 1;
            else if($payType==5) $payType = 2;
            $sqlQuery = "SELECT * FROM v_book_request
                    WHERE issue_start_date >= '$this->fDate' AND issue_start_date <= '$this->tDate' and status=2 and request_type = $payType";
        }
        $STH = $this->DBH->query($sqlQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;
    }//end of viewBookIssued()
    
}//end of Report