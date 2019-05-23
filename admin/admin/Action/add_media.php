<?php
 
 include'../../connect/config.php'; 
 if(isset($_POST['Submit']))
   {
		$level=$_POST['level'];
		$entry_id=$_POST['eid'];
		$title=$_POST['title'];
		$media_type=$_POST['media_type'];
		$add=$_POST['add_type'];
		$ntype=$_POST['ntype'];
		$ptype=$_POST['ptype'];
		$description=mysqli_real_escape_string($_POST['description']);
		$valid_formats = array("jpg", "png", "gif", "zip", "bmp","JPG","JPEG","GIF","gif","PNG");
		$max_file_size = 1024*2000000000000000000000000000000000000000000000000000000000000000; //100 kb
		$path = "uploads/"; // Upload directory
		$count = 0;

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to exeicute all files
	
	foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) {
				$cat="insert into media_details values('','$title','$media_type','$description','','$level','$entry_id',now(),now())";
				$cat_p=mysqli_query($conn,$cat);
				if($cat_p==true)
				    {

 //header('Location:../dashboard.php?success=picture_success');
 echo"<script> location.replace('../success_track_add.php?success=picture_success&ptype=$ptype&add=$add'); </script>"; 					
					}	

			//Upper for Upload if image is not chosen
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";

					 //header('Location:../dashboard.php?success=picture_large');
echo"<script> location.replace('../success_track_add.php?success=picture_large&ptype=$ptype&add=$add); </script>"; 	
			}

	        else{ // No error found! Move uploaded files
			$ratul=rand().$name; 

              if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$ratul))
				$count++; // Number of successfully uploaded file
				//below for inserting image path in database
				//Check Leve of user
				$cat="insert into media_details values('','$title','$media_type','$description','$ratul','$level','$entry_id',now(),now())";
				$cat_p=mysqli_query($conn,$cat);
				if($cat_p==true)
				    {
			
					

 //header('Location:../dashboard.php?success=picture_success');
 echo"<script> location.replace('../success_track_add.php?success=picture_success&ptype=$ptype&add=$add'); </script>"; 					
					}
				else
				    {
					print_r($cat_p);
					}   
							   
							
			
				//Check Level of User
				
				
					}
				//Upper for imserting image in database		
	        
	    }
	}
}
}
 elseif(isset($_POST['team_add']))
   {
	   $fblink=$_POST['fblink'];
	   $Twitter=$_POST['Twitter'];
	   $linkedin=$_POST['linkedin'];
	   $memid=$_POST['memid'];
	   $Designation=$_POST['Designation'];
	$cat="insert into team_details values('','$memid','$fblink','$Twitter','$linkedin','$Designation')";
	$catp=mysqli_query($conn,$cat);
	if($catp==true)
        {
 echo"<script> location.replace('../success_track_add.php?success=team&add_type=add'); </script>";   	
        }
      
	   }
