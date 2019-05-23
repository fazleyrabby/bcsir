<?php 
include 'admin/connect/config.php';
$baseurl = 'http://bcsirlabsctg.com.bd/';

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
  <title>বাংলাদেশ বিজ্ঞান ও শিল্প গবেষণা পরিষদ (বিসিএসআইআর)-গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</title>

  
<link rel="shortcut icon" href="<?=$baseurl?>images/favicon.ico" type="image/x-icon" />
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>stylesheets/bootstrap.css" >

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>stylesheets/style.css">

    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>stylesheets/responsive.css">
    
    <!-- Colors -->
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>stylesheets/colors/color1.css" id="colors">
    
    <!-- Animation Style -->
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>stylesheets/animate.css">
    <!-- theme style -->

    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>stylesheets/theme.css">
    <!-- style news -->
    <link rel="stylesheet" type="text/css" href="<?=$baseurl?>stylesheets/flexslider_new.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <!-- font-awsm -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Favicon and touch icons  -->
    <link href="<?=$baseurl?>icon/apple-touch-icon-48-precomposed.png" rel="apple-touch-icon-precomposed" sizes="48x48">
    <link href="<?=$baseurl?>icon/apple-touch-icon-32-precomposed.png" rel="apple-touch-icon-precomposed">
    <link href="#" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/hover.css/2.3.1/css/hover.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css"/>

       <link href="<?=$baseurl?>admin/admin/public/default.css" rel="stylesheet" type="text/css"/> 
     

  

</head>

<body class="header-sticky">

    <div class="boxed">

        <div class="menu-hover">
            <div class="btn-menu">
                <span></span>
            </div><!-- //mobile menu button -->
        </div>

        <div class="header-inner-pages">
            <div class="top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <nav class="navbar menu-top">
                                <ul class="menu"> 
                                    <!-- <li class="home">
                                        <a href="#">ওয়েব মেইল</a>
                                    </li>                                                          
                                    <li><a href="#">অভিযোগ/পরামর্শ</a>
                                    
                                    </li>     -->
                                    <!-- <li class="home">
                                        <a href="http://bcsirlabsctg.com.bd/nothi" target="_blank">নথি</a>
                                    </li>                                                          
                                    <li><a href="http://bcsirlabsctg.com.bd/library" target="_blank">লাইব্রেরি </a>
                                    
                                    </li> -->
                                    <li><!-- <a href="<?=$baseurl?>all_forms.php" target=""><i class="fa fa-user" style="padding-right: 5px; font-size: 15px"></i>সকল ফর্ম</a> -->

                                    <a href="https://bangladesh.gov.bd/" target=""><i class="fa fa-user" style="padding-right: 5px; font-size: 15px"></i>বাংলাদেশ জাতীয় তথ্য বাতায়ন</a>
                                        
                                    </li>
                                   
                                </ul>
                            </nav>
<!-- 
                            <a class="navbar-right search-toggle show-search" href="#">
                                <i class="fa fa-search"></i>
                            </a>
                            
                            <div class="submenu top-search">
                                <form class="search-form">
                                    <div class="input-group">
                                        <input type="search" class="search-field" placeholder="এখানে অনুসন্ধান করুন">
                                        <span class="input-group-btn">
                                            <button type="submit"><i class="fa fa-search fa-4x"></i></button>
                                        </span>
                                    </div>
                                </form>
                            </div> -->

                            <div class="navbar-right topnav-sidebar">
                                <ul class="textwidget">
                                
                            
                                        <button class="notranslate btn_lang btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">English/বাংলা
    <span class="caret"></span></button>

    
    <ul class="dropdown-menu lang_menu" role="menu" aria-labelledby="menu1">
     <li><a class="lang-en lang-select notranslate" href="#googtrans(en|en)" data-lang="en">English</a></li>
     <li><a class="lang-en lang-select notranslate" href="#googtrans(bn|bn)" data-lang="bn">বাংলা </a></li>
    </ul>
                                    
               <!-- <div class="ct-topbar">
	<ul class="list-unstyled list-inline ct-topbar__list">
	  <li class="ct-language">Language <i class="fa fa-arrow-down"></i>
		<ul class="list-unstyled ct-language__dropdown">
		  <li><a href="#googtrans(en|en)" class="lang-en lang-select" data-lang="en"><img src="https://www.solodev.com/assets/google-translate/flag-usa.png" alt="USA"></a></li>
		  <li><a href="#googtrans(en|es)" class="lang-es lang-select" data-lang="es"><img src="https://www.solodev.com/assets/google-translate/flag-mexico.png" alt="MEXICO"></a></li>
		  <li><a href="#googtrans(en|fr)" class="lang-es lang-select" data-lang="fr"><img src="https://www.solodev.com/assets/google-translate/flag-france.png" alt="FRANCE"></a></li>
		  <li><a href="#googtrans(en|zh-CN)" class="lang-es lang-select" data-lang="zh-CN"><img src="https://www.solodev.com/assets/google-translate/flag-china.png" alt="CHINA"></a></li>
		  <li><a href="#googtrans(en|ja)" class="lang-es lang-select" data-lang="ja"><img src="https://www.solodev.com/assets/google-translate/flag-japan.png" alt="JAPAN"></a></li>
		</ul>
	  </li>
	</ul>

</div>                     -->

                                      <li><a href="<?=$baseurl?>admin" target=""><i class="fa fa-user" style="padding-right: 5px; font-size: 15px"></i>অনলাইন সেবা</a>
                                        
                                    </li>
                                      <li><a href="<?=$baseurl?>admin/signup.php" target=""><i class="fa fa-user" style="padding-right: 5px; font-size: 15px"></i>সাইন আপ(অনলাইন সেবার জন্য)</a>
                                        
                                    </li>

                                      
                                    <!-- <li>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </li> -->
                                    
                                </ul>
                            </div>
                        </div><!-- col-md-12 -->
                    </div><!-- row -->
                </div><!-- container -->
            </div><!-- Top -->    
        </div><!-- header-inner-pages -->
            <div class="col-md-12 headr_div parallax4">
               <div id="logo" class="logo">
                            <a href="<?=$baseurl?>" rel="home">
                                <img src="<?=$baseurl?>images/a.gif" alt="image"  class="col-md-4 img_logo">
                            </a>                                                  
                        <!-- <div style="padding-top: 10px; margin-top: 15px" class="col-md-6 nav_content">
                                     <strong>বাংলাদেশ বিজ্ঞান ও শিল্প গবেষণা পরিষদ,চট্টগ্রাম(বিসিএসআইআর)</strong><br>
                             <span>গণপ্রজাতন্ত্রী বাংলাদেশ সরকার |</span><br>
                             <p>Bangladesh Council of Scientific and Industrial Research (BCSIR) <br>
                                Government of the People's Republic of Bangladesh
                             </p>
                        </div> -->
                                            
                </div>
                 <div class="top-title col-md-2 dsply_cal">
                    <!-- <div class="dt_icon"><i class="fa fa-calendar-o" style="font-size: 100px;color:#19791a;"></i></div> -->
                    <div id="current_date">
                    <h1 class="bongabdo notranslate"></h1>
                    <h1 class="eng_date" style="display:none"><?php echo date("j F, Y");?></h1>
                    </div>
                     </div>
        </div>