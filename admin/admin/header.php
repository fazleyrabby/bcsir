<?php include 'session.php'; ?>
 <?php include '../connect/config.php';  ?>
 <?php $baseurl= 'http://bcsirlabsctg.com.bd/admin/admin/';?>
                    <?php
                    
                    $sid = $_SESSION['user_id'];
            $admin_balance=mysqli_query($conn,"select id,username,password,email,user_level,active_status,position,contact_no,profile_pic,country,c_wallet,g_wallet,doj,full_name,referrel_id,placement_id,position_id,intro_position_id,package_id,payment_id,acc_name,delete_status,states,t_pass,acc_name,acc_num,employee_id
      from ratul_login WHERE id='$sid'");
            while ($data = mysqli_fetch_row($admin_balance)) {
              $id = $data['0'];
							$usernamee=$data['1'];
							$password=$data['2'];
							$email=$data['3'];
							$level=$data['4'];
							$status=$data['5'];
							$position=$data['6'];
							$contact=$data['7'];
							$pic=$data['8'];
							$country=$data['9'];
							$gwallet=$data['11'];
							$cwallet=$data['10'];
							$doj=$data['12'];
							$full_name=$data['13'];
							$refferal=$data['14'];
							$placement_id=$data['15'];
							$position_id=$data['16'];
							$intro_pos_id=$data['17'];
							$package_id=$data['18'];
							$tpassm=$data['23'];
							$acc_name=$data['24'];
							$acc_num=$data['25'];
							$employee_login_id=$data['26'];
							if($package_id==1)
							    {
								   $pack_ti="Free";	
								   $rimg="images/r.png";
								}
						    else
							   {
								  $pack_ti="Paid"; 
								   $rimg="images/g.png"; 
								  }		
							$role="Admin";
				if(!empty($pic))
				  {
					 $org="<img src='Action/uploads/$pic' alt='user-img' class='img-circle'>";
					 $org1="<img src='Action/uploads/$pic' alt='' class='thumb-md img-circle'>";
				
				  }
				  else
				  {
					   $org="img/avatar1_small.jpg";
					    $org1="img/avatar1_small.jpg";
						
				   }
                       
                        }



       
	              

                    ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>বাংলাদেশ বিজ্ঞান ও শিল্প গবেষণা পরিষদ (বিসিএসআইআর)-গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</title>

<link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon" />
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="Bitstump" />
   
   <meta content="Bitstump" name="Bitstump" />
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
 <link href="css/timeline-component.css" rel="stylesheet"  type="text/css" />
   <link href="css/style-responsive.css" rel="stylesheet" />
   <link href="css/style-green.css" rel="stylesheet" id="style_color" />
    <link rel="stylesheet" type="text/css" href="assets/chosen-bootstrap/chosen/chosen.css" />
    <link rel="stylesheet" type="text/css" href="assets/jquery-tags-input/jquery.tagsinput.css" />
    <link rel="stylesheet" type="text/css" href="assets/clockface/css/clockface.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />

    <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" href="assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />
   <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
         <link rel="stylesheet" href="public/default.css" type="text/css">
  <link rel="stylesheet" href="public/style.css" type="text/css">
  
   <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
   <!-- <link href="public/metallic.css" rel="stylesheet" type="text/css"/>
   <link href="public/bootstrap.css" rel="stylesheet" type="text/css"/> -->
   <link href="public/default.css" rel="stylesheet" type="text/css"/> 
      <link rel="shortcut icon" href="../images/1.png">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top" >
   <!-- BEGIN HEADER -->
   <div id="header" class="navbar navbar-inverse navbar-fixed-top">
       <!-- BEGIN TOP NAVIGATION BAR -->
       <div class="navbar-inner">
           <div class="container-fluid">
               <!--BEGIN SIDEBAR TOGGLE-->
               <div class="sidebar-toggle-box hidden-phone">
                   <div class="icon-reorder tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
               </div>
               <!--END SIDEBAR TOGGLE-->
               <!-- BEGIN LOGO -->
               <a class="brand" href="dashboard.php">
                   <img src="../../images/dash_logo.png"alt="BCSIR" />
               </a>
               <!-- END LOGO -->
               <!-- BEGIN RESPONSIVE MENU TOGGLER -->
               <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="arrow"></span>
               </a>
               <!-- END RESPONSIVE MENU TOGGLER -->
               <div id="top_menu" class="nav notify-row">
                   <!-- BEGIN NOTIFICATION -->
                   
                  
                   <?php
				   if($level==1)
				   {
include 'admin_notification.php';
				   }
				   ?>
           
               </div>
               <h4 class="pull-right" style="line-height: 3em;">স্বাগতম  <span style="font-size: 25px;
          font-weight: 900 !important;
          font-family: consolas;
          text-shadow: 0px 5px 7px #00000080;"><?php echo 
               strtoupper($usernamee)?></span></h4>
              
               <!-- END  NOTIFICATION -->

           </div>
       </div>
       <!-- END TOP NAVIGATION BAR -->
   </div>