<?php
require_once("../../vendor/autoload.php");
use App\Utility\Utility;
$obj  = new \App\institution\institution();
$obj->setData($_POST);
//var_dump($_POST);
$obj->update();
$path = $_SERVER['HTTP_REFERER'];
Utility::redirect($path);