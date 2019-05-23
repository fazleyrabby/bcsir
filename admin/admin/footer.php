   <!-- END CONTAINER -->

   <!-- BEGIN FOOTER -->
   <div id="footer">
      <?php echo date('Y')?> &copy;BCSIR . Developed by <a href='http://rcreation-bd.com'>R-creation</a>
   </div>
   <!-- END FOOTER -->

   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
       <script type="text/javascript" src="js/wz_tooltip.js"></script>
    <script type="text/javascript" src="js/tip_balloon.js"></script>

   <script src="js/jquery-1.8.3.min.js"></script>
   <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
   <script type="text/javascript" src="assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
   <script type="text/javascript" src="assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>

   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
   <script type="text/javascript" src="assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
      <script type="text/javascript" src="assets/bootstrap/js/bootstrap-fileupload.js"></script>
      <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
   <!-- <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script> -->

   <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

   <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
     <script src="js/dynamic-table.js"></script>
   <script type="text/javascript" src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
   <script src="js/jquery.scrollTo.min.js"></script>
   <script src="js/common-scripts.js"></script>


     <!-- <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script> -->
     <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
     <script src="js/sweet_alert.js"></script>
	 <script src="js/form-component.js"></script>
	 <script src="public/zebra_datepicker.js"></script>
	 <script src="public/core.js"></script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

$('#datepicker').Zebra_DatePicker();

$('#datepicker_salary').Zebra_DatePicker({
    format: 'Y-m',
});

$('#datepicker_salary_head').Zebra_DatePicker({
    format: 'Y-m',
});


</script>
<script>
	function check_serial()
	{
        var employee_serial = $('#employee_serial').val();
        // console.log(username);
        var employee_serial_error = $("#employee_serial_error");
        var submit = $("#submit");
        
        // var name = $(this).val();	
        // alert(name);
			$.ajax({
				type : 'POST',
                url  : 'user_check.php',
				data : {employee_serial: employee_serial},
				success : function(data)
						  {
                            
                              employee_serial_error.html(data);
                             if ( data == '') {
                                 submit.prop('disabled',false);
                             }
                             else {
                                 submit.prop('disabled',true);
                             }
					      }
				});
				return false;
		}

</script>
<script>
	function check_data()
	{
        var username = $('#username').val();
        console.log(username);
        var alert_box = $("#alert_box");
        var submit = $("#submit");
        
        // var name = $(this).val();	
        // alert(name);
			$.ajax({
				type : 'POST',
                url  : 'user_check.php',
				data : {username: username},
				success : function(data)
						  {
                              console.log(data);
                              alert_box.html(data);
                             if ( data == '') {
                                 submit.prop('disabled',false);
                             }
                             else {
                                 submit.prop('disabled',true);
                             }
					      }
				});
				return false;
			
		}
</script>

<script>
function checkPass() {
    console.log("clicked");
    var password = $("#password");
    var confirmPassword = $("#re_password");
    var message = $("#confirmMessage");
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    var fontSize = "15px";
    var fontWeight = "700";
    if (password.val() == confirmPassword.val())
    {
        confirmPassword.css({
            'background-color': goodColor
        });
        message.css({
            'color': goodColor, 
            'font-size': fontSize, 
            'font-weight' : fontWeight
        });
        message.text("Passwords Matched!");
    }
    else
    {
        confirmPassword.css({
            'background-color': badColor
        });
        message.css({
            'color': badColor,
            'font-size': fontSize, 
            'font-weight' : fontWeight
        });
        message.text("Passwords Not Matched!");
    }
    
}
</script>

<script>
var menutype = $("#menutype").val();
if (this) {
    $('.'+menutype).addClass('active_menu_type');
}
</script>

<script>
$('#search_data').DataTable({
        initComplete: function () {
            this.api().columns('.id').every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );

</script>


<script>

// $(document).ready(function() {
//     $('#page_table').DataTable( {
//         initComplete: function () {
//             this.api().columns('.type').every( function () {
//                 var column = this;
//                 var select = $('<select><option value="" readonly></option></select>')
//                     .appendTo( $(column.header()).empty() )
//                     .on( 'change', function () {
//                         var val = $.fn.dataTable.util.escapeRegex(
//                             $(this).val()
//                         );
  
//                         column
//                             .search( val ? '^'+val+'$' : '', true, false )
//                             .draw();
//                     } );
  
//                 column.data().unique().sort().each( function ( d, j ) {
//                     select.append( '<option value="'+d+'">'+d+'</option>' )
//                 } );
//             } );
//         }
//     } );
// } );

$(".media_type").change(function() {
    var filterValue = $(this).val();
    var row = $('.tr_row'); 
    // alert(filterValue);
    row.hide()
    row.each(function(i, el) {
         if($(el).attr('data-type') == filterValue) {
             $(el).show();
         }
    })

    // if (filterValue == 'all') {
    //     row.show()
    // }
     
});
</script>










<script>
    
// var colorId=$('#color_id').val();
// var color;
// var height;
// var lineHeight;
// $('.active_menu').show();
// if (colorId == 'profile_update') 
//     {
//         color = 'rgb(13, 174, 211)';
//         height = '50px';
//         lineHeight = '3';
//     }
// else if(colorId == 'dashboard')
//     {
//         height = '0px !important';
//     }
// else 
//     {
//         color=$('#'+colorId).css('background-color');
//         lineHeight = '3';
//         height = '50px';
//     }
   
//    $('.active_menu').css({"background-color": color, "height": height,"line-height": lineHeight,"font-size": "18px"});
//    console.log(colorId);
</script>
</body>

</html>