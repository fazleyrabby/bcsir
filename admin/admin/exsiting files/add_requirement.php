<?php 
session_start();
include '../../connect/config.php'; 

if (isset($_POST['add_requrmnt_form'])) //Adding Requrmnt form (code)
{   
	$usernamee = $_POST['username']; 
	//$user_requr_id = $_POST['user_requr_id'];
	$requrmnt_name = $_POST['requrmnt_name'];
	$requrmnt_descrb=$_POST['requrmnt_descrb'];
	$requrmnt_price=$_POST['requrmnt_price'];
	$sender_id=$_POST['userid'];
	$reciever_type = $_POST['reciever_type'];
	//echo $usernamee,$requrmnt_name,$requrmnt_descrb,$requrmnt_price,$sender_id;
	//echo mysqli_error($conn);


		$add_requrmnt_form=mysqli_query($conn,"INSERT into user_requirement values('','$usernamee','$requrmnt_name','$requrmnt_descrb','$requrmnt_price','$reciever_type',now(),now(),$sender_id)"); 
		$res=("$conn,$add_requrmnt_form");
		//1 to show data
		if($res==TRUE)
			{
				$maxium_reqst_id="select max(user_requr_id)as mid from user_requirement where req_from='$sender_id'";
				$maxium_reqst_id_p=mysqli_query($conn,$maxium_reqst_id);
				if($maxium_reqst_id_p==true)
				{
					$maxium_reqst_id_o=mysqli_fetch_object($maxium_reqst_id_p);	
					$mid=$maxium_reqst_id_o->mid;
				}

					$accounts_emp_total = mysqli_query($conn,"SELECT id from ratul_login where user_level = $reciever_type");
					
				   $accounts_emp_row = mysqli_num_rows($accounts_emp_total);
				  if ($accounts_emp_row > 0) {
					while ($emp_data = mysqli_query($conn,$accounts_emp_total)) 
					{
					$id = $emp_data['id'];
					for ($i=0; $i < $accounts_emp_row; $i++) { 
					$req_details="insert into requirement_detalis_tbl values('',$mid,$sender_id,$id[$i],$sender_id,'',now(),now(),1)";
					$req_details_p=mysqli_query($conn,$req_details);
				}
			}
				}
				// $req_details="insert into requirement_detalis_tbl values('',$mid,$sender_id,(select id from ratul_login where user_level = $reciever_type),$sender_id,'',now(),now(),1)";
				$req_details_p=mysqli_query($conn,$req_details);
				if($req_details_p==true)
				{
			
				echo"<script>location.replace('../cpto_form.php?success=success&requrmnt=requrmnt_list');</script>";
				}
				else{

					echo mysqli_error($conn);
				}
				// echo" Reurement Added Successfully !!!";
				// echo mysqli_error($conn);

				
			}
		else 
			{
				
				// echo"<script>location.replace('../add_sample.php?success=error&sample=applylist');</script>";
				echo" Fail To Added Requrment";
				
			}


}
elseif(isset($_POST['update_req_form'])){
$usernamee = $_POST['username']; 
//$user_requr_id = $_POST['user_requr_id'];
$requrmnt_name = $_POST['requrmnt_name'];
$requrmnt_descrb=$_POST['requrmnt_descrb'];
$requrmnt_price=$_POST['requrmnt_price'];
$sender_id=$_POST['userid'];
$req_id=$_POST['req_id'];



		$edit_requrmnt_form=mysqli_query($conn,"UPDATE user_requirement set Qu_title='$requrmnt_name',Qu_descrbs='$requrmnt_descrb',Qu_price='$requrmnt_price',Qu_status=1 where user_requr_id=$req_id"); 
		//$res=("$conn,$add_requrmnt_form");
		//1 to show data
		if($edit_requrmnt_form==TRUE)
			{
				$maxium_reqst_id="select max(user_requr_id)as mid from user_requirement where req_from='$sender_id'";
				$maxium_reqst_id_p=mysqli_query($conn,$maxium_reqst_id);
				if($maxium_reqst_id_p==true)
				{
					$maxium_reqst_id_o=mysqli_fetch_object($maxium_reqst_id_p);	
					$mid=$maxium_reqst_id_o->mid;
				}
				$accounts_emp_total = mysqli_query($conn,"SELECT id from ratul_login where user_level = 2");
				$accounts_emp_row = mysqli_num_rows($accounts_emp_total);
				if ($accounts_emp_row > 0) {
					while ($emp_data = mysqli_query($conn,$accounts_emp_total)) 
					{
					$id = $emp_data['id'];
					for ($i=0; $i < $accounts_emp_row; $i++) { 
					$req_details="insert into requirement_detalis_tbl values('',$mid,$sender_id,$id[$i],$sender_id,'',now(),now(),1)";
					$req_details_p=mysqli_query($conn,$req_details);
				}
			}
				} 
				
				if($req_details_p==true)
				{
				echo"<script>location.replace('../cpto_form.php?success=success&requrmnt=requrmnt_list');</script>";
				}
				else{
					echo mysqli_error($conn);
				}
				// echo" Reurement Added Successfully !!!";
				// echo mysqli_error($conn);

				
			}
		else 
			{
				
				// echo"<script>location.replace('../add_sample.php?success=error&sample=applylist');</script>";
				echo" Fail To Added Requrment";
				
			}


}
elseif(isset($_POST['acc_send_req']))
{
$sender_id=$_POST['userid'];
$user_requr_id=$_POST['user_requr_id'];
$requrmnt_comments=$_POST['requrmnt_comments'];
$user_rcvr_id=$_POST['user_rcvr_id'];
$req_status=$_POST['req_status'];
if($req_status==2)
{
	$req_details="insert into requirement_detalis_tbl values('',$user_requr_id,$sender_id,(select id from ratul_login where user_level=3),$sender_id,'$requrmnt_comments',now(),now(),$req_status)";
}
elseif($req_status==3)
{
	$req_details="insert into requirement_detalis_tbl values('',$user_requr_id,$sender_id,(select id from ratul_login where user_level=2),$sender_id,'$requrmnt_comments',now(),now(),$req_status)";
}
elseif($req_status==6)
{
$req_details="insert into requirement_detalis_tbl values('',$user_requr_id,$sender_id,(select id from ratul_login where user_level=2),$sender_id,'$requrmnt_comments',now(),now(),$req_status)";
}
elseif($req_status==5)
{
	$user_rcvr_id=$user_rcvr_id;	
	$req_details= "insert into requirement_detalis_tbl values('',$user_requr_id,$sender_id,$user_rcvr_id,$sender_id,'$requrmnt_comments',now(),now(),$req_status)";
	//echo $req_details;
}
elseif($req_status==4)
{
	$user_rcvr_id=$user_rcvr_id;	
	$req_details= "insert into requirement_detalis_tbl values('',$user_requr_id,$sender_id,$user_rcvr_id,$sender_id,'$requrmnt_comments',now(),now(),$req_status)";
	//echo $req_details;
}
$req_details_p=mysqli_query($conn,$req_details);
if($req_details_p==true)
{

$update="update user_requirement set Qu_status='$req_status' where user_requr_id=$user_requr_id";	
$updatep=mysqli_query($conn,$update);
if($updatep==true)
{
	echo"<script>location.replace('../cpto_form.php?requrmnt=requrmnt_list');</script>";
}
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