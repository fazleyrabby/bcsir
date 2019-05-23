<?php
include '../connect/config.php';

if ($_POST['salary_head_type'])
{ 
   $salary_head_type =  $_POST['salary_head_type'];
   $option = "<option value=''></option>";
   $employee_name = mysqli_query($conn,"SELECT account_head_id,account_head_name FROM account_head WHERE account_head_st = 1 and account_head_type = $salary_head_type and account_head_group = 2");
    if($employee_name == true) 
    {
        while($data = mysqli_fetch_array($employee_name))
        {
            $account_head_id = $data['0'];
            $account_head_name = $data['1'];
   
            $option .= "<option value='$account_head_id'>$account_head_name</option>";
        } 
        echo $option;      
    }

}



?> 