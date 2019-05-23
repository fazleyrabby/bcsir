 <?php 
 //include '../session.php'; 
 include'../../connect/config.php'; 
 if(isset($_GET['purchase']))
      {
	  $sponsor=$_GET['username']; 
//upper for get  the user email
$emailp=mysqli_query($conn,"select email from ratul_login where username='$sponsor'");
while($emd=mysqli_fetch_array($emailp))
     {
	$info_email=$emd['0'];  
	 }
	 
//upper for get the user email	  
	  $level=$_GET['level'];
	  $project=$_GET['project'];
	  $media=$_GET['media'];
	  $donate_amnt=$_GET['donate_amnt'];
	  $acc_n=$_GET['acc_no'];
	  $type_tr_pass=$_GET['type_tr_pass'];
	  if($level==1)
	    {
		$trst=1;
		}
		else
		{
		$trst=1;
		}
	  $ins="insert into investment values('','$sponsor',$level,'$project','$media',$donate_amnt,'$acc_n','$type_tr_pass',$trst,now(),now())";
	  $insp=mysqli_query($conn,$ins);
	  if($insp==true)
	         {
//below for email send
$to = "$info_email";
$subject = "Account Upgrade Information";
$link="http://portcity.com";
$pic="<div style='padding:10px 10px;'><img src='$link/files/rv-logo.png' alt='portcity' /></div>";
$message = "
<html>
<head>
<title>Donate Certificate For $infor_name</title>
</head>
<body>
$pic
<h3>Dear $infor_name ,</h3>

<p>Your Donation Success Processed</p>
<p>Details As Below :</p>
<table rules='all' style='border-color: #666;' cellpadding='10'>
<tr style='background: #eee;'>
<td><strong>Name:</strong> </td>
<td>$infor_name</td>
</tr>
<tr style='background: #eee;'>
<td><strong>Accoun Type:</strong> </td>
<td>$media C</td>
</tr>

</tr>
<tr style='background: #eee;'>
<td><strong>Total Amount :</strong> </td>
<td>$donate_amnt</td>
</tr>
</tr>



</table>
<p>We Have Successfully Received $info_inv_amnt  from your Account Balance.</p>
<p>Best Regrards</p>
<p>Admin</p>
<p>www.portcity.com</p>

</body>
</html>
";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@portcity.com>' . "\r\n";
$headers .= 'Cc: portcity@gmail.com' . "\r\n";  
$headers .= 'Cc: portcity@gmail.com' . "\r\n";  
 $ratul=mail($to,$subject,$message,$headers);
//upper for email send			 
  echo"<script> location.replace('../buy_share.php?success=success_purchase'); </script>";	 
			 }
		else
		    {
		 echo"<script> location.replace('../buy_share.php?success=failed_purchase'); </script>";	 	
			}	 
	   }
elseif(isset($_POST['donate_b']))
{
$username=$_POST['username'];
$donor=$_POST['donor'];	
$blood_donate=$_POST['blood_donate'];	
$blod_grp=$_POST['blod_grp'];
$contact_no=$_POST['contact_no'];
$bmi=$_POST['bmi'];
$Age=$_POST['Age'];
$division=$_POST['division'];
$District=mysqli_real_escape_string($_POST['District']);
$insert="insert into donate values('','$username','$blood_donate','$blod_grp','$contact_no','$bmi',$Age,'$division','$District',now(),'$donor')";
$insert_p=mysqli_query($conn,$insert);
if($insert_p==true)
       {
		   
	echo"<script>location.replace('../donate_m.php?donate=$blood_donate&success=success_purchase_donate'); </script>";	   
	  
	   }
	else
	{
	echo"<script>location.replace('../donate_m.php?donate=$blood_donate&success=success_purchase_failed'); </script>";		
		}   
}
else
        {
		//header('Location:../buy_share.php?success=failed');	
echo"<script> location.replace('../buy_share.php?success=failed'); </script>";
		}	  
 
 
  ?>