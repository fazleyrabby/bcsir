<?php
require_once("../../vendor/autoload.php");
use App\Utility\Utility;
if(isset($_POST['storeInfo'])){
    $objClass = new \App\institution\institution();
    $objClass->setData($_POST);
    $objClass->store();
    $objClass->createDirectory();
    //$objClass->import_tables();
}
Utility::redirect('index_dev.php');
