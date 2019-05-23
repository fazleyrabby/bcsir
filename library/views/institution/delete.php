<?php
require_once("../../vendor/autoload.php");
use App\Utility\Utility;
$obj  = new \App\institution\institution();
$obj->setData($_GET);
$obj->delete();
$path = $_SERVER['HTTP_REFERER'];
Utility::redirect($path);