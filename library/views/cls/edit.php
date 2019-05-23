<?php
require_once("../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
$objClass = new \App\cls\cls();
$objClass->setData($_GET);
$singleData = $objClass->view();
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Edit Class            	</div>
            </div>
            <div class="panel-body">

                <form action="update.php" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
                    <input class=" form-control" id="id" name="id"  value ="<?php echo $singleData->id?>" required="required" type="hidden" />

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Class Name</label>

                        <div class="col-sm-5">
                               <input type="text" class="form-control" name="cName" data-validate="required" data-message-required="Value Required" value="<?php echo $singleData->c_name?>" autofocus="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Class ID</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="cId" value="<?php echo $singleData->c_id?>">
                        </div>
                    </div>
                    <!--
                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Gpa Divide By</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="gpaDivide" data-validate="required" data-message-required="Value Required" value="<?php //echo $singleData->gpa_divide?>" autofocus="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Total Subject</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="tSubject" data-validate="required" data-message-required="Value Required" value="<?php //echo $singleData->total_subject?>" autofocus="">
                        </div>
                    </div>-->

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