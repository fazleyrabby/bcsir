<?php
include 'function.php';;
?>
<div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
               
                   <!-- BEGIN THEME CUSTOMIZER-->
                <?php
				   if($level==1)
				   {
				   ?> 
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
                   <?php
				   }
				   ?>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                    


 
                   </h3>
				   
 
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
			            				               <div class="row-fluid">
                <div class="span12 ">
                    <!-- BEGIN widget widget-->
                       <div class="widget green">
                        <div class="widget-title">
                            
                       <div class="active_menu_dash">
                        <?php 
                        if ($_SESSION['menu_type'] == 'dashboard' or !$_SESSION['menu_type']) 
                        {
                            echo "<span>  ড্যাশবোর্ড  </span> <span></span>";
                        }
                        if ($_SESSION['menu_type'] == 'web') 
                        {
                            echo "<span> ওয়েব সংক্রান্ত আপডেট </span> <span class='sidebar_quote'>(বাম পাশের মেনু থেকে বাছাই করুন)</span>";
                        }
                        if ($_SESSION['menu_type'] == 'profile_update') 
                        {
                            if ($level == 1) {
                            echo "<span> পাসওয়ার্ড আপডেট </span> ";
                            } 
                            else {
                            echo "<span>প্রোফাইল আপডেট </span>";
                            }
                        }
                        if ($_SESSION['menu_type'] == 'test' or $_SESSION['menu_type'] == 'all_tests_usr') 
                        {
                            echo "<span> বিশ্লেষণ সেবা  </span> <span class='sidebar_quote'>(বাম পাশের মেনু থেকে বাছাই করুন)</span>";
                        } 
                        if ($_SESSION['menu_type'] == 'user_details') 
                        {
                            echo "<span> ব্যবহারকারীর বিবরণ (অনলাইন সেবা সংক্রান্ত ) </span> <span class='sidebar_quote'>(বাম পাশের মেনু থেকে বাছাই করুন)</span>";
                        } 
                        if ($_SESSION['menu_type'] == 'research') 
                        {
                            echo "<span> গবেষণা </span> <span class='sidebar_quote'>(বাম পাশের মেনু থেকে বাছাই করুন)</span>";
                        } 
                        if ($_SESSION['menu_type'] == 'salary') 
                        {
                            echo "<span> বেতন ব্যবস্থাপনা  </span> <span class='sidebar_quote'>(বাম পাশের মেনু থেকে বাছাই করুন)</span>";
                        } 
                        if ($_SESSION['menu_type'] == 'cpto' or $_SESSION['menu_type']== 'cpto_usr') 
                        {
                            echo "<span> ক্রয় </span> <span class='sidebar_quote'>(বাম পাশের মেনু থেকে বাছাই করুন)</span>";
                        } 
                        if ($_SESSION['menu_type'] == 'employee') 
                        {
                            echo "<span> কর্মকর্তা / কর্মচারী </span> <span class='sidebar_quote'>(বাম পাশের মেনু থেকে বাছাই করুন)</span>";
                        } 
                        if ($_SESSION['menu_type'] == 'assign_salary_grade') 
                        {
                            echo "<span> শ্রেণীর বেতন ভাতার হার <span class='sidebar_quote'>(বাম পাশের মেনু থেকে বাছাই করুন)</span></span> ";
                        } 
                        
                        ?>
                        
                        

                        </div>
                        </div>

                    </div>
                    <!-- END widget widget-->
                </div>
				</div>

                     <div class="row-fluid">
                    <div class="span12">
<?php
    if (isset($_GET['success'])) {
		  echo"";
       if ($_GET['success'] == 'success_profile_fail') { // ?>
           <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                                <button data-dismiss="alert" class="close">×</button>
                                <h4 class="alert-heading">Soory !</h4>Profile Failed to Update..!
                            </div>
        <?php 
		}
           
            elseif ($_GET['success'] == 'success_profile_update') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Success!</h4> Profile Successfully Updated !
                            </div>
        <?php 
		}   
             elseif ($_GET['success'] == 'success_pass_update') { // ?>
           <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Success!</h4> Password Changed Successfully !
                            </div>
        <?php 
		}   
             elseif ($_GET['success'] == 'success_pass_fail') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Soory !</h4> Password Failed to Changed !
                            </div>
        <?php 
		}  
             elseif ($_GET['success'] == 'old_pass_wrong') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Soory !</h4> Given Old Password is not Right !
                            </div>
        <?php 
		}
             elseif ($_GET['success'] == 'old_tpass_wrong') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Soory !</h4> Given Old Transaction Password is not Right !
                            </div>
        <?php 
		}
		
            elseif ($_GET['success'] == 'success_tpass_update') { // ?>
           <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Success!</h4>Transaction  Password Changed Successfully !
                            </div>
        <?php 
		}   
             elseif ($_GET['success'] == 'success_tpass_fail') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Soory !</h4>Transaction Password Failed to Changed !
                            </div>
        <?php 
		}
		             elseif ($_GET['success'] == 'picture_select') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Soory !</h4>Please Select a Piture !
                            </div>
        <?php 
		}
		             elseif ($_GET['success'] == 'picture_large') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Soory !</h4>Please Select a Piture Size in 512 KB !
                            </div>
        <?php 
		} 
		             elseif ($_GET['success'] == 'picture_invalid') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Soory !</h4>Please Select a Valid Picture Format jpeg,PNG,png,JPEG !
                            </div>
        <?php 
		} 
            elseif ($_GET['success'] == 'picture_success') { // ?>
           <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Success!</h4>Profile Picture সফলভাবে সংশোধন সম্পন্ন ! !
                            </div>
        <?php 
		}  
            elseif ($_GET['success'] == 'picture_success_nid') { // ?>
           <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Success!</h4>Document Uploaded Successfully !
                            </div>
        <?php 
		}    
		             
		             elseif ($_GET['success'] == 'submit_failed') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Please !</h4>Submit a Button !
                            </div>
        <?php 
		} 
    }
	echo"";
    ?>
                    </div>
                    </div>       
