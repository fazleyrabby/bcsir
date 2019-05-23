<?php include '../connect/config.php'; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 
    <!-- <title>বই জারি প্রতিবেদন</title> -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="Robots" content="index,follow"/>

    <link rel="stylesheet" type="text/css" href="css/report.css" media="all" />
    <!--[if IE]>
    <link href="../../resources/assets/css/ie.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <style>
    
.top_ul{
	list-style: none;
}
.top_ul>li{
    display: inline-block;
    width: 25em;
}

.emplyee_details{
    display: block;
    margin: 0 auto;
    width: 20em;
    font-size: 12px;
}
.width_edit{
 width: 50% !important;
}
.logo{
    /* position: absolute;
    right: 15em; */
    
    position: absolute;
    margin-left: 5em;
        margin-top: -5px;
}
.footer_details{
    padding: 10px 20px;
    /* font-size: 14px; */
}
.footer_down{
    padding-top: 50px;
    text-align: right;
    
}
.footer_down span{
    margin: 20px;
    /* font-size: 12px; */
}
.sign{
    margin: 14em;
}
.font-16{
    font-size:16px !important;
}
table.tbl-list tr th, table.tbl-list tr td{
    border:#dbcfcf solid 1px !important;
}
</style>
    <style media="print">
        .noprint{ display: none; }
        @page{
            margin-left: 40px;
            margin-right: 40px;
            margin-top: 40px;
            margin-bottom: 40px;
        }
        .tbl-list {
            page-break-before: always;
            page-break-after: always;
        }
        .tbl-list tr {
            page-break-inside: avoid;
        }
        #wrapper {
            box-shadow: none !important;
        }
        #footer p {
            margin: 0;
            padding: 0;
        }
		td.heading p {
			text-align:center;
			font-family: Verdana, Arial, Helvetica, sans-serif;
			font-size:11px;
			font-style:normal !important;
        }
    </style>
