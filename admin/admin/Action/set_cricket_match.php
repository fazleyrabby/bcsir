<?php
 
 include'../../connect/config.php'; 
 if(isset($_POST['submit_league']))
   {
	  $id=$_POST['id']; 
	  $level=$_POST['level']; 
	  $match_title=$_POST['match_title']; 
	  $match_id=$_POST['match_id'];
	  $match_type=$_POST['match_type'];
	  $tour_title=$_POST['tour_title'];
	  $total_over=$_POST['total_over'];
	  $match_type=$_POST['match_type'];
	  $match_type_p=$_POST['match_type_p'];
	  $total_innings=$_POST['total_innings'];
	  $delete=mysqli_query($conn,"delete from cricket_match_details where cr_match_id='$match_id'"); 
	  if($delete==true)
	         {
			 
	   $insert="insert into cricket_match_details values('',$match_id,$match_type,$total_over,now(),'$match_title','$tour_title','$id',$level,'$match_type_p','$total_innings')"; 
	   $insert_p=mysqli_query($conn,$insert);
	   if($insert_p==true)
	               {
			//manage_cricket_match.php?match_type=$match_type&set_cricket_match=set_cricket_match&match_id=$match_id&match_title=$match_title&tour_title=$tour_title#	
 echo"<script> location.replace('../manage_cricket_match.php?match_type=$match_type&set_cricket_match=set_cricket_match&match_id=$match_id&match_title=$match_title&tour_title=$tour_title&success=success_set_cricket'); </script>";  		   
					}
			else
			    {
					echo mysqli_error($conn);
					
					}		
		     }
	   
	}
 elseif(isset($_POST['publish_result']))
           {
	  $id=$_POST['id']; 
	  $level=$_POST['level']; 
	  $match_title=$_POST['match_title']; 
	  $match_id=$_POST['match_id'];
	  $match_type=$_POST['match_type'];
	  $tour_title=$_POST['tour_title'];
	  $final=$_POST['match_result'];
	  $result_detail=$_POST['result_detail']; 
	  $de=mysqli_query($conn,"delete from published_result where match_id='$match_id'");
	  $in=mysqli_query($conn,"insert into published_result values('','$match_title',$match_id,'$tour_title','$final','$result_detail',now())");
	  if($in==true)
	             {
			$get="select match_id,eid,bet_team,bet_amount,return_amnt,ration from user_rating where bet_team='$final'
			and  match_id='$match_id'";
			$getp=mysqli_query($conn,$get);
			if($getp==true)
			        {
					   while($sd=mysqli_fetch_array($getp))
					          {
							$match_id=$sd['0'];
							$eid=$sd['1'];
							$bet_team=$sd['2'];
							$bet_amnt=$sd['3'];
							$return_amnt=$sd['4'];
							$ration=$sd['5'];
			$ins=mysqli_query($conn,"insert into winner values('',$eid,$match_id,'$bet_team',$bet_amnt,$return_amnt,$ration,now())");
			$up=mysqli_query($conn,"update ratul_login set g_wallet=g_wallet+$return_amnt where id=$eid");					  
							  }  
					}
 echo"<script> location.replace('../manage_cricket_match.php?publish_result=publish_result&match_type=$match_type&match_id=$match_id&match_title=$match_title&tour_title=$tour_title&start_by=$id&lvl=$level&success=pub_res'); </script>";   		 
				  }
			else
			      {
					  
				   }	  	   
			   
			   }
 elseif(isset($_GET['delete']))
                {}			  
   else
    {
		//header('Location:../transfer_fund.php?success=submit');
 echo"<script> location.replace('../manage_cricket_match.php?match_type=2&success=submit'); </script>";   
		}
?>