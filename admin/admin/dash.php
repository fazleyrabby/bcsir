<?php
include 'function.php';
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
            
                   <?php
				   }
				   ?>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->

				   
                   <!-- <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">BCSIR</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           Dashboard
                       </li>
                    
                   </ul> -->
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <input type="hidden" id="menutype" value="<?=$_GET['menu_type']?>">
            
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
                        if ($_SESSION['menu_type'] == 'other_payment') 
                        {
                            echo "<span> অন্যান্য সেবা পেমেন্ট <span class='sidebar_quote'>(বাম পাশের মেনু থেকে বাছাই করুন)</span></span> ";
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
    </div>
    
            <style>
            
            </style>
                    <div class="metro-nav">
                       <h4> নিচের অপশনগুলো থেকে বাছাই করুন </h4>
                       <?php if ($level == 1) {?>
                          <div class="metro-nav-block nav-block-yellow research" id="research">
                            <a data-original-title="" href="<?php echo $baseurl?>admin_add.php?add_admin=add_admin">
                                <i class="icon-book"></i>
                                <!-- <div class="info">+970</div> -->
                                <div class="status">অ্যাডমিন যোগ</div>
                            </a>
                        </div>
                       <?php }?>
                        <div class="metro-nav-block nav-block-blue profile_update" id="profile_update">
                        <a data-original-title="" href='<?=$baseurl?>profile_update.php?&menu_type=profile_update&employee_id=<?=$employee_login_id?>'>
                            <i class="icon-cog"></i>
                            <!-- <div class="info">321</div> -->
                            <div class="status">
                                <?php if($level == 1)
                                // {
                                //     echo "পাসওয়ার্ড পরিবর্তন";
                                // }
                                // else {
                                //     echo "প্রোফাইল";
                                // }
                                ?>
                                প্রোফাইল
                            </div>
                        </a>
                    </div>

                    <div class="metro-nav">
                        <div class="metro-nav-block nav-deep-thistle user_details" id="user_details">
                        <a data-original-title="" href="<?php echo $baseurl?>dashboard.php?menu_type=user_details">
                            <i class="icon-cogs"></i>
                            <!-- <div class="info">321</div> -->
                            <div class="status" style='bottom: 0px'>ব্যবহারকারীর বিবরণ (অনলাইন সেবা)</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-orange web" id="web">
                        <a data-original-title="" href="<?php echo $baseurl?>dashboard.php?menu_type=web">
                            <i class="icon-qrcode"></i>
                            <!-- <div class="info">321</div> -->
                            <div class="status">ওয়েব সংক্রান্ত আপডেট</div>
                        </a>
                    </div>
                    <!-- <div class="metro-nav-block nav-olive">
                        <a data-original-title="" href="<//?php echo $baseurl?>dashboard.php?menu_type=account">
                            <i class="icon-tags"></i>
                          
                            <div class="status">একাউন্ট </div>
                        </a>
                    </div> -->
                     <div class="metro-nav-block nav-block-yellow research" id="research">
                        <a data-original-title="" href="<?php echo $baseurl?>dashboard.php?menu_type=research">
                            <i class="icon-book"></i>
                            <!-- <div class="info">+970</div> -->
                            <div class="status">গবেষণা</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-light-brown salary" id="salary">
                        <a data-original-title="" href="<?php echo $baseurl?>dashboard.php?menu_type=salary">
                            <i class="icon-money"></i>
                            <!-- <div class="info">49</div> -->
                            <div class="status">বেতন ব্যবস্থাপনা </div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-green test" id="test">
                        <a data-original-title="" href="<?php echo $baseurl?>dashboard.php?menu_type=test">
                            <i class="icon-beaker"></i>
                            <!-- <div class="info">+897</div> -->
                            <?php 
                                $sql = mysqli_query($conn,"SELECT * from user_application where application_st=0");
                                $rows = mysqli_num_rows($sql);
                            ?>
                            <div class="info"><?=$rows?></div>
                            <div class="status">বিশ্লেষণ সেবা সংক্রান্ত</div>
                        </a>
                    </div>
                    <!-- <div class="metro-nav-block nav-block-green">
                        <a data-original-title="" href="<//?php echo $baseurl?>dashboard.php?menu_type=all_tests">
                            <i class="icon-eye-open"></i>
                            <div class="info">+897</div>
                            <div class="status">সকল টেস্ট এপ্লিকেশন</div>
                        </a>
                    </div> -->
                    <div class="metro-nav-block nav-light-purple cpto" id="cpto">
                        <a data-original-title="" href="<?php echo $baseurl?>dashboard.php?menu_type=cpto">
                            <i class="icon-list-alt"></i>
                            <!-- <div class="info">+288</div> -->
                            <div class="status">ক্রয়(বাজেট)</div>
                            
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-grey employee" id="employee">
                        <a data-original-title="" href="<?php echo $baseurl?>dashboard.php?menu_type=employee">
                            <i class="icon-group"></i>
                            <!-- <div class="info">+288</div> -->
                            <div class="status">কর্মকর্তা / কর্মচারী</div>
                            
                        </a>
                    </div>
                     <div class="metro-nav-block nav-block-custom other_payment" id="other_payment">
                        <a data-original-title="" href="<?php echo $baseurl?>dashboard.php?menu_type=other_payment">
                            <i class="icon-credit-card"></i>
                            <?php 
                                $sql = mysqli_query($conn,"SELECT * from other_payment where transaction_st=0");
                                $rows = mysqli_num_rows($sql);
                            ?>
                            <div class="info"><?=$rows?></div>
                            <div class="status">অন্যান্য সেবা পেমেন্ট</div>
                            
                        </a>
                    </div>

                    <!-- <div class="metro-nav-block nav-block-blue assign_salary_grade">
                        <a data-original-title="" href="</?php echo $baseurl?>dashboard.php?menu_type=assign_salary_grade">
                            <i class="icon-bar-chart"></i>
                           
                            <div class="status">শ্রেণীর বেতন ভাতার হার</div>
                            
                        </a>
                    </div> -->

                   
                </div>
                    </div>       
  




            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
    </div>