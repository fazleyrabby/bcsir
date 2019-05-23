<?php
require_once("../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
$objFormSubmit = new App\Auth\Auth();

$objTerm = new \App\crudWithoutImage\crudWithoutImage();
if(isset($_GET['page'])){
    if($_GET['page']=='s_cat'){
    $_POST['table'] = 'book_sub_category';  
    }
    if($_GET['page']=='s_cat_assis'){
    $_POST['table'] = 'book_sub_category_assis'; 
    }
}
else $_POST['table'] = 'book_category'; //table name
$_POST['colArray'] = 'name,code'; //column name
$_POST['searchArray'] = 'name,code'; //search column 2nd

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