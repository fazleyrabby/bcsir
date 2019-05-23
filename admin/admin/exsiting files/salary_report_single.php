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

    <?php $employee_id = $_GET['employee_id']; ?>
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
            $employee_dt = mysqli_query($conn,"SELECT employee_id,employee_name,designation,employee_grade from employee_details where id = $employee_id");
            $employee_dt_obj=mysqli_fetch_object($employee_dt);
            $emp_id=$employee_dt_obj->employee_id;
            $emp_name=$employee_dt_obj->employee_name;
            $emp_desg_id=$employee_dt_obj->designation;
            $emp_grade=$employee_dt_obj->employee_grade;
            // echo $emp_id;
            $employee_desg = mysqli_query($conn,"SELECT designation_name from all_designation where id = $emp_desg_id");
            $employee_desg_obj=mysqli_fetch_object($employee_desg);
            $designation=$employee_desg_obj->designation_name;
            
            // echo "$emp_name,$designation"; 
            
        ?>
        <div class="emplyee_details"> 
            <span align="left">  কর্মকর্তার নাম : <span id="employee_name"><?php echo $emp_name?> </span> </span> <br>  
            
            <span align="left">  পদবী :  <span id="employee_id"> </span><?php echo $designation;?></span> 
            
        </div>
        <div class="issue_info ">
            <table align="center" border="0" cellpadding="0" cellspacing="0" style="" >
                <tbody>
                <div>
                </div>

                <div>
            <tr>
                <th colspan="3" scope="row" align="left" height="50" valign="top">
                <table class="tbl-list salary_report" width="860">
                <tbody style="margin-bottom:20px">   
                <tr class="center">
                    <th width="4%">#</th>
                    <th class="width_edit">বেতন ভাতার বিবরণ </th>
                    <th>মাসিক হার </th>
                    <th>টাকার পরিমান</th>
                </tr>
                <?php  
                 $list_account_head=mysqli_query($conn,"SELECT 
                 a.account_head_id as all_id,
                --  a.account_head_id as all_b_id,
                 a.account_head_name as all_account_head,
                 a.account_head_type
                 from account_head as a WHERE a.account_head_group = 2 and a.account_head_st = 1 and a.account_head_type = 1");	//1 = Show Data
                 $serial = 0;
                 if($list_account_head==true)
                 {
              	    while($data=mysqli_fetch_array($list_account_head))
              	    { 
                        $serial++;
                        $all_id=$data['0'];
                        $account_head_name=$data['1'];
                        // $account_head_group=$data['2'];
                        $account_head_type=$data['2'];
                        // $account_head_time=$data['4'];
                        
                        {
                        $bn_digits=array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
                        $output_serial = str_replace(range(0, 9),$bn_digits, $serial); 
                            //Numerical Value Conversion
                        }
              	        echo "<tr>
                        <td width='4%'> $output_serial </td>
                        <td class='left'> $account_head_name </td>
                        <td>";
                        
                        $grades = mysqli_query($conn,"SELECT salary_head_id,grade_id,rate
                        from assign_salary_grade where grade_id = $emp_grade and rate_st = 1");
                        if ($grades == true) {
                            while ($grade_data = mysqli_fetch_array($grades)) {
                                $s_head_id = $grade_data["0"];
                                $grade_id = $grade_data["1"];
                                $rate = $grade_data["2"];

                                {
                                $bn_digits=array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
                                $rate = str_replace(range(0, 9),$bn_digits, $rate); 
                                    //Numerical Value Conversion
                                }

                                if ($all_id == $s_head_id) 
                                {
                                    echo "$rate %";
                                }
                                else {
                                    echo  "";
                                }
                            }
                        }

                        echo "</td>";
                        
                        echo "<td>";
                        
                        $salary_head_dt= mysqli_query($conn,"SELECT DISTINCT
                        sd.salary_head,
                        sd.amount
                        from salary_details as sd 
                        left join salary_summary as ss on (SELECT MAX(id) from salary_summary)=sd.summary_id
                        where ss.employee_id = $employee_id and sd.salary_head_type = 1
                        ");
                        if ($salary_head_dt == true) 
                        {
                           while ($rates = mysqli_fetch_array($salary_head_dt)) 
                           {
                                $salary_head = $rates["0"];
                                $amount = $rates["1"];
                                   {
                                    $bn=array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
                                    $amount = str_replace(range(0, 9),$bn, $amount); 
                                        //Numerical Value Conversion
                                    }
                                if ($all_id == $salary_head) 
                                {
                                    echo "$amount টাকা";
                                }
                                else {
                                    echo  "";
                                }
                           }
                        }
                        echo "</td>";
                        echo "</tr>"; 
                        }}
                        $total_add_query = mysqli_query($conn,"SELECT salary_paid from salary_summary where employee_id = $employee_id order by id desc limit 1");
                        $total_obj = mysqli_fetch_object($total_add_query);
                        $total_paid = $total_obj->salary_paid; 
                        {
                            $en_num = array(0,1,2,3,4,5,6,7,8,9);
                            $total_paid = str_replace($en_num, array('০','১','২','৩','৪','৫','৬','৭','৮','৯'), $total_paid);
                            //date conversion in bangla 
                        }
                        ?>
                                <tr>
                                <td></td>
                                <td colspan="2" class='right'><b>মোট বেতন ভাতা</b></td>
                                <td class=''><b><?php echo $total_paid." টাকা";?></b></td>
                            </tr>  
                            </tbody>
                            
                        </table>
                    </th>
                </tr>
 
                <tr>
                    <th colspan="3" scope="row" align="left" height="50" valign="top">
                        <table class="tbl-list salary_report" width="860">
                            <tbody style="">
                                   <!-- <span style="margin: 0px">আদায়:</span> -->
                              <tr class="center">
                    <th width="4%">#</th>
                    <th class="width_edit">বেতন ভাতার বিবরণ (আদায়:)</th>
                    <th>মাসিক হার </th>
                    <th>টাকার পরিমান</th>
                </tr>
                <?php  
                 $list_account_head=mysqli_query($conn,"SELECT 
                 a.account_head_id as all_id,
                --  a.account_head_id as all_b_id,
                 a.account_head_name as all_account_head,
                 a.account_head_type
                 from account_head as a WHERE a.account_head_group = 2 and a.account_head_st = 1 and a.account_head_type = 2");	//1 = Show Data
                 $serial = 0;
                 if($list_account_head==true)
                 {
              	    while($data=mysqli_fetch_array($list_account_head))
              		  { 
                        $serial++;
                        $all_id=$data['0'];
                        $account_head_name=$data['1'];
                        // $account_head_group=$data['2'];
                        $account_head_type=$data['2'];
                        // $account_head_time=$data['4'];
                        {
                            $bn_digits=array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
                            $output_serial = str_replace(range(0, 9),$bn_digits, $serial); 
                        }

              	        echo "<tr>
                        <td width='4%'> $output_serial </td>
                        <td class='left'> $account_head_name </td><td>";
                        
                        $grades = mysqli_query($conn,"SELECT salary_head_id,grade_id,rate
                        from assign_salary_grade where grade_id = $emp_grade and rate_st = 1");
                        if ($grades == true) {
                            while ($grade_data = mysqli_fetch_array($grades)) {
                                $s_head_id = $grade_data["0"];
                                $grade_id = $grade_data["1"];
                                $rate = $grade_data["2"];

                                {
                                $bn_digits=array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
                                $rate = str_replace(range(0, 9),$bn_digits, $rate); 
                                    //Numerical Value Conversion
                                }

                                if ($all_id == $s_head_id) 
                                {
                                    echo "$rate %";
                                }
                                else {
                                    echo  "";
                                }
                            }
                        }
                        echo "</td>";
                        echo "<td>";
                        $salary_head_min= mysqli_query($conn,"SELECT DISTINCT
                        sd.salary_head,
                        sd.amount
                        from salary_details as sd 
                        left join salary_summary as ss on (SELECT MAX(id) from salary_summary)=sd.summary_id
                        where ss.employee_id = $employee_id and sd.salary_head_type = 2");

                        if ($salary_head_min == true) 
                        {
                           while ($rates_min = mysqli_fetch_array($salary_head_min)) 
                           {
                                
                                $salary_head_m = $rates_min["0"];
                                $amount_min = $rates_min["1"];
                                    {
                                    $bn_min=array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
                                    $amount_min = str_replace(range(0, 9),$bn_min, $amount_min); 
                                        //Numerical Value Conversion
                                    }
                                    if ($all_id == $salary_head_m) 
                                    {
                                        echo "$amount_min টাকা";
                                    }
                                    else 
                                    {
                                        echo  "";
                                    }
                           }
                        }
                        echo "</td>";
                        echo "</tr>"; 
                        }}
                        $total_min_query = mysqli_query($conn,"SELECT salary_credit from salary_summary where employee_id = $employee_id order by id desc limit 1");
                        $total_min_obj = mysqli_fetch_object($total_min_query);
                        $total_credit = $total_min_obj->salary_credit; 
                        {
                            $en_num = array(0,1,2,3,4,5,6,7,8,9);
                            $total_credit = str_replace($en_num, array('০','১','২','৩','৪','৫','৬','৭','৮','৯'), $total_credit);
                            //date conversion in bangla 
                        }           
                        ?>
                                <tr>
                                    <td></td>
                                <td colspan="2" class='right'><b>মোট আদায়</b></td>
                                <td  class=''><b><?php echo $total_credit." টাকা";?> </b></td>
                             </tr>  
                            </tbody>
                        </table>

              
                    </th>
                </tr>
                
                </tbody>
            </table>
           
            
        </div>

    </div>

     <div class="footer_details">
     <?php
      $total_salary = mysqli_query($conn,"SELECT salary_total from salary_summary where employee_id = $employee_id order by id desc limit 1 ");
        $total_salary_obj = mysqli_fetch_object($total_salary);
        $total_amount = $total_salary_obj->salary_total; 
        $float = floatval($total_amount);
        {
            $en_num = array(0,1,2,3,4,5,6,7,8,9);
            $total_amount_bd = str_replace($en_num, array('০','১','২','৩','৪','৫','৬','৭','৮','৯'), $total_amount);
            //date conversion in bangla 
        }
    
    class BanglaNumberToWord{
    var $eng_to_bn = array('1'=>'১', '2'=>'২', '3'=>'৩', '4'=>'৪', '5'=>'৫','6'=>'৬', '7'=>'৭', '8'=>'৮', '9'=>'৯', '0'=>'০');
    var $num_to_bd = array('1'=>'এক','2'=>'দুই','3'=>'তিন','4'=>'চার','5'=>'পাঁচ','6'=>'ছয়','7'=>'সাত','8'=>'আট', '9'=>'নয়','10'=>'দশ','11'=>'এগার','12'=>'বার','13'=>'তের','14'=>'চৌদ্দ','15'=>'পনের','16'=>'ষোল','17'=>'সতের','18'=>'আঠার','19'=>'ঊনিশ','20'=>'বিশ','21'=>'একুশ','22'=>'বাইশ','23'=>'তেইশ','24'=>'চব্বিশ','25'=>'পঁচিশ','26'=>'ছাব্বিশ','27'=>'সাতাশ','28'=>'আঠাশ','29'=>'ঊনত্রিশ','30'=>'ত্রিশ','31'=>'একত্রিশ','32'=>'বত্রিশ','33'=>'তেত্রিশ','34'=>'চৌত্রিশ','35'=>'পঁয়ত্রিশ','36'=>'ছত্রিশ','37'=>'সাঁইত্রিশ','38'=>'আটত্রিশ','39'=>'ঊনচল্লিশ','40'=>'চল্লিশ','41'=>'একচল্লিশ','42'=>'বিয়াল্লিশ','43'=>'তেতাল্লিশ','44'=>'চুয়াল্লিশ','45'=>'পঁয়তাল্লিশ','46'=>'ছেচল্লিশ','47'=>'সাতচল্লিশ','48'=>'আটচল্লিশ','49'=>'ঊনপঞ্চাশ','50'=>'পঞ্চাশ','51'=>'একান্ন','52'=>'বায়ান্ন','53'=>'তিপ্পান্ন','54'=>'চুয়ান্ন','55'=>'পঞ্চান্ন','56'=>'ছাপ্পান্ন','57'=>'সাতান্ন','58'=>'আটান্ন','59'=>'ঊনষাট','60'=>'ষাট','61'=>'একষট্টি','62'=>'বাষট্টি','63'=>'তেষট্টি','64'=>'চৌষট্টি','65'=>'পঁয়ষট্টি','66'=>'ছেষট্টি','67'=>'সাতষট্টি','68'=>'আটষট্টি','69'=>'ঊনসত্তর','70'=>'সত্তর','71'=>'একাত্তর','72'=>'বাহাত্তর','73'=>'তিয়াত্তর','74'=>'চুয়াত্তর','75'=>'পঁচাত্তর','76'=>'ছিয়াত্তর','77'=>'সাতাত্তর','78'=>'আটাত্তর','79'=>'ঊনআশি','80'=>'আশি','81'=>'একাশি','82'=>'বিরাশি','83'=>'তিরাশি','84'=>'চুরাশি','85'=>'পঁচাশি','86'=>'ছিয়াশি','87'=>'সাতাশি','88'=>'আটাশি','89'=>'ঊননব্বই','90'=>'নব্বই','91'=>'একানব্বই','92'=>'বিরানব্বই','93'=>'তিরানব্বই','94'=>'চুরানব্বই','95'=>'পঁচানব্বই','96'=>'ছিয়ানব্বই','97'=>'সাতানব্বই','98'=>'আটানব্বই','99'=>'নিরানব্বই');
    var $num_to_bn_decimal = array('0'=>'শূন্য ','1'=>'এক ','2'=>'দুই ','3'=>'তিন ','4'=>'চার ','5'=>'পাঁচ ','6'=>'ছয় ','7'=>'সাত ','8'=>'আট ', '9'=>'নয় ');
    var $hundred = 'শত';
    var $thousand = 'হাজার';
    var $lakh = 'লক্ষ';
    var $crore = 'কোটি';
    public function engToBn($number){
        $bn_number = strtr($number,$this->eng_to_bn);
        return $bn_number;
    }
    public function numToWord($number){
        if (!is_numeric($number)) return 'Not a Number';
        if(is_float($number)){
            $dot = explode(".", $number);
            return $this->numberSelector($dot[0]).' দশমিক '.$this->numToBnDecimal($dot[1]);
        }else{
            return $this->numberSelector($number);
        }
    }
    public function numToBn($number){
        $word = strtr($number,$this->num_to_bd);
        return $word;
    }
    public function numToBnDecimal($number){
        $word = strtr($number,$this->num_to_bn_decimal);
        return $word;
    }
    public function numberSelector($number){
        if($number > 9999999){
            return $this->crore($number);
        }elseif($number > 99999){
            return $this->lakh($number);
        }elseif($number > 999){
            return $this->thousand($number);
        }elseif($number > 99){
            return $this->hundred($number);
        }else{
            return $this->underHundred($number);
        }
    }
    public function underHundred($number){
        $number = ($number == 0)?'': $this->numToBn($number);
        return $number;
    }
    public function hundred($number){
        $a = (int)($number/100);
        $b = $number%100;
        $hundred = ($a == 0)?'': $this->numToBn($a).' '.$this->hundred;
        return $hundred.' '.$this->underHundred($b);
    }
    public function thousand($number){
        $a = (int)($number/1000);
        $b = $number%1000;
        $thousand = ($a == 0)?'': $this->numToBn($a).' '.$this->thousand;
        return $thousand.' '.$this->hundred($b);
    }
    public function lakh($number){
        $a = (int)($number/100000);
        $b = $number%100000;
        $lakh = ($a == 0)?'': $this->numToBn($a).' '.$this->lakh;
        return $lakh.' '.$this->thousand($b);
    }
    public function crore($number){
        $a = (int)($number/10000000);
        $b = $number%10000000;
        $more_than_core = ($a>99)?$this->lakh($a):$this->numToBn($a);
        return $more_than_core.' '.$this->crore.' '.$this->lakh($b);
    }
}
  
?>
      <span> কথায় : 
       <span style="font-size: 12px; font-weight: 700;"> 
      <?php 
    
      error_reporting(0);
      $obj = new BanglaNumberToWord(); 
      echo $obj->numToWord($float);
      echo "টাকা মাত্র";
      ?>
      </span> 
      </span> <br> <br>
      
      <span style="position: absolute;font-size: 12px;margin:0em 0px 0px 6em">
      <?php 
       {    $date = date('d-m-y');
            $en_num = array(0,1,2,3,4,5,6,7,8,9);
            $bn_date = str_replace($en_num, array('০','১','২','৩','৪','৫','৬','৭','৮','৯'), $date);
            //date conversion in bangla 
        }
      echo $bn_date;?>
      
      </span><br>
      <span>তারিখ :  .....................................</span>
      <span align="right" class="sign">সাক্ষর</span>
      <span align="right" class="sign">সাক্ষর </span>
      <br> <br>
      
      <span style="position: absolute;font-size: 12px;margin:0em 0px 0px 9em"><?php 
      echo $total_amount_bd;?> টাকা</span><br>
      <span>প্রদান করা হউক :  .......................................(মাত্র..............................................................................)    
      </span>
      
     </div>
     <div class="footer_down">
         <span>সহ : হিসাবরক্ষণ কর্মকর্তা</span>
         <span>পরিচালক (অ :  দা :) </span>
    </div>

</div>
</div>


</body>
</html>