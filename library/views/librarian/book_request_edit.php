<?php
require_once("../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
$objBook = new \App\book\book();
$objBook->setData($_GET);
$singleData = $objBook->viewBookRequest();
$pageHeading ='বইয়ের অনুরোধ';
?>
<script src="../../resources/assets/js/neon-custom-ajax.js"></script>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    <?php echo $pageHeading?> গ্রহন
                </div>
            </div>
            <div class="panel-body">
                <form action="update.php" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
                    <input class=" form-control" name="brId"  value ="<?php echo $singleData->id?>" required="required" type="hidden" />
                    <input class=" form-control" name="bookId"  value ="<?php echo $singleData->book_id?>" required="required" type="hidden" />

                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">অবস্থা</label>
                        <div class="col-sm-6">
                            <select name="status" class="form-control" style="width:100%;">
                            <?php if($singleData->request_type==0) {
                                ?>
                                <option <?php echo $singleData->request_type=="0" ?"selected" : ""?> value="0">অপেক্ষমান</option>
                                <option <?php echo $singleData->request_type=="1" ?"selected" : ""?> value="1">অনুমতি দেওয়া হল</option>
                                <?php
                            }
                            ?>
                            <?php if($singleData->request_type==1) {
                                ?>
                                <option <?php echo $singleData->request_type=="1" ?"selected" : ""?> value="1">অনুমতি দেওয়া হল</option>
                                <option <?php echo $singleData->request_type=="2" ?"selected" : ""?> value="2">ফেরত  নেওয়া  হল</option>
                            <?php
                            }
                            ?>
                            <?php if($singleData->request_type==2) {
                                ?>
                                <option <?php echo $singleData->request_type=="2" ?"selected" : ""?> value="2">ফেরত  নেওয়া  হল</</option>
                                <?php
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" name="storeBookRequest" class="btn btn-info">সংরক্ষন</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>