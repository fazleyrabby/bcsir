<?php require_once("../../vendor/autoload.php");if(!isset($_SESSION)) session_start();use App\Message\Message;$showmsg = Message::message();
use App\Utility\Utility;$auth= new App\Auth\Auth();$objAllDataQuery = new \App\dataTableQuery\dataTableQuery();/*var_dump($_SESSION); exit();*/
$status = $auth->setData($_SESSION)->logged_in();/*If not Logged In*/if(!$status) {Utility::redirect('../index/');return;}/*token for Form submit*/
$randomNumber = substr(md5(rand(1000, 9999999)), 0, 32);$securityNumber = $_SESSION['token']= $randomNumber.'@#$S';
$token = "<input type='hidden' name='token' value='$randomNumber'/>";require_once '../institution/institution_info.php';
/*set timezone*/date_default_timezone_set("Asia/Dhaka");$curdate = date('Y-m-d');$curtime = date('H:i:s');$curdatetime = date('Y-m-d H:i:s');
$level = $_SESSION['level'];$Name = $_SESSION['name'];$username = $_SESSION['userCheck'];$insPath = $_SESSION['insPath'];
$userId = $_SESSION['userId'];
/*alert*/if(!$showmsg==""){if (strpos($showmsg, 'uccess') !== false) {$alertMark = 'success';}
else{$alertMark = 'error';}$msg_alert= "toastr.$alertMark('$showmsg')";}else $msg_alert= "";/*role for user*/if($level==1)$level_name = 'developer';
elseif($level==2) $level_name = 'superadmin';elseif($level==3) $level_name = 'accountant';elseif($level==4) $level_name = 'teacher';
elseif($level==5) $level_name = 'parents';elseif($level==6) $level_name = 'student';elseif($level==7) $level_name = 'staff';
elseif($level==8) $level_name = 'librarian';elseif($level==9) $level_name = 'result';elseif($level==10) $level_name = 'info';
else $level_name = 'student';if($level!=2) { $userPhoto = '../../../uploads/'.$insPath.'/'.$level_name.'_image/md/'.$userId.'.jpg';} 
else { $userPhoto = "../../../uploads/$insPath/superadmin.jpg"; }if (!file_exists($userPhoto)) { $userPhoto = "../../resources/assets/images/default.jpg";}?>
<!DOCTYPE html>
    <html lang="en" dir="">
    <head>
        <title><?php echo ucwords($level_name)?> Panel || <?php echo $insName ?></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Saibon School Management" />
        <meta name="author" content="Saibonsoft" />
        <script>
            /*protect Document start*/
            document.onkeydown = function(e) {
                if (e.keyCode == 123) {
                    return false;
                }
                if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                    return false;
                }
                if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                    return false;
                }
                if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) { /*alert('Copyright © 2017 S@iBON SOFT, Mohammad Nagor, Amin Jute Mills, Baizid, Chittagong. Contact Us 01672008293');*/
                    return false;
                }
                if (e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)) {
                    return false;
                }
                if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                    return false;
                }
            }
            
function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) {
        theEvent.preventDefault();
       alert('You are trying to input Invalid Digit');
    }
  }
}
        </script>
        <script type="text/javascript">
            /*function clickExplorer() {if( document.all ) {alert('Copyright © S@iBON SOFT');}return false;}function clickOther(e) {if( document.layers || ( document.getElementById && !document.all ) ) {if ( e.which == 2 || e.which == 3 ) { alert('Copyright © S@iBON SOFT'); return false;}}}*/
            if (document.layers) {
                document.captureEvents(Event.MOUSEDOWN);
                document.onmousedown = clickOther;
            } else {
                document.onmouseup = clickOther;
                document.oncontextmenu = clickExplorer;
            }
        </script>
        <link rel="stylesheet" href="../../resources/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
        <link rel="stylesheet" href="../../resources/assets/css/font-icons/entypo/css/entypo.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
        <link rel="stylesheet" href="../../resources/assets/css/bootstrap.css">
        <link rel="stylesheet" href="../../resources/assets/css/neon-core.css">
        <link rel="stylesheet" href="../../resources/assets/css/neon-theme.css">
        <link rel="stylesheet" href="../../resources/assets/css/neon-forms.css">
        <link rel="stylesheet" href="../../resources/assets/css/custom.css">
        <link rel="stylesheet" href="../../resources/assets/css/skins/default.css">
        <script src="../../resources/assets/js/jquery-1.11.0.min.js"></script>
        <link rel="shortcut icon" href="../../resources/assets/images/favicon.png">
        <link rel="stylesheet" href="../../resources/assets/css/font-icons/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../resources/assets/js/vertical-timeline/css/component.css">
        <link rel="stylesheet" href="../../resources/assets/js/datatables/responsive/css/datatables.responsive.css">
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script>
            function checkDelete() {
                var chk = confirm("Are You Sure To Delete This !");
                if (chk) {
                    return true;
                } else {
                    return false;
                }
            }
            
        </script>
