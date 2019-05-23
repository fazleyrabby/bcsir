<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>বাংলাদেশ বিজ্ঞান ও শিল্প গবেষণা পরিষদ (বিসিএসআইআর)-গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</title>

<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />

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

	<!--SLIDE-IN ICONS-->
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
    <!--END SLIDE-IN ICONS-->

<!--LOGIN FORM-->
<form name="login-form" class="login-form" action="login_action.php" method="post">

	<!--HEADER-->
    <div class="header">
    <!--TITLE--><div class="ri1">Login</div><div class="ri2"> to your account.</div><!--END TITLE-->
    <!--DESCRIPTION--><div class="ri9"><div class="ri3"></div><div class="ri4"></div><div class="ri5"></div><div class="ri6"></div><div class="ri7"></div><div class="ri8"></div></div>
    <div class="ri11">ব্যবহারকারী নাম /পাসওয়ার্ড</div><!--END DESCRIPTION-->
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
	<!--USERNAME--><input name="username" type="text" class="input username" value="Username" placeholder="ব্যবহারকারী নাম " onfocus="this.value=''" /><!--END USERNAME-->
    <!--PASSWORD--><input name="password" type="password" class="input password" value="Password" placeholder="পাসওয়ার্ড" onfocus="this.value=''" /><!--END PASSWORD-->
	
	
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
   <div class="">
   <div class="ri10"><div class="ri3"></div><div class="ri4"></div><div class="ri5"></div><div class="ri6"></div><div class="ri7"></div><div class="ri8"></div></div><br/></div>
    <div class="footer">
    <!--LOGIN BUTTON--><input type="submit" name="submit" value="Login" class="button" /><!--END LOGIN BUTTON-->
    <!--REGISTER BUTTON--><!--END REGISTER BUTTON--><br/>
       <!-- <a href="signup.php"> <span style="font-size:12px; font-family:Verdana, Geneva, sans-serif; text-align:left; float:left; margin:10px 0px 10px 5px;">Register</span></a> -->
      

    
    </div>

    <!--END FOOTER-->

</form>
<!--END LOGIN FORM-->

</div>
<!--END WRAPPER-->

<!--GRADIENT--><div class="gradient"></div><!--END GRADIENT-->

</body>
</html>