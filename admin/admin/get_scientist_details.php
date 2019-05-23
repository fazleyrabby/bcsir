<?php
include '../connect/config.php';

if ($_POST['employee_details_id'])
{  
   $returnArray = array();
   $employee_details_id =  $_POST['employee_details_id'];
   $employee_name = mysqli_query($conn,"SELECT employee_name,employee_department,
   designation,employee_grade FROM 
   employee_details 
   WHERE id = $employee_details_id");
    if($employee_name == true) 
    {
        while($data = mysqli_fetch_array($employee_name)){
            
            $name = $data['0'];
            $department = $data['1'];
            $designation = $data['2'];
            $grade = $data['3'];
        
            // echo json_encode($data);
            $employee_dept = mysqli_query($conn,"SELECT department_name as dept_name FROM all_department WHERE id = $department");
            $employee_dept_row = mysqli_num_rows($employee_dept);

            if($employee_dept_row > 0)
            {
                // while($emp_dept = mysqli_fetch_array($employee_dept)){
                //     $dept = $emp_dept['0'];
                //     echo $dept;
                // }
                $dept_obj = mysqli_fetch_object($employee_dept);
                $dept=$dept_obj->dept_name;    
            }
            else
            {
                $dept="";
            }

            $employee_desg = mysqli_query($conn,"SELECT designation_name as desg_name FROM all_designation WHERE id = $designation");
            
            $employee_desg_row = mysqli_num_rows($employee_desg);
            if($employee_desg_row > 0)
            {
                //  while($emp_desg = mysqli_fetch_array($employee_desg)){
                //     $desg = $emp_desg['0'];
                //     echo $desg;
                // }
                $desg_obj = mysqli_fetch_object($employee_desg);
                $desg=$desg_obj->desg_name; 
            }
            else
            {
            $desg="";
            }

            $employee_grade = mysqli_query($conn,"SELECT grade_name as gd_name FROM all_employee_grade WHERE id = $grade");

            $employee_grade_row = mysqli_num_rows($employee_grade);
            if($employee_grade_row > 0){

                $gd_obj = mysqli_fetch_object($employee_grade);
                $gd=$gd_obj->gd_name;
            }
            else
            {
                $gd="";
            }
            
            $returnArray = [$name,$dept,$desg,$gd]; 
                  
                // echo json_encode($data_rates_array);
            }
            echo json_encode($returnArray);
         } 
         //$salary_head_add= array();     
    }

?> 