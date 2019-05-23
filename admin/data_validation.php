<?php
  include 'connect/config.php'; 
  if($_POST['email']) 
  {

		$email = $_POST['email'];
      
$cc="SELECT email FROM ratul_login WHERE email='$email'";
$ccp=mysqli_query($conn,$cc);
if($ccp==true)
    {	
	  $count=mysqli_num_rows($ccp);
	  if($count!=0)
	  {
			echo "<span style='color:green;font-size: 15px;font-weight: 700'>ইমেইল বিদ্যমান!!</span>";
		}
		else {
			echo "";
		}
	  }
	}
  else
    {
		echo mysqli_error($conn);
	}	
 
?>