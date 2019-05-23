<?php
require_once("../../vendor/autoload.php");

use App\Utility\Utility;

if(isset($_POST['storeInfo'])){
    $objTerm = new \App\book\book();
    $objTerm->setData($_POST);
    $objTerm->store();
}

$path = $_SERVER['HTTP_REFERER'];
Utility::redirect($path);
