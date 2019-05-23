<?php

session_start();
include 'connect/config.php';
echo "<script src='../javascript/sweet_alert.js'></script>";



$Email=$_POST['username'];


$Password=hash('sha512',$_POST['password']);

if ($Email == '' or $_POST['password'] = '') {
     echo '<script type="text/javascript">';
     echo 'setTimeout(function () { swal({
        title: "ইমেইল/পাসওয়ার্ড দেয়া হয় নি ",
        icon: "warning",
        dangerMode: true,
        button: "বাতিল"
  }).then( () => {
    location.href = "index.php"
})';
  echo '}, 1);</script>';
}

else {
  
$loginByUsername = mysqli_query($conn,"SELECT 
id,
username,
password,
email,
user_level,
active_status,
position,
contact_no,
profile_pic,
country,
c_wallet,
g_wallet,
doj,
t_pass,
states,
package_id,
payment_id,
acc_name,
referrel_id,
placement_id,
delete_status,
position_id,
intro_position_id,
full_name
 from ratul_login where username='$Email' AND Password='$Password'");


if (mysqli_num_rows($loginByUsername) >= 1)
      {

    if ($loginByUsername == true || $loginByEmail == true) {
        while ($data = mysqli_fetch_array($loginByUsername)) {
			$user_id = $data['0'];
            $user_name = $data['1'];
            $password = $data['2'];
            $email = $data['3'];
            $level = $data['4'];
			$status=$data['5'];
			$position=$data['6'];
			$contact_no=$data['7'];
			$profile_pic=$data['8'];
			$country=$data['9'];
			$c_wallet=$data['10'];
			$g_wallet=$data['11'];
			$doj=$data['12'];
			$t_pass=$data['13'];
			$package_id=$data['15'];
            $position_id=$data['21'];
			$lposition=$position_id."1";
			$rposition=$position_id."0";
			
		
			if($status==0)
			    {
						 echo "<script language= 'JavaScript'>alert('Sorry!Your Account is Deactived.');</script>";											

						 echo '<script>location.replace("index.php"); </script>'; 
					
					}
					else
					{
//below for investmet checking

            


						
						
						
						}
        }
     



        $_SESSION['user_name'] = $user_name;
        $_SESSION['email'] = $email;
        // $_SESSION['employee_login_id'] = $employee_login_id;
        $_SESSION['level'] = $level;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['g_wallet'] = $g_wallet;
        $_SESSION['c_wallet'] = $c_wallet;
	    $_SESSION['t_pass'] = $t_pass;
	    $_SESSION['contact_no'] = $contact_no;
	    
	    
        $sql = mysqli_query($conn,"SELECT * FROM user_log WHERE user_name = '$user_name' AND user_id = $user_id");

        $insert_userlog_p = "";
        $update_userlog_p = "";


            $insert_userlog = "INSERT INTO user_log values ('','$user_id','$user_name',NOW(),'')";
            $insert_userlog_p = mysqli_query($conn,$insert_userlog);
      //1 = Admin
	  //2 = Game Manager
	  //3 = Scoreboard Manager
	  //4 = user
        
        if ($insert_userlog_p == true || $update_userlog_p == true) {
                if (isset($_POST['service_type'])) {
                   
                   $service_type=$_POST['service_type'];
                    
                   $_SESSION['service_type'] = $service_type;
                    $url = '';
                //    $_SESSION["$service_type"] = $service_type;
                   
                   if ($service_type == 'cpto') {
                      $url = "cpto_form.php?requrmnt=add_requrmnt&usr=$service_type";
                   }
                   elseif ($service_type == 'app') {
                      $url = "user_application.php?usr_application=application_form&usr=$service_type";
                   }
                   elseif ($service_type == 'other_payment_usr') {
                      $url = "other_payment.php?payment=add_payment&usr=$service_type";
                   }
                    elseif ($service_type == 'accounts' && $level == 2) {
                      $url = "salary_generate.php?salary_generate=salary_generate_list&usr=$service_type";
                   }
                   elseif ($service_type == 'accounts' && $level != 2) {
                        echo '<script type="text/javascript">';
                        echo 'setTimeout(function () { swal({
                                title: "শুধুমাত্র হিসাব শাখার ব্যবহারের  জন্য প্রযোজ্য !!",
                                icon: "warning",
                                dangerMode: true,
                                button: "বাতিল"
                        }).then( () => {
                            location.href = "service_login.php?usr=accounts"
                        })';
                        echo '}, 10);</script>';
                        die();
                   }
                   else {
                         $url = 'dashboard.php';
                   } 
                }
                else {
                    $url = 'dashboard.php';
                }
                // echo "$service_type";
  
          //  echo "<script language= 'JavaScript'>alert('Login Successfull !');</script>";
            switch ($level) {
                case "1":
                    echo '<script> location.replace("admin/'.$url.'"); </script>';
                    break;
                case "2":
                    echo '<script> location.replace("admin/'.$url.'"); </script>';
                    break;
                case "3":
                    echo '<script> location.replace("admin/'.$url.'"); </script>';
                    break;
                case "4":
                    echo '<script> location.replace("admin/'.$url.'"); </script>';
                    break;
                case "5":
                    echo '<script> location.replace("admin/'.$url.'"); </script>';
                    break;
                case "6":
                    echo '<script> location.replace("admin/'.$url.'"); </script>';
                    break;
                case "7":
                    echo '<script> location.replace("admin/'.$url.'"); </script>';
                    break;
                default:
                    echo "<script language= 'JavaScript'>alert('Authendication Failed !');</script>";
                    echo '<script> location.replace("index.php"); </script>';
            }
        } else {
  	         echo "<script language= 'JavaScript'>alert('Authendication Failed !');</script>";
 echo '<script> location.replace("index.php"); </script>';
        }
    }
} 

else {

  echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal({
        title: "ইমেইল/পাসওয়ার্ড সাদৃশ নয়",
        icon: "warning",
        dangerMode: true,
        button: "বাতিল"
  }).then( () => {
    location.href = "index.php"
})';
  echo '}, 1);</script>';
}


}



// $Level = $_POST['user_level'];

// $query = "select user_level from ratul_login where usernmame='$Email' ";
//$res = submit_query($query);




?>