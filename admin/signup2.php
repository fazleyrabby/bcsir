<?php
session_start();
include'connect/config.php'; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Verified ICO List</title>
<link href="signup_form.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="full">
  <div class="n1">
    <div class="n2">
      <div class="n3">Personal Details</div>
      <div class="n4">Account Information</div>
      <?php
	  if(isset($_POST['submit']))
	  {
	  	$sponsor=$_POST['sponsor']; 
		$position=$_POST['position']; 
		$username=$_POST['username'];
		$password=$_POST['password'];
		$conpass=$_POST['conpass'];
		$email=$_POST['email'];

		$tpass=$_POST['tpass'];
		$contpass=$_POST['contpass'];
//merege them in a session
        $_SESSION['sponsor'] = $sponsor;
        $_SESSION['position'] = $position;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
         $_SESSION['conpass'] = $conpass;
         //$_SESSION['first_name'] = $first_name;
		//  $_SESSION['last_name'] = $last_name;
		   $_SESSION['email'] = $email;
  $_SESSION['tpass'] = $tpass;
   $_SESSION['contpass'] = $contpass;
   if("$password"=="$conpass")
           {
			   
			      if("$tpass"=="$contpass")
                       {
						   $valid_uname="select username from ratul_login where username='$username'";
						   $valid_uname_p=mysqli_query($conn,$valid_uname);
						   $valid_uname_pc=mysqli_num_rows($valid_uname_p);
						   if($valid_uname_pc==0)
						      {
								  
						   $valid_sname="select username from ratul_login where username='$sponsor'";
						   $valid_sname_p=mysqli_query($conn,$valid_sname);
						   $valid_sname_pc=mysqli_num_rows($valid_sname_p);
						   if($valid_sname_pc!=0)
						   {
//merge theme in a session		

//echo $_SESSION['username'];
	  ?>
      <form class="n5" action="signup3.php" method="post">
      
         <div class="n6">
           <div class="n6_text">First Name</div>        <label for="textfield"></label>
         <input name="first_name" placeholder="Type Your Firsy Name" type="text" class="n6_text_field" id="textfield" />
         </div>
         <div class="n6">
           <div class="n6_text">Last Name</div>
           <label for="textfield3"></label>
           <input name="last_name" placeholder="Type Your Last Name" type="text" class="n6_text_field" id="textfield3" />
        </div>
         <div class="n6">
           <div class="n6_text">Date of birth</div>        <label for="textfield4"></label>
 <input name="dob" placeholder="Type Your Date of Birth" type="text" class="n6_text_field" id="textfield3" />
           
        </div>
         <div class="n6">
           <div class="n6_text">Currency</div>
           <label for="textfield4"></label>
           <label for="select"></label>
           <select name="curency" class="n6_text_field2" id="select">
             <option>US Dollar</option>
             <option>Euro</option>
          <option>Rupee</option>
		  <option>yen</option>
		    <option>BDT</option>
           </select>
         </div>
        <div class="n7"><input type="submit" class="n7_btn" name="Next" value="Next" /></div>
      </form>
      <?php
						   }
						   else
						        {
						 echo "<script language= 'JavaScript'>alert('Invalid Sposnor ID !');</script>";											

						 echo '<script> location.replace("signup.php"); </script>';    	
									}
							  }
							  else
							  {
						 echo "<script language= 'JavaScript'>alert('UserName Already Exist..!');</script>";											

						 echo '<script> location.replace("signup.php"); </script>';    
								  }
		   }
		   else
		       {
						 echo "<script language= 'JavaScript'>alert('Transaction Password Mismatch..!');</script>";											

						 echo '<script> location.replace("signup.php"); </script>';      
				   }
		   }
		   else
		     {
						 echo "<script language= 'JavaScript'>alert('Password Mismatch..!');</script>";											

						 echo '<script> location.replace("signup.php"); </script>';    
				 
				 }
	  }
	  else
	  {
						 echo "<script language= 'JavaScript'>alert('Please Submit the Button');</script>";											

						 echo '<script> location.replace("signup.php"); </script>';   
		 }
	  ?>
      
    </div>
  </div>
</div>
</body>
</html>
