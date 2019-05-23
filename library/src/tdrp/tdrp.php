<?php
namespace App\tdrp;

use PDO;
use App\Message\Message;
use App\Model\Database;

class tdrp extends Database {

    public $tableName;
    public $id;
    public $pageTable;
    public $is_trashed;
    public $insPath;
    
    public $sId;
    public $cId;
    public $secId;
    public $grpId;
    public $yr;
    public $tId;
    

    public function setData($receieveDataArray){
        if(array_key_exists("id",$receieveDataArray)){
            $this->id = $receieveDataArray['id'];
        }
        if(array_key_exists("pageTable",$receieveDataArray)){
            $this->pageTable = $receieveDataArray['pageTable'];
        }
        if(array_key_exists("insPath",$receieveDataArray)){
            $this->insPath = $receieveDataArray['insPath'];
        }
        if(array_key_exists("sId",$receieveDataArray)){
            $this->sId = $receieveDataArray['sId'];
        }
        if(array_key_exists("cId",$receieveDataArray)){
            $this->cId = $receieveDataArray['cId'];
        }
        if(array_key_exists("yr",$receieveDataArray)){
            $this->yr = $receieveDataArray['yr'];
        }
        if(array_key_exists("grpId",$receieveDataArray)){
            $this->grpId = $receieveDataArray['grpId'];
        }
        if(array_key_exists("secId",$receieveDataArray)){
            $this->secId = $receieveDataArray['secId'];
        }
        if(array_key_exists("tId",$receieveDataArray)){
            $this->tId = $receieveDataArray['tId'];
        }
    }//end of setData()

    public function getTable($receieveDataArray,$is_trashed){

        $this->tableName = $receieveDataArray;
        $this->is_trashed = $is_trashed;

    }

