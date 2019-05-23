<?php 
include '../../connect/config.php'; 

if (isset($_POST['add_employee_grade']))  //Adding New employee_grade
{   
	//$employee_grade_id = $_POST['employee_grade_id'];
    $employee_grade_name = $_POST['employee_grade'];


		$add_new_employee_grade=mysqli_query($conn,"INSERT into all_employee_grade (`grade_name`,`grade_st`,`created_at`,`updated_at`) values ('$employee_grade_name',1,now(),now())");

		

		
		if($add_new_employee_grade==true)
			{
                echo "<script>location.replace('../add_employee_grade.php?success=success&employee_grade=employee_grade_list');</script>";
           
			}
		else 
			{
                echo "<script>location.replace('../add_employee_grade.php?success=error&employee_grade=employee_grade_list');</script>";
            
                
			}
	

}
if (isset($_POST['update_employee_grade'])) {  //Update employee_grade
		$employee_grade_name = $_POST['employee_grade'];
		//$serial_number = $_POST['serial_number'];
		$usernamee = $_POST['username'];
        $employee_grade_id = $_POST['id'];
        
		$update_notice=mysqli_query($conn,"UPDATE all_employee_grade SET grade_name = '$employee_grade_name' WHERE id = '$employee_grade_id'");
		 if($update_notice==true)
		 {
            echo "<script>location.replace('../add_employee_grade.php?success=update_success&employee_grade=employee_grade_list');</script>";
            
		 }
			else {
            echo "<script>location.replace('../add_employee_grade.php?success=update_error&employee_grade=employee_grade_list');</script>";
         
			}
		}

if (isset($_GET['employee_grade_delete'])) { //Deleting\\Updating employee_grade
 	 
    $employee_grade_id = $_GET['employee_grade_id'];
    $delete_employee_grade=mysqli_query($conn,"UPDATE all_employee_grade SET grade_st = 0 WHERE id = $employee_grade_id");
	  
    if($delete_employee_grade==true)
    {
        echo "<script>location.replace('../add_employee_grade.php?success=deleted&employee_grade=employee_grade_list');</script>";
       
    }
    else 
    {
        echo "<script>location.replace('../add_employee_grade.php?success=error&employee_grade=employee_grade_list');</script>";
        
    }
    }


?>