</head>
<body>

    
    <div id="wrapper">
    <!-- top info starts here -->
    <!-- main content starts here -->
    <div id="page" style=''>
        <div class="form-actions noprint" align="center" >			
        </div>

               <div class="form-actions noprint my-button" align="center" style="">
            <button style="background: #3498DB;padding:4px 8px;border:1px solid #3498DB;color: #ffffff;border-radius:5px;font-size:16px;cursor: pointer"   class="btn btn-primary noprint" onClick="window.print();return false;">Print Statement</button>
        </div>
       
        <div class="logo">
           <img class="" src="img/logo_report.png" alt="" width="10%">
        </div>
        <div>
           <h1 style="text-align:center" >বিসিএসআইআর গবেষণাগার, চট্টগ্রাম</h1>
                        <p class="" style="line-height:3px;text-align:center">বাংলাদেশ বিজ্ঞান ও শিল্প গবেষণা পরিষদ</p>
                        <p style="line-height:3px;text-align:center">ডাকঘরঃ চট্টগ্রাম সেনানিবাস, টট্টগ্রাম-৪২২০</p>
           </div>
            <ul class=top_ul>
               <li><div>জিএডি রেজিঃ পৃঃ নং- <br> কলাম-০১</div>
            </li>
            <li>
             <div>
               <span class="box" style="border: 1px solid black;margin: auto;height: 25px;width: 140px;display: block;">
               </span>
            </div>
            </li>
            <li align="right">
                <div>
                    ডাউচার নং....................<br>
                    ব্যাংক ক্রমিক নং..............
                </div>
            </li>
            </ul>
  
        <?php $id = $_GET['id'];?>
        <div class="issue_info ">
            <table align="center" border="0" cellpadding="0" cellspacing="0" style="" >
                <tbody>
                <tr>
                    <th colspan="3" scope="row" align="left" height="50" valign="top">
                        <table style="border-top:2px #000000 solid;" cellpadding="0" cellspacing="0" height="20" width="860">
                            <tbody>
							<tr>
                                <td valign="top" width="50%">
                                    <p align="center">
                                        প্রতিবেদনের ধরণ :&nbsp;
                                        ক্রয় প্রস্তাবের রিপোর্ট 
                                    </p>
                                </td>
                            </tr>
                            <tr><td colspan="2">&nbsp;</td></tr>
                            </tbody>
                        </table>
                    </th>
                </tr>
            <div>
            
            <tr>
                <th colspan="3" scope="row" align="left" height="50" valign="top">
                <table class="tbl-list salary_report" width="860" style="table-layout:fixed">
                <tbody style="margin-bottom:20px;border:none;">   
                <!-- <tr class="center">
                    <th style="width:25%">#</th>
                    <th width="">#</th>
                    
                </tr> -->
                <?php 
                $cpto_details = mysqli_query($conn,"SELECT
                user_req.Qu_title as title,
                user_req.Qu_descrbs as description,
                user_req.Qu_price as price,
                user_req.Qu_status as status,
                rdt.send_id,
                rdt.recv_con_id,
                emp_send.employee_name as sender_name,
                emp_recieve.employee_name as reciever_name,
                login_sender.employee_id as sender_id,
                login_reciever.employee_id as reciever_id,
                rdt.comments as comments,
                DATE_FORMAT(user_req.created_at,'%Y-%m-%d') as date
                -- rdt.created_at as date
                from user_requirement as user_req 
                left join requirement_detalis_tbl as rdt 
                on 
                rdt.form_pk_id = user_req.user_requr_id 
                left join ratul_login as login_sender 
                on 
                login_sender.id = rdt.send_id
                left join ratul_login as login_reciever 
                on 
                login_reciever.id = rdt.recv_con_id
                left join employee_details as emp_send 
                on 
                emp_send.employee_id = login_sender.employee_id
                left join employee_details as emp_recieve 
                on 
                emp_recieve.employee_id = login_reciever.employee_id
                where user_req.user_requr_id = $id order by rdt.id DESC limit 1");


                $cpto_list = mysqli_num_rows($cpto_details);
                if($cpto_list > 0 )
                {  
                    // $cpto_data=mysql_fetch_objet($cpto_details);

                    while ($cpto_data=mysqli_fetch_object($cpto_details)) 
                    {
                       $title=$cpto_data->title;
                       $description=$cpto_data->description; 
                       $price=$cpto_data->price;
                       $status=$cpto_data->status;
                    //    $status = $cpto_data['4'];
                    //    $status = $cpto_data['5'];
                       $sender_name=$cpto_data->sender_name;
                       $reciever_name=$cpto_data->reciever_name;
                       $sender_id=$cpto_data->sender_id;
                       $reciever_id=$cpto_data->reciever_id;
                       $date = $cpto_data->date;
                       $comments = $cpto_data->comments;
                       
                    }
                }
                
                ?>
                    <tr class='custom-td'>
                        <td ><h4 class="alert-heading">প্রেরক</h4></td>
                        <td><span><?=$sender_name?></span></td>

                    </tr>
                    <tr class='custom-td'>
                        <td><h4 class="alert-heading">গ্রাহক</h4></td>
                        <td><span><?=$reciever_name?></span></td>
                    </tr>
                    <tr class='custom-td'>
                        <td><h4 class="alert-heading">ক্রয় প্রস্তাব টাইটেল</h4> </td>
                        <td><span><?=$title?></span></td>
                    </tr>
                    <tr class='custom-td'>
                        <td><h4 class="alert-heading">বিবরণ</h4></td>
                        <td><span><?=$description?></span></td>
                    </tr>
                    <tr class='custom-td'>
                        <td><h4 class="alert-heading">সম্ভাব্য মূল্য </h4> </td>
                        <td><span> 
                        <?php 
                            {    
                                $en_num = array(0,1,2,3,4,5,6,7,8,9);
                                $bn_price = str_replace($en_num, array('০','১','২','৩','৪','৫','৬','৭','৮','৯'), $price);
                                //date conversion in bangla 
                            }
                            echo $bn_price;?> 
                            টাকা    
                    
                    </span></td>
                    </tr>

                    <tr class='custom-td'>
                        <td><h4 class="alert-heading">ক্রয় প্রস্তাবের অবস্থা</h4></td>
                        <td><span><?php 
                        if($status == 0){echo "অনুমতি দেয়া হয় নি "; }
                       elseif($status == 1){echo "অমীমাংসিত"; }
                       elseif($status == 2){echo "অনুমতি দেয়া হল";}
                        ?></span></td>
                    </tr>
                    <tr class='custom-td'>
                        <td><h4 class="alert-heading">মন্তব্য</h4> </td>
                        <td><span> <?=$comments?> </span></td>
                    </tr>
                    <tr class='custom-td'>
                        <td><h4 class="alert-heading"> ক্রয় প্রস্তাব প্রেরণের তারিখ </h4> </td>
                        <td><span>
                         <?php 
                            {    
                                $en_num = array(0,1,2,3,4,5,6,7,8,9);
                                $bn_date = str_replace($en_num, array('০','১','২','৩','৪','৫','৬','৭','৮','৯'), $date);
                                //date conversion in bangla 
                            }
                            echo $bn_date;?>
                    </span></td>
                    </tr>
<!-- প্রেরক 

ক্রয় প্রস্তাব টাইটেল 
বিবরণ 
সম্ভাব্য মূল্য  -->
     
                    </tbody>
                    <tfoot>
                        <tr>
                        
                        </tr>
                    </tfoot>       
                </table>
            </th></tr>
            

              
                
                </tbody>
            </table>
           
            
        </div>

    </div>
  
        

     <div class="footer_details">
    
  <div class="footer_down">
         <span>সহ : হিসাবরক্ষণ কর্মকর্তা</span>
         <span>পরিচালক (অ :  দা :) </span>
    </div> 
</div>
</div>


</body>
</html>