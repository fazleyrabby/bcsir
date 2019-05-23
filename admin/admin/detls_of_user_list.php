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
           echo "<h4><i class='icon-tags'></i> অ্যাড একাউন্ট খাত </h4>";
         }
         elseif($_GET['account_head'] == "account_head_list")
         {
            echo "<h4><i class='icon-tags'></i> একাউন্ট খাতের তালিকা </h4>";
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
            $user_detls_id = $_GET['id'];
            $level = $_GET['type'];
           

            $sql_detls=mysqli_query($conn,"SELECT * from user_requirement where user_requr_id=$user_detls_id");
            
            while($row=mysqli_fetch_array($sql_detls))
            { //echo "<pre>";print_r($row);die();
            ?>
             <form action="Action/form_details_submit.php" name="approve_reject_form" method="POST" class="form-horizontal" enctype=multipart/form-data>
            <input type="hidden" value="<?php echo $row['username_req'];?>" name="username">
            <input type="hidden" value="<?php echo $user_detls_id?>" name="form_id">
            <input type="hidden" value="<?=$_SESSION['user_id']?>" name="user_id">
                <div class="control-group">
                    <label class="control-label">রিকুইরেমেন্ট-টাইটেল</label>
                        <div class="controls">
                        <p>
                        <?php echo $row['Qu_title']?>
                        </p>
                      
                        </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label">রিকুইরেমেন্ট-ডেসক্রিপশন:</label>
                        <div class="controls">
                        <div style=" height: 200px;overflow: auto;"><?php echo $row['Qu_descrbs']?></div> 
                        </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label">রিকুইরেমেন্ট-মূল্য:</label>
                        <div class="controls">
                       <p><?php echo $row['Qu_price']?></p>
                            
                        </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label">মন্তব্য:</label>
                        <div class="controls">
                      <textarea name="comments_id" class="form-contol" id="" cols="60" rows="5" style="resize:none"></textarea>
                            
                        </div>
                    </div>
				<div class="control-group">
					<div class="controls">  
						<td><input class='btn btn-success btn_success_custom' type="submit" name="approve" value="Approve">
                        &nbsp;&nbsp;
                        </td> 
                        <td><input class='btn btn-danger' type="submit" name="approve" value="Reject">
                        &nbsp;&nbsp;
					</div>
				</div>
			
		   </form>
               
           <?php } ?>
           

		</div>
		</div>
		</div>
		</div>


</div>


</div>




<?php include 'footer.php';?>