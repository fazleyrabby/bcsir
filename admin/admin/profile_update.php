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
                     <?php if ($level == 1) 
                    //  {
                    //     echo "পাসওয়ার্ড আপডেট";
                    // }else 
                    // {
                    //     echo "প্রোফাইল আপডেট";
                    // }

                    
                     
                     ?> 
                  প্রোফাইল আপডেট
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
         if ($_GET['success'] == 'password_not_match') { // ?>
		           <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
		            <h4 class="alert-heading">পাসওয়ার্ড মিলেনি !</h4>
		           </div>
		        <?php 
        } 
        if ($_GET['success'] == 'pre_pass_not_found') { // ?>
		           <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
		            <h4 class="alert-heading">পূর্বের পাসওয়ার্ড মিলেনি !</h4>
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
        if ($_GET['success'] == 'username_exist') { // ?>
               <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                <h4 class="alert-heading">ব্যবহারকারীর নাম ইতিমধ্যে বিদ্যমান!!</h4>
               </div>
            <?php 
        }
				 } ?>
 
            <?php 
            if ($level == 1 or !$_GET['employee_id']) { ?>
            
            
            <form action="Action/add_employee.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
            <div class="control-group">
                <label class="control-label">ব্যবহারকারী নাম</label>
                    <div class="controls">
                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="ব্যবহারকারী নাম" placeholder="ব্যবহারকারী নাম" value="<?=$usernamee?>" name="username">
                </div>
            </div>
            <input type="hidden" name="id" value="<?=$id?>">
            <div class="control-group">
                <label class="control-label">পূর্ব পাসওয়ার্ড</label>
                    <div class="controls">
                        <input type="password" class="span6 tooltips" data-trigger="hover" data-original-title="কর্মচারী পাসওয়ার্ড" placeholder="পূর্ব পাসওয়ার্ড" name="pre_password">
                    </div>
            </div>
            <!-- PASSWORD -->
            <div class="control-group">
                <label class="control-label">পাসওয়ার্ড</label>
                    <div class="controls">
                        <input type="password" class="span6 tooltips" data-trigger="hover" data-original-title="কর্মচারী পাসওয়ার্ড" placeholder="পাসওয়ার্ড(অনলাইন সেবার জন্য)" name="password">
                    </div>
            </div>
             <input type="hidden" name="user_login" value="<?php echo $usernamee;?>">
            <!-- RE-PASSWORD -->
            <div class="control-group">
                <label class="control-label">পুনঃরায় পাসওয়ার্ড</label>
                    <div class="controls">
                        <input type="password" class="span6 tooltips" data-trigger="hover" data-original-title="" placeholder="পুনঃরায় পাসওয়ার্ড" name="re_password">
                    </div>
            </div>
            <div class="control-group">
					<div class="controls">
						<input type="submit" name="admin_update" value="সাবমিট">
					</div>
				</div>
            </form>
            <?php }
            else
            {
            $employee_id = $_GET['employee_id'];
            $edit_employee=mysqli_query($conn,"SELECT emp.id,emp.designation,emp.employee_department,emp.employee_name,emp.employee_grade,
            emp.join_date,emp.basic_salary,
            emp.employee_serial,emp.employee_type,emp.images,
            login.username,
            emp.cv_file,
            emp.email,
            emp.contact_no,
            emp.employee_details_other
            FROM employee_details as emp left join ratul_login as login on login.employee_id=emp.employee_id 
            WHERE login.employee_id='$employee_id' and login.user_level = '$level'");  
            if($edit_employee > 0)
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
            $username_login = $data_emp['10'];
            $cv_file = $data_emp['11'];
            $email = $data_emp['12'];
            $contact = $data_emp['13'];
            $employee_details_other = $data_emp['14'];
            ?>
            <form action="Action/add_employee.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
            <input type="hidden" value="<?php echo $usernamee?>" name="username"> 
            <input type="hidden" name="level" value="<?=$level?>"/>  
            <input type="hidden" value="<?=$basic_salary?>" name="basic_salary"/>
            <div class="control-group">
                <label class="control-label">কর্মচারী নাম</label>
                    <div class="controls">
                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="" placeholder="কর্মচারী নাম" name="employee_name" required value="<?php echo $employee_name?>">
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
                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="ব্যবহারকারী নাম" placeholder="ব্যবহারকারী নাম(অনলাইন সেবার জন্য)" name="username" value="<?=$username_login?>" readonly>
                    </div>
            </div>
            <!-- PASSWORD -->
            <div class="control-group">
                <label class="control-label">পাসওয়ার্ড</label>
                    <div class="controls">
                        <input type="password" class="span6 tooltips" data-trigger="hover" data-original-title="কর্মচারী পাসওয়ার্ড" placeholder="পাসওয়ার্ড(অনলাইন সেবার জন্য)" name="password">
                    </div>
            </div>
            <!-- RE-PASSWORD -->
            <div class="control-group">
                <label class="control-label">পুনঃরায় পাসওয়ার্ড</label>
                    <div class="controls">
                        <input type="password" class="span6 tooltips" data-trigger="hover" data-original-title="" placeholder="পুনঃরায় পাসওয়ার্ড" name="re_password">
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
                            <input type="file" name="files[]" class="default"></span>
                            <a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
                        </div>
                    </div>
                    
                </div>
            </div>
     <!--<div class="control-group">-->
     <!--           <label class="control-label">সিরিয়াল</label>-->
     <!--               <div class="controls">-->
     <!--                   <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="ক্রমানুসারে সাজানো" placeholder="কর্মচারী সিরিয়াল (ক্রমানুসারে সাজানো)" name="employee_serial" value="<?php echo $employee_serial?>">-->
     <!--               </div>-->
     <!--       </div>-->
            <div class="control-group">
            <label class="control-label">ধরণ</label>
                <div class="controls">
                        <select class="span6 chzn-select" data-placeholder="কর্মচারী ধরণ" tabindex="1" name="employee_type">
                    <option value=""></option>
                        <option value="1"<?php if($employee_type == 1) echo " selected"?>>কর্মচারী</option>
                        <option value="2"<?php if($employee_type == 2) echo " selected"?>>বিজ্ঞানী</option> 
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
            </div>
            <div class="control-group">
                <label class="control-label">কর্মচারী যোগদানের তারিখ</label>
                <div class="controls">
                    <!-- <input id="dp1" type="text" value="" size="16" class="m-ctrl-medium" name="employee_join_date"> -->
                    <input type="text" id="datepicker" name="employee_join_date" readonly="false" value="<?php echo $join_date?>">
                </div>

            </div>
                </div>
				<div class="control-group">
					<div class="controls">
						<input type="submit" name="update_employee" value="আপডেট ">
					</div>
				</div>
		   </form>

                    <?php } } }?>
            
           




		

		</div>
		</div>
		</div>
		</div>


</div>







<?php include 'footer.php';?>