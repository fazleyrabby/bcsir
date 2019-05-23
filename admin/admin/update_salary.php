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
                     ড্যাশবোর্ড 
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
       <?php if(isset($_GET['salary'])) { 
         if ($_GET['salary'] == "add_salary"){
           echo "<h4><i class='icon-tags'></i> Add Salary </h4>";
         }
         elseif($_GET['salary'] == "salary_list")
         {
            echo "<h4><i class='icon-tags'></i> Salary List </h4>";
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
 
 if ($_GET['salary'] == "update_salary"){ 
            $emp_id = $_GET["employee_id"];?>

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
                    <?php 
                        $employee = mysqli_query($conn,"SELECT 
                        ss.created_at as date,
                        ss.id as last_id,
                        ed.employee_name as emp_name,
                        ed.employee_id as emp_id, 
                        ed.employee_grade as grade,
                        ed.basic_salary as salary,
                        ss.salary_paid as paid,
                        ss.salary_credit as credit,
                        ss.salary_total as total,
                        dept.department_name as dept_name,
                        grade.grade_name as grade_name,
                        desg.designation_name as designation
                        FROM employee_details as ed 
                        LEFT JOIN all_department as dept
                        on dept.id = ed.employee_department
                        LEFT JOIN all_employee_grade as grade
                        on grade.id = ed.employee_grade
                        LEFT JOIN all_designation as desg
                        on desg.id = ed.designation 
			            LEFT JOIN salary_summary as ss
		                on ss.employee_id = ed.id
                        WHERE 
                        ed.employee_st = 1 and ed.id = $emp_id
                        order by ss.id desc limit 1");
                        $employee_details_obj = mysqli_fetch_object($employee);
                        $employee_name = $employee_details_obj->emp_name;
                        $employee_id = $employee_details_obj->emp_id;
                        $grade = $employee_details_obj->grade;
                        $salary = $employee_details_obj->salary;
                        $add = $employee_details_obj->paid;
                        $credit = $employee_details_obj->credit;
                        $total = $employee_details_obj->total;
                        $dept_name = $employee_details_obj->dept_name;
                        $grade_name = $employee_details_obj->grade_name;
                        $designation = $employee_details_obj->designation;
                        $last_id = $employee_details_obj->last_id;
                        $date = $employee_details_obj->date;
                        // print_r($employee_details_obj);
                        ?>
                        
                    <input type="hidden" value="<?=$last_id?>" name="last_updated_id">
                    <input type="hidden" value="<?=$date?>" name="date">

                        <input type="text" id="employee_id" name="" class="span12" value="<?=$employee_id?>" readonly>
                     
                    </div>
                </div>
            </div>
            <!-- <input type="hidden" name="dept_val" id="dept_val" readonly>
            <input type="hidden" name="desg_val" id="desg_val" readonly>
            <input type="hidden" name="grade_val" id="grade_val" readonly> -->
            <div class="span2">
                <div class="control-group">
                <label class="control-label">কর্মচারীর নাম</label>
                    <div class="controls">
                        <input type="text" class="span12" data-placeholder="" value="<?= $employee_name?>" name="employee_name" id="employee_name" readonly>
                    </div>
                </div>
            </div>
            <div class="span2">
                <div class="control-group">
                <label class="control-label">কর্মচারীর শাখা</label>
                    <div class="controls">
                        <input type="text" class="span12" data-placeholder="" value="<?=$dept_name?>" name="employee_department" id="employee_department" readonly>
                    </div>
                </div>
            </div>
            <div class="span2">
                <div class="control-group">
                <label class="control-label">কর্মচারীর পদবী</label>
                    <div class="controls">
                        <input type="text" class="span12" data-placeholder="" value="<?=$designation?>" name="employee_designation" id="employee_designation" readonly>
                    </div>
                </div>
            </div>
            <div class="span2">
                <div class="control-group">
                <label class="control-label">কর্মচারীর শ্রেণী</label>
                    <div class="controls">
                        <input type="text" class="span12" data-placeholder="" value="<?=$grade_name?>" name="employee_grade" id="employee_grade" onchange="reset_tr()" readonly>
                    </div>
                </div>
            </div>
            <div class="span2">
                <div class="control-group">
                <label class="control-label">বেসিক বেতন</label>
                    <div class="controls">
                        <input type="text" class="span12" data-placeholder="" name="employee_grade" id="basic_salary" onchange="" value="<?=$salary?>" readonly>
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

               <?php 
                        
                        // echo "<script>console.log($salary_head_rate)</script>";

                    $employee_details = mysqli_query($conn,"SELECT sd.salary_head,sd.amount,sd.id FROM 
                    salary_summary as ss 
                    join salary_details as sd
                    on sd.summary_id = ss.id
                    WHERE ss.id IN (SELECT MAX(id) FROM salary_summary GROUP BY employee_id)
                    and ss.employee_id = $emp_id and sd.salary_head_type = 1");
                        $count_add_head = mysqli_num_rows($employee_details);
                        $array = array();
                        $salary_head_rate = 0;
                        if ($employee_details == true) {
                            while($employee_dt = mysqli_fetch_array($employee_details)){
                                
                                $salary_head = $employee_dt["0"];
                                $amount = $employee_dt["1"];
                                // $last_id = $employee_dt["2"]
                                // $salary_add_id = $employee_dt["2"];;
                                // $array = [$salary_head,$amount];
                                //  echo "<script>alert('".json_encode($employee_dt)."')</script>";
                                $salary_head_rate =  (($amount*100)/$salary);


                                ?>
                                <tr class="default_tr_add">
                                <td>
                                <div class="control-group">
                      
                            <div class="controls">
                                <select class="span12" data-placeholder="" name="salary_head_add[]" id="salary_h_add0" onchange="selected_id()" readonly> 
                                <!-- <option>Select</option> -->

                                <?php $salary_head_min = mysqli_query($conn,"SELECT account_head_id,account_head_name,account_head_type FROM account_head WHERE account_head_group = 2 AND account_head_type = 1 and account_head_id = $salary_head");
                                $add_val_array= array();
                                $salary_head_obj = mysqli_fetch_object($salary_head_min);
                                $salary_head_id = $salary_head_obj->account_head_id;
                                $salary_head_name = $salary_head_obj->account_head_name;
                                $type = $salary_head_obj->account_head_type;
                                // echo "<script>console.log(".json_encode($salary_head_obj).");</script>";
                                
                                  
                                // if ($salary_head == true) {
                                // while ($salary_head_dt = mysqli_fetch_array($salary_head))
                                // {
                                //     $account_head_id = $salary_head_dt["0"];
                                //     $account_head_name = $salary_head_dt["1"];
                                //     $account_head_type = $salary_head_dt["2"];
                                    echo "<option value='$salary_head_id' selected>$salary_head_name</option>";

                                    
                                
                                // }
                                // echo "<input type='text' value='$account_head_id'>";
                                ?>     
                                </select>
                                
                               <input type="hidden" class="salary_add_val" name="salary_h_add_p[]" value="<?=$salary_head?>" id>
                            </div>
                    </div>
                    </td>
               <td>
                  <div class="control-group">
                        <!-- <label class="control-label">মাসিক হার</label> -->
                        <div class="controls">
                            <input type="text" class="monthly_rate_add span12 tooltips" data-trigger="hover" value="<?=round($salary_head_rate,2)?>" data-original-title="" name="monthly_rate_add[]" id="rate_monthly_add" required onkeyup="rate_add()">
                        </div>       
                 </div>
               </td>
               <td>
                <div class="control-group">
                        <!-- <label class="control-label">টাকার পরিমান</label> -->
                            <div class="controls">
                                <input type="text" class="span12 amount_add  tooltips" data-trigger="hover" data-original-title="" value="<?=$amount?>" name="salary_amount_add[]" id="amount_add" onkeyup="total_add()">
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

               
                 <!-- <div class="control-group"> -->
                <!-- <label class="control-label">আরো যোগ করুন</label> -->
                    <!-- <div class="controls">
                    <div id="" class="btn btn-danger" onclick="add_tr_remove();" style="width:75%">Remove</btn>
                </div>
                </div>
                </div>   -->
               </td>
               </tr>
               
               <?php 
               }
            }?>
            
              
               </tbody>
               </table>
               
               <div class="row-fluid">
                <div class="span3">
                    <div class="control-group">
                        <label class="control-label">টাকার পরিমান(মোট যোগ)</label>
                            <div class="controls" style="position: relative; overflow:hidden">
                                <input type="text" class="span12  tooltips" data-trigger="hover" data-original-title=""  name="total_amount_add" value="<?=$add?>" onkeyup="gross_salary();" id="total_amount_add" required>
                                <span class="btn btn-primary btn_add" onclick="total_add()" style="position: absolute;bottom: 0;right: 0;top: 0;height: 22px;">যোগ করুন  </span>
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
             <?php 
                    $employee_details_min = mysqli_query($conn,"SELECT sd.salary_head,sd.amount,sd.id FROM 
                    salary_summary as ss 
                    join salary_details as sd
                    on sd.summary_id = ss.id
                    WHERE ss.id IN (SELECT MAX(id) FROM salary_summary GROUP BY employee_id)
                    and ss.employee_id = $emp_id and sd.salary_head_type = 2");
                    $count_min_head = mysqli_num_rows($employee_details_min);
                    
                    
                        $array = array();
                        if ($employee_details_min == true) {
                            while($employee_dt = mysqli_fetch_array($employee_details_min)){
                                $salary_head_min = $employee_dt["0"];
                                $amount_m = $employee_dt["1"];
                                // $salary_min_id = $employee_dt["2"];
                                

                                $salary_head_rate_m =  (($amount_m*100)/$salary);
                                 
                                // $array = [$salary_head,$amount];
                                //  echo "<script>alert('".json_encode($employee_dt)."')</script>";
                                
                                ?>
                    
                        <tr class="default_tr_min">
                        <td>
                        <div class="control-group">
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
                                    <!-- <label class="control-label">বিবরণ</label> -->
                            <div class="controls">
                                <select class="span12" data-placeholder="" name="salary_head_min[]" id="salary_h_min" onchange="min_selected_id()" readonly> 

                                
                                <?php $salary_head_min_query = mysqli_query($conn,"SELECT account_head_id,account_head_name,account_head_type FROM account_head WHERE account_head_st = 1 AND account_head_id = $salary_head_min");

                                $salary_head_obj = mysqli_fetch_object($salary_head_min_query);
                                $salary_head_id_m = $salary_head_obj->account_head_id;
                                $salary_head_name_m = $salary_head_obj->account_head_name;
                                $type_m = $salary_head_obj->account_head_type;   
                               
                                
                                echo "<option value='$salary_head_id_m' selected>$salary_head_name_m</option>";
                                ?>             
                                
                                </select>
                                
                                        </div>
                                <input type="hidden" class="salary_min_val" name="salary_h_min_p[]" value="<?=$salary_head_min?>">   
                                </div>
                        </td>
                        <td>
                                <div class="control-group">
                                    <!-- <label class="control-label">মাসিক হার</label> --><div class="controls">
                                            <input type="text" class="monthly_rate_min span12 tooltips" data-trigger="hover" value="<?php echo round($salary_head_rate_m,2)?>" id="rate_monthly_min" data-original-title="" name="monthly_rate_min[]" required onkeyup="rate_min()">
                                        </div>
                                </div>
                        </td>
                        <td>
                                <div class="control-group">
                                    <!-- <label class="control-label">টাকার পরিমান</label> -->
                                    <div class="controls" >
                                        <input type="text" class="span12 amount_min tooltips" data-trigger="hover" data-original-title=""name="salary_amount_min[]" id="amount_min" onkeyup="total_min()" value="<?=$amount_m?>" required>
                                    
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
                    


                            <!-- <div class="control-group"> -->
                            <!-- <label class="control-label">আরো যোগ করুন</label> -->
                                <!-- <div class="controls">
                                <div id="" class="btn btn-danger" onclick="min_tr_remove();" style="width:75%">Remove</btn>
                            </div>
                            </div>
                            </div> -->
                        </td>


                        </tr>

                          
                            <?php }
                        }
                        
                        ?>
                      

            </tbody>
            </table>
     
            <div class="row-fluid">
            <div class="span3">
                <div class="control-group">
                    <label class="control-label">টাকার পরিমান (মোট আদায়)</label>
                        <div class="controls" style="position: relative; overflow:hidden">
                            <input type="text" class="span12 tooltips" data-trigger="hover" data-original-title="" onchange="gross_salary();" value="<?=$credit?>"  name="total_amount_min" id="total_amount_min" required>
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
                        <input type="text" class="span12 tooltips" data-trigger="hover" data-original-title="" value="<?=$total?>" name="total_salary" id="gross_salary" required>          
                          <span class="btn btn-primary btn_add" onclick="gross_salary()" style="position: absolute;bottom: 0;right: 0;top: 0;height: 22px;"> TOTAL GROSS SALARY </span>
                        </div>
                </div>
            </div>
            </div>
         
                
				<div class="control-group">
					<div class="controls">
						<button type="submit" class="assign_salary btn btn-danger" name="update_salary">বেতন নির্ধারণ</button>
					</div>
				</div>
			
                <input value='<?=$count_add_head?>' type='hidden' name='count_add_head'>
                <input value='<?=$count_min_head?>' type='hidden' name='count_min_head'>
            </form>
   

            <?php } ?>
            


            
		</div>
		</div>
		</div>
		</div>


</div>

</div>

<?php include 'footer.php';?>
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
</script>

<script>

var des_value = '';
$('.salary_add_val').each(function(){ 
    des_value+=this.value+',';
});
var des_value_min = '';
$('.salary_min_val').each(function(){

    des_value_min+=this.value+',';
});
    value_add_id = des_value.slice(0,-1);
    value_min_id = des_value_min.slice(0,-1);

    $('#add_salary_head_id').val(value_add_id);
    $('#store_val').val(value_add_id);
    $('#min_salary_head_id').val(value_min_id);
    $('#store_val_min').val(value_min_id); 



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
var core_salary_add=1;
function add_salary(){
     
    var objTo = document.getElementById('add_td');
    var divtest = document.createElement("tr");
    divtest.setAttribute("class", "removeclass_add"+core_salary_add);
    var rdiv = 'removeclass_add'+core_salary_add;
        divtest.innerHTML = '<td><div class="control-group"> <!-- <label class="control-label">বিবরণ</label> --> <span class="alert alert_exist'+core_salary_add+'"style="position: absolute;display:none;margin-top: -35px; margin-left: 21px;padding: 7px;font-size: 12px;font-weight: 600;background-color: #ff0c0066;color: #fff;">Option Already Exists!</span><div class="controls"> <select class="span12 salary_h_add" data-placeholder="" name="salary_head_add[]" id="salary_h_add'+core_salary_add+'" onchange="selected_id('+core_salary_add+')"> <option>Select</option> <?php $salary_head = mysqli_query($conn,"SELECT account_head_id,account_head_name,account_head_type FROM account_head WHERE account_head_st = 1 AND account_head_group = 2 AND account_head_type = 1"); if ($salary_head == true) { while ($salary_head_dt = mysqli_fetch_array($salary_head)) { $account_head_id = $salary_head_dt["0"]; $account_head_name = $salary_head_dt["1"]; $account_head_type = $salary_head_dt["2"]; echo "<option value=$account_head_id>$account_head_name</option>"; } } ?> </select> </div> </div> </td> <td> <div class="control-group"> <!-- <label class="control-label">মাসিক হার</label> --> <div class="controls"> <input type="text" class="monthly_rate_add span12 tooltips" data-trigger="hover" data-original-title="" name="monthly_rate_add[]" required onleyup="rate_ADD()"> </div> </div> </td> <td> <div class="control-group"> <!-- <label class="control-label">টাকার পরিমান</label> --> <div class="controls"> <input value="0" type="text" class="span12 amount_add tooltips" data-trigger="hover" data-original-title="" name="salary_amount_add[]" id="amount_add'+core_salary_add+'" onkeyup="total_add()"> </div> </div> </td> <td> <div class="control-group"> <!-- <label class="control-label">আরো যোগ করুন</label> --> <div class="controls"> <div id="" class="btn btn-primary" onclick="add_salary();" style="width:75%">যোগ</div> </div> </div> </td><td><div class="span12"><div class="control-group"> <div class="controls"> <span class="" type="" onclick="remove_salary_add('+ core_salary_add +');"><span class="btn btn-danger" style="width:75%"><i class="fa fa-minus-circle text-danger" aria-hidden="true"></i>&nbsp;Remove</span></span></div></div></div></td>';
    objTo.appendChild(divtest);
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
    console.log(amount_min);
}
function rate_add() { 
    var TSalary = parseFloat($('#basic_salary').val());
    var rate_add = parseFloat($('#rate_monthly_add').val());
    var amount_add = (TSalary*rate_add)/100;
    console.log(amount_add);   
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