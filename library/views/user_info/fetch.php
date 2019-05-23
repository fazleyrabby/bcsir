<?php
require_once("../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
$objFormSubmit = new App\Auth\Auth();
$objUser = new App\User\User();
$objTerm = new \App\crudWithoutImage\crudWithoutImage();
$objQuery = new \App\dataTableQuery\dataTableQuery();

$userName = $_SESSION['userId'];
$insPath = $_SESSION['insPath'];
//$userInfo = $objQuery->indexByQuerySingleData("SELECT * FROM `users` where username = '$userName'");
 $userInfo = $objQuery->indexByQuerySingleData("SELECT * FROM `v_users` where username = '$insPath$userName'");

$objQuery = new \App\dataTableQuery\dataTableQuery();
$_POST['dataQuery'] = "select u.*,l.name as level_name, '********' as password2, IF(status = 1, 'Active', 'Inactive') AS status2 from users u left join user_level l on l.id=u.level";
$_POST['condition'] = " where level not in ('1','2')";
$_POST['colArrayQ'] = 'name,username,password2,email,phone,level_name,status2,address';
$_POST['searchArrayQ'] = 'u.name';


$_POST['table'] = 'users'; //table name
$_POST['colArray'] = 'name,username,password,email,phone,level,status,address'; //column name
$_POST['searchArray'] = 'name,username,email,phone,level,status,address'; //search column 2nd

$objTerm->setData($_POST);

if(isset($_GET['postId'])){ 

    if($_POST['operation']=='Edit') {
                if(strlen($_POST['password'])=='32')  $_POST['password'] = $_POST['password'];
                else { 
                $_POST['password'] = md5($_POST['password']); 
                 }   
            }
            else { 
                $_POST['password'] = md5($_POST['password']); 
                
            }


    if($_GET['postId']=='insert'){

        $tokenSecurity = $objFormSubmit->formSubmitPermition();
        if($tokenSecurity==true){
        
            $objTerm->store();
        }
        else echo "Security Error!";
    }
   else if($_GET['postId']=='update'){

       $objTerm->update();
    }
    else if($_GET['postId']=='changePassword'){
        if($userInfo->password == md5($_POST['password_old']) && $_POST['password_new'] == $_POST['password_confirm']) {
        $_POST['password']= md5($_POST['password_confirm']);
        $objUser->changePassword();
        }
        else echo 'Information does not match'; 
    }
   else if($_GET['postId']=='allData'){
       $objQuery->setData($_POST); 
        $objQuery->outPutData();
    }
   else if($_GET['postId']=='delete'){
        $objTerm->delete();
    }
    else{

    }
}
