<?php
 
 include'../../connect/config.php'; 
 if(isset($_POST['submit']))
   {
	   $level=$_POST['level'];
	   $tournament_id=$_POST['tournament_id'];
	   $team=$_POST['team'];
	   $tcount=count($team);
	   $tournament_team="insert into tournament_team values('',$tournament_id,$tcount,$level,now())";
	   $tournament_team_d=mysqli_query($conn,$tournament_team);
	   if($tournament_team_d==true)
	                 {
					    $tmx=mysqli_query($conn,"select * from tournament_team order by tournament_teamid desc limit 1"); 
					    while($md=mysqli_fetch_array($tmx))
						     {
								 $tmid=$md['0'];
								 }
						for($i=0;$i<$tcount;$i++)
						    {
					$ins=mysqli_query($conn,"insert into tournament_team_detail values('',$tmid,$team[$i],now())");	
					if($ins==true)
					              {
echo"<script> location.replace('../manage_team_tournament.php?success=success_start'); </script>";		  
								  }	
						else
						  {
							  echo mysqli_error($conn);
							  }		  	
							}		 
					  }
	   
	   
	   }
 elseif(isset($_POST['edit']))
           {}
 elseif(isset($_GET['delete']))
                {
					$league_id=$_GET['league_id'];
					$dl=mysqli_query($conn,"delete from team_details where team_id='$league_id'");
					if($dl==true)
                 {
echo"<script> location.replace('../manage_team_tournament.php?success=success_delete'); </script>";		 
					 }
	else
	    {
echo"<script> location.replace('../manage_team_tournament.php?success=success_deletef'); </script>";		
			}	
					}			  
   else
    {
		//header('Location:../transfer_fund.php?success=submit');
 echo"<script> location.replace('../Add_team.php?success=submit'); </script>";   
		}
?>