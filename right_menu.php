            <div class="col-md-3">

             
                     <div class="flat-all-course">
                    <div class="title-list">
                        <h2 class="title text-center" style="padding : 5px 30px; background-color: #222f16;color:white;">
                        <span><i class="fa fa-book" aria-hidden="true" style="padding-right: 8px;
                                font-size: 15px;"></i>  বিসিএসআইআর &nbsp;সংবাদ</span>
                        </h2>
                    </div>
                          <div class="news_div"  style="background-color: #fff; ">
                               
                                <ul style="width: 100%">
                                         <?php
                                        $news="SELECT id,news_title,created_at FROM news WHERE news_st = 1";
                                        $news_list=mysqli_query($conn,$news);
                                        if($news_list==true)
                                            {
                                            $news_all=mysqli_num_rows($news_list);
                                            if($news_all > 0) { 
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
                                                echo"<li style='max-height: 100px; overflow: hidden;'>
                                                <a href='news_page.php?news_page_id=$news_id'><span style='float: right;'>$bd_time &nbsp;</span>
                                                <i class='fa fa-arrow-circle-right news_arrow' aria-hidden='true'></i>$news_title 
                                                </a>                                       
                                            </li>"; 
                                            }
                                        }
                                        else{ ?> 
                                   <li> 
                                    <a href="#"><span style="float: right;">০১-০৭-২০১৮ &nbsp;</span>
                                    <i class="fa fa-arrow-circle-right news_arrow" aria-hidden="true"></i>
                                    বাংলাদেশের প্রচলিত ডিজেল চালিত নৌকাকে সহজেই প্রতিস্থাপনযোগ্যরূপে সৌর শক্তি দ্বারা চালিত করার এবং </a>
                                </li>

                                   <li> <a href="#"><span style="float: right;">০১-০৭-২০১৮ &nbsp;</span>
                                   <i class="fa fa-arrow-circle-right news_arrow" aria-hidden="true"></i> বিসিএসআইআর-এর সাথে এস এমই ফাউন্ডেশনের চুক্তি </a></li>
                                   <li> <a href="#"><span style="float: right;">০১-০৭-২০১৮ &nbsp;</span>
                                   <i class="fa fa-arrow-circle-right news_arrow" aria-hidden="true"></i>বিসিএসআইআর প্রদত্ত বিভিন্ন সেবা ও ইনোভেশন গ্যালারি সম্পর্কিত বিজ্ঞপ্তি</a></li>
                                   <li><a href="#"><span style="float: right;">০১-০৭-২০১৮ &nbsp;</span>
                                   <i class="fa fa-arrow-circle-right news_arrow" aria-hidden="true"></i>বাজারে আসছে বিসিএসআইআর উদ্ভাবিত বেবি লন্ড্রি লিকুইড ডিটারজেন্ট</a></li>
                                   <li><a href="#"><span style="float: right;">০১-০৭-২০১৮ &nbsp;</span>
                                   <i class="fa fa-arrow-circle-right news_arrow" aria-hidden="true"></i>ক্ষুদ্র ও মাঝারি/এসএমই শিল্পোদ্যোক্তাদের জন্য সুখবর</a></li>
                                     <li>  <a href="#"><span style="float: right;">০১-০৭-২০১৮ &nbsp;</span>
                                     <i class="fa fa-arrow-circle-right news_arrow" aria-hidden="true"></i>আর্সেনিক মুক্ত খাবার পানির জন্য ‘জা-পানি’ প্রযুক্তি</a></li><br>
                                  <?php   }}?>
                                   
                                </ul>

                            </div> 
                             <a style="margin-bottom: 10px;" class="news_btn" href="news_page.php?news_page_id=all_news">আরও পড়ুন&nbsp;<i class="fa fa-angle-right"></i></a>

                        </div>
                        
                        <div class="sidebar v1" style="margin-top: 15px ; background-color: #fff">
                            <div class="widget widget-nav-menu">
                                <div class=" widget-inner">
                                    <h2 class="widget-title maincolor2" style="color:#fff;background-color: #222f16;"><i class="fa fa-bookmark" aria-hidden="true"style="padding-right: 8px;
                                    font-size: 15px;"></i>কেন্দ্রীয় ই-সেবা
                                    </h2>
                                    <div class="menu-main-navigation-container">
                                        <ul id="menu-main-navigation-1" class="menu">
                                                <?php
                                            $cat="select id,title,link from central_esheba where type = 1";
                                            $catp=mysqli_query($conn,$cat);
                                            if($catp==true)
                                                {
                                                $catpc=mysqli_num_rows($catp);
                                                if($catpc > 0){
                                                while($cd=mysqli_fetch_array($catp))
                                                {
                                                  
                                                $eshba_id=$cd['0'];
                                                $eshba_title=$cd['1'];
                                                $eshba_link=$cd['2'];
                                                //$eshba_type=$cd['1'];
                                                //$template_type=$cd['3'];
                                               
                                                echo"<li class=''>
                                                            <a href='$eshba_link' target='_blank'>
                                                            $eshba_title
                                                            </a>                                       
                                                        </li>"; 
                                                    }
                                                 }
                                               } 
                                           ?>
                                           <!--  <li><a href="#">নথি</a></li>
                                            <li><a href="#">প্রয়োজনীয় এপস</a></li>
                                            <li><a href="#">জন্ম ও মৃত্যু নিবন্ধন</a></li>
                                            <li><a href="#">উত্তরাধিকার ক্যালকুলেটর</a></li>
                                            <li><a href="#">অনলাইন পুলিশ ক্লিয়ারেন্স</a></li>
                                            <li><a href="#">অনলাইনে পাসপোর্টের আবেদন</a></li>
                                            <li><a href="#">জাতীয় পরিচয়পত্রের তথ্য হালনাগাদকরণ</a></li>
                                            <li><a href="#">অনলাইন চালান যাচাইকরণ</a></li>
                                            <li><a href="#">অনলাইন আয়কর পরিশোধ</a></li>
                                            <li><a href="#">ভিসা যাচাই</a></li>
                                            <li><a href="#">বিকেকেবি শিক্ষাবৃত্তির আবেদন</a></li>
                                            <li><a href="#">অভিগম্য অভিধান</a></li>
                                            <li><a href="#">অভিগম্য অভিধান</a></li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- map/div -->
                        <div class="sidebar v1" style="margin-top: 5px ; background-color: #fff">
                            <div class="widget widget-nav-menu">
                                <div class=" widget-inner">
                                    <h3 class="widget-title maincolor2" style="color:#fff;background-color: #222f16;"><i class="fa fa-map-marker" aria-hidden="true"style="padding-right: 8px;
                font-size: 15px;"></i> বিসিএসআইআর মানচিত্র</h3>
                                
                                    <div class="container-fluid">
                                        <div class="row">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3688.511371583069!2d91.81463731495664!3d22.409770785266762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd8198004abe9%3A0x6fea974aa1f4f2d9!2sBangladesh+Council+of+Scientific+and+Industrial+Research!5e0!3m2!1sen!2sbd!4v1530970835954" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                     
                                    <!-- /container-fluid -->
                                
                                </div>
                            </div>
                        </div>
                              <div class="sidebar v1" style="margin-top: 5px ; background-color: #fff">
                            <div class="widget widget-nav-menu">

                                <div class=" widget-inner">
                                    <h3 class="widget-title maincolor2" style="color:#fff;background-color: #222f16;"><i class="fa fa-bookmark" aria-hidden="true"style="padding-right: 8px;
                font-size: 15px;"></i> গুরুত্বপূর্ণ লিংক</h3>

                                
                                     <div class="menu-main-navigation-container">
                                        <ul id="menu-main-navigation-1" class="menu">
                                            <?php
                                            
                                            $cat="select catagory_id,catagory_title,template_type from catagory where useful_side_menu= 1 and  menu_st = 1";
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
                                                   
                                                    echo"<li class=''>
                                                                <a href='page.php?page_id=$catagory_id'>
                                                                $catagory_title 
                                                                </a>                                       
                                                            </li>"; 
                                            }
                                        }
                                           } 
                                       ?>
                                            <!-- <li><a href="#">প্রযুক্তি হস্তান্তর প্রকল্প</a></li>
                                            <li><a href="#">প্রধানমন্ত্রীর কার্যালয়</a></li>
                                            <li><a href="#">বিজ্ঞান ও প্রযুক্তি মন্ত্রণালয়</a></li>
                                            <li><a href="#">বাংলাদেশ পরমাণু শক্তি কমিশন</a></li>
                                            <li><a href="#">ব্যান্সডক</a></li>
                                            <li><a href="#">ন্যাশনাল ইনস্টিটিউট অফ বায়োটেকনোলজি</a></li>
                                            <li><a href="#">জাতীয় বিজ্ঞান ও প্রযুক্তি যাদুঘর</a></li> -->
                                            
                                         
                                        </ul>
                                    </div>
                                     
                                    <!-- /container-fluid -->
                                
                                </div>
                            </div>
                        </div>
                        <!-- invantion/div -->
                        <div class="sidebar v1" style="margin-top: 5px ; background-color: #fff">
                            <div class="widget widget-nav-menu">

                                <div class=" widget-inner">
                                    <h3 class="widget-title maincolor2" style="color:#fff;background-color: #222f16;"><i class="fa fa-bookmark"aria-hidden="true"style="padding-right: 8px;
                font-size: 15px;"></i> ইনোভেশন কর্নার</h3>
                                
                                     <div class="menu-main-navigation-container">
                                        <ul id="menu-main-navigation-1" class="menu">
                                                <?php
                                            
                                            $cat="select catagory_id,catagory_title,template_type from catagory where innovation_sidebar = 1 and menu_st = 1";
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
                                                   
                                                    echo"<li class=''>
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
                                     
                                    <!-- /container-fluid -->
                                
                                </div>
                            </div>
                        </div>
                    </div>