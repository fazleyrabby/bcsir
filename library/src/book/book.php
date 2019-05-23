<?php
namespace App\book;

use PDO;
use App\Message\Message;
use App\Model\Database;

class book extends Database{
    public $id;
    public $requestedBy; 
    public $bookId;
    public $invoiceId;
    public $brId; //Book Request ID
    public $sId;
    public $name; 
    public $description;
    public $authorId;
    public $aditionalAuthorId;
    public $series;
    public $callNo;
    public $publisherId;
    public $deskId;
    public $deskRow;
    public $bcId;//Book Category ID 
    public $subCatCode;
    public $catCode;
    public $bscId;
    public $bscIdAs;
    public $totalCopies;
    public $price;
    public $newCopies;
    public $issueStartDate;
    public $issueEndDate;
    public $status;
    public $unitPrice;
    public $qty;
    public $discount;
    public $paidAmount;

    public function setData($receieveDataArray){
        //here id further use for retrive data from database: 
        if(array_key_exists("id",$receieveDataArray)){
            $this->id = $receieveDataArray['id'];
        }
        if(array_key_exists("requestedBy",$receieveDataArray)){
            $this->requestedBy = $receieveDataArray['requestedBy'];
        }
        if(array_key_exists("bookId",$receieveDataArray)){
            $this->bookId = $receieveDataArray['bookId'];
        }
        if(array_key_exists("invoiceId",$receieveDataArray)){
            $this->invoiceId = $receieveDataArray['invoiceId'];
        }
        if(array_key_exists("brId",$receieveDataArray)){
            $this->brId = $receieveDataArray['brId'];
        }
        if(array_key_exists("sId",$receieveDataArray)){
            $this->sId = $receieveDataArray['sId'];
        }
        if(array_key_exists("name",$receieveDataArray)){
            $this->name = $receieveDataArray['name'];
        }
        if(array_key_exists("description",$receieveDataArray)){
            $this->description = $receieveDataArray['description'];
        }
        if(array_key_exists("authorId",$receieveDataArray)){
            $this->authorId = $receieveDataArray['authorId'];
        }
        if(array_key_exists("aditionalAuthorId",$receieveDataArray)){
            $this->aditionalAuthorId = $receieveDataArray['aditionalAuthorId'];
        }
        if(array_key_exists("series",$receieveDataArray)){ 
            $this->series = $receieveDataArray['series'];
        }
        if(array_key_exists("callNo",$receieveDataArray)){
            $this->callNo = $receieveDataArray['callNo'];
        }
        if(array_key_exists("publisherId",$receieveDataArray)){
            $this->publisherId = $receieveDataArray['publisherId'];
        }
        if(array_key_exists("deskId",$receieveDataArray)){
            $this->deskId = $receieveDataArray['deskId'];
        }
        if(array_key_exists("deskRow",$receieveDataArray)){
            $this->deskRow = $receieveDataArray['deskRow'];
        }
        if(array_key_exists("bcId",$receieveDataArray)){
            $this->bcId = $receieveDataArray['bcId'];
        }
        if(array_key_exists("catCode",$receieveDataArray)){
            $this->catCode = $receieveDataArray['catCode'];
        }
         if(array_key_exists("subCatCode",$receieveDataArray)){
            $this->subCatCode = $receieveDataArray['subCatCode'];
        }
        if(array_key_exists("bscId",$receieveDataArray)){
            $this->bscId = $receieveDataArray['bscId'];
        }
         if(array_key_exists("bscIdAs",$receieveDataArray)){ 
            $this->bscIdAs = $receieveDataArray['bscIdAs'];
        }
        if(array_key_exists("price",$receieveDataArray)){
            $this->price = $receieveDataArray['price'];
        }
        if(array_key_exists("newCopies",$receieveDataArray)){
            $this->newCopies = $receieveDataArray['newCopies'];
        }
        if(array_key_exists("totalCopies",$receieveDataArray)){
            $this->totalCopies = $receieveDataArray['totalCopies'];
        }
        if(array_key_exists("unitPrice",$receieveDataArray)){
            $this->unitPrice = $receieveDataArray['unitPrice'];
        }
        if(array_key_exists("discount",$receieveDataArray)){
            $this->discount = $receieveDataArray['discount'];
        }
        if(array_key_exists("totalSummery",$receieveDataArray)){
            $this->totalSummery = $receieveDataArray['totalSummery'];
        }
        if(array_key_exists("qty",$receieveDataArray)){
            $this->qty = $receieveDataArray['qty'];
        }
        if(array_key_exists("paidAmount",$receieveDataArray)){
            $this->paidAmount = $receieveDataArray['paidAmount'];
        }
        if(array_key_exists("paidableAmount",$receieveDataArray)){
            $this->paidableAmount = $receieveDataArray['paidableAmount'];
        }
        if(array_key_exists("payType",$receieveDataArray)){
            $this->payType = $receieveDataArray['payType'];
        }
        if(array_key_exists("payTypeSummery",$receieveDataArray)){
            $this->payTypeSummery = $receieveDataArray['payTypeSummery'];
        }
        if(array_key_exists("issueStartDate",$receieveDataArray)){
            $this->issueStartDate = $receieveDataArray['issueStartDate'];
        }
        if(array_key_exists("issueEndDate",$receieveDataArray)){
            $this->issueEndDate = $receieveDataArray['issueEndDate'];
        }
        if(array_key_exists("status",$receieveDataArray)){
            $this->status = $receieveDataArray['status'];
        }
    }

