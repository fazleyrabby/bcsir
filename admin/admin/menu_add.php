      <style type="text/css">
/* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
@media 
only screen and (max-width: 760px),(min-device-width: 768px) and (max-device-width: 1024px)  {

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc;
   }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
	}
		th { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	th:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
	}
	/*
	Label the data
	*/

 } 

</style>
<div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
         
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            
            

            
                                     <div class="row-fluid">
                 <div class="span12">
    <?php
    if (isset($_GET['success'])) {
		 // echo" <div class='widget orange'><div class='widget-body'>";
       if ($_GET['success'] == 'insufficientbalance') { // ?>
           <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                                
                                <h4 class="alert-heading">Warning!</h4>You don't Have Insufficient Balance to Purchase Share...!
                            </div>
        <?php 
		}
           
            elseif ($_GET['success'] == 'catagory_success') { // ?>
            <div class="alert alert-success">
                               
                                 <h4 class="alert-heading">সফলভাবে সম্পন্ন হয়েছে!</h4>
                            </div>
        <?php 
		}   
             elseif ($_GET['success'] == 'catagory_success_dlt') { // ?>
              <div class="alert alert-success">
                               
                                  <h4 class="alert-heading">সফলভাবে মুছে ফেলা হয়েছে </h4>
                            </div>
        <?php 
		}   
                      elseif ($_GET['success'] == 'catagory_st_updated') { // ?>
           <div class="alert alert-success">
                                
                                 <h4 class="alert-heading">সফলভাবে সম্পন্ন হয়েছে!</h4> 
                            </div>
        <?php 
		} 
		                      elseif ($_GET['success'] == 'catagory_success_update') { // ?>
         <div class="alert alert-success">
                               
                                  <h4 class="alert-heading">সফলভাবে সংশোধন সম্পন্ন !</h4> 
                            </div>
        <?php 
		} 
				                      elseif ($_GET['success'] == 'already_purchase') { // ?>
           <div class="alert alert-info">
                               
                                  <h4 class="alert-heading">Soory.You Cant Purchase a Share More than Once!</h4> 
                            </div>
        <?php 
		}         
				                      elseif ($_GET['success'] == 'tpass_mismatch') { // ?>
           <div class="alert alert-info">
                               
                                  <h4 class="alert-heading">Soory.Transaction Password Does Not Match!</h4> 
                            </div>
        <?php 
		}  
				                      elseif ($_GET['success'] == 'picture_success') { // ?>
           <div class="alert alert-info">
                               
                                  <h4 class="alert-heading">ছবি সফলভাবে যুক্ত হয়েছে !</h4> 
                            </div>
        <?php 
		}      
        
    }
	echo" </div>
                    </div>";
    ?>
                <?php 
            	if(isset($_GET['add_catagory']))
            	    {
            		  $ct=$_GET['add_catagory']; 
            		 if($ct=="add_catagory")
            		 {
            	?>
                     <div class="widget red">
                         <div class="widget-title">
                             <h4><i class="icon-tags"></i>এড মেনু  </h4>
                          
                         </div>
                         <div class="widget-body">
                          <div class="row-fluid">
                                          <div class="span12">
                    <!-- BEGIN widget widget-->

                            <!-- BEGIN FORM-->

                     <form action="Action/add_menu.php" method="post" class="form-horizontal">
                       <input type="hidden" value="<?php echo $usernamee?>" name="username" />
                       <input type="hidden" value="<?php echo $level?>" name="level" />
                       <input type="hidden" value="<?php echo $tpassm?>" name="tr_pass" />
                          <div class="control-group">
                                <label class="control-label"> মেনু টাইটেল </label>
                                <div class="controls">
                             <input type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Type Catagory Title"  name="catagory"/>
                                </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label">  শো অন মেনু</label>
                            <div class="controls">
                            <select name="show_menu" class="span6 tooltips" data-original-title="শো অন মেনু">
                              <option value="1">Yes</option>
                              <option value="0">No</option>

                            </select>                                
                            </div>
                          </div> 
                          <div class="control-group">
                            <label class="control-label"> শো অন টপ মেনু</label>
                              <div class="controls">
                                <select name="tshow_menu" class="span6  tooltips" data-original-title="শো অন টপ মেনু">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                                </select>                                
                              </div>
                            </div> 
                            <div class="control-group">
                            <label class="control-label"> শো অন সাইড মেনু </label>
                            <div class="controls">
                            <select name="side_menu" class="span6  tooltips" data-original-title="শো অন সাইড মেনু ">
                              <option value="1">Yes</option>
                              <option value="0">No</option>
                            </select>                                
                            </div>
                          </div> 
                         <!--   <div class="control-group">
                                <label class="control-label"> Central Side Menu</label>
                                <div class="controls">
                                <select name="central_side_menu" class="span6  tooltips" data-original-title="Show on Menu">
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>

                                </select>                                
                                </div>
                            </div>  -->

                          <div class="control-group">
                            <label class="control-label"> শো অন ফুটার মেনু (গুরুত্বপূর্ণ লিংক)</label>
                            <div class="controls">
                            <select name="useful_menu" class="span6  tooltips" data-original-title="শো অন ফুটার মেনু ">
                              <option value="1">Yes</option>
                              <option value="0">No</option>

                            </select>                                
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label"> শো অন সাইড মেনু (গুরুত্বপূর্ণ লিংক)</label>
                            <div class="controls">
                            <select name="useful_side_menu" class="span6  tooltips" data-original-title="শো অন সাইড মেনু">
                              <option value="1">Yes</option>
                              <option value="0">No</option>

                            </select>                                
                            </div>
                          </div>
                            <div class="control-group">
                                <label class="control-label"> শো অন ফুটার মেনু (আভ্যন্তরীণ ই-সেবা লিংক)</label>
                                <div class="controls">
                                <select name="internal_esheba_footer" class="span6  tooltips" data-original-title="শো অন সাইড মেনু ">
                                <option value="1">Yes</option>
                                <option value="0">No</option>

                                </select>                                
                                </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label"> শো অন ফুটার মেনু (বৈশিষ্ট্যযুক্ত লিঙ্ক)</label>
                              <div class="controls">
                              <select name="characteristics_footer" class="span6  tooltips" data-original-title="শো অন সাইড মেনু">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                                </select>                                
                                </div>
                            </div>
                            
                               <div class="control-group">
                                <label class="control-label">শো অন ফুটার মেনু (ইনোভেশন কর্নার)</label>
                                <div class="controls">
                                <select name="innovation_sidebar" class="span6  tooltips" data-original-title="Show on Menu">
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>

                                </select>                                
                                </div>
                            </div>
           
                            <div class="control-group">
                                <label class="control-label"> শো অন ফুটার মেনু(অন্যান্য লিংক)</label>
                                <div class="controls">
                                <select name="extra_link_footer" class="span6  tooltips" data-original-title="Show on Menu">
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>

                                </select>                                
                                </div>
                                 </div>

                              <div class="control-group">
                                  <label class="control-label"> শো অন ফুটার মেনু (কুইক লিংক)</label>
                                  <div class="controls">
                                  <select name="quick_menu" class="span6  tooltips" data-original-title="Show on Menu">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>

                                  </select>                                
                                  </div>
                              </div> 
                              <div class="control-group">
                              <label class="control-label">প্যারেন্ট ক্যাটাগরি</label>
                              <div class="controls">
                              <select name="mpart" class="span6 tooltips" data-original-title="Show on Menu">
                              <!--   <option value="">সিলেক্ট মেনু </option> -->
                                <option value="0">মেইন  (প্যারেন্ট মেনু তৈরির জন্য )</option>
                              <?php
                              $r="select catagory_title,catagory_id from catagory where menu_st=1 and mparent=0 and catagory_title!='Home'";
                              $rp=mysqli_query($conn,$r);
                              if($rp==true)
                              {
                              	while($rd=mysqli_fetch_array($rp))
                              	      {
                              			$rctitle=$rd['0'];
                                          $rcid=$rd['1'];
                              		echo "<option value='$rcid'>$rctitle</option>";	
                              		  }
                              }
                              ?>

                              </select>                                
                            </div>
                            </div> 		
                                 <div class="control-group">
                                <label class="control-label">টেমপ্লেট টাইপ </label>
                                <div class="controls">
                                <select name="template_type" placeholder="Type Title" class="span6  popovers" data-trigger="hover">                 
                                     <option value='1'> জেনেরাল </option>
        													   <option value='2'> ভিডিও গ্যালারি </option>
        													   <option value='3'> ফটো গ্যালারি </option>
        														 <option value='4'> টীম </option>
			                               <option value='5'> কন্টাক্ট </option>  
                                </select>
                                   
                                </div>
                                       
                            </div>								
                                <div class="control-group">
                                  <label class="control-label">মেনু ডেসক্রিপশন </label>
                                  <div class="controls">
                                 <input type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Type Description"  name="catagory_des"/>
                                </div>
                            </div>
                                                        
                            
                            <div class="form-actions">
                               <input type="submit" name="catadd" value="এড (+)" class='btn btn-success btn_success_custom' />
                            </div>
                            </form>
                            <!-- END FORM-->
                        </div>

                    <!-- END widget widget-->
                </div>
            </div>
                        
                             
                         </div>
                         <?php
		 }
		 elseif($ct=="edit_catagory")
		 {
			 $cata_id=$_GET['catagory_id'];

        $cat_det=mysqli_query($conn,"SELECT 
          catagory.catagory_id,
          catagory.catagory_title,
          catagory.catagory_description,
          catagory.menu_st,
          catagory.mparent,
          catagory.template_type,
          catagory.tshow_menu,
          catagory.side_menu,
          catagory.useful_menu,
          catagory.useful_side_menu,
          catagory.internal_esheba_footer,
          catagory.characteristics_footer,
          catagory.innovation_sidebar,
          catagory.extra_link_footer,
          catagory.quick_menu,
          b.catagory_title as parent_title FROM catagory left join catagory b on  
          b.catagory_id=catagory.mparent WHERE catagory.catagory_id='$cata_id'");
			 while($cpdet=mysqli_fetch_array($cat_det))
			    {
            // print_r($cpdet);
          
				   $cata_edit_id=$cpdet['0'];
				   $ecatagory_title=$cpdet['1'];
           $ecatagory_description=$cpdet['2'];
				   // $add_by=$cpdet['3'];
				   $emst=$cpdet['3'];
				   $mparent=$cpdet['4'];
				   $template_type=$cpdet['5'];
				   $tshow_menu=$cpdet['6'];
				   $side_menu=$cpdet['7'];
           $useful_menu=$cpdet['8'];
           $useful_side_menu=$cpdet['9'];
           $internal_esheba_footer=$cpdet['10'];
           $characteristics_footer=$cpdet['11'];
           $innovation_sidebar=$cpdet['12'];
           $extra_link_footer=$cpdet['13'];
				   $quick_menu=$cpdet['14'];
					if($emst==0)
					  {
						$mst="<span style='color:red;font-weight:700'>অপ্রকাশিত</span>";  
						}
					elseif($emst==1)
					  {
						$mst="<span style='color:#74B749;font-weight:700'>প্রকাশিত</span>";  
						}
				   }
			?>
<div class="widget red">
         <div class="widget-title">
             <h4><i class="icon-tags"></i> এডিট মেনু <?php echo " ".$ecatagory_title?> </h4>
          
         </div>
         <div class="widget-body">
          <div class="row-fluid">
                          <div class="span12">
    <!-- BEGIN widget widget-->

            <!-- BEGIN FORM-->
                   <form action="Action/add_menu.php" method="post" class="form-horizontal">
                     <input type="hidden" value="<?php echo $usernamee?>" name="username" />


                      <input type="hidden" value="<?php echo $cata_edit_id?>" name="cata_edit_id" />  
                           <input type="hidden" value="<?php echo $level?>" name="level" />
                           <input type="hidden" value="<?php echo $tpassm?>" name="tr_pass" />
                           <div class="control-group">
                           <label class="control-label">মেনু টাইটেল</label>
                           <div class="controls">
                           <input type="text" class="span6 tooltips" data-trigger="hover" value="<?php echo $ecatagory_title?>" data-original-title="Type Catagory Title"  name="catagory"/>
                          </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label"> শো অন মেনু </label>
                            <div class="controls">
                            <select name="show_menu" class="span6 tooltips" data-original-title="Show on Menu">

                              <option value="1" <?php if($emst == 1){echo "selected";}?>>Yes</option>
                              <option value="0" <?php if($emst == 0){echo "selected";}?>>No</option>
                            </select>                                
                            </div>
                          </div> 
                          <div class="control-group">
                            <label class="control-label">  শো অন টপ মেনু</label>
                              <div class="controls">
                                <select name="tshow_menu" class="span6  tooltips" data-original-title="Show on Menu">
                                <option value="1" <?php if($tshow_menu == 1){echo "selected";}?>>Yes</option>
                                <option value="0" <?php if($tshow_menu == 0){echo "selected";}?>>No</option>
                                </select>                                
                              </div>
                          </div> 

                          <div class="control-group">
                            <label class="control-label"> শো অন সাইড মেনু</label>
                            <div class="controls">
                            <select name="side_menu" class="span6  tooltips" data-original-title="Show on Menu">
                              <option value="1" <?php if($side_menu == 1){echo "selected";}?>>Yes</option>
                              <option value="0" <?php if($side_menu == 0){echo "selected";}?>>No</option>
                            </select>                                
                            </div>
                          </div> 


                          <div class="control-group">
                            <label class="control-label">  শো অন ফুটার মেনু (গুরুত্বপূর্ণ লিংক
                            )</label>
                            <div class="controls">
                            <select name="useful_menu" class="span6  tooltips" data-original-title="Show on Menu">
                              <option value="1" <?php if($useful_menu == 1){echo "selected";}?>>Yes</option>
                              <option value="0" <?php if($useful_menu == 0){echo "selected";}?>>No</option>
                            </select>                                
                            </div>
                          </div>

                          <div class="control-group">
                              <label class="control-label">  শো অন সাইড মেনু (গুরুত্বপূর্ণ লিংক)</label>
                              <div class="controls">
                              <select name="useful_side_menu" class="span6  tooltips" data-original-title="Show on Menu">
                              <option value="1" <?php if($useful_side_menu == 1){echo "selected";}?>>Yes</option>
                              <option value="0" <?php if($useful_side_menu == 0){echo "selected";}?>>No</option>
                              </select>                                
                          </div>
                          </div>
                          <div class="control-group">
                              <label class="control-label"> শো অন ফুটার মেনু  (অভ্যন্তরীণ ই-সেবা লিংক)</label>
                          <div class="controls">
                          <select name="internal_esheba_footer" class="span6  tooltips" data-original-title="Show on Menu">
                              <option value="1" <?php if($internal_esheba_footer == 1){echo "selected";}?>>Yes</option>
                              <option value="0" <?php if($internal_esheba_footer == 0){echo "selected";}?>>No</option>
                          </select>                                
                          </div>
                          </div>
                        
                        <div class="control-group">
                          <label class="control-label"> শো অন ফুটার মেনু  (বৈশিষ্ট্যযুক্ত লিঙ্ক)</label>
                          <div class="controls">
                          <select name="characteristics_footer" class="span6  tooltips" data-original-title="Show on Menu">
                          <option value="1" <?php if($characteristics_footer == 1){echo "selected";}?>>Yes</option>
                          <option value="0" <?php if($characteristics_footer == 0){echo "selected";}?>>No</option>
                          </select>                                
                          </div>
                        </div>
                               
                        <div class="control-group">
                              <label class="control-label">  শো অন সাইড মেনু (ইনোভেশন লিংক)</label>
                              <div class="controls">
                            <select name="innovation_sidebar" class="span6  tooltips" data-original-title="Show on Menu">
                            <option value="1" <?php if($innovation_sidebar == 1){echo "selected";}?>>Yes</option>
                            <option value="0" <?php if($innovation_sidebar == 0){echo "selected";}?>>No</option>

                           </select>                                
                           </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"> শো অন ফুটার মেনু (অন্যান্য লিংক) </label>
                            <div class="controls">
                            <select name="extra_link_footer" class="span6  tooltips" data-original-title="Show on Menu">
                          <option value="1" <?php if($extra_link_footer == 1){echo "selected";}?>>Yes</option>
                          <option value="0" <?php if($extra_link_footer == 0){echo "selected";}?>>No</option>
                          </select>                                
                          </div>
                        </div>
                                      
                        <div class="control-group">
                          <label class="control-label"> শো অন ফুটার মেনু (কুইক লিংক) </label>
                          <div class="controls">
                          <select name="quick_menu" class="span6  tooltips" data-original-title="Show on Menu">
                          <option value="1" <?php if($quick_menu == 1){echo "selected";}?>>Yes</option>
                          <option value="0" <?php if($quick_menu == 0){echo "selected";}?>>No</option>

                          </select>                                
                          </div>
                        </div> 

                    <div class="control-group">
                                    <label class="control-label">প্যারেন্ট ক্যাটাগরি</label>
                                    <div class="controls">
                    <select name="mpart" class="span6  tooltips" data-original-title="Show on Menu">
                      
                      <option value="0">মেইন (প্যারেন্ট মেনু তৈরির জন্য )</option>
                    <?php
                    $r="select catagory_title,catagory_id from catagory where menu_st=1 and mparent=0 and catagory_title!='Home'";
                    $rp=mysqli_query($conn,$r);
                    if($rp==true)
                    {
                    	while($rd=mysqli_fetch_array($rp))
                    	      {
                    			$rctitle=$rd['0'];
                                $rcid=$rd['1'];
                    		echo "<option value='$rcid'>$rctitle</option>";	
                    		  }
                    }
                    ?>

                    </select>                                
                    </div>
                    </div> 		
                        <div class="control-group">
                                <label class="control-label">টেমপ্লেট টাইপ </label>
                                <div class="controls">
                                <select name="template_type" placeholder="Type Title" class="span6  popovers" data-trigger="hover" >   
                                 <?php
                            $r="SELECT template_type,catagory_id FROM catagory WHERE catagory_id ='$cata_edit_id'";
                            $rp=mysqli_query($conn,$r);
                            if($rp==true)
                            {
                              while($rd=mysqli_fetch_array($rp))
                                  {
                                  $template_type = $rd['template_type'];
                                ?>

                                  <option value='1' <?php if ($template_type == 1) {
                                    echo "selected";
                                  }
                                  ?>> জেনেরাল</option>

            											<option value='2' <?php if ($template_type == 2) {
                                    echo "selected";
                                  }
                                  ?>> ভিডিও গ্যালারি</option>
                                  	<option value='3' <?php if ($template_type == 3) {
                                    echo "selected";
                                  }
                                  ?>> ফটো গ্যালারি</option>
            											<option value='4' <?php if ($template_type == 4) {
                                    echo "selected";
                                  }
                                  ?>> টীম</option>
            											<option value='5' <?php if ($template_type == 5) {
                                    echo "selected";
                                  }
                                  ?>> কন্টাক্ট</option>
                                  <?php }} ?>             
                                </select>
                                </div>
                                       
                            </div>						
                            <div class="control-group">
                              <label class="control-label">মেনু ডেসক্রিপশন</label>
                              <div class="controls">
                              <input type="text" class="span6  tooltips" data-trigger="hover"  value="<?php echo $ecatagory_description?>" data-original-title="Type Description"  name="catagory_des"/>
                              </div>
                            </div>                          
                            <div class="form-actions">
                              <input type="submit" name="catedit" value="সংশোধন" class='btn btn-success btn_success_custom' />
                            </div>
                            </form>
                            <!-- END FORM-->
                        </div>

                    <!-- END widget widget-->
                </div>
            </div>
                        
                             
                         </div>
            <?php 
                			}
                		 elseif($ct=="edit_catagory_pic")
                		 {
                			 $cata_id=$_GET['catagory_id'];
                			// echo $cata_id;
                $cat_det=mysqli_query($conn,"select catagory_id,catagory_title,catagory_description,menu_st,catagory_pic from catagory where catagory_id='$cata_id'");
                if($cat_det==true)
                {
          			 while($cpdet=mysqli_fetch_array($cat_det))
          			       {
          				   $cata_edit_id=$cpdet['0'];
          				   $ecatagory_title=$cpdet['1'];
          				   $ecatagory_description=$cpdet['2'];
          				   $emst=$cpdet['3'];
          				   $catagory_pic=$cpdet['4']; 
          					if($emst==0)
          					  {
          						$mst="<span style='color:red;font-weight:700'>অপ্রকাশিত</span>";  
          						}
          					elseif($emst==1)
          					  {
          						$mst="<span style='color:#74B749;font-weight:700'>প্রকাশিত</span>";  
          						}
          				   }
                }
                else
                {
                	echo mysqli_error($conn);
                }
                			?>
                <div class="widget red">
                         <div class="widget-title">
                             <h4><i class="icon-tags"></i>এসাইন ইমেজ<?php echo $ecatagory_title?> </h4>
                          
                         </div>
                         <div class="widget-body">
                          <div class="row-fluid">
                                          <div class="span12">
                    <!-- BEGIN widget widget-->

                            <!-- BEGIN FORM-->
                            <form action="Action/add_menu.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                           <input type="hidden" value="<?php echo $usernamee?>" name="username" />
                        
                                  
                        <input type="hidden" value="<?php echo $cata_edit_id?>" name="cata_edit_id" />  
                                   <input type="hidden" value="<?php echo $level?>" name="level" />

                                  
                                    <input type="hidden" value="<?php echo $tpassm?>" name="tr_pass" />
                           <div class="control-group">
                                <label class="control-label"> Menu Title</label>
                                <div class="controls">
                          <input type="text" class="span6  tooltips" data-trigger="hover" value="<?php echo $ecatagory_title?>" data-original-title="Type Catagory Title" readonly  name="catagory"/>
                                </div>
                            </div>
                                 <div class="control-group">
                                    <label class="control-label">Profile Pic : </label>
                                    <div class="controls">
                                      
                        <input type="file" class="form-control" id="exampleInputPassword2" name="files[]" placeholder="Specifications">
                                    </div>
                                </div>
                                                        
                            
                            <div class="form-actions">
                               <input type="submit" name="catedit_pic" value="সাবমিট" class='btn btn-success btn_success_custom' />
                            </div>
                            </form>
                            <!-- END FORM-->
                        </div>

                    <!-- END widget widget-->
                </div>
            </div>
                        
                             
                         </div>
            <?php 
			}
		elseif($ct=="list_catagory")
		 { 
		 ?>
         <div class="widget red">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i>মেনু তালিকা</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                    </div>
                    <div class="widget-body">

                        <table class="table table-striped table-bordered" id="sample_1" style="table-layout:fixed">
                            <thead>
                            <tr>
                                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                <th width="15%">মেনু টাইটেল</th>
                                <th width="10%">ডেসক্রিপশন</th>
                                <th>মেনু পিকচার</th>
                                <th>মেনু স্ট্যাটাস</th>
                                <th width="45%">পরিবর্তন</th>     
                                </tr>
                               </thead>
                               <tbody>
                            <?php
        							if($level==1)
        							 {
        							$ser="select catagory_id,catagory_title,catagory_description,menu_st,add_by,catagory_pic from catagory where menu_st !=2";
        							
        							}
        							else
        							{
	
              $ser="select catagory_id,catagory_title,catagory_description,menu_st,add_by,catagory_pic from catagory where add_by='$usernamee' and menu_st !=2";	
              								}
              							$se=mysqli_query($conn,$ser);	
              							if($se==true)
              							    {
              								  while($sdata=mysqli_fetch_array($se))
              								      {
              					
              					$catagory_id=$sdata['0'];
              					$catagory_title=$sdata['1'];
                        $catagory_description=$sdata['2'];
              					$menu_st=$sdata['3'];
              					$catagory_pic=$sdata['5'];
              					if ($catagory_pic != '') {
                          $cimage="<img src='Action/uploads/$catagory_pic' width='120px' height='75px'>";
                        }else {
                          $cimage = "কোনো ছবি নেই";
                        }
              					if($menu_st==0)
              					  {
              						$mst="<span style='color:red;font-weight:700'>অপ্রকাশিত</span>";  
              						}
              					elseif($menu_st==1)
              					  {
              						$mst="<span style='color:#74B749;font-weight:700'>প্রকাশিত</span>";  
              						}
              					$add_by=$sdata['4'];

                           echo"<tr class='odd gradeX'>
                                <td><input type='checkbox' class='checkboxes' value='1' /></td>
								<td>$catagory_title</td>
                                <td>$catagory_description</td>
								<td>$cimage</td>
								<td>$mst</td>
                	<td><a href='add_menu.php?add_catagory=edit_catagory&catagory_id=$catagory_id'><span class='btn btn-success btn_success_custom'>সংশোধন </span></a>&nbsp;
              
                  <a href='Action/cat_add_action.php?catagory_id=$catagory_id&catagory_dlt=catagory_dlt'>
                  <span class='btn btn-danger'>মুছে ফেলুন</span>
                  </a>&nbsp;
                 
                 <a href='Action/cat_add_action.php?catagory_id=$catagory_id&catagory_st=catagory_st&cst=$menu_st'>
                 <span class='btn btn-success'>মেনু অবস্থা পরিবর্তন</span>
                 </a>&nbsp;
               
                <a href='add_menu.php?add_catagory=edit_catagory_pic&catagory_id=$catagory_id'>
                <span class='btn btn-primary'>ছবি বরাদ্দ</span>
                </a>
                </td>";
                echo"</tr>";				
									
									  }	
								}
							
							?>
                            </tbody>
                        </table>

                    </div>
                </div>
         <?php
		 }
						 }
						 ?>
                     
                     </div>
                     <!-- END BLANK PAGE PORTLET-->
                 </div>
             </div>
            <!-- END PAGE CONTENT-->
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE --> 


            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
         </div>