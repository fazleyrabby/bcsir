 <?php 

 include'../../connect/config.php'; 
 if(isset($_POST['submit']))
      {
		$sponsor=$_POST['sponsor']; 
		$position=$_POST['position']; 
		$userid=$_POST['username'];
		$password=$_POST['password'];
		$conpass=$_POST['conpass'];
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
		$contpass=$_POST['contpass'];
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
			$ins="insert into ratul_login values('','$userid','$position','$email','$mobile_no','$country','$region',1,1,'','','$sponsor','$placement','0.00',1,1,'$child','$parent','','0.00',now(),now(),'$password','$role','','$first_name','$last_name','$curency','$postal_code','$contpass','$address','$dob','')";	
			$ins_p=mysqli_query($conn,$ins);
			if($ins_p==true)
			             {

$to = "$email";
$subject = "Registration Successfully Done";
$link="http://payforearn.com";
$pic="<div style='padding:10px 10px;'><img src='$link/files/rv-logo.png' alt='Payforearn.com' /></div>";
$message = "
<html>
<head>
<title>Registration Information For $userid</title>
</head>
<body>
$pic
<h3 style='color:green'>Dear $userid ,</h3>

<p style='color:green'>Thanks For Registration</p>
<p style='color:green'>Your Login Details as Below :</p>
<table rules='all' style='border-color: #666;' cellpadding='10'>
<tr style='background: #eee;'>
<td><strong>First Name:</strong> </td>
<td>$first_name</td>
</tr>
<tr style='background: #eee;'>
<td><strong>Last Name:</strong> </td>
<td>$last_name</td>
</tr>
<tr style='background: #eee;'>
<td><strong>Email:</strong> </td>
<td>$email</td>
</tr>
</tr>
<tr style='background: #eee;'>
<td><strong>Contact No:</strong> </td>
<td>$mobile_no</td>
</tr>
</tr>
<tr style='background: #eee;'>
<td><strong>Sponsor Id:</strong> </td>
<td>$sponsor</td>
</tr>
<tr style='background: #eee;'>
<td><strong>Introducer Id:</strong> </td>
<td>$placement</td>
</tr>
<tr style='background: #eee;'>
<td><strong>Position:</strong> </td>
<td>$position</td>
</tr>
<tr style='background: #eee;'>
<td><strong>Password :</strong> </td>
<td>$password</td>
</tr>
<tr style='background: #eee;'>
<td><strong>Transaction Password :</strong> </td>
<td>$contpass</td>
</tr>
</table>
<p>If you encounter any issues,let us know on the support page.</p>
<p>Best Regrards</p>
<p>Admin</p>
<p>www.payforearn.com</p>
<p>info@payforearn.com</p>
</body>
</html>
";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@payforearn.com>' . "\r\n";
$headers .= 'Cc: payforearnall@gmail.com' . "\r\n";  
$headers .= 'Cc: payforearnall@gmail.com' . "\r\n";   
           $ratul=mail($to,$subject,$message,$headers);
		   if($ratul==true)
		   {
	//header('Location:../manage_user.php?success=success');
echo"<script> location.replace('../manage_user.php?success=success'); </script>";  		
		   }
		   else
		   {
			   	//header('Location:../manage_user.php?success=sucessmailfailed');
echo"<script> location.replace('../manage_user.php?success=sucessmailfailed'); </script>";  	
			 
			   }
	   
	   
						 }
						 else
						 {
									echo "<script language= 'JavaScript'>alert('Registration Failed..!');</script>";	
							 echo"<script> location.replace('../manage_user.php?add_member=add_member&spid=$sponsor'); </script>";  
							 }	 
					 	 
					 
					}
		else
		        {
					
				  //header('Location:../manage_user.php?success=userexists');	
echo"<script> location.replace('../manage_user.php?success=userexists'); </script>";   
				}		 
		  }
		//check this username exist or not
		  
	  }
 
 
  ?>