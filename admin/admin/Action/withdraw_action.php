<?php
 
 include'../../connect/config.php'; 
 if(isset($_POST['submit']))
   {

$test_name = $_POST['test_name'];

$test_price=$_POST['test_price'];
$ins="insert into bcsir_lab_test values('','$test_name',$test_price,now())";
$insp=mysqli_query($conn,$ins);
if($insp==true)
   {
	 echo"<script> location.replace('../add_new_test.php?success=admin_transfer_success'); </script>";   
	 
   }
else
{
	
}
 
}
elseif(isset($_POST['apply']))
{
$test_id=$_POST['test_id'];	
$price=$_POST['price'];
$bkash_trn=$_POST['bkash_trn'];
$username=$_POST['username'];
$userid=$_POST['userid'];
$pdescription=$_POST['description'];
$ins="insert into bcisr_test_paymnet value('',$test_id,$price,'$bkash_trn','$username','$userid',now(),'','',0,'$pdescription')";
$insp=mysqli_query($conn,$ins);
if($insp==true)
{
 echo"<script> location.replace('../apply_for_test.php?apply=apply&success=psuccess'); </script>"; 	
}
else
{
	echo mysqli_error($conn);
}
}
elseif(isset($_POST['rslt']))
{
$userid=$_POST['userid'];
$test_id=$_POST['test_id'];	
$result=$_POST['result'];
	$u="update bcisr_test_paymnet set result='$result',result_by='$userid' where test_id=$test_id";
	$up=mysqli_query($conn,$u);
	if($up==true)
	  {
 echo"<script> location.replace('../apply_for_test.php?apply=applylist&success=rpasuccess'); </script>"; 	  
	  }
}
 else
    {
		//header('Location:../transfer_fund.php?success=submit');
 echo"<script> location.replace('../add_new_test.php?success=submit'); </script>";   
		}
?>