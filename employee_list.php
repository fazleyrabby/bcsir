<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include 'admin/connect/config.php';?>
<head>
    <title>সকল কর্মকর্তাদের নামের তালিকা </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="Robots" content="index,follow"/>

    <link rel="stylesheet" type="text/css" href="stylesheets/report.css" media="all" />
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
    padding: 25px;
    text-align: right;
    
}
.footer_down span{
    margin: 15px;
    /* font-size: 12px; */
}
.sign{
    margin: 10em;
}
</style>
    <style media="print">
        .noprint{ display: none; }
        @page{
            margin-left: 40px;
            margin-right: 40px;
            /* margin-top: 40px;
            margin-bottom: 40px; */
            size: auto;   /* auto is the initial value */
            margin: 0;
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
           <img class="" src="images/logo_report.png" alt="" width="20%">
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


        <div class="issue_info">

            <table align="center" border="0" cellpadding="0" cellspacing="0" style="margin-top:-20px;" >
                <tbody>
     
                <tr>
                    <th colspan="3" scope="row" align="left" height="50" valign="top">
                        <table style="border-top:2px #000000 solid;" cellpadding="0" cellspacing="0" height="20" width="860">
                            <tbody>
							<tr>
                                <td valign="top" width="50%">
                                    <p align="center">
                                        প্রতিবেদনের ধরণ :&nbsp;
                                        সকল কর্মকর্তাদের নামের তালিকা  </p>
                                </td>
                            </tr>
                            <tr><td colspan="2">&nbsp;</td></tr>
                            </tbody>
                        </table>
                    </th>
                </tr>
                <tr>
                    <th colspan="3" scope="row" align="center" height="50" valign="top">
                        <table class="tbl-list" width="600">
                            <tbody>
                            <tr class="center">
                                <th style="width:10%">ক্র/নং-</th>
                                <th style="width:55%">নাম </th>
                                <th>পদবী </th>
                            </tr>

                            <?php 
                            $all_scientists_list= mysqli_query($conn,"SELECT employee_name,designation,employee_id from employee_details where employee_type = 1 AND employee_st = 1 order by employee_serial");
                            $serial = 0;
                            if($all_scientists_list == true){
                                while($data = mysqli_fetch_array($all_scientists_list)){
                                    $serial++;
                                    $name = $data["0"];
                                    $desg = $data["1"];
                                    $id = $data["2"];
                                    
                                    {
                                    $bd_num=array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
                                    $serial_no = str_replace(range(0, 9),$bd_num, $serial); 
                                        //Numerical Value Conversion
                                    }
                                    echo "<tr>";
                                    echo "<td style='width:4%'>$serial_no</td>";
                                    echo "<td style='width:55%;text-align:left'>$name</td><td style='text-align:left'>";
                                    $desg_details = mysqli_query($conn,"SELECT designation_name from all_designation where id=$desg");
                                    if ($desg_details == true) {
                                        while ($desg_dt = mysqli_fetch_array($desg_details)) {
                                            $desg_name = $desg_dt["0"];
                                            echo "$desg_name";
                                        }
                                    }
                                    echo "</td></tr>";
                                }
                            }
                            
                            ?>
                            <!-- <tr>
                                    <td style="width:4%">1</td>
                                    <td style="width:55%">19-Dec-2018</td>
                                    <td>Syeda Khurshida Begum (210003)</td>
                                                                 
                            </tr>
                            <tr>
                                    <td style="width:4%">2</td>
                                    <td style="width:55%">18-Dec-2018</td>
                                    <td >Syeda Sajeda (210002)</td>
                            </tr> -->
                               
                            
                            </tbody>
                        </table>
                    </th>
                </tr>
                <br/><br/>
                </tbody>
            </table>
            <br/><br/>
            
        </div>

    </div>
    <div id="bottomcontentbtm"></div>
    <!--<div id="footer">
        <p style="float:left;">Powered By <a href="" target="_blank" style="color: #000; font-weight:bold;text-decoration: none;"><a></p>
        <p style="float:right;color:#000;">Print on: </p>
    </div>-->

</div>
</body>
</html>