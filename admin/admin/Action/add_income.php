<?php 
include'../../connect/config.php'; 

if (isset($_POST['add_income'])) //Adding New account head
{   
    $usernamee = $_POST['username'];
    //account_head,serial_no,income_title,total_income,payment,due_income,payment_type,bank_name,account_no
    $serial_no = $_POST['serial_no'];
	$account_head_id = $_POST['account_head'];
	$income_title = $_POST['income_title'];
	$total_income = $_POST['total_income'];
	$paid_amount = $_POST['paid_amount'];
	$due_income = $_POST['due_income'];
	$payment_type = $_POST['payment_type'];
	$bank_name = $_POST['bank_name'];
    $account_no = $_POST['account_no'];

	$income_exist=mysqli_query($conn,"SELECT * from manage_income WHERE serial_no = '$serial_no'");	
	if(mysqli_num_rows($income_exist) == 0)
	{
		$add_income=mysqli_query($conn,"INSERT into manage_income values('','$serial_no','$account_head_id','1','$income_title','$total_income','$due_income','$paid_amount','$payment_type','$bank_name','$account_no','$usernamee',now(),now())"); //1 to show data
		if($add_income==true)
			{
                echo "<script>location.replace('../add_income.php?success=success&income=income_list');</script>";
                
			}
		else 
			{
				echo "<script>location.replace('../add_income.php?success=error&income=income_list');</script>";
			}
	}
	else 
		{
			echo "<script>location.replace('../add_income.php?success=data_exists&income=add_income');</script>";
		}

}
if (isset($_POST['update_income'])) {  //Update Head
    $usernamee = $_POST['username'];
    //account_head,serial_no,income_title,total_income,payment,due_income,payment_type,bank_name,account_no
    //$serial_no = $_POST['serial_no'];
    $income_id = $_POST['income_id'];
	$account_head_id = $_POST['account_head'];
	$income_title = $_POST['income_title'];
	$total_income = $_POST['total_income'];
	$paid_amount = $_POST['paid_amount'];
	$due_income = $_POST['due_income'];
	$payment_type = $_POST['payment_type'];
	$bank_name = $_POST['bank_name'];
    $account_no = $_POST['account_no'];

    if ($payment_type == 2) {
    $bank_name = ""; $account_no = "";
    }
		$update_notice=mysqli_query($conn,"UPDATE 
			manage_income 
			SET 
			account_head_id = '$account_head_id', 
			income_title = '$income_title', 
			total_amount = '$total_income', 
			due_amount = '$due_income', 
			paid_amount = '$paid_amount' ,
			payment_type = '$payment_type',
			bank_name = '$bank_name' ,
			account_no = '$account_no' 
			WHERE income_id = '$income_id'");
		 if($update_notice==true)
		 {

                echo "<script>location.replace('../add_income.php?success=success&income=income_list');</script>";
		 }
			else {
				//echo mysqli_error($conn);
				echo "<script>location.replace('../add_income.php?success=error&income=income_list');</script>";
			}
		}

if (isset($_GET['income_delete'])) { //Deleting\\Updating Account Head
 	 
 	 $income_id = $_GET['income_id'];
	  $delete_account_head=mysqli_query($conn,"UPDATE manage_income SET income_st = 0 WHERE income_id = '$income_id'");
	  
	 	if($delete_account_head==true){
    echo "<script>location.replace('../add_income.php?success=success&income=income_list');</script>";
		}
	else {
    echo "<script>location.replace('../add_income.php?success=error&income=income_list');</script>";
		}
		}


?>