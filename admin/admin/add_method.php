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
                     <!-- ড্যাশবোর্ড  -->
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
       <?php if(isset($_GET['method'])) { 
         if ($_GET['method'] == "add_method"){
           echo "<h4><i class='icon-tags'></i> মেথড যোগ  </h4>";
         }
         elseif($_GET['method'] == "method_list")
         {
            echo "<h4><i class='icon-tags'></i> মেথড তালিকা </h4>";
         }
         elseif($_GET['method'] == "update_method")
         {
            echo "<h4><i class='icon-tags'></i> মেথড সংশোধন </h4>";
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
                <h4 class="alert-heading">সফলভাবে সম্পন্ন হয়েছে !</h4>
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
        } }
         ?>


    <?php
    if (isset($_GET['method'])) {    //if method clicked
      $method_form = $_GET['method']; 
         //if clicked on add form method 
      if ($method_form == "add_method") { ?>

      <form action="Action/add_method.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
            <input type="hidden" value="<?php echo $usernamee?>" name="username">
            
            <!-- Parameter Selection Box -->
                <div class="control-group">
                    <label class="control-label"> পেরামিটার নির্বাচন করুন: </label>
                    <div class="controls">
                    <select name="pramtrr_slct_id" class="chzn-select span6 tooltips" data-original-title="নির্বাচন করুন">
                    <?php 
                        $parameter_data = mysqli_query($conn,"SELECT pra_id,pra_name FROM prameter_tbl WHERE pra_st = 1"); //1 = only active 
                        if($parameter_data == true) {
                          while($data = mysqli_fetch_array($parameter_data)){
                                $pramtr_idd = $data['0'];
                                $pramtr_namee = $data['1'];?>
                           <?php echo "<option value='$pramtr_idd'>$pramtr_namee</option>"?>
                    <?php }}?>                               
                        </select>
                    </div>
                </div>
                        <!-- Parameter Selection Box End -->
                        <!-- ===Method Input==== -->
                        <div class="control-group">
                    <label class="control-label">অ্যাড মেথড:</label>
                        <div class="controls">
                            <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Enter Method title"  name="method_name" required>
                        </div>
                        
                    </div>

                    <!-- <div class="control-group">
                    <label class="control-label">Method Price (BDT)</label>
                        <div class="controls">
                            <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Enter Method Price"  name="method_price" required>
                        </div>
                    </div> -->
                        <!-- ====Method Input End==== -->
             
        <div class="control-group">
          <div class="controls">
            <input type="submit" name="method_save" value="Save">
          </div>
        </div>

        </form>
        
      <?php }

      elseif ($method_form == "method_list") { ?> <!--  if clicked on method list -->
             <table class="table table-striped table-bordered" id="sample_1">
             <thead>
                <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1.checkboxes" />
                </th>
                <!-- <th>Account id</th> -->
                <th> সিরিয়াল </th>
                <th> পেরামিটার টাইটেল </th>
                <th> মেথড টাইটেল </th>
                <!-- <th> মেথড Price </th> -->
                <th> সংশোধন / সংযোজন </th>
               </thead>
               <tbody>
               <?php  
                 $list_method=mysqli_query($conn,"SELECT * from method_tbl where method_st=0");  //1 = Show Data
                 if($list_method==true)
                 {
              	    while($row=mysqli_fetch_array($list_method))
              		  { 
                            $methd_id=$row['methd_id'];
                            $methd_pramtrid=$row['methd_pramtrid'];

                            $paramtr_id= $row['paramtr_id'];
                            $method_title=$row['method_name'];
                            $method_price=$row['method_price'];
                            
                    $list_parameter=mysqli_query($conn,"SELECT pra_name from prameter_tbl where pra_id=$methd_pramtrid");if($list_parameter==true)
                    {
                         while($row=mysqli_fetch_array($list_parameter))
                           { 
                               $pra_name=$row['pra_name'];
                            
                           
                //upper for find title.

                echo "<tr>
                <td><input type='checkbox' class='checkboxes' value='1' /></td>
                
                <td> $methd_pramtrid</td>
                <td> $pra_name </td>
                <td> $method_title </td>
                
                <td><a href='add_method.php?method=update_method&methd_id=$methd_id'><span class='btn btn-success btn_success_custom'>সংশোধন </span></a>
                &nbsp;&nbsp;&nbsp;&nbsp;
                
                <a href='Action/add_method.php?method=del_method&methd_id=$methd_id'>
                <span class='btn btn-danger'>মুছে ফেলুন</span>
                </a>&nbsp;&nbsp;&nbsp;&nbsp;
                </td>";
                echo "</tr>";
            }}   
                        }}?>
                     </tbody>
              </table>    
        <?php }


                            // Update form of Assgn Sample & Parameter
      elseif ($method_form == "update_method") {

        if (isset($_GET['methd_id'])) {
           $methd_id = $_GET['methd_id'];

            $edit_method_list=mysqli_query($conn,"SELECT * FROM method_tbl WHERE methd_id='$methd_id' AND method_st=0"); 

                 if($edit_method_list==true)
                 {
                  while($data=mysqli_fetch_array($edit_method_list))
                    {
                        $methd_id=$data['methd_id'];
                        $methd_pramtrid=$data['methd_pramtrid'];
                        $method_name=$data['method_name'];
                        $method_price=$data['method_price'];
                    ?>

                  <form action="Action/add_method.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
                        <input type="hidden" value="<?php echo $usernamee ?>" name="username">
                        <input type="hidden" value="<?php echo $methd_id ?>" name="methd_id">

                <div class="control-group">
                    <label class="control-label"> পেরামিটার নির্বাচন করুন:</label>
                    <div class="controls">
                    <select name="m_paramtr_id" class="span6 tooltips" data-original-title="নির্বাচন করুন">
                    <?php 
                        $parameter_data = mysqli_query($conn,"SELECT pra_id,pra_name FROM prameter_tbl"); //1 = only active 
                        if($parameter_data == true) {
                          while($data = mysqli_fetch_array($parameter_data)){
                                $pra_idd = $data['0'];
                                $pra_name = $data['1'];   
                                ?>
                                <option value="<?php echo $pra_idd?>"<?php if($methd_pramtrid == $pra_idd){echo "selected" ;} ?>><?php echo $pra_name?></option>
                    
                    <?php }}?>                               
                        </select> 
                    </div>
                </div>
                <!-- method add -->
                <div class="control-group">
                    <label class="control-label">অ্যাড মেথড:</label>
                        <div class="controls">
                            <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Enter Method title"  name="method_name" value="<?=$method_name?>" required>
                        </div>
                        
                    </div>

                     <!-- <div class="control-group">
                    <label class="control-label">Method Price (BDT)</label>
                        <div class="controls">
                            <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Enter Method Price" value="<//?=$method_price?>"  name="method_price" required>
                        </div>
                    </div> -->
                    <!-- method add end -->
                         <div class="control-group">
                                <div class="controls">
                                    <input type="submit" name="update_method_save" value="আপডেট ">
                                </div>
                            </div>
                        
                    </form>
                    <?php } } ?> 

       <?php }
      }
 } ?>  <!-- Ending of ISSET add other content -->




    

    </div>
    </div>
    </div>
    </div>


</div>







<?php include 'footer.php';?>

