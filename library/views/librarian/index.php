<?php
include '../index/header.php';
$objLibrarianInfo = new \App\librarianInfo\librarianInfo();
$allData = $objLibrarianInfo->index();
$table = 'librarian_info';
?>

<h3 style="">
    <i class="entypo-right-circled"></i>
    All Librarians           </h3>

<a href="javascript:;" onclick="showAjaxModal('add.php');"
   class="btn btn-primary pull-right">
    <i class="entypo-plus-circled"></i>
    Add New Librarian</a>
<br><br>

<table class="table table-bordered datatable" id="table_export">
    <thead>
    <tr>
        <th style="width: 60px;">#</th>
        <th><div>ID</div></th>
        <th><div>Name</div></th>
        <th><div>Email</div></th>
        <th><div>Mobile</div></th>
        <th><div>Options</div></th>
    </tr>
    </thead>
    <tbody>
    <?php
    $serial = 1;
    foreach ($allData as $record){
        ?>
        <tr>
            <td><?php echo $serial?></td>
            <td><?php echo $insPath.$record->id?></td>
            <td><?php echo $record->name?></td>
            <td><?php echo $record->email?></td>
            <td><?php echo $record->mobile?></td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                        Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                        <li>
                            <a href="#" onclick="showAjaxModal('edit.php?id=<?php echo $record->id?>');">
                                <i class="entypo-pencil"></i>
                                Edit                                </a>
                        </li>
                        <li class="divider"></li>

                        <li>
                            <a href="#" onclick="confirm_modal('../tdrp/delete.php?id=<?php echo $record->id ?>&pageTable=<?php echo $table ?>');">
                                <i class="entypo-trash"></i>
                                Delete                                </a>
                        </li>
                    </ul>
                </div>

            </td>
        </tr>
        <?php
        $serial++;
        }//end of foreach loop
    ?>
    </tbody>
</table>

<!-- Footer -->
<?php include '../index/footer.php' ?>