    public function store(){
        $name = $this->name;
        $description = $this->description;
        $authorId = $this->authorId;
        $publisherId = $this->publisherId;
        $deskId = $this->deskId;
        $deskRow = $this->deskRow;
        $bcId = $this->bcId;
        $bscId = $this->bscId;
        $bscIdAs = $this->bscIdAs;
        $aditionalAuthorId = $this->aditionalAuthorId;
        $series = $this->series; 
        $callNo =  $this->callNo;
        
        $price = $this->price;
        $totalCopies = $this->totalCopies;

        $sqlQuery = "INSERT INTO book (name, description, author_id, publisher_id, desk_id, desk_row, bc_id, bc_sub_id, bc_sub_id_as, price, total_copies, series, aditional_author_id, call_no, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, Now())";
        $dataArray = array($name, $description, $authorId, $publisherId, $deskId, $deskRow, $bcId, $bscId, $bscIdAs, $price, $totalCopies, $series, $aditionalAuthorId, $callNo);
        
      //  echo $callNo; 
      //  var_dump($dataArray); 
       // die();
        $STH = $this->DBH->prepare($sqlQuery); //for data insert into database we have to use prepare//
        $result = $STH->execute($dataArray);

        if($result){
           // Message::message("Success! data has been inserted."); 
       echo  "Success! data has been inserted.";   
        }
        else{
          //  Message::message("Error! data has not been inserted.");
           echo  "Error! data has not been inserted.";
        }
    }//end of store()

