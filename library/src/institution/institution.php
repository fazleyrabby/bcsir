<?php
namespace App\institution;

use PDO;
use App\Message\Message;
use App\Model\Database;

class institution extends Database{
    public $id;
    public $insFullName;
    public $insShortName;
    public $insAddress;
    public $insMobile;
    public $insEmail;
    public $insWeb;
    public $createdAt;
    public $boardNo;
    public $dbUser;
    public $dbPass;
    public $dbName;

    public function setData($receieveDataArray){

        //here id further use for retrive data from database:
        if(array_key_exists("id",$receieveDataArray)){
            $this->id = $receieveDataArray['id'];
        }
        if(array_key_exists("insFullName",$receieveDataArray)){
            $this->insFullName = $receieveDataArray['insFullName'];
						}
				if(array_key_exists("insShortName",$receieveDataArray)){
            $this->insShortName = $receieveDataArray['insShortName'];
        }
				if(array_key_exists("insAddress",$receieveDataArray)){
            $this->insAddress = $receieveDataArray['insAddress'];
        }
        
				if(array_key_exists("insMobile",$receieveDataArray)){
            $this->insMobile = $receieveDataArray['insMobile'];
        }
				if(array_key_exists("insEmail",$receieveDataArray)){
            $this->insEmail = $receieveDataArray['insEmail'];
        }
				if(array_key_exists("insWeb",$receieveDataArray)){
            $this->insWeb = $receieveDataArray['insWeb'];
        }
        if(array_key_exists("boardNo",$receieveDataArray)){
            $this->boardNo = $receieveDataArray['boardNo'];
        }
				if(array_key_exists("createdAt",$receieveDataArray)){
            $this->createdAt = $receieveDataArray['createdAt'];
        }
				if(array_key_exists("dbUser",$receieveDataArray)){
            $this->dbUser = $receieveDataArray['dbUser'];
        }
				if(array_key_exists("dbPass",$receieveDataArray)){
            $this->dbPass = $receieveDataArray['dbPass'];
        }
				if(array_key_exists("dbName",$receieveDataArray)){
            $this->dbName = $receieveDataArray['dbName'];
        }
    }

      public function store(){
        $sqlQuery = "INSERT INTO institution (ins_full_name,ins_short_name,ins_address,ins_mobile,ins_email,ins_web,db_name,db_user,db_pass,board_no) VALUES (?,?,?,?,?,?,?,?,?,?);";
        $dataArray = array($this->insFullName,$this->insShortName,$this->insAddress,$this->insMobile,$this->insEmail,$this->insWeb,$this->dbName,$this->dbUser,$this->dbPass,$this->boardNo);

        $STH = $this->DBH->prepare($sqlQuery); //for data insert into database we have to use prepare//
        $result = $STH->execute($dataArray);

        if($result){
            Message::message("Data has been inserted successfully!");
        }
        else{
            Message::message("Error in data insertion!");
        }
//database making start
          $checkDd = "SHOW DATABASES LIKE '%$this->dbName'";
          $STH2 = $this->DBH->query($checkDd);
          $STH2->setFetchMode(PDO::FETCH_OBJ);
          $singleData = $STH2->fetch();
          if(!$singleData){
              $createUser= "CREATE USER '$this->dbUser'@'localhost' IDENTIFIED BY '$this->dbPass'";
              $this->DBH->exec($createUser);

              $createDb ="CREATE DATABASE $this->dbName";
              $this->DBH->exec($createDb);

              $grantDbQuery = "GRANT ALL PRIVILEGES ON $this->dbName.* TO '$this->dbUser'@'localhost'";
              //$grantDbQuery = "GRANT ALL ON db1.* TO '$this->dbUser'@'localhost'";
              $this->DBH->exec($grantDbQuery);

//database making finish
 }
      }//end of store()

    function import_tables() {
//sql upload start
        $db = new PDO("mysql:host=localhost;dbname=$this->dbName", $this->dbUser, $this->dbPass);

        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, 0);
        $sqlSource = file_get_contents('insert.sql');
        $sql = implode(';', array_unique(array_map('trim', explode(';', $sqlSource))));
        try {
            $db->exec($sql);
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
            die();
        }

//sql upload finish
    }
    function createDirectory() {
        $path = '../../resources/assets/images/'.$this->insShortName;
        if(!mkdir($path))
        {
            Message::message("Database Created !! Folder already exist");
        }
        else{
            mkdir($path);
            mkdir($path.'/logo');
            mkdir($path.'/student_image');
            mkdir($path.'/student_image/lg');
            mkdir($path.'/student_image/md');
            mkdir($path.'/student_image/sm');
            mkdir($path.'/teacher_image');
            mkdir($path.'/teacher_image/lg');
            mkdir($path.'/teacher_image/md');
            mkdir($path.'/teacher_image/sm');

            //echo ("Created Folder");
        }
    }
/*
	public function recursiveRemoveDirectory($directory)
	{
		foreach(glob("{$directory}/*") as $file)
		{
			if(is_dir($file)) {
				recursiveRemoveDirectory($file);
			} else {
				unlink($file);
			}
		}
		rmdir($directory);
	}
*/	
    public function delete(){

        $sqlQuery = "DELETE from institution WHERE ins_short_name = '$this->insShortName'";
        $result = $this->DBH->exec($sqlQuery);

        $sqlQuery2 = "DROP DATABASE $this->dbName";
        $result2 = $this->DBH->exec($sqlQuery2);

        if($result2){
            //delete image path
            $directory = '../../resources/assets/images/'.$this->insShortName;
            foreach(glob("{$directory}/*") as $file)
				{
					if(is_dir($file)) {
						recursiveRemoveDirectory($file);
					} else {
						unlink($file);
					}
				}
			rmdir($directory);
			Message::message("Success! data has been deleted.");
        }
        else{
            Message::message("Error! data has not been deleted.");

        }
    }// end of delete()


    public function indexDeveloper(){
        $sqlQuery = "select * from institution where is_trashed = 'No' order by id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of index()

    public function index(){
        $sqlQuery = "select * from institution where is_trashed = 'No' and id=2 order by id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of index()


    public function view(){
        $sqlQuery = "select * from institution where id = $this->id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();

        return $singleData;
    }//end of view()

    public function viewInstitute(){
        $sqlQuery = "select * from institution where id = 2";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();

        return $singleData;
    }//end of view()
		public function viewCompany(){
        $sqlQuery = "select * from institution where id = 1";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();

        return $singleData;
    }//end of view()
		
    public function update(){
        if ($this->insFullName=='') {
            Message::message("Field Must Not Be Empty");
        }else{
            $sqlQuery = "UPDATE institution SET ins_full_name = ?, ins_short_name = ?,ins_address = ?,ins_mobile = ?,ins_email = ?,ins_web = ?,board_no = ? WHERE id =$this->id;";
            $dataArray = array($this->insFullName,$this->insShortName,$this->insAddress,$this->insMobile,$this->insEmail,$this->insWeb,$this->boardNo) ;

            $STH = $this->DBH->prepare($sqlQuery);

            $result = $STH->execute($dataArray);


            if($result){
                Message::message("Success! Data has been Updated.");
            }
            else{
                Message::message("Error! Data has not been Updated.");
            }
        }
    }// end of update()


}//end of term class