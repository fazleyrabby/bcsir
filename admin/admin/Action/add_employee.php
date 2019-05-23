<?php 
include '../../connect/config.php'; 

if (isset($_POST['add_employee']))  //Adding New employee
{   
	$employee_id = $_POST['employee_id'];
	$employee_designation = $_POST['designation'];
    $employee_grade = $_POST['employee_grade'];
    $employee_department = $_POST['employee_department'];
	$employee_name = $_POST['employee_name'];
	$employee_join_date = $_POST['employee_join_date'];
	$basic_salary = $_POST['basic_salary'];
	$employee_serial = $_POST['employee_serial'];
	$employee_type = $_POST['employee_type'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$employee_details_other = $_POST['employee_details_other'];
	//for login
	$username = $_POST['emp_username'];
	$password=hash('sha512',$_POST['password']);
	//for login
	if ($employee_type == 1) 
		{
		$user_level = 5; //for employee
		}
		elseif ($employee_type == 2) 
		{
			$user_level = 6; //for scientist
		}	
		elseif($employee_type == 4) 
		{
			$user_level = 2; //for accounts
		}
		else 
		{
			$user_level = $user_level;
		}
	$cv_file=$_FILES['cv_file']['name'];
	$name=$_FILES['files']['name'];

	$valid_formats = array("jpg", "png", "gif", "zip","bmp","JPG","JPEG","GIF","gif","PNG","doc","pdf","jpeg","docx");
	$max_file_size = 1024*2000000000000000000000000000000000000000000000000000000000000000; //100 kb
	$path = "uploads/"; // Upload directory
	$cv_path = "uploads/employee_cv"; // Upload directory
	$count = 0;

	$employee_ins=mysqli_query($conn,"SELECT * FROM employee_details WHERE employee_id='$employee_id'");	
	if(mysqli_num_rows($employee_ins) == 0)
	{
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to exeicute all files
	
	// foreach ($_FILES['files']['name'] as $f => $name) {     
		if(($name == '') && ($cv_file == '')) 
		{ 
			$cat="INSERT into employee_details (`designation`,`employee_name`,`employee_id`,`employee_department`,`employee_grade`,`join_date`,`employee_st`,`created_at`,`updated_at`,`basic_salary`,`employee_serial`,`employee_type`,`email`,`contact_no`,`employee_details_other`) values('$employee_designation','$employee_name','$employee_id','$employee_department','$employee_grade','$employee_join_date',1,now(),now(),'$basic_salary','$employee_serial','$employee_type','$email','$contact','$employee_details_other')";
				$cat_p=mysqli_query($conn,$cat);
				if($cat_p==true)
				    {
					$reg = mysqli_query($conn,"INSERT into ratul_login (`employee_id`,`username`,`user_level`,`password`,`active_status`,`email`,`contact_no`) values ('$employee_id','$username','$user_level','$password',1,'$email','$contact')");
					if($reg == true) 
					{
						echo "<script>location.replace('../employee.php?success=success&employee=employee_list');</script>";
						// echo mysqli_error($conn);
					}
					else 
					{
						echo mysqli_error($conn);
					}


				//header('Location:../dashboard.php?success=picture_success');
			// echo "<script>location.replace('../employee.php?success=success&employee=employee_list');</script>";
							
					}
					else 
					{
						echo mysqli_error($conn);
					}	

			//Upper for Upload if image is not chosen
	    }	       
		// if ($_FILES['files']['error'] == 0 && $_FILES['cv_file']['error'] == 0) 
	
		else{	           
	        if ($_FILES['files']['size'] > $max_file_size && $_FILES['cv_file']['error']> $max_file_size) {
	            $message[] = "$name is too large!.";
				//header('Location:../dashboard.php?success=picture_large');
				echo "<script>location.replace('../employee.php?success=error&employee=add_employee');</script>";
				// echo mysqli_error($conn);
	
			}
	        else{ // No error found! Move uploaded files
			$ratul=rand().$name; 
			$cv=rand().$cv_file; 
// && move_uploaded_file($_FILES["cv_file"]["tmp_name"][$f],$cv_path.$cv
			//   if(move_uploaded_file($_FILES["files"]["tmp_name"], $path.$ratul) && move_uploaded_file($_FILES["cv_file"]["tmp_name"],$path.$cv))
			//   {
			// 	  $cat="INSERT into employee_details (`cv_file`,`images`,`designation`,`employee_name`,`employee_id`,`employee_department`,`employee_grade`,`join_date`,`employee_st`,`created_at`,`updated_at`,`basic_salary`,`employee_serial`,`employee_type`) values('$cv','$ratul','$employee_designation','$employee_name','$employee_id','$employee_department','$employee_grade','$employee_join_date',1,now(),now(),'$basic_salary','$employee_serial','$employee_type')";
			//   }	



		if($name != '' && $cv_file == '') 
		{
			move_uploaded_file($_FILES["files"]["tmp_name"],$path.$ratul);
			  {
				  $cat="INSERT into employee_details (`images`,`designation`,`employee_name`,`employee_id`,`employee_department`,`employee_grade`,`join_date`,`employee_st`,`created_at`,`updated_at`,`basic_salary`,`employee_serial`,`employee_type`,`email`,`contact_no`,`employee_details_other`) values('$ratul','$employee_designation','$employee_name','$employee_id','$employee_department','$employee_grade','$employee_join_date',1,now(),now(),'$basic_salary','$employee_serial','$employee_type','$email','$contact','$employee_details_other')";
			  }	
		}
		elseif($name == '' && $cv_file != '') 
		{
			move_uploaded_file($_FILES["cv_file"]["tmp_name"],$path.$cv);
			  {
				  $cat="INSERT into employee_details (`cv_file`,`designation`,`employee_name`,`employee_id`,`employee_department`,`employee_grade`,`join_date`,`employee_st`,`created_at`,`updated_at`,`basic_salary`,`employee_serial`,`employee_type`,`email`,`contact_no`,`employee_details_other`) values('$cv','$employee_designation','$employee_name','$employee_id','$employee_department','$employee_grade','$employee_join_date',1,now(),now(),'$basic_salary','$employee_serial','$employee_type','$email','$contact','$employee_details_other')";
			  }	
		}
		else 
		{
			move_uploaded_file($_FILES["cv_file"]["tmp_name"],$path.$cv);
			move_uploaded_file($_FILES["files"]["tmp_name"],$path.$ratul);
			  {
				  $cat="INSERT into employee_details (`images`,`cv_file`,`designation`,`employee_name`,`employee_id`,`employee_department`,`employee_grade`,`join_date`,`employee_st`,`created_at`,`updated_at`,`basic_salary`,`employee_serial`,`employee_type`,`email`,`contact_no`,`employee_details_other`) values('$ratul','$cv','$employee_designation','$employee_name','$employee_id','$employee_department','$employee_grade','$employee_join_date',1,now(),now(),'$basic_salary','$employee_serial','$employee_type','$email','$contact','$employee_details_other')";
			  }	
		}












			//   if(move_uploaded_file($_FILES["cv_file"]["tmp_name"],$path.$cv)){
			// 		$cat="INSERT into employee_details (`cv_file`,`designation`,`employee_name`,`employee_id`,`employee_department`,`employee_grade`,`join_date`,`employee_st`,`created_at`,`updated_at`,`basic_salary`,`employee_serial`,`employee_type`) values('$cv','$employee_designation','$employee_name','$employee_id','$employee_department','$employee_grade','$employee_join_date',1,now(),now(),'$basic_salary','$employee_serial','$employee_type')";
			//   }
			  
				$count++; // Number of successfully uploaded file
				//below for inserting image path in database
				//Check Leve of user
				
				$cat_p=mysqli_query($conn,$cat);
				if($cat_p==true)
				    {
					$reg = mysqli_query($conn,"INSERT into ratul_login (`employee_id`,`username`,`user_level`,`password`) values ('$employee_id','$username','$user_level','$password')");
					if($reg == true) 
						{
							// echo "success";
							echo "<script>location.replace('../employee.php?success=success&employee=employee_list');</script>";
						}
					else 
						{
							//echo mysqli_error($conn);
						}		

					}
				else
				    {
					echo mysqli_error($conn);
					}   
							   
							
			
				//Check Level of User
				
				
					}
				//Upper for imserting image in database		
	        
		}

	// }
}
	}
	else 
		{
			echo "<script>location.replace('../employee.php?success=data_exists&employee=add_employee');</script>";
			// echo "error";
		}


	

}
if(isset($_POST['admin_update']))
{
	$username = $_POST['username'];
	$password=hash('sha512',$_POST['password']);
	$re_pass=hash('sha512',$_POST['re_password']);
	$pre_password=hash('sha512',$_POST['pre_password']);
	$user_login = $_POST['user_login'];
	$id = $_POST['id'];


	$exist_username = mysqli_query($conn,"SELECT * from ratul_login where username = '$username' and id != '$id'");
	$count = mysqli_num_rows($exist_username);
		if ($count > 0) 
		{
			echo "<script>location.replace('../profile_update.php?success=username_exist');</script>";
		}
		else{
		if ($_POST['password'] == '' or $_POST['pre_password'] == '' or $_POST['re_password'] == '') {
			$reg = mysqli_query($conn,"UPDATE ratul_login set username ='$username' where id = '$id'");
			if ($reg == true) {
				echo "<script>location.replace('../profile_update.php?success=success');</script>";
			}
		}
		else {
		$pre_pass = mysqli_query($conn,"SELECT username,password from ratul_login where id = '$id' and password = '$pre_password'");
		$count = mysqli_num_rows($pre_pass);
		if ($count > 0) 
		{
			if ($password != $re_pass) 
			{
				{
				echo "<script>location.replace('../profile_update.php?success=password_not_match');</script>";
				// echo mysqli_error($conn);
				}
			}
			else {
				$reg = mysqli_query($conn,"UPDATE ratul_login set password ='$password' where id = $id");
				if ($reg == true) 
				{
				echo "<script>location.replace('../profile_update.php?success=success');</script>";
				// echo mysqli_error($conn);
				}
				else {
					echo mysqli_error($conn);
				}
			} 
		
		}
		else {
				echo "<script>location.replace('../profile_update.php?success=pre_pass_not_found');</script>";
		}

		
	}
		
}


	




}

