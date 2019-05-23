<?php

 include'../../connect/config.php'; 
 if(isset($_POST['submit']))
   {
$receiver_id = $_POST['receiver_id'];
$sender_id = $_POST['sender'];
$amount = $_POST['amount'];
$tpass = $_POST['tpass'];
$level=$_POST['level'];
$curent_balance=$_POST['curent_balance'];
$tpassm=$_POST['tpassm'];
$pack_id=$_POST['pack_id'];
if($level==1)
{
	if("$tpass"=="$tpassm")
	{
$insert_transfer = "INSERT INTO transfer values('','$sender_id','$receiver_id',$amount,now(),now(),'$tpass',1)";
$insert_transfer_q = mysqli_query($conn,$insert_transfer);
if ($insert_transfer_q == true)
 {
    $update_sender_balance = "UPDATE ratul_login SET c_wallet = c_wallet -$amount WHERE username='$sender_id'";
    $update_sender_balance_q = mysqli_query($conn,$update_sender_balance);
    if ($update_sender_balance_q == true)
	 {
        $update_receiver_balance = "UPDATE ratul_login SET c_wallet = c_wallet+$amount WHERE username='$receiver_id'";
        $update_receiver_balance_q = mysqli_query($conn,$update_receiver_balance);
        if ($update_receiver_balance_q == true)
		 {
		//header('Location:../transfer_fund.php?success=admin_transfer_success');
		echo"<script> location.replace('../transfer_fund.php?success=admin_transfer_success'); </script>";
		
        }
    }
}
 else
   {
		//header('Location:../transfer_fund.php?success=admin_transfer_failed');
echo"<script> location.replace('../transfer_fund.php?success=admin_transfer_failed'); </script>";
   }
}
else
   {
			//header('Location:../transfer_fund.php?success=invalid_tpin');
echo"<script> location.replace('../transfer_fund.php?success=invalid_tpin'); </script>";   
	   }
}
else
{
	if($pack_id==1)
	{
echo"<script> location.replace('../transfer_fund.php?success=invalid_package'); </script>"; 	
		
		}
	else
	{
	if("$tpass"=="$tpassm")
	{	
if($curent_balance>=$amount)
{

	//check sender id valid or not
		if($amount>=2)
	   {
 $sender_c=mysqli_query($conn,"select username from ratul_login where username='$receiver_id'");
 $sender_cc=mysqli_num_rows($sender_c);
 if($sender_cc!=0)
	{  
$insert_transfer = "INSERT INTO transfer values('','$sender_id','$receiver_id',$amount,now(),now(),'$tpass',4)";
$insert_transfer_q = mysqli_query($conn,$insert_transfer);
if ($insert_transfer_q == true)
 {
    $update_sender_balance = "UPDATE ratul_login SET c_wallet = c_wallet-$amount WHERE username='$sender_id'";
    $update_sender_balance_q = mysqli_query($conn,$update_sender_balance);
    if ($update_sender_balance_q == true)
	 {
        $update_receiver_balance = "UPDATE ratul_login SET c_wallet =c_wallet+$amount WHERE username='$receiver_id'";
        $update_receiver_balance_q = mysqli_query($conn,$update_receiver_balance);
        if ($update_receiver_balance_q == true)
		 {
		//header('Location:../transfer_fund.php?success=user_transfer_success');
		echo"<script> location.replace('../transfer_fund.php?success=user_transfer_success'); </script>";  
        }
    }
 }
 else
 {
	//header('Location:../transfer_fund.php?success=user_transfer_failed');
echo"<script> location.replace('../transfer_fund.php?success=user_transfer_failed'); </script>";   
	 }
}
else
{
	//header('Location:../transfer_fund.php?success=invalid_id');
echo"<script> location.replace('../transfer_fund.php?success=invalid_id'); </script>";  
	}
}
else
 {
	echo"<script> location.replace('../transfer_fund.php?success=minimum_balance'); </script>"; 
	 }
}
else
{
//header('Location:../transfer_fund.php?success=insufficient_balance');	
echo"<script> location.replace('../transfer_fund.php?success=insufficient_balance'); </script>";  	
}
}
else
{
	//header('Location:../transfer_fund.php?success=invalid_tpin');
echo"<script> location.replace('../transfer_fund.php?success=invalid_tpin'); </script>";  	
	}
	}
	
}
	}
	if(isset($_POST['transfr_w']))
	      {
$sender_id = $_POST['sender'];
$amountt = $_POST['amount'];
$scharge=$amountt*.01;
$amount=$amountt;
$tpass = $_POST['tpass'];
$level=$_POST['level'];
$curent_balance=$_POST['curent_balance'];
$tpassm=$_POST['tpassm'];
$tr_type=$_POST['tr_type']; 
if($curent_balance>=$amountt)
          {
		     if("$tpass"=="$tpassm")
			        {
$in="insert into transfer_wallet values('','$sender_id','$amountt','$level','$tr_type',now())";
$in_p=mysqli_query($conn,$in);
if($in_p==true)
                {
				if($tr_type==1)
				     {
					$upc=mysqli_query($conn,"update ratul_login  set c_wallet=c_wallet-$amountt where username='$sender_id'");	
					if($upc==true)
					       {
							   
					$upd=mysqli_query($conn,"update ratul_login  set g_wallet=g_wallet+$amount where username='$sender_id'");	
					if($upd==true)
					           {
$service_charge="insert into admin_income_history values('','$sender_id',$scharge,'C- Wallet to G-Wallet Transfer',now())";						 $service_charge_p=mysqli_query($conn,$service_charge);  
//header('Location:../wallet_transfer.php?success=success_c_g');	   
echo"<script> location.replace('../wallet_transfer.php?success=success_c_g&wallet=$tr_type'); </script>";  								   
								 }	
							else
							   {
								   echo mysqli_error($conn);
								   }	    
						   } 
						   else
						   {
							   echo mysqli_error($conn);
							   }
						 
					 }
					 else
					 {

					$upc=mysqli_query($conn,"update ratul_login  set g_wallet=g_wallet-$amountt where username='$sender_id'");	
					if($upc==true)
					       {
							   
					$upd=mysqli_query($conn,"update ratul_login  set c_wallet=c_wallet+$amount where username='$sender_id'");	
					if($upd==true)
					           {
$service_charge="insert into admin_income_history values('','$sender_id',$scharge,'G- Wallet to C-Wallet Transfer',now())";						 $service_charge_p=mysqli_query($conn,$service_charge);  		   
//header('Location:../wallet_transfer.php?success=success_g_c');	
echo"<script> location.replace('../wallet_transfer.php?success=success_g_c&wallet=$tr_type'); </script>";     
								   
								 }	   
						   } 
						 
					 	 
					 }	
					
				}					 
				else
				   {
					   echo mysqli_error($conn);
					   }	 
					 
					 }
			 else
			   {
	//header('Location:../wallet_transfer.php?success=invalid_tpin');	
	echo"<script> location.replace('../wallet_transfer.php?success=invalid_tpin&wallet=$tr_type'); </script>";    
				   
				   }	  
		   
		   }
else
    {
		//header('Location:../wallet_transfer.php?success=insufficient_balance');
			echo"<script> location.replace('../wallet_transfer.php?success=insufficient_balance&wallet=$tr_type'); </script>";
		}	     
		   
		  }
else
{
		//header('Location:../transfer_fund.php?success=submit');
			echo"<script> location.replace('../transfer_fund.php?success=submit&wallet=$tr_type'); </script>";
		}
?>