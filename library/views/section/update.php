<?php
require_once("../../vendor/autoload.php");
use App\Utility\Utility;
$obj  = new \App\section\section();
$obj->setData($_POST);
$obj->update();
Utility::redirect('index.php');