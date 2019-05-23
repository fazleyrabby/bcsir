<?php
  include'connect/config.php'; 

  
  if($_POST) 
  {
      $sponsor = $_POST['sponsor'];
      
$cc="select username from ratul_login where username='$sponsor'";
$ccp=mysqli_query($conn,$cc);
if($ccp==true)
    {	
	  $count=mysqli_num_rows($ccp);
	   	  
	  if($count==0)
	  {
		  echo "<span style='color:brown;'>Invalid Sposnor Name !!!</span>";
	  }
	  else
	  {
		  echo "<span style='color:green;'>Valid Sponsor ID</span>";
	  }
	}
  else
    {
		echo mysqli_error($conn);
		}	
  }
?>