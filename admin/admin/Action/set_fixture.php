<?php
 
 include'../../connect/config.php'; 
 if(isset($_POST['submit']))
   {
	   $level=$_POST['level'];
	   $eid=$_POST['eid'];
	   $tournamnet_title=$_POST['tournamnet_title'];
	   $tournamnt_id=$_POST['tournamnt_id'];
	   $gtype=$_POST['gtype'];
	   $first_team=$_POST['first_team'];
	   $second_team=$_POST['second_team'];
	   $Match_date=$_POST['Match_date'];
	   $start_time=$_POST['start_time'];
	   $Venue=$_POST['Venue'];
	 $chk=mysqli_query($conn,"select * from fixture where first_team in ('$first_team','$second_team') and second_team in 
	 ('$first_team','$second_team') and match_date='$Match_date'");  
	 $chk_c=mysqli_num_rows($chk);
     if($chk_c==0)
	       {
			   $ins="insert into fixture values('',$gtype,$tournamnt_id,'$tournamnet_title','$first_team','$second_team','$Match_date','$start_time',$eid,$level,now(),now(),'$Venue')";
			   $ins_p=mysqli_query($conn,$ins);
			   if($ins_p==true)
			       {
			    echo"<script> location.replace('../set_fixture.php?gamehis=gamehis&gtype=$gtype&tournament_id=$tournamnt_id&tournamnet_title=$tournamnet_title&success=successf'); </script>";      
					}
			   else
			      {
				         echo mysqli_error($conn);
				   }
				  		
			   
			   }
	  else
	      {
			    echo"<script> location.replace('../set_fixture.php?gamehis=gamehis&gtype=$gtype&tournament_id=$tournamnt_id&tournamnet_title=$tournamnet_title&success=already_has'); </script>";    
			  }	   
	   }
elseif(isset($_POST['set_url']))
      {
	   $fixture_id=$_POST['fix_id'];
	   $tournamnet_title=$_POST['tournamnet_title'];
	   $tournamnt_id=$_POST['tournamnt_id'];  
	   $url=$_POST['url'];
		$insrt=mysqli_query($conn,"insert into vdo_url values('',$fixture_id,'$tournamnet_title','$tournamnt_id','$url',now())");
		if($insrt==true)
		     {
//set_fixture.php?gamehis=gamehis&gtype=2&tournament_id=4&tournamnet_title=BPL&set_video=set_video&2=fix_id
			    echo"<script> location.replace('../set_fixture.php?gamehis=gamehis&gtype=2&tournament_id=$tournamnt_id&tournamnet_title=$tournamnet_title&success=successfvdo&set_video=set_video'); </script>"; 					 
				 }  
		  }	   
elseif(isset($_POST['edit']))
    {
	   $fixture_id=$_POST['fix_id'];
	   $tournamnet_title=$_POST['tournamnet_title'];
	   $tournamnt_id=$_POST['tournamnt_id'];
	   $gtype=$_POST['gtype'];
	   $first_team=$_POST['first_team'];
	   $second_team=$_POST['second_team'];
	   $Match_date=$_POST['Match_date'];
	   $start_time=$_POST['start_time'];
	   $Venue=$_POST['Venue'];
	 $edit=mysqli_query($conn,"update fixture set first_team='$first_team',second_team='$second_team',match_date='$Match_date',match_time='$start_time',venue='$Venue'
where fixture_id='$fixture_id'"); 
if($edit==true)
             {
			    echo"<script> location.replace('../set_fixture.php?gamehis=gamehis&gtype=$gtype&tournament_id=$tournamnt_id&tournamnet_title=$tournamnet_title&success=successfedit&view_fixture=view_fixture'); </script>"; 	 
				 
			 } 	
		}
elseif(isset($_GET['delete']))
    {
	   $fixture_id=$_GET['fix_id'];
	   $tournamnet_title=$_GET['tournamnet_title'];
	   $tournamnt_id=$_GET['tournament_id'];
	   $gtype=$_GET['gtype'];
	   $dlete=mysqli_query($conn,"delete from fixture where fixture_id='$fixture_id'");
	   if($dlete==true)
	         {
			    echo"<script> location.replace('../set_fixture.php?gamehis=gamehis&gtype=$gtype&tournament_id=$tournamnt_id&tournamnet_title=$tournamnet_title&success=successfdelete&view_fixture=view_fixture'); </script>"; 		 
		     }
		
	}
elseif(isset($_GET['start_matach']))
    {
		$match_type=$_GET['match_type'];
	    $match_id=$_GET['match_id'];
		$match_title=$_GET['match_title'];
		$tour_title=$_GET['tour_title'];
		$start_by=$_GET['start_by'];
		$lvl=$_GET['lvl'];
		$ins=mysqli_query($conn,"insert into cricket_match_starts values('','$match_id',1,$start_by,$lvl,0,0,now(),'',$match_type,'$match_title','$tour_title',0)");
		if($ins==true)
		        {
			//manage_cricket_match.php?match_type=2	
			    echo"<script> location.replace('../manage_cricket_match.php?match_type=2&success=start_match&btwn=$match_title'); </script>"; 		
				}
				else
				{
					
					echo mysqli_error($conn);
					}
	
	}
elseif(isset($_GET['end_match']))
        {

		$match_type=$_GET['match_type'];
	    $match_id=$_GET['match_id'];
		$match_title=$_GET['match_title'];
		$tour_title=$_GET['tour_title'];
		$start_by=$_GET['start_by'];
		$lvl=$_GET['lvl'];
		$ins=mysqli_query($conn,"update cricket_match_starts set end_time=now(),end_level=$lvl,end_by='$start_by',end_status=1 where match_id='$match_id'");
		if($ins==true)
		        {
			//manage_cricket_match.php?match_type=2	
			    echo"<script> location.replace('../manage_cricket_match.php?match_type=2&success=end_match&btwn=$match_title'); </script>"; 		
				}
				else
				{
					
					echo mysqli_error($conn);
					}
	
		
		}				  
   else
    {
		//header('Location:../transfer_fund.php?success=submit');
 echo"<script> location.replace('../Add_team.php?success=submit'); </script>";   
		}
?>