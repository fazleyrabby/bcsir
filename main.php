
 
 <div class="page-title parallax parallax4">

            <div class="container">
                <div class="row">
            


            <div class="post-wrap ">                 
                <section class="flat-row full-color ">
                <div class="container ">                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="flat-reviews ">
									<?php
			$r="select media_id,media_title,media_file from media_details where media_type='Slider'";
			$rp=mysqli_query($conn,$r);
			if($rp==true)
			{
			$pc=mysqli_num_rows($rp);	
			if($pc==0)
			   {
?>				   
                                <div class="flat-causes ">
                                    <div class="featured-causes slide_border" data-item="3" data-nav="false" 
                                        data-dots="false" data-auto="false">
                                      <div class="item">
                                            <img src="images/bscir10.jpg" alt="image" class="slider_sec" >
                                        </div>
                                        <div class="item"> 
                                            <img src="images/bscir11.jpg" alt="image" class="slider_sec">
                                        </div>
                                    <div class="item">                                      
                                        <img src="images/bscir14.jpg" alt="image" class="slider_sec">                          
                                    </div>
                                    <div class="item">                                      
                                        <img src="images/bscir16.jpg" alt="image" class="slider_sec" >                          
                                    </div>
                                    <div class="item">                                      
                                        <img src="images/bscir14.jpg" alt="image"  class="slider_sec">                          
                                    </div>
                                </div>
                            </div>
							<?php
                			   }
                			   else
                			   {
                				 ?>
                                <div class="flat-causes ">
                                    <div class="featured-causes slide_border" data-item="3" data-nav="false" 
                                        data-dots="false" data-auto="false">
										<?php
											   while($d=mysqli_fetch_array($rp))
                    				   {
                    					   $media_id=$d['0'];
                    					   $media_title=$d['1'];
                    					   $media_file=$d['2'];
                                            echo "<div class='item'>
                                            <img src='admin/admin/Action/uploads/$media_file' alt='image' class='slider_sec' >
                                            </div>";
                    				   }					   
                    										
										?>


                                </div>
                            </div>
				<?php				 
			   }
			}
							?>
                        </div> 
                    </div>         
                </section>
                        <!-- /posts-carousel -->
                    </div><!-- /post-wrap -->
                </div><!-- /row -->
            </div><!-- /container -->
        </div><!-- /page-title -->

