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
                     Dashboard
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                            <a href="#">Bitsump</a>
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
                        <?php
						if(isset($_GET['reply']))
						       {
							  $sup_id=$_GET['sup_id']; 
$ser="select id,user_name,category,subject,message,replay,support_status,support_date
from user_support where id='$sup_id'";
$se=mysqli_query($conn,$ser);	
if($se==true)
							    {
								  while($sdata=mysqli_fetch_array($se))
								      {
					
					$sid=$sdata['0'];
					$suser=$sdata['1'];
					$scatagory=$sdata['2'];
					$ssubject=$sdata['3'];
					$smessge=$sdata['4'];
					$sreply=$sdata['5'];
					$sstatus=$sdata['6'];
					//below for sending Email

					
					//upper for sending Email
					if($sstatus==0)
					   {
						   $r="<span style='color:red;font-size:14px;font-family:verdana;'>Pedning</span>";
						   $a="<a href='manage_support.php?sup_id=$sid&reply=reply'>Reply Now</a>";
						   }
					 else
					 {
						 $r="<span style='color:green;font-size:14px;font-family:verdana;'>Solved</span>";
						 $a="Already Replied";
						 }  
					$s_date=$sdata['7'];
									  }
								}
							  ?>
<div class="span12">
                                    <!-- BEGIN ALERTS PORTLET-->

    <?php
    if (isset($_GET['success'])) {
		 // echo" <div class='widget orange'><div class='widget-body'>";
       if ($_GET['success'] == 'true') { // ?>
           <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                <h4 class="alert-heading">Success !</h4>Your Request Submitted Successfully!..!
                            </div>
        <?php 
		}
           
            elseif ($_GET['success'] == 'false') { // ?>
            <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Soory !</h4> Failed to Submit Request....!
                            </div>
        <?php 
		}   
           
               
        
    }
	echo" </div>
                    </div>";
    ?>
                            

                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Manage Support</h4>
                           
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->

                            <form action="Action/manage_user_support_action.php" class="form-horizontal" method="post">
                            <input type="hidden" name="support_id" value="<?php echo $sid; ?>">
                            
                            

                            
                            <div class="control-group">
                                <label class="control-label">Username</label>
                                <div class="controls">
                                    <input type="text" placeholder="Type Username" class="span6  popovers" data-trigger="hover" data-content="Type User Name" value="<?php echo $suser;?>" name="username" data-original-title="User Name" readonly />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Catagory</label>
                                <div class="controls">
                <select class="span6 chzn-select" name="support_type" data-placeholder="Choose a Catagory" tabindex="1" required>
                               <option value="<?php echo $scatagory?>" ><?php echo $scatagory?></option>
                            

                                    </select>
                                </div>
                            </div>
                           <div class="control-group">
                                <label class="control-label">Subject </label>
                                <div class="controls">
                                  
                                       
                                        <input type="text" placeholder="Type subject" class="span6  popovers" data-trigger="hover" data-content="Type subject"  name="subject" data-original-title="Username " value="<?php echo $ssubject?>" readonly="readonly"/>
                                    
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Message</label>
                                <div class="controls">
                                    <textarea class="span6" name="message" rows="3" readonly="readonly"><?php echo $smessge?>
                                    </textarea>
                                </div>
                            </div> 
<div class="control-group">
                                <label class="control-label">Reply</label>
                                <div class="controls">
                                    <textarea class="span6" name="reply" rows="3"><?php echo $sreply?>
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" name="support_request_reply" class="btn btn-success btn_success_custom">Submit</button>
                                <button type="button" class="btn">Cancel</button>
                            </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
                </div>
                              <?php
							   }
							   else
							   {
							   
						?>
                <div class="span12">
                                    <!-- BEGIN ALERTS PORTLET-->

    <?php
    if (isset($_GET['success'])) {
		 // echo" <div class='widget orange'><div class='widget-body'>";
       if ($_GET['success'] == 'true') { // ?>
           <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                <h4 class="alert-heading">Success !</h4>Your Request Submitted Successfully!..!
                            </div>
        <?php 
		}
           
            elseif ($_GET['success'] == 'false') { // ?>
            <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Soory !</h4> Failed to Submit Request....!
                            </div>
        <?php 
		}   
           
               
        
    }
	echo" </div>
                    </div>";
    ?>
                            

                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Manage Support</h4>
                           
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->

                            <form action="Action/manage_user_support_action.php" class="form-horizontal" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $id; ?>">
                            
                            

                            
                            <div class="control-group">
                                <label class="control-label">Username</label>
                                <div class="controls">
                                    <input type="text" placeholder="Type Username" class="span6  popovers" data-trigger="hover" data-content="Type User Name" value="<?php echo $usernamee;?>" name="username" data-original-title="User Name" readonly />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Catagory</label>
                                <div class="controls">
                <select class="span6 chzn-select" name="support_type" data-placeholder="Choose a Catagory" tabindex="1" required>
                               <option value="Financial" >Financial</option>
                            <option value="Technical" >Technical</option>
                            <option value="General" selected>General</option>

                                    </select>
                                </div>
                            </div>
                           <div class="control-group">
                                <label class="control-label">Subject </label>
                                <div class="controls">
                                  
                                       
                                        <input type="text" placeholder="Type subject" class="span6  popovers" data-trigger="hover" data-content="Type subject"  name="subject" data-original-title="Username " required />
                                    
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Message</label>
                                <div class="controls">
                                    <textarea class="span6" name="message" rows="3"></textarea>
                                </div>
                            </div> 

                            <div class="form-actions">
                                <button type="submit" name="support_request" class="btn btn-success btn_success_custom">Submit</button>
                                <button type="button" class="btn">Cancel</button>
                            </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
                </div>
                <?php
							   }
				?>
            </div>


            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
         </div