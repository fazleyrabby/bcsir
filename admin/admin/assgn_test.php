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
       <?php if(isset($_GET['assgn_form'])) { 
         if ($_GET['assgn_form'] == "add_assgn_test"){
           echo "<h4><i class='icon-tags'></i> নমুনা-পেরামিটার সংযোজন </h4>";
         }
         elseif($_GET['assgn_form'] == "applylist")
         {
            echo "<h4><i class='icon-tags'></i> নমুনা-পেরামিটার সংযোজন লিস্ট  </h4>";
         }
         elseif($_GET['assgn_form'] == "update_assgn_tbl")
         {
            echo "<h4><i class='icon-tags'></i> নমুনা-পেরামিটার সংশোধন  </h4>";
         }
        }
        ?>
      </div>
     <div class="widget-body">
      <div class="row-fluid">
     <div class="span12">
           <?php
        if (isset($_GET['success'])) {
          //// echo" <div class='widget orange'><div class='widget-body'>";
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
                <h4 class="alert-heading"> সফলভাবে মুছে ফেলা হয়েছে !</h4>
               </div>
            <?php 
        } 
         if ($_GET['success'] == 'data_exists') { // ?>
               <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                <h4 class="alert-heading">
নাম বা সিরিয়াল ইতিমধ্যে বিদ্যমান !</h4>
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
    if (isset($_GET['assgn_form'])) {    //if assign test
      $assgn_sampl_pra = $_GET['assgn_form'];    //if clicked on add assign test
      if ($assgn_sampl_pra == "add_assgn_test") { ?>
      <form action="Action/assgn_test.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
            <input type="hidden" value="<?php echo $usernamee?>" name="username">

            <!-- sample select box -->

                <div class="control-group">
                    <label class="control-label"> নমুনা  নির্বাচন করুন: </label>
                    <div class="controls">
                    <select name="samp_selct_id" class="span6 tooltips" data-original-title="নির্বাচন করুন">
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

                <!-- parameter select box -->
                <div class="control-group">
                                <label class="control-label">পেরামিটার নির্বাচন করুন</label>
                                <div class="controls">
                                    <select data-placeholder="নির্বাচন করুন" class="chzn-select span6" multiple="multiple" name="pra_selct_id[]" tabindex="6">
                                        <option value=""></option>
                                       
                                        <?php
                                       
                        $sample_data = mysqli_query($conn,"SELECT * FROM `prameter_tbl` where pra_st=1 "); //1 = only active 
                        if($sample_data == true) {
                          while($data = mysqli_fetch_array($sample_data)){
                                $sample_id = $data['0'];
                                $sample_name = $data['1']; ?>
                           <?php echo "<option value='$sample_id'>$sample_name</option>"?>
                    <?php }}?> 
                                    
                                        
                                    </select>
                                </div>
                            </div>
                <!-- parameter select box end -->
       
             
        <div class="control-group">
          <div class="controls">
            <input type="submit" name="assgn_test_value" value="Save">
          </div>
        </div>

        </form>
        
      <?php }

      elseif ($assgn_sampl_pra == "applylist") { ?> <!--  if clicked on assign sampl/parametr List  -->
             <table class="table table-striped table-bordered" style="table-layout:fixed" id="sample_1">
             <thead>
                <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable"  data-set="#sample_1.checkboxes" />
                </th>
                <!-- <th>Account id</th> -->
                <th width="5%"> সিরিয়াল</th>
                <th> নমুনা টাইটেল </th>
                <th> পেরামিটার টাইটেল </th>
                <th> টেস্ট ডেসক্রিপশন </th>
                <!-- <th> এডেড </th> -->
                <th width="20%"> সংশোধন / সংযোজন</th>
               </thead>
               <tbody>
               <?php  
                 $list_assgn_form=mysqli_query($conn,"SELECT * from assign_sam_pramtr where asgn_st=1");  //1 = Show Data
                 if($list_assgn_form==true)
                 {
              	    while($row=mysqli_fetch_array($list_assgn_form))
              		  { 
                            $asgn_sp_id=$row['asgn_sp_id'];
                            $sample_id_serial=$row['sam_id'];
                            $paramtr_id_serial= $row['paramtr_id'];

                            // $print_pramtr=explode(",",$paramtr_id_serial);
                            // print_r($print_pramtr);

                            // $fetch_pramtr_row=mysqli_query($conn,"SELECT * from prameter_tbl");
                             
                            $assgn_descrb= $row['assgn_descrp'];
                        
                    

              	         echo "<tr>
                        <td><input type='checkbox' class='checkboxes' value='1' /></td>
                        
                        <td> $asgn_sp_id</td><td>";

                         $sttile="SELECT sample_name FROM `sample_tbl` where sample_id in ($sample_id_serial)";
                         $sttile_p=mysqli_query($conn,$sttile);
                         if($sttile_p==true)
                         {
                            while($pd=mysqli_fetch_array($sttile_p)) 
                            {
                        $sname=$pd['0']; 
                        echo  $sname;
                        echo "</br>";   
                            }
                         } 

                         echo "</td><td>"; 
                //below for find title
                         $pttile="SELECT pra_name FROM `prameter_tbl` where pra_id in ($paramtr_id_serial)";
                         $pttile_p=mysqli_query($conn,$pttile);
                         if($pttile_p==true)
                         {
                            while($pd=mysqli_fetch_array($pttile_p)) 
                            {
                        $pname=$pd['0']; 
                        echo  $pname;
                        echo "</br>";      
             
                            }
                         }  
                //upper for find title.

                       
                        echo"</td><td> $assgn_descrb</td>

                        <td><a href='assgn_test.php?assgn_form=update_assgn_tbl&asgn_sp_id=$asgn_sp_id'><span class='btn btn-success btn_success_custom'>সংশোধন </span></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        
                        <a href='Action/assgn_test.php?assgn_form=del_assgn&asgn_sp_id=$asgn_sp_id'>
                        <span class='btn btn-danger'>মুছে ফেলুন</span>
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>";
                        echo "</tr>";
                          
                        }}?>
                     </tbody>
              </table>    
        <?php }


                            // Update form of Assgn Sample & Parameter
      elseif ($assgn_sampl_pra == "update_assgn_tbl") {

        if (isset($_GET['asgn_sp_id'])) {
           $assgn_test_id = $_GET['asgn_sp_id'];
                 $edit_assgn_tbl=mysqli_query($conn,"SELECT * FROM assign_sam_pramtr WHERE asgn_sp_id='$assgn_test_id'"); 

                 if($edit_assgn_tbl==true)
                 {
                  while($data=mysqli_fetch_array($edit_assgn_tbl))
                    {
                        $asgn_sp_id = $data['1'];
                        $asgn_sp_pid = $data['2'];
                    ?>
           <form action="Action/assgn_test.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
            <input type="hidden" value="<?php echo $usernamee?>" name="username">
            <input type="hidden" value="<?php echo $assgn_test_id ?>" name="asgn_sp_id">

            <!-- sample select box -->

                <div class="control-group">
                    <label class="control-label"> নমুনা  নির্বাচন করুন:</label>
                    <div class="controls">
                    <select name="samp_selct_id" class="span6 tooltips" data-original-title="নির্বাচন করুন">
                    <?php 
                        $sample_data = mysqli_query($conn,"SELECT sample_id,sample_name FROM sample_tbl"); //1 = only active 
                        if($sample_data == true) {
                          while($data = mysqli_fetch_array($sample_data)){
                                $sample_id = $data['0'];
                                $sample_name = $data['1'];   
                                ?>
                                <option value="<?php echo $sample_id?>"<?php if($asgn_sp_id == $sample_id){echo "selected" ;}  ?>><?php echo $sample_name?></option>
                    
                    <?php }}?>                               
                        </select> 
                    </div>
                </div>

                <!-- parameter select box -->
                <div class="control-group">
                                <label class="control-label">পেরামিটার নির্বাচন করুন</label>
                                <div class="controls">
                            <select data-placeholder="নির্বাচন করুন" class="chzn-select span6" multiple="multiple" name="pra_selct_id[]" tabindex="6">
                                        <option value=""></option>
                     <?php                    
                    
                        $parameter_data = mysqli_query($conn,"SELECT pra_id,pra_name FROM prameter_tbl
                        where pra_id in ($asgn_sp_pid)");
                        if($parameter_data == true) {
                          while($data = mysqli_fetch_array($parameter_data))
                          {
                                $pramtr_id = $data['0'];
                                $pramtr_name = $data['1'];?>
                           <option value="<?php echo $pramtr_id?>" selected><?php echo $pramtr_name ?></option>
                    <?php }}?> 
                    <?php                    
                    
                    $parameter_data = mysqli_query($conn,"SELECT pra_id,pra_name FROM prameter_tbl
                    where pra_id not in ($asgn_sp_pid)");
                    if($parameter_data == true) {
                      while($data = mysqli_fetch_array($parameter_data))
                      {
                            $pramtr_id = $data['0'];
                            $pramtr_name = $data['1'];?>
                       <option value="<?php echo $pramtr_id?>"><?php echo $pramtr_name ?></option>
                <?php }}?>                         
                    </select>
                </div>
            </div>
                <!-- parameter select box end -->
       
             
        <div class="control-group">
          <div class="controls">
            <input type="submit" name="update_assgn_form" value="আপডেট ">
          </div>
        </div>

        </form>
                    <?php } } ?> 

       <?php }
      }
       elseif($income == "income_details")  {
          $income_id = $_GET['income_id'];
           ?>

   
<?php }?>

  <?php } ?>  <!-- Ending of ISSET add other content -->




    

    </div>
    </div>
    </div>
    </div>


</div>







<?php include 'footer.php';?>

