

        <footer class="footer full-color">
            <section id="bottom">
                <div class="section-inner">
                    <div class="container">
                        <div class="row normal-sidebar">
                            <div class="col-md-3  widget widget-nav-menu">
                                <div class=" widget-inner">
                                    <h2 class="widget-title maincolor1">গুরুত্বপূর্ণ লিংক</h2>
                                    <div class="menu-law-business-container footer_contain">
                                        <ul id="menu-law-business" class="menu">
                                            <?php
                                            
                                            $cat="select catagory_id,catagory_title,template_type from catagory where useful_menu=1 and menu_st=1";
                                            $catp=mysqli_query($conn,$cat);
                                            if($catp==true)
                                                {
                                                $catpc=mysqli_num_rows($catp);
                                                if($catpc > 0){
                                                while($cd=mysqli_fetch_array($catp))
                                                    {
                                                      
                                                    $catagory_id=$cd['0'];
                                                    $catagory_title=$cd['1'];
                                                    //$template_type=$cd['3'];
                                                   
                                                    echo"<li class='menu-item menu-item-type-custom menu-item-object-custom menu-item-1280'>
                                                                <a href='page.php?page_id=$catagory_id'>
                                                                $catagory_title 
                                                                </a>                                       
                                                            </li>"; 
                                                            }
                                                        }
                                                    } 
                                                   ?>
                                                 
                                        </ul>
                                    </div>
                                </div>
                            </div>

                                <div class=" col-md-3  widget widget-nav-menu">
                                <div class=" widget-inner">
                                    <h2 class="widget-title maincolor1">আভ্যন্তরীণ ই-সেবা</h2>
                                    <div class="menu-higher-education-container footer_contain">

                                        <ul id="menu-higher-education" class="menu">
                                            <?php
                                           // $i=0;
                                            $cat="select catagory_id,catagory_title from catagory where internal_esheba_footer=1 and menu_st=1";
                                            $catp=mysqli_query($conn,$cat);
                                            if($catp==true)
                                                {
                                                    $catpc=mysqli_num_rows($catp);
                                                    if($catpc > 0)
                                                    { 
                                                    while($cd=mysqli_fetch_array($catp))
                                                    {
                                                  //  $i+=1;  
                                                    $catagory_id=$cd['0'];
                                                    $catagory_title=$cd['1'];
                                                    //$template_type=$cd['3'];
                                                   
                                                    echo"<li class='menu-item menu-item-type-custom menu-item-object-custom menu-item-1280'>
                                                                <a href='page.php?page_id=$catagory_id'>
                                                                $catagory_title 
                                                                </a>                                       
                                                            </li>"; 
                                                    }
                                                }
                                                else {
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                         <div class="col-md-3  widget widget-nav-menu">
                                <div class=" widget-inner">
                                    <h2 class="widget-title maincolor1">বৈশিষ্ট্যযুক্ত লিঙ্ক</h2>
                                    <div class="menu-law-business-container footer_contain">
                                        <ul id="menu-law-business" class="menu">
                                            <?php
                                            
                                            $cat="select catagory_id,catagory_title,mparent,template_type from catagory where characteristics_footer=1 and menu_st=1";
                                            $catp=mysqli_query($conn,$cat);
                                            if($catp==true)
                                                {
                                                    $catpc=mysqli_num_rows($catp);
                                                    if($catpc > 0){
                                                    while($cd=mysqli_fetch_array($catp))
                                                    {
                                                     
                                                    $catagory_id=$cd['0'];
                                                    $catagory_title=$cd['1'];
                                                    //$template_type=$cd['3'];
                                                   
                                                    echo"<li class='menu-item menu-item-type-custom menu-item-object-custom menu-item-1280'>
                                                                <a href='page.php?page_id=$catagory_id'>
                                                                $catagory_title 
                                                                </a>                                       
                                                            </li>"; 
                                                    }

                                                   }
                                               } 
                                               else {

                                               }
                                       ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-md-3  widget widget-nav-menu">
                                <div class=" widget-inner">
                                    <h2 class="widget-title maincolor1">অন্যান্য লিংক</h2>
                                    <div class="menu-higher-education-container footer_contain">
                                        <ul id="menu-higher-education" class="menu">
                                            <?php
                                            
                                            $cat="select catagory_id,catagory_title,mparent,template_type from catagory where extra_link_footer=1 and menu_st=1";
                                            $catp=mysqli_query($conn,$cat);
                                            if($catp==true)
                                                {
                                                    $catpc=mysqli_num_rows($catp);
                                                    if($catpc==0)
                                                    {
                                            ?>
                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1294">
                                                <a href="#">ওয়েবসাইট নীতিগুলি</a>
                                            </li>
                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1295">
                                               <a href="#">ফিডব্যাক </a>
                                            </li>
                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1296">
                                                <a href="#">সাইট ক্রেডিট</a>
                                            </li>
                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1297">
                                                  <a href="#">পাবলিক অভিযোগ</a>
                                            </li>
                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1298">
                                                <a href="#">দাবি পরিত্যাগী</a>
                                            </li>
                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1299">
                                                <a href="#">প্রাইভেসী  এন্ড  পলিসি </a>
                                            </li>
                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1300">
                                                <a href="#">যোগাযোগ</a>
                                            </li>
                                            <?php 
                                        }
                                        else
                                        {
                                        while($cd=mysqli_fetch_array($catp))
                                            {
                                            
                                            $catagory_id=$cd['0'];
                                            $catagory_title=$cd['1'];
                                            $template_type=$cd['3'];
                                           
                                            echo"<li class='menu-item menu-item-type-custom menu-item-object-custom menu-item-1280'>
                                                        <a href='page.php?page_id=$catagory_id'>
                                                        $catagory_title 
                                                        </a>                                       
                                                    </li>"; 
                                            }
                                           } 
                                       }?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                      
                    </div>
                </div>
            </section>

            <div id="bottom-nav">
                <div class="container">
                    <div class="link-center">
                        <div class="line-under"></div>
                        <a class="flat-button go-top-v1 style1" href="#top">TOP</a>
                    </div>
                    <div class="row footer-content">
                        <div class="copyright col-md-6">
                            কপিরাইট © 2019 বিসিএসআইআর চট্টগ্রাম, সর্বস্বত্ব সংরক্ষিত। <br>
                             কারিগরি সহায়তায়  <a href="http://rcreation-bd.com" target="_blank">R-Creation</a> 
                        </div>
                        <nav class="col-md-6 footer-social">
                         <style>
                         .counter{
                                font-size: 16px;
                                font-weight: 700;
                         }
                         .counter>span{
                            background: #1C1C1C;
                            letter-spacing: 6px;
                            color: #fff;
                            font-size: 20px;
                            padding: 2px;
                            border: 3px double #887676;
                            /* text-shadow: -1px 0 white, 0 1px white, 2px 0 white, 0 -1px white; */
                         }
                         </style>

                            <ul class="social-list"> 
                            
                                <!-- <li>
                                    <a href="#" class="btn btn-default social-icon">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>    
                                    <a href="#" class="btn btn-default social-icon">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="btn btn-default social-icon">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li> -->
                            </ul> 
 
 
<!-- <br><h3>Unique Visit Counter</h3> -->

<!-- This value Shows Unique Visit Count</center> -->
                        </nav>
                    </div><!--/row-->
                </div><!--/container-->
            </div>
        </footer>

        <!-- Javascript -->
        <script type="text/javascript" src="<?=$baseurl?>javascript/jquery.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?=$baseurl?>javascript/jquery.easing.js"></script>
        
        <script type="text/javascript" src="<?=$baseurl?>javascript/owl.carousel.js"></script>
        <script type="text/javascript" src="<?=$baseurl?>javascript/parallax.js"></script>
        <script type="text/javascript" src="<?=$baseurl?>javascript/jquery.tweet.min.js"></script>
        <script type="text/javascript" src="<?=$baseurl?>javascript/jquery.matchHeight-min.js"></script>
        <script type="text/javascript" src="<?=$baseurl?>javascript/jquery-validate.js"></script>
        <script type="text/javascript" src="<?=$baseurl?>javascript/jquery-waypoints.js"></script> 
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        
        <script type="text/javascript" src="<?=$baseurl?>javascript/jquery.cookie.js"></script>
        <script type="text/javascript" src="<?=$baseurl?>javascript/main.js"></script>   
        <script type="text/javascript" src="<?=$baseurl?>javascript/jquery.easy-ticker.js"></script>   
        <script type="text/javascript" src="<?=$baseurl?>javascript/jquery.easing.min.js"></script> 
        <script type="text/javascript" src="<?=$baseurl?>javascript/jquery.flexslider-min.js"></script> 
        <!-- <script type="text/javascript" src="</?=$baseurl?>javascript/sweet_alert.js"></script>  -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

       

       <script src="<?=$baseurl?>admin/admin/public/zebra_datepicker.js"></script> 
       <script src="<?=$baseurl?>javascript/jquery.bongabdo.js"></script>
       <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
       <!-- <script src="</?=$baseurl?>javascript/data-tables/DT_bootstrap.js"></script>
       <script src="</?=$baseurl?>javascript/data-tables/jquery.dataTables.js"></script>
       <script src="</?=$baseurl?>javascript/dynamic-table.js"></script> -->
     
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script> -->
  
    </div>



<script type="text/javascript">
// var theLang = jQuery(this).attr('data-lang');
// $(".paginate_button").addClass("notranslate");
// $('').addClass("");
// var dr = $('.item-excerpt').html();
// var res = dr.replace("ড.", "Dr.");
// $('.item-excerpt').html(res);

// $("body").html($("body").html().replace(/ড./g,'Dr.'));


    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: '', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT}, 'google_translate_element');
    }

	// function triggerHtmlEvent(element, eventName) {
	//   var event;
	//   if (document.createEvent) {
	// 	event = document.createEvent('HTMLEvents');
	// 	event.initEvent(eventName, true, true);
	// 	element.dispatchEvent(event);
	//   } else {
	// 	event = document.createEventObject();
	// 	event.eventType = eventName;
	// 	element.fireEvent('on' + event.eventType, event);
	//   }
	// }

	jQuery('.lang-select').click(function() {
	  var theLang = jQuery(this).attr('data-lang');
      jQuery('.goog-te-combo').val(theLang);
      
      
      console.log(theLang);
      
	  //alert(jQuery(this).attr('href'));
	  window.location = jQuery(this).attr('href');
      location.reload();

    //   if (theLang == 'en') {
    //     var dr = $('.item-excerpt').html();
    //     var res = dr.replace("ড.", "Dr.");
    //     $('.item-excerpt').html(res);
    //   }
    
      
     

    });
    
    
  </script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script>

    $(document).ready(function() {
    $('#example').DataTable();
});

    </script>
