 <div class="page-title parallax parallax4">

        <!-- page 2 tittle -->   
        <!-- /page-2 title -->
<section class="flat-row1 full-color parallax4">
    <div class="container">                
    <div class="row">
                    <div class="blog-item col-md-9 col-sm-12" style="background-color: #fff">
					<?php
					if(isset($_GET['page_id']))
					{
                    $page_id=$_GET['page_id'];
                        $r="SELECT media_id,media_title,media_file,media_description,media_type,entry_date from media_details where media_type='$page_id'";
                        $rp=mysqli_query($conn,$r);
                        if($rp==true)
                        {
                        $pc=mysqli_num_rows($rp);	
                        if($pc==0)
                        {
                            ?>
                                    <div class="post-item blog-post-item">
                                        <div class="row">
                                        <div class="content-pad charmen_div" style="color: #19791a">
                                             <img src="images/chr01.jpg" alt="image" class="Img_chairmen" >
                                                    <div class="item-content" style="margin-left: 15px;    min-height: 290px;">
                                                         <h3 class="title">
                                                           পরিচালক
                                                        </h3>
                                                <div class="item-excerpt blog-item-excerpt">
                                                


                                                   <h2><strong>Dr. Mohammad Mostafa</strong></h2>
                                                   <p>Director (In-Charge)</p>
                                                   <p>BCSIR Laboratories, Chittagong.</p>
                                                   <br>
                                                <p>Aimed at fulfilling the target of vision 2021, the government of Bangladesh engaged for pursuing scientific research for the betterment of the Bangladeshi people. The Bangladesh Council of Scientific and Industrial Research (BCSIR) laboratories Chittagong has been playing a major role in this dynamic process, by conducting, promoting and co-coordinating market driven scientific and industrial research, rescheduling organizational set-up/organogram, ordinance, by-laws and regulations to meet the demand of vision 2021, getting all laboratories accreditated to cater the needs of the local market as well as the export market in addition to training up various research and analytical laboratories of the country; creating and sustaining a congenial atmosphere to flourish R&D activities in the country and  generating income to replenish 25% of the total expenditure of BCSIR. Covering a wide spectrum of science and technology, BCSIR Chittagong is pursuing both basic and applied research in the field of medicinal and aromatic plants, industrial microbiology, phytochemistry, chemistry, drug and toxicology, development of herbal products, cosmetics and food supplements etc, with the full establishment of eight research divisions. In addition to taking up research projects on current national issues, the BCSIR Chittagong is also mandated to offer analytical services to solve various fundamental and applied problems faced by the industries, different public and private organizations, enterprises, entrepreneurs and stakeholders. The BCSIR Chittagong is a collaborative and interdisciplinary approach, bringing everything to make a unique platform for teaching and training for graduate students and postdoctoral trainees. Among other research institutions in the country,  BCSIR Chittagong is working as a liaison and coordination platform for the relevant public agencies to reduce the gap and barrier, by concentrating on discovery, translate the research into applications and products.

Please visit our informative website and find out for yourself the wealth of opportunities that exist here on the platform of research and innovation.</p>
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
			else
			{
				   while($d=mysqli_fetch_array($rp))
				   {
					   $media_id=$d['0'];
					   $media_title=$d['1'];
					   $media_file=$d['2'];
					   $media_description=$d['3'];
					   $entry_date=$d['5'];  
					   $media_type=$d['4'];
                       //page title
                       $ext  = (new SplFileInfo($media_file))->getExtension();

					   $t="select catagory_title from catagory where catagory_id=$media_type";
					   $tp=mysqli_query($conn,$t);
					   $top=mysqli_fetch_object($tp);
					   $tc=$top->catagory_title;
					   ?>
                        <div class="post-item blog-post-item">
                            <div class="row">
                            <div class="content-pad charmen_div" style="color: #19791a">
                                    <h3 class="title text-center" style="padding:10px">
                                                <span style="position: absolute;
                                                    visibility: hidden;">নাম :</span><?php echo $media_title?>
                                            </h3>
                                 <?php if ($media_file != "" && $ext != 'pdf' ) { ?>
                                     <img src="<?php echo "admin/admin/Action/uploads/$media_file";?>" alt="image" class="Img_chairmen" >
                                    <?php }
                                    elseif($ext == 'pdf'){ ?>
                                    <div style="">
                                        <iframe style="margin:0 auto;display:block;margin-bottom:20px" src="http://docs.google.com/viewer?url=<?=$baseurl?>admin/admin/Action/uploads/<?=$media_file?>&embedded=true" width="800" height="780" style="border: none;"></iframe>
                                    </div>

                                    <?php } ?>
                                        <div class="item-content" style="margin-left: 15px; min-height: 290px;">
                                            
                                    <div class="item-excerpt blog-item-excerpt">
                                    <?php
                                    echo $media_description
                                    ?>
                                    </div>
                                        <!-- <ul class="list-inline social-light">
                                        <li><a class="btn btn-default social-icon" href="#" style="background-color: #3b5998"><i class="fa fa-facebook" style="color: #fff;"></i></a></li>
                                        <li><a class="btn btn-default social-icon" href="#" style="background-color: #bd081c"><i class="fa fa-envelope"style="color: #fff;"></i></a></li>
                                        <li><a class="btn btn-default social-icon" href="#" style="background-color: #1da1f2"><i class="fa fa-twitter"style="color: #fff;"></i></a></li>
                                    </ul>  -->
                                    </div>
                                    </div>
                                    </div>
                                </div> 
					   <?php
				   }			
			}
				} }
                    
                    elseif(isset($_GET['details']))
                    {
                    $details = $_GET['details'];
                    $r="select media_id,media_title,media_file,media_description,media_type,entry_date from media_details where media_id='$details'";
                    $rp=mysqli_query($conn,$r);
                    if($rp==true)
                    {
                    while($d=mysqli_fetch_array($rp)) { 
                    $media_id=$d['0'];
                    $media_title=$d['1'];
                    $media_file=$d['2'];
                    $media_description=$d['3'];
                    $entry_date=$d['5'];  
                    $media_type=$d['4'];
             
                   ?>
                    <div class="post-item blog-post-item">
                                        <div class="row">
                                        <div class="content-pad charmen_div" style="color: #19791a; height: inherit !important; border:none !important;">
                                             <?php if($media_file != ""){ ?>
                                                 <img src="<?php echo "admin/admin/Action/uploads/$media_file";?>" alt="image" class="" style="display:block; width 35%; margin: 0 auto;">
                                           <?php  } ?>
                                                    <div class="item-content" style="margin-left: 15px; border:none">
                                                        <h3 class="text-center title">
                                                          <span style="position: absolute;
                                                    visibility: hidden;">নাম :</span><?php echo $media_title?>
                                                        </h3>
                                                <p>
                                                <div class="item-excerpt blog-item-excerpt">
                                              <p class='text-center'><?php echo $media_description?>
                                              </p>
                                                </div>
                                              
                                                </div>
                                                </div>
                                                </div>
                                            </div> 
                                                <ul class="social-light" style="display:inline-flex">
                                                    <li><a class="btn btn-default social-icon" href="#" style="background-color: #3b5998"><i class="fa fa-facebook" style="color: #fff;"></i></a></li>
                                                    <li><a class="btn btn-default social-icon" href="#" style="background-color: #bd081c"><i class="fa fa-envelope"style="color: #fff;"></i></a></li>
                                                    <li><a class="btn btn-default social-icon" href="#" style="background-color: #1da1f2"><i class="fa fa-twitter"style="color: #fff;"></i></a></li>
                                                </ul> 
					<?php }}
                    }	else
			{
			?>
                                    <div class="post-item blog-post-item">
                                        <div class="row">
                                        <div class="content-pad charmen_div" style="color: #19791a">
                                             <img src="images/chr01.jpg" alt="image" class="Img_chairmen" >
                                                    <div class="item-content" style="margin-left: 15px;    min-height: 290px;">
                                                        <h3 class="title">
                                                           পরিচালক
                                                        </h3>
                                                <div class="item-excerpt blog-item-excerpt">
                                                


                                                   <p>Dr. Mohammad Mostafa</p>
                                                   <p>Director (In-Charge)</p>
                                                   <p>BCSIR Laboratories, Chittagong.</p>
                                                   <br>
                                                <p>Aimed at fulfilling the target of vision 2021, the government of Bangladesh engaged for pursuing scientific research for the betterment of the Bangladeshi people. The Bangladesh Council of Scientific and Industrial Research (BCSIR) laboratories Chittagong has been playing a major role in this dynamic process, by conducting, promoting and co-coordinating market driven scientific and industrial research, rescheduling organizational set-up/organogram, ordinance, by-laws and regulations to meet the demand of vision 2021, getting all laboratories accreditated to cater the needs of the local market as well as the export market in addition to training up various research and analytical laboratories of the country; creating and sustaining a congenial atmosphere to flourish R&D activities in the country and  generating income to replenish 25% of the total expenditure of BCSIR. Covering a wide spectrum of science and technology, BCSIR Chittagong is pursuing both basic and applied research in the field of medicinal and aromatic plants, industrial microbiology, phytochemistry, chemistry, drug and toxicology, development of herbal products, cosmetics and food supplements etc, with the full establishment of eight research divisions. In addition to taking up research projects on current national issues, the BCSIR Chittagong is also mandated to offer analytical services to solve various fundamental and applied problems faced by the industries, different public and private organizations, enterprises, entrepreneurs and stakeholders. The BCSIR Chittagong is a collaborative and interdisciplinary approach, bringing everything to make a unique platform for teaching and training for graduate students and postdoctoral trainees. Among other research institutions in the country,  BCSIR Chittagong is working as a liaison and coordination platform for the relevant public agencies to reduce the gap and barrier, by concentrating on discovery, translate the research into applications and products.

Please visit our informative website and find out for yourself the wealth of opportunities that exist here on the platform of research and innovation.</p>
                                                  <!-- <ul class="list-inline social-light">
                                                    <li><a class="btn btn-default social-icon" href="#" style="background-color: #3b5998"><i class="fa fa-facebook" style="color: #fff;"></i></a></li>
                                                    <li><a class="btn btn-default social-icon" href="#" style="background-color: #bd081c"><i class="fa fa-envelope"style="color: #fff;"></i></a></li>
                                                    <li><a class="btn btn-default social-icon" href="#" style="background-color: #1da1f2"><i class="fa fa-twitter"style="color: #fff;"></i></a></li>
                                                </ul>  -->
                                                </div>
                                                </div>
                                                </div>
                                            </div>
<?php } ?>
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
