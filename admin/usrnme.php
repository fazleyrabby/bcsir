<?php
  include 'connect/config.php'; 
  if($_POST['name']) 
{
$username = $_POST['name'];
$cc="SELECT username FROM ratul_login WHERE username='$username'";
$ccp=mysqli_query($conn,$cc);
if($ccp==true)
    {	
	  $count=mysqli_num_rows($ccp);
	  if($count!=0)
	  {
		  echo "<span style='color:green;font-size: 15px;font-weight: 700'>ব্যবহারকারীর নাম ইতিমধ্যে বিদ্যমান!!!</span>";
	  }
	  else
	  {
		  echo "";
	  }
	}
  else
    {
		echo mysqli_error($conn);
		}	
  }
?>