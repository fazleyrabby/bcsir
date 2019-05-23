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
                     <!-- ব্যবহারকারী বিস্তারিত  -->
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
         <h4><i class="icon-tags"></i> ব্যবহারকারী  বিস্তারিত লগইন </h4>
     	</div>
     <div class="widget-body">
      <div class="row-fluid">
          <div class="span12">
               <?php
        if (isset($_GET['success'])) {
         // echo" <div class='widget orange'><div class='widget-body'>";
        if ($_GET['success'] == 'success') { // ?>
               <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                <h4 class="alert-heading">সফলভাবে সম্পন্ন হয়েছে !</h4>
               </div>
            <?php 
        } 
         if ($_GET['success'] == 'error') { // ?>
              <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
              <h4 class="alert-heading">ত্রুটি ঘটেছে !!</h4>
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
<!-- 1-admin
2-accounts
3-md
4-user
5-employee
6-scientist -->
 <table class="table table-striped table-bordered" id="sample_1">
            <thead>
            <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                <th>ব্যবহারকারী নাম</th>
                <th>কর্মচারী আইডি</th>
                <th>ইমেইল</th>
                <th>ফোন নাম্বার</th>
                <th>ইনস্টিটিউট এর নাম</th>
                <th>ব্যবহারকারী লেভেল </th>
                <th>স্ট্যাস্টাস </th>
               </thead>
               <tbody>
             

               	<?php  
                 $list_user=mysqli_query($conn,"SELECT username,employee_id,email,contact_no,institute_name,user_level,active_status,delete_status,id from ratul_login where user_level != 1");	
                 if($list_user==true)
                 {
              		while($data=mysqli_fetch_array($list_user))
              		  { 
              		    $username=$data['0'];
                        $employee_id=$data['1'];
                        $email=$data['2'];
                        $contact_no=$data['3'];
                        $institute_name=$data['4'];
                        $user_level=$data['5'];
                        $active_st=$data['6'];
                        $delete_st=$data['7'];
                        $id=$data['8'];
                    {
                      if ($active_st==0) 
                      {
                        $active_status = "একটিভ নেই > <a href='Action/login_user_details.php?id=$id&user_active=user_active'><span class='btn btn-success btn_success_custom'>একটিভ করুন</span></a>";
                      }
                      else 
                      {
                        $active_status = "একটিভ আছে > <a href='Action/login_user_details.php?id=$id&user_active=user_deactive'><span class='btn btn-danger'>বাতিল করুন</span></a>";
                      }
                      if($user_level == 1){$ulevel = "অ্যাডমিন";}
                      if($user_level == 2){$ulevel = "একাউন্ট";}
                      if($user_level == 3){$ulevel = "এম ডি";}
                      if($user_level == 4){$ulevel = "ব্যবহারকারী";}
                      if($user_level == 5){$ulevel = "কর্মচারী";}
                      if($user_level == 6){$ulevel = "বিজ্ঞানী";}
                    }
  
              			echo "<tr>
              			<td><input type='checkbox' class='checkboxes' value='1' /></td>
      								<td> $username </td>
      								<td> $employee_id </td>
      								<td> $email </td>
                      <td> $contact_no </td>
                      <td> $institute_name </td>
                      <td> $ulevel </td>
                      <td> $active_status </td>
                      ";
							echo "</tr>";
              		   }}?>
               </tbody>
           </table>
		

		</div>
		</div>
		</div>
		</div>


</div>







<?php include 'footer.php';?>