    public function tableColumn(){

        $sqlQuery = "SHOW COLUMNS FROM  $this->pageTable";

        $STH = $this->DBH->query($sqlQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allDatacolumn = $STH->fetchAll();

        return $allDatacolumn;
    }//end of tableColumn()

    public function indexPaginator($page=1,$itemsPerPage=3)
    {
        $table = $this->tableName;

        $start = (($page - 1) * $itemsPerPage);

        if ($start < 0) $start = 0;

        $sql = "SELECT * FROM $table where is_trashed = '$this->is_trashed' order by `id` DESC LIMIT $start,$itemsPerPage";


        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData = $STH->fetchAll();
        return $arrSomeData;
    }//end of class indexPaginator

    //paginator for student_info
    public function indexPaginatorForStudent($page=1,$itemsPerPage=3)
    {
        $table = $this->tableName;

        $start = (($page - 1) * $itemsPerPage);

        if ($start < 0) $start = 0;

        $sql = "select s.*, c.c_name from student_info s LEFT JOIN class c ON c.c_id=s.c_id where s.is_trashed='No' LIMIT $start,$itemsPerPage";


        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData = $STH->fetchAll();
        return $arrSomeData;
    }//end of class indexPaginatorForStudent

    public function indexPaginatorForStdSalary($page=1,$itemsPerPage=3)
       {
           $table = $this->tableName;

           $start = (($page - 1) * $itemsPerPage);

           if ($start < 0) $start = 0;
    if($_GET['search']) {
          $searchKey =$_GET['search'];
          $sql = "SELECT y.id , y.s_id, f.name, y.amount, y.total, y.due, y.created_at, y.remarks, y.issued_by, u.id as user, u.name AS user_name
					FROM  `student_salary` y
					LEFT JOIN student_info f ON y.s_id=f.id
                    LEFT JOIN users u ON y.user_id=u.id
                    where (y.total!=0) and (y.id like '%$searchKey%' or y.s_id like '%$searchKey%' or f.name like '%$searchKey%' or y.created_at like '%$searchKey%' or y.remarks like '%$searchKey%' or u.name like '%$searchKey%')  order by y.id desc LIMIT $start,$itemsPerPage";
        }
      else  
      {
           $sql = "SELECT y.id , y.s_id, f.name, y.amount, y.total, y.due, y.discount_fee, y.issued_by, y.created_at, y.remarks, u.id as user, u.name AS user_name
					FROM  `student_salary` y
					LEFT JOIN student_info f ON y.s_id=f.id
                    LEFT JOIN users u ON y.user_id=u.id
                    where y.total!=0
                    ORDER BY y.id DESC LIMIT $start,$itemsPerPage";

        }
           $STH = $this->DBH->query($sql);

           $STH->setFetchMode(PDO::FETCH_OBJ);

           $arrSomeData = $STH->fetchAll();
           return $arrSomeData;
       } //end of class indexPaginatorForStdSalary
    public function indexPaginatorForTeacherSalary($page=1,$itemsPerPage=3)
    {
        $table = $this->tableName;

        $start = (($page - 1) * $itemsPerPage);

        if ($start < 0) $start = 0;
    if($_GET['search']) {
          $searchKey =$_GET['search'];
           $sql = "SELECT y.id , y.t_id, f.name AS t_name, y.amount, y.total, y.due, y.created_at, y.remarks, u.id as user, u.name AS user_name
					FROM  `teacher_salary` y
					LEFT JOIN teacher_info f ON y.t_id=f.id
                    LEFT JOIN users u ON y.user_id=u.id
                    where (y.total!=0) and (y.t_id like '%$searchKey%' or f.name like '%$searchKey%' or y.created_at like '%$searchKey%' or y.remarks like '%$searchKey%' or u.name like '%$searchKey%')
                    ORDER BY y.id DESC LIMIT $start,$itemsPerPage"; 
        
        }
        else{ 
           $sql = "SELECT y.id , y.t_id, f.name AS t_name, y.amount, y.total, y.due, y.created_at, y.remarks, u.id as user, u.name AS user_name
					FROM  `teacher_salary` y
					LEFT JOIN teacher_info f ON y.t_id=f.id
                    LEFT JOIN users u ON y.user_id=u.id
                    where y.total!=0
                    ORDER BY y.id DESC LIMIT $start,$itemsPerPage";
        }

        $STH = $this->DBH->query($sql); 
 
        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData = $STH->fetchAll();
        return $arrSomeData;
    }
       public function indexPaginatorForResult($page=1,$itemsPerPage=3)
       {
           $start = (($page - 1) * $itemsPerPage);

           if ($start < 0) $start = 0;

           $sql = "SELECT c.c_id,c.c_name, j.id AS sub_id,j.sub_name,t.id AS term_id,t.term_name,r.yr,r.id FROM `result` r
   LEFT JOIN class c ON c.c_id=r.c_id
   LEFT JOIN subject j ON j.id=r.sub_id
   LEFT JOIN term t ON t.id=r.term_id group by r.c_id, r.yr,r.sub_id,r.term_id order by r.id desc LIMIT $start,$itemsPerPage";


           $STH = $this->DBH->query($sql);

           $STH->setFetchMode(PDO::FETCH_OBJ);

           $arrSomeData = $STH->fetchAll();
           return $arrSomeData;
       }

    public function indexPaginatorForIncome($page=1,$itemsPerPage=3) 
    {

        $start = (($page - 1) * $itemsPerPage);

        if ($start < 0) $start = 0;

 
    if($_GET['search']) {
          $searchKey =$_GET['search'];
          $sql = "SELECT i.id, i.s_id, s.name AS s_name, t.item_name, t.id AS item_id, i.total, i.qty, i.amount, i.discount_fee, i.due, i.created_at, i.updated_at, i.remarks FROM `income` i LEFT JOIN item t on i.item_id = t.id LEFT JOIN student_info s on i.s_id=s.id where t.item_name like '%$searchKey%' or i.created_at like '%$searchKey%' or i.updated_at like '%$searchKey%' or i.s_id like '%$searchKey%'
        or s.name like '%$searchKey%' or i.id like '%$searchKey%' or i.remarks like '%$searchKey%'  order by i.id desc LIMIT $start,$itemsPerPage";
        }
      else  
      {
          $sql = "SELECT i.id, i.s_id, s.name AS s_name, t.item_name, t.id AS item_id, i.total, i.qty, i.amount, i.discount_fee, i.due, i.created_at, i.updated_at, i.remarks FROM `income` i LEFT JOIN item t on i.item_id = t.id LEFT JOIN student_info s on i.s_id=s.id order by i.id desc LIMIT $start,$itemsPerPage";
        }

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData = $STH->fetchAll();
        return $arrSomeData;
    }
    public function indexPaginatorForExpense($page=1,$itemsPerPage=3)
    {
        $table = $this->tableName;

        $start = (($page - 1) * $itemsPerPage);

        if ($start < 0) $start = 0;

 if($_GET['search']) { 
          $searchKey =$_GET['search'];
          $sql = "SELECT i.id,i.s_id,s.name AS s_name,i.t_id,i.qty, r.name AS t_name,t.item_name,t.id AS item_id,i.total,i.amount,i.discount_fee,i.created_at,i.updated_at,i.remarks
                    FROM `expense` i
                     LEFT JOIN item t on t.id=i.item_id
                     LEFT JOIN student_info s on s.id=i.s_id
                     LEFT JOIN teacher_info r on r.id=i.t_id
                     where t.item_name like '%$searchKey%' or i.created_at like '%$searchKey%' or i.updated_at like '%$searchKey%' or i.s_id like '%$searchKey%'
                    or s.name like '%$searchKey%' or i.remarks like '%$searchKey%' or i.id like '%$searchKey%'
                    ORDER BY i.id DESC LIMIT $start,$itemsPerPage";
        }
      else  
      {
    $sql = "SELECT i.id,i.s_id,s.name AS s_name,i.t_id,i.qty, r.name AS t_name,t.item_name,t.id AS item_id,i.total,i.amount,i.discount_fee,i.created_at,i.updated_at,i.remarks
                    FROM `expense` i
                     LEFT JOIN item t on t.id=i.item_id
                     LEFT JOIN student_info s on s.id=i.s_id
                     LEFT JOIN teacher_info r on r.id=i.t_id
                    ORDER BY i.id DESC LIMIT $start,$itemsPerPage";
     }

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData = $STH->fetchAll();
        return $arrSomeData;
    }
    public function trash(){

        $sqlQuery = "UPDATE $this->pageTable SET is_trashed='Yes' WHERE id = $this->id;";

        $result = $this->DBH->exec($sqlQuery);

        if($result){
            Message::message("Success! data has been trashed!");
        }
        else{
            Message::message("Error! data has not been trashed.");

        }


    }// end of trash()

    public function trashed(){

        $sqlQuery = "Select * from $this->pageTable where is_trashed!='No'";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();
        return $allData;
    }

    public function recover(){
        $sqlQuery = "UPDATE $this->pageTable SET is_trashed='No' WHERE id = $this->id;";

        $result = $this->DBH->exec($sqlQuery);


        if($result){
            Message::message("Success! data has been recovered.");
        }
        else{
            Message::message("Error! data has not been recovered.");

        }
    }// end of recover()

    public function delete(){

        $sqlQuery = "DELETE from $this->pageTable WHERE id = $this->id;";

        $result = $this->DBH->exec($sqlQuery);


        if($result){
            Message::message("Success! data has been deleted.");
        }
        else{
            Message::message("Error! data has not been deleted.");

        }
        
    }// end of delete()
    
    public function promotion(){
        $sId = $this->sId;
        $cId = $this->cId;
        $yr = $this->yr;
        $preYr = $yr-1;
        $tId = $this->tId;
        $grpId = $this->grpId;
        $secId = $this->secId;
        //$sqlQuery = "INSERT INTO `student_promotion` (`id`, `created_at`, `updated_at`, `yr`, `amount`, `discount_fee`, `card_no`, `s_id`, `c_id`,`roll`, `grp_id`, `opt_subject`, `section_id`, `is_trashed`) VALUES (NULL, now(),now(), $yr, '0', '0', NULL, '$sId', '$cId', 'NULL', '$grpId', NULL, '$secId', 'No')";
        $sqlQuery= "INSERT INTO `student_promotion` (`id`, `created_at`, `updated_at`, `yr`, `amount`, `discount_fee`, `card_no`, `s_id`, `c_id`,`roll`, 
        `grp_id`, `opt_subject`, `section_id`, `is_trashed`) 
        VALUES (NULL, now(),now(), $yr, '0', '0', NULL, '$sId', '$cId', (select position from gpa where s_id='$sId' and yr = $preYr and term_id = $tId), '$grpId', NULL, '$secId', 'No')";
        $result = $this->DBH->exec($sqlQuery); 

        //echo $sqlQuery;
        if($result){
            Message::message("Success! data has been promoted.");
        }
        else{
            Message::message("Error! data has not been promoted.");

        }
    }// end of promotion()
    
    public function updateStatus(){
        $sqlQuery = "UPDATE $this->pageTable SET status = 1 WHERE id = $this->id";
        
        $result = $this->DBH->exec($sqlQuery);

        if($result){
            Message::message("Success! data has been updated.");
        }
        else{
            Message::message("Error! data has not been updated.");

        }
    }//end of updateStatus()

    public function deleteFile(){

        $getFile = "SELECT * FROM $this->pageTable WHERE id = $this->id";
        $STH2 = $this->DBH->query($getFile);
        $STH2->setFetchMode(PDO::FETCH_OBJ);
        $singleData = $STH2->fetch();
        $oldFile = $singleData->file_name;
        
        $unlinkfile = "../../../uploads/".$this->insPath."/".$this->pageTable."/" . $oldFile;
        
        if (file_exists($unlinkfile)) { unlink($unlinkfile); }

        $sqlQuery = "DELETE FROM $this->pageTable WHERE id='$this->id'";
        $result = $this->DBH->exec($sqlQuery);

        if($result){
            Message::message("Success! data has been deleted.");
        }
        else{
            Message::message("Error! data has not been deleted.");
        }

    }// end of deleteFile()
    
}