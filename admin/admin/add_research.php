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
                   <!-- <h3 class="page-title">
                     ড্যাশবোর্ড 
                   </h3> -->

                   
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
       <?php if(isset($_GET['research'])) { 
         if ($_GET['research'] == "add_research"){
           echo "<h4><i class='icon-tags'></i> নতুন গবেষণা যোগ </h4>";
         }
         elseif($_GET['research'] == "research_list")
         {
            echo "<h4><i class='icon-tags'></i> গবেষণা তালিকা </h4>";
         }
          elseif($_GET['research'] == "update_research")
         {
            echo "<h4><i class='icon-tags'></i> গবেষণা সংশোধন  </h4>";
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
                <h4 class="alert-heading">সফলভাবে মুছে ফেলা হয়েছে !</h4>
               </div>
            <?php 
        } 
         if ($_GET['success'] == 'data_exists') { // ?>
               <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                <h4 class="alert-heading">Employee Name or Serial already exists!</h4>
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
		if (isset($_GET['research'])) {    //if add account head found
			$research = $_GET['research'];     //if clicked on add account head 
			if ($research == "add_research"){ 
                echo '<body onLoad="get_scientist_details()">';
             ?> 
            
			<form action="Action/add_research.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
            <input type="hidden" value="<?php echo $usernamee?>" name="username">
            <?php if ($level == 1) 
            { ?>
            <div class="control-group">
            <label class="control-label">বিজ্ঞানীর আইডি</label>
                <div class="controls">
                        <select class="span6 chzn-select" data-placeholder="বিজ্ঞানীর আইডি" tabindex="1" name="employee_details_id" id="employee_details_id" onchange="get_scientist_details()">
                    <option value=""></option>
                    <?php 
                        $employee = mysqli_query($conn,"SELECT id,employee_id,employee_name FROM employee_details WHERE employee_st = 1 and employee_type = 2");
                        if ($employee == true) {
                        while ($employee_details = mysqli_fetch_array($employee))
                        {
                        $id = $employee_details["0"];
                        $employee_id = $employee_details["1"];
                        $employee_name = $employee_details["2"];

                        ?>
                        <option value="<?php echo $id?>"><?php echo "$employee_id"?></option>
                        <!-- <input type="hidden" value="" name=""> -->
                        <?php } } ?> 
                </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">নাম</label>
                    <div class="controls">
                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="বিজ্ঞানীর নাম" placeholder="বিজ্ঞানীর নাম" id="scientist_name" name="scientist_name" readonly>
                    </div>
            </div>
             <div class="control-group">
                <label class="control-label">বিভাগ </label>
                    <div class="controls">
                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="বিজ্ঞানীর বিভাগ " placeholder="বিজ্ঞানীর বিভাগ" name="scientist_department" id="scientist_department" readonly>
                    </div>
            </div>
              <div class="control-group">
                <label class="control-label">পদবি</label>
                    <div class="controls">
                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="বিজ্ঞানীর পদবি" placeholder="বিজ্ঞানীর পদবি" name="scientist_designation" id="scientist_designation" readonly>
                    </div>
            </div>
            <?php } 
            else 
            { 
                // echo $employee_login_id;
            $employee_dt = mysqli_query($conn,"SELECT id from employee_details where employee_id = $employee_login_id");
            if($employee_dt == true){
                while($data=mysqli_fetch_array($employee_dt)){
                    $id = $data['0'];
                    echo "<input value='$id' type='hidden' name='employee_details_id' id='employee_id'>";
                }
            }
            echo "<input value='' type='hidden' id='scientist_name'>";
            echo "<input value='' type='hidden' id='scientist_department'>";
            echo "<input value='' type='hidden' id='scientist_designation'>";
            echo "<input value='' type='hidden' id='scientist_designation'>";
            }
            ?>
            
            <div class="control-group">
                <label class="control-label">গবেষণার বিষয়বস্তু</label>
                    <div class="controls">
                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="গবেষণার বিষয়বস্তু" placeholder="গবেষণার বিষয়বস্তু" name="research_name" id="research_name" required>
                    </div>
            </div>
             <div class="control-group">
                <label class="control-label">গবেষণা বিস্তারিত</label>
                    <div class="controls">
                       <textarea name="research_details" id="research_details" class="span6 ckeditor tooltips" rows="" data-trigger="hover" data-original-title="গবেষণা বিস্তারিত" placeholder="গবেষণা বিস্তারিত" ></textarea>
                       
                    </div>
            </div>
            <div class="control-group">
                            <label class="control-label">মিডিয়া ফাইল</label>
                            <div class="controls">
                               <input type="file" name="files[]" class="default">
                            <span style="font-size: 10px">
                            [FILE SUPPORTS-
                            JPG,DOC,PDF,JPEG,ZIP]
                            </span>
                            </div>
                         
                           
                        </div>
            <div class="control-group">
                    <label class="control-label">পাবলিশ তারিখ</label>
                    <div class="controls">
                        <input type="text" id="datepicker" name="publish_date" readonly="false">

                    </div>
            </div>

				<div class="control-group">
					<div class="controls">
						<button class="btn btn-primary" type="submit" name="add_research">সাবমিট
                        </button>
					</div>
				</div>
		   </form>
			<?php }

            elseif ($research == "research_list") { ?> <!--  if clicked on account head List  -->
            <style>
             .details{
                 
             }
            </style>
            <table class="table table-striped table-bordered" id="sample_1" style="table-layout:fixed">
             <thead>
             <!-- <h4>কর্মচারী/বিজ্ঞানী ডিটেইলস</h4> -->
                <tr>
                
                <!-- <th>Account id</th> -->
                <?php if($level == 1){ ?>
                <th width="10%"> বিজ্ঞানীর আইডি </th>
                <th> বিজ্ঞানীর নাম   </th>
                <?php } ?>
                
                <th> গবেষণা বিষয়বস্তু </th>
                <th width="20%"> গবেষণা বিবরণ  </th>
                <th> পাবলিশ তারিখ  </th>
                <th width="20%"> সংশোধন / সংযোজন </th>
             </thead>
               <tbody>
               <?php  
                 if($level == 6 &&  $level !=5 && $level != 4){
                    $research=mysqli_query($conn,"SELECT employee_details_id,research_name,research_media,publish_date,employee_name,employee_id,r.id,research_details from research as r left join employee_details as e on e.id=r.employee_details_id where research_st = 1 and e.employee_id = '$employee_login_id'");
                 }
                 elseif($level == 1)
                 {
                    $research=mysqli_query($conn,"SELECT employee_details_id,research_name,research_media,publish_date,employee_name,employee_id,r.id,research_details from research as r left join employee_details as e on e.id=r.employee_details_id where research_st = 1");
                 }	
                 
                 //1 = Show Data
                 if($research==true)
                 {
              	    while($data=mysqli_fetch_array($research))
              		{ 
                          
                        $employee_details_id=$data['0'];
                        $research_name=$data['1'];
                        $research_media=$data['2'];
                        $publish_date=$data['3'];
                        $scientist_name=$data['4'];
                        $employee_id=$data['5'];
                        $id=$data['6'];
                        $details=$data['7'];
                          // strip tags to avoid breaking any html
                        $string = strip_tags($details);
                        if (strlen($string) > 500) {

                            // truncate string
                            $stringCut = substr($string, 0, 15);
                            $endPoint = strrpos($stringCut, ' ');

                            //if the string doesn't contain any space then it will cut without word basis.
                            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                            $string .= '. . . . . . . . . .';
                        }
                      
              	        
                        if ($level == 1) {
                            echo "<td> $employee_id </td>";
                            echo "<td> $scientist_name </td>";
                        }
                        echo "<td> $research_name </td>
                        <td class='details'> $string </td>
                        ";
                         {
                            $bn_digits=array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
                            $p_date = str_replace(range(0, 9),$bn_digits, $publish_date);
                         }
                        echo "
                        <td> $p_date </td>
                        <td><a href='add_research.php?research=update_research&research_id=$id'><span class='btn btn-success btn_success_custom'>সংশোধন </span></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='Action/add_research.php?research_id=$id&research_delete=research_delete'>
                        <span class='btn btn-danger'>মুছে ফেলুন</span>
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>";
                        echo "</tr>"; 
                        }
                        }?>
                     </tbody>
            	</table>

			
				
        <?php }

    elseif ($research == "update_research") 
    {
        if (isset($_GET['research_id'])) {
            echo '<body onLoad="get_scientist_details()">';
            $id = $_GET['research_id'];
            $edit_research=mysqli_query($conn,"SELECT employee_details_id,research_name,research_media,publish_date,employee_name,employee_id,r.id,research_details from research as r left join employee_details as e on e.id=r.employee_details_id where research_st = 1 and r.id = $id");  
            if($edit_research==true)
            {
            while($data=mysqli_fetch_array($edit_research))
            {
            $employee_details_id=$data['0'];
            $research_name=$data['1'];
            $research_media=$data['2'];
            $publish_date=$data['3'];
            $scientist_name=$data['4'];
            $employee_id=$data['5'];
            $id=$data['6'];
            $details=$data['7'];
            // $account_head_id = $data['0'];
            // $id = $data['0'];
            // $employee_designation = $data['1'];
            // $employee_dept = $data['2'];
            // $employee_name = $data['3'];
            // $employee_grade = $data['4'];
            // $join_date = $data['5'];
            // $basic_salary = $data['6']; 
            // $employee_serial = $data['7']; 
            // $employee_type = $data['8'];
            // $image = $data['9'];
            ?>

            <form action="Action/add_research.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
            <input type="hidden" value="<?php echo $usernamee?>" name="username">
            <input type="hidden" value="<?php echo $id ?>" name="research_id">

            <div class="control-group">
            <label class="control-label">বিজ্ঞানীর আইডি</label>
                <div class="controls">
                     <!-- chzn-select -->
                        <select class="span6 chzn-select" data-placeholder="বিজ্ঞানীর আইডি" tabindex="1" name="employee_details_id" id="employee_details_id" onchange="get_scientist_details()">
                    <option value=""></option>
                    <?php 
                        $employee = mysqli_query($conn,"SELECT id,employee_id,employee_name FROM employee_details WHERE employee_st = 1 and employee_type = 2");
                        if ($employee == true) {
                        
                        while ($employee_details = mysqli_fetch_array($employee))
                        { 
                            $id = $employee_details["0"];

                        $employee_id = $employee_details["1"];
                        $employee_name = $employee_details["2"];
                        if ($employee_details_id ==  $id) 
                        {
                           $select = ' selected';
                           $disabled = '';
                        }
                        else {
                           if ($usernamee != 'admin')
                           {
                            $disabled = 'disabled'; 
                           }
                           $select = '';
                        }
                        
                        echo "<option value='$id' $select $disabled>$employee_id</option>";
                        ?>
                        <!-- <input type="hidden" value="" name=""> -->
                        <?php } } ?> 
                </select>
                </div>
            </div>    
            <div class="control-group">
                <label class="control-label">নাম</label>
                    <div class="controls">
                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="বিজ্ঞানীর নাম" placeholder="বিজ্ঞানীর নাম" value="" id="scientist_name" name="scientist_name" readonly>
                    </div>
            </div>
             <div class="control-group">
                <label class="control-label">বিভাগ </label>
                    <div class="controls">
                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="বিজ্ঞানীর বিভাগ " placeholder="বিজ্ঞানীর বিভাগ" name="scientist_department" id="scientist_department" readonly>
                    </div>
            </div>
              <div class="control-group">
                <label class="control-label">পদবি</label>
                    <div class="controls">
                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="বিজ্ঞানীর পদবি" placeholder="বিজ্ঞানীর পদবি" name="scientist_designation" id="scientist_designation" readonly>
                    </div>
            </div>


          

            <div class="control-group">
                <label class="control-label">গবেষণার বিষয়বস্তু</label>
                    <div class="controls">
                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="গবেষণার বিষয়বস্তু" placeholder="গবেষণার বিষয়বস্তু" value="<?=$research_name?>" name="research_name" id="research_name" required>
                    </div>
            </div>
             <div class="control-group">
                <label class="control-label">গবেষণা বিস্তারিত</label>
                    <div class="controls">
                       <textarea name="research_details" id="research_details" class="span6 ckeditor tooltips" rows=""  data-trigger="hover" data-original-title="গবেষণা বিস্তারিত" placeholder="গবেষণা বিস্তারিত" ><?=$details?></textarea>
                       
                    </div>
            </div>
           
            <div class="control-group">
                <label class="control-label">মিডিয়া ফাইল</label>
                
                <div class="controls">
                 Previuos File : <a target="_blank" href="Action/research/<?=$research_media?>">File Link (<?=$research_media?>)</a>
                 <br>
                    <input type="file" name="files[]" class="default" value="">
                <span style="font-size: 10px">
                [FILE SUPPORTS-
                JPG,DOC,PDF,JPEG,ZIP]
                </span>
                </div>
            </div>
            <div class="control-group">
                    <label class="control-label">পাবলিশ তারিখ</label>
                    <div class="controls">
                        <input type="text" id="datepicker" name="publish_date" readonly="false" value="<?=$publish_date?>">

                    </div>
            </div>

				<div class="control-group">
					<div class="controls">
						<button class="btn btn-primary" type="submit" name="update_research">Submit
                        </button>
					</div>
				</div>
		   </form>

                   
                    <?php 
                    } 
                } ?> 
            
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
 function get_scientist_details(){
    var employee_details_id= $("#employee_details_id").val();
    console.log(employee_details_id);
    $.ajax({
        url : 'get_scientist_details.php',
        type : 'POST',
        dataType : 'json',
        data : {employee_details_id: employee_details_id},
        success: function(result)
        {   
            console.log(result);
            $('#scientist_name').val(result[0]);
            $('#scientist_department').val(result[1]);
            $('#scientist_designation').val(result[2]);
            $('#scientist_grade').val(result[3]);
        } 
    })
    }
</script>