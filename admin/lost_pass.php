<?php
include'connect/config.php'; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bitstump</title>

<!--STYLESHEETS-->
<link href="login_form.css" rel="stylesheet" type="text/css" />

<!--SCRIPTS-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<!--Slider-in icons-->
<script type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("left","0px");
	});
	
	$(".password").focus(function() {
		$(".pass-icon").css("left","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").css("left","0px");
	});
});
</script>

</head>
<body>

<!--WRAPPER-->
<div id="wrapper">
<?php
if(isset($_POST['submit']))
        {
		$username=$_POST['username'];
		$email=$_POST['email'];
		$check="select * from ratul_login where username='$username' and email='$email'";
		$check_p=mysqli_query($conn,$check);
		if($check_p==true)
		      {
				  $chk_c=mysqli_num_rows($check_p);
				  if($chk_c==0)
				            {
		echo "<script language= 'JavaScript'>alert('Sorry!Invalid Username and Password..!');</script>";											
        echo '<script> location.replace("lost_pass.php"); </script>'; 
							}
				   else
				           {
							   while($data=mysqli_fetch_array($check_p))
							                {
									$id=$data['0'];
									$username=$data['1'];
									$email=$data['3'];
									$password=$data['4'];


$to = "$email";
$rand=mt_rand();
$subject = "$username Password send to Your Email";
$link="http://payforearn.com";
$pic="<div style='padding:10px 10px;'><img src='$link/files/rv-logo.png' alt='payforearn.com' /></div>";
$message = "
<html>
<head>
<title>Login Credential For $username</title>
</head>
<body>
$pic

<h3>Hello $username</h3>

<p>Please confirm your request for password reset.</p>

<p>Copy and paste this link to your browser:</p>

<strong><a href='https://payforearn.com/main/pass_reset.php?a=forgot_password&action=confirm&c=$rand&email=$email&uname=$username'>https://payforearn.com/?a=forgot_password&action=confirm&c=$rand&email=$email&uname=$username</a></strong>

<p>We are ask you to be attentive. Make a deposit only from the site company Pay For Earn- <a href='https://payforearn.com'>https://payforearn.com</a>. Our company never does not send special promotional offers.</p>
</hr>
<p>
Thank you.</p>
<p>Payforearn.com</p>



</body>
</html>
";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@payforearn.com>' . "\r\n";
$headers .= 'Cc: payforearnall@yahoo.com' . "\r\n";  
$headers .= 'Cc: jacktripura@gmail.com' . "\r\n";  
           $ratul=mail($to,$subject,$message,$headers);
		   if($ratul==true)
		   {
		echo "<script language= 'JavaScript'>alert('Check your Email For Login Information');</script>";											
        echo '<script> location.replace("lost_pass.php"); </script>';
	
		   }
		   else
		   {
			   	//header('Location:../manage_user.php?success=sucessmailfailed');

		echo "<script language= 'JavaScript'>alert('Check your Email For Login Information..Localhost not able to Send Mail..!');</script>";											
        echo '<script> location.replace("lost_pass.php"); </script>';	
			 
			   }
	   
	   
						 		
											
											}
							
							}		
				  }
		else
		      {
			echo "<script language= 'JavaScript'>alert('Error Occured!');</script>";											
        echo '<script> location.replace("lost_pass.php"); </script>';	
				   }	  
		}

?>
	<!--SLIDE-IN ICONS-->
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
   
<form name="login-form" class="login-form" action="" method="post">

	<!--HEADER-->
 
    <div class="header">
  
    <!--TITLE--><div class="ri1">Lost Your </div><div class="ri2"> Password.</div><!--END TITLE-->
    <!--DESCRIPTION--><div class="ri9"><div class="ri3"></div><div class="ri4"></div><div class="ri5"></div><div class="ri6"></div><div class="ri7"></div><div class="ri8"></div></div>
    <div class="ri11">Type your email & Password</div><!--END DESCRIPTION-->
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
	<!--USERNAME--><input name="username" type="text" class="input username" value="Username" placeholder="Username" onfocus="this.value=''" /><!--END USERNAME-->
    <!--PASSWORD--><input name="email" type="email" class="input password" value="Email" placeholder="Email" onfocus="this.value=''" /><!--END PASSWORD-->
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
   <div class="">
   <div class="ri10"><div class="ri3"></div><div class="ri4"></div><div class="ri5"></div><div class="ri6"></div><div class="ri7"></div><div class="ri8"></div></div><br/></div>
    <div class="footer">
    <!--LOGIN BUTTON--><input type="submit" name="submit" value="সাবমিট"  class="button1" /><!--END LOGIN BUTTON-->
    <!--REGISTER BUTTON--><!--END REGISTER BUTTON--><br />
        <a href="#"> <span style="font-size:12px; font-family:Verdana, Geneva, sans-serif; text-align:left; float:left; margin:10px 0px 10px 0px;">Register</span></a>
   <a href="index.php"> <span style="font-size:12px; font-family:Verdana, Geneva, sans-serif; text-align:right; float:right; margin:10px 0px 10px 0px;">Log in</span></a>
<br />

    
    </div>

    <!--END FOOTER-->

</form>
<!--END LOGIN FORM-->

</div>
<!--END WRAPPER-->

<!--GRADIENT--><div class="gradient"></div><!--END GRADIENT-->

</body>
</html>