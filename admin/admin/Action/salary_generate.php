<?php 
include '../../connect/config.php'; 
echo "<script src='../js/sweet_alert.js'></script>";

if(isset($_POST['salary_generate']))  //Generate Salary
{ 
//   echo "<pre>";
//   print_r($_POST);
//   die();
$total_amount = $_POST['total_amount'];
$year = $_POST['year'];
$month = $_POST['month'];
$employee_id = $_POST['employee_id'];
$paid_salary = $_POST['paid_salary'];
$basic_salary = $_POST['basic_salary'];
$employee_grade = $_POST['employee_grade'];
$basic_salary = $_POST['basic_salary'];


 foreach ($employee_grade as $key => $value) {
     
    $salary_grade_rates = mysqli_query($conn,"SELECT salary_head_id,salary_head_type,rate FROM assign_salary_grade WHERE rate_st = 1 and grade_id = $value");

            $gross_salary_add=0;
            $gross_salary_min=0;
            $salary_grade_rate_row = mysqli_num_rows($salary_grade_rates);
            if ($salary_grade_rate_row > 0) 
            {
                while ($data = mysqli_fetch_array($salary_grade_rates)) 
                {
                    $salary_head_id[$key] = $data["0"];
                    $salary_head_type[$key] = $data["1"];
                    $rate[$key] = $data["2"];
                    
                    
                
                    // 1=add,2=sub
                    
                    $total_percent = $basic_salary[$key]*$rate[$key];

                    $total = $total_percent/100;

                    
                    if ($salary_head_type[$key] == 1) 
                    {   
                        
                        for ($add=0; $add < count($salary_head_id[$key]) ; $add++) 
                        {
                            $salary_head_id_add[$key][$salary_head_id[$key]] = $salary_head_id[$key];
                            // echo $add;
                            // $salary_head_id_add[$key] = $key;
                            $salary_head_add[$key][$salary_head_id[$key]] = $total;
                            
                            // echo $add;
                            // echo $i;
                            $gross_salary_add += $total;
                           
                        }
                    }
                    if ($salary_head_type[$key] == 2) 
                    {  

                        for ($min=0; $min < count($salary_head_id[$key]) ; $min++) 
                        {  
                            $salary_head_id_min[$key][$salary_head_id[$key]] = $salary_head_id[$key];
                            // $salary_head_id_add[$key] = $key;
                            $salary_head_min[$key][$salary_head_id[$key]] = $total;
                            
                            // echo $i;
                            $gross_salary_min += $total;
                            // echo "$salary_head_id_min-$total<br>";
                   
                        }
                    }
                        $t_salary=$gross_salary_add-$gross_salary_min; 
                }


 }
}

       
                
// print_r($key);
// echo "<pre>";
// print_r($salary_head_add[0]);
// print_r($salary_head_id_add[0]);
// die();





//   print_r($employee_id);
//   die();
//   $salary_head_add = $_POST['salary_head_add'];
//   $salary_head_min = $_POST['salary_head_min'];
//   $salary_head_id_add = $_POST['salary_head_id_add'];
//   $salary_head_id_min = $_POST['salary_head_id_min'];


//    print_r($salary_head_id_add[0]);

    
  
    $salary_exist = mysqli_query($conn,"SELECT * from salary_summary_paid where year LIKE '$year' and month like '$month' ");
    $count_salary = mysqli_num_rows($salary_exist);
    if($count_salary == 0){
    
  $salary_summary_paid = mysqli_query($conn,"INSERT into salary_summary_paid(`month`,`year`,`total_amount`,`created_at`,`updated_at`) values ('$month','$year','$total_amount',now(),now())");
  if($salary_summary_paid == true)
  {
    // ssp_id = salary_summary_paid_id
    $salary_summary_paid_id = mysqli_query($conn,"SELECT last_insert_id() as ssp_id from salary_summary_paid");
    $last_id_obj=mysqli_fetch_object($salary_summary_paid_id);
    $ssp_id = $last_id_obj->ssp_id; //salary summary paid id
    for ($i=0; $i < count($employee_id); $i++)  //loop for employee numbers
    { 
    $salary_details_employee = mysqli_query($conn,"INSERT into salary_details_employee(`salary_summary_paid_id`,`employee_id`,`year`,`month`,`amount`,`created_at`,`updated_at`) values ('$ssp_id',$employee_id[$i],'$year','$month','$paid_salary[$i]',now(),now())");
    if($salary_summary_paid == true)
    {
        // echo "$employee_id[$i]<pre>";
        // echo($salary_head_add[$i]);
        $salary_details_employee_id = mysqli_query($conn,"SELECT last_insert_id() as sde_id from salary_details_employee");
        $last_sdeid_obj=mysqli_fetch_object($salary_details_employee_id);
        $sde_id = $last_sdeid_obj->sde_id; //salary details employee id

        $count_add = 0;
        $count_min = 0;
         
        $count_add = count($salary_head_id_add[$i]); 
        $count_min = count($salary_head_id_min[$i]); 
        
        foreach($salary_head_id_add[$i] as $key_add => $value) {  
            $s_add_id = $salary_head_id_add[$i][$key_add];
            $s_add = $salary_head_add[$i][$key_add];

            $salary_details_add = mysqli_query($conn,"INSERT into salary_details_head_employee (`salary_details_employee_id`,`employee_id`,`salary_head_id`,`amount`,`year`,`month`,`created_at`,`updated_at`,`salary_head_type`) values ($ssp_id,'$employee_id[$i]','$s_add_id','$s_add','$year','$month',now(),now(),1)");
        }
  
   
            if ($salary_details_add == true)
            {
                foreach($salary_head_id_min[$i] as $key_min => $value){
                    $s_min_id = $salary_head_id_min[$i][$key_min];
                    $s_min = $salary_head_min[$i][$key_min];
                    
                    $salary_details_min = mysqli_query($conn,"INSERT into salary_details_head_employee (`salary_details_employee_id`,`employee_id`,`salary_head_id`,`amount`,`year`,`month`,`created_at`,`updated_at`,`salary_head_type`) values ($ssp_id,'$employee_id[$i]','$s_min_id','$s_min','$year','$month',now(),now(),2)");
                }

           
            }
     }
 
    }
 
    if ($salary_details_min == true) 
    {
        // echo "success";
        echo "<script>location.replace('../salary_generate.php?success=success&&salary_generate=salary_generate');</script>";
    }
        
}

      
    } 
    else{
          echo "<script>location.replace('../salary_generate.php?success=exist&&salary_generate=salary_generate');</script>";
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal({
                    title: "এই মাস / বছর এর তথ্য ইতিমধ্যে বিদ্যমান !",
                    icon: "warning",
                    dangerMode: true,
                    button: "বাতিল"
            }).then( () => {
                location.href = "../salary_generate.php?salary_generate=salary_generate"
            })';
            echo '}, 1);</script>';
            echo mysqli_error($conn);
    }
}



    




