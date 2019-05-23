<?php
include 'header.php';
include 'sidebar.php';
?>
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

                   <!-- <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">বিসিএসআইআর</a>
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

	<div class="widget red">
     <div class="widget-title">
       <?php if(isset($_GET['salary'])) { 
         if ($_GET['salary'] == "add_salary"){
           echo "<h4><i class='icon-tags'></i> বেতন নির্ধারণ </h4>";
         }
         elseif($_GET['salary'] == "salary_list")
         {
            echo "<h4><i class='icon-tags'></i> নির্ধারিত বেতন তালিকা </h4>";
         }
         elseif($_GET['salary'] == "salary_list_all")
         {
            echo "<h4><i class='icon-tags'></i> সকল বেতন রিপোর্ট </h4>";
         }
         elseif($_GET['salary'] == "salary_head_details")
         {
            echo "<h4><i class='icon-tags'></i> সকল বেতন খাত </h4>";
         }
        }
        ?>
     	</div>
     <div class="widget-body">
      <div class="row-fluid">
     <div class="span12">
           <?php
		    if (isset($_GET['success'])) {
				 // echo" <div class='widget orange'><div class='widget-body'>";
		    if ($_GET['success'] == 'success') { // ?>
		           <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
		            <h4 class="alert-heading">সফলভাবে সম্পন্ন</h4>
		           </div>
		        <?php 
        } 
         if ($_GET['success'] == 'error') { // ?>
		           <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
		            <h4 class="alert-heading">ত্রুটি ঘটেছে !</h4>
		           </div>
		        <?php 
        } 
    	
        if ($_GET['success'] == ' update') { // ?>
               <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                <h4 class="alert-heading">সফলভাবে সংশোধন সম্পন্ন!</h4>
               </div>
            <?php 
        }
        if ($_GET['success'] == 'deleted') { // ?>
               <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                <h4 class="alert-heading">সফলভাবে মুছে ফেলা হয়েছে !</h4>
               </div>
            <?php 
        } 
         if ($_GET['success'] == 'data_exists') { // ?>
               <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                <h4 class="alert-heading">নাম বা সিরিয়াল ইতিমধ্যে বিদ্যমান !</h4>
               </div>
            <?php 
        }
        if ($_GET['success'] == 'update_success') { // ?>
               <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                <h4 class="alert-heading">সফলভাবে সংশোধন সম্পন্ন !</h4>
               </div>
            <?php 
        }
        if ($_GET['success'] == 'update_error') { // ?>
               <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                <h4 class="alert-heading">সংশোধন ত্রুটি ঘটেছে !</h4>
               </div>
            <?php 
        }
				 } ?>

		<?php
		if (isset($_GET['salary'])) {    //if add account head found
			$salary = $_GET['salary'];     //if clicked on add account head 
			if ($salary == "add_salary"){ ?>
			<form action="Action/add_salary.php" method="POST" class="form-vertical" enctype=multipart/form-data>
            <input type="hidden" value="<?php echo $usernamee?>" name="username">
            <input type="hidden" name="" id="add_salary_head_id">
            <input type="hidden" name="" id="min_salary_head_id">
            <input type="hidden" id="store_val">
            <input type="hidden" id="store_val_min">
            <style>
            .chzn-container-single .chzn-single{
                margin-top: 0px !important;
            }
            </style>
            <div class="row-fluid">
            <div class="span2">
                <div class="control-group">
                <label class="control-label">কর্মচারীর আইডি </label>
                    <div class="controls">
                        <select class="span12 chzn-select" data-placeholder="আইডি" name="employee_id" id="employee_id" onchange="get_employee_details()" required>
                        <option value=""></option>
                        <?php 
                        $employee = mysqli_query($conn,"SELECT id,employee_id FROM employee_details WHERE employee_st = 1");
                        if ($employee == true) {
                        while ($employee_details = mysqli_fetch_array($employee))
                        {
                        $id = $employee_details["0"];
                        $employee_id = $employee_details["1"];
                        ?>
                        <option value="<?php echo $id?>"><?php echo $employee_id?></option>
                        <?php } } ?> 
                        </select>
                    </div>
                </div>
            </div>
            <div class="span2">
                <div class="control-group">
                <label class="control-label">কর্মচারীর নাম</label>
                    <div class="controls">
                        <input class="span12" data-placeholder="" value="" name="employee_name" id="employee_name" readonly>
                    </div>
                </div>
            </div>
            <div class="span2">
                <div class="control-group">
                <label class="control-label">কর্মচারীর শাখা</label>
                    <div class="controls">
                        <input class="span12" data-placeholder="" value="" name="employee_department" id="employee_department" readonly>
                    </div>
                </div>
            </div>
            <div class="span2">
                <div class="control-group">
                <label class="control-label">কর্মচারীর পদবী</label>
                    <div class="controls">
                        <input class="span12" data-placeholder="" value="" name="employee_designation" id="employee_designation" readonly>
                    </div>
                </div>
            </div>
            <div class="span2">
                <div class="control-group">
                <label class="control-label">কর্মচারীর শ্রেণী</label>
                    <div class="controls">
                        <input class="span12" data-placeholder="" value="" name="employee_grade" id="employee_grade" onchange="reset_tr()" readonly>
                    </div>
                </div>
            </div>
            <div class="span1">
                <div class="control-group">
                <label class="control-label">Salary</label>
                    <div class="controls">
                        <input class="span12" data-placeholder="" name="employee_grade" id="basic_salary" onchange="" type="text">
                    </div>
                </div>
            </div>
            </div>
            <h4>বেতন ভাতার বিবরণ(যোগ)</h4>
            <table class="table table-striped table-bordered" id="add_table">
             <thead>
                <tr>
                <!-- <th></th> -->
                <!-- <th>Account id</th> -->
                <th> বিবরণ </th>
                <th> মাসিক হার</th>
                <th> টাকার পরিমান </th>
                <th> আরো যোগ করুন </th>
                <th> বাতিল </th>
                </tr>
               </thead>
               <tbody id="add_td">
               <tr class="default_tr_add">
               <td>
               <div class="control-group">
                        <!-- <label class="control-label">বিবরণ</label> -->
                        <span class="alert alert_exist0"
                        style="position: absolute;
                        display:none;
                        margin-top: -35px;
                        margin-left: 21px;
                        padding: 7px;
                        font-size: 12px;
                        font-weight: 600;
                        background-color: #ff0c0066;
                        color: #fff;"
                        >Option Already Exists!</span>
                            <div class="controls">
                                <select class="span12 salary_h_add" data-placeholder="" name="salary_head_add[]" id="salary_h_add0" onchange="selected_id(0)"> 
                                <option>Select</option>
                                <?php 
                                $salary_head = mysqli_query($conn,"SELECT account_head_id,account_head_name,account_head_type FROM account_head WHERE account_head_st = 1 AND account_head_group = 2 AND account_head_type = 1 and account_head_id");
                                if ($salary_head == true) {
                                while ($salary_head_dt = mysqli_fetch_array($salary_head))
                                {
                                    $account_head_id = $salary_head_dt["0"];
                                    $account_head_name = $salary_head_dt["1"];
                                    $account_head_type = $salary_head_dt["2"];
                                    echo "<option value='$account_head_id'>$account_head_name</option>";
                                }
                                }
                                ?>             
                                </select>
                                
                            </div>
                    </div>
                    </td>
               <td>
                  <div class="control-group">
                        <!-- <label class="control-label">মাসিক হার</label> -->
                            <div class="controls">
                                <input type="text" class="monthly_rate_add span12 tooltips" data-trigger="hover" data-original-title="" name="monthly_rate_add[]" id="rate_monthly_add" required onkeyup="rate_add()">
                            </div>       
                 </div>
               </td>
               <td>
                <div class="control-group">
                        <!-- <label class="control-label">টাকার পরিমান</label> --><div class="controls">
                                <input type="text" class="span12 amount_add  tooltips" data-trigger="hover" data-original-title="" value="0" name="salary_amount_add[]" id="amount_add" onkeyup="total_add()">
                            </div>
                    </div>
               </td>
               <td>  
               <div class="control-group">
                <!-- <label class="control-label">আরো যোগ করুন</label> -->
                    <div class="controls">
                    <div id="" class="btn btn-primary" onclick="add_salary();" style="width:75%">যোগ</btn>
                </div>
                </div>
                </div>

                </td>
               <td>

               
                 <div class="control-group">
                <!-- <label class="control-label">আরো যোগ করুন</label> -->
                    <div class="controls">
                    <div id="" class="btn btn-danger" onclick="add_tr_remove();" style="width:75%">Remove</btn>
                </div>
                </div>
                </div>  
               </td>
               </tr>
               </tbody>
               </table>
               
               <div class="row-fluid">
                <div class="span3">
                    <div class="control-group">
                        <label class="control-label">টাকার পরিমান (মোট যোগ)</label>
                            <div class="controls" style="position: relative; overflow:hidden">
                                <input type="text" class="span12  tooltips" data-trigger="hover" data-original-title=""  name="total_amount_add" onkeyup="gross_salary();" id="total_amount_add" required>
                                <span class="btn btn-primary btn_add" onclick="total_add()" style="position: absolute;bottom: 0;right: 0;top: 0;height: 22px;"> যোগ করুন  </span>
                            </div>
                    </div>
                </div>
                </div>

                
          
               <hr>
                <h4>বেতন ভাতার বিবরণ(আদায়)</h4>
                <!-- <div id="add_salary"></div> -->
            <table class="table table-striped table-bordered" id="min_table">
             <thead>
                <tr>
                <!-- <th></th> -->
                <!-- <th>Account id</th> -->
                <th> বিবরণ </th>
                <th> মাসিক হার</th>
                <th> টাকার পরিমান </th>
                <th> আরো যোগ করুন </th>
                <th> বাতিল </th>
                </tr>
            </thead>
            <tbody id="min_td">
               <tr class="default_tr_min">
               <td>
                    <div class="control-group">
                        <!-- <label class="control-label">বিবরণ</label> -->
                         <span class="alert min_alert_exist0"
                        style="position: absolute;
                        display:none;
                        margin-top: -35px;
                        margin-left: 21px;
                        padding: 7px;
                        font-size: 12px;
                        font-weight: 600;
                        background-color: #ff0c0066;
                        color: #fff;"
                        >Option Already Exists!</span>
                            <div class="controls">
                                <select class="span12 salary_h_min" data-placeholder="" name="salary_head_min[]" id="salary_h_min0" onchange="min_selected_id(0)"> 

                                <option value="">Select</option>
                                <?php $salary_head = mysqli_query($conn,"SELECT account_head_id,account_head_name,account_head_type FROM account_head WHERE account_head_st = 1 AND account_head_group = 2 AND account_head_type = 2");
                                if ($salary_head == true) {
                                while ($salary_head_dt = mysqli_fetch_array($salary_head))
                                {   
                                    $account_head_id = $salary_head_dt["0"];
                                    $account_head_name = $salary_head_dt["1"];
                                    $account_head_type = $salary_head_dt["2"];
                                    
                                    echo "<option value='$account_head_id'>$account_head_name</option>";
                                    
                                }
                                }
                                ?>             
                                </select>
                            </div>
                    </div>
               </td>
               <td>
                    <div class="control-group">
                        <!-- <label class="control-label">মাসিক হার</label> -->
                            <div class="controls">
                                <input type="text" class="monthly_rate_min span12 tooltips" data-trigger="hover" id="rate_monthly_min" data-original-title="" name="monthly_rate_min[]" required onkeyup="rate_min()">
                            </div>
                    </div>
               </td>
               <td>
                    <div class="control-group">
                        <!-- <label class="control-label">টাকার পরিমান</label> -->
                        <div class="controls" >
                            <input type="text" class="span12 amount_min tooltips" data-trigger="hover" data-original-title=""name="salary_amount_min[]" id="amount_min" onkeyup="total_min()" value="0" required>
                          
                        </div> 
                    </div>
               </td>
               <td>
                    <!-- <label class="control-label">আরো যোগ করুন</label> -->
                    <div class="controls">
                        <div id="" class="btn btn-primary" onclick="add_salary_min();" style="width:75%">যোগ</div>
                    </div>
               </td>
               <td>
         


                <div class="control-group">
                <!-- <label class="control-label">আরো যোগ করুন</label> -->
                    <div class="controls">
                    <div id="" class="btn btn-danger" onclick="min_tr_remove();" style="width:75%">Remove</btn>
                </div>
                </div>
                </div>
               </td>


               </tr>
            </tbody>
            </table>
     
            <div class="row-fluid">
            <div class="span3">
                <div class="control-group">
                    <label class="control-label">টাকার পরিমান (মোট আদায়)</label>
                        <div class="controls" style="position: relative; overflow:hidden">
                            <input type="text" class="span12 tooltips" data-trigger="hover" data-original-title="" onchange="gross_salary();"  name="total_amount_min" id="total_amount_min" required>
                            <span class="btn btn-primary btn_add" onclick="total_min()" style="position: absolute;bottom: 0;right: 0;top: 0;height: 22px;"> বিয়োগ করুন  </span>
                        </div>
                </div>
            </div>
            </div>


            <div class="row-fluid">
            <div class="span3">
                <div class="control-group">
                    <label class="control-label">টাকার পরিমান (মোট) </label>
                        <div class="controls" style="position: relative; overflow:hidden">
                        <input type="text" class="span12 tooltips" data-trigger="hover" data-original-title="" name="total_salary" id="gross_salary" required>          
                          <span class="btn btn-primary btn_add" onclick="gross_salary()" style="position: absolute;bottom: 0;right: 0;top: 0;height: 22px;"> TOTAL GROSS SALARY </span>
                        </div>
                </div>
            </div>
            </div>
         
                
				<div class="control-group">
					<div class="controls">
						<button type="submit" class="assign_salary btn btn-danger" name="assign_salary">বেতন নির্ধারণ</button>
					</div>
				</div>
			
            </form>
   
 <!--------------------------- UPDATE SALARY START -------------------------->
			<?php }

			elseif ($salary == "salary_list") { ?> <!--  if clicked on account head List  -->
             <table class="table table-striped table-bordered" id="sample_1">
             <thead>
                <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1.checkboxes" /></th>
                <!-- <th>Account id</th> -->
                <th> সিরিয়াল</th>
                <th> নাম </th>
                <th> যোগ </th>
                <th> আদায়  </th>
                <th> মোট বেতন  </th>
                <th> মাস  </th>
                <th> বছর  </th>
                <th> সংশোধন / সংযোজন </th>
               </thead>
               <tbody>
               <?php  
                  $list_salary =mysqli_query($conn,"SELECT employee_id, salary_paid, salary_credit,salary_total FROM salary_summary WHERE id IN (SELECT MAX(id) FROM salary_summary where salary_st = 1 GROUP BY employee_id) order by employee_id");
                  //1 = Show Data
                  if($list_salary==true)
                  {    $salary = 0;
                       while($data_salary=mysqli_fetch_array($list_salary))
                         { 
                         $salary++;
                         $employee_id=$data_salary['0'];
                         $salary_add=$data_salary['1'];
                         $salary_credit=$data_salary['2'];
                         $salary_total=$data_salary['3'];
                         $month=$data_salary['4'];
                         $year=$data_salary['5'];
                         $salary_head=$data_salary['6'];
                         $salary_head_type=$data_salary['7'];
                         $amount=$data_salary['8'];
                         $month_name = date("F", strtotime(date("Y")."-".$month."-01"));
                         
                            //$currentDate = date("l, F j, Y");
                            $eng = array(1,2,3,4,5,6,7,8,9,0,January,February,March,April,May,June,July,August,September,October,November,December,Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday,Friday);
                            $bng = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
                            বুধবার','বৃহস্পতিবার','শুক্রবার' 
                            );
                            $bd_month = str_replace($eng, $bng, $month_name);
                            $bd_year = str_replace($eng, $bng, $year);
                            $bn_salary_add = str_replace($eng, $bng, $salary_add);
                            $bn_salary_credit = str_replace($eng, $bng, $salary_credit);
                            $bn_salary_amount = str_replace($eng, $bng, $amount);
                            $bn_salary_total = str_replace($eng, $bng, $salary_total);
                            $bn_serial = str_replace($eng, $bng, $salary);

                            
                        $employee_name = mysqli_query($conn,"SELECT employee_name from employee_details where id=$employee_id");
                        $emp_obj = mysqli_fetch_object($employee_name);  
                        $emp_name = $emp_obj->employee_name;

                         
                        echo "<tr>
                        <td><input type='checkbox' class='checkboxes' value='1' /></td>
                        <td> $bn_serial </td>
                        <td> $emp_name</td>
                        <td> $bn_salary_add </td>
                        <td> $bn_salary_credit </td>
                        <td> $bn_salary_total </td>
                        <td> $bd_month </td>
                        <td> $bd_year </td>
                        <!-- <td> $salary_head </td>
                        <td> $salary_head_type </td>
                        <td> $bn_salary_amount </td> -->
                        <td><a style='' href='update_salary.php?salary=update_salary&employee_id=$employee_id'><span class='btn btn-success btn_success_custom'>সংশোধন </span></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='Action/add_salary.php?employee_id=$employee_id&delete_salary=delete_salary'>
                        <span class='btn btn-danger'>মুছে ফেলুন</span>
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='salary_report_single.php?employee_id=$employee_id'>
                        <span class='btn btn-danger'>রিপোর্ট </span>
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>";
                        echo "</tr>"; 
                        
                        }
                        
                        }?>
                     </tbody>
            	</table>

			
				
        <?php }elseif ($salary == "salary_list_all") { ?> <!--  if clicked on account head List  -->
        <!-- <h3>সকল বেতন রিপোর্ট</h3> -->
             <form action="salary_report_all.php" class="form-vertical" method="post">
               <div class="row-fluid">
                         <div class="row-fluid">
                <div class="span3">
                    <div class="control-group">
                    <label class="control-label" style="text-align:left">বছর</label>
                    <div class="controls">
                        <select  data-placeholder="বছর" class="chzn-select" tabindex="-1" id="" name="year">
                        <option value="">বছর সিলেক্ট করুন</option>
                        <?php 
                        $current_year = date("Y");
                            for($year = 1990; $year <= 2099; $year++){
                                if ($current_year == $year) {
                                  $selected = "selected";
                                }
                                else
                                {
                                    $selected = "";
                                }
                                echo "<option value='$year' $selected>$year</option>";
                            }
                        ?>
                        </select>
                        
                    </div>
                </div>
               </div>
               <div class="span3">
                    <div class="control-group">
                    <label class="control-label" style="text-align:left">মাস</label>
                    <div class="controls">
                        <select data-placeholder="মাস" class="chzn-select" tabindex="1" id="" name="month">
                        <option value="">মাস সিলেক্ট করুন</option>
                        <?php 
                         $current_month = date("m");
                            for($month = 1; $month <= 12; $month++){
                                if ($current_month == $month) {
                                  $selected = "selected";
                                }
                                else{
                                    $selected = "";
                                }
                                $monthBd = array('মাস সিলেক্ট করুন','জানুয়ারী','ফেব্রুয়ারি','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর');
                                
                                echo "<option value='$month' $selected>$monthBd[$month]</option>";
                            }
                        ?>
                        </select>
                    </div>
                </div>
               </div>
                <!-- <div class="span3">
                    <div class="control-group">
                        <label class="control-label">মাস/বছর বাছাই করুন</label>
                    <div class="controls">
                        <input type="text" id="datepicker_salary" name="datepicker_salary" readonly="false" value="" >
                    </div>
                </div>
               </div> -->
                <!-- <div class="span3">
                    <div class="control-group">
                        <label class="control-label" align="center">সার্চ করুন</label>
                    <div class="controls">
                         
                        <span id="salary_search" class="btn btn-primary" readonly="false" value="" style="width:100%">সার্চ</span>
                    </div>
                </div>
                </div> -->
                <div class="span3">
                    <div class="control-group">
                        <label class="control-label" align="center">রিপোর্ট (পিডিএফ ) </label>
                    <div class="controls"> 
                        
                        <input type="submit" id="salary_search" class="btn btn-primary" name="salary_report_all" value="বেতন ভাতার রিপোর্ট" style="width:100%;border: none;height: 28px;"/>
                    </div>
                </div>
                </div>
               </div>
             
             </form>	
        <?php }elseif ($salary == "salary_head_details") { ?> <!--  if clicked on account head List  -->
        <!-- <h3>সকল বেতন খাত</h3> -->
             <form action="salary_head_report.php" class="form-vertical" method="post">
               <div class="row-fluid">
                <div class="span3">
                    <div class="control-group">
                    <label class="control-label">সকল বেতন খাত</label>
                    <div class="controls">
                        <select data-placeholder="সকল খাত" class="chzn-select span12" tabindex="-1" id="selCSI" name="salary_head_id">
                        <option value=""></option>
                            <?php
                            $all_salary_head = mysqli_query($conn,"SELECT account_head_name,account_head_id from account_head where account_head_group = 2 and account_head_st = 1 ");
                            if ($all_salary_head == true) {
                               while ($salarydt = mysqli_fetch_array($all_salary_head)) {
                                    $account_head_name = $salarydt["0"];
                                    $account_head_id = $salarydt["1"];

                                    echo "<option value=' $account_head_id'>$account_head_name</option>";
                               }
                            }
                            ?>
                        </select>
                    </div>
                </div>
               </div>
               <!-- <div class="span3">
                    <div class="control-group">
                    <label class="control-label">মাস/বছর বাছাই করুন</label>
                    <div class="controls">
                        <input type="text" id="datepicker_salary_head" name="datepicker_salary_head" readonly="false" value="" >
                    </div>
                </div>
               </div> -->
                  <div class="span3">
                    <div class="control-group">
                    <label class="control-label" style="text-align:left">বছর</label>
                    <div class="controls">
                        <select  data-placeholder="বছর" class="chzn-select" tabindex="-1" id="" name="year">
                        <option value="">বছর সিলেক্ট করুন</option>
                        <?php 
                        $current_year = date("Y");
                            for($year = 1990; $year <= 2099; $year++){
                                if ($current_year == $year) {
                                  $selected = "selected";
                                }
                                else
                                {
                                    $selected = "";
                                }
                                echo "<option value='$year' $selected>$year</option>";
                            }
                        ?>
                        </select>
                        
                    </div>
                </div>
               </div>
               <div class="span3">
                    <div class="control-group">
                    <label class="control-label" style="text-align:left">মাস</label>
                    <div class="controls">
                        <select data-placeholder="মাস" class="chzn-select" tabindex="1" id="" name="month">
                        <option value="">মাস সিলেক্ট করুন</option>
                        <?php 
                         $current_month = date("m");
                            for($month = 1; $month <= 12; $month++){
                                if ($current_month == $month) {
                                  $selected = "selected";
                                }
                                else{
                                    $selected = "";
                                }
                                $monthBd = array('মাস সিলেক্ট করুন','জানুয়ারী','ফেব্রুয়ারি','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর');
                                
                                echo "<option value='$month' $selected>$monthBd[$month]</option>";
                            }
                        ?>
                        </select>
                    </div>
                </div>
               </div>
                
                <div class="span3">
                    <div class="control-group">
                        <label class="control-label" align="center">রিপোর্ট (পিডিএফ) </label>
                    <div class="controls"> 
                        <input type="submit" id="salary_search" class="btn btn-primary" name="salary_head_all" value="খাত সমূহের রিপোর্ট" style="width:100%;border: none;height: 28px;"/>
                    </div>
                </div>
                </div>
               </div>
             
             </form>	
        <?php }
        
            elseif ($account_head == "update_account_head") 
            {
                if (isset($_GET['account_head_id'])) {
			  	 $account_head_id = $_GET['account_head_id'];
                 $edit_content=mysqli_query($conn,"SELECT * FROM account_head WHERE account_head_id='$account_head_id'");  
                 if($edit_content==true)
                 {
                  while($data=mysqli_fetch_array($edit_content))
                    {
                   // $account_head_id = $data['0'];
                    $account_head_serial = $data['1'];
                    $account_head_status = $data['2'];
                    //$account_head_status = $data['3'];
                    $account_head_Name = $data['4'];
                    $account_head_time = $data['5'];
                    ?>
                    <form action="Action/add_account_head.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
                        <input type="hidden" value="<?php echo $usernamee ?>" name="username">
                        <input type="hidden" value="<?php echo $account_head_id ?>" name="account_head_id">
                            <div class="control-group">
                                <label class="control-label">একাউন্ট খাতের নাম</label>
                                    <div class="controls">
                                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Type account head title" value="<?= $account_head_Name ?>"  name="account_head_title" required>
                                    </div>
                                </div>
                        <div class="control-group">
                            <label class="control-label">সিরিয়াল নম্বর</label>
                            <div class="controls">
                                <input type="number" class="form-control span6" id="" name="serial_number" value="<?= $account_head_serial ?>" placeholder="" required disabled>
                            </div>
                        </div>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="submit" name="update_account_head" value="Add">
                                </div>
                            </div>
                        
                    </form>


                    <?php } } ?> 

			 <?php }
			} ?>



	<?php	} ?>  <!-- Ending of ISSET add other content -->




		

		</div>
		</div>
		</div>
		</div>


