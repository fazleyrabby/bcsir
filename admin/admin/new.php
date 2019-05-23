<?php 
include '../../connect/config.php'; 

if (isset($_POST['usr_apply'])) //Adding New account head
{   

    //application_dsc,samp_selct_id,test_qnty,pra_selct_id,method_selct_id,applicant_name,applicant_contact,

    $usernamee = $_POST['applicant_name'];
    //account_head,serial_no,income_title,total_income,payment,due_income,payment_type,bank_name,account_no
    $application_dsc = $_POST['application_dsc'];
	$samp_selct_id = $_POST['samp_selct_id'];
	$test_qnty = $_POST['test_qnty'];
	$pra_selct_id = $_POST['pra_selct_id'];
	$method_selct_id = $_POST['method_selct_id'];
	$total_amount = $_POST['total_amount'];
	
	//$applicant_name = $_POST['applicant_name'];
    $applicant_contact = $_POST['applicant_contact'];
    
    $all_parameter = implode(",",$pra_selct_id);
    $all_method = implode(",",$method_selct_id);
    // echo $all_parameter;
    // die();

	// $income_exist=mysqli_query($conn,"SELECT * from manage_income WHERE serial_no = '$serial_no'");	
	// if(mysqli_num_rows($income_exist) == 0)
	// {
		$application=mysqli_query($conn,"INSERT into user_application (description,test_qt,sample_id,parameter_id,method_id,applicant_name,applicant_contant,application_st,created_at,updated_at,total_amount) values('$application_dsc','$test_qnty','$samp_selct_id','$all_parameter','$all_method','$usernamee','$applicant_contact','0',now(),now(),'$total_amount')"); //1 to show data
		if($application==true)
			{
                // echo "<script>location.replace('../add_income.php?success=success&income=income_list');</script>";
                echo "SUCCESS!!!!!";
                
			}
		else 
			{
                // echo "<script>location.replace('../add_income.php?success=error&income=income_list');</script>";
                 echo "FAILED!!!!";
			}
	// }
	// else 
	// 	{
	// 		echo "<script>location.replace('../add_income.php?success=data_exists&income=add_income');</script>";
	// 	}

}