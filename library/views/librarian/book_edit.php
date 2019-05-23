<?php
require_once("../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
$objAuthor = new \App\author\author();
$allDataAuthor = $objAuthor->index();
$objPublisher = new \App\publisher\publisher();
$allDataPublisher = $objPublisher->index();
$objDesk = new \App\desk\desk();
$allDataDesk = $objDesk->index();
$objClass = new \App\cls\cls();
$allClassData = $objClass->index();
$objBook = new \App\book\book();
$objBook->setData($_GET);
$allDataBookCategory = $objBook->indexBookCategory();
$singleData = $objBook->view();
$pageHeading ='বই';
?>
<script src="../../resources/assets/js/neon-custom-ajax.js"></script>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    <?php echo $pageHeading?>       	</div>
            </div>
            <div class="panel-body">
                <form action="update.php" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
                    <input class=" form-control" id="id" name="id"  value ="<?php echo $singleData->id?>" required="required" type="hidden" />
                    <div class="form-group">
                        <label class="col-sm-3 control-label">বইয়ের নাম</label>
                        <div class="col-sm-6">
                               <input type="text" class="form-control" name="name" data-validate="required" data-message-required="Value Required" value="<?php echo $singleData->name?>" autofocus="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">লেখক</label>
                        <div class="col-sm-6">
                            <select name="authorId" class="form-control selectboxit" style="width:100%;">
                                <?php
                                foreach ($allDataAuthor as $record){
                                    if($record->id==$singleData->author_id) {
                                        echo "<option selected='selected' value='$record->id'>$record->name</option>";
                                    } else {
                                        echo "<option value='$record->id'>$record->name</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">প্রকাশক</label>
                        <div class="col-sm-6">
                            <select name="publisherId" class="form-control selectboxit" style="width:100%;">
                                <?php
                                foreach ($allDataPublisher as $record){
                                    if($record->id==$singleData->publisher_id) {
                                        echo "<option selected='selected' value='$record->id'>$record->name</option>";
                                    } else {
                                        echo "<option value='$record->id'>$record->name</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">বর্ননা</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" rows="3" cols="50" name="description"><?php echo $singleData->description?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">মুল্য</label>
                        <div class="col-sm-6">
                               <input type="text" class="form-control" name="price" value="<?php echo $singleData->price?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">তাকের নাম</label>
                        <div class="col-sm-6">
                            <select name="deskId" class="form-control selectboxit" style="width:100%;">
                                <?php
                                foreach ($allDataDesk as $record){
                                    if($record->id==$singleData->desk_id) {
                                        echo "<option selected='selected' value='$record->id'>$record->name</option>";
                                    } else {
                                        echo "<option value='$record->id'>$record->name</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">তাকের সারি</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" name="deskRow" value="<?php echo $singleData->desk_row?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">বইয়ের বিভাগ</label>
                        <div class="col-sm-6">
                            <select name="bcId" id="change_data" class="form-control selectboxit" style="width:100%;" data-validate="required" data-message-required="Value Required">
                                
                                <?php
                                foreach ($allDataBookCategory as $record){
                                    if($record->id==$singleData->bc_id) {
                                        echo "<option selected='selected' value='$record->id'>$record->name</option>";
                                    } else {
                                        echo "<option value='$record->id'>$record->name</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                   <!-- <div class="form-group" id="show_data" style="display:none;">
                        <div class="col-sm-6">
                            <select name="cId" class="form-control selectboxit" style="width:100%;">
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
                    </div>-->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">মোট কপি</label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control" name="newCopies" value="0" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" Name="updateBook" class="btn btn-info"> <?php echo $pageHeading?>সংযোজন করুন</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-----  SHOW OR HIDE CLASS DATA ---->
<script type="text/javascript">
    $(document).ready(function() {
        $("#change_data").change( function() {
            if( $(this).val()==="1"){
     			$("#show_data").show();
                //alert($("#start").val()); 
    		} else {
    			$("#show_data").hide();
    		}
        });
    });
</script>