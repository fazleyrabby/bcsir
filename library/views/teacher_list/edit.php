<?php
require_once("../../vendor/autoload.php");
include "../institution/institution_info.php";
if(!isset($_SESSION)) session_start();
$objTeacherInfo = new \App\teacherInfo\teacherInfo();
$objTeacherInfo->setData($_GET);
$singleTeacherData = $objTeacherInfo->view();
$objDept = new \App\department\department();
$allDataDept = $objDept->index();

if($singleTeacherData->dob=='0000-00-00') $singleTeacherData->dob = ""; else $singleTeacherData->dob;
if($singleTeacherData->join_date=='0000-00-00') $singleTeacherData->join_date = ""; else $singleTeacherData->join_date;

$photo = "../../../uploads/$insPath/teacher_image/lg/$singleTeacherData->id.jpg";
if (!file_exists($photo)) {
    $photo = "../../../uploads/default.jpg";
}
?>
<script src="../../resources/assets/js/neon-custom-ajax.js"></script>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    তথ্য পরিবর্তন (<?php echo $insPath.$singleTeacherData->id?>)
                </div>
            </div>
            <div class="panel-body">
                <form action="update.php" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
                    <input class=" form-control" id="id" name="id"  value ="<?php echo $singleTeacherData->id?>" required="required" type="hidden" />
                    <input class=" form-control" id="yr" name="yr"  value ="<?php echo $_GET['yr']?>" required="required" type="hidden" />
                    <div class="form-group">
                        <label class="col-sm-3 control-label">ছবি</label>
                        <div class="col-sm-5">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                    <img src="<?php echo $photo?>" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">ছবি নির্বাচন করুন</span>
										<span class="fileinput-exists">পরিবর্তন</span>
										<input type="file" name="file" accept="image/*">
									</span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">পাঠকের নাম</label>
                        <div class="col-sm-7">
                               <input type="text" class="form-control" name="name" data-validate="required" data-message-required="Value Required" value="<?php echo $singleTeacherData->name?>" autofocus="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">রক্তের ধরন</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="bloodGroup" value="<?php echo $singleTeacherData->blood_group?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">পদবী</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="designation" value="<?php echo $singleTeacherData->designation?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">যোগ্যতা</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="qualification" value="<?php echo $singleTeacherData->qualification?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">শাখা</label>
                        <div class="col-sm-7">
                            <select name="deptId" class="form-control selectboxit">
                                <?php
                                foreach ($allDataDept as $record){
                                    if($record->id == $singleStudentData->dept_id) {
                                        echo "<option selected='selected' value='$record->id'>>$record->dept_name</option>" ;
                                    } else {
                                        echo "<option value='$record->id'>$record->dept_name</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">মাসিক বেতন</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="amount" value="<?php echo $singleTeacherData->amount?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">বাবার নাম</label>
                        <div class="col-sm-7">
                               <input type="text" class="form-control" name="fName" value="<?php echo $singleTeacherData->f_name?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">মায়ের নাম</label>
                        <div class="col-sm-7">
                               <input type="text" class="form-control" name="mName" value="<?php echo $singleTeacherData->m_name?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">লিঙ্গ</label>
                        <div class="col-sm-7">
                            <select name="gender" class="form-control selectboxit visible" style="display: none;">
                                <option <?php echo $singleTeacherData->gender=="M" ?"selected" : ""?> value="M">পুরুষ</option>
                                <option <?php echo $singleTeacherData->gender=="F" ?"selected" : ""?> value="F">মহিলা</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">ধর্ম</label>
                        <div class="col-sm-7">
                            <select name="religion" class="form-control selectboxit visible" style="display: none;">
                                <option <?php echo $singleTeacherData->religion=="I" ? "selected" : ""?> value="I">ইসলাম</option>
                                <option <?php echo $singleTeacherData->religion=="H" ? "selected" : ""?> value="H">হিন্দু</option>
                                <option <?php echo $singleTeacherData->religion=="B" ? "selected" : ""?> value="B">বৌদ্ধ</option>
                                <option <?php echo $singleTeacherData->religion=="C" ? "selected" : ""?> value="C">খ্রিস্টান</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">জাতীয়তা</label>
                        <div class="col-sm-7">
                               <input type="text" class="form-control" name="nationality" value="<?php echo $singleTeacherData->nationality?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">জাতীয় পরিচয়পত্র নং</label>
                        <div class="col-sm-7">
                               <input type="text" class="form-control" name="nid" value="<?php echo $singleTeacherData->nid?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">মোবাইল</label>
                        <div class="col-sm-7">
                               <input type="text" class="form-control" name="mobile" value="<?php echo $singleTeacherData->mobile?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">ইমেইল</label>
                        <div class="col-sm-7">
                               <input type="text" class="form-control" name="eMail" value="<?php echo $singleTeacherData->e_mail?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">যোগদানের তারিখ</label>
                        <div class="col-sm-7">
                               <input type="text" class="form-control datepicker" name="joinDate" value="<?php echo $singleTeacherData->join_date?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">জন্ম তারিখ</label>
                        <div class="col-sm-7">
                               <input type="text" class="form-control datepicker" name="dob" value="<?php echo $singleTeacherData->dob?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">বর্তমান গ্রাম</label>
                        <div class="col-sm-7">
                               <input type="text" class="form-control" name="prVill" value="<?php echo $singleTeacherData->pr_vill?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">বর্তমান পোষ্ট</label>
                        <div class="col-sm-7">
                               <input type="text" class="form-control" name="prPo" value="<?php echo $singleTeacherData->pr_po?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">বর্তমান থানা</label>
                        <div class="col-sm-7">
                               <input type="text" class="form-control" name="prPs" value="<?php echo $singleTeacherData->pr_ps?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">বর্তমান জেলা</label>
                        <div class="col-sm-7">
                               <input type="text" class="form-control" name="prDist" value="<?php echo $singleTeacherData->pr_dist?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">স্থায়ী গ্রাম</label>
                        <div class="col-sm-7">
                               <input type="text" class="form-control" name="pmVill" value="<?php echo $singleTeacherData->pm_vill?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">স্থায়ী পোষ্ট</label>
                        <div class="col-sm-7">
                               <input type="text" class="form-control" name="pmPo" value="<?php echo $singleTeacherData->pm_po?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">স্থায়ী থানা</label>
                        <div class="col-sm-7">
                               <input type="text" class="form-control" name="pmPs" value="<?php echo $singleTeacherData->pm_ps?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">স্থায়ী Dist</label>
                        <div class="col-sm-7">
                               <input type="text" class="form-control" name="pmDist" value="<?php echo $singleTeacherData->pm_dist?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">কার্ড নং</label>
                        <div class="col-sm-7">
                               <input type="text" class="form-control" name="cardNo" value="<?php echo $singleTeacherData->card_no?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-7">
                            <button type="submit" Name="storeInfo" class="btn btn-info">পরিবর্তন</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>