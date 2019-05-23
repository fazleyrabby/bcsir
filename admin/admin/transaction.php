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
                   <ul class="breadcrumb">
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
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->

	<div class="widget red">
     <div class="widget-title">
       <h4><i class="icon-tags"></i> ট্রান্সেকশন তালিকা </h4>
     	</div>
     <div class="widget-body">
      <div class="row-fluid">
     <div class="span12">
      <h4 class="alert-heading"><h3>খরচ তালিকা</h3></h4>
        <table class="table table-striped table-bordered" id="sample_1">
             <thead>
                <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1.checkboxes"/>
                </th>
                <!-- <th>Account id</th> -->
                <th>সিরিয়াল</th>
                <th>একাউন্ট খাত নাম</th>
                <th> খরচ টাইটেল</th>
                <th>টোটাল এমাউন্ট</th>
                <th>বকেয়া এমাউন্ট</th>
                <th>পেইড এমাউন্ট</th>
                <th>পেমেন্ট টাইপ</th>
                <th>এডেড</th>
         
                <!-- <th>Edit</th> -->
               </thead>
               <tbody>
               <?php 
                $list_expense = mysqli_query($conn,"SELECT * FROM manage_expense JOIN account_head on manage_expense.account_head_id=account_head.account_head_id WHERE 
                 expense_st = 1  ORDER BY serial_no ASC");	//1 = Show Data
                if ($list_expense == true) 
                {
                    while($data = mysqli_fetch_array($list_expense)) { 
                        //print_r($data);
                        $expense_id = $data['expense_id'];
                        $expense_serial = $data['serial_no'];
                        $account_head_id = $data['account_head_id'];
                        $account_head_name = $data['account_head_name'];
                        //$expense_status=$data['3'];
                        $expense_title = $data['expense_title'];
                        $total_amount = $data['total_amount'];
                        $due_amount = $data['due_amount'];
                        $paid_amount = $data['paid_amount'];
                        $payment_type = $data['payment_type'];
                        $bank_name = $data['bank_name'];
                        $account_no = $data['account_no'];
                        $created_on = $data['created_at'];
                        {
                            if ($payment_type == 2) {
                                $pay_type = "Cash";
                                $bank_details = "";
                            } else {
                                $pay_type = "Bank";
                                $bank_details = "<br>$bank_name<br>Acc. No.:$account_no";
                            }
                        }
                        {
                            $en_time = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
                            $bd_time = "$created_on";
                            $bd_time = str_replace($en_time, array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'), $bd_time); 
                            //date conversion in bangla 
                        }
                        echo "<tr>
                        <td><input type='checkbox' class='checkboxes' value='1' /></td>
                        <td> $expense_serial </td>
                        <td> $account_head_name </td>
                        <td> $expense_title </td>
                        <td> $total_amount </td>
                        <td> $due_amount </td>
                        <td> $paid_amount </td>
                        <td> $pay_type $bank_details </td>
                        <td> $bd_time</td>";
                        echo "</tr>";
                    }
                } ?>
                     </tbody>
            </table>	

        <h4 class="alert-heading"><h3>ইনকাম তালিকা</h3></h4>

        <table class="table table-striped table-bordered" id="sample_2">
            <thead>
                <tr>
                 <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_2.checkboxes"/>
                </th>
                <!-- <th>Account id</th> -->
                  <th>সিরিয়াল</th>
                <th>একাউন্ট খাত নাম</th>
                <th> ইনকাম টাইটেল</th>
                <th> টোটাল এমাউন্ট </th>
                <th> বকেয়া এমাউন্ট</th>
                <th> পেইড এমাউন্ট</th>
                <th> পেমেন্ট টাইপ</th>
                <th> এডেড </th>
           
                
                <!-- <th>Edit</th> -->
            </thead>
               <tbody>
               <?php 
                $list_income = mysqli_query($conn,"SELECT * FROM manage_income JOIN account_head on manage_income.account_head_id=account_head.account_head_id WHERE 
                 income_st = 1  ORDER BY serial_no ASC");  //1 = Show Data
                if ($list_income == true) {
                    while ($data = mysqli_fetch_array($list_income)) { 
                        //print_r($data);
                        $income_id = $data['income_id'];
                        $income_serial = $data['serial_no'];
                        $account_head_id = $data['account_head_id'];
                        $account_head_name = $data['account_head_name'];
                        //$income_status=$data['3'];
                        $income_title = $data['income_title'];
                        $total_amount = $data['total_amount'];
                        $due_amount = $data['due_amount'];
                        $paid_amount = $data['paid_amount'];
                        $payment_type = $data['payment_type'];
                        $bank_name = $data['bank_name'];
                        $account_no = $data['account_no'];
                        $created_on = $data['created_at'];
                        {
                            if ($payment_type == 2) {
                                $pay_type = "Cash";
                                $bank_details = "";
                            } else {
                                $pay_type = "Bank";
                                $bank_details = "<br>$bank_name<br>Acc. No.:$account_no";
                            }
                        }
                        {
                            $en_time = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
                            $bd_time = "$created_on";
                            $bd_time = str_replace($en_time, array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'), $bd_time); 
                            //date conversion in bangla 
                        }
                        echo "<tr>
                        <td><input type='checkbox' class='checkboxes' value='1'/></td>
                        <td> $income_serial </td>
                        <td> $account_head_name </td>
                        <td> $income_title </td>
                        <td> $total_amount </td>
                        <td> $due_amount </td>
                        <td> $paid_amount </td>
                        <td> $pay_type $bank_details </td>
                        <td> $bd_time</td>";
                        echo "</tr>";
                    }
                } ?>
                     </tbody>
         </table>   


		

		</div>
		</div>
		</div>
		</div>


</div>

<?php include 'footer.php';?>

