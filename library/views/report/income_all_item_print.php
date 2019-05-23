<?php
require_once("../../vendor/autoload.php");
if(!isset($_SESSION))session_start();
require_once '../institution/institution_info.php';
$objReport = new \App\report\report();
$objReport->setData($_POST,0);

$fDate = date('d-M-Y',strtotime($_POST['fDate']));
$tDate = date('d-M-Y',strtotime($_POST['tDate']));

$allData = $objReport->viewIncomeAllItem();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Income Report</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="Description" content="Hollyhock School, Chittagong, Bangladesh"/>
    <meta name="Keywords" content="Hollyhock School, Chittagong, Bangladesh"/>
    <meta name="Robots" content="index,follow"/>

    <link rel="stylesheet" type="text/css" href="../../resources/assets/css/report.css" media="all" />
    <!--[if IE]>
    <link href="../../resources/assets/css/ie.css" rel="stylesheet" type="text/css" />
    <![endif]-->

    <style media="print">
        .noprint{ display: none; }
        @page {
            margin-left: 40px;
            margin-right: 40px;
            margin-top: 40px;
            margin-bottom: 40px;
        }
        .tbl-list {
            page-break-before: always;
            page-break-after: always;
        }
        .tbl-list tr {
            page-break-inside: avoid;
        }
        #footer {
            /*border:1px solid #000;*/
            bottom:0px;
            height:14px;
            right:0%;
            left:0%;
            position:fixed!important;
            position:absolute;
            width=100%;
            top:expression((0-(footer.offsetHeight)+
						(document.documentElement.clientHeight?
						document.documentElement.clientHeight:
						document.body.clientHeight)+(ignoreMe=document.documentElement.scrollTop?
						document.documentElement.scrollTop:document.
						body.scrollTop))+'px');
            text-align:center;
            visibility:visible;
        }
        td.heading p {
            text-align:center;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size:11px;
            font-style:normal !important;
        }
    </style>
</head>
<body>
<div id="wrapper">
    <!-- top info starts here -->
    <!-- main content starts here -->
    <div id="">
        <div class="form-actions noprint" align="center" >
					
        </div>

        <div class="form-actions noprint my-button" align="center" style="margin-top:10px;">
            <button style="background: #3498DB;padding:4px 8px;border:1px solid #3498DB;color: #ffffff;border-radius:5px;font-size:16px;cursor: pointer"   class="btn btn-primary noprint" onClick="window.print();return false;">Print Satement</button>
        </div>

        <div class="issue_info">
        <!--<div class="issue_info" style="width:860px; padding:0px 10px; height: auto; margin:-10px auto; border:0px #000000 solid;">-->

            <table align="center" border="0" cellpadding="0" cellspacing="0" style="margin-top:-20px;" >
                <tbody>
                <tr class="">
                    <th scope="col" align="left" height="43" valign="top"><img style="" src="../../../uploads/<?php echo $insPath?>/<?php echo $insLogo?>" width="100"></th>
                    <td><h3 align="center" style="border:2px solid #e1e1e1;padding:7px 10px;font-size:14px;">Income Statement</h3></td>
                    <td align="left" valign="top" class="heading">
                            <h1 style="text-align:right"><?php echo $insName?></h1>
                            <p class="" style="line-height:3px;text-align:right"><?php echo $insAddress?></p>
                           <!-- <p class="" style="line-height:3px;text-align:right">Mohammad Nagar, Bayezid, Chittagong.</p>-->
                            <p style="line-height:3px;text-align:right">Contact: <?php echo $insMobile?></p>
                            <p style="line-height:3px;text-align:right">Email: <?php echo $insEmail?></p>
                    </td>
                </tr>
                <tr>
                    <th colspan="3" scope="row" align="left" height="50" valign="top">
                        <table style="border-top:2px #000000 solid;" cellpadding="0" cellspacing="0" height="20" width="860">
                            <tbody>
							<tr>
                                <td valign="top" width="50%"><p align="right">Period From: &nbsp; <?php echo $fDate?> To&nbsp; <?php echo $tDate?></p></td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            </tbody>
                        </table>
                    </th>
                </tr>
                <tr>
                    <th colspan="3" scope="row" align="left" height="50" valign="top">
                        <table class="tbl-list" width="860">
                            <tbody>
                            <tr class="center">
                                <th style="width:4%">#</th>
                                <th>Invoice</th>
                                <th>Date</th>
                                <th>Category</th>
                                <th>SID</th>
                                <th>Student</th>
                                <th>Remarks</th>
                                <th>Amount</th>
                                <th>Due</th>
                            </tr>
                            <?php
                            $serial = $totalAmount=$totalDue=0;
                            foreach ($allData as $record){
                                $serial++;
                                $totalAmount = $totalAmount + $record->amount_in;
                                $totalDue = $totalDue + $record->amount_in_due;
                                $created_at = date("d-M-Y",strtotime($record->created_at));
                                if($record->s_id!='') $sId = $insPath.$record->s_id;
                                else $sId = "";
                                ?>
                                <tr>
                                    <td><?php echo $serial?></td>
                                    <td><?php echo $record->invoice_id?></td>
                                    <td style="width:11%"><?php echo $created_at?></td>
                                    <td><?php echo $record->item_name?></td>
                                    <td><?php echo $sId?></td>
                                    <td class='left'><?php echo $record->s_name?></td>
                                    <td class='left'><?php echo $record->remarks?></td>
                                    <td class='right'><?php echo number_format($record->amount_in)?></td>
                                    <td class='right'><?php echo number_format($record->amount_in_due)?></td>
                                </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <td colspan="7"><b>Total</b></td>
                                <td class='right'><b><?php echo number_format($totalAmount)?></b></td>
                                 <td class='right'><b><?php echo number_format($totalDue)?></b></td>
                            </tr>
                            </tbody>
                        </table>
                    </th>
                </tr>
                <br/><br/>
                </tbody>
            </table>
            <br/><br/>

						<!--
            <table border="1" cellpadding="0" cellspacing="0" width="860">
                <tr style="font-size:18px; color: green;">
                    <th valign="middle" width="245" style="font-weight:600">Total</th>
                    <td valign="middle" style="text-align: center; font-weight:600" >&nbsp;</td>
                    <th valign="middle" width="245" style="font-weight:600">GPA</th>
                    <th valign="middle" style="text-align: center; font-weight:600">&nbsp;</th>
                </tr>
            </table>
            <br/><br/>
						-->
        </div>

    </div>
    <div id="bottomcontentbtm"></div>

    <!--<div id="footer">
        <br><br><br><br>
        <p style="float:left;">Powered By  <a href="<?php //echo $comWeb?>" target="_blank" style="color: #000; font-weight:bold;text-decoration: none;"><?php //echo $comName?><a></p>
        <p style="float:right;color:#000;">Print on: <?php //echo date("d-M-Y")?></p>
    </div>-->

</div>
</body>
</html>