<?php
require_once("../../vendor/autoload.php");
use App\Utility\Utility;
if(isset($_POST['storeInfo'])){
    $objClass = new \App\cls\cls();
    $objClass->setData($_POST);
    $objClass->store();
}
Utility::redirect('index.php');
