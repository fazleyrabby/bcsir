<?php
include 'header.php';
include 'menu.php';
?>

<div class="page-title parallax parallax4">
<style>
.department_table>tbody>tr>td:first-child{
   text-align:center;
}
.department_table th, 
.department_table td {
    padding: 10px;
    font-size: 16px;
    color: #111;
}
.table_header{
    font-size: 18px;
    font-weight:700;
    padding:10px;
    color: #111;
}
</style>
    <!-- page 2 tittle -->
    <!-- /page-2 title -->
    <section class="flat-row1 full-color parallax4">
        <div class="container">
            <div class="row">
                <div class="blog-item col-md-9 col-sm-12" style="background-color: #fff">
                    <div class="post-item blog-post-item">
                    <h3 class="text-center" style="font-size:20px;padding:1em"><span>সকল বিভাগসমূহ</span><span style="font-size:14px">&nbsp;&nbsp;&nbsp;&nbsp;(নিচের তালিকা থেকে বাছাই করুন)</span></h3>
                        <div class="row">
                            <div class="content-pad charmen_div col-md-12" style="color: #19791a;">
                        <!-- </?php 
                            $all_dept= mysqli_query($conn,"SELECT id,department_name from all_department where department_st = 1");
                            $serial = 0;
                            if($all_dept == true){
                                while($data = mysqli_fetch_array($all_dept)){
                                    $serial++;
                                    $id = $data["0"];
                                    $dept_name = $data["1"];
                                    {
                                    $bd_num=array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
                                    $serial_no = str_replace(range(0, 9),$bd_num, $serial); 
                                        //Numerical Value Conversion
                                    }
                                    echo "<ul>";
                                    // echo "<td style='width:4%'>$serial_no</td>";
                                  
                                    echo "<a href='employee_dept_list.php?dept=$id'><li style='text-align:left;font-size:20px;margin-left: 18px;margin-bottom:10px'>$serial_no - $dept_name
                                    </li></a>
                                    </ul>";
                                }
                            }
                            ?> -->
                            <div class="col-md-6">
                                <h2 class="text-center table_header">গবেষণা </h2>
                              <table id="" class="department_table table-bordered table-striped" style="table-layout:fixed;width:100%">
                            <thead>
                            <tr>
                                <!-- <th>সিরিয়াল</th> -->
                                <th width="25%">ক্রমিক নং </th>
                                <th>বিভাগের নাম </th>
                                <!-- <th>ডেস্ক্রিপশন </th> -->
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $all_research= mysqli_query($conn,"SELECT id,department_name,serial,type FROM all_department WHERE department_st = 1 and type = 2");
                            $serial = 0;
                            if($all_research == true){
                                while($data = mysqli_fetch_array($all_research)){
                                    $id=$data['0'];
                                    $name=$data['1'];
                                    $serial=$data['2'];
                                    $type=$data['3'];
                                    {
                                    $bd_num=array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
                                    $serial = str_replace(range(0, 9),$bd_num, $serial); 
                                        
                                    }
                                    echo "<tr>";
                                    echo "<td style='width:30%;text-align:left'><span style='position: absolute; visibility: hidden;'>নাম :</span>$serial</td>";
                                    echo "<td style='width:40%;text-align:left'>
                                    <a href='employee_dept_list.php?dept=$id'>
                                    $name</a></td>
                                    </tr>";
                                }
                            }
                            ?>
                           
                            </tbody>
                        </table>
                        </div>
                        <div class="col-md-6">
                            <h2 class="text-center table_header">প্রশাসনিক  </h2>
                              <table id="" class="department_table table-bordered table-striped" style="table-layout:fixed;width:100%">
                            <thead>
                            <tr>
                                <!-- <th>সিরিয়াল</th> -->
                                <th width="25%">ক্রমিক নং </th>
                                <th>বিভাগের নাম </th>
                                <!-- <th>ডেস্ক্রিপশন </th> -->
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $all_research= mysqli_query($conn,"SELECT id,department_name,serial,type FROM all_department WHERE department_st = 1 and type = 1");
                            $serial = 0;
                            if($all_research == true){
                                while($data = mysqli_fetch_array($all_research)){
                                    $id=$data['0'];
                                    $name=$data['1'];
                                    $serial=$data['2'];
                                    $type=$data['3'];
                                    {
                                    $bd_num=array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
                                    $serial = str_replace(range(0, 9),$bd_num, $serial); 
                                        
                                    }
                                    echo "<tr>";
                                    echo "<td style='width:30%;text-align:left'><span style='position: absolute; visibility: hidden;'>নাম :</span>$serial</td>";
                                    echo "<td style='width:40%;text-align:left'><a href='employee_dept_list.php?dept=$id'>$name</a></td>
                                    </tr>";
                                }
                            }
                            ?>
                           
                            </tbody>
                        </table>
                        </div>
                            


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
<!-- <script>$(document).ready(function(){
    $('#example').DataTable({
        "order": [[ "asc" ]]
    });
} );</script>

<script>$(document).ready(function(){
    $('#example2').DataTable({
        "order": [[ "asc" ]]
    });
} );</script> -->
