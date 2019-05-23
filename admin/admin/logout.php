<?php


if (!isset($_SESSION)) {
    session_start();
}

 $user_name = $_SESSION['user_name'] ;
 $user_id = $_SESSION['user_id'];

include'../connect/config.php';
$update_userlog = "UPDATE user_log SET 
log_out_time = NOW() WHERE user_name = '$user_name' AND user_id = $user_id";
$update_userlog_p = mysqli_query($conn,$update_userlog);

session_unset();
session_destroy();
echo "<script> location.replace('../../index.php'); </script>";

?>
