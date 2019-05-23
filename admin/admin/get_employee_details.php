<?php
include '../connect/config.php';

if ($_POST['employee_id'])
{  
   $employee_id =  $_POST['employee_id'];
   $employee_name = mysqli_query($conn,"SELECT employee_name,employee_department,
   designation,employee_grade,join_date,basic_salary FROM 
   employee_details 
   WHERE id = $employee_id");
   $returnArray = array();
    if($employee_name == true) 
    {
        while($data = mysqli_fetch_array($employee_name)){
            
            // var_dump($data);
     
            $name = $data['0'];
            $department = $data['1'];
            $designation = $data['2'];
            $grade = $data['3'];
            $joindate = $data['4']; 
            $basic_salary = $data['5']; 
            //  var_dump($data);
            //  die();
            $employee_dept = mysqli_query($conn,"SELECT department_name as dept_name FROM all_department WHERE id = $department");
            $row_emp = mysqli_num_rows($employee_dept);
            if($row_emp > 0)
            {
                $dept_obj = mysqli_fetch_object($employee_dept);
                $dept=$dept_obj->dept_name;    
            }
            else
            {
                $dept="";
            }
            $employee_desg = mysqli_query($conn,"SELECT designation_name as desg_name FROM all_designation WHERE id = $designation");
            $row_desg = mysqli_num_rows($employee_desg);
            if($row_desg > 0){
            $desg_obj = mysqli_fetch_object($employee_desg);
            $desg=$desg_obj->desg_name;
            }
            else
            {
              $desg="";
            }

            $employee_grade = mysqli_query($conn,"SELECT grade_name as gd_name FROM all_employee_grade WHERE id = $grade");
            $row_grade = mysqli_num_rows($employee_grade);
            if($row_grade > 0){
            $gd_obj = mysqli_fetch_object($employee_grade);
            $gd=$gd_obj->gd_name;
            }
            else
            {
                $gd="";
            }
            
            //$grade_emp =  $_POST['grade_emp'];
            $salary_grade_rates = mysqli_query($conn,"SELECT salary_head_id,salary_head_type,rate FROM assign_salary_grade WHERE rate_st = 1 and grade_id = $grade");

            $row_salary_gd_rates = mysqli_num_rows($salary_grade_rates);

            
            $data_rates_array=array();
            $all_options = array();

            
            //$all_options[] = "<option value=''> </option>";
          
            if ($row_salary_gd_rates > 0) {
                while($data_rates = mysqli_fetch_array($salary_grade_rates))
                {
                        $salary_head_id = $data_rates["0"];
                        $salary_head_type = $data_rates["1"];
                        $rate = $data_rates["2"];

                        $data_rates_array[] = $data_rates;

                        $salary_head = mysqli_query($conn,"SELECT account_head_id,account_head_name FROM account_head WHERE account_head_st = 1 AND account_head_group = 2 AND account_head_id = $salary_head_id"); 
                        $row_shead = mysqli_num_rows($salary_head);
                        if ($row_shead > 0) 
                        { 
                            while ($salary_head_dt = mysqli_fetch_array($salary_head)) 
                            { 
                                  
                                  $all_options[] = $salary_head_dt;
                                
                            }
                              
                        } 
                        
                        
                }
                 
                $returnArray = [$name,$dept,$desg,$gd,$joindate,$data_rates_array,$all_options,$basic_salary];
                // echo json_encode($data_rates_array);
            }
            else{
                $returnArray = [$name,$dept,$desg,$gd,$joindate,"","",$basic_salary];
            }
           
         } 
         //$salary_head_add= array();
         echo json_encode($returnArray);

          
         
        
         
    }

}





?> 