<?php
include '../connect/config.php';



if ($_POST['salary_head_add']) {
   $salary_head_add =  $_POST['salary_head_add'];
$option = '<option value="">Select</option>';
$salary_head = mysqli_query($conn,"SELECT account_head_id,account_head_name FROM account_head WHERE account_head_st = 1 AND account_head_group = 2 AND account_head_type = 1 AND account_head_id != $salary_head_add"); 
if ($salary_head == true) 
{ while ($salary_head_dt=mysqli_fetch_array($salary_head)) 
    {
         $account_head_id = $salary_head_dt["0"]; 
         $account_head_name = $salary_head_dt["1"]; 
         $option .= "<option value=$account_head_id>$account_head_name</option>"; 
        }
        echo  $option;
    }
}

?> 