<?php 
if (isset($_GET['menu_type'])) {
    $menu_type = $_GET['menu_type'];
 if ($menu_type != "") {
  $_SESSION['menu_type'] = $menu_type;
 }
}
if (isset($_GET['usr'])) {
   $login_type = $_GET['usr'];
   $_SESSION['login_type'] = $login_type;
}

?>

  <style>
       /* .custom_hr
       {
          margin: 0;
          padding: 0;
          border-top: 0;
          border-bottom : 1px solid white;
       } */
  </style>
<div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar-scroll">
        <div id="sidebar" class="nav-collapse collapse">

         <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
    
         <!-- END RESPONSIVE QUICK SEARCH FORM -->
         <!-- BEGIN SIDEBAR MENU -->
          <ul class="sidebar-menu">

            <li class="sub-menu" style="display:none">
                  <a class="" href="#">
                  <!-- </?php if($pic != '') {?>
                         <span><img src="</?php echo "Action/uploads/".$pic?>" width="45px" height="65px" alt="" style="border-radius: 50% !important;"></span>
                       </?php }
                       ?>   -->
            <?php
            if($status==1)
            {
              if($package_id==1)
              {
            echo "<span style='color:white;font-size: 17px;     font-weight:bold'>$usernamee</span>";
              }
              else
              {
              echo "<span style='color:white;font-weight:bold;font-size: 17px'>$usernamee</span>";   
              }
            }
            else
            {
                  echo "<span style='color:white;font-size: 17px;font-weight:bold'>$usernamee</span>";
            }
            
            
            ?>
                  </a>
              </li>
              
              <li class="active_menu">
              <?php 
              if ($_SESSION['menu_type'] == 'dashboard') 
              {
                echo "<span>  </span> ";
              }
              if ($_SESSION['menu_type'] == 'web') 
              {
                echo "<span class='web_select'> ওয়েব সংক্রান্ত আপডেট </span> ";
              }
              if ($_SESSION['menu_type'] == 'profile_update') 
              {
                if ($level == 1) {
                 echo "<span class='password_select'> পাসওয়ার্ড আপডেট </span> ";
                } 
                else {
                 echo "<span class='profile_select'> প্রোফাইল আপডেট </span>";
                }
              }
              if ($_SESSION['menu_type'] == 'test' or $_SESSION['menu_type'] == 'all_tests_usr') 
              {
                echo "<span class='test_select'> বিশ্লেষণ সেবা  </span> ";
              } 
              if ($_SESSION['menu_type'] == 'user_details') 
              {
                echo "<span class='user_details_select'> ব্যবহারকারীর বিবরণ </span> ";
              } 
              if ($_SESSION['menu_type'] == 'research') 
              {
                echo "<span class='research_select'> গবেষণা </span> ";
              } 
              if ($_SESSION['menu_type'] == 'salary') 
              {
                echo "<span class='salary_select'> বেতন </span> ";
              } 
              if ($_SESSION['menu_type'] == 'cpto' or $_SESSION['menu_type']== 'cpto_usr') 
              {
                echo "<span class='cpto_select'> ক্রয় </span> ";
              } 
              if ($_SESSION['menu_type'] == 'employee') 
              {
                echo "<span class='employee_select'> কর্মকর্তা / কর্মচারী </span> ";
              } 
              if ($_SESSION['menu_type'] == 'assign_salary_grade') 
              {
                echo "<span class=''> শ্রেণীর বেতন ভাতার হার </span> ";
              } 
              if ($_SESSION['menu_type'] == 'other_payment') 
              {
                echo "<span class='other_payment_select'> অন্যান্য সেবা পেমেন্ট </span> ";
              } 
              ?>
              <input type="hidden" id="color_id" value="<?=$_SESSION['menu_type']?>">
              </li>
              
              <?php 
              if ($_SESSION['login_type'] != 'cpto' && $_SESSION['login_type'] != 'app' && $_SESSION['login_type'] != 'accounts' && $_SESSION['login_type'] != 'other_payment_usr') { ?>
               <li class="sub-menu ">
                  <a class="" href="dashboard.php?menu_type=dashboard">
                      <i class="icon-dashboard"></i>
                      <span> ড্যাশবোর্ড </span>
                  </a>
                </li>
              <?php }
              
              ?>
             
               
            
          
             

  
              <!-- </li> -->
       <?php
       
         if ($_SESSION['menu_type'] == "web") { ?>
                  <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span> ম্যানেজ মেনু</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class='' href='add_menu.php?add_catagory=add_catagory'>অ্যাড মেনু</a></li>
                        <li><a class='' href='add_menu.php?add_catagory=list_catagory'>মেনু তালিকা</a></li>

                                  
                  </ul>
              </li> 
                 <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>কেন্দ্রীয় ই-সেবা</span>
                      <!-- <span class="arrow"></span> -->
                  </a>
                  <ul class="sub">
                      <li><a class='' href='add_esheba.php?add_esheba=add_esheba'>অ্যাড কেন্দ্রীয় ই-সেবা</a></li>
                      <li><a class='' href='add_esheba.php?add_esheba=list_esheba'>কেন্দ্রীয় ই-সেবা তালিকা</a></li>    
                  </ul>
              </li>
              <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>ম্যানেজ হোম পেইজ  </span>
                      <span class="arrow"></span>
                  </a>
              <ul class="sub">          
              <li><a href="success_track_add.php?add=add&ptype=home">কনটেন্ট</a></li>
              <!-- <li><a href="success_track_add.php?edit=edit&ptype=home">কনটেন্ট তালিকা</a></li> -->
             </ul>
              </li>
             <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>মেনেজ মেনু/সাবমেনু </span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">          
                <li><a href="success_track_add.php?add=add&ptype=pages">পেইজ</a></li>
                <!-- <li><a href="success_track_add.php?edit=edit&ptype=pages" >পেইজ তালিকা</a></li> -->
                                                
                  </ul>
              </li> 
                    <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>ম্যানেজ গ্যালারি</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                                  
                <li><a href="success_track_add.php?add=add&ptype=gallery">গ্যালারি</a></li>
                <!-- <li><a href="success_track_add.php?edit=edit&ptype=gallery" >গ্যালারি তালিকা</a></li> -->
                                                
                  </ul>
              </li> 
              <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>হোম পেইজ(অন্যান্য)</span>
                      <span class="arrow"></span>
                  </a>
              <ul class="sub">          
              <li><a href="add_other_content.php?add_other_content=add_other_content">কনটেন্ট</a></li>
              <li><a href="add_other_content.php?add_other_content=content_list">কনটেন্ট তালিকা</a></li>
             </ul>
              </li> 
              <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>ম্যানেজ নোটিশ</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                                  
                     <li><a href="add_notice.php?add_notice=add_notice">অ্যাড  নোটিশ</a></li>
                     <li><a href="add_notice.php?add_notice=notice_list">নোটিশ  তালিকা</a></li>
                    
                  </ul>
              </li>
               <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>ম্যানেজ  সংবাদ</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                     <li><a href="add_news.php?add_news=add_news">অ্যাড  সংবাদ</a></li>
                    <li><a href="add_news.php?add_news=news_list">সংবাদ  তালিকা</a></li>
                                  
                  </ul>
              </li>
       <?php  }
       elseif($_SESSION['menu_type'] == "test"){ ?>
     
              <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>অ্যাডমিন ইউজ</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                    
                    <li><a href="add_sample.php?sample=add_sample">অ্যাড নমুনা </a></li>
                    <li><a href="add_sample.php?sample=sample_list">নমুনা  তালিকা</a></li><hr class="custom_hr">

                    <li><a href="add_parameter.php?parameter=add_parameter">অ্যাড পেরামিটার</a></li>
                    <li><a href="add_parameter.php?parameter=parameter_list">পেরামিটার তালিকা</a></li><hr class="custom_hr"> 

                    <li><a href="add_method.php?method=add_method">পেরামিটার - মেথড সংযোজন</a></li>
                    <li><a href="add_method.php?method=method_list">পেরামিটার - মেথড সংযোজন তালিকা</a></li> <hr class="custom_hr"> 
                    <li><a href="assgn_test.php?assgn_form=add_assgn_test">নমুনা-পেরামিটার সংযোজন 
                    </a></li>
                    <li><a href="assgn_test.php?assgn_form=applylist">নমুনা-পেরামিটার সংযোজন তালিকা</a>
                    </li>       
                    </ul>
              </li>
              

                <!-- <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>ম্যানেজ পেরামিটার </span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                                       
                  </ul>
              </li> 

                        
              <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>ম্যানেজ মেথড</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      
                  </ul>
              </li> 
               <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>এসাইন টেস্ট</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">            
                               
                  </ul>
              </li>  -->

                <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>বিশ্লেষণ সেবা</span>
                      <span class="arrow"></span>
                  </a>
                <ul class="sub">                
                <li>
                  <a class="" href="user_application.php?usr_application=application_form">
                    <!-- <i class="icon-user"></i> -->
                    <span>বিশ্লেষণ সেবার আবেদন</span>
                  </a>
                </li>  
                <li>
                  <a class="" href="user_application.php?usr_application=application_list">
                    <!-- <i class="icon-user"></i> -->
                    <span>বিশ্লেষণ সেবার তালিকা</span>
                  </a>
                </li>  
                                  
                  </ul>
              </li> 
               
        <!-- ===manage method end -->
       <?php }
       elseif ($_SESSION['menu_type'] == "account") {?>
                 <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>ম্যানেজ একাউন্ট খাত</span>
                      <span class="arrow"></span>
                  </a>
              <ul class="sub">          
              <li><a href="add_account_head.php?account_head=add_account_head">অ্যাড একাউন্ট খাত</a></li>
              <li><a href="add_account_head.php?account_head=account_head_list">একাউন্ট খাতের তালিকা</a></li>
             
             </ul>
              </li> 

                <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>ম্যানেজ ইনকাম</span>
                      <span class="arrow"></span>
                  </a>
              <ul class="sub">          
              <li><a href="add_income.php?income=add_income">অ্যাড ইনকাম খাত</a></li>
              <li><a href="add_income.php?income=income_list">ইনকাম তালিকা</a></li>
             
             </ul>
              </li> 
                <li class="sub-menu">
                    <a class="" href="javascript:;">
                        <i class="icon-map-marker"></i>
                        <span>ম্যানেজ খরচ</span>
                        <span class="arrow"></span>
                </a>
              <ul class="sub">          
              <li><a href="add_expense.php?expense=add_expense">অ্যাড খরচ</a></li>
              <li><a href="add_expense.php?expense=expense_list">খরচ তালিকা</a></li>
             </ul>
              </li>
                <li class="sub-menu">
                <a class="" href="javascript:;">
                <i class="icon-map-marker"></i>
                <span>ম্যানেজ ট্রানজেকশন</span>
                <span class="arrow"></span>
                </a>
              <ul class="sub">          
              <li><a href="transaction.php">ট্রানজেকশন তালিকা</a></li>
             </ul>
              </li> 
       <?php }
       elseif($_SESSION['menu_type'] == "cpto"){ ?>
             <!-- <li><a href="cpto_form.php?requrmnt=add_requrmnt"><i class="icon-map-marker"></i>ক্রয়ের প্রস্তাব/অনুরোধ প্রেরণ </a></li> -->
            <li><a href="cpto_form.php?requrmnt=requrmnt_list"><i class="icon-map-marker"></i>ক্রয়ের প্রস্তাব তালিকা</a></li>

                  
            
                <!-- <li>
                  <a class="" href="user_application.php?usr_application=application_list">
                      <i class="icon-map-marker"></i>
                   
                    <span>এপ্লিকেশন তালিকা</span>
                  </a>
                </li>  -->
        <?php }elseif($_SESSION['menu_type'] == "user_details"){ ?>
                <li>
                  <a class="" href="login_user_details.php">
                      <i class="icon-map-marker"></i>
                    <!-- <i class="icon-user"></i> -->
                    <span>ব্যবহারকারী তালিকা</span>
                  </a>
                </li> 
        <?php }
        elseif($_SESSION['menu_type'] == "research")
        { ?>
            <li class="sub-menu">
              <a class="" href="javascript:;">
                  <i class="icon-map-marker"></i>
                  <span>গবেষণা </span>
                  <span class="arrow"></span>
              </a>
            <ul class="sub">                    
            <li><a href="add_research.php?research=add_research">গবেষণা </a></li>
            <li><a href="add_research.php?research=research_list">গবেষণা -তালিকা</a></li>            
                  </ul>
              </li> 

        <?php }
        elseif($_SESSION['menu_type'] == "cpto_usr"){ ?>
              <li><a href="cpto_form.php?requrmnt=add_requrmnt">ক্রয় প্রস্তাব/অনুরোধ প্রেরণ</a></li>
            <li><a href="cpto_form.php?requrmnt=requrmnt_list">
            ক্রয় প্রস্তাব তালিকা </a>
            </li> 

        <?php } elseif($_SESSION['menu_type'] == "all_tests_usr"){ ?>
               <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>বিশ্লেষণ সেবা</span>
                      <span class="arrow"></span>
                  </a>
                <ul class="sub">                
                <li>
                  <a class="" href="user_application.php?usr_application=application_form">
                    <!-- <i class="icon-user"></i> -->
                    <span>বিশ্লেষণ সেবার আবেদন</span>
                  </a>
                </li>  
                <li>
                  <a class="" href="user_application.php?usr_application=application_list">
                    <!-- <i class="icon-user"></i> -->
                    <span>বিশ্লেষণ সেবার তালিকা</span>
                  </a>
                </li>               
                  </ul>
              </li>    
        <?php }elseif($_SESSION['menu_type'] == "salary") { ?>
          <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>মাসিক বেতন বরাদ্দ</span>
                      <span class="arrow"></span>
                  </a>
                <ul class="sub"> 
                <li>
                  <a class="" href="salary_generate.php?salary_generate=salary_generate">
                    <!-- <i class="icon-user"></i> -->
                    <span>বেতন বরাদ্দ</span>
                  </a>
                </li>
                <li>
                  <a class="" href="salary_generate.php?salary_generate=salary_generate_list">
                    <!-- <i class="icon-user"></i> -->
                    <span>বেতন বরাদ্দ তালিকা</span>
                  </a>
                </li>
                 <li>
                  <a class="" href="salary_generate.php?salary_generate=salary_edit_monthly">
                    <!-- <i class="icon-user"></i> -->
                    <span>বেতন বরাদ্দ সংশোধন</span>
                  </a>
                </li>              
                  </ul>
              </li>
         <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>অ্যাডমিন ইউজ</span>
                      <span class="arrow"></span>
                  </a>
                <ul class="sub"> 
                 
                <hr class="custom_hr">
                <li>
                  <a class="" href="add_salary_head.php?salary_head=add_salary_head">
                    <!-- <i class="icon-user"></i> -->
                    <span>বেতন খাত </span>
                  </a>
                </li> 
                <li>
                  <a class="" href="add_salary_head.php?salary_head=salary_head_list">
                    <!-- <i class="icon-user"></i> -->
                    <span>বেতন খাত  তালিকা</span>
                  </a>
                </li>  
                <hr class="custom_hr">
                <li class="sub-menu">
                 
                <!-- SAALRY FOR EMPLOYEE -->
                <!-- <li>
                  <a class="" href="salary.php?salary=add_salary">
                    <i class="icon-user"></i>
                    <span>কর্মচারীর বেতন নির্ধারণ</span>
                  </a>
                </li> 
                <li>
                  <a class="" href="salary.php?salary=salary_list">
                    <i class="icon-user"></i>
                    <span> কর্মচারীর বেতন তালিকা</span>
                  </a>
                </li>
                <hr class="custom_hr">  -->
                <!-- SAALRY FOR EMPLOYEE END-->
                
                 
                <li>
                  <a class="" href="assign_salary_head_rate.php?assign_salary_head=add_rate">
                    <!-- <i class="icon-user"></i> -->
                    <span>ভাতার হার যোগ</span>
                  </a>
                </li> 
                <li>
                  <a class="" href="assign_salary_head_rate.php?assign_salary_head=rate_list">
                    <!-- <i class="icon-user"></i> -->
                    <span>ভাতার হার তালিকা</span>
                  </a>
                </li>                   
                  </ul>
              </li> 
             
                                  
              
              </li>
               
               <li class="">
                  <a class="" href="salary.php?salary=salary_list_all">
                      <i class="icon-map-marker"></i>
                      <span>সকল বেতন রিপোর্ট</span>
                      <span class="arrow"></span>
                  </a>
              </li>  
              <li class="">
                  <a class="" href="salary.php?salary=salary_head_details">
                      <i class="icon-map-marker"></i>
                      <span>বেতন খাত রিপোর্ট</span>
                      <span class="arrow"></span>
                  </a>
              </li> 
        <?php }elseif($_SESSION['menu_type'] == "employee") { ?>
        <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>অ্যাডমিন ইউজ </span>
                      <span class="arrow"></span>
                  </a>
                <ul class="sub"> 
                <li>
                  <a class="" href="add_employee_grade.php?employee_grade=add_employee_grade">
                    <!-- <i class="icon-user"></i> -->
                    <span>নতুন কর্মচারী শ্রেণী যোগ</span>
                  </a>
                </li> 
                <li>
                  <a class="" href="add_employee_grade.php?employee_grade=employee_grade_list">
                    <!-- <i class="icon-user"></i> -->
                    <span>কর্মচারী শ্রেণী তালিকা</span>
                  </a>
                </li> 
                <hr class="custom_hr">
                    <li>
                  <a class="" href="department.php?department=add_department">
                    <!-- <i class="icon-user"></i> -->
                    <span>নতুন শাখা/বিভাগ  যোগ</span>
                  </a>
                </li> 
                <li>
                  <a class="" href="department.php?department=department_list">
                    <!-- <i class="icon-user"></i> -->
                    <span>শাখা/বিভাগ  তালিকা</span>
                  </a>
                </li> 
                <hr class="custom_hr">   
                <li>
                  <a class="" href="designation.php?designation=add_designation">
                    <!-- <i class="icon-user"></i> -->
                    <span>নতুন পদবী যোগ</span>
                  </a>
                </li> 
                <li>
                  <a class="" href="designation.php?designation=designation_list">
                    <!-- <i class="icon-user"></i> -->
                    <span>পদবী তালিকা</span>
                  </a>
                </li> 
                <hr class="custom_hr">  
                                  
                  </ul>
        </li> 
        <!-- <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>শাখা</span>
                      <span class="arrow"></span>
                  </a>
                <ul class="sub"> 
                       
                  </ul>
        </li> 
        <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>কর্মচারী পদবী</span>
                      <span class="arrow"></span>
                  </a>
                <ul class="sub"> 
              
                                  
                  </ul>
        </li>  -->
               <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>কর্মচারী</span>
                      <span class="arrow"></span>
                  </a>
                <ul class="sub">                
                <li>
                  <a class="" href="employee.php?employee=add_employee">
                    <!-- <i class="icon-user"></i> -->
                    <span>নতুন কর্মচারী যোগ</span>
                  </a>
                </li>  
                <li>
                  <a class="" href="employee.php?employee=employee_list">
                    <!-- <i class="icon-user"></i> -->
                    <span>কর্মচারীদের তালিকা</span>
                  </a>
                </li>  
                                  
                  </ul>
              </li> 
        <?php } 
        
        elseif($_SESSION['menu_type'] == "assign_salary_grade") { ?>
          <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>ভাতার হার (শ্রেণীর) </span>
                      <span class="arrow"></span>
                  </a>
                <ul class="sub"> 
                <li>
                  <a class="" href="assign_salary_head_rate.php?assign_salary_head=add_rate">
                    <!-- <i class="icon-user"></i> -->
                    <span>ভাতার হার যোগ</span>
                  </a>
                </li> 
                <li>
                  <a class="" href="assign_salary_head_rate.php?assign_salary_head=rate_list">
                    <!-- <i class="icon-user"></i> -->
                    <span>ভাতার হার তালিকা</span>
                  </a>
                </li>  
                                  
                  </ul>
              </li> 


        <?php }elseif($_SESSION['menu_type'] == "other_payment") { ?>
          <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>অন্যান্য সেবা পেমেন্ট </span>
                      <span class="arrow"></span>
                  </a>
                <ul class="sub"> 
                <li>
                  <a class="" href="other_payment.php?payment=payment_request">
                    <!-- <i class="icon-user"></i> -->
                    <span>অন্যান্য সেবা আবেদন</span>
                  </a>
                </li> 
                <li>
                  <a class="" href="other_payment.php?payment=payment_list">
                    <!-- <i class="icon-user"></i> -->
                    <span>অন্যান্য সেবা তালিকা</span>
                  </a>
                </li>  
                                  
                  </ul>
              </li> 


        <?php }
        ?>
                <!-- ===cpto form- start-- -->


        <?php if(isset($_SESSION['service_type'])) {
              $service_type = $_SESSION['service_type'];
              if($service_type == 'cpto'){ ?>
           
                                  
            <li><a href="cpto_form.php?requrmnt=add_requrmnt"> <i class="icon-map-marker"></i>ক্রয় প্রস্তাব</a></li>
            <!-- /অনুরোধ প্রেরণ  -->
            <li><a href="cpto_form.php?requrmnt=requrmnt_list"> <i class="icon-map-marker"></i>ক্রয় প্রস্তাব তালিকা</a></li>

        <?php }elseif($service_type == 'app') { ?>
          <li>
                  <a class="" href="user_application.php?usr_application=application_form">
                  <i class="icon-map-marker"></i>
                    <!-- <i class="icon-user"></i> -->
                    <span>এপ্লিকেশন</span>
                  </a>
                </li>  
                <li>
                  <a class="" href="user_application.php?usr_application=application_list">
                  <i class="icon-map-marker"></i>
                    <!-- <i class="icon-user"></i> -->
                    <span>এপ্লিকেশন তালিকা</span>
                  </a>
                </li> 

      <?php }elseif($service_type == 'accounts' && $level == 2){?>
           <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>মাসিক বেতন বরাদ্দ</span>
                      <span class="arrow"></span>
                  </a>
                <ul class="sub"> 
                <li>
                  <a class="" href="salary_generate.php?salary_generate=salary_generate">
                    <!-- <i class="icon-user"></i> -->
                    <span>বেতন বরাদ্দ</span>
                  </a>
                </li>
                <li>
                  <a class="" href="salary_generate.php?salary_generate=salary_generate_list">
                    <!-- <i class="icon-user"></i> -->
                    <span>বেতন বরাদ্দ তালিকা</span>
                  </a>
                </li>
                 <li>
                  <a class="" href="salary_generate.php?salary_generate=salary_edit_monthly">
                    <!-- <i class="icon-user"></i> -->
                    <span>বেতন বরাদ্দ সংশোধন</span>
                  </a>
                </li>              
                  </ul>
              </li>
         <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>অ্যাডমিন ইউজ</span>
                      <span class="arrow"></span>
                  </a>
                <ul class="sub"> 
                 
                <hr class="custom_hr">
                <li>
                  <a class="" href="add_salary_head.php?salary_head=add_salary_head">
                    <!-- <i class="icon-user"></i> -->
                    <span>বেতন খাত </span>
                  </a>
                </li> 
                <li>
                  <a class="" href="add_salary_head.php?salary_head=salary_head_list">
                    <!-- <i class="icon-user"></i> -->
                    <span>বেতন খাত  তালিকা</span>
                  </a>
                </li>  
                <hr class="custom_hr">
                <li class="sub-menu">
                 
                <!-- SAALRY FOR EMPLOYEE -->
                <!-- <li>
                  <a class="" href="salary.php?salary=add_salary">
                    <i class="icon-user"></i>
                    <span>কর্মচারীর বেতন নির্ধারণ</span>
                  </a>
                </li> 
                <li>
                  <a class="" href="salary.php?salary=salary_list">
                    <i class="icon-user"></i>
                    <span> কর্মচারীর বেতন তালিকা</span>
                  </a>
                </li>
                <hr class="custom_hr">  -->
                <!-- SAALRY FOR EMPLOYEE END-->
                
                 
                <li>
                  <a class="" href="assign_salary_head_rate.php?assign_salary_head=add_rate">
                    <!-- <i class="icon-user"></i> -->
                    <span>ভাতার হার যোগ</span>
                  </a>
                </li> 
                <li>
                  <a class="" href="assign_salary_head_rate.php?assign_salary_head=rate_list">
                    <!-- <i class="icon-user"></i> -->
                    <span>ভাতার হার তালিকা</span>
                  </a>
                </li>                   
                  </ul>
              </li> 
             
                                  
              
              </li>
               
               <li class="">
                  <a class="" href="salary.php?salary=salary_list_all">
                      <i class="icon-map-marker"></i>
                      <span>সকল বেতন রিপোর্ট</span>
                      <span class="arrow"></span>
                  </a>
              </li>  
              <li class="">
                  <a class="" href="salary.php?salary=salary_head_details">
                      <i class="icon-map-marker"></i>
                      <span>বেতন খাত রিপোর্ট</span>
                      <span class="arrow"></span>
                  </a>
              </li> 
      <?php }
          elseif($service_type == 'other_payment_usr') { ?>
         
                <li>
                  <a class="" href="other_payment.php?payment=add_payment">
                    <!-- <i class="icon-user"></i> -->
                    <span>অন্যান্য সেবা আবেদন</span>
                  </a>
                </li> 
                <li>
                  <a class="" href="other_payment.php?payment=payment_list">
                    <!-- <i class="icon-user"></i> -->
                    <span>অন্যান্য সেবা তালিকা</span>
                  </a>
                </li>  
                                  
              

        <?php }
    
    
    }elseif($_SESSION['menu_type'] == "" or $service_type == ""){ ?> 
        <li></li>
          <!-- <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>CPTO</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                                  
            <li><a href="cpto_form.php?requrmnt=add_requrmnt">রিকুইরেমেন্ট-পাঠান</a></li>
            <li><a href="cpto_form.php?requrmnt=requrmnt_list">রিকুইরেমেন্ট-তালিকা</a></li>          
                  </ul>
              </li>  -->

              <!-- cpto form end -->
          <!-- <li class="sub-menu">
                  <a class="" href="javascript:;">
                      <i class="icon-map-marker"></i>
                      <span>ম্যানেজ এপ্লিকেশন</span>
                      <span class="arrow"></span>
                  </a>
                <ul class="sub">                
                <li>
                  <a class="" href="user_application.php?usr_application=application_form"> -->
                    <!-- <i class="icon-user"></i> -->
                    <!-- <span>এপ্লিকেশন</span>
                  </a>
                </li>  
                <li>
                  <a class="" href="user_application.php?usr_application=application_list">
                   
                    <span>এপ্লিকেশন তালিকা</span>
                  </a>
                </li>  
                                  
                  </ul>
              </li>   -->
        
        
        <?php }?>

              <li>
        
                  <a class="" href="logout.php">
                    <i class="icon-user"></i>
                    <span>লগ আউট</span>
                  </a>
              </li>
          </ul>
         <!-- END SIDEBAR MENU -->
      </div>
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->  
     