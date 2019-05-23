<?php
require_once '../index/header.php';
$objBook = new \App\book\book();
$allBookData = $objBook->index();
$objClass = new \App\cls\cls();
$allClassData = $objClass->index();
$table = 'book';
//just for showing page
$pageHeading ='Book';
?>
    <h3 style=""><i class="entypo-right-circled"></i>Manage <?php echo $pageHeading?></h3>
    <hr />
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
                <br>
                <!----TABLE LISTING STARTS-->
                <div class="tab-pane box active" id="list">

                    <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered datatable" id="table_export">
                        <thead>
                        <tr>
                            <th style="width: 60px;">#</th>
                            <th><div>Book Name</div></th>
                            <th><div>Author</div></th>
                            <th><div>Description</div></th>
                            <th><div>Price</div></th>
                            <th><div>Class</div></th>
                            <th><div>Total Copies</div></th>
                            <th><div>Status</div></th>
                            <th><div>Options</div></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $serial = 1;
                        foreach ($allBookData as $record){
                            $remaining_copies = $record->total_copies - $record->issued_copies;
                            if($remaining_copies>=1) {
                                $status = "<button type='button' class='btn btn-success btn-xs'>available <span class='badge'>$remaining_copies</span></button>";
                            } else {
                                $status = "<button type='button' class='btn btn-warning btn-xs'>unavailable <span class='badge'>$remaining_copies</span></button>";
                            }
                            echo "
                            <tr>
                                <td style='text-align: center'>$serial</td>
                                <td>$record->name</td>
                                <td>$record->author</td>
                                <td>$record->description</td>
                                <td>$record->price</td>
                                <td>$record->c_name</td>
                                <td style='text-align: center'><span class='badge badge-primary'>$record->total_copies</span></td>
                                <td style='text-align: center'>$status</td>
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
                            </tr>";
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
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" data-validate="required" data-message-required="Value Required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Author</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="author"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Description</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" rows="3" cols="50" name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Price</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="price" value="0"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Class</label>
                                <div class="col-sm-5">
                                    <select name="cId" class="form-control selectboxit" style="width:100%;">
                                        <option value="" style="display: none">Select a Class</option>
                                        <?php
                                        foreach ($allClassData as $record){
                                            echo "<option value='$record->c_id'>$record->c_name</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Total Copies</label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control" name="totalCopies" value="1" required />
                                </div>
                            </div>
                            <!--<div class="form-group">
                                <label class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-5">
                                    <select name="status" class="form-control selectboxit" style="width:100%;">
                                    	<option value="available">Available</option>
                                    	<option value="unavailable">Unavailable</option>
                                    </select>
                                </div>
                            </div>-->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" name ="storeInfo" class="btn btn-info">Add <?php echo $pageHeading?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!----CREATION FORM ENDS--->
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