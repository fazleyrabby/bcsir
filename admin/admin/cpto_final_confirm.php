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
       <?php if(isset($_GET['account_head'])) { 
         if ($_GET['account_head'] == "add_account_head"){
           echo "<h4><i class='icon-tags'></i> অ্যাড একাউন্ট খাত </h4>";
         }
         elseif($_GET['account_head'] == "account_head_list")
         {
            echo "<h4><i class='icon-tags'></i> একাউন্ট খাতের তালিকা </h4>";
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
    	
        if ($_GET['success'] == 'update') { // ?>
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
                <h4 class="alert-heading">তথ্য ইতিমধ্যে বিদ্যমান !</h4>
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
            // UFR (User Form Request)
		if (isset($_GET['requrmnt'])) {    
			$requrmnt_form = $_GET['requrmnt'];     //if clicked on add add sample
			if ($requrmnt_form == "add_requrmnt") { ?>

			<form action="Action/add_requirement.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
            <input type="hidden" value="<?php echo $usernamee?>" name="username">
                <div class="control-group">
                    <label class="control-label">রিকুইরেমেন্ট-টাইটেল</label>
                        <div class="controls">
                      
                            <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Add Sample name here"  name="requrmnt_name" required>
                        </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label">রিকুইরেমেন্ট-ডেসক্রিপশন</label>
                        <div class="controls">
                        
                            <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Add Sample name here"  name="requrmnt_descrb" required>
                        </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label">রিকুইরেমেন্ট-মূল্য</label>
                        <div class="controls">
                       
                            <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Add Sample name here"  name="requrmnt_price" required>
                        </div>
                    </div>
				<div class="control-group">
					<div class="controls">
						<input type="submit" name="add_requrmnt_form" value="সাবমিট" >
					</div>
				</div>
			
		   </form>
           <!-- UFR END -->
				
            <?php }

            
                    // ====FINAL CONFORMATION LIST FROM MD====

			elseif ($requrmnt_form == "final_con_list") { ?> <!--  if clicked final_con_list list   -->
            <!-- <span><h3>রিকুইরেমেন্ট তালিকা</h3></span> -->


            <table class="table table-striped table-bordered" id="sample_1">
             <thead>
             <?php  
            //  MD APPROVED LIST TO ACCOUNTS LIST SHOW
             if($level==2){?>
                    
                <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1.checkboxes" /></th>
                <!-- <th>Account id</th> -->
                <th>সিরিয়াল</th>
                <th> রিকুইরেমেন্ট টাইটেল</th>
                <th> রিকুইরেমেন্ট ডেসক্রিপশন</th>
                <th> রিকুইরেমেন্ট মূল্য</th>
                <th> স্ট্যাটাস</th>
               </thead>
               <tbody>
               <?php  
            
                    $md_con_list= mysqli_query($conn,"SELECT * 
                    FROM user_requirement
                    LEFT JOIN 
                    requirement_detalis_tbl ON requirement_detalis_tbl.id=user_requirement.user_requr_id where user_requirement.Qu_status =3");
               //1 = Show Data
                    echo"<span><h3>এমডি ফাইনাল পাঠানো কনফার্মেশন-তালিকা</h3></span>";
                    if($md_con_list==true)
                    {
                            while($row=mysqli_fetch_array($md_con_list))
                            { 
                                $reqrmnt_tbl_id=$row['id'];
                                $Qu_title= $row['Qu_title'];
                                $sender_id=$row['Qu_price'];
                                $recv_con_type=$row['Qu_descrp'];
                                
                                // $confirm_id=$row['confirm_id'];
                            
                

              	         echo "<tr>
                        <td><input type='checkbox' class='checkboxes' value='1' /></td>
                        
                        <td>$reqrmnt_tbl_id</td>
                        <td>$Qu_title </td>
                        <td>$sender_id</td>
                        <td>$recv_con_type</td>
                         <td>$confirm_id</td>
                        <td><a href='Action/add_requirement.php?approve_form=approve_requermnt&user_requr_id=$reqrmnt_tbl_id&status=4'><span class='btn btn-success'>Send</span></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        
                        <td><a href='Action/add_requirement.php?approve_form=approve_requermnt&user_requr_id=$reqrmnt_tbl_id&status=6'><span class='btn btn-success'>Reject</span></a>
                        &nbsp;&nbsp;&nbsp;
                        </td>";
                        echo "</tr>";
                        }
                                
                        }
                        }
                     

                        //  SAMIR

             elseif($level==4){  //SUBMIT FROM USER/ PENDING ON ACCOUNTS lvl = 2
                  

                    $acc_con_list=mysqli_query($conn,"SELECT * 
                    FROM user_requirement
                    LEFT JOIN 
                    requirement_detalis_tbl ON requirement_detalis_tbl.id=user_requirement.user_requr_id where user_requirement.Qu_status = 4");
   
                 echo"<span><h4>একাউন্টস কনফার্মেশন পাঠানো ফর্ম </h4></span";
                    if($acc_con_list==true)
                    {
                            while($row=mysqli_fetch_array($acc_con_list))
                            { 
                                $reqrmnt_tbl_id=$row['id'];
                                $Qu_title= $row['Qu_title'];
                                $sender_id=$row['Qu_price'];
                                $recv_con_type=$row['Qu_descrp'];
                            
              	         echo "<tr>
                        <td><input type='checkbox' class='checkboxes' value='1'/></td>
                        <td> $reqrmnt_tbl_id</td>
                        <td> $Qu_title </td>
                        <td>$sender_id</td>
                        <td> $recv_con_type</td>
                        <td><a href='Action/add_requirement.php?approve_form=approve_requermnt&user_requr_id=$reqrmnt_tbl_id&status='><span class='btn btn-success'>print</span></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        </td>";
                        echo "</tr>";
                        }
                        }
                        }

                        // USER RECV CODE End ======


                     elseif($level==0){  //APPROVE FROM ACCOUNTS/ PENDING ON MD lvl =3
                    $list_requrmnt_list=mysqli_query($conn,"SELECT * from user_requirement where Qu_status=");
                    echo"<span><h3>একাউন্টস পাঠানো ফর্ম</h3></span>";
               //1 = Show Data
                    if($list_requrmnt_list==true)
                    {
                            while($row=mysqli_fetch_array($list_requrmnt_list))
                            { 
                                $user_requr_id=$row['user_requr_id'];
                                $Qu_title= $row['Qu_title'];
                                $Qu_price=$row['Qu_price'];
                                $Qu_descrp=$row['Qu_descrp'];
                                $Qu_status=$row['Qu_status'];
                            
                

              	         echo "<tr>
                        <td><input type='checkbox' class='checkboxes' value='1' /></td>
                        
                        <td> $user_requr_id</td>
                        <td> $Qu_title </td>
                        <td>$Qu_price</td>
                        <td>$Qu_descrp</td>

                        <td><a href='Action/add_requirement.php?approve_form=approve_requermnt&user_requr_id=$user_requr_id&status=3'><span class='btn btn-success'>Approved</span></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        
                        <a href='Action/add_sample.php?del_sample=del_sam&sample_id=$sample_id_serial'>
                        <span class='btn btn-danger'>মুছে ফেলুন</span>
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>";
                        echo "</tr>";
                        }

                        }
                        }

                        elseif($level==11){  //APPROVE FROM MD/ TO ACCOUNTS lvl = 2
                            $md_send_form=mysqli_query($conn,"SELECT * from user_requirement where Qu_status = ");
                            echo"<h3>Md পাঠানো  তালিকা</h3>";
               //1 = Show Data
                    if($md_send_form==true)
                    {
                            while($row=mysqli_fetch_array($md_send_form))
                            { 
                                $user_requr_id=$row['user_requr_id'];
                                $Qu_title= $row['Qu_title'];
                                $Qu_price=$row['Qu_price'];
                                $Qu_descrp=$row['Qu_descrp'];
                                $Qu_status=$row['Qu_status'];
                            
                

              	         echo "<tr>
                        <td><input type='checkbox' class='checkboxes' value='1' /></td>
                        
                        <td> $user_requr_id</td>
                        <td> $Qu_title </td>
                        <td>$Qu_price</td>
                        <td>$Qu_descrp</td>

                         <td><a href='Action/add_requirement.php?approve_form=approve_requermnt&user_requr_id=$user_requr_id&status='><span class='btn btn-success'>Approved</span></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        
                        <a href='Action/add_sample.php?del_sample=del_sam&sample_id=$sample_id_serial'>
                        <span class='btn btn-danger'>মুছে ফেলুন</span>
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>";
                        echo "</tr>";
                        }
                        }
                        }

                            // MD TO ACCOUNTS APPROVEL LIST

                        elseif($level==11){  //FINAL APPROVE FROM ACCOUNTS/ TO USER
                        // $md_approvel_list=mysqli_query($conn,"SELECT * from requirement_detalis_tbl where  Qu_status = 4");
                        $md_approvel_list=mysqli_query($conn,"SELECT * from user_requirement where Qu_status = ");
               //1 = Show Data
                    if($md_approvel_list==true)
                    {
                            while($row=mysqli_fetch_array($md_approvel_list))
                            { 
                                $user_requr_id=$row['user_requr_id'];
                                $Qu_title= $row['Qu_title'];
                                $Qu_price=$row['Qu_price'];
                                $Qu_descrp=$row['Qu_descrp'];
                                $Qu_status=$row['Qu_status'];
                            
                

              	         echo "<tr>
                        <td><input type='checkbox' class='checkboxes' value='1' /></td>
                        
                        <td>$user_requr_id</td>
                        <td> $Qu_title </td>
                        <td>$Qu_price</td>
                        <td>$Qu_descrp</td>
                        <td><a href='Action/add_requirement.php?approve_form=approve_requermnt&user_requr_id=$user_requr_id&status='><span class='btn btn-success'>Approved</span></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        
                        <a href='Action/add_sample.php?del_sample=del_sam&sample_id=$sample_id_serial'>
                        <span class='btn btn-danger'>মুছে ফেলুন</span>
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>";
                        echo "</tr>";
                        }

                        }
                        }
                        ?>
                     </tbody>
            	</table>
                    
			
				
        <?php }
        // USR END

            // URL (USER REJECTED LIST)
          
       
            // URL END


			elseif ($requrmnt_form == "approve_formq") {

			  if (isset($_GET['user_requirement'])) {
                   $user_requirement_id = $_GET['user_requirement'];
                   
                //  $user_requirement_id=mysqli_query($conn,"SELECT * FROM sample_tbl WHERE sample_id='$sample_id'");
                 $user_approv_list=mysqli_query($conn,"UPDATE user_requirement SET Qu_status = 1 WHERE user_requirement = '$user_requirement_id'");
                 if($user_approv_list==true)
                 {
                  while($data=mysqli_fetch_array($user_approv_list))
                    {
                        $user_requr_id=$row['user_requr_id'];
                                $Qu_title= $row['Qu_title'];
                                $Qu_price=$row['Qu_price'];
                                $Qu_descrp=$row['Qu_descrp'];
                                $Qu_status=$row['Qu_status'];

                    ?>
                    <form action="Action/add_sample.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
                        <input type="hidden" value="<?php echo $usernamee ?>" name="username">
                        <input type="hidden" value="<?php echo $sample_id ?>" name="sample_id">
                            <div class="control-group">
                                <label class="control-label">Update Sample Name:</label>
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