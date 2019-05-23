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
       <?php if(isset($_GET['account_head'])) { 
         if ($_GET['account_head'] == "add_account_head"){
           echo "<h4><i class='icon-tags'></i> অ্যাড একাউন্ট হেড </h4>";
         }
         elseif($_GET['account_head'] == "account_head_list")
         {
            echo "<h4><i class='icon-tags'></i> একাউন্ট হেড তালিকা </h4>";
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
		            <h4 class="alert-heading">সফলভাবে সম্পন্ন!!!!</h4>
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
                <h4 class="alert-heading">সফলভাবে সংশোধন সম্পন্ন !</h4>
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
				echo""; } ?>

		<?php
		if (isset($_GET['account_head'])) {    //if add account head found
			$account_head = $_GET['account_head'];     //if clicked on add account head 
			if ($account_head == "add_account_head") { ?>

			<form action="Action/add_account_head.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
            <input type="hidden" value="<?php echo $usernamee?>" name="username">
            <input type="hidden" value="1" name="group">   
            <!-- group 1 = normal type -->
                <div class="control-group">
                    <label class="control-label">একাউন্ট হেড টাইটেল</label>
                        <div class="controls">
                            <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Type account head title"  name="account_head_title" required>
                        </div>
                    </div>
            <div class="control-group">
                <label class="control-label">সিরিয়াল নম্বর</label>
                <div class="controls">
                    <input type="number" class="form-control span6" id="" name="serial_number" placeholder="" required>
                </div>
            </div>
				<div class="control-group">
					<div class="controls">
						<input type="submit" name="add_account_head" value="সাবমিট ">
					</div>
				</div>
			
		   </form>
				
			<?php }

			elseif ($account_head == "account_head_list") { ?> <!--  if clicked on account head List  -->
             <table class="table table-striped table-bordered" id="sample_1">
             <thead>
                <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1.checkboxes" /></th>
                <!-- <th>Account id</th> -->
                <th>সিরিয়াল</th>
                <th>একাউন্ট হেড নাম</th>
                <th> এডেড </th>
                <th> সংশোধন / সংযোজন </th>
               </thead>
               <tbody>
               <?php  
                 $list_account_head=mysqli_query($conn,"SELECT * from account_head WHERE 
                 account_head_st = 1  ORDER BY  account_head_serial ASC");	//1 = Show Data
                 if($list_account_head==true)
                 {
              	    while($data=mysqli_fetch_array($list_account_head))
              		  { 
                        $account_head_id=$data['0'];
                        $account_head_serial=$data['1'];
                        $account_head_status=$data['2'];
                        //$account_head_status=$data['3'];
                        $account_head_Name=$data['4'];
                        $account_head_time=$data['5'];
                        {
                            $en_time = array(0,1,2,3,4,5,6,7,8,9); 
                            $bd_time = "$account_head_time";
                            $bd_time = str_replace($en_time, array('০','১','২','৩','৪','৫','৬','৭','৮','৯'), $bd_time); 
                            //date conversion in bangla 
                        }

              	         echo "<tr>
                        <td><input type='checkbox' class='checkboxes' value='1' /></td>
                        
                        <td> $account_head_serial </td>
                        <td> $account_head_Name </td>
                        <td> $bd_time </td>
                        <td><a href='add_account_head.php?account_head=update_account_head&account_head_id=$account_head_id'><span class='btn btn-success btn_success_custom'>সংশোধন</span></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='Action/add_account_head.php?account_head_id=$account_head_id&account_head_delete=account_head_delete'>
                        <span class='btn btn-danger'>মুছে ফেলুন</span>
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>";
                        echo "</tr>"; 
                        }}?>
                     </tbody>
            	</table>

			
				
        <?php }

			elseif ($account_head == "update_account_head") {

			  if (isset($_GET['account_head_id'])) {
			  	 $account_head_id = $_GET['account_head_id'];
                 $edit_content=mysqli_query($conn,"SELECT * FROM account_head WHERE account_head_id='$account_head_id'");  
                 if($edit_content==true)
                 {
                  while($data=mysqli_fetch_array($edit_content))
                    {
                   // $account_head_id = $data['0'];
                    $account_head_serial = $data['1'];
                    $account_head_status = $data['2'];
                    //$account_head_status = $data['3'];
                    $account_head_Name = $data['4'];
                    $account_head_time = $data['5'];
                    ?>
                    <form action="Action/add_account_head.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
                        <input type="hidden" value="<?php echo $usernamee ?>" name="username">
                        <input type="hidden" value="<?php echo $account_head_id ?>" name="account_head_id">
                            <div class="control-group">
                                <label class="control-label">একাউন্ট হেড টাইটেল</label>
                                    <div class="controls">
                                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="Type account head title" value="<?= $account_head_Name ?>"  name="account_head_title" required>
                                    </div>
                                </div>
                        <div class="control-group">
                            <label class="control-label">সিরিয়াল নম্বর</label>
                            <div class="controls">
                                <input type="number" class="form-control span6" id="" name="serial_number" value="<?= $account_head_serial ?>" placeholder="" required disabled>
                            </div>
                        </div>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="submit" name="update_account_head" value="সাবমিট ">
                                </div>
                            </div>
                        
                    </form>


                    <?php } } ?> 

			 <?php }
			} ?>



	<?php	} ?>  <!-- Ending of ISSET add other content -->




		

		</div>
		</div>
		</div>
		</div>


</div>







<?php include 'footer.php';?>