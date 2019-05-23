<?php
require_once("../../vendor/autoload.php");
use App\Utility\Utility;
if(isset($_POST['storeInfo'])){
    $objActive = new \App\activation\activation();
    $objActive->setData($_POST);
    $objActive->store();
    //var_dump($_POST);
}

Utility::redirect('index.php');