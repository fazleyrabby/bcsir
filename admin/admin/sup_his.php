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
    <?php
    if (isset($_GET['success'])) {
		 // echo" <div class='widget orange'><div class='widget-body'>";
       if ($_GET['success'] == 'userexists') { // ?>
           <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                                <button data-dismiss="alert" class="close">×</button>
                                <h4 class="alert-heading">Warning!</h4>Username Already Exist..!
                            </div>
        <?php 
		}
           
            elseif ($_GET['success'] == 'success') { // ?>
            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Success!</h4> Replied Success Done...!
                            </div>
        <?php 
		}   
             elseif ($_GET['success'] == 'sucessmailfailed') { // ?>
           <div class="alert alert-info">
                                <button data-dismiss="alert" class="close">×</button>
                                 <h4 class="alert-heading">Success!</h4> You Registration Successfully Done.But Mail Server problem.!
                            </div>
        <?php 
		}   
               
        
    }
	echo" </div>
                    </div>";
    ?>

                <div class="widget red">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> 
                        <?php
						if($level==1)
						  {
							echo "All Support History";  
							  
							  }
						else
						{
							echo "All Support History By $usernamee";
							}
						?>
                        </h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                    </div>
                    <div class="widget-body">

                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                            <tr>
                                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>

                               <th>User ID</th>
                                 <th>Catagory</th>
                                 <th>Subject</th>
                                <th>Message</th>
                                <th>Reply</th>
                       <th>Date</th>
                       <th>Status</th>
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
$ser="select id,user_name,category,subject,message,replay,support_status,support_date
from user_support";
							}
							else
							{
								
$ser="select id,user_name,category,subject,message,replay,support_status,support_date
from user_support where user_name='$usernamee'";	
								}
							$se=mysqli_query($conn,$ser);	
							if($se==true)
							    {
								  while($sdata=mysqli_fetch_array($se))
								      {
					
					$sid=$sdata['0'];
					$suser=$sdata['1'];
					$scatagory=$sdata['2'];
					$ssubject=$sdata['3'];
					$smessge=$sdata['4'];
					$sreply=$sdata['5'];
					$sstatus=$sdata['6'];
					if($sstatus==0)
					   {
						   $r="<span style='color:red;font-size:14px;font-family:verdana;'>Pedning</span>";
						   $a="<a href='manage_support.php?sup_id=$sid&reply=reply'>Reply Now</a>";
						   }
					 else
					 {
						 $r="<span style='color:green;font-size:14px;font-family:verdana;'>Solved</span>";
						 $a="Already Replied";
						 }  
					$s_date=$sdata['7'];
				
	

				

					 
									
                           echo"<tr class='odd gradeX'>
                                <td><input type='checkbox' class='checkboxes' value='1' /></td>";

                                echo"
								<td>$suser</td>
								<td>$scatagory</td>
								<td>$ssubject</td>
								<td>$smessge</td>
								  <td>$sreply</td>
								  <td>$s_date</td>
								 <td>$r</td>
								";
if($level==1)
   {
	   echo "<td>$a</td>";
	   }
                            echo"</tr>";				
									
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