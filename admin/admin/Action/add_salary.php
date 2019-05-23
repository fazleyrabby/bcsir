<?php 
include '../../connect/config.php'; 

if (isset($_POST['assign_salary']))  //Adding New employee
{   if($_POST['salary_amount_add'] || $_POST['salary_amount_min'])
	{

	$employee_id = $_POST['employee_id'];
	$salary_head_add = $_POST['salary_head_add'];
	$salary_head_min = $_POST['salary_head_min'];
	$monthly_rate_add = $_POST['monthly_rate_add'];
	$monthly_rate_min = $_POST['monthly_rate_min'];
	$salary_amount_add = $_POST['salary_amount_add'];
	$salary_amount_min = $_POST['salary_amount_min'];
//$monthly_rate = $_POST['monthly_rate'];
	$month = date('m');
	$year = date('y');
	
	$total_amount_add = $_POST['total_amount_add'];
	$total_amount_min = $_POST['total_amount_min'];
	$total_salary = $_POST['total_salary'];
	
// echo "salary_head_add == >" ; print_r($salary_head_add);echo "<br>";
// echo "monthly_rate_add == >" ; print_r($monthly_rate_add);echo "<br>";
// echo "salary_amount_add == >" ; print_r($salary_amount_add);echo "<br><br>";
// echo "salary_head_min == >" ; print_r($salary_head_min);echo "<br>";
// echo "monthly_rate_min == >" ; print_r($monthly_rate_min);echo "<br>";
// echo "salary_amount_min == >" ; print_r($salary_amount_min);echo "<br>";

	$assign_salary=mysqli_query($conn,"INSERT into salary_summary (`employee_id`,`salary_paid`,`salary_credit`,`salary_total`,`month`,`year`,`created_at`,`updated_at`) values ('$employee_id','$total_amount_add','$total_amount_min','$total_salary','$month','$year',now(),now())"); 
	//1 to show data
	if($assign_salary==true)
		{
			$last_sal_summary = mysqli_query($conn,"SELECT last_insert_id() as last_summary_id from salary_summary");
			$last_id_obj=mysqli_fetch_object($last_sal_summary);
			$last_id = $last_id_obj->last_summary_id; 

			for($i=0; $i<count($salary_head_add); $i++){
			$salary_details_add = mysqli_query($conn,"INSERT into salary_details (`summary_id`,`salary_head`,`amount`,`created_at`,`updated_at`,`salary_head_type`) values ($last_id,'$salary_head_add[$i]','$salary_amount_add[$i]',now(),now(),1)");
			}
			
			if ($salary_details_add == true) 
			{
				for($j=0; $j<count($salary_head_min); $j++)
				{
					$salary_details_min = mysqli_query($conn,"INSERT into salary_details (`summary_id`,`salary_head`,`amount`,`created_at`,`updated_at`,`salary_head_type`) values ($last_id,'$salary_head_min[$j]','$salary_amount_min[$j]',now(),now(),2)");
				}
			}

		   	if ($salary_details_min == true ) 
					{	
						echo "<script>location.replace('../salary.php?salary=salary_list&success=success');</script>";
					}
					else 
					{
						echo "<script>location.replace('../salary.php?salary=salary_list&success=success');</script>";
					}

		}
	else 
		{
			echo mysqli_error($conn);
		}
}
	}
	


