<?php
require_once ("../../vendor/autoload.php");
use App\Utility\Utility;
$obj = new \App\tdrp\tdrp();
$IDs =   $_POST['multiple'];


   $_SESSION['cId'] = $_POST['cId'];
   $_SESSION['secId'] = $_POST['secId'];
   $_SESSION['grpId'] = $_POST['grpId'];
   $_SESSION['yr'] = $_POST['yr'];
   $_SESSION['tId'] = $_POST['tId'];
   
foreach($IDs as $id){

   
   $_SESSION['sId'] = $id;
    $obj->setData($_SESSION);
    $obj->promotion(); 
   // var_dump($_SESSION);
}

$path = $_SERVER['HTTP_REFERER'];
Utility::redirect($path);