<style> 
#preloader {
    /*background: #f5f5f5;*/
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 99999;
}
.spinner {
    position: relative;
    text-align: center;
    position: absolute;
    top: 50%;
    left: 46%;
    animation: rotate 2.0s infinite linear;
}
.spinner > div {
    width: 18px;
    height: 18px;
    border-radius: 100%;
    display: inline-block;
    animation: bouncedelay 1.4s infinite ease-in-out;
    /* Prevent first frame from flickering when animation starts */
    
    animation-fill-mode: both;
}
.spinner .bounce1 {
    animation-delay: -0.32s;
}
.spinner .bounce2 {
    animation-delay: -0.16s;
}
@keyframes bouncedelay {
    0%, 80%, 100% {
        transform: scale(0.0);
    }
    40% {
        transform: scale(1.0);
    }
}
.spinner > div {background-color: #295f31;}
body, .btn-sm, .btn-xs, .dropdown-menu{font-size: 13px;}
.page-container .sidebar-menu #main-menu li {font-size: 13pt;}
.label {font-size: 100%;}
</style>

<script type="text/javascript">
$(window).load(function() {
	$("#preloader").fadeOut("slow");
});
</script>
    </head>
    	
    <body class="page-body skin-default">
         <div id="preloader">
	 <!--<div id="preloader" style="display: none;">-->
         <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
         </div>
      </div>
        <div class="page-container ">
            <div class="sidebar-menu">
                <header class="logo-env">
                    <div class="logo">
                        <a href="#"><img src="../uploads/logo.png" style="max-height:60px;" /></a>
                    </div>
                    <div class="sidebar-collapse" style=""> <a href="#" class="sidebar-collapse-icon with-animation"><i class="entypo-menu"></i></a> </div>
                    <div class="sidebar-mobile-menu visible-xs">
                        <a href="#" class="with-animation"> <i class="entypo-menu"></i> </a>
                    </div>
                </header>
                <div style=""></div>
                <?php require_once 'menu_'.$level_name.'.php'?>
            </div>
            <div class="main-content">
                <div class="row">
                    <div class="col-md-4 col-sm-12 clearfix">
                        <ul class="user-info pull-left pull-none-xsm">
                            <li class="dropdown language-selector"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true"> <img src="<?php echo $userPhoto?>" alt="" style="border: 2px solid #f5f5f5" class="img-circle" width="44"> <strong><?php echo $_SESSION['name']?></strong> </a>
                                <ul class="dropdown-menu pull-left">
                                    <li><a href="../user_info/change_pass.php"><i class="entypo-key"></i><span>পাসওয়ার্ড পরিবর্তন <span></a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="user-info pull-left pull-right-xs pull-none-xsm">
                         
                        </ul>
                                
                    </div>
                    <div class="col-md-4 col-sm-12 clearfix" style="text-align:center;">
                        <h2 style="font-weight:200; margin:0px;"><?php echo $insName ?></h2> </div>
                    <div class="col-md-4 col-sm-4 clearfix hidden-xs">
                        <ul class="list-inline links-list pull-right">
                            <li><a href="#" class="previous" onclick="history.back()"><i class="entypo-left-circled"></i> আগের পেজ</a></li>
                            <li><a href="#" class="next" onclick="history.forward()">পরের পেজ <i class="entypo-right-circled"></i></a></li>
                            <li> <a href="../user/User/Authentication/logout.php"> লগ আউট <i class="entypo-logout right"></i> </a> </li>
                        </ul>
                    </div>
                </div>
                <hr style="margin-top:0px;" />