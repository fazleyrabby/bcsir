<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../vendor/autoload.php');
use App\Utility\Utility;
use App\User\User;
use App\Message\Message;
$_SESSION['userCheck'] = $_POST['email'];
$auth = new App\Auth\Auth(); 
// var_dump($_POST);
// exit(); 
$status = $auth->setData($_POST)->is_registered();
if($status){
    $_SESSION['email'] = $_POST['email'];
    Message::message("Welcome! You have successfully logged in.");
    // Utility::redirect('../../../index/index.php');
}else{
   // echo "<script> location.replace('./dashboard.php'); </script>";
    Message::message("Wrong information! Please try again.");
    Utility::redirect('../../../index/index.php');
   // Utility::redirect('../Profile/signup.php');
} 