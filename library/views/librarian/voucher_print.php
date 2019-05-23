<?php
require_once("../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
require_once '../institution/institution_info.php';
$invoiceId = $_GET['invoiceId'];
if($invoiceId=="") die();
$objTranslateLanguage = new \App\translateLanguage\translateLanguage();
$objAllDataQuery = new \App\dataTableQuery\dataTableQuery();
$allDataVoucher = $objAllDataQuery->indexByQueryAllData("SELECT r.*,b.name AS book_name,(qty*unit_price) AS total FROM book_request r
                                                        LEFT JOIN book b ON b.id=r.book_id
                                                        WHERE invoice_id=$invoiceId");
$singleDataRequestedBy = $objAllDataQuery->indexByQuerySingleData("
                                                        SELECT t.id,t.name,r.created_at FROM book_request r
                                                        LEFT JOIN teacher_info t ON t.id=r.requested_by
                                                        WHERE invoice_id=$invoiceId
                                                        GROUP BY invoice_id");
//if($singleDataRequestedBy == false) die();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <title>Money Receipt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
        @page {margin-left: 20px;margin-right: 20px;margin-top: 10px;margin-bottom: 10px;}
        .text-danger strong {color: #9f181c;}
        .receipt-main {background: #ffffff none repeat scroll 0 0;border-bottom: 12px solid #333333;border-top: 12px solid #9f181c;margin-top: 25px;margin-bottom: 24px;padding: 15px 30px 7px 30px !important;position: relative;box-shadow: 0 1px 21px #acacac;color: #333333;font-family: open sans;}
        .receipt-main p {color: #333333;font-family: open sans;line-height: 1.42857;}
        .receipt-footer h1 {font-size: 15px;font-weight: 400 !important;margin: 0 !important;}
        .receipt-main::after {background: #414143 none repeat scroll 0 0;content: "";height: 5px;left: 0;position: absolute;right: 0;top: -13px;}
        .receipt-main thead {background: #414143 none repeat scroll 0 0;}
        .receipt-main thead th {color:#fff;}
        .receipt-right h5 {font-size: 16px;font-weight: bold;margin: 0 0 7px 0;}
        .receipt-right h6 {font-size: 12px;font-weight: bold;margin: 14px 0 0 0;}
        .receipt-right p {font-size: 12px;margin: 0px;}
        .receipt-right p i {text-align: center;width: 18px;}
        .receipt-main td {padding: 7px 20px !important;}
        .receipt-main th {padding: 10px 20px !important;}
        .receipt-main td {font-size: 13px;font-weight: initial !important;}
        .receipt-main td p:last-child {margin: 0;padding: 0;}
        .receipt-main td h2 {font-size: 20px;font-weight: 900;margin: 0;text-transform: uppercase;}
        .receipt-header-mid .receipt-left h1 {font-weight: 100;margin: 15px 0 0;text-align: right;text-transform: uppercase;}
        .receipt-header-mid {margin: 15px 0;overflow: hidden;}
        #container {background-color: #dcdcdc;}
    </style>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
<div style="width:100px;text-align:center;margin:0 auto;">
    <!-- <button class="btn btn-success btn-sm">Print</button> -->
    <a href="#" onclick="printContent('print-area')"> <!-- ../printnewsf285.html?nssl=215515 -->
        <img src="../../resources/assets/images/printer-icon.png" style=" width: 79px; height: 35px;">
    </a>
</div>

<div class="container" id="print-area">
    <div class="row">
        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="receipt-header">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="receipt-left">
                            <img class="img-responsive" alt="Logo" src="../uploads/logo-md.png"  style="width: 71px;">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                        <div class="receipt-right">
                            <h5><?php echo $insName?></h5>
                            <p><?php echo $insAddress?> <i class="fa fa-address-card-o"></i></p>
                            <p><?php echo $insMobile?> <i class="fa fa-phone"></i></p>
                            <p><?php echo $insEmail?> <i class="fa fa-envelope-o"></i></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="receipt-header receipt-header-mid">
                    <div class="col-xs-6 col-sm-6 col-md-6 text-left">
                        <div class="receipt-right">
                            <h5><?php echo $singleDataRequestedBy->name ?></h5>
                            <p><b>আইডি :</b> <?php echo $objTranslateLanguage->translate_number($singleDataRequestedBy->id) ?></p>
                            <!--<p><b> Received By :</b> <?php //echo $singleData->issued_by ?></p>-->
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="receipt-left">
                            <h1>রশিদ</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>লেনদেন নম্বর</th>
                        <th>বর্ণনা</th>
                        <th>একক</th>
                        <th>টাকা</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $totalAmount = $totalPaid = $totalDiscount = $totalDue = 0;
                        foreach ($allDataVoucher as $record){
                            $id = $objTranslateLanguage->translate_number($record->id);
                            $total = $objTranslateLanguage->translate_number($record->total);
                            $qty=$objTranslateLanguage->translate_number($record->qty);
                            echo "<tr>
                                    <td width='5%' class='text-center'>#$id</td>
                                    <td width='75%'> $record->book_name </td>
                                    <td width='5%'  class='text-center'>$qty </td>
                                    <td width='10%' class='text-right'> $total /-</td>
                                    
                                </tr>";
                            $totalAmount = $record->total+$totalAmount;
                            $totalPaid = $record->paid_amount+$totalPaid;
                            $totalDiscount = $record->discount+$totalDiscount;
                            // $totalDue = $record->due+$totalDue;
                            
                        } 
                        ?>
                    <tr>
                        <td class="text-right" colspan="3">
                            <p><strong>মোট টাকা: </strong></p>
                            <p><strong>ছাড়া: </strong></p>
                        </td>
                        <td class='text-right'>
                            <p><strong> <?php echo $objTranslateLanguage->translate_number($totalAmount)?>/-</strong></p>
                            <p><strong> <?php echo $objTranslateLanguage->translate_number($totalDiscount)?>/-</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right" colspan="3"><h2><strong>পরিশোধ: </strong></h2></td>
                        <td class="text-right text-danger"><h2><strong> <?php echo $objTranslateLanguage->translate_number($totalPaid)?>/-</strong></h2></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="receipt-header receipt-header-mid receipt-footer">
                    <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                        <div class="receipt-right">
                            <p><b>তারিখ :</b> 
                            <?php  
                            if($singleDataRequestedBy->created_at!='' || $singleDataRequestedBy->created_at!='0000-00-00')
                            echo $objTranslateLanguage->translate(date("d F Y", strtotime($singleDataRequestedBy->created_at)));
                            else echo "";
                            ?>
                            </p>
                            <h6 style="color: rgb(140, 140, 140);">কারিগরি সহায়তায় <?php echo $comName?></h6>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="receipt-left">
                            <p>&nbsp;</p>
                            <!--<img src="../uploads/signature.png">-->
                            <h1>স্বাক্ষর</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function printContent(el){
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>
</body>
</html>