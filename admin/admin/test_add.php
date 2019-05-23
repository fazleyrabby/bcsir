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
                     ড্যাশবোর্ড 
                   </h3>
                   <!-- <ul class="breadcrumb">
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
                       
                   </ul> -->
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
                                 <h4 class="alert-heading">Success!</h4>টেস্ট অ্যাড  হয়েছে সফল ভাবে ....!
                            </div>
        <?php 
		}   




 		         


		
    }
	echo" </div>
                    </div>";
    ?>                    

                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i>  নতুন টেস্ট অ্যাড</h4>

                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->

                            <form action="Action/withdraw_action.php" class="form-horizontal" method="post">
                            
                            
                            
                    <?php
						echo "<input type='hidden' name='level' value='$level'>";
						echo "<input type='hidden' name='curent_balance' value='$gwallet'>";
					    echo "<input type='hidden' name='tpassm' value='$tpassm'>";
						  echo "<input type='hidden' name='pack_type' value='$package_id'>";
?>
     
                            
                          <div class="control-group">
                                <label class="control-label">টেস্ট নাম  </label>
                                <div class="controls">
                                    <input type="test" placeholder="টেস্ট নাম " class="span6  popovers" data-trigger="hover" data-content="টেস্ট নাম  "  name="test_name" data-original-title="Type Test Title" required />
                                </div>
                            </div> 
                          <div class="control-group">
                                <label class="control-label">টেস্ট মূল্য  </label>
                                <div class="controls">
                                    <input type="amount" placeholder="টেস্ট মূল্য " class="span6  popovers" data-trigger="hover" data-content="টেস্ট মূল্য  "  name="test_price" data-original-title="Type Test Price" required />
                                </div>
                            </div> 
                              <div class="form-actions">
                                <button type="submit" name="submit" class="btn btn-success btn_success_custom"> টেস্ট অ্যাড</button>
                                <button type="button" class="btn">Cancel</button>
                            </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>


            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
         </div