    public function storeBookRequest(){
        $bookId = $this->bookId;
        
        if(!isset($_SESSION)) session_start();
        $userId=$_SESSION['userId'];
        
        $issueStartDate = $this->issueStartDate;
        $issueEndDate = $this->issueEndDate;
        $paidAmount = $this->paidAmount;

        $sqlQuery = "INSERT INTO book_request (`book_id`, `requested_by`, `issue_start_date`, `issue_end_date`) VALUES (?, ?, ?, ?)";
        $dataArray = array($bookId, $userId, $issueStartDate, $issueEndDate);

        $STH = $this->DBH->prepare($sqlQuery); //for data insert into database we have to use prepare//
        $result = $STH->execute($dataArray);

        if($result){
            Message::message("Success! data has been inserted.");
        }
        else{
            Message::message("Error! data has not been inserted.");
        }
    }//end of storeBookRequest()



Public function storeRequest()
    {
        $number = count($_POST["bookId"]);
        if ($number > 0) {
            for ($i = 0; $i < $number; $i++) {
                if (trim($_POST["bookId"][$i] != '')) {

        $requestedBy =  $_POST['requestedBy'];
        $bookId = $_POST['bookId'][$i];
        $issueStartDate = $_POST['issueStartDate'];
        $issueEndDate = $_POST['issueEndDate'];
        $unitPrice = $_POST['unitPrice'][$i];
        $qty = $_POST['qty'][$i];
        $discount = $_POST['discount'];
        $paidAmount = $_POST['paidAmount'][$i];
        $payType = $_POST['payType'][$i];
        $status = $_POST['status'];
        
        $sqlQuery = "INSERT INTO book_request (`book_id`, `requested_by`, `issue_start_date`, `issue_end_date`, `request_type`, `qty`, `unit_price`, `discount`, `paid_amount`, `status`, `invoice_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
        $dataArray = array($bookId, $requestedBy, $issueStartDate, $issueEndDate, $payType, $qty,  $unitPrice, $discount, $paidAmount, $status,$this->invoiceId);

        $STH = $this->DBH->prepare($sqlQuery); //for data insert into database we have to use prepare// 
        $result = $STH->execute($dataArray);
          }
            }
            
        } else {
           Message::message("Error! data has not been inserted.");
        }
    }
    Public function storeInvoice()
        { 
            $sqlQuery = "INSERT INTO `invoice_summery` (`invoice_id`, `total`, `discount`, `paid`, `pay_type`) VALUES (?, ?, ?, ?, ?)";
                        $dataArray = array($this->invoiceId,  $this->totalSummery, $this->discount, $this->paidableAmount, $this->payTypeSummery);
                        $STH = $this->DBH->prepare($sqlQuery); //for data insert into database we have to use prepare// 
                        $result = $STH->execute($dataArray);
                        
                        if($result) Message::message("Success! data has been inserted.");
                        else Message::message("Error! data has not been inserted.");
        }
        
    public function storeBookCategoryLibrarian(){
        $requestedBy = $this->requestedBy;  
        $bookId = $this->bookId;
        $issueStartDate = $this->issueStartDate;  
        $issueEndDate = $this->issueEndDate;
        $unitPrice = $this->unitPrice;
        $qty = $this->qty;
        $discount = $this->discount;
        $paidAmount = $this->paidAmount;
        $payType = $this->payType;
        $status = $this->status;
        
        $sqlQuery = "INSERT INTO book_request (`book_id`, `requested_by`, `issue_start_date`, `issue_end_date`, `request_type`, `qty`, `unit_price`, `discount`, `paid_amount`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $dataArray = array($bookId, $requestedBy, $issueStartDate, $issueEndDate, $payType, $qty,  $unitPrice, $discount, $paidAmount, $status);

        $STH = $this->DBH->prepare($sqlQuery); //for data insert into database we have to use prepare// 
        $result = $STH->execute($dataArray);

        if($result){
           Message::message("Success! data has been recorded.");
        }
        else{
           Message::message("Error! data has not been recorded.");
        }
    }//end of storeBookCategoryLibrarian()

