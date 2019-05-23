
<?php 
include '../connect/config.php'; 


$add_new_employee_grade=mysqli_query($conn,"INSERT into all_designation 
(`designation_name`) 
values 
('নির্বাহী প্রকৌশলী'),('নির্বাহী কর্মকর্তা'),('টেকনিকাল অফিসার (আর্টিষ্ট)'),('জু: এক্স: অফিসার'),('সহ : হিসাব রক্ষক কর্মকর্তা'),('রিসার্চ কেমিষ্ট'),('ধর্মীয় শিক্ষক'),('জেটিও'),('সি : টেকনিশিয়ান')");
if ($add_new_employee_grade==true) {
echo "success";
}
else {
    echo mysqli_error($conn);
}
?>