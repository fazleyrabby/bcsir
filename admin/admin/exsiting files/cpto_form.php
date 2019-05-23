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
                <h4 class="alert-heading">নাম বা সিরিয়াল ইতিমধ্যে বিদ্যমান !</h4>
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
                                    <select class="span6 chzn-select" data-placeholder="কর্মচারী ধরণ" tabindex="1"
                                        name="reciever_type">
                                        <option value=""></option>
                                        <option value="1">একাউন্টস</option>
                                        <option value="2">এম.ডি.</option>
                                        
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
            <input type="submit" name="add_requrmnt_form" value="Send">
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
                    <label class="control-label">রিকুইরেমেন্ট-টাইটেল</label>
                        <div class="controls">
                      
                            <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Add Sample name here" value="<?php echo $qu_title ?>"  name="requrmnt_name" required>
                        </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label">রিকুইরেমেন্ট-ডেসক্রিপশন</label>
                        <div class="controls">
                        
                            <!-- <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Add Sample name here"  name="requrmnt_descrb" required> -->
                            
                            <textarea id="#" placeholder="Type Description" class="span6  popovers ckeditor" data-trigger="hover" data-content="Type Description"  name="requrmnt_descrb" data-original-title="">
                            <?php echo $Qu_descrbs?>
                            </textarea>
                        </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label">রিকুইরেমেন্ট-মূল্য</label>
                        <div class="controls">
                       
                            <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Add Sample name here"  name="requrmnt_price" value="<?php echo $Qu_price?>" required>
                        </div>
                    </div>
    <div class="control-group">
     <div class="controls">
      <input type="submit" name="update_req_form" value="Re-send">
     </div>
    </div>

   <?php }} ?>
     </form>
           <!-- UFR END -->
    
