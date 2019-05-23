<?php 
//0 = তথ,1=আবেদন ফরম,2=প্রকল্প,3=আইন ও নীতিমালা,4=যোগাযোগ,5=সেবা,6=প্রকাশনা ও প্রতিবেদন,7=উদ্ভাবিত পণ্য,8=প্রসেস ও প্যাটেন্ট
 include '../../connect/config.php'; 

//Adding New news
 if (isset($_POST['add_new_content'])) 
 {  
   $content_title = $_POST['content_title'];
   $content_st = $_POST['content_st'];
   $content_type = $_POST['content_type'];

   $usernamee = $_POST['username'];
   $content_descritpion = mysqli_real_escape_string($_POST['content_descritpion']);
 
   $valid_formats = array("jpg", "png", "gif", "zip", "bmp","JPG","JPEG","GIF","gif","PNG","pdf");
   $max_file_size = 2000000;
   $path = "uploads/"; // Upload directory
   $count = 0;

// content_id,content_st,content_type,content_title,content_des,content_media,add_by,created_at,updated_at

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
  // Loop $_FILES to exeicute all files
  foreach ($_FILES['files']['name'] as $f => $name) {     
      if ($_FILES['files']['error'][$f] == 4) {
        $cat="INSERT into home_other_content values('','$content_st','$content_type','$content_title','$content_descritpion','','$usernamee',now(),now())";
        $cat_p=mysqli_query($conn,$cat);
        if($cat_p==true)
            {
            echo"<script> location.replace('../add_other_content.php?add_other_content=content_list&success=picture_not_found'); </script>";          
            } 
              //Upper for Upload if image is not chosen
            }        
            if ($_FILES['files']['error'][$f] == 0) {            
                if ($_FILES['files']['size'][$f] > $max_file_size) {
                    //$message[] = "$name is too large!.";

                echo"<script> location.replace('../add_other_content.php?add_other_content=content_list&success=picture_large'); </script>";   
            }
        
            else{ // No error found! Move uploaded files
            $random=rand().$name; 
            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$random))
            $count++; // Number of successfully uploaded file
            //below for inserting image path in database
            
            $cat="INSERT into home_other_content values('','$content_st','$content_type','$content_title','$content_descritpion','$random','$usernamee',now(),now())";
            $cat_p=mysqli_query($conn,$cat);
            if($cat_p==true)
            {
                echo"<script> location.replace('../add_other_content.php?add_other_content=content_list&success=picture_success'); </script>";          
            }
        else
            {
            echo mysqli_error($conn);
            }   
           //Check Level of User
        
        
          }
        //Upper for inserting image in database  
      }
  }
}
}

if(isset($_POST['update_content'])) 
  {  
   $content_id = $_POST['content_id'];
   $usernamee = $_POST['username'];
   $content_title = $_POST['content_title'];
   $content_st = $_POST['content_st'];
   $content_type = $_POST['content_type'];
   $content_description = $_POST['content_description'];
   $usernamee = $_POST['username'];
   $content_description = mysqli_real_escape_string($_POST['content_description']);
    $valid_formats = array("jpg", "png", "gif", "zip", "bmp","JPG","JPEG","GIF","gif","PNG","PDF");
    $max_file_size = 999999999999999999999999999999999999999999999999; 
    $path = "uploads/"; // Upload directory
    $count = 0;

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
 // Loop $_FILES to exeicute all files 
 
 foreach($_FILES['files']['name'] as $f => $name) {     
     if ($_FILES['files']['error'][$f] == 4) {
       $ra_up=mysqli_query($conn,"UPDATE home_other_content SET content_title='$content_title',content_st='$content_st',content_des='$content_description' WHERE content_id='$content_id'");
      //  $cat_p=mysqli_query($conn,$ra_up);
       
       if($ra_up==true)
           {
            echo"<script> location.replace('../add_other_content.php?add_other_content=content_list&success=update'); </script>";
           } 
             //Upper for Upload if image is not chosen
           }     
              
           if ($_FILES['files']['error'][$f] == 0) {            
               if ($_FILES['files']['size'][$f] > $max_file_size) {
                
                echo "file is too large";
             
          }
           else{ // No error found! Move uploaded files
           $random=rand().$name; 
           if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$random))
           $count++; // Number of successfully uploaded file
           //below for inserting image path in database
           
           $cat="UPDATE home_other_content SET content_title='$content_title',content_st='$content_st',content_des='$content_description',content_media='$random' WHERE content_id='$content_id'";
           $cat_p=mysqli_query($conn,$cat);
           if($cat_p==true)
           {
               echo"<script> location.replace('../add_other_content.php?add_other_content=content_list&success=update'); </script>";
                    
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

//Deleting content
if (isset($_GET['content_delete'])) { 
   
   $content_id = $_GET['content_id'];
   $delete_content=mysqli_query($conn,"UPDATE home_other_content SET content_st = 2 WHERE content_id = '$content_id'");

    if($delete_content==true){
       echo "<script> location.replace('../add_other_content.php?add_other_content=content_list&success=deleted'); </script>";
    
      }
      else {
             echo "<script> location.replace('../add_other_content.php?add_other_content=content_list&success=delete_error'); </script>";
      }
    }


//Status of content
if (isset($_GET['content_st'])) { 
   
  $content_id = $_GET['content_id'];
  $content_status = $_GET['st'];

  if ($content_status == 0) {
      $content_pub = 1;
    }
    else {
      $content_pub = 0;
    }

   $content_st=mysqli_query($conn,"UPDATE home_other_content SET content_st = '$content_pub' WHERE content_id = '$content_id'");

    if($content_st==true){
    echo "<script> location.replace('../add_other_content.php?add_other_content=content_list&success=status_update'); </script>";
    
      }
      else {
        echo "<script> location.replace('../add_other_content.php?add_other_content=content_list&success=status_error'); </script>";
      }
    }

?>