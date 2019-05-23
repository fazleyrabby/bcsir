<?php
require_once("../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
$objFormSubmit = new App\Auth\Auth();

$objTerm = new \App\crudWithoutImage\crudWithoutImage();
$_POST['table'] = 'publisher'; //table name
$_POST['colArray'] = 'name'; //column name
$_POST['searchArray'] = 'name'; //search column 2nd

$objTerm->setData($_POST);

if(isset($_GET['postId'])){

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
   else if($_GET['postId']=='allData'){
        $objTerm->outPutData();
    }
   else if($_GET['postId']=='delete'){
        $objTerm->delete(); 
    }
    else{
 
    }
}