if (isset($_POST['update_employee'])) 
{
		$employee_id = $_POST['employee_id'];
		$employee_designation = $_POST['designation'];
		$employee_grade = $_POST['employee_grade'];
		$employee_department = $_POST['employee_department'];
		$employee_name = $_POST['employee_name'];
		$employee_join_date = $_POST['employee_join_date'];
		$basic_salary = $_POST['basic_salary'];
		$employee_type = $_POST['employee_type'];
		$employee_serial = $_POST['employee_serial'];
		$level = $_POST['level'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];

		$employee_details_other = $_POST['employee_details_other'];
		//for login
		$username = $_POST['username'];
		$pass = $_POST['password'];
		$password=hash('sha512',$pass);

		if ($employee_type == 1) 
		{
		$user_level = 5; //for employee
		}
		elseif ($employee_type == 2) 
		{
			$user_level = 6; //for scientist
		}	
		elseif($employee_type == 4) {
			$user_level = 2; //for accounts
		}
		else {
			$user_level = $user_level;
		}
		//for login
	$cv_file=$_FILES['cv_file']['name'];
	$name=$_FILES['files']['name'];

	$valid_formats = array("jpg", "png", "gif", "zip","bmp","JPG","JPEG","GIF","gif","PNG","doc","pdf","jpeg","docx");
	$max_file_size = 1024*2000000000000000000000000000000000000000000000000000000000000000; //100 kb
	$path = "uploads/"; // Upload directory
	$cv_path = "uploads/employee_cv"; // Upload directory
	$count = 0;

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to exeicute all files
	
	// foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'] == 4 || ($_FILES['cv_file']['error'] == 4) ) {
				$cat="UPDATE employee_details SET employee_department = '$employee_department',designation='$employee_designation',employee_name ='$employee_name', employee_grade = '$employee_grade',join_date = '$employee_join_date', basic_salary = '$basic_salary',employee_serial = '$employee_serial',employee_type= '$employee_type',contact_no='$contact',email='$email',employee_details_other='$employee_details_other' WHERE employee_id = '$employee_id'";
				$cat_p=mysqli_query($conn,$cat);
				if($cat_p==true)
				    {
					$check_user = mysqli_query($conn,"SELECT * from ratul_login where employee_id = $employee_id or username = '$username'");
					$rows = mysqli_num_rows($check_user);
					if ($rows == 0) 
					{
						if ($password == '') 
						{ 
							$reg = mysqli_query($conn,"INSERT into ratul_login (`employee_id`,`username`,`user_level`,`active_status`,`delete_status`,`email`,`contact_no`) values ('$employee_id','$username','$user_level',1,1,'$email','$contact')");
						}
						else 
						{
							$reg = mysqli_query($conn,"INSERT into ratul_login (`employee_id`,`username`,`user_level`,`password`,`active_status`,`delete_status`,`email`,`contact_no`) values ('$employee_id','$username','$user_level','$password',1,1,'$email','$contact')");
						}
						if($reg == true) 
						{
							if ($level != 1) 
							{
								echo "<script>location.replace('../profile_update.php?employee_id=$employee_id');</script>";
							}
							else
							{
								echo "<script>location.replace('../employee.php?success=success&employee=employee_list');</script>";
							}
						}
						else 
						{
							echo mysqli_error($conn);
						}
					}
					else
					{  
						if ($pass == '') {
					
						$reg = mysqli_query($conn,"UPDATE ratul_login set username='$username',user_level='$user_level',email='$email',contact_no='$contact' where employee_id='$employee_id'");
					}
					else {
						$reg = mysqli_query($conn,"UPDATE ratul_login set username='$username',user_level='$user_level',email='$email',contact_no='$contact',password='$password' where employee_id='$employee_id'");
					}
						
						if ($reg == true) 
						{
						if($level != 1) 
						{
								echo "<script>location.replace('../profile_update.php?employee_id=$employee_id');</script>";
							}
							else
							{
								echo "<script>location.replace('../employee.php?success=success&employee=employee_list');</script>";
							}
						}
						else
						{
						echo "<script>location.replace('../employee.php?success=error&employee=employee_list');</script>";
						}
					// }

					}
				}
					else
				    {
					echo "<script>location.replace('../employee.php?success=update_error&employee=update_employee&employee_id=$employee_id');</script>";
					// echo mysqli_error($conn);
					} 	

			//Upper for Upload if image is not chosen
	    }	       
	    if ($_FILES['files']['error'] == 0 || $_FILES['cv_file']['error'] == 0) {	           
	        if ($_FILES['files']['size'] > $max_file_size || $_FILES['cv_file']['size'] > $max_file_size) {
	            $message[] = "$name is too large!.";

					 //header('Location:../dashboard.php?success=picture_large');
				echo "<script>location.replace('../employee.php?success=update_error&employee=update_employee&employee_id=$employee_id');</script>";
				// echo mysqli_error($conn);
	
			}
	        else{ // No error found! Move uploaded files
			$ratul=rand().$name; 
			$cv=rand().$cv_file; 

			  if(move_uploaded_file($_FILES["files"]["tmp_name"], $path.$ratul)){
				  $cat="UPDATE employee_details SET employee_department = '$employee_department',designation='$employee_designation',employee_name ='$employee_name', employee_grade = '$employee_grade',join_date = '$employee_join_date', basic_salary = '$basic_salary', images='$ratul', employee_serial = '$employee_serial',employee_type= '$employee_type' , contact_no='$contact',email='$email',employee_details_other='$employee_details_other' WHERE employee_id = '$employee_id'";
			  }
			  if(move_uploaded_file($_FILES["cv_file"]["tmp_name"], $path.$cv)){
				  $cat="UPDATE employee_details SET cv_file='$cv', employee_department = '$employee_department',designation='$employee_designation',employee_name ='$employee_name', employee_grade = '$employee_grade',join_date = '$employee_join_date', basic_salary = '$basic_salary', employee_serial = '$employee_serial',employee_type= '$employee_type',contact_no='$contact',email='$email',employee_details_other='$employee_details_other' WHERE employee_id = '$employee_id'";
			  }
				$count++; // Number of successfully uploaded file
				//below for inserting image path in database
				//Check Leve of user
				
				$cat_p=mysqli_query($conn,$cat);
				if($cat_p==true)
				    {
					$check_user = mysqli_query($conn,"SELECT * from ratul_login where employee_id = $employee_id and username = '$username'");
					$rows = mysqli_num_rows($check_user);
					if ($rows == 0) 
					{
						if ($pass == '') 
						{
							$reg = mysqli_query($conn,"INSERT into ratul_login (`employee_id`,`username`,`user_level`,`active_status`,`delete_status`,`email`,`contact_no`) values ('$employee_id','$username','$user_level',1,1,'$email','$contact')");
						}
						else 
						{
							$reg = mysqli_query($conn,"INSERT into ratul_login (`employee_id`,`username`,`user_level`,`password`,`active_status`,`delete_status`,`email`,`contact_no`) values ('$employee_id','$username','$user_level','$password',1,1,'$email','$contact')");
						}
						if($reg == true) 
						{
							if ($level != 1) 
							{
								echo "<script>location.replace('../profile_update.php?employee_id=$employee_id');</script>";
							}
							else
							{
								echo "<script>location.replace('../employee.php?success=success&employee=employee_list');</script>";
							}
						}
						else 
						{
							echo mysqli_error($conn);
						}
					}
					else
					{ if ($pass == '') 
						{
						$reg = mysqli_query($conn,"UPDATE ratul_login set username='$username',user_level='$user_level',email='$email',contact_no='$contact' where employee_id='$employee_id'"); 
						 }
						 else
						 {
							$reg = mysqli_query($conn,"UPDATE ratul_login set username='$username',user_level='$user_level',password='$password',email='$email',contact_no='$contact' where employee_id='$employee_id'");
						 }
						
						if ($reg== true) 
						{
						if ($level != 1) 
							{
								echo "<script>location.replace('../profile_update.php?employee_id=$employee_id');</script>";
							}
							else
							{
								echo "<script>location.replace('../employee.php?success=success&employee=employee_list');</script>";
							}
						}
						else
						{
							if ($level != 1) {
							echo "<script>location.replace('../profile_update.php?employee_id=$employee_id&&success=error');</script>";
							}
							else
							{
								echo "<script>location.replace('../employee.php?success=error&employee=employee_list');</script>";
							}
						}
					}
					}
				else
				    {
					echo "<script>location.replace('../employee.php?success=update_error&employee=update_employee&employee_id=$employee_id');</script>";
					// echo mysqli_error($conn);
					}   		
			
				//Check Level of User
				
				
					}
				//Upper for imserting image in database		
	        
	    }
	// }
}
		// $update_notice=mysqli_query($conn,"UPDATE employee_details SET employee_department = '$employee_department',designation='$employee_designation',employee_name ='$employee_name', employee_grade = '$employee_grade',join_date = '$employee_join_date', basic_salary = '$basic_salary',employee_serial = '$employee_serial',employee_type= '$employee_type' WHERE employee_id = '$employee_id'");
		//  if($update_notice==true)
		//  {
		// 	echo "<script>location.replace('../employee.php?success=update_success&employee=employee_list');</script>";
		//  }
		// 	else {
		// 	echo "<script>location.replace('../employee.php?success=update_error&employee=update_employee&employee_id=$employee_id');</script>";
		// 	}
		}

if (isset($_GET['employee_delete'])) { //Deleting\\Updating employee
 	 $employee_id = $_GET['employee_id'];
	  $delete_employee=mysqli_query($conn,"UPDATE employee_details SET employee_st = 0 WHERE employee_id = $employee_id");
	 	if($delete_employee==true){
	echo "<script>location.replace('../employee.php?success=deleted&employee=employee_list');</script>";
	
		}
	else{
	echo "<script>location.replace('../employee.php?success=error&employee=employee_list');</script>";
	
		}
		}


?>