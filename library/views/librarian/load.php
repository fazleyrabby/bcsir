<?php
require_once("../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
$objAllDataQuery = new \App\dataTableQuery\dataTableQuery();
$pageType=$_GET['pageType'];

if($pageType=='bookSell'){
$itemId = $_GET['itemId'];
$userInfo = $objAllDataQuery->indexByQuerySingleData("SELECT price FROM `book` where id = '$itemId'");
echo $userInfo->price;
}
 
if($pageType=='bookReturn'){
$userId=$_GET['requestedByReturn'];
$allBookRequestData = $objAllDataQuery->indexByQueryAllData("SELECT * FROM `v_book_request` where requested_by = $userId");
echo'<select name="bookId" id="bookIdReturn" class="form-control" data-placeholder="Select a Book" tabindex="-1" required>';
        foreach ($allBookRequestData as $record){
echo "<option value='$record->book_id'>$record->book_name</option>";
        }
echo '</select>';
} 

if($pageType=='returnType'){
$bookIdReturn=$_GET['bookIdReturn'];
$allBookRequestData = $objAllDataQuery->indexByQueryAllData("SELECT * FROM `v_book_request` where id = $bookIdReturn");
echo'<select name="bookId" id="bookIdReturn" class="form-control" data-placeholder="Select a Book" tabindex="-1" required>';
        foreach ($allBookRequestData as $record){
echo "<option value='$record->book_id'>$record->book_name</option>";
        }
echo '</select>';
} 

/*if($pageType=='bookReturnPrice'){
$userId=$_GET['requestedByReturn'];
$bookReturnData = $objAllDataQuery->indexByQuerySingleData("SELECT * FROM `v_book_request` where requested_by = $userId");
echo $bookReturnData->price;
} */