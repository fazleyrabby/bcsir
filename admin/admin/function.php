<?php
include'../connect/config.php';
function total_user()
    {
	$total_user="select * from ratul_login";
	$total_user_p=mysqli_query($conn,$total_user);
	if($total_user_p==true)
	     {
		    $total_user_pc=mysqli_num_rows($total_user_p);	
			echo  $total_user_pc;
		  }	
    }
function total_paid_user()
    {
	$total_user="select distinct investment_user from investment";
	$total_user_p=mysqli_query($conn,$total_user);
	if($total_user_p==true)
	     {
		    $total_user_pc=mysqli_num_rows($total_user_p);	
			echo  $total_user_pc;
		  }	
    }
function total_user_today()
    {
	$total_user="select * from ratul_login where doj=curdate()";
	$total_user_p=mysqli_query($conn,$total_user);
	if($total_user_p==true)
	     {
		    $total_user_pc=mysqli_num_rows($total_user_p);	
			echo  $total_user_pc;
		  }	
    }
function total_purchase()
    {
	$total_user="select sum(investment_amnt) from investment";
	$total_user_p=mysqli_query($conn,$total_user);
	if($total_user_p==true)
	     {
		    $total_user_pc=mysqli_num_rows($total_user_p);	
			if($total_user_pc!=0)
			       {
					   while($indata=mysqli_fetch_array($total_user_p))
					            {
						$inv_amnt=$indata['0'];
						echo $inv_amnt; 
								  }
					   }
			else
			        {
						$inv_amnt=0.00;
						echo $inv_amnt;
						}	   
		  }	
    }
function total_purchase_today()
    {
	$total_user="select sum(investment_amnt) from investment where inv_date=curdate()";
	$total_user_p=mysqli_query($conn,$total_user);
	if($total_user_p==true)
	     {
		    $total_user_pc=mysqli_num_rows($total_user_p);	
			if($total_user_pc!=0)
			       {
					   while($indata=mysqli_fetch_array($total_user_p))
					            {
						$inv_amnt=$indata['0'];
						echo $inv_amnt; 
								  }
					   }
			else
			        {
						$inv_amnt=0.00;
						echo $inv_amnt;
						}	   
		  }	
    }
function total_refferal_user()
    {
	$total_user="select * from ratul_login where referrel_id='$usernamee'";
	$total_user_p=mysqli_query($conn,$total_user);
	if($total_user_p==true)
	     {
		    $total_user_pc=mysqli_num_rows($total_user_p);	
			echo  $total_user_pc;
		  }	
    }
function today_refferal_user()
    {
	$total_user="select * from ratul_login where referrel_id='$usernamee' and doj=curdate()";
	$total_user_p=mysqli_query($conn,$total_user);
	if($total_user_p==true)
	     {
		    $total_user_pc=mysqli_num_rows($total_user_p);	
			echo  $total_user_pc;
		  }	
	}
// =========================Rabby menu type changeable function=============================

// if (isset($_GET['menu_type'])) {
//     $menu_type = $_GET['menu_type'];
// 	if ($menu_type != "") {
// 		$_SESSION['menu_type'] = $menu_type;
		
// 	}
// }
//$_SESSION['menu_type'] == $menu_type;

function bd_time_converstion(){

		$en_time = array(0,1,2,3,4,5,6,7,8,9); 
		$bd_time = "$account_head_time";
		$bd_time = str_replace($en_time, array('০','১','২','৩','৪','৫','৬','৭','৮','৯'), $bd_time);
		//date conversion in bangla 
		$bn_digits=array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
		$output_serial = str_replace(range(0, 9),$bn_digits, $serial); 
		//Numerical Value Conversion

}
		 
	 	

?>