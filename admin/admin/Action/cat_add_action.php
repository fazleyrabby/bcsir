 <?php 
 //include '../session.php'; 
 include'../../connect/config.php'; 

 if(isset($_GET['catagory_dlt']) && $_GET['catagory_id'])
	{
		$catagory_id=$_GET['catagory_id'];

		$sql = mysqli_query($conn,"UPDATE catagory SET menu_st='2' WHERE catagory_id = '$catagory_id'") ;
		if($sql==true)
		 {
			echo"<script> location.replace('../add_menu.php?success=catagory_success_dlt&add_catagory=list_catagory'); </script>"; 
		 }
		  else {
		 	echo "ERROR";
		 }
	}

// if (isset($_GET['catagory_st')) 
// 	{
// 		$catagory_id=$_GET['catagory_id'];
// 		$menu_st = $_GET['cst'];
// 	}
  
if (isset($_GET['catagory_st'])) {
$catagory_id=$_GET['catagory_id'];
    $catagory_st=$_GET['cst'];
    if ($catagory_st == 0) {
    	$st = 1;
    }
    else {
    	$st = 0;
    }
  	$sql = mysqli_query($conn,"UPDATE catagory SET menu_st='$st' WHERE catagory_id = '$catagory_id'") ;
		if($sql==true)
		 {
			echo"<script> location.replace('../add_menu.php?success=catagory_st_updated&add_catagory=list_catagory'); </script>"; 
		 }
		 else {
		 	echo "ERROR";
		 }
}

 ?>