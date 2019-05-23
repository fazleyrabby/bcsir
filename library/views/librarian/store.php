<?php
require_once("../../vendor/autoload.php");
use App\Utility\Utility;
 $objData = new \App\book\book();
if(isset($_POST['storeInfo'])){
    $objData = new \App\librarianInfo\librarianInfo();
    $objData->setData($_POST); 
    $objData->store();
}
if(isset($_POST['storeBook'])){
    $objData->setData($_POST); 
    $objData->store();
}
if(isset($_POST['storeBookCategory'])){
    $objData->setData($_POST);
    $objData->storeBookCategory(); 
   
}
if(isset($_POST['storeBookSubCategory'])){
    $objData->setData($_POST);
    $objData->storeBookSubCategory();
}
if(isset($_POST['storeBookRequest'])){
    $objData->setData($_POST);
    $objData->storeRequest();
    $objData->storeInvoice();
}
$path = $_SERVER['HTTP_REFERER']; 
Utility::redirect($path);  