<?php 
    }
        elseif ($requrmnt_form == "reply") 
        {
            $Qu_title=$_GET['Qu_title'];
            $user_requr_id=$_GET['id'];
            $accid=$_GET['accid'];
            $Qu_reqfrom=$_GET['rcvr'];
            //get the description
            ?>
            <form action="Action/add_requirement.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
            <?php
            $r="select Qu_descrbs,Qu_status,username_req from user_requirement where user_requr_id='$user_requr_id'";
//echo $r;
            $rp=mysqli_query($conn,$r);
            while($Qu_descrbso=mysqli_fetch_array($rp)){
                $Qu_descrbs = $Qu_descrbso['0'];
                $status = $Qu_descrbso['1'];
                $username_req = $Qu_descrbso['2'];
            
            ?>
            <input type="hidden" value="<?php echo $_SESSION['user_id']?>" name="userid">
            <input type="hidden" value="<?php echo $user_requr_id?>" name="user_requr_id">
              <input type="hidden" value="<?php echo $Qu_reqfrom?>" name="user_rcvr_id">
                <div class="control-group">
                    <label class="control-label">টাইটেল</label>
                        <div class="controls">
                            <input type="text" class="span6 tooltips" data-trigger="hover" value="<?php echo $Qu_title ?>" data-original-title="Add Sample name here"  name="requrmnt_name" readonly="true" required>
                        </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label">রিকুইরেমেন্ট-ডেসক্রিপশন</label>
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
                            <?php if($level==2 and ($status == 1 or $status == 6)) { ?> 
                            <option value="2">Send To MD</option>
                            <option value="5">Reject</option>
                            <?php }
                            elseif($level == 2 and $status == 3){ ?> 
                            <option value="4">Send to <?php echo $username_req?>(FINAL APPROVED)</option>
                            <option value="5">Reject</option>
                            <?php }
                            elseif($level==3 and $status == 2){ ?> 
                            <option value="3">Send To Account</option>
                            <option value="6">Reject</option>
                            <?php } ?>
                            
                        </select>
                          
                        </div>
                    </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="submit" name="acc_send_req" value="Send">
                    </div>
                </div>
            <?php } ?>
           </form>
            <?php
        }
          

            // USR
                // === Requeriment List  Query ====

   elseif ($requrmnt_form == "requrmnt_list") { ?> <!--  if clicked requeriment list   -->
            <!-- <span><h3>রিকুইরেমেন্ট লিস্ট</h3></span> -->
            <table class="table table-striped table-bordered" id="sample_1">
           
             <?php  
             
             if($level==4){?>
                 <thead>     
                <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1.checkboxes" /></th>
                <!-- <th>Account id</th> -->
                <th> সিরিয়াল</th>
                <th> রিকুইরেমেন্ট টাইটেল</th>
                <th> রিকুইরেমেন্ট ডিটেইলস</th>
                <th> রিকুইরেমেন্ট মূল্য</th>
                <!-- <th> স্ট্যাটাস</th> -->
                <th> এডিট  </th>
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
                        
                                if($Qu_status==1)
                                {
                                    $st_title="SEND TO ACCOUNT";
                                }
                                elseif($Qu_status==2)
                                {
                                    $st_title="SEND TO MD";
                                }
                                elseif($Qu_status==3)
                                {
                                    $st_title="CONFRIM Management";
                                }
                                elseif($Qu_status==4)
                                {
                                    $st_title="final approved";
                                }
                                elseif($Qu_status==5)
                                {
                                    $st_title="Reject From ACCOUNT";
                                }
                                elseif($Qu_status==6)
                                {
                                    $st_title="Reject From Management";
                                }
                       echo"<tr>                   
                        <td><input type='checkbox' class='checkboxes' value='1'/></td> 
                        <td> $user_requr_id</td>
                        <td> $Qu_title </td>
                        <td> $desc </td>
                        <td> $Qu_price</td><td>";
                        // <td> $st_title</td>

                        if ($Qu_status==5) {
                            echo "<a href='cpto_form.php?requrmnt=requirement_edit&id=$user_requr_id'><button class='btn btn-success '>EDIT </button></a>
                            &nbsp;&nbsp;";
                        }
                        
                        echo "</td><td><a href='user_details_view.php?id=$user_requr_id'><button  class='btn btn-success '>বিস্তারিত</button></a>
                        &nbsp;&nbsp;
                        </td>
                  
                        </td>";
                        echo "</tr>";
                        }
                                
                        }
                        }

                         elseif($level==1){  
                ?>
                
                <thead>     
                <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1.checkboxes" /></th>
                <!-- <th>Account id</th> -->
                <th> সিরিয়াল</th>
                <th> Sender Name</th>
                <th> রিকুইরেমেন্ট টাইটেল</th>
                <th> রিকুইরেমেন্ট ডিটেইলস</th>
                <th> রিকুইরেমেন্ট মূল্য</th>
                <th> Send/Reject</th>
                <th> ডিটেইলস স্ট্যাটাস</th>
               </tr>
               </thead>
               <?php
               
                $accid=$_SESSION['user_id'];

                $acc_sql=mysqli_query($conn,"select distinct user_requr_id, send_id,recv_con_id,confirm_id,form_pk_id,id,Qu_descrbs,Qu_title,Qu_status,Qu_price,username_req
                from requirement_detalis_tbl inner join user_requirement on 
                user_requirement.user_requr_id=requirement_detalis_tbl.form_pk_id
                group by user_requr_id
                order by requirement_detalis_tbl.id desc");

                echo"<span><h3>ইউসার পাঠানো লিস্ট</h3></span>";
                 
                    if($acc_sql==true)
                    {
                        while($row=mysqli_fetch_array($acc_sql))
                        { 
                            $user_requr_id=$row['form_pk_id'];
                            $Qu_title= $row['Qu_title'];
                            $Qu_descrbs=$row['Qu_descrbs'];
                            $Qu_price=$row['Qu_price'];
                            $Qu_status=$row['Qu_status'];
                            $Qu_reqfrom=$row['send_id'];
                            $username_req=$row['username_req'];

                            $desc = (truncateString($Qu_descrbs, 25, false) . "\n");

                            if($Qu_status==1)
                            {
                                $st_title="SEND FROM USER";
                            }
                            elseif($Qu_status==2)
                            {
                                $st_title="SEND TO MD";
                            }
                            elseif($Qu_status==3)
                            {
                                $st_title="CONFRIM Management";
                            }
                            elseif($Qu_status==4)
                            {
                                $st_title="final approved";
                            }
                            elseif($Qu_status==5)
                            {
                                $st_title="Reject From ACCOUNT";
                            }
                            elseif($Qu_status==6)
                            {
                                $st_title="Reject From Management";
                            }
                   echo"<tr>                   
                    <td><input type='checkbox' class='checkboxes' value='1' /></td> 
                    <td> $user_requr_id </td>
                    <td> $username_req </td>
                    <td> $Qu_title </td>
                    <td> $desc </td>
                    <td> $Qu_price </td>
                    <td> $st_title </td>
                    ";
                    // if(($Qu_status==5)or($Qu_status==2))
                    // {
                    //     echo "<td></td>";
                    // }
                    //     else
                    //     {
                    // echo"<td><a href='cpto_form.php?id=$user_requr_id&sender_id=$accid&rcvr=$Qu_reqfrom&send_req=send_req&requrmnt=reply&Qu_title=$Qu_title'><button  class='btn btn-success '>Send </button></a>
                    // &nbsp;&nbsp;
                    // </td>";}
                   
                    echo"<td><a href='user_details_view.php?id=$user_requr_id'>
                    <button  class='btn btn-success '>Details Status</button></a>
                    &nbsp;&nbsp;
                    </td>
                    </td>";
                    echo "</tr>";
                    }
                        }

                        }

                    
                            // ====ACCOUNTS =========
             elseif($level==2){  
                ?>
                <thead>     
                <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1.checkboxes" /></th>
                <!-- <th>Account id</th> -->
                <th> সিরিয়াল</th>
                <th> Sender Name</th>
                <th> রিকুইরেমেন্ট টাইটেল</th>
                <th> রিকুইরেমেন্ট ডিটেইলস</th>
                <th> রিকুইরেমেন্ট মূল্য</th>
                <!-- <th> স্ট্যাটাস</th> -->
                <th> Send/Reject</th>
                
                <th> ডিটেইলস স্ট্যাটাস</th>
               </tr>
               </thead>
               <?php
                $accid=$_SESSION['user_id'];
                
                    $acc_sql=mysqli_query($conn,"select distinct user_requr_id, send_id,recv_con_id,confirm_id,form_pk_id,id,Qu_descrbs,Qu_title,Qu_status,Qu_price,username_req
                    from requirement_detalis_tbl inner join user_requirement on 
                    user_requirement.user_requr_id=requirement_detalis_tbl.form_pk_id
                    group by user_requr_id
                    order by requirement_detalis_tbl.id desc");
   
                 echo"<span><h3>ইউসার পাঠানো লিস্ট</h3></span>";
                 
                    if($acc_sql==true)
                    {
                        while($row=mysqli_fetch_array($acc_sql))
                        { 
                            $user_requr_id=$row['form_pk_id'];
                            $Qu_title= $row['Qu_title'];
                            $Qu_descrbs=$row['Qu_descrbs'];
                            $Qu_price=$row['Qu_price'];
                            $Qu_status=$row['Qu_status'];
                            $Qu_reqfrom=$row['send_id'];
                            $username_req=$row['username_req'];

                             $desc = (truncateString($Qu_descrbs, 25, false) . "\n");

                            if($Qu_status==1)
                            {
                                $st_title="SEND FROM USER";
                            }
                            elseif($Qu_status==2)
                            {
                                $st_title="SEND TO MD";
                            }
                            elseif($Qu_status==3)
                            {
                                $st_title="CONFRIM Management";
                            }
                            elseif($Qu_status==4)
                            {
                                $st_title="final approved";
                            }
                            elseif($Qu_status==5)
                            {
                                $st_title="Reject From ACCOUNT";
                            }
                            elseif($Qu_status==6)
                            {
                                $st_title="Reject From Management";
                            }
                   echo"<tr>                   
                    <td><input type='checkbox' class='checkboxes' value='1' /></td> 
                    <td> $user_requr_id </td>
                    <td> $username_req </td>
                    <td> $Qu_title </td>
                    <td> $desc </td>
                    <td> $Qu_price </td> ";
                    // <td> $st_title </td>
                   
                    if(($Qu_status==5)or($Qu_status==2)or($Qu_status==4))
                    {
                        echo "<td></td>";
                    }
                        else
                        {
                    echo"<td><a href='cpto_form.php?id=$user_requr_id&sender_id=$accid&rcvr=$Qu_reqfrom&send_req=send_req&requrmnt=reply&Qu_title=$Qu_title'><button  class='btn btn-success '> Send </button></a>
                    &nbsp;&nbsp;
                    </td>";}
                   
                    echo"<td><a href='user_details_view.php?id=$user_requr_id'>
                    <button  class='btn btn-success '>Details Status</button></a>
                    &nbsp;&nbsp;
                    </td>
                    </td>";
                    echo "</tr>";
                    }
                        }
                        }

                            // ====APPROVE FROM ACCOUNTS TO MD====

                     elseif($level==3){ 
                         ?>
                <thead>     
                <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1.checkboxes" /></th>
                <!-- <th>Account id</th> -->
                <th> সিরিয়াল</th>
                <th> Sender Name</th>
                <th> রিকুইরেমেন্ট টাইটেল</th>
                <th> রিকুইরেমেন্ট ডিটেইলস</th>
                <th> রিকুইরেমেন্ট মূল্য</th>
                <!-- <th> স্ট্যাটাস</th> -->
                <th> Send/Reject</th>
                
                <th> ডিটেইলস স্ট্যাটাস</th>
               </tr>
               </thead>
               <?php    
                 $accid=$_SESSION['user_id'];
                    $md_sql=mysqli_query($conn,"select distinct user_requr_id,send_id,recv_con_id,confirm_id,form_pk_id,id,Qu_descrbs,Qu_title,Qu_status,Qu_price,username_req
                    from requirement_detalis_tbl inner join user_requirement on 
                    user_requirement.user_requr_id=requirement_detalis_tbl.form_pk_id
                    group by user_requr_id
                    order by requirement_detalis_tbl.id desc");
                    // echo"<span><h3>md পাঠানো-ফর্ম</h3></span>";
               //1 = Show Data
                    if($md_sql==true)
                    {
                        while($row=mysqli_fetch_array($md_sql))
                        { 
                            $user_requr_id=$row['form_pk_id'];
                            $Qu_title= $row['Qu_title'];
                            $Qu_descrbs=$row['Qu_descrbs'];
                            $Qu_price=$row['Qu_price'];
                            $Qu_status=$row['Qu_status'];
                            $Qu_reqfrom=$row['send_id'];
                            $username_req=$row['username_req'];

                             $desc = (truncateString($Qu_descrbs, 25, false) . "\n");

                            if($Qu_status==1)
                            {
                                $st_title="SEND FROM USER";
                            }
                            elseif($Qu_status==2)
                            {
                                $st_title="SEND FROM ACCOUNT";
                            }
                            elseif($Qu_status==3)
                            {
                                $st_title="CONFRIM Management";
                            }
                            elseif($Qu_status==4)
                            {
                                $st_title="final approved";
                            }
                            elseif($Qu_status==5)
                            {
                                $st_title="Reject From Acc";
                            }
                            elseif($Qu_status==6)
                            {
                                $st_title="Reject From MD";
                            }
                   echo"<tr>                   
                    <td><input type='checkbox' class='checkboxes' value='1' /></td> 
                    <td> $user_requr_id</td>
                    <td> $username_req</td>
                    <td> $Qu_title </td>
                    <td> $desc </td>
                    <td> $Qu_price</td>
                   
                    ";
                    //  <td> $st_title</td>
                    if(($Qu_status==6)or($Qu_status==3)or($Qu_status==4))
                    {
                        echo "<td></td>";
                    }
                        else
                        {
                    echo"<td><a href='cpto_form.php?id=$user_requr_id&sender_id=$accid&rcvr=$Qu_reqfrom&send_req=send_req&requrmnt=reply&Qu_title=$Qu_title'><button class='btn btn-success '>Send </button></a>
                    &nbsp;&nbsp;
                    </td>";}
                   
                    echo"<td><a href='user_details_view.php?id=$user_requr_id'>
                    <button  class='btn btn-success '>Details Status</button></a>
                    &nbsp;&nbsp;
                    </td>
                    </td>";
                    echo "</tr>";
                    }
                        }
                        }

                    //  QUERY CODE ENDED HERE TILL======///

                        elseif($level==0){  //APPROVE FROM MD/ TO ACCOUNTS lvl = 2
                            $md_send_form=mysqli_query($conn,"SELECT * from user_requirement where Qu_status = 3");
                            echo"<h3>Md পাঠানো  লিস্ট</h3>";
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

                                 $desc = (truncateString($Qu_descrp, 25, false) . "\n");

                        echo "<tr>
                        <td><input type='checkbox' class='checkboxes' value='1' /></td>
                        
                        <td> $user_requr_id</td>
                        <td> $Qu_title </td>
                        <td> $Qu_price</td>
                        <td> $desc</td>

                         <td><a href='Action/add_requirement.php?approve_form=approve_requermnt&user_requr_id=$user_requr_id&status=4'><span class='btn btn-success'>310</span></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        
                        <a href='Action/add_sample.php?del_sample=del_sam&sample_id=$sample_id_serial'>
                        <span class='btn btn-danger'>Delete</span>
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>";
                        echo "</tr>";
                        }
                        }
                        }

                        // MD TO ACCOUNTS APPROVEL LIST

                        elseif($level==2){  //FINAL APPROVE FROM ACCOUNTS/ TO USER
                        // $md_approvel_list=mysqli_query($conn,"SELECT * from requirement_detalis_tbl where  Qu_status = 4");
                    $md_approvel_list=mysqli_query($conn,"SELECT * from user_requirement where Qu_status = 4");
                    echo"here are !!";
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
                        <td><a href='Action/add_requirement.php?approve_form=approve_requermnt&user_requr_id=$user_requr_id&status=4'><span class='btn btn-success'>Approved</span></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        
                        <a href='Action/add_sample.php?del_sample=del_sam&sample_id=$sample_id_serial'>
                        <span class='btn btn-danger'>Delete</span>
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