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
       <?php if(isset($_GET['department'])) { 
         if ($_GET['department'] == "add_department"){
           echo "<h4><i class='icon-tags'></i> নতুন শাখা যোগ </h4>";
         }
         elseif($_GET['department'] == "department_list")
         {
            echo "<h4><i class='icon-tags'></i> শাখা তালিকা </h4>";
         }
         elseif($_GET['department'] == "update_department")
         {
            echo "<h4><i class='icon-tags'></i> শাখা সংশোধন  </h4>";
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
		if (isset($_GET['department'])) {    //if add department found
			$department = $_GET['department'];     //if clicked on add department 
			if ($department == "add_department"){?>

			<form action="Action/add_department.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
                <input type="hidden" value="<?php echo $usernamee?>" name="username">
                <div class="control-group">
                    <label class="control-label">শাখা</label>
                    <div class="controls">
                        <input type="text" class="form-control span6" id="" name="department" placeholder="কর্মচারী শাখা" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">ক্রমিক নং</label>
                        <div class="controls">
                            <input type="text" class="form-control span6" id="" name="serial" placeholder="ক্রমিক নং" required>
                        </div>
                    </div>
                     <div class="control-group">
                    <label class="control-label">ধরণ </label>
                        <div class="controls">
                            <select name="type" id="" class="span6">
                               <option value="1">প্রশাসনিক</option>
                               <option value="2">গবেষণা</option>
                            </select>
                        </div>
                    </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="submit" name="add_department" value="সাবমিট ">
                    </div>
                </div>
		    </form>	

			<?php }

			elseif ($department == "department_list") { ?> <!--  if clicked on department List  -->
             <table class="table table-striped table-bordered" id="sample_1">
             <thead>
                <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1.checkboxes" /></th>
                <!-- <th>Account id</th> -->
                <th> ক্রমিক </th>
                <th> শাখা </th>
                <th> ধরণ </th>
                <th> সংশোধন / সংযোজন </th>
               </thead>
               <tbody>
               <?php  
                 $list_department=mysqli_query($conn,"SELECT id,department_name,serial,type FROM all_department WHERE department_st = 1");	//1 = Show Data
                 if($list_department==true)
                 {
              	    while($data=mysqli_fetch_array($list_department))
              		  { 
                        // echo "<pre>";
                        // print_r($data);
                        $department_id = $data['0'];
                        $department_name = $data['1'];
                        $serial = $data['2'];
                        $type = $data['3'];

                        if ($type == 1) {
                            $type_name = 'প্রশাসনিক';
                        }
                        elseif($type == 2){
                            $type_name  = 'গবেষণা';
                        }
                        else{
                            $type_name = '';
                        }

                        //$b = htmlentities($department_name);
              	        echo "<tr>
                        <td><input type='checkbox' class='checkboxes' value='1' /></td>
                        <td> $serial </td>
                        <td> $department_name </td>
                        <td> $type_name </td>
                        <td><a href='department.php?department=update_department&department_id=$department_id'><span class='btn btn-success btn_success_custom'>সংশোধন </span></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='Action/add_department.php?department_id=$department_id&department_delete=department_delete'>
                        <span class='btn btn-danger'>মুছে ফেলুন</span>
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>";
                        echo "</tr>"; 
                        }}?>
                     </tbody>
            	</table>

			
				
        <?php }

			elseif ($department == "update_department") {

			  if (isset($_GET['department_id'])) {
			  	 $department_id = $_GET['department_id'];
                 $update_department=mysqli_query($conn,"SELECT id,department_name,serial,type FROM all_department WHERE id='$department_id'");  
                 if($update_department==true)
                 {
                  while($data=mysqli_fetch_array($update_department))
                    {
                      
                    $department_id = $data['0'];
                    $department_name = $data['1'];
                    $serial = $data['2'];
                    $type = $data['3'];
                    //  print_r($data);
                    ?>
                    <form action="Action/add_department.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
                    <input type="hidden" value="<?php echo $usernamee ?>" name="username">
                    <input type="hidden" value="<?php echo $department_id ?>" name="department_id">
                        <div class="control-group">
                            <label class="control-label">শাখা</label>
                            <div class="controls">
                                <input type="text" class="form-control span6" id="" name="department" value="<?php echo $department_name?>" placeholder="কর্মচারী শাখা" required>
                            </div>
                        </div>
                        <div class="control-group">
                    <label class="control-label">ক্রমিক নং</label>
                        <div class="controls">
                            <input type="text" class="form-control span6" id="" name="serial" placeholder="ক্রমিক নং" value="<?php echo "$serial"?>" required>
                        </div>
                    </div>
                     <div class="control-group">
                    <label class="control-label">ধরণ</label>
                        <div class="controls">
                            <select name="type" id="">
                               <option value="1"<?php if($type == 1){echo " selected";}?>>প্রশাসনিক</option>
                               <option value="2"<?php if($type == 2){echo " selected";}?>>গবেষণা</option>
                            </select>
                        </div>
                    </div>
                        <div class="control-group">
                            <div class="controls">
                                <input type="submit" name="update_department" value="সাবমিট ">
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


