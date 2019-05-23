<?php 
include '../../connect/config.php'; 

if (isset($_POST['add_department']))  //Adding New department
{   
	//$department_id = $_POST['department_id'];
	$department_name = $_POST['department'];
	$serial = $_POST['serial'];
		$type = $_POST['type']; 
		$add_new_department=mysqli_query($conn,"INSERT into all_department (`department_name`,`department_st`,`created_at`,`updated_at`,`serial`,`type`) values ('$department_name',1,now(),now(),'$serial','$type')"); //1 to show data
		if($add_new_department==true)
			{
                echo "<script>location.replace('../department.php?success=success&department=department_list');</script>";
			}
		else 
			{
                echo "<script>location.replace('../department.php?success=error&department=department_list');</script>"; 
			}
	

}
if (isset($_POST['update_department'])) {  //Update department
		$department_name = $_POST['department'];
		//$serial_number = $_POST['serial_number'];
		$usernamee = $_POST['username'];
		$department_id = $_POST['department_id'];
		$serial = $_POST['serial'];
		$type = $_POST['type'];

		$update_notice=mysqli_query($conn,"UPDATE all_department SET department_name = '$department_name',serial='$serial',type='$type' WHERE id = '$department_id'");
		 if($update_notice==true)
		 {
            echo "<script>location.replace('../department.php?success=update_success&department=department_list');</script>";
            
		 }
			else {
            echo "<script>location.replace('../department.php?success=update_error&department=department_list');</script>";
         
			}
		}

if (isset($_GET['department_delete'])) { //Deleting\\Updating department
 	 
    $department_id = $_GET['department_id'];
    $delete_department=mysqli_query($conn,"UPDATE all_department SET department_st = 0 WHERE id = $department_id");
	  
    if($delete_department==true)
    {
        echo "<script>location.replace('../department.php?success=deleted&department=department_list');</script>";
       
    }
    else 
    {
        echo "<script>location.replace('../department.php?success=error&department=department_list');</script>";
        
    }
    }


?>