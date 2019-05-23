<?php 
include '../../connect/config.php'; 

if (isset($_POST['usr_apply'])) 
{   
    $usernamee = $_POST['applicant_name'];
    $application_dsc = $_POST['application_dsc'];
	$samp_selct_id = $_POST['samp_selct_id'];
	$test_qnty = $_POST['test_qnty'];
	$pra_selct_id = $_POST['pra_selct_id'];
	$method_selct_id = $_POST['method_selct_id'];
	$total_amount = $_POST['total_amount'];
	$sid = $_POST['store_id'];
	$sp = $_POST['store_passwd'];
	$cur = $_POST['currency'];
	$tranid = $_POST['tran_id'];
	$surl = $_POST['success_url'];
	$curl = $_POST['cancel_url'];
	$cusname = $_POST['cus_name'];
	$cusemail = $_POST['cus_email'];
	$cusphone = $_POST['cus_phone'];
    $all_parameter = implode(",",$pra_selct_id);
	$all_method = implode(",",$method_selct_id);

	// $new = array($usernamee,$application_dsc,$samp_selct_id,$test_qnty,$all_parameter,$all_method,$total_amount,$sid,$sp,$cur,$tranid,$surl,$curl,$cusname,$cusemail,$cusphone);
	// print_r($new);

	//$applicant_name = $_POST['applicant_name'];
    $applicant_contact = $_POST['applicant_contact'];
    
    $all_parameter = implode(",",$pra_selct_id);
    $all_method = implode(",",$method_selct_id);
	// echo $all_parameter;
	
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

if(isset($_POST['application_submit'])) {

$method_selct_id=$_POST['method_selct_id'];
$pra_selct_id=$_POST['pra_selct_id'];
$sample_id=$_POST['samp_selct_id'];
$desc=$_POST['desc'];
$test_qt=$_POST['test_qnty'];

$store_id=$_POST['store_id'];
$tran_id=$_POST['tran_id'];
$cus_name=$_POST['applicant_name'];
$cus_email=$_POST['mail'];
$cus_phone=$_POST['applicant_contact'];
$amount = $_POST['amount'];
$receiver = 'wwwrcreationbd@gmail.com';
$other_para = $_POST['other'];
$tran_st =  4;  //pending
$parameter_list = implode(",",$pra_selct_id);
$method_list = implode(",",$method_selct_id);

// echo "<pre>";
// print_r($_POST);
// die();

$tran_check = "SELECT transaction_id from all_payment_transactions where transaction_id ='$tran_id'";
$tran_check_sql = mysqli_query($conn,$tran_check);
$tran_check_row = mysqli_num_rows($tran_check_sql);




if ($tran_check_row == 0) {
$transaction = "INSERT into all_payment_transactions (`amount`,`store_id`,`reciever`,`sender`,`status`,`transaction_id`,`sender_email`,`sender_phone`,`created_at`,`updated_at`,`type`) values 
('$amount','$store_id','$receiver','$cus_name',$tran_st,'$tran_id','$cus_email','$cus_phone',now(),now(),'1')";

$tran_sql = mysqli_query($conn,$transaction);


if ($tran_sql == true) {
	// $last_id_transaction = "SELECT *";
$last_id_tran = mysqli_query($conn,"SELECT last_insert_id() as last_id from all_payment_transactions");

$last_id = mysqli_fetch_object($last_id_tran);
$t_id=$last_id->last_id;

// echo $t_id;
// die();

$application = mysqli_query($conn,"INSERT into user_application (`all_p_id`,`description`,`test_qt`,`sample_id`,`parameter_id`,`method_id`,`application_st`,`created_at`,`updated_at`,`other_parameter`) values 
($t_id,'$desc','$test_qt','$sample_id','$parameter_list','$method_list',0,now(),now(),'$other_para')");
		if($application==true)
			{
				echo "<script>location.replace('../user_application.php?success=success');</script>";
				// echo "success";
			}
		else 
			{
                echo "<script>location.replace('../user_application.php?success=success');</script>";
                //  echo "FAILED!!!!";
			}
	// }
	// else 
	// 	{
	// 		echo "<script>location.replace('../add_income.php?success=data_exists&income=add_income');</script>";
	// 	}

}
}
}

if(isset($_POST['submit_valid'])){
	$validation = $_POST['validation'];
	$reject_desc = $_POST['reject_desc'];
	$application_id = $_POST['application_id'];
	$username = $_POST['validate_by'];
	
	
	$query = mysqli_query($conn,"UPDATE user_application set validate_by='$username',reject_desc='$reject_desc',application_st='$validation' where all_p_id = $application_id");
	
		if($query==true)
			{
				echo "<script>location.replace('../user_application.php?success=success&&usr_application=details&id=$application_id');</script>";
				// echo "success";
			}
		else 
			{
                echo "<script>location.replace('../user_application.php?success=success&&usr_application=details&id=$application_id');</script>";
                //  echo "FAILED!!!!";
			}

	


}