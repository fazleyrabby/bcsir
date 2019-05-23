<?php
require_once("../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
use App\Utility\Utility;
//Activation Check
$objSingleDataQuery = new \App\dataTableQuery\dataTableQuery();
$activationValidDate = $objSingleDataQuery->indexByQuerySingleData("SELECT * FROM `app_activation` order by id DESC limit 1"); 
    $endDate = date_format(date_create("$activationValidDate->end_date"),'Y-m-d');
    $showEndDate = date_format(date_create("$activationValidDate->end_date"),'d-M-Y');
    $currentDate=date("Y-m-d");
    if($endDate<=$currentDate){ 
        session_destroy();
        session_start();
        $_SESSION['loginMsg'] = "Your App Activation Expired on $activationValidDate->end_date";
        header ("location: index.php"); 
   die();
}
//If not Logged In
$auth= new App\Auth\Auth();
$status = $auth->setData($_SESSION)->logged_in();
$username = $_SESSION['userCheck'];

if($_SESSION['level']==1)include 'dashboard_developer.php';
elseif($_SESSION['level']==2)include 'dashboard_superadmin.php';
elseif($_SESSION['level']==8) include 'dashboard_librarian.php';
else { 
    session_destroy(); 
    $_SESSION['loginMsg']="Username Or Password is Wrong";
    header ('location: index.php');
}
//else include 'dashboard_error.php';
?>