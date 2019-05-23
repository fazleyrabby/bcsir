<?php
// require_once("../../vendor/autoload.php");
// if(!isset($_SESSION))session_start();
// require_once '../institution/institution_info.php';
// $objReport = new \App\report\report();
// $objReport->setData($_POST,0);

// $payType = $_POST['payType'];
// $fDate = date('d-M-Y',strtotime($_POST['fDate']));
// $tDate = date('d-M-Y',strtotime($_POST['tDate']));

// $allData = $objReport->viewBookIssued();
$page_title = "বই জারি প্রতিবেদন";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo $page_title?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
        #footer p {
            margin: 0;
            padding: 0;
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
            <button style="background: #3498DB;padding:4px 8px;border:1px solid #3498DB;color: #ffffff;border-radius:5px;font-size:16px;cursor: pointer"   class="btn btn-primary noprint" onClick="window.print();return false;">Print Statement</button>
        </div>

        <div class="issue_info">

            <table align="center" border="0" cellpadding="0" cellspacing="0" style="margin-top:-20px;" >
                <tbody>
                <tr class="">
                    <th scope="col" align="left" height="43" valign="top"><img style="" src="../uploads/logo-md.png" width="100"></th>
                    <td><h3 align="center" style="border:2px solid #e1e1e1;padding:7px 10px;font-size:14px;"><?php echo $page_title?></h3></td>
                    <td align="left" valign="top" class="heading">
                        <h1 style="text-align:right"></h1>
                        <p class="" style="line-height:3px;text-align:right"></p>
                        <p style="line-height:3px;text-align:right">যোগাযোগ:</p>
                        <p style="line-height:3px;text-align:right">ই-মেইল: </p>
                    </td>
                </tr>
                <tr>
                    <th colspan="3" scope="row" align="left" height="50" valign="top">
                        <table style="border-top:2px #000000 solid;" cellpadding="0" cellspacing="0" height="20" width="860">
                            <tbody>
							<tr>
                                <td valign="top" width="50%">
                                    <p align="left">প্রতিবেদনের ধরণ :&nbsp;
                                  
                                      
                                      
                                    </p>

                                </td>
                                <td valign="top" width="50%"><p align="right">সময় : &nbsp;থেকে &nbsp;পর্যন্ত</p></td>
                            </tr>
                            <tr><td colspan="2">&nbsp;</td></tr>
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
                                <th>আইডি</th>
                                <th>তারিখ</th>
                                <th>অনুরোধকারী</th>
                                <th>বইয়ের নাম</th>
                                <th>পরিমান</th>
                                <th>প্রতি বিক্রয়মূল্য</th>
                                <th>মোট মূল্য</th>
                                <th>ছাড়া</th>
                                <th>পরিশোধ</th>
                            </tr>
                            <tr>
                                  
                                    <td class='left'>1</td>
                                
                                    <td class='right'>2</td>
                                    <td class='right'>3</td>
                                    <td class='right'>4</td>
                                    <td class='right'>56</td>
                                    <td class='right'>6</td>
                                </tr>
                                <tr>
                                  
                                    <td class='left'>1</td>
                                
                                    <td class='right'>2</td>
                                    <td class='right'>3</td>
                                    <td class='right'>4</td>
                                    <td class='right'>56</td>
                                    <td class='right'>6</td>
                                </tr>
                        
                            <tr>
                                <td colspan="" <b>2</b></td>
                                <td class='right'><b>6</b></td>
                                <td class='right'><b>6</b></td>
                                <td class='right'><b>6</b></td>
                            </tr>
                            </tbody>
                        </table>
                    </th>
                </tr>
                <br/><br/>
                </tbody>
            </table>
            <br/><br/>
            
        </div>

    </div>
    <div id="bottomcontentbtm"></div>

</div>
</body>
</html>