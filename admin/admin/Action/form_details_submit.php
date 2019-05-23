<?php 
session_start();
include'../../connect/config.php'; 

if (isset($_POST['approve'])) //Adding Requrmnt form (code)
{  

	$confirm_name=$_POST['approve'];
	$confirm_id=2;
	if($confirm_name=='Approve')
	{
		$confirm_id=1;
	}
	
	$form_pk_id = $_POST['form_id']; 
	$recv_con_type = $_SESSION['user_id'];
	$comments = $_POST['comments_id'];
	$username = $_POST['username'];

	$user_requrmnt_list=mysqli_query($conn,"SELECT * from  ratul_login WHERE username = '$username'");
	$row=mysqli_fetch_array($user_requrmnt_list);

	$send_id=$row['id'];
	
	$add_requrmnt_form=mysqli_query($conn,"INSERT into requirement_detalis_tbl values('','$form_pk_id','$send_id','$recv_con_type','$confirm_id','$comments',now(),now())"); 
	$res=("$conn,$add_requrmnt_form");
	//1 to show data
	if($res==TRUE)
	{
		$status=2;

		if($confirm_id==2)
		{
			$status=8;
		}

		$update_sample_query=mysqli_query($conn,"UPDATE user_requirement SET Qu_status = '$status' WHERE user_requr_id = '$form_pk_id'");
		if($update_sample_query==true)
		{
			echo"<script>location.replace('../cpto_form.php?success=update&requrmnt=requrmnt_list');</script>";
			// echo" Sample updated successfully !!!";
		}
		
	}
	else 
		{
			
			// echo"<script>location.replace('../add_sample.php?success=error&sample=applylist');</script>";
			echo" Fail To Added Requrment";
			
			}
	
	

}


if (isset($_POST['approve_md'])) //Adding Requrmnt form (code)
{  

	$form_pk_id = $_POST['form_id']; 

	$user_requrmnt_list=mysqli_query($conn,"SELECT * from  requirement_detalis_tbl WHERE form_pk_id = '$form_pk_id'");
	$row=mysqli_fetch_array($user_requrmnt_list);

	echo "<pre>";print_r($row);die();

	$confirm_name=$_POST['approve'];
	$confirm_id=2;
	if($confirm_name=='Approve')
	{
		$confirm_id=1;
	}

	$form_pk_id = $_POST['form_id']; 
	$recv_con_type = $_SESSION['user_id'];
	$comments = $_POST['comments_id'];
	$username = $_POST['username'];

	$user_requrmnt_list=mysqli_query($conn,"SELECT * from  ratul_login WHERE username = '$username'");
	$row=mysqli_fetch_array($user_requrmnt_list);

	$send_id=$row['id'];
	
	$add_requrmnt_form=mysqli_query($conn,"INSERT into  requirement_detalis_tbl values('','$form_pk_id','$send_id','$recv_con_type','$confirm_id','$comments',now(),now())"); 
	$res=("$conn,$add_requrmnt_form");
	//1 to show data
	if($res==TRUE)
	{
		$status=2;

		if($confirm_id==2)
		{
			$status=8;
		}

		$update_sample_query=mysqli_query($conn,"UPDATE user_requirement SET Qu_status = '$status' WHERE user_requr_id = '$form_pk_id'");
		if($update_sample_query==true)
		{
			echo"<script>location.replace('../cpto_form.php?success=update&requrmnt=requrmnt_list');</script>";
			// echo" Sample updated successfully !!!";
		}
		
	}
	else 
		{
			
			// echo"<script>location.replace('../add_sample.php?success=error&sample=applylist');</script>";
			echo" Fail To Added Requrment";
			
			}
	
	

}


// ======Update Query Of Sample Form====

if (isset($_POST['update_submit_form'])) {  
		$usernamee = $_POST['username'];
		$sample_id=$_POST['sample_id'];
		$update_sample = $_POST['sample_name_update'];
		$update_sample_query=mysqli_query($conn,"UPDATE sample_tbl SET sample_name = '$update_sample' WHERE sample_id = '$sample_id'");
		 if($update_sample_query==true)
		 {
			
			echo"<script>location.replace('../add_sample.php?success=update_success&sample=sample_list');</script>";
			// echo" Sample updated successfully !!!";
		 }
			else {
			echo"<script>location.replace('../add_sample.php?success=update_error&sample=sample_list');</script>";

			// echo"failed to updated sample name!!";
		
			}
		}

		
		// Approve Button start

		if (isset($_GET['approve_form'])) {
 	 
			$form_id = $_GET['user_requr_id'];
			$user_id = $_SESSION['user_id'];
			$comments_id = $_GET['comments_id'];

			$status = $_GET['status'];
			//echo $user_requr_idd;die();
			$acc_approv_sql=mysqli_query($conn,"UPDATE user_requirement SET Qu_status = '$status' WHERE user_requr_id = '$form_id'");

			//echo "<pre>";print_r($acc_approv_sql);die();			
			   if($acc_approv_sql==true){

				//INSERTATION OF REQUIRMENT DETAILS TABLE....

				$add_details_form=mysqli_query($conn,"INSERT into  requirement_detalis_tbl  values('','$form_id','$user_id','1','','',now(),now())"); 


			
				if($add_details_form==true){}
				//  else {
				// 	echo "Error: " . $add_details_form . "<br>";
				// }
				//echo "<pre>";print_r($add_details_form);die();	

				
				   echo"<script>location.replace('../cpto_form.php?success=update&requrmnt=requrmnt_list');</script>";
				//echo"Sended Approvel Form to Manging director(MD)";
			  }

		  else {
		  
				//   echo"<script>location.replace('../add_sample.php?success=update_error&sample=sample_list');</script>";
				echo"Send to fail towards Manging director(MD)";
	  
			  }
			  }
			//   Approve Button end 

			// ====Approve comments form======


			if (isset($_GET['approve_form_com'])) {
 	 
				$form_id = $_GET['user_requr_id'];
				$user_id = $_SESSION['user_id'];
				
				
	
				$status = $_GET['status'];
				//echo $user_requr_idd;die();
				$acc_approv_sql=mysqli_query($conn,"UPDATE user_requirement SET Qu_status = '$status' WHERE user_requr_id = '$form_id'");
	
				//echo "<pre>";print_r($acc_approv_sql);die();			
				   if($acc_approv_sql==true){
	
					//INSERTATION OF REQUIRMENT DETAILS TABLE....
	
					$add_details_form=mysqli_query($conn,"INSERT into  requirement_detalis_tbl  values('','$form_id','$user_id','1','','','$comments_id',now(),now())"); 
	
	
				
					if($add_details_form==true){}
					//  else {
					// 	echo "Error: " . $add_details_form . "<br>";
					// }
					//echo "<pre>";print_r($add_details_form);die();	
	
					
					   echo"<script>location.replace('../cpto_form.php?success=update&requrmnt=requrmnt_list');</script>";
					//echo"Sended Approvel Form to Manging director(MD)";
				  }
	
			  else {
			  
					//   echo"<script>location.replace('../add_sample.php?success=update_error&sample=sample_list');</script>";
					echo"Send to fail towards Manging director(MD)";
		  
				  }
				  }

	


?>