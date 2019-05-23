<?php
require_once '../index/header.php';
if(!isset($_SESSION)) session_start();
$objBook = new \App\book\book();
$allBookData = $objBook->index();
$objUser = new \App\User\User();
$allDataUser = $objUser->viewAllUsers();
$pageHeading ='Book Request';
$objBook = new \App\book\book();
$allBookRequestData = $objBook->indexBookRequest();
$objClass = new \App\cls\cls();
$allClassData = $objClass->index();
$table = 'book_request';
if($level==2 || $level==8) {
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
                <th><div>Requested Book</div></th>
                <th><div>Requested By</div></th>
                <th><div>Type</div></th>
                <th><div>Issue Starting Date</div></th>
                <th><div>Issue Ending Date</div></th>
                <th><div>Status</div></th>
                <th><div>Options</div></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $serial = 1;
            foreach ($allBookRequestData as $record){
                if($record->status=='1') $status = "<span class='label label-success'>Granted</span>";
                elseif($record->status=='2') $status = "<span class='label label-danger'>Returned</span>";
                else $status = "<span class='label label-warning'>Pending</span>";

                if($record->level=='2') $type = "SuperAdmin";
                elseif($record->level=='4') $type = "Teacher";
                elseif($record->level=='6') $type = "Student";
                elseif($record->level=='7') $type = "Staff";
                else $type = "";
                $issue_start_date = date('d-M-Y',strtotime($record->issue_start_date));
                $issue_end_date = date('d-M-Y',strtotime($record->issue_end_date));
                echo "
                <tr>
                    <td>$serial</td>
                    <td>$record->book_name</td>
                    <td>$record->name ($insPath$record->requested_by)</td>
                    <td>$type</td>
                    <td>$issue_start_date</td>
                    <td>$issue_end_date</td>
                    <td>$status</td>
                    <td>
                        <div class=\"btn-group\">
                            <button type=\"button\" class=\"btn btn-default btn-sm dropdown-toggle\" data-toggle=\"dropdown\">
                                Action <span class=\"caret\"></span>
                            </button>
                            <ul class=\"dropdown-menu dropdown-default pull-right\" role=\"menu\">
                                <li>
                                    <a href=\"#\" onclick=\"showAjaxModal('book_request_edit.php?id=$record->id');\">
                                        <i class=\"entypo-pencil\"></i>
                                        Edit                                </a>
                                </li>
                                <li class=\"divider\"></li>

                                <li>
                                    <a href=\"#\" onclick=\"confirm_modal('../tdrp/delete.php?id=$record->id&pageTable=$table');\">
                                        <i class=\"entypo-trash\"></i>
                                        Delete                                </a>
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
                  <form action="store.php" class="form-horizontal form-groups-bordered validate" id="user_form" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
                        <?php echo $token;?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Requested By</label>
                        <div class="col-sm-6">
                            <select name="requestedBy" class="form-control selectboxit" data-placeholder="Select a Requested ID" tabindex="-1" required>
                                <?php
                                foreach ($allDataUser as $record){
                                    if($record->user_id!='developer' && $record->user_id!='superadmin' && $record->user_id!='accountant' && $record->user_id!='librarian') {
                                        echo "<option value='$record->user_id'>$record->user_id ($record->name)</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Book</label>
                        <div class="col-sm-6">
                            <select name="bookId" class="form-control selectboxit" data-placeholder="Select a Book" tabindex="-1" required>
                                <?php
                                foreach ($allBookData as $record){
                                    echo "<option value='$record->id'>$record->name($record->desk_name Row-$record->desk_row)</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Issue Starting Date</label>
                        <div class="col-sm-6">
                            <input type="text" class="datepicker form-control" name="issueStartDate" data-validate="required" placeholder="yyyy-mm-dd" data-message-required="Value Required" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Issue Ending Date</label>
                        <div class="col-sm-6">
                            <input type="text" class="datepicker form-control" name="issueEndDate" data-validate="required" placeholder="yyyy-mm-dd" data-message-required="Value Required" value="">
                        </div>
                    </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                     <input type="hidden" name="storeBookRequest" value="Add"/>
                                    <input type="hidden" name="operation" id="operation" value="Add"/>
                                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                                    <button type="reset" class="btn btn-default">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!----CREATION FORM ENDS--->
            </div>
        </div>
    </div>
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

<!-- Oustdile Html -->
<div id="userModal" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title"></h4>
        </div>

        <div class="modal-body" style="height:500px; overflow:auto;"><script src="../../resources/assets/js/neon-custom-ajax.js"></script>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <i class="entypo-plus-circled"></i>
                                Edit Information
                            </div>
                        </div>
                        <div class="panel-body">

                            <form class="form-horizontal form-groups-bordered validate" id="user_form2"  target="_top" method="post" accept-charset="utf-8">
                                <?php echo $token;?>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Subject Name</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="name2" name="name" data-validate="required" data-message-required="Value Required"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Subject Code</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="code2" name="code" data-validate="required" data-message-required="Value Required"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-5">
                                        <input type="hidden" name="user_id" id="user_id2" />
                                        <input type="hidden" name="id" id="id" />
                                        <input type="hidden" name="operation" id="operation2" value="Edit" />
                                        <input type="submit" name="action" id="action2" class="btn btn-success" value="Edit" />
                                        <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" language="javascript" >
    $(document).ready(function(){

        var dataTable = $('#user_data').DataTable({
            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax":{
                url:"fetch.php?postId=allData",
                type:"POST"
            },
            "columnDefs":[
                {
                    "targets":[0,0],
                    "orderable":false,
                },
            ],

        });

        $(document).on('submit', '#user_form', function(event){
            event.preventDefault();

                $.ajax({
                    url:"store.php",
                    method:'POST',
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                        var str = data;
                        var res = str.match(/uccess/);

                        if(res=="uccess"){
                            toastr.success(data);
                        } else{
                            toastr.error(data);
                        }
                        //alert(data);
                        $('#user_form')[0].reset();
                        dataTable.ajax.reload();
                    }
                });

        });



        $(document).on('submit', '#user_form2', function(event){
            event.preventDefault();

                $.ajax({
                    url:"fetch.php?postId=insert",
                    method:'POST',
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                        var str = data;
                        var res = str.match(/uccess/);

                        if(res=="uccess"){
                            toastr.success(data);
                        } else{
                            toastr.error(data);
                        }
                        //alert(data);
                        $('#user_form2')[0].reset();
                        $('#userModal').modal('hide');
                        dataTable.ajax.reload();
                    }
                });

        });


        //$abc='id,full_name,short_name,address,mobile,email,web';

        $(document).on('click', '.update', function(){
            var user_id = $(this).attr("id");
            $.ajax({
                url:"fetch.php?postId=update",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data)
                {
                    $('#userModal').modal('show');
                    $('#name2').val(data.name);
                    $('#code2').val(data.code);
                    $('.modal-title').text("Edit <?php echo $pageHeading?>");
                    $('#user_id2').val(user_id);
                    $('#action2').val("Edit"); 
                    $('#operation2').val("Edit");
                }
            })
        });

        $(document).on('click', '.delete', function(){
            var user_id = $(this).attr("id");

         //   jQuery('#modal-4').modal('show', {backdrop: 'static'});
           if(confirm("Are you sure you want to delete this?"))
            {
                $.ajax({
                    url:"fetch.php?postId=delete",
                    method:"POST",
                    data:{user_id:user_id},
                    success:function(data)
                    {
                        var str = data;
                        var res = str.match(/uccess/);

                        if(res=="uccess"){
                            toastr.success(data);
                        } else{
                            toastr.error(data);
                        }
                        //alert(data);
                        $('#user_form')[0].reset();
                        dataTable.ajax.reload();
                    }
                });
            }
            else
            {
                return false;
            }
        });


    });
</script>

<?php
} else {
    include '../index/dashboard_error.php';
}
?>
<?php include '../index/footer.php'?>