<?php
include 'header.php';
include 'sidebar.php';
?>
<style>

.bank_details{
display:none;
}

.bank_details_show:checked ~ .bank_details {
display:block;
}

.bank_details_hide:checked ~ .bank_details {
display:none;
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
                     ড্যাশবোর্ড 
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
       <?php if(isset($_GET['income'])) { 
         if ($_GET['income'] == "add_income"){
           echo "<h4><i class='icon-tags'></i> এড ইনকাম  </h4>";
         }
         elseif($_GET['income'] == "income_list")
         {
            echo "<h4><i class='icon-tags'></i> ইনকাম তালিকা </h4>";
         }
        }
        ?>
      </div>
     <div class="widget-body">
      <div class="row-fluid">
     <div class="span12">
           <?php
        if (isset($_GET['success'])) {
        //  // echo" <div class='widget orange'><div class='widget-body'>";
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
         ?>

    <?php
    if (isset($_GET['income'])) {    //if add income found
      $income = $_GET['income'];     //if clicked on add income
      if ($income == "add_income") { ?>
      <form action="Action/add_income.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
            <input type="hidden" value="<?php echo $usernamee?>" name="username">
                <div class="control-group">
                    <label class="control-label">একাউন্ট হেড</label>
                    <div class="controls">
                    <select name="account_head" class="span6 tooltips" data-original-title="Show on Menu">
                    <?php 
                        $account_head = mysqli_query($conn,"SELECT account_head_id,account_head_name FROM account_head WHERE account_head_st = 1"); //1 = only active 
                        if($account_head == true) {
                          while($data = mysqli_fetch_array($account_head)){
                                $account_head_id = $data['0'];
                                $account_head_name = $data['1']; ?>
                           <?php echo "<option value='$account_head_id'>$account_head_name</option>"?>
                    <?php } }?>                               
                        </select> 
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">সিরিয়াল</label>
                        <div class="controls">
                            <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Type account head title"  name="serial_no" required/>
                        </div>
                </div>
                <div class="control-group">
                    <label class="control-label">ইনকাম টাইটেল</label>
                        <div class="controls">
                            <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Type account head title"  name="income_title" required/>
                        </div>
                </div>
                <div class="control-group">
                    <label class="control-label">টোটাল ইনকাম</label> <!--total income-->
                        <div class="controls">
                            <input type="number" class="span6 tooltips" data-trigger="hover" data-original-title="Type account head title"  name="total_income" required/>
                        </div>
                </div>
                <div class="control-group">
                    <label class="control-label">পেমেন্ট</label> <!--paid income-->
                        <div class="controls">
                            <input type="number" class="span6 tooltips" data-trigger="hover" data-original-title="Type account head title"  name="paid_amount" required/>
                        </div>
                </div>
                <div class="control-group">
                    <label class="control-label">ইনকাম বকেয়া</label>  <!-- due income -->
                        <div class="controls">
                            <input type="number" class="span6 tooltips" data-trigger="hover" data-original-title="Type account head title"  name="due_income" required>
                        </div>
                </div>
                <div class="control-group">
                    <label class="control-label">পেমেন্ট টাইপ</label>
                    <div class="controls" style="">
                          <input class="bank_details_show" name="payment_type" id="bank_details_show" type="radio" value="1"/> 
                          <!-- 1 = Check -->
                        <label class="label" for="bank_details_show">চেক</label>
                        <input class="bank_details_hide" name="payment_type" id="bank_details_hide" type="radio" value="2"/>
                          <!-- 2 = Cash -->
                        <label class="label" for="bank_details_hide"> ক্যাশ</label>

                        <div class="bank_details">
                        <label for="bank_name"> ব্যাংক / ব্রাঞ্চের নাম </label>
                            <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Type account head title"  name="bank_name">
                        <label for="account_no"> একাউন্ট নাম্বার </label>
                            <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Type account head title"  name="account_no">
                        </div>
                    </div>
                </div>
        <div class="control-group">
          <div class="controls">
            <input type="submit" name="add_income" value="সাবমিট ">
          </div>
        </div>

        </form>
        
      <?php }
      elseif ($income == "income_list") { ?> <!--  if clicked on account head List  -->
             <table class="table table-striped table-bordered" id="sample_1">
             <thead>
                <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1.checkboxes" />
                </th>
                <!-- <th>Account id</th> -->
                <th> সিরিয়াল</th>
                <th> একাউন্ট হেড নাম</th>
                <th> ইনকাম টাইটেল</th>
                <th> টোটাল এমাউন্ট </th>
                <th> বকেয়া এমাউন্ট</th>
                <th> পেইড এমাউন্ট</th>
                <th> পেমেন্ট টাইপ</th>
                <th> এডেড </th>
                <th> সংশোধন / সংযোজন</th>
               </thead>
               <tbody>
               <?php  
                 $list_income=mysqli_query($conn,"SELECT * FROM manage_income JOIN account_head on manage_income.account_head_id=account_head.account_head_id WHERE 
                 income_st = 1  ORDER BY serial_no ASC");  //1 = Show Data
                 if($list_income==true)
                 {
                    while($data=mysqli_fetch_array($list_income))
                    { 
                        //print_r($data);
                        $income_id=$data['income_id'];
                        $income_serial=$data['serial_no'];
                        $account_head_id=$data['account_head_id'];
                        $account_head_name = $data['account_head_name'];
                        //$income_status=$data['3'];
                        $income_title=$data['income_title'];
                        $total_amount=$data['total_amount'];
                        $due_amount=$data['due_amount'];
                        $paid_amount=$data['paid_amount'];
                        $payment_type=$data['payment_type'];
                        $bank_name=$data['bank_name'];
                        $account_no=$data['account_no'];
                        $created_on=$data['created_at'];
                        {
                        if ($payment_type == 2) {
                           $pay_type = "Cash";
                           $bank_details ="";
                        }
                        else {
                           $pay_type = "Bank";
                           $bank_details = "<br>$bank_name<br>Acc. No.:$account_no";
                        }
                        }
                        {
                            $en_time = array(0,1,2,3,4,5,6,7,8,9); 
                            $bd_time = "$created_on";
                            $bd_time = str_replace($en_time, array('০','১','২','৩','৪','৫','৬','৭','৮','৯'), $bd_time); 
                            //date conversion in bangla 
                        }
                         echo "<tr>
                        <td><input type='checkbox' class='checkboxes' value='1' /></td>
                        
                        <td> $income_serial </td>
                        <td> $account_head_name </td>
                        <td> $income_title </td>
                        <td> $total_amount </td>
                        <td> $due_amount </td>
                        <td> $paid_amount </td>
                        <td> $pay_type $bank_details </td>
                        <td> $bd_time</td>
                        
                        <td><a href='add_income.php?income=update_income&income_id=$income_id'><span class='btn btn-success btn_success_custom'>সংশোধন </span></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='Action/add_income.php?income_id=$income_id&income_delete=income_delete'>
                        <span class='btn btn-danger'>মুছে ফেলুন</span>
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='add_income.php?income_id=$income_id&income=income_details'>
                        <span class='btn btn-danger'>Details</span>
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>";
                        echo "</tr>"; 
                        }}?>
                     </tbody>
              </table>    
        <?php }

      elseif ($income == "update_income") {

        if (isset($_GET['income_id'])) {
           $income_id = $_GET['income_id'];
                 $edit_income=mysqli_query($conn,"SELECT * FROM manage_income WHERE income_id='$income_id'");  
                 if($edit_income==true)
                 {
                  while($data=mysqli_fetch_array($edit_income))
                    {
                        $income_id=$data['income_id'];
                        $income_serial=$data['serial_no'];
                        $account_head_income=$data['account_head_id'];
                        ///$account_head_name_exp= $data['account_head_name'];
                        //$income_status=$data['3'];
                        $income_title=$data['income_title'];
                        $total_amount=$data['total_amount'];
                        $due_amount=$data['due_amount'];
                        $paid_amount=$data['paid_amount'];
                        $payment_type=$data['payment_type'];
                        $bank_name=$data['bank_name'];
                        $account_no=$data['account_no'];
                        $created_on=$data['created_at'];
                    ?>
          <form action="Action/add_income.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
                <input type="hidden" value="<?php echo $usernamee?>" name="username">
                <input type="hidden" value="<?php echo $income_id?>" name="income_id">

                <div class="control-group">
                    <label class="control-label">একাউন্ট হেড</label>
                    <div class="controls">
                    <select name="account_head" class="span6  tooltips" data-original-title="Show on Menu">
                    <?php 
                        $account_head = mysqli_query($conn,"SELECT account_head_id,account_head_name FROM account_head WHERE account_head_st = 1"); //1 = only active 
                        if($account_head == true) {
                          while($data = mysqli_fetch_array($account_head)){
                            //print_r($data);
                            $account_head_id = $data['0'];
                            $account_head_name = $data['1'];

                            if ($account_head_id == $account_head_income) {
                               $selected = "selected"; } 
                            ?>
                            <option value='<?=$account_head_id?>'<?php if($account_head_id == $account_head_expense) {echo "selected";}?>><?=$account_head_name?></option>
                    <?php } }?>                               
                        </select> 
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">সিরিয়াল</label>
                        <div class="controls">
                            <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Type account head title"  name="serial_no" required value="<?=$income_serial?>" disabled/>
                            </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">ইনকাম টাইটেল</label>
                            <div class="controls">
                                <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Type account head title"  name="income_title" required value="<?=$income_title?>"/>
                            </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">টোটাল ইনকাম</label> <!--total income-->
                            <div class="controls">
                                <input type="number" class="span6 tooltips" data-trigger="hover" data-original-title="Type account head title"  name="total_income" required value="<?=$total_amount?>" />
                            </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">পেমেন্ট</label> <!--paid income-->
                            <div class="controls">
                                <input type="number" class="span6 tooltips" data-trigger="hover" data-original-title="Type account head title"  name="paid_amount" required value="<?=$paid_amount?>"/>
                            </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">ইনকাম বকেয়া</label>  <!-- due income -->
                            <div class="controls">
                                <input type="number" class="span6 tooltips" data-trigger="hover" data-original-title="Type account head title"  name="due_income" required value="<?=$due_amount?>">
                            </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">পেমেন্ট টাইপ</label>
                        <div class="controls" style="">
                            <input class="bank_details_show" name="payment_type" id="bank_details_show" type="radio" value="1"<?php if($payment_type == 1){
                                echo "checked";
                            } ?>/> 
                            <!-- 1 = Check -->
                            <label class="label" for="bank_details_show">চেক</label>
                            <input class="bank_details_hide" name="payment_type" id="bank_details_hide" type="radio" value="2"<?php if($payment_type == 2){echo "checked";}?>/>
                            <!-- 2 = Cash -->
                            <label class="label" for="bank_details_hide">ক্যাশ</label>

                            <div class="bank_details">
                            <label for="bank_name">ব্যাংক / ব্রাঞ্চের নাম</label>
                                <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Type account head title"  name="bank_name"  value="<?=$bank_name?>">
                            <label for="account_no"> একাউন্ট নাম্বার</label>
                                <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Type account head title"  name="account_no"  value="<?=$account_no?>">
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="submit" name="update_income" value="সাবমিট ">
                        </div>
                    </div>

            </form>


                    <?php } } ?> 

       <?php }
      } elseif($income == "income_details")  {
          $income_id = $_GET['income_id'];
           ?>

    <div class="">
                
                      <!-- <h4>Invoice Page </h4> -->
                             <div class="space20"></div>
                             
                       
                                                  <?php  
                 $list_income=mysqli_query($conn,"SELECT * FROM manage_income JOIN account_head on manage_income.account_head_id=account_head.account_head_id WHERE income_id = '$income_id'");  //1 = Show Data
                 if($list_income==true)
                 {
                    while($data=mysqli_fetch_array($list_income))
                    { 
                        //print_r($data);
                        $income_id=$data['income_id'];
                        $income_serial=$data['serial_no'];
                        $account_head_id=$data['account_head_id'];
                        $account_head_name = $data['account_head_name'];
                        //$income_status=$data['3'];
                        $income_title=$data['income_title'];
                        $total_amount=$data['total_amount'];
                        $due_amount=$data['due_amount'];
                        $paid_amount=$data['paid_amount'];
                        $payment_type=$data['payment_type'];
                        $bank_name=$data['bank_name'];
                        $account_no=$data['account_no'];
                        $created_on=$data['created_at'];
                        {
                        if ($payment_type == 2) {
                           $pay_type = "Cash";
                           $bank_details ="";
                        }
                        else {
                           $pay_type = "Bank";
                           $bank_details = "<br>$bank_name<br>Acc. No.:$account_no";
                        }
                        }
                        {
                            $en_time = array(0,1,2,3,4,5,6,7,8,9); 
                            $bd_time = "$created_on";
                            $bd_time = str_replace($en_time, array('০','১','২','৩','৪','৫','৬','৭','৮','৯'), $bd_time); 
                            //date conversion in bangla 
                        }
                      
                        ?>
                        <div class="row-fluid invoice-list">
                                 <div class="span12">
                                     <h4>INVOICE INFO</h4>
                                     <ul class="unstyled">
                                         <li>সিরিয়াল	: <h4 class="alert-heading"><?=$income_serial?></h4></li>
                                         <li>তারিখ	: <?=$bd_time?></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="space20"></div>
                             <div class="space20"></div>
                             <div class="row-fluid">
                                 <table class="table table-striped table-hover">
                
                                     <thead>
                                     <tr>
                                         <th>#</th>
                                         <th class="hidden-480">একাউন্ট হেড নাম</th>
                                         <th class="hidden-480">ইনকাম টাইটেল</th>
                                         <th class="hidden-480">টোটাল এমাউন্ট </th>
                                        <th class="hidden-480">পেইড এমাউন্ট</th>
                                         <th class="hidden-480">বকেয়া এমাউন্ট</th>
                                         <th class="hidden-480">পেমেন্ট টাইপ</th>
                                     </tr>
                                     </thead>
                                     <tbody>
                                     <tr>
                                         <td class="hidden-480"><?php echo $income_serial?></td>
                                         <td class="hidden-480"><?php echo $account_head_name?></td>
                                         <td class="hidden-480"><?php echo $income_title?></td>
                                         <td class="hidden-480"><?php echo $total_amount?></td>
                                         <td class="hidden-480"><?php echo $paid_amount?></td>
                                         <td class="hidden-480"><?php echo $due_amount?></td>
                                         <td class="hidden-480"><?php echo $pay_type,$bank_details?></td>
                                     </tr>
                                     
                                     </tbody>
                                    
                                 </table>
                             </div>
                             <?php }}?>
                             <div class="space20"></div>
                             <!-- <div class="row-fluid">
                                 <div class="span4 invoice-block pull-right">
                                     <ul class="unstyled amounts">
                                         <li><h4 class="alert-heading">Total amount :</h4> </li>
                                         <li><h4 class="alert-heading">Paid </h4> 10%</li>
                                         <li><h4 class="alert-heading">Due </h4> -----</li>
                                         <li><h4 class="alert-heading">Grand Total :</h4> $6138</li>
                                     </ul>
                                 </div>
                             </div> -->
                             <div class="space20"></div>
                             <div class="row-fluid text-center">
                                 <!-- <a class="btn btn-success btn_success_custom btn-large hidden-print"> Submit Your Invoice <i class="icon-check"></i></a> -->
                                 <a class="btn btn-inverse btn-large hidden-print" onclick="javascript:window.print();">Print <i class="icon-print icon-big"></i></a>
                             </div>
               
          
                     <!-- END BLANK PAGE PORTLET-->
                 </div>
<?php }?>

  <?php } ?>  <!-- Ending of ISSET add other content -->




    

    </div>
    </div>
    </div>
    </div>


</div>







<?php include 'footer.php';?>

