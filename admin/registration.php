 <?php 
session_start();
 include'connect/config.php'; 
 if(isset($_POST['registration']))
      {
//below from form 1


//below from  form 2


      //below part from form 3
	  /* merging alll*/
		$sponsor=mysqli_real_escape_string($_SESSION['sponsor']); 
		$position=$_SESSION['position']; 
		$userid=mysqli_real_escape_string($_SESSION['username']);
		$password=hash('sha512',$_SESSION['password']);
		$conpass=mysqli_real_escape_string($_SESSION['conpass']);
		$email=mysqli_real_escape_string($_SESSION['email']);
		$first_name=$_SESSION['first_name'];
		$last_name=$_SESSION['last_name'];
		$dob=$_SESSION['dob'];
		$curency=$_SESSION['curency'];
		$contpass=mysqli_real_escape_string($_SESSION['tpass']);	  
		/* merging all */
		$address=$_POST['address'];
		$city=$_POST['city'];
		$country=$_POST['country'];
		$postal_code=$_POST['postal_code'];
		$region=$_POST['region'];
		$mobile_no=$_POST['mobile_no'];
		$district=$_POST['district'];
		$blood_group=$_POST['blood_group'];
		$gender=$_POST['gender'];
		$role=4;
	if(!empty($userid))
		{
	//upper part from form 3	

		//below for get the sponsor position id
		 $sponsor_position_id="select position_id from ratul_login where username='$sponsor'";
		 $sponsor_position_id_p=mysqli_query($conn,$sponsor_position_id);
		 if($sponsor_position_id_p==true)
				{
					while($sdata=mysqli_fetch_array($sponsor_position_id_p))
					         {
							   $ref_position=$sdata['0'];
							 }
									 
				}
if($position=="Left")
             {
 //for left we will use 1
 $mmm="^(";
 $nnn="[1]*)$";
 $bo =$mmm.$ref_position.$nnn;
$get_parent="SELECT '$ref_position' Refferel_node, MAX(position_id) as parent_node,CONCAT(MAX(position_id),'1') 
child_position FROM ratul_login WHERE position_id REGEXP '$bo'";
$get_parent_p=mysqli_query($conn,$get_parent);
if($get_parent_p==true)
        {
		  while($pd=mysqli_fetch_array($get_parent_p))
		         {
				   $ref_node=$pd['0'];
				   $parent=$pd['1'];
				   $child=$pd['2'];
				  }
		}

							 
						     	 
				}
elseif($position=="Right")
        {
/* SELECT '1' Refferel_node, MAX(position_id) as parent_node,CONCAT(MAX(position_id),'0') 
cild_position FROM ratul_login WHERE position_id REGEXP '^(1[0]*)$'
/* SELECT '1' Refferel_node, MAX(position_id) as parent_node,CONCAT(MAX(position_id),'0') 
cild_position FROM ratul_login WHERE position_id REGEXP '^(1[0]*)$' */
 //for Right we will use 0
/*   $bo = "^(".$ref_position."[0]*)$";
$get_parent="SELECT '$ref_position' Refferel_node, MAX(position_id) as parent_node,CONCAT(MAX(position_id),'0') 
cild_position FROM ratul_login WHERE position_id REGEXP '$bo'"; */

 //for Right we will use 0
 $mmm="^(";
 $nnn="[0]*)$";
 $bo =$mmm.$ref_position.$nnn;
$get_parent="SELECT '$ref_position' Refferel_node, MAX(position_id) as parent_node,CONCAT(MAX(position_id),'0') 
child_position FROM ratul_login WHERE position_id REGEXP '$bo'";
$get_parent_p=mysqli_query($conn,$get_parent);
if($get_parent_p==true)
        {
		  while($pd=mysqli_fetch_array($get_parent_p))
		          {
				   $ref_node=$pd['0'];
				   $parent=$pd['1'];
				   $child=$pd['2'];
				  }
		}
	
		
		}			 				
		//upper for get the sponsor position id
		$par_info="select username from ratul_login where position_id='$parent'";
		$par_info_p=mysqli_query($conn,$par_info);
		if($par_info_p==true)
		     {
			   while($pr=mysqli_fetch_array($par_info_p))
			           {
						   $placement=$pr['0'];
						   
						}
			  }
		//check this username exist or not
		$check="select * from ratul_login where username='$userid'";
		$check_p=mysqli_query($conn,$check);
		if($check_p==true)
		  {
		$check_pc=mysqli_num_rows($check_p);
		if($check_pc==0)
		         {
			//$ins="insert into ratul_login values('','$userid','$position','$email','$mobile_no','$country','$region',1,1,'','','$sponsor','$placement','0.00',1,1,'$child','$parent','','0.00',now(),now(),'$password','$role','','$first_name','$last_name','$curency','$postal_code','$contpass','$address','$dob','')";	
			$ins="insert into ratul_login values('','$userid','$position','$email','$mobile_no','$country','$region',1,1,'','','$sponsor','$placement','0.00',1,1,'$child','$parent','','0.00',now(),now(),'$password','$role','','$first_name','$last_name','$curency','$postal_code','$contpass','$address','$dob','','$district','$blood_group','$gender','0')";	
			$ins_p=mysqli_query($conn,$ins);
			if($ins_p==true)
			             {

$to = "$email";
$subject = "Registration Successfully Done";
$link="http://www.portcity.com";
$pic="<div style='padding:10px 10px;'><img src='$link/images/logo.png' alt='Eurocoinbet' /></div>";
$message = "
<html>
<head>
<title>Registration Information For $userid</title>
</head>
<body>
$pic
<h3>Dear $userid ,</h3>

<p>Your New Registration is Successfully Processed</p>
<p>Your Login Details as Below :</p>


<table rules='all' style='border-color: #666;' cellpadding='10'>
<tr style='background: #eee;'>
<td><h4 class="alert-heading">First Name:</h4> </td>
<td>$first_name</td>
</tr>
<tr style='background: #eee;'>
<td><h4 class="alert-heading">Last Name:</h4> </td>
<td>$last_name</td>
</tr>
<tr style='background: #eee;'>
<td><h4 class="alert-heading">Email:</h4> </td>
<td>$email</td>
</tr>
</tr>
<tr style='background: #eee;'>
<td><h4 class="alert-heading">Contact No:</h4> </td>
<td>$mobile_no</td>
</tr>
</tr>
<tr style='background: #eee;'>
<td><h4 class="alert-heading">Sponsor Id:</h4> </td>
<td>$sponsor</td>
</tr>
<tr style='background: #eee;'>
<td><h4 class="alert-heading">Introducer Id:</h4> </td>
<td>$placement</td>
</tr>
<tr style='background: #eee;'>
<td><h4 class="alert-heading">Position:</h4> </td>
<td>$position</td>
</tr>
<tr style='background: #eee;'>
<td><h4 class="alert-heading">Password :</h4> </td>
<td>$password</td>
</tr>
<tr style='background: #eee;'>
<td><h4 class="alert-heading">Transaction Password :</h4> </td>
<td>$contpass</td>
</tr>
</table>
<p>If you encounter any issues,let us know on the support page.</p>
<p>Best Regrards</p>
<p>Admin</p>
<p>www.portcity.com</p>
<p>info@portcity.com</p>

</body>
</html>
";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@portcity.com>' . "\r\n";
$headers .= 'Cc: ' . "\r\n";  
$headers .= 'Cc: ' . "\r\n";  
           $ratul=mail($to,$subject,$message,$headers);
		   if($ratul==true)
		   {
		echo "<script language= 'JavaScript'>alert('Registration Successfully Done.Please Check your Email for Further Information!');</script>";											
        echo '<script> location.replace("index.php"); </script>';  		
		   }
		   else
		   {
		echo "<script language= 'JavaScript'>alert('Registration Successfully Done.Please Check your Email for Further Information!Mail Problem..!');</script>";											
        echo '<script> location.replace("index.php"); </script>';  			
			 
			   }
	   
	   
						 }	
						 else
						 {
		echo "<script language= 'JavaScript'>alert('Registration Failed!');</script>";											
        echo '<script> location.replace("index.php"); </script>';  
							 
							 } 
					 	 
					 
					}
		else
		        {
					
				  //header('Location:../manage_user.php?success=userexists');	
		echo "<script language= 'JavaScript'>alert('Username Already Exist..!');</script>";											
        echo '<script> location.replace("signup.php"); </script>';  	   
				}		 
		  }
		//check this username exist or not
		}
		else
		{
		echo "<script language= 'JavaScript'>alert('Username Cant be Null..!');</script>";											
        echo '<script> location.replace("signup.php"); </script>';  		
			}
	  }
 
 
  ?>