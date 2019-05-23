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
                    <?php 
                        if (isset($_GET['add_admin'])) {
                            $add_admin = $_GET['add_admin'];
                            if ($add_admin == 'add_admin') {
                                echo "এডমিন যোগ করুন";
                            }
                            else {
                                echo "এডমিন আপডেট";
                            }
                           
                        }
                    ?>
                  
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
		            <h4 class="alert-heading">ত্রুটি ঘটেছে!</h4>
		           </div>
		        <?php 
        } 
         if ($_GET['success'] == 'password_not_match') { // ?>
		           <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
		            <h4 class="alert-heading">পাসওয়ার্ড মিলেনি !</h4>
		           </div>
		        <?php 
        } 
        if ($_GET['success'] == 'pre_pass_not_found') { // ?>
		           <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
		            <h4 class="alert-heading">পূর্বের পাসওয়ার্ড মিলেনি !</h4>
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
                <h4 class="alert-heading">নাম বা সিরিয়াল ইতিমধ্যে বিদ্যমান!</h4>
               </div>
            <?php 
        }
        if ($_GET['success'] == 'update_success') { // ?>
               <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                <h4 class="alert-heading">সফলভাবে সংশোধন সম্পন্ন!</h4>
               </div>
            <?php 
        }
        if ($_GET['success'] == 'notmatch') { // ?>
               <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                <h4 class="alert-heading">পূর্বের পাসওয়র্ড মিলেনি!</h4>
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

        <?php if (isset($_GET['add_admin'])) { 
            $add_admin = $_GET['add_admin'];
            if ($add_admin == 'add_admin') { ?>
            <form action="Action/admin_add.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
            <div class="control-group">
            <div id="alert"></div>
                <label class="control-label">এডমিন এর নাম</label>
                    <div class="controls">
                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="" placeholder="এডমিন এর নাম" name="admin_name" required >
                    </div>
            </div>
            <input type="hidden" name="id" value="<?=$id?>">
            <div class="control-group">
                <label class="control-label">নতুন পাসওয়ার্ড</label>
                    <div class="controls">
                        <input type="password" class="span6 tooltips" data-trigger="hover" data-original-title="" placeholder="" name="password" id="password" required >
                    </div>
            </div><div class="control-group">
                <label class="control-label">পুনরায় পাসওয়ার্ড</label>
                    <div class="controls">
                        <input type="password" class="span6 tooltips" data-trigger="hover" data-original-title="" placeholder="" name="re_pass" id="re_password" onkeyup="pass_check()" required value="">
                    </div>
            </div>

            
			<div class="control-group">
                <label class="control-label"></label>
                    <div class="controls">
                        <button class="btn btn-primary" type="submit" name="submit" required  id="submit">সাবমিট</button>
                    </div>
            </div>
		   </form>
           
            <?php }
            elseif($add_admin == 'edit_admin'){ 
                if ($_GET['edit']== 'name') { ?>
                   <form action="Action/admin_add.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
            <?php 
            if (isset($_GET['id'])) {
              $id = $_GET['id'];
              $res = mysqli_query($conn,"SELECT * from ratul_login where id='$id'");
              if ($res == true) {
                  while ($data = mysqli_fetch_array($res)) {
                  $name = $data["username"];
            ?>
            <div class="control-group">
            <div id="alert"></div>
                <label class="control-label">এডমিন এর নাম</label>
                    <div class="controls">
                        <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="" placeholder="এডমিন এর নাম" value="<?=$name?>" name="admin_name" required >
                    </div>
            </div>
            <input type="hidden" name="id" value="<?=$id?>">
            
			<div class="control-group">
                <label class="control-label"></label>
                    <div class="controls">
                        <button class="btn btn-primary" type="submit" name="update_name"  id="submit">সাবমিট</button>
                    </div>
            </div>
            <?php } } } ?>
		   </form>
                <?php }
                if($_GET['edit']== 'password') {?>
                    <form action="Action/admin_add.php" method="POST" class="form-horizontal" enctype=multipart/form-data>
                    <?php 
                    if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $res = mysqli_query($conn,"SELECT * from ratul_login where id='$id'");
                    if ($res == true) {
                        while ($data = mysqli_fetch_array($res)) {
                        $name = $data["username"];
                    ?>
                    <div class="control-group">
                    <div id="alert"></div>
                        <label class="control-label">এডমিন এর নাম</label>
                            <div class="controls">
                                <input type="text" class="span6 tooltips" data-trigger="hover" data-original-title="" placeholder="এডমিন এর নাম" value="<?=$name?>" name="admin_name" required disabled>
                            </div>
                    </div>
                    <input type="hidden" name="id" value="<?=$id?>">
                    <div class="control-group">
                        <label class="control-label">পূর্বের পাসওয়র্ড </label>
                            <div class="controls">
                                <input type="password" class="span6 tooltips" data-trigger="hover" data-original-title="" placeholder="" name="old_password" id="old_password" required >
                            </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">পাসওয়ার্ড</label>
                            <div class="controls">
                                <input type="password" class="span6 tooltips" data-trigger="hover" data-original-title="" placeholder="" name="password" id="password" required >
                            </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">পুনরায় পাসওয়ার্ড</label>
                            <div class="controls">
                                <input type="password" class="span6 tooltips" data-trigger="hover" data-original-title="" placeholder="" name="re_pass" id="re_password" onkeyup="pass_check()" required value="">
                            </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label"></label>
                            <div class="controls">
                                <button class="btn btn-primary" type="submit" name="update_password"  id="submit">সাবমিট</button>
                            </div>
                    </div>
                    <?php } } } ?>
                </form>
               <?php }
                ?>
            
            <?php }
        }
            ?>
            <hr>
     
            <br>
            <h4>এডমিন তালিকা</h4>
             <table class="table table-striped table-bordered" style="table-layout:fixed;" id="sample_1">
                <thead>
                <tr>
                <th style="width:8px;">
                <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"/></th>
                <th style="width:70px">আইডি</th>
                <th style="width:100px">এডমিন নাম</th>
                <!-- <th>ইমেইল</th> -->
                <th>St</th>
                <th style="width:300px">স্ট্যাটাস</th>
                <th>আপডেট </th>
               </thead>
               <tbody>
                <?php  
                   
                 $list_notice=mysqli_query($conn,"SELECT id,username,email,active_status from ratul_login WHERE user_level=7");	
                 $i = 0;
                 if($list_notice==true)
                 {
              		while($data=mysqli_fetch_array($list_notice))
              		  { $i++;
              		    $id=$data['0'];
                        $username=$data['1'];
                        $email=$data['2'];
                        $status=$data['3'];
                    {
                      if ($status==0) {
                        $st = "<span style='color:red;font-weight:700'>Not Active</span>";
                      }
                      else {
                        $st = "<span style='color:#74B749;font-weight:700'>Active</span>";
                      }
                    }
//   <td> $email </td>
              			echo "<tr>
              			<td><input type='checkbox' class='checkboxes' value='1' /></td>
      								<td> $i </td>
                                      <td> $username </td>
                                      <td>$st</td>
      								
                                      <td><a href='admin_add.php?add_admin=edit_admin&&edit=name&id=$id'><span style='width:120px;text-align:center' class='btn btn-success btn_success_custom'>সংশোধন নাম </span></a>
                                      <a href='admin_add.php?add_admin=edit_admin&&edit=password&id=$id'><span style='width:120px;text-align:center' class='btn btn-success btn_success_custom'>সংশোধন পাসওয়ার্ড</span></a>
                      </td> 
                      <td><a href='Action/admin_add.php?id=$id&admin_st=$status&&status=status'>
                     <span class='btn btn-primary'>অবস্থা পরিবর্তন</span>
                     </a>
                      <a href='Action/admin_add.php?id=$id&delete=delete'>
                      <span style='width:70px;text-align:center' class='btn btn-danger'>মুছে ফেলুন</span>
                      </a>
					                </td>";
							echo "</tr>";
              		   }}?>
               </tbody>
           </table>
            
           

                  
            
           




		

		</div>
		</div>
		</div>
		</div>


</div>







<?php include 'footer.php';?>


<script>    
    function pass_check(){
    $('#alert').html("");
     var password = $('#password').val();
     var re_password = $('#re_password').val();
     if (password != re_password) {
         $('#alert').html("<div class='alert alert-danger'>পাসওয়ার্ড মিলেনি!</div>");
         $('#submit').attr("disabled",true);
     }
     else{
         $('#alert').html("<div class='alert alert-success'>পাসওয়ার্ড মিলেছে!</div>");
         $('#submit').attr("disabled",false);
     }
     
    }
</script>