<?php 

 include'../../connect/config.php'; 
 
 if (isset($_POST['add_new_notice'])) {   //Adding New Notice
 	 $notice_title = $_POST['notice_title'];
 	 $notice_type = $_POST['notice_type'];
 	 $usernamee = $_POST['username'];
 	 $notice_description = $_POST['notice_description'];

 	 $add_notice=mysqli_query($conn,"INSERT into notice values('','$notice_type','$notice_title','$notice_description','$usernamee',now(),'') ");
	 	if($add_notice==true){
		echo "<script> location.replace('../add_notice.php?success=notice_success&add_notice=notice_list'); </script>";
			}
			else {
				echo "<script> location.replace('../add_notice.php?success=notice_error&add_notice=notice_list'); </script>";
			}
		}

if (isset($_POST['update_notice'])) {  //Update New Notice
 	 $notice_title = $_POST['notice_title'];
 	 $notice_type = $_POST['notice_type'];
 	 $notice_description = $_POST['notice_description'];
 	 $notice_id = $_POST['notice_id'];

 	 // $alldata = array($notice_title,$notice_type,$notice_description,$notice_id);
 	 // foreach ($alldata as $key) {
 	 // 	echo "$key";
 	 // }
 	 $update_notice=mysqli_query($conn,"UPDATE notice SET type = '$notice_type',notice_title = '$notice_title',notice_des = '$notice_description' WHERE id = '$notice_id'");

	 	if($update_notice==true){
		echo "<script> location.replace('../add_notice.php?success=notice_success&add_notice=notice_list'); </script>";
	 	
			}
			else {
				echo "<script> location.replace('../add_notice.php?success=notice_error&add_notice=notice_list'); </script>";
			}
		}

if (isset($_GET['notice_delete'])) { //Deleting New Notice
 	 
 	 $notice_id = $_GET['notice_id'];
 	 $delete_notice=mysqli_query($conn,"UPDATE notice SET type = 3 WHERE id = '$notice_id'");

	 	if($delete_notice==true){
		echo "<script> location.replace('../add_notice.php?success=notice_success&add_notice=notice_list'); </script>";
	 	
			}
			else {
				echo "<script> location.replace('../add_notice.php?success=notice_error&add_notice=notice_list'); </script>";
			}
		}

if (isset($_GET['notice_st'])) {  //Deleting New Notice
 	 
	$notice_id = $_GET['notice_id'];
	$notice_st = $_GET['st'];
 	if ($notice_st == 0) {
    	$notice_st = 1;
    }
    else {
    	$notice_st = 0;
    }

 	 $delete_notice=mysqli_query($conn,"UPDATE notice SET type = '$notice_st' WHERE id = '$notice_id'");

	 	if($delete_notice==true){
		echo "<script> location.replace('../add_notice.php?success=notice_success&add_notice=notice_list'); </script>";
	 	
			}
			else {
				echo "<script> location.replace('../add_notice.php?success=notice_error&add_notice=notice_list'); </script>";
			}
		}
?>