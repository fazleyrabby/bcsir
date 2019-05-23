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
                    <div class="post-item blog-post-item">
                     <h3 style="font-size:20px;padding:1em;text-align:center"><span>সকল গবেষণা</span></h3>
                        <div class="row">
                            <div class="content-pad charmen_div col-md-12" style="color: #19791a;">
                          <table id="example" class="table-bordered table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <!-- <th>সিরিয়াল</th> -->
                                <th>বিজ্ঞানীর নাম </th>
                                <th>রিসার্চের নাম </th>
                                <th>মিডিয়া ফাইল </th>
                                <th>পাবলিশ তারিখ</th>
                                <!-- <th>ডেস্ক্রিপশন </th> -->
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $all_research= mysqli_query($conn,"SELECT employee_details_id,research_name,research_media,publish_date,employee_name,employee_id,r.id from research as r left join employee_details as e on e.id=r.employee_details_id where research_st = 1");
                            $serial = 0;
                            if($all_research == true){
                                while($data = mysqli_fetch_array($all_research)){
                                    $employee_details_id=$data['0'];
                                    $research_name=$data['1'];
                                    $research_media=$data['2'];
                                    $publish_date=$data['3'];
                                    $scientist_name=$data['4'];
                                    $employee_id=$data['5'];
                                    $id=$data['6'];

                                    if($research_media == ''){
                                      $image_st = "NONE";
                                    }
                                    else {
                                       $image_st= "<a style='color: Blue' href='admin/admin/Action/research/$research_media' target='_blank'>File</a>";
                                    }
                                    {
                                    $bd_num=array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
                                    $publish_date = str_replace(range(0, 9),$bd_num, $publish_date); 
                                        //Numerical Value Conversion
                                    }
                                   
                                    echo "<tr>";
                                    echo "<td style='width:30%;text-align:left'><span style='position: absolute; visibility: hidden;'>নাম :</span>$scientist_name</td>";
                                    echo "<td style='width:40%;text-align:left'>$research_name</td>";
                                    echo "<td style='width:10%;text-align:left'>$image_st</td>";
                                    echo "<td style=';text-align:left'>$publish_date</td>
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

    <?php include 'footer.php';

?>
