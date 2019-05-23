<?php
require_once 'header.php';
$objBook = new \App\book\book();
$singleDataBook = $objBook->viewLibrarianDashboard();
?>
<h3><i class="entypo-right-circled"></i>এডমিন ড্যাশবোর্ড</h3><hr />
<div class="row">
    <div class="col-md-3">
        <div class="tile-stats tile-red">
            <div class="icon" style="margin-bottom: 20px;"><i class="entypo-book"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $singleDataBook->total_books?>" 
            		data-postfix="" data-duration="1500" data-delay="0">0</div>
            <h3><a href="../librarian/book_list.php" style="color:#fff;"> সর্বমোট বই</a> </h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="tile-stats tile-green">
            <div class="icon" style="margin-bottom: 20px;"><i class="entypo-arrows-ccw"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $singleDataBook->pending_request?>" 
            		data-postfix="" data-duration="800" data-delay="0">0</div>
            <h3><a href="../librarian/book_request.php" style="color:#fff;">অপেক্ষমান অনুরোধ</a></h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="tile-stats tile-aqua">
            <div class="icon" style="margin-bottom: 20px;"><i class="entypo-docs"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $singleDataBook->total_copies?>" 
            		data-postfix="" data-duration="500" data-delay="0">0</div>
            <h3><a href="../librarian/book_request.php" style="color:#fff;">মোট কপি</a></h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="tile-stats tile-blue">
            <div class="icon" style="margin-bottom: 20px;"><i class="entypo-check"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $singleDataBook->issued_copies?>" 
        		data-postfix="" data-duration="500" data-delay="0">0</div>
            <h3><a href="../librarian/book_request.php" style="color:#fff;">প্রদান হয়েছে</a></h3>
        </div>
    </div>
</div>
<?php require_once 'footer.php'?>