</div>

<?php include 'footer.php';?>

<script>
    // $(window).on("load",function(){
    //     on_load();
    // });
</script>
<script>

// var updated_selected_id;
    // core_add = 1;
//   var add_before_id = '';
    // function selected_id()
    // {
    // // var add_selected_id = $("#salary_h_add"+core_add).val();
    // // var add_before_id = $('#add_salary_head_id').val();
    // // add_before_id += ','+add_selected_id;
    // // $('#add_salary_head_id').val(add_before_id);
    // // var values = [];    

    // // $('.salary_h_add').each(function(){
    // //     values.push($(this).val());
    // // });
    // add_before_id = $('#add_salary_head_id').val();
    // var arr = [], str;
    // $(".salary_h_add").each(function(){
    // arr.push(this.value);
    // });
    // str = arr.join(',');

    // add_before_id += ','+str;
    // $('#add_salary_head_id').val(add_before_id);
    // // // core_add++;
    // //  var unique = add_before_id.filter(function(itm, i, a) {
    // // return i == a.indexOf(itm);
    // // });
    // var result = $.unique(add_before_id);
    // console.log(result);

    // $('#add_salary_head_id').val(result);
    // }
// $('.alert_exist').hide();



function selected_id(id){
    $(".assign_salary").prop("disabled",false);
    $('.alert_exist'+id).hide();
    $('#add_salary_head_id').val("");
    var selected_id = $('#salary_h_add'+id).val();
    
    var str = $('#store_val').val()+",";
    $('.salary_h_add').parent().find("select option:selected").each(function () { str += $(this).val()+',';
    
    });
    var all = str.slice(0,-1);
    // var length = (selected_id.length)+1;
    var string = str.replace(selected_id, 0);
    var strx   = string.split(',');
    var array  = [];
    array = array.concat(strx);
    var is_exist=0;
    
    for (var i = 0; i < array.length; i++) 
    {
        if (array[i] == selected_id) 
        {   
            $('.alert_exist'+id).show();
            is_exist=1;
            $(".assign_salary").prop("disabled",true);
            return;
        }       
    }       
    if(is_exist==0)
    {
        $('#add_salary_head_id').val(all);
    }
    }

    function min_selected_id(id)
    {
        $(".assign_salary").prop("disabled",false);
        $('.min_alert_exist'+id).hide();
        $('#min_salary_head_id').val("");
        var selected_id = $('#salary_h_min'+id).val();
        
        var str = $('#store_val_min').val()+",";
        $('.salary_h_min').parent().find("select option:selected").each(function() 
        { 
            str += $(this).val()+',';
        });
        var all = str.slice(0,-1);
        var string = str.replace(selected_id, 0);
        var string = str.slice(0, -2);
        var strx   = string.split(',');
        var array  = [];
        array = array.concat(strx);
        var is_exist=0;
        for (var i = 0; i < array.length; i++) 
        {
            if (array[i] == selected_id) 
            {   
                $('.min_alert_exist'+id).show();
                console.log();
                is_exist=1;
                $(".assign_salary").prop("disabled",true);
                return;
            }       
        }       
        if(is_exist==0)
        {
            $('#min_salary_head_id').val(all);
        }
    }

 
