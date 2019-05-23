<?php
require_once("../../vendor/autoload.php");
use App\Utility\Utility;
if(isset($_POST['storeInfo'])){
    $objData = new \App\teacherInfo\teacherInfo();
    $objData->setData($_POST);
    $objData->singleStore();
}
if(isset($_POST["submit"]))
{
    $file = $_FILES['file']['tmp_name'];
    $objData = new \App\teacherInfo\teacherInfo();
    $objData->setData($_POST,$file);
    $objData->store();
}
$path = $_SERVER['HTTP_REFERER'];
Utility::redirect($path);