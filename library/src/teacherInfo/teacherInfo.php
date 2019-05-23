<?php
namespace App\teacherInfo;

use PDO;
use App\Message\Message;
use App\Model\Database;
use App\resizePhoto\resizePhoto;

class teacherInfo extends Database{
    public $file;
    public $id;
    public $name;
    public $amount;
    public $designation;
    public $qualification;
    public $deptId;
    public $fName;
    public $mName;
    public $gender;
    public $religion;
    public $nationality;
    public $nid;
    public $joinDate;
    public $mobile;
    public $eMail;
    public $dob;
    public $prVill;
    public $prPo;
    public $prPs;
    public $prDist;
    public $pmVill;
    public $pmPo;
    public $pmPs;
    public $pmDist;
    public $cardNo;
    public $yr;
    public $bloodGroup;
    public $pageTable;

    public function setData($receieveDataArray,$file=0){

        //here id further use for retrive data from database:
        if(array_key_exists("id",$receieveDataArray)){
            $this->id = $receieveDataArray['id'];
        }
        if(array_key_exists("name",$receieveDataArray)){
            $this->name = $receieveDataArray['name'];
        }
        if(array_key_exists("amount",$receieveDataArray)){
            $this->amount = $receieveDataArray['amount'];
        }
        if(array_key_exists("designation",$receieveDataArray)){
            $this->designation = $receieveDataArray['designation'];
        }
        if(array_key_exists("qualification",$receieveDataArray)){
            $this->qualification = $receieveDataArray['qualification'];
        }
        if(array_key_exists("deptId",$receieveDataArray)){
            $this->deptId = $receieveDataArray['deptId'];
        }
        if(array_key_exists("fName",$receieveDataArray)){
            $this->fName = $receieveDataArray['fName'];
        }
        if(array_key_exists("mName",$receieveDataArray)){
            $this->mName = $receieveDataArray['mName'];
        }
        if(array_key_exists("gender",$receieveDataArray)){
            $this->gender = $receieveDataArray['gender'];
        }
        if(array_key_exists("religion",$receieveDataArray)){
            $this->religion = $receieveDataArray['religion'];
        }
        if(array_key_exists("nationality",$receieveDataArray)){
            $this->nationality = $receieveDataArray['nationality'];
        }
        if(array_key_exists("nid",$receieveDataArray)){
            $this->nid = $receieveDataArray['nid'];
        }
        if(array_key_exists("mobile",$receieveDataArray)){
            $this->mobile = $receieveDataArray['mobile'];
        }
        if(array_key_exists("eMail",$receieveDataArray)){
            $this->eMail = $receieveDataArray['eMail'];
        }
        if(array_key_exists("dob",$receieveDataArray)){
            $this->dob = $receieveDataArray['dob'];
        }
        if(array_key_exists("joinDate",$receieveDataArray)){
            $this->joinDate = $receieveDataArray['joinDate'];
        }
        if(array_key_exists("prVill",$receieveDataArray)){
            $this->prVill = $receieveDataArray['prVill'];
        }
        if(array_key_exists("prPo",$receieveDataArray)){
            $this->prPo = $receieveDataArray['prPo'];
        }
        if(array_key_exists("prPs",$receieveDataArray)){
            $this->prPs = $receieveDataArray['prPs'];
        }
        if(array_key_exists("prDist",$receieveDataArray)){
            $this->prDist = $receieveDataArray['prDist'];
        }
        if(array_key_exists("pmVill",$receieveDataArray)){
            $this->pmVill = $receieveDataArray['pmVill'];
        }
        if(array_key_exists("pmPo",$receieveDataArray)){
            $this->pmPo = $receieveDataArray['pmPo'];
        }
        if(array_key_exists("pmPs",$receieveDataArray)){
            $this->pmPs = $receieveDataArray['pmPs'];
        }
        if(array_key_exists("pmDist",$receieveDataArray)){
            $this->pmDist = $receieveDataArray['pmDist'];
        }
        if(array_key_exists("cardNo",$receieveDataArray)){
            $this->cardNo = $receieveDataArray['cardNo'];
        }
        if(array_key_exists("yr",$receieveDataArray)){
            $this->yr = $receieveDataArray['yr'];
        }
        if(array_key_exists("bloodGroup",$receieveDataArray)){
            $this->bloodGroup = $receieveDataArray['bloodGroup'];
        }
        if(array_key_exists("pageTable",$receieveDataArray)){
            $this->pageTable = $receieveDataArray['pageTable'];
        }
        $this->file = $file;

    }//end of setData()

