<?php
include '../index/header.php';
?>
    <h3 style=""><i class="entypo-right-circled"></i> বই জারি প্রতিবেদন </h3><hr />
    <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
        <thead>
        <tr>
            <th>বই ধরণ</th>
            <th>তারিখ হইতে</th>
            <th>তারিখ পর্যন্ত</th>
            <th>দেখুন</th>
        </tr>
        </thead>
        <tbody>
        <form method="post" action="book_issued_print.php" class="form" target="_blank">
            <tr>
                <td>
                    <select name="payType" id="payType" class="form-control">
                        <option value='98'>সকল আদান-প্রদান</option>
                        <option value='0'>পড়ার জন্য </option>
                        <option value='1'>উপহারের জন্য</option>
                        <option value='2'>বিক্রয়ের জন্য</option>
                        <option value='99'>ফেরত (সকল ফেরত)</option>
                        <option value='3'>ফেরত (পড়া)</option>
                        <option value='4'>ফেরত (উপহার)</option>
                        <option value='5'>ফেরত (বিক্রয়)</option>
                    </select>
                </td>
                <td><input type="text" name="fDate" class="form-control datepicker" value="<?php echo date('Y-m-d')?>"/></td>
                <td><input type="text" name="tDate" class="form-control datepicker" value="<?php echo date('Y-m-d')?>"/></td>
                <td align="center"><input type="submit" name="submit" value="দেখুন" id="submit" class="btn btn-info"/></td>
            </tr>
        </form>
        </tbody>
    </table>
<?php include '../index/footer.php' ?>