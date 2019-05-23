<?php
include 'header.php';
include 'menu.php'; ?>

 <div class="page-title parallax parallax4">

        <!-- page 2 tittle -->   
        <!-- /page-2 title -->
<section class="flat-row1 full-color parallax4">
    <div class="container">                
    <div class="row">
                    <div class="blog-item col-md-12 col-sm-12" style="background-color: #fff">
					<?php
					if(isset($_GET['page_id']) && isset($_GET['template']))
					{
                    $page_id=$_GET['page_id'];
                    $template=$_GET['template'];
                    
			$r="SELECT media_id,media_title,media_file,media_description,media_type,entry_date FROM media_details WHERE media_type='$page_id'";
			$rp=mysqli_query($conn,$r);
			if($rp==true)
			{
			$pc=mysqli_num_rows($rp);	
			if($pc==0)
			   {?>
                   <div class="post-item blog-post-item">
                                        <div class="row">
                                        <div class="content-pad charmen_div" style="color: #19791a">
                                             <img src="images/chr01.jpg" alt="image" class="Img_chairmen" >
                                                    <div class="item-content" style="margin-left: 15px;    min-height: 290px;">
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
            <?php
			} 
			else
			{ ?>
            <div class="post-item blog-post-item row" style="border: 1px solid #ccc4">

                         <?php if ($template == 3) { 
                            $i=0;
                            while($d=mysqli_fetch_array($rp))
                                {
                                    $media_id=$d['0'];
                                    $media_title=$d['1'];
                                    $media_file=$d['2'];
                                    $media_description=$d['3'];
                                    $entry_date=$d['5'];  
                                    $media_type=$d['4'];

                                    
                                    //page title
                                    ?>
                                    
                                    
                                    <div class="col-md-3">
                                        <div class="item-content" style="">
                                            <h3 class="title" style="margin-bottom: 10px">
                                                <?php echo $media_title?>
                                            </h3>
                                        <!-- Trigger the Modal -->

                                        <img id="myImg<?=$i?>" src="admin/admin/Action/uploads/<?=$media_file?>"  alt="<?=$media_title?>" style="width: 100%; cursor: pointer;height: 200px;">

                                        <!-- The Modal -->
                                        <div id="myModal<?=$i?>" class="modal">

                                        <!-- The Close Button -->
                                        <span class="close">&times;</span>

                                        <!-- Modal Content (The Image) -->
                                        <img class="modal-content" id="img<?=$i?>">

                                        <!-- Modal Caption (Image Text) -->
                                         <div class="caption" id="caption<?=$i?>"><?php echo $media_title;?><?php echo $media_description;?>
                                        
                                        </div>
                                        </div>
                                </div> 
                                </div>
                                 
                                  <?php 
                                 
                                  $i++;
                                  } 
                                   echo "<input type='hidden' id='modal_num' value='$i'/>";
                                }
                                  
                                  elseif ($template == 2)  //for video 
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
                                    $i = 0;
                                    ?>
                                       <div class="col-md-6">
                                        <div class="item-content" style="margin-left: 15px;">
                                            <h3 class="title" style="margin-bottom: 10px">
                                                <?php echo $media_title?>
                                            </h3>

                                    
                                   <?php $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
                                    $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';
                                    if (preg_match($longUrlRegex, $media_description, $matches)) {
                                    $youtube_id = $matches[count($matches) - 1];
                                    }

                                    if (preg_match($shortUrlRegex, $media_description, $matches)){
                                    $youtube_id = $matches[count($matches) - 1];
                                    }
                                    // $url = $media_description;
                                    // preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                                    // $id = $matches[1];
                                    // $width = '800px';
                                    // $height = '450px';
                                    echo "<iframe id='ytplayer' type='text/html' width='100%' height='400px'
                                    src='https://www.youtube.com/embed/$youtube_id?rel=0&showinfo=0&color=white&iv_load_policy=3'
                                    frameborder='0' allowfullscreen></iframe> </div> </div>"; 
                                    
                                  } ?>
                               
                                   
                                  


					   <?php
				   }			
			}
				}
                    } ?> 

                     <div class="col-md-12">
                                        <ul class="list-inline social-light">
                                        <li><a class="btn btn-default social-icon" href="#" style="background-color: #3b5998"><i class="fa fa-facebook" style="color: #fff;"></i></a></li>
                                        <li><a class="btn btn-default social-icon" href="#" style="background-color: #bd081c"><i class="fa fa-envelope"style="color: #fff;"></i></a></li>
                                        <li><a class="btn btn-default social-icon" href="#" style="background-color: #1da1f2"><i class="fa fa-twitter"style="color: #fff;"></i></a></li>
                                    </ul>
                                    </div>
                    
                    
                    </div>
                    
                                    </div>
                                    </div>
                                </div> 

                               

                                      
                                     

                    

                    <!-- important link -->
                    <!-- 2nd/div --> 
                </div>
        </section>        
        <br>
        <!-- /flat-row -->

        <!-- 2nd row -->












<?php include 'footer.php';
?>


<script>
var num = document.getElementById('modal_num').value; //from modal numbers 
for (var i = 0; i < num; i++) {
var modal = document.getElementById('myModal'+i);
var img = document.getElementById('myImg'+i);
var modalImg = document.getElementById("img"+i);
var captionText = document.getElementById("caption"+i);
var span = document.getElementsByClassName("close")[i];
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}
}
span.onclick = function() { 
  modal.style.display = "none";
}
</script>

<style>
/* Style the Image Used to Trigger the Modal */
#myImg 
{
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
.caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, .caption { 
    animation-name: zoom;
    animation-duration: 0.6s;
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #fff;
    font-size: 55px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}

</style>