    public function store(){
        $handle = fopen($this->file, "r");
        $totalRecordsTrue = 0;
        $totalRecordsFalse = 0;
        while(($filesop = fgetcsv($handle, 1000, ",")) !== false){
            $name = $filesop[0];
            $amount = $filesop[1];
            $designation = $filesop[2];
            $qualification = $filesop[3];
            $deptId = $filesop[4];
            $fName = $filesop[5];
            $mName = $filesop[6];
            $gender = $filesop[7];
            $religion = $filesop[8];
            $nationality = $filesop[9];
            $nid = $filesop[10];
            $mobile = $filesop[11];
            $eMail = $filesop[12];
            $joinDate = $filesop[13];
            $dob = $filesop[14];
            $prVill = $filesop[15];
            $prPo = $filesop[16];
            $prPs = $filesop[17];
            $prDist = $filesop[18];
            $pmVill = $filesop[19];
            $pmPo = $filesop[20];
            $pmPs = $filesop[21];
            $pmDist = $filesop[22];
            $bloodGroup = $filesop[23];

            $yr = $this->yr;

            if(substr($mobile, 0, 1)=="0") $mobile;
            else $mobile = "0".$mobile;

            $joinDate = date("Y-m-d",strtotime($joinDate));
            $dob = date("Y-m-d",strtotime($dob));
            
            $objFirstKey = new \App\firstKey\firstKey();
            $firstKeyReligion = $objFirstKey->firstKeyWord($religion);
            $firstKeyGender = $objFirstKey->firstKeyWord($gender);

            if($name=="Name" || $fName=="Father Name" || $mName=="Mother Name"){}
            else {
                $sqlQuery = "INSERT INTO `teacher_info` (`id`,`name`, `amount`, `designation`, `qualification`, `dept_id`, `f_name`, `m_name`, `gender`, `religion`, `nationality`, `nid`, `mobile`, `e_mail`, `join_date`, `dob`, `pr_vill`, `pr_po`, `pr_ps`, `pr_dist`, `pm_vill`, `pm_po`, `pm_ps`, `pm_dist`, `blood_group`, `created_at`)
                            SELECT MAX(id)+1, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now()
                            FROM teacher_info";
                $dataArray = array($name,$amount,$designation,$qualification,$deptId,$fName,$mName,$firstKeyGender,$firstKeyReligion,$nationality,$nid,$mobile,$eMail,$joinDate,$dob,$prVill,$prPo,$prPs,$prDist,$pmVill,$pmPo,$pmPs,$pmDist,$bloodGroup);

                try {
                    $STH = $this->DBH->prepare($sqlQuery); //for data insert into database we have to use prepare //
                    $teacherInfo = $STH->execute($dataArray);
                } catch (PDOException $e) {
                    // Catch the error message and do whatever you need to do with it
                }

                if ($teacherInfo) $totalRecordsTrue = $totalRecordsTrue + 1;
                else $totalRecordsFalse = $totalRecordsFalse + 1;
            }
        }
        Message::message("Success! Inserted ". $totalRecordsTrue ." record(s). Failed ".$totalRecordsFalse." Record(s).");
    }//end of store()

