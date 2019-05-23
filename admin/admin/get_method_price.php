<?php
include '../connect/config.php';

if ($_POST['method_price_id'])
{  
    $all_method = 0;
   //$options = "<option value=''></option>";
//   $options .= "<option value='e'>sadf</option>";
//    echo $options;
//    die();
   $method_price_id =  $_POST['method_price_id'];
   $all_method_price = implode(",",$method_price_id);

   $method_data = mysqli_query($conn,"SELECT pra_price FROM prameter_tbl WHERE pra_id IN ($all_method_price)"); //1 = only active 
    if($method_data == true) 
    {
        while($data = mysqli_fetch_array($method_data)){
            $method_price = $data['0'];
            // $methd_pramtrid = $data['1'];
            // $method_name = $data['2'];
            // $method_price = $data['3'];
            $all_method += $method_price;
        
        } 
        echo $all_method;
         
    }

}


?> 