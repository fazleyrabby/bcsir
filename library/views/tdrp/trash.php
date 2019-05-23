<?php
require_once ("../../vendor/autoload.php");
use App\Utility\Utility;

$obj = new \App\tdrp\tdrp();

$obj->setData($_GET);

$obj->trash();

$path = $_SERVER['HTTP_REFERER'];
Utility::redirect($path);