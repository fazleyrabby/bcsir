<?php
require_once("../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
use App\Message\Message;
$showmsg = Message::message();
use App\Utility\Utility;
$auth= new App\Auth\Auth();
$objAllDataQuery = new \App\dataTableQuery\dataTableQuery();
/*var_dump($_SESSION); 
exit();*/
$status = $auth->setData($_SESSION)->logged_in();
/*If not Logged In*/
if(!$status) {
	Utility::redirect('../index/');
	return;
}
/*token for Form submit*/
$randomNumber = substr(md5(rand(1000, 9999999)), 0, 32);
$securityNumber = $_SESSION['token']= $randomNumber.'@#$S';
$token = "<input type='hidden' name='token' value='$randomNumber'/>";

require_once '../institution/institution_info.php';

/*set timezone*/
date_default_timezone_set("Asia/Dhaka");
$curdate = date('Y-m-d');
$curtime = date('H:i:s');
$curdatetime = date('Y-m-d H:i:s');
$level = $_SESSION['level'];
$Name = $_SESSION['name'];
$username = $_SESSION['userCheck'];
$insPath = $_SESSION['insPath'];
$userId = $_SESSION['userId'];

$objPendingleave = new \App\leave\leave();
$totalPendingleave = count($objPendingleave->viewPendingLeave());
$allDataPendingleave = $objPendingleave->viewPendingLeave();

/*alert*/
if(!$showmsg==""){
	if (strpos($showmsg, 'uccess') !== false) {
		$alertMark = 'success';
	}
	else{
		$alertMark = 'error';
	}
	$msg_alert= "toastr.$alertMark('$showmsg')";
}
else $msg_alert= "";

/*role for user*/
if($level==1)$level_name = 'developer';
elseif($level==2) $level_name = 'superadmin';
elseif($level==3) $level_name = 'accountant';
elseif($level==4) $level_name = 'teacher';
elseif($level==5) $level_name = 'parents';
elseif($level==6) $level_name = 'student';
elseif($level==7) $level_name = 'staff';
elseif($level==8) $level_name = 'librarian';
elseif($level==9) $level_name = 'result';
elseif($level==10) $level_name = 'info';
else $level_name = 'student';

if($level!=2) {
    $userPhoto = '../../../uploads/'.$insPath.'/'.$level_name.'_image/md/'.$userId.'.jpg';
} else {
    $userPhoto = "../../../uploads/$insPath/superadmin.jpg";    
}
if (!file_exists($userPhoto)) {
    $userPhoto = "../../../uploads/default.jpg";
}
?>
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
    if(e.keyCode == 123) {
        return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
        return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
        return false;
    }
    if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
		/*alert('Copyright © 2017 S@iBON SOFT, Mohammad Nagor, Amin Jute Mills, Baizid, Chittagong. Contact Us 01672008293');*/
		return false;
    }
if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)){
		return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
        return false;
    }     
 }
</script>	
<script type="text/javascript">
    
