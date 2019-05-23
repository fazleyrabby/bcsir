<?php
require_once("../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
$objInstitution = new \App\institution\institution();
$objInstitution->setData($_GET);
$singleData = $objInstitution->view();
$pageHeading ='Institution';
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Edit <?php echo $pageHeading?> Form            	</div>
            </div>
            <div class="panel-body">

                <form action="update.php" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
                    <input class=" form-control" id="id" name="id"  value ="<?php echo $singleData->id?>" required="required" type="hidden" />

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Short Name</label>
                        <div class="col-sm-8">
                               <input type="text" class="form-control" name="insShortName" data-validate="required" data-message-required="Value Required" value="<?php echo $singleData->ins_short_name?>" readonly="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Full Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="insFullName" data-validate="required" data-message-required="Value Required" value="<?php echo $singleData->ins_full_name?>" autofocus="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="insAddress" data-validate="required" data-message-required="Value Required" value="<?php echo $singleData->ins_address?>" autofocus="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Mobile</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="insMobile" data-validate="required" data-message-required="Value Required" value="<?php echo $singleData->ins_mobile?>" autofocus="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="insEmail" data-validate="required" data-message-required="Value Required" value="<?php echo $singleData->ins_email?>" autofocus="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Web</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="insWeb" data-validate="required" data-message-required="Value Required" value="<?php echo $singleData->ins_web?>" autofocus="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Board No</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="boardNo" data-validate="required" data-message-required="Value Required" value="<?php echo $singleData->board_no?>" autofocus="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" Name="storeInfo" class="btn btn-info">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>