</script>
<script>

</script>

<script>
function add_tr_remove(){
    $('#amount_add').val(0);
    $('.default_tr_add').remove();
    setInterval(total_add(),gross_salary(), 3000);  
}
function min_tr_remove(){ 
    $('#amount_min').val(0); 
    $('.default_tr_min').remove();
    setInterval(total_min(),gross_salary(), 3000);  
}

var core_salary_add=1;
function add_salary(){
    
    var add_head_id = $('#add_salary_head_id').val();
    var objTo = document.getElementById('add_td');
    var divtest = document.createElement("tr");
    divtest.setAttribute("class", "removeclass_add"+core_salary_add);
    var rdiv = 'removeclass_add'+core_salary_add;
    // $.ajax({
    //     url : 'add_head_id.php',
    //     type : 'POST',
    //     data : {add_head_id: add_head_id},
    //     success: function(result)
    //     {  
            // console.log(result);
                   divtest.innerHTML = '<td><div class="control-group"> <!-- <label class="control-label">বিবরণ</label> --> <span class="alert alert_exist'+core_salary_add+'"style="position: absolute;display:none;margin-top: -35px; margin-left: 21px;padding: 7px;font-size: 12px;font-weight: 600;background-color: #ff0c0066;color: #fff;">Option Already Exists!</span> <div class="controls"><select class="span12 salary_h_add" data-placeholder="" name="salary_head_add[]" id="salary_h_add'+core_salary_add+'" onchange="selected_id('+core_salary_add+')"> <option>Select</option><?php $salary_head = mysqli_query($conn,"SELECT account_head_id,account_head_name,account_head_type FROM account_head WHERE account_head_st = 1 AND account_head_group = 2 AND account_head_type = 1"); if ($salary_head == true) { while ($salary_head_dt = mysqli_fetch_array($salary_head)) { $account_head_id = $salary_head_dt["0"]; $account_head_name = $salary_head_dt["1"]; $account_head_type = $salary_head_dt["2"]; echo "<option value=$account_head_id>$account_head_name</option>"; } } ?></select> </div> </div> </td> <td> <div class="control-group"> <!-- <label class="control-label">মাসিক হার</label> --> <div class="controls"> <input type="text" class="monthly_rate_add span12 tooltips" data-trigger="hover" data-original-title="" name="monthly_rate_add[]" required onleyup="rate_ADD()"> </div> </div> </td> <td> <div class="control-group"> <!-- <label class="control-label">টাকার পরিমান</label> --> <div class="controls"> <input value="0" type="text" class="span12 amount_add tooltips" data-trigger="hover" data-original-title="" name="salary_amount_add[]" id="amount_add'+core_salary_add+'" onkeyup="total_add()"> </div> </div> </td> <td> <div class="control-group"> <!-- <label class="control-label">আরো যোগ করুন</label> --> <div class="controls"> <div id="" class="btn btn-primary" onclick="add_salary();" style="width:75%">যোগ</div> </div> </div> </td><td><div class="span12"><div class="control-group"> <div class="controls"> <span class="" type="" onclick="remove_salary_add('+ core_salary_add +');"><span class="btn btn-danger" style="width:75%"><i class="fa fa-minus-circle text-danger" aria-hidden="true"></i>&nbsp;Remove</span></span></div></div></div></td>';
                   objTo.appendChild(divtest);
//         }
//         })
       core_salary_add++;
}
   function remove_salary_add(rid) {

       $('.removeclass_add'+rid).remove();
       core_salary_add--; 



       
       setInterval(total_add(),gross_salary(), 3000);
       preventDefault();
       $(this).prev('input').remove();  
   } 
 