    public function storeBookCategory(){ 
        $name = $this->name;
        $catCode = $this->catCode;
        $sqlQuery = "INSERT INTO `book_category` (`id`, `name`,`code`)
                    SELECT MAX(`id`)+1, ?, ? FROM `book_category`";
        $dataArray = array($name, $catCode);

        $STH = $this->DBH->prepare($sqlQuery); //for data insert into database we have to use prepare//
        $result = $STH->execute($dataArray);

        if($result){
            Message::message("Success! data has been inserted.");
        }
        else{
            Message::message("Error! data has not been inserted.");
        }
    }//end of storeBookSubCategory() 
     public function storeBookSubCategory(){
        $name = $this->name;
        $subCatCode = $this->subCatCode;
         $bscId = $this->bscId;

        $sqlQuery = "INSERT INTO `book_sub_category` (`id`, `name`, `code`)
                    SELECT MAX(`id`)+1, ?, ? FROM `book_sub_category`";
        $dataArray = array($name,$subCatCode);

        $STH = $this->DBH->prepare($sqlQuery); //for data insert into database we have to use prepare//
        $result = $STH->execute($dataArray);

        if($result){
            Message::message("Success! data has been inserted.");
        }
        else{
            Message::message("Error! data has not been inserted.");
        }
    }//end of storeBookCategory()
    public function index(){
/*        $sqlQuery = "SELECT CONCAT(bc.code,'.',bsc.code,'.',a.code) AS book_code,b.*,a.name AS author_name,c.c_name,bc.name AS bc_name,p.name AS publisher_name,d.name AS desk_name FROM book b
                    LEFT JOIN author a ON a.id=b.author_id
                    LEFT JOIN book_category bc ON bc.id=b.bc_id
                    LEFT JOIN book_sub_category bsc ON bsc.id=b.bc_sub_id
                    LEFT JOIN class c ON c.c_id=b.c_id
                    LEFT JOIN publisher p ON p.id=b.publisher_id
                    LEFT JOIN desk d ON d.id=b.desk_id
                    WHERE b.is_trashed = 'No' ORDER BY b.id DESC";*/
        $sqlQuery = "SELECT t.* FROM
(
SELECT CONCAT(bc.code,'.',bsc.code,'.',a.code) AS book_code,b.*,a.name AS author_name,c.c_name,bc.name AS bc_name,p.name AS publisher_name,d.name AS desk_name,
SUM(b.total_copies) AS total_copies_desk, SUM(b.issued_copies) AS issued_copies_desk  FROM book b
                    LEFT JOIN author a ON a.id=b.author_id
                    LEFT JOIN book_category bc ON bc.id=b.bc_id
                    LEFT JOIN book_sub_category bsc ON bsc.id=b.bc_sub_id
                    LEFT JOIN class c ON c.c_id=b.c_id
                    LEFT JOIN publisher p ON p.id=b.publisher_id
                    LEFT JOIN desk d ON d.id=b.desk_id
                    WHERE b.is_trashed = 'No' group by b.name, b.author_id, b.desk_id, b.desk_row  ORDER BY b.id DESC
					) t";
        $STH = $this->DBH->query($sqlQuery);
 
        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of index()

    public function indexBookRequest(){
        $sqlQuery = "SELECT r.*,s.name,s.level,b.name AS book_name FROM book_request r
                     LEFT JOIN v_users s ON s.user_id=r.requested_by
                     LEFT JOIN book b ON b.id=r.book_id
                     ORDER BY r.id DESC";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of index()

    public function indexBookCategory(){
        $sqlQuery = "SELECT * FROM `book_category` ORDER BY `name`";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of indexBookCategory()
    
       public function indexAassistantCategory(){
        $sqlQuery = "SELECT * FROM `book_sub_category_assis` ORDER BY `name`";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of indexAassistantCategory()
    
     public function indexBookSubCategory(){
        $sqlQuery = "SELECT * FROM `book_sub_category` ORDER BY `name`";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of indexBookCategory()
    
    public function view(){
        $sqlQuery = "select * from book where id = $this->id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();

        return $singleData;
    }//end of view() 

    public function viewLibrarianDashboard(){
        $sqlQuery = "SELECT SUM(b.total_books) AS total_books, sum(b.pending_request) AS pending_request, SUM(b.total_copies) AS total_copies, SUM(b.issued_copies) AS issued_copies FROM(
                    SELECT COUNT(*) AS total_books,0 AS pending_request, 0 AS total_copies, 0 AS issued_copies FROM `book`
                    UNION ALL
                    SELECT 0 AS total_books, 0 AS pending_request, SUM(total_copies) AS total_copies,SUM(issued_copies) AS issued_copies FROM `book`
                    UNION ALL
                    SELECT 0 AS total_books, COUNT(*) AS pending_request, 0 AS total_copies, 0 AS issued_copies FROM `book_request` WHERE status=0
                        ) b";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();

        return $singleData;
    }//end of viewLibrarianDashboard()

    public function viewStudentIssueBook(){
        if(!isset($_SESSION)) session_start();
        $userId=$_SESSION['userId'];
        $sqlQuery = "SELECT * FROM `book_request` WHERE requested_by=$userId AND status=1";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of viewStudentIssueBook()

    public function viewStudentPendingBook(){
        if(!isset($_SESSION)) session_start();
        $userId=$_SESSION['userId'];
        $sqlQuery = "SELECT * FROM `book_request` WHERE requested_by=$userId AND status=0";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of viewStudentPendingBook()

    public function viewBookCategory(){
        $sqlQuery = "SELECT * FROM `book_category` WHERE `id` = $this->id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();

        return $singleData;
    }//end of viewBookCategory()
        public function viewBookSubCategory(){
        $sqlQuery = "SELECT * FROM `book_sub_category` WHERE `id` = $this->id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();

        return $singleData;
    }//end of viewBookCategory()

    public function viewBookRequest(){
        $sqlQuery = "SELECT * FROM `book_request` WHERE `id` = $this->id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();

        return $singleData;
    }//end of viewBookRequest()

    public function update(){
        $name = $this->name;
        $description = $this->description;
        $authorId = $this->authorId;
        $publisherId = $this->publisherId;
        $deskId = $this->deskId;
        $deskRow = $this->deskRow;
        $bcId = $this->bcId;
        $price = $this->price;
        $newCopies = $this->newCopies;
        if ($name=='') {
            Message::message("Field Must Not Be Empty");
        }else{
            $sqlQuery = "UPDATE book SET name = ?, description = ?, author_id = ?, publisher_id = ?, desk_id = ?, desk_row = ?, bc_id = ?, price = ?, total_copies = total_copies + ?, updated_at = CusNow()  WHERE id = $this->id";
            $dataArray = array($name, $description, $authorId, $publisherId, $deskId, $deskRow, $bcId, $price, $newCopies);

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

    public function updateBookCategory(){
        
        $sqlQuery = "UPDATE book_category SET name = ?, code=? WHERE id = $this->id";
        $dataArray = array($this->name,$this->catCode);

        $STH = $this->DBH->prepare($sqlQuery);

        $result = $STH->execute($dataArray);

        if($result){
            Message::message("Success! data has been updated.");
        }
        else{
            Message::message("Error! data has not been updated.");
        }
    }// end of updateBookCategory()
     public function updateBookSubCategory(){  
         
        $sqlQuery = "UPDATE book_sub_category SET name = ?, code=? WHERE id = $this->id";
        $dataArray = array($this->name,$this->subCatcode);

        $STH = $this->DBH->prepare($sqlQuery);

        $result = $STH->execute($dataArray);

        if($result){ 
            Message::message("Success! data has been updated.");
        }
        else{
            Message::message("Error! data has not been updated.");
        }
    }// end of updateBookCategory()

    public function updateBookRequest(){
        $status = $this->status;
        $sqlQuery = "UPDATE book_request SET status = ? WHERE id = $this->brId";
        $dataArray = array($status);

        $STH = $this->DBH->prepare($sqlQuery);

        $result = $STH->execute($dataArray);

        if($result){
            Message::message("Success! data has been updated.");
        }
        else{
            Message::message("Error! data has not been updated.");
        }
    }// end of updateBookRequest()

}//end of book class