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
                   <h3 class="page-title">
                     <!-- ড্যাশবোর্ড  -->
                   </h3>
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
       <?php if(isset($_GET['employee'])) { 
         if ($_GET['employee'] == "add_employee"){
           echo "<h4><i class='icon-tags'></i> নতুন কর্মচারী/বিজ্ঞানী যোগ </h4>";
         }
         elseif($_GET['employee'] == "employee_list")
         {
            echo "<h4><i class='icon-tags'></i> কর্মচারীদের তালিকা </h4>";
         }
          elseif($_GET['employee'] == "update_employee")
         {
            echo "<h4><i class='icon-tags'></i> কর্মচারী সংশোধন  </h4>";
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
            echo "</div></div>"; 
            }
            ?>

		<?php
		if (isset($_GET['employee'])) {    //if add account head found
			$employee = $_GET['employee'];     //if clicked on add account head 
			if ($employee == "add_employee"){ ?> 
			<form action="Action/add_employee.php" method="POST" class="form-horizontal" class="employee_form" enctype=multipart/form-data>
            <input type="hidden" value="<?php echo $usernamee?>" name="username">
            <div class="control-group">
                <label class="control-label">নাম</label>
                    <div class="controls">
                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="কর্মচারী নাম" placeholder="কর্মচারী নাম" name="employee_name" required>
                    </div>
            </div>
            <div class="control-group">
                <label class="control-label">আইডি</label>
                    <div class="controls">
                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="কর্মচারী আইডি" placeholder="কর্মচারী আইডি" name="employee_id" required>
                    </div>
            </div>
            <div class="control-group">
                <label class="control-label">ই-মেইল</label>
                    <div class="controls">
                        <input type="email" class="span6 tooltips" data-trigger="hover" data-original-title="কর্মচারী ই-মেইল" placeholder="কর্মচারী ই-মেইল" name="email" required>
                    </div>
            </div>
            <div class="control-group">
                <label class="control-label">ফোন</label>
                    <div class="controls">
                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="কর্মচারী ফোন" placeholder="কর্মচারী ফোন" name="contact" required>
                    </div>
            </div>
            
            <!-- USERNAME -->
            <div class="control-group">
                <label class="control-label">ব্যবহারকারী নাম(অনলাইন সেবা)</label>
                    <div class="controls">
                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="ব্যবহারকারী নাম" placeholder="ব্যবহারকারী নাম(অনলাইন সেবার জন্য)" name="emp_username" id="username" onkeyup="check_data()" >
                        <span id="alert_box"></span>
                    </div>
            </div>
            
            <!-- PASSWORD -->
            <div class="control-group">
                <label class="control-label">পাসওয়ার্ড</label>
                    <div class="controls">
                        <input type="password" id="password" class="span6 tooltips" data-trigger="hover" data-original-title="কর্মচারী পাসওয়ার্ড" placeholder="পাসওয়ার্ড(অনলাইন সেবার জন্য)" name="password" >
                    </div>
            </div>
            <!-- RE-PASSWORD -->
            <div class="control-group">
                <label class="control-label">পুনঃরায় পাসওয়ার্ড</label>
                    <div class="controls">
                        <input type="password" id="re_password" onkeyup="checkPass()" class="span6 tooltips" data-trigger="hover" data-original-title="" placeholder="পুনঃরায় পাসওয়ার্ড" name="re_password">
                        <span id="confirmMessage" ></span>
                    </div>
            </div>
               <!-- <div class="control-group">
            <label class="control-label"> মিডিয়া ফাইল </label>
              <div class="controls">
                <input type="file" class="form-control span6" id="" name="files[]" placeholder="Specifications">
              </div>
        </div> -->
            <div class="control-group">
                <label class="control-label">মিডিয়া ফাইল</label>
                <div class="controls">
                    <div data-provides="fileupload" class="fileupload fileupload-new">
                        <div style="width: 200px; height: 150px;" class="fileupload-new thumbnail">
                            <img alt="" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image">
                        </div>
                        <div style="max-width: 200px; max-height: 150px; line-height: 20px;" class="fileupload-preview fileupload-exists thumbnail"></div>
                        <div>
                            <span class="btn btn-file"><span class="fileupload-new">ফাইল টি সিলেক্ট করুন</span>
                            <span class="fileupload-exists">পরিবর্তন করুন</span>
                            <input type="file" id="profile_image" name="files" class="default"></span>
                            <a data-dismiss="fileupload" class="btn fileupload-exists" href="#">বাতিল</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">সিরিয়াল</label>
                    <div class="controls">
                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="ক্রমানুসারে সাজানো" placeholder="কর্মচারী সিরিয়াল (ক্রমানুসারে সাজানো)" name="employee_serial" onkeyup="check_serial()" id="employee_serial" >
                        <span id="employee_serial_error"></span>
                    </div>
            </div>
            <div class="control-group">
            <label class="control-label">ধরণ</label>
                <div class="controls">
                        <select class="span6 chzn-select" data-placeholder="কর্মচারী ধরণ" tabindex="1" name="employee_type" required>
                    <option value=""></option>
                    <option value="1">কর্মচারী</option>
                    <option value="2">বিজ্ঞানী</option>
                    <option value="4">কর্মচারী(একাউন্টস)</option>
                    <option value="3">এমডি(পরিচালন অধিকর্তা)</option>
                </select>
                </div>
            </div>

            <!-- <div class="control-group">
                <label class="control-label"></label>
                    <div class="controls">
                        <input type="file">
                        
                        <span id="employee_cv_details"></span>
                    </div>
            </div> -->

              <div class="control-group">
                        <label class="control-label">কর্মচারী বৃত্তান্ত (সিভি)</label>
                        
                        <div class="controls">
                            <div data-provides="fileupload" class="fileupload fileupload-new">
                                <span class="btn btn-file">
                                <span class="fileupload-new">ফাইল টি সিলেক্ট করুন </span>
                                <span class="fileupload-exists">পরিবর্তন করুন</span>
                                <input type="file" id="cv_file" class="default" name="cv_file">
                                </span>
                                <span class="fileupload-preview"></span>
                                <a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#">×</a>
                            </div>
                        </div>
                    </div>

            <div class="control-group">
                <label class="control-label">কর্মচারী বৃত্তান্ত (অন্যান্য )</label>
                    <div class="controls">
                       <textarea name="employee_details_other" id="employee_details_other" class="span6 ckeditor tooltips" rows=""  data-trigger="hover" data-original-title="কর্মচারী বৃত্তান্ত" placeholder="কর্মচারী বৃত্তান্ত" ></textarea>
                       
                    </div>
            </div>

            <div class="control-group">
                    <label class="control-label">পদবী</label>
                    <div class="controls">
                        <select class="span6 chzn-select" data-placeholder="কর্মচারী পদবী" tabindex="1" name="designation">
                        <option value=""></option>
                        <?php $all_emp_designation = mysqli_query($conn,"SELECT id,designation_name from all_designation where designation_st = 1");
                        if ($all_emp_designation == true) {
                            while ($data_des = mysqli_fetch_array($all_emp_designation)) {
                                $designation_id = $data_des['0'];
                                $designation_name = $data_des['1'];
                                echo "<option value='$designation_id'>$designation_name</option>";
                            }
                        } 
                        ?>
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">শ্রেণী</label>
                    <div class="controls">
                        <select class="span6 chzn-select" data-placeholder="কর্মচারী শ্রেণী" tabindex="1" name="employee_grade">
                            <option value=""></option>
                            <?php $all_emp_grade = mysqli_query($conn,"SELECT id,grade_name from all_employee_grade where grade_st = 1");
                            if ($all_emp_grade == true) {
                                while ($data_gd = mysqli_fetch_array($all_emp_grade)) {
                                    $grade_id = $data_gd['0'];
                                    $grade_name = $data_gd['1'];
                                    echo "<option value='$grade_id'>$grade_name</option>";
                                    }
                                } 
                            ?>
                       
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">বিভাগ</label>
                    <div class="controls">
                        <select class="span6 chzn-select" data-placeholder="কর্মচারী ডিপার্টমেন্ট" tabindex="1" name="employee_department">
                            <option value=""></option>
                             <?php $all_emp_dept = mysqli_query($conn,"SELECT id,department_name from all_department where department_st = 1");
                            if ($all_emp_dept == true) {
                                while ($data_dept = mysqli_fetch_array($all_emp_dept)) 
                                    {
                                        $dept_id = $data_dept['0'];
                                        $dept_name = $data_dept['1'];
                                        echo "<option value='$dept_id'> $dept_name <option>";
                                    }
                                } 
                             ?>
                        </select>
                    </div>
                </div>
                 <div class="control-group">
                    <label class="control-label">যোগদানের তারিখ</label>
                    <div class="controls">
                        <!-- <input id="dp1" type="text" value="" size="16" class="m-ctrl-medium" name="employee_join_date"> -->
                        <input type="text" id="datepicker" name="employee_join_date" readonly="false" value="">

                    </div>
                </div>
                 <div class="control-group">
                    <label class="control-label">বেতন</label>
                        <div class="controls">
                            <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title=" বেতন" placeholder="বেতন" name="basic_salary" >
                        </div>
                </div>

				<div class="control-group">
					<div class="controls">
						<input type="submit" id="submit" name="add_employee" value="সাবমিট">
					</div>
				</div>
		   </form>
				
			<?php }

			elseif ($employee == "employee_list") { ?> <!--  if clicked on account head List  -->
             <table class="table table-striped table-bordered" id="sample_1" style="table-layout:fixed">
             <!-- sample_1 -->
             <thead>
             <h4>কর্মচারী/বিজ্ঞানী ডিটেইলস</h4>
                <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1.checkboxes" /></th>
                <!-- <th>Account id</th> -->
                <th width="5%"> আইডি </th>
                <th width="15%"> নাম </th>
                <th width="15%"> পদবী </th>
                <th> ধরণ</th>
                <th> শ্রেণী </th>
                <th width="10%"> শাখা </th>
                <th> বেতন </th>
                <th width="20%"> সংশোধন / সংযোজন </th>
               </thead>
               <tbody>
               <?php  
                 $list_employee=mysqli_query($conn,"SELECT employee_id,designation,employee_name,employee_grade,employee_department,basic_salary,employee_type from employee_details WHERE 
                 employee_st = 1 order by id asc");	//1 = Show Data
                 if($list_employee==true)
                 {
              	    while($data=mysqli_fetch_array($list_employee))
              		  { 
                        $employee_id=$data['0'];
                        $designation=$data['1'];
                        $employee_name=$data['2'];
                        $employee_grade=$data['3'];
                        $employee_department=$data['4'];
                        $basic_salary=$data['5'];
                        $type=$data['6'];
                        if ($type == 1) {
                           $emp_type = 'কর্মচারী';
                        }
                        else {
                             $emp_type = 'বিজ্ঞানী';
                        }
              	        echo "<tr>
                        <td><input type='checkbox' class='checkboxes' value='1' /></td>
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
                        echo "</td><td>$emp_type</td>
                        <td>";
                        $list_employee_grade=mysqli_query($conn,"SELECT grade_name from all_employee_grade WHERE id = $employee_grade" );
                        if($list_employee_grade==true)
                         {
                            while($data_grade=mysqli_fetch_array($list_employee_grade))
              		         { 
                                $grade = $data_grade['0'];
                                echo "$grade";
                             }
                         }
                        echo "</td>
                        <td>";
                        $list_employee_dept=mysqli_query($conn,"SELECT department_name from all_department WHERE id = $employee_department");
                        if($list_employee_dept==true)
                         {
                            while($data_dept=mysqli_fetch_array($list_employee_dept))
              		         { 
                                $employee_dept = $data_dept['0'];
                                echo "$employee_dept";
                             }
                         }

                         {
                            $bn_digits=array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
                            $bng_salary = str_replace(range(0, 9),$bn_digits, $basic_salary);
                         }
                        echo "</td>
                        <td> $bng_salary টাকা </td>
                        <td><a href='employee.php?employee=update_employee&employee_id=$employee_id'><span class='btn btn-success  btn_success_custom'>সংশোধন </span></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='Action/add_employee.php?employee_id=$employee_id&employee_delete=employee_delete'>
                        <span class='btn btn-danger'>মুছে ফেলুন</span>
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>";
                        echo "</tr>"; 
                        }}?>
                     </tbody>
            	</table>

			
				
        <?php }

    elseif ($employee == "update_employee") {
        if (isset($_GET['employee_id'])) {
            $employee_id = $_GET['employee_id'];
            $edit_employee=mysqli_query($conn,"SELECT 
            employee_details.id,
            designation,
            employee_department,
            employee_name,employee_grade,
            join_date,basic_salary,employee_serial,
            employee_type,images,
            ratul_login.username,
            employee_details.cv_file,
            employee_details.email,
            employee_details.contact_no,
            employee_details.employee_details_other
            FROM employee_details left join ratul_login on 
            employee_details.employee_id=ratul_login.employee_id WHERE employee_details.employee_id='$employee_id'");  
            if($edit_employee==true)
            {
            while($data_emp=mysqli_fetch_array($edit_employee))
            {
            // $account_head_id = $data['0'];
            $id = $data_emp['0'];
            $employee_designation = $data_emp['1'];
            $employee_dept = $data_emp['2'];
            $employee_name = $data_emp['3'];
            $employee_grade = $data_emp['4'];
            $join_date = $data_emp['5'];
            $basic_salary = $data_emp['6']; 
            $employee_serial = $data_emp['7']; 
            $employee_type = $data_emp['8'];
            $image = $data_emp['9'];
            $username = $data_emp['10'];
            $cv_file = $data_emp['11'];
            $email = $data_emp['12'];
            $contact = $data_emp['13'];
            $employee_details_other = $data_emp['14'];
            ?>
            <form action="Action/add_employee.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
            <input type="hidden" value="<?php echo $usernamee?>" name="username">   
             <input type="hidden" name="level" value="<?=$level?>"/> 
            <div class="control-group">
                <label class="control-label">কর্মচারী নাম</label>
                    <div class="controls">
                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="" placeholder="কর্মচারী নাম" name="employee_name"  value="<?php echo $employee_name?>">
                    </div>
            </div>
            <div class="control-group">
                    <label class="control-label">কর্মচারী আইডি</label>
                        <div class="controls">
                            <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="" placeholder="কর্মচারী আইডি" name="employee_id" readonly value="<?php echo $employee_id?>" >
                        </div>
            </div>
                        <div class="control-group">
                <label class="control-label">ই-মেইল</label>
                    <div class="controls">
                        <input type="email" class="span6 tooltips" data-trigger="hover" data-original-title="কর্মচারী ই-মেইল" placeholder="কর্মচারী ই-মেইল" value="<?php echo $email?>" name="email" required>
                    </div>
            </div>
            <div class="control-group">
                <label class="control-label">ফোন</label>
                    <div class="controls">
                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="কর্মচারী ফোন" placeholder="কর্মচারী ফোন" value="<?php echo $contact?>" name="contact" required>
                    </div>
            </div>
            <!-- USERNAME -->
            <div class="control-group">
                <label class="control-label">ব্যবহারকারী নাম(অনলাইন সেবা)</label>
                    <div class="controls">
                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="ব্যবহারকারী নাম" placeholder="ব্যবহারকারী নাম(অনলাইন সেবার জন্য)" name="username" value="<?=$username?>">
                    </div>
            </div>
            <span id="alert_box"></span>
            <!-- PASSWORD -->
            <div class="control-group">
                <label class="control-label">পাসওয়ার্ড</label>
                    <div class="controls">
                        <input type="password" id="password" class="span6 tooltips" data-trigger="hover" data-original-title="কর্মচারী পাসওয়ার্ড" placeholder="পাসওয়ার্ড(অনলাইন সেবার জন্য)" name="password">
                    </div>
            </div>
            <!-- RE-PASSWORD -->
            <div class="control-group">
                <label class="control-label">পুনঃরায় পাসওয়ার্ড</label>
                    <div class="controls">
                        <input type="password" id="re_password" class="span6 tooltips" data-trigger="hover" data-original-title="" placeholder="পুনঃরায় পাসওয়ার্ড" name="re_password" onkeyup="checkPass()">
                        <span id="confirmMessage"></span>
                    </div>
                    
            </div>
                 <div class="control-group">
                <label class="control-label">মিডিয়া ফাইল</label>
                <div class="controls">
                    <div data-provides="fileupload" class="fileupload fileupload-new">
                        <div style="width: 200px; height: 150px;" class="fileupload-new thumbnail">
                        <?php if ($image !== ''){?>
                            <img alt="" src="Action/uploads/<?=$image?>">
                        <?php } ?>
                            <!-- <img alt="" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"> -->
                        </div>
                        <div style="max-width: 200px; max-height: 150px; line-height: 20px;" class="fileupload-preview fileupload-exists thumbnail"></div>
                        <div>
                            <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                            <span class="fileupload-exists">Change</span>
                            <input type="file" name="files" class="default"></span>
                            <a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
                        </div>
                    </div>
                    
                </div>
            </div>
     <div class="control-group">
                <label class="control-label">সিরিয়াল</label>
                    <div class="controls">
                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="ক্রমানুসারে সাজানো" placeholder="কর্মচারী সিরিয়াল (ক্রমানুসারে সাজানো)" name="employee_serial" value="<?php echo $employee_serial?>">
                    </div>
            </div>
            <div class="control-group">
            <label class="control-label">ধরণ</label>
                <div class="controls">
                        <select class="span6 chzn-select" data-placeholder="কর্মচারী ধরণ" tabindex="1" name="employee_type">
                    <option value=""></option>
                        <option value="1"<?php if($employee_type == 1) echo " selected"?>>কর্মচারী</option>
                        <option value="2"<?php if($employee_type == 2) echo " selected"?>>বিজ্ঞানী</option> 
                        <option value="4"<?php if($employee_type == 4) echo " selected"?>>কর্মচারী(একাউন্টস)</option>
                        <option value="3"<?php if($employee_type == 3) echo " selected"?>>এমডি(পরিচালন অধিকর্তা)</option> 
                        </select>
                </select>
                </div>
            </div>
            <div class="control-group">
                    <label class="control-label">কর্মচারী পদবী</label>
                    <div class="controls">
                        <select class="span6 chzn-select" data-placeholder="কর্মচারী পদবী" tabindex="1" name="designation">
                        <option value=""></option>
                        <?php $all_emp_designation = mysqli_query($conn,"SELECT id,designation_name from all_designation where designation_st = 1");
                        if ($all_emp_designation == true) {
                            while ($data_des = mysqli_fetch_array($all_emp_designation)) {
                                $designation_id = $data_des['0'];
                                $designation_name = $data_des['1'];
                                if ($designation_id == $employee_designation) {
                                    $selected = " selected";
                                }
                                else {
                                    $selected = "";
                                }
                                echo "<option value='$designation_id'$selected>$designation_name</option>";
                            }
                        } 
                        ?> 
                        </select>
                    </div>
            </div>

            <div class="control-group">
                    <label class="control-label">কর্মচারী গ্রেড</label>
                    <div class="controls">
                        <select class="span6 chzn-select" data-placeholder="কর্মচারী গ্রেড" tabindex="1" name="employee_grade">
                            <option value=""></option>
                            
                            <?php $all_emp_grade = mysqli_query($conn,"SELECT id,grade_name from all_employee_grade where grade_st = 1");
                            if ($all_emp_grade == true) {
                            while ($data_grade = mysqli_fetch_array($all_emp_grade)) {
                                $grade_id = $data_grade['0'];
                                $grade_name = $data_grade['1'];
                                if ($grade_id == $employee_grade) {
                                    $selected = " selected";
                                }
                                else {
                                    $selected = "";
                                }
                                echo "<option value='$grade_id'$selected>$grade_name</option>";
                            }
                        } 
                        ?>
                       
                        </select>
                    </div>
            </div>

            <div class="control-group">
                    <label class="control-label">কর্মচারী ডিপার্টমেন্ট</label>
                    <div class="controls">
                        <select class="span6 chzn-select" data-placeholder="কর্মচারী ডিপার্টমেন্ট" tabindex="1" name="employee_department">
                            <option value=""></option>
                            <?php $all_emp_dept = mysqli_query($conn,"SELECT id,department_name from all_department where department_st = 1");
                            if ($all_emp_dept == true) {
                            while ($data_dept = mysqli_fetch_array($all_emp_dept)) {
                                $dept_id = $data_dept['0'];
                                $dept_name = $data_dept['1'];
                                if ($dept_id == $employee_dept) {
                                    $selected = " selected";
                                }
                                else {
                                    $selected = "";
                                }
                                echo "<option value='$dept_id'$selected>$dept_name</option>";
                            }
                        } 
                        ?>
                        </select>
                    </div> 
             </div>
             <div class="control-group">
                        <label class="control-label">কর্মচারী বৃত্তান্ত (সিভি)</label>
                        
                        <div class="controls">
                        <span>পূর্ববর্তী ফাইল : <a href="<?=$baseurl?>Action/uploads/<?=$cv_file?>" target="_blank" rel="noopener noreferrer"><?=$cv_file?></a></span> <br>
                            <div data-provides="fileupload" class="fileupload fileupload-new">
                                <span class="btn btn-file">
                                <span class="fileupload-new">ফাইল টি সিলেক্ট করুন</span>
                                <span class="fileupload-exists">পরিবর্তন করুন</span>
                                <input type="file" class="default" name="cv_file">
                                </span>
                                <span class="fileupload-preview"></span>
                                <a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#">×</a>
                            </div>
                        </div>
                    </div>
                    
            <div class="control-group">
                <label class="control-label">কর্মচারী বৃত্তান্ত (অন্যান্য )</label>
                    <div class="controls">
                       <textarea name="employee_details_other" id="employee_details_other" class="span6 ckeditor tooltips" rows=""  data-trigger="hover" data-original-title="কর্মচারী বৃত্তান্ত" placeholder="কর্মচারী বৃত্তান্ত" ><?=$employee_details_other?></textarea>
                       
                    </div>
            </div>
            <div class="control-group">
                <label class="control-label">কর্মচারী যোগদানের তারিখ</label>
                <div class="controls">
                    <!-- <input id="dp1" type="text" value="" size="16" class="m-ctrl-medium" name="employee_join_date"> -->
                    <input type="text" id="datepicker" name="employee_join_date" readonly="false" value="<?php echo $join_date?>">
                </div>

                    

            </div>

                <div class="control-group">
                    <label class="control-label">বেতন</label>
                        <div class="controls">
                            <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="" value="<?php echo $basic_salary?>" placeholder="বেতন" name="basic_salary" >
                        </div>
                </div>

                    

                </div>
				<div class="control-group">
					<div class="controls">
						<input type="submit" id="submit" name="update_employee" value="সংশোধন ">
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
// function file_validation()
// {
//     if(document.getElementById("profile_image").files.length == 0){
//    alert("Profile Image not selected");
// }
// else if(document.getElementById("cv_file").files.length == 0){
//    alert("CV file not selected");
// }
// }

//     function file_validation(){
//     var fileName = $("#profile_image").val();
//     var cv_file = $("#cv_file").val();
//     if (fileName == '' && cv_file == '') {
//          alert("NO FILE SELECTED");
//          return false;        
//     }
//     else if(fileName == '') { // returns true if the string is not empty
//         alert("SELECT PROFILE IMAGE");
//         return false;
//     } 
//     else if(cv_file == '') { // no file was selected
//         alert("SELECT CV FILE");
//         return false;
//     }
//   }

</script>
