<?php
require_once("../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
$objBook = new \App\book\book();
$objBook->setData($_GET);
$singleData = $objBook->viewBookCategory(); 
$pageHeading ='Book Category';
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    <?php echo $pageHeading?> Form
                </div>
            </div>
            <div class="panel-body">
                <form action="update.php" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
                    <input name="id" value ="<?php echo $singleData->id?>" type="hidden" />
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Category Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" value="<?php echo $singleData->name?>" data-validate="required" data-message-required="Value Required"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Sub Category Code</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="catCode" value="<?php echo $singleData->code?>" data-validate="required" data-message-required="Value Required"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" name="updateBookCategory" class="btn btn-info">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>