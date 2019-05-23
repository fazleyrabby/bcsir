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
                                <span class="color-red" data-style="red"></span>
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
                     Dashboard
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                          <a href="#">Donate For Help</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           Dashboard
                       </li>
                       
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            
            

            
                        <div class="row-fluid">
                <div class="span12">
                                    <!-- BEGIN ALERTS PORTLET-->

    <?php
    if (isset($_GET['success'])) {
		//  // echo" <div class='widget orange'><div class='widget-body'>";
       if ($_GET['success'] == 'userexists') { // ?>
           <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                                <button data-dismiss="alert" class="close">×</button>
                                <h4 class="alert-heading">তথ্য ইতিমধ্যে বিদ্যমান !</h4>
                            </div>
        <?php 
		}
           
            elseif ($_GET['success'] == 'success') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">সফলভাবে সম্পন্ন হয়েছে  !</h4> 
                            </div>
        <?php 
		}   
             elseif ($_GET['success'] == 'sucessmailfailed') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">সফলভাবে সম্পন্ন হয়েছে </h4>  মেইল সার্ভার ত্রুটি !
                            </div>
        <?php 
		}   
               
        
    }
	
    ?>
                            
<!--                            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                <h4 class="alert-heading">Success!</h4> You successfully read this important message.
                            </div>
                            <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                <h4 class="alert-heading">Info!</h4> Heads up! This alert needs your attention.
                            </div>
                            <div class="alert alert-error">
                                <button data-dismiss="alert" class="close">×</button>
                                <h4 class="alert-heading">ত্রুটি ঘটেছে !</h4> Change a few things. Please submit again.
                            </div> -->
                       
                    <!-- END ALERTS PORTLET-->
                    <!-- BEGIN SAMPLE FORMPORTLET-->
                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Add New User</h4>
                           
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
                            <?php
							if(isset($_GET['add_member']))
							      {
								  $sp_id=$_GET['spid'];
								   
								   }
							?>
                            <form action="Action/registration.php" class="form-horizontal" method="post">
                            
                            
                            

                            
                            <div class="control-group">
                                <label class="control-label">Sponsor Id</label>
                                <div class="controls">
                                    <input type="text" placeholder="Type Sponsor ID" class="span6  popovers" data-trigger="hover" data-content="Type Sponsor ID" value="<?php echo $sp_id;?>" name="sponsor" data-original-title="Sponsor ID" required="required" />
                                </div>
                            </div>
                            <input type="hidden" name="position" value="Left" />
                            
                           <div class="control-group">
                                <label class="control-label">Username</label>
                                <div class="controls">
                                  
                                       
                                        <input type="text" placeholder="Type Username" class="span6  popovers" data-trigger="hover" data-content="Type Username"  name="username" data-original-title="Username " required="required" />
                                    
                                </div>
                            </div>
<div class="control-group">
                                <label class="control-label">Password</label>
                                <div class="controls">
                               
                                        <input type="password" placeholder="Type Password" class="span6  popovers" data-trigger="hover" data-content="Type Password" data-original-title="Password " name="password"  required="required" />
                                  
                                </div>
                            </div> 
                            <div class="control-group">
                                <label class="control-label">Confirm Password</label>
                                <div class="controls">
                               
                                        <input type="password" placeholder="Type Confirm Password" class="span6  popovers" data-trigger="hover" data-content="Type Confirm Password" name="conpass" data-original-title="Password " required="required" />
                                  
                                </div>
                            </div> 
<div class="control-group">
                                <label class="control-label">Transaction Password</label>
                                <div class="controls">
                               
                                        <input type="password" placeholder="Type Transaction Password" class="span6  popovers" data-trigger="hover" data-content="Type Transaction Password" name="tpass" data-original-title="Transaction Password " required="required" />
                                  
                                </div>
                            </div>
<div class="control-group">
                                <label class="control-label">Confirm Transaction Password</label>
                                <div class="controls">
                               
                                        <input type="password" placeholder="Type Confirm Transaction Password" class="span6  popovers" data-trigger="hover" data-content="Type Transaction Password" name="contpass" data-original-title="Confirm Transaction Password " required="required" />
                                  
                                </div>
                            </div> 
                            <div class="control-group">
                                <label class="control-label">Email Address </label>
                                <div class="controls">
                                    <div class="input-icon left">
                                        <i class="icon-envelope"></i>
                                        <input type="email" placeholder="Type Email Address" class="span6  popovers" data-trigger="hover" data-content="Type Email ID" data-original-title="Email ID" name="email" required="required" />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Type First Name</label>
                                <div class="controls">
                               
                                        <input type="text" placeholder="Type First Name" class="span6  popovers" data-trigger="hover" data-content="Type First Name" name="first_name" data-original-title="First Name " required="required" />
                                  
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Type Last Name</label>
                                <div class="controls">
                               
                                        <input type="text" placeholder="Type Last Name" class="span6  popovers" data-trigger="hover" data-content="Type Last Name" name="last_name" data-original-title="Last Name " required="required" />
                                  
                                </div>
                            </div>
                            
                                                            <div class="control-group">
                                    <label class="control-label">Date of Birth</label>

                                    <div class="controls">
       <input id="dp1" type="text" Placeholder="12-02-2012" size="16" class="m-ctrl-medium span6  popovers" ata-trigger="hover" data-content="Type Date of Birth" name="dob" data-original-title="Date of Birth" required="required" />
                                    </div>
                                </div>
                            
                            <div class="control-group">
                                <label class="control-label">Currency</label>
                                <div class="controls">
                                    <select class="span6 chzn-select" name="curency" data-placeholder="Choose a Currency" tabindex="1" required>
                                     
                                        <option value="US Dollar">US Dollar</option>
                                       
                                       

                                    </select>
                                </div>
                            </div>
                                                        <div class="control-group">
                                <label class="control-label">Address</label>
                                <div class="controls">
                                    <textarea class="span6 " name="address" rows="3"></textarea>
                                </div>
                            </div>
<div class="control-group">
                                <label class="control-label">Type City Name</label>
                                <div class="controls">
                               
                                        <input type="text" placeholder="Type City Name " class="span6  popovers" data-trigger="hover" data-content="Type City Name"  name="city" data-original-title="City Name "  />
                                  
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Type Country Name</label>
                                <div class="controls">
                               
                                        <input type="text" placeholder="Type Country Name " class="span6  popovers" data-trigger="hover" data-content="Type Country Name" data-original-title="Country Name " name="country" required="required" />
                                  
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Type Postal Code</label>
                                <div class="controls">
                               
                                        <input type="text" placeholder="Type Postal Code" class="span6  popovers" data-trigger="hover" data-content="Type Postal Code" data-original-title="Postal Code" name="postal_code" required="required" />
                                  
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Type State/Region</label>
                                <div class="controls">
                               
                                        <input type="text" placeholder="Type State/Region" class="span6  popovers" data-trigger="hover" data-content="Type State/Region" data-original-title="State/Region" name="region" required="required" />
                                  
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Type Mobie No</label>
                                <div class="controls">
                               
                                        <input type="text" placeholder="Type Mobie No" class="span6  popovers" data-trigger="hover" data-content="Type Mobie No" data-original-title="Mobie No" name="mobile_no" required="required" />
                                  
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
                            <div class="control-group">
                                <label class="control-label"> I agree with terms and conditions</label>
                                <div class="controls">
                               <input type="checkbox" name="agreement" required="required" />
                                  Accept 
                                  
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" name="submit" class="btn btn-success btn_success_custom">Submit</button>
                                <button type="button" class="btn">Cancel</button>
                            </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>


            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
         </div