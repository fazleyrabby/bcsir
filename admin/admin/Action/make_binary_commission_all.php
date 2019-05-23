<?php
include '../session.php';
include'../../connect/config.php';

if(isset($_POST['Binary']))
   {

$time_check="select curdate()";
$time_check_p=mysqli_query($conn,$time_check);
while($tdata=mysqli_fetch_array($time_check_p))
         {
			 $tt=$tdata['0'];
		 }
		 //00:45:31
		
		 date_default_timezone_set("Astana/Dhaka");
         $current_time = date(G);
       $bchk="select * from bonus_calculation where bonus_date='$tt'";
	   $bchk_p=mysqli_query($conn,$bchk_p);
	   $bchk_pc=mysqli_num_rows($bchk_p);
	   if($bchk_pc==0)
	    {
				
				
//below for Finding all User Commision
                                            $leftt = "1";
                                            $rightt = "0";
   $user_list="select ratul_login.position_id,ratul_login.username,ratul_login.id,ratul_login.active_status,ratul_login.package_id from ratul_login where ratul_login.active_status=1";
   $user_list_p=mysqli_query($conn,$user_list);
   if($user_list_p==true)
      {
		  while($pdata=mysqli_fetch_array($user_list_p))
		    {
				$posid=$pdata['0'];
				$poname=$pdata['1'];
				$uid=$pdata['2'];
				$act_status=$pdata['3'];
				$lorg = $posid.$leftt;
                $rorg = $posid.$rightt;
				//Below for Finding left ID Commission							
                 $matching_commisionl = "
select 1 as leftt,investment.investment_user,SUM(investment.investment_amnt),DATE(investment.inv_date) as deposit_date
from investment,ratul_login where investment.investment_user in 
(SELECT ratul_login.username  from 
ratul_login where ratul_login.position_id like '$lorg%')
AND DATE(investment.inv_date) = CURDATE()
and investment.investment_user=ratul_login.username
GROUP BY leftt
 ";
                                             $matching_commision_pl = mysqli_query($conn,$matching_commisionl);
											  $matching_commision_plc = mysqli_num_rows($matching_commision_pl);
											 if($matching_commision_plc!=0){ 
                                            if ($matching_commision_pl == true) {

                                                while ($rdatal= mysqli_fetch_array($matching_commision_pl))
												 {
													$lposition=$rdatal['0']; 
													if($lposition==1)
													  {
														$posii="Left";  
													   }
													$leftamonunt=$rdatal['2'];
	                                                $date=$rdatal['3'];
													   
												
													 
											     }}}
												 else
												    {
														$posii="Left";
														$leftamonunt=0;
														$date=date('Y-m-d');
														}
				//Upper for finding Left ID Depositor
				//Below for Finding Right ID Depositor
                                            $matching_commisionr = "
select 2 as rightt,investment.investment_user,SUM(investment.investment_amnt),DATE(investment.inv_date) as deposit_date
from investment,ratul_login where investment.investment_user in 
(SELECT ratul_login.username  from 
ratul_login where ratul_login.position_id like '$rorg%')
AND DATE(investment.inv_date) = CURDATE()
and investment.investment_user=ratul_login.username
GROUP BY rightt
 ";

 
                                            $matching_commision_pr = mysqli_query($conn,$matching_commisionr);
											$matching_commision_prc = mysqli_num_rows($matching_commision_pr);
											if($matching_commision_prc!=0)
											  {
                                            if ($matching_commision_pr == true) {

                                                while ($rdatar = mysqli_fetch_array($matching_commision_pr))
												 {
													$rposition=$rdatar['0']; 
													if($lposition==2)
													  {
														$posii="Right";  
													   }
													$reftamonunt=$rdatar['2'];
		  
													$date=$rdatar['3'];
											     }
											}
											  }
											  else
											     {
													 $posii="Right"; 
													 $reftamonunt=0;
													 $date=date('Y-m-d');
													 }
				
/////////////////////////////////////////////Below part for checking previous days Bonus//////////////////////////////////////////	
												//Below for Binary Calculation
									$bn=mysqli_query($conn,"select bonus_calculation.carry,bonus_calculation.carry_position FROM bonus_calculation 
WHERE bonus_calculation.refferel_id='$poname' and bonus_calculation.bonus_date=DATE_SUB(CURDATE(),INTERVAL 1 DAY)
");
									$bnc=mysqli_num_rows($bn);
									if($bn!=0)
									   {
										   while($bndata=mysqli_fetch_array($bn))
										       {
												   $carryamnt=$bndata['0'];
												   $carry_position=$bndata['1'];
						if($carry_position=="Left")
						            {
								 $leftamonunt=$leftamonunt+$carryamnt;
								 $reftamonunt=$reftamonunt;
								    }	
					     elseif($carry_position=="Right")
						          {
								 $leftamonunt=$leftamonunt;
								 $reftamonunt=$reftamonunt+$carryamnt;
							      }
						 else
						        {
								$leftamonunt=$leftamonunt;
								 $reftamonunt= $reftamonunt;
							     }
												   
											    }
										   
										   }
									else
									    {
											 $carryamnt=0;
											  $carry_position=0;
											}
	 			 					   
									//Below for Binary Calculation
									
									
	/////////////////////////////////////////////Uppper part for checking previous days Bonus//////////////////////////////////////////	
		
				
				//Below for Finding Commision of All user except Admin
										 if($reftamonunt<$leftamonunt)
										       {
												   if($reftamonunt>5001)
												     {
														$reftamonunt=5000; 
														 }
												   elseif(($reftamonunt>99)and($reftamonunt<500))
												        {
														  $reftamonunt=100;   
														}
												   elseif(($reftamonunt>499)and($reftamonunt<1000))
												        {
														  $reftamonunt=500;   
														}
												   elseif(($reftamonunt>999)and($reftamonunt<2000))
												        {
														  $reftamonunt=1000;   
														}
												   elseif(($reftamonunt>1999)and($reftamonunt<5000))
												        {
														  $reftamonunt=2000;   
														}
												   elseif(($reftamonunt>4999))
												        {
														  $reftamonunt=5000;   
														}

					                                else
													   {
														    $reftamonunt=0;   
														   }
												   $bonus_amount=$reftamonunt;
												   $carry_pos="Left"; 
												   $commision=($bonus_amount*0.06);
												   $carry=$leftamonunt-$reftamonunt;
												   
												   
												   }
										  elseif($leftamonunt<$reftamonunt)
										         {

												   if($leftamonunt>5001)
												     {
														$leftamonunt=5000; 
														 }
												   elseif(($leftamonunt>99)and($leftamonunt<500))
												        {
														  $leftamonunt=100;   
														}
												   elseif(($leftamonunt>499)and($leftamonunt<1000))
												        {
														  $leftamonunt=500;   
														}
												   elseif(($reftamonunt>999)and($reftamonunt<2000))
												        {
														  $leftamonunt=1000;   
														}
												   elseif(($leftamonunt>1999)and($leftamonunt<5000))
												        {
														  $leftamonunt=2000;   
														}
												   elseif(($leftamonunt>4999))
												        {
														  $leftamonunt=5000;   
														}
												 
												  
												     else
													   {
														  $leftamonunt=0; 
														   }		
													$bonus_amount=$leftamonunt; 
													$carry_pos="Right";
													 $commision=($bonus_amount*0.06);
													 $carry=$reftamonunt-$leftamonunt;
													 
													 }
											else
											      {

												   if($leftamonunt>5001)
												     {
														$leftamonunt=5000; 
														 }
												   elseif(($leftamonunt>99)and($leftamonunt<500))
												        {
														  $leftamonunt=100;   
														}
												   elseif(($leftamonunt>499)and($leftamonunt<1000))
												        {
														  $leftamonunt=500;   
														}
												   elseif(($leftamonunt>999)and($leftamonunt<2000))
												        {
														  $leftamonunt=1000;   
														}
												   elseif(($leftamonunt>1999)and($leftamonunt<5000))
												        {
														  $leftamonunt=2000;   
														}
												   elseif(($leftamonunt>4999))
												        {
														  $leftamonunt=5000;   
														}
												 
												     else
													   {
														  $leftamonunt=0; 
														   }  
													$bonus_amount=$leftamonunt;  
													$carry_pos="None";
													 $commision=($bonus_amount*0.06);
													 $carry=$reftamonunt-$leftamonunt; 
													  
													  }	
			//Below for inserting bonus_calculation
			$check_user_date="select * from bonus_calculation where bonus_calculation.refferel_id='$poname' and bonus_calculation.bonus_date=CURDATE()";
			$check_user_date_p=mysqli_query($conn,$check_user_date);
			$check_user_date_pc=mysqli_num_rows($check_user_date_p);
			if($check_user_date_pc==0)
			      {
					  if($act_status==1)
					         {
								 $commision=$commision;
								 }
					  else
					       {
							 $commision=0;  
							   }
							   
							
							   
							   
							   
							   
			$package_id=$pdata['4'];
			if($package_id==100)
			   {
				 if($commision>50)
				     {
				     $mcommision=50;
					 } 
				  else
				     {
					$mcommision=$commision;	 
					  }	  
			   }			   
			elseif($package_id==300)
			   {
				 if($commision>100)
				     {
				     $mcommision=100;
					 } 
				  else
				     {
					$mcommision=$commision;	 
					  }	  
			   }
			elseif($package_id==500)
			   {
				 if($commision>250)
				     {
				     $mcommision=250;
					 } 
				  else
				     {
					$mcommision=$commision;	 
					  }	  
			   }
			elseif($package_id==1000)
			   {
				 if($commision>300)
				     {
				     $mcommision=300;
					 } 
				  else
				     {
					$mcommision=$commision;	 
					  }	  
			   } 
			elseif($package_id==2000)
			   {
				 if($commision>350)
				     {
				     $mcommision=350;
					 } 
				  else
				     {
					$mcommision=$commision;	 
					  }	  
			   }
			elseif($package_id==5000)
			   {
				 if($commision>350)
				     {
				     $mcommision=350;
					 } 
				  else
				     {
					$mcommision=$commision;	 
					  }	  
			   }  		   
							   
							   			 
                                                $bonus_insert = "
		insert into bonus_calculation values('',now(),'$poname','$leftamonunt','$reftamonunt','$commision','$carry','$bonus_amount','$carry_pos','$mcommision')";
                                                $bonus_insert_p = mysqli_query($conn,$bonus_insert);
                                                if ($bonus_insert_p == true) 
												{
													if($commision!=0)
													{
													$or_commission=$commision*0.06;
													$admin_income=$commision-$or_commission;
                                                    $update_balance = "UPDATE ratul_login SET c_wallet=c_wallet+$mcommision-$or_commission WHERE id =$uid and package_id!=1";
                                                    $update_balance_q = mysqli_query($conn,$update_balance);
													if($update_balance_q!=true)
													   {
														echo mysqli_error($conn);   
													   }
													 else
													   {
											$recent_blnc="select c_wallet from ratul_login where id=$uid";
											$recent_blnc_p=mysqli_query($conn,$recent_blnc);
											if($recent_blnc_p==true)
											         {
														 while($bdata=mysqli_fetch_array($recent_blnc_p))
														      {
				$admin="insert into admin_income_history values('','$poname','$or_commission','Binary Commission Tax',now())";
				$admin_p=mysqli_query($conn,$admin);
				if($admin_p==true)
				 {																  
				//dashboard.php  header("Location:../make_binary_commission.php?success=success"); 
				//Generate_Bonus.php?generate=generate&binary=binary
				echo"<script> location.replace('../Generate_Bonus.php?generate=generate&binary=binary&success=success_binary_Generate'); </script>";  
				 }
				 else
				 {
				 // header("Location:../make_binary_commission.php?success=success"); 
echo"<script> location.replace('../Generate_Bonus.php?generate=generate&binary=binary&success=success_binary_Generate'); </script>"; 
				 }
																  
																  }
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
					
					 //header("Location:../make_binary_commission.php?success=given&pusername=$poname"); 
echo"<script> location.replace('../Generate_Bonus.php?generate=generate&binary=binary&success=given&pusername=$poname'); </script>";    
					   }		  
			
			//Upper for insert bonus calculation										  	 
				
				//Upper for Finding Commision of All user except Admin
				
		    }
		  
	  }
   else
      {
		  
	  }	  
	
					
	}
	  else
	     {
echo"<script> location.replace('../Generate_Bonus.php?generate=generate&binary=binary&success=success_binary_already_generate'); </script>"; 	 
			 }
	
	}
else
  {
	  //header('Location:../make_binary_commission.php?success=submit_failed');  
echo"<script> location.replace('../Generate_Bonus.php?generate=generate&binary=binary&success=success_binary_submit_failed'); </script>"; 
	  }	

?>