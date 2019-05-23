<?php function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// echo 'User Real IP - '.getUserIpAddr();
 $ip = getUserIpAddr();
 echo "<br>";
?>
  <?php
		
		$qry = mysqli_query($conn,"SELECT * FROM `ipdb` WHERE `ip` = '$ip'");
		$num = mysqli_num_rows($qry);
		if ($num == 0){
			$qry3 = "INSERT INTO `ipdb`(`ip`) VALUES ('$ip')";
			mysqli_query($conn,$qry3);
			//echo "new ip register";	
			$qry1 = "SELECT * FROM `counter` WHERE `id` = 0";
			$result1 = mysqli_query($conn,$qry1);
			$row1 = mysqli_fetch_array($result1);
			$count = $row1['visiters'];
			$count = $count + 1;
			//echo "<br>";
			//echo "number of unique visiters is $count";
			$qry2 = "UPDATE `counter` SET `visiters`='$count' WHERE `id`= 0";
			$result2=mysqli_query($conn,$qry2);
}else{
			$qry1 = "SELECT * FROM `counter` WHERE `id` = 0";
			$result1 = mysqli_query($conn,$qry1);
			$row1 = mysqli_fetch_array($result1);
			$count = $row1['visiters'];
			//echo "<br>";
			// echo "number of unique visiters is $count";
}
  ?>