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
                                <span class="color-red" data-style="red"></span>
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
                                    <!-- BEGIN ALERTS PORTLET-->

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
                                 <h4 class="alert-heading">Success!</h4> You Registration Successfully Done....!
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
                            

                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i>Upload Ether and BTC</h4>
                           
                        </div>
                        <div class="widget-body">

                            <form action="Action/upload_token.php" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="document_title" value="1">
                            <input type="hidden" name="uploader_id" value="<?php echo $id?>">
                                <div class="control-group">
                                    <label class="control-label">Upload (Excel Sheet )</label>
                                    <div class="controls">
                                        <input name="files[]" type="file" class="default">
                                    </div>
                                </div>  
<!--                             <div class="control-group">
                                <label class="control-label"> Dropdown Diselect</label>
                                <div class="controls">
                                    <select data-placeholder="Your Favorite Type of Bear" class="chzn-select-deselect span6" tabindex="-1" id="selCSI">
                                        <option value=""></option>
                                        <option>American Black Bear</option>
                                        <option>Asiatic Black Bear</option>
                                        <option>Brown Bear</option>
                                        <option>Giant Panda</option>
                                        <option selected="">Sloth Bear</option>
                                        <option>Sun Bear</option>
                                        <option>Polar Bear</option>
                                        <option>Spectacled Bear</option>
                                    </select>
                                </div>
                            </div> -->
                                                        <div class="form-actions">
                                <button type="submit" name="Submit" class="btn btn-success btn_success_custom">Submit</button>
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