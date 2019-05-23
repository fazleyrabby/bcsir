<?php
include '../index/header.php';
$objInstitution = new \App\institution\institution();
$allData = $objInstitution->index();
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
                            <th><div>Board No</div></th>
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
                            <td>$record->board_no</td>
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
                <!-- DELETION LINK -->

                <!----TABLE LISTING ENDS--->

</form>
    </div></div></div>

<?php include '../index/footer.php' ?>