<div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->

                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                
                   <!-- <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">Newton University</a>
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
            
            

            
                        <div class="row-fluid">
    
							   
						
   <div class="span12">
  <?php
    if (isset($_GET['success'])) {
		  echo"";
       if ($_GET['success'] == 'success_profile_fail') { // ?>
           <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                                <button data-dismiss="alert" class="close">×</button>
                                <h4 class="alert-heading">Soory !</h4>Profile Failed to Update..!
                            </div>
        <?php 
		}
           
            elseif ($_GET['success'] == 'success_profile_update') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Success!</h4> Profile Successfully Updated !
                            </div>
        <?php 
		}   
             elseif ($_GET['success'] == 'success_pass_update') { // ?>
           <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Success!</h4> Password Changed Successfully !
                            </div>
        <?php 
		}   
             elseif ($_GET['success'] == 'success_pass_fail') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Soory !</h4> Password Failed to Changed !
                            </div>
        <?php 
		}  
             elseif ($_GET['success'] == 'old_pass_wrong') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Soory !</h4> Given Old Password is not Right !
                            </div>
        <?php 
		}
             elseif ($_GET['success'] == 'old_tpass_wrong') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Soory !</h4> Given Old Transaction Password is not Right !
                            </div>
        <?php 
		}
		
            elseif ($_GET['success'] == 'success_tpass_update') { // ?>
           <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Success!</h4>Transaction  Password Changed Successfully !
                            </div>
        <?php 
		}   
             elseif ($_GET['success'] == 'success_tpass_fail') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Soory !</h4>Transaction Password Failed to Changed !
                            </div>
        <?php 
		}
		             elseif ($_GET['success'] == 'picture_select') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4>Please Select a Doc !
                            </div>
        <?php 
		}
		             elseif ($_GET['success'] == 'picture_large') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4>Please Select a Doc Size in 200 KB !
                            </div>
        <?php 
		} 
		             elseif ($_GET['success'] == 'picture_invalid') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Sorry !</h4>Please Select a Valid Doc Format  !
                            </div>
        <?php 
		} 
            elseif ($_GET['success'] == 'picture_success') { // ?>
           <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Success!</h4>Media Doc সফলভাবে সংশোধন সম্পন্ন ! !
                            </div>
        <?php 
		} 
            elseif ($_GET['success'] == 'team') { // ?>
           <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Success!</h4>Team Added Successfully Done !
                            </div>
        <?php 
    } 

            elseif ($_GET['success'] == 'pic_delete') { // ?>
           <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Success!</h4> Doc Delete Successfully !
                            </div>
        <?php 
		} 
		              
		             elseif ($_GET['success'] == 'submit_failed') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Please !</h4>Submit a Button !
                            </div>
        <?php 
		} 
    }
	echo"";
    ?>             

    <div class="widget green">
        <div class="widget-title">
            <h4><i class="icon-reorder"></i> মেনেজ ওয়েব পেজ ডাটা </h4>
            <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            
            </span>
        </div>
        <div class="widget-body">
                            <!-- BEGIN FORM-->
