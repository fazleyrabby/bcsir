<?php
include 'header.php';
include 'sidebar.php';
function truncateString($str, $chars, $to_space, $replacement="...") {
   if($chars > strlen($str)) return $str;

   $str = substr($str, 0, $chars);
   $space_pos = strrpos($str, " ");
   if($to_space && $space_pos >= 0) 
       $str = substr($str, 0, strrpos($str, " "));

   return($str . $replacement);
}
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
                   <h3 class="page-title">
                     <!--ড্যাশবোর্ড -->
                   </h3>
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
       
           <h4><i class='icon-tags'></i> বিস্তারিত </h4>
        
     	</div>
     <div class="widget-body">
      <div class="row-fluid">
     <div class="span12">
           <?php
		    if (isset($_GET['success'])) {
				 // echo" <div class='widget orange'><div class='widget-body'>";
		    if ($_GET['success'] == 'success') { // ?>
		           <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
		            <h4 class="alert-heading">সফলভাবে সম্পন্ন</h4>
		           </div>
		        <?php 
        } 
         if ($_GET['success'] == 'error') { // ?>
		           <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
		            <h4 class="alert-heading">ত্রুটি ঘটেছে !</h4>
		           </div>
		        <?php 
        } 
    	
        if ($_GET['success'] == 'update') { // ?>
               <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                <h4 class="alert-heading">সফলভাবে সংশোধন সম্পন্ন!</h4>
               </div>
            <?php 
        }
        if ($_GET['success'] == 'deleted') { // ?>
               <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                <h4 class="alert-heading">সফলভাবে মুছে ফেলা হয়েছে !</h4>
               </div>
            <?php 
        } 
         if ($_GET['success'] == 'data_exists') { // ?>
               <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                <h4 class="alert-heading">Sample already Exists!</h4>
               </div>
            <?php }
        if ($_GET['success'] == 'update_success') {  ?>
               <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                <h4 class="alert-heading">সফলভাবে সংশোধন সম্পন্ন !</h4>
               </div>
            <?php 
        }
        if ($_GET['success'] == 'update_error') { // ?>
               <div class="alert alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close" type="button">×</button>
                <h4 class="alert-heading">সংশোধন ত্রুটি ঘটেছে !</h4>
               </div>
          
        <?php }
		} ?>

            
<table class="table table-striped table-bordered" id="sample_1">
<thead>
            <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1.checkboxes" /></th>
                <!-- <th>Account id</th> -->
                <th colspan="0"> Date  </th>
                <th> স্ট্যাটাস </th>
                <th> কমেন্টস  </th>
            </tr>
</thead>
<tbody>

		<?php
            // UFR (User Form Request)
            $user_detls_id = $_GET['id'];
            $sql_detls=mysqli_query($conn,"SELECT
	        a.username as sender,
	        b.username as reciever,
            a.user_level, 
            f.send_id,
            f.recv_con_id,
            f.confirm_id,
            f.comments,
            f.created_at,
            f.req_status, 
            f.form_pk_id
            from 
            requirement_detalis_tbl as f 
            left join 
	        ratul_login as a
	        on f.send_id = a.id
	        left join
            ratul_login as b
            on
            f.recv_con_id=b.id
            where form_pk_id=$user_detls_id");
            
            while($row=mysqli_fetch_array($sql_detls))
            { 
                
                $sender = $row['0']; 
                $reciever = $row['1'];
                $user_level = $row['2'];
                $send_id = $row['3'];
                $recv_con_id = $row['4'];
                $confirm_id = $row['5'];
                $comments = $row['6'];
                $created_at = $row['7'];
                $req_status = $row['8'];
                $form_pk_id = $row['9'];

                //$desc = (truncateString($comments, , false) . "\n");

                $date=date('m/d/y - h:i a', strtotime($created_at));

                if ($req_status== 1) {
                    $st = "রিকুয়েস্ট প্রেরণ করেছেন : $sender <br>";
                }
                elseif ($req_status==2) {
                    $st = "অনুমতি দিয়েছেন  $reciever <br>";
                }
                elseif ($req_status==0) {
                    $st = "রিজেক্ট করেছেন $reciever এবং পুনরায় প্রেরণ করেছেন $sender এর নিকট <br>";
                }
                echo "<tr>              	    
                        <td><input type='checkbox' class='checkboxes' value='1'/></td> 
                        <td> $date </td>
                        <td> $st </td>
                        <td> $comments </td>
                        ";
                        echo "</tr>";
                
           ?>


             

               
           <?php } ?>
           </tbody>
           </table>
           

		</div>
		</div>
		</div>
		</div>


</div>


</div>




<?php include 'footer.php';?>