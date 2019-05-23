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
        <!--            <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">Payforearn</a>
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
            
            

            
                        <div class="row-fluid">
                <div class="span12">

                    <?php
					if(isset($_GET['edit_profile']))
					   {
						   $edit_id=$_GET['edit_user_id'];
$edit_profile="select email,contact_no,country,states,full_name,First_name,Last_name,currency,postal_code,address,id,username,date_of_birth,acc_name,acc_num,acc_num,user_level,bank_details
from ratul_login where id='$edit_id'";
$edit_profile_p=mysqli_query($conn,$edit_profile);
if($edit_profile_p==true)
                            {
						       while($edata=mysqli_fetch_array($edit_profile_p))
							           {
									    $edit_email=$edata['0']; 
										$edit_contact=$edata['1'];
										$edt_country=$edata['2']; 
										$edt_states=$edata['3'];
										$edt_fname=$edata['4'];
										$edt_f_name=$edata['5'];
										$edt_l_name=$edata['6'];
										$edt_currency=$edata['7'];
										$edt_postal=$edata['8'];
										$edt_address=$edata['9'];
										$edt_id=$edata['10'];
										$edt_uname=$edata['11'];
									    $date_of_birth=$edata['12'];
										$acc_name=$edata['13'];
										$acc_num=$edata['14'];
										$userl_lvl=$edata['15'];
										$bankd=$edata['16'];
										if($userl_lvl==4)
										   {
											 $ut="User";  
											 }
										elseif($userl_lvl==3)
										    {
											 $ut="Score Manager";  	
												}
										elseif($userl_lvl==2)
										    {
											 $ut="Game Manager";  	
												}
										else
										    {
											 $ut="Admin";  	
												}			 
									  }
							 }
						   
						  
					?>
                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Edit Profile of <?php echo $edt_uname?></h4>
                           
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->

                            <form action="Action/edit_profile.php" class="form-horizontal" method="post">
<input type="hidden" name="edit_id" value="<?php echo $edt_id?>">
                            <div class="control-group">
                                <label class="control-label">Email Address </label>
                                <div class="controls">
                                    <div class="input-icon left">
                                        <i class="icon-envelope"></i>
                                       <?php
										if($level==1)
										{
										
										?>
                                        <input type="email" placeholder="Type Email Address" class="span6  popovers" data-trigger="hover" data-content="Type Email ID" data-original-title="Email ID"  value="<?php echo $edit_email?>"name="email"  />
                                        <?php
										}
										else
										{
										?>
                                         <input type="email" placeholder="Type Email Address" class="span6  popovers" data-trigger="hover" data-content="Type Email ID" data-original-title="Email ID"  value="<?php echo $edit_email?>"name="email" readonly="readonly" />
                                        <?php	
										}
										?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Type First Name</label>
                                <div class="controls">
                               
                                        <input type="text" placeholder="Type First Name" class="span6  popovers" data-trigger="hover" data-content="Type First Name" name="first_name" value="<?php echo $edt_f_name?>" data-original-title="First Name " required />
                                  
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Type Last Name</label>
                                <div class="controls">
                               
                                        <input type="text" placeholder="Type Last Name" class="span6  popovers" data-trigger="hover" data-content="Type Last Name" name="last_name" value="<?php echo $edt_l_name?>" data-original-title="Last Name " required />
                                  
                                </div>
                            </div>
                            
                                                            <div class="control-group">
                                    <label class="control-label">Date of Birth</label>

                                    <div class="controls">
       <input id="dp1" type="text" Placeholder="12-02-2012" size="16" class="m-ctrl-medium span6  popovers" ata-trigger="hover" data-content="Type Date of Birth" name="dob" value="<?php echo $date_of_birth?>" data-original-title="Date of Birth" required />
                                    </div>
                                </div>
                            <?php
							                           
							if($level==1)
							{
							?>
                            <div class="control-group">
                                <label class="control-label">Currency</label>
                                <div class="controls">
                                    <select class="span6 chzn-select" name="curency" data-placeholder="Choose a Cuurency" tabindex="1" required>
                                        <option value="<?php echo $edt_currency?>"><?php echo $edt_currency?></option>
                                        <option value="US Dollar">US Dollar</option>
                                     
                                       

                                    </select>
                                </div>
                            </div>
                            <?php
							}
							else
							{
							?>
 <div class="control-group">
                                <label class="control-label">Currency</label>
                                <div class="controls">
                                    <select class="span6 chzn-select" name="curency" data-placeholder="Choose a Cuurency" tabindex="1" required>
                                        <option value="<?php echo $edt_currency?>"><?php echo $edt_currency?></option>

                                       

                                    </select>
                                </div>
                            </div>
                            <?php	
								
						     }
							?>
                            <?php
							if(empty($acc_name)and(empty($acc_num)))
							{
							?>
<div class="control-group">
                                <label class="control-label">Payment Process</label>
                                <div class="controls">
                               
                                        <input type="text" placeholder="Type Payment Process" class="span6  popovers" data-trigger="hover" data-content="Type Payment Process"  name="payment_process" value="<?php echo $acc_name?>" data-original-title="Type Payment Process" required="required"  />
                                  
                                </div>
                            </div>
<div class="control-group">
                                <label class="control-label">Payment Process ID</label>
                                <div class="controls">
                               
                                        <input type="text" placeholder="Type Payment Process ID" class="span6  popovers" data-trigger="hover" data-content="Type Payment Process ID"  name="payment_process_id" value="<?php echo $acc_num?>" data-original-title="Type Payment Process ID" required="required"  />
                                  
                                </div>
                            </div>
<div class="control-group">
                                <label class="control-label">Bank Details</label>
                                <div class="controls">
                               
                                        <input type="text" placeholder="Type Bank Details" class="span6  popovers" data-trigger="hover" data-content="Type Bank Details"  name="bank_det" value="<?php echo $bankd?>" data-original-title="Type Bank Details" required="required"  />
                                  
                                </div>
                            </div>
                            <?php
							}
							else
							{
							?>
<div class="control-group">
                                <label class="control-label">Payment Process</label>
                                <div class="controls">
                                <?php
								if($level==1)
								  {
									  ?>
 <input type="text" placeholder="Type Payment Process" class="span6  popovers" data-trigger="hover" data-content="Type Payment Process"  name="payment_process" value="<?php echo $acc_name?>" data-original-title="Type Payment Process"    /> 
                                      <?php
									  
									  }
								else
								 {
									?>
 <input type="text" placeholder="Type Payment Process" class="span6  popovers" data-trigger="hover" data-content="Type Payment Process"  name="payment_process" value="<?php echo $acc_name?>" data-original-title="Type Payment Process"  readonly="readonly"  /> 
                                    <?php
									 
									 } 
								?>
                                       
                                  
                                </div>
                            </div>
<div class="control-group">
                                <label class="control-label">Payment Process ID</label>
                                <div class="controls">
                               <?php
							   								if($level==1)
								  {
									  ?>
 <input type="text" placeholder="Type Payment Process ID" class="span6  popovers" data-trigger="hover" data-content="Type Payment Process ID"  name="payment_process_id" value="<?php echo $acc_num?>" data-original-title="Type Payment Process ID"   /> 
                                      <?php
								  }
								 else
								 {
									 ?>
 <input type="text" placeholder="Type Payment Process ID" class="span6  popovers" data-trigger="hover" data-content="Type Payment Process ID"  name="payment_process_id" value="<?php echo $acc_num?>" data-original-title="Type Payment Process ID" readonly="readonly"  /> 
                                     <?php
									 }
								 ?> 
							   
                                       
                                  
                                </div>
                            </div>
<div class="control-group">
                                <label class="control-label">Bank Details</label>
                                <div class="controls">
                               <?php
							   								if($level==1)
								  {
									  ?>
 <input type="text" placeholder="Type Bank Details" class="span6  popovers" data-trigger="hover" data-content="Type Bank Details"  name="bank_det" value="<?php echo $bankd?>" data-original-title="Type Bank Details"   /> 
                                      <?php
								  }
								 else
								 {
									 ?>
 <input type="text" placeholder="Type Bank Details" class="span6  popovers" data-trigger="hover" data-content="Type Bank Details"  name="bank_det" value="<?php echo $bankd?>" data-original-title="Type Bank Details" readonly="readonly"  /> 
                                     <?php
									 }
								 ?> 
							   
                                       
                                  
                                </div>
                            </div> 
                            <?php	
								
								}
							?>
                                                        <div class="control-group">
                                <label class="control-label">Address</label>
                                <div class="controls">
                                    <textarea class="span6 " name="address" rows="3"><?php echo $edt_address?></textarea>
                                </div>
                            </div>
<div class="control-group">
                                <label class="control-label">Type City Name</label>
                                <div class="controls">
                               
                                        <input type="text" placeholder="Type City Name " class="span6  popovers" data-trigger="hover" data-content="Type City Name"  name="city" value="<?php echo $edt_states?>" data-original-title="City Name "  />
                                  
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Type Country Name</label>
                                <div class="controls">
                               
                                        <input type="text" placeholder="Type Country Name " class="span6  popovers" data-trigger="hover" data-content="Type Country Name" value="<?php echo $edt_country?>" data-original-title="Country Name " name="country" required />
                                  
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Type Postal Code</label>
                                <div class="controls">
                               
                                        <input type="text" placeholder="Type Postal Code" class="span6  popovers" data-trigger="hover" data-content="Type Postal Code" value="<?php echo $edt_postal?>" data-original-title="Postal Code" name="postal_code" required />
                                  
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Type State/Region</label>
                                <div class="controls">
                               
                                        <input type="text" placeholder="Type State/Region" class="span6  popovers" data-trigger="hover" data-content="Type State/Region" value="<?php echo $edt_states?>" data-original-title="State/Region" name="region" required />
                                  
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Type Mobie No</label>
                                <div class="controls">
                               
                                        <input type="text" placeholder="Type Mobie No" class="span6  popovers" data-trigger="hover" data-content="Type Mobie No" value="<?php echo $edit_contact?>" data-original-title="Mobie No" name="mobile_no" required />
                                  
                                </div>
                            </div>
                            <?php
							if($level==1)
							{
							?>
<div class="control-group">
                                <label class="control-label">Role</label>
                                <div class="controls">
                                    <select class="span6 chzn-select" name="role" data-placeholder="Choose a Role" tabindex="1" required>
                                       
                                       <option value="<?php echo $userl_lvl?>"><?php echo $ut?></option> 
                                        <option value="1">Admin</option>

                                         <option value="4">User</option>

                                    </select>
                                </div>
                            </div>
                            <?php
							}
					else
					  {
						  
					echo "<input type='hidden' name='role' value='4'/>";	  
						 }		
							?>
                            <div class="form-actions">
                                <button type="submit" name="submit" class="btn btn-success btn_success_custom">Update</button>
                                <button type="button" class="btn">Cancel</button>
                            </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <?php
					   }
					elseif(isset($_GET['change_pass']))
					   {

						   $edit_id=$_GET['edit_user_id'];
$edit_profile="select password,id,username
from ratul_login where id='$edit_id'";
$edit_profile_p=mysqli_query($conn,$edit_profile);
if($edit_profile_p==true)
                            {
						       while($edata=mysqli_fetch_array($edit_profile_p))
							           {
									    $edit_pass=$edata['0'];										
										$edt_id=$edata['1'];
										$edt_uname=$edata['2'];

									  }
							 }
						   
						  
					?>
                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> চেইঞ্জ পাসওয়ার্ড  অফ  <?php echo $edt_uname?></h4>
                           
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->

                            <form action="Action/edit_profile.php" class="form-horizontal" method="post">
                            <input type="hidden" name="edit_id" value="<?php echo $edt_id?>">
                            <input type="hidden" name="lvl" value="<?php echo $level?>">
                            <?php
							if($level==1)
							   {
								   
								   ?>
                                        <input type="hidden" placeholder="Type Current Password" class="span6  popovers" data-trigger="hover" data-content="Type Current Password"  data-original-title="Password" name="curpassword"   />
<div class="control-group">
                                <label class="control-label">পাসওয়ার্ড</label>
                                <div class="controls">
                               
                                        <input type="password" placeholder="টাইপ পাসওকোর্ড" class="span6  popovers" data-trigger="hover" data-content="Type Password" data-original-title="Password " name="password"  required="required" />
                                  
                                </div>
                            </div> 
                            <div class="control-group">
                                <label class="control-label">কনফার্ম পাসওয়ার্ড</label>
                                <div class="controls">
                               
                                        <input type="password" placeholder="কনফার্ম পাসওয়ার্ড" class="span6  popovers" data-trigger="hover"  data-content="Type Confirm Password" name="conpass" data-original-title="Password " required />
                                  
                                </div>
                            </div> 
                                   <?php
								   
								   }
							 else
							 {  
							
							?>
<div class="control-group">
                                <label class="control-label">কারেন্ট পাসওয়ার্ড </label>
                                <div class="controls">
                               
                                        <input type="password" placeholder="Type Current Password" class="span6  popovers" data-trigger="hover" data-content="Type Current Password"  data-original-title="Password" name="curpassword"  required="required" />
                                  
                                </div>
                            </div> 
<div class="control-group">
                                <label class="control-label">পাসওয়ার্ড</label>
                                <div class="controls">
                               
                                        <input type="password" placeholder="Type Password" class="span6  popovers" data-trigger="hover" data-content="Type Password" data-original-title="Password " name="password"  required="required" />
                                  
                                </div>
                            </div> 
                            <div class="control-group">
                                <label class="control-label">কনফার্ম পাসওয়ার্ড</label>
                                <div class="controls">
                               
                                        <input type="password" placeholder="Type Confirm Password" class="span6  popovers" data-trigger="hover"  data-content="Type Confirm Password" name="conpass" data-original-title="Password " required />
                                  
                                </div>
                            </div> 
                            <?php
							 }
							?> <div class="form-actions">
                                <button type="submit" name="change_pass" class="btn btn-success btn_success_custom">আপডেট </button>
                                <button type="button" class="btn">বাতিল</button>
                            </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <?php
					      
						   
						   } 
					elseif(isset($_GET['change_tpass']))
					   {

						   $edit_id=$_GET['edit_user_id'];
$edit_profile="select t_pass,id,username
from ratul_login where id='$edit_id'";
$edit_profile_p=mysqli_query($conn,$edit_profile);
if($edit_profile_p==true)
                            {
						       while($edata=mysqli_fetch_array($edit_profile_p))
							           {
									    $edit_tpass=$edata['0'];										
										$edt_id=$edata['1'];
										$edt_uname=$edata['2'];

									  }
							 }
						   
						  
					?>
                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Change Transaction Password of <?php echo $edt_uname?></h4>
                           
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->

                            <form action="Action/edit_profile.php" class="form-horizontal" method="post">
                            <input type="hidden" name="edit_id" value="<?php echo $edt_id?>">
                              <input type="hidden" name="lvl" value="<?php echo $level?>">
                            <?php
							if($level==1)
							  {
								  
								?>
 <input type="hidden" placeholder="Type Password" class="span6  popovers" data-trigger="hover" data-content="Type Password"  data-original-title="Password " name="oldpassword" />
<div class="control-group">
                                <label class="control-label">New Transaction Password</label>
                                <div class="controls">
                               
                                        <input type="password" placeholder="Type Password" class="span6  popovers" data-trigger="hover" data-content="Type Password" data-original-title="Password " name="password"  required="required" />
                                  
                                </div>
                            </div> 
                            <div class="control-group">
                                <label class="control-label">Confirm New Transaction Password</label>
                                <div class="controls">
                               
                                        <input type="password" placeholder="Type Confirm Password" class="span6  popovers" data-trigger="hover"  data-content="Type Confirm Password" name="conpass" data-original-title="Password " required />
                                  
                                </div>
                            </div> 
                                <?php  
								  }
							 else
							 { 
							
							?>
  <div class="control-group">
                                <label class="control-label">Old Transaction Password</label>
                                <div class="controls">
                               
                                        <input type="password" placeholder="Type Password" class="span6  popovers" data-trigger="hover" data-content="Type Password"  data-original-title="Password " name="oldpassword"  required="required" />
                                  
                                </div>
                            </div> 
<div class="control-group">
                                <label class="control-label">New Transaction Password</label>
                                <div class="controls">
                               
                                        <input type="password" placeholder="Type Password" class="span6  popovers" data-trigger="hover" data-content="Type Password" data-original-title="Password " name="password"  required="required" />
                                  
                                </div>
                            </div> 
                            <div class="control-group">
                                <label class="control-label">Confirm New Transaction Password</label>
                                <div class="controls">
                               
                                        <input type="password" placeholder="Type Confirm Password" class="span6  popovers" data-trigger="hover"  data-content="Type Confirm Password" name="conpass" data-original-title="Password " required />
                                  
                                </div>
                            </div> 
                            <?php
							 }
							?>
                             <div class="form-actions">
                                <button type="submit" name="change_tpass" class="btn btn-success btn_success_custom">Update</button>
                                <button type="button" class="btn">Cancel</button>
                            </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <?php
					      
						   
						   } 
					elseif(isset($_GET['profile_pic']))
					   {

						   $edit_id=$_GET['edit_user_id'];
$edit_profile="select profile_pic,id,username
from ratul_login where id='$edit_id'";
$edit_profile_p=mysqli_query($conn,$edit_profile);
if($edit_profile_p==true)
                            {
						       while($edata=mysqli_fetch_array($edit_profile_p))
							           {
									    $edt_profile_pic=$edata['0'];										
										$edt_id=$edata['1'];
										$edt_uname=$edata['2'];

									  }
							 }
						   
						  
					?>
                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> চেইঞ্জ প্রোফাইল পিকচার অফ  <?php echo $edt_uname?></h4>
                           
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->

     <form action="Action/edit_profile.php" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="edit_id" value="<?php echo $edt_id?>">
                                                                 <div class="control-group">
                                    <label class="control-label">প্রোফাইল পিকচার : </label>
                                    <div class="controls">
                                      
              <input type="file" class="form-control" id="exampleInputPassword2" name="files[]" placeholder="">
                                    </div>
                                </div>
                              <div class="form-actions">
                                <button type="submit" name="change_pic" class="btn btn-success btn_success_custom">আপডেট  </button>
                                <button type="button" class="btn">বাতিল </button>
                            </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <?php
					      
						   
						   }
					elseif(isset($_GET['nid_up']))
					   {

						   $edit_id=$_GET['edit_user_id'];
$edit_profile="select profile_pic,id,username
from ratul_login where id='$edit_id'";
$edit_profile_p=mysqli_query($conn,$edit_profile);
if($edit_profile_p==true)
                            {
						       while($edata=mysqli_fetch_array($edit_profile_p))
							           {
									    $edt_profile_pic=$edata['0'];										
										$edt_id=$edata['1'];
										$edt_uname=$edata['2'];

									  }
							 }
						   
						  
					?>
                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Upload NID/Passport Scan  of <?php echo $edt_uname?></h4>
                           
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->

     <form action="Action/edit_profile.php" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="edit_id" value="<?php echo $edt_id?>">
                                                                 <div class="control-group">
                                    <label class="control-label">Upload Files : </label>
                                    <div class="controls">
                                      
              <input type="file" class="form-control" id="exampleInputPassword2" name="files[]" placeholder="Specifications">
                                    </div>
                                </div>
<div class="control-group">
                                <label class="control-label">File Type</label>
                                <div class="controls">
                                    <select class="span6 chzn-select" name="ftype" data-placeholder="Choose a Type" tabindex="1" required>
                                       
                                      
                                        <option value="NID">NID</option>

                                         <option value="Passport">Passport</option>

                                    </select>
                                </div>
                            </div>  
                              <div class="form-actions">
                                <button type="submit" name="nid_up" class="btn btn-success btn_success_custom">Upload </button>
                                <button type="button" class="btn">Cancel</button>
                            </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <?php
					      
						   
						   }     
					?>
                    <!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>


            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
         </div