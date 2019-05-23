<?php
include 'header.php';
include 'sidebar.php';
?>

<div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                  <div id="theme-change" class="hidden-phone">
                      <i class="icon-cogs"></i>
                      <span class="settings">
                          <span class="text">Theme Color:</span>
                          <span class="colors">
                            <span class="color-default" data-style="default"></span>
                            <span class="color-green" data-style="green"></span>
                            <span class="color-gray" data-style="gray"></span>
                            <span class="color-purple" data-style="purple"></span>
                            <span class="color-red" data-style="red"></span>
                          </span>
                      </span>
                  </div>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <!-- <h3 class="page-title">
                     ড্যাশবোর্ড 
                   </h3> -->
                   <!-- <ul class="breadcrumb">
                      <li>
                        <a href="#">Home</a>
                        <span class="divider">/</span>
                      </li>
                      <li>
                        <a href="#">বিসিএসআইআর</a>
                        <span class="divider">/</span>
                      </li>
                      <li class="active">
                          Dashboard
                      </li>
                   </ul> -->
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->

	<div class="widget red">
     <div class="widget-title">
         <!-- <h4><i class="icon-tags"></i> এড নিউজ </h4> -->
          <h4><i class="icon-tags"></i>  
        <?php if(isset($_GET['add_news'])){
          $news = $_GET['add_news'];
          if ($news == "add_news") {
            echo "সংবাদ যোগ";
          }
          elseif ($news == "news_list") {
            echo "সংবাদ তালিকা";
          }
          elseif ($news == "edit_news") {
            echo "সংবাদ সংশোধন ";
          }
        }
        ?>
        </h4>
      
     	</div>
     <div class="widget-body">
      <div class="row-fluid">
                      <div class="span12">
           <?php
		    if (isset($_GET['success'])) {
				  //// echo" <div class='widget orange'><div class='widget-body'>";
		       if ($_GET['success'] == 'news_success') { // ?>
		           <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
		            <h4 class="alert-heading">সফলভাবে সম্পন্ন</h4>
		           </div>
		        <?php 
				} 	
        if ($_GET['success'] == 'news_error') { // ?>
               <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                <h4 class="alert-heading">ত্রুটি ঘটেছে </h4>
               </div>
            <?php 
        } 
        elseif ($_GET['success'] == 'picture_large') { // ?>
           <div class="alert alert-info">
          <button data-dismiss="alert" class="close">×</button>
            <h4 class="alert-heading">ফাইল সাইজ ২০০ কেবি এর বেশি !</h4>
      </div>
        <?php 
        }
        elseif ($_GET['success'] == 'picture_succes') { // ?>
           <div class="alert alert-info">
                <button data-dismiss="alert" class="close">×</button>
                  <h4 class="alert-heading">সফলভাবে সম্পন্ন হয়েছে !</h4>
            </div>
        <?php 
        }
        elseif ($_GET['success'] == 'picture_not_found') { // ?>
           <div class="alert alert-info">
              <button data-dismiss="alert" class="close">×</button>
                <h4 class="alert-heading">কোনো ছবি পাওয়া যায়নি !</h4>
          </div>
        <?php 
		    }
        
			 } ?>

        


		<?php
		if (isset($_GET['add_news'])) {    //if add news found
			$news = $_GET['add_news'];       //if clicked on add news 
			if ($news == "add_news") { ?>

			<form action="Action/add_news.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
         <input type="hidden" value="<?php echo $usernamee?>" name="username" />
			<div class="control-group">
				<label class="control-label"> সংবাদ টাইটেল </label>
					<div class="controls">
						<input type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Type news Title"  name="news_title" required/>
					</div>
				</div>
         <div class="control-group">
          <label class="control-label"> শো অন সংবাদ </label>
            <div class="controls">
              <select name="news_type" class="span6 tooltips" data-original-title="Show on Menu">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>                                
            </div>
         </div>

        <div class="control-group">
            <label class="control-label">ডেস্ক্রিপশন</label>
            <div class="controls">
            <textarea id="ckeditor" placeholder="Type Description" class="span6 popovers ckeditor" data-trigger="hover" data-content="Type Description"  name="news_description" data-original-title="Type Description"></textarea>
            </div>
        </div> 
        <div class="control-group">
            <label class="control-label">মিডিয়া ফাইল</label>
              <div class="controls">
                <input type="file" class="form-control span6" id="exampleInputPassword2" name="files[]" placeholder="Specifications">
              </div>
        </div>
				<div class="control-group">
					<div class="controls">
						<input type="submit" name="add_new_news" value="সাবমিট ">
					</div>
				</div>
			
		   </form>
				
			<?php }

			elseif ($news == "news_list") { ?> <!--  if clicked on list news  -->
            
             <table class="table table-striped table-bordered" style="table-layout:fixed" id="sample_1">
            <thead>
            <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                <th style="width:70px"> আইডি </th>
                <th> নিউজ টাইটেল</th>
                <th style="width:70px"> স্ট্যাটাস</th>
                <!-- <th>Description</th> -->
                <th style="width:220px"> অন্যান্য</th>
                <th style="width:140px"> মেনু অবস্থা </th>
               </thead>
               <tbody>

               	<?php  
                 $list_news=mysqli_query($conn,"SELECT * from news WHERE news_st != 3");	
                 if($list_news==true)
                 {
              		while($data=mysqli_fetch_array($list_news))
              		  { 
              		  $news_id=$data['0'];
                    $news_title=$data['1'];
                    $news_st=$data['2'];
              			// $news_des=$data['3'];
              			$image=$data['4'];
                    {
                      if ($news_st==0) {
                        $news_s = "<span style='color:red;font-weight:700'>অপ্রকাশিত</span>";
                      }
                      else {
                        $news_s = "<span style='color:#74B749;font-weight:700'>প্রকাশিত</span>";
                      }
                    }
  
              			echo "<tr>
              			<td><input type='checkbox' class='checkboxes' value='1' /></td>
      								<td> $news_id </td>
                      <td> $news_title </td>
      								<td> $news_s </td>
      								<td><a href='add_news.php?add_news=edit_news&news_id=$news_id'><span style='width:70px;text-align:center' class='btn btn-success btn_success_custom'>সংশোধন </span></a>
                      <a href='Action/add_news.php?news_id=$news_id&news_delete=news_delete'>
                      <span style='width:70px;text-align:center' class='btn btn-danger'>মুছে ফেলুন</span>
                     
					                </a>
					                </td><td><a href='Action/add_news.php?news_id=$news_id&news_st=news_st&st=$news_st'>
                     <span class='btn btn-primary'>অবস্থা পরিবর্তন</span>
                     </a></td>";
							echo "</tr>";
              		   }}?>
               </tbody>
           </table>

			
				
			<?php }


			elseif ($news == "edit_news") {

			  if (isset($_GET['news_id'])) {
			  	 $news_id = $_GET['news_id'];
           $edit_news=mysqli_query($conn,"SELECT * FROM news WHERE id='$news_id'");  
                 if($edit_news==true)
                 {
                  while($data=mysqli_fetch_array($edit_news))
                    {
                    //$news_id=$data['0'];
                    $news_title=$data['1'];
                    $news_st=$data['2'];
              			$news_des=$data['3'];
              			$image=$data['4'];
                    ?>
                    <form action="Action/add_news.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                     <input type="hidden" value="<?php echo $usernamee?>" name="username" />
                     <input type="hidden" value="<?php echo $news_id?>" name="news_id" />
                        <div class="control-group">
                          <label class="control-label"> সংবাদ টাইটেল </label>
                            <div class="controls">
                              <input type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Type news Title" name="news_title" value="<?=$news_title?>" required/>
                            </div>
                          </div>
                            <div class="control-group">
                              <label class="control-label"> শো অন সংবাদ  </label>
                              <div class="controls">
                                <select name="news_type" class="span6  tooltips" data-original-title="Show on Menu">
                                <option value="1" <?php if($news_st == 1){echo "selected";}?>>Yes</option>
                                <option value="0" <?php if($news_st == 0){echo "selected";}?>>No</option>
                          </select>                                
                          </div>
                         </div>


                             <div class="control-group">
                                <label class="control-label">ডেস্ক্রিপশন</label>
                                <div class="controls">
                                <textarea id="ckeditor" placeholder="Type Description" class="span6  popovers ckeditor" data-trigger="hover" data-content="Type Description"  name="news_description" data-original-title="Type Description">
                                  <?php echo $news_des ?>
                                </textarea>
                               
                                </div>
                            </div> 
                            <div class="control-group">
                            
                                <label class="control-label"> মিডিয়া ফাইল</label>
                                  <div class="controls">
                                    <input type="file" class="form-control span6" name="files[]" placeholder="Specifications" multiple>
                                  </div>
                                  
                            </div>
                            <div class="control-group">
                              <label class="control-label"> ইমেজেস </label>
                              <div class="controls" style="width:200px;width: 200px;display:inline-block; margin-left: 20px;"><img src="Action/uploads/<?="$image"?>"></div>
                            </div>
                            
                          <div class="control-group">
                            <div class="controls">
                              <input type="submit" name="update_news" value="আপডেট ">
                            </div>
                          </div>
                        
                         </form>


                    <?php } } ?>

			 <?php }
			} ?>



	<?php	} ?>  <!-- Ending of ISSET add sheba -->




		

		</div>
		</div>
		</div>
		</div>


</div>







<?php include 'footer.php';?>