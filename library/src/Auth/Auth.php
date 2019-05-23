<?php
namespace App\Auth;
use PDO;
use App\Message\Message;
use App\Model\Database;

class Auth extends Database{
    public $email = "";
    public $password = "";

    public function __construct(){
        parent::__construct();
    }

    public function setData($data = Array()){
        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }
        if (array_key_exists('password', $data)) {
            $this->password = md5($data['password']);
        }
        return $this;
    }

    public function is_exist(){

        $query="SELECT * FROM `users` WHERE `email` ='$this->email'";
        $STH=$this->DBH->query($query);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $STH->fetchAll();

        $count = $STH->rowCount();

        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function is_registered(){
        $email = $this->email;
        $password= $this->password;

       $query = "select * from v_users WHERE username='$email' AND password='$password'";

       // $query = "SELECT * FROM `users` WHERE `email_verified`='" . 'Yes' . "' AND `email`='$this->email' AND `password`='$this->password'";
        $STH=$this->DBH->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $STH->fetchAll();

        $count = $STH->rowCount();
        if ($count == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function logged_in(){
        if ((array_key_exists('email', $_SESSION)) && (!empty($_SESSION['email']))) {
            $email = $this->email;
            $password= $this->password;
             $sessionEmail = $_SESSION['email'];
           //  $sessionPassword = $_SESSION['password'];
           // $query = "select * from v_users WHERE username='$email' AND password='$password'";
            $query = "SELECT * FROM `v_users` WHERE `username` = '$sessionEmail'";
            $STH=$this->DBH->query($query);
            $STH->setFetchMode(PDO::FETCH_OBJ);
            $singleData = $STH->fetch();
            $count = $STH->rowCount();
                if ($count > 0) {
                    $_SESSION['name'] = $singleData->name;
                    $_SESSION['userCheck'] = $singleData->username;
                    $_SESSION['userId'] = $singleData->user_id;
                    $_SESSION['insPath'] = $singleData->ins_path;
                    $_SESSION['level'] = $singleData->level;
                   return TRUE;
                } else {
                    return FALSE;
                }
           
        } else {
            return FALSE;
        }
    }

    public function log_out(){
        $_SESSION['email']="";
        $_SESSION['userCheck']="";
        session_destroy(); 
        return TRUE;
    }
    
    Public function formSubmitPermition()
    {
        if(!isset($_SESSION)) session_start();
        $sessionToken = $_SESSION['token'];

        $postToken = $_POST['token'].'@#$S';
        if($sessionToken==$postToken){
            return true;
        }
        else return false;

    }
}

