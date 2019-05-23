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
            <h3 style="font-size:20px;padding:1em;text-align:center"><span>কর্মচারীদের তালিকা </span></h3>
              
                <div class="blog-item col-md-9 col-sm-12" style="background-color: #fff">
                    <div class="post-item blog-post-item">
                        <div class="row">
                            <div class="content-pad charmen_div col-md-12" style="color: #19791a;">
                          <table id="employee" class="table-bordered table-striped" style="width:100%;table-layout:fixed">
                            <thead>
                            <tr>
                                <th>ইমেইজ</th>
                                <th class="desg" width='25%'>পদবী</th>
                                <th>নাম</th>
                                <th>বিভাগ </th>
                                <th width='15%'>ডিটেইলস ফাইল</th>
                            </tr>
                            <!-- <tr class="">
                                <th></th>
                                <th class="desg">পদবী</th>
                                <th></th>
                                <th> </th>
                            </tr> -->
                            </thead>
                            <tbody>
                            <?php 
                            $all_scientists_list= mysqli_query($conn,"SELECT employee_name,designation,employee_id,images,join_date,employee_department,cv_file from employee_details where employee_type = 1 AND employee_st = 1 order by id");
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
                                    if($images == ''){
                                      $image_st = "<img style='width: 150px' src='images/no_image.png'>";
                                    }
                                    else {
                                       $image_st= "<a href='employee_details.php?id=$id'><img style='width: 100%' src='admin/admin/Action/uploads/$images'></a>";
                                    }
                                    if($cv == ''){
                                      $cv_file = "<span style='font-weight:700;color:red'>ফাইল নেই</span>";
                                    }
                                    else {
                                       $cv_file = "<a target=_blank style='font-weight:700;color:blue;text-decoration:underline' href ='admin/admin/Action/uploads/$cv'>ফাইল লিংক</a>";
                                    }
                                    {
                                    $bd_num=array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
                                    $serial_no = str_replace(range(0, 9),$bd_num, $serial); 
                                        //Numerical Value Conversion
                                    }
                                    echo "<tr>";
                                    // echo "<td style='width:4%'>$serial_no</td>";
                                    echo "<td style='width:25%;text-align:left'>$image_st</td>";
                                    echo "<td style='width:25%;text-align:left'>";
                                    $desg_details = mysqli_query($conn,"SELECT designation_name from all_designation where id=$desg");
                                    if ($desg_details == true) {
                                        while ($desg_dt = mysqli_fetch_array($desg_details)) {
                                            $desg_name = $desg_dt["0"];
                                            echo "$desg_name";
                                        }
                                    }
                                    echo "</td>";
                                    echo "<td style='width:25%;text-align:left'><a href= 'employee_details.php?id=$id'>$name</a>
                                    </td>";
                                    echo "<td style='text-align:left'>";
                                    $dept_details = mysqli_query($conn,"SELECT department_name from all_department where id=$emp_dept");
                                    if ($dept_details == true) {
                                        while ($dept_dt = mysqli_fetch_array($dept_details)) {
                                            $dept_name = $dept_dt["0"];
                                            echo "$dept_name";
                                        }
                                    }
                                    echo "</td>
                                    <td>$cv_file</td>
                                    </tr>";
                                }
                            }
                            ?>
                            <!-- <tr class="odd gradeX">
                                <td rowspan="4"></td>
                                <td class="hidden-phone"><a href="mailto:jhone-doe@gmail.com">jhone-doe@gmail.com</a></td>
                                <td class="hidden-phone">10</td>
                                <td class="center hidden-phone">02.03.2013</td>
                                <td class="hidden-phone"><span class="btn btn-success btn_success_custom">Approved</span></td>
                            </tr> -->
                           
                            </tbody>
                        </table>


                                <div class="item-content" style="margin-left: 15px;">


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
                                </div>
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


