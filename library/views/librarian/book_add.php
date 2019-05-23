<?php
require_once '../index/header.php';
$objBook = new \App\book\book();
$allBookData = $objBook->index();
$allDataBookCategory = $objBook->indexBookCategory();
$allDataBookSubCategory = $objBook->indexBookSubCategory();
$allDataAssistantCategory = $objBook->indexAassistantCategory();
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
$pageHeading ='নতুন বই যুক্ত করুন';
if($level==2 || $level==8) {
?>
<h3><i class="entypo-right-circled"></i><?php echo $pageHeading?></h3><hr />
<div class="row">
    <div class="col-md-12">
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active"> 
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>বই যুক্ত করুন</a></li>
        </ul>
        <!------CONTROL TABS END------>

        <div class="tab-content"> 
            <br>
            <!----CREATION FORM STARTS---->
            <div class="tab-pane box active" id="add" style="padding: 5px">
                <div class="box-content">
                    <form id="user_form" action="store.php" class="form-horizontal form-groups-bordered validate" target="_top" method="post" accept-charset="utf-8">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">বইয়ের শিরোনাম</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="name" data-validate="required" data-message-required="Value Required"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">লেখক</label>
                            <div class="col-sm-5">
                                <select name="authorId" class="form-control selectboxit" style="width:100%;">
                                    <option value="" style="display: none">লেখকের নাম নির্বাচন করুন</option>>
                                    <?php
                                    foreach ($allDataAuthor as $record){
                                        echo "<option value='$record->id'>$record->name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"> 
                            <label class="col-sm-3 control-label">অতিরিক্ত লেখক</label>
                            <div class="col-sm-5">
                                <select name="aditionalAuthorId" class="form-control selectboxit" style="width:100%;">
                                    <option value="" style="display: none">অতিরিক্ত লেখক নির্বাচন করুন</option>
                                    <?php
                                    foreach ($allDataAuthor as $record){
                                        echo "<option value='$record->id'>$record->name</option>";
                                    }
                                    ?>
                                </select>
                            </div> 
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">প্রকাশক</label>
                            <div class="col-sm-5">
                                <select name="publisherId" class="form-control selectboxit" style="width:100%;">
                                    <option value="" style="display: none">প্রকাশক এর নাম নির্বাচন করুন </option>>
                                    <?php
                                    foreach ($allDataPublisher as $record){
                                        echo "<option value='$record->id'>$record->name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">মুল্য</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="price" value="0"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">তাকের নাম</label>
                            <div class="col-sm-5">
                                <select name="deskId" class="form-control selectboxit" style="width:100%;">
                                    <option value="" style="display: none">তাকের  নাম নির্বাচন করুন</option> 
                                    <?php
                                    foreach ($allDataDesk as $record){
                                        echo "<option value='$record->id'>$record->name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">তাকের সারি</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" name="deskRow" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">  আই.এস.বি.এন নাম্বার </label>
                            <div class="col-sm-5"> 
                                <input type="text" class="form-control" name="callNo" /> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">সিরিজ</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="series" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">বিষয়</label>
                            <div class="col-sm-5">
                                <select name="bcId" id="bcId" class="form-control selectboxit" style="width:100%;" data-validate="required" data-message-required="Value Required">
                                    <option value="" style="display: none">একটি বিষয় নির্বাচন করুন </option>
                                    <?php
                                    foreach ($allDataBookCategory as $record){
                                        echo "<option value='$record->id'>$record->name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">ক্যাটাগরি</label>
                            <div class="col-sm-5">
                                <select name="bscId" id="bscId" class="form-control selectboxit" style="width:100%;" data-validate="required" data-message-required="Value Required">
                                    <option value="" style="display: none">একটি ক্যাটাগরি নির্বাচন করুন</option>
                                    <?php
                                    foreach ($allDataBookSubCategory as $record){
                                        echo "<option value='$record->id'>$record->name</option>";
                                    }
                                    ?> 
                                </select>
                            </div>
                        </div> 
                          <div class="form-group">
                            <label class="col-sm-3 control-label">সহায়ক ক্যাটাগরি</label> 
                            <div class="col-sm-5">  
                                <select name="bscIdAs" id="bscIdAs" class="form-control selectboxit" style="width:100%;" data-validate="required" data-message-required="Value Required">
                                    <option value="" style="display: none">একটি  সহায়ক ক্যাটাগরি নির্বাচন করুন</option
                                    <?php
                                    foreach ($allDataAssistantCategory as $record){
                                        echo "<option value='$record->id'>$record->name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="cId" style="display:none;">
                            <label class="col-sm-3 control-label">Class</label>
                            <div class="col-sm-5">
                                <select name="cId" class="form-control selectboxit" style="width:100%;">
                                    <option value="" style="display: none">Select a Class</option>
                                    <?php
                                    foreach ($allClassData as $record){
                                        echo "<option value='$record->c_id'>$record->c_name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">মোট কপি</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" name="totalCopies" value="1" required />
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-sm-3 control-label">বর্ননা </label>
                            <div class="col-sm-5">
                                <textarea class="form-control" rows="3" cols="50" name="description"></textarea>
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <label class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-5">
                                <select name="status" class="form-control selectboxit" style="width:100%;">
                                	<option value="available">Available</option>
                                	<option value="unavailable">Unavailable</option>
                                </select>
                            </div>
                        </div>--><input type="hidden" name ="storeBook" value="0"/>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" id="submit" class="btn btn-info"><?php echo $pageHeading?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!----CREATION FORM ENDS--->
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

<!-- Footer -->
<?php
} else {
    include '../index/dashboard_error.php';
}
?>
<?php require_once '../index/footer.php' ?>
<script>
 $(document).on('submit', '#user_form', function(event){
   //document.getElementById("submit").disabled = false;
    $("html, body").animate({
      scrollTop: 0
    }, 800);
    
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
        }
    }); 
});
</script>