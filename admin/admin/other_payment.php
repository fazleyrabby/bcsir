<?php
include 'header.php';
include 'sidebar.php';

?>
<!-- <style>

.bank_details{
display:none;
}

.bank_details_show:checked ~ .bank_details {
display:block;
}

.bank_details_hide:checked ~ .bank_details {
display:none;
}
</style> -->

<style>
.paylist ul {
    margin: 0;
}
.paylist ul>li{
list-style: none;
font-size: 16px;
margin-bottom:5px;
}
.paylist ul>li>span{
font-weight: 600;
}
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
                     <!-- ড্যাশবোর্ড -->
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
       <?php if(isset($_GET['payment'])) { 
         if ($_GET['payment'] == "add_payment"){
           echo "<h4><i class='icon-tags'></i> অন্যান্য সেবার আবেদন  </h4>";
         }
         elseif($_GET['payment'] == "payment_list")
         {
            echo "<h4><i class='icon-tags'></i> অন্যান্য সেবার তালিকা </h4>";
         }
         elseif($_GET['usr_application'] == "invoice_details")
         {
            echo "<h4><i class='icon-tags'></i> রিপোর্ট </h4>";
         }
         elseif($_GET['usr_application'] == "temp_view")
         {
            echo "<h4><i class='icon-tags'></i> অন্যান্য সেবার আবেদন </h4>";
         }
         elseif($_GET['payment'] == "payment_request_details")
         {
            echo "<h4><i class='icon-tags'></i> অন্যান্য সেবা বিস্তারিত  </h4>";
         }
         elseif($_GET['payment'] == "transaction")
         {
            echo "<h4><i class='icon-tags'></i> Transaction  </h4>";
         }
         elseif($_GET['payment'] == "payment_request")
         {
            echo "<h4><i class='icon-tags'></i> অন্যান্য সেবার আবেদন  </h4>";
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
                <h4 class="alert-heading">Account Head Name or Serial already exists!</h4>
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
    if (isset($_GET['payment'])) {  

      $payment = $_GET['payment'];  
       
      if ($payment == "add_payment" and isset($_GET['id'])) { ?>

<!-- http://secure.aamarpay.com/index.php -->
<!-- other_payment.php?payment=transaction -->
      <form action="http://secure.aamarpay.com/index.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
        <?php
        $id = $_GET['id'];
        // echo "$id";
        $sql = mysqli_query($conn,"SELECT username,applicant_name,applicant_address,description,reject_desc,reason,transaction_id,user_email,phone,amount,store_id from other_payment where id=$id");
        if ($sql == true) {
            while($data = mysqli_fetch_array($sql)){
                $username=$data['username'];
                $applicant_name=$data['applicant_name'];
                $applicant_address=$data['applicant_address'];
                $description=$data['description'];
                $transaction_id=$data['transaction_id'];
                $user_email=$data['user_email'];
                $amount=$data['amount'];
                $store_id=$data['store_id'];
                $phone=$data['phone'];
                $reason=$data['reason'];

                // print_r($data);
                
         ?>
           <input type="hidden" name="store_id" value="osellers">
           <input type="hidden" name="signature_key" value="707052fcbf66ed5431d626e9a38d2821">
           <input type="hidden" name="tran_id" value="<?php echo "$transaction_id"?>">
           <input type="hidden" name="currency" value="BDT">
           <input type="hidden" name="cus_name" value="<?=$usernamee?>">
           <input type="hidden" name="cus_email" value="<?=$user_email?>">
           <input type="hidden" name="cus_phone" value="<?=$_SESSION['contact_no']?>" >

           <input type="hidden" name="success_url"  value="http://bcsirlabsctg.com.bd/admin/admin/other_payment.php?payment=transaction&&transaction_status=success&status=1">
           <input type="hidden" name="fail_url" value="http://bcsirlabsctg.com.bd/admin/admin/other_payment.php?payment=transaction&&transaction_status=error&status=2">
           <input type="hidden" name="cancel_url" value="http://bcsirlabsctg.com.bd/admin/admin/other_payment.php?payment=transaction&&transaction_status=cancel&status=3">

           <div class="control-group">
                    <label class="control-label">জমার উদ্দেশ্য</label>
                    <div class="controls">
                    <input type="text" value="<?=$reason?>" name="opt_c" class="span6" readonly>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">জমা কারীর নাম</label>
                    <div class="controls">
                       <input type="text" name="opt_a" value="<?=$applicant_name?>" class="span6" readonly>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"> ঠিকানা   </label>
                    <div class="controls">
                    <input type="text" value="<?=$applicant_address?>" name="opt_b" id="address" class="span6"readonly>
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label">আবেদনের বিবরণ  বিবরণ</label>
                    <div class="controls">
                       <textarea name="opt_d" id="desc" class="span6" readonly><?=$description?></textarea>
                    </div>
                 </div>
                <div class="control-group">
                    <label class="control-label">টাকার পরিমান</label>
                    <div class="controls">
                    <input type="text" name="amount" value="<?=$amount?>" id="total_amount" class="span6" readonly>
                    </div>
                </div>
               
                <div class="control-group">
                    <div class="controls">
                        <input type="submit" name="send" value="সাবমিট">
                     
                    </div>
                </div>
                 <?php  }
        }
        ?> 
        </form>
           
         <?php }
         elseif($payment == "payment_request"){
            function rand_string( $length ) {
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $size = strlen( $chars );
            for( $i = 0; $i < $length; $i++ ) {
                $str .= $chars[ rand( 0, $size - 1 ) ];
            }
            return $str;
        }
                $cur_random_value=rand_string(10);
             ?>
            <form action="other_payment.php?payment=request_post" method="POST" class="form-horizontal" enctype=multipart/form-data>

            <input type="hidden" name="store_id" value="osellers">
           <input type="hidden" name="signature_key" value="707052fcbf66ed5431d626e9a38d2821">
           <input type="hidden" name="tran_id" value="<?php echo "$cur_random_value"?>">
           <input type="hidden" name="currency" value="BDT">
           <input type="hidden" name="cus_name" value="<?=$usernamee?>">
           <input type="hidden" name="cus_email" value="<?=$email?>">
           <input type="hidden" name="cus_phone" value="<?=$_SESSION['contact_no']?>">
            <div class="control-group">
                    <label class="control-label">জমার উদ্দেশ্য</label>
                    <div class="controls">
                    <input type="text" name="reason" class="span6" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">জমা কারীর নাম</label>
                    <div class="controls">
                       <input type="text" name="opt_a" class="span6" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"> ঠিকানা   </label>
                    <div class="controls">
                    <input type="text" name="opt_b" id="address" class="span6">
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label">কাজের বিবরণ</label>
                    <div class="controls">
                       <textarea name="desc" id="desc" class="span6" required></textarea>
                    </div>
                 </div>
                <div class="control-group">
                    <label class="control-label">টাকার পরিমান</label>
                    <div class="controls">
                    <input type="text" name="amount" id="total_amount" class="span6" required>
                    </div>
                </div>
               
                <div class="control-group">
                    <div class="controls">
                        <input type="submit" name="send" value="সাবমিট">
                     
                    </div>
                </div>
        </form> 


         <?php }
         elseif ($payment == 'request_post') {
                    // $transaction_status = $_GET['transaction_status'];
                    // if ($transaction_status == 'success') { $tran_st = 1; $tran_message = "<span style='font-size:22px; font-weight: 700'>সফলভাবে সম্পন্ন হয়েছে  </span>"; }
                    // elseif ($transaction_status == 'error') { $tran_st = 2; $tran_message = "<span style='font-size:22px; font-weight: 700'>ত্রুটি ঘটেছে </span>"; }
                    // elseif ($transaction_status == 'cancel') { $tran_st = 3; $tran_message = "<span style='font-size:22px; font-weight: 700'>বাতিল করা হয়েছে  </span>"; }
                    // echo "$tran_message";

                    // echo "<pre>";
                    // print_r($_POST);
                    // $desc = $_POST['store_id'];
                    $tran_id = $_POST['tran_id'];
                    $reason = $_POST['reason'];
                    $username = $_POST['cus_name']; //username (logged in)
                    $applicant_name = $_POST['opt_a']; //applicant name
                    $applicant_address = $_POST['opt_b']; //applicant address
                    $cus_email = $_POST['cus_email']; //email (logged in)
                    $cus_phone = $_POST['cus_phone']; //phone (logged in)
                    $amount = $_POST['amount'];
                    $description = $_POST['desc'];
                    $receiver = $_POST['store_id']; //store_id

                    $tran_check = "SELECT transaction_id from other_payment where transaction_id ='$tran_id'";

                        $tran_check_sql = mysqli_query($conn,$tran_check);
                        $tran_check_row = mysqli_num_rows($tran_check_sql);
                        
                        if ($tran_check_row == 0) {
                        $transaction = "INSERT into other_payment (`username`,`applicant_name`,`applicant_address`,`description`,`reason`,`transaction_id`,`user_email`,`amount`,`phone`,`store_id`,`created_at`,`updated_at`,`transaction_st`) values 
                        ('$username','$applicant_name','$applicant_address','$description','$reason','$tran_id','$cus_email','$amount','$cus_phone','$receiver',now(),now(),'$tran_st'
                        )";

                        $tran_sql = mysqli_query($conn,$transaction);
                        if ($tran_sql == true) 
                        {
                            echo "<script>location.replace('other_payment.php?success=success&payment=payment_request');</script>";
                        }
                        else {
                            echo "<script>location.replace('other_payment.php?success=success&payment=payment_request');</script>";
                        }
         }
        }
        elseif ($payment == "payment_request_details" and isset($_GET['invoice_id'])) { ?>
            <div class="row-fluid">
                            <div class="span12">
                                <!-- BEGIN BLANK PAGE PORTLET-->
                            
                                  <div>
                                    <?php $invoiceid = $_GET['invoice_id'];
                                    $sql = mysqli_query($conn,"SELECT id,username,applicant_name,applicant_address,description,reason,transaction_st,transaction_id,user_email,phone,amount,store_id from other_payment where id = $invoiceid");

                                    if ($sql == true) {
                                        while ($row = mysqli_fetch_array($sql)) {
                                            $id = $row['0'];
                                            $username = $row['1'];
                                            $applicant_name = $row['2'];
                                            $applicant_address = $row['3'];
                                            $description = $row['4'];
                                            $reason = $row['5'];
                                            $transaction_st = $row['6'];
                                            $transaction_id = $row['7'];
                                            $user_email = $row['8'];
                                            $phone = $row['9'];
                                            $amount = $row['10'];
                                            $store_id = $row['11'];
                                            
                                            if ($transaction_st == 0) {
                                                $status = "অনিষ্পন্ন";
                                            }
                                            elseif ($transaction_st == 1) {
                                                $status = "সফলভাবে সম্পন্ন";
                                            }
                                            elseif ($transaction_st == 2) {
                                                $status = "ত্রুটি";
                                            }
                                            elseif ($transaction_st == 3) {
                                                $status = "বাতিল";
                                            }
                                            elseif ($transaction_st == 4) {
                                                $status = "অনুমোদিত";
                                            }
                                            elseif ($transaction_st == 5) {
                                                $status = "প্রত্যাখ্যাত";
                                            }
                                            // echo "<pre>";
                                            // print_r($row);
                                    ?>
                                    <div class="span6 paylist" >
                                    <ul>
                                        <li><span>আবেদনকারীর নাম </span>: <?=$applicant_name?></li>
                                        <li><span>নাম</span> : <?=$reason?></li>
                                        <li><span>অবস্থা</span> : <?=$status?></li><li><span>আবেদনের বিবরণ </span> : <?=$description?></li>
                                        <?php
                                        if($transaction_st == 4 && ($level !=1 and $level !=7)) {?>
                                        (আপনার আবেদন টি অনুমদিত হয়েছে - অর্থ প্রদান এবং ফর্ম পুনরায়
                                        সাবমিট করার জন্য নিম্নের বাটন এ ক্লিক করুন)
                                            <li><a style='width:100px' class='btn btn-success' href='other_payment.php?payment=add_payment&id=<?=$id?>'>ফর্ম পূরণ </a>
                                            </li>    
                                        <?php } ?>
                                    </ul>    
                                    </div>
                                    <div class="span6 paylist" >
                                    <ul>
                                        <li><span>ই-মেইল</span> :<?=$user_email?></li>
                                        <li><span>ফোন</span> :<?=$phone?></li>
                                        <li><span>টোটাল এমাউন্ট</span> : <?=$amount?></li>
                                        
                                    </ul> 
                                    </div>
                                   
                                    <div class="span10"><br>
                                    <?php
                                   
                                    if ($level != 4 and $level != 5 and $transaction_st == 0 ) {?>
                                       <form action="other_payment.php?payment=approve_other_payment" method="POST" class="form-horizontal"
                                        enctype=multipart/form-data>
                                        <input type="hidden" name="id" value="<?php echo "$id";?>">
                                        
                                            <div class="control-group row">
                                            <label class="control-label span2">বিবরণ</label>
                                            <div class="controls">
                                                <select name="validation" id="validation">
                                                    <option value="4">Approve</option>
                                                    <option value="5">Reject</option>
                                                </select>
                                            </div>
                                        </div>
                                        

                                        <div class="control-group row reject_desc">
                                            <label class="control-label span2">বাতিল করার কারণ</label>
                                            <div class="controls">
                                                <textarea id="#" placeholder="Type Description" class="span6"
                                                    name="reject_desc" data-trigger="hover"
                                                    data-content="Type Description" name="" data-original-title="">
                                        </textarea>
                                            </div>
                                        </div>
                                        <div class="control-group row">
                                            <label class="control-label span2"></label>
                                            <div class="controls">
                                                <button name='submit_other_payment' class="btn btn-primary">Submit</button>
                                                </select>
                                            </div>
                                        </div>
                                        
                                    </form>
                                    
                                    <?php  }    
                                        }
                                    }

                                    
                                    ?>
                                    </div>
                                  
                                  </div>
                                    <div class="widget-body">
                                    </div>
                                </div>
                              
                           
        <?php }
         elseif($payment == 'approve_other_payment'){
             if (isset($_POST['submit_other_payment'])) {
                 $id = $_POST['id'];
                 $validation = $_POST['validation'];
                 $reject_desc = $_POST['reject_desc'];

                 $sql = mysqli_query($conn,"UPDATE other_payment set `transaction_st`='$validation',`reject_desc`='$reject_desc' WHERE id=$id");
                 if ($sql == true) {
                     echo "<script>location.replace('other_payment.php?success=success&payment=payment_list');</script>";
                 }
                 else {
                     echo "<script>location.replace('other_payment.php?success=error&payment=payment_list');</script>";
                 }
             }
         }
         elseif($payment == "transaction")
          { //FOR TRANSACTION DETAILS AFTER TRANSACTION
            if (isset($_GET['transaction_status'])) {

            
            //  die();
            // localhost/bcsir/admin/admin/other_payment.php?payment=transaction&&transaction_status=success&&store_id=osellers&&tran_id=123&&sender_name=fr&&sender_email=mail@mail.com&&phone=121323123&&amnt=4444&&receiver=osellers
                    $transaction_status = $_GET['transaction_status'];
                    if ($transaction_status == 'success') { $tran_st = 1; $tran_message = "<span style='font-size:22px; font-weight: 700'>সফলভাবে সম্পন্ন হয়েছে  </span>"; }
                    elseif ($transaction_status == 'error') { $tran_st = 2; $tran_message = "<span style='font-size:22px; font-weight: 700'>ত্রুটি ঘটেছে </span>"; }
                    elseif ($transaction_status == 'cancel') { $tran_st = 3; $tran_message = "<span style='font-size:22px; font-weight: 700'>বাতিল করা হয়েছে  </span>"; }
                    echo "$tran_message";

                    // echo "<pre>";
                    // print_r($_POST);
                    // $desc = $_POST['store_id'];
                    //$tran_id = $_POST['tran_id'];
                    $tran_id = $_POST['mer_txnid'];
                    
                    $reason = $_POST['opt_c'];
                    $username = $_POST['cus_name']; //username (logged in)
                    $applicant_name = $_POST['opt_a']; //applicant name
                    $applicant_address = $_POST['opt_b']; //applicant address
                    $cus_email = $_POST['cus_email']; //email (logged in)
                    $cus_phone = $_POST['cus_phone']; //phone (logged in)
                    $amount = $_POST['amount'];
                    // $description = $_POST['desc'];
                    $description = $_POST['opt_d'];
                    $receiver = $_POST['store_id']; //store_id

                    // $tran_check = "SELECT transaction_id from other_payment where transaction_id ='$tran_id'";

                    //     $tran_check_sql = mysqli_query($conn,$tran_check);
                        // $tran_check_row = mysqli_num_rows($tran_check_sql);
                        
                        // if ($tran_check_row == 0) {
                        $transaction = "UPDATE other_payment set transaction_st = $tran_st where transaction_id='$tran_id'";

                        $tran_sql = mysqli_query($conn,$transaction);
                        if ($tran_sql == true) 
                        {
                            
                            ?>
                            <div class="row-fluid">
                            <div class="span12">
                                <!-- BEGIN BLANK PAGE PORTLET-->
                                <div class="widget purple">
                                    <div class="widget-title">
                                        <h4><i class="icon-edit"></i> Invoice Page </h4>
                                 
                                    <div class="widget-body">
                                   
                             <div class="space20"></div>
                             <div class="row-fluid invoice-list">
                                 <div class="span4">
                                            
                    
                                     <h4>প্রেরক তথ্য</h4>
                                     <p>
                                         <?php echo "নাম  :$applicant_name"?> <br>
                                         <?php echo "ই-মেইল :$cus_email"?> <br>
                                         <?php echo "ফোন :$cus_phone"?> <br>
                                     </p>
                                 </div>
                                 <div class="span4">
                                     <h4>গ্রাহক তথ্য</h4>
                                     <ul class="unstyled">
                                         <!-- <li> </?php echo "নাম:$receiver"?><br> </li> -->
                                         <li> <?php echo "স্টোর আইডি:$receiver"?><br> </li>
                                     </ul>
                                 </div>
                                 
                                 <div class="span4">
                                     <h4>ইনভয়েস তথ্য</h4>
                                     <ul class="unstyled">
                                         <li>ইনভয়েস নং: <h4 class="alert-heading">
                                        <?php 
                                        $id = "SELECT id from other_payments where transaction_id = '$tran_id'";
                                        $tid = mysqli_query($conn,$id);
                                        while($row = mysqli_fetch_array($tid)){
                                          $t_id = $row['0'];
                                          echo $t_id;
                                        } 
                                        ?>
                                        </h4></li>
                                        <li>ট্রান্সেকশন আইডি : <h4 class="alert-heading"><?php echo "$tran_id"?></h4></li> 

                                       

                                        <li> তারিখ : <?php 
                                        $created_at = "SELECT created_at from other_payments where transaction_id = '$tran_id'";
                                        $c_date = mysqli_query($conn,$created_at);
                                        $row = mysqli_fetch_array($c_date);
                                          $transaction_dt = $row['0'];
                                          echo $transaction_dt;
                                        ?></li>
                                         <li>Invoice Status		: 
                                           <?php if ($tran_st == 1){
                                           echo "success"; }
                                           elseif ($tran_st == 2){
                                           echo "error"; }
                                           elseif ($tran_st == 3){
                                           echo "cancelled"; }
                                           ?>
                                           
                                        </li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="space20"></div>
                             <div class="space20"></div>
                              <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                        <tr>
                                            <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1.checkboxes"/></th>
                                            <!-- <th>Account id</th> -->
                                            <th colspan="1"> নাম </th>
                                            <th>  আবেদনের বিবরণ  </th>
                                            <th>  মূল্য</th>
                                        </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td><?php echo $desc?></td>
                                <td><?php echo $reason?></td>
                                <td><?php echo $amount?></td>
                                </tr>
                            </tbody>
                            </table>
                             <div class="space20"></div>
                             <div class="row-fluid">
                                 <div class="span4 invoice-block pull-right">
                                     <ul class="unstyled amounts">
                                         <li><h4 class="alert-heading">Sub - Total amount :</h4><?php echo $amount?></li>
                                         
                                    <li><h4 class="alert-heading">Grand Total :</h4> <?php echo $amount?></li>
                                     </ul>
                                 </div>
                             </div>
                             <!-- <div class="space20"></div>
                             <div class="row-fluid text-center">
                                 <a class="btn btn-success btn_success_custom btn-large hidden-print"> Submit Your Invoice <i class="icon-check"></i></a>
                                 <a class="btn btn-inverse btn-large hidden-print" onclick="javascript:window.print();"> Print <i class="icon-print icon-big"></i></a>
                             </div> -->
                         </div>
                     </div>
                     <!-- END BLANK PAGE PORTLET-->
                 </div>
             </div>
            <?php }
            else
            {
            echo mysqli_error($conn);
            }
            }
          }
          elseif($payment = 'payment_list') { ?>
          <style>
            #sample_1_wrapper{overflow-x: scroll;}
            </style>
              <table style='table-layout:fixed' class="table table-striped table-bordered" id="sample_1">
                <thead>
                    <tr>
                    <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1.checkboxes" /></th>
                    <!-- <th>Account id</th> -->
                    <th style="width:35px"> আইডি </th>
                    <th> নাম  </th>
                    <th> ঠিকানা </th>
                    <th style="width:100px"> বিবরণ  </th>
                    <th style="width:100px"> লেনদেন নাম্বার </th>
                    <th style="width:100px"> ফোন </th>
                    <th> মূল্য </th>
                    <th> স্টোর আইডি </th>
                    <th style="width:100px"> অবস্থা </th>
                    <th style="width:150px"> রিপোর্ট </th>
                    <!-- <th> রিপোর্ট </th> -->
                </thead>
                <tbody>
                <?php  
                   if ($level == 1 or $level == 3) {
                    $other_payment=mysqli_query($conn,"SELECT 
                    username,applicant_name,applicant_address,description,reason,transaction_st,transaction_id,user_email,phone,amount,store_id,id from other_payment");  
                   }
                   if ($level == 4) {
                    $other_payment=mysqli_query($conn,"SELECT 
                    username,applicant_name,applicant_address,description,reason,transaction_st,transaction_id,user_email,phone,amount,store_id,id from other_payment where username = '$usernamee'");  
                   }
                    if($other_payment==true)
                    {
                        while($row=mysqli_fetch_array($other_payment))
                        { 
                                $username=$row['0'];
                                $applicant_name= $row['1'];
                                $applicant_address= $row['2'];
                                $description= $row['3'];
                                $reason= $row['4'];
                                $transaction_st = $row['5'];
                                $transaction_id = $row['6'];
                                $user_email= $row['7'];
                                $phone= $row['8'];
                                $amount= $row['9'];
                                $store_id= $row['10'];
                                $invoice_id = $row['11'];
                              
                            $string = strip_tags($description);
                            if (strlen($string) > 50) {

                                // truncate string
                                $stringCut = substr($string, 0, 50);
                                $endPoint = strrpos($stringCut, ' ');

                                //if the string doesn't contain any space then it will cut without word basis.
                                $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                $string .= '...';
                            }
                            // echo $string;

                            if ($transaction_st == 0) {
                                $tstatus = "<span class='btn btn-danger'>অমীমাংসিত</span>";
                            }
                            elseif ($transaction_st == 1) {
                                $tstatus = "<span class='btn btn-danger'>সফলভাবে সম্পন্ন</span>";
                            }
                            elseif ($transaction_st == 2)  {
                                $tstatus = "<span class='btn btn-success'>ত্রুটি</span>";
                            }
                            elseif ($transaction_st == 3)  {
                                $tstatus = "<span class='btn btn-success'>বাতিলকৃত</span>";
                            }
                            elseif ($transaction_st == 4)  {
                                $tstatus = "<span class='btn btn-success'>অনুমত</span>";
                            }
                            elseif ($transaction_st == 5)  {
                                $tstatus = "<span class='btn btn-success'>বাতিলকৃত</span>";
                            }
                            echo "<tr>";
                            echo "<td><input type='checkbox' class='checkboxes' value='1'/></td>";
                            echo "<td> $invoice_id </td>";
                            echo "<td> $applicant_name</td>";
                            echo "<td> $applicant_address </td>";
                            echo "<td> $string</td>";
                            echo "<td> $transaction_id </td>";
                            echo "<td> $phone </td>";
                            echo "<td> $amount </td>";
                            echo "<td> $store_id </td>";
                            echo "<td> $tstatus </td>";
                            echo "<td>
                            <a class='btn btn-primary' href='other_payment.php?invoice_id=$invoice_id&&payment=payment_request_details'>বিস্তারিত</a>&nbsp;&nbsp;";
                            if ($transaction_st != 0) {
                                echo "<a class='btn btn-danger' href='other_payment_report.php?invoice_id=$invoice_id'>রিপোর্ট</a></td>";
                                echo "</tr>";
                            }
                            }}?>
                        </tbody>
                    </table> 
          <?php }
        
        
        }
          ?>
           

      <!-- Ending of ISSET add other content -->
    </div>
    </div>
    </div>
    </div>


</div>







<?php include 'footer.php';?>

<!-- <script>
localhost/bcsir/admin/admin/other_payment.php?payment=transaction&&transaction_status=success&&store_id=osellers&&tran_id=123&&sender_name=fr&&sender_email=mail@mail.com&&phone=121323123&&amnt=4444&&receiver=osellers
</script> -->


<script>
 $(".reject_desc").hide();
$("#validation").change(function(){
 var value = $(this).val();
 if (value == 5) {
    $(".reject_desc").show();
 }
 else{
    $(".reject_desc").hide();
 }

});

</script>