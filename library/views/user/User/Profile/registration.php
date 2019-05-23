<?php
include_once('../../../../vendor/autoload.php');
use App\User\User;
use App\Auth;
use App\Message\Message;
use App\Utility\Utility;
$auth= new App\Auth\Auth();
$status= $auth->setData($_POST)->is_exist();
if($status){
    Message::Message("Email has already been taken");
    return Utility::redirect($_SERVER['HTTP_REFERER']);
}else{
    $_POST['email_token'] = md5(uniqid(rand()));
    $obj= new User();
    $obj->setData($_POST)->store();
    
    require '../../../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "tls";
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = 587;
    $mail->AddAddress($_POST['email']);
    $mail->Username="silentcoders58@gmail.com";
    $mail->Password="silentcoder";
    $mail->SetFrom('silentcoders58@gmail.com','User Management');
    $mail->AddReplyTo("silentcoders58@gmail.com","User Management");
    $mail->Subject    = "Your Account Activation Link";
    $message =  "
       Please click this link to verify your account:
       http://localhost/UserManagement/views/user/User/Profile/emailverification.php?email=".$_POST['email']."&email_token=".$_POST['email_token'];
    $mail->MsgHTML($message);
    $mail->Send(); 
}
