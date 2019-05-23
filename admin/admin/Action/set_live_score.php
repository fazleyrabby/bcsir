<?php
 
 include'../../connect/config.php'; 
 if(isset($_POST['submit']))
   {
	   $level=$_POST['level'];
	   $eid=$_POST['eid'];
	   $match_id=$_POST['match_id'];
	   $match_title=$_POST['match_title'];
	   $tour_title=$_POST['tour_title'];
	   $innings_no=$_POST['innings_no'];
	   $batting_team=$_POST['batting_team'];
	   $Bowling_team=$_POST['Bowling_team'];
	   $current_over=$_POST['current_over'];
	   $current_ball=$_POST['current_ball'];
	   $run_taken=$_POST['run_taken'];
	   if(empty($run_taken))
	       {
			$run_taken=0;   
			}
	   $current_wkt=$_POST['current_wkt'];	
	   $commentry=$_POST['commentry'];	
       $insert="insert into cricket_score values('',$match_id,'$batting_team','$Bowling_team',$current_over,$current_ball,$run_taken,$current_wkt,$innings_no,'$commentry',$eid,$level,now(),now())";
	   $insert_p=mysqli_query($conn,$insert);
	   if($insert_p==true)
	               {
					$check=mysqli_num_rows(mysqli_query($conn,"select * from cricket_score_details where match_id='$match_id' and innigs_no='$innings_no'")); 
					if($check==0)
					    {
$ins=mysqli_query($conn,"insert into cricket_score_details values('',$match_id,$run_taken,$current_wkt,$current_over,$current_ball,now(),$innings_no,'$batting_team','$Bowling_team')");	
if($ins==true)
                    {
							  
 echo"<script> location.replace('../manage_live_cricket_score.php?set_live_score=set_live_score&match_type=2&match_id=$match_id&match_title=$match_title&tour_title=$tour_title&start_by=$eid&lvl=$level&success=success&inn=$innings_no'); </script>";   	 	
						
						}						
						} 
					else
					    {
	$update=mysqli_query($conn,"update cricket_score_details set current_run=current_run+$run_taken,current_wicket=$current_wkt,total_over=$current_over,
total_ball=$current_ball where match_id='$match_id' and innigs_no='$innings_no'");
if($update==true)
                          {
							  
 echo"<script> location.replace('../manage_live_cricket_score.php?set_live_score=set_live_score&match_type=2&match_id=$match_id&match_title=$match_title&tour_title=$tour_title&start_by=$eid&lvl=$level&success=success&inn=$innings_no'); </script>";   	  
							  }						
						 }	 
					   
				    }

	   }
elseif(isset($_POST['set_bat_rate']))
   {
	   $level=$_POST['level'];
	   $eid=$_POST['eid'];
	   $match_id=$_POST['match_id'];
	   $match_title=$_POST['match_title'];
	   $tour_title=$_POST['tour_title'];
	   $fir_team=$_POST['fir_team'];
	   $f_team_ratio=$_POST['f_team_ratio'];
	   $second_team=$_POST['second_team'];
	   $s_team_ratio=$_POST['s_team_ratio'];
	   $draw=$_POST['draw'];
	   $draw_ration=$_POST['draw_ration'];	   
	 $ins=mysqli_query($conn,"insert into bet_rating values('',$match_id,'$match_title','$fir_team',$f_team_ratio,'$second_team',$s_team_ratio,'$draw',$draw_ration,$level,$eid,now(),now())");
	 if($ins==true)
	   {  
//manage_live_cricket_score.php?set_bet_issue=set_bet_issue&match_type=2&match_id=match_id&match_title=match_title&tour_titletour_title&start_by=$eid&lvl=$level
 echo"<script> location.replace('../manage_live_cricket_score.php?set_bet_issue=set_bet_issue&match_type=2&match_id=$match_id&match_title=$match_title&tour_title=$tour_title&start_by=$eid&lvl=$level&success=success'); </script>";   
	   }
   }
elseif(isset($_POST['place_bet']))
   {
	   $level=$_POST['level'];
	   $eid=$_POST['eid'];
	   $match_id=$_POST['match_id'];
       $bet_team=$_POST['bet_team'];
	   $ration=$_POST['ration'];
	   $gwallet=$_POST['gwallet'];	
	   $pin_code=$_POST['pin_code'];
	   $bet_amount=$_POST['bet_amount'];
	   $return_amnt=$_POST['return_amnt'];
	   $tpin_code=$_POST['tpin_code'];   
       if($pin_code==$tpin_code)
	       {
			  if($gwallet>=$bet_amount)
			       {
			$user_rat=mysqli_query($conn,"insert into user_rating values('',$level,$eid,$match_id,'$bet_team',$ration,$gwallet,'$pin_code',$bet_amount,$return_amnt,now())");		
			if($user_rat==true)
			                 {
								 
				$upd=mysqli_query($conn,"update ratul_login set g_wallet=g_wallet-$bet_amount where id='$eid'");
				if($upd==true)
				                 {
 echo"<script> location.replace('../user_end_recent_game_list.php?manage_bet=manage_bet&team_t=$bet_team&ratio=$ration&match_id=$match_id&success=success_bet'); </script>";  	 
									}				 
							  }   
					   
					}
			   else
			      {
 echo"<script> location.replace('../user_end_recent_game_list.php?manage_bet=manage_bet&team_t=$bet_team&ratio=$ration&match_id=$match_id&success=in_blnc'); </script>";   	  
					  }		   
			   
			   
			}
	    else
		     {
	//			 
 echo"<script> location.replace('../user_end_recent_game_list.php?manage_bet=manage_bet&team_t=$bet_team&ratio=$ration&match_id=$match_id&success=pin_code_miss'); </script>";   
			 
			 }		
   } 			  
   else
    {
 echo"<script>Alert('Please Submit The Button'); </script>";  
 echo"<script> location.replace('../manage_live_cricket_score.php?set_live_score=set_live_score&match_type=2&match_id=$match_id&match_title=$match_title&tour_title=$tour_title&start_by=$eid&lvl=$level'); </script>";   
		}
?>