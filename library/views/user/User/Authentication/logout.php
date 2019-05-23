<?php
if(!isset($_SESSION) )session_start();
require_once("../../../../vendor/autoload.php");
use App\Utility\Utility;
use App\User\User;
use App\Message\Message;
$auth= new App\Auth\Auth();
$status= $auth->log_out();
Message::message("<strong>Logout!</strong> You have been logged out successfully.");
return Utility::redirect('../../../index/index.php');