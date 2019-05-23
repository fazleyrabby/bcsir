<?php
if(!isset($_SESSION) )session_start();
if (isset($_SESSION['email'])) {
	//echo "<script language= 'JavaScript'>alert('Your Username Or Password Wrong!');</script>";
	echo "<script> location.replace('./dashboard.php'); </script>";
	exit();
}
$insName="S@iBON SOFT";
    $msg=$style='';
    if(isset($_SESSION['loginMsg'])){  
        $msg = $_SESSION['loginMsg'];
        $style = 'style="display: block; height: auto;"';
    }
?>

<!DOCTYPE html>  
<html lang="en">
<head>
		<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="S@iBON IMS Admin Panel" />
	<meta name="author" content="" />
	
	<title>লাইব্রেরী ম্যানেজমেন্ট সিস্টেম </title>
	

	<link rel="stylesheet" href="../../resources/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="../../resources/assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="../../resources/assets/css/bootstrap.css">
	<link rel="stylesheet" href="../../resources/assets/css/neon-core.css">
	<link rel="stylesheet" href="../../resources/assets/css/neon-theme.css">
	<link rel="stylesheet" href="../../resources/assets/css/neon-forms.css">
	<link rel="stylesheet" href="../../resources/assets/css/custom.css">

	<script src="../../resources/assets/js/jquery-1.11.0.min.js"></script>
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
	<!--[if lt IE 9]><script src="../../resources/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="../../resources/assets/images/favicon.png">
	
</head>
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = './';
</script>

  <style>
.login-page{
	/* background: none !important; */
}
#datepicker input:hover{cursor: pointer;}
footer {
    background-color: mintcream;
    opacity: 0.9;
    border-bottom: 1px solid #474646;
    border-top: 1px solid #474646;
    line-height: 24px;
    vertical-align: middle;
    width: 100%;
    margin-top: 30px;
}
#chartdiv {
  width: 100%;
  height: 200px;
}
input[type="submit"].button{
    height: auto;
    padding: 0 20px;
    color: #fff;
}

body {
    /*background-image:  url(https://bcsir.eserve.org.bd/front-end/images/back_4.png);*/
    background-image:  url(https://bcsir.eserve.org.bd/front-end/images/back_4.png) !important;
	background-repeat: repeat-y repeat-x;
	color: black !important;
}
h3, h4, h6{
    font-weight: bold;
}
h6{
    font-size: 14px;
}
ul{
    list-style-type: none;
}
.img-thumbnail{
    border: none;
}
.required-star:after{
    color: red;
    content: " *";
}
</style>


<div class="container" style="margin-top:30px;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1" style="background: snow;padding:20px;margin-top: 18px; margin-bottom: 18px; border-radius:8px;">
           <a href="../../../" class="btn btn-danger">প্রথম পাতা</a>
           	<div class="login-content" style="width:100%;">
			
			<a href=" " class="logo">
				<img src="../uploads/footer-logo.png" height="120" alt="" />
			</a>
			
			<p class="description">
            	<h2 style="color:black; font-weight:100;">
				<?php //echo $insName?>লাইব্রেরী ম্যানেজমেন্ট সিস্টেম</h2>
           </p> 
			
			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>logging in...</span>
			</div>
		</div>
			<hr>
			<div class="login-progressbar">
		<div></div>
	</div>
         
            <div class="col-md-6 col-sm-6">      
                      
                <!-- <div id="chartdiv"></div> -->
                 <div class="text-center">
                  <img src="../uploads/library_form.png" alt="" width="100%">                </div>
                <div class="clearfix"></div>
            
                
                <div class="clearfix"></div>
			</div>
				<div class="form-login-error" <?php echo $style?>> <h3>Invalid login</h3> <p><?php echo $msg?></p> </div>
            <div class="col-md-6 col-sm-6" style="border-left:1px grey dotted;">
                <form method="post" role="form" action ="" id="form_login" class="form-horizontal">

                <fieldset>
                	<!-- <input name="username" type="text" class="input username" value="Username" placeholder="ইউজার নেইম" onfocus="this.value=''" /><input name="password" type="password" class="input password" value="Password" placeholder="পাসওয়ার্ড" onfocus="this.value=''" /> -->
    
                    <div class="form-group has-feedback ">
                        <label class="col-lg-4 text-left required-star">ইউজার নেইম</label>

                        <div class="col-lg-8">
							<!--USERNAME-->
							<!-- <input name="username" type="text" class="form-control input username" value="Username" placeholder="ইউজার নেইম" onfocus="this.value=''" /> -->
							<!--END USERNAME-->
							<input type="text" class="form-control" name="email" id="email" placeholder="ইউজার নেইম" autocomplete="off" data-mask="email" />

                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                       </div>
                    </div>
                    <div class="form-group has-feedback ">
                    
                        <label class="col-lg-4 text-left  member_email required-star" >পাসওয়ার্ড </label>
                        <div class="col-lg-8">
							<!--PASSWORD-->
							<!-- <input name="password" type="password" class="form-control input password" value="Password" placeholder="পাসওয়ার্ড" onfocus="this.value=''" /> -->
							<!--END PASSWORD-->
							<input type="password" class="form-control" name="password" id="password" placeholder="পাসওয়ার্ড" autocomplete="off" />
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            <span id="alert"></span>
                        </div>
                    </div>

                    <div class="form-group has-feedback ">
                      <label class="col-lg-4 text-left" ></label>
                        <div class="col-lg-8">
                            <input style="transition: all .2s;border-radius: 3px;border: solid 2px #666;height: auto;padding: 0 20px;color: #fff;background-color: #303030;line-height: 35px;" type="submit" name="submit" value="লগইন" class="button"/>
                        </div>
                    </div>

                     
                    
                    <hr>
                	
			<div class="login-bottom-links text-center">
				<a href="#" class="link" style='color:black'>
				পাসওয়ার্ড ভুলে গেছেন?
				</a>
			</div>
                </fieldset>
        
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>


	<!-- Bottom Scripts -->
	<script src="../../resources/assets/js/gsap/main-gsap.js"></script>
<!--	<script src="../../resources/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="../../resources/assets/js/bootstrap.js"></script>
	<script src="../../resources/assets/js/joinable.js"></script>
	<script src="../../resources/assets/js/resizeable.js"></script>-->
	<!--<script src="../../resources/assets/js/neon-api.js"></script>-->
	<script src="../../resources/assets/js/jquery.validate.min.js"></script>
	<script src="../../resources/assets/js/neon-login.js"></script><!--
	<script src="../../resources/assets/js/neon-custom.js"></script>
	<script src="../../resources/assets/js/neon-demo.js"></script>-->
<script>
am4core.useTheme(am4themes_animated);
var chart = am4core.create("chartdiv", am4charts.XYChart);
chart.data = [{
  "year": "January 2018",
  "visits": 2025
}, {
  "year": "March 2018",
  "visits": 1882
}, {
  "year": "July 2018",
  "visits": 1809
}, {
  "year": "October 2018",
  "visits": 1322
}];

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "year";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.minGridDistance = 30;
categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
  if (target.dataItem && target.dataItem.index & 2 == 2) {
    return dy + 25;
  }
  return dy;
});

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.valueY = "visits";
series.dataFields.categoryX = "year";
series.name = "Visits";
series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
series.columns.template.fillOpacity = .8;

var columnTemplate = series.columns.template;
columnTemplate.strokeWidth = 2;
columnTemplate.strokeOpacity = 1;
</script>
</body>
</html>
<?php session_destroy(); ?>