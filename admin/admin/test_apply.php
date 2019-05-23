      <script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","get_test.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
	  <style type="text/css">
/* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

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
	
	tr { border: 1px solid #ccc; }
	
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
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                                      <?php
				   if($level==1)
				   {
				   ?>
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
                   <?php
				   }
				   ?>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     Dashboard
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                         <a href="#">BCSIR</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           Dashboard
                       </li>
                       
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            
            

            
                        <div class="row-fluid">
                <div class="span12">
                                    <!-- BEGIN ALERTS PORTLET-->

    <?php
    if (isset($_GET['success'])) {
		 // echo" <div class='widget orange'><div class='widget-body'>";
       if ($_GET['success'] == 'submit') { // ?>
           <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                                <button data-dismiss="alert" class="close">×</button>
                                <h4 class="alert-heading">Warning!</h4>Please submit the Button..!
                            </div>
        <?php 
		}
           
            elseif ($_GET['success'] == 'admin_transfer_success') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Success!</h4>Test Added by Admin Successfully Done....!
                            </div>
        <?php 
		}  
            elseif ($_GET['success'] == 'psuccess') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Success!</h4>Payment Given Successfully Done....!
                            </div>
        <?php 
		} 
            elseif ($_GET['success'] == 'pasuccess') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Success!</h4>Payment Received Successfully Done....!
                            </div>
        <?php 
		} 		
            elseif ($_GET['success'] == 'rpasuccess') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Success!</h4>Result Published Successfully Done....!
                            </div>
        <?php 
		} 	



 		         


		
    }
	echo" </div>
                    </div>";
    ?>             
<?php

if(isset($_GET['apply']))
{
	$apply=$_GET['apply'];
	
	if($apply=="apply")
	{
?>	

                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> নমুনা টেস্ট এর জন্য  আবেদন করুণ </h4>

                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->

                            <form action="Action/withdraw_action.php" class="form-horizontal" method="post">
                            
                            
                            
                    <?php
						echo "<input type='hidden' name='userid' value='$id'>";
						echo "<input type='hidden' name='username' value='$usernamee'>";
						echo "<input type='hidden' name='level' value='$level'>";
						echo "<input type='hidden' name='curent_balance' value='$gwallet'>";
					    echo "<input type='hidden' name='tpassm' value='$tpassm'>";
						  echo "<input type='hidden' name='pack_type' value='$package_id'>";
?>
     
                            
    <div class="control-group">
                                <label class="control-label">টেস্ট নাম পছন্দ  করেন</label>
                                <div class="controls">
                                <select name="test_id" onchange="showUser(this.value)" placeholder="Type Title" class="span6  popovers" data-trigger="hover" data-content="Type Title"   data-original-title="Type Title">
                                              <?php
									$test="select lab_test_id,lab_test_title,lab_test_price from bcsir_lab_test";
                                    $testp=mysqli_query($conn,$test);
                                    while($testd=mysqli_fetch_array($testp))
									{
									$testid=$testd['0'];
									$lab_test_title=$testd['1'];
									$lab_test_price=$testd['2'];
echo "<option value='$testid'>$lab_test_title</option>";									
									}										
											  
											  ?>
                                                

                                </select>
                                   
                                </div>
                                       
                            </div>
							  <div class="control-group">
							   <div class="controls">
							<div id="txtHint"><b></b></div></div>
							</div>


                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
					
					<?php
	}
	
	elseif($apply=="applylist")
	{
	?>
	                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Applicant List</h4>

                        </div>
                        <div class="widget-body">

                                          <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                            <tr>
                                
                               <th>Test Title</th>
							    <th>Description</th>
                                 <th>Price</th>
                                 <th>Transaction ID</th>
                                <th>Payment Status</th>
                                <th>Reply</th>
                       <th>Date</th>
					  
                      
                       <?php
					   if($level==1)
					   {
					 echo "<th>Action</th>";
					   }
					   ?>


                            </tr>
                               </thead>
                               <tbody>
							   <?php
							   if($level==1)
							   {
							 $dt="select test_id,price,bkash_trn,trn_username,trn_userid,trn_date,result,result_by,trn_st,
						 pdescription,bcsir_lab_test.lab_test_title
from bcisr_test_paymnet inner join bcsir_lab_test on bcsir_lab_test.lab_test_id=bcisr_test_paymnet.test_id";  
							   }
							   else
							   {
						 $dt="select test_id,price,bkash_trn,trn_username,trn_userid,trn_date,result,result_by,trn_st,
						 pdescription,bcsir_lab_test.lab_test_title
from bcisr_test_paymnet inner join bcsir_lab_test on bcsir_lab_test.lab_test_id=bcisr_test_paymnet.test_id where trn_userid=$id";	   
							   }
							   $dtp=mysqli_query($conn,$dt);
							   if($dtp==true)
							   {
							   while($d=mysqli_fetch_array($dtp))
							   {
								   $testid=$d['0'];
								   $price=$d['1'];
								   $bkash_trn=$d['2'];
								   $trn_username=$d['3'];
								   $trn_userid=$d['4'];
								   $trn_date=$d['5'];
								   $result=$d['6'];
								   $result_by=$d['7'];
								   $trn_st=$d['8'];
								   $pdescription=$d['9'];
								   $lab_test_title=$d['10'];
								   if($trn_st==0)
								   {
									   $t="<a href='apply_for_test.php?apply=prcv&test_id=$testid'>Not Received</a>";
								   }
								   else
								   {
									   $t="Received";
								   }
								   if($result_by==0)
								   {
									$tr="<a href='apply_for_test.php?apply=reply&test_id=$testid'>Reply</a>";   
								   }
								   else
								   {
									   $tr="Already Replied";
								   }
						echo "<tr>
						    <td>$lab_test_title</td>
							<td>$pdescription</td>
						 <td>$price</td>
						 <td>$bkash_trn</td>
						 <td>$t</td>
						  <td>$result</td>
						  <td>$trn_date</td>
						<td>$tr</td>
						  </tr>";		   
								   
							   }
							   }
							   else
							   {
								   echo "errror";
							   }
							   
							   ?>
							   </tbody>
							   </table>
                        </div>
                    </div>
<?php	
	}
	elseif($apply=="prcv")
	{
	$test_id=$_GET['test_id'];	
	$u="update bcisr_test_paymnet set trn_st=1 where test_id=$test_id";
	$up=mysqli_query($conn,$u);
	if($up==true)
	  {
 echo"<script> location.replace('apply_for_test.php?apply=applylist&success=pasuccess'); </script>"; 	  
	  }
	}
	elseif($apply=="reply")
	{
			$test_id=$_GET['test_id'];	
?>

                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> নমুনা টেস্ট এর ফলাফল  </h4>

                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->

                            <form action="Action/withdraw_action.php" class="form-horizontal" method="post">
                            
                            
                            
                    <?php
					echo "<input type='hidden' name='test_id' value='$test_id'>";
						echo "<input type='hidden' name='userid' value='$id'>";
						echo "<input type='hidden' name='username' value='$usernamee'>";
						echo "<input type='hidden' name='level' value='$level'>";
						echo "<input type='hidden' name='curent_balance' value='$gwallet'>";
					    echo "<input type='hidden' name='tpassm' value='$tpassm'>";
						  echo "<input type='hidden' name='pack_type' value='$package_id'>";
?>
     
                            
                        <div class="control-group">
                                <label class="control-label">ফলাফল    </label>
                                <div class="controls">
								
                                    <input type="text" placeholder="ফলাফল   " class="span6  popovers" data-trigger="hover" data-content="ফলাফল   "  name="result" data-original-title="ফলাফল " required />
                                </div>
                            </div> 
                              <div class="form-actions">
                                <button type="submit" name="rslt" class="btn btn-success btn_success_custom">ফলাফল</button>
                                <button type="button" class="btn">Cancel</button>
                            </div>

                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
					
<?php
	}
}
					?>
                    <!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>


            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
         </div>