/*	function clickExplorer() {
		if( document.all ) {
			alert('Copyright © S@iBON SOFT');
		}
		return false;
	}
	function clickOther(e) {
		if( document.layers || ( document.getElementById && !document.all ) ) {
			if ( e.which == 2 || e.which == 3 ) {
        		alert('Copyright © S@iBON SOFT');
        		return false;
			}
		}
	}*/
	
	if( document.layers ) {
		document.captureEvents( Event.MOUSEDOWN );
		document.onmousedown=clickOther;
	}
	else {
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
<!--[if lt IE 9]><script src="../../resources/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="shortcut icon" href="../../resources/assets/images/favicon.png">
<link rel="stylesheet" href="../../resources/assets/css/font-icons/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../../resources/assets/js/vertical-timeline/css/component.css">
<link rel="stylesheet" href="../../resources/assets/js/datatables/responsive/css/datatables.responsive.css">
<!--Amcharts-->
<!--<script src="../../resources/assets/js/amcharts/amcharts.js" type="text/javascript"></script>
<script src="../../resources/assets/js/amcharts/pie.js" type="text/javascript"></script>
<script src="../../resources/assets/js/amcharts/serial.js" type="text/javascript"></script>
<script src="../../resources/assets/js/amcharts/gauge.js" type="text/javascript"></script>
<script src="../../resources/assets/js/amcharts/funnel.js" type="text/javascript"></script>
<script src="../../resources/assets/js/amcharts/radar.js" type="text/javascript"></script>
<script src="../../resources/assets/js/amcharts/exporting/amexport.js" type="text/javascript"></script>
<script src="../../resources/assets/js/amcharts/exporting/rgbcolor.js" type="text/javascript"></script>
<script src="../../resources/assets/js/amcharts/exporting/canvg.js" type="text/javascript"></script>
<script src="../../resources/assets/js/amcharts/exporting/jspdf.js" type="text/javascript"></script>
<script src="../../resources/assets/js/amcharts/exporting/filesaver.js" type="text/javascript"></script>
<script src="../../resources/assets/js/amcharts/exporting/jspdf.plugin.addimage.js" type="text/javascript"></script>-->
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<script>
    function checkDelete()
    {
        var chk=confirm("Are You Sure To Delete This !");
        if(chk)
        {
          return true;  
        }
        else{
            return false;
        }
    }
</script>
</head>
<body class="page-body skin-default" >
	<div class="page-container " >
		<div class="sidebar-menu">
    <header class="logo-env" >
        <!-- logo -->
        <div class="logo"><a href="#"><img src="../uploads/logo.png" style="max-height:60px;"/></a></div>
        <!-- logo collapse icon -->
        <div class="sidebar-collapse" style="">
            <a href="#" class="sidebar-collapse-icon with-animation"><i class="entypo-menu"></i></a>
        </div>
        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
            <a href="#" class="with-animation">
                <i class="entypo-menu"></i>
            </a>
        </div>
    </header>
    <div style=""></div>	
<?php
if (strpos($username, 'HS') !== false) {
    if($level==2) {
        require_once 'menu_hs.php';
    } else {
        require_once 'menu_'.$level_name.'.php';
    }
}
else{
	require_once 'menu_'.$level_name.'.php';
}
?>
</div>	
<div class="main-content">
	<div class="row">
    	<!-- Raw Links -->
            <!--<ul class="list-inline links-list pull-left">-->
        <div class="col-md-4 col-sm-12 clearfix">
            <ul class="user-info pull-left pull-none-xsm">
                <!-- Language Selector -->			
               <li class="dropdown language-selector">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                        <img src="<?php echo $userPhoto?>" alt="" style="border: 2px solid #f5f5f5" class="img-circle" width="44">
                        <strong><?php echo $_SESSION['name']?></strong>
                    </a>
    				<ul class="dropdown-menu pull-left">
    				<!--	<li><a href="profile.php"><i class="entypo-info"></i><span>Edit Profile </span></a></li>-->
    					<li><a href="../user_info/change_pass.php"><i class="entypo-key"></i><span>change password</span></a></li>
    				</ul>
    				<!--<strong><input type="button" class="btn btn-default" value="Go back!" onclick="history.back()"></strong>-->
    			</li>
            </ul>
            <!-- Notifications -->
            <?php
            if (strpos($username, 'HS') !== false) {
                
            } else {
                if($level==2) {
                ?>
                <ul class="user-info pull-left pull-right-xs pull-none-xsm">
                  <li class="notifications dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="true">
                        <i class="entypo-attention"></i> <span class="badge badge-info"><?php echo $totalPendingleave?></span> </a> 
                    <ul class="dropdown-menu">
                      <li class="top">
                        <p class="small">
                          You have <strong><?php echo $totalPendingleave?></strong> new leave request senders.
                        </p>
                      </li>
                      <li>
                        <ul class="dropdown-menu-list scroller">
                          <?php
                          foreach ($allDataPendingleave as $record){
                          ?>
                          <li class="unread notification-success"> <a href="#"> <i class="entypo-user-add pull-right">
                            </i> <span class="line"> <strong><?php echo $insPath.$record->taken_id.' - '.$record->leave_type.' - '.$record->days.' days'?></strong> </span> <span class="line small">
                            <?php echo 'From '.date('d-M-Y',strtotime($record->start_date)).' to '.date('d-M-Y',strtotime($record->end_date))?>
                            </span> </a> 
                          </li>
                          <?php
                          }
                          ?>
                        </ul>
                      </li>
                      <li class="external"> <a href="../leave/leave_request.php">View all notifications</a> </li> 
                    </ul>
                  </li>
                </ul>
                <?php
                }
            }
            ?>
    	</div>
    	<div class="col-md-4 col-sm-12 clearfix" style="text-align:center;">
    		<h2 style="font-weight:200; margin:0px;"><?php echo $insName ?></h2>
        </div>
        <div class="col-md-4 col-sm-4 clearfix hidden-xs">
    		<ul class="list-inline links-list pull-right">
    		   <li><a href="#" class="previous" onclick="history.back()"><i class="entypo-left-circled"></i> Back</a></li>
    		    <li><a href="#" class="next" onclick="history.forward()">Next <i class="entypo-right-circled"></i></a></li>
    		    <!-- <li><a href="#" class="previous" onclick="history.go(-1)"><i class="entypo-left-circled"></i> Back</a></li>
    		    <li><a href="#" class="next" onclick="history.go(1)">Next <i class="entypo-right-circled"></i></a></li>-->
    			<li>
    				<a href="../user/User/Authentication/logout.php">
    					Log Out <i class="entypo-logout right"></i>
    				</a>
    			</li>
    		</ul>
    	</div>
    </div>
    <hr style="margin-top:0px;" />