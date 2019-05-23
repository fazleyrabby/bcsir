<?php 

 include'../../connect/config.php'; 

//Adding New news
 

//    $news_title = $_POST['news_title'];
//    $news_st = $_POST['news_type'];
//    $usernamee = $_POST['username'];
//    $news_description = mysqli_real_escape_string($_POST['news_description']);
//    //$media_type=$_POST['media_type'];
//    //$level=$_POST['level'];
//    //$entry_id=$_POST['eid'];
//    //$title=$_POST['title'];
   
//    //$add_type=$_POST['add_type'];
//    //$ntype=$_POST['ntype'];
//    //$description=mysqli_real_escape_string($_POST['description']);
      $valid_formats = array("jpg","png","gif","jpeg","zip","bmp","JPG","JPEG","GIF","gif","PNG");
      //$max_file_size = 800*1024; //800 kb
//    $path = "uploads/"; // Upload directory
//    $count = 0;

    //  for ($i=0; $i < count($valid_formats) ; $i++) { 
    //      echo $valid_formats[$i];
    //  }
   if(isset($_FILES['files']))
   {
       $max_file_size = 800*1024; //800 kb
       $path = "uploads/"; 
       $name_array = $_FILES['files']['name'];
       $tmp_name_array = $_FILES['files']['tmp_name'];
       $type_array = $_FILES['files']['type'];
       $size_array = $_FILES['files']['size'];
       $error = $_FILES['files']['error'];

       
       $random = rand().$name_array;

       for ($i=0; $i < count($tmp_name_array) ; $i++) { 
           
        
         if ( move_uploaded_file($tmp_name_array[$i], $path.$name_array[$i])) {

             $all_files[$i] = rand().$name_array[$i];
             $files = implode(" , ",$all_files);
         } 
       }      
   }



?>