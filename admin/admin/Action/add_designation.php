<?php 
include '../../connect/config.php'; 

if (isset($_POST['add_designation']))  //Adding New Designation
{   
	//$designation_id = $_POST['designation_id'];
    $designation_name = $_POST['designation'];


		$add_new_designation=mysqli_query($conn,"INSERT into all_designation (`designation_name`,`designation_st`,`created_at`,`updated_at`) values ('$designation_name',1,now(),now())"); //1 to show data
		if($add_new_designation==true)
			{
                echo "<script>location.replace('../designation.php?success=success&designation=designation_list');</script>";
           
			}
		else 
			{
                echo "<script>location.replace('../designation.php?success=error&designation=designation_list');</script>";
            
                
			}
	

}
if (isset($_POST['update_designation'])) {  //Update Designation
		$designation_name = $_POST['designation'];
		//$serial_number = $_POST['serial_number'];
		$usernamee = $_POST['username'];
		$designation_id = $_POST['designation_id'];
		$update_notice=mysqli_query($conn,"UPDATE all_designation SET designation_name = '$designation_name' WHERE id = '$designation_id'");
		 if($update_notice==true)
		 {
            echo "<script>location.replace('../designation.php?success=update_success&designation=designation_list');</script>";
            
		 }
			else {
            echo "<script>location.replace('../designation.php?success=update_error&designation=designation_list');</script>";
         
			}
		}

if (isset($_GET['designation_delete'])) { //Deleting\\Updating Designation
 	 
    $designation_id = $_GET['designation_id'];
    $delete_designation=mysqli_query($conn,"UPDATE all_designation SET designation_st = 0 WHERE id = $designation_id");
	  
    if($delete_designation==true)
    {
        echo "<script>location.replace('../designation.php?success=deleted&designation=designation_list');</script>";
       
    }
    else 
    {
        echo "<script>location.replace('../designation.php?success=error&designation=designation_list');</script>";
        
    }
    }


?>