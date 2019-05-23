<?php include '../connect/config.php'; 
if (isset($_POST['month']) && isset($_POST['year'])) {
   $month = $_POST['month'];
   $year = $_POST['year'];

$list_employee=mysqli_query($conn,"SELECT ed.employee_id,designation,   employee_name,
employee_grade,employee_department,basic_salary,employee_type,sde.amount,sde.year,sde.month
from employee_details as ed join salary_details_employee as sde
on ed.employee_id = sde.employee_id 
WHERE sde.year like '$year' and sde.month like '$month'");	//1 = Show Data
//   order by employee_id asc limit 5
if($list_employee==true)
{  $i=0;
while($data=mysqli_fetch_array($list_employee))
{ 
    $employee_id=$data['0'];
    $designation=$data['1'];
    $employee_name=$data['2'];
    $employee_grade=$data['3'];
    $employee_department=$data['4'];
    $basic_salary=$data['5'];
    $type=$data['6'];
    $paid=$data['7'];
    $year=$data['8'];
    $month=$data['9'];
    echo "<input type='text' style='display:none' name='employee_id[]' value=$employee_id>";
    echo "<input type='text' style='display:none' name='employee_grade[]' value=$employee_grade>";
    echo "<tr>
    <td> $employee_id </td>
    <td> $employee_name </td>
    <td>";
    $list_designation=mysqli_query($conn,"SELECT designation_name from all_designation WHERE id = $designation");
    if($list_designation==true)
        {
        while($data_dsg=mysqli_fetch_array($list_designation))
        { 
        $designation = $data_dsg['0'];
        echo "$designation"; 
        }
        }
    echo "</td>
    <td>";
    $list_employee_grade=mysqli_query($conn,"SELECT grade_name from all_employee_grade WHERE id = $employee_grade");
    if($list_employee_grade==true)
        {
        while($data_grade=mysqli_fetch_array($list_employee_grade))
            { 
            $grade = $data_grade['0'];
            echo "$grade";
            }
        }
    echo "</td><td>
    <div class='basic_salary'>
    <input type='text' name='basic_salary[]' value=$basic_salary readonly>
    </div>
    </td><td>";
    echo "<div class=''>
    <input class='paid_salary' name='' type='text' value=$paid readonly>
    </div>
    ";    
    echo "</td><td><div class=''>
    <a class='btn btn-primary' href='salary_report_single.php?employee_id=$employee_id&&year=$year&&month=$month'>রিপোর্ট</a>
    </div>";
    echo "</td>";
    echo "</tr>";
    $i++; 
    }
    }  
}
?>