    public function singleStore(){
        $name = $this->name;
        $amount = $this->amount;
        $designation = $this->designation;
        $qualification = $this->qualification;
        $deptId = $this->deptId;
        $fName = $this->fName;
        $mName = $this->mName;
        $gender = $this->gender;
        $nationality = $this->nationality;
        $nid = $this->nid;
        $religion = $this->religion;
        $joinDate = $this->joinDate;
        $mobile = $this->mobile;
        $eMail = $this->eMail;
        $dob = $this->dob;
        $prVill = $this->prVill;
        $prPo = $this->prPo;
        $prPs = $this->prPs;
        $prDist = $this->prDist;
        $pmVill = $this->pmVill;
        $pmPo = $this->pmPo;
        $pmPs = $this->pmPs;
        $pmDist = $this->pmDist;
        $bloodGroup = $this->bloodGroup;
        
        $objFirstKey = new \App\firstKey\firstKey();
        $firstKeyReligion = $objFirstKey->firstKeyWord($religion);
        $firstKeyGender = $objFirstKey->firstKeyWord($gender);

        /*$sqlQuery = "INSERT INTO `teacher_info` (`id`,`name`, `amount`, `designation`, `qualification`, `dept_id`, `f_name`, `m_name`, `gender`, `religion`, `nationality`, `nid`, `mobile`, `e_mail`, `join_date`, `dob`, `pr_vill`, `pr_po`, `pr_ps`, `pr_dist`, `pm_vill`, `pm_po`, `pm_ps`, `pm_dist`, `created_at`)
                     SELECT MAX(id)+1, '$name', '$amount', '$designation', '$qualification', '$deptId', '$fName', '$mName', '$firstKeyGender', '$firstKeyReligion', '$nationality', '$nid', '$mobile', '$eMail', '$joinDate', '$dob', '$prVill', '$prPo', '$prPs', '$prDist', '$pmVill', '$pmPo', '$pmPs', '$pmDist', now()
                     FROM teacher_info";*/

        $sqlQuery = "INSERT INTO `teacher_info` (`id`,`name`, `amount`, `designation`, `qualification`, `dept_id`, `f_name`, `m_name`, `gender`, `religion`, `nationality`, `nid`, `mobile`, `e_mail`, `join_date`, `dob`, `pr_vill`, `pr_po`, `pr_ps`, `pr_dist`, `pm_vill`, `pm_po`, `pm_ps`, `pm_dist`, `blood_group`, `created_at`)
                     SELECT MAX(id)+1, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now()
                     FROM teacher_info";
        $dataArray = array($name,$amount,$designation,$qualification,$deptId,$fName,$mName,$firstKeyGender,$firstKeyReligion,$nationality,$nid,$mobile,$eMail,$joinDate,$dob,$prVill,$prPo,$prPs,$prDist,$pmVill,$pmPo,$pmPs,$pmDist,$bloodGroup);

        $STH = $this->DBH->prepare($sqlQuery); //for data insert into database we have to use prepare//
        $result = $STH->execute($dataArray);

        $sqlQueryA = "SELECT MAX(id) AS id FROM `teacher_info`";
        $STHA = $this->DBH->query($sqlQueryA);
        $STHA->setFetchMode(PDO::FETCH_OBJ);
        $singleDataA = $STHA->fetch();
        $idArray = $singleDataA->id;

        if($result){
            if(!isset($_SESSION)) session_start();
            $insPath=$_SESSION['insPath'];
            //$fileName = $_FILES["file"]["name"];
            $fileExtension = explode(".", $_FILES["file"]["name"]);
            $newFileName = $idArray . '.' . end($fileExtension);
            $fileTempName = $_FILES["file"]["tmp_name"];
            $sizeSm = '../../../uploads/'.$insPath.'/teacher_image/sm/';
            $sizeMd = '../../../uploads/'.$insPath.'/teacher_image/md/';
            $sizeLg = '../../../uploads/'.$insPath.'/teacher_image/lg/';
            $sizeSquare = '../../../uploads/'.$insPath.'/teacher_image/square/';
            $sizeXl = '../../../uploads/'.$insPath.'/teacher_image/xl/';
            $sizeReal = '../../../uploads/'.$insPath.'/teacher_image/real/';
            
            if(move_uploaded_file($fileTempName, $sizeReal.$newFileName)) {

               $resizeObj = new resizePhoto($sizeReal.$newFileName);
               $resizeObj -> resizeImage(45, 45, 'exact');
               $resizeObj -> saveImage($sizeSm.$newFileName, 100);
               
               $resizeObj1 = new resizePhoto($sizeReal.$newFileName);
               $resizeObj1 -> resizeImage(100, 120, 'exact');
               $resizeObj1 -> saveImage($sizeMd.$newFileName, 100);
               
               $resizeObj2 = new resizePhoto($sizeReal.$newFileName);
               $resizeObj2 -> resizeImage(140, 168, 'exact');
               $resizeObj2 -> saveImage($sizeLg.$newFileName, 100);
               
               $resizeObj2 = new resizePhoto($sizeReal.$newFileName);
               $resizeObj2 -> resizeImage(160, 160, 'exact');
               $resizeObj2 -> saveImage($sizeSquare.$newFileName, 100);
               
               $resizeObj2 = new resizePhoto($sizeReal.$newFileName);
               $resizeObj2 -> resizeImage(350, 420, 'exact');
               $resizeObj2 -> saveImage($sizeXl.$newFileName, 100);
               
               unlink($sizeReal . $newFileName);
            }
            
            Message::message("Success! data has been inserted.");
        }
        else{
            Message::message("Error! data has not been inserted.");
        }
    }//end of singleStore()

