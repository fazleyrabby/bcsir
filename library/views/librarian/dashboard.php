<?php
include '../index/header.php';
$total_students ="0";
$total_teachers ="0";

$objBook = new \App\book\book();
$singleData = $objBook->viewLibrarianDashboard();
?>
<script type="text/javascript">
    /*
     jQuery("document").ready(function(){

     setInterval(function(){
     var display = "ajax_books_summery.php";
     $('#student').load(display);
     },1000);
     });
     */
</script>
<!--Librarian Dashboard-->
<h3 style="">
    <i class="entypo-right-circled"></i>
    <?php echo ucwords($level_name).' Dashboard'; ?>
</h3>

<hr />

<div class="row">

    <div class="col-md-3">
        <div class="tile-stats tile-red">
            <div class="icon" style="margin-bottom: 20px;"><i class="entypo-book"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $singleData->total_books?>"
                 data-postfix="" data-duration="1500" data-delay="0">0</div>
            <h3>Total Books</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="tile-stats tile-green">
            <div class="icon" style="margin-bottom: 20px;"><i class="entypo-arrows-ccw"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $singleData->pending_request?>"
                 data-postfix="" data-duration="800" data-delay="0">0</div>
            <h3>Pending Book Requests</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="tile-stats tile-aqua">
            <div class="icon" style="margin-bottom: 20px;"><i class="entypo-docs"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $singleData->total_copies?>"
                 data-postfix="" data-duration="500" data-delay="0">0</div>
            <h3>Total Copies</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="tile-stats tile-blue">
            <div class="icon" style="margin-bottom: 20px;"><i class="entypo-check"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $singleData->issued_copies?>"
                 data-postfix="" data-duration="500" data-delay="0">0</div>
            <h3>Issued Copies</h3>
        </div>
    </div>

</div>

<?php include '../index/footer.php' ?>