<?php
if(isset($_GET['edit']))
  {
	$media_id=$_GET['media_id'];  
	$ptype=$_GET['ptype'];  
$ser="select media_id,media_title,media_type,media_description,media_file,entry_date,entry_time
from media_details where media_id=$media_id";
							
							$se=mysqli_query($conn,$ser);	
							if($se==true)
							    {
								  while($sdata=mysqli_fetch_array($se))
							    {
            					$mid=$sdata['0'];
            					$mtitle=$sdata['1'];
            					$mtype=$sdata['2'];
            					$mdesc=$sdata['3'];
            					$mfile=$sdata['4'];
            					$end=$sdata['5'];
            					$ent=$sdata['6'];
									  }
									  }
	?>
<form action="Action/add_media.php" class="form-horizontal" method="post" enctype="multipart/form-data">
                            
                            
                            
                    <?php
					    echo "<input type='hidden' name='media_id' value='$mid'>";
					    echo "<input type='hidden' name='eid' value='$id'>";
						echo "<input type='hidden' name='level' value='$level'>";
						echo "<input type='hidden' name='ptype' value='$ptype'>";

					
					?>

                         
    <div class="control-group">
                                <label class="control-label">ধরণ টাইটেল</label>
                                <div class="controls">
                                    <input type="text" placeholder="টাইপ টাইটেল" class="span6  popovers" data-trigger="hover" data-content="টাইপ টাইটেল"  name="title" value="<?php echo $mtitle?>" data-original-title="টাইপ টাইটেল" />
                                </div>
                                       
                            </div>
                    
    <div class="control-group">
                                <label class="control-label">সিলেক্ট পেজ টাইটেল</label>
                                <div class="controls">
                                <select name="media_type" placeholder="টাইপ টাইটেল" class="media_type span6  popovers" data-trigger="hover" data-content="টাইপ টাইটেল"   data-original-title="টাইপ টাইটেল">
                                    <?php
                                    if ($ptype == 'home') { ?>
                                    <option value="Welcome message" <?php if ($mtype == "Welcome message") {echo "selected";} ?>> ওয়েলকাম মেসেজ </option>
                                    <option value="Message from chairman" <?php if ($mtype == "Message from chairman") { echo "selected";} ?>> মেসেজ ফ্রম চেয়ারম্যান </option>
                                    <option value="pm" <?php if ($mtype == "pm") { echo "selected";} ?>> সাইডবার টপ </option>
                                    <option value="Slider" <?php if ($mtype == "Slider") { echo "selected"; }?>> স্লাইডার </option>
                                    <!-- <option>Front News & Events</option>
                                    <option>Front Notice</option> -->
                                    <option value="Middle slider" <?php  if ($mtype == "Middle slider") { echo "selected"; }?>> মিডেল স্লাইডার</option>
                                    <?php } 
                                       elseif($ptype=="gallery")
                                        {
                                        $r="SELECT catagory_title,catagory_id from catagory where template_type in (2,3) and menu_st = 1";
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
                                        }
                                        elseif ($ptype=="pages")
                                        {
                                        $r="SELECT catagory_title,catagory_id from catagory where template_type in (1,4) and menu_st = 1";
                                        $rp=mysqli_query($conn,$r);
                                        if($rp==true)
                                        {
                                        while($rd=mysqli_fetch_array($rp))
                                        {
                                        $rctitle=$rd['0'];
                                        $rcid=$rd['1'];
                                        if($mtype == $rcid){
                                            $selected = "selected";
                                        }
                                        else {
                                            $selected = "";
                                        }

                                        echo "<option value='$rcid' $selected>$rctitle</option>";	
                                        }
                                        }
                                        }
                                    
                                    ?>
                                </select>
                                   
                                </div>
                                       
                            </div>
                    
                           
                          <div class="control-group">
                                <label class="control-label">ডেসক্রিপশন</label>
                                <div class="controls">
                                <textarea id="ckeditor" placeholder="Type Description" class="span6  popovers ckeditor" data-trigger="hover" data-content="Type Description"  name="description" data-original-title="Type Description"><?php echo $mdesc?></textarea>
                               
                                </div>
                            </div> 
<div class="control-group">
                                <label class="control-label"> মিডিয়া ফাইল</label>
                                <div class="controls">
                                    
                                     <input type="file" class="form-control span6" id="exampleInputPassword2" name="files[]" placeholder="Specifications">
                                </div>
                            </div>

                              <div class="form-actions">
                                <button type="submit" name="edit" class="btn btn-success btn_success_custom">সংশোধন </button>
                                <!-- <button type="button" class="btn">কেন্সেল</button> -->
                            </div>
                            </form> 
    <?php
	}
  elseif(isset($_GET['team_details']))
{
  $tid=$_GET['team_id'];
  ?>
             <form action="Action/add_media.php" class="form-horizontal" method="post" enctype="multipart/form-data">
  <input type="hidden" name="memid" value="<?php echo $tid?>">            
                  <div class="control-group">
                                <label class="control-label"> ইমেইল এড্রেস </label>
                                <div class="controls">
                                    <input type="text" placeholder="Facebook Link" class="span6  popovers" data-trigger="hover" data-content="টাইপ টাইটেল"  name="fblink" data-original-title="Type Facebook Link"  required />
                                </div>
                                       
                            </div>
                                <div class="control-group">
                                <label class="control-label"> টুইটার টাইটেল </label>
                                <div class="controls">
                                    <input type="text" placeholder="Type Twitter Title" class="span6  popovers" data-trigger="hover" data-content="Type Twitter Title"  name="Twitter" data-original-title="Type Twitter Title"  required />
                                </div>
                                       
                            </div>
                                <div class="control-group">
                                <label class="control-label"> লিঙ্কড টাইটেল </label>
                                <div class="controls">
                                    <input type="text" placeholder="Type Linked Title" class="span6  popovers" data-trigger="hover" data-content="Type Linked Title"  name="linkedin" data-original-title="টাইপ টাইটেল"  required />
                                </div>
                                       
                            </div>
                                <div class="control-group">
                                <label class="control-label">ডেসক্রিপশন</label>
                                <div class="controls">
                                    <input type="text" placeholder="Type Designation Title" class="span6  popovers" data-trigger="hover" data-content="Type Designation Title"  name="Designation" data-original-title="Type Designation Title"  required />
                                </div>
                                       
                            </div> 
                                <div class="form-actions">
                                <button type="submit" name="team_add" class="btn btn-success btn_success_custom">সাবমিট</button>
                            
             </form>
  <?php

}
elseif(isset($_GET['web_data']))
     {
		
		?>
        <form action="Action/add_media.php" class="form-horizontal" method="post" enctype="multipart/form-data">  
                    <?php
					    echo "<input type='hidden' name='eid' value='$id'>";
						echo "<input type='hidden' name='level' value='$level'>";

					
					?>

                    <div class="control-group">
                                <label class="control-label">সিলেক্ট টাইপ</label>
                                <div class="controls">
                                <select name="media_type" placeholder="টাইপ টাইটেল" class="media_type span6  popovers" data-trigger="hover" data-content="টাইপ টাইটেল"   data-original-title="টাইপ টাইটেল">
                                                  <option>About Us</option>
                                                  <option>ICO Intro</option>
                                                  <option>Slider</option>
                                                  <option>Media</option>
                                </select>
                                   
                                </div>
                                       
                            </div>     
    <div class="control-group">
                                <label class="control-label"> টাইপ টাইটেল</label>
                                <div class="controls">
                                    <input type="text" placeholder="টাইপ টাইটেল" class="span6  popovers" data-trigger="hover" data-content="টাইপ টাইটেল"  name="title" data-original-title="টাইপ টাইটেল"  required />
                                </div>
                                       
                            </div>
                    
    
                    
                           
                          <div class="control-group">
                                <label class="control-label"> ডেসক্রিপশন</label>
                                <div class="controls">
                                <textarea placeholder="Type Description" id="ckeditor" class="span6  popovers ckeditor" data-trigger="hover" data-content="Type Description"  name="description" data-original-title="Type Description"></textarea>
                               
                                </div>
                            </div> 
                            <div class="control-group">
                                <label class="control-label"> মিডিয়া ফাইল</label>
                                <div class="controls">
                                    
                                     <input type="file" class="form-control span6" id="exampleInputPassword2" name="files[]" placeholder="Specifications">
                                </div>
                            </div>

                              <div class="form-actions">
                                <button type="submit" name="Submit" class="btn btn-success btn_success_custom"> সাবমিট</button>
                                <!-- <button type="button" class="btn"> বাতিল</button> -->
                            </div>
                            </form>
                                <?php
                                
                                }	
            elseif(isset($_GET['add']))
                {
                    $add=$_GET['add'];
                    $ptype=$_GET['ptype'];
                    if($add=="add")
                    {

                            ?>
                            <form action="Action/add_media.php" class="form-horizontal" method="post" enctype="multipart/form-data">     
                            
                    <?php
					echo "<input type='hidden' name='ntype' value='$ntype'>";
					    echo "<input type='hidden' name='eid' value='$id'>";
						echo "<input type='hidden' name='level' value='$level'>";
						echo "<input type='hidden' name='ptype' value='$ptype'>";
                        echo "<input type='hidden' name='add_type' value='$add'>";
					
					?>

                         
                        <div class="control-group">
                                <label class="control-label"> টাইপ টাইটেল</label>
                                <div class="controls">
                                    <input type="text" placeholder="টাইপ টাইটেল" class="span6  popovers" data-trigger="hover" data-content="টাইপ টাইটেল"  name="title" data-original-title="টাইপ টাইটেল" />
                                </div>
                                       
                            </div>
                    
    <div class="control-group">
                                <label class="control-label"> সিলেক্ট পেজ টাইটেল </label>
                                <div class="controls">
                                <select name="media_type" placeholder="টাইপ টাইটেল" class="media_type span6  popovers" data-trigger="hover" >       
   <?php
if($ptype=="home")
{
?>	
    <option value="Welcome message"> ওয়েলকাম মেসেজ </option>
    <option value="Message from chairman"> মেসেজ ফ্রম চেয়ারম্যান </option>
    <option value="pm"> সাইডবার টপ </option>
    <option value="Slider"> স্লাইডার </option>
    <!-- <option>Front News & Events</option>
    <option>Front Notice</option> -->
    <option value="Middle slider"> মিডেল স্লাইডার</option>
    <!-- <option>Front Affiliate</option> -->
<?php
}

// elseif($ptype=="notice")
// {
// $r="select catagory_title,catagory_id from catagory where catagory_id=13";
// $rp=mysqli_query($conn,$r);
// if($rp==true)
// {
// 	while($rd=mysqli_fetch_array($rp))
// 	      {
// 	   $rctitle=$rd['0'];
//        $rcid=$rd['1'];
// 	echo "<option value='$rcid'>$rctitle</option>";	
// 		  }
// }
// }
elseif($ptype=="gallery")
{
$r="select catagory_title,catagory_id from catagory where template_type = 2 or template_type = 3 and menu_st = 1";
$rp=mysqli_query($conn,$r);
print_r($r);
if($rp==true)
{
	while($rd=mysqli_fetch_array($rp))
	      {
			$rctitle=$rd['0'];
            $rcid=$rd['1'];
	echo "<option value='$rcid'>$rctitle</option>";	
		  }
}
}
else
{
$r="select catagory_title,catagory_id from catagory where menu_st=1 and template_type = 1 and mparent != 0" ;  //not in (12,13)
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
}
?>
                                                
                        </select>
                        </div>      
                        </div> 
                          <div class="control-group">
                                <label class="control-label">ডেসক্রিপশন</label>
                                <div class="controls">
                                <textarea placeholder="Type Description"  class="span6  popovers ckeditor" data-trigger="hover" data-content="Type Description"  name="description" data-original-title="Type Description"></textarea>
                               
                                </div>
                            </div> 
<div class="control-group">
                                <label class="control-label">মিডিয়া ফাইল</label>
                            <div class="controls">
                                     <input type="file" class="form-control span6" id="exampleInputPassword2" name="files[]" placeholder="Specifications">
                                </div>
                            </div>

                              <div class="form-actions">
                                <button type="submit" name="Submit" class="btn btn-success btn_success_custom">সাবমিট</button>
                                <!-- <button type="button" class="btn">বাতিল</button> -->
                            </div>
                            </form>
							<?php
			}
			else
			{
				?>
                            <form action="Action/add_media.php" class="form-horizontal" method="post" enctype="multipart/form-data">
                            
                            
                            
                    <?php
					  
					    echo "<input type='hidden' name='eid' value='$id'>";
						echo "<input type='hidden' name='level' value='$level'>";
                        echo "<input type='hidden' name='description' value='Gallery'>";
                        echo "<input type='hidden' name='media_type' value='Gallery'>";
                        echo "<input type='hidden' name='add_type' value='$add'>";

					?>

                         
    <div class="control-group">
                                <label class="control-label"> টাইপ টাইটেল</label>
                                <div class="controls">
                                    <input type="text" placeholder="টাইপ টাইটেল" class="span6  popovers" data-trigger="hover" data-content="টাইপ টাইটেল"  name="title" data-original-title="টাইপ টাইটেল"  required />
                                </div>
                                       
                            </div>
                    

                    
                           

<div class="control-group">
                                <label class="control-label">মিডিয়া ফাইল</label>
                                <div class="controls">
                                    
                                     <input type="file" multiple class="form-control span6" id="exampleInputPassword2" name="files[]" placeholder="Specifications">
                                </div>
                            </div>

                              <div class="form-actions">
                                <button type="submit" name="Submit" class="btn btn-success btn_success_custom">সাবমিট</button>
                                <!-- <button type="button" class="btn">বাতিল</button> -->
                            </div>
                            </form>
				<?php
				
			}
							?>
                            <?php
	}
							?>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <div class="widget red">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> 
                        <?php
						if($level==1)
						  {
							echo "সকল কন্টেন্ট তালিকা";  
							  
							  }
						else
						{
							echo "All Support History By $usernamee";
							}
						?>
                        </h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                               
                            </span>
                    </div>
                    <div class="widget-body">

                        <table class="table table-striped table-bordered table_pages" id="page_table">
                            <thead>
                            <tr>
                                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#page_table .checkboxes"/></th>

                                <th>টাইটেল</th>
                                <th class="type">টাইপ</th>
                                <th>ফাইল</th>
                                <th>তারিখ</th>
                                <th>অন্যান্য পরিবর্তন</th>
                 
                       <?php
					   if($level==1)
					   {
					   echo "";
					   }
					   ?>


                            </tr>
                               </thead>
                               <tbody>
                            <?php
