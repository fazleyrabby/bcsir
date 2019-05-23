<?php 
include'../../connect/config.php'; 

if (isset($_POST['add_expense'])) //Adding New account head
{   
    $usernamee = $_POST['username'];
    //account_head,serial_no,expense_title,total_expense,payment,due_expense,payment_type,bank_name,account_no
    $serial_no = $_POST['serial_no'];
	$account_head_id = $_POST['account_head'];
	$expense_title = $_POST['expense_title'];
	$total_expense = $_POST['total_expense'];
	$paid_amount = $_POST['paid_amount'];
	$due_expense = $_POST['due_expense'];
	$payment_type = $_POST['payment_type'];
	$bank_name = $_POST['bank_name'];
    $account_no = $_POST['account_no'];

	$expense_exist=mysqli_query($conn,"SELECT * from manage_expense WHERE serial_no = '$serial_no'");	
	if(mysqli_num_rows($expense_exist) == 0)
	{
		$add_expense=mysqli_query($conn,"INSERT into manage_expense values('','$serial_no','$account_head_id','1','$expense_title','$total_expense','$due_expense','$paid_amount','$payment_type','$bank_name','$account_no','$usernamee',now(),'')"); //1 to show data
		if($add_expense==true)
			{
                echo "<script>location.replace('../add_expense.php?success=success&expense=expense_list');</script>";
                
			}
		else 
			{
				echo "<script>location.replace('../add_expense.php?success=error&expense=expense_list');</script>";
			}
	}
	else 
		{
			echo "<script>location.replace('../add_expense.php?success=data_exists&expense=add_expense');</script>";
		}

}

if (isset($_POST['update_expense'])) {  //Update Expense
    $usernamee = $_POST['username'];
    //account_head,serial_no,expense_title,total_expense,payment,due_expense,payment_type,bank_name,account_no
    //$serial_no = $_POST['serial_no'];
    $expense_id = $_POST['expense_id'];
	$account_head_id = $_POST['account_head'];
	$expense_title = $_POST['expense_title'];
	$total_expense = $_POST['total_expense'];
	$paid_amount = $_POST['paid_amount'];
	$due_expense = $_POST['due_expense'];
	$payment_type = $_POST['payment_type'];
	$bank_name = $_POST['bank_name'];
    $account_no = $_POST['account_no'];

    if ($payment_type == 2) {
    $bank_name = ""; $account_no = "";
    }
		$update_notice=mysqli_query($conn,"UPDATE 
			manage_expense 
			SET 
			account_head_id = '$account_head_id', 
			expense_title = '$expense_title', 
			total_amount = '$total_expense', 
			due_amount = '$due_expense', 
			paid_amount = '$paid_amount' ,
			payment_type = '$payment_type',
			bank_name = '$bank_name' ,
			account_no = '$account_no'
			WHERE expense_id = '$expense_id'");
		 if($update_notice==true)
		 {

                echo "<script>location.replace('../add_expense.php?success=success&expense=expense_list');</script>";
		 }
			else {
				//echo mysqli_error($conn);
				echo "<script>location.replace('../add_expense.php?success=error&expense=expense_list');</script>";
			}
		}

if (isset($_GET['expense_delete'])) { //Deleting\\Updating Account Head
 	 
 	 $expense_id = $_GET['expense_id'];
	  $delete_account_head=mysqli_query($conn,"UPDATE manage_expense SET expense_st = 0 WHERE expense_id = '$expense_id'");
	  
	 	if($delete_account_head==true){
    echo "<script>location.replace('../add_expense.php?success=success&expense=expense_list');</script>";
		}
	else {
    echo "<script>location.replace('../add_expense.php?success=error&expense=expense_list');</script>";
		}
		}


?>