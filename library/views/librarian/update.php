<?php
require_once("../../vendor/autoload.php");
use App\Utility\Utility;
if(isset($_POST['storeInfo'])) {
    $objData = new \App\librarianInfo\librarianInfo();
    $objData->setData($_POST);
    $objData->update();
}
if(isset($_POST['storeBookRequest'])) {
    $objData = new \App\book\book();
    $objData->setData($_POST);
    $objData->updateBookRequest();
}
if(isset($_POST['updateBookCategory'])) {
    $objData = new \App\book\book();
    $objData->setData($_POST);
    $objData->updateBookCategory();
}
if(isset($_POST['updateBookSubCategory'])) {
    $objData = new \App\book\book();
    $objData->setData($_POST);
    $objData->updateBookSubCategory();
}
if(isset($_POST['updateBook'])) {
    $objData = new \App\book\book();
    $objData->setData($_POST);
    $objData->update();
}
$path = $_SERVER['HTTP_REFERER'];
Utility::redirect($path);