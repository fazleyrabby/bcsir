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
       <h4><i class="icon-tags"></i>  
        <?php if(isset($_GET['add_esheba'])){
          $esheba = $_GET['add_esheba'];
          if ($esheba == "add_esheba") {
            echo "ইসেবা যোগ";
          }
          elseif ($esheba == "list_esheba") {
            echo "সকল ইসেবা তালিকা";
          }
          elseif ($esheba == "edit_esheba") {
            echo "ইসেবা সংশোধন ";
          }
        }
        ?>
        </h4>
     	</div>
     <div class="widget-body">
      <div class="row-fluid">
                      <div class="span12">
           <?php
		    if (isset($_GET['success'])) {
				  //// echo" <div class='widget orange'><div class='widget-body'>";
		       if ($_GET['success'] == 'esheba_success') { // ?>
		           <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
		            <h4 class="alert-heading">সফলভাবে সম্পন্ন</h4>
		           </div>
		        <?php 
				} 	
        if ($_GET['success'] == 'esheba_error') { // ?>
               <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                <h4 class="alert-heading">ত্রুটি ঘটেছে </h4>
               </div>
            <?php 
        } } ?>


		<?php
		if (isset($_GET['add_esheba'])) {    //if add esheba found
			$esheba = $_GET['add_esheba'];   //if clicked on add esheba 
			if($esheba == "add_esheba") { ?>

			<form action="Action/add_esheba.php" method="POST" class="form-horizontal">
         <input type="hidden" value="<?php echo $usernamee?>" name="username" />
			<div class="control-group">
				<label class="control-label">ইসেবা লিংক টাইটেল</label>
					<div class="controls">
						<input type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Type Esheba Title"  name="esheba_title"/>
					</div>
				</div>
         <div class="control-group">
              <label class="control-label"> শো অন অভ্যন্তরীণ ইসেবা </label>
              <div class="controls">
                <select name="esheba_type" class="span6  tooltips" data-original-title="Show on Menu">
                <option value="1">Yes</option>
                <option value="0">No</option>
          </select>                                
          </div>
         </div>
         <div class="control-group">
        <label class="control-label">ইসেবা লিংক</label>
          <div class="controls">
            <input type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Type Esheba Title"  name="esheba_link"/>
          </div>
        </div>
				<div class="control-group">
					<div class="controls">
						<input type="submit" name="add_new_esheba" value="সাবমিট ">
					</div>
				</div>
			
		   </form>
				
			<?php }

			elseif ($esheba == "list_esheba") { ?> <!--  if clicked on list esheba  -->
            
             <table class="table table-striped table-bordered" id="sample_1" style="table-layout:fixed">
            <thead>
            <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                <th width="5%">আইডি</th>
                <th>অভ্যন্তরীণ ইসেবা </th>
                <th width="10%">স্ট্যাটাস</th>
                <th>লিংক</th>
                <th width="20%">পরিবর্তন</th>
                <th width="15%"></th>
               </thead>
               <tbody>
             

               	<?php  
                 $list_esheba=mysqli_query($conn,"SELECT * from central_esheba WHERE type != 3");	
                 if($list_esheba==true)
                 {
              		while($data=mysqli_fetch_array($list_esheba))
              		  { 
              		  $esheba_id=$data['0'];
                    $esheba_title=$data['1'];
                    $esheba_type=$data['2'];
                    $esheba_link=$data['3'];
              			$esheba_addby=$data['4'];
                    {
                      if ($esheba_type==0) {
                        $esheba_status = "<span style='color:red;font-weight:700'>অপ্রকাশিত</span>";
                      }
                      else {
                        $esheba_status = "<span style='color:#74B749;font-weight:700'>প্রকাশিত</span>";
                      }
                    }
  
              			echo "<tr>
              			<td><input type='checkbox' class='checkboxes' value='1' /></td>
      								<td> $esheba_id </td>
      								<td> $esheba_title </td>
                      <td> $esheba_status </td>
      								<td> $esheba_link </td>
      								<td><a href='add_esheba.php?add_esheba=edit_esheba&esheba_id=$esheba_id'><span style='width:70px;text-align:center' class='btn btn-success btn_success_custom'>সংশোধন </span></a>
                      <a href='Action/add_esheba.php?esheba_id=$esheba_id&esheba_delete=esheba_delete'>
                      <span style='width:70px;text-align:center' class='btn btn-danger'>মুছে ফেলুন</span>
                      </a> </td>
                      <td><a href='Action/cat_add_action.php?esheba_id=$esheba_id&esheba_st=esheba_st&cst=$esheba_type'>
                     <span style='width:auto;text-align:center' class='btn btn-primary'>অবস্থা পরিবর্তন </span>
                     </a></td>
                      ";
							echo "</tr>";
              		   }}?>
               </tbody>
           </table>

			
				
			<?php }


			elseif ($esheba == "edit_esheba") {

			  if (isset($_GET['esheba_id'])) {
			  	 $esheba_id = $_GET['esheba_id'];
           $edit_esheba=mysqli_query($conn,"SELECT * FROM central_esheba WHERE id='$esheba_id'");  
                 if($edit_esheba==true)
                 {
                  while($data=mysqli_fetch_array($edit_esheba))
                    {
                    //$esheba_id=$data['0'];
                    $esheba_title=$data['1'];
                    $esheba_type=$data['2'];
                    $esheba_link=$data['3'];
                    $esheba_addby=$data['4'];
                    ?>
                    <form action="Action/add_esheba.php" method="POST" class="form-horizontal">
                     <input type="hidden" value="<?php echo $usernamee?>" name="username" />
                     <input type="hidden" value="<?php echo $esheba_id?>" name="esheba_id" />
                        <div class="control-group">
                          <label class="control-label">ইসেবা লিংক টাইটেল</label>
                            <div class="controls">
                              <input type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Type Esheba Title" name="esheba_title" value="<?=$esheba_title?>"/>
                            </div>
                          </div>
                          <div class="control-group">
                          <label class="control-label">ইসেবা লিংক</label>
                            <div class="controls">
                              <input type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Type Esheba Title" name="esheba_link" value="<?=$esheba_link?>"/>
                            </div>
                          </div>
                            <div class="control-group">
                              <label class="control-label"> শো অন অভ্যন্তরীণ ইসেবা </label>
                              <div class="controls">
                                <select name="esheba_type" class="span6  tooltips" data-original-title="Show on Menu">
                                <option value="1" <?php if($esheba_type == 1){echo "selected";}?>>Yes</option>
                                <option value="0" <?php if($esheba_type == 0){echo "selected";}?>>No</option>
                          </select>                                
                          </div>
                         </div>
                          <div class="control-group">
                            <div class="controls">
                              <input type="submit" name="update_esheba" value="আপডেট ">
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