<?php
require_once ("../../vendor/autoload.php");
use App\Utility\Utility;
$obj = new \App\teacherInfo\teacherInfo();
$obj->setData($_GET);
$obj->delete();
$path = $_SERVER['HTTP_REFERER'];
Utility::redirect($path);