if (isset($_POST['update_salary'])) {  //update_salary

    $last_updated_id = $_POST['last_updated_id'];
	// $employee_id = $_POST['employee_id'];
	$salary_head_add = $_POST['salary_head_add']; //after update salary head add

	$salary_head_min = $_POST['salary_head_min'];//after update salary head minus

	// $monthly_rate_add = $_POST['monthly_rate_add'];
	// $monthly_rate_min = $_POST['monthly_rate_min'];

	$salary_amount_add = $_POST['salary_amount_add'];
	$salary_amount_min = $_POST['salary_amount_min'];
	
	$month = date('m');
	$year = date('y');
	
	$total_amount_add = $_POST['total_amount_add'];
	$total_amount_min = $_POST['total_amount_min'];
	$total_salary = $_POST['total_salary'];

	$salary_h_add_p = $_POST['salary_h_add_p']; //before update salary head add
	$salary_h_min_p = $_POST['salary_h_min_p']; //before update salary head minus
	$date = $_POST['date'];

	echo json_encode($salary_h_add_p);
	echo json_encode($salary_h_min_p);

	// echo $count_add_head."<br>".$count_min_head."<br>".count($salary_head_add)."<br>";
	// echo $date;
	
	$s = strtotime($date);
	$dateTime =  date('Y-m-d H:i:s', $s);
	// echo $dateTime; 
	// die();
	$update_salary=mysqli_query($conn,"UPDATE salary_summary set
	`salary_paid` = '$total_amount_add',
	`salary_credit` = '$total_amount_min',
	`salary_total` = '$total_salary',
	`updated_at` = now()
	 where id = $last_updated_id"); 
	//1 to show data
	if($update_salary==true)
		{ 
			for($i=0; $i<count($salary_head_add); $i++)
			{  
				$count = 0;
				$salary_h_add_update=false;
				$salary_details_add=false;
				for ($j=0; $j<count($salary_h_add_p); $j++) 
				{ 
					if ($salary_head_add[$i] == $salary_h_add_p[$j]) 
					{
						$salary_h_add_update = mysqli_query($conn,"UPDATE salary_details set `amount`='$salary_amount_add[$i]' where salary_head =$salary_head_add[$i]");
						$count = 1;
					}
				}
				if ($count == 0) 
				{
					  $salary_details_add = mysqli_query($conn,"INSERT into salary_details (`summary_id`,`salary_head`,`amount`,`created_at`,`updated_at`,`salary_head_type`) values ($last_updated_id,'$salary_head_add[$i]','$salary_amount_add[$i]','$dateTime',now(),1)");
				}
			}

		 	if ($salary_details_add == true || $salary_h_add_update == true) {
			for($m=0; $m<count($salary_head_min); $m++)
			{   
				$mcount = 0;
				$salary_details_min=false;
				$salary_h_min_update=false;
				for ($n=0; $n<count($salary_h_min_p); $n++) 
				{ 
				if ($salary_head_min[$m] == $salary_h_min_p[$n]) 
					{
						$salary_h_min_update = mysqli_query($conn,"UPDATE salary_details set `amount`='$salary_amount_min[$m]' where salary_head =$salary_head_min[$m]");
						$mcount = 1;
					}
				}
				if ($mcount == 0) 
				{
					  $salary_details_min = mysqli_query($conn,"INSERT into salary_details (`summary_id`,`salary_head`,`amount`,`created_at`,`updated_at`,`salary_head_type`) values ($last_updated_id,'$salary_head_min[$m]','$salary_amount_min[$m]','$dateTime',now(),2)");
				}
			}
			
		}
			else 
			{
				echo "<script>location.replace('../salary.php?salary=salary_list&success=error');</script>";
			}
				 	if ($salary_details_min == true || $salary_h_min_update == true) 
					{	
						echo "<script>location.replace('../salary.php?salary=salary_list&success=success');</script>";
						// echo mysqli_error($conn);

					}
					else 
					{
						echo "<script>location.replace('../salary.php?salary=salary_list&success=error');</script>";
						// echo mysqli_error($conn);
					}

			}
			else {
				// echo mysqli_error($conn);
				echo "<script>location.replace('../salary.php?salary=salary_list&success=error');</script>";
			}

		}



		
	

	

if (isset($_GET['delete_salary'])) { //Deleting\\Updating employee
 	 $employee_id = $_GET['employee_id'];
	  $delete_salary=mysqli_query($conn,"UPDATE salary_summary SET salary_st = 0 WHERE employee_id = $employee_id");
	 	if($delete_salary==true){
			echo "<script>location.replace('../salary.php?salary=salary_list&success=deleted');</script>";
	
		}
	else{
	echo "<script>location.replace('../salary.php?salary=salary_list&success=error');</script>";
	
		}
		}


?>