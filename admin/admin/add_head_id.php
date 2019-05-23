<?php include '../connect/config.php';?>

<?php  
if (isset($_POST['add_head_id']))  
{   
    $add_head_id = $_POST['add_head_id'];
    $options = "";
    $salary_head = mysqli_query($conn,"SELECT account_head_id,account_head_name,account_head_type FROM account_head WHERE account_head_st = 1 AND account_head_group = 2 AND account_head_type = 1 and account_head_id");
    
    echo mysqli_num_rows($salary_head);

    // if ($salary_head == true) 
    // { 
    //     while ($salary_head_dt = mysqli_fetch_array($salary_head)) 
    //     {
    //         $account_head_id = $salary_head_dt["0"]; 
    //         $account_head_name = $salary_head_dt["1"]; 
    //         $account_head_type = $salary_head_dt["2"]; 
    //         $options .= "<option value=$account_head_id>$account_head_name</option>"; 
    //     }
    //     echo $options;
    // } 
}

if (isset($_POST['add_salary_id']))  
{   
    $add_salary_id = $_POST['add_salary_id'];
    $options = "";
    $salary_head = mysqli_query($conn,"SELECT account_head_id,account_head_name,account_head_type FROM account_head WHERE account_head_st = 1 AND account_head_group = 2 AND account_head_type = 1 and account_head_id not in ($add_salary_id)");
    
    // $row_num = mysqli_num_rows($salary_head);
    if ($salary_head == true) {
       while ($data = mysqli_fetch_array($salary_head)) {
          print_r($data);
       }
    }
    
    // if ($row_num > 0) {
       
    // }

    // if ($salary_head == true) 
    // { 
    //     while ($salary_head_dt = mysqli_fetch_array($salary_head)) 
    //     {
    //         $account_head_id = $salary_head_dt["0"]; 
    //         $account_head_name = $salary_head_dt["1"]; 
    //         $account_head_type = $salary_head_dt["2"]; 
    //         $options .= "<option value=$account_head_id>$account_head_name</option>"; 
    //     }
    //     echo $options;
    // } 
}

{
    
}
// if (isset($_POST['data']))  
// {   $data = $_POST['data'];
//     $options_default = "<option value=''></option>";
//     $salary_head = mysqli_query($conn,"SELECT account_head_id,account_head_name,account_head_type FROM account_head WHERE account_head_st = 1 AND account_head_group = 2 AND account_head_type = 1 and account_head_id not in ($data)"); 
//     if ($salary_head == true) 
//     { 
//         while ($salary_head_dt = mysqli_fetch_array($salary_head)) 
//         {
//             $account_head_id = $salary_head_dt["0"]; 
//             $account_head_name = $salary_head_dt["1"]; 
//             $account_head_type = $salary_head_dt["2"]; 
//             $options_default .= "<option value=$account_head_id onchange=''>$account_head_name</option>"; 
//         }
//         echo $options_default;
//     } 
// }
?>