<script>
$(document).ready(function() {
    $('#scientist').DataTable( {
        initComplete: function () {
            this.api().columns('.desg').every( function () {
                var column = this;
                var select = $('<select><option value="" readonly>পদবী</option></select>')
                    .appendTo( $(column.header()).empty() )
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
} );
</script>
<script>
// $(document).ready(function() {
//     var table = $('#employee').DataTable();
    
//     $("#employee thead .filter th").each( function ( i ) {
//         var select = $('<select><option value=""></option></select>')
//             .appendTo( $(this).empty() )
//             .on( 'change', function () {
//                 table.column( i )
//                     .search( $(this).val() )
//                     .draw();
//             } );
//         table.column( i ).data().unique().sort().each( function ( d, j ) {
//             select.append( '<option value="'+d+'">'+d+'</option>' )
//         } );
//     } );
// } );

$(document).ready(function() {
    $('#employee').DataTable( {
        initComplete: function () {
            this.api().columns('.desg').every( function () {
                var column = this;
                var select = $('<select><option value="" readonly>পদবী</option></select>')
                    .appendTo( $(column.header()).empty() )
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
} );
</script>
        <script>
             $('.demo1').easyTicker({
        direction: 'up'
    });
        </script>


<script>
// var today = new Date();
// var dd = today.getDate();
// var mm = today.getMonth()+1;
// var yyyy = today.getFullYear();
// if(dd<10) {
//     dd = '0'+dd
// }
// if(mm<10) {
//     mm = '0'+mm
// }
// today = dd + '/' + mm + '/' + yyyy;
// $("#current_date").val(today);
</script>

<script type="text/javascript">
    $(document).ready(function(){
    $('.bongabdo').bongabdo({

});
    });

var visible = true;
setInterval(function(){

    if(visible)
    {
        $('.bongabdo').show();
        $('.eng_date').hide();
        visible=false
    }else
    {
        $('.bongabdo').hide();
        $('.eng_date').show();
        visible=true
    }

},1900);
</script>

<script>

$(function() {
    var typeSelector = $('#type');
    var toggleArea = $('#address-view');
    toggleArea.hide();
    typeSelector.change(function(){
        if (typeSelector.val() == 6 || typeSelector.val() == 7) {
            toggleArea.show();
        }
        else {
            toggleArea.hide();
        }
    });
});


$(function(){
    var required_star = $('.required_star');
    var typeSelector = $('#type');
    var institute_name = $('#institute_name');
    required_star.hide();
    typeSelector.change(function(){
       if (typeSelector.val() == 6) { //for sturdent
        institute_name.prop('required',true);
        required_star.show();
       }
       else{
        institute_name.prop('required',false);
        required_star.hide();
       }
    });
});

$(function () {
  $("#datepicker").datepicker();
});

</script>


<script>
function checkPass() {
    var password = $("#password");
    var confirmPassword = $("#re_password");
    var message = $("#confirmMessage");
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    var fontSize = "15px";
    var fontWeight = "700";

    if (password.val() == confirmPassword.val())
       {
        confirmPassword.css({'background-color': goodColor});
        message.css({'color': goodColor, 'font-size': fontSize, 'font-weight' : fontWeight});
        message.text("পাসওয়ার্ড মিলেছে!");
       }
    else
    {
        confirmPassword.css({'background-color': badColor});
        message.css({'color': badColor,'font-size': fontSize, 'font-weight' : fontWeight});
        message.text("পাসওয়ার্ড মেলেনি!");
    }

}
</script>
<script>


	function checkmail()
	{
        var alert = $("#alert");
        var submit = $("#submit");
        var email = $('#email').val();
			$.ajax({
				type : 'POST',
				url  : 'data_validation.php',
				data : {email:email},
				success : function(data)
						  {
                             alert.html(data);
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





	function check_name()
	{
        var name = $('#name').val();
        var alert_u = $("#alert_u");
        var submit = $("#submit");

        // var name = $(this).val();
        // alert(name);
			$.ajax({
				type : 'POST',
                url  : 'usrnme.php',
				data : {name: name},
				success : function(data)
						  {
                             alert_u.html(data);
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


<!--script for this page only-->


</body>
</html>