if (isset($_POST['update'])) 
{ 

}

if (isset($_POST['salary_generate_edit'])) //delete
{ 
    $total_amount = $_POST['total_amount'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $employee_id = $_POST['employee_id'];
    $paid_salary = $_POST['paid_salary'];
    $basic_salary = $_POST['basic_salary'];
    $employee_grade = $_POST['employee_grade'];
    $basic_salary = $_POST['basic_salary'];
    
    
     foreach ($employee_grade as $key => $value) {
         
        $salary_grade_rates = mysqli_query($conn,"SELECT salary_head_id,salary_head_type,rate FROM assign_salary_grade WHERE rate_st = 1 and grade_id = $value");
    
                $gross_salary_add=0;
                $gross_salary_min=0;
                $salary_grade_rate_row = mysqli_num_rows($salary_grade_rates);
                if ($salary_grade_rate_row > 0) 
                {
                    while ($data = mysqli_fetch_array($salary_grade_rates)) 
                    {
                        $salary_head_id[$key] = $data["0"];
                        $salary_head_type[$key] = $data["1"];
                        $rate[$key] = $data["2"];
                        
                        
                    
                        // 1=add,2=sub
                        
                        $total_percent = $basic_salary[$key]*$rate[$key];
    
                        $total = $total_percent/100;
    
                        
                        if ($salary_head_type[$key] == 1) 
                        {   
                            // echo count($salary_head_id[$key]);
                            // echo "add-$salary_head_id[$key]-$total  <br>";
                            for ($add=0; $add < count($salary_head_id[$key]) ; $add++) 
                            {
                                $salary_head_id_add[$key][$salary_head_id[$key]] = $salary_head_id[$key];
                                // echo $add;
                                // $salary_head_id_add[$key] = $key;
                                $salary_head_add[$key][$salary_head_id[$key]] = $total;
                                
                                // echo $add;
                                // echo $i;
                                $gross_salary_add += $total;
                               
                            }
                        }
                        if ($salary_head_type[$key] == 2) 
                        {  
                           // echo "min-$salary_head_id[$key]-$total  <br>";
    
                            for ($min=0; $min < count($salary_head_id[$key]) ; $min++) 
                            {  
                                $salary_head_id_min[$key][$salary_head_id[$key]] = $salary_head_id[$key];
                                // $salary_head_id_add[$key] = $key;
                                $salary_head_min[$key][$salary_head_id[$key]] = $total;
                                
                                // echo $i;
                                $gross_salary_min += $total;
                                // echo "$salary_head_id_min-$total<br>";
                       
                            }
                        }
                            $t_salary=$gross_salary_add-$gross_salary_min; 
                    }
    
    
     }
    }
    

//   echo count($employee_id);
//   die();
  $exist_data_delete = mysqli_query($conn,"DELETE FROM salary_summary_paid,salary_details_employee,salary_details_head_employee 
  USING salary_summary_paid    
  INNER JOIN salary_details_employee 
  INNER JOIN salary_details_head_employee
  WHERE salary_summary_paid.id=salary_details_employee.salary_summary_paid_id AND salary_details_employee.salary_summary_paid_id=salary_details_head_employee.salary_details_employee_id AND salary_summary_paid.month LIKE '$month' AND salary_summary_paid.year LIKE '$year'");

  if ($exist_data_delete==true) 
  {
    $salary_exist = mysqli_query($conn,"SELECT * from salary_summary_paid where year LIKE '$year' and month like '$month' ");
    $count_salary = mysqli_num_rows($salary_exist);
    if($count_salary == 0){
    
        $salary_summary_paid = mysqli_query($conn,"INSERT into salary_summary_paid(`month`,`year`,`total_amount`,`created_at`,`updated_at`) values ('$month','$year','$total_amount',now(),now())");
        if($salary_summary_paid == true)
        {
          // ssp_id = salary_summary_paid_id
          $salary_summary_paid_id = mysqli_query($conn,"SELECT last_insert_id() as ssp_id from salary_summary_paid");
          $last_id_obj=mysqli_fetch_object($salary_summary_paid_id);
          $ssp_id = $last_id_obj->ssp_id; //salary summary paid id
          for ($i=0; $i < count($employee_id); $i++)  //loop for employee numbers
          { 
          $salary_details_employee = mysqli_query($conn,"INSERT into salary_details_employee(`salary_summary_paid_id`,`employee_id`,`year`,`month`,`amount`,`created_at`,`updated_at`) values ('$ssp_id',$employee_id[$i],'$year','$month','$paid_salary[$i]',now(),now())");
          if($salary_summary_paid == true)
          {
              // echo "$employee_id[$i]<pre>";
              // echo($salary_head_add[$i]);
              $salary_details_employee_id = mysqli_query($conn,"SELECT last_insert_id() as sde_id from salary_details_employee");
              $last_sdeid_obj=mysqli_fetch_object($salary_details_employee_id);
              $sde_id = $last_sdeid_obj->sde_id; //salary details employee id
      
              $count_add = 0;
              $count_min = 0;
               
              $count_add = count($salary_head_id_add[$i]); 
              $count_min = count($salary_head_id_min[$i]); 
              
              foreach($salary_head_id_add[$i] as $key_add => $value) {  
                  $s_add_id = $salary_head_id_add[$i][$key_add];
                  $s_add = $salary_head_add[$i][$key_add];
      
                  $salary_details_add = mysqli_query($conn,"INSERT into salary_details_head_employee (`salary_details_employee_id`,`employee_id`,`salary_head_id`,`amount`,`year`,`month`,`created_at`,`updated_at`,`salary_head_type`) values ($ssp_id,'$employee_id[$i]','$s_add_id','$s_add','$year','$month',now(),now(),1)");
              }
        
         
                  if ($salary_details_add == true)
                  {
                      foreach($salary_head_id_min[$i] as $key_min => $value){
                          $s_min_id = $salary_head_id_min[$i][$key_min];
                          $s_min = $salary_head_min[$i][$key_min];
                          
                          $salary_details_min = mysqli_query($conn,"INSERT into salary_details_head_employee (`salary_details_employee_id`,`employee_id`,`salary_head_id`,`amount`,`year`,`month`,`created_at`,`updated_at`,`salary_head_type`) values ($ssp_id,'$employee_id[$i]','$s_min_id','$s_min','$year','$month',now(),now(),2)");
                      }
      
                 
                  }
           }
       
          }
       
          if ($salary_details_min == true) 
          {
              // echo "success";
              echo "<script>location.replace('../salary_generate.php?success=success&&salary_generate=salary_generate');</script>";
          }
              
      }
      
            
          }
    else{
          echo "<script>location.replace('../salary_generate.php?success=exist&&salary_generate=salary_edit_monthly');</script>";
    }
  }
 else {
     echo "error";
 }
  
}

?>