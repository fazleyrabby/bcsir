<?php 

 include'../../connect/config.php'; 

//Adding New news
 if (isset($_POST['add_new_news'])) 
 {  
   $news_title = $_POST['news_title'];
   $news_st = $_POST['news_type'];
   $usernamee = $_POST['username'];
   $news_description = mysqli_real_escape_string($_POST['news_description']);
   $valid_formats = array("jpg", "png", "gif", "zip", "bmp","JPG","JPEG","GIF","gif","PNG");
   $max_file_size = 1024*2000000000000000000000000000000000000000000000000000000000000000; //100 kb
   $path = "uploads/"; // Upload directory
   $count = 0;



if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
  // Loop $_FILES to exeicute all files

  foreach ($_FILES['files']['name'] as $f => $name) {     
      if ($_FILES['files']['error'][$f] == 4) {
        $cat="INSERT into news values('','$news_title','$news_st','$news_description','','$usernamee',now(),now())";
        $cat_p=mysqli_query($conn,$cat);
        if($cat_p==true)
            {
            echo"<script> location.replace('../add_news.php?add_news=news_list&success=picture_not_found'); </script>";          
            } 
              //Upper for Upload if image is not chosen
            }        
            if ($_FILES['files']['error'][$f] == 0) {            
                if ($_FILES['files']['size'][$f] > $max_file_size) {
                    $message[] = "$name is too large!.";

                echo"<script> location.replace('../add_news.php?add_news=news_list&success=picture_large'); </script>";   
            }
            else{ // No error found! Move uploaded files
            $random=rand().$name; 
            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$random))
            $count++; // Number of successfully uploaded file
            //below for inserting image path in database
            
            $cat="INSERT into news values('','$news_title','$news_st','$news_description','$random','$usernamee',now(),'')";
            $cat_p=mysqli_query($conn,$cat);
            if($cat_p==true)
            {
                echo"<script> location.replace('../add_news.php?add_news=news_list&success=picture_success'); </script>";          
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

if (isset($_POST['update_news'])) 
  {  
  $news_title = $_POST['news_title'];
  $news_id = $_POST['news_id'];
  $news_st = $_POST['news_type'];
  //$files=$_FILES['files']['name'];
  $usernamee = $_POST['username'];
  $news_description = mysqli_real_escape_string($_POST['news_description']);
  $valid_formats = array("jpg", "png", "gif", "zip", "bmp","JPG","JPEG","GIF","gif","PNG");
  $max_file_size = 1024*2000000000000000000000000000000000000000000000000000000000000000; //100 kb
  $path = "uploads/"; // Upload directory
  $count = 0;

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
 // Loop $_FILES to exeicute all files 
 foreach($_FILES['files']['name'] as $f => $name) {     
     if ($_FILES['files']['error'][$f] == 4) {
       $ra_up="UPDATE news set news_title='$news_title',image='',news_st='$news_st',news_des='$news_description' where id='$news_id'";
       $cat_p=mysqli_query($conn,$ra_up);
       
       if($cat_p==true)
           {
           echo"<script>location.replace('../add_news.php?add_news=news_list&success=picture_not_found');</script>";      
           }
            //Upper for Upload if image is not chosen
           }        
           if ($_FILES['files']['error'][$f] == 0) {            
               if ($_FILES['files']['size'][$f] > $max_file_size) {
                $message[] = "$name is too large!.";

               echo"<script> location.replace('../add_news.php?add_news=news_list&success=picture_large'); </script>";   
             
          }
           else{ // No error found! Move uploaded files
           $random=rand().$name; 
           if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$random))
           $count++; // Number of successfully uploaded file
           //below for inserting image path in database
           
           $cat="UPDATE news set news_title='$news_title',news_st='$news_st',news_des='$news_description',image='$random' where id='$news_id'";
           $cat_p=mysqli_query($conn,$cat);
           if($cat_p==true)
           {
               echo"<script> location.replace('../add_news.php?add_news=news_list&success=picture_success'); </script>";
                    
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

//Deleting news
if (isset($_GET['news_delete'])) { 
   
   $news_id = $_GET['news_id'];
   $delete_news=mysqli_query($conn,"UPDATE news SET news_st = 3 WHERE id = '$news_id'");

    if($delete_news==true){
    echo "<script> location.replace('../add_news.php?success=news_success&add_news=news_list'); </script>";
    
      }
      else {
        echo "<script> location.replace('../add_news.php?success=news_error&add_news=news_list'); </script>";
      }
    }


//Status of news
if (isset($_GET['news_st'])) { 
   
  $news_id = $_GET['news_id'];
  $news_st = $_GET['st'];
  if ($news_st == 0) {
      $news_st = 1;
    }
    else {
      $news_st = 0;
    }

   $delete_news=mysqli_query($conn,"UPDATE news SET news_st = '$news_st' WHERE id = '$news_id'");

    if($delete_news==true){
    echo "<script> location.replace('../add_news.php?success=news_success&add_news=news_list'); </script>";
    
      }
      else {
        echo "<script> location.replace('../add_news.php?success=news_error&add_news=news_list'); </script>";
      }
    }

?>