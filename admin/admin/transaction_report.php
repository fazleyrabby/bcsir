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
        .alert-heading{
            text-align: right !important;
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
               <span class="box" style="border: 1px solid black;margin:0 auto;height: 25px;width: 140px;display: block;">
                  <span style='display:block;text-align:center;margin:5px'><?php if(isset($_GET['invoice_id']))
                {
                    {    
                    $en_num = array(0,1,2,3,4,5,6,7,8,9);
                    $bn = str_replace($en_num, array('০','১','২','৩','৪','৫','৬','৭','৮','৯'), $_GET['invoice_id']);
                    //date conversion in bangla 
                    }
                   echo $bn;
                }?></span>
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
                                        বিশ্লেষণ সেবা রিপোর্ট 
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
                if (isset($_GET['invoice_id'])) {

                $invoice_id=$_GET['invoice_id'];
                $sample_id=$_GET['sample'];
                $parameter_id=$_GET['parameter'];
                $method_id=$_GET['method'];

                $invoice_dt = mysqli_query($conn,"SELECT a.id,a.store_id,a.sender,a.amount,a.reciever,a.status,a.transaction_id,a.sender_phone,a.sender_email,a.created_at,b.description FROM all_payment_transactions as a inner join user_application as b on b.all_p_id=a.id where a.id=$invoice_id");
                while($inv_dt = mysqli_fetch_array($invoice_dt)){
                $invoice_id = $inv_dt['id'];
                $store_id = $inv_dt['store_id'];
                $cus_name =$inv_dt['sender'];
                $amount=$inv_dt['amount'];
                $cus_phone=$inv_dt['sender_phone'];
                $cus_email=$inv_dt['sender_email'];
                $receiver=$inv_dt['reciever'];
                $tran_id=$inv_dt['transaction_id'];
                $created_at=$inv_dt['created_at'];
                $status = $inv_dt['status'];
                $description = $inv_dt['description'];
            }
        }
                
                ?>
                    <tr class='custom-td'>
                        <td ><h4 class="alert-heading">বিস্তারিত</h4></td>
                        <td><span><?=$description?></span></td>

                    </tr>
                    <tr class='custom-td'>
                        <td ><h4 class="alert-heading">তারিখ/সময়</h4></td>
                        <td><span><?=$created_at?></span></td>

                    </tr>
                    <tr class='custom-td'>
                        <td ><h4 class="alert-heading">প্রেরক</h4></td>
                        <td><span><?=$cus_name?></span></td>

                    </tr>
                    <tr class='custom-td'>
                        <td ><h4 class="alert-heading">প্রেরক ফোন </h4></td>
                        <td><span><?=$cus_phone?></span></td>

                    </tr>
                    <tr class='custom-td'>
                        <td ><h4 class="alert-heading">প্রেরক ই-মেইল </h4></td>
                        <td><span><?=$cus_email?></span></td>

                    </tr>
                    <tr class='custom-td'>
                        <td><h4 class="alert-heading">গ্রাহক</h4></td>
                        <td><span><?=$receiver?></span></td>
                    </tr>
                     <tr class='custom-td'>
                        <td><h4 class="alert-heading">স্টোর  আইডি </h4></td>
                        <td><span><?=$store_id?></span></td>
                    </tr>
                    <tr class='custom-td'>
                        <td><h4 class="alert-heading">নমুনা   </h4> </td>
                    <?php
                       $sample_data = mysqli_query($conn,"SELECT sample_name FROM sample_tbl WHERE sample_id = $sample_id"); //1 = only active 
                        if($sample_data == true) {
                          while($data = mysqli_fetch_array($sample_data)){
                            $sample_name = $data['0'];
                            echo "<td><span> $sample_name <span></td>";
                            }
                        }
                    
                    ?>
                    </tr>
                     <tr class='custom-td'>
                        <td><h4 class="alert-heading">পেরামিটার   </h4></td>
                        <td><span>
                    <?php
                    $i=0;
                        $para_data = mysqli_query($conn,"SELECT pra_name FROM prameter_tbl
                        where pra_id in ($parameter_id)"); //1 = only active 
                        $para_row = mysqli_num_rows($para_data);
                        if($para_data == true) {
                          while($data = mysqli_fetch_array($para_data)){
                                $i+=1;
                                $pra_name = $data['0'];
                                if ($i == $para_row) {
                                    echo "$pra_name "; 
                                }
                                else {
                                     echo "$pra_name ,"; 
                                }
                          }     
                        }
                    ?> </span></td>
                    </tr>
                     <tr class='custom-td'>
                        <td><h4 class="alert-heading">মেথড  </h4> </td>
                        <td><span>
                    <?php 
                     $i=0;
                        $method_data = mysqli_query($conn,"SELECT method_name FROM method_tbl
                        where methd_id in ($method_id) and method_st = 0"); //1 = only active 
                        $method_row = mysqli_num_rows($method_data);
                        if($method_data == true) {
                          while($m_data = mysqli_fetch_array($method_data)){
                                $i+=1;
                                $m_name = $m_data['0'];
                                if ($i == $method_row) {
                                    echo "$m_name "; 
                                }
                                else {
                                     echo "$m_name ,"; 
                                }
                                //var json_encode($pra_name);
                                //$all_para = implode(",",$pra_name);
                               //echo "$m_name,"; 
                          }
                        }   
                    ?>
                    </span></td>
                    </tr>

                    <tr class='custom-td'>
                        <td><h4 class="alert-heading">ট্রান্সেকশন আইডি</h4></td>
                        <td><span><?=$tran_id?></span></td>
                    </tr>
                    <tr class='custom-td'>
                        <td><h4 class="alert-heading">মূল্য </h4> </td>
                        <td><span> 
                        <?php 
                            {    
                                $en_num = array(0,1,2,3,4,5,6,7,8,9);
                                $bn_price = str_replace($en_num, array('০','১','২','৩','৪','৫','৬','৭','৮','৯'), $amount);
                                //date conversion in bangla 
                            }
                            echo $bn_price;?> 
                            টাকা    
                    
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