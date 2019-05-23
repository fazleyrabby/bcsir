<?php
require_once("../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
$objAuthor = new \App\author\author();
$objAuthor->setData($_GET);
$singleData = $objAuthor->view();
$pageHeading ='Author';
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    <?php echo $pageHeading?> Form            	</div>
            </div>
            <div class="panel-body">
                <form action="update.php" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
                    <input name="id" value ="<?php echo $singleData->id?>" type="hidden" />
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Author Name</label>
                        <div class="col-sm-5">
                               <input type="text" class="form-control" name="name" data-validate="required" data-message-required="Value Required" value="<?php echo $singleData->name?>" autofocus="">
                        </div>
                    </div>
                    <div class="form-group">
                                <label class="col-sm-3 control-label">Author Code</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="author_code" name="author_code" data-validate="required" data-message-required="Value Required"/>
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