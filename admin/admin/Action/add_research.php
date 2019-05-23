<?php
 include '../../connect/config.php'; 
 if(isset($_POST['add_research']))
   {
    //    scientist_id,research_name,research_details,files,publish_date
		$employee_details_id=$_POST['employee_details_id'];
		$research_name=$_POST['research_name'];
		$publish_date=$_POST['publish_date'];
		$research_details=($_POST['research_details']);
		$valid_formats = array("jpg", "png", "gif", "zip", "bmp","JPG","JPEG","GIF","gif","PNG","pdf","doc","docx");
		$max_file_size = 1024*2000000000000000000000000000000000000000000000000000000000000000; //100 kb
		$path = "research/"; // Upload directory
		$count = 0;


if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to exeicute all files
	
	foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) {
				$research="INSERT into research (`employee_details_id`,`research_name`,`research_details`,`publish_date`,`created_at`) values('$employee_details_id','$research_name','$research_details','$publish_date', now())";
				$research_q=mysqli_query($conn,$research);
				if($research_q==true)
				    {
                    //header('Location:../dashboard.php?success=picture_success');
                    echo"<script> location.replace('../add_research.php?research=research_list&&success=success'); </script>";			
					}	

			//Upper for Upload if image is not chosen
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";

            //header('Location:../dashboard.php?success=picture_large');
            echo"<script> location.replace('../add_research.php?research=add_research&&success=error'); </script>"; 	
			}

	        else{ // No error found! Move uploaded files
			$ratul=rand().$name; 

              if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$ratul))
                $count++; 
                // Number of successfully uploaded file
				//below for inserting image path in database
				//Check Leve of user
				$research="INSERT into research (`employee_details_id`,`research_name`,`research_details`,`publish_date`,`created_at`,`research_media`) values('$employee_details_id','$research_name','$research_details','$publish_date', now(),'$ratul')";
				$research_q=mysqli_query($conn,$research);
				if($research_q==true)
				    {  
                    //header('Location:../dashboard.php?success=picture_success');
                    echo"<script>location.replace('../add_research.php?research=add_research&&success=success'); </script>";  					
					}
				else
				    {
					echo"<script>location.replace('../add_research.php?research=add_research&&success=error'); </script>";  	
					}   
				//Check Level of User
					}
				//Upper for imserting image in database		
	        
	    }
	}
}
}

elseif(isset($_POST['update_research']))
{   
    $research_id = $_POST['research_id'];
	// $scientist_id=$_POST['scientist_id'];
	$employee_details_id=$_POST['employee_details_id'];
    $research_name=$_POST['research_name'];
    $publish_date=$_POST['publish_date'];
    $research_details=mysqli_real_escape_string($_POST['research_details']);
    $valid_formats = array("jpg", "png", "gif", "zip", "bmp","JPG","JPEG","GIF","gif","PNG","pdf","doc","docx");
    $max_file_size = 1024*2000000000000000000000000000000000000000000000000000000000000000; //100 kb
    $path = "research/"; // Upload directory
    $count = 0;


if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to execute all files
	
	foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) {
	    //Below for Upload if Image is not Chosen
		$ra_up=mysqli_query($conn,"UPDATE research set employee_details_id='$employee_details_id',research_name='$research_name',publish_date='$publish_date',research_details='$research_details' where id ='$research_id'");
		echo"<script> location.replace('../add_research.php?research=research_list&&success=success'); </script>";
		//Upper for Upload if image is not chosen
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";

					 //header('Location:../dashboard.php?success=picture_large');
		 echo"<script> location.replace('../add_research.php?research=research_list&&success=error'); </script>";	
	        }


	        else{ // No error found! Move uploaded files
			$ratul=rand().$name; 
              if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$ratul))
				$count++; // Number of successfully uploaded file
				//below for inserting image path in database
				//Check Leve of user
				
				$cat="UPDATE research set scientist_id='$employee_details_id',research_name='$research_name',publish_date='$publish_date',research_details='$research_details',research_media='$ratul' where id ='$research_id'";
				$cat_p=mysqli_query($conn,$cat);
				if($cat_p==true)
				    {
					//header('Location:../dashboard.php?success=picture_success');
                    echo"<script> location.replace('../add_research.php?research=research_list&&success=success'); </script>";	     					
					}
				else
				    {
					echo"<script> location.replace('../add_research.php?research=research_list&&success=error'); </script>";	   
					}   
							   
							
			
				//Check Level of User
				
				
					}
				
				//Upper for imserting image in database
				
				
	        
	    }
	}
}
}
elseif(isset($_GET['research_delete']))
{
    $research_id=$_GET['research_id'];
    
    $dlt=mysqli_query($conn,"UPDATE research set `research_st`= 0 where `id`='$research_id'");		
        echo"<script> location.replace('../add_research.php?research=research_list&&success=success'); </script>";
}