<?php
  include '../connect/config.php'; 
  if(isset($_POST['username']))
  {

		$username = $_POST['username'];
   
$cc="SELECT * FROM ratul_login WHERE username='$username'";
$ccp=mysqli_query($conn,$cc);
if($ccp==true)
    {	
	  $count=mysqli_num_rows($ccp);
	  if($count!=0)
	  {
			echo "<span style='color:green;font-size: 15px;font-weight: 700'>Username already exists!</span>";
		}
		else {
			echo "";
		}
	  }
	}
	elseif(isset($_POST['employee_serial'])){
    		$employee_serial = $_POST['employee_serial'];
	$cc="SELECT * FROM employee_details WHERE employee_serial='$employee_serial'";
	$ccp=mysqli_query($conn,$cc);
	if($ccp==true)
			{	
			$count=mysqli_num_rows($ccp);
			if($count!=0)
			{
				echo "<span style='color:red;font-size: 15px;font-weight: 700'>Serial already exists!</span>";
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