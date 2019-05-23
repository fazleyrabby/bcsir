 <?php 
 //include '../session.php'; 
 include '../../connect/config.php'; 
 if(isset($_POST['catadd']))
      {
		$username=$_POST['username']; 
		$catagory=$_POST['catagory'];
		$show_menu=$_POST['show_menu'];
		$mpart=$_POST['mpart'];
		$catagory_des=$_POST['catagory_des'];
		$template_type=$_POST['template_type'];
		//below menu added newly for others option
		$quick_menu=$_POST['quick_menu'];
		$useful_menu=$_POST['useful_menu'];
		$useful_side_menu=$_POST['useful_side_menu'];
		$internal_esheba_footer=$_POST['internal_esheba_footer'];
		$characteristics_footer=$_POST['characteristics_footer'];
		$innovation_sidebar=$_POST['innovation_sidebar'];
		$extra_link_footer=$_POST['extra_link_footer'];
		$side_menu=$_POST['side_menu'];
		$tshow_menu=$_POST['tshow_menu'];
	$cat_add=mysqli_query($conn,"INSERT into catagory values('','$catagory','$catagory_des','$username','$show_menu',now(),'',$mpart,$template_type,$tshow_menu,$side_menu,$useful_menu,$useful_side_menu,$internal_esheba_footer,$characteristics_footer,$innovation_sidebar,$extra_link_footer,$quick_menu)");

	if($cat_add==true)
	             {

	echo"<script> location.replace('../add_menu.php?success=catagory_success&add_catagory=list_catagory'); </script>"; 
				 }
			

	  }
 elseif(isset($_POST['catedit']))
      {
      	$usernamee = $_POST['username'];
		$cata_edit_id=$_POST['cata_edit_id']; 
		$catagory=$_POST['catagory'];
		$show_menu=$_POST['show_menu'];
		$catagory_des=$_POST['catagory_des'];
		$mpart=$_POST['mpart'];
		$template_type=$_POST['template_type'];
		//Other
		$quick_menu=$_POST['quick_menu'];
		$useful_menu=$_POST['useful_menu'];
		$useful_side_menu=$_POST['useful_side_menu'];
		$internal_esheba_footer=$_POST['internal_esheba_footer'];
		$characteristics_footer=$_POST['characteristics_footer'];
		$innovation_sidebar=$_POST['innovation_sidebar'];
		$extra_link_footer=$_POST['extra_link_footer'];
		$side_menu=$_POST['side_menu'];
		$tshow_menu=$_POST['tshow_menu'];
		$cat_add=mysqli_query($conn,"UPDATE catagory SET 
		add_by='$usernamee',
		catagory_title='$catagory',
		catagory_description='$catagory_des',
		menu_st='$show_menu',
		mparent=$mpart,
		template_type='$template_type',
		tshow_menu=$tshow_menu,
		side_menu=$side_menu,
		useful_menu=$useful_menu,
		useful_side_menu=$useful_side_menu,
		internal_esheba_footer=$internal_esheba_footer,
		characteristics_footer=$characteristics_footer,
		innovation_sidebar=$innovation_sidebar,
		extra_link_footer=$extra_link_footer,
		quick_menu=$quick_menu
		WHERE catagory_id='$cata_edit_id'");
		if($cat_add==true)
		             {
		echo"<script> location.replace('../add_menu.php?success=catagory_success_update&add_catagory=list_catagory'); </script>"; 
					 }
					 else {
					 	echo "error";
					 }
			  }
		 elseif(isset($_POST['catedit_pic']))
		      {
				$cata_edit_id=$_POST['cata_edit_id']; 
				$catagory=$_POST['catagory'];		  
		$valid_formats = array("jpg", "png", "gif", "zip", "bmp","JPG","JPEG","GIF","gif","PNG");
		$max_file_size = 1024*10000000000000000000000000000; //100 kb
		$path = "uploads/"; // Upload directory
		$count = 0;

		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
			// Loop $_FILES to exeicute all files
			
			foreach ($_FILES['files']['name'] as $f => $name) {     
			    if ($_FILES['files']['error'][$f] == 4) {
			        //Below for Upload if Image is not Chosen
						
					 //header('Location:../dashboard.php?success=picture_select');
		echo"<script> location.replace('../add_menu.php?add_catagory=list_catagory&success=picture_select'); </script>"; 	

					//Upper for Upload if image is not chosen
			    }	       
			    if ($_FILES['files']['error'][$f] == 0) {	           
			        if ($_FILES['files']['size'][$f] > $max_file_size) {
			            $message[] = "$name is too large!.";

							 //header('Location:../dashboard.php?success=picture_large');
		echo"<script> location.replace('../add_menu.php?add_catagory=list_catagory&success=picture_large'); </script>"; 	
			        }

					elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
						$message[] = "$name is not a valid format";
		// header('Location:../dashboard.php?success=picture_invalid');
		 echo"<script> location.replace('../add_menu.php?add_catagory=list_catagory&success=picture_invalid'); </script>"; 
					}
			        else{ // No error found! Move uploaded files
					$ratul=rand().$name; 

		              if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$ratul))
						$count++; // Number of successfully uploaded file
						//below for inserting image path in database
						//Check Leve of user
						
						$cat="update catagory set catagory_pic='$ratul' where catagory_id='$cata_edit_id'";
						//echo $cat;
						$cat_p=mysqli_query($conn,$cat);
						if($cat_p==true)
						    {

		 //header('Location:../catagory_add.php?add_catagory=list_catagory&success=picture_success');
		 echo"<script> location.replace('../add_menu.php?add_catagory=list_catagory&success=picture_success'); </script>"; 					
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
			  
		 elseif(isset($_GET['catagory_dlt']))
		      {
				$catagory_id=$_GET['catagory_id']; 

		$cat_add=mysqli_query($conn,"delete from  catagory where catagory_id='$catagory_id'");
		if($cat_add==true)
		             {
		echo"<script> location.replace('../add_menu.php?success=catagory_success_dlt&add_catagory=list_catagory'); </script>"; 
					 }
			  } 
		 elseif(isset($_GET['catagory_st']))
		      {
				$catagory_id=$_GET['catagory_id']; 
		$cst=$_GET['cst'];
		if($cst==0)
		{
		$nst=1;
		}
		else
		{
		$nst=0;
		}
		$cat_add=mysqli_query($conn,"update catagory set menu_st=$nst where catagory_id='$catagory_id'");
		if($cat_add==true)
		             {
		echo"<script> location.replace('../add_menu.php?success=catagory_success_st&add_catagory=list_catagory'); </script>"; 
					 }
			  }  
		else
		        {
				//header('Location:../buy_share.php?success=failed');	
		echo"<script> location.replace('../add_menu.php?success=failed&add_catagory=add_catagory'); </script>";
				}	  
		 
		 
		  ?>