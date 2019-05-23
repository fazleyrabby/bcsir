<?php
 
 include'../../connect/config.php'; 
 if(isset($_POST['Submit']))
   {		
$document_title=$_POST['document_title'];
$uploader_id=$_POST['uploader_id'];
 if($document_title!=0)
 {
$max_file_size = 1024*1000000000000000000000000000000000000000000000000000000000000000000000000000000000; //100 kb
$path = "upload/"; // Upload directory
$count = 0;

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to exeicute all files
	
	foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) {
	        //Below for Upload if Image is not Chosen
				
				
		echo "<script language= 'JavaScript'>alert('Please Select A File.');</script>";

		 echo "<script> location.replace('../upload_token_key.php'); </script>"; 
			//Upper for Upload if image is not chosen
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";
	          		echo "<script language= 'JavaScript'>alert('File is too Large');</script>";

			    echo "<script> location.replace('../upload_token_key.php'); </script>"; 
	        }

		
	        else{ // No error found! Move uploaded files
			$ratul=$name; 

              if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$ratul))
				$count++; // Number of successfully uploaded file
$floc="upload"."/".$ratul;
//echo $floc;
									$sql = "
    LOAD DATA LOCAL INFILE '$floc'
    INTO TABLE `btc_eth_copy` 
    FIELDS TERMINATED BY ','
	(btc_key,eth_key)
";	 
$sql_p=mysqli_query($conn,$sql);
if($sql_p==true)
     {
		  unlink($floc);
		  //checking duplicate data
		  $ins="insert into btc_eth(btc_key,eth_key,upload_date)
		  select btc_key,eth_key,now() from btc_eth_copy where btc_key not in 
		  (select btc_key from btc_eth)
		  ";
		  $insp=mysqli_query($conn,$ins);
		  $truncate="truncate table btc_eth_copy";
		  $trunp=mysqli_query($conn,$truncate);
		 		echo "<script language= 'JavaScript'>alert('New Token Key Sheets Added Successfully');</script>";

			      echo "<script> location.replace('../upload_token_key.php'); </script>";  	 
	 }
else
    {
	
	echo mysqli_error($conn);	
		}	 

	        
	    }
	}
}
}
else
{
	echo "<script language= 'JavaScript'>alert('Please Select a File');</script>";

 echo "<script> location.replace('../upload_token_key.php'); </script>"; 	
	
	}

}
else
{
	
echo "<script language= 'JavaScript'>alert('Data Not Submitted');</script>";

 echo "<script> location.replace('../upload_token_key.php'); </script>"; 	
}	
   }			  
   else
    {
		//header('Location:../transfer_fund.php?success=submit');
 echo"<script> location.replace('../success_track_add.php?success=submit'); </script>";   
		}
?>