<!-- page tittle -->

    <div class="page-title parallax parallax4">
            <div class="container">
                <div class="row">
                            <div class="blog-item col-md-8 col-sm-12" style="background-color: #fff">
                                           <div class="title-list notice_div">
                        <h2 class="title">
                            <i class="fa fa-bell" aria-hidden="true" style="padding-right: 8px;
                font-size: 15px;"></i>নোটিশ বোর্ড</h2>
         
                                </div>
                                <!-- /title-list --> 
                                    
                            <div class="demo1 demof">
                                <ul style="width: 100%">
                                         <?php
                                        $notice="SELECT id,notice_title,created_at FROM notice WHERE type = 1 order by id desc limit 3";
                                        $notice_list=mysqli_query($conn,$notice);
                                        if($notice_list==true)
                                            {
                                            $notice_lst=mysqli_num_rows($notice_list);
                                            if($notice_lst > 0) { 
                                            while($data=mysqli_fetch_array($notice_list))
                                                {
                                                  
                                                $notice_id=$data['0'];
                                                $notice_title=$data['1'];
                                                $created_at=$data['2']; //time from database
                                                //$template_type=$cd['3'];
                                                $en_time = array(0,1,2,3,4,5,6,7,8,9); 
                                                $bd_time = "$created_at";
                                                $bd_time = str_replace($en_time, array('০','১','২','৩','৪','৫','৬','৭','৮','৯'), $bd_time); 
                                                //date conversion in bangla 
                                                echo"<li>
                                                <a href='notice_page.php?notice_id=$notice_id'><span style='float: right;'>$bd_time &nbsp;</span>
                                                <i class='fa fa-arrow-circle-right news_arrow' aria-hidden='true'></i>$notice_title 
                                                </a>                                       
                                                 </li>"; 
                                            }
                                        }
                                        else{ ?> 
                                    <li> 
                                    <a href="#"><span style="float: right;">০১-০৭-২০১৮ &nbsp;</span>
                                    <i class="fa fa-arrow-circle-right news_arrow" aria-hidden="true"></i>এনওসি-জান্নাতুল ফেরদাউস</a>
                                    </li>
                                   <li> <a href="#"><span style="float: right;">০১-০৭-২০১৮ &nbsp;</span>
                                   <i class="fa fa-arrow-circle-right news_arrow" aria-hidden="true"></i> বদলি/ পদায়ন সংক্রান্ত অফিস আদেশ নং-১২৩৫, </a></li>
                                   <li> <a href="#"><span style="float: right;">০১-০৭-২০১৮ &nbsp;</span>
                                   <i class="fa fa-arrow-circle-right news_arrow" aria-hidden="true"></i>e-Tender Notice(OTM)</a></li>
                                   <li> <a href="#"><span style="float: right;">০১-০৭-২০১৮ &nbsp;</span>
                                   <i class="fa fa-arrow-circle-right news_arrow" aria-hidden="true"></i>অফিস আদেশ-বদলি/পদায়ন</a></li>
                                   <li><a href="#"><span style="float: right;">০১-০৭-২০১৮ &nbsp;</span>
                                   <i class="fa fa-arrow-circle-right news_arrow" aria-hidden="true"></i>নিয়োগ বিজ্ঞপ্তি</a></li>
                                       <li> <a href="#"><span style="float: right;">০১-০৭-২০১৮ &nbsp;</span>
                                   <i class="fa fa-arrow-circle-right news_arrow" aria-hidden="true"></i> বদলি/ পদায়ন সংক্রান্ত অফিস আদেশ নং-১২৩৫, </a></li>
                                   <li> <a href="#"><span style="float: right;">০১-০৭-২০১৮ &nbsp;</span>
                                   <i class="fa fa-arrow-circle-right news_arrow" aria-hidden="true"></i>e-Tender Notice(OTM)</a></li>
                                <?php }}?>
                               
                                </ul>                                     
                            </div>
                            <a class="news_btn" href="notice_page.php?notice_id=all_notice">আরও পড়ুন&nbsp;<i class="fa fa-angle-right"></i></a>
                           <div class="blog-item news_section" style="background-color: #fff;margin-top: 3em">
                                           <div class="title-list notice_div">
                        <h2 class="title">
                            <i class="fa fa-bell" aria-hidden="true" style="padding-right: 8px;font-size: 15px;"></i>বিসিএসআইআর
                            সংবাদ</h2>
                            </div>
                            <!-- /title-list --> 
                            <div class="demo1 demof">
                                <ul style="width: 100%">
                                         <?php
                                        $news="SELECT id,news_title,created_at FROM news WHERE news_st = 1 order by id desc limit 2";
                                        $news_list=mysqli_query($conn,$news);
                                        if($news_list==true)
                                            {
                                            $news_lst=mysqli_num_rows($news_list);
                                            if($news_lst > 0) { 
                                            while($data=mysqli_fetch_array($news_list))
                                                {
                                                  
                                                $news_id=$data['0'];
                                                $news_title=$data['1'];
                                                $created_at=$data['2']; //time from database
                                                //$template_type=$cd['3'];
                                                $en_time = array(0,1,2,3,4,5,6,7,8,9); 
                                                $bd_time = "$created_at";
                                                $bd_time = str_replace($en_time, array('০','১','২','৩','৪','৫','৬','৭','৮','৯'), $bd_time); 
                                                //date conversion in bangla 
                                                echo"<li>
                                                <a href='notice_page.php?notice_id=$news_id'><span style='float: right;'>$bd_time&nbsp;</span>
                                                <i class='fa fa-arrow-circle-right news_arrow' aria-hidden='true'></i>$news_title 
                                                </a>     
                                                </li>"; 
                                            }
                                        }
                                        else{ ?> 
                                    <li> 
                                    <a href="#"><span style="float: right;">০১-০৭-২০১৮ &nbsp;</span>
                                    <i class="fa fa-arrow-circle-right news_arrow" aria-hidden="true"></i>এনওসি-জান্নাতুল ফেরদাউস</a>
                                    </li>
                                   <li> <a href="#"><span style="float: right;">০১-০৭-২০১৮ &nbsp;</span>
                                   <i class="fa fa-arrow-circle-right news_arrow" aria-hidden="true"></i> বদলি/ পদায়ন সংক্রান্ত অফিস আদেশ নং-১২৩৫, </a></li>
                                   <li> <a href="#"><span style="float: right;">০১-০৭-২০১৮ &nbsp;</span>
                                   <i class="fa fa-arrow-circle-right news_arrow" aria-hidden="true"></i>e-Tender Notice(OTM)</a></li>
                                   <li> <a href="#"><span style="float: right;">০১-০৭-২০১৮ &nbsp;</span>
                                   <i class="fa fa-arrow-circle-right news_arrow" aria-hidden="true"></i>অফিস আদেশ-বদলি/পদায়ন</a></li>
                                   <li><a href="#"><span style="float: right;">০১-০৭-২০১৮ &nbsp;</span>
                                   <i class="fa fa-arrow-circle-right news_arrow" aria-hidden="true"></i>নিয়োগ বিজ্ঞপ্তি</a></li>
                                       <li> <a href="#"><span style="float: right;">০১-০৭-২০১৮ &nbsp;</span>
                                   <i class="fa fa-arrow-circle-right news_arrow" aria-hidden="true"></i> বদলি/ পদায়ন সংক্রান্ত অফিস আদেশ নং-১২৩৫, </a></li>
                                   <li> <a href="#"><span style="float: right;">০১-০৭-২০১৮ &nbsp;</span>
                                   <i class="fa fa-arrow-circle-right news_arrow" aria-hidden="true"></i>e-Tender Notice(OTM)</a></li>
                                <?php }}?>
                               
                                </ul>                                     
                            </div>
                            <a class="news_btn" href="notice_page.php?notice_id=all_notice">আরও পড়ুন&nbsp;<i class="fa fa-angle-right"></i></a>
                                
                                   
                            </div> 
                                </div>
                  
                                <!-- 2nd_div(1st part) -->
                        <div class="col-md-4 col-sc-12 flat-all-course">
                         <div class="post-item blog-post-item">
                                        <div class="row">
                                       
                                         <?php 
                                                  // $media_type = "Message From Chairman";
                                                   $edit_news=mysqli_query($conn,"SELECT media_id,media_title,media_description,media_file FROM media_details WHERE media_type = 'pm' ORDER BY media_id DESC LIMIT 2"); 
                                                    //20 = গবেষণা এবং নতুনত্ব Innovation Gallery
                                                    if($edit_news==true)
                                                    {
                                                    while($data=mysqli_fetch_array($edit_news))
                                                        {
                                                       // $last_id = mysql_insert_id($conn);
                                                        $media_id=$data['0'];
                                                        $media_title=$data['1'];
                                                        $media_des=$data['2'];
                                                        $media_file=$data['3'];
                                                        
                                                        ?>
                                                         <div class="content-pad charmen_div" style="background: #fff;margin-bottom: 10px;">
                                                         <h3 class="title text-center" style="font-size:14px; padding: 5px 0;">
                                                          <span style="position: absolute;
                                                    visibility: hidden;">নাম :</span><?php echo $media_title;?>
                                                        </h3>
                                                     <img src="admin/admin/Action/uploads/<?php echo $media_file?>" alt="image" class="" style="width: 35%;margin: 0 32%;display: block;">
                                                     <div class="item-content text-center" style="border: none;">

                                                        
                                                      
                                                      
                                                        <a class="button" href="page.php?details=<?=$media_id?>" style="background-color: #304220;color: #fff">আরও পড়ুন<i class="fa fa-angle-right"></i></a>
                                                    </div>
                                                </div> 


                                                  <?php } } ?>  
                                                  <div class="headline content-pad charmen_div" style="background: #fff">
                                                <?php
                                                $r="SELECT media_description from media_details where media_type='Welcome Message' ORDER BY media_id DESC LIMIT 1";
                                                $rp=mysqli_query($conn,$r);
                                                if($rp ==true)
                                                { 
                                                    while ($data = mysqli_fetch_array($rp)) 
                                                    {
                                                    $welcome_msg = $data['0'];
                                                    $text=strip_tags($welcome_msg);   //output Test paragraph. Other text
                                                    echo "<span style='color:red;font-weight:600;font-size:20px'>$text</span>";
                                                    }
                                                 } 
                                                else { ?>
                                                    <span style='color:red;font-weight:600;font-size:17px'>
                                                    ITTI-BCSIR: প্রযুক্তি হস্তান্তর ও ‍ উদ্ভাবন প্রকল্প- ইনডোর মাছ প্রযুক্তি, হাইড্রোপোনিক ঘাস চাষ প্রযুক্তি, মাছ শুকানো বিদ্যুৎ সাশ্রয়ী ড্রায়ার প্রভৃতি বিষয়ে আগ্রহী উদ্যোক্তাদের স্থাপনা পরিদর্শন, কারিগরী সেবা ও পরামর্শের জন্য যোগযোগের ঠিকানা (২০১৮-০৮-০৮) 
                                                    </span>
                                                <?php } ?>
                                                </div>
                                                </div>
                                            </div>
                        
                            </div>

                            
                        
            
                   
                            
                                     
                      </div>
                </div>
        </div>
        <a class="payment payment_middle" href="<?=$baseurl?>admin/service_login.php?usr=other_payment_usr">
            <div class="">
                <span>ই-সেবা (পেমেন্ট) :</span>
                <span class="payment_logo"> <img src="images/dbbl.png" alt="DBBL">  </span>
                <span class="payment_logo"> <img src="images/bkash.png" alt="bkash">  </span>
                <span class="payment_logo"> <img src="images/rocket.png" alt="rocket">  </span>
                <span class="payment_logo"> <img src="images/visa.png" alt="visa">  </span>
                <span class="payment_logo"> <img src="images/mastercard.png" alt="mastercard">  
                </span>
            </div> 
        </a> 
        <div class="page-title parallax parallax4">           
        <div class="container">     
            <div class="row">  
                <div class="icon-post col-md-12 example1 "style="border:none;">
                      <div class="box" style="background-color: #fff;border:1px solid #ccc;padding:5px;">  
                      <div class="container" style="width: 100% ;"> 
                                <div class="row">
                                    <a href="other_content.php?content_type=0">
                                    <div class="iconbox center">
                                        <div class="box-header hvr-grow-rotate ">
                                            <img src="images/information2.png" alt="image">                                                  
                                        </div>
                                        <div class="icon-post">
                                            <div class="box-title ">
                                                <h4 class="title">তথ্য</h4>
                                            </div>
                                        </div>
                                    </div></a>
                                    <a href="other_content.php?content_type=1">
                                    <div class="iconbox center">
                                        <div class="box-header  hvr-grow-rotate">
                                            <img src="images/app.png" alt="image" style="">
                                        </div>

                                        <div class="icon-post">
                                            <div class="box-title">
                                                <h4 class="title">অভিযোগ ও প্রতিকার</h4> 
                                            </div>
                                        </div>
                                    </div></a>

                                <a href="other_content.php?content_type=2">
                                    <div class="iconbox center">
                                        <div class="box-header  hvr-grow-rotate">
                                            <img src="images/pro1.png" alt="image">
                                        </div>

                                        <div class="icon-post">
                                            <div class="box-title">
                                                <h4 class="title">গবেষণা ও উন্নয়ন প্রকল্প </h4>
                                                
                                            </div>
                                        </div>
                                    </div></a>
                                <a href="other_content.php?content_type=3">
                                    <div class="iconbox center">
                                        <div class="box-header hvr-grow-rotate">
                                            <img src="images/law.png" alt="image">
                                        </div>

                                        <div class="icon-post">
                                            <div class="box-title">
                                                <h4 class="title">আইন ও নীতিমালা</h4>
                                            
                                            </div>
                                        </div>
                                    </div>
                              
                            </a>
                             <a href="other_content.php?content_type=4">
                                    <div class="iconbox center">
                                        <div class="box-header hvr-grow-rotate">
                                            <img src="images/tele.png" alt="image" style="padding: 15px;">
                                                            
                                        </div>

                                        <div class="icon-post">
                                            <div class="box-title">
                                                <h4 class="title">যোগাযোগ</h4>
                                            </div>
                                        </div>
                                    </div></a>
                                      </div>
                            </div>
                            <hr class="hr_wd">
                            <div class="row">
                            
                            <div class="container" style="width: 100%">
                                
                                <a href="other_content.php?content_type=5">
                                    <div class="iconbox center">
                                        <div class="box-header   hvr-grow-rotate">
                                            <img src="images/care.png" alt="image">
                                        </div>

                                        <div class="icon-post">
                                            <div class="box-title">
                                                <h4 class="title">শুদ্ধাচার</h4>
                                            </div>
                                        </div>
                                    </div></a>
                                <a href="other_content.php?content_type=6">
                                    <div class="iconbox center">
                                        <div class="box-header  hvr-grow-rotate">
                                            <img src="images/pro.png" alt="image" style="padding: 17px;">
                                        </div>

                                        <div class="icon-post">
                                            <div class="box-title">
                                                <h4 class="title">প্রকাশনা ও প্রতিবেদন</h4>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="other_content.php?content_type=7">
                                    <div class="iconbox center">
                                        <div class="box-header hvr-grow-rotate">
                                            <img src="images/prodd.png" alt="image" style="padding: 15px;">
                                        </div>

                                        <div class="icon-post">
                                            <div class="box-title">
                                                <h4 class="title">উদ্ভাবিত পণ্য, প্রসেস ও প্যাটেন্ট</h4>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="all_forms.php">
                                    <div class="iconbox center">
                                        <div class="box-header  hvr-grow-rotate">
                                            <img src="images/form.png" alt="image" style="padding: 17px;">
                                        </div>

                                        <div class="icon-post">
                                            <div class="box-title">
                                                <h4 class="title">সকল ফর্ম</h4>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                  <a href="other_content.php?content_type=9">
                                    <div class="iconbox center">
                                        <div class="box-header  hvr-grow-rotate">
                                            <img src="images/citizen.png" alt="image" style="padding: 17px;">
                                        </div>

                                        <div class="icon-post">
                                            <div class="box-title">
                                                <h4 class="title">নাগরিক সেবা সনদ</h4>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </a>
                           
                                
                              
                                </div></div>
                            </div>
                        </div>
                                <!-- /icon-post -->
                                
         
                     </div>
        
             
      
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <hr class="hr_wd">
        <!-- page 2 tittle -->   
        <!-- /page-2 title -->