if($ptype=="gallery")
{
$ser="SELECT media_id,media_title,media_type,media_description,media_file,entry_date,entry_time
from media_details join catagory on catagory.catagory_id = media_details.media_type where template_type in (2,3)";
}

elseif($ptype=="home")
{
$ser="SELECT media_id,media_title,media_type,media_description,media_file,entry_date,entry_time
from media_details where media_type not in (select distinct catagory_id from catagory)";	
}

elseif($ptype=="pages")
{
$ser="SELECT media_id,media_title,media_type,media_description,media_file,entry_date,entry_time
from media_details join catagory on catagory.catagory_id = media_details.media_type where template_type in (1,4) and menu_st = 1";		
}

							
							$se=mysqli_query($conn,$ser);	
							if($se==true)
							    {
								  while($sdata=mysqli_fetch_array($se))
								      {
					
					$mid=$sdata['0'];
					$mtitle=$sdata['1'];
					$mtype=$sdata['2'];
                    $mdesc=$sdata['3'];
					$mfile=$sdata['4'];
					$end=$sdata['5'];
					$ent=$sdata['6'];
					$or="Action/uploads/$mfile";
                    $dup=$end."</br>".$ent;
                    
                    // var_dump($mtype);

// <td class='limit' style='width:40%; height:50px; max-width: 0;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;'>$mdesc</td>

          if($mtype=="Team")
          {
            $tlink="<a href='success_track_add.php?team_details=team_details&team_id=$mid'>Add Details</a>";
          }
          else
          {
            $tlink="";
          }?> 
        
         <?php echo"<tr class='odd gradeX tr_row' data-type='$mtype'>
            <td style='width:5%'><input type='checkbox' class='checkboxes' value='1' /></td>";
            echo"
            <td style='width:20%' >$mtitle</td>";
            echo "<td style='width:10%' >";
            $catagory_name = mysqli_query($conn,"SELECT catagory_title from catagory where catagory_id = $mtype");
            $category_rows = mysqli_num_rows($catagory_name);
            if($category_rows > 0){
              while ($data = mysqli_fetch_array($catagory_name)) {
                 $type_name = $data['0'];
                 echo "$type_name";
              }
            }
            else {
                
            
                if ($mtype == 'Message from chairman') { echo "মেসেজ ফ্রম চেয়ারম্যান"; }
                if ($mtype == 'Welcome message') {  echo "ওয়েলকাম মেসেজ";}
                if ($mtype == 'Middle slider') {  echo "মিডেল স্লাইডার";}
                if ($mtype == 'Slider') { echo "স্লাইডার"; }
                if ($mtype == 'pm') { echo "সাইডবার টপ" ;}
                
            }
            echo "</td>";
            echo "
            <td style='width:10%'><img src='$or' Download='$or'/></td>
                <td style='width:15%'>$dup</td>

                <td style='width:20%'><a class='btn btn-success btn_success_custom' href='success_track_add.php?edit=edit&media_id=$mid&ptype=$ptype'>সংশোধন</a>&nbsp;&nbsp;&nbsp;&nbsp;<a class='btn btn-danger' href='Action/add_media.php?delete=delete&media_id=$mid&ptype=$ptype'>মুছে ফেলুন</a>
                  </br>
&nbsp;&nbsp;&nbsp;&nbsp;
                  $tlink</td>
								
								";

                            echo"</tr>";				
									
									  }	
								}
							
							?>
                            
                            </tbody>
                        </table>

                    </div>
                </div>
                </div>

            </div>


            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
         </div>


<style>

</style>