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
                           <a href="#">Bitstump</a>
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
						if(isset($_GET['fund']))
						       {
							    $f_type=$_GET['f_type'];
								if($f_type==1)
								  {
									  ?>
<div class="span12">
                                    <!-- BEGIN ALERTS PORTLET-->

    <?php
    if (isset($_GET['success'])) {
		 // echo" <div class='widget orange'><div class='widget-body'>";
       if ($_GET['success'] == 'submit') { // ?>
           <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                                <button data-dismiss="alert" class="close">×</button>
                                <h4 class="alert-heading">Warning!</h4>Please submit the Button..!
                            </div>
        <?php 
		}
           
            elseif ($_GET['success'] == 'success') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Success!</h4> Token Added Successfully Done..!
                            </div>
        <?php 
		}   
             elseif ($_GET['success'] == 'admin_transfer_failed') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4>  Transfer by admin Failed...!
                            </div>
        <?php 
		}   
             elseif ($_GET['success'] == 'invalid_id') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4>  Invalid Transfer ID...!
                            </div>
        <?php 
		}    
		  
		          elseif ($_GET['success'] == 'insufficient_balance') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4>  you Dont have sufficient balance...!
                            </div>
        <?php 
		} 
                  elseif ($_GET['success'] == 'user_transfer_success') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Success!</h4> Transfer by <?php echo $usernamee?> Successfully Done....!
                            </div>
        <?php 
		} 
                  elseif ($_GET['success'] == 'user_transfer_failed') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4> Transfer by <?php echo $usernamee?> Faileds....!
                            </div>
        <?php 
		}
                  elseif ($_GET['success'] == 'invalid_tpin') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4> Invalid Transaction Pin Provided !
                            </div>
        <?php 
		}  
                  elseif ($_GET['success'] == 'minimum_balance') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4> Transfer cant be less than 2 Euro!
                            </div>
        <?php 
		}     		         
       
    }
	echo" </div>
                    </div>";
    ?>

                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Add Token to User</h4>

                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->

                            <form action="Action/admin_direct_Deposit.php" class="form-horizontal" method="post">
                            <?php
							echo "<input type='hidden' name='level' value='$level'>";
						    echo "<input type='hidden' name='curent_point' value='$gwallet'>";
					        echo "<input type='hidden' name='tpassm' value='$tpassm'>";
							   echo "<input type='hidden' name='ftype' value='$f_type'>";
							?>                            
                            
                    <?php
					if($level==1)
					    {
							
							?>
						<div class="control-group">
                                <label class="control-label">User ID</label>
                                <div class="controls">
                <select class="span6 chzn-select" name="sender" data-placeholder="Choose a User ID" tabindex="1" required>
                                    <?php
									$se="select username from ratul_login where user_level=4";
									$se_p=mysqli_query($conn,$se);
									if($se_p==true)
									      {
											while($sdata=mysqli_fetch_array($se_p))
											       {
													   $sender_name=$sdata['0'];
													echo"<option>$sender_name</option>";   
													   
													 }  
										   }
									
									?> 


                                    </select>
                                </div>
                            </div>	
                            <?php
							
					     }
				    else
					    {
						   ?>
                           <div class="control-group">
                                <label class="control-label">User Id</label>
                                <div class="controls">
                                    <input type="text" placeholder="Type Sender Id" class="span6  popovers" data-trigger="hover" data-content="Type Sender ID" value="<?php echo $usernamee;?>" name="sender" data-original-title="Sender ID" required readonly />
                                </div>
                            </div>
                           <?php	
							
					    }		
					
					?>
   
                     <div class="control-group">
                                <label class="control-label">Token</label>
                                <div class="controls">
                                    <input type="text" placeholder="Type Token (1,2,3)" class="span6  popovers" data-trigger="hover" data-content="Type Amount"  name="amount" min="0" data-original-title="Type Point"  required />
                                </div>
                            </div>       
                            
                           
                              <div class="form-actions">
                                <button type="submit" name="submitc" class="btn btn-success btn_success_custom">Submit</button>
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
									  elseif($f_type==2)
									  {
										  
									  ?>
<div class="span12">
                                    <!-- BEGIN ALERTS PORTLET-->

    <?php
    if (isset($_GET['success'])) {
		 // echo" <div class='widget orange'><div class='widget-body'>";
       if ($_GET['success'] == 'submit') { // ?>
           <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                                <button data-dismiss="alert" class="close">×</button>
                                <h4 class="alert-heading">Warning!</h4>Please submit the Button..!
                            </div>
        <?php 
		}
           
            elseif ($_GET['success'] == 'success') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Success!</h4> Point Added Successfully Done..!
                            </div>
        <?php 
		}   
             elseif ($_GET['success'] == 'admin_transfer_failed') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4>  Transfer by admin Failed...!
                            </div>
        <?php 
		}   
             elseif ($_GET['success'] == 'invalid_id') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4>  Invalid Transfer ID...!
                            </div>
        <?php 
		}    
		  
		          elseif ($_GET['success'] == 'insufficient_balance') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4>  you Dont have sufficient balance...!
                            </div>
        <?php 
		} 
                  elseif ($_GET['success'] == 'user_transfer_success') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Success!</h4> Transfer by <?php echo $usernamee?> Successfully Done....!
                            </div>
        <?php 
		} 
                  elseif ($_GET['success'] == 'user_transfer_failed') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4> Transfer by <?php echo $usernamee?> Faileds....!
                            </div>
        <?php 
		}
                  elseif ($_GET['success'] == 'invalid_tpin') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4> Invalid Transaction Pin Provided !
                            </div>
        <?php 
		}  
                  elseif ($_GET['success'] == 'minimum_balance') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4> Transfer cant be less than 2 Euro!
                            </div>
        <?php 
		}     		         
       
    }
	echo" </div>
                    </div>";
    ?>

                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Add Point to Admin</h4>

                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->

                            <form action="Action/admin_direct_Deposit.php" class="form-horizontal" method="post">
                            <?php
							echo "<input type='hidden' name='level' value='$level'>";
						    echo "<input type='hidden' name='curent_point' value='$gwallet'>";
					        echo "<input type='hidden' name='tpassm' value='$tpassm'>";
							   echo "<input type='hidden' name='ftype' value='$f_type'>";
							?>                            
                            
                    <?php
					if($level==1)
					    {
							
							?>
						<div class="control-group">
                                <label class="control-label">User ID</label>
                                <div class="controls">
                <select class="span6 chzn-select" name="sender" data-placeholder="Choose a User ID" tabindex="1" required>
                                    <?php
									$se="select username from ratul_login where user_level=1";
									$se_p=mysqli_query($conn,$se);
									if($se_p==true)
									      {
											while($sdata=mysqli_fetch_array($se_p))
											       {
													   $sender_name=$sdata['0'];
													echo"<option>$sender_name</option>";   
													   
													 }  
										   }
									
									?> 


                                    </select>
                                </div>
                            </div>	
                            <?php
							
					     }
				    else
					    {
						   ?>
                           <div class="control-group">
                                <label class="control-label">User Id</label>
                                <div class="controls">
                                    <input type="text" placeholder="Type Sender Id" class="span6  popovers" data-trigger="hover" data-content="Type Sender ID" value="<?php echo $usernamee;?>" name="sender" data-original-title="Sender ID" required readonly />
                                </div>
                            </div>
                           <?php	
							
					    }		
					
					?>
   
                     <div class="control-group">
                                <label class="control-label">Point</label>
                                <div class="controls">
                                    <input type="text" placeholder="Type Point" class="span6  popovers" data-trigger="hover" data-content="Type Amount"  name="amount" min="0" data-original-title="Type Point"  required />
                                </div>
                            </div>       
                            
                           
                              <div class="form-actions">
                                <button type="submit" name="submitc" class="btn btn-success btn_success_custom">Submit</button>
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
									  elseif($f_type==3)
									  {
										  
									  ?>
<div class="span12">
                                    <!-- BEGIN ALERTS PORTLET-->

    <?php
    if (isset($_GET['success'])) {
		 // echo" <div class='widget orange'><div class='widget-body'>";
       if ($_GET['success'] == 'submit') { // ?>
           <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                                <button data-dismiss="alert" class="close">×</button>
                                <h4 class="alert-heading">Warning!</h4>Please submit the Button..!
                            </div>
        <?php 
		}
           
            elseif ($_GET['success'] == 'success') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Success!</h4> Point Added Successfully Done..!
                            </div>
        <?php 
		}   
             elseif ($_GET['success'] == 'admin_transfer_failed') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4>  Transfer by admin Failed...!
                            </div>
        <?php 
		}   
             elseif ($_GET['success'] == 'invalid_id') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4>  Invalid Transfer ID...!
                            </div>
        <?php 
		}    
		  
		          elseif ($_GET['success'] == 'insufficient_balance') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4>  you Dont have sufficient balance...!
                            </div>
        <?php 
		} 
                  elseif ($_GET['success'] == 'user_transfer_success') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Success!</h4> Transfer by <?php echo $usernamee?> Successfully Done....!
                            </div>
        <?php 
		} 
                  elseif ($_GET['success'] == 'user_transfer_failed') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4> Transfer by <?php echo $usernamee?> Faileds....!
                            </div>
        <?php 
		}
                  elseif ($_GET['success'] == 'invalid_tpin') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4> Invalid Transaction Pin Provided !
                            </div>
        <?php 
		}  
                  elseif ($_GET['success'] == 'minimum_balance') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4> Transfer cant be less than 2 Euro!
                            </div>
        <?php 
		}     		         
       
    }
	echo" </div>
                    </div>";
    ?>

                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Add Point to Depo</h4>

                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->

                            <form action="Action/admin_direct_Deposit.php" class="form-horizontal" method="post">
                            <?php
							echo "<input type='hidden' name='level' value='$level'>";
						    echo "<input type='hidden' name='curent_point' value='$gwallet'>";
					        echo "<input type='hidden' name='tpassm' value='$tpassm'>";
							   echo "<input type='hidden' name='ftype' value='$f_type'>";
							?>                            
                            
                    <?php
					if($level==1)
					    {
							
							?>
						<div class="control-group">
                                <label class="control-label">User ID</label>
                                <div class="controls">
                <select class="span6 chzn-select" name="sender" data-placeholder="Choose a User ID" tabindex="1" required>
                                    <?php
									$se="select username from ratul_login where user_level=3";
									$se_p=mysqli_query($conn,$se);
									if($se_p==true)
									      {
											while($sdata=mysqli_fetch_array($se_p))
											       {
													   $sender_name=$sdata['0'];
													echo"<option>$sender_name</option>";   
													   
													 }  
										   }
									
									?> 


                                    </select>
                                </div>
                            </div>	
                            <?php
							
					     }
				    else
					    {
						   ?>
                           <div class="control-group">
                                <label class="control-label">User Id</label>
                                <div class="controls">
                                    <input type="text" placeholder="Type Sender Id" class="span6  popovers" data-trigger="hover" data-content="Type Sender ID" value="<?php echo $usernamee;?>" name="sender" data-original-title="Sender ID" required readonly />
                                </div>
                            </div>
                           <?php	
							
					    }		
					
					?>
   
                     <div class="control-group">
                                <label class="control-label">Point</label>
                                <div class="controls">
                                    <input type="text" placeholder="Type Point" class="span6  popovers" data-trigger="hover" data-content="Type Amount"  name="amount" min="0" data-original-title="Type Point"  required />
                                </div>
                            </div>       
                            
                           
                              <div class="form-actions">
                                <button type="submit" name="submitc" class="btn btn-success btn_success_custom">Submit</button>
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
 elseif($f_type==4)
									  {
										  
									  ?>
<div class="span12">
                                    <!-- BEGIN ALERTS PORTLET-->

    <?php
    if (isset($_GET['success'])) {
		 // echo" <div class='widget orange'><div class='widget-body'>";
       if ($_GET['success'] == 'submit') { // ?>
           <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                                <button data-dismiss="alert" class="close">×</button>
                                <h4 class="alert-heading">Warning!</h4>Please submit the Button..!
                            </div>
        <?php 
		}
           
            elseif ($_GET['success'] == 'success') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Success!</h4> Point Added Successfully Done..!
                            </div>
        <?php 
		}   
             elseif ($_GET['success'] == 'admin_transfer_failed') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4>  Transfer by admin Failed...!
                            </div>
        <?php 
		}   
             elseif ($_GET['success'] == 'invalid_id') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4>  Invalid Transfer ID...!
                            </div>
        <?php 
		}    
		  
		          elseif ($_GET['success'] == 'insufficient_balance') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4>  you Dont have sufficient balance...!
                            </div>
        <?php 
		} 
                  elseif ($_GET['success'] == 'user_transfer_success') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Success!</h4> Transfer by <?php echo $usernamee?> Successfully Done....!
                            </div>
        <?php 
		} 
                  elseif ($_GET['success'] == 'user_transfer_failed') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4> Transfer by <?php echo $usernamee?> Faileds....!
                            </div>
        <?php 
		}
                  elseif ($_GET['success'] == 'invalid_tpin') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4> Invalid Transaction Pin Provided !
                            </div>
        <?php 
		}  
                  elseif ($_GET['success'] == 'minimum_balance') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4> Transfer cant be less than 2 Euro!
                            </div>
        <?php 
		}     		         
       
    }
	echo" </div>
                    </div>";
    ?>

                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Add Point to Dealer</h4>

                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->

                            <form action="Action/admin_direct_Deposit.php" class="form-horizontal" method="post">
                            <?php
							echo "<input type='hidden' name='level' value='$level'>";
						    echo "<input type='hidden' name='curent_point' value='$gwallet'>";
					        echo "<input type='hidden' name='tpassm' value='$tpassm'>";
							   echo "<input type='hidden' name='ftype' value='$f_type'>";
							?>                            
                            
                    <?php
					if($level==1)
					    {
							
							?>
						<div class="control-group">
                                <label class="control-label">User ID</label>
                                <div class="controls">
                <select class="span6 chzn-select" name="sender" data-placeholder="Choose a User ID" tabindex="1" required>
                                    <?php
									$se="select username from ratul_login where user_level=3";
									$se_p=mysqli_query($conn,$se);
									if($se_p==true)
									      {
											while($sdata=mysqli_fetch_array($se_p))
											       {
													   $sender_name=$sdata['0'];
													echo"<option>$sender_name</option>";   
													   
													 }  
										   }
									
									?> 


                                    </select>
                                </div>
                            </div>	
                            <?php
							
					     }
				    else
					    {
						   ?>
                           <div class="control-group">
                                <label class="control-label">User Id</label>
                                <div class="controls">
                                    <input type="text" placeholder="Type Sender Id" class="span6  popovers" data-trigger="hover" data-content="Type Sender ID" value="<?php echo $usernamee;?>" name="sender" data-original-title="Sender ID" required readonly />
                                </div>
                            </div>
                           <?php	
							
					    }		
					
					?>
   
                     <div class="control-group">
                                <label class="control-label">Point</label>
                                <div class="controls">
                                    <input type="text" placeholder="Type Point" class="span6  popovers" data-trigger="hover" data-content="Type Amount"  name="amount" min="0" data-original-title="Type Point"  required />
                                </div>
                            </div>       
                            
                           
                              <div class="form-actions">
                                <button type="submit" name="submitc" class="btn btn-success btn_success_custom">Submit</button>
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
							   }
						?>
                
            </div>


            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
         </div