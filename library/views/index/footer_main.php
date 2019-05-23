            <!-- Footer -->
            <footer class="main">
            	&copy; <?php echo date('Y')?> <strong> <?php echo $insName?></strong> Developed by <a href="<?php echo $comWeb?>" target="_blank"><?php echo $comName?></a>
            </footer>
		</div>
	</div>
        <script type="text/javascript">
	function showAjaxModal(url)
	{
		jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="../../resources/assets/images/preloader.gif" /></div>');
		
		jQuery('#modal_ajax').modal('show', {backdrop: 'true'});
		
		$.ajax({
			url: url,
			success: function(response)
			{
				jQuery('#modal_ajax .modal-body').html(response);
			}
		});
	}
	</script>
    
    <!-- (Ajax Modal)-->
    <div class="modal fade" id="modal_ajax">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><?php echo $insName ?></h4>
                </div>
                
                <div class="modal-body" style="height:500px; overflow:auto;">
                    
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
	function confirm_modal(delete_url)
	{
		jQuery('#modal-4').modal('show', {backdrop: 'static'});
		document.getElementById('delete_link').setAttribute('href' , delete_url);
	}
	</script>
    
    <!-- (Normal Modal)-->
    <div class="modal fade" id="modal-4">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
                </div>
                
                
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-danger" id="delete_link">delete</a>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

<!--<link rel="stylesheet" href="../../resources/assets/js/daterangepicker/daterangepicker-bs3.css">-->
<link rel="stylesheet" href="../../resources/assets/js/selectboxit/jquery.selectBoxIt.css">
<!--<link rel="stylesheet" href="../../resources/assets/js/wysihtml5/bootstrap-wysihtml5.css">-->
<link rel="stylesheet" href="../../resources/assets/js/datatables/responsive/css/datatables.responsive.css">
<link rel="stylesheet" href="../../resources/assets/js/select2/select2-bootstrap.css">
<link rel="stylesheet" href="../../resources/assets/js/select2/select2.css">

<!-- Bottom Scripts -->
<script src="../../resources/assets/js/gsap/main-gsap.js"></script>
<script src="../../resources/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="../../resources/assets/js/bootstrap.js"></script>
<script src="../../resources/assets/js/joinable.js"></script>
<script src="../../resources/assets/js/resizeable.js"></script>
<script src="../../resources/assets/js/neon-api.js"></script>
<script src="../../resources/assets/js/toastr.js"></script>
<script src="../../resources/assets/js/jquery.validate.min.js"></script>
<script src="../../resources/assets/js/fullcalendar/fullcalendar.min.js"></script>
<script src="../../resources/assets/js/bootstrap-datepicker.js"></script>
<script src="../../resources/assets/js/fileinput.js"></script>
<!--<script src="../../resources/assets/js/wysihtml5/wysihtml5-0.4.0pre.min.js"></script> 
<script src="../../resources/assets/js/wysihtml5/bootstrap-wysihtml5.js"></script>-->

<script src="../../resources/assets/js/jquery.dataTables.min.js"></script>
<script src="../../resources/assets/js/datatables/TableTools.min.js"></script>
<script src="../../resources/assets/js/dataTables.bootstrap.js"></script>
<script src="../../resources/assets/js/datatables/jquery.dataTables.columnFilter.js"></script>
<script src="../../resources/assets/js/datatables/lodash.min.js"></script>
<script src="../../resources/assets/js/datatables/responsive/js/datatables.responsive.js"></script>
<script src="../../resources/assets/js/select2/select2.min.js"></script>
<script src="../../resources/assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>

<script src="../../resources/assets/js/neon-calendar.js"></script>
<script src="../../resources/assets/js/neon-chat.js"></script>
<script src="../../resources/assets/js/neon-custom.js"></script>
<script src="../../resources/assets/js/neon-demo.js"></script>
<script src="../../resources/assets/js/neon-notes.js"></script> 
<script src="../../resources/assets/js/jquery.form.js"></script>
<!-- Print Page just use id="btnPrint" -->
<script src="../../resources/assets/js/jquery.printPage.js"></script> 

<script>  
$(document).ready(function() {
	$("#btnPrint").printPage();
	$("#btnPrint2").printPage();
	$("#btnPrint3").printPage();
	$("#btnPrint4").printPage();
	$("#btnPrint5").printPage();
	$("#btnPrint6").printPage();
	$("#btnPrint7").printPage();
	$("#btnPrint8").printPage();
	$("#btnPrint9").printPage();
	$("#btnPrint10").printPage();
});
</script>

<!-- SHOW TOASTR NOTIFIVATION -->
<script type="text/javascript">
	<?php echo "$msg_alert"; ?>
</script>

<!-----  DATA TABLE EXPORT CONFIGURATIONS ----->                      
<script type="text/javascript">

	jQuery(document).ready(function($)
	{
		var datatable = $("#table_export").dataTable();
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});

</script>

	<script>

		$('#deleteMultipleButton').click(function(){

			if(checkEmptySelection()){
				alert("Empty Selection! Please select some record(s) first")
			}
			else{
				var r = confirm("Are you sure you want to delete the selected record(s)?");

				if(r){
					var selectionForm =   $('#selectionForm');
					selectionForm.attr("action","../tdrp/delete_multiple.php?pageTable=<?php echo $table ?>");
					selectionForm.submit();
				}
			}
		});


	</script>

 
	<script>

		$("#select_all").change(function(){ 
			var status = this.checked;
			$('.checkbox').each(function(){ 
				this.checked = status; 
			});
		});

		$('.checkbox').change(function(){ 
			if(this.checked == false){ 
				$("#select_all")[0].checked = false; 
			}

			if ($('.checkbox:checked').length == $('.checkbox').length ){
				$("#select_all")[0].checked = true; 
			}
		});

	</script>

	<script>
		function checkEmptySelection(){

			emptySelection =true;

			$('.checkbox').each(function(){
				if(this.checked)   emptySelection = false;
			});

			return emptySelection;
		}


		$("#trashMultipleButton").click(function(){

			if(checkEmptySelection()){
				alert("Empty Selection! Please select some record(s) first")
			}else{
				$("#selectionForm").submit();
			}

		}) ;
	</script>
    </body>
    </html>