<?php
namespace App\dataTableQuery;
use PDO,PDOException;
use App\Message\Message;
use App\Model\Database;

class dataTableQuery extends Database{
    public $table;
    public $colArray;
    public $searchArray;
    public $order;
    public $length;
    public $start;
    public $userId;
    public $dataQuery;

    public function setData($receieveDataArray){
        //here id further use for retrive data from database:
        if(array_key_exists("dataQuery",$receieveDataArray)){
            $this->dataQuery = $receieveDataArray['dataQuery'];
               // 'SELECT e.id as emp_id ,e.name AS name ,r.* FROM `receipt` r LEFT JOIN employee e on e.id=r.emp_id';
        }
        if(array_key_exists("table",$receieveDataArray)){
            $this->table = $receieveDataArray['table'];
        }
        if(array_key_exists("colArrayQ",$receieveDataArray)){
            $this->colArray = $receieveDataArray['colArrayQ'];
        }
        if(array_key_exists("searchArrayQ",$receieveDataArray)){
            $this->searchArray = $receieveDataArray['searchArrayQ'];
        }
        if(array_key_exists("order",$receieveDataArray)){
            $this->order = $receieveDataArray['order'];
        }
        if(array_key_exists("length",$receieveDataArray)){
            $this->length = $receieveDataArray['length'];
        }
        if(array_key_exists("start",$receieveDataArray)){
            $this->start = $receieveDataArray['start'];
        }
        if(array_key_exists("user_id",$receieveDataArray)){
            $this->userId = $receieveDataArray['user_id'];
        }
       // $this->dataQuery ="select * from employee";
    }


    public function get_total_all_records($getTable)
    {
        $statement = $this->DBH->prepare($getTable);
        $statement->execute();
        $result = $statement->fetchAll();
        return $statement->rowCount();
    }


    Public function outPutData(){
        $query = '';
        $output = array();
        $query .= $this->dataQuery;

        if(isset($_POST["search"]["value"]))
        {
            $wordChunks = explode(",", $this->searchArray);
            for($i = 0; $i < 1; $i++) {
                $query .= 'WHERE '.$wordChunks[$i].' LIKE "%'.$_POST["search"]["value"].'%" ';
            }
            for($i = 0; $i < count($wordChunks); $i++) {
                $query .= 'OR  '.$wordChunks[$i].' LIKE "%'.$_POST["search"]["value"].'%" ';
            }
        }
        if(isset($_POST["order"]))
        {
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else
        {
            $query .= 'ORDER BY id DESC ';
        }
        if($this->length != -1)
        {
            $query .= 'LIMIT ' . $this->start . ', ' . $this->length;
        }

        $statement = $this->DBH->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $data = array();
        $slNo = $this->start;
        $filtered_rows = $statement->rowCount();
        foreach($result as $row)
        {

            $sub_array = array();
            $slNo = $slNo+1;
            $sub_array[] = $slNo;
            $wordChunks = explode(",", $this->colArray);
            for($i = 0; $i < (count($wordChunks)); $i++){
                $postArray = $wordChunks[$i];
                $sub_array[] = $row["$postArray"];
            }

            $sub_array[] = '<div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#"  id="'.$row["id"].'" class="update">
                                        <i class="entypo-pencil"></i>Update</a>
                                    </li>
                                    <li class="divider"></li>
                                     <li>
                                        <a href="#"  id="'.$row["id"].'"class="delete">
                                        <i class="entypo-trash"></i>Delete</a>
                                    </li>
                                </ul>
                        </div>';
            //  <a href="#" onclick="confirm_modal('../tdrp/delete.php?id=$record->id&&pageTable=$table')">delete </a>
            //$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button>';
            // $sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
            $data[] = $sub_array;
        }
        $objCrud = new \App\dataTableQuery\dataTableQuery();
        $output = array(
            "draw"				=>	intval($_POST["draw"]),
            "recordsTotal"		=> 	$filtered_rows,
            "recordsFiltered"	=>	$objCrud->get_total_all_records($this->dataQuery),
            "data"				=>	$data
        );
        echo json_encode($output);
    }


    public function index($table){
        $sqlQuery = "select * from $table order by id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of index()

    public function indexInTrash($table){
        $sqlQuery = "select * from $table where is_trashed = 'Yes' order by id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of index()

}