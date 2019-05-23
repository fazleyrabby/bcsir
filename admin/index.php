<?php include '../header.php'; ?>
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

  <style>
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
    background-image:  url(https://bcsir.eserve.org.bd/front-end/images/back_4.png);
    background-repeat: repeat-y repeat-x;
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
        <div class="col-md-10 col-md-offset-1" style="background: snow; opacity:0.7;padding:20px;margin-top: 18px; margin-bottom: 18px; border-radius:8px;">
       <a href="<?=$baseurl?>" class="btn btn-danger">প্রথম পাতা</a>
            <p class="text-center" style="font-size: 20px"><strong>লগইন করুন&nbsp;&nbsp;&nbsp;(অনলাইন সেবা সংক্রান্ত)</strong></p>
            <hr>
         
            <div class="col-md-6 col-sm-6">      
                <!-- <div id="chartdiv"></div> -->
                <div class="text-center">
                <!-- <p>
                      ফর্মে আপনার ব্যবহারকারী নাম  এবং পাসওয়ার্ড দিয়ে লগইন করুন 
                    </p> -->
                <img src="<?=$baseurl?>images/login_p.png" alt="">
                    
                </div>
                
                <div class="clearfix"></div>
            </div>
            <div class="col-md-6 col-sm-6" style="border-left:1px grey dotted;">
                <form method="POST" action="login_action.php" accept-charset="UTF-8" class="form-horizontal" id="reg_form">

                <fieldset>
                	<!-- <input name="username" type="text" class="input username" value="Username" placeholder="ব্যবহারকারী নাম " onfocus="this.value=''" /><input name="password" type="password" class="input password" value="Password" placeholder="পাসওয়ার্ড" onfocus="this.value=''" /> -->
    
                    <div class="form-group has-feedback ">
                        <label class="col-lg-4 text-left required-star">ব্যবহারকারী নাম </label>

                        <div class="col-lg-8">
                            <!--USERNAME--><input name="username" type="text" class="form-control input username" value="Username" placeholder="ব্যবহারকারী নাম " onfocus="this.value=''" /><!--END USERNAME-->
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                       </div>
                    </div>
                    <div class="form-group has-feedback ">
                    
                        <label class="col-lg-4 text-left  member_email required-star" >পাসওয়ার্ড </label>
                        <div class="col-lg-8">
                            <!--PASSWORD--><input name="password" type="password" class="form-control input password" value="Password" placeholder="পাসওয়ার্ড" onfocus="this.value=''" /><!--END PASSWORD-->
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            <span id="alert"></span>
                        </div>
                    </div>

                    <div class="form-group has-feedback ">
                      <label class="col-lg-4 text-left" ></label>
                        <div class="col-lg-8">
                            <input type="submit" name="submit" value="লগইন" class="button"/>
                        </div>
                    </div>
                    
                    <hr>
                     <div class="form-group">
                        <div class="col-lg-12 col-lg-offset-2">
                        কোনো একাউন্ট নেই?<b><a href="signup.php" class="">  এখানে নিবন্ধন করুন</a></b>
                        </div>
                    </div>
                </fieldset>
        
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<?php include '../footer.php';
?>

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

