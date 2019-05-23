<?php

include'../../connect/config.php';
include '../session.php';
if(isset($_POST['Matching']))
   {

$time_check="select CURTIME()";
$time_check_p=mysqli_query($conn,$time_check);
while($tdata=mysqli_fetch_array($time_check_p))
         {
			 $tt=$tdata['0'];
		 }
		 //00:45:31
		
		 date_default_timezone_set("Astana/Dhaka");
         $current_time = date(G);

				
				
//below for Finding all User Commision
                                            $leftt = "1";
                                            $rightt = "0";
   $user_list="select ratul_login.position_id,ratul_login.user_name,ratul_login.id,ratul_login.act_status from ratul_login";
   $user_list_p=mysqli_query($conn,$user_list);
   if($user_list_p==true)
      {
		  while($pdata=mysqli_fetch_array($user_list_p))
		    {
				$posid=$pdata['0'];
				$poname=$pdata['1'];
				$uid=$pdata['2'];
				$act_status=$pdata['3'];
				$lorg = $posid."".$leftt;
                $rorg = $posid."".$rightt;
				//find totla Today left join
				$bn=mysqli_query($conn,"select match_bonus.carry,match_bonus.carry_position FROM match_bonus 
WHERE match_bonus.refferel_id='$poname' and match_bonus.bonus_date=DATE_SUB(CURDATE(),INTERVAL 1 DAY)
");
									$bnc=mysqli_num_rows($bn);
									if($bnc!=0)
									   {
										   
					while($bnda=mysqli_fetch_array($bn))
					                  {
										  $bncary=$bnda['0'];
										  $bncary_p=$bnda['1'];
										  if($bncary_p=="LEFT")
										     {
				  $ljoin="select * from ratul_login where position_id like '$lorg%' and jdate=curdate()";
				  $ljoin_p=mysqli_query($conn,$ljoin);
				  $ljoin_pc=mysqli_num_rows($ljoin_p);
				  $ljoin_pc=$ljoin_pc+$bncary;
				  $rjoin="select * from ratul_login where position_id like '$rorg%' and jdate=curdate()";
				  $rjoin_p=mysqli_query($conn,$rjoin);
				  $rjoin_pc=mysqli_num_rows($rjoin_p); 
				     	 
												 
											  }
										  elseif($bncary_p=="RIGHT")
										     {
				  $ljoin="select * from ratul_login where position_id like '$lorg%' and jdate=curdate()";
				  $ljoin_p=mysqli_query($conn,$ljoin);
				  $ljoin_pc=mysqli_num_rows($ljoin_p);
				 
				  $rjoin="select * from ratul_login where position_id like '$rorg%' and jdate=curdate()";
				  $rjoin_p=mysqli_query($conn,$rjoin);
				  $rjoin_pc=mysqli_num_rows($rjoin_p); 
				  $rjoin_pc=$rjoin_pc+$bncary;    	 
												 
											  }
										else
										  {
				  $ljoin="select * from ratul_login where position_id like '$lorg%' and jdate=curdate()";
				  $ljoin_p=mysqli_query($conn,$ljoin);
				  $ljoin_pc=mysqli_num_rows($ljoin_p);
				 
				  $rjoin="select * from ratul_login where position_id like '$rorg%' and jdate=curdate()";
				  $rjoin_p=mysqli_query($conn,$rjoin);
				  $rjoin_pc=mysqli_num_rows($rjoin_p); 
			 
											  }	  
										  
										  
										  
									   }					   

										   
										}
							else
							  {
				  $ljoin="select * from ratul_login where position_id like '$lorg%' and jdate=curdate()";
				  $ljoin_p=mysqli_query($conn,$ljoin);
				  $ljoin_pc=mysqli_num_rows($ljoin_p);
				 
				  $rjoin="select * from ratul_login where position_id like '$rorg%' and jdate=curdate()";
				  $rjoin_p=mysqli_query($conn,$rjoin);				
				  $rjoin_pc=mysqli_num_rows($rjoin_p);  
				 
								  }			

				  if($ljoin_pc>$rjoin_pc)
				     {
						 $math_carry="LEFT";
					    $tjoin=$ljoin_pc-$rjoin_pc;
						if($tjoin!=0)
						  {
								  $mcom=2.5*$rjoin_pc;
								  $madmin_income=0.2*$rjoin_pc;
								  $rmcom=($mcom-$madmin_income);  
								   
						  }
						 elseif($tjoin==0)
						   {
								  $mcom=2.5*$rjoin_pc;
								  $madmin_income=0.2*$rjoin_pc;
								  $rmcom=($mcom-$madmin_income);  
								   
							 
						   } 	 
					 }
				  elseif($rjoin_pc>$ljoin_pc)
				     {
						$math_carry="RIGHT";
					    $tjoin=$rjoin_pc-$ljoin_pc;
						if($tjoin!=0)
						  {
								  $mcom=2.5*$ljoin_pc;
								  $madmin_income=0.2*$ljoin_pc;
								  $rmcom=($mcom-$madmin_income);  
								   
						  }
						 elseif($tjoin==0)
						   {
								  $mcom=2.5*$ljoin_pc;
								  $madmin_income=0.2*$ljoin_pc;
								  $rmcom=($mcom-$madmin_income);  
								   
							 
						   } 	 
					 }	
				  elseif($rjoin_pc==$ljoin_pc)
				     {
						 $math_carry="NONE";
						 $tjoin=0;
					      if($rjoin_pc!=0)
						      {
						
								  $mcom=2.5*$rjoin_pc;
								  $madmin_income=0.2*$rjoin_pc;
								  $rmcom=($mcom-$madmin_income);
								    
							  }
							elseif($rjoin_pc==0)
						      {
						
								  $mcom=0;
								  $madmin_income=0;
								  $rmcom=0;
								    
							  }  
							  
								   
							 
					} 	 
					
					$match="insert into match_bonus values('',now(),'$poname','$ljoin_pc','$rjoin_pc','$rmcom','$tjoin',' $madmin_income','$math_carry')";
					$match_p=mysqli_query($conn,$match);
					if($match_p==true)
					   {
						   $upb="update ratul_login set c_balance=c_balance+$rmcom where user_name='$poname'";
						   $upb_p=mysqli_query($conn,$upb);
						   if($upb_p==true)
						   {
		   $admin="insert into admin_income_history values('','$poname','$madmin_income','Pair Commission Tax',now())";
				$admin_p=mysqli_query($conn,$admin);
				if($admin_p==true)
				 {	
						    header("Location:../make_binary_commission.php?success=success2"); 
				 }
						   }
						   
						 }
					else
					  {
						  echo mysqli_error($conn);
						  }	 
					
					 }  
				
				//find today total right join
				//Below for Finding left ID Commission							
			}
	  }
else
{
  header("Location:../make_binary_commission.php?success=notsubmit");	
	}	  
   
?>