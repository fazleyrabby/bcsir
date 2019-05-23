<?php
require_once '../index/header.php';
// $objAllDataQuery = new \App\dataTableQuery\dataTableQuery();
// $resultPublishStatus = $objAllDataQuery->indexByQuerySingleData("SELECT * FROM `app_app_activation`");
//jsut for showing page
$pageHeading ='Active Application';
?>
    <h3 style=""><i class="entypo-right-circled"></i>Active Application</h3>
    <div class="row">
        <div class="col-md-12">

            <div class="tab-content">
                <!----TABLE LISTING STARTS-->
</br></br>
                <!----CREATION FORM STARTS---->
                <div class="tab-pane box active" id="add" style="padding: 5px">
                    <div class="box-content">
                        <form action="store.php" class="form-horizontal form-groups-bordered validate" target="_top" method="POST" accept-charset="utf-8">
                            <div class="padded">
                                 <div class="form-group">
                                    <label class="col-sm-3 control-label">Today </label>
                                    <div class="col-sm-5">
                                        <input type="text" name="startDate" class="form-control" value="<?php  echo date("Y-m-d");?>" readonly="">
                                    
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Expired Date</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="endDate" class="form-control datepicker" value="<?php echo $resultPublishStatus->publish_date?>" data-validate="required" data-message-required="Value Required">
                                    
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Paid Amount</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="amount" class="form-control" value="0" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Remarks</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" class="form-control" name="remarks"/>
                                    </div>
                                </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" name ="storeInfo" class="btn btn-info">Apply</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!----CREATION FORM ENDS-->
            </div>
        </div>
    </div>
    <!-- Footer -->
<?php include '../index/footer.php' ?>