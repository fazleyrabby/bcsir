<?php 
include'../../connect/config.php'; 

if (isset($_POST['assgn_test_value'])) //Adding assign test (code)
{
	// $asgn_sp_id=$_POST['asgn_sp_id'];
	
	$usernamee = $_POST['username'];
	
	$samp_slct_id=$_POST['samp_selct_id'];
	$pramtr_slct_id=$_POST['pra_selct_id'];

	$assgn=implode(',',$pramtr_slct_id);

		$add_assgntest=mysqli_query($conn,"INSERT into  assign_sam_pramtr values('','$samp_slct_id','$assgn',1,'',now(),now())"); 
		$res=("$conn,$add_assgntest");
		//1 to show data
		if($res==TRUE)
			{
				echo "<script>location.replace('../assgn_test.php?success=success&assgn_form=applylist');</script>";
	

				
			}
		else 
			{
				echo "<script>location.replace('../assgn_test.php?success=success&assgn_form=applylist');</script>";
				
				
			}


}

// ======Update Query Of Assign Sample/Parameter Form====

if (isset($_POST['update_assgn_form'])) {  
		// $account_head_title = $_POST['account_head_title'];
		//$serial_number = $_POST['serial_number'];
		$usernamee = $_POST['username'];
		$asgn_sp_id=$_POST['asgn_sp_id'];
		$update_sample_id= $_POST['samp_selct_id'];
		$update_pramtr_id= $_POST['pra_selct_id'];

		$assgn=implode(',',$update_pramtr_id);
		// echo "$assgn";		

		$update_assgn_query=mysqli_query($conn,"UPDATE assign_sam_pramtr SET sam_id = '$update_sample_id', paramtr_id= '$assgn' WHERE asgn_sp_id = '$asgn_sp_id'");

		 if($update_assgn_query==true)
		 {
			echo "<script>location.replace('../assgn_test.php?success=success&assgn_form=applylist');</script>";
			// echo" Assign table updated successfully !!!";
		 }
			else {
				echo "<script>location.replace('../assgn_test.php?success=error&assgn_form=add_assgn_test&asgn_sp_id=$asgn_sp_id');</script>";
			// echo"Failed to updated Assign table !!";
		
			}
		}
			// ====Update Query End (Assgn Sample parameter tbl)===

		// ====Delete Query Of Assgin Sample/Parameter List.===

if (isset($_GET['assgn_form'])) {
 	 
	  $assgn_id_delete = $_GET['asgn_sp_id'];
	//   echo " $assgn_id_delete";
	

	  $assgn_delete_sql=mysqli_query($conn,"UPDATE assign_sam_pramtr SET asgn_st = 0 WHERE asgn_sp_id = '$assgn_id_delete'");
	  
	 	if($assgn_delete_sql==true){
			echo "<script>location.replace('../assgn_test.php?success=success&assgn_form=applylist');</script>";
			// echo"Deleted Form Assign List Successfully";
		
		}
	else {
		echo "<script>location.replace('../assgn_test.php?success=error&assgn_form=applylist');</script>";

		// echo "Failed To Delete From Assign List";
		
		}
}


?>