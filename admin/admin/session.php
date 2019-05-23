<?php
error_reporting(E_ALL);
ini_set("display_errors",0);
include('config/config.php');


if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['user_name']) ||!isset($_SESSION['level']) || !isset($_SESSION['user_id'])) {
   session_start();
    echo "<script> location.replace('../'); </script>";
} 

?>