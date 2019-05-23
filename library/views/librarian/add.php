<?php
require_once("../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
$pageHeading ='Librarian';
?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Add <?php echo $pageHeading?>
                </div>
            </div>
            <div class="panel-body">
                <form action="store.php" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" data-validate="required" data-message-required="Value Required"  autofocus value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="email" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender" class="col-sm-3 control-label">Gender</label>
                        <div class="col-sm-6">
                            <select name="gender" class="form-control">
                                <option value="" style="display:none">Select a gender</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mobile" class="col-sm-3 control-label">Mobile</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="mobile" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" rows="3" name="address"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="profession" class="col-sm-3 control-label">Profession</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="profession" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cardNo" class="col-sm-3 control-label">Card No</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="cardNo" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" name="storeInfo" class="btn btn-info">Add <?php echo $pageHeading?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>