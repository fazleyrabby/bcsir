<?php
namespace App\search;

use PDO;
use App\Message\Message;
use App\Model\Database;
class search extends Database {

    public function index(){

        $sqlQuery = "Select * from book_title where is_trashed='No'";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();
        return $allData;
    }


}