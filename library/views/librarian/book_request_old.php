<?php
require_once '../index/header.php';
$objBook = new \App\book\book();
$allBookRequestData = $objBook->indexBookRequest();
$objClass = new \App\cls\cls();
$allClassData = $objClass->index();

$allBookData = $objBook->index();
$objUser = new \App\User\User();
$allDataUser = $objUser->viewAllUsers();

$table = 'book_request';
//just for showing page
$pageHeading ='বই জারি';
if($level==2 || $level==8) {
?>
    <h3 style=""><i class="entypo-right-circled"></i> <?php echo $pageHeading?></h3>
    <hr />
    <!--<button onclick="showAjaxModal('book_request_add.php');" class="btn btn-primary pull-right">
   বইয়ের জন্য অনুরোধ করুন</button>-->
    <div class="row">
        <div class="col-md-12">
            <!------CONTROL TABS START------>
            <ul class="nav nav-tabs bordered">
                <li class="active"><a href="#list" data-toggle="tab"><i class="entypo-menu"></i><?php echo $pageHeading?> তালিকা</a></li>
                <li><a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>নতুন <?php echo $pageHeading?></a></li>
                <li><a href="#return" data-toggle="tab"><i class="entypo-plus-circled"></i>বই ফেরত</a></li>
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
                            <th><div>বইসমূহ</div></th>
                            <th><div>বই গ্রহীতা</div></th>
                           <!-- <th><div>পদবী</div></th>-->
                            <th><div>বই সংগ্রহের তারিখ</div></th>
                            <th><div>বই প্রদানের তারিখ</div></th>
                            <th><div>অবস্থা</div></th>
                            <!--<th><div>কার্যক্রম</div></th>-->
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $serial = 1;
                        foreach ($allBookRequestData as $record){
                            if($record->status=='1') $status = "<span class='label label-success'>অনুমোদিত</span>";
                            elseif($record->status=='2') $status = "<span class='label label-danger'>ফেরত এসেছে</span>";
                            else $status = "<span class='label label-warning'>অপেক্ষমান</span>";
                            
                            if($record->issue_start_date=="0000-00-00" || $record->issue_start_date=="") $issue_start_date = "";
                            else $issue_start_date = date('d-M-Y',strtotime($record->issue_start_date));
                            if($record->issue_end_date=="0000-00-00" || $record->issue_end_date=="") $issue_end_date = "";
                            else $issue_end_date = date('d-M-Y',strtotime($record->issue_end_date));
                            echo "
                            <tr>
                                <td>$serial</td>
                                <td>$record->book_name</td>
                                <td>$record->name ($insPath$record->requested_by)</td>
                                <!--<td>$type</td>-->
                                <td>$issue_start_date</td>
                                <td>$issue_end_date</td>
                                <td>$status</td>
                                <!--
                                <td>
                                    <div class=\"btn-group\">
                                        <button type=\"button\" class=\"btn btn-default btn-sm dropdown-toggle\" data-toggle=\"dropdown\">
                                            কার্যক্রম<span class=\"caret\"></span>
                                        </button>
                                        <ul class=\"dropdown-menu dropdown-default pull-right\" role=\"menu\">
                                            <li> 
                                                <a href=\"#\" onclick=\"showAjaxModal('book_request_edit.php?id=$record->id');\">
                                                    <i class=\"entypo-pencil\"></i>
                                                    বই গ্রহন                                </a>
                                            </li>
                                            <li class=\"divider\"></li>
            
                                            <li>
                                                <a href=\"#\" onclick=\"confirm_modal('../tdrp/delete.php?id=$record->id&pageTable=$table');\">
                                                    <i class=\"entypo-trash\"></i>
                                                    মুছে ফেলুন                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>-->
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

                        <form action="store.php" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
                            <input type="hidden" name="status" value="1">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">অনুরোধকারী</label>
                                <div class="col-sm-6">
                                    <!--<select name="requestedBy" class="form-control selectboxit" data-placeholder="Select a Requested ID" tabindex="-1" required>-->
                                    <select name="requestedBy" id="requestedBy" class="form-control select2" data-placeholder="Select a Requested ID" tabindex="-1" required>
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
                                <label class="col-sm-3 control-label">বই</label>
                                <div class="col-sm-6">
                                    <!--<select name="bookId" class="form-control" id ="bookId" data-placeholder="Select a Book" required>-->
                                    <select name="bookId" id="bookId" class="form-control select2" data-placeholder="Select a Book" tabindex="-1" required>
                                        <?php
                                        foreach ($allBookData as $record){
                                            echo "<option value='$record->id'>$record->name($record->desk_name Row-$record->desk_row)</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">বই গ্রহনের ধরন</label>
                                <div class="col-sm-6">
                                    <select name="payType" id="payType" class="form-control" onclick="getcube()">
                                        <option value='0'>পড়ার জন্য </option>
                                        <option value='1'>উপহারের জন্য</option>
                                        <option value='2'>বিক্রয়ের জন্য</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-sm-3 control-label">পরিমান</label>
                                <div class="col-sm-6"> 
                                    <input type="text" class="form-control" name="qty" id="qty" value="1">
                                </div>
                            </div>
                            <div id="price" style="display:none"><br>
                                <div class="form-group" >
                                    <label class="col-sm-3 control-label">ক্রয় মুল্য</label>
                                    <div class="col-sm-6"> 
                                        <input type="text" class="form-control" name="buyPrice"  readonly="readonly"  id="buyPrice" value="500">
                                    </div>
                                </div>
                                 <div class="form-group" >
                                    <label class="col-sm-3 control-label">বিক্রয় একক মুল্য</label>
                                    <div class="col-sm-6"> 
                                        <input type="text" class="form-control" name="unitPrice" id="unitPrice" value="0">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-sm-3 control-label">ডিসকাউন্ট</label>
                                    <div class="col-sm-6"> 
                                        <input type="text" class="form-control" name="discount" id="discount" value="0">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-sm-3 control-label">প্রদত্ত টাকা</label>
                                    <div class="col-sm-6"> 
                                        <input type="text" class="form-control" name="paidAmount" readonly="readonly" id="paidAmount" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="issueStartDate">
                                <label class="col-sm-3 control-label">নেওয়ার তারিখ</label>
                                <div class="col-sm-6">
                                    <input type="text" class="datepicker form-control" name="issueStartDate" data-validate="required" placeholder="yyyy-mm-dd" data-message-required="Value Required" value="">
                                </div>
                            </div>
                            <div class="form-group" id="issueEndDate">
                                <label class="col-sm-3 control-label">ফেরত দেওয়ার তারিখ</label>
                                <div class="col-sm-6">
                                    <input type="text" class="datepicker form-control" name="issueEndDate" data-validate="required" placeholder="yyyy-mm-dd" data-message-required="Value Required" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" name="storeBookRequest" class="btn btn-info">সংরক্ষন</button>
                                </div>
                            </div>
                        </form>
                  </div>
              
                </div>
                <!----CREATION FORM ENDS--->
                <!----CREATION FORM STARTS---->
                <div class="tab-pane box" id="return" style="padding: 5px"> 
                    <div class="box-content">

                        <form action="store.php" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
                            <input type="hidden" name="status" value="2">
                            <input type="hidden" name="issueStartDate" value="<?php echo date('Y-m-d')?>">
                            <input type="hidden" id="requestId" value="">
                            <input type="hidden" name="issueEndDate">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">অনুরোধকারী</label>
                                <div class="col-sm-6">
                                    <select name="requestedBy" id="requestedByReturn" class="form-control select2" data-placeholder="Select a Requested ID" tabindex="-1" required>
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
                                <label class="col-sm-3 control-label">বই</label>
                                <div class="col-sm-6" id="bookIdReturnLoad">
                                    <select name="bookId" id="bookIdReturn" class="form-control select2" data-placeholder="Select a Book" tabindex="-1" required>
                                        <?php
                                        foreach ($allBookData as $record){
                                            echo "<option value='$record->id'>$record->name($record->desk_name Row-$record->desk_row)</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">বই গ্রহনের ধরন</label>
                                <div class="col-sm-6">
                                    <select name="payType" id="payTypeReturn" class="form-control" onclick="getcubeReturn()">
                                        <option value='0'>পড়ার জন্য </option>
                                        <option value='1'>উপহারের জন্য</option>
                                        <option value='2'>বিক্রয়ের জন্য</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-sm-3 control-label">পরিমান</label>
                                <div class="col-sm-6"> 
                                    <input type="text" class="form-control" name="qty" id="qtyReturn" value="1">
                                </div>
                            </div>
                            <div id="priceReturn" style="display:none"><br>
                                <div class="form-group" >
                                    <label class="col-sm-3 control-label">ক্রয় মুল্য</label>
                                    <div class="col-sm-6"> 
                                        <input type="text" class="form-control" name="buyPrice"  readonly="readonly"  id="buyPriceReturn" value="500">
                                    </div>
                                </div>
                                 <div class="form-group" >
                                    <label class="col-sm-3 control-label">বিক্রয় একক মুল্য</label>
                                    <div class="col-sm-6"> 
                                        <input type="text" class="form-control" name="unitPrice" id="unitPriceReturn" value="0">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-sm-3 control-label">ডিসকাউন্ট</label>
                                    <div class="col-sm-6"> 
                                        <input type="text" class="form-control" name="discount" id="discountReturn" value="0">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-sm-3 control-label">প্রদত্ত টাকা</label>
                                    <div class="col-sm-6"> 
                                        <input type="text" class="form-control" name="paidAmount" readonly="readonly" id="paidAmountReturn" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" name="storeBookRequest" class="btn btn-info">সংরক্ষন</button>
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
        
    function getcube(){
        var payType=document.getElementById("payType").value;
        if(payType==2) {
          $("#price").show();
          $("#issueStartDate").hide();
          $("#issueEndDate").hide();
        }  
        else {
          $("#price").hide();
          $("#issueStartDate").show();
          $("#issueEndDate").show();
          $('#unitPrice').val(0);
          $('#discount').val(0);
          $('#paidAmount').val(0);
        }
    }
    
    
    function getcubeReturn(){
        var payTypeReturn=document.getElementById("payTypeReturn").value;
        if(payTypeReturn==2) {
          $("#priceReturn").show();
        }  
        else {
          $("#priceReturn").hide();
        }
    }

</script>

<!-- Footer -->

<?php
} else {
    include '../index/dashboard_error.php';
}
?>
<?php include '../index/footer.php' ?> 

<script type="text/javascript" language="javascript">

          $('#discount,#qty,#unitPrice,#discount').keyup(function(){ 
             
                var paidAmount = parseFloat($('#paidAmount').val()) || 0;
                if(paidAmount<0){
                    alert('Amount is incorrect');
                    $('#paidAmount').val(0);
                    return ; 
                }
                
                var qty = parseFloat($('#qty').val()) || 0;
                var unitPrice = parseFloat($('#unitPrice').val()) || 0;
                var discount = parseFloat($('#discount').val()) || 0;
                var amount = (qty*unitPrice)-discount;
               $('#paidAmount').val(amount);
              
          });
            
            $('#buyPrice').click(function(){
                var buyPrice = parseFloat($('#buyPrice').val()) || 0; 
                $('#unitPrice').val(buyPrice);
            });
            
            $('#bookId,#payType').click(function(){
              var bookId = parseFloat($('#bookId').val()) || 0;
                $.get("unit_price.php?itemId="+bookId, function(data) {
                        $('#buyPrice').val(data); 
                    });
             });
            
 </script>
 <script type="text/javascript" language="javascript">
      //return page
          $('#discountReturn,#qtyReturn,#unitPriceReturn').keyup(function(){ 
             
                var paidAmount = parseFloat($('#paidAmountReturn').val()) || 0;
                if(paidAmount<0){
                    alert('Amount is incorrect');
                    $('#paidAmountReturn').val(0);
                    return ; 
                }
                
                var qty = parseFloat($('#qtyReturn').val()) || 0;
                var unitPrice = parseFloat($('#unitPriceReturn').val()) || 0;
                var discount = parseFloat($('#discountReturn').val()) || 0;
                var amount = (qty*unitPrice)-discount;
               $('#paidAmountReturn').val(amount);
              
          });
            
            $('#buyPriceReturn').click(function(){
                var buyPrice = parseFloat($('#buyPriceReturn').val()) || 0; 
                $('#unitPriceReturn').val(buyPrice);
            });
            
            $('#bookIdReturn,#payTypeReturn').click(function(){
              var bookId = parseFloat($('#bookIdReturn').val()) || 0;
                $.get("load.php?pageType=bookSell&itemId="+bookId, function(data) {
                        $('#buyPriceReturn').val(data); 
                    });
             });
            
            $('#requestedByReturn').click(function(){
            var requestedByReturn = $('#requestedByReturn').val();
            var display = "load.php?pageType=bookReturn&requestedByReturn="+requestedByReturn;
            $('#bookIdReturnLoad').load(display);
            });
            
             $('#bookIdReturn').click(function(){
            var bookIdReturn = $('#bookIdReturn').val();
            var display = "load.php?pageType=returnType&bookIdReturn="+bookIdReturn;
           // var display = "load.php?pageType=bookReturn&requestedByReturn=210002";
            $('#bookIdReturnLoad').load(display);
           // alert(requestedByReturn);
            }); 
            
            
            
            $.get("load.php?pageType=bookSell&itemId="+bookId, function(data) {
                         $('#requestId').val(data);
                    });
                    
 </script>