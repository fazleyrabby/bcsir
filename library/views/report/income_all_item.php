<?php
include '../index/header.php';
$objAllDataQuery = new \App\dataTableQuery\dataTableQuery();
$allDataPartner = $objAllDataQuery->indexByQueryAllData("SELECT * FROM `partner_info`");
$type = $_GET['type'];
if($type=='partner_trans'){
    $action = "partner_trans.php";
    $title = "Investment Status Report";
}
else if($type=='partner_dividend'){
    $action = "partner_dividend.php";
    $title = "Partner Dividend Report";
}else {
    $action = "income_all_item_print.php";
    $title = "Income Report";
}
?>
    <h3 style=""><i class="entypo-right-circled"></i> <?php echo $title?> </h3><hr />
    <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
        <thead>
        <tr>
            <?php
            if($type=='partner_trans'){
                echo "<th>Select a Partner</th>";
            }
            ?>
            <th>From Date</th>
            <th>To Date</th>
            <th>Show Details</th>
        </tr>
        </thead>
        <tbody>
        <form method="post" action="<?php echo $action?>" class="form" target="_blank">
            <tr>
            <?php
            if($type=='partner_trans'){
                ?>
                <td>
                    <select name="partnerId" id="partnerId" class="form-control">
                        <option value="" style="display:none">Select a Partner</option>
                        <option value="0" >All Partner</option>
                        <?php
                        foreach ($allDataPartner as $record){
                            echo "<option value=\"$record->id\">$record->name</option>";
                        }
                        ?>
                    </select>
                </td>
                <?php
            }
            ?>
                <td>
                    <input type="text" name="fDate" class="form-control datepicker" value="<?php echo date('Y-m-d')?>"/>
                </td>
                <td>
                    <input type="text" name="tDate" class="form-control datepicker" value="<?php echo date('Y-m-d')?>"/>
                </td>
                <td align="center"><input type="submit" name="submit" value="Show Report" id="submit" class="btn btn-info"/></td>
            </tr>
        </form>
        </tbody>
    </table>
<?php include '../index/footer.php' ?>