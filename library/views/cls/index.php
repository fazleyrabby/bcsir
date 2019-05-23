<?php
include '../index/header.php';
$objClass = new \App\cls\cls();
$allData = $objClass->index();

$table = 'class';

//jsut for showing page
$pageHeading ='Class';
?>
<form id="selectionForm" action="../tdrp/trash_multiple.php?pageTable= <?php echo $table ?>" method="post">
    <h3 style=""><i class="entypo-right-circled"></i>Manage <?php echo $pageHeading?></h3>
    <input type="button" class="btn btn-danger btn-sm tooltips pull-right" data-original-title="Permanent Multiple Delete" data-placement="bottom"" id="deleteMultipleButton" value="Delete Multiple">
    <input type="button" class="btn btn-warning btn-sm tooltips pull-right" data-original-title="Temporary Multiple Delete" data-placement="bottom"" id="trashMultipleButton" value="Trash Multiple" >
    <a href="trashed.php?pageTable=<?php echo $table ?>" class="btn btn-info btn-sm tooltips pull-right" data-original-title="All Trashed Items" data-placement="bottom">Show Trash Item</a>
    <div class="row">
        <div class="col-md-12">

            <!------CONTROL TABS START------>
            <ul class="nav nav-tabs bordered">
                <li class="active">
                    <a href="#list" data-toggle="tab"><i class="entypo-menu"></i><?php echo $pageHeading?> list </a></li>
                <li>
                    <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>Add <?php echo $pageHeading?> </a></li>
            </ul>
            <!------CONTROL TABS END------>

            <div class="tab-content">
                <!----TABLE LISTING STARTS-->
                <div class="tab-pane box active" id="list">

                    <table class="table table-bordered datatable" id="table_export">
                        <thead>
                        <tr>
                            <th> <input type='checkbox' id='select_all' name='select_all' value='$record->id'></th>
                            <th><div>#</div></th>
                            <th><div>Class Name</div></th>
                            <th><div>Numeric Value</div></th>
                            <th><div>Action</div></th>
                        </tr>
                        </thead>
                        <tbody>
                    <?php
                    $serial = 1;
                    foreach ($allData as $record){
                        echo "
                        <tr>
                        <td> <input type='checkbox' class='checkbox' name='multiple[]' value='$record->id'></td>
                           <td>$serial</td>
                            <td>$record->c_name</td>
                            <td>$record->c_id</td>
                            <td>
                                <div class=\"btn-group\">
                                    <button type=\"button\" class=\"btn btn-default btn-sm dropdown-toggle\" data-toggle=\"dropdown\">
                                        Action <span class=\"caret\"></span>
                                    </button>
                                    <ul class=\"dropdown-menu dropdown-default pull-right\" role=\"menu\">

                                        <!-- EDITING LINK -->
                                        <li>
                                            <a href=\"#\" onclick=\"showAjaxModal('edit.php?id=$record->id');\">
                                                <i class=\"entypo-pencil\"></i>
                                                edit                                            </a>
                                        </li>
                                        <li class=\"divider\"></li>

                                        <!-- DELETION LINK -->
                                        <li>
                                            <a href=\"#\" onclick=\"confirm_modal('../tdrp/delete.php?id=$record->id&&pageTable=$table');\">
                                                <i class=\"entypo-trash\"></i>
                                                delete                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr> ";
                        $serial++;
                        }//end of foreach loop
                    ?>
                        </tbody>
                    </table>
                </div>
                <!----TABLE LISTING ENDS--->

</form>
                <!----CREATION FORM STARTS---->
                <div class="tab-pane box" id="add" style="padding: 5px">
                    <div class="box-content">
                        <form action="store.php" class="form-horizontal form-groups-bordered validate" target="_top" method="post" accept-charset="utf-8">
                            <div class="padded">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Class Name</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="cName" data-validate="required" data-message-required="Value Required"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Numaric ID</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="cId"/>
                                    </div>
                                </div>
                                <!--
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Gpa Divide By</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="gpaDivide" data-validate="required" data-message-required="Value Required"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Total Subject</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="tSubject" data-validate="required" data-message-required="Value Required"/>
                                    </div>
                                </div>-->
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" name ="storeInfo" class="btn btn-info">Add <?php echo $pageHeading?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!----CREATION FORM ENDS-->
            </div>
        </div>
    </div>



    <!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
    <script type="text/javascript">

        jQuery(document).ready(function($)
        {


            var datatable = $("#table_export").dataTable();

            $(".dataTables_wrapper select").select2({
                minimumResultsForSearch: -1
            });
        });

    </script>
    <!-- Footer -->
<?php include '../index/footer.php' ?>