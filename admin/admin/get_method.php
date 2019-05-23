<?php
include '../connect/config.php';

if ($_POST['parameter_id'])
{  
   $options = "<option value=''></option>";
//   $options .= "<option value='e'>sadf</option>";
//    echo $options;
//    die();
   $parameter_id =  $_POST['parameter_id'];
   $all_para_id = implode(",",$parameter_id);
   
   $method_data = mysqli_query($conn,"SELECT DISTINCT mt.methd_id,mt.methd_pramtrid,mt.method_name,pt.pra_id,pt.pra_price FROM method_tbl as mt join prameter_tbl pt on mt.methd_pramtrid=pt.pra_id WHERE mt.methd_pramtrid IN ($all_para_id) and mt.method_st = 0"); //1 = only active 
   $dataArray = array();
    if($method_data == true) 
    {
        while($data = mysqli_fetch_array($method_data))
        {
            $method_id = $data['0'];
            $methd_pramtrid = $data['1'];
            $method_name = $data['2'];
            $price = $data['4'];
            $options .= "<option value='".$method_id."'>".$method_name."</option>";

            $dataArray = [$options,$price];
    
        } 
         echo json_encode($dataArray);
         
    }

}




?> 