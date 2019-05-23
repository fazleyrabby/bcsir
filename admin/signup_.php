<?php
include'connect/config.php'; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>বাংলাদেশ বিজ্ঞান ও শিল্প গবেষণা পরিষদ (বিসিএসআইআর)-গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</title>

<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
<link href="signup_form.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}  
</script>
<script type="text/javascript">
function checktPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('tpass');
    var pass2 = document.getElementById('contpass');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmcontact');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Transaction Password Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Transaction Password not Match !"
    }
}  
</script>
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{    
	$("#sponsor").keyup(function()
	{		
		var name = $(this).val();	
		
		if(name.length > 3)
		{		
			$("#result").html('checking...');
			
			/*$.post("username-check.php", $("#reg-form").serialize())
				.done(function(data){
				$("#result").html(data);
			});*/
			
			$.ajax({
				
				type : 'POST',
				url  : 'username-check.php',
				data : $(this).serialize(),
				success : function(data)
						  {
					         $("#result").html(data);
					      }
				});
				return false;
			
		}
		else
		{
			$("#result").html('');
		}
	});
	
});
</script>
<script type="text/javascript">
$(document).ready(function()
{    
	$("#username").keyup(function()
	{		
		var name = $(this).val();	
		
		if(name.length > 3)
		{		
			$("#resultt").html('checking...');
			
			/*$.post("username-check.php", $("#reg-form").serialize())
				.done(function(data){
				$("#result").html(data);
			});*/
			
			$.ajax({
				
				type : 'POST',
				url  : 'usrnme.php',
				data : $(this).serialize(),
				success : function(data)
						  {
					         $("#resultt").html(data);
					      }
				});
				return false;
			
		}
		else
		{
			$("#resultt").html('');
		}
	});
	
});
</script>
</head>

<body>
<div class="full">
  <div class="n1">
    <div class="n2">
      <div class="n3">Create Account</div>
      <div class="n4">Account Information</div>
      <form class="n5" action="reg.php" method="post" id="reg-form" autocomplete="off">


         <div class="n6"><div class="n6_text">ব্যবহারকারী নাম </div><label for="textfield"></label>
         <input name="username" type="text" class="n6_text_field" placeholder="Type Your Username" id="username" required="required" />
            <span id="resultt"></span>
         </div>
        <div class="n6">
           <div class="n6_text">পাসওয়ার্ড
		   </div>        <label for="textfield"></label>
         <input name="password" type="password" class="n6_text_field" id="pass1" placeholder="Type your Password" required="required" />
         </div>
         <div class="n6">
           <div class="n6_text1">কনফার্ম
		   পাসওয়ার্ড</div>
           <label for="textfield"></label>
         <input name="conpass" type="password" class="n6_text_field" placeholder="Confirm Password" id="pass2" onKeyUp="checkPass(); return false;" required="required" />
               <span id="confirmMessage" class="confirmMessage"></span>
         </div>
   
        
        
           
         <div class="n6">
           <div class="n6_text">ইমেইল</div>        <label for="textfield"></label>
         <input name="email" type="email" class="n6_text_field" placeholder="Type your Email Address" id="textfield" required="required" />
         </div>
               <div class="n6">
           <div class="n6_text">মোবাইল নাম্বার </div>        <label for="textfield"></label>
         <input name="mobile" type="text" class="n6_text_field" placeholder="Type your Email Address" id="textfield" required="required" />
         </div>
      
      <div class="n7"><input type="submit" name="submit" class="n7_btn" value="SignUP" /></div>
      </form>
      
    </div>
  </div>
</div>
</body>
</html>
