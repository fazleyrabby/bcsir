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
       <h4><i class="icon-tags"></i>  
        <?php if(isset($_GET['add_notice'])){
          $notice = $_GET['add_notice'];
          if ($notice == "add_notice") {
            echo "এড নোটিশ";
          }
          elseif ($notice == "notice_list") {
            echo "নোটিশ তালিকা";
          }
          elseif ($notice == "edit_notice") {
            echo "নোটিশ সংশোধন ";
          }
        }
        ?>
        </h4>
         <!-- <h4><i class="icon-tags"></i> এড নোটিশ </h4> -->
      
     	</div>
     <div class="widget-body">
      <div class="row-fluid">
                      <div class="span12">
           <?php
		    if (isset($_GET['success'])) {
				  //// echo" <div class='widget orange'><div class='widget-body'>";
		       if ($_GET['success'] == 'notice_success') { // ?>
		           <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
		            <h4 class="alert-heading">সফলভাবে সম্পন্ন</h4>
		           </div>
		        <?php 
				} 	
        if ($_GET['success'] == 'notice_error') { // ?>
               <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                <h4 class="alert-heading">ত্রুটি ঘটেছে </h4>
               </div>
            <?php 
        } 
				} ?>


		<?php
		if (isset($_GET['add_notice'])) {    //if add notice found
			$notice = $_GET['add_notice'];     //if clicked on add notice 
			if ($notice == "add_notice") { ?>

			<form action="Action/add_notice.php" method="POST" class="form-horizontal">
         <input type="hidden" value="<?php echo $usernamee?>" name="username" />
			<div class="control-group">
				<label class="control-label"> নোটিশ টাইটেল </label>
					<div class="controls">
						<input type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Type notice Title"  name="notice_title"/>
					</div>
				</div>
         <div class="control-group">
              <label class="control-label"> শো অন নোটিশ </label>
              <div class="controls">
                <select name="notice_type" class="span6  tooltips" data-original-title="Show on Menu">
                <option value="1">Yes</option>
                <option value="0">No</option>
          </select>                                
          </div>
         </div>

         <div class="control-group">
            <label class="control-label">ডেস্ক্রিপশন</label>
            <div class="controls">
            <textarea id="ckeditor" placeholder="Type Description" class="span6 popovers ckeditor" data-trigger="hover" data-content="Type Description"  name="notice_description" data-original-title="Type Description"></textarea>
            </div>
        </div> 
				<div class="control-group">
					<div class="controls">
						<input type="submit" name="add_new_notice" value="সাবমিট ">
					</div>
				</div>
			
		   </form>
				
			<?php }

			elseif ($notice == "notice_list") { ?> <!--  if clicked on list notice  -->
            
             <table class="table table-striped table-bordered" style="table-layout:fixed;" id="sample_1">
            <thead>
            <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                <th style="width:70px">আইডি</th>
                <th>নোটিশ টাইটেল</th>
                <th>স্ট্যাটাস</th>
                <th>অন্যান্য</th>
                <th> মেনু অবস্থা </th>
               </thead>
               <tbody>
             

               	<?php  
                 $list_notice=mysqli_query($conn,"SELECT * from notice WHERE type != 3");	
                 if($list_notice==true)
                 {
              		while($data=mysqli_fetch_array($list_notice))
              		  { 
              		  $notice_id=$data['0'];
                    $notice_type=$data['1'];
                    $notice_title=$data['2'];
              			$notice_des=$data['3'];
                    {
                      if ($notice_type==0) {
                        $notice_st = "<span style='color:red;font-weight:700'>অপ্রকাশিত</span>";
                      }
                      else {
                        $notice_st = "<span style='color:#74B749;font-weight:700'>প্রকাশিত</span>";
                      }
                    }
  
              			echo "<tr>
              			<td><input type='checkbox' class='checkboxes' value='1' /></td>
      								<td> $notice_id </td>
      								<td> $notice_title </td>
      								<td> $notice_st </td>
      								<td><a href='add_notice.php?add_notice=edit_notice&notice_id=$notice_id'><span style='width:70px;text-align:center' class='btn btn-success btn_success_custom'>সংশোধন</span></a>
                      <a href='Action/add_notice.php?notice_id=$notice_id&notice_delete=notice_delete'>
                      <span style='width:70px;text-align:center' class='btn btn-danger'>মুছে ফেলুন</span>
                      </a>
                      </td> 
                      <td><a href='Action/add_notice.php?notice_id=$notice_id&notice_st=notice_st&st=$notice_type'>
                     <span class='btn btn-primary'>অবস্থা পরিবর্তন</span>
                     </a>
					                </td>";
							echo "</tr>";
              		   }}?>
               </tbody>
           </table>

			
				
			<?php }


			elseif ($notice == "edit_notice") {

			  if (isset($_GET['notice_id'])) {
			  	 $notice_id = $_GET['notice_id'];
           $edit_notice=mysqli_query($conn,"SELECT * FROM notice WHERE id='$notice_id'");  
                 if($edit_notice==true)
                 {
                  while($data=mysqli_fetch_array($edit_notice))
                    {
                    //$notice_id=$data['0'];
                    $notice_type=$data['1'];
                    $notice_title=$data['2'];
                    $notice_des=$data['3'];
                    ?>
                    <form action="Action/add_notice.php" method="POST" class="form-horizontal">
                     <input type="hidden" value="<?php echo $usernamee?>" name="username" />
                     <input type="hidden" value="<?php echo $notice_id?>" name="notice_id" />
                        <div class="control-group">
                          <label class="control-label">নোটিশ লিংক টাইটেল</label>
                            <div class="controls">
                              <input type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Type notice Title" name="notice_title" value="<?=$notice_title?>"/>
                            </div>
                          </div>
                            <div class="control-group">
                              <label class="control-label"> শো অন নোটিশ  </label>
                              <div class="controls">
                                <select name="notice_type" class="span6  tooltips" data-original-title="Show on Menu">
                                <option value="1" <?php if($notice_type == 1){echo "selected";}?>>Yes</option>
                                <option value="0" <?php if($notice_type == 0){echo "selected";}?>>No</option>
                          </select>                                
                          </div>
                         </div>


                             <div class="control-group">
                                <label class="control-label">ডেস্ক্রিপশন</label>
                                <div class="controls">
                                <textarea id="ckeditor" placeholder="Type Description" class="span6  popovers ckeditor" data-trigger="hover" data-content="Type Description"  name="notice_description" data-original-title="Type Description">
                                  <?php echo $notice_des ?>
                                </textarea>
                               
                                </div>
                            </div> 
                          <div class="control-group">
                            <div class="controls">
                              <input type="submit" name="update_notice" value="আপডেট ">
                            </div>
                          </div>
                        
                         </form>


                    <?php } } ?> 

			 <?php }
			} ?>



	<?php	} ?>  <!-- Ending of ISSET add sheba -->




		

		</div>
		</div>
		</div>
		</div>


</div>







<?php include 'footer.php';?>