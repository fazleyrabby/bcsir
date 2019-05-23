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
  <?php 
                if (isset($_POST['salary_report_all'])) { 

                    $datepicker_salary = $_POST['datepicker_salary'];
                     if ($datepicker_salary != '') {
                    
                    $numbers = explode('-0', $datepicker_salary);
                    // print_r($numbers);
                    $years = $numbers["0"];
                    $month = $numbers["1"];

                    $data_array = array(1,2,3,4,5,6,7,8,9,10,11,12);
                    $bd_date = array('জানুয়ারী','ফেব্রুয়ারি','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর');
                    $bd_month = str_replace($data_array, $bd_date ,$month);
                    $en_num = array(0,1,2,3,4,5,6,7,8,9);
                    $bn_num = array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
                    $bd_year = str_replace($en_num, $bn_num , $years);
                     }
                    ?>

        <div class="issue_info ">
            <table align="center" border="0" cellpadding="0" cellspacing="0" style="" >
                <tbody>
                <tr>
                    <th colspan="3" scope="row" align="left" height="50" valign="top">
                        <table style="border-top:2px #000000 solid;" cellpadding="0" cellspacing="0" height="20" width="860">
                            <tbody>
							<tr>
                                <td valign="top" width="50%">
                                    <p align="center">প্রতিবেদনের ধরণ :&nbsp;
                                        সকল কর্মচারীদের বেতন ভাতার তালিকা <?php if ($datepicker_salary != '') {
                                            echo "<h3 align='center'>$bd_month,$bd_year</h3>";
                                        }
                                        ?></p>
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
                <table class="tbl-list salary_report" width="860">
                <tbody style="margin-bottom:20px">   
                <tr class="center">
                    <th width="4%">#</th>
                    <th width="">আইডি</th>
                    <th class="">কর্মচারীর নাম</th>
                    <th class="">ধরণ</th>
                    <th>পদবী</th>
                    <th>মোট বেতন</th>
                </tr>
                <tbody>
   
                <?php 
                    if ($datepicker_salary == '') {
                    $salary_data = mysqli_query($conn,"SELECT employee_id,salary_total from (select * from salary_summary order by employee_id, salary_paid desc,
                    salary_credit desc,salary_total desc, salary_st)as 
                    ss where salary_st = 1 group by `employee_id`");
                    }
                    else {
                        
                    $salary_data = mysqli_query($conn,"SELECT employee_id,
                    salary_total
                    from (select * from salary_summary order by employee_id, salary_paid desc,salary_credit desc,salary_total desc, salary_st)as ss WHERE created_at LIKE '$datepicker_salary-%' group by `employee_id`");
                    }
                    $serial=0;
                    if ($salary_data == true) {
                        while ($data = mysqli_fetch_array($salary_data)) {
                            $serial++;
                            $emp_id = $data["0"];
                            $salary_total = $data["1"];
                            echo "<tr>";
                            {
                            $en_num = array(0,1,2,3,4,5,6,7,8,9);
                            $bn_num = array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
                            $serial_bd = str_replace($en_num, $bn_num , $serial);
                            }
                            echo "<td>$serial_bd</td>";
                            $employee_id_q = mysqli_query($conn,"SELECT employee_id,employee_name,employee_type,designation from employee_details where id = $emp_id");
                            $employee_id_obj = mysqli_fetch_object($employee_id_q); 
                            $employee_id = $employee_id_obj->employee_id;
                            $employee_name = $employee_id_obj->employee_name;
                            $employee_type = $employee_id_obj->employee_type;
                            $designation = $employee_id_obj->designation;
                            {   
                            $employee_id_bn = str_replace($en_num, $bn_num , $employee_id);
                            }
                            echo "<td>$employee_id_bn</td>";
                            echo "<td>$employee_name</td>";
                            if ($employee_type == 1) {
                                $type = "কর্মকর্তা ";
                            }
                            elseif ($employee_type == 2) {
                                $type = "বিজ্ঞানী";
                            }
                            echo "<td>$type</td>";
                            $employee_desg = mysqli_query($conn,"SELECT designation_name from all_designation where id = $designation");
                            $employee_desg_obj = mysqli_fetch_object($employee_desg); 
                            $designation_name = $employee_desg_obj->designation_name;
                            echo "<td>$designation_name</td>";
                            {
                            $total_salary = str_replace($en_num, $bn_num , $salary_total);
                            }
                            echo "<td>$total_salary</td>";
                            echo "</tr>";
                        }
                    }  
                    
                    ?>    
                
                
                    </tbody>
                            
                </table>
            </th></tr>
            

              
                
                </tbody>
            </table>
           
            
        </div>

    </div>
    <?php }
                ?>
        

     <div class="footer_details">
    
     <!-- <div class="footer_down">
         <span>সহ : হিসাবরক্ষণ কর্মকর্তা</span>
         <span>পরিচালক (অ :  দা :) </span>
    </div> -->

</div>
</div>


</body>
</html>