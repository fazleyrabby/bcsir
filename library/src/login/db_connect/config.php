<?php
date_default_timezone_set("Asia/Dhaka");
$mysql_curdatetime = "DATE_ADD(NOW(), INTERVAL 10 HOUR)";
$curdate = date('Y-m-d');
$curtime = date('H:i:s');
$curdatetime = date('Y-m-d H:i:s');
//date string 
	$date=date('d');
	$month2=date('m');
	$year=date('Y');
//Database
$host = "localhost";
$username = "root"; //saibonso_holly
$pass = "";
$conn = @mysql_connect($host, $username, $pass);
if ($conn == true) {
    $database = "saibon_ims"; //saibonso_holly_attendance
    $db = mysql_select_db($database, $conn);
    if ($db == true) {
      // echo "successful";
    } else {
        echo "Failed to connect with Database";
    }
} else {
    echo "Failed to connect with host";
}
// institution name
    $institute = mysql_query("SELECT * FROM `institution` where `ins_id` = 2");
    while($insRow = mysql_fetch_array($institute))
	 {
	     $insName = $insRow['1'];
	 }
	 // Company name
    $company = mysql_query("SELECT * FROM `institution` where `ins_id` = 1");
    while($comRow = mysql_fetch_array($company))
	 {
	     $comName = $comRow['1'];
	     $comWeb = $comRow['6'];
	 }
?>	