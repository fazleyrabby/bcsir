<?php
include 'header.php';
include 'sidebar.php';
?>
<div id="preloader_div">
    <h1>অপেক্ষা করুন</h1>
    <!-- <div id="preloader"></div> -->
    <img src="images/loader.gif" alt="">
</div>

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
                <?php if(isset($_GET['salary_generate'])) { 
         if ($_GET['salary_generate'] == "salary_generate"){
           echo "<h4><i class='icon-tags'></i> মাসিক বেতন বরাদ্দ </h4>";
         }
         elseif($_GET['salary_generate'] == "salary_generate_list")
         {
            echo "<h4><i class='icon-tags'></i> মাসিক বেতন বরাদ্দ তালিকা </h4>";
         }
         elseif($_GET['salary_generate'] == "salary_edit_monthly")
         {
            echo "<h4><i class='icon-tags'></i> মাসিক বেতন বরাদ্দ সংশোধন </h4>";
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
                        <div class="alert alert alert-block alert-danger fade in"><button data-di smiss="alert"
                                class="close" type="button">×</button>
                            <h4 class="alert-heading">সফলভাবে সম্পন্ন</h4>
                        </div>
                        <?php 
        } 
         if ($_GET['success'] == 'error') { // ?>
                        <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert"
                                class="close" type="button">×</button>
                            <h4 class="alert-heading">ত্রুটি ঘটেছে !</h4>
                        </div>
                        <?php 
        } 
        if ($_GET['success'] == 'exist') { // ?>
                        <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert"
                                class="close" type="button">×</button>
                            <h4 class="alert-heading">এই মাস / বছর এর তথ্য ইতিমধ্যে বিদ্যমান !!</h4>
                        </div>
                        <?php 
        } 
    	
        if ($_GET['success'] == ' update') { // ?>
                        <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert"
                                class="close" type="button">×</button>
                            <h4 class="alert-heading">সফলভাবে সংশোধন সম্পন্ন!</h4>
                        </div>
                        <?php 
        }
        if ($_GET['success'] == 'deleted') { // ?>
                        <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert"
                                class="close" type="button">×</button>
                            <h4 class="alert-heading">সফলভাবে মুছে ফেলা হয়েছে !</h4>
                        </div>
                        <?php 
        } 
         if ($_GET['success'] == 'data_exists') { // ?>
                        <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert"
                                class="close" type="button">×</button>
                            <h4 class="alert-heading">নাম বা সিরিয়াল ইতিমধ্যে বিদ্যমান !</h4>
                        </div>
                        <?php 
        }
        if ($_GET['success'] == 'update_success') { // ?>
                        <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert"
                                class="close" type="button">×</button>
                            <h4 class="alert-heading">সফলভাবে সংশোধন সম্পন্ন !</h4>
                        </div>
                        <?php 
        }
        if ($_GET['success'] == 'update_error') { // ?>
                        <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert"
                                class="close" type="button">×</button>
                            <h4 class="alert-heading">সংশোধন ত্রুটি ঘটেছে !</h4>
                        </div>
                        <?php 
        }
				 } ?>

                        <?php
        if (isset($_GET['salary_generate'])) 
        { ?>


                        <?php
            
			$salary_generate = $_GET['salary_generate'];     //if clicked on add account head 
            if ($salary_generate == "salary_generate") 
            { ?>
                        <!--  if clicked on account head List  -->
                        <!-- <h3>সকল বেতন খাত</h3> -->
                        <div class="span1"></div>
                        <form class="form-horizontal" action="Action/salary_generate.php" method="post"
                            onsubmit="return ShowLoader()">
                            <!-- <span onclick="ShowLoading()">click</span> -->
                            <div class="row-fluid">
                                <div class="span3">
                                    <div class="control-group">
                                        <label class="control-label" style="text-align:right">বছর</label>
                                        <div class="controls">
                                            <select data-placeholder="বছর" class="chzn-select" tabindex="-1" id=""
                                                name="year">
                                                <option value="">বছর সিলেক্ট করুন</option>
                                                <?php 
                        $current_year = date("Y");
                            for($year = 1990; $year <= 2099; $year++){
                                if ($current_year == $year) {
                                  $selected = "selected";
                                }
                                else{
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
                                        <label class="control-label" style="text-align:right">মাস</label>
                                        <div class="controls">
                                            <select data-placeholder="মাস" class="chzn-select" tabindex="1" id=""
                                                name="month">
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

                            </div>



                            <h4></h4>
                            <!-- <div id="add_salary"></div> -->

                            <table class="table table-striped table-bordered" id="salary_table">
                                <thead>
                                    <tr>
                                        <!-- <th></th> -->
                                        <!-- <th>Account id</th> -->
                                        <th> আইডি </th>
                                        <th> নাম </th>
                                        <th> পদবী </th>
                                        <th> শ্রেণী </th>
                                        <th> বেসিক বেতন </th>
                                        <th> পেইড </th>
                                        <th> মন্তব্য </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                 $list_employee=mysqli_query($conn,"SELECT employee_id,designation,employee_name,employee_grade,employee_department,basic_salary,employee_type from employee_details WHERE 
                 employee_st = 1 order by employee_id");	//1 = Show Data
                //   order by employee_id asc limit 5
                 if($list_employee==true)
                 {  $i=0;
              	    while($data=mysqli_fetch_array($list_employee))
              		  { 
                        $employee_id=$data['0'];
                        $designation=$data['1'];
                        $employee_name=$data['2'];
                        $employee_grade=$data['3'];
                        $employee_department=$data['4'];
                        $basic_salary=$data['5'];
                        $type=$data['6'];
                        
                        echo "<input type='text' style='display:none' name='employee_id[]' value=$employee_id>";
                        echo "<input type='text' style='display:none' name='employee_grade[]' value=$employee_grade>";
                        
              	        echo "<tr>
                        
                        <td> $employee_id </td>
                        <td> $employee_name </td>
                        <td>";
                        $list_designation=mysqli_query($conn,"SELECT designation_name from all_designation WHERE id = $designation");
                        if($list_designation==true)
                         {
                            while($data_dsg=mysqli_fetch_array($list_designation))
                            { 
                            $designation = $data_dsg['0'];
                            echo "$designation"; 
                            }
                         }
                        echo "</td>
                        <td>";
                        $list_employee_grade=mysqli_query($conn,"SELECT grade_name from all_employee_grade WHERE id = $employee_grade");
                        if($list_employee_grade==true)
                         {
                            while($data_grade=mysqli_fetch_array($list_employee_grade))
              		         { 
                                $grade = $data_grade['0'];
                                echo "$grade";
                             }
                         }
                        echo "</td><td>
                        <div class='basic_salary'>
                        <input type='text' name='basic_salary[]' value=$basic_salary readonly>
                        </div>
                        </td><td>";
                        
                        $salary_grade_rates = mysqli_query($conn,"SELECT salary_head_id,salary_head_type,rate FROM assign_salary_grade WHERE rate_st = 1 and grade_id = $employee_grade");
                        
                                $gross_salary_add=0;
                                $gross_salary_min=0;
                                $salary_grade_rate_row = mysqli_num_rows($salary_grade_rates);
                                if ($salary_grade_rate_row > 0) 
                                {
                                    while ($data = mysqli_fetch_array($salary_grade_rates)) 
                                    {
                                        $salary_head_id = $data["0"];
                                        $salary_head_type = $data["1"];
                                        $rate = $data["2"];
                                        
                                        
                                        
                                        // 1=add,2=sub
                                        $total_percent = $basic_salary*$rate;
                                        $total = $total_percent/100;
                                        if ($salary_head_type == 1) 
                                        {  
                                            // echo "<br>$salary_head_id-$total<br>";
                                            // var_dump($salary_head_id); 
                                            for ($add=0; $add < count($salary_head_id) ; $add++) 
                                            {
                                                // echo $i;
                                                $gross_salary_add += $total;
                                                echo "<input type='hidden' style='' value=$total>";
                                                // echo "<input type='hidden' style='' name='salary_head_type' value=$salary_head_type>";
                                                echo "<input type='hidden' style='' value=$salary_head_id>";
                                             
                                            }
                                        }
                                        if ($salary_head_type == 2) 
                                        {   
                                            // echo "<br>$salary_head_id-$total<br>";
                                            // var_dump($salary_head_id);
                                            for ($min=0; $min < count($salary_head_id) ; $min++) 
                                            { 
                                                
                                                $gross_salary_min += $total;
                                                echo "<input type='hidden' style=''  value=$total>";
                                                // echo "<input type='hidden' style='' name='salary_head_type' value=$salary_head_type>";
                                                echo "<input type='hidden' style='' value=$salary_head_id>";
                                            }
                                        }
                                           $t_salary=$gross_salary_add-$gross_salary_min; 
                                    }
                                    echo "
                                    <div class=''>
                                    <input class='paid_salary' name='paid_salary[]' type='text'  value=$t_salary onkeyup='salary_total()'>
                                    </div>
                                    ";     
                                } 
                                else 
                                {
                                    echo "<div class=''>
                                    <input class='paid_salary' name='paid_salary[]' type='text'  value=$basic_salary onkeyup='salary_total()'>
                                    </div>
                                    ";  
                                }
                           
                        echo "</td><td><div class=''>
                        <textarea></textarea>
                        </div>";
                        
                        echo "</td>";
                        echo "</tr>";
                        $i++; 
                        }
                        }?>
                                </tbody>

                            </table>

                            <div class="span5"></div>

                            <div class="span3">
                                <div class="control-group">
                                    <label class="control-label" for="" style="text-align:right">সর্বমোট </label>
                                    <div class="controls">
                                        <input type="text" id="total_amount" class="" name="total_amount" value=""
                                            style="" />
                                    </div>
                                </div>
                            </div>
                            <div class="span3">
                                <div class="control-group">

                                    <div class="controls">
                                        <input type="submit" id="" class="btn btn-primary" name="salary_generate"
                                            value="জেনারেট" style="width:100px;border: none;height: 28px;" />
                                    </div>
                                </div>
                            </div>


                        </form>

                        <?php }
        elseif($salary_generate == "salary_generate_list"){?>

                        <div class="row-fluid">
                            <div class="span1"></div>
                            <div class="span3">
                                <div class="control-group">
                                    <label class="control-label" style="text-align:left">বছর</label>
                                    <div class="controls">
                                        <select data-placeholder="বছর" class="chzn-select" tabindex="-1" id="year"
                                            name="year">
                                            <option value="">বছর সিলেক্ট করুন</option>
                                            <?php 
                        $current_year = date("Y");
                            for($year = 1990; $year <= 2099; $year++){
                                if ($current_year == $year) {
                                  $selected = "selected";
                                }
                                else{
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
                                        <select data-placeholder="মাস" class="chzn-select" tabindex="1" id="month"
                                            name="month">
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
                                    <label class="control-label"
                                        style="text-align:left;color:transparent">search</label>
                                    <div class="controls">
                                        <button style="width:100%" class="search_salary_data btn btn-primary"
                                            onclick="salary_generate_monthly()">সার্চ করুন</button>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered salary_table" id="sample_1">
                                <thead>
                                    <tr>
                                        <!-- <th></th> -->
                                        <!-- <th>Account id</th> -->
                                        <th> আইডি </th>
                                        <th> নাম </th>
                                        <th> পদবী </th>
                                        <th> শ্রেণী </th>
                                        <th> বেসিক বেতন </th>
                                        <th> পেইড </th>
                                        <th> মন্তব্য </th>
                                    </tr>
                                </thead>
                                <tbody id="salaryGen">

                                </tbody>

                            </table>


                        </div>
                        <?php }elseif ($salary_generate == 'salary_edit_monthly') { ?>
                        <div class="span1"></div>
                        <form class="form-horizontal" action="Action/salary_generate.php" method="post"
                            onsubmit="return ShowLoader()">
                            <!-- <span onclick="ShowLoading()">click</span> -->
                            <div class="row-fluid">
                                <div class="span3">
                                    <div class="control-group">
                                        <label class="control-label" style="text-align:right">বছর</label>
                                        <div class="controls">
                                            <select data-placeholder="বছর" class="chzn-select" tabindex="-1" id=""
                                                name="year">
                                                <!-- <option value="">বছর সিলেক্ট করুন</option> -->
                                                <?php 
                                            $salary_year = mysqli_query($conn,"SELECT distinct year from salary_summary_paid");
                                            if ($salary_year == true) {
                                                while($data = mysqli_fetch_array($salary_year))
                                                {
                                                $year = $data["0"];

                                                echo "<option value='$year'>$year</option>";
                                                ?>
                                                <?php }
                                            }?>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="control-group">
                                        <label class="control-label" style="text-align:right">মাস</label>
                                        <div class="controls">
                                            <select data-placeholder="মাস" class="chzn-select" tabindex="1" id=""
                                                name="month">
                                                <!-- <option value="">মাস সিলেক্ট করুন</option> -->
                                                <?php
                         $salary_month = mysqli_query($conn,"SELECT distinct month from salary_summary_paid");
                        if ($salary_month == true) {
                            while($data = mysqli_fetch_array($salary_month))
                            {
                            $month = $data["0"];
                            $monthBd = array('মাস সিলেক্ট করুন','জানুয়ারী','ফেব্রুয়ারি','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর');
                                
                            echo "<option value='$month'>$monthBd[$month]</option>";
                            }
                        } 
                                
                            
                        ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>



                            <h4></h4>
                            <!-- <div id="add_salary"></div> -->

                            <table class="table table-striped table-bordered" id="salary_table">
                                <thead>
                                    <tr>
                                        <!-- <th></th> -->
                                        <!-- <th>Account id</th> -->
                                        <th> আইডি </th>
                                        <th> নাম </th>
                                        <th> পদবী </th>
                                        <th> শ্রেণী </th>
                                        <th> বেসিক বেতন </th>
                                        <th> পেইড </th>
                                        <th> মন্তব্য </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                 $list_employee=mysqli_query($conn,"SELECT employee_id,designation,employee_name,employee_grade,employee_department,basic_salary,employee_type from employee_details WHERE 
                 employee_st = 1 order by employee_id");	//1 = Show Data
                //   order by employee_id asc limit 5
                 if($list_employee==true)
                 {  $i=0;
              	    while($data=mysqli_fetch_array($list_employee))
              		  { 
                        $employee_id=$data['0'];
                        $designation=$data['1'];
                        $employee_name=$data['2'];
                        $employee_grade=$data['3'];
                        $employee_department=$data['4'];
                        $basic_salary=$data['5'];
                        $type=$data['6'];
                        
                        echo "<input type='text' style='display:none' name='employee_id[]' value=$employee_id>";
                        echo "<input type='text' style='display:none' name='employee_grade[]' value=$employee_grade>";
                        
              	        echo "<tr>
                        
                        <td> $employee_id </td>
                        <td> $employee_name </td>
                        <td>";
                        $list_designation=mysqli_query($conn,"SELECT designation_name from all_designation WHERE id = $designation");
                        if($list_designation==true)
                         {
                            while($data_dsg=mysqli_fetch_array($list_designation))
                            { 
                            $designation = $data_dsg['0'];
                            echo "$designation"; 
                            }
                         }
                        echo "</td>
                        <td>";
                        $list_employee_grade=mysqli_query($conn,"SELECT grade_name from all_employee_grade WHERE id = $employee_grade");
                        if($list_employee_grade==true)
                         {
                            while($data_grade=mysqli_fetch_array($list_employee_grade))
              		         { 
                                $grade = $data_grade['0'];
                                echo "$grade";
                             }
                         }
                        echo "</td><td>
                        <div class='basic_salary'>
                        <input type='text' name='basic_salary[]' value=$basic_salary readonly>
                        </div>
                        </td><td>";
                        
                        $salary_grade_rates = mysqli_query($conn,"SELECT salary_head_id,salary_head_type,rate FROM assign_salary_grade WHERE rate_st = 1 and grade_id = $employee_grade");
                        
                                $gross_salary_add=0;
                                $gross_salary_min=0;
                                $salary_grade_rate_row = mysqli_num_rows($salary_grade_rates);
                                if ($salary_grade_rate_row > 0) 
                                {
                                    while ($data = mysqli_fetch_array($salary_grade_rates)) 
                                    {
                                        $salary_head_id = $data["0"];
                                        $salary_head_type = $data["1"];
                                        $rate = $data["2"];
                                        
                                        
                                        
                                        // 1=add,2=sub
                                        $total_percent = $basic_salary*$rate;
                                        $total = $total_percent/100;
                                        if ($salary_head_type == 1) 
                                        {  
                                            // echo "<br>$salary_head_id-$total<br>";
                                            // var_dump($salary_head_id); 
                                            for ($add=0; $add < count($salary_head_id) ; $add++) 
                                            {
                                                // echo $i;
                                                $gross_salary_add += $total;
                                                echo "<input type='hidden' style=''  value=$total>";
                                                // echo "<input type='hidden' style='' name='salary_head_type' value=$salary_head_type>";
                                                echo "<input type='hidden' style=''  value=$salary_head_id>";
                                             
                                            }
                                        }
                                        if ($salary_head_type == 2) 
                                        {   
                                            // echo "<br>$salary_head_id-$total<br>";
                                            // var_dump($salary_head_id);
                                            for ($min=0; $min < count($salary_head_id) ; $min++) 
                                            { 
                                                
                                                $gross_salary_min += $total;
                                                echo "<input type='hidden' style='' value=$total>";
                                                // echo "<input type='hidden' style='' name='salary_head_type' value=$salary_head_type>";
                                                echo "<input type='hidden' style=''  value=$salary_head_id>";
                                            }
                                        }
                                           $t_salary=$gross_salary_add-$gross_salary_min; 
                                    }
                                    echo "
                                    <div class=''>
                                    <input class='paid_salary' name='paid_salary[]' type='text'  value=$t_salary onkeyup='salary_total()'>
                                    </div>
                                    ";     
                                } 
                                else 
                                {
                                    echo "<div class=''>
                                    <input class='paid_salary' name='paid_salary[]' type='text'  value=$basic_salary onkeyup='salary_total()'>
                                    </div>
                                    ";  
                                }
                           
                        echo "</td><td><div class=''>
                        <textarea></textarea>
                        </div>";
                        
                        echo "</td>";
                        echo "</tr>";
                        $i++; 
                        }
                        }?>
                                </tbody>

                            </table>

                            <div class="span5"></div>

                            <div class="span3">
                                <div class="control-group">
                                    <label class="control-label" for="" style="text-align:right">সর্বমোট </label>
                                    <div class="controls">
                                        <input type="text" id="total_amount" class="" name="total_amount" value=""
                                            style="" />
                                    </div>
                                </div>
                            </div>
                            <div class="span3">
                                <div class="control-group">

                                    <div class="controls">
                                        <input type="submit" id="" class="btn btn-primary" name="salary_generate_edit"
                                            value="সংশোধন" style="width:100px;border: none;height: 28px;" />
                                    </div>
                                </div>
                            </div>


                        </form>
                        <?php }
    } 
    
    ?>



                    </div>
                </div>
            </div>


        </div>
    </div>
</div>



<?php include 'footer.php';?>

<script>
function salary_generate_monthly() {

    var month = $("#month").val();
    var year = $("#year").val();
    // console.log(employee_id);
    // console.log(month);
    // console.log(year);
    // $("#sample_2").dataTable().fnDestroy();


    $.ajax({
        url: 'salary_generate_monthly.php',
        type: 'POST',
        // dataType : 'json',
        data: {
            month: month,
            year: year
        },
        success: function(result) {
            console.log(result);
            if (result == '') {
                swal({
                    title: "কোনো তথ্য পাওয়া যায়নি !",
                    // text: "You clicked the button!",
                    icon: "error",
                    button: "বাতিল",
                    // icon: "warning",
                    dangerMode: true
                });
                $("#sample_1").dataTable().fnDestroy();
                $("#salaryGen").html(result);
                $("#sample_1").dataTable();

            } else {
                $("#sample_1").dataTable().fnDestroy();

                $("#salaryGen").html(result);
                $("#sample_1").dataTable();
                // alert("কোনো তথ্য পাওয়া যায়নি !!!");
                // swal("কোনো তথ্য পাওয়া যায়নি !!!","error");

            }
        }
    })

}
</script>
<script>
$('#preloader_div').css('display', 'none');

function ShowLoader() {
    $('#preloader_div').css('display', 'block');
}
</script>

<script>
$(window).load(function() {
    salary_total();
});

function salary_total() {
    var sum = 0;
    $('.paid_salary').each(function() {
        if (this.value == '') {
            this.value = 0;
        }
        sum += parseFloat(this.value);
    });
    $('#total_amount').val(sum);
}
</script>