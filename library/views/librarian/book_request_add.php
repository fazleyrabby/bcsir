<?php
require_once("../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
$objBook = new \App\book\book();
$allBookData = $objBook->index();
$objUser = new \App\User\User();
$allDataUser = $objUser->viewAllUsers();
$pageHeading ='Book';
?>
<script src="../../resources/assets/js/neon-custom-ajax.js"></script>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Manage <?php echo $pageHeading?>
                </div>
            </div>
            <div class="panel-body">
                    <form action="store.php" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">অনুরোধকারী</label>
                        <div class="col-sm-6">
                            <select name="requestedBy" class="form-control selectboxit" data-placeholder="Select a Requested ID" tabindex="-1" required>
                                <?php
                                foreach ($allDataUser as $record){
                                    if($record->user_id!='developer' && $record->user_id!='superadmin' && $record->user_id!='accountant' && $record->user_id!='librarian') {
                                        echo "<option value='$record->user_id'>$record->user_id ($record->name)</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">বই</label>
                        <div class="col-sm-6">
                            <select name="bookId" class="form-control selectboxit" data-placeholder="Select a Book" tabindex="-1" required>
                                <?php
                                foreach ($allBookData as $record){
                                    echo "<option value='$record->id'>$record->name($record->desk_name Row-$record->desk_row)</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">নেওয়ার তারিখ</label>
                        <div class="col-sm-6">
                            <input type="text" class="datepicker form-control" name="issueStartDate" data-validate="required" placeholder="yyyy-mm-dd" data-message-required="Value Required" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">ফেরত দেওয়ার তারিখ</label>
                        <div class="col-sm-6">
                            <input type="text" class="datepicker form-control" name="issueEndDate" data-validate="required" placeholder="yyyy-mm-dd" data-message-required="Value Required" value="">
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