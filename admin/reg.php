 <?php 

include'connect/config.php'; 
 if(isset($_POST['submit']))
      {
		  $name=$_POST['name'];
		  $type=$_POST['type'];
		  $nid=$_POST['nid'];
		//   $dateofbirth=$_POST['dateofbirth']; 
		  $institute_name=$_POST['institute_name'];
		  $password=hash('sha512',$_POST['password']);
		  $email=$_POST['email'];
		  $phone=$_POST['phone'];
		  $house_no=$_POST['house_no'];
		  $street=$_POST['street'];
		  $area=$_POST['area'];
		  $city=$_POST['city'];
		  $zip=$_POST['zip'];
		  $fax=$_POST['fax'];	

		//   echo $name.'<br>',$type.'<br>',$nid.'<br>',$dateofbirth.'<br>',$institute_name.'<br>',$password.'<br>',$email.'<br>',$phone.'<br>',$house_no.'<br>',$street.'<br>',$area.'<br>',$city.'<br>',$zip.'<br>',$fax;

		$ins="INSERT into ratul_login(username,nid_no,email,type,password,doj,doj_d,user_level,institute_name,house_no,street,area,city,zip,fax,contact_no) values('$name','$nid','$email','$type','$password',now(),now(),4,'$institute_name','$house_no','$street','$area','$city','$zip','$fax','$phone')";	
			$ins_p=mysqli_query($conn,$ins);	
			if($ins_p==true)
			{									 	
$to = "$email";
$subject = "Registration Successfully Done";
$link="http://bcsirlabsctg.com.bd/";
$pic="<div style='padding:10px 10px;'><img src='$link/images/footer-logo.png' alt='BCSIR'/></div>";
$message = "
<html>
<head>
<title>Registration Information For $name </title>
</head>
<body>

<h3>Dear $name </h3>

<p>Your New Registration is Successfully Processed</p>
<p>Your Login Details as Below :</p>
<p>If you encounter any issues,let us know on the support page.</p>
<p>Best Regrards</p>
<p>Admin</p>
<p>www.bcsir.com</p>
<p>info@bcsir.com</p>

</body>
</html>
";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@bcsir.com>' . "\r\n";
$headers .= 'Cc: bcsir@gmail.com' . "\r\n";  
$headers .= 'Cc: bcsir@gmail.com' . "\r\n";  
           $ratul=mail($to,$subject,$message,$headers);
		   if($ratul==true)
		   {
//below part for sms 
$mbl_no="+88".$phone; 
								
$msg="Dear ".$name." \r\n Registration in our E-sheba Site is done.\r\ Thanks \r\n BCSIR";
$msg=urlencode($msg);
//user=ripo&password=it0987654321	 				 
#http://app.itsolutionbd.net/api/v3/sendsms/plain?user=rich_ripo&password=it0987654321&sender=8804445657424&SMSText=".$msg."&GSM=".$mbl_no."&type=longSMS
$response = file_get_contents("http://app.itsolutionbd.net/api/v3/sendsms/plain?user=Rcreation1&password=rcreationit0987654321&sender=BCSIR&SMSText=".$msg."&GSM=".$mbl_no."&type=longSMS");	 	
//upper part for sms    
		echo "<script language= 'JavaScript'>alert('Registration Successfully Done.Please Check your Email for Further Information!');</script>";
		echo '<script> location.replace("index.php"); </script>';  
		   }
		   else
		   {
		echo "<script language= 'JavaScript'>alert('Registration Successfully Done.Please Check your Email for Further Information!Mail Problem..!');</script>";									
	
		 }
						
		}
								 
	  }
	  else
	  {
	echo "<script language= 'JavaScript'>alert('Please Submit the Button ..!');</script>";											
        echo '<script> location.replace("index.php"); </script>';  		  
	  }
 
 
  ?>