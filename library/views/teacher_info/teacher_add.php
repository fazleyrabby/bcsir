<?php
include '../index/header.php';
$objDept = new \App\department\department();
$allDataDept = $objDept->index();
//just for showing pages
$pageHeading ='পাঠক';
?>
<h3 style="">
    <i class="entypo-right-circled"></i>
 <?php echo $pageHeading?> যুক্ত
</h3>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    <?php echo $pageHeading?> যুক্ত করুন
                </div>
            </div>
            <div class="panel-body">
                <form action="store.php" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
                    <!-- Divider -->
                    <div class="well well-sm">অফিসিয়াল তথ্য</div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">পাঠকের নাম</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="name" data-validate="required" data-message-required="Value Required" value="" autofocus="">
                        </div>
                        <label class="col-sm-2 control-label">রক্তের ধরন</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="bloodGroup" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">পদবী</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="designation" value="">
                        </div>
                        <label class="col-sm-2 control-label">যোগ্যতা</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="qualification" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">শাখা</label>
                        <div class="col-sm-4">
                            <select name="deptId" class="form-control selectboxit">
                                <?php
                                foreach ($allDataDept as $record){
                                    echo "<option value='$record->id'>$record->dept_name</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <!--<label class="col-sm-2 control-label">Monthly Salary</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="amount" value="0">
                        </div>-->
                    </div>
                    <!-- Divider -->
                    <br><div class="well well-sm">সাধারন তথ্য</div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">বাবার নাম</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="fName" value="">
                        </div>
                        <label class="col-sm-2 control-label">মায়ের নাম</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="mName" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><b>লিঙ্গ</b></label>
                        <div class="col-sm-4">
                            <select name="gender" class="form-control selectboxit">
                                <option value="M">পুরুষ</option>
                                <option value="F">মহিলা</option>
                            </select>
                        </div>
                        <label class="col-sm-2 control-label"><b>ধর্ম</b></label>
                        <div class="col-sm-4">
                            <select name="religion" class="form-control selectboxit">
                                <!--<option value="" style="display:none;">Select a Religion</option>-->
                                <option value="I">ইসলাম</option>
                                <option value="H">হিন্দু</option>
                                <option value="B">বৌদ্ধ</option>
                                <option value="C">খ্রিস্টান</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><b>জাতীয়তা</b></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="nationality" value="Bangladeshi">
                        </div>
                        <label class="col-sm-2 control-label">জাতীয় পরিচয়পত্র নং</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="nid" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">মোবাইল</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="mobile" value="">
                        </div>
                        <label class="col-sm-2 control-label"><b>ইমেইল</b></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="eMail" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">যোগদানের তারিখ</label>
                        <div class="col-sm-4">
                            <input type="text" name="joinDate" class="form-control datepicker" value="yyyy-mm-dd"/>
                        </div>
                        <label class="col-sm-2 control-label"><b>জন্ম তারিখ</b></label>
                        <div class="col-sm-4">
                            <input type="text" name="dob" class="form-control datepicker" value="yyyy-mm-dd"/>
                        </div>
                    </div>
                    <!-- Divider -->
                    <br><div class="well well-sm">বর্তমান ঠিকানা</div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><b>গ্রাম</b></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="prVill" value="">
                        </div>
                        <label class="col-sm-2 control-label"><b>পোষ্ট অফিস</b></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="prPo" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><b>থানা</b></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="prPs" value="">
                        </div>
                        <label class="col-sm-2 control-label"><b>জেলা</b></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="prDist" value="">
                        </div>
                    </div>
                    <!-- Divider -->
                    <br><div class="well well-sm">স্থায়ী ঠিকানা</div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><b>গ্রাম</b></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="pmVill" value="">
                        </div>
                        <label class="col-sm-2 control-label"><b>পোষ্ট অফিস</b></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="pmPo" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><b>থানা</b></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="pmPs" value="">
                        </div>
                        <label class="col-sm-2 control-label"><b>জেলা</b></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="pmDist" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="photo" class="col-sm-2 control-label">ছবি</label>
                        <div class="col-sm-4">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                    <img src="../../resources/assets/images/upload.png" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">ছবি নির্বাচন করুন</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" id="file" name="file" accept="image/*">
									</span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">বাদ দিন</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-4">
                            <button type="submit" name ="storeInfo" class="btn btn-info">Add <?php echo $pageHeading?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include '../index/footer.php' ?>