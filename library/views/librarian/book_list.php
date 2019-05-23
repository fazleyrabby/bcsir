<?php
require_once '../index/header.php';
$objBook = new \App\book\book();
$allBookData = $objBook->index();
$allDataBookCategory = $objBook->indexBookCategory();
$allDataBookSubCategory = $objBook->indexBookSubCategory();
$objAuthor = new \App\author\author();
$allDataAuthor = $objAuthor->index();
$objPublisher = new \App\publisher\publisher();
$allDataPublisher = $objPublisher->index();
$objDesk = new \App\desk\desk();
$allDataDesk = $objDesk->index();
$objClass = new \App\cls\cls();
$allClassData = $objClass->index();
$table = 'book';
//just for showing page
$pageHeading ='বই';
if($level==2 || $level==8) {
?>
<h3><i class="entypo-right-circled"></i> <?php echo $pageHeading?> এর তালিকা</h3><hr />
<div class="row">
    <div class="col-md-12">
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i> <?php echo $pageHeading?> </a></li>
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
                        <th><div>বইয়ের নাম</div></th>
                        <th><div>লেখক/প্রকাশক</div></th>
                        <th><div>বর্ননা</div></th>
                        <th><div>মুল্য</div></th>
                        <th><div>ক্যাট্যাগরি</div></th>
                        <th><div>তাক</div></th>
                        <th><div>শ্রেণী</div></th>
                        <th><div>কপি</div></th>
                        <th><div>অবস্থা</div></th>
                        <th><div>কার্য</div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $serial = 1;
                    foreach ($allBookData as $record){
                        $remaining_copies = $record->total_copies_desk - $record->issued_copies_desk; 
                        if($remaining_copies>=1) {
                            $status = "<button type='button' class='btn btn-success btn-xs'>পাওয়া যাবে <span class='badge'>$remaining_copies</span></button>";
                            $badge = "badge-info";
                        } else {
                            $status = "<button type='button' class='btn btn-danger btn-xs'>পাওয়া যাবে না <span class='badge'>$remaining_copies</span></button>";
                            $badge = "badge-danger";
                        }
                        echo "
                        <tr>
                            <td style='text-align: center'>$serial</td>
                            <td>$record->name <br><!-- $record->book_code--></td>
                            <td>$record->author_name <br> $record->publisher_name</td>
                            <td>$record->description</td>
                            <td>$record->price</td>
                            <td>$record->bc_name</td>
                            <td style='text-align: center'><button type='button' class='btn btn-warning btn-xs'>$record->desk_name <span class='badge'>$record->desk_row</span></button></td>
                            <td>$record->c_name</td>
                            <td style='text-align: center'><span class='badge $badge'>$record->total_copies_desk</span></td>
                            <td style='text-align: center'>$status</td>
                            <td>
                                <div class=\"btn-group\">
                                    <button type=\"button\" class=\"btn btn-default btn-sm dropdown-toggle\" data-toggle=\"dropdown\">
                                        কার্য <span class=\"caret\"></span>
                                    </button>
                                    <ul class=\"dropdown-menu dropdown-default pull-right\" role=\"menu\">
                                        <li>
                                            <a href=\"#\" onclick=\"showAjaxModal('book_edit.php?id=$record->id');\">
                                                <i class=\"entypo-pencil\"></i>
                                                পরিবর্তন                                </a>
                                        </li>
                                        <li class=\"divider\"></li>
                                        <li>
                                            <a href=\"#\" onclick=\"confirm_modal('../tdrp/delete.php?id=$record->id&pageTable=$table');\">
                                                <i class=\"entypo-trash\"></i>
                                                মুছে ফেলুন                                </a>
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
        </div>
    </div>
</div>

<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
<script type="text/javascript">

jQuery(document).ready(function($){

    //var datatable = $("#table_export").dataTable();
    var dataTable = $('#table_export').DataTable({
        "processing":true,
		"language": {
			  "url": "http://cdn.datatables.net/plug-ins/1.10.19/i18n/Bangla.json"
		},  
    });

    $(".dataTables_wrapper select").select2({
        minimumResultsForSearch: -1
    });
});

$(window).load(function(){
	$('#bcId').on('change',function() {
		if( $(this).val()==="1"){
			$("#cId").show();
		} else {
			$("#cId").hide();
		}
	});
});

</script>
<!-- Footer --><?php
} else {
    include '../index/dashboard_error.php';
}
?>
<?php require_once '../index/footer.php' ?>