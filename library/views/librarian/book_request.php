<?php
require_once '../index/header.php';
$objBook = new \App\book\book();
$allBookRequestData = $objBook->indexBookRequest();
$objClass = new \App\cls\cls();
$allClassData = $objClass->index();
$allBookData = $objBook->index();
$objUser = new \App\User\User();
$allDataUser = $objUser->viewAllUsers();
$maxInvoice = $objAllDataQuery->indexByQuerySingleData("select MAX(invoice_id)+1 as invoice_id from book_request");
if($maxInvoice->invoice_id>0) $maxInvoice->invoice_id = $maxInvoice->invoice_id;
else $maxInvoice->invoice_id=1;
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
                <!--<li><a href="#return" data-toggle="tab"><i class="entypo-plus-circled"></i>বই ফেরত</a></li>-->
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
                            <th><div>রসিদ নং</div></th>
                            <th><div>বই সংগ্রহের তারিখ</div></th>
                            <th><div>একক মুল্য</div></th>
                            <th><div>পরিমান</div></th>
                            <th><div>মোট</div></th>
                            <th><div>অবস্থা</div></th>
                            <th><div>রশিদ</div></th>
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
                               <td>$record->invoice_id</td>
                                <td>$issue_start_date</td>
                                <td>$record->unit_price</td>
                                <td>$record->qty (কপি)</td>
                                <td>$record->paid_amount</td>
                                <td>$status</td>
                                
                                <td>
                                    <div class=\"btn-group\">
                                        <button type=\"button\" class=\"btn btn-default btn-sm dropdown-toggle\" data-toggle=\"dropdown\">
                                            কার্যক্রম<span class=\"caret\"></span>
                                        </button>
                                        <ul class=\"dropdown-menu dropdown-default pull-right\" role=\"menu\">
                                            <li>
                                                <a href=\"#\" onclick=\"window.open( 'voucher_print.php?invoiceId=$record->invoice_id', 'name', 'location=no,scrollbars=yes,status=no,toolbar=no,resizable=no, width=500,height=600' )\">
                                                 <i class=\"entypo-credit-card\"></i>
                                                    রসিদ দেখুন</a>
                                            </li>
                                            <!--<li> 
                                                <a href=\"#\" onclick=\"showAjaxModal('book_request_edit.php?id=$record->id');\">
                                                    <i class=\"entypo-pencil\"></i>
                                                    বই গ্রহন                                </a>
                                            </li>
                                            <li class=\"divider\"></li>
            
                                            <li>
                                                <a href=\"#\" onclick=\"confirm_modal('../tdrp/delete.php?id=$record->id&pageTable=$table');\">
                                                    <i class=\"entypo-trash\"></i>
                                                    মুছে ফেলুন                                </a>
                                            </li>-->
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

                        <form action="store.php" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
                            <input type="hidden" name="status" value="1">
                            <input type="hidden" name="payTypeSummery" value="1">
                            <input type="hidden" name="issueStartDate" value="<?php echo date('Y-m-d')?>">
                              <input type="hidden" name="issueEndDate" value="<?php echo date('Y-m-d')?>">
                               <input type="hidden" name="invoiceId" value="<?php echo $maxInvoice->invoice_id ?>">
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
                            <div class="col-sm-12">
                               <table class="table table-bordered" id="dynamic_field">
                                    <tbody>
                                    <tr>
                                        <td>ক্রম</td>
                                        <td>বইয়ের নাম</td>
                                        <td>নেওয়ার ধরন</td>
                                        <td>ক্রয় মূল্য</td>
                                        <td>বিক্রয় মূল্য</td>
                                        <td>পরিমান</td>
                                        <td>মোট মূল্য</td>
                                        <td><button type="button" name="add" id="add2" class="btn btn-success">Add More</button></td>
                                    </tr> 
                                    <tr id="row_0">
                                        <td>1</td>
                                        <td>
                                            <select name="bookId[]" id="bookId0" class="form-control bookId" onchange="unit_price(0)" required>
                                                  <option value="">একটি বই নির্বাচন করুন</option>
                                            <?php
                                            foreach ($allBookData as $record){
                                                echo "<option value='$record->id'>$record->name($record->desk_name Row-$record->desk_row)</option>";
                                            }
                                            ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="payType[]" id="payType0" class="form-control" oninput="hideField(0)">
                                              
                                                <option value='2'>বিক্রয়/ভাড়া</option>
                                                <option value='0'>পড়ার জন্য </option>
                                                <option value='1'>উপহারের জন্য</option> 
                                            </select>
                                        </td>
                                        <td><input type="number" class="form-control" name="buyPrice[]" id="buyPrice0" readonly="readonly"></td>
                                        <td><input type="number" class="form-control unitPrice" name="unitPrice[]"  id='unitPrice0' min="0" value="0" oninput="calculate(0)" onkeypress='validate(event)'></td>
                                        <td><input type="number" class="form-control qty" name="qty[]" id='qty0' min="0" value="1" oninput="calculate(0)" onkeypress='validate(event)'></td>
                                        <!--<td> <input type="text" required="required" name="qty" oninput="calculate('row_0')"></td>-->
                                        <td> <input type="number" class="form-control paidAmount" name="paidAmount[]" readonly="readonly" id="paidAmount0" min="0" value="0"></td>
                                        <td><button type="button" name="remove" id="0" class="btn btn-danger btn_remove">X</button></td>
                                   </tr>
                               </tbody>
                               <tfoot>
                                   
                                   <tr>
                                       <td>&nbsp;</td>
                                       <td>মোট:</td>
                                       <td><input type="text" name="totalSummery" readonly="readonly" class="form-control" id="sum" value="0"></td>
                                       <td>ছাড়:</td>
                                       <td><input type="text" name="discount" class="form-control discount3" id="discount3" value="0">
                                       <td>পরিশোধ:</td>
                                       <td><input type="text" name="paidableAmount" class="form-control" id="paidableAmount" value="0" readonly="readonly"></td>
                                       <td>&nbsp;</td>
                                    </tr>
                               </tfoot>
                               </table>
                               <!--<input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />-->
                           </div>
                       </div>
                            
                            <div class="form-group">
                                <div class="col-sm-5"><!--col-sm-offset-3-->
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
                                        <option value='2'>বিক্রয়/ভাড়া </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-sm-3 control-label">পরিমান</label>
                                <div class="col-sm-6"> 
                                    <input type="number" class="form-control" name="qty" id="qtyReturn" value="1">
                                </div>
                            </div>
                            <div id="priceReturn" style="display:none"><br>
                                <div class="form-group" >
                                    <label class="col-sm-3 control-label">ক্রয় মুল্য</label>
                                    <div class="col-sm-6"> 
                                        <input type="number" class="form-control" name="buyPrice"  readonly="readonly"  id="buyPriceReturn" value="500">
                                    </div>
                                </div>
                                 <div class="form-group" >
                                    <label class="col-sm-3 control-label">বিক্রয় একক মুল্য</label>
                                    <div class="col-sm-6"> 
                                        <input type="number" class="form-control" name="unitPrice" id="unitPriceReturn" value="0">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-sm-3 control-label">ডিসকাউন্ট</label>
                                    <div class="col-sm-6"> 
                                        <input type="number" class="form-control" name="discount" id="discountReturn" value="0">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-sm-3 control-label">প্রদত্ত টাকা</label>
                                    <div class="col-sm-6"> 
                                        <input type="number" class="form-control" name="paidAmount" readonly="readonly" id="paidAmountReturn" value="0">
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
        
