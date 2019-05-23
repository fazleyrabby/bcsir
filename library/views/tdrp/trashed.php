<?php
require_once ("../../vendor/autoload.php");
$obj = new \App\tdrp\tdrp();
$pageTable = $_GET['pageTable'];
$obj->setData($_GET);
$allData = $obj->trashed();
//$pagination = new \App\tdrp\tdrp();
//$pagination->getTable('customer_birthdate');
//$arrSomeData = $pagination->indexPaginator();
//require_once '../tdrp/pagination_header.php';

require_once '../tdrp/message.php';
require_once '../index/header.php';
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-table"></i>Trashed List of <?php echo $pageTable?> </h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="../index/index.php">Home</a></li>
                    <li><i class="fa fa-table"></i></li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <form id="selectionForm" action="recover_multiple.php?pageTable=<?php echo $pageTable?>" method="post">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <input type="button" class="btn btn-danger btn-sm tooltips" data-original-title="Permanent Delete Selected Items" data-placement="bottom"" id="deleteMultipleButton" value="Delete Multiple">
                            <input type="button" class="btn btn-success btn-sm tooltips" data-original-title="Recover Selected Items" data-placement="bottom"" id="trashMultipleButton" value="Recover Multiple" >
                            <a class="btn btn-sm btn-primary tooltips" data-original-title="Go To Main Page" data-placement="bottom" href="../Birthdate/index.php">Show Active List</a>

                        </header>

                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                                <th><i class="icon_cone"></i> Serial</th>
                                <th><i class="icon_cone"></i> ID</th>
                                <th><i class="icon_profile"></i> Name</th>
                                <th><i class="icon_calendar"></i> Birth Date</th>
                                <th> <input type='checkbox' id='select_all' name='select_all' value='$record->id'>Select</th>
                                <!--<th> <input type='checkbox' id='checkAll' name='checkAll' value='$record->id'></th>-->
                                <th><i class="icon_cogs"></i> Action</th>
                            </tr>
                            <?php

                            $serial = 1;
                            foreach ($allData as $record){
                                echo "
                            <tr>
                                <td>$serial</td>
                                <td>$record->id</td>
                                <td>$record->customer_name</td>
                                <td>".date('d-M-Y', strtotime($record->birthdate))."
                                <td><input type='checkbox' class='checkbox' name='multiple[]' value='$record->id'></td>
                                <td>
                                <div class=\"btn-group\">
                                      <a class=\"btn btn-primary tooltips\" data-original-title=\"View\" data-placement=\"bottom\"\" href=\"../Birthdate/view.php?id=$record->id\"><i class=\"icon_plus_alt2\"></i></a>
                                      <a class=\"btn btn-success tooltips\" data-original-title=\"Recover\" data-placement=\"bottom\"\" href=\"recover.php?id=$record->id&&pageTable=$pageTable\"><i class=\"icon_archive\"></i></a>
                                      <a class=\"btn btn-danger tooltips\" data-original-title=\"Permanent Delete\" data-placement=\"bottom\"\" href=\"delete.php?id=$record->id&&pageTable=$pageTable\"><i class=\"icon_close_alt2\"></i></a>
                                         </div>
                                  </td>";

                                $serial++;
                            }//end of foreach loop
                            ?>

                            </tbody>
                        </table>
                    </section>
                    <?php //require_once '../tdrp/pagination_footer.php' ?>
                </div>
            </form>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<?php require_once  '../index/footer.php'?>
<script>

    $('#deleteMultipleButton').click(function(){

        if(checkEmptySelection()){
            alert("Empty Selection! Please select some record(s) first")
        }
        else{
            var r = confirm("Are you sure you want to delete the selected record(s)?");

            if(r){
                var selectionForm =   $('#selectionForm');
                selectionForm.attr("action","../tdrp/delete_multiple.php?pageTable=<?php echo $pageTable?>");
                selectionForm.submit();
            }
        }
    });


</script>