    public function index(){
        $sqlQuery = "SELECT * FROM `teacher_info` where is_trashed='No'";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of index()

    public function view(){
        $sqlQuery = "select * from teacher_info where id = $this->id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();

        return $singleData;
    }//end of view()

    public function update(){
        $name = $this->name;
        $amount = $this->amount;
        $designation = $this->designation;
        $qualification = $this->qualification;
        $deptId = $this->deptId;
        $fName = $this->fName;
        $mName = $this->mName;
        $gender = $this->gender;
        $nationality = $this->nationality;
        $nid = $this->nid;
        $religion = $this->religion;
        $joinDate = $this->joinDate;
        $mobile = $this->mobile;
        $eMail = $this->eMail;
        $dob = $this->dob;
        $prVill = $this->prVill;
        $prPo = $this->prPo;
        $prPs = $this->prPs;
        $prDist = $this->prDist;
        $pmVill = $this->pmVill;
        $pmPo = $this->pmPo;
        $pmPs = $this->pmPs;
        $pmDist = $this->pmDist;
        $cardNo = $this->cardNo;
        $bloodGroup = $this->bloodGroup;
            
        $objFirstKey = new \App\firstKey\firstKey();
        $firstKeyReligion = $objFirstKey->firstKeyWord($religion);
        $firstKeyGender = $objFirstKey->firstKeyWord($gender);

        if ($name=='') {
            Message::message("Field Must Not Be Empty");
        }else{
            $sqlQuery = "UPDATE teacher_info SET name = ?, amount = ?, designation = ?, qualification = ?, dept_id = ?, f_name = ?, m_name = ?, gender = ?, religion = ?, nationality = ?, nid = ?, mobile = ?, e_mail = ?, join_date = ?, dob = ?,`pr_vill`= ?,`pr_po`= ?,`pr_ps`= ?,`pr_dist`= ?,`pm_vill`= ?,`pm_po`= ?,`pm_ps`= ?,`pm_dist`= ?, `card_no`=?,`blood_group`=?, `updated_at`= NOW()  WHERE id = $this->id";
            $dataArray = array($name,$amount,$designation,$qualification,$deptId,$fName,$mName,$firstKeyGender,$firstKeyReligion,$nationality,$nid,$mobile,$eMail,$joinDate,$dob, $prVill, $prPo, $prPs, $prDist, $pmVill, $pmPo, $pmPs, $pmDist, $cardNo, $bloodGroup) ;

            $STH = $this->DBH->prepare($sqlQuery);

            $result = $STH->execute($dataArray);

            if($result){
                if(!isset($_FILES['file']) || $_FILES['file']['error'] == UPLOAD_ERR_NO_FILE) {
                
                } else {    
                    if(!isset($_SESSION)) session_start();
                    $insPath=$_SESSION['insPath'];
                    $fileExtension = explode(".", $_FILES["file"]["name"]);
                    $newFileName = $this->id . '.' . end($fileExtension);
                    
                    $fileTempName = $_FILES["file"]["tmp_name"];
                    $sizeSm = '../../../uploads/'.$insPath.'/teacher_image/sm/';
                    $sizeMd = '../../../uploads/'.$insPath.'/teacher_image/md/';
                    $sizeLg = '../../../uploads/'.$insPath.'/teacher_image/lg/';
                    $sizeSquare = '../../../uploads/'.$insPath.'/teacher_image/square/';
                    $sizeXl = '../../../uploads/'.$insPath.'/teacher_image/xl/';
                    $sizeReal = '../../../uploads/'.$insPath.'/teacher_image/real/';
                    
                    if(move_uploaded_file($fileTempName, $sizeReal.$newFileName)) {
                       $resizeObj = new resizePhoto($sizeReal.$newFileName);
                       $resizeObj -> resizeImage(45, 45, 'exact');
                       $resizeObj -> saveImage($sizeSm.$newFileName, 100);
                       
                       $resizeObj1 = new resizePhoto($sizeReal.$newFileName);
                       $resizeObj1 -> resizeImage(100, 120, 'exact');
                       $resizeObj1 -> saveImage($sizeMd.$newFileName, 100);
                       
                       $resizeObj2 = new resizePhoto($sizeReal.$newFileName);
                       $resizeObj2 -> resizeImage(140, 168, 'exact');
                       $resizeObj2 -> saveImage($sizeLg.$newFileName, 100);
               
                       $resizeObj2 = new resizePhoto($sizeReal.$newFileName);
                       $resizeObj2 -> resizeImage(160, 160, 'exact');
                       $resizeObj2 -> saveImage($sizeSquare.$newFileName, 100);
                       
                       $resizeObj2 = new resizePhoto($sizeReal.$newFileName);
                       $resizeObj2 -> resizeImage(350, 420, 'exact');
                       $resizeObj2 -> saveImage($sizeXl.$newFileName, 100);
                       
                       unlink($sizeReal . $newFileName);
                    }
                }
                Message::message("Success! data has been updated.");
            }
            else{
                Message::message("Error! data has not been updated.");
            }
        }
    }// end of update()

    public function delete(){
        if(!isset($_SESSION)) session_start();
        $insPath=$_SESSION['insPath'];
        $id = $this->id;

        $sqlQuery = "DELETE from $this->pageTable WHERE id = $id";

        $result = $this->DBH->exec($sqlQuery);

        if($result){
            $sizeSm = '../../../uploads/'.$insPath.'/teacher_image/sm/' . $id;
            $sizeMd = '../../../uploads/'.$insPath.'/teacher_image/md/' . $id;
            $sizeLg = '../../../uploads/'.$insPath.'/teacher_image/lg/' . $id;
            $sizeSquare = '../../../uploads/'.$insPath.'/teacher_image/square/' . $id;
            $sizeXl = '../../../uploads/'.$insPath.'/teacher_image/xl/' . $id;
            
            if (file_exists($sizeSm)) { unlink($sizeSm); }
            if (file_exists($sizeMd)) { unlink($sizeMd); }
            if (file_exists($sizeLg)) { unlink($sizeLg); }
            if (file_exists($sizeSquare)) { unlink($sizeSquare); }
            if (file_exists($sizeXl)) { unlink($sizeXl); }
            Message::message("Success! data has been deleted.");
        }
        else{
            Message::message("Error! data has not been deleted.");

        }
    }// end of delete()

}//end of teacherInfo Class