/*    function getcube(){
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
    */
    
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

          $('#discount,#qty,#unitPrice').keyup(function(){ 
             
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
 <script type="text/javascript">
  
    $(document).ready(function(){
        var i=1;
        $('#add2').click(function(){
            i++;
            $('#dynamic_field').append('<tr id="row_'+i+'"><td>'+i+'</td>' +
                '<td><select name="bookId[]" id="bookId'+i+'" class="form-control bookId" onchange="unit_price('+i+')" required><option value="">একটি বই নির্বাচন করুন</option><?php foreach ($allBookData as $record){ echo "<option value=\"$record->id\">$record->name($record->desk_name Row-$record->desk_row)</option>";} ?></select></td>' +
                '<td> <select name="payType[]" id="payType'+i+'" class="form-control" oninput="hideField(\''+i+'\')" required> <option value="2"> বিক্রয়/ভাড়া</option><option value="0">পড়ার জন্য </option><option value="1">উপহারের জন্য</option></select></td>' +
                '<td><input type="number" class="form-control" name="buyPrice[]"  readonly="readonly"  id="buyPrice'+i+'"></td>' +
                '<td><input type="number" class="form-control unitPrice" name="unitPrice[]" id="unitPrice'+i+'" value="0" oninput="calculate(\''+i+'\')" onkeypress=\'validate(event)\'></td>' +
                '<td><input type="number" class="form-control qty" name="qty[]" id="qty'+i+'" value="1" oninput="calculate(\''+i+'\')"  onkeypress=\'validate(event)\'></td>' +
                '<td> <input type="number" class="form-control paidAmount" name="paidAmount[]" readonly="readonly" id="paidAmount'+i+'" value="0"></td>' +
                '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>'); 
                 
        });
        
        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row_'+button_id+'').remove();
        });
    });
</script>
 <script type="text/javascript">

    function hideField(elementID) { 
        var payType = parseFloat($('#payType'+elementID).val()) || 0; 
        if(payType==2) document.getElementById("unitPrice"+elementID).readOnly = false;
        else { document.getElementById("unitPrice"+elementID).readOnly = true;
         $("#unitPrice"+elementID).val(0); 
         $("#paidAmount"+elementID).val(0);    
        }
 }
  function calculate(elementID) { 
      var bookId = parseFloat($('#bookId'+elementID).val()) || 0;
      if(bookId=='') alert('অনুগ্রহ করে একটি বই নির্বাচন করুন');
      else{
        var qty = parseFloat($('#qty'+elementID).val()) || 0; 
        var unitPrice = parseFloat($('#unitPrice'+elementID).val()) || 0; 
       var total = qty*unitPrice;
         $('#paidAmount'+elementID+'').val(total);  
      }
 }
 function unit_price(elementID) { 
              var bookId = parseFloat($('#bookId'+elementID).val()) || 0; 
                $.get("load.php?pageType=bookSell&itemId="+bookId, function(data) { 
                        $('#buyPrice'+elementID+'').val(data);  
                    });
                    
 }
 function calculateSum() {
		var sum = 0;
		//iterate through each textboxes and add the values
		$(".paidAmount").each(function () {

			//add only if the value is number
			if (!isNaN(this.value) && this.value.length != 0) {
				sum += parseFloat(this.value);
			}

		});
		//.toFixed() method will roundoff the final sum to 2 decimal places
	//	$("#sum").html(sum.toFixed(2));
	$("#sum").val(sum.toFixed(0));
	}
	
	$("table").on("keyup", ".paidAmount,.unitPrice,.qty,.discount3", function () {
		calculateSum();
		var sum = parseFloat($('#sum').val()) || 0;
		var discount = parseFloat($('#discount3').val()) || 0;
	    var	paidableAmount = sum-discount;
		$("#paidableAmount").val(paidableAmount);
	});
</script>