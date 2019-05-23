<?php
namespace App\crudWithoutImage;
use PDO,PDOException;
use App\Message\Message;
use App\Model\Database;

class crudWithoutImage extends Database
{
    public $table;
    public $colArray;
    public $order;
    public $length;
    public $start;
    public $userId;

    public function setData($receieveDataArray)
    {
        //here id further use for retrive data from database:
        if (array_key_exists("table", $receieveDataArray)) {
            $this->table = $receieveDataArray['table'];
        }
        if (array_key_exists("colArray", $receieveDataArray)) {
            $this->colArray = $receieveDataArray['colArray'];
        }
        if (array_key_exists("searchArray", $receieveDataArray)) {
            $this->searchArray = $receieveDataArray['searchArray'];
        }
        if (array_key_exists("order", $receieveDataArray)) {
            $this->order = $receieveDataArray['order'];
        }
        if (array_key_exists("length", $receieveDataArray)) {
            $this->length = $receieveDataArray['length'];
        }
        if (array_key_exists("start", $receieveDataArray)) {
            $this->start = $receieveDataArray['start'];
        }
        if (array_key_exists("user_id", $receieveDataArray)) {
            $this->userId = $receieveDataArray['user_id'];
        }
    }

    public function get_total_all_records($getTable)
    {
        $statement = $this->DBH->prepare("SELECT * FROM $getTable");
        $statement->execute();
        $result = $statement->fetchAll();
        return $statement->rowCount();
    }


    Public function outPutData()
    {
        $query = '';
        $output = array();
        $query .= "SELECT * FROM $this->table ";
        if (isset($_POST["search"]["value"])) {
            $wordChunks = explode(",", $this->searchArray);
            for ($i = 0; $i < 1; $i++) {
                $query .= 'WHERE ' . $wordChunks[$i] . ' LIKE "%' . $_POST["search"]["value"] . '%" ';
            }
            for ($i = 0; $i < count($wordChunks); $i++) {
                $query .= 'OR  ' . $wordChunks[$i] . ' LIKE "%' . $_POST["search"]["value"] . '%" ';
            }
        }
        if (isset($_POST["order"])) {
            $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $query .= 'ORDER BY id DESC ';
        }
        if ($this->length != -1) {
            $query .= 'LIMIT ' . $this->start . ', ' . $this->length;
            //$session_sl = $_SESSION['sl'];
        }
        $statement = $this->DBH->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $data = array();
        $slNo = $this->start;
        $filtered_rows = $statement->rowCount();
        foreach ($result as $row) {
            $sub_array = array();

            $slNo = $slNo + 1;
            $sub_array[] = $slNo;
            $wordChunks = explode(",", $this->colArray);
            for ($i = 0; $i < (count($wordChunks)); $i++) {
                $postArray = $wordChunks[$i];
                $sub_array[] = $row["$postArray"];
            }

            $sub_array[] = '<div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    কার্য <span class="caret"></span>
                                </button>
                               <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#"  id="'.$row["id"].'" class="update">
                                        <i class="entypo-pencil"></i>পরিবর্তন করুন</a>
                                    </li>
                                    <li class="divider"></li>
                                     <li>
                                        <a href="#"  id="'.$row["id"].'" class="delete">
                                        <i class="entypo-trash"></i>মুছে ফেলুন</a>
                                    </li>
                                </ul>
                        </div>';
            //  <a href="#" onclick="confirm_modal('../tdrp/delete.php?id=$record->id&&pageTable=$table')">delete </a>
            //$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button>';
            // $sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
            $data[] = $sub_array;
        }
        $objCrud = new \App\crudWithoutImage\crudWithoutImage();
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $filtered_rows,
            "recordsFiltered" => $objCrud->get_total_all_records($this->table),
            "data" => $data
        );
        echo json_encode($output);
    }

    Public function update()
    {

        if (isset($_POST["user_id"])) {
            $output = array();
            $statement = $this->DBH->prepare(
                "SELECT * FROM $this->table
		WHERE id = '" . $_POST["user_id"] . "'
		LIMIT 1"
            );
            $statement->execute();
            $result = $statement->fetchAll();

            foreach ($result as $row) {

                // start $output[] for insert
                $wordChunks = explode(",", $this->colArray);
                for ($i = 0; $i < count($wordChunks); $i++) {
                    $postArray = $wordChunks[$i];
                    $output["$postArray"] = $row["$postArray"];
                }

            }
            echo json_encode($output);
        }
    }

    public function store()
    {
        // start Prepare ? & value for insert
        if (isset($_POST["operation"])) {

            if ($_POST["operation"] == "Add") {
                $insertValue = "";
                $postArrayValue = "";
                $wordChunks = explode(",", $this->colArray);
                $total = count($wordChunks) - 1;
                for ($i = 0; $i < count($wordChunks); $i++) {
                    $postArray = $wordChunks[$i];
                    if ($i == $total) {
                        $colName = '?';
                        $postArrayCol = $_POST["$postArray"];
                    } else {
                        $colName = "?, ";
                        $postArrayCol = $_POST["$postArray"] . ",";
                    }
                    $insertValue .= "$colName";
                    $postArrayValue .= $postArrayCol;
                }
                $actualArrayValue = explode(',', $postArrayValue);
                // end Prepare ? & value for insert

                $query = "INSERT INTO $this->table ($this->colArray) VALUES ($insertValue)";
                $statement = $this->DBH->prepare("$query");

                try {
                    $statement->execute($actualArrayValue);
                    echo "Success! data has been inserted.";
                } catch (PDOException $error) {
                    echo "Error! Duplicate data may found";
                   // print_r($postArrayValue);

                }
            }

            if ($_POST["operation"] == "Edit") {
                // start Prepare ? & value for insert
                $insertValue = "";
                $postArrayValue = "";
                $wordChunks = explode(",", $this->colArray);
                $total = count($wordChunks) - 1;
                for ($i = 0; $i < count($wordChunks); $i++) {
                    $postArray = $wordChunks[$i];
                    if ($i == $total) {
                        $colName = $wordChunks[$i] . '=?';
                        $postArrayCol = $_POST["$postArray"];
                    } else {
                        $colName = $wordChunks[$i] . '=?, ';
                        $postArrayCol = $_POST["$postArray"] . ",";
                    }
                    $insertValue .= "$colName";
                    $postArrayValue .= $postArrayCol;
                }
                $actualArrayValue = explode(',', $postArrayValue);
                // end Prepare ? & value for insert


                $statement = $this->DBH->prepare(
                    "UPDATE $this->table
			SET $insertValue
			WHERE id = $this->userId"
                );

                try {
                    $statement->execute($actualArrayValue);
                    echo "Success! data has been updated.";
                } catch (PDOException $error) {
                    echo "Error! data has not been updated.UPDATE $this->table
			SET $insertValue
			WHERE id = $this->userId";
                }

            }
        }
    }//end of store()

    Public function delete()
    {


        if (isset($_POST["user_id"])) {
            $statement = $this->DBH->prepare(
                "DELETE FROM $this->table WHERE id = ?"
            );


            try {
                $result = $statement->execute(
                    array($_POST["user_id"])
                );
                echo "Success! data has been Deleted.";
            } catch (PDOException $error) {
                echo "Error! data has not been Deleted.";
            }
        }

    }

}