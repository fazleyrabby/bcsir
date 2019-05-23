<?php include '../connect/config.php'; ?>
<!DOCTYPE html>
<script src='js/sweet_alert.js'></script>

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
    padding-top: 45px;
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
                if (isset($_POST['salary_head_all']) && !empty($_POST['salary_head_id'])) { 

                    $years = $_POST['year'];
                    $month = $_POST['month'];
                    $salary_head_id = $_POST['salary_head_id'];
                    // echo $datepicker_salary_head,$salary_head_id;
                    
                    // $numbers = explode('-0', $datepicker_salary_head);
                    // // print_r($numbers);
                    // $years = $numbers["0"];
                    // $month = $numbers["1"];

                    $data_array = array(1,2,3,4,5,6,7,8,9,10,11,12);
                    $bd_date = array('জানুয়ারী','ফেব্রুয়ারি','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর');
                    $bd_month = str_replace($data_array, $bd_date ,$month);
                    $en_num = array(0,1,2,3,4,5,6,7,8,9);
                    $bn_num = array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
                    $bd_year = str_replace($en_num, $bn_num , $years);
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
                                <?php $salary_head_name = mysqli_query($conn,"SELECT account_head_name,account_head_type from account_head where account_head_id = $salary_head_id");
                                $salary_head_obj = mysqli_fetch_object($salary_head_name);
                                $salary_head_name = $salary_head_obj->account_head_name;
                                $salary_head_type = $salary_head_obj->account_head_type;
                                if ($salary_head_type == 1) {
                                    $salary_head = "যোগ";
                                }
                                if ($salary_head_type == 2) {
                                    $salary_head = "আদায়";
                                }
                                ?>
                                    <p align="center" style="font-size:16px;font-weight: 400">প্রতিবেদনের ধরণ :&nbsp;
                                    <span style="color:red;text-decoration:underline"><?php echo $salary_head_name;?>
                                    </span>
                                    <span><?php echo "খাতে অর্থের তালিকা($salary_head)"?></span>

                                    <?php echo "<h3 align='center' style='font-size:16px;'>$bd_month,$bd_year</h3>";?></p>
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
                    <th>খাতের মূল্য</th>
                </tr>
                <tbody>
   
                <?php 
                    // SELECT      
                    // emp.employee_id,
                    // emp.employee_name,
                    // emp.employee_type,
                    // a_desg.designation_name,
                    // sd.amount
                    // FROM salary_details as sd
                    // left join salary_summary as ss
                    // on ss.id = sd.summary_id 
                    // left join employee_details as emp
                    // on emp.id = ss.employee_id
                    // left join all_designation as a_desg
                    // on emp.designation = a_desg.id	
                    // WHERE ss.created_at LIKE '$datepicker_salary_head-%' and ss.salary_st = 1 and sd.salary_head = $salary_head_id
                    $salary_data = mysqli_query($conn,"SELECT
                    sdh_emp.employee_id,
                    ed.employee_name,
                    ed.employee_type,
                    all_desg.designation_name,
                    sdh_emp.amount,
                    sdh_emp.salary_head_id,
                    sdh_emp.salary_head_type
                    -- sdh_emp.amount
                    from salary_details_head_employee as sdh_emp join 
                    employee_details as ed on ed.employee_id=sdh_emp.employee_id
                    join all_designation as all_desg  on ed.designation= all_desg.id
                    WHERE sdh_emp.month like '$month'and sdh_emp.year like '$years' and sdh_emp.salary_head_id = '$salary_head_id'
                    ");

                    $serial=0;
                    $total=0;
                    $total_bd = 0;

                    $salary_data_rows = mysqli_num_rows($salary_data);

                    if ($salary_data_rows > 0) {
                        while ($data = mysqli_fetch_array($salary_data)) {
                            $serial++;
                            $emp_id = $data["0"];
                            $emp_name = $data["1"];
                            $emp_type = $data["2"];
                            $emp_desg = $data["3"];
                            $amount = $data["4"];

                            $total += $amount;
                            echo "<tr>";
                            {
                            $en_num = array(0,1,2,3,4,5,6,7,8,9);
                            $bn_num = array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
                            $serial_bd = str_replace($en_num, $bn_num , $serial);
                            $emp_id_bd = str_replace($en_num, $bn_num , $emp_id);
                            $amount_bd = str_replace($en_num, $bn_num , $amount);
                            $total_bd = str_replace($en_num, $bn_num , $total);
                            }
                            echo "<td>$serial_bd</td>";
                            echo "<td>$emp_id_bd</td>";
                            echo "<td>$emp_name</td>";

                            if ($emp_type == 1) {
                                $type = "কর্মকর্তা ";
                            }
                            elseif ($emp_type == 2) {
                                $type = "বিজ্ঞানী";
                            }
                           
                            echo "<td>$type</td>";
                            echo "<td>$emp_desg</td>";
                            echo "<td>$amount_bd</td>";
                            echo "</tr>";
                        }
                    } 
                    else {
                            echo '<script type="text/javascript">';
                            echo 'setTimeout(function () { swal({
                                    title: "কোনো তথ্য নেই !",
                                    icon: "warning",
                                    dangerMode: true,
                                    button: "বাতিল"
                            }).then( () => {
                                location.href = "salary.php?salary=salary_head_details"
                            })';
                            echo '}, 10);</script>';
                    } 
                    
                    ?>    
                
                
                    </tbody>
                            <tfoot>
                                <tr>
                                <td colspan="5" style="text-align:right"><span style="color:red;text-decoration:underline;font-weight:700"><?=$salary_head_name?></span> খাতে সর্বমোট খরচ</td>
                                <td colspan="1"><?=$total_bd?></td>
                                </tr>
                            </tfoot>
                </table>
            </th></tr>
            

              
                
                </tbody>
            </table>
          
           
            
        </div>

    </div>
    <?php }
      else {
                            echo '<script type="text/javascript">';
                            echo 'setTimeout(function () { swal({
                                    title: "বেতন খাত বাছাই করুন !",
                                    icon: "warning",
                                    dangerMode: true,
                                    button: "বাতিল"
                            }).then( () => {
                                location.href = "salary.php?salary=salary_head_details"
                            })';
                            echo '}, 10);</script>';
                    } 
                ?>
        

     <div class="footer_details">
    
     <div class="footer_down">
         <span>সহ : হিসাবরক্ষণ কর্মকর্তা</span>
         <span>পরিচালক (অ :  দা :) </span>
    </div>

</div>
</div>


</body>
</html>