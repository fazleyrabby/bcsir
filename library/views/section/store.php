<?php
require_once("../../vendor/autoload.php");

use App\Utility\Utility;

if(isset($_POST['storeInfo'])){
    $objTerm = new \App\section\section();
    $objTerm->setData($_POST);
    $objTerm->store();
}

Utility::redirect('index.php');
