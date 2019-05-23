<?php 
include '../../connect/config.php'; 
if (isset($_POST['method_save'])) //Adding assign test (code)
{
	// $asgn_sp_id=$_POST['asgn_sp_id'];
	
	$usernamee = $_POST['username'];
	$pramtrr_slct_id=$_POST['pramtrr_slct_id'];
	$method_name=$_POST['method_name'];
	// $method_price=$_POST['method_price'];

	
	// echo $pramtrr_slct_id,$method_name;
	// die();
	// $assgn=implode(',',$pramtr_slct_id);
	// $list_method=mysqli_query($conn,"SELECT * FROM method_tbl WHERE methd_pramtrid = '$pramtrr_slct_id' and method_st = 0");
	// 	// Insert Query For Mehod...
	// if(mysqli_num_rows($list_method) == 0)
	// {
		$add_method=mysqli_query($conn,"INSERT INTO method_tbl (`methd_pramtrid`,`method_name`,`method_st`,`created_at`,`updated_at`) values ('$pramtrr_slct_id','$method_name',0,now(),now())"); 
		//print_r($add_method);
		$res=("$conn,$add_method");
		//print_r($res);
		//1 to show data
		if($res==TRUE)
			{
			// echo "<script>location.replace('../assgn_test.php?success=success&assgn_form=applylist');</script>";
			// echo "<script>location.replace('../add_method.php?success=success&method=method_list');</script>";
			

				echo "<script>location.replace('../add_method.php?success=success&method=add_method');</script>";

			
			
			// echo mysqli_error($conn);
			// echo" method added succesfully !!!";	
			}
		else 
			{
				echo "<script>location.replace('../add_method.php?success=success&method=method_list');</script>";
				
				//echo"failed to add method";
			}
	// }
	// else 
	// 	{
	// 		// echo "<script>location.replace('../assgn_test.php?success=data_exists&assgn_form=add_assgn_test');</script>";
	// 		// echo"error!!";
	// 			echo "<script>location.replace('../add_method.php?success=data_exists&method=method_list');</script>";
			
			
	// 	}

}

// ======Update Query Of Assign Sample/Parameter Form====


if (isset($_POST['update_method_save'])) {  
	
	$usernamee = $_POST['username'];
	$methd_id=$_POST['methd_id'];
	$m_paramtr_id = $_POST['m_paramtr_id'];
	$method_name=$_POST['method_name'];
	// $method_price=$_POST['method_price'];

	$update_method_lst=mysqli_query($conn,"UPDATE method_tbl SET methd_pramtrid = '$m_paramtr_id',method_name='$method_name' WHERE methd_id = '$methd_id'");

	 if($update_method_lst==true)
	 {
		
		echo"<script>location.replace('../add_method.php?success=update_success&method=method_list');</script>";
		// echo" Method updated successfully !!!";
	 }
		else {
		echo"<script>location.replace('../add_method.php?success=update_error&method=method_list');</script>";

		// echo"failed to updated method name!!";
	
		}
	}
			// ====Update Query End (Assgn Sample parameter tbl)===

		// ====Delete Query Of Assgin Sample/Parameter List.===

if (isset($_GET['method'])) {
 	 
	  $method_id_del = $_GET['methd_id'];
	//   echo " $assgn_id_delete";
	

	  $methd_delt_sql=mysqli_query($conn,"UPDATE method_tbl SET method_st = 1 WHERE methd_id = '$method_id_del'");
	  
	 	if($methd_delt_sql==true){

			echo "<script>location.replace('../add_method.php?success=success&method=method_list');</script>";
			// echo"Deleted Method row Successfully";
		
		}
	else {
		echo "<script>location.replace('../add_method.php?success=error&method=method-list');</script>";

		echo "Failed To Deleted From Method List";
		
		}
}


?>