<?php
$objInstitution = new \App\institution\institution();
//institution
$singleDataInstitute = $objInstitution->viewInstitute();
$insPath = $insShortName = $singleDataInstitute->ins_short_name;
$insName = $singleDataInstitute->ins_full_name;
$insAddress = $singleDataInstitute->ins_address;
$insMobile = $singleDataInstitute->ins_mobile;
$insWeb = $singleDataInstitute->ins_web;
$insEmail = $singleDataInstitute->ins_email;
$insBoardNo = $singleDataInstitute->board_no;
$insLogo ='logo.png';
//$insLogo = $singleDataInstitute->logo;
//$insPath = $singleDataInstitute->ins_path;

//Company
$singleDataCompany = $objInstitution->viewCompany();
$comShortName = $singleDataCompany->ins_short_name;
$comName = $singleDataCompany->ins_full_name;
$comAddress = $singleDataCompany->ins_address;
$comMobile = $singleDataCompany->ins_mobile;
$comEmail = $singleDataCompany->ins_email;
$comWeb = $singleDataCompany->ins_web;
$comLogo = $singleDataCompany->logo;
?>
