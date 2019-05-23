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
       <?php if(isset($_GET['sample'])) { 
         if ($_GET['sample'] == "add_sample"){
           echo "<h4><i class='icon-tags'></i> নমুনা যোগ  </h4>";
         }
         elseif($_GET['sample'] == "sample_list")
         {
            echo "<h4><i class='icon-tags'></i> নমুনা তালিকা </h4>";
         }
         elseif($_GET['sample'] == "update_sample")
         {
            echo "<h4><i class='icon-tags'></i> তালিকা সংশোধন করুন  </h4>";
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
		           <div class="alert">
		            <h4 class="alert-heading">সফলভাবে সম্পন্ন</h4>
		           </div>
		        <?php 
        } 
         if ($_GET['success'] == 'error') { // ?>
		           <div class="alert">
		            <h4 class="alert-heading">ত্রুটি ঘটেছে !</h4>
		           </div>
		        <?php 
        } 
    	
        if ($_GET['success'] == ' update') { // ?>
               <div class="alert">
                <h4 class="alert-heading">সফলভাবে সংশোধন সম্পন্ন!</h4>
               </div>
            <?php 
        }
        if ($_GET['success'] == 'deleted') { // ?>
               <div class="alert">
                <h4 class="alert-heading">সফলভাবে মুছে ফেলা হয়েছে !</h4>
               </div>
            <?php 
        } 
         if ($_GET['success'] == 'data_exists') { // ?>
               <div class="alert">
                <h4 class="alert-heading">Sample already Exists!</h4>
               </div>
            <?php 
        }
        if ($_GET['success'] == 'update_success') { // ?>
               <div class="alert">
                <h4 class="alert-heading">সফলভাবে সংশোধন সম্পন্ন !</h4>
               </div>
            <?php 
        }
        if ($_GET['success'] == 'update_error') { // ?>
               <div class="alert">
                <h4 class="alert-heading">সংশোধন ত্রুটি ঘটেছে !</h4>
               </div>
             <?php }
             } ?>

		<?php
		if (isset($_GET['sample'])) {    //if add account head found
			$form_sample = $_GET['sample'];     //if clicked on add add sample
			if ($form_sample == "add_sample") { ?>
            
			<form action="Action/add_sample.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
            <input type="hidden" value="<?php echo $usernamee?>" name="username">
                <div class="control-group">
                    <label class="control-label">অ্যাড নমুনা  </label>
                        <div class="controls">
                        <input type="hidden" value="<?php echo $usernamee?>" name="username"/>
                            <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Add Sample name here"  name="add_sample" required>
                        </div>
                    </div>
				<div class="control-group">
					<div class="controls">
						<input type="submit" name="add_sample_form" value="সাবমিট ">
					</div>
				</div>
			
		   </form>
				
			<?php }
                // === Sample list Select Query ====

			elseif ($form_sample == "sample_list") { ?> <!--  if clicked on Sample List  -->
      
             <table class="table table-striped table-bordered" style="table-layout:fixed" id="sample_1">
             <thead>
                <tr>
                <!-- <th style=""><input type="checkbox" class="group-checkable" data-set="#sample_1.checkboxes" /></th> -->
                <!-- <th>Account id</th> -->
                <th>সিরিয়াল</th>
                <th width="50%"> নমুনা  টাইটেল</th>
                <th width="40%"> সংশোধন </th>
                <!-- <th width="30%"> সংযোজন </th> -->
               </thead>
               <tbody>
               <?php  
               
                 $list_sample_tittle=mysqli_query($conn,"SELECT * from sample_tbl where sample_st=1");	//1 = Show Data
                 if($list_sample_tittle==true)
                 {
              	    while($row=mysqli_fetch_array($list_sample_tittle))
              		  { 
                            $sample_id_serial=$row['sample_id'];
                            $sample_name_tbl= $row['sample_name'];
                        
                    

              	         echo "<tr>
                        
                        
                        <td> $sample_id_serial</td>
                        <td> $sample_name_tbl </td>
                        <td><a href='add_sample.php?sample=update_sample&sample_id=$sample_id_serial'><span class='btn btn-success btn_success_custom'>সংশোধন </span></a>
                       
                       
                        <a href='Action/add_sample.php?del_sample=del_sam&sample_id=$sample_id_serial'>
                        <span class='btn btn-danger'>মুছে ফেলুন</span>
                        </a></td>";
                        echo "</tr>";
                          
                        }}?>
                     </tbody>
            	</table>

			
				
        <?php }

			elseif ($form_sample == "update_sample") {

			  if (isset($_GET['sample_id'])) {
			  	 $sample_id = $_GET['sample_id'];
                 $edit_sample_list=mysqli_query($conn,"SELECT * FROM sample_tbl WHERE sample_id='$sample_id'");
                 if($edit_sample_list==true)
                 {
                  while($data=mysqli_fetch_array($edit_sample_list))
                    {
                        // $samp_id=$data['sample_id'];
                        $samp_name=$data['sample_name'];

                    ?>
                    <form action="Action/add_sample.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
                        <input type="hidden" value="<?php echo $usernamee ?>" name="username">
                        <input type="hidden" value="<?php echo $sample_id ?>" name="sample_id">
                            <div class="control-group">
                                <label class="control-label">সংশোধিত নাম:</label>
                                    <div class="controls">
                                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Type Sample Name" value="<?= $samp_name?>"  name="sample_name_update" required>
                                    </div>
                                </div>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="submit" name="update_submit_form" value="আপডেট ">
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