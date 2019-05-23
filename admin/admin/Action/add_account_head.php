<?php 
include '../../connect/config.php'; 

if (isset($_POST['add_account_head'])) //Adding New account head
{   
	$account_head_title = $_POST['account_head_title'];
	$serial_number = $_POST['serial_number'];
	$usernamee = $_POST['username'];
	$group = $_POST['group'];
	$account_head_type = $_POST['account_head_type'];

	if ($group == 1) {
		$page = "account";
	}
	elseif($group == 2){
		$page = "salary";
	}

	$list_account_head=mysqli_query($conn,"SELECT * from account_head WHERE account_head_name = '$account_head_title'");	
	if(mysqli_num_rows($list_account_head) == 0)
	{
		$add_account_head=mysqli_query($conn,"INSERT into account_head (`account_head_st`,`add_by`,`account_head_name`,`account_head_group`,`account_head_type`,`created_at`,`updated_at`) values
		(1,'$usernamee','$account_head_title','$group','$account_head_type',now(),now())"); //1 to show data
		if($add_account_head==true)
			{
				echo "<script>location.replace('../add_".$page."_head.php?success=success&".$page."_head=".$page."_head_list');</script>";
			}
		else 
			{
				echo "<script>location.replace('../add_".$page."_head.php?success=error&".$page."_head=".$page."_head_list');</script>";
			}
	}
	else 
		{
			echo "<script>location.replace('../add_".$page."_head.php?success=data_exists&".$page."_head=".$page."_head_list');</script>";
		}

}
if (isset($_POST['update_account_head'])) {  //Update Account Head
		$account_head_title = $_POST['account_head_title'];
		//$serial_number = $_POST['serial_number'];
		$usernamee = $_POST['username'];
		$account_head_id = $_POST['account_head_id'];
		$update_notice=mysqli_query($conn,"UPDATE account_head SET account_head_name = '$account_head_title' WHERE account_head_id = '$account_head_id'");
		 if($update_notice==true)
		 {
			echo "<script>location.replace('../add_account_head.php?success=update_success&account_head=account_head_list');</script>";
		 }
			else {
			echo "<script>location.replace('../add_account_head.php?success=update_error&account_head=account_head_list');</script>";
			}
		}

if (isset($_GET['salary_head_delete'])) { //Deleting\\Updating Account Head
 	 
 	 $account_head_id = $_GET['account_head_id'];
 	 $group = $_GET['group'];
	  $delete_account_head=mysqli_query($conn,"UPDATE account_head SET account_head_st = 0 WHERE account_head_id = '$account_head_id'");
	  	if ($group == 1) {
		$page = "account";
	}
	elseif($group == 2){
		$page = "salary";
	}
	 	if($delete_account_head==true){
	echo "<script>location.replace('../add_".$page."_head.php?success=success&".$page."_head=".$page."_head_list');</script>";
		}
	else {
	echo "<script>location.replace('../add_".$page."_head.php?success=success&".$page."_head=".$page."_head_list');</script>";
		}
		}


?>