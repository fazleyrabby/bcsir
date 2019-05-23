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
       <?php if(isset($_GET['add_other_content'])) { 
         if ($_GET['add_other_content'] == "add_other_content"){
           echo "<h4><i class='icon-tags'></i> অন্যান্য কনটেন্ট যোগ </h4>";
         }
         elseif($_GET['add_other_content'] == "content_list")
         {
            echo "<h4><i class='icon-tags'></i> অন্যান্য কনটেন্ট তালিকা </h4>";
         }
         elseif($_GET['add_other_content'] == "edit_content")
         {
            echo "<h4><i class='icon-tags'></i> অন্যান্য কনটেন্ট সংশোধন  </h4>";
         }
        }
        ?>
         <!-- <h4><i class="icon-tags"></i> অন্যান্য কনটেন্ট</h4> -->
      
     	</div>
     <div class="widget-body">
      <div class="row-fluid">
     <div class="span12">
           <?php
		    if (isset($_GET['success'])) {
				  //// echo" <div class='widget orange'><div class='widget-body'>";
		    if ($_GET['success'] == 'content_success') { // ?>
		           <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
		            <h4 class="alert-heading">সফলভাবে সম্পন্ন</h4>
		           </div>
		        <?php 
        } 
         if ($_GET['ct_success'] == 'success') { // ?>
		           <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
		            <h4 class="alert-heading">সফলভাবে সম্পন্ন</h4>
		           </div>
		        <?php 
        } 
         if ($_GET['success'] == 'picture_success') { // ?>
		           <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
		            <h4 class="alert-heading">সফলভাবে সম্পন্ন</h4>
		           </div>
		        <?php 
        } 
        	
        if ($_GET['success'] == 'picture_large') { // ?>
               <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                <h4 class="alert-heading">Picture Is large</h4>
               </div>
            <?php 
        } 
        if ($_GET['success'] == 'picture_not_found') { // ?>
               <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                <h4 class="alert-heading">Picture ত্রুটি ঘটেছে </h4>
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
         if ($_GET['success'] == 'status_update') { // ?>
               <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                <h4 class="alert-heading">সফলভাবে সম্পন্ন হয়েছে !</h4>
               </div>
            <?php 
        }
			 } ?>


		<?php
		if (isset($_GET['add_other_content'])) {    //if add content found
			$other_content = $_GET['add_other_content'];     //if clicked on add other Content 
			if ($other_content == "add_other_content") { ?>

			<form action="Action/add_other_content.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
         <input type="hidden" value="<?php echo $usernamee?>" name="username" />
			<div class="control-group">
				<label class="control-label"> কনটেন্ট টাইটেল </label>
					<div class="controls">
						<input type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Type notice Title"  name="content_title"/>
					</div>
				</div>
         <div class="control-group">
              <label class="control-label"> শো অন কনটেন্ট </label>
              <div class="controls">
                <select name="content_st" class="span6  tooltips" data-original-title="Show on Menu">
                <option value="1">Yes</option>
                <option value="0">No</option> 
          </select>                                
          </div>
         </div>
         <div class="control-group">
              <label class="control-label"> কনটেন্ট টাইপ </label>
              <div class="controls">
                <select name="content_type" class="span6  tooltips" data-original-title="Show on Menu">
                <option value="0">তথ্য</option>
                <option value="1">আবেদন ফরম</option>
                <option value="2">প্রকল্প</option> 
                <option value="3">আইন ও নীতিমালা</option>
                <option value="4">যোগাযোগ</option>
                <option value="5">সেবা</option>
                <option value="6">প্রকাশনা ও প্রতিবেদন</option>
                <option value="7">উদ্ভাবিত পণ্য,প্রসেস ও প্যাটেন্ট</option>
                <option value="9">নাগরিক সেবা সনদ</option>
          </select>                                
          </div>
         </div>

         <div class="control-group">
            <label class="control-label">কনটেন্ট ডেস্ক্রিপশন</label>
            <div class="controls">
            <textarea id="ckeditor" placeholder="Type Description" class="span6 popovers ckeditor" data-trigger="hover" data-content="Type Description"  name="content_descritpion" data-original-title="Type Description"></textarea>
            </div>
        </div> 
        <div class="control-group">
            <label class="control-label"> মিডিয়া ফাইল </label>
              <div class="controls">
                <input type="file" class="form-control span6" id="" name="files[]" placeholder="Specifications">
              </div>
        </div>
				<div class="control-group">
					<div class="controls">
						<input type="submit" name="add_new_content" value="সাবমিট ">
					</div>
				</div>
			
		   </form>
				
			<?php }

			elseif ($other_content == "content_list") { ?> <!--  if clicked on list content  -->
          
             <table class="table table-striped table-bordered" id="sample_1">
            <thead>
            <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                <th> কনটেন্ট আইডি</th>
                <th> কনটেন্ট টাইটেল</th>
                <th class='ctype'> কনটেন্ট টাইপ</th>
                <th> কনটেন্ট স্ট্যাটাস</th>
                <th> কনটেন্ট মিডিয়া</th>
                <th style="width:220px"> অন্যান্য</th>
                <th style="width:140px"> মেনু অবস্থা</th>
                <!-- <th></th> -->
               </thead>
               <tbody>
              
              <?php  
                 $list_content=mysqli_query($conn,"SELECT * from home_other_content WHERE content_st != 2");	
                 if($list_content==true)
                 {
              		while($data=mysqli_fetch_array($list_content))
              		  { 
              		  $content_id=$data['0'];
                    $content_status=$data['1'];
                    $content_type=$data['2'];
                    $content_title=$data['3'];
              			$content_des=$data['4'];
              			$content_media=$data['5'];
                    {
                      if ($content_status==0) {
                        $content_st = "<span style='color:red;font-weight:700'>অপ্রকাশিত</span>";
                      }
                      else {
                        $content_st = "<span style='color:#74B749;font-weight:700'>প্রকাশিত</span>";
                      }
                    }
                    {
                          if ($content_type == 0) {$content_tp = "তথ্য";}
                      elseif ($content_type == 1) {$content_tp = "আবেদন ফরম";}
                      elseif ($content_type == 2) {$content_tp = "প্রকল্প";}
                      elseif ($content_type == 3) {$content_tp = "আইন ও নীতিমালা";}
                      elseif ($content_type == 4) {$content_tp = "যোগাযোগ";}
                      elseif ($content_type == 5) {$content_tp = "সেবা";}
                      elseif ($content_type == 6) {$content_tp = "প্রকাশনা ও প্রতিবেদন";}
                      elseif ($content_type == 7) {$content_tp = "উদ্ভাবিত পণ্য,প্রসেস ও প্যাটেন্ট";}
                       elseif ($content_type == 9) {$content_tp = "নাগরিক সেবা সনদ";}
                      else {
                        $content_type = "";
                      }
                     // elseif ($content_type == 8) {$content_tp = "";}
                    }

              			echo "<tr>
              			<td><input type='checkbox' class='checkboxes' value='1' /></td>
      								<td> $content_id </td>
      								<td> $content_title </td>
      								<td> $content_tp </td>
                      <td> $content_st </td>
                       <td> $content_media </td>
      								<td><a href='add_other_content.php?add_other_content=edit_content&content_id=$content_id'><span style='width:70px;text-align:center' class='btn btn-success btn_success_custom'>সংশোধন </span></a>
                      <a href='Action/add_other_content.php?content_id=$content_id&content_delete=content_delete'>
                      <span style='width:70px;' class='btn btn-danger'>মুছে ফেলুন</span>
					                </a>
                          </td>
                          <td>
                          <a href='Action/add_other_content.php?content_id=$content_id&content_st=content_st&st=$content_status'>
                          <span class='btn btn-primary'>অবস্থা পরিবর্তন</span>
                          </td>
                         
                          ";
							echo "</tr>";
              		   }}?>
               </tbody>
           </table>

			
				
			<?php }


			elseif ($other_content == "edit_content") {

			  if (isset($_GET['content_id'])) {
			  	 $content_id = $_GET['content_id'];
           $edit_content=mysqli_query($conn,"SELECT * FROM home_other_content WHERE content_id='$content_id'");  
                 if($edit_content==true)
                 {
                  while($data=mysqli_fetch_array($edit_content))
                    {
                    //$content_id=$data['0'];
                    $content_status=$data['1'];
                    $content_type=$data['2'];
                    $content_title=$data['3'];
              			$content_des=$data['4'];
                    $content_media=$data['5'];
                    //echo $content_type;
                    ?>
                    <form action="Action/add_other_content.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
                     <input type="hidden" value="<?php echo $usernamee?>" name="username" />
                     <input type="hidden" value="<?php echo $content_id?>" name="content_id" />
                        <div class="control-group">
                          <label class="control-label">কনটেন্ট টাইটেল</label>
                            <div class="controls">
                              <input type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Type notice Title" name="content_title" value="<?=$content_title?>"/>
                            </div>
                          </div>
                           <div class="control-group">
                            <label class="control-label"> কনটেন্ট টাইপ </label>
                            <div class="controls">
                                <select name="content_type" class="span6  tooltips" data-original-title="Show on Menu">
                                <option value="0<?php if($content_type==0){echo "\rselected";}?>">তথ্য</option>
                                <option value="1"<?php if($content_type==1){echo "\rselected";}?>>আবেদন ফরম</option>
                                <option value="2"<?php if($content_type==2){echo "\rselected";}?>>প্রকল্প</option> 
                                <option value="3"<?php if($content_type==3){echo "\rselected";}?>>আইন ও নীতিমালা</option>
                                <option value="4"<?php if($content_type==4){echo "\rselected";}?>>যোগাযোগ</option>
                                <option value="5"<?php if($content_type==5){echo "\rselected";}?>>সেবা</option>
                                <option value="6"<?php if($content_type==6){echo "\rselected";}?>>প্রকাশনা ও প্রতিবেদন</option>
                                <option value="7"<?php if($content_type==7){echo "\rselected";}?>>উদ্ভাবিত পণ্য</option>
                                <option value="8"<?php if($content_type==8){echo "\rselected";}?>>প্রসেস ও প্যাটেন্ট</option>
                                <option value="9"<?php if($content_type==9){echo "\rselected";}?>>নাগরিক সেবা সনদ</option>
                              </select>                                
                              </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label"> শো অন কনটেন্ট  </label>
                              <div class="controls">
                                <select name="content_st" class="span6  tooltips" data-original-title="Show on Menu">
                                <option value="1" <?php if($content_status == 1){echo "selected";}?>>Yes</option>
                                <option value="0" <?php if($content_status == 0){echo "selected";}?>>No</option>
                          </select>                                
                          </div>
                         </div>
                             <div class="control-group">
                                <label class="control-label">কনটেন্ট ডেস্ক্রিপশন</label>
                                <div class="controls">
                                <textarea id="ckeditor" placeholder="Type Description" class="span6  popovers ckeditor" data-trigger="hover" data-content="Type Description"  name="content_description" data-original-title="Type Description">
                                  <?php echo $content_des ?>
                                </textarea>
                               
                                </div>
                            </div> 
                            <div class="control-group">
                              <label class="control-label">ইমেজ</label>
                                <div class="controls" style="width:200px;width: 200px;display:inline-block; margin-left: 20px;">
                                 <img src="Action/uploads/<?=$content_media?>" alt="">
                                </div>
                          </div>
                            <div class="control-group">
                              <label class="control-label">মিডিয়া ফাইল</label>
                                <div class="controls">
                                  <input type="file" class="form-control span6" id="" name="files[]" placeholder="Specifications">
                                </div>
                          </div>
                          <div class="control-group">
                            <div class="controls">
                              <input type="submit" name="update_content" value="আপডেট ">
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


<script>

$(document).ready(function() {
    $('#sample_1').DataTable( {
        initComplete: function () {
            this.api().columns('.ctype').every( function () {
                var column = this;
                var select = $('<select><option value="" readonly></option></select>')
                    .appendTo( $(column.header()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
  
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
  
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );


</script>