<?php
require_once("../../vendor/autoload.php");
use App\Utility\Utility;
$obj  = new \App\group\group();
$obj->setData($_POST);
$obj->update();
$path = $_SERVER['HTTP_REFERER'];
Utility::redirect($path);