<?php

include '../../connect/config.php';



if (isset($_POST['support_request'])) {

    $username = $_POST['username'];
    $support_type = $_POST['support_type'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];


    $insert_package = "INSERT INTO user_support values('','$username','$support_type','$subject','$message','Waiting for Replay',0,now(),now())";
    $insert_package_q = mysqli_query($conn,$insert_package);
    if ($insert_package_q == true) {
              //header('Location: ../manage_support.php?success=true');
			  	echo"<script> location.replace('../manage_support.php?success=true'); </script>"; 

      
    } else {
         // header('Location: ../user_support_request.php?success=false');
		  	echo"<script> location.replace('../manage_support.php?success=false'); </script>"; 

    }
}
elseif(isset($_POST['support_message']))
{
$sender_id=$_POST['sender_id'];
$username=$_POST['username'];
$receiver=$_POST['receiver'];
$support_type=$_POST['support_type'];
$subject=$_POST['subject'];
$message=$_POST['message'];

$ins=mysqli_query($conn,"insert into sms values('','$username','$receiver','$support_type','$subject','$message',now(),1,0,'')");
if($ins==true)
    {
echo"<script> location.replace('../manage_sms.php?sms_his=sms_his&succcess=succcess'); </script>"; 	
	}
	else
	{
echo"<script> location.replace('../manage_sms.php?sms_his=sms_his&succcess=failed'); </script>"; 	
	}
}
elseif(isset($_POST['support_message_reply']))
{
$sid=$_POST['sid'];
$rmessage=$_POST['rmessage'];
$update="update sms set reply='$rmessage',rcv_st=1 where id=$sid";
$updatep=mysqli_query($conn,$update);
if($updatep==true)
{
echo"<script> location.replace('../manage_sms.php?sms_his=sms_his&succcess=succcessr'); </script>"; 	
}
else
{
echo"<script> location.replace('../manage_sms.php?sms_his=sms_his&succcess=succcessrf'); </script>"; 
}

}
elseif(isset($_POST['support_request_reply']))
{
$support_id=$_POST['support_id'];
$reply=$_POST['reply'];	
//below for message id
$ser="select id,user_name,category,subject,message,replay,support_status,support_date
from user_support where id='$support_id'";
$se=mysqli_query($conn,$ser);	
if($se==true)
							    {
								  while($sdata=mysqli_fetch_array($se))
								      {
					
					$sid=$sdata['0'];
					$suser=$sdata['1'];
					$scatagory=$sdata['2'];
					$ssubject=$sdata['3'];
					$smessge=$sdata['4'];
					$sreply=$sdata['5'];
					$sstatus=$sdata['6'];
$logo="<img src='https://bitstump.io/images/emaillogo.jpg' align='center' width='250px;height:200px;float:left;margin:5px 0px 0px 200px'>";                    
$to = $ssubject;
$subject = "Mail Reply to $suser ";
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
   Message Reply From BITSTUMP
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
                                            <td align='center' style='font-size: 25px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;' class='padding'>Mail Reply From BITSTUMP</td>
                                        </tr>
                                        <tr>
                                            <td align='center' style='padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;' class='padding'>
											<b><i>Thank you for joining Bitstump</i></b>
											Welcome $suser.<br>
$reply</td>
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
// Set content-type header for sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
$headers .= 'From: Bitstump.io<info@Bitstump.io>' . "\r\n";
$headers .= 'CC: bitstumpinfo@gmail.com' . "\r\n";
//$headers .= 'Bcc: ratulking@gmail.com' . "\r\n";

// Send email
$mail_send=mail($to,$subject,$htmlContent,$headers);
					
									  }
								}
//upper for message id
$upd="update user_support set replay='$reply',support_status=1 where id='$support_id'";
$upd_p=mysqli_query($conn,$upd);
if($upd_p==true)
       {
	  echo"<script> location.replace('../support_his.php?success=success'); </script>";    
	   }
}