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
                 
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->

	<div class="widget red">
     <div class="widget-title">
       <?php if(isset($_GET['employee_grade'])){ 
         if ($_GET['employee_grade'] == "add_employee_grade"){
           echo "<h4><i class='icon-tags'></i> নতুন শ্রেণী যোগ </h4>";
         }
         elseif($_GET['employee_grade'] == "employee_grade_list")
         {
            echo "<h4><i class='icon-tags'></i> শ্রেণী তালিকা </h4>";
         }
         elseif($_GET['employee_grade'] == "update_employee_grade")
         {
            echo "<h4><i class='icon-tags'></i> শ্রেণী সংশোধন  </h4>";
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
		            <h4 class="alert-heading">সফলভাবে সম্পন্ন হয়েছে !</h4>
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
                <h4 class="alert-heading">সফলভাবে সংশোধন সম্পন্ন !</h4>
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
                <h4 class="alert-heading"> নাম বা সিরিয়াল ইতিমধ্যে বিদ্যমান !</h4>
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
                <h4 class="alert-heading"> সংশোধন ত্রুটি ঘটেছে  !</h4>
               </div>
            <?php 
        }
				echo""; } ?>

		<?php
		if (isset($_GET['employee_grade'])) {    //if add employee_grade found
			$employee_grade = $_GET['employee_grade'];     //if clicked on add employee_grade 
			if ($employee_grade == "add_employee_grade"){?>

			<form action="Action/add_employee_grade.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
                <input type="hidden" value="<?php echo $usernamee?>" name="username">
                <div class="control-group">
                    <label class="control-label">কর্মচারী শ্রেণী</label>
                    <div class="controls">
                        <input type="text" class="form-control span6" id="" name="employee_grade" placeholder="কর্মচারী শ্রেণী" required>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="submit" name="add_employee_grade" value="সাবমিট">
                    </div>
                </div>
		    </form>	

			<?php }

			elseif ($employee_grade == "employee_grade_list") { ?> <!--  if clicked on employee_grade List  -->
             <table class="table table-striped table-bordered" id="sample_1">
             <thead>
                <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1.checkboxes" /></th>
                <!-- <th>Account id</th> -->
                <th> উপাধি </th>
                <th> সংশোধন / সংযোজন </th>
               </thead>
               <tbody>
               <?php  
                 $list_employee_grade=mysqli_query($conn,"SELECT id,grade_name from all_employee_grade WHERE grade_st = 1");	//1 = Show Data
                 if($list_employee_grade==true)
                 {
              	    while($data=mysqli_fetch_array($list_employee_grade))
              		  { 
                        $employee_grade_id = $data['0'];
                        $employee_grade_name = $data['1'];
              	        echo "<tr>
                        <td><input type='checkbox' class='checkboxes' value='1' /></td>
                        <td> $employee_grade_name </td>
                        <td><a href='add_employee_grade.php?employee_grade=update_employee_grade&employee_grade_id=$employee_grade_id'><span class='btn btn-success btn_success_custom'>সংশোধন</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='Action/add_employee_grade.php?employee_grade_id=$employee_grade_id&employee_grade_delete=employee_grade_delete'>
                        <span class='btn btn-danger'>মুছে ফেলুন</span>
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>";
                        echo "</tr>"; 
                        }}?>
                     </tbody>
            	</table>

			
				
        <?php }

			elseif ($employee_grade == "update_employee_grade") {

			  if (isset($_GET['employee_grade_id'])) {
			  	 $employee_grade_id = $_GET['employee_grade_id'];
                 $update_employee_grade=mysqli_query($conn,"SELECT id,grade_name FROM all_employee_grade WHERE id='$employee_grade_id'");  
                 if($update_employee_grade==true)
                 {
                  while($data=mysqli_fetch_array($update_employee_grade))
                    {
                    $employee_grade_id = $data['0'];
                    $employee_grade_name = $data['1'];
                    ?>
                    <form action="Action/add_employee_grade.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
                    <input type="hidden" value="<?php echo $usernamee ?>" name="username">
                    <input type="hidden" value="<?php echo $employee_grade_id?>" name="id">
                        <div class="control-group">
                            <label class="control-label">পদবী</label>
                            <div class="controls">
                                <input type="text" class="form-control span6" id="" name="employee_grade" value="<?php echo $employee_grade_name?>" placeholder="কর্মচারী পদবী" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <input type="submit" name="update_employee_grade" value="সাবমিট ">
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