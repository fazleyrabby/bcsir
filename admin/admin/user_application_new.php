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
       <?php if(isset($_GET['usr_application'])) { 
         if ($_GET['usr_application'] == "application_form"){
           echo "<h4><i class='icon-tags'></i> বিশ্লেষণ সেবার আবেদন  </h4>";
         }
         elseif($_GET['usr_application'] == "application_list")
         {
            echo "<h4><i class='icon-tags'></i> বিশ্লেষণ সেবার তালিকা </h4>";
         }
         elseif($_GET['usr_application'] == "invoice_details")
         {
            echo "<h4><i class='icon-tags'></i> রিপোর্ট </h4>";
         }
         elseif($_GET['usr_application'] == "temp_view")
         {
            echo "<h4><i class='icon-tags'></i> বিশ্লেষণ সেবার আবেদন </h4>";
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
    if (isset($_GET['usr_application'])) {  

      $usr_application = $_GET['usr_application'];    //if clicked on add application form
      if ($usr_application == "application_form") { ?>

        <?php
        date_default_timezone_set('Asia/Dhaka');
        //Generate Unique Transaction ID
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
      <form action="user_application.php?usr_application=temp_view" method="POST" class="form-horizontal" enctype=multipart/form-data>

           <input type="hidden" id="store_id" name="store_id" value="osellers">
           <input type="hidden" name="signature_key" value="707052fcbf66ed5431d626e9a38d2821">
           <input type="hidden" id="tran_id" name="tran_id" value="<?php echo $cur_random_value?>">
           <input type="hidden" name="currency" value="BDT">
           <input type="hidden" name="cus_name" value="<?php echo $usernamee?>">
           <input type="hidden" name="cus_email" value="<?php echo $email?>">
           <input type="hidden" id="phone" value="<?php echo $_SESSION['contact_no']?>" name="cus_phone">
           <input type="hidden" name="success_url" id="txt3">
           <input type="hidden" name="fail_url" id="txt4">
           <input type="hidden" name="cancel_url" id="txt5">

           

           <!-- <input type="hidden" value="rcrea5bff762fad37a" name="store_id">
           <input type="hidden" value="rcrea5bff762fad37a@ssl" name="store_passwd">
           <input type="hidden" value="BDT" name="currency">
           <input type="hidden" value="1234567890" name="tran_id">
           <input type="hidden" id="txt3" value="" name="success_url">
           <input type="hidden" id="txt4" value="" name="fail_url">
           <input type="hidden" value="" name="cancel_url">
           <input type="hidden" value="</?php echo $usernamee?>" name="cus_name">
           <input type="hidden" value=" </?php echo $_SESSION/['email'] ?>" name="cus_email">
           <input type="hidden" value="</?php echo $_SESSION/['contact_no']?>" name="cus_phone"> -->

        
           <!-- <input type='text' name='PAYMENT_URL' id='txt3'> -->
           <!-- <input type='text' name='PAYMENT_URL' id='txt4'>


            <input type="hidden" value="</?php //echo $usernamee?>" name="username">
                <div class="control-group">
                    <label class="control-label"> ডেসক্রিপশন  </label>
                    <div class="controls">
                    <input type="text" name="application_dsc" class="span6">
                    
                    </div>
                </div>
            <!-- sample select box -->

            <div class="control-group">
                    <label class="control-label"> টেস্ট নাম</label>
                    <div class="controls">
                    <input type="text" id="desc" name="desc" class="span6" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">নমুনা নির্বাচন করুন: </label>
                    <div class="controls">
                    <select name="samp_selct_id" class="span6 tooltips" data-original-title="নির্বাচন করুন" onchange="get_parameter()" id="sample_id">
                    <?php 
                        $sample_data = mysqli_query($conn,"SELECT sample_id,sample_name FROM sample_tbl WHERE sample_st = 1"); //1 = only active 
                        if($sample_data == true) {
                          while($data = mysqli_fetch_array($sample_data)){
                                $sample_id = $data['0'];
                                $sample_name = $data['1']; ?>
                           <?php echo "<option value='$sample_id'>$sample_name</option>"?>
                    <?php }}?>                               
                    </select> 
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label"> টেস্ট কোয়ান্টিটি  </label>
                    <div class="controls">
                    <input type="number" name="test_qnty" id="test_qt" class="span6" value="1">
                    </div>
                </div>

                <!-- parameter select box -->
                <div class="control-group">
                                <label class="control-label">প্যারামিটার  নির্বাচন করুন</label>
                                <div class="controls p_relative" id="">
                                 
                                    <select data-placeholder="নির্বাচন করুন" class="chzn-select span6 parameter_list" multiple="multiple" id="parameter_id" name="pra_selct_id[]" onchange="get_method()">
                                    </select>
                                    <span class="custom_pointer">
                                        <i class="icon-plus-sign custom_icon_plus"></i>
                                    </span>
                                    
                                </div>
                            </div>      
                <!-- parameter select box end -->
                <!-- method select box -->
                <div class="control-group">
                                <label class="control-label">পদ্ধতি নির্বাচন করুন</label>
                                <div class="controls p_relative">
                                    <select data-placeholder="নির্বাচন করুন" class="chzn-select span6 method_list" multiple="multiple" id='method_price_id' name="method_selct_id[]" tabindex="6"  onchange="">
                                        <option value=""></option>
                                    </select>
                                     <span class="custom_pointer">
                                        <i class="icon-plus-sign custom_icon_plus"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">মোট খরচ (টাকা)</label>
                                <div class="controls">
                                     <input type="text" name="amount" id="total_amount" class="span6 method_total_price" value="0" readonly="true">
                                </div>
                            </div>
                <!-- Method select box end -->
                <div class="control-group">
                    <label class="control-label"> আবেদনকারীর নাম </label>
                    <div class="controls">
                    <input type="text" name="applicant_name" class="span6" value="<?php echo $usernamee?>">
                    </div>
                </div>

               
                <div class="control-group">
                    <label class="control-label"> ই-মেইল </label>
                    <div class="controls">
                        <input type="text" name="mail" class="span6" value="<?php echo $email?>"/>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label"> আবেদনকারীর নাম্বার </label>
                    <div class="controls">
                        <input type="text" name="applicant_contact" class="span6" value="<?php echo $_SESSION['contact_no']?>"/>
                    </div>
                </div>
       
             
                <div class="control-group">
                    <div class="controls">
                        <input type="submit" name="temp_view" value="সাবমিট" >
                        <!-- <a href="user_application.php?usr_application=temp_view">SEND</a> -->
                    </div>
                </div>
        </form>
        
        
      <?php }
        elseif($usr_application == "application_list") { //application List ?> 
        
            <!-- <span><h3>বিশ্লেষণ তালিকা</h3></span> -->
            <style>
            #sample_1_wrapper{
                overflow-x: scroll;
            
        }
            </style>
                <table class="table table-striped table-bordered" id="sample_1" style="">
                <thead>
                    <tr>
                    <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1.checkboxes" /></th>
                    <!-- <th>Account id</th> -->
                    <th> ডেসক্রিপশন </th>
                    <th> টেস্ট কোয়ান্টিটি  </th>
                    <th> সেম্পল </th>
                    <th> প্যারামিটার  </th>
                    <th> মেথড  </th>
                    <th> এমাউন্ট  </th>
                    <th> স্টোর আইডি  </th>
                    <th> সেন্ডার  </th>
                    <th> রিসিভার  </th>
                    <th> ট্রান্সক্যাশন আইডি  </th>
                    <th> সেন্ডার ইমেইল  </th>
                    <th> স্ট্যাটাস  </th>
                    <th> বিস্তারিত   </th>
                    

                </thead>
                <tbody>
                <?php  

                    if ($level == 1)
                    {
                    
                    $applicatioon_list=mysqli_query($conn,"SELECT 
                    user_application.description,
                    user_application.test_qt,
                    user_application.sample_id,
                    user_application.parameter_id,
                    user_application.method_id ,
                    all_payment_transactions.amount,
                    all_payment_transactions.store_id,
                    all_payment_transactions.sender,
                    all_payment_transactions.reciever,
                    all_payment_transactions.status,
                    all_payment_transactions.transaction_id,
                    all_payment_transactions.sender_email,
                    user_application.all_p_id
                    FROM user_application
                    JOIN all_payment_transactions
                    ON user_application.all_p_id = all_payment_transactions.id");  
                    }
                    else 
                    {
                    $applicatioon_list=mysqli_query($conn,"SELECT 
                    user_application.description,
                    user_application.test_qt,
                    user_application.sample_id,
                    user_application.parameter_id,
                    user_application.method_id ,
                    all_payment_transactions.amount,
                    all_payment_transactions.store_id,
                    all_payment_transactions.sender,
                    all_payment_transactions.reciever,
                    all_payment_transactions.status,
                    all_payment_transactions.transaction_id,
                    all_payment_transactions.sender_email,
                    user_application.all_p_id
                    FROM user_application
                    JOIN all_payment_transactions
                    ON user_application.all_p_id = all_payment_transactions.id where sender = '$usernamee'");	//1 = Show Data
                    }
                    if($applicatioon_list==true)
                    {
                        while($row=mysqli_fetch_array($applicatioon_list))
                        { 
                                $description=$row['0'];
                                $test_qt= $row['1'];
                                $sample_id= $row['2'];
                                $parameter_id= $row['3'];
                                $method_id= $row['4'];
                                $amount= $row['5'];
                                $store_id= $row['6'];
                                $sender= $row['7'];
                                $reciever= $row['8'];
                                $status= $row['9'];
                                $transaction_id= $row['10'];
                                $sender_email= $row['11'];
                                $invoice_id= $row['12'];

                            if ($status == 1) {
                                $status = "<span class='btn btn-danger'>সফলভাবে
    সম্পন্ন</span>";
                            }
                            elseif ($status == 2)  {
                                $status = "<span class='btn btn-success'>ত্রুটি</span>";
                            }
                            elseif ($status == 3)  {
                                $status = "<span class='btn btn-success'>বাতিলকৃত</span>";
                            }
                            echo "<tr>
                            <td><input type='checkbox' class='checkboxes' value='1' /></td>
                            <td> $description</td>
                            <td> $test_qt </td>";

                            $sample_data = mysqli_query($conn,"SELECT sample_name FROM sample_tbl WHERE sample_id = $sample_id"); //1 = only active 
                            if($sample_data == true) {
                            while($data = mysqli_fetch_array($sample_data)){
                                $sample_name = $data['0'];
                                echo "<td> $sample_name </td>";
                                }
                            }
                            echo "<td>";
                            $i=0;
                            $para_data = mysqli_query($conn,"SELECT pra_name FROM prameter_tbl
                            where pra_id in ($parameter_id)"); //1 = only active 
                            $para_row = mysqli_num_rows($para_data);
                            if($para_data == true) {
                            while($data = mysqli_fetch_array($para_data)){
                                    $i+=1;
                                    $pra_name = $data['0'];
                                    if ($i == $para_row) {
                                        echo "$pra_name "; 
                                    }
                                    else {
                                        echo "$pra_name ,"; 
                                    }
                            }     
                            }
                            echo "</td>";
                            echo "<td>";
                            $i=0;
                            $method_data = mysqli_query($conn,"SELECT method_name FROM method_tbl
                            where methd_id in ($method_id) and method_st = 0"); //1 = only active 
                            $method_row = mysqli_num_rows($method_data);
                            if($method_data == true) {
                            while($m_data = mysqli_fetch_array($method_data)){
                                    $i+=1;
                                    $m_name = $m_data['0'];
                                    if ($i == $method_row) {
                                        echo "$m_name "; 
                                    }
                                    else {
                                        echo "$m_name ,"; 
                                    }
                                    //var json_encode($pra_name);
                                    //$all_para = implode(",",$pra_name);
                                //echo "$m_name,"; 
                            }
                            }
                            echo "</td>";
                            echo "<td> $amount </td>";
                            echo "<td> $store_id </td>";
                            echo "<td> $sender </td>";
                            echo "<td> $reciever </td>
                            <td> $transaction_id </td>
                            <td> $sender_email </td>
                            <td> $status </td>
                            


                            <td><a class='btn btn-primary' href='user_application.php?usr_application=invoice_details&invoice=$invoice_id&sample=$sample_id&parameter=$parameter_id&method=$method_id'>বিস্তারিত </a></td>
                            ";
                            echo "</tr>";
                            
                            }}?>
                        </tbody>
                    </table> 

           



    <?php }
    elseif($usr_application == "invoice_details") { 
        if (isset($_GET['invoice'])) {
           $invoice_id=$_GET['invoice'];
           $sample_id=$_GET['sample'];
           $parameter_id=$_GET['parameter'];
           $method_id=$_GET['method'];

           $invoice_dt = mysqli_query($conn,"SELECT a.id,a.store_id,a.sender,a.amount,a.reciever,a.status,a.transaction_id,a.sender_phone,a.sender_email,a.created_at,b.description FROM all_payment_transactions as a inner join user_application as b on b.all_p_id=a.id where a.id=$invoice_id");

             while($inv_dt = mysqli_fetch_array($invoice_dt)){
             $invoice_id = $inv_dt['id'];
             $store_id = $inv_dt['store_id'];
             $cus_name =$inv_dt['sender'];
             $amount=$inv_dt['amount'];
             $cus_phone=$inv_dt['sender_phone'];
             $cus_email=$inv_dt['sender_email'];
             $receiver=$inv_dt['reciever'];
             $tran_id=$inv_dt['transaction_id'];
             $created_at=$inv_dt['created_at'];
             $status = $inv_dt['status'];
             $description = $inv_dt['description'];
                   
      ?>


                            <div class="span12">
                                <!-- BEGIN BLANK PAGE PORTLET-->
                                <div class="widget purple">
                                    <!-- <div class=""> -->
                                        <!-- <h4><i class="icon-edit"></i> Invoice </h4> -->
                                 
                                    <div class="widget-body">
                                   
                             <div class="space20"></div>
                             <div class="row-fluid invoice-list">
                                 <div class="span4">
                                            
                    
                                     <h4>প্রেরক তথ্য</h4>
                                     <p>
                                         <?php echo "নাম  :$cus_name"?> <br>
                                         <?php echo "ই-মেইল :$cus_email"?> <br>
                                         <?php echo "ফোন :$cus_phone"?> <br>
                                     </p>
                                 </div>
                                 <div class="span4">
                                     <h4>গ্রাহক তথ্য </h4>
                                     <ul class="unstyled">
                                         <li> <?php echo "নাম:$receiver"?><br> </li>
                                         <li> <?php echo "স্টোর আইডি :$store_id"?><br> </li>
                                     </ul>
                                 </div>
                                 <div class="span4">
                                     <h4>ইনভয়েস তথ্য </h4>
                                     <ul class="unstyled">
                                         <li>ইনভয়েস নং  : <h4 class="alert-heading">
                                        <?php echo "$invoice_id"; ?>
                                        </h4></li>
                                        <li>ট্রান্সেকশন আইডি  : <h4 class="alert-heading"><?php echo "$tran_id"?></h4></li> 
                                        <li>তারিখ      : <?php echo $created_at;?></li>
                                         <li>অবস্থা   : 
                                           <?php if ($status == 1){
                                           echo "সাফল্য "; }
                                           elseif ($status == 2){
                                           echo "ত্রুটি "; }
                                           elseif ($status == 3){
                                           echo "বাতিল "; }
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
                                            <th colspan="1"> টেস্ট নাম  </th>
                                            <th> নমুনা </th>
                                            <th> প্যারামিটার   </th>
                                            <th> মেথড </th>
                                            <th> মূল্য</th>
                                        </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td><?php echo $description?></td>
                                <?php
                                $sample_data = mysqli_query($conn,"SELECT sample_name FROM sample_tbl WHERE sample_id = $sample_id"); //1 = only active 
                        if($sample_data == true) {
                          while($data = mysqli_fetch_array($sample_data)){
                            $sample_name = $data['0'];
                            echo "<td> $sample_name </td>";
                            }
                        }
                        echo "<td>";
                        $i=0;
                        $para_data = mysqli_query($conn,"SELECT pra_name FROM prameter_tbl
                        where pra_id in ($parameter_id)"); //1 = only active 
                        $para_row = mysqli_num_rows($para_data);
                        if($para_data == true) {
                          while($data = mysqli_fetch_array($para_data)){
                                $i+=1;
                                $pra_name = $data['0'];
                                if ($i == $para_row) {
                                    echo "$pra_name "; 
                                }
                                else {
                                     echo "$pra_name ,"; 
                                }
                          }     
                        }
                        echo "</td>";
                        echo "<td>";
                        $i=0;
                        $method_data = mysqli_query($conn,"SELECT method_name FROM method_tbl
                        where methd_id in ($method_id) and method_st = 0"); //1 = only active 
                        $method_row = mysqli_num_rows($method_data);
                        if($method_data == true) {
                          while($m_data = mysqli_fetch_array($method_data)){
                                $i+=1;
                                $m_name = $m_data['0'];
                                if ($i == $method_row) {
                                    echo "$m_name "; 
                                }
                                else {
                                     echo "$m_name ,"; 
                                }
                                //var json_encode($pra_name);
                                //$all_para = implode(",",$pra_name);
                               //echo "$m_name,"; 
                          }
                        }
                        echo "</td>";
                                ?>
                                <td><?php echo $amount?></td>
                                </tr>
                            </tbody>
                            </table>
                             <div class="space20"></div>
                             <div class="row-fluid">
                                 <div class="span4 invoice-block pull-right">
                                     <ul class="unstyled amounts">
                                         <li><h4 class="alert-heading">Sub - Total amount(BDT) :</h4><?php echo $amount?></li>
                                         
                                    <li><h4 class="alert-heading">Grand Total(BDT) :</h4> <?php echo $amount?></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="space20"></div>
                             <div class="row-fluid text-center">

                                 <!-- <a class="btn btn-success btn_success_custom btn-large hidden-print"> Submit Your Invoice <i class="icon-check"></i></a> -->
                                 <a class="btn btn-inverse btn-large hidden-print" href="transaction_report.php?invoice_id=<?=$invoice_id?>&&sample=<?=$sample_id?>&&parameter=<?=$parameter_id?> &&method=<?=$method_id?>"> Print <i class="icon-print icon-big"></i></a>
                             </div>
                         </div>
                     <!-- </div> -->
                     <!-- END BLANK PAGE PORTLET-->
                 </div>

             </div>
            <?php }} ?>

   <?php } elseif($usr_application == "temp_view"){ //SHOWING TEMPORARY VIEW OF THE FORM
     
        if (isset($_POST['temp_view'])) {
        
        $store_id=$_POST['store_id'];
        $signature_key=$_POST['signature_key'];
        $tran_id=$_POST['tran_id'];
        $currency=$_POST['currency'];
        $cus_name=$_POST['cus_name'];
        $cus_email=$_POST['cus_email'];
        $success_url=$_POST['success_url'];
        $fail_url=$_POST['fail_url'];
        $cancel_url=$_POST['cancel_url'];
        $cus_phone=$_POST['cus_phone'];
        $test_qnty=$_POST['test_qnty'];
        $desc = $_POST['desc'];
	    $samp_selct_id = $_POST['samp_selct_id'];
        $pra_selct_id = $_POST['pra_selct_id'];
        $method_selct_id = $_POST['method_selct_id'];
        $amount = $_POST['amount'];

        $all_parameter = implode(",",$pra_selct_id);
	      $all_method = implode(",",$method_selct_id);
        ?>
                    <form action="http://secure.aamarpay.com/index.php" method="post" class="form-horizontal">
                      <!-- http://secure.aamarpay.com/index.php -->
                     
                    <!-- <table border="0" cellspacing="2" style="border-collapse:collapse;"> -->
                
                

                    <input type="hidden" name="store_id" value="<?php echo $store_id?>">
                    <input type="hidden" name="signature_key" value="<?php echo $signature_key?>">
                    <input type="hidden" id="" name="tran_id" value="<?php echo $tran_id?>">
                    <input type="hidden" name="currency" value="<?php echo $currency?>">
                    <input type="hidden" name="success_url" id="txt3" value="<?php echo $success_url?>">
                    <input type="hidden" name="fail_url" id="txt4" value="<?php echo $fail_url?>">
                    <input type="hidden" name="cancel_url" id="txt5" value="<?php echo  $cancel_url?>">
                    <input type="hidden" name="all_para" id="" value="<?php echo $all_parameter?>">
                     <input type="hidden" name="all_sample" id="" value="<?php echo $samp_selct_id?>">
                    <input type="hidden" name="all_method" id="" value="<?php echo $all_method?>">

              <div class="control-group">
                    <label class="control-label"> নাম  </label>
                    <div class="controls">
                     <input type="text" name="cus_name" class="span6 "value="<?php echo $cus_name?>"readonly>
                    </div>
                </div>
                 <div class="control-group">
                    <label class="control-label"> ই-মেইল </label>
                    <div class="controls">
                       <input type="text" name="cus_email" class="span6 "value="<?php echo $cus_email?>"readonly>
                       </div>
                </div>
                 <div class="control-group">
                    <label class="control-label"> ফোন </label>
                    <div class="controls">
                     <input type="text" name="cus_phone" class="span6 "value="<?php echo $cus_phone?>"readonly>
                    </div>
                </div>
                 <div class="control-group">
                    <label class="control-label"> মূল্য </label>
                    <div class="controls">
                    <input type="text" name="amount" class="span6 "value="<?php echo $amount?>"readonly>
                    </div>
                </div>
                 <div class="control-group">
                    <label class="control-label"> বিবরণ </label>
                    <div class="controls">
                     <input type="text" name="desc" class="span6 "value="<?php echo $desc?>" readonly>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label"> মেথড </label>
                    <div class="controls">
                       <input type="text" class="span6 "value=
                    "<?php 
                       $i=0;
                    $method_data = mysqli_query($conn,"SELECT method_name FROM method_tbl
                        where methd_id in ($all_method) and method_st = 0"); //1 = only active 
                        $method_row=mysqli_num_rows($method_data);  
                        if($method_data == true) {
                          while($m_data = mysqli_fetch_array($method_data)){
                            $i+=1;
                            $m_name = $m_data['0'];
                                if($i== $method_row)
                            {
                                echo "$m_name ";
                            }
                            else
                            {
                                echo "$m_name ,";
                            }   
                          }
                     }
                     ?>"
                     readonly>
                    </div>
                </div>

                 <div class="control-group">
                    <label class="control-label"> নমুনা  </label>
                    <div class="controls">
                       <input type="text" class="span6 "value=
                    "<?php 
                    $sample_data = mysqli_query($conn,"SELECT sample_name FROM sample_tbl WHERE sample_id = $samp_selct_id"); //1 = only active 
                        if($sample_data == true) {
                          while($data = mysqli_fetch_array($sample_data)){
                            $sample_name = $data['0'];
                            echo "$sample_name";
                            
                            }
                        }  
                    ?>" 
                    readonly>
                    </div>
                </div>
                      <div class="control-group">
                    <label class="control-label"> প্যারামিটার  </label>
                    <div class="controls">
                       <input type="text" class="span6 "value=
                    "<?php 
                    $i=0;
                    $para_data = mysqli_query($conn,"SELECT pra_name FROM prameter_tbl
                    where pra_id in ($all_parameter)"); //1 = only active  
                    $para_mc=mysqli_num_rows($para_data);  
                    if($para_data == true) {
                      
                        while($data = mysqli_fetch_array($para_data)){
                              $i+=1;
                            $pra_name = $data['0'];

                            //echo $pra_name;
                            //$pra_names = implode(",",$pra_name);
                            if($i== $para_mc)
                            {
                                  echo "$pra_name ";
                            }
                            else
                            {
                                    echo "$pra_name ,";
                            }
                            
                            //echo rtrim($pra_name,',');
                           
                        }
                    }
                    ?>"
                    readonly>
                    </div>
                </div>
             
                 <br>   
                 <button type="submit " class='btn btn-primary btn_success_custom' value="" name="submit">সাবমিট</button>

                    <a class="btn btn-danger" href="user_application.php?usr_application=application_form">বাতিল </a>
                 
                    <!-- </table> -->
                    </form>



    <?php } } elseif($usr_application == "transaction"){ //FOR TRANSACTION DETAILS AFTER TRANSACTION

          if (isset($_GET['tsuccess'])) {
                    $transaction_st = $_GET['tsuccess'];
                    if ($transaction_st == 'success') { $tran_st = 1; $tran_message = "<span style='font-size:22px; font-weight: 700'>সফলভাবে সম্পন্ন হয়েছে  </span>"; }
                    elseif ($transaction_st == 'error') { $tran_st = 2; $tran_message = "<span style='font-size:22px; font-weight: 700'>ত্রুটি ঘটেছে </span>"; }
                    elseif ($transaction_st == 'cancel') { $tran_st = 3; $tran_message = "<span style='font-size:22px; font-weight: 700'>বাতিল করা হয়েছে  </span>"; }
                    echo "$tran_message";

                    $method_list=$_GET['method_list'];
                    $parameter_list=$_GET['parameter_list'];
                    $sample_id=$_GET['sample_id'];
                    $desc=$_GET['desc'];
                    $test_qt=$_GET['test_qt'];

                    $store_id=$_GET['store_id'];
                    $tran_id=$_GET['tran_id'];
                    $cus_name=$_GET['sender_name'];
                    $cus_email=$_GET['sender_email'];
                    $cus_phone=$_GET['phone'];
                    $amount = $_GET['amnt'];
                    $receiver = $_GET['receiver'];

                    // $parameter_id = implode(',',$parameter_list);
                    // $method_id = implode(',',$method_list);

                    $tran_check = "SELECT transaction_id from all_payment_transactions where transaction_id ='$tran_id'";
                        $tran_check_sql = mysqli_query($conn,$tran_check);
                        $tran_check_row = mysqli_num_rows($tran_check_sql);

                        if ($tran_check_row == 0) {
                        $transaction = "INSERT into all_payment_transactions (`amount`,`store_id`,`reciever`,`sender`,`status`,`transaction_id`,`sender_email`,`sender_phone`,`created_at`,`updated_at`) values 
                        ('$amount','$store_id','$receiver','$cus_name',$tran_st,'$tran_id','$cus_email','$cus_phone',now(),now())";

                        $tran_sql = mysqli_query($conn,$transaction);
                        

                        if ($tran_sql == true) {
                           // $last_id_transaction = "SELECT *";
                        $last_id_tran = mysqli_query($conn,"SELECT last_insert_id() as last_id from all_payment_transactions");

                        $last_id = mysqli_fetch_object($last_id_tran);
                        $t_id=$last_id->last_id;
                        
                        // echo $t_id;
                        // die();

                        $user_application_table = mysqli_query($conn,"INSERT into user_application (`all_p_id`,`description`,`test_qt`,`sample_id`,`parameter_id`,`method_id`,`application_st`,`created_at`,`updated_at`) values 
                        ($t_id,'$desc','$test_qt','$sample_id','$parameter_list','$method_list',1,now(),now())");

                        // if ($user_application_table == true) {
                        //     echo "succes";

                        // }
                        // else {
                        //     echo "error";
                        // }
                        

                            // echo "<span> (Database Updated) </span>";
                            ?>
                            <div class="row-fluid">
                            <div class="span12">
                                <!-- BEGIN BLANK PAGE PORTLET-->
                                <div class="widget purple">
                                    <div class="widget-title">
                                        <h4><i class="icon-edit"></i> Invoice Page </h4>
                                    <!-- <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                    </span> -->
                                    </div>
                                    <div class="widget-body">
                                    <!-- <div class="row-fluid">
                                        <div class="span12">
                                            <div class="text-center">
                                                <img alt="" src="img/vector-lab.jpg">
                                            </div>
                                            <hr>

                                        </div>
                                    </div> -->
                             <div class="space20"></div>
                             <div class="row-fluid invoice-list">
                                 <div class="span4">
                                            
                    
                                     <h4>প্রেরক তথ্য</h4>
                                     <p>
                                         <?php echo "নাম  :$cus_name"?> <br>
                                         <?php echo "ই-মেইল :$cus_email"?> <br>
                                         <?php echo "ফোন :$cus_phone"?> <br>
                                     </p>
                                 </div>
                                 <div class="span4">
                                     <h4>গ্রাহক তথ্য</h4>
                                     <ul class="unstyled">
                                         <li> <?php echo "নাম:$receiver"?><br> </li>
                                         <li> <?php echo "স্টোর আইডি:$store_id"?><br> </li>
                                     </ul>
                                 </div>
                                 <div class="span4">
                                     <h4>ইনভয়েস তথ্য</h4>
                                     <ul class="unstyled">
                                         <li>ইনভয়েস নং: <h4 class="alert-heading">
                                        <?php 
                                        $id = "SELECT id from all_payment_transactions where transaction_id = '$tran_id'";
                                        $tid = mysqli_query($conn,$id);
                                        while($row = mysqli_fetch_array($tid)){
                                          $t_id = $row['0'];
                                          echo $t_id;
                                        } 
                                        ?>
                                        </h4></li>
                                        <li>ট্রান্সেকশন আইডি : <h4 class="alert-heading"><?php echo "$tran_id"?></h4></li> 

                                       

                                        <li>তারিখ : <?php 
                                        $created_at = "SELECT created_at from all_payment_transactions where transaction_id = '$tran_id'";
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
                                            <th colspan="1"> টেস্ট নাম   </th>
                                            <th>  নমুনা  </th>
                                            <th>  প্যারামিটার    </th>
                                            <th>  মেথড  </th>
                                            <th>  মূল্য</th>
                                        </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td><?php echo $desc?></td>
                                <?php
                                $sample_data = mysqli_query($conn,"SELECT sample_name FROM sample_tbl WHERE sample_id = $sample_id"); //1 = only active 
                        if($sample_data == true) {
                          while($data = mysqli_fetch_array($sample_data)){
                            $sample_name = $data['0'];
                            echo "<td> $sample_name </td>";
                            }
                        }
                        echo "<td>";
                        $i=0;
                        $para_data = mysqli_query($conn,"SELECT pra_name FROM prameter_tbl
                        where pra_id in ($parameter_list)"); //1 = only active 
                        $para_row = mysqli_num_rows($para_data);
                        if($para_data == true) {
                          while($data = mysqli_fetch_array($para_data)){
                                $i+=1;
                                $pra_name = $data['0'];
                                if ($i == $para_row) {
                                    echo "$pra_name "; 
                                }
                                else {
                                     echo "$pra_name ,"; 
                                }
                          }     
                        }
                        echo "</td>";
                        echo "<td>";
                        $i=0;
                        $method_data = mysqli_query($conn,"SELECT method_name FROM method_tbl
                        where methd_id in ($method_list) and method_st = 0"); //1 = only active 
                        $method_row = mysqli_num_rows($method_data);
                        if($method_data == true) {
                          while($m_data = mysqli_fetch_array($method_data)){
                                $i+=1;
                                $m_name = $m_data['0'];
                                if ($i == $method_row) {
                                    echo "$m_name "; 
                                }
                                else {
                                     echo "$m_name ,"; 
                                }
                                //var json_encode($pra_name);
                                //$all_para = implode(",",$pra_name);
                               //echo "$m_name,"; 
                          }
                        }
                        echo "</td>";
                                ?>
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
                    else {
                        echo "<h2>Transaction Data Already exists</h2>";
                    }



                
             }
             
          }
        ?>


  <?php } ?>  <!-- Ending of ISSET add other content -->
    </div>
    </div>
    </div>
    </div>


</div>







<?php include 'footer.php';?>


<script>

$(function () {
	$('select').multipleSelect({
    	filter: true
    });
});

    function get_parameter(){
        var sample_id= $("#sample_id").val();
        // console.log(div_id);
    $.ajax({
        url : 'get_parameter.php',
        type : 'POST',
        // dataType = 'json',
        data : {sample_id: sample_id},
        success: function(result)
        {
            $(".parameter_list").html(result);
            console.log(result);
            $(".parameter_list").trigger("liszt:updated");   
        } 
    })
    }

        function get_method()
        {
        var parameter_id= $("#parameter_id").val();
        $.ajax({
            url : 'get_method.php',
            type : 'POST',
            dataType : 'json',
            data : {parameter_id: parameter_id},
            success: function(result)
            {
                var sum = parseFloat(result[1]);
                $(".method_total_price").val(sum);

                $(".method_list").html(result[0]);
                console.log(result);
                $(".method_list").trigger("liszt:updated");   
            }
                
            })
        }

    
    //     function get_method_price(){
    //     var method_price_id= $("#parameter_id").val();
    //     $.ajax({
    //     url : 'get_method_price.php',
    //     type : 'POST',
    //     data : {method_price_id: method_price_id},
    //     success: function(result)
    //     {   
    //         // var sum = parseFloat(result);
    //         // $(".method_total_price").val(sum);
    //         //console.log(result);
            
    //         // $(".method_list").trigger("liszt:updated");   
    //     }
        
    // })
    // }

            // var tran_id = $("#tran_id").val();
            // var phone = $("#phone").val();
            // var store_id = $("#store_id").val();
            // var sample_id = $("#sample_id").val();
            // var parameter_id = $("#parameter_id").val();
            // var method_id = $("#method_price_id").val();
            // var desc = $("#desc").val();
            // var test_qt = $("#test_qt").val();
            // var url = "http://bcsirlabsctg.com.bd/admin/admin/user_application.php";
            // // for server : http://bcsirlabsctg.com.bd/admin/admin/user_application.php

            // var str1=url+"?usr_application=transaction&tsuccess=success&sender_name=<?php echo $usernamee?>&receiver=wwwrcreationbd@gmail.com&status=1&tran_id="+tran_id+"&phone="+phone+"&store_id="+store_id+"&method_list="+method_id+"&test_qt="+test_qt+"&parameter_list="+parameter_id+"&sample_id="+sample_id+"&desc="+desc+"&sender_email=<?php echo $email?>&amnt="

            // var str2=url+"?usr_application=transaction&tsuccess=error&sender_name=<?php echo $usernamee?>&receiver=wwwrcreationbd@gmail.com&status=2&tran_id="+tran_id+"&phone="+phone+"&store_id="+store_id+"&method_list="+method_id+"&test_qt="+test_qt+"&parameter_list="+parameter_id+"&sample_id="+sample_id+"&desc="+desc+"&sender_email=<?php echo $email?>&amnt="

            // var str3=url+"?usr_application=transaction&tsuccess=cancel&sender_name=<?php echo $usernamee?>&receiver=wwwrcreationbd@gmail.com&status=3&tran_id="+tran_id+"&phone="+phone+"&store_id="+store_id+"&method_list="+method_id+"&test_qt="+test_qt+"&parameter_list="+parameter_id+"&sample_id="+sample_id+"&desc="+desc+"&sender_email=<?php echo $email?>&amnt="
            
	        // document.getElementById('txt3').value = str1.concat(result);
	        // document.getElementById('txt4').value = str2.concat(result);
	        // document.getElementById('txt5').value = str3.concat(result);
            
    </script>


