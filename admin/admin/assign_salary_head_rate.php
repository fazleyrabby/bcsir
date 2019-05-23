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
                   <!-- <h3 class="page-title">
                     ড্যাশবোর্ড 
                   </h3> -->
  
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->

	<div class="widget red">
     <div class="widget-title">
       <?php if(isset($_GET['assign_salary_head'])) { 
         if ($_GET['assign_salary_head'] == "add_rate"){
           echo "<h4><i class='icon-tags'></i> বেতন ভাতার খাতের রেট যোগ </h4>";
         }
         elseif($_GET['assign_salary_head'] == "rate_list")
         {
            echo "<h4><i class='icon-tags'></i> বেতন ভাতার খাতের রেট তালিকা </h4>";
         }
         elseif($_GET['assign_salary_head'] == "update_salary_head_rate")
         {
            echo "<h4><i class='icon-tags'></i> বেতন ভাতার খাতের রেট সংশোধন  </h4>";
         }

         
        }
        ?>
     	</div>
     <div class="widget-body">
      <div class="row-fluid">
     <div class="span12">
           <?php
		    if (isset($_GET['success'])) {
				//  // echo" <div class='widget orange'><div class='widget-body'>";
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
                <h4 class="alert-heading">
নাম বা সিরিয়াল ইতিমধ্যে বিদ্যমান !</h4>
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
		if (isset($_GET['assign_salary_head'])) {    //if add account head found
			$assign_salary_head = $_GET['assign_salary_head'];     //if clicked on add account head 
			if ($assign_salary_head == "add_rate"){ ?>

			<form action="Action/assign_salary_head_rate.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
            <input type="hidden" value="<?php echo $usernamee?>" name="username">
                <div class="control-group">
                    <label class="control-label">কর্মচারী শ্রেণী </label>
                    <div class="controls">
                        <select class="span6 chzn-select" data-placeholder="কর্মচারী শ্রেণী " tabindex="1" name="employee_grade">
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
                    <label class="control-label">বেতন ভাতার ধরণ</label>
                        <div class="controls">
                            <select class="span6 chzn-select" data-placeholder="বাছাই করুন" name="salary_head_type" id="salary_head_type" onchange="all_salary_head()" required>
                            <option value=""></option>
                            <option value="1">ভাতা যোগ</option>
                            <option value="2">আদায়</option>
                            </select>
                        </div>
                </div>

                <div class="control-group">
                    <label class="control-label">বেতন ভাতার নাম</label>
                        <div class="controls">
                            <select class="span6 chzn-select salary_head_names" data-placeholder="বাছাই করুন" name="salary_head_names" id="salary_head_names" required>
                            </select>
                        </div>
                </div>
             
                <div class="control-group">
                <label class="control-label">মাসিক হার</label>
                    <div class="controls">
                        <input type="text" class="form-control span6" id="monthly_rate" name="monthly_rate" value="" placeholder="" required>
                    </div>
                </div>
               
				<div class="control-group">
					<div class="controls">
						<input type="submit" name="add_assign_rate" value="সাবমিট ">
					</div>
				</div>
			
		   </form>
		
			<?php }

			elseif ($assign_salary_head == "rate_list") { ?> 

            <!-- <h3>বেতন ভাতা</h3> -->
             <table class="table table-striped table-bordered" id="sample_1">
             <thead>
                <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1.checkboxes" /></th>
                <!-- <th>Account id</th> -->
                <!-- <th> ক্রমিক </th> -->
                <th> শ্রেণী </th>
                <th> বেতন খাত নাম</th>
                <th> ভাতার ধরণ </th>
                <th> মাসিক হার </th>
                <th> সংশোধন / সংযোজন </th>
               </thead>
               <tbody>
               <?php  
                 $salary_head_rate=mysqli_query($conn,"SELECT id,grade_id,salary_head_id,rate from assign_salary_grade WHERE rate_st = 1");	
                
                 if($salary_head_rate==true)
                 {
              	    while($data=mysqli_fetch_array($salary_head_rate))
              		  { 
                        $id=$data['0'];
                        $grade_id=$data['1'];
                        $salary_head_id=$data['2'];
                        $rate=$data['3'];
                     
                        {     
                        $bn_digits=array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
                        $output_rate = str_replace(range(0, 9),$bn_digits, $rate); 
                        //Numerical Value Conversion
                        }
                        echo "<tr><td></td> ";
                        $grade_name=mysqli_query($conn,"SELECT grade_name from all_employee_grade WHERE grade_st = 1 and id = $grade_id");
                        if ($grade_name == true) {
                            while ($grade_data=mysqli_fetch_array($grade_name)){
                                $gd_name = $grade_data["0"];
                                echo "<td>$gd_name</td>";
                            }
                        }
                        $salary_head=mysqli_query($conn,"SELECT account_head_name,account_head_type from account_head WHERE account_head_id = $salary_head_id");
                        if ($salary_head == true) {
                            while ($salary_data=mysqli_fetch_array($salary_head)) {
                                $salary_name = $salary_data["0"];
                                $salary_type = $salary_data["1"];
                                {
                                    if($salary_type == 1){ $type = "যোগ";}elseif($salary_type == 2){ $type = "আদায়";}  
                                }
                                echo "<td>$salary_name</td><td>$type</td>";
                            }
                        }
                        

                        echo "<td>$output_rate%</td>";
              	        echo"<td><a href='assign_salary_head_rate.php?assign_salary_head=update_salary_head_rate&rate_id=$id'><span class='btn btn-success btn_success_custom'>সংশোধন </span></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='Action/assign_salary_head_rate.php?rate_id=$id&rate_delete=rate_delete'>
                        <span class='btn btn-danger'>মুছে ফেলুন</span>
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>";
                        echo "</tr>"; 
                        }}?>
                     </tbody>
            	</table>
           	
        <?php }

			elseif ($assign_salary_head == "update_salary_head_rate") {

			  if (isset($_GET['rate_id'])) {
                   $rate_id = $_GET['rate_id'];
                   
                 $edit_rate=mysqli_query($conn,"SELECT grade_id,salary_head_id,rate,salary_head_type FROM assign_salary_grade WHERE id='$rate_id'");  
                 if($edit_rate==true)
                 {
                  while($data=mysqli_fetch_array($edit_rate))
                    {
                    $assign_grade_id=$data['0'];
                    $assign_salary_head_id=$data['1'];
                    $assign_rate=$data['2'];
                    $salary_head_type=$data['3'];
                    
                    ?>
              		<form action="Action/assign_salary_head_rate.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
                        <input type="hidden" value="<?php echo $usernamee?>" name="username">
                        <input type="hidden" value="<?php echo $rate_id?>" name="rate_id">
                            <div class="control-group">
                                <label class="control-label">কর্মচারী শ্রেণী </label>
                                <div class="controls">
                                        <?php $all_emp_grade = mysqli_query($conn,"SELECT grade_name as g_name from all_employee_grade where id = $assign_grade_id");
                                        $grade_obj = mysqli_fetch_object($all_emp_grade);
                                        $grade_name = $grade_obj->g_name;
                                        echo "<input type='text' class='span6' value='$grade_name' readonly>";
                                        ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">বেতন ভাতার ধরণ</label>
                                    <div class="controls">
                                        <?php
                                        {
                                            if($salary_head_type == 1 ){
                                                $value = "ভাতা যোগ";
                                            }
                                            elseif($salary_head_type == 2 ){
                                                $value = "আদায়";
                                            }
                                            echo "<input type='text' class='span6' value='$value' readonly>";
                                        }
                                        ?>
                                        
                                        
                                    </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">বেতন ভাতার নাম</label>
                                    <div class="controls">
                                       <?php
                                       $salary_head=mysqli_query($conn,"SELECT account_head_name as salary_head_name from account_head WHERE account_head_id = $assign_salary_head_id");
                                       $salary_head_obj = mysqli_fetch_object($salary_head);
                                       $salary_head_name = $salary_head_obj->salary_head_name;
                                       echo "<input type='text' class='span6' value='$salary_head_name' readonly>";
                                       ?>
                                    </div>
                            </div>
                        
                            <div class="control-group">
                            <label class="control-label">মাসিক হার</label>
                                <div class="controls">
                                    <input type="text" class="form-control span6" id="monthly_rate" name="monthly_rate" value="<?php echo $assign_rate?>" placeholder="" required>
                                </div>
                            </div>
                        
                            <div class="control-group">
                                <div class="controls">
                                    <input type="submit" name="edit_assign_salary" value="সাবমিট ">
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



<script>
 function all_salary_head(){
    var salary_head_type= $("#salary_head_type").val();
    console.log(salary_head_type);
    $.ajax({
        url : 'get_salary_head_list.php',
        type : 'POST',
        data : {salary_head_type: salary_head_type},
        success: function(result)
        {
            
            $('#salary_head_names').html(result);
            $(".salary_head_names").trigger("liszt:updated");
            
        } 
    })
    }

</script>



<?php include 'footer.php';?>

