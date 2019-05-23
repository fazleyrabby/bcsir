<?php
require_once '../index/header.php';
$objAllDataQuery = new \App\dataTableQuery\dataTableQuery();
$userData = $objAllDataQuery->index('user_level'); 
$pageHeading ='ব্যবহারকারীর তথ্য';
?>
    <h3 style=""><i class="entypo-right-circled"></i> <?php echo $pageHeading?></h3>
    <hr />
    <div class="row">
        <div class="col-md-12">
            <!------CONTROL TABS START------>
            <ul class="nav nav-tabs bordered">
                <li class="active">
                    <a href="#list" data-toggle="tab"><i class="entypo-menu"></i><?php echo $pageHeading?> তালিকা </a></li>
                <li>
                    <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i><?php echo $pageHeading?> যুক্ত করুন </a></li>
            </ul>
            <!------CONTROL TABS END------>

            <div class="tab-content"> 
                <br>
                <!----TABLE LISTING STARTS-->
                <div class="tab-pane box active" id="list">
                    
                    <table id="user_data" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>ব্যবহারকারীর &nbsp;নাম</th>
                            <th>লগঅন&nbsp;নাম</th>
                            <th>পাসওয়ার্ড</th>
                            <th>ইমেইল</th>
                            <th>ফোন</th>
                            <th>ব্যবহারকারীর&nbsp;অনুমতি</th>
                            <th>অবস্থা</th>
                            <th>ঠিকানা</th>
                            <th>কার্য</th>
                        </thead>
                    </table>
                </div> 
                <!----TABLE LISTING ENDS--->

                <!----CREATION FORM STARTS---->
                <div class="tab-pane box" id="add" style="padding: 5px">
                    <div class="box-content">

                   <form class="form-horizontal form-groups-bordered validate" id="user_form"  target="_top" method="post" accept-charset="utf-8">
                           <?php echo $token;?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">ব্যবহারকারীর নাম</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" data-validate="required" data-message-required="Value Required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">লগঅন নাম</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="username" " data-validate="required"  data-message-required="Value Required"/>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">পাসওয়ার্ড</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="password" data-validate="required" data-message-required="Value Required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">ইমেইল</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control"  name="email" data-message-required="Value Required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">ফোন</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="phone" data-message-required="Value Required"/>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">ব্যবহারের অনুমতি</label>
                                <div class="col-sm-5">
                                  <select name="level" class="form-control">
                                    <?php foreach ($userData as $record){
                                         if($record->id==1||$record->id==2) echo '';
                                        else echo "<option value=\"$record->id\">$record->name</option>";
                                    } ?>
                                 </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">অবস্থা</label>
                                <div class="col-sm-5">
                                   <select name="status" class="form-control">
                                        <option value='0'>নিসক্রিয়</option>
                                        <option value='1'>সক্রিয়</option>
                                    </select>
                                 </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">ঠিকানা</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="address"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
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
                                তথ্য পরির্তন                           </div>
                        </div>
                        <div class="panel-body">

                            <form class="form-horizontal form-groups-bordered validate" id="user_form2"  target="_top" method="post" accept-charset="utf-8">
                                <?php echo $token;?>
                                <div class="form-group">
                                <div class="form-group">
                                <label class="col-sm-3 control-label">ব্যবহারকারীর নাম</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" id="name" data-validate="required" data-message-required="Value Required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">লগঅন নাম</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="username" id="username"   data-message-required="Value Required"/>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">পাসওয়ার্ড</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="password" id="password" data-validate="required" data-message-required="Value Required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">ইমেইল</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control"  name="email" id="email" data-message-required="Value Required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">ফোন</label> 
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="phone" id="phone"  data-message-required="Value Required"/>
                                </div>
                            </div>
                             
                            <div class="form-group">
                                <label class="col-sm-3 control-label">ব্যবহারের অনুমতি</label>
                                <div class="col-sm-5">
                                  <select name="level" id ="level" class="form-control">
                                    <option style="display: none">Select a Role</option>
                                    <?php foreach ($userData as $record){
                                        if($record->id==1||$record->id==2) echo '';
                                        else echo "<option value=\"$record->id\">$record->name</option>";
                                    } ?>
                                 </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">অবস্থা</label>
                                <div class="col-sm-5">
                                 <select name="status" id="status" class="form-control">
                                    <option value='0'>নিসক্রিয়</option>
                                     <option value='1'>সক্রিয়</option>
                                 </select>
                               
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">ঠিকানা</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="address" id="address" />
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
                    // name,username,password,email,phone,level,status,address
                    $('#userModal').modal('show');
                    $('#name').val(data.name);
                    $('#password').val(data.password);
                    $('#username').val(data.username);
                    $('#email').val(data.email);
                    $('#phone').val(data.phone);
                    $('#level').val(data.level);
                    $('#status').val(data.status);
                    $('#address').val(data.address);
                    $('.modal-title').text("<?php echo $pageHeading?>");
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