<?php 
include'../../connect/config.php'; 

if (isset($_POST['parameter_submit_btn'])) //Adding Parameter form (code)
{   
	$parameter_tittle = $_POST['add_parameter'];
	$usernamee = $_POST['username']; 
	$para_price = $_POST['para_price']; 

	$list_parameter_tittle=mysqli_query($conn,"SELECT * from  prameter_tbl WHERE pra_name = '$parameter_tittle'");

		// Parameter Insert Query

	if(mysqli_num_rows($list_parameter_tittle) == 0)
	{
		$add_parameter_form=mysqli_query($conn,"INSERT into  prameter_tbl values('','$parameter_tittle','$para_price','1','$usernamee',now(),now())"); 
		$res=("$conn,$add_parameter_form");
		//1 to show data.
		if($res==TRUE)
			{
				echo "<script>location.replace('../add_parameter.php?success=success&parameter=parameter_list');</script>";
				// echo" Parameter Added Successfully !!";
				// print_r($res);
				// echo mysqli_error($conn);

				
			}
		else 
			{
				echo "<script>location.replace('../add_parameter.php?success=success&parameter=parameter_list');</script>";
				// echo" Fail To Added Parameter";
				
			}
	}
	else 
		{
			echo "<script>location.replace('../add_parameter.php?success=data_exists&parameter=add_parameter');</script>";
			
		}

}

// ======Update Query Of Paramteter List=======

if (isset($_POST['update_submit_parameter'])) {  
		
		$usernamee = $_POST['username'];
		$prametr_id=$_POST['pra_id'];
		$para_price=$_POST['para_price'];
		$update_prameter = $_POST['parameter_name_update'];


		$update_prametr_query=mysqli_query($conn,"UPDATE prameter_tbl SET pra_name = '$update_prameter' ,pra_price = '$para_price' WHERE pra_id = '$prametr_id'");
		 if($update_prametr_query==true)
		 {
			echo "<script>location.replace('../add_parameter.php?success=success&parameter=parameter_list');</script>";
			// echo" Parameter Updated Successfully !!!";
			// echo $update_prameter;
			

		 }
			else {
				echo "<script>location.replace('../add_parameter.php?success=error&parameter=update_parameter&pra_id=$prametr_id');</script>";
			// echo"failed to updated Parameter name!!";
			
		
			}
		}


		// Delete Query Of Parameter List.

if (isset($_GET['parameter'])) {
 	 
	  $prmtr_del_id = $_GET['pra_id'];
	  $parmeter_name_sql=mysqli_query($conn,"UPDATE prameter_tbl SET pra_st = 0 WHERE pra_id = '$prmtr_del_id'");
	  
	 	if($parmeter_name_sql==true){
			echo "<script>location.replace('../add_parameter.php?success=success&parameter=parameter_list');</script>";
			// echo"Deleted Parameter List Successfully";
		}
	else {
		echo "<script>location.replace('../add_parameter.php?success=error&parameter=parameter_list');</script>";
	// echo"Failed To Delete Parameter List ";

		}
		}


?>