<?php
require_once("../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
$objClass = new \App\cls\cls();
$allClassData = $objClass->index();
$objBook = new \App\book\book();
$objBook->setData($_GET);
$singleData = $objBook->view();
$pageHeading ='Book';
?>
<script src="../../resources/assets/js/neon-custom-ajax.js"></script>
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
                    <input class=" form-control" id="id" name="id"  value ="<?php echo $singleData->id?>" required="required" type="hidden" />
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Book Name</label>
                        <div class="col-sm-6">
                               <input type="text" class="form-control" name="name" data-validate="required" data-message-required="Value Required" value="<?php echo $singleData->name?>" autofocus="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Author</label>
                        <div class="col-sm-6">
                               <input type="text" class="form-control" name="author" value="<?php echo $singleData->author?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" rows="3" cols="50" name="description"><?php echo $singleData->description?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Price</label>
                        <div class="col-sm-6">
                               <input type="text" class="form-control" name="price" value="<?php echo $singleData->price?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Class</label>
                        <div class="col-sm-6">
                            <select name="cId" class="form-control selectboxit" style="width:100%;">
                                <option value="" style="display: none">Select a Class</option>
                                <?php
                                foreach ($allClassData as $record){
                                    if($record->c_id==$singleData->c_id) {
                                        echo "<option selected='selected' value='$record->c_id'>$record->c_name</option>";
                                    } else {
                                        echo "<option value='$record->c_id'>$record->c_name</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" Name="storeInfo" class="btn btn-info">Update <?php echo $pageHeading?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>