</script>


<script> 
 
      
var core_salary_min=1;

function add_salary_min(){

   // var exist_salary_min = document.getElementById('salary_head_min').value;
    //core_id_min++;
    var objTo = document.getElementById('min_td')
    var divtest = document.createElement("tr");
    divtest.setAttribute("class", "removeclass_min"+core_salary_min);

    var rdiv = 'removeclass_min'+core_salary_min;
        divtest.innerHTML = '<td> <div class="control-group"> <!-- <label class="control-label">বিবরণ</label> --><span class="alert min_alert_exist'+core_salary_min+'"style="position: absolute;display:none;margin-top: -35px; margin-left: 21px;padding: 7px;font-size: 12px;font-weight: 600;background-color: #ff0c0066;color: #fff;">Option Already Exists!</span>  <div class="controls"> <select class="span12 salary_h_min" data-placeholder="" name="salary_head_min[]" id="salary_h_min'+core_salary_min+'" onchange="min_selected_id('+core_salary_min+')"> <option value="">Select</option> <?php $salary_head = mysqli_query($conn,"SELECT account_head_id,account_head_name,account_head_type FROM account_head WHERE account_head_st = 1 AND account_head_group = 2 AND account_head_type = 2"); if ($salary_head == true) { while ($salary_head_dt = mysqli_fetch_array($salary_head)) { $account_head_id = $salary_head_dt["0"]; $account_head_name = $salary_head_dt["1"]; $account_head_type = $salary_head_dt["2"]; echo "<option value=$account_head_id>$account_head_name</option>"; } } ?> </select> </div> </div> </td> <td> <div class="control-group"> <!-- <label class="control-label">মাসিক হার</label> --> <div class="controls"> <input type="text" class="monthly_rate_min span12 tooltips" data-trigger="hover" data-original-title="" name="monthly_rate_min[]" required onkeyup="rate_min()"> </div> </div> </td> <td> <div class="control-group"> <!-- <label class="control-label">টাকার পরিমান</label> --> <div class="controls"> <input value="0" type="text" class="span12 amount_min tooltips" data-trigger="hover" data-original-title=""name="salary_amount_min[]" id="amount_min'+core_salary_min+'" onkeyup="total_min()" required> </div> </div> </td> <td> <!-- <label class="control-label">আরো যোগ করুন</label> --> <div class="controls"> <div id="" class="btn btn-primary" onclick="add_salary_min();" style="width:75%">যোগ</div> </div> </td> <td><div class="span12"><div class="control-group"> <div class="controls"> <span class="" type="" onclick="remove_salary_min('+ core_salary_min +');"><span class="btn btn-danger" style="width:75%"><i class="fa fa-minus-circle text-danger" aria-hidden="true" ></i>&nbsp;Remove</span></span></div></div></div></td>';
        
    objTo.appendChild(divtest);
    core_salary_min++;
   

}
   function remove_salary_min(rid) {
       $('.removeclass_min'+rid).remove();
       core_salary_min--;
       setInterval(total_min(),gross_salary(), 3000);  
       preventDefault();
       $(this).prev('input').remove();     
   }
  