<section class="flat-row1 full-color parallax4">
    <div class="container">                
    <div class="row">
            <div class="col-md-9">
            
            
            <div class="product-slider">
                  <div id="carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php 
                        $middle_slider = "Middle Slider";
                        $i=0;
                        $mid_slider = mysqli_query($conn,"SELECT media_id,media_file FROM media_details WHERE media_type = '$middle_slider' ORDER BY media_id DESC LIMIT 5"); 
                        if ($mid_slider == true) {
                            while ($data = mysqli_fetch_array($mid_slider)) {
               
                                $media_id = $data['0'];
                                $media_file = $data['1']; 
                           ?>

                      <div class="item car_sec<?php if($i == 0){echo "\ractive";}?>"><img src="admin/admin/Action/uploads/<?php echo $media_file?>"></div>
                    
                      <?php $i++; }} ?>
                    </div>
                  </div>
                <div class="">
                    <div id="thumbcarousel" class="carousel slide" data-interval="true">
                        <div class="carousel-inner">
                           
                            <div class="item active">
                                    <?php 
                                    $middle_slider = "Middle Slider";
                                    $j = 0;
                                    $mid_slider = mysqli_query($conn,"SELECT media_id,media_file FROM media_details WHERE media_type = '$middle_slider' ORDER BY media_id DESC LIMIT 5");

                                    if ($mid_slider == true) {
                                        while ($data = mysqli_fetch_array($mid_slider)) {

                                            $media_id = $data['0'];
                                            $media_file = $data['1'];
                                            ?>
                                    
                                        <a class="thumb<?php if ($j == 0) { echo "\rthumb-active";} ?>" data-target="#carousel" data-slide-to="<?= $j++?>">
                                        <img src="admin/admin/Action/uploads/<?php echo $media_file ?>">
                                    </a> 
                                    

                                <?php  } } ?>

                                </div>

                         
                        </div>
                        <!-- <div class="item">
                        <div data-target="#carousel" data-slide-to="5" class="thumb">
                            <img src="images/Slide 8.jpg">
                        </div>
                            <div data-target="#carousel" data-slide-to="6" class="thumb">
                            <img src="images/Slide 9.jpg">
                        </div>
                            <div data-target="#carousel" data-slide-to="7" class="thumb">
                            <img src="images/Slide 11.jpg"  >
                        </div>
                            <div data-target="#carousel" data-slide-to="8" class="thumb">
                            <img src="images/Slide 2.jpg"  >
                        </div>
                            <div data-target="#carousel" data-slide-to="9" class="thumb">
                            <img src="images/Slide 3.jpg"  >
                        </div>
                    
                        </div> -->
                    
                        <!-- /carousel-inner --> 
                        <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> </a> <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                <!-- /thumbcarousel --> 
                </div>

            </div>
                

                    <div class="row">
                     <h2 class="widget-title resrch_div"><i class="fa fa-tasks" aria-hidden="true" style="padding: 8px; font-size: 18px"></i>গবেষণা এবং নতুনত্ব</h2>
                        <div class="flat-events">
                        <?php 
                            $edit_news=mysqli_query($conn,"SELECT media_id,media_title,media_description,media_file,entry_date FROM media_details WHERE media_type = 20 ORDER BY RAND() LIMIT 4"); 
                            //20 = গবেষণা এবং নতুনত্ব Innovation Gallery
                                    if($edit_news==true)
                                    {
                                    while($data=mysqli_fetch_array($edit_news))
                                        {
                                        $media_id=$data['0'];
                                        $media_title=$data['1'];
                                        $media_des=$data['2'];
                                        $media_file=$data['3'];
                                        $media_date=$data['4'];
                                        //$image=$data['4']; 
                                        $en_time = array(0,1,2,3,4,5,6,7,8,9); 
                                        $bd_time = "$media_date";
                                        $bd_time = str_replace($en_time, array('০','১','২','৩','৪','৫','৬','৭','৮','৯'), $media_date); 
                                        //date conversion in bangla 
                                    ?>

                                   
                            <div class="grid-item">
                                <div class="grid-item-inner">
                                    <div class="event-item">
                                        <div class="event-thumbnail">
                                            <a href="#"><img src="admin/admin/Action/uploads/<?=$media_file?>"alt="image" style="height: 245px;
                                            width: 100%;object-fit: fill;">
                                            </a>
                                        </div><!-- /event-thumbnail -->
                                        <div class="event-overlay">
                                            <div class="cs-post-header">
                                                <div class="cs-category-links">
                                                    <a class="overlay-top" href="#">
                                                        <h4 class="price yellow"><?=$media_title?></h4>
                                                    
                                                    </a>
                                                    <div class="overlay-footer">
                                                        <div><?=$bd_time?></div>
                                                    </div>
                                                </div>                                
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>

                                        <?php }} 
                                        else {
                                        ?>
                             <div class="grid-item">
                                <div class="grid-item-inner">
                                    <div class="event-item">
                                        <div class="event-thumbnail">
                                            <a href="#"><img src="images/res04.jpg" alt="image" style="height: 245px;width: 100%;">
                                            </a>
                                        </div><!-- /event-thumbnail -->
                                        <div class="event-overlay">
                                            <div class="cs-post-header">
                                                <div class="cs-category-links">
                                                    <a class="overlay-top" href="#">
                                                        <h4 class="price yellow">বিসিএসআইআর</h4>
                                                        
                                                    </a>

                                                    <div class="overlay-footer">
                                                        <div>০১-০৭-২০১৮</div>
                                                        
                                                    </div>
                                                </div>                                
                                            </div> 
                                        </div><!-- /event-overlay -->
                                    </div>
                                </div>
                            </div>

                            <div class="grid-item">
                                <div class="grid-item-inner">
                                    <div class="event-item">
                                        <div class="event-thumbnail">
                                           <a href="#"><img src="images/res03.jpg" alt="image" style="height: 245px;width: 100%;">
                                            </a>
                                        </div><!-- /event-thumbnail -->
                                        <div class="event-overlay">
                                            <div class="cs-post-header">
                                                <div class="cs-category-links">
                                                    <a class="overlay-top" href="#">
                                                        <h4 class="price yellow">বিসিএসআইআর</h4>
                                                        
                                                    </a>

                                                    <div class="overlay-footer">
                                                        <div>০১-০৭-২০১৮</div>
                                                        
                                                    </div>
                                                </div>                                
                                            </div> 
                                        </div><!-- /event-overlay -->
                                    </div>
                                </div>
                            </div>

                           <div class="grid-item">
                                <div class="grid-item-inner">
                                    <div class="event-item">
                                        <div class="event-thumbnail">
                                           <a href="#"><img src="images/res02.jpg" alt="image" style="height: 245px;width: 100%;">
                                            </a>
                                        </div><!-- /event-thumbnail -->
                                        <div class="event-overlay">
                                            <div class="cs-post-header">
                                                <div class="cs-category-links">
                                                    <a class="overlay-top" href="#">
                                                        <h4 class="price yellow">বিসিএসআইআর</h4>
                                                        
                                                    </a>

                                                    <div class="overlay-footer">
                                                        <div>০১-০৭-২০১৮</div>
                                                        
                                                    </div>
                                                </div>                                
                                            </div> 
                                        </div><!-- /event-overlay -->
                                    </div>
                                </div>
                            </div>

                           <div class="grid-item">
                                <div class="grid-item-inner">
                                    <div class="event-item">
                                        <div class="event-thumbnail">
                                            <a href="#"><img src="images/res01.jpg" alt="image" style="height: 245px;width: 100%;">
                                            </a>
                                        </div><!-- /event-thumbnail -->
                                        <div class="event-overlay">
                                            <div class="cs-post-header">
                                                <div class="cs-category-links">
                                                    <a class="overlay-top" href="#">
                                                        <h4 class="price yellow">বিসিএসআইআর</h4>
                                                        
                                                    </a>

                                                    <div class="overlay-footer">
                                                       <div>০১-০৭-২০১৮</div>
                                                        
                                                    </div>
                                                </div>                                
                                            </div> 
                                        </div>
                                        <!-- /event-overlay -->
                                    </div>
                                </div>
                            </div>
                                        <?php } ?>
                           

                        </div>

                        </div>
                        <!-- 3rd div -->
                <div class="row " style="margin-top: 35px;">
                    <h2 class="widget-title resrch_div"><i class="fa fa-tasks" aria-hidden="true" style="padding: 8px; font-size: 18px"></i>বিসিএসআইআর গ্যালারি (চট্টগ্রাম) </h2>
                        <div class="flat-events">
                        <?php 

                        $edit_news=mysqli_query($conn,"SELECT media_id,media_title,media_description,media_file,entry_date FROM media_details JOIN catagory on catagory.catagory_id=media_details.media_type WHERE catagory.template_type = 3 ORDER BY RAND() LIMIT 4"); 
                        
                                if($edit_news==true)
                                {
                                while($data=mysqli_fetch_array($edit_news))
                                    {
                                    $media_id=$data['0'];
                                    $media_title=$data['1'];
                                    $media_des=$data['2'];
                                    $media_file=$data['3'];
                                    $media_date=$data['4'];
                                    //$image=$data['4']; 
                                    $en_time = array(0,1,2,3,4,5,6,7,8,9); 
                                        $bd_time = "$media_date";
                                        $bd_time = str_replace($en_time, array('০','১','২','৩','৪','৫','৬','৭','৮','৯'), $media_date); 
                                        //date conversion in bangla 
                                ?>

                            <div class="grid-item">
                                <div class="grid-item-inner">
                                    <div class="event-item">
                                        <div class="event-thumbnail">
                                            <a href="#"><img src="admin/admin/Action/uploads/<?=$media_file?>"alt="image" style="height: 245px;
                                            width: 100%;object-fit: fill;">
                                            </a>
                                        </div><!-- /event-thumbnail -->
                                        <div class="event-overlay">
                                            <div class="cs-post-header">
                                                <div class="cs-category-links">
                                                    <a class="overlay-top" href="#">
                                                        <h4 class="price yellow"><?=$media_title?></h4>
                                                    
                                                    </a>
                                                    <div class="overlay-footer">
                                                        <div><?=$bd_time?></div>
                                                        
                                                    </div>
                                                </div>                                
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } }
                        else {
                        ?>
                            <div class="grid-item">
                                <div class="grid-item-inner">
                                    <div class="event-item">
                                        <div class="event-thumbnail">
                                            <a href="#"><img src="images/gal01.jpg" alt="image"  style="height: 245px;width: 100%;object-fit: fill;">
                                            </a>
                                        </div><!-- /event-thumbnail -->
                                        <div class="event-overlay">
                                            <div class="cs-post-header">
                                                <div class="cs-category-links">
                                                    <a class="overlay-top" href="#">
                                                        <h4 class="price yellow">বিসিএসআইআর</h4>
                                                        
                                                    </a>

                                                    <div class="overlay-footer">
                                                        <div>০১-০৭-২০১৮</div>
                                                        
                                                    </div>
                                                </div>                                
                                            </div> 
                                        </div><!-- /event-overlay -->
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item">
                                <div class="grid-item-inner">
                                    <div class="event-item">
                                        <div class="event-thumbnail">
                                            <a href="#"><img src="images/gal01.jpg" alt="image"  style="height: 245px;width: 100%;object-fit: fill;">
                                            </a>
                                        </div><!-- /event-thumbnail -->
                                        <div class="event-overlay">
                                            <div class="cs-post-header">
                                                <div class="cs-category-links">
                                                    <a class="overlay-top" href="#">
                                                        <h4 class="price yellow">বিসিএসআইআর</h4>
                                                        
                                                    </a>

                                                    <div class="overlay-footer">
                                                        <div>০১-০৭-২০১৮</div>
                                                        
                                                    </div>
                                                </div>                                
                                            </div> 
                                        </div><!-- /event-overlay -->
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item">
                                <div class="grid-item-inner">
                                    <div class="event-item">
                                        <div class="event-thumbnail">
                                            <a href="#"><img src="images/gal01.jpg" alt="image"  style="height: 245px;width: 100%;object-fit: fill;">
                                            </a>
                                        </div><!-- /event-thumbnail -->
                                        <div class="event-overlay">
                                            <div class="cs-post-header">
                                                <div class="cs-category-links">
                                                    <a class="overlay-top" href="#">
                                                        <h4 class="price yellow">বিসিএসআইআর</h4>
                                                        
                                                    </a>

                                                    <div class="overlay-footer">
                                                        <div>০১-০৭-২০১৮</div>
                                                        
                                                    </div>
                                                </div>                                
                                            </div> 
                                        </div><!-- /event-overlay -->
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item">
                                <div class="grid-item-inner">
                                    <div class="event-item">
                                        <div class="event-thumbnail">
                                            <a href="#"><img src="images/gal01.jpg" alt="image"  style="height: 245px;width: 100%;object-fit: fill;">
                                            </a>
                                        </div><!-- /event-thumbnail -->
                                        <div class="event-overlay">
                                            <div class="cs-post-header">
                                                <div class="cs-category-links">
                                                    <a class="overlay-top" href="#">
                                                        <h4 class="price yellow">বিসিএসআইআর</h4>
                                                        
                                                    </a>

                                                    <div class="overlay-footer">
                                                        <div>০১-০৭-২০১৮</div>
                                                        
                                                    </div>
                                                </div>                                
                                            </div> 
                                        </div><!-- /event-overlay -->
                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                       

                        </div>

                        </div>
                    </div>
<?php
include 'right_menu.php';
?>
                    <!-- important link -->
                    <!-- 2nd/div --> 
                </div>
        </section>        
        <br>
        <!-- /flat-row -->

        <!-- 2nd row -->

        <!--<a class="payment" href="<?=$baseurl?>admin/service_login.php?usr=other_payment_usr">-->
        <!--<div class="">-->
        <!--   <span>ই-সেবা (পেমেন্ট) :</span>-->
        <!--   <span class="payment_logo"> <img src="images/dbbl.png" alt="DBBL">  </span>-->
        <!--   <span class="payment_logo"> <img src="images/bkash.png" alt="bkash">  </span>-->
        <!--   <span class="payment_logo"> <img src="images/rocket.png" alt="rocket">  </span>-->
        <!--   <span class="payment_logo"> <img src="images/visa.png" alt="visa">  </span>-->
        <!--   <span class="payment_logo"> <img src="images/mastercard.png" alt="mastercard">  </span>-->
        <!--</div></a>-->
