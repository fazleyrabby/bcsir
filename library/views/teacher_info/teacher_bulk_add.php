<?php
include '../index/header.php';
$objTeacherInfo = new \App\teacherInfo\teacherInfo();
$allDataTeacherInfo = $objTeacherInfo->index();
?>
<h3 style="">
    <i class="entypo-right-circled"></i>
    Add Bulk Teacher
</h3>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Teacher Bulk Add Form
                </div>
            </div>
            <div class="panel-body">

                <form action="store.php" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">File</label>
                        <div class="col-sm-5">
                            <input class=" form-control" id="file" name="file" required="required" type="file"  accept=".csv"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" name="submit" value ="submit" class="btn btn-info">Upload Teacher</button>
							<a href="teacher_info.csv" class="btn btn-success" type="reset"><i class="icon_download"></i> Download blank CSV file</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php include '../index/footer.php' ?>

