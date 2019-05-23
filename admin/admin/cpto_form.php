<?php
include 'header.php';
include 'sidebar.php';

function truncateString($str, $chars, $to_space, $replacement="...") {
   if($chars > strlen($str)) return $str;

   $str = substr($str, 0, $chars);
   $space_pos = strrpos($str, " ");
   if($to_space && $space_pos >= 0) 
       $str = substr($str, 0, strrpos($str, " "));

   return($str . $replacement);
}
?>
<style>
/* table>tbody>tr>td:not(:first-child){
    max-width: 500px;
    overflow: hidden; */
    /* display: inline-block; */
    /* text-overflow:ellipsis;
} */

</style>
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
                       z</li>
                   </ul> -->
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->



 <div class="widget red">
     <div class="widget-title">
       <?php if(isset($_GET['requrmnt'])) { 
         if ($_GET['requrmnt'] == "add_requrmnt"){
           echo "<h4><i class='icon-tags'></i> ক্রয় প্রস্তাব অনুরোধ/প্রেরণ  </h4>";
         }
         elseif($_GET['requrmnt'] == "requrmnt_list")
         {
            echo "<h4><i class='icon-tags'></i> ক্রয় প্রস্তাবের তালিকা </h4>";
         }
         elseif($_GET['requrmnt'] == "requirement_edit")
         {
            echo "<h4><i class='icon-tags'></i> ক্রয় প্রস্তাব সংশোধন</h4>";
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
                <h4 class="alert-heading">তথ্য ইতিমধ্যে বিদ্যমান ! !</h4>
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
           <input type="hidden" value="<?php echo $_SESSION['user_id']?>" name="userid">
            <input type="hidden" value="<?php echo $usernamee?>" name="username">
                <div class="control-group">
                    <label class="control-label">ক্রয় প্রস্তাব-টাইটেল</label>
                        <div class="controls">
                      
                            <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title=""  name="requrmnt_name" required>
                        </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label">বিবরণ</label>

                        <div class="controls">   
                        
                            <!-- <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Add Sample name here"  name="requrmnt_descrb" required> -->
                            <textarea id="#" placeholder="Type Description" class="span6  popovers ckeditor" data-trigger="hover" data-content="Type Description"  name="requrmnt_descrb" data-original-title="">
                            </textarea>

                            </div>
                    </div>
            
                    <div class="control-group">
                                <label class="control-label">প্রস্তাব গ্রাহক</label>
                                <div class="controls">
                                    <select class="span6 chzn-select" data-placeholder="" tabindex="1"
                                        name="reciever">
                                        <option value=""></option>
                                        <?php 
                                        $employee_list = mysqli_query($conn,"SELECT 
                                        login.id,
                                        emp_dt.employee_id,
                                        emp_dt.employee_name 
                                        from ratul_login as login 
                                        left join employee_details as emp_dt 
                                        on emp_dt.employee_id = login.employee_id  where emp_dt.employee_st = 1 and login.id != $id and login.username != ''");
                                        $employee_list_row = mysqli_num_rows($employee_list);

                                        if ($employee_list_row > 0) {
                                            while ($emp_data=mysqli_fetch_array($employee_list)) {
                                               $login_id = $emp_data['0']; 
                                               $employee_id = $emp_data['1']; 
                                               $employee_name = $emp_data['2'];
                                               echo "<option value='$login_id'>$employee_id-$employee_name</option>" ;
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                    <div class="control-group">
                    <label class="control-label">সম্ভাব্য মূল্য</label>
                        <div class="controls">
                       
                            <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Add Sample name here"  name="requrmnt_price" required>
                        </div>
                    </div>
            <div class="control-group">
            <div class="controls">
            <input type="submit" name="add_requrmnt_form" value="সাবমিট">
            </div>
            </div>
        
    </form>
           <!-- UFR END -->
    
            <?php 
    }
    elseif ($requrmnt_form == "requirement_edit") { ?>
        

   <form action="Action/add_requirement.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
            <?php $req_id=$_GET['id'];
           $req_dt=mysqli_query($conn,"select * from user_requirement where user_requr_id='$req_id'");
           if ($req_dt == true) {
              
            while ($data = mysqli_fetch_assoc($req_dt)) {
                $qu_title = $data['Qu_title'];
                $Qu_descrbs = $data['Qu_descrbs'];
                $Qu_price = $data['Qu_price'];
                $req_from = $data['req_from'];
                $Qu_status = $data['Qu_status'];
            
        ?>
            <input type="hidden" value="<?php echo $_SESSION['user_id']?>" name="userid">
            <input type="hidden" value="<?php echo $usernamee?>" name="username">
            <input type="hidden" value="<?php echo $req_id?>" name="req_id">
                <div class="control-group">
                    <label class="control-label">ক্রয় -টাইটেল</label>
                        <div class="controls">
                      
                            <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Add Sample name here" value="<?php echo $qu_title ?>"  name="requrmnt_name" required>
                        </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label">ক্রয় -বিবরণ </label>
                        <div class="controls">
                        
                            <!-- <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Add Sample name here"  name="requrmnt_descrb" required> -->
                            
                            <textarea id="#" placeholder="Type Description" class="span6  popovers ckeditor" data-trigger="hover" data-content="Type Description"  name="requrmnt_descrb" data-original-title="">
                            <?php echo $Qu_descrbs?>
                            </textarea>
                        </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label">ক্রয় -মূল্য</label>
                        <div class="controls">
                       
                            <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Add Sample name here"  name="requrmnt_price" value="<?php echo $Qu_price?>" required>
                        </div>
                    </div>
    <div class="control-group">
     <div class="controls">
      <input type="submit" name="update_req_form" value="সংশোধন">
     </div>
    </div>

   <?php } } ?>
     </form>
           <!-- UFR END -->
    
<?php 
    }
        elseif ($requrmnt_form == "reply") 
        {
            $Qu_title=$_GET['Qu_title'];
            $user_requr_id=$_GET['id'];
            $sender_id=$_GET['sender_id'];
            $Qu_reqfrom=$_GET['rcvr'];


            //get the description
            ?>
            <form action="Action/add_requirement.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
            <?php
            $r="SELECT Qu_descrbs,Qu_status,username_req from user_requirement where user_requr_id='$user_requr_id'";
//echo $r;
            $rp=mysqli_query($conn,$r);
            while($Qu_descrbso=mysqli_fetch_array($rp)){
                $Qu_descrbs = $Qu_descrbso['0'];
                $status = $Qu_descrbso['1'];
                $username_req = $Qu_descrbso['2'];
            
            ?>
            <input type="hidden" value="<?php echo $_SESSION['user_id']?>" name="userid">
            <input type="hidden" value="<?php echo $user_requr_id?>" name="user_requr_id">
            <input type="hidden" value="<?php echo $sender_id?>" name="sender">
            <!-- <input type="hidden" value="</?php echo $employee_login_id?>" name="login_id"> -->
              <input type="hidden" value="<?php echo $Qu_reqfrom?>" name="user_rcvr_id">
                <div class="control-group">
                    <label class="control-label">টাইটেল</label>
                        <div class="controls">
                            <input type="text" class="span6 tooltips" data-trigger="hover" value="<?php echo $Qu_title ?>" data-original-title="Add Sample name here"  name="requrmnt_name" readonly="true" required>
                        </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label">ক্রয় -বিবরণ </label>
                        <div class="controls">
                        
                            <!-- <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Add Sample name here"  name="requrmnt_descrb" required> -->
                            <textarea id="#" placeholder="Type Description" class="span6  popovers ckeditor" data-trigger="hover" data-content="Type Description"  name="requrmnt_descrb" data-original-title="" readonly="true"><?php echo $Qu_descrbs?>
                            </textarea>
                        </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label">কমেন্টস </label>
                        <div class="controls">
                            <textarea id="#" placeholder="Type Description" class="span6  popovers ckeditor" data-trigger="hover" data-content="Type Description"  name="requrmnt_comments" data-original-title="">
                            </textarea>
                        </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label">রিকুয়েস্ট স্ট্যাটাস</label>
                        <div class="controls">
                        <select name="req_status" class="span6">
                            <option value="2">অনুমোদিত</option>
                            <option value="0">প্রত্যাখ্যান</option>
                        </select>
                          
                        </div>
                    </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="submit" name="acc_send_req" value="সাবমিট">
                    </div>
                </div>
            <?php } ?>
           </form>
            <?php
        }
          

            // USR
                // === Requeriment List  Query ====

   elseif ($requrmnt_form == "requrmnt_list") { 
         if ($level != 1) { ?>
            <span><h3>প্রেরিত ক্রয় প্রস্তাবের তালিকা</h3></span>
           
              <table class="table table-striped table-bordered" id="sample_1">
                <thead>     
                <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1.checkboxes" /></th>
                <!-- <th>Account id</th> -->
                <th> সিরিয়াল</th>
                <th> ক্রয় প্রস্তাব  টাইটেল</th>
                <th> ক্রয়  বিবরণ </th>
                <th> ক্রয়  মূল্য</th>
                <!-- <th> স্ট্যাটাস</th> -->
                <th> সংশোধন   </th>
                <th> ডিটেইলস স্ট্যাটাস</th>
               </tr>
               </thead>
               <tbody>
               <?php  
               $sender_id=$_SESSION['user_id'];
               $user_requrmnt_list=mysqli_query($conn,"SELECT * from user_requirement where req_from='$sender_id' ORDER BY user_requr_id DESC");
               //1 = Show Data
            //    echo"<span><h3>রিকুইরেমেন্ট-লিস্ট</h3></span>";
                    if($user_requrmnt_list==true)
                    {
                            while($row=mysqli_fetch_array($user_requrmnt_list))
                            { 
                                $user_requr_id=$row['user_requr_id'];
                                $Qu_title= $row['Qu_title'];
                                $Qu_descrbs=$row['Qu_descrbs'];
                                $Qu_price=$row['Qu_price'];
                                $Qu_status=$row['Qu_status'];

                                 $desc = (truncateString($Qu_descrbs, 25, false) . "\n");
                        
                                if($Qu_status==0)
                                {
                                    $st_title="rejected";
                                }
                                elseif($Qu_status==1)
                                {
                                    $st_title="send to reciever";
                                }
                                elseif($Qu_status==2)
                                {
                                    $st_title="accepted by reciever";
                                }
                                
                       echo"<tr>                   
                        <td><input type='checkbox' class='checkboxes' value='1'/></td> 
                        <td> $user_requr_id</td>
                        <td> $Qu_title </td>
                        <td> $desc </td>
                        <td> $Qu_price</td><td>";
                        // <td> $st_title</td>

                        if ($Qu_status == 0) {
                           echo "<a href='cpto_form.php?requrmnt=requirement_edit&id=$user_requr_id'><button class='btn btn-success '>সংশোধন  </button></a>
                            &nbsp;&nbsp;";
                        }
                        
                      
                       
                      
                        
                        echo "</td><td><a href='user_details_view.php?id=$user_requr_id'><button  class='btn btn-primary '>বিস্তারিত</button></a>
                        &nbsp;&nbsp;";
                        if($Qu_status == 2) {
                           echo "<a href='cpto_report.php?id=$user_requr_id'><button  class='btn btn-success'>রিপোর্ট</button></a>";
                        }
                        echo "</td>
                  
                        </td>";
                        echo "</tr>";
                        }
                                
                        }
                        ?>
                     </tbody>
             </table>
                    
           <span><h3>গৃহীত ক্রয় প্রস্তাবের তালিকা</h3></span>
           <table class="table table-striped table-bordered" id="sample_2">
                <thead>     
                <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_2.checkboxes" /></th>
                <!-- <th>Account id</th> -->
                <th> সিরিয়াল</th>
                <th> ক্রয়  টাইটেল</th>
                <th> ক্রয়  বিবরণ </th>
                <th> ক্রয়  মূল্য</th>
                <!-- <th> স্ট্যাটাস</th> -->
                <th> সংশোধন   </th>
                <th> ডিটেইলস স্ট্যাটাস</th>
               </tr>
               </thead>
               <tbody>
               <?php  
               $id=$_SESSION['user_id'];
            //    echo "$sender_id";
               $user_requrmnt_list=mysqli_query($conn,"SELECT distinct user_req.*,rdt.send_id as sender,rdt.recv_con_id as reciever from user_requirement as user_req join requirement_detalis_tbl as rdt on 
                user_req.user_requr_id = rdt.form_pk_id where rdt.recv_con_id='$id'order by created_at");
               //1 = Show Data
            //    echo"<span><h3>রিকুইরেমেন্ট-লিস্ট</h3></span>";
                    if($user_requrmnt_list==true)
                    {
                            while($row=mysqli_fetch_array($user_requrmnt_list))
                            { 
                                $user_requr_id=$row['user_requr_id'];
                                $Qu_title= $row['Qu_title'];
                                $Qu_descrbs=$row['Qu_descrbs'];
                                $Qu_price=$row['Qu_price'];
                                $Qu_status=$row['Qu_status'];
                                $sender=$row['sender'];
                                $reciever=$row['reciever'];


                                 $desc = (truncateString($Qu_descrbs, 25, false) . "\n");
                        
                                if($Qu_status==0)
                                {
                                    $st_title="rejected";
                                }
                                elseif($Qu_status==1)
                                {
                                    $st_title="send to reciever";
                                }
                                elseif($Qu_status==2)
                                {
                                    $st_title="accepted by reciever";
                                }
                       echo"<tr>                   
                        <td><input type='checkbox' class='checkboxes' value='1'/></td> 
                        <td> $user_requr_id</td>
                        <td> $Qu_title </td>
                        <td> $desc </td>
                        <td> $Qu_price</td><td>";
                        // <td> $st_title</td>

                       
                        // echo "<a href='cpto_form.php?requrmnt=requirement_edit&id=$user_requr_id'><button class='btn btn-success '>EDIT </button></a>
                        // &nbsp;&nbsp;";
                        if($Qu_status != 2) {
                            echo"<a href='cpto_form.php?id=$user_requr_id&sender_id=$sender&rcvr=$reciever&send_req=send_req&requrmnt=reply&Qu_title=$Qu_title'><button  class='btn btn-danger '> গ্রহণ/প্রত্যাখ্যান </button></a>
                            &nbsp;&nbsp;";
                        }
                       
                       
                       
                        
                        echo "</td><td><a href='user_details_view.php?id=$user_requr_id'><button  class='btn btn-primary '>বিস্তারিত</button></a>
                        &nbsp;&nbsp;";
                        if($Qu_status == 2) {
                           echo "<a href='cpto_report.php?id=$user_requr_id'><button  class='btn btn-success'>রিপোর্ট</button></a>";
                       }
                        echo "</td>
                  
                        </td>";
                        echo "</tr>";
                        }
                                
                        }
                        ?>
                     </tbody>
             </table>
         <?php }
         else { ?>
              <table class="table table-striped table-bordered" id="sample_1" style="table-layout:fixed">
                <thead>     
                <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1.checkboxes" /></th>
                <!-- <th>Account id</th> -->
                <th width="10%"> সিরিয়াল</th>
                <th width="20%"> ক্রয়  টাইটেল</th>
                <th width="40%"> ক্রয়  বিবরণ </th>
                <th> ক্রয়  মূল্য</th>
                <!-- <th> স্ট্যাটাস</th> -->
                <!-- <th> সংশোধন   </th> -->
                <th> ডিটেইলস স্ট্যাটাস</th>
               </tr>
               </thead>
               <tbody>
               <?php  
               $sender_id=$_SESSION['user_id'];
               $user_requrmnt_list=mysqli_query($conn,"SELECT * from user_requirement ORDER BY user_requr_id DESC");
               //1 = Show Data
            //    echo"<span><h3>রিকুইরেমেন্ট-লিস্ট</h3></span>";
                    if($user_requrmnt_list==true)
                    {
                            while($row=mysqli_fetch_array($user_requrmnt_list))
                            { 
                                $user_requr_id=$row['user_requr_id'];
                                $Qu_title= $row['Qu_title'];
                                $Qu_descrbs=$row['Qu_descrbs'];
                                $Qu_price=$row['Qu_price'];
                                $Qu_status=$row['Qu_status'];

                                 $desc = (truncateString($Qu_descrbs, 25, false) . "\n");
                        
                                if($Qu_status==0)
                                {
                                    $st_title="rejected";
                                }
                                elseif($Qu_status==1)
                                {
                                    $st_title="send to reciever";
                                }
                                elseif($Qu_status==2)
                                {
                                    $st_title="accepted by reciever";
                                }
                                
                       echo"<tr>                   
                        <td><input type='checkbox' class='checkboxes' value='1'/></td> 
                        <td> $user_requr_id</td>
                        <td> $Qu_title </td>
                        <td> $Qu_descrbs </td>
                        <td> $Qu_price</td>";
                        // <td> $st_title</td>
                        echo "<td><a href='user_details_view.php?id=$user_requr_id'><button  class='btn btn-primary '>বিস্তারিত</button></a>
                        &nbsp;&nbsp;
                        </td>
                  
                        </td>";
                        echo "</tr>";
                        }
                                
                        }
                        ?>
                     </tbody>
             </table>
        <?php }
         
        }
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
                                    <input type="submit" name="update_submit_form" value="Update">
                                </div>
                            </div>
                        
                    </form>


                    <?php } } ?> 

    <?php }
   } ?>



 <?php } ?>  <!-- Ending of ISSET add other content -->




  

  </div>
  </div>
  </div>
  </div>


</div>







<?php include 'footer.php';?>