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
       <?php if(isset($_GET['designation'])) { 
         if ($_GET['designation'] == "add_designation"){
           echo "<h4><i class='icon-tags'></i> নতুন পদবী যোগ </h4>";
         }
         elseif($_GET['designation'] == "designation_list")
         {
            echo "<h4><i class='icon-tags'></i> পদবী তালিকা </h4>";
         }
         elseif($_GET['designation'] == "update_designation")
         {
            echo "<h4><i class='icon-tags'></i> পদবী সংশোধন  </h4>";
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
		if (isset($_GET['designation'])) {    //if add Designation found
			$designation = $_GET['designation'];     //if clicked on add Designation 
			if ($designation == "add_designation"){?>

			<form action="Action/add_designation.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
                <input type="hidden" value="<?php echo $usernamee?>" name="username">
                <div class="control-group">
                    <label class="control-label">পদবী</label>
                    <div class="controls">
                        <input type="text" class="form-control span6" id="" name="designation" placeholder="কর্মচারী পদবী" required>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="submit" name="add_designation" value="সাবমিট ">
                    </div>
                </div>
		    </form>	

			<?php }

			elseif ($designation == "designation_list") { ?> <!--  if clicked on Designation List  -->
             <table class="table table-striped table-bordered" id="sample_1">
             <thead>
                <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1.checkboxes" /></th>
                <!-- <th>Account id</th> -->
                
                <th> পদবী </th>
                <th> সংশোধন / সংযোজন </th>
               </thead>
               <tbody>
               <?php  
                 $list_designation=mysqli_query($conn,"SELECT id,designation_name from all_designation WHERE 
                 designation_st = 1");	//1 = Show Data
                 if($list_designation==true)
                 {
              	    while($data=mysqli_fetch_array($list_designation))
              		  { 
                        $designation_id = $data['0'];
                        $designation_name = $data['1'];
              	        echo "<tr>
                        <td><input type='checkbox' class='checkboxes' value='1' /></td>
                        <td> $designation_name </td>
                        <td><a href='designation.php?designation=update_designation&designation_id=$designation_id'><span class='btn btn-success btn_success_custom'>সংশোধন </span></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='Action/add_designation.php?designation_id=$designation_id&designation_delete=designation_delete'>
                        <span class='btn btn-danger'>মুছে ফেলুন</span>
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>";
                        echo "</tr>"; 
                        }}?>
                     </tbody>
            	</table>

			
				
        <?php }

			elseif ($designation == "update_designation") {

			  if (isset($_GET['designation_id'])) {
			  	 $designation_id = $_GET['designation_id'];
                 $update_designation=mysqli_query($conn,"SELECT id,designation_name FROM all_designation WHERE id='$designation_id'");  
                 if($update_designation==true)
                 {
                  while($data=mysqli_fetch_array($update_designation))
                    {
                    $designation_id = $data['0'];
                    $designation_name = $data['1'];
                    ?>
                    <form action="Action/add_designation.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
                    <input type="hidden" value="<?php echo $usernamee ?>" name="username">
                    <input type="hidden" value="<?php echo $designation_id ?>" name="designation_id">
                        <div class="control-group">
                            <label class="control-label">পদবী</label>
                            <div class="controls">
                                <input type="text" class="form-control span6" id="" name="designation" value="<?php echo $designation_name?>" placeholder="কর্মচারী পদবী" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <input type="submit" name="update_designation" value="সাবমিট ">
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