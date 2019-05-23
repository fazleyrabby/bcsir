<!--  ######################## pagination code block#2 of 2 start ###################################### -->
<table class="table table-striped table-advance table-hover">
<tr style="vertical-align: middle;">

<td style="background: #fff;text-align: left;">
    <div class="col-md-4" style="width: 200px;margin-top: 20px;float:left">
        <select  class="form-control"  name="ItemsPerPage" id="ItemsPerPage" onchange="javascript:location.href = this.value;" >
            <?php
            if($itemsPerPage==10 ) echo "<option value='?ItemsPerPage=3$link' selected > Show 10 rows</option>";
            else  echo "<option value='?ItemsPerPage=10$link'  > Show 10 rows</option>";

            if($itemsPerPage==20 ) echo "<option value='?ItemsPerPage=20$link' selected >  Show 20 rows</option>";
            else  echo "<option value='?ItemsPerPage=20$link'  >  Show 20 rows</option>";

            if($itemsPerPage==30 ) echo "<option value='?ItemsPerPage=30$link' selected > Show 30 rows</option>";
            else  echo "<option value='?ItemsPerPage=30$link' > Show 30 rows</option>";

            if($itemsPerPage==50 ) echo "<option value='?ItemsPerPage=50$link' selected > Show 50 rows</option>";
            else  echo "<option value='?ItemsPerPage=50$link'  > Show 50 rows</option>";

            if($itemsPerPage==100 ) echo "<option value='?ItemsPerPage=100$link' selected > Show 100 rows</option>";
            else  echo "<option value='?ItemsPerPage=100$link'  > Show 100 rows</option>";
            
            /*if($itemsPerPage==500 ) echo "<option value='?ItemsPerPage=500$link' selected > 500 rows</option>";
            else  echo "<option value='?ItemsPerPage=500$link'  > Show 500 rows</option>";*/
            ?>
        </select>
    </div>
    <div class="col-md-4">&nbsp;</div>
    <div class="col-md-4" style="float:right;text-align: right;">
        <ul class="pagination">
            <?php
            if(isset($_GET['pageTable'])) {
                $abc = $_GET['pageTable'];
                $link= '&pageTable='.$abc;
            }
           elseif(isset($_GET['search'])) {
                $abc = $_GET['search'];
                $link= '&search='.$abc;
            }
            else{
                $link = '';
            }
                if(isset($_GET['Page'])) {
                    $pageNumber = $_GET['Page'];
                    $pageNumberStart = $pageNumber-2;
                    $pageNumberFinish = $pageNumberStart+4;
                }
                else{
                    $pageNumberStart = 1;
                    $pageNumberFinish = 6;
                }

            if($pageNumberFinish>$pages){$pageNumberFinish = $pages;}
            else if ($pageNumberStart<1){$pageNumberStart=1;}
            else {$pageNumberFinish = $pageNumberFinish;}

            $pageMinusOne  = $page-1;
            $pagePlusOne  = $page+1;

            if($page>$pages) echo "Data Not Found";
            //echo "<script> location.replace('./index.php'); </script>";
            //Utility::redirect('?Page=$pages$link');

            if($page>1)  echo "<li><a href='?Page=$pageMinusOne$link'>" . "Previous" . "</a></li>";

            for($i=$pageNumberStart;$i<=$pageNumberFinish;$i++)
            {
                if($i==$page) echo '<li class="active"><a href="">'. $i . '</a></li>';
                else  echo "<li><a href='?Page=$i$link'>". $i . '</a></li>';
            }
            if($page<$pages) echo "<li><a href='?Page=$pagePlusOne$link'>" . "Next" . "</a></li>";
            ?>
        </ul>
    </div>
    </td>
    </tr>
</table>
<!--  ######################## pagination code block#2 of 2 end ###################################### -->
