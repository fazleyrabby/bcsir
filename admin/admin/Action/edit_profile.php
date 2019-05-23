<?php

 include'../../connect/config.php'; 
 if(isset($_POST['submit']))
   {
        $edit_id=$_POST['edit_id'];
		$email=$_POST['email'];
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$dob=$_POST['dob'];
		$curency=$_POST['curency'];
		$address=$_POST['address'];
		$city=$_POST['city'];
		$country=$_POST['country'];
		$postal_code=$_POST['postal_code'];
		$region=$_POST['region'];
		$mobile_no=$_POST['mobile_no'];
		$role=$_POST['role'];
		$payment_process=$_POST['payment_process'];
		$payment_process_id=$_POST['payment_process_id'];
		$bank_det=mysqli_real_escape_string($_POST['bank_det']);
		$update="update ratul_login set email='$email',contact_no='$mobile_no',country='$country',states='$region',First_name='$first_name',Last_name='$last_name',currency='$curency',postal_code='$postal_code',
		address='$address',date_of_birth='$dob',acc_name='$payment_process',acc_num='$payment_process_id',bank_details='$bank_det' where id='$edit_id'";
		$update_p=mysqli_query($conn,$update);
		if($update_p==true)
                 {
				 
			   //header('Location:../dashboard.php?success=success_profile_update');
	echo"<script> location.replace('../dashboard.php?success=success_profile_update'); </script>"; 
				 }
else
                 {
				 
			  // header('Location:../dashboard.php?success=success_profile_fail'); 
echo"<script> location.replace('../dashboard.php?success=success_profile_fail'); </script>";  
				 }

   }
 elseif(isset($_POST['change_pass']))
        {
		 $edit_id=$_POST['edit_id'];
		 $curpassword=$_POST['curpassword'];
		 
		 $password= hash('sha512',$_POST['password']);
		 $conpass=$_POST['conpass'];
		  $lvl=$_POST['lvl'];
		  if($lvl==1)
		  {
		$update="update ratul_login set password='$password' where id='$edit_id'";
		$update_p=mysqli_query($conn,$update);
		if($update_p==true)
		   {
			  // header('Location:../dashboard.php?success=success_pass_update');
			  //user_list.php?role=4&member=member&package=1&active_status=1
echo"<script> location.replace('../dashboard.php?success=success_pass_update'); </script>";   
			  
			  }
	    else
		   {
			    //header('Location:../dashboard.php?success=success_pass_fail');
echo"<script> location.replace('../dashboard.php?success=success_pass_fail'); </script>"; 
			   
			  }	  
			  }
		  {
		 //check current pass is ok or not
		 $cpass=mysqli_query($conn,"select password from ratul_login where id='$edit_id' and password='$curpassword'");
		 $cpass_p=mysqli_num_rows($cpass);
		 if($cpass_p!=0)
		 {
		$update="update ratul_login set password='$password' where id='$edit_id'";
		$update_p=mysqli_query($conn,$update);
		if($update_p==true)
		   {
			  // header('Location:../dashboard.php?success=success_pass_update');
echo"<script> location.replace('../dashboard.php?success=success_pass_update'); </script>";   
			  
			  }
	    else
		   {
			    //header('Location:../dashboard.php?success=success_pass_fail');
echo"<script> location.replace('../dashboard.php?success=success_pass_fail'); </script>"; 
			   
			  }	
		 }
		 else
		    {
				echo"<script> location.replace('../dashboard.php?success=old_pass_wrong'); </script>"; 
				}
		  }
	    }  
 elseif(isset($_POST['change_tpass']))
        {
		 $edit_id=$_POST['edit_id'];
		 $password=$_POST['password'];
		 $conpass=$_POST['conpass'];
		 $oldpassword=$_POST['oldpassword'];
		 $lvl=$_POST['lvl'];
		 if($lvl==1)
		 {
		$update="update ratul_login set t_pass='$password' where id='$edit_id'";
		$update_p=mysqli_query($conn,$update);
		if($update_p==true)
		   {
			  // header('Location:../dashboard.php?success=success_tpass_update'); 
echo"<script> location.replace('../dashboard.php?success=success_tpass_update'); </script>"; 
			  
			  }
	    else
		   {
			   // header('Location:../dashboard.php?success=success_tpass_fail');
echo"<script> location.replace('../dashboard.php?success=success_tpass_fail'); </script>"; 
			   
			  } 
			 
			 }
		 else
		 {
		 $cpass=mysqli_query($conn,"select t_pass from ratul_login where id='$edit_id' and t_pass='$oldpassword'");
		 $cpass_p=mysqli_num_rows($cpass);
		 if($cpass_p!=0)
		 {
		$update="update ratul_login set t_pass='$password' where id='$edit_id'";
		$update_p=mysqli_query($conn,$update);
		if($update_p==true)
		   {
			  // header('Location:../dashboard.php?success=success_tpass_update'); 
echo"<script> location.replace('../dashboard.php?success=success_tpass_update'); </script>"; 
			  
			  }
	    else
		   {
			   // header('Location:../dashboard.php?success=success_tpass_fail');
echo"<script> location.replace('../dashboard.php?success=success_tpass_fail'); </script>"; 
			   
			  }
		 }
		 else
		       {
	echo"<script> location.replace('../dashboard.php?success=old_tpass_wrong'); </script>";
				}
		 }
	    } 
 elseif(isset($_POST['change_pic']))
        {
$userid=$_POST['edit_id'];
$valid_formats = array("jpg", "png", "gif", "zip", "bmp","JPG","JPEG","GIF","gif","PNG");
$max_file_size = 1024*10000000000000000000000000000; //100 kb
$path = "uploads/"; // Upload directory
$count = 0;

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to exeicute all files
	
	foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) {
	        //Below for Upload if Image is not Chosen
				
			 //header('Location:../dashboard.php?success=picture_select');
echo"<script> location.replace('../dashboard.php?success=picture_select'); </script>"; 	

			//Upper for Upload if image is not chosen
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";

					 //header('Location:../dashboard.php?success=picture_large');
echo"<script> location.replace('../dashboard.php?success=picture_large'); </script>"; 	
	        }

			elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
				$message[] = "$name is not a valid format";
