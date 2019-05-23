<?php
include '../index/header.php';
$objTeacherInfo = new \App\teacherInfo\teacherInfo();
$objTeacherInfo->setData($_GET);
$allData = $objTeacherInfo->index();
$table = 'teacher_info';

//just for showing pages
$pageHeading ='পাঠক';
?>
<form id="selectionForm" action="../tdrp/trash_multiple.php?pageTable= <?php echo $table ?>" method="post">
    <?php if($level==2) { ?>
    <h3 style=""><i class="entypo-right-circled"></i><?php echo $pageHeading?></h3>
    <input type="button" class="btn btn-danger btn-sm tooltips pull-right" data-original-title="Permanent Multiple Delete" data-placement="bottom" id="deleteMultipleButton" value="মুছে ফেলুন">
    <!--
    <input type="button" class="btn btn-warning btn-sm tooltips pull-right" data-original-title="Temporary Multiple Delete" data-placement="bottom" id="trashMultipleButton" value="Trash Multiple" >
    <a href="trashed.php?pageTable=<?php echo $table ?>" class="btn btn-info btn-sm tooltips pull-right" data-original-title="All Trashed Items" data-placement="bottom">Show Trash Item</a>
    -->
    <?php }?>
    
    <div class="row">
        <div class="col-md-12">

            <!------CONTROL TABS START------>
            <ul class="nav nav-tabs bordered">
                <li class="active">
                    <a href="#list" data-toggle="tab"><i class="entypo-menu"></i><?php echo $pageHeading?> </a>
                </li>
            </ul>
            <!------CONTROL TABS END------>

            <div class="tab-content">
                <!----TABLE LISTING STARTS-->
                <div class="tab-pane box active" id="list">

                    <table class="table table-bordered datatable" id="table_export">
                        <thead>
                        <tr>
                            <?php if($level==2) { ?>
                            <th width='60'> <input type='checkbox' id='select_all' name='select_all' value='$record->id'></th>
                            <?php }?>
                            <th style='text-align: center'>#</th>
                            <th>ছবি</th>
                            <th style='text-align: center'>নং</th>
                            <th>নাম</th>
                            <th style='text-align: center'>পদবী</th>
                            <th style='text-align: center'>মোবাইল ~ ইমেইল ~ জাতীয় পরিচয়পত্র</th>
                            <th style='text-align: center'>রক্ত</th>
                            <th style='text-align: center' width="10%">যোগদানের&nbsp;তারিখ</th>
                            <th style='text-align: center'>বেতন</th>
                            <th>কার্য</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $serial = 1;
                        foreach ($allData as $record){
                            $photoFile = "../../../uploads/$insPath/teacher_image/sm/$record->id.jpg";
                            
                            $today = date("F j, Y, g:i a");
                            $photo = '<img src="'.$photoFile.'?myPic='.urlencode($today).'" class="img-circle" width="30" alt="" />';
                            
                            if (!file_exists($photoFile)) {
                                $photo = "<img src='../../../uploads/default.jpg' class='img-circle' width='30'>";
                            }
                            $join_date = date('d-M-Y',strtotime($record->join_date));
                            if($level==2) {
                                $options = "<!-- EDITING LINK -->
                                            <li>
                                                <a href=\"#\" onclick=\"showAjaxModal('edit.php?id=$record->id');\">
                                                    <i class=\"entypo-pencil\"></i>
                                                    পরিবর্তন করুন
                                                </a>
                                            </li>
                                            <li class=\"divider\"></li>

                                            <!-- DELETION LINK -->
                                            <li>
                                                <a href=\"#\" onclick=\"confirm_modal('delete.php?id=$record->id&pageTable=$table');\">
                                                    <i class=\"entypo-trash\"></i>
                                                    মুছে ফেলুন
                                                </a>
                                            </li>";
                            echo "<tr>
                                <td> <input type='checkbox' class='checkbox' name='multiple[]' value='$record->id'></td>";
                            } else {
                            echo "<tr>";
                                $options = "<!-- EDITING LINK -->
                                            <li>
                                                <a href=\"#\" onclick=\"showAjaxModal('edit.php?id=$record->id');\">
                                                    <i class=\"entypo-pencil\"></i>
                                                    edit
                                                </a>
                                            </li>";
                            }
                            echo "
                                <td style='text-align: center'>$serial</td>
                                <td>$photo</td>
                                <td style='text-align: center'>$insPath$record->id</td>
                                <td>$record->name</td>
                                <td style='text-align: center'>$record->designation</td>
                                <td style='text-align: center'>$record->mobile <br> $record->e_mail <br> $record->nid</td>
                                <td style='text-align: center;color: red;'>$record->blood_group</td>
                                <td style='text-align: center'>$join_date</td>
                                <td style='text-align: center'>$record->amount</td>
                                <td>
                                    <div class=\"btn-group\">
                                        <button type=\"button\" class=\"btn btn-default btn-sm dropdown-toggle\" data-toggle=\"dropdown\">
                                            কার্য <span class=\"caret\"></span>
                                        </button>
                                        <ul class=\"dropdown-menu dropdown-default pull-right\" role=\"menu\">
                                            <!-- TEACHER PROFILE LINK -->
                                           <!--  <li>
                                                <a href=\"#\" onclick=\"showAjaxModal('../teacher/teacher_profile.php?id=$record->id');\" >
                                                    <i class=\"entypo-user\"></i>
                                                    বিস্তারিত
                                                </a>
                                            </li>-->
                                            <li class=\"divider\"></li>
                                            $options
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