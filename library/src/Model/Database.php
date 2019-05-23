<?php
namespace App\Model;

use PDO,PDOException;

class Database{
    public $DBH; 

    public function __construct(){
        try {
            if (!isset($_SESSION)) session_start();
            $email_chk = $_SESSION['userCheck']; 
         
            $this->DBH = new PDO("mysql:host=localhost;dbname=ctgbcsir-library;charset=utf8", "root", "bcsir2018");   
            //this is use for show exceptional error occurance and hide the important data
            $this->DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            //echo "Database Connection Successful!<br/>";
        }
        catch(PDOException $error){
          // echo $error->getMessage();  
           // echo 'Please take token using login';
           $_SESSION['loginMsg']="Database connect refused";
           header ('location: index.php');           
        }

    }//end Database connection Code		
}