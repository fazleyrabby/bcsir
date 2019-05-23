<?php
include '../index/header.php';
$objInstitution = new \App\institution\institution();
$allData = $objInstitution->indexDeveloper();
$table = 'institution';
//jsut for showing page
$pageHeading ='Institution';
?>
    <form id="selectionForm" action="../tdrp/trash_multiple.php?pageTable= <?php echo $table ?>" method="post">
        <h3 style=""><i class="entypo-right-circled"></i>Manage <?php echo $pageHeading?></h3>
        <div class="row">
            <div class="col-md-12">

                <!------CONTROL TABS START------>
                <ul class="nav nav-tabs bordered">
                    <li class="active">
                        <a href="#list" data-toggle="tab"><i class="entypo-menu"></i><?php echo $pageHeading?> </a></li>
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
                                <th><div>Logo</div></th>
                                <th><div>Short</div></th>
                                <th><div>Full Name</div></th>
                                <th><div>Address</div></th>
                                <th><div>Mobile</div></th>
                                <th><div>Email</div></th>
                                <th><div>Web</div></th>
                                <th><div>DB</div></th>
                                <th><div>User</div></th>
                                <th><div>PASS</div></th>
                                <th><div>Action</div></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $serial = 1;
                            foreach ($allData as $record){
                                echo "
                        <tr>
                           <td><img src='$insPath/$insLogo' class='img-circle' width='30'></td>
                            <td>$record->ins_short_name</td>
                            <td>$record->ins_full_name</td>
                            <td>$record->ins_address</td>
                            <td>$record->ins_mobile</td>
                            <td>$record->ins_email</td>
                            <td>$record->ins_web</td>
                            <td>$record->db_name</td>
                            <td>$record->db_user</td>
                            <td>$record->db_pass</td>
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
                                        </li> <li>
                                            <a href=\"delete.php?insShortName=$record->ins_short_name&dbName=$record->db_name\">
                                                <i class=\"entypo-trash\"></i>
                                                Delete                                            </a>
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
    <div class="tab-pane box" id="add" style="padding: 5px">
        <div class="box-content">
            <form action="store.php" class="form-horizontal form-groups-bordered validate" target="_top" method="post" accept-charset="utf-8">
                <div class="padded">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Institution Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="insFullName" data-validate="required" data-message-required="Value Required"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Sort Name/Path</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="insShortName"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Mobile</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="insMobile" data-validate="required" data-message-required="Value Required"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="insEmail" data-validate="required" data-message-required="Value Required"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">DB Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="dbName"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">DB User</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="dbUser"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">DB Pass</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="dbPass"/>
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
    </div></div></div>

<?php include '../index/footer.php' ?>