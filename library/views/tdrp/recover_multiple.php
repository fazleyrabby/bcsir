<?php
require_once ("../../vendor/autoload.php");
use App\Utility\Utility;
$obj = new \App\tdrp\tdrp();


$IDs =   $_POST['multiple'];


foreach($IDs as $id){

    $_GET['id'] = $id;
    $obj->setData($_GET);
    $obj->recover();
}

//$page=$_GET['page'];
//Utility::redirect("../$page/index.php");
$path = $_SERVER['HTTP_REFERER'];
Utility::redirect($path);