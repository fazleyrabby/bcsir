<?php
require_once("../../vendor/autoload.php");
use App\Utility\Utility;
if(isset($_POST['storeInfo'])){
    $objData = new \App\publisher\publisher();
    $objData->setData($_POST);
    $objData->store();
}
$path = $_SERVER['HTTP_REFERER'];
Utility::redirect($path);