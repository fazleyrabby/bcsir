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
                     Dashboard
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">Bitstump</a>
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
<?php
    if (isset($_GET['success'])) {
		 // echo" <div class='widget orange'><div class='widget-body'>";
       if ($_GET['success'] == 'make_inactive') { // ?>
           <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                <strong>Success !</strong>User Inactivate Successfully Done..!
                            </div>
        <?php 
		}
           
            elseif ($_GET['success'] == 'active') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                               <strong>Success !</strong>User Activate Successfully Done..!
                            </div>
        <?php 
		}   
             elseif ($_GET['success'] == 'success_pass_update') { // ?>
           <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <strong>Success!</strong> Password Changed Successfully !
                            </div>
        <?php 
		}   
             elseif ($_GET['success'] == 'success_pass_fail') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <strong>Soory !</strong> Password Failed to Changed !
                            </div>
        <?php 
		}   
            elseif ($_GET['success'] == 'success_tpass_update') { // ?>
           <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <strong>Success!</strong>Transaction  Password Changed Successfully !
                            </div>
        <?php 
		}   
             elseif ($_GET['success'] == 'success_tpass_fail') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <strong>Soory !</strong>Transaction Password Failed to Changed !
                            </div>
        <?php 
		}
		             elseif ($_GET['success'] == 'picture_select') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <strong>Soory !</strong>Please Select a Piture !
                            </div>
        <?php 
		}
		             elseif ($_GET['success'] == 'picture_large') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <strong>Soory !</strong>Please Select a Piture Size in 512 KB !
                            </div>
        <?php 
		} 
		             elseif ($_GET['success'] == 'picture_invalid') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <strong>Soory !</strong>Please Select a Valid Picture Format jpeg,PNG,png,JPEG !
                            </div>
        <?php 
		} 
            elseif ($_GET['success'] == 'picture_success') { // ?>
           <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <strong>Success!</strong>Profile Picture সফলভাবে সংশোধন সম্পন্ন ! !
                            </div>
        <?php 
		}               
		             elseif ($_GET['success'] == 'submit_failed') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <strong>Please !</strong>Submit a Button !
                            </div>
        <?php 
		} 
    }
	echo" </div>
                    </div>";
    ?>
 
                <div class="widget red">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Token List</h4>

                    </div>
                    <div class="widget-body">
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                            <tr>
                                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                <th>BTC Key</th>
                                
                                <th>Ether Key</th>
                                <th>Upload Date</th>

                                 <th class="hidden-phone">BTC Used St</th>
                                  <th class="hidden-phone">ETH Used St</th>
                                  <th class="hidden-phone">BTC Used Date</th>
                                   <th class="hidden-phone">ETH Used Date</th>
                            </tr>
                               </thead>
                               <tbody>
                               	<?php
$tklist="select token_id,btc_key,eth_key,btc_key_st,eth_key_st,btc_used_date,eth_used_date,upload_date from btc_eth";
$tklistp=mysqli_query($conn,$tklist);
if($tklistp==true)
	 {
	 	while($tkd=mysqli_fetch_array($tklistp))
	 	{

$tkid=$tkd['0'];
$btc_key=$tkd['1'];
$eth_key=$tkd['2'];
$btc_k_st=$tkd['3'];
$eth_k_st=$tkd['4'];
if($btc_k_st==0)
{
	$bt="Unused";
}
elseif($btc_k_st==1)
{
$bt="Send To Mail";
}
elseif($btc_k_st==2)
{
$bt="Used";
}

if($eth_k_st==0)
{
	$ebt="Unused";
}
elseif($eth_k_st==1)
{
$ebt="Send To Mail";
}
elseif($eth_k_st==2)
{
$ebt="Used";
}
$btc_us_date=$tkd['5'];
$eth_us_date=$tkd['6'];
$up_date=$tkd['7'];
                       echo"<tr>
                                <td style='width:8px'><input type='checkbox' class='group-checkable' data-set='#sample_1 .checkboxes' /></td>
                                <td>$btc_key</td>
                                
                                <td>$eth_key</td>
                                <td>$up_date</td>

                                <td>$bt</td>
                                
                                <td>$ebt</td>
                                <td>$btc_us_date</td>
                                <td>$eth_us_date</td>
                            </tr>";

	 	}
	 }

                               	?>

                         
                            
                            


                            
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>


            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
         </div