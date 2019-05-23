<?php
 
 include'../../connect/config.php'; 
 if(isset($_POST['submit_league']))
   {
	   $level=$_POST['level'];
	   $entry_id=$_POST['id'];
	   $football_league=$_POST['football_league'];
	   $year=$_POST['year'];
	   $start_date=$_POST['start_date'];
	   $date_dif=mysqli_query($conn,"SELECT DATEDIFF('$start_date',curdate()) AS DiffDate");
	   while($d=mysqli_fetch_array($date_dif))
	         {
				$diff=$d['0']; 
			 }
		$inser="insert into football_league values('','$football_league','$year','$start_date',$diff,now(),now(),$entry_id,$level,1)";	
		$inser_p=mysqli_query($conn,$inser);
		if($inser_p==true)
		         {
				 echo"<script> location.replace('../manage_football_league.php?success=success_start'); </script>";    
				  } 
		else
		       {
				  echo"<script> location.replace('../manage_football_league.php?success=success_start_failed'); </script>";  
				 }		  
	   }
 elseif(isset($_POST['edit']))
           {
	   $league_id=$_POST['league_id'];	   
	   $level=$_POST['level'];
	   $entry_id=$_POST['id'];
	   $football_league=$_POST['football_league'];
	   $year=$_POST['year'];
	   $start_date=$_POST['start_date'];
	   $date_dif=mysqli_query($conn,"SELECT DATEDIFF('$start_date',curdate()) AS DiffDate");
	   while($d=mysqli_fetch_array($date_dif))
	         {
				$diff=$d['0']; 
			 }			
	$upd=mysqli_query($conn,"update football_league set football_league_title='$football_league',foot_year='$year',start_date='$start_date'
where football_league_id='$league_id'");
if($upd==true) 
                  {
  echo"<script> location.replace('../manage_football_league.php?success=success_update'); </script>";   
				   }
  else
                {
 echo"<script> location.replace('../manage_football_league.php?success=success_update_f'); </script>";	
					}				   		
			}
 elseif(isset($_GET['delete']))
                {
$league_id=$_GET['league_id']; 
$dl=mysqli_query($conn,"delete from football_league where football_league_id='$league_id'");
if($dl==true)
                 {
echo"<script> location.replace('../manage_football_league.php?success=success_delete'); </script>";		 
					 }
	else
	    {
echo"<script> location.replace('../manage_football_league.php?success=success_deletef'); </script>";		
			}			 
				 }			  
   else
    {
		//header('Location:../transfer_fund.php?success=submit');
 echo"<script> location.replace('../manage_football_league.php?success=submit'); </script>";   
		}
?>