<?php

 include'../../connect/config.php'; 
 if(isset($_POST['submitc']))
   {
	   
	   $sender=$_POST['sender'];
	   $amount=$_POST['amount'];
	   $ftype=$_POST['ftype'];
	  $curent_point=$_POST['curent_point'];
	   if($ftype==1)
	           {
				   $s="insert into direct_deposit values('','$sender',$amount,$ftype,now(),now(),'','','')";
			      $ins=mysqli_query($conn,$s);
				 
				  if($ins==true)
				       {
						  $up=mysqli_query($conn,"update ratul_login set c_wallet=c_wallet+$amount where username='$sender'");  
						  if($up==true)
						      {
						echo"<script> location.replace('../add_fund_g_wallet.php?fund=fund&f_type=$ftype&success=success'); </script>";		  
							  
							   } 
							   else
							   {
								   echo mysqli_error($conn);
							   }
					   }
			   
			   }
	   else
	           {
				  $s="insert into direct_deposit values('','$sender',$amount,$ftype,now(),now(),'','','')";
			      $ins=mysqli_query($conn,$s);
				  if($ins==true)
				       {
						  $up=mysqli_query($conn,"update ratul_login set g_wallet=g_wallet+$amount where username='$sender'");  
						  if($up==true)
						      {
						echo"<script> location.replace('../add_fund_g_wallet.php?fund=fund&f_type=$ftype&success=success'); </script>";		  
							  
							   } 
					   }
			   
			   } 
	   }

else
{
		//header('Location:../transfer_fund.php?success=submit');
			echo"<script> location.replace('../add_fund_g_wallet.php?fund=fund&f_type=$ftype&success=submit'); </script>";
		}
?>