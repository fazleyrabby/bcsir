<?php

include '../connect/config.php';

if ($_POST['grade_emp']){
        $grade_emp =  $_POST['grade_emp'];
        $salary_grade_rates = mysqli_query($conn,"SELECT salary_head_id,salary_head_type,rate FROM assign_salary_grade WHERE rate_st = 1 and grade_id = $grade_emp");
        $data_rates_array=array();
        if ($salary_grade_rates == true) {
            while($data_rates = mysqli_fetch_array($salary_grade_rates))
            {
                    $salary_head_id = $data_rates["0"];
                    $salary_head_type = $data_rates["1"];
                    $rate = $data_rates["2"];

                    $data_rates_array[] = $data_rates;

            }
             echo json_encode($data_rates_array);
        }

} 



?>