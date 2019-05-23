<?php
 
 include'../../connect/config.php'; 
 if(isset($_POST['add_team']))
   {
	   $level=$_POST['level'];
	   $entry_id=$_POST['id'];
	   $Team_Title=$_POST['Team_Title'];
	   $game_type=$_POST['game_type'];
$valid_formats = array("jpg", "png", "gif", "zip", "bmp","JPG","JPEG","GIF","gif","PNG");
$max_file_size = 1024*2000000000000000; //100 kb
$path = "uploads/"; // Upload directory
$count = 0;

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to exeicute all files
	
	foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) {
	        //Below for Upload if Image is not Chosen
				
			 //header('Location:../dashboard.php?success=picture_select');
echo"<script> location.replace('../Add_team.php?success=picture_select'); </script>"; 	

			//Upper for Upload if image is not chosen
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";

					 //header('Location:../dashboard.php?success=picture_large');
echo"<script> location.replace('../Add_team.php?success=picture_large'); </script>"; 	
	        }

			elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
				$message[] = "$name is not a valid format";
// header('Location:../dashboard.php?success=picture_invalid');
 echo"<script> location.replace('../Add_team.php?success=picture_invalid'); </script>"; 
			}
	        else{ // No error found! Move uploaded files
			$ratul=rand().$name; 

              if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$ratul))
				$count++; // Number of successfully uploaded file
				//below for inserting image path in database
				//Check Leve of user
				
				$cat="insert into team_details values('','$Team_Title','$game_type','$ratul','$level','$entry_id',now(),now())";
				$cat_p=mysqli_query($conn,$cat);
				if($cat_p==true)
				    {

 //header('Location:../dashboard.php?success=picture_success');
 echo"<script> location.replace('../Add_team.php?success=picture_success'); </script>"; 					
					}
				else
				    {
					
					  echo mysqli_error($conn);
					}   
							   
							
			
				//Check Level of User
				
				
					}
				
				//Upper for imserting image in database
				
				
	        
	    }
	}
}
	   
	     
	   }
 elseif(isset($_POST['edit']))
           {
		$teamid=$_POST['teamid'];	   
	   $level=$_POST['level'];
	   $entry_id=$_POST['id'];
	   $Team_Title=$_POST['Team_Title'];
	   $game_type=$_POST['game_type'];  
$valid_formats = array("jpg", "png", "gif", "zip", "bmp","JPG","JPEG","GIF","gif","PNG");
$max_file_size = 1024*200; //100 kb
$path = "uploads/"; // Upload directory
$count = 0;  
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to exeicute all files
	
	foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) {
	        //Below for Upload if Image is not Chosen
				
$up="update team_details set team_title='$Team_Title',team_type=$game_type where team_id='$teamid'";
$up_p=mysqli_query($conn,$up);
if($up_p==true)
    {
		 echo"<script> location.replace('../Add_team.php?success=picture_success'); </script>"; 	
		}

			//Upper for Upload if image is not chosen
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";

					 //header('Location:../dashboard.php?success=picture_large');
echo"<script> location.replace('../Add_team.php?success=picture_large&edit=edit&league_id=$teamid'); </script>"; 	
	        }

			elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
				$message[] = "$name is not a valid format";
// header('Location:../dashboard.php?success=picture_invalid');
 echo"<script> location.replace('../Add_team.php?success=picture_invalid&edit=edit&league_id=$teamid'); </script>"; 
			}
	        else{ // No error found! Move uploaded files
			$ratul=rand().$name; 

              if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$ratul))
				$count++; // Number of successfully uploaded file
				//below for inserting image path in database
				//Check Leve of user
				
								$cat="update team_details set team_title='$Team_Title',team_type='$game_type',team_flag='$ratul' where team_id='$teamid'";
				$cat_p=mysqli_query($conn,$cat);
				if($cat_p==true)
				    {

 //header('Location:../dashboard.php?success=picture_success');
 echo"<script> location.replace('../Add_team.php?success=picture_success'); </script>"; 					
					}
				else
				    {
					
					  echo mysqli_error($conn);
					}   
							   
							
			
				//Check Level of User
				
				
					}
				
				//Upper for imserting image in database
				
				
	        
	    }
	}
}	   
			   }
 elseif(isset($_GET['delete']))
                {
					$league_id=$_GET['league_id'];
					$dl=mysqli_query($conn,"delete from team_details where team_id='$league_id'");
					if($dl==true)
                 {
echo"<script> location.replace('../manage_football_league.php?success=success_delete'); </script>";		 
					 }
	else
	    {
echo"<script> location.replace('../Add_team.php?success=success_deletef'); </script>";		
			}	
					}			  
   else
    {
		//header('Location:../transfer_fund.php?success=submit');
 echo"<script> location.replace('../Add_team.php?success=submit'); </script>";   
		}
?>