<input type="hidden" id="menutype" value="<?=$_GET['menu_type']?>">
                <div class="row-fluid">
                    <div class="span12">
                  <div class="metro-nav">
                    <div class="metro-nav-block nav-block-blue profile_update">
                        <a data-original-title="" href='<?=$baseurl?>profile_update.php?&menu_type=profile_update&employee_id=<?=$employee_login_id?>'>
                            <i class="icon-user"></i>
                            <!-- <div class="info">321</div> -->
                            <div class="status">প্রোফাইল</div>
                            
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-green all_tests_usr test">
                        <a data-original-title="" href="<?php echo $baseurl?>dashboard.php?menu_type=all_tests_usr">
                            <i class="icon-eye-open"></i>
                            <!-- <div class="info">+897</div> -->
                            <?php 
                                $sql = mysqli_query($conn,"SELECT * from user_application join all_payment_transactions on user_application.all_p_id=all_payment_transactions.id where all_payment_transactions.sender='$usernamee' and (application_st=1 or application_st=2)");
                                $rows = mysqli_num_rows($sql);
                                // echo "$rows";
                            ?>
                            <div class="info"><?=$rows?></div>
                            <div class="status">বিশ্লেষণ সেবা সংক্রান্ত</div>
                        </a>
                    </div>
          
                    <div class="metro-nav-block nav-light-purple cpto_usr cpto">
                        <a data-original-title="" href="<?php echo $baseurl?>dashboard.php?menu_type=cpto_usr">
                            
                            <?php 
                            $notification = mysqli_query($conn,"SELECT user_req.*,rdt.recv_con_id from user_requirement as user_req join requirement_detalis_tbl as rdt on 
                            user_req.user_requr_id = rdt.form_pk_id WHERE user_req.Qu_status = 1 and rdt.recv_con_id=$id");
                            
                            $notification_list = mysqli_num_rows($notification);
                            echo "<div class='info'>$notification_list</div>"
                            ?>
                            <i class="icon-bar-chart"></i>
                            <!-- <div class="info">+288</div> -->
                            <div class="status">ক্রয়(বাজেট)</div>

                            <span></span>
                            
                        </a>
                    </div>
                <?php if($level == 6 || $level == 3) { //for sceintist only ?>
                    <div class="metro-nav-block nav-olive">
                        <a data-original-title="" href="<?php echo $baseurl?>dashboard.php?menu_type=research">
                            <i class="icon-tags"></i>
                            <!-- <div class="info">+970</div> -->
                            <div class="status">গবেষণা</div>
                        </a>
                    </div>
                        <?php }if($level == 2) {
                        ?>
                           <div class="metro-nav-block nav-light-brown salary" id="salary">
                        <a data-original-title="" href="<?php echo $baseurl?>dashboard.php?menu_type=salary">
                            <i class="icon-money"></i>
                            <!-- <div class="info">49</div> -->
                            <div class="status">বেতন ব্যবস্থাপনা </div>
                        </a>
                    </div>
                        <?php } ?>

                         <div class="metro-nav-block nav-block-custom other_payment" id="other_payment">
                        <a data-original-title="" href="<?php echo $baseurl?>dashboard.php?menu_type=other_payment">
                            <i class="icon-credit-card"></i>
                            <?php 
                                $sql = mysqli_query($conn,"SELECT * from other_payment where username='$usernamee' and (transaction_st=4 or transaction_st=5)");
                                $rows = mysqli_num_rows($sql);
                            ?>
                            <div class='info'><?php echo $rows?></div>
                            <!-- <div class="info">+288</div> -->
                            <div class="status">অন্যান্য সেবা পেমেন্ট</div>
                            
                        </a>
                    </div>
                   
                </div>
           
                        <!--below for metro dashboard-->
                <!-- <div class="row-fluid">
                    <div class="span12">
                        <div class="widget">
                            <div class="widget-title">
                                <h4><i class="icon-th-large"></i> Dashboard </h4>
                           <span class="tools">
                               <a href="javascript:;" class="icon-chevron-down"></a>
                               <a href="javascript:;" class="icon-remove"></a>
                           </span>
                            </div>
                            <div class="widget-body">
                            
                                <div class="row-fluid">
                           
                                    <div class="metro-nav">
                                        
                                        <div class="metro-nav-block nav-block-orange">
                                            <a data-original-title="" href="#">
                                            
                                                <div class="info"></?php echo $cwallet?> </div>
                                                <div class="status">Total Test </div>
                                            </a>
                                        </div>
                                        
                                        <div class="metro-nav-block nav-olive">
                                            <a data-original-title="" href="#">
                                                <div class="info"></?php echo $rmnt;?></div>
                                                <div class="status">Today Test</div>
                                            </a>
                                        </div>
                                        <div class="metro-nav-block nav-deep-terques">
                                            <a data-original-title="" href="#">
                                                <div class="info"></?php echo $rmnt?></div>
                                                <div class="status">Total Application</div>
                                            </a>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="clearfix"></div>
                
                            </div>
                        </div>
                    </div>
                </div> -->
                        
                        <!--upper for metro dashboard-->
                    </div>
                </div>

            


            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
         </div