</script>
 

<script> 
 function get_employee_details(){
    //$('#add_table').dataTable().fnClearTable();
   $('#add_table').dataTable().fnDraw();
    // $('#add_table').dataTable().fnDestroy();

    //  $('#min_table').dataTable().fnClearTable();
   $('#min_table').dataTable().fnDraw();

    var salaryRates = new Array();
    var employee_id= $("#employee_id").val();
    console.log(employee_id);
    $.ajax({
        url : 'get_employee_details.php',
        type : 'POST',
        dataType : 'json',
        data : {employee_id: employee_id},
        success: function(result)
        {   
            console.log(result);
            $('#employee_name').val(result[0]);
            $('#employee_department').val(result[1]);
            $('#employee_designation').val(result[2]);
            $('#employee_grade').val(result[3]);
            $('#join_date').val(result[4]);
            $('#basic_salary').val(result[7]);

            salaryRates = result[5];
            var salaryHead = result[6];
            var basicSalary = result[7];

            var dataLength = salaryRates.length;
            var des_value='';
            var des_value_min='';
            //console.log(salaryRates[1]);
            if (dataLength > 0) {
                for(var i = 0; i < dataLength; i++)
                {
                    salary_head_id   = salaryRates[i].salary_head_id;  
                    salary_head_type = salaryRates[i].salary_head_type;  
                    salary_head_rate = salaryRates[i].rate;
                    salary_head_name = salaryHead[i].account_head_name;  
                   // var class = "newclass"; 
                    // console.log(salary_head_id);
                    
                    // $('#add_salary_head_id').val(salary_head_id);
                    var amount = (basicSalary*salary_head_rate)/100;
                  
                    if (salary_head_type == 1) 
                        {
                        des_value+=salary_head_id+',';
                        
                        //$('#add_table tbody tr:first').children().remove();
                        $('#add_table').prepend('<tr><td><div class="control-group"> <div class="controls"><input type=text class="span12" value="'+salary_head_name+'" readonly></input><input name="salary_head_add[]" type="hidden" value="'+salary_head_id+'"></input></div> </div> </td> <td> <div class="control-group"> <div class="controls"> <input type="text" class="monthly_rate_min span12 tooltips" data-trigger="hover" data-original-title="" value="'+salary_head_rate+'" name="monthly_rate_add[]" required> </div> </div> </td> <td> <div class="control-group"><div class="controls"> <input type="text" value="'+amount+'" class="span12 amount_add tooltips" data-trigger="hover" data-original-title="" name="salary_amount_add[]" id="amount_add'+core_salary_add+'" onkeyup="total_add()" required> </div> </div> </td><div class="control-group"> <div class="controls"> <div id="" class="btn btn-primary" onclick="add_salary();" style="width:75%">যোগ</div> </div> </div> <td> </td> <td></td></tr>');
                        total_add();
                        gross_salary();
                        }
                        
                        else if(salary_head_type == 2)
                        {
                            des_value_min+=salary_head_id+',';
                          //$("#min_table").find("tr:not(:last)").remove();
                          //$('#min_table tbody tr:first').children().remove();
                          $('#min_table').prepend('<tr><td><div class="control-group"> <div class="controls"><input type=text class="span12" value="'+salary_head_name+'" readonly></input><input type="hidden" name="salary_head_min[]" value="'+salary_head_id+'"></input></div> </div> </td> <td> <div class="control-group"> <!-- <label class="control-label">মাসিক হার</label> --> <div class="controls"> <input type="text" class="monthly_rate_min span12 tooltips" data-trigger="hover" data-original-title="" name="monthly_rate_min[]" value="'+salary_head_rate+'" required> </div> </div> </td> <td> <div class="control-group"><div class="controls"> <input type="text" value="'+amount+'" class="span12 amount_min tooltips" data-trigger="hover" data-original-title=""name="salary_amount_min[]" id="amount_min'+core_salary_min+'" onkeyup="total_min()" required> </div> </div> </td> <td>  </td> <td><div class="span2"><div class="control-group"></div></div></td></tr>');
                            total_min();
                            gross_salary();
                        }
                        
                }  
                var value_add_id = (des_value.slice(0,-1));
                var value_min_id = (des_value_min.slice(0,-1));
                $('#add_salary_head_id').val(value_add_id);
                $('#store_val').val(value_add_id);
                $('#min_salary_head_id').val(value_min_id);
                $('#store_val_min').val(value_min_id);
            }

            // on_load();
        } 
    })
    }
