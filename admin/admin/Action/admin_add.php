<?php  include '../../connect/config.php'; 

if (isset($_POST['submit'])) 
{   
	$admin_name = $_POST['admin_name'];
    $password=hash('sha512',$_POST['password']);

	$user_list=mysqli_query($conn,"SELECT * from ratul_login WHERE username = '$admin_name'");

	if(mysqli_num_rows($user_list) == 0)
	{
		$sql=mysqli_query($conn,"INSERT into ratul_login(`username`,`password`,`active_status`,`user_level`) values ('$admin_name','$password',1,7)"); 
		// $res=($conn,$sql);
        //1 to show data
       
		if($sql==TRUE)
			{
                echo "<script>location.replace('../admin_add.php?success=success&&add_admin=add_admin');</script>";
                // echo mysqli_error($conn);
				// echo" Sample Added Successfully !!";
				// print_r($res);
				// echo mysqli_error($conn);
			}
		else 
			{
				echo "<script>location.replace('../admin_add.php?success=error&&add_admin=add_admin');</script>";
                // echo" Fail To Added Sample";
                // echo mysqli_error($conn);
			}
	}
	else 
		{
			echo "<script>location.replace('../admin_add.php?success=data_exists&&add_admin=add_admin');</script>";
			
		}

}


if (isset($_POST['update_name'])) {  
		// $account_head_title = $_POST['account_head_title'];
		//$serial_number = $_POST['serial_number'];
	    $admin_name = $_POST['admin_name'];
	    $id = $_POST['id'];

        $update=mysqli_query($conn,"UPDATE ratul_login SET username = '$admin_name' WHERE id = '$id'");
		 if($update==true)
		 {
			echo "<script>location.replace('../admin_add.php?success=success&&add_admin=add_admin');</script>";
			// echo" Sample updated successfully !!!";
		 }
			else {
			echo "<script>location.replace('../admin_add.php?success=error');</script>";
			}

        }
        
		
		
if (isset($_POST['update_password'])) {  
		// $account_head_title = $_POST['account_head_title'];
		//$serial_number = $_POST['serial_number'];
	    // $admin_name = $_POST['admin_name'];
	    $id = $_POST['id'];
        $password=hash('sha512',$_POST['password']);
        $old_password=hash('sha512',$_POST['old_password']);

        $user_list=mysqli_query($conn,"SELECT * from ratul_login WHERE id = $id and password = '$old_password'");

        if(mysqli_num_rows($user_list) > 0){
        $update=mysqli_query($conn,"UPDATE ratul_login SET password='$password' WHERE id = '$id'");
		 if($update==true)
		 {
			echo "<script>location.replace('../admin_add.php?success=success&&add_admin=add_admin');</script>";
			// echo" Sample updated successfully !!!";
		 }
			else {
			echo "<script>location.replace('../admin_add.php?success=error');</script>";
			}

        }
        else {
			echo "<script>location.replace('../admin_add.php?success=notmatch');</script>";
		}
        
		
		}

		// Delete Query Of Sample List.

if (isset($_GET['delete'])) {
 	 
	  $id = $_GET['id'];
	  $delete=mysqli_query($conn,"UPDATE ratul_login SET active_status = 0 WHERE id = '$id'");
	  
	 	if($delete==true){
			echo "<script>location.replace('../admin_add.php?success=success&add_admin=add_admin');</script>";
			// echo"Deleted Sample List Successfully";
		}
	else {
		echo "<script>location.replace('../admin_add.php?success=error&add_admin=add_admin');</script>";
	// echo"Failed To Delete Sample List ";

		}
		}
if (isset($_GET['status'])) {
	 $id = $_GET['id'];
	 $admin_st = $_GET['admin_st'];

	 if ($admin_st == 1) {
		$st = 0;
	 }
	 else{
		$st = 1;
	 }
	 
	  $delete=mysqli_query($conn,"UPDATE ratul_login SET active_status = $st WHERE id = '$id'");
	  
	 	if($delete==true){
			echo "<script>location.replace('../admin_add.php?success=success&add_admin=add_admin');</script>";
			// echo"Deleted Sample List Successfully";
		}
	else {
		echo "<script>location.replace('../admin_add.php?success=error&add_admin=add_admin');</script>";
	// echo"Failed To Delete Sample List ";

		}
}


?>