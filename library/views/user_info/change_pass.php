<?php
require_once '../index/header.php';
$objAllDataQuery = new \App\dataTableQuery\dataTableQuery();
$userName = $_SESSION['userId'];
$insPath = $_SESSION['insPath'];
$userInfo = $objAllDataQuery->indexByQuerySingleData("SELECT * FROM `v_users` where username = '$insPath$userName'");
$pageHeading ='Change Password';
?>
    <h3 style=""><i class="entypo-right-circled"></i>Manage <?php echo $pageHeading?></h3>
    <hr />
    <div class="row">
        <div class="col-md-12">
            <!------CONTROL TABS START------>
            <ul class="nav nav-tabs bordered">
                 <li>
                    <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i><?php echo $pageHeading?> </a></li>
            </ul>
            <!------CONTROL TABS END------>

           
                <!----TABLE LISTING ENDS--->

                <!----CREATION FORM STARTS---->
                <div class="tab-pane box" id="add" style="padding: 5px">
                    <div class="box-content">

                   <form class="form-horizontal form-groups-bordered validate" id="user_form"  target="_top" method="post" accept-charset="utf-8" oninput="result.value=!!password_confirm.value&&(password_new.value==password_confirm.value)?'Match!':'Not Match'">
                           <?php echo $token;?> 
                            <div class="form-group">
                                <label class="col-sm-3 control-label">User Name</label>
                                <div class="col-sm-5">
                                    <input type="text" readonly class="form-control" name="name" Value="<?php echo $userInfo->name?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Logon Name</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" readonly Value="<?php echo $userInfo->username?>" />
                                    <input type="hidden" class="form-control" name="username" readonly Value="<?php echo $userName?>" />
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">Old Password</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="password_old" data-validate="required" data-message-required="Value Required"/>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">New Password</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="password_new" data-validate="required" data-message-required="Value Required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Confirm Password</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="password_confirm" data-validate="required" data-message-required="Value Required"/>
                                </div>
                                 <div class="col-sm-3">
                                 <output name="result"><i class="entypo-cancel"></i> </output>
                              </div>
                            </div>
                             
                            <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-5">
                                        <input type="hidden" name="id" id="id" value="<?php echo $userName?>" />
                                        <input type="hidden" name="operation" id="operation2" value="Edit" />
                                        <input type="submit" name="action" id="action2" class="btn btn-success" value="Update" />
                                        <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
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

<script type="text/javascript" language="javascript" >
    $(document).ready(function(){

      

        $(document).on('submit', '#user_form', function(event){
            event.preventDefault();

                $.ajax({
                    url:"fetch.php?postId=changePassword",
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
                    $('#username').val(data.username);
                    $('#email').val(data.email);
                    $('#phone').val(data.phone);
                    $('#level').val(data.level);
                    $('#status').val(data.status);
                    $('#address').val(data.address);
                    $('.modal-title').text("Edit <?php echo $pageHeading?>");
                    $('#user_id2').val(user_id);
                    $('#action2').val("Edit");
                    $('#operation2').val("Edit");
                }
            })
        });
    });
</script>