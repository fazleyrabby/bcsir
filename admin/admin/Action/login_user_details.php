<?php
include '../../connect/config.php'; 
if(isset($_GET['user_active']))
{  
    $id=$_GET['id'];
    $active_st = $_GET['user_active'];
    if ($active_st == 'user_active') {  //1 to active
       $status = 1;
    }
    elseif ($active_st == 'user_deactive') {   //0 to deactive
       $status = 0;
    }
  
    $dlt=mysqli_query($conn,"UPDATE ratul_login set active_status=$status where id=$id");		

     if($dlt == true) {
        echo"<script> location.replace('../login_user_details.php?success=success');</script>";    
     }
}

?>