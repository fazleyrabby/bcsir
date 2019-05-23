<?php
require_once ("../../vendor/autoload.php");
use App\Utility\Utility;

$obj = new \App\tdrp\tdrp();

$obj->setData($_GET);
$obj->getTable('customer_birthdate');
$obj->recover();

//$page=$_GET['page'];
//Utility::redirect("../$page/index.php");
$path = $_SERVER['HTTP_REFERER'];
Utility::redirect($path);