elseif(isset($_POST['web_data_add']))
{

	   $level=$_POST['level'];
	   if($level==1)
	     {
		$web_st=1; 
		 }
	   else
	     {
		$web_st=0;  
		 }	 
	   $entry_id=$_POST['eid'];
	   $title=$_POST['title'];
	   $media_type=$_POST['media_type'];
	   $description=mysqli_real_escape_string($_POST['description']);
$valid_formats = array("jpg", "png", "gif", "zip", "bmp","JPG","JPEG","GIF","gif","PNG");
$max_file_size = 1024*2000000000000000000000000000000000000000000000000000000000000000; //100 kb
$path = "uploads/"; // Upload directory
$count = 0;

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to exeicute all files
	
	foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) {
	        //Below for Upload if Image is not Chosen
				
			 //header('Location:../dashboard.php?success=picture_select');
			echo"<script> location.replace('../web_data_add.php?web_data=web_data&success=picture_select'); </script>"; 	

			//Upper for Upload if image is not chosen
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";

					 //header('Location:../dashboard.php?success=picture_large');
			echo"<script> location.replace('../web_data_add.php?web_data=web_data&success=picture_large'); </script>"; 	
	        }


	        else{ // No error found! Move uploaded files
			$ratul=rand().$name; 

              if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$ratul))
				$count++; // Number of successfully uploaded file
				//below for inserting image path in database
				//Check Leve of user
				
				$cat="insert into web_data values('','$title','$media_type','$description','$ratul','$level','$entry_id',now(),now(),$web_st)";
				$cat_p=mysqli_query($conn,$cat);
				if($cat_p==true)
				    {
					//header('Location:../dashboard.php?success=picture_success');
					echo"<script> location.replace('../web_data_add.php?web_data=web_data&success=picture_success'); </script>"; 					
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
elseif(isset($_POST['edit_e']))
     {


       $media_id=$_POST['media_id'];
 	   $level=$_POST['level'];
	   $entry_id=$_POST['eid'];
	   $title=$_POST['title'];
	   $media_type=$_POST['media_type'];
	   $description=mysqli_real_escape_string($_POST['description']);
$valid_formats = array("jpg", "png", "gif", "zip", "bmp","JPG","JPEG","GIF","gif","PNG");
$max_file_size = 1024*2000000000000000000000000000000000000000000000000000000000000000; //100 kb
$path = "uploads/"; // Upload directory
$count = 0;

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to exeicute all files
	
	foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) {
	        //Below for Upload if Image is not Chosen
				
$ra_up=mysqli_query($conn,"update web_data set media_title='$title',media_type='$media_type',media_description='$description' where media_id='$media_id'");
echo"<script> location.replace('../web_data_add.php?web_data=web_data&success=picture_success'); </script>"; 	

			//Upper for Upload if image is not chosen
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";

					 //header('Location:../dashboard.php?success=picture_large');
echo"<script> location.replace('../web_data_add.php?web_data=web_data&success=picture_large'); </script>"; 	
	        }


	        else{ // No error found! Move uploaded files
			$ratul=rand().$name; 

              if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$ratul))
				$count++; // Number of successfully uploaded file
				//below for inserting image path in database
				//Check Leve of user
				
				$cat="update web_data set media_title='$title',media_type='$media_type',media_description='$description',media_file='$ratul' where media_id='$media_id'";
				$cat_p=mysqli_query($conn,$cat);
				if($cat_p==true)
				    {

 //header('Location:../dashboard.php?success=picture_success');
 echo"<script> location.replace('../web_data_add.php?web_data=web_data&success=picture_success'); </script>"; 					
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

	$media_id=$_POST['media_id'];
	$level=$_POST['level'];
	$entry_id=$_POST['eid'];
	$title=$_POST['title'];
	$ptype=$_POST['ptype'];
	
	$media_type=$_POST['media_type'];
	$description=mysqli_real_escape_string($_POST['description']);
	$valid_formats = array("jpg", "png", "gif", "zip", "bmp","JPG","JPEG","GIF","gif","PNG");
	$max_file_size = 1024*2000000000000000000000000000000000000000000000000000000000000000; //100 kb
	$path = "uploads/"; // Upload directory
	$count = 0;


if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to exeicute all files
	
	foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) {
	        //Below for Upload if Image is not Chosen
				
$ra_up=mysqli_query($conn,"update media_details set media_title='$title',media_type='$media_type',media_description='$description' where media_id='$media_id'");
echo "<script> location.replace('../success_track_add.php?success=picture_success&ptype=$ptype&edit=edit'); </script>"; 	

			//Upper for Upload if image is not chosen
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";

					 //header('Location:../dashboard.php?success=picture_large');
echo "<script> location.replace('../success_track_add.php?success=picture_large&ptype=$ptype&edit=edit'); </script>"; 	
	        }


	        else{ // No error found! Move uploaded files
			$ratul=rand().$name; 

              if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$ratul))
				$count++; // Number of successfully uploaded file
				//below for inserting image path in database
				//Check Leve of user
				
				$cat="update media_details set media_title='$title',media_type='$media_type',media_description='$description',media_file='$ratul' where media_id='$media_id'";
				$cat_p=mysqli_query($conn,$cat);
				if($cat_p==true)
				    {

					//header('Location:../dashboard.php?success=picture_success');
					echo"<script> location.replace('../success_track_add.php?success=picture_success&ptype=$ptype&edit=edit'); </script>"; 					
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
 elseif(isset($_GET['delete_w']))
                {
			$media_id=$_GET['media_id'];
			$dlt=mysqli_query($conn,"delete from media_details where media_id='$media_id'");		
			 echo"<script> location.replace('../web_data_add.php?web_data=web_data&success=pic_delete'); </script>"; 			
					}
 elseif(isset($_GET['publish']))
                {
			$media_id=$_GET['media_id'];
			
			$dlt=mysqli_query($conn,"update web_data set `web_st`=1 where `media_id`='$media_id'");		
			 echo"<script> location.replace('../web_data_add.php?web_data=web_data&success=publish'); </script>"; 			
					}			   
 elseif(isset($_GET['delete']))
                {
			$media_id=$_GET['media_id'];
			$ptype=$_GET['ptype'];
			$dlt=mysqli_query($conn,"delete from media_details where media_id='$media_id'");		
			 echo"<script> location.replace('../success_track_add.php?success=pic_delete&add=add&ptype=$ptype'); </script>"; 			
					}			  
   else
    {
		//header('Location:../transfer_fund.php?success=submit');
 echo"<script> location.replace('../success_track_add.php?success=submit'); </script>";   
		}
?>