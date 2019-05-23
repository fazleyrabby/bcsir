<?php
require_once '../index/header.php';
$objAuthor = new \App\author\author();
$allData = $objAuthor->index();
$table = 'author';
//jsut for showing page
$pageHeading ='Author';
?>
<h3 style=""><i class="entypo-right-circled"></i>Manage <?php echo $pageHeading?></h3>
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
                        <th><div>#</div></th>
                        <th><div>Author Name</div></th>
                        <th><div>Author Code</div></th>
                        <th><div>Action</div></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $serial = 1;
                        foreach ($allData as $record){
                            echo "
                        <tr>
                            <td>$serial</td>
                            <td>$record->name</td>
                            <td>$record->code</td>
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
            <!----CREATION FORM STARTS---->
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <form action="store.php" class="form-horizontal form-groups-bordered validate" target="_top" method="post" accept-charset="utf-8">
                        <br>
                        <div class="padded">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Author Name</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" data-validate="required" data-message-required="Value Required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Author Code</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="author_code" name="author_code" data-validate="required" data-message-required="Value Required"/>
                                </div>
                            </div>
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
<?php require_once '../index/footer.php' ?>