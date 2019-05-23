<?php 

 include'../../connect/config.php'; 
 
 if (isset($_POST['add_new_esheba'])) {
 	 $esheba_title = $_POST['esheba_title'];
 	 $esheba_type = $_POST['esheba_type'];
 	 $esheba_link = $_POST['esheba_link'];

 	 $usernamee = $_POST['username'];
 	 $add_esheba=mysqli_query($conn,"INSERT into central_esheba values('','$esheba_title','$esheba_type','$esheba_link','$usernamee',now(),now())");
	 	if($add_esheba==true){
		echo "<script> location.replace('../add_esheba.php?success=esheba_success&add_esheba=list_esheba'); </script>";
	 	
			}
			else {
				echo "<script> location.replace('../add_esheba.php?success=esheba_error&add_esheba=list_esheba'); </script>";
			}
		}

if (isset($_POST['update_esheba'])) {
 	 $esheba_title = $_POST['esheba_title'];
 	 $esheba_type = $_POST['esheba_type'];
 	 $esheba_id = $_POST['esheba_id'];
 	  $esheba_link = $_POST['esheba_link'];
 	 $update_esheba=mysqli_query($conn,"UPDATE central_esheba SET title = '$esheba_title',type = '$esheba_type',link = '$esheba_link' WHERE id = '$esheba_id'");

	 	if($update_esheba==true){
		echo "<script> location.replace('../add_esheba.php?success=esheba_success&add_esheba=list_esheba'); </script>";
	 	
			}
			else {
				echo "<script> location.replace('../add_esheba.php?success=esheba_error&add_esheba=list_esheba'); </script>";
			}
		}

if (isset($_GET['esheba_delete'])) {
 	 
 	 $esheba_id = $_GET['esheba_id'];
 	 $delete_esheba=mysqli_query($conn,"UPDATE central_esheba SET type = 3 WHERE id = '$esheba_id'");

	 	if($delete_esheba==true){
		echo "<script> location.replace('../add_esheba.php?success=esheba_success&add_esheba=list_esheba'); </script>";
	 	
			}
			else {
				echo "<script> location.replace('../add_esheba.php?success=esheba_error&add_esheba=list_esheba'); </script>";
			}
		}
?>