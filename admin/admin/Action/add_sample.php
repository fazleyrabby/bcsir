<?php 
include'../../connect/config.php'; 

if (isset($_POST['add_sample_form'])) //Adding Sample form (code)
{   
	$sample_tittle = $_POST['add_sample'];
	// $serial_number = $_POST['serial_number'];
	$usernamee = $_POST['username']; 

	$list_sample_tittle=mysqli_query($conn,"SELECT * from  sample_tbl WHERE sample_name = '$sample_tittle'");

		// Insert Query

	if(mysqli_num_rows($list_sample_tittle) == 0)
	{
		$add_sample_form=mysqli_query($conn,"INSERT into  sample_tbl values('','$sample_tittle','1','$usernamee',now())"); 
		 $res=("$conn,$add_sample_form");
		//1 to show data
		if($res==TRUE)
			{
				echo "<script>location.replace('../add_sample.php?success=success&sample=sample_list');</script>";
				// echo" Sample Added Successfully !!";
				// print_r($res);
				// echo mysqli_error($conn);

				
			}
		else 
			{
				echo "<script>location.replace('../add_sample.php?success=error&sample=add_sample');</script>";
				// echo" Fail To Added Sample";
				
			}
	}
	else 
		{
			echo "<script>location.replace('../add_sample.php?success=data_exists&sample=add_sample');</script>";
			
		}

}

// ======Update Query Of Sample Form====

if (isset($_POST['update_submit_form'])) {  
		// $account_head_title = $_POST['account_head_title'];
		//$serial_number = $_POST['serial_number'];
		$usernamee = $_POST['username'];
		$sample_id=$_POST['sample_id'];
		$update_sample = $_POST['sample_name_update'];
		$update_sample_query=mysqli_query($conn,"UPDATE sample_tbl SET sample_name = '$update_sample' WHERE sample_id = '$sample_id'");
		 if($update_sample_query==true)
		 {
			echo "<script>location.replace('../add_sample.php?success=success&sample=sample_list');</script>";
			// echo" Sample updated successfully !!!";
		 }
			else {
			echo "<script>location.replace('../add_sample.php?success=error&sample=add_sample&sample_id=$sample_id');</script>";
			// echo"failed to updated sample name!!";
		
			}
		}

		// Delete Query Of Sample List.

if (isset($_GET['del_sample'])) {
 	 
	  $sample_id_delete = $_GET['sample_id'];
	  $sample_name_delete=mysqli_query($conn,"UPDATE sample_tbl SET sample_st = 0 WHERE sample_id = '$sample_id_delete'");
	  
	 	if($sample_name_delete==true){
			echo "<script>location.replace('../add_sample.php?success=success&sample=sample_list');</script>";
			echo"Deleted Sample List Successfully";
		}
	else {
		echo "<script>location.replace('../add_sample.php?success=error&sample=sample_list');</script>";
	echo"Failed To Delete Sample List ";

		}
		}


?>