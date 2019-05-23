
<?php
include '../connect/config.php';

if ($_POST['sample_id'])
{  
   $options = "<option value=''></option>";
//   $options .= "<option value='e'>sadf</option>";
//    echo $options;
//    die();
   $sample_id =  $_POST['sample_id'];
   
   $para_data = mysqli_query($conn,"SELECT distinct paramtr_id FROM assign_sam_pramtr where sam_id in ($sample_id)"); //1 = only active 
    if($para_data == true) 
    {   
        $dataArray = array();
        while($data = mysqli_fetch_array($para_data)){
            $para_id = $data['0'];
            // $all_para_id=implode(",",$para_id);
        
            $parameter_data = mysqli_query($conn,"SELECT distinct pra_id,pra_name,pra_price FROM prameter_tbl where pra_id in ($para_id)");
                        if($parameter_data == true) {
                          while($data = mysqli_fetch_array($parameter_data))
                          {     
                                $pramtr_id = $data['0'];
                                $pramtr_name = $data['1'];
                                $pra_price = $data['2'];
                                $options .= "<option value='".$pramtr_id."' >".$pramtr_name."-".$pra_price."TK </option>";
                                //$dataArray = [$options];
                          }
                           
                    }
                    
          
        } 
        echo $options;
        
        
    }


}

?> 