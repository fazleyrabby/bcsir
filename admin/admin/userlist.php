      <style type="text/css">
/* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
	}
		th { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	th:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
	}
	/*
	Label the data
	*/

}

</style>
<div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme Color:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-green" data-style="green"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-red" data-style="red"></span>
                            </span>
                        </span>
                   </div>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     ড্যাশবোর্ড 
                   </h3>
                   <!-- <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">Payforearn</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           Dashboard
                       </li>
                       
                   </ul> -->
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            
            

            
                                    <div class="row-fluid">
                <div class="span12">
<?php
    if (isset($_GET['success'])) {
		 // echo" <div class='widget orange'><div class='widget-body'>";
       if ($_GET['success'] == 'make_inactive') { // ?>
           <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                <h4 class="alert-heading">সফলভাবে সম্পন্ন হয়েছে !</h4>
                            </div>
        <?php 
		}
           
            elseif ($_GET['success'] == 'active') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                               <h4 class="alert-heading">সফলভাবে সম্পন্ন হয়েছে !</h4>
                            </div>
        <?php 
		}   
             elseif ($_GET['success'] == 'success_pass_update') { // ?>
           <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">সফলভাবে সম্পন্ন হয়েছে  !</h4>
                            </div>
        <?php 
		}   
             elseif ($_GET['success'] == 'success_pass_fail') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">ত্রুটি ঘটেছে !</h4>
                            </div>
        <?php 
		}   
            elseif ($_GET['success'] == 'success_tpass_update') { // ?>
           <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">সফলভাবে সম্পন্ন হয়েছে </h4>
                            </div>
        <?php 
		}   
             elseif ($_GET['success'] == 'success_tpass_fail') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">ত্রুটি ঘটেছে !</h4>
                            </div>
        <?php 
		}
		             elseif ($_GET['success'] == 'picture_select') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">ত্রুটি ঘটেছে !</h4>
                            </div>
        <?php 
		}
		             elseif ($_GET['success'] == 'picture_large') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">ত্রুটি ঘটেছে !</h4>
                            </div>
        <?php 
		} 
		             elseif ($_GET['success'] == 'picture_invalid') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">ত্রুটি ঘটেছে !</h4>
                            </div>
        <?php 
		} 
            elseif ($_GET['success'] == 'picture_success') { // ?>
           <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">সফলভাবে সংশোধন সম্পন্ন !</h4>
                            </div>
        <?php 
		} 
            elseif ($_GET['success'] == 'email_send') { // ?>
           <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">সফলভাবে সম্পন্ন হয়েছে !</h4>
                            </div>
        <?php 
		}  		
		             elseif ($_GET['success'] == 'submit_failed') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">সংশোধন ত্রুটি ঘটেছে !</h4> 
                            </div>
        <?php 
		} 
    }
	echo" </div>
                    </div>";
    ?>
                <?php
				if(isset($_GET['member']))
				       {
						
                          if(isset($_GET['sendmail']))
						     {
							$suid=$_GET['uid'];	 
							//get the details of this user_error
							$r="select username,email,contact_no,password,btc_key,eth_key from ratul_login where id=$suid";
							//echo $r;
							$rp=mysqli_query($conn,$r);
							$ro=mysqli_fetch_object($rp);
							$suname=$ro->username;
							$semail=$ro->email;
							echo $semail;
							$scontact_no=$ro->contact_no;
							$sbtc_key=$ro->btc_key;
							$seth_key=$ro->eth_key;
$logo="<img src='https://bitstump.io/images/logo.png' align='center' width='250px;height:200px;float:left;margin:5px 0px 0px 200px'>";   
$to = $semail;	
//echo $to;
$subject = "Welcome to Bitstump.io For Pre ICO";
$htmlContent="
   <html>
<head>
<title>Bitstump.io</title>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'/>
<style type='text/css'>
    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
    table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
    img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

    /* RESET STYLES */
    img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
    table{border-collapse: collapse !important;}
    body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    /* MOBILE STYLES */
    @media screen and (max-width: 525px) {

        /* ALLOWS FOR FLUID TABLES */
        .wrapper {
          width: 100% !important;
            max-width: 100% !important;
        }

        /* ADJUSTS LAYOUT OF LOGO IMAGE */
        .logo img {
          margin: 0 auto !important;
        }

        /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
        .mobile-hide {
          display: none !important;
        }

        .img-max {
          max-width: 100% !important;
          width: 100% !important;
          height: auto !important;
        }

        /* FULL-WIDTH TABLES */
        .responsive-table {
          width: 100% !important;
        }

        /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
        .padding {
          padding: 10px 5% 15px 5% !important;
        }

        .padding-meta {
          padding: 30px 5% 0px 5% !important;
          text-align: center;
        }

        .padding-copy {
             padding: 10px 5% 10px 5% !important;
          text-align: center;
        }

        .no-padding {
          padding: 0 !important;
        }

        .section-padding {
          padding: 50px 15px 50px 15px !important;
        }

        /* ADJUST BUTTONS ON MOBILE */
        .mobile-button-container {
            margin: 0 auto;
            width: 100% !important;
        }

        .mobile-button {
            padding: 15px !important;
            border: 0 !important;
            font-size: 16px !important;
            display: block !important;
        }

    }

  
    div[style*='margin: 16px 0;'] { margin: 0 !important; }
</style>
</head>
<body style='margin: 0 !important; padding: 0 !important;'>


<div style='display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;'>
   Welcome to Bitstump.io For Pre ICO
</div>


<table border='0' cellpadding='0' cellspacing='0' width='100%'>
    <tr>
        <td bgcolor='#ffffff'align='center'>
            <!--[if (gte mso 9)|(IE)]>
            <table align='center' border='0' cellspacing='0' cellpadding='0' width='500'>
            <tr>
            <td align='center' valign='top' width='500'>
           '
            <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='wrapper'>
                <tr>
                    <td align='center' valign='top' style='padding: 15px 0;' class='logo'>
                        <a href='http://bitstump.io/' target='_blank'>
                            <img alt='Logo' src='https://bitstump.io/images/emaillogo.jpg' width='120' height='120' style='display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;' border='0'>
                        </a>
                    </td>
                </tr>
            </table>
          
            </td>
            </tr>
            </table>
          
        </td>
    </tr>
    <tr>
        <td bgcolor='#D8F1FF' align='center' style='padding: 70px 15px 70px 15px;' class='section-padding'>
           
            <table align='center' border='0' cellspacing='0' cellpadding='0' width='500'>
            <tr>
            <td align='center' valign='top' width='500'>
            
            <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 500px;' class='responsive-table'>
                <tr>
                    <td>
                        
                        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                            <tr>
                                  <td class='padding' align='center'>
                                    <a href='https://bitstump.io' target='_blank'><img src='https://bitstump.io/revslider/assets/e1b9a-10.png' width='200' height='200' border='0' alt='BITSTUMP' style='display: block; padding: 0; color: #666666; text-decoration: none; font-family: Helvetica, arial, sans-serif; font-size: 16px;' class='img-max'></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                
                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                        <tr>
                                            <td align='center' style='font-size: 25px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;' class='padding'>Our Greatest Feature Ever</td>
                                        </tr>
                                        <tr>
                                            <td align='center' style='padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;' class='padding'>
											<b><i>Thank you for joining Bitstump</i></b>
											Welcome $suname.<br>
You're almost there! Please click on the Active Now button to below to confirm your interest in signing up for BITSTUMP token sale.If Need Please Check Spam</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align='center'>
                                 
                                    <table width='00%' border='0' cellspacing='0' cellpadding='0'>
                                        <tr>
                                            <td align='center' style='padding-top: 25px;' class='padding'>
                                                <table border='0' cellspacing='0' cellpadding='0' class='mobile-button-container'>
                                                    <tr>
                                                        <td align='center' style='border-radius: 3px;' bgcolor='#256F9C'><a href='http://bitstump.io/index.php?account_activate=account_activate&user_id=$suid' target='_blank' style='font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #256F9C; display: inline-block;' class='mobile-button'>Activate Now</a></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
         
            </td>
            </tr>
            </table>
           
        </td>
    </tr>
    <tr>
        <td bgcolor='#ffffff' align='center' style='padding: 20px 0px;'>
          
            <table align='center' border='0' cellspacing='0' cellpadding='0' width='500'>
            <tr>
            <td align='center' valign='top' width='500'>

            <table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' style='max-width: 500px;' class='responsive-table'>
                <tr>
                    <td align='center' style='font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;'>
                       156 Victoria St, Potts Point, New South Wales, Australia.</br>
Phone : +61 488896094
                        <br>
                        <a href='http://bitstump.io' target='_blank' style='color: #666666; text-decoration: none;'>Unsubscribe</a>
                        <span style='font-family: Arial, sans-serif; font-size: 12px; color: #444444;'>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <a href='http://bitstump.io' target='_blank' style='color: #666666; text-decoration: none;'>View this email in your browser</a>
                    </td>
                </tr>
            </table>
          
            </td>
            </tr>
            </table>
          
        </td>
    </tr>
</table>

</body>
</html>
";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@bitstump.io>' . "\r\n";
$headers .= 'Cc: info@bitstump.io' . "\r\n";  
$headers .= 'Cc: bitstumpinfo@gmail.com' . "\r\n";  
$ratul=mail($to,$subject,$htmlContent,$headers);
//$mail_send=mail($to,$subject,$htmlContent,$headers);
//echo "Jaschee ".$to;
if($ratul==true)
   {
	//echo"success";
	echo"<script> location.replace('user_list.php?role=4&member=member&package=20&active_status=100&success=email_send'); </script>"; 	
   }
   else
   {
	echo"<script> location.replace('user_list.php?role=4&member=member&package=20&active_status=100&success=email_send'); </script>"; 	   
   }
							//get the detaisl of this user
							 }							  
						   
						 $role=$_GET['role'];
						 $package=$_GET['package'];
						 $active_status=$_GET['active_status'];
						 if(($role==4)and($package==1)and($active_status==1))
						      {
							$title="All Active Member List";
				$se=mysqli_query($conn,"select id,username,`position`,email,contact_no,referrel_id,placement_id,active_status,user_level,profile_pic,password,
doj,g_wallet,c_wallet,btc_key,eth_key from ratul_login where user_level='$role' and active_status='$active_status' and package_id='$package'");				  
							  }
						 elseif(($role==4)and($package==20)and($active_status==100))
						      {
							$title="All Member List";	  
				$se=mysqli_query($conn,"select id,username,`position`,email,contact_no,referrel_id,placement_id,active_status,user_level,profile_pic,password,
doj,g_wallet,c_wallet,btc_key,eth_key from ratul_login where user_level='$role'");
							  }  
						 elseif(($role==4)and($package==2)and($active_status==1))
						      {
							$title="All Paid Member List";	  
				$se=mysqli_query($conn,"select id,username,`position`,email,contact_no,referrel_id,placement_id,active_status,user_level,profile_pic,password,
doj,g_wallet,c_wallet,btc_key,eth_key from ratul_login where user_level='$role' and active_status='$active_status' and package_id !=1");
							  }  
						 elseif(($role==4)and($package==1)and($active_status==0))
						      {
							$title="All Block Member List";	  
				$se=mysqli_query($conn,"select id,username,`position`,email,contact_no,referrel_id,placement_id,active_status,user_level,profile_pic,password,
doj,g_wallet,c_wallet,btc_key,eth_key from ratul_login where user_level='$role' and active_status='$active_status' and package_id='$package'");
							  }
						 elseif(($role==1)and($active_status==1))
						      {
							$title="Admin List";	
				$se=mysqli_query($conn,"select id,username,`position`,email,contact_no,referrel_id,placement_id,active_status,user_level,profile_pic,password,
doj,g_wallet,c_wallet,btc_key,eth_key from ratul_login where user_level='$role' and active_status='$active_status'");  
							  }
						 elseif(($role==2)and($package==1)and($active_status==1))
						      {
							$title="Game Manager List";	  
				$se=mysqli_query($conn,"select id,username,`position`,email,contact_no,referrel_id,placement_id,active_status,user_level,profile_pic,password,
doj,g_wallet,c_wallet,btc_key,eth_key from ratul_login where user_level='$role' and active_status='$active_status' and package_id='$package'");
							  }
						 elseif(($role==3)and($package==1)and($active_status==1))
						      {
							$title="Score Board Manager List";
				$se=mysqli_query($conn,"select id,username,`position`,email,contact_no,referrel_id,placement_id,active_status,user_level,profile_pic,password,
doj,g_wallet,c_wallet,btc_key,eth_key from ratul_login where user_level='$role' and active_status='$active_status' and package_id='$package'");	  
							  } 
					   }
				?>
                <div class="widget red">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> <?php echo $title?></h4>

                    </div>
                    <div class="widget-body">
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                            <tr>
                                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                <th>Username
								
								</th>
                                <?php
								if(($role==4)and($package==20)and($active_status==100))
								 {
									 
									 echo "<th>Password</th>
									 <th>Document</th>
									 ";
									 }
								
								?>
                             
                                <th>Email</th>
                                <th>Contact</th>

                                 <th class="hidden-phone">BTC KEY 
                               </th>
                                  <th class="hidden-phone">ETH KEY 
                               </th>
                                  <th class="hidden-phone">Active St.</th>
                                  <th class="hidden-phone">Action</th>
                            </tr>
                               </thead>
                               <tbody>
                            <?php
							if($se==true)
							    {
								  while($sdata=mysqli_fetch_array($se))
								      {
					$eid=$sdata['0'];
					$uname=$sdata['1'];
					$position=$sdata['2'];
					$uemail=$sdata['3'];
					$contact_no=$sdata['4'];
					$sponsor_id=$sdata['5'];
					$place_ment=$sdata['6'];
					$active_st=$sdata['7'];
					
					if($active_st==1)
					   {
						    $act_t="Active";
							$actitl="<span class='btn btn-danger'>Make Inactive</span>";
						   }
					 else
					   {
						   $act_t="Inactive";
						   $actitl="<span class='btn btn-success'>Make Active</span>";
						   }  	
					$ulvel=$sdata['8'];	
					$ppic=$sdata['9'];	
					$pass=$sdata['10'];	
					$doj=$sdata['11'];
					$g_wallet=$sdata['12'];
					$c_wallet=$sdata['13'];	  
					////
					$btc_key=$sdata['14'];	
					$eth_key=$sdata['15'];
									
                           echo"<tr class='odd gradeX'>
                                <td><input type='checkbox' class='checkboxes' value='1' /></td>
                                <td>$uname</td>";
								if(($role==4)and($package==20)and($active_status==100))
								 {
									 
									 echo "<td>
									
									 $pass
									 </br>
									 <a href='user_list.php?role=4&member=member&package=20&active_status=100&sendmail=sendmail&uid=$eid'>Send Mail</a> </td>";
							$nid=mysqli_query($conn,"select f from file_type where upoad_id='$eid' and file_n='NID' order by album_id desc limit 1");		 $nidc=mysqli_num_rows($nid);
							if($nidc==0)
							      {
								  $ft=""; 
								  $ftt="NID";
								   }
							  else
							  {
								  while($nd=mysqli_fetch_array($nid))
								         {
										  $ft=$nd['0'];	
										  $ftt="NID"; 
										 }
								  } 
$pnid=mysqli_query($conn,"select f from file_type where upoad_id='$eid' and file_n='Passport' order by album_id desc limit 1");		 $pnidc=mysqli_num_rows($pnid);
							if($pnidc==0)
							      {
								  $ft=""; 
								  $ftt="Passport";
								   }
							  else
							  {
								  while($pnd=mysqli_fetch_array($pnid))
								         {
										  $pft=$pnd['0'];	
										  $pftt="Passport"; 
										 }
								  } 
								  
		 echo "<td><a href='Action/uploads/$ft' target='_blank' download='Action/uploads/$ft'>$ftt</a><br />
		 <a href='Action/uploads/$ft' target='_blank' download='Action/uploads/$pft'>$pftt</a>
</td>";
									 }
								
								echo"<td>$uemail</td>
								<td>$contact_no</td>

<td>$btc_key</td>
								<td>$eth_key</td>


								<td>$doj</td>
								
                              
                                <td class='hidden-phone'><a href='edit_profile.php?edit_profile=edit_profile&edit_user_id=$eid'><span class='btn btn-success'>Edit Profile</span></a>
								&nbsp;&nbsp;<a href='edit_profile.php?change_pass=change_pass&edit_user_id=$eid'><span class='btn btn-success'>Pass.Change</span></a><br />
<br />

								&nbsp;&nbsp;<a href='edit_profile.php?change_tpass=change_tpass&edit_user_id=$eid'><span class='btn btn-success'>Tr.Pass Change</span></a>
								&nbsp;&nbsp;<a href='Action/edit_profile.php?change_status=change_status&edit_user_id=$eid&act_st=$active_st&rr=$role&pp=$package&a=$active_status'>$actitl</a></td>
                            </tr>";				
									
									  }	
								}
							
							?>
                            
                         
                            
                            


                            
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>


            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
         </div