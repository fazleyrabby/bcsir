<?php
namespace App\User;
use App\Utility\Utility;
use PDO;
use App\Message\Message;
use App\Model\Database;

class User extends Database{
    public $table="users";
    public $firstName="";
    public $lastName="";
    public $email="";
    public $phone="";
    public $address="";
    public $password="";
    public $id="";
    public $email_token="";

    public function __construct(){
        parent::__construct();
    }

    public function setData($data=array()){
        if(array_key_exists('first_name',$data)){
            $this->firstName=$data['first_name'];
        }
        if(array_key_exists('last_name',$data)){
            $this->lastName=$data['last_name'];
        }
        if(array_key_exists('email',$data)){
            $this->email=$data['email'];
        }
        if(array_key_exists('phone',$data)){
            $this->phone=$data['phone'];
        }
        if(array_key_exists('address',$data)){
            $this->address=$data['address'];
        }
        if(array_key_exists('password',$data)){
            $this->password=md5($data['password']);
        }
        if(array_key_exists('id',$data)){
            $this->id=$data['id'];
        }

        if(array_key_exists('email_token',$data)){
            $this->email_token=$data['email_token'];
        }


        return $this;
    }





    public function store() {




        $query="INSERT INTO users (`name`, `username`, `email`, `password`, `phone`, `address`,`email_verified`)
VALUES (:firstName, :lastName, :email, :password,:phone, :address, :email_token)";


        $dataArray= array(':firstName'=>$this->firstName,':lastName'=>$this->lastName,':email'=>$this->email,':password'=>$this->password,
            ':phone'=>$this->phone,':address'=>$this->address,':email_token'=>$this->email_token);



        $STH=$this->DBH->prepare($query);

        $result = $STH->execute($dataArray);
        
        if ($result) {
            Message::message("
                <div class=\"alert alert-success\">
                            <strong>Success!</strong> Data has been stored successfully, Please check your email and active your account.
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        } else {
            Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Failed!</strong> Data has not been stored successfully.
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function change_password(){
        $query="UPDATE `user-management`.`users` SET `password`=:password  WHERE `users`.`email` =:email";
        $STH=$this->DBH->prepare($query);
        $result = $STH->execute(array(':password'=>$this->password,':email'=>$this->email));

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Password has been updated  successfully.
              </div>");
        }
        else {
            echo "Error";
        } 

    }
    public function changePassword(){ 
        $id = $_POST['id'];
        $password = $_POST['password'];
        
        $query="UPDATE `users` SET `password`=:password  WHERE `users`.`username` =:id";
        $queryTeacher="UPDATE `teacher_info` SET `password`=:password  WHERE `teacher_info`.`id` =:id";
        $queryStudent="UPDATE `student_info` SET `password`=:password  WHERE `student_info`.`id` =:id";
        
        $STH=$this->DBH->prepare($query);
        $STHTeacher=$this->DBH->prepare($queryTeacher);
        $STHStudent=$this->DBH->prepare($queryStudent);
        
        $result = $STH->execute(array(':password'=>$password,':id'=>$id));
        $result = $STHTeacher->execute(array(':password'=>$password,':id'=>$id));
        $result = $STHStudent->execute(array(':password'=>$password,':id'=>$id));

        if($result){
            echo "Successfully Changed";
        }
        else {
            echo "Somthing Wrong! Try again";
        }

    }
/*     public function changePassword(){ 
        $id = $_POST['id'];
        $password = $_POST['password'];
        
        $query="UPDATE `users` SET `password`=:password  WHERE `users`.`id` =:id";
        
        $STH=$this->DBH->prepare($query);
        
        $result = $STH->execute(array(':password'=>$password,':id'=>$id));

        if($result){
            echo "Success";
        }
        else {
            echo "Error";
        }

    }*/
    public function view(){
        $query=" SELECT * FROM users WHERE email = '$this->email' ";
       // Utility::dd($query);
        $STH =$this->DBH->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetch();

    }// end of view()
    
    public function viewAllUsers(){
        $sqlQuery = "SELECT * FROM `v_users`";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of viewAllUsers()
    
    public function validTokenUpdate(){
        $query="UPDATE `user-management`.`users` SET  `email_verified`='".'Yes'."' WHERE `users`.`email` ='$this->email'";
        $result=$this->DBH->prepare($query);
        $result->execute();

        if($result){
            Message::message("
             <div class=\"alert alert-success\">
             <strong>Success!</strong> Email verification has been successful. Please login now!
              </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect('../../../../views/user/User/Profile/signup.php');
    }

    public function update(){

        $query="UPDATE `user-management`.`users` SET `first_name`=:firstName, `last_name` =:lastName ,  `email` =:email, `phone` = :phone,
 `address` = :address  WHERE `users`.`email` = :email";

        $result=$this->DBH->prepare($query);

        $result->execute(array(':firstName'=>$this->firstName,':lastName'=>$this->lastName,':email'=>$this->email,':phone'=>$this->phone,
 ':address'=>$this->address,':email_token'=>$this->email_token));

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Data has been updated  successfully.
              </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect($_SERVER['HTTP_REFERER']);
    }

}