// header('Location:../dashboard.php?success=picture_invalid');
 echo"<script> location.replace('../dashboard.php?success=picture_invalid'); </script>"; 
			}
	        else{ // No error found! Move uploaded files
			$ratul=rand().$name; 

              if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$ratul))
				$count++; // Number of successfully uploaded file
				//below for inserting image path in database
				//Check Leve of user
				
								$cat="update ratul_login set profile_pic='$ratul' where id=$userid";
				$cat_p=mysqli_query($conn,$cat);
				if($cat_p==true)
				    {

 //header('Location:../dashboard.php?success=picture_success');
 echo"<script> location.replace('../dashboard.php?success=picture_success'); </script>"; 					
					}
				else
				    {
					
					  echo mysqli_error($conn);
					}   
							   
							
			
				//Check Level of User
				
				
					}
				
				//Upper for imserting image in database
				
				
	        
	    }
	}
}
}
 elseif(isset($_POST['nid_up']))
        {
$userid=$_POST['edit_id'];
$ftype=$_POST['ftype'];
$valid_formats = array("jpg", "png", "gif", "zip", "bmp","JPG","JPEG","GIF","gif","PNG");
$max_file_size = 1024*10000000000000000000000000000; //100 kb
$path = "uploads/"; // Upload directory
$count = 0;

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to exeicute all files
	
	foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) {
	        //Below for Upload if Image is not Chosen
				
			 //header('Location:../dashboard.php?success=picture_select');
echo"<script> location.replace('../dashboard.php?success=picture_select'); </script>"; 	

			//Upper for Upload if image is not chosen
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";

					 //header('Location:../dashboard.php?success=picture_large');
echo"<script> location.replace('../dashboard.php?success=picture_large'); </script>"; 	
	        }

			elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
				$message[] = "$name is not a valid format";
// header('Location:../dashboard.php?success=picture_invalid');
 echo"<script> location.replace('../dashboard.php?success=picture_invalid'); </script>"; 
			}
	        else{ // No error found! Move uploaded files
			$ratul=rand().$name; 

              if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$ratul))
				$count++; // Number of successfully uploaded file
				//below for inserting image path in database
				//Check Leve of user
				
								$cat="insert into file_type values('','$ftype','$userid',now(),'$ratul')";
				$cat_p=mysqli_query($conn,$cat);
				if($cat_p==true)
				    {

 //header('Location:../dashboard.php?success=picture_success');
 echo"<script> location.replace('../dashboard.php?success=picture_success_nid'); </script>"; 					
					}
				else
				    {
					
					  echo mysqli_error($conn);
					}   
							   
							
			
				//Check Level of User
				
				
					}
				
				//Upper for imserting image in database
				
				
	        
	    }
	}
}
}
 elseif(isset($_GET['change_status']))
         {
		$edit_user_id=$_GET['edit_user_id']; 
		$act_st=$_GET['act_st'];
		$rr=$_GET['rr'];
		$pp=$_GET['pp'];
		$a=$_GET['a'];
		if($act_st==1)
		     {
				$up=mysqli_query($conn,"update ratul_login set active_status='0' where id='$edit_user_id'");
				if($up==true)
				     {
						 //user_list.php?role=4&member=member&package=2&active_status=1
		 //header("Location:../user_list.php?role=$rr&member=member&package=$pp&active_status=$a&success=make_inactive"); 
echo"<script> location.replace('../user_list.php?role=$rr&member=member&package=$pp&active_status=$a&success=make_inactive'); </script>"; 
					 } 
			  }
		else
		     {

				$up=mysqli_query($conn,"update ratul_login set active_status='1' where id='$edit_user_id'");
				if($up==true)
				     {
						 //user_list.php?role=4&member=member&package=2&active_status=1
		// header("Location:../user_list.php?role=$rr&member=member&package=$pp&active_status=$a&success=active"); 
echo"<script> location.replace('../user_list.php?role=$rr&member=member&package=$pp&active_status=$a&success=active'); </script>";  
					 } 
			  	 
			  }	  
			 
	   }
   else
    {
 //header('Location:../dashboard.php?success=submit_failed');
echo"<script> location.replace('../dashboard.php?success=submit_failed'); </script>";  

 
		}
?>