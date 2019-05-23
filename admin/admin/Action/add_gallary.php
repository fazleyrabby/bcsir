<?php 

 include '../../connect/config.php'; 

//Adding New image
 if (isset($_POST['add_new_image'])) {  

   $image_title = $_POST['image_title'];
   $image_st = $_POST['image_type'];
   $usernamee = $_POST['username'];
   $image_description = mysqli_real_escape_string($_POST['image_description']);
   //$media_type=$_POST['media_type'];
   //$level=$_POST['level'];
   //$entry_id=$_POST['eid'];
   //$title=$_POST['title'];
   //$add_type=$_POST['add_type'];
   //$ntype=$_POST['ntype'];
   //$description=mysqli_real_escape_string($_POST['description']);
   $valid_formats = array("jpg", "png", "gif", "zip", "bmp","JPG","JPEG","GIF","gif","PNG");
   $max_file_size = 1024*2000000000000000000000000000000000000000000000000000000000000000; //100 kb
   $path = "uploads/"; // Upload directory
   $count = 0;

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
  // Loop $_FILES to exeicute all files

  foreach ($_FILES['files']['name'] as $f => $name) {     
      if ($_FILES['files']['error'][$f] == 4) {
        $cat="INSERT into image values('','$image_title','$image_st','$image_description','$random','$usernamee',now())";
        $cat_p=mysqli_query($conn,$cat);
        if($cat_p==true)
            {
            echo"<script> location.replace('../add_image.php?add_image=image_list&success=picture_not_found'); </script>";          
            } 
              //Upper for Upload if image is not chosen
            }        
            if ($_FILES['files']['error'][$f] == 0) {            
                if ($_FILES['files']['size'][$f] > $max_file_size) {
                    $message[] = "$name is too large!.";

                echo"<script> location.replace('../add_image.php?add_image=image_list&success=picture_large'); </script>";   
           }
            else{ // No error found! Move uploaded files
            $random=rand().$name; 
            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$random))
            $count++; // Number of successfully uploaded file
            //below for inserting image path in database
            
            $cat="INSERT into image values('','$image_title','$image_st','$image_description','$random','$usernamee',now(),'')";
            $cat_p=mysqli_query($conn,$cat);
            if($cat_p==true)
            {
                echo"<script> location.replace('../add_image.php?add_image=image_list&success=picture_success'); </script>";          
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


// elseif(isset($_POST['update_image']))
//     {
//     $image_title = $_POST['image_title'];
//     $image_st = $_POST['image_type'];
//     $usernamee = $_POST['username'];
//     $image_description = mysqli_real_escape_string($_POST['image_description']);
//     $valid_formats = array("jpg", "png", "gif", "zip", "bmp","JPG","JPEG","GIF","gif","PNG");
//     $max_file_size = 1024*2000000000000000000000000000000000000000000000000000000000000000; //100 kb
//     $path = "uploads/"; // Upload directory
//     $count = 0;

// if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
// 	// Loop $_FILES to exeicute all files
	
// 	foreach ($_FILES['files']['name'] as $f => $name) {     
// 	    if ($_FILES['files']['error'][$f] == 4) {
// 	        //Below for Upload if Image is not Chosen
				
// $ra_up=mysqli_query($conn,"UPDATE image set image_title='$title',image_st='$image_st',image_des='$image_description' where id='$image_id'");
//             echo"<script> location.replace('../add_image.php?image=image&success=picture_success'); </script>"; 	

// 			//Upper for Upload if image is not chosen
//             }	       
//             if ($_FILES['files']['error'][$f] == 0) {	           
//                 if ($_FILES['files']['size'][$f] > $max_file_size) {
//                     $message[] = "$name is too large!.";
//                         //header('Location:../dashboard.php?success=picture_large');
//                 echo"<script> location.replace('../add_image.php?image=image&success=picture_large'); </script>"; 	
//                 }

// 	        else{ // No error found! Move uploaded files
// 			$random=rand().$name; 

//               if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$random))
// 				$count++; // Number of successfully uploaded file
// 				//below for inserting image path in database
// 				//Check Leve of user
				
// 				$cat="update image set media_title='$title',media_type='$media_type',media_description='$description',media_file='$random' where media_id='$media_id'";
// 				$cat_p=mysqli_query($conn,$cat);
// 				if($cat_p==true)
// 				    {

//             //header('Location:../dashboard.php?success=picture_success');
//              echo"<script> location.replace('../add_image.php?image=image&success=picture_success'); </script>"; 					
// 					}
// 				else
// 				    {
					
// 					  echo mysqli_error($conn);
// 					}   
							   
							
			
// 				//Check Level of User
				
				
// 					}
				
// 				//Upper for imserting image in database
				
				
	        
// 	    }
// 	}
// }

// //Deleting image
// if (isset($_GET['image_delete'])) { 
   
//    $image_id = $_GET['image_id'];
//    $delete_image=mysqli_query($conn,"UPDATE image SET type = 3 WHERE id = '$image_id'");

//     if($delete_image==true){
//     echo "<script> location.replace('../add_image.php?success=image_success&add_image=image_list'); </script>";
    
//       }
//       else {
//         echo "<script> location.replace('../add_image.php?success=image_error&add_image=image_list'); </script>";
//       }
//     }


// //Status of image
// if (isset($_GET['image_st'])) { 
   
//   $image_id = $_GET['image_id'];
//   $image_st = $_GET['st'];
//   if ($image_st == 0) {
//       $image_st = 1;
//     }
//     else {
//       $image_st = 0;
//     }

//    $delete_image=mysqli_query($conn,"UPDATE image SET type = '$image_st' WHERE id = '$image_id'");

//     if($delete_image==true){
//     echo "<script> location.replace('../add_image.php?success=image_success&add_image=image_list'); </script>";
    
//       }
//       else {
//         echo "<script> location.replace('../add_image.php?success=image_error&add_image=image_list'); </script>";
//       }
//     }


?>