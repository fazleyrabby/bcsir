<?php
namespace App\librarianInfo;

use PDO;
use App\Message\Message;
use App\Model\Database;

class librarianInfo extends Database{
    public $id;
    public $name;
    public $email;
    public $password;
    public $gender;
    public $mobile;
    public $address;
    public $profession;
    public $cardNo;

    public function setData($receieveDataArray){
        //here id further use for retrive data from database:
        if(array_key_exists("id",$receieveDataArray)){
            $this->id = $receieveDataArray['id'];
        }
        if(array_key_exists("name",$receieveDataArray)){
            $this->name = $receieveDataArray['name'];
        }
        if(array_key_exists("email",$receieveDataArray)){
            $this->email = $receieveDataArray['email'];
        }
        if(array_key_exists("password",$receieveDataArray)){
            $this->password = $receieveDataArray['password'];
        }
        if(array_key_exists("gender",$receieveDataArray)){
            $this->gender = $receieveDataArray['gender'];
        }
        if(array_key_exists("mobile",$receieveDataArray)){
            $this->mobile = $receieveDataArray['mobile'];
        }
        if(array_key_exists("address",$receieveDataArray)){
            $this->address = $receieveDataArray['address'];
        }
        if(array_key_exists("profession",$receieveDataArray)){
            $this->profession = $receieveDataArray['profession'];
        }
        if(array_key_exists("cardNo",$receieveDataArray)){
            $this->cardNo = $receieveDataArray['cardNo'];
        }
    }

    public function store(){
        $name = $this->name;
        $email = $this->email;
        $gender = $this->gender;
        $mobile = $this->mobile;
        $address = $this->address;
        $profession = $this->profession;
        $cardNo = $this->cardNo;
        
        $sqlQuery = "INSERT INTO librarian_info (`id`, `name`, `email`, `gender`,  `mobile`, `address`, `profession`, `created_at`, `card_no`) 
                    SELECT MAX(id)+1, ?, ?, ?, ?, ?, ?, now(), ? FROM librarian_info";
        $dataArray = array($name, $email, $gender, $mobile, $address, $profession, $cardNo);

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
        $sqlQuery = "select * from librarian_info where is_trashed = 'No' order by id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of index()


    public function view(){
        $sqlQuery = "select * from librarian_info where id = $this->id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();

        return $singleData;
    }//end of view()

    public function update(){
        $name = $this->name;
        $email = $this->email;
        $password = md5($this->password);
        $gender = $this->gender;
        $mobile = $this->mobile;
        $address = $this->address;
        $profession = $this->profession;
        $cardNo = $this->cardNo;

        if ($name=='' || $password=='') {
            Message::message("Field Must Not Be Empty");
        }else{
            $sqlQuery = "UPDATE librarian_info SET name = ?,email = ?,password = ?,gender = ?,mobile = ?,address = ?,profession = ?,updated_at = now(),card_no = ? WHERE id = $this->id";
            $dataArray = array($name, $email, $password, $gender, $mobile, $address, $profession, $cardNo);

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


}//end of librarianInfo class