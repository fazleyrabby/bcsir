<?php
$path = $_SERVER['HTTP_REFERER'];
require_once ("../../vendor/autoload.php");
use App\Utility\Utility;
$obj = new \App\tdrp\tdrp();
$obj->setData($_GET);
$obj->deleteFile();
Utility::redirect($path);