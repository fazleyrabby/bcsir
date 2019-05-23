<header id="header" class="header">
            <div class="header-wrap " >
                <div class="container ">
                    <div class="header-wrap">
                        <div class="nav-wrap " >
                            <nav id="mainnav" class="mainnav">
                                <ul class="menu"> 
								     <li class="home">
                                        <a href="index.php">প্রথম পাতা
                                        </a>                                       
                                    </li>
                			<?php
                				$i=0;
                				$cat="select catagory_id,catagory_title,mparent,template_type from catagory where mparent=0 and menu_st=1 and tshow_menu =1 ";
                				$catp=mysqli_query($conn,$cat);
                				if($catp==true)
                				    {
                						$catpc=mysqli_num_rows($catp);
                						if($catpc==0)
                						{
                							?>

                                     <li class="home">
                                        <a href="#">ইভেন্টস 
                                        </a>                                       
                                    </li>
                                    <li>
                                        <a href="#">বিসিএসআইআর - সম্পর্কিত 
                                        </a>
                                    <ul class="submenu">
                                            <li><a href="#">চেয়ারম্যান মহোদয়ের বাণী</a></li>
                                            <li><a href="#">পটভূমি</a></li>
                                            <li><a href="#">ভিশন ও মিশন</a></li>
                                            <li><a href="#">সিটিজেন চার্টার</a></li>
                                            <li><a href="#">সাংগঠনিক কাঠামো </a></li>
                                            <li class="dropdown-submenu">
                                              <a tabindex="-1" href="#">অন্যান্য</a>
                                              <ul class="dropdown-menu" style="margin: 0;padding:0;">
                                                <li><a tabindex="-1" href="#">পরিকল্পনা ও উন্নয়ন বিভাগ</a>
                                                </li>
                                                <li><a href="#">গ্রন্থাগার</a></li>
                                              </ul>
                                            </li>
                                        </ul><!-- /.submenu -->
                                    </li>
                                      <li>
                                        <a href="#">গবেষণা ইনস্টিটিউট
                                        </a>
                                        <ul class="submenu">
                                         <li><a href="#">বিসিএসআইআর গবেষণাগার, ঢাকা</a></li>
                                         <li><a href="#"> বিসিএসআইআর গবেষণাগার, চট্টগ্রাম</a></li>
                                         <li><a href="#">বিসিএসআইআর গবেষণাগার, রাজশাহী</a></li>
                                         <li><a href="#">জ্বালানি গবেষণা ও উন্নয়ন ইনস্টিটিউট</a></li>
                                         <li><a href="#">খাদ্য বিজ্ঞান ও প্রযুক্তি ইনস্টিটিউট</a></li>
                                        <li><a href="#">কাঁচ এবং সিরামিক গবেষণা ও পরীক্ষণ ইনস্টিটিউট</a></li> 
                                        <li><a href="#">পাইলট প্ল্যান্ট এন্ড প্রসেস ডেভেলপমেন্ট সেন্টার</a></li>
                                         <li><a href="#">চামড়া গবেষণা ইনস্টিট</a></li>
                                         <li><a href="#">ইনস্টিটিউট অফ মাইনিং, মিনারেলজি ও মেটালার্জি </a></li>
                                         <li><a href="#">আইএনএআরএস</a></li>
                                         <li><a href="#">ডিআরআইসিএম</a></li>
                                                                  
                                        </ul><!-- /.submenu -->
                                    </li>
                                    <li>
                                        <a href="#">কর্মকর্তাবৃন্দ
                                        </a>
                                        <ul class="submenu">
                                            <li><a href="#">চেয়ারম্যান মহোদয়ের কার্যালয়</a></li>
                                            <li><a href="#">সদস্যবৃন্দ</a></li>
                                            <li><a href="#">সচিব এর কার্যালয়</a></li>
                                            <li><a href="#">পরিচালকবৃন্দ</a></li>
                                            <li><a href="#">গবেষণা সমন্বয়কারীর কার্যালয়</a></li>
                                            <li><a href="#">কর্মকর্তাগণের তালিকা</a></li>
                                        </ul><!-- /.submenu -->
                                    </li> 
                                    <li>
                                        <a href="#">কৃতিত্ব 

                                        </a>
                                       <!--  <ul class="submenu">
                                        </ul> -->
                                    </li>
                                    <li>
                                        <a href="">গ্যালারি 
                                        </a>
                                        <ul class="submenu submenu-right">
                                            <li><a href="#">ইনোভেশন গ্যালারি</a></li>
                                            <li><a href="#">ফটো গ্যালারি</a></li>
                                            <li><a href="#">ভিডিও গ্যালারি</a></li>
                                        </ul><!-- /.submenu -->
                                    </li>
                                      <li>
                                        <a href="">ই-সেবা  
                                        </a>
                                        <ul class="submenu submenu-right">
                                            <li><a href="#">বিশ্লেষণ সেবার তালিকা</a></li>
                                            <li><a href="#">বিশ্লেষণ সেবা সম্পর্কিত তথ্য</a></li>
                                        </ul><!-- /.submenu -->
                                    </li> 
                                     <li class="home">
                                        <a href="#">বিসিএসআইআর কার্যক্রম 
                                        </a>                                       
                                    </li>
                                     <li class="home">
                                        <a href="#">যোগাযোগ 
                                        </a>                                       
                                    </li>	
							<?php
						}
						else
						{
						while($cd=mysqli_fetch_array($catp))
						    {
							$i+=1;	
							$catagory_id=$cd['0'];
							$catagory_title=$cd['1'];
                            $template_type=$cd['3'];
                            if ($template_type == 2 or $template_type == 3) {
                                $type = 'gallery';
                            }
                            else {
                                $type = 'page';
                            }
							//now check this category has child 
							$chk_child="select catagory_id,catagory_title,template_type from catagory where mparent='$catagory_id' and menu_st=1";
							$chk_childp=mysqli_query($conn,$chk_child);
							$chk_childpc=mysqli_num_rows($chk_childp);
							if($chk_childpc==0)
							{
                            
                                echo"<li class='home'>
                                        <a href='$type.php?page_id=$catagory_id&template=$template_type'>$catagory_title 
                                        </a>                                       
                                    </li>";	
                           
							}
							else
							{
						    echo"<li>
                           <a href='#'>$catagory_title 
                                        </a>  <ul class='submenu'>";
							while($cm=mysqli_fetch_array($chk_childp))
							{
							$ccatagory_id=$cm['0'];
							$ccatagory_title=$cm['1'];
                            $ctemplate_type=$cm['2'];
                            
                            if ($ccatagory_id == 15) { //sceintist
                                echo"
                            <li><a href='all_scientists.php' target=''>$ccatagory_title</a></li>";
                            }
                            if ($ccatagory_id == 17) {  //employee
                                echo"
                            <li><a href='all_employee.php' target=''>$ccatagory_title</a></li>";
                            }
                            if ($ccatagory_id == 18) {  //research_page
                                echo"
                            <li><a href='all_research.php' target=''>$ccatagory_title</a></li>";
                            }
                            
                            elseif($ccatagory_id != 17 and $ccatagory_id != 15) {
                                
                            if ($ctemplate_type == 2 or $ctemplate_type == 3 ) {
                                $ctype = 'gallery';
                            }
                            else {
                                $ctype = 'page';
                            }
                            
                            echo"
                            <li><a href='$ctype.php?page_id=$ccatagory_id&template=$ctemplate_type'>$ccatagory_title</a></li>";

                            }

            
                            }
                                
                            echo "</ul></li>";
                                    
                                    
							
							
							}	
							}							
							?>
                                  <li><a href="all_dept.php" target="">বিভাগসমূহ </a>
                                    
                                    </li>
                             <li class="home">
                                        <a href="http://training.nothi.gov.bd" target="">নথি</a>
                                    </li>                                                          
                                    <li><a href="<?=$baseurl?>/library" target="">লাইব্রেরি </a>
                                    
                                    </li>
                                     <li><a href="<?php echo $baseurl?>admin/service_login.php?usr=app" target="">বিশ্লেষণ সেবা</a>
                                    </li>

                                    <li><a href="<?php echo $baseurl?>admin/service_login.php?usr=cpto" target="">ক্রয়</a>
                                    </li>

                                     <li><a href="<?php echo $baseurl?>admin/service_login.php?usr=accounts" target="">হিসাব শাখা</a>
                                    </li>

                                    <li><a href="all_forms.php" target="">সংস্থাপন </a>
                                    </li>

                                    <!-- <li><a href="</?=$baseurl?>admin/service_login.php?usr=app" target=""> ই-সেবা (পেমেন্ট)</a>
                                    
                                    </li> -->
							
							<?php
						}	
						
					}	
							?>                                                         
                                </ul><!-- /.menu -->
                            </nav><!-- /.mainnav -->
                        </div><!-- /.nav-wrap -->
                    </div><!-- /.header-wrap -->
                </div><!-- /.container-->
            </div><!-- /.header-wrap-->
        </header>