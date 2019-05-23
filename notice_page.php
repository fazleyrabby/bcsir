<?php
include 'header.php';
include 'menu.php';
?>


 <div class="page-title parallax parallax4">

        <!-- page 2 tittle -->   
        <!-- /page-2 title -->
<section class="flat-row1 full-color parallax4">
    <div class="container">                
    <div class="row">
                    <div class="blog-item col-md-9 col-sm-12" style="background-color: #fff">
					<?php
					if(isset($_GET['notice_id']))
					{
      $notice_id=$_GET['notice_id'];	

			$r="SELECT id,type, notice_title, notice_des, add_by, created_at from notice where id = '$notice_id'";
			$rp=mysqli_query($conn,$r);
			if($rp==true)
			{
					while($d=mysqli_fetch_array($rp))
				   {
  				   $notice_id=$d['0'];
  				   $notice_type=$d['1'];
					   $notice_title=$d['2'];
					   $notice_des=$d['3'];
					   //$entry_date=$d['4'];  
					   $date=$d['5'];
					   //page title
					   ?>
                <div class="post-item blog-post-item">
                    <div class="row">
                    <div class="content-pad charmen_div" style="color: #19791a">
                         
                                <div class="item-content" style="margin-left: 15px;">
                                    <h3 class="title">
                                      <?php echo $notice_title?>
                                    </h3>
                            <div class="item-excerpt blog-item-excerpt">
                          <?php
                          echo $notice_des;
                          ?>
                            </div>
                              <ul class="list-inline social-light">
                                <li><a class="btn btn-default social-icon" href="#" style="background-color: #3b5998"><i class="fa fa-facebook" style="color: #fff;"></i></a></li>
                                <li><a class="btn btn-default social-icon" href="#" style="background-color: #bd081c"><i class="fa fa-envelope"style="color: #fff;"></i></a></li>
                                <li><a class="btn btn-default social-icon" href="#" style="background-color: #1da1f2"><i class="fa fa-twitter"style="color: #fff;"></i></a></li>
                            </ul> 
                            </div>
                            </div>
                            </div>
                        </div> 
					   <?php
				   }			
      }  
        } 
        else { ?>
                                    <div class="post-item blog-post-item">
                                        <div class="row">
                                        <div class="content-pad charmen_div" style="color: #19791a">
                                             <img src="images/chr01.jpg" alt="image" class="Img_chairmen" >
                                                    <div class="item-content" style="margin-left: 15px;">
                                                        <h3 class="title">
                                                           চেয়ারম্যান
                                                        </h3>
                                                <div class="item-excerpt blog-item-excerpt">
                                                   <p>জনাব মোঃ ফারুক আহমেদ</p>
                                                   <p>চেয়ারম্যান, বিসিএসআইআর</p><br>
                                                   <p>বাংলাদেশ সরকারের অতিরিক্ত সচিব মো। ফারুক আহমেদ, বাংলাদেশ কাউন্সিল অফ সায়েন্টিফিক অ্যান্ড ইন্ডাস্ট্রিয়াল রিসার্চ  <br>এর  চেয়ারম্যান হিসেবে দায়িত্ব পালন করেছেন, দেশের প্রধান মাল্টি-শৃঙ্খলা রক্ষাকারী গবেষণা প্রতিষ্ঠান। 4 ই অক্টোবর, ২013 তারিখে জনাব আহমেদ চেয়ারম্যানের দায়িত্ব গ্রহণ করেন।</p>
                                                   <p>জনাব আহমেদ তার B.Sc. (হান্স।) এবং এম.এসসি। ঢাকা বিশ্ববিদ্যালয়ের জৈব রসায়ন তিনি তার কর্মজীবন শুরু করেন সহকারী কমিশনার, বাংলাদেশ সিভিল সার্ভিস (বিসিএস) অ্যাডমিন। 1988 সালে ক্যাডার এবং ২014 সালে অতিরিক্ত <br> সচিব পদে অধিষ্ঠিত হন।</p><br><br>
                                                   <p>তিনি 30 বছরেরও বেশী অভিজ্ঞতার সাথে সরকারি চাকরির একটি চমৎকার কর্মজীবন লাভ করেন। জনাব আহমেদ, তার কর্মজীবনের বেশ কয়েকটি সরকারী সংস্থার পরিচর্যা করেছেন যা অন্তর্ভুক্ত:</p><br>
                                                   <ol style="list-style-type:lower-roman; margin-left: 30px;">
                                                    <li style="text-align:justify">সেতু বিভাগ</li>
                                                    <li style="text-align:justify">স্থানীয় সরকার বিভাগ</li>
                                                    <li style="text-align:justify">শিপিং মন্ত্রণালয়</li>
                                                    <li style="text-align:justify">জেলা প্রশাসন, বগুড়া, ঢাকা, নীলফামারী</li>
                                                </ol>
                                                <p>বাংলাদেশের জনগণের কল্যাণে টেকসই উন্নয়নের লক্ষ্যে <br>তাঁর কঠোর প্রচেষ্টা ও উদ্দীপক কর্মকান্ডে তিনি সরকারের একটি সুপরিচিত প্রশাসনিক কর্মকর্তা হলেন।</p>
                                                </div>
                                                  <ul class="list-inline social-light">
                                                    <li><a class="btn btn-default social-icon" href="#" style="background-color: #3b5998"><i class="fa fa-facebook" style="color: #fff;"></i></a></li>
                                                    <li><a class="btn btn-default social-icon" href="#" style="background-color: #bd081c"><i class="fa fa-envelope"style="color: #fff;"></i></a></li>
                                                    <li><a class="btn btn-default social-icon" href="#" style="background-color: #1da1f2"><i class="fa fa-twitter"style="color: #fff;"></i></a></li>
                                                </ul> 
                                                </div>
                                                </div>
                                                </div>
                                            </div>
<?php	} 
if(isset($_GET['notice_id'])== 'all_notice' ) { 
         
      $r="SELECT id,type,notice_title, notice_des, add_by, created_at from notice WHERE type = 1 ";
      $rp=mysqli_query($conn,$r);
      // print_r($rp);
      while($d=mysqli_fetch_array($rp))
          {
             $notice_id=$d['0'];
             $notice_type=$d['1'];
             $notice_title=$d['2'];
             $notice_des=$d['3'];
             //$entry_date=$d['4'];  
             $date=$d['5'];
          { ?>
           <div class="post-item blog-post-item">
                    <div class="row">
                    <div class="content-pad charmen_div" style="color: #19791a">
                         
                                <div class="item-content" style="margin-left: 15px;">
                                    <h3 class="title">
                                      <?php echo $notice_title?>
                                    </h3>
                            <div class="item-excerpt blog-item-excerpt">
                          <?php
                          echo $notice_des;
                          ?>
                            </div>
                              <ul class="list-inline social-light">
                                <li><a class="btn btn-default social-icon" href="#" style="background-color: #3b5998"><i class="fa fa-facebook" style="color: #fff;"></i></a></li>
                                <li><a class="btn btn-default social-icon" href="#" style="background-color: #bd081c"><i class="fa fa-envelope"style="color: #fff;"></i></a></li>
                                <li><a class="btn btn-default social-icon" href="#" style="background-color: #1da1f2"><i class="fa fa-twitter"style="color: #fff;"></i></a></li>
                            </ul> 
                            </div>
                            </div>
                            </div>
                        </div> 

                      <?php }
                       }} ?> 





</div>

                    
<?php include 'right_menu.php';?>
                    <!-- important link -->
                    <!-- 2nd/div --> 
                </div>
        </section>        
        <br>
        <!-- /flat-row -->

        <!-- 2nd row -->








<?php include 'footer.php';?>