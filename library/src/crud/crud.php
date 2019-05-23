<?php
namespace App\crud;
use PDO,PDOException;
use App\Message\Message;
use App\Model\Database;

class crud extends Database{
    public $table;
    public $extraAction;
    public $colArray;
    public $searchCol1;
    public $searchCol2;
    public $search;
    public $order;
    public $length;
    public $start;
    public $userId;

    public function setData($receieveDataArray){
        //here id further use for retrive data from database:
        if(array_key_exists("table",$receieveDataArray)){
            $this->table = $receieveDataArray['table'];
        }
        if(array_key_exists("extraAction",$receieveDataArray)){
            $this->extraAction = $receieveDataArray['extraAction'];
        }
        if(array_key_exists("colArray",$receieveDataArray)){
            $this->colArray = $receieveDataArray['colArray'];
        }
        if(array_key_exists("searchArray",$receieveDataArray)){
            $this->searchArray = $receieveDataArray['searchArray'];
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
    }
    public function upload_image()
    {
        if(isset($_FILES["user_image"]))
        {
            $extension = explode('.', $_FILES['user_image']['name']);
            $new_name = rand() . '.' . $extension[1];
            $destination = './upload/' . $new_name;
            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
            return $new_name;
        }
    }

  public function upload_file($fieldName,$path,$picName=0)
    {
        if(isset($_FILES["$fieldName"]))
        {
            if($picName==0){
                $picName=rand();
                }
                else{
                    $picName=$picName;
                }
            $extension = explode('.', $_FILES[$fieldName]["name"]);
            $new_name = $picName . '.' . $extension[1];
            //$new_name = $picName .'.pdf';
            $destination = "./$path/$new_name";
            move_uploaded_file($_FILES[$fieldName]['tmp_name'], $destination);
            return $new_name;
        } 
    }

  public function upload_file_jpg($fieldName,$path,$picName=0)
    { if(isset($_FILES["$fieldName"]))
        {
            if($picName==0){
                $picName=rand();
                }
                else{
                    $picName=$picName;
                }
            $extension = explode('.', $_FILES[$fieldName]["name"]);
            //$new_name = $picName . '.' . $extension[1];
            $new_name = $picName .'.jpg';
            $destination = "./$path/$new_name";
            move_uploaded_file($_FILES[$fieldName]['tmp_name'], $destination);
            return $new_name;
        }
    }
  /*  public function upload_file($fileName,$path)
    {
        if(isset($_FILES["$fileName"]))
        {
            $extension = explode('.', $_FILES[$fileName]["name"]);
            $new_name = rand() . '.' . $extension[1];
            $destination = "./$path/$new_name";
            move_uploaded_file($_FILES[$fileName]['tmp_name'], $destination);
            return $new_name;
        }
    }*/

    public function get_image_name($user_id, $getTable)
    {
        $statement = $this->DBH->prepare("SELECT image FROM $getTable WHERE id = '$user_id'");
        $statement->execute();
        $result = $statement->fetchAll();
        foreach($result as $row)
        {
            return $row["image"];
        }
    }

    public function get_total_all_records($getTable)
    {
        $statement = $this->DBH->prepare("SELECT * FROM $getTable");
        $statement->execute();
        $result = $statement->fetchAll();
        return $statement->rowCount();
    }


    Public function outPutData(){
        $query = '';
        $output = array();
        $query .= "SELECT * FROM $this->table ";
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
        $filtered_rows = $statement->rowCount();
        foreach($result as $row)
        {

            $image = '';
            if($row["image"] != '')
            {
                $image = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" />';
            }
            else
            {
                $image = '';
            }

            $sub_array = array();
            $sub_array[] = $image;
            $wordChunks = explode(",", $this->colArray);
            for($i = 0; $i < (count($wordChunks)-1); $i++){
                $postArray = $wordChunks[$i];
                $sub_array[] = $row["$postArray"];
            }
                if(!isset($this->extraAction)) {

                }
                else  {
                    $sub_array[] = $this->extraAction;
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

            //$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button>';
            // $sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
            $data[] = $sub_array;
        }
        $objCrud = new \App\crud\crud();
        $output = array(
            "draw"				=>	intval($_POST["draw"]),
            "recordsTotal"		=> 	$filtered_rows,
            "recordsFiltered"	=>	$objCrud->get_total_all_records($this->table),
            "data"				=>	$data
        );
        echo json_encode($output);
    }

    Public function update(){

        if(isset($_POST["user_id"]))
        {
            $output = array();
            $statement = $this->DBH->prepare(
                "SELECT * FROM $this->table
		WHERE id = '".$_POST["user_id"]."'
		LIMIT 1"
            );
            $statement->execute();
            $result = $statement->fetchAll();

            foreach($result as $row)
            {

                // start $output[] for insert
                $wordChunks = explode(",", $this->colArray);
                for($i = 0; $i < count($wordChunks); $i++){
                    $postArray = $wordChunks[$i];
                    $output["$postArray"] = $row["$postArray"];
                }
                // end $output[] for insert

                if($row["image"] != '')
                {
                    $output['user_image'] = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
                }
                else
                {
                    $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
                }
            }
            echo json_encode($output);
        }
    }

    Public function store(){
        $objCrud = new \App\crud\crud();

        if(isset($_POST["operation"]))
        {
            if($_POST["operation"] == "Add")
            {
                $image = '';
                if($_FILES["user_image"]["name"] != '')
                {

                    $image = $objCrud->upload_image();
                }
                // start Prepare ? & value for insert
                $insertValue = "";
                $postArrayValue ="";
                $_POST ['image'] = $image;
                $wordChunks = explode(",", $this->colArray);
                $total = count($wordChunks)-1;
                for($i = 0; $i < count($wordChunks); $i++){
                    $postArray = $wordChunks[$i];
                    if($i==$total) {
                        $colName= '?';
                        $postArrayCol = $_POST["$postArray"];
                    }
                    else {
                        $colName = "?, ";
                        $postArrayCol = $_POST["$postArray"].",";
                    }
                    $insertValue .="$colName";
                    $postArrayValue .= $postArrayCol;
                }
                $actualArrayValue = explode(',', $postArrayValue);
                // end Prepare ? & value for insert

                $query="INSERT INTO $this->table ($this->colArray) VALUES ($insertValue)";
                $statement = $this->DBH->prepare("$query");

                try{
                    $statement->execute($actualArrayValue);
                    echo "Success! data has been inserted.";
                }
                catch(PDOException $error){
                    echo "Error! data has not been inserted.$query!!!";
                   print_r($actualArrayValue) ;
                }
            }

            if($_POST["operation"] == "Edit")
            {
                $image = '';
                if($_FILES["user_image"]["name"] != '')
                {
                    $image = $objCrud->upload_image();
                }
                else
                {
                    $image = $_POST["hidden_user_image"];
                }


                // start Prepare ? & value for insert
                $insertValue = "";
                $postArrayValue ="";
                $_POST ['image'] = $image;
                $wordChunks = explode(",", $this->colArray);
                $total = count($wordChunks)-1;
                for($i = 0; $i < count($wordChunks); $i++){
                    $postArray = $wordChunks[$i];
                    if($i==$total) {
                        $colName = $wordChunks[$i].'=?';
                        $postArrayCol = $_POST["$postArray"];
                    }
                    else {
                        $colName =$wordChunks[$i].'=?, ';
                        $postArrayCol = $_POST["$postArray"].",";
                    }
                    $insertValue .="$colName";
                    $postArrayValue .= $postArrayCol;
                }
                $actualArrayValue = explode(',', $postArrayValue);
                // end Prepare ? & value for insert


                $statement = $this->DBH->prepare(
                    "UPDATE $this->table
			SET $insertValue
			WHERE id = $this->userId"
                );
                $result = $statement->execute($actualArrayValue);
                if(!empty($result))
                {
                    echo 'Success! Updated';
                }
            }
        }
    }

    Public function delete(){


        if(isset($_POST["user_id"]))
        {

            $objCrud = new \App\crud\crud();
            $image =$objCrud->get_image_name($_POST["user_id"],$this->table);
            if($image != '')
            {
                unlink("upload/" . $image);
            }
            $statement = $this->DBH->prepare(
                "DELETE FROM $this->table WHERE id = :id"
            );


            try{
                $result = $statement->execute(
                    array(
                        ':id'	=>	$_POST["user_id"]
                    )
                );
                echo "Success! data has been Deleted.";
            }
            catch(PDOException $error){
                echo "Error! data has not been Deleted.";
            }
        }

    }

}