<?php 
include '../../connect/config.php'; 

if (isset($_POST['add_assign_rate']))  //Adding New department
{   
	//$department_id = $_POST['department_id'];
    $employee_grade = $_POST['employee_grade'];
    $salary_head_type = $_POST['salary_head_type'];
    $salary_head_id = $_POST['salary_head_names'];
    $monthly_rate = $_POST['monthly_rate'];


		$add_new_rate=mysqli_query($conn,"INSERT into assign_salary_grade (`grade_id`,`salary_head_id`,`salary_head_type`,`rate`,`created_at`,`updated_at`) values ('$employee_grade','$salary_head_id','$salary_head_type','$monthly_rate',now(),now())"); //1 to show data
		if($add_new_rate==true)
			{
                echo "<script>location.replace('../assign_salary_head_rate.php?success=success&assign_salary_head=add_rate');</script>";
               
			}
		else 
			{
                echo "<script>location.replace('../assign_salary_head_rate.php?success=success&assign_salary_head=rate_list');</script>";
                
			}
	

}
if (isset($_POST['edit_assign_salary'])) {  //Update department
		$monthly_rate = $_POST['monthly_rate'];
		//$serial_number = $_POST['serial_number'];
		$usernamee = $_POST['username'];
		$rate_id = $_POST['rate_id'];
		$edit_assign_salary=mysqli_query($conn,"UPDATE assign_salary_grade SET rate = '$monthly_rate' WHERE id = '$rate_id'");
		 if($edit_assign_salary==true)
		 {
            echo "<script>location.replace('../assign_salary_head_rate.php?success=success&assign_salary_head=rate_list');</script>";
            
		 }
			else {
                echo "<script>location.replace('../assign_salary_head_rate.php?success=success&assign_salary_head=rate_list');</script>";
         
			}
		}

if (isset($_GET['rate_delete'])) { //Deleting\\Updating department
 	 
    $rate_id = $_GET['rate_id'];
    $delete_department=mysqli_query($conn,"UPDATE assign_salary_grade SET rate_st = 0 WHERE id = $rate_id");
	  
    if($delete_department==true)
    {
        echo "<script>location.replace('../assign_salary_head_rate.php?success=deleted&assign_salary_head=rate_list');</script>";
       
    }
    else 
    {
        echo "<script>location.replace('../assign_salary_head_rate.php?success=error&assign_salary_head=rate_list');</script>";
        
    }
    }


?>