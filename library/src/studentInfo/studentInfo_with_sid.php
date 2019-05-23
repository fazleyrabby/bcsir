<?php
namespace App\studentInfo;

use PDO;
use PDOException;
use App\Message\Message;
use App\Model\Database;
use App\resizePhoto\resizePhoto;

class studentInfo extends Database{
    // this information is for student admission
    public $file;
    public $id;
    public $sId;
    public $name;
    public $fName;
    public $fOcp;
    public $mName;
    public $mOcp;
    public $gender;
    public $religion;
    public $nationality;
    public $gurName;
    public $gurOcp;
    public $gurMobile;
    public $stdMobile;
    public $stdEmail;
    public $dob;
    public $prVill;
    public $prPo;
    public $prPs;
    public $prDist;
    public $pmVill;
    public $pmPo;
    public $pmPs;
    public $pmDist;
    public $studentId;

    // this information is for student promotion
    public $yr;
    public $cId;
    public $roll;
    public $grpId;
    public $secId;
    public $amount;
    public $discountFee;
    public $cardNo;
    
    public $pageTable;

    public function setData($receieveDataArray,$file=0){
        //here id further use for retrive data from database:

        // this information is for student admission
        if(array_key_exists("id",$receieveDataArray)){
            $this->id = $receieveDataArray['id'];
        }
        if(array_key_exists("sId",$receieveDataArray)){
            $this->sId = $receieveDataArray['sId'];
        }
        if(array_key_exists("name",$receieveDataArray)){
            $this->name = $receieveDataArray['name'];
        }
        if(array_key_exists("fName",$receieveDataArray)){
            $this->fName = $receieveDataArray['fName'];
        }
        if(array_key_exists("fOcp",$receieveDataArray)){
            $this->fOcp = $receieveDataArray['fOcp'];
        }
        if(array_key_exists("mName",$receieveDataArray)){
            $this->mName = $receieveDataArray['mName'];
        }
        if(array_key_exists("mOcp",$receieveDataArray)){
            $this->mOcp = $receieveDataArray['mOcp'];
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
        if(array_key_exists("gurName",$receieveDataArray)){
            $this->gurName = $receieveDataArray['gurName'];
        }
        if(array_key_exists("gurOcp",$receieveDataArray)){
            $this->gurOcp = $receieveDataArray['gurOcp'];
        }
        if(array_key_exists("gurMobile",$receieveDataArray)){
            $this->gurMobile = $receieveDataArray['gurMobile'];
        }
        if(array_key_exists("stdMobile",$receieveDataArray)){
            $this->stdMobile = $receieveDataArray['stdMobile'];
        }
        if(array_key_exists("stdEmail",$receieveDataArray)){
            $this->stdEmail = $receieveDataArray['stdEmail'];
        }
        if(array_key_exists("dob",$receieveDataArray)){
            $this->dob = $receieveDataArray['dob'];
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

        // this information is for student promotion
        if(array_key_exists("yr",$receieveDataArray)){
            $this->yr = $receieveDataArray['yr'];
        }
        if(array_key_exists("cId",$receieveDataArray)){
            $this->cId = $receieveDataArray['cId'];
        }
        if(array_key_exists("roll",$receieveDataArray)){
            $this->roll = $receieveDataArray['roll'];
        }
        if(array_key_exists("grpId",$receieveDataArray)){
            $this->grpId = $receieveDataArray['grpId'];
        }
        if(array_key_exists("secId",$receieveDataArray)){
            $this->secId = $receieveDataArray['secId'];
        }
        if(array_key_exists("amount",$receieveDataArray)){
            $this->amount = $receieveDataArray['amount'];
        }
        if(array_key_exists("discountFee",$receieveDataArray)){
            $this->discountFee = $receieveDataArray['discountFee'];
        }
        if(array_key_exists("cardNo",$receieveDataArray)){
            $this->cardNo = $receieveDataArray['cardNo'];
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
            $this->studentId = $filesop[0];
            $name = $filesop[1];
            $roll = $filesop[2];
            $amount = $filesop[3];
            $discountFee = $filesop[4];
            $fName = $filesop[5];
            $fOcp = $filesop[6];
            $mName = $filesop[7];
            $mOcp = $filesop[8];
            $gender = $filesop[9];
            $religion = $filesop[10];
            $nationality = $filesop[11];
            $gurName = $filesop[12];
            $gurOcp = $filesop[13];
            $gurMobile = $filesop[14];
            $stdMobile = $filesop[15];
            $stdEmail = $filesop[16];
            $dob = $filesop[17];
            $prVill = $filesop[18];
            $prPo = $filesop[19];
            $prPs = $filesop[20];
            $prDist = $filesop[21];
            $pmVill = $filesop[22];
            $pmPo = $filesop[23];
            $pmPs = $filesop[24];
            $pmDist = $filesop[25];
            
            $yr = $this->yr;
            $yr = $this->yr;
            $cId = $this->cId;
            $grpId = $this->grpId;
            $secId = $this->secId;

            $dob = date("Y-m-d",strtotime($dob));

            if(substr($gurMobile, 0, 1)=="0") $gurMobile;
            else $gurMobile = "0".$gurMobile;

            if(substr($stdMobile, 0, 1)=="0") $stdMobile;
            else $stdMobile = "0".$stdMobile;

            $objFirstKey = new \App\firstKey\firstKey();
            $firstKeyReligion = $objFirstKey->firstKeyWord($religion);
            $firstKeyGender = $objFirstKey->firstKeyWord($gender);

            $dob = date("Y-m-d",strtotime($dob));

            if($name=="Student Name" || $fName=="Father Name" || $mName=="Mother Name"){}
            else {
                $sqlQuery = "INSERT INTO `student_info`(`id`, `name`, `f_name`, `f_ocp`, `m_name`, `m_ocp`, `gender`, `religion`, `nationality`, `gur_name`, `gur_ocp`, `gur_mobile`, `std_mobile`, `std_email`, `dob`, `pr_vill`, `pr_po`, `pr_ps`, `pr_dist`, `pm_vill`, `pm_po`, `pm_ps`, `pm_dist`, `created_at`)
                            VALUES ('$this->studentId', '$name', '$fName', '$fOcp', '$mName', '$mOcp', '$firstKeyGender', '$firstKeyReligion', '$nationality', '$gurName', '$gurOcp', '$gurMobile', '$stdMobile', '$stdEmail', '$dob', '$prVill', '$prPo', '$prPs', '$prDist', '$pmVill', '$pmPo', '$pmPs', '$pmDist', now())";
                $dataArray = array();

                try {
                    $STH = $this->DBH->prepare($sqlQuery); //for data insert into database we have to use prepare//
                    $studentInfo = $STH->execute($dataArray);

                    $sqlQueryA = "SELECT MAX(id) AS id FROM `student_info`";
                    $STHA = $this->DBH->query($sqlQueryA);
                    $STHA->setFetchMode(PDO::FETCH_OBJ);
                    $singleDataA = $STHA->fetch();
                    $sIdArray = $singleDataA->id;

                    $sqlPromtQuery = "INSERT INTO `student_promotion`(`created_at`, `yr`, `amount`, `discount_fee`, `s_id`, `c_id`, `roll`, `grp_id`, `section_id`)
                VALUES (NOW(), '$yr', '$amount', '$discountFee', '$this->studentId', '$cId', '$roll', '$grpId', '$secId')";

                    $STH2 = $this->DBH->prepare($sqlPromtQuery); //for data insert into database we have to use prepare//
                    $STH2->execute($dataArray);

                } catch (PDOException $e) {
                   
                     Message::message("Failed! Data not inserted.");
                }
                
                if ($studentInfo) $totalRecordsTrue = $totalRecordsTrue + 1;
                else $totalRecordsFalse = $totalRecordsFalse + 1;
            }
        }
        Message::message("Success! ". $totalRecordsTrue ." record(s). Failed ".$totalRecordsFalse." Record(s).");
    }//end of store()

    public function singleStore(){
        // this information is for student admission
        $name = $this->name;
        $fName = $this->fName;
        $fOcp = $this->fOcp;
        $mName = $this->mName;
        $mOcp = $this->mOcp;
        $gender = $this->gender;
        $religion = $this->religion;
        $nationality = $this->nationality;
        $gurName = $this->gurName;
        $gurOcp = $this->gurOcp;
        $gurMobile = $this->gurMobile;
        $stdMobile = $this->stdMobile;
        $stdEmail = $this->stdEmail;
        $dob = $this->dob;
        $prVill = $this->prVill;
        $prPo = $this->prPo;
        $prPs = $this->prPs;
        $prDist = $this->prDist;
        $pmVill = $this->pmVill;
        $pmPo = $this->pmPo;
        $pmPs = $this->pmPs;
        $pmDist = $this->pmDist;
        
        $objFirstKey = new \App\firstKey\firstKey();
        $firstKeyReligion = $objFirstKey->firstKeyWord($religion);
        $firstKeyGender = $objFirstKey->firstKeyWord($gender);
        
        $sqlQuery = "INSERT INTO `student_info`(`id`, `name`, `f_name`, `f_ocp`, `m_name`, `m_ocp`, `gender`, `religion`, `nationality`, `gur_name`, `gur_ocp`, `gur_mobile`, `std_mobile`, `std_email`, `dob`, `pr_vill`, `pr_po`, `pr_ps`, `pr_dist`, `pm_vill`, `pm_po`, `pm_ps`, `pm_dist`, `created_at`)
                            SELECT MAX(id)+1, '$name', '$fName', '$fOcp', '$mName', '$mOcp', '$firstKeyGender', '$firstKeyReligion', '$nationality', '$gurName', '$gurOcp', '$gurMobile', '$stdMobile', '$stdEmail', '$dob', '$prVill', '$prPo', '$prPs', '$prDist', '$pmVill', '$pmPo', '$pmPs', '$pmDist', now()
                            FROM student_info";
        $dataArray = array();

        $STH = $this->DBH->prepare($sqlQuery); //for data insert into database we have to use prepare//
        $result = $STH->execute($dataArray);

        
        if($result){
            if(!isset($_SESSION)) session_start();
            $insPath=$_SESSION['insPath'];
            $fileName = $_FILES["file"]["name"];
            $fileTempName = $_FILES["file"]["tmp_name"];
            $sizeSm = '../../../uploads/'.$insPath.'/student_image/sm/';
            $sizeMd = '../../../uploads/'.$insPath.'/student_image/md/';
            $sizeLg = '../../../uploads/'.$insPath.'/student_image/lg/';
            $sizeReal = '../../../uploads/'.$insPath.'/student_image/real/';
            
            if(move_uploaded_file($fileTempName, $sizeReal.$fileName)) {

               $resizeObj = new resizePhoto($sizeReal.$fileName);
               $resizeObj -> resizeImage(45, 45, 'exact');
               $resizeObj -> saveImage($sizeSm.$fileName, 100);
               
               $resizeObj1 = new resizePhoto($sizeReal.$fileName);
               $resizeObj1 -> resizeImage(88, 88, 'exact');
               $resizeObj1 -> saveImage($sizeMd.$fileName, 100);
               
               $resizeObj2 = new resizePhoto($sizeReal.$fileName);
               $resizeObj2 -> resizeImage(120, 120, 'exact');
               $resizeObj2 -> saveImage($sizeLg.$fileName, 100);
               
               unlink($sizeReal . $fileName);
            }
            
            Message::message("Success! data has been inserted.");
        }
        else{
            Message::message("Error! data has not been inserted.");
        }
        
    }//end of singleStore()

    public function singleStorePromotion(){
        //$yr = $this->yr;
        $curYr= date("Y");
        $amount = $this->amount;
        $discountFee = $this->discountFee;
        $cId = $this->cId;
        $roll = $this->roll;
        $grpId = $this->grpId;
        $secId = $this->secId;
        $cardNo = $this->cardNo;

        $sqlQueryA = "SELECT MAX(id) AS id FROM `student_info`";
        $STHA = $this->DBH->query($sqlQueryA);
        $STHA->setFetchMode(PDO::FETCH_OBJ);
        $singleDataA = $STHA->fetch();
        $sIdArray = $singleDataA->id;

        $sqlQuery = "INSERT INTO `student_promotion`(`created_at`, `yr`, `amount`, `discount_fee`, `s_id`, `c_id`, `roll`, `grp_id`, `section_id`, `card_no`)
                VALUES (NOW(), '$curYr', '$amount', '$discountFee', '$sIdArray', '$cId', '$roll', '$grpId', '$secId', '$cardNo')";

        $dataArray = array();

        $STH = $this->DBH->prepare($sqlQuery); //for data insert into database we have to use prepare//
        $result = $STH->execute($dataArray);

        if($result){
            Message::message("Success! data has been inserted.");
        }
        else{
            Message::message("Error! data has not been inserted.");
        }

    }//end of singleStorePromotion()

    public function singleStudentPromotion(){
        $yr = $this->yr;
        $sId = $this->sId;
        $curYr= date("Y");
        $amount = $this->amount;
        $discountFee = $this->discountFee;
        $cId = $this->cId;
        $roll = $this->roll;
        $grpId = $this->grpId;
        $secId = $this->secId;
        $cardNo = $this->cardNo;

        $sqlQuery = "INSERT INTO `student_promotion`(`created_at`, `yr`, `amount`, `discount_fee`, `s_id`, `c_id`, `roll`, `grp_id`, `section_id`, `card_no`)
                SELECT NOW(), '$curYr', '$amount', '$discountFee', '$sId', '$cId', '$roll', '$grpId', '$secId', '$cardNo' FROM DUAL
                WHERE NOT EXISTS
                (SELECT s_id FROM `student_promotion` WHERE s_id='$sId' AND yr='$curYr' AND c_id='$cId')";
        $dataArray = array();

        $STH = $this->DBH->prepare($sqlQuery); //for data insert into database we have to use prepare//
        $result = $STH->execute($dataArray);

        $rowCount = $STH->rowCount();

        if($result) {
            if ($rowCount > 0) {
                Message::message("Success! data has been inserted.");
            } else {
                Message::message("Please! change the information.");
            }
        } else {
            Message::message("Error! data has not been inserted.");
        }

    }//end of singleStudentPromotion()

    public function index(){
        $sqlQuery = "SELECT * FROM `student_info` where `is_trashed`='No'";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of index()

    public function clsWiseStudentList(){
        $yr = date('Y');
        $sqlQuery = "SELECT a.*,c.c_name,m.tuition_fee,g.group_name,s.sec_name,(m.tuition_fee-a.discount_fee) AS net_tuition_fee
                    FROM (
                        SELECT p.id,f.id AS s_id,f.name,f.f_name,f.f_ocp,f.m_name,f.m_ocp,f.gender,f.religion,f.gur_mobile,f.std_mobile,f.std_email,f.dob,p.created_at,p.yr,p.amount,p.discount_fee,p.c_id,p.roll,p.grp_id,p.section_id,p.card_no FROM `student_info` f
                        LEFT JOIN `student_promotion` p ON p.s_id=f.id
                        WHERE p.is_trashed='No'
                    ) a
                    LEFT JOIN `class` c ON c.c_id=a.c_id
                    LEFT JOIN `class_payment` m ON (m.c_id=a.c_id AND m.grp_id=a.grp_id)
                    LEFT JOIN `grp` g ON g.id=a.grp_id
                    LEFT JOIN `section` s ON s.id=a.section_id
                    WHERE a.yr=$yr AND a.c_id =$this->cId
                    ORDER BY a.section_id,a.roll";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of view()

    public function viewCurrentYearStudent(){
        $sqlQuery = "SELECT * FROM `v_current_year_student`";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of viewCurrentYearStudent()

    public function singleStudent(){
        $yr = date('Y');
/*       $sqlQuery = "SELECT a.*,c.c_name,g.group_name,s.sec_name
                    FROM (
                        SELECT f.id,f.name,f.f_name,f.f_ocp,f.m_name,f.m_ocp,f.gender,f.religion,f.nationality,f.gur_name,f.gur_ocp,f.gur_mobile,f.std_mobile,f.std_email,f.dob,f.pr_vill,f.pr_po,f.pr_ps,f.pr_dist,f.pm_vill,f.pm_po,f.pm_ps,f.pm_dist,p.created_at,p.yr,p.amount,p.discount_fee,p.c_id,p.roll,p.grp_id,p.section_id,p.card_no FROM `student_info` f
                        LEFT JOIN `student_promotion` p ON p.s_id=f.id
                        WHERE p.is_trashed='No'
                    ) a
                    LEFT JOIN `class` c ON c.c_id=a.c_id
                    LEFT JOIN `grp` g ON g.id=a.grp_id
                    LEFT JOIN `section` s ON s.id=a.section_id
                    WHERE a.yr =$yr AND a.id =$this->id";*/
                    
                    
               $sqlQuery = "SELECT a.*,c.c_name,m.tuition_fee,g.group_name,s.sec_name,(m.tuition_fee-a.discount_fee) AS net_tuition_fee
                    FROM (
                        SELECT p.id,f.id AS s_id,f.name,f.f_name,f.f_ocp,f.m_name,f.m_ocp,f.gender,f.religion,f.gur_mobile,f.std_mobile,f.std_email,f.dob,p.created_at,p.yr,p.amount,p.discount_fee,p.c_id,p.roll,p.grp_id,p.section_id,p.card_no FROM `student_info` f
                        LEFT JOIN `student_promotion` p ON p.s_id=f.id
                        WHERE p.is_trashed='No' AND p.yr = $yr
                    ) a
                    LEFT JOIN `class` c ON c.c_id=a.c_id
                    LEFT JOIN `class_payment` m ON (m.c_id=a.c_id AND m.grp_id=a.grp_id)
                    LEFT JOIN `grp` g ON g.id=a.grp_id
                    LEFT JOIN `section` s ON s.id=a.section_id
                    WHERE a.s_id = $this->id";

                    
        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();

        return $singleData;
    }//end of view()
    
      public function singleStudentSalary(){
        $yr = date('Y');
               $sqlQuery = "SELECT a.*,c.c_name,m.tuition_fee,(m.tuition_fee-a.discount_fee) AS net_tuition_fee
                    FROM (
                        SELECT p.id,f.id AS s_id,f.name,p.yr,p.discount_fee,p.grp_id,p.c_id FROM `student_info` f
                        LEFT JOIN `student_promotion` p ON p.s_id=f.id
                        WHERE p.is_trashed='No'
                    ) a
                    LEFT JOIN `class` c ON c.c_id=a.c_id
                    LEFT JOIN `class_payment` m ON (m.c_id=a.c_id AND m.grp_id=a.grp_id)
                    WHERE a.yr =$yr AND a.s_id =$this->sId";

                    
        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();

        return $singleData;
    }//end of view()

    public function updateAdmission(){
        // this information is for student admission
        $name = $this->name;
        $fName = $this->fName;
        $fOcp = $this->fOcp;
        $mName = $this->mName;
        $mOcp = $this->mOcp;
        $gender = $this->gender;
        $religion = $this->religion;
        $nationality = $this->nationality;
        $gurName = $this->gurName;
        $gurOcp = $this->gurOcp;
        $gurMobile = $this->gurMobile;
        $stdMobile = $this->stdMobile;
        $stdEmail = $this->stdEmail;
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

        $objFirstKey = new \App\firstKey\firstKey();
        $firstKeyReligion = $objFirstKey->firstKeyWord($religion);
        $firstKeyGender = $objFirstKey->firstKeyWord($gender);
        
        if ($name=='') {
            Message::message("Field Must Not Be Empty");
        }else{
            $sqlQuery = "UPDATE `student_info` SET `name`= ?,`f_name`= ?,`f_ocp`= ?,`m_name`= ?,`m_ocp`= ?,`gender`= ?,`religion`= ?,`nationality`= ?, `gur_name`= ?,`gur_ocp`= ?,`gur_mobile`= ?,`std_mobile`= ?,`std_email`=?,`dob`= ?,`pr_vill`= ?,`pr_po`= ?,`pr_ps`= ?,`pr_dist`= ?,`pm_vill`= ?,`pm_po`= ?,`pm_ps`= ?,`pm_dist`= ?,`card_no`=? WHERE id = $this->id";
            $dataArray = array($name, $fName, $fOcp, $mName, $mOcp, $firstKeyGender, $firstKeyReligion, $nationality, $gurName, $gurOcp, $gurMobile, $stdMobile, $stdEmail, $dob, $prVill, $prPo, $prPs, $prDist, $pmVill, $pmPo, $pmPs, $pmDist, $cardNo);

            $STH = $this->DBH->prepare($sqlQuery);
            $result = $STH->execute($dataArray);

            if($result){
                Message::message("Success! data has been updated.");
            }
            else{
                Message::message("Error! data has not been updated.");
            }
        }
    }// end of update()

    public function updatePromotion(){
        // this information is for student promotion
        $yr = $this->yr;
        $cId = $this->cId;
        $roll = $this->roll;
        $grpId = $this->grpId;
        $secId = $this->secId;
        $amount = $this->amount;
        $discountFee = $this->discountFee;
        $cardNo = $this->cardNo;

        if ($cId=='') {
            Message::message("Field Must Not Be Empty");
        }else{
            $sqlQuery = "UPDATE `student_promotion` SET `c_id`=?,`roll`=?,`grp_id`=?,`section_id`=?,`amount`=?,`discount_fee`=?,`card_no`=? WHERE yr = $yr AND s_id = $this->id";
            $dataArray = array($cId, $roll, $grpId, $secId, $amount, $discountFee, $cardNo);

            $STH = $this->DBH->prepare($sqlQuery);
            $STH->execute($dataArray);
            
            if(!isset($_FILES['file']) || $_FILES['file']['error'] == UPLOAD_ERR_NO_FILE) {
                
            } else {    
                if(!isset($_SESSION)) session_start();
                $insPath=$_SESSION['insPath'];
                $fileExtension = explode(".", $_FILES["file"]["name"]);
                $newFileName = $this->id . '.' . end($fileExtension);
                
                $fileTempName = $_FILES["file"]["tmp_name"];
                $sizeSm = '../../../uploads/'.$insPath.'/student_image/sm/';
                $sizeMd = '../../../uploads/'.$insPath.'/student_image/md/';
                $sizeLg = '../../../uploads/'.$insPath.'/student_image/lg/';
                $sizeReal = '../../../uploads/'.$insPath.'/student_image/real/';
                
                if(move_uploaded_file($fileTempName, $sizeReal.$newFileName)) {
    
                   $resizeObj = new resizePhoto($sizeReal.$newFileName);
                   $resizeObj -> resizeImage(45, 45, 'exact');
                   $resizeObj -> saveImage($sizeSm.$newFileName, 100);
                   
                   $resizeObj1 = new resizePhoto($sizeReal.$newFileName);
                   $resizeObj1 -> resizeImage(88, 88, 'exact');
                   $resizeObj1 -> saveImage($sizeMd.$newFileName, 100);
                   
                   $resizeObj2 = new resizePhoto($sizeReal.$newFileName);
                   $resizeObj2 -> resizeImage(120, 120, 'exact');
                   $resizeObj2 -> saveImage($sizeLg.$newFileName, 100);
                   
                   unlink($sizeReal . $newFileName);
                }
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
            $sizeSm = '../../../uploads/'.$insPath.'/student_image/sm/' . $id;
            $sizeMd = '../../../uploads/'.$insPath.'/student_image/md/' . $id;
            $sizeLg = '../../../uploads/'.$insPath.'/student_image/lg/' . $id;
            
            if (file_exists($sizeSm)) { unlink($sizeSm); }
            if (file_exists($sizeMd)) { unlink($sizeMd); }
            if (file_exists($sizeLg)) { unlink($sizeLg); }
            Message::message("Success! data has been deleted.");
        }
        else{
            Message::message("Error! data has not been deleted.");

        }
    }// end of delete()

}//end of studentInfo Class