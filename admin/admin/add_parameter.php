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
       <?php if(isset($_GET['parameter'])) { 
         if ($_GET['parameter'] == "add_parameter"){
           echo "<h4><i class='icon-tags'></i> পেরামিটার যোগ </h4>";
         }
         elseif($_GET['parameter'] == "parameter_list")
         {
            echo "<h4><i class='icon-tags'></i> পেরামিটার তালিকা </h4>";
         }
         elseif($_GET['parameter'] == "update_parameter")
         {
            echo "<h4><i class='icon-tags'></i> পেরামিটার সংশোধন </h4>";
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
                <h4 class="alert-heading">Parameter already exists!!</h4>
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

            <!-- ===Form of Parameter(add)=== -->
		<?php
		if (isset($_GET['parameter'])) {   
			$form_parameter = $_GET['parameter'];     //if clicked on add add parameter
			if ($form_parameter == "add_parameter") { ?>

		<form action="Action/add_parameter.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
            <input type="hidden" value="<?php echo $usernamee?>" name="username">
                <div class="control-group">
                    <label class="control-label">অ্যাড পেরামিটার</label>
                        <div class="controls">
                        <input type="hidden" value="<?php echo $usernamee?>" name="username" />
                            <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Add Parameter Name Here"  name="add_parameter" required>
                        </div>
                    </div>
                      <div class="control-group">
                    <label class="control-label">পেরামিটার 
মূল্য</label>
                        <div class="controls">
                            <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Enter Method Price"  name="para_price" required>
                        </div>
                    </div>
				<div class="control-group">
					<div class="controls">
						<input type="submit" name="parameter_submit_btn" value="সাবমিট ">
					</div>
				</div>
			
		   </form>
				
            <?php }
            
                // === Parameter list Select Query ====

			elseif ($form_parameter == "parameter_list") { ?> <!--  if clicked on Parameter List  -->
            <!-- <span><h3>পেরামিটার তালিকা</h3></span> -->
             <table class="table table-striped table-bordered" id="sample_1">
             <thead>
                <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1.checkboxes" /></th>
                <!-- <th>Account id</th> -->
                <th>সিরিয়াল</th>
                <th> পেরামিটার টাইটেল </th>
                <th> পেরামিটার মূল্য </th>
                <th> সংশোধন / সংযোজন </th>
               </thead>
               <tbody>
               <?php  
            //    
                 $list_parameter_tittle=mysqli_query($conn,"SELECT * from prameter_tbl where pra_st=1");	//1 = Show Data
                 if($list_parameter_tittle==true)
                 {
              	    while($row=mysqli_fetch_array($list_parameter_tittle))
              		  { 
                            $pra_id_tbl=$row['pra_id'];
                            $pra_name_tbl= $row['pra_name'];
                            $pra_price= $row['pra_price'];
                        
              	         echo "<tr>
                        <td><input type='checkbox' class='checkboxes' value='1' /></td>
                        
                        <td> $pra_id_tbl</td>
                        <td> $pra_name_tbl </td>
                        <td> $pra_price </td>
                        <td><a href='add_parameter.php?parameter=update_parameter&pra_id=$pra_id_tbl'><span class='btn btn-success btn_success_custom'>সংশোধন </span></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        
                        <a href='Action/add_parameter.php?parameter=del_prmtr&pra_id=$pra_id_tbl'>
                        <span class='btn btn-danger'>মুছে ফেলুন</span>
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>";
                        echo "</tr>";
                          
                        }}?>
                     </tbody>
            	</table>

			
				
        <?php }

			elseif ($form_parameter == "update_parameter") {

			  if (isset($_GET['pra_id'])) {
                   $prametr_id = $_GET['pra_id'];
                   
                 $edit_parameter_list=mysqli_query($conn,"SELECT * FROM prameter_tbl WHERE pra_id='$prametr_id'");
                 if($edit_parameter_list==true)
                 {
                  while($row=mysqli_fetch_array($edit_parameter_list))
                    {
                        // $pra_id_tbl=$row['pra_id'];
                        $pra_name_tbl= $row['pra_name'];
                        $pra_price= $row['pra_price'];

                    ?>
                    <form action="Action/add_parameter.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
                        <input type="hidden" value="<?php echo $usernamee ?>" name="username">
                        <input type="hidden" value="<?php echo $prametr_id ?>" name="pra_id">
                            <div class="control-group">
                                <label class="control-label">পেরামিটার নাম :</label>
                                    <div class="controls">
                                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Type Sample Name" value="<?= $pra_name_tbl?>"  name="parameter_name_update" required>
                                    </div>
                                </div>
                            <div class="control-group">
                            <label class="control-label">পেরামিটার 
মূল্য</label>
                                <div class="controls">
                                    <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Enter Method Price" value="<?=$pra_price?>" name="para_price" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="submit" name="update_submit_parameter" value="আপডেট ">
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