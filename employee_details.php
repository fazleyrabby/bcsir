<?php
include 'header.php';
include 'menu.php';
?>

<style>
    .bio{
        font-size: 16px;
        /* margin: 5rem 0; */
    }
    .bio>span{
        display:block;
        margin: 10px 0;
        color: black;
    }
</style>
<div class="page-title parallax parallax4">

    <!-- page 2 tittle -->
    <!-- /page-2 title -->
    <section class="flat-row1 full-color parallax4">
        <div class="container">
            <div class="row">
            <h3 style="font-size:20px;padding:1em;text-align:center"><span>বিজ্ঞানী/কর্মচারী বিবরণ </span></h3>
              
                <div class="blog-item col-md-9 col-sm-12" style="background-color: #fff">
                    <div class="post-item blog-post-item">
                        <div class="row">
                            <div class="content-pad charmen_div col-md-12" style="color: #19791a;">
                          
                        <?php 
                        if (isset($_GET['id'])) {
                           $id=$_GET['id']; 
                        //    echo "$id";
                        
                            $all_scientists_list= mysqli_query($conn,"SELECT employee_name,designation,employee_id,images,join_date,employee_department,cv_file,email,contact_no,employee_details_other from employee_details where employee_st = 1 AND employee_id=$id");
                            $serial = 0;
                            if($all_scientists_list == true){
                                while($data = mysqli_fetch_array($all_scientists_list)){
                                    $serial++;
                                    $name = $data["0"];
                                    $desg = $data["1"];
                                    $id = $data["2"];
                                    $images = $data["3"];
                                    $join_date = $data["4"];
                                    $emp_dept = $data["5"];
                                    $cv = $data["6"];
                                    $email = $data["7"];
                                    $contact = $data["8"];
                                    $emp_details_other = $data["9"];
                                    if($images == ''){
                                      $image_st = "<img style='width: 100%' src='images/no_image.png'>";
                                    }
                                    else {
                                       $image_st= "<img style='width: 100%' src='admin/admin/Action/uploads/$images'>";
                                    }
                                    
                                    if($cv == ''){
                                      $cv_file = "<span style='font-weight:700;color:red'>ফাইল নেই</span>";
                                    }
                                    else {
                                       $cv_file = "<a style='font-weight:700;color:blue;text-decoration:underline' href ='admin/admin/Action/uploads/$cv'>ফাইল লিংক</a>";
                                    }
                                    {
                                    $bd_num=array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
                                    $serial_no = str_replace(range(0, 9),$bd_num, $serial); 
                                        //Numerical Value Conversion
                                    }

                                    ?>
                                    
                                    <div class='col-md-4'>
                                        <?=$image_st?>
                                    </div>

                                    <div class='col-md-8'>
                                    <div class='bio'>
                                    <span>নাম  : <?=$name?> </span>
                                     
                                    <?php 
                                    $desg_details = mysqli_query($conn,"SELECT designation_name from all_designation where id=$desg");
                                    if ($desg_details == true) {
                                        while ($desg_dt = mysqli_fetch_array($desg_details)) {
                                            $desg_name = $desg_dt["0"];
                                            echo "<span>পদবি :$desg_name </span>";
                                        }
                                    }
                                    ?>
                                     
                                    <?php
                                    $dept_details = mysqli_query($conn,"SELECT department_name from all_department where id=$emp_dept");
                                    if ($dept_details == true) {
                                        while ($dept_dt = mysqli_fetch_array($dept_details)) {
                                            $dept_name = $dept_dt["0"];
                                            echo "<span>বিভাগ : $dept_name </span>";
                                        }
                                    } ?>
                                    <span>ই-মেইল : <?=$email?></span>
                                    <span>ফোন : <?=$contact?></span>
                                    <span> <?=$emp_details_other?> </span>
                                    </div>
                                    </div>
                                    
                                    <?php
                                    
                                }
                            }
                            }
                            ?>

                                <!-- <div class="item-content" style="margin-left: 15px;">


                                    <div class="col-md-12">
                                        <ul class="list-inline social-light">
                                            <li><a class="btn btn-default social-icon" href="#"
                                                    style="background-color: #3b5998"><i class="fa fa-facebook"
                                                        style="color: #fff;"></i></a></li>
                                            <li><a class="btn btn-default social-icon" href="#"
                                                    style="background-color: #bd081c"><i class="fa fa-envelope"
                                                        style="color: #fff;"></i></a></li>
                                            <li><a class="btn btn-default social-icon" href="#"
                                                    style="background-color: #1da1f2"><i class="fa fa-twitter"
                                                        style="color: #fff;"></i></a></li>
                                        </ul>
                                    </div>
                                </div> -->
                            </div>
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

    <?php include 'footer.php'; ?>


<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});</script>