</script>


<script>
function total_add(){
    var sum = 0;
    $('.amount_add').each(function()
    {
        sum += parseFloat(this.value);
    });
    $('#total_amount_add').val(sum);
    setInterval(gross_salary(), 3000);  
}
function rate_min() {
    var TSalary = parseFloat($('#basic_salary').val());
    var rate_min = parseFloat($('#rate_monthly_min').val());
    var amount_min = (TSalary*rate_min)/100;
 
}
function rate_add() { 
    var TSalary = parseFloat($('#basic_salary').val());
    var rate_add = parseFloat($('#rate_monthly_add').val());
    var amount_add = (TSalary*rate_add)/100;
    
}
function total_min(){
    var min = 0;
    $('.amount_min').each(function()
    {
        min += parseFloat(this.value);
    });
    $('#total_amount_min').val(min);
    setInterval(gross_salary(), 3000);

}

var grossSalary = 0;
var totalAdd = 0;
var totalMin = 0;
var bSalary = 0;
function gross_salary(){
    //bSalary = parseFloat($('#basic_salary').val());
    totalAdd = $('#total_amount_add').val();
    totalMin = $('#total_amount_min').val();

    grossSalary = (totalAdd-totalMin);
    $('#gross_salary').val(grossSalary);
}

</script>








