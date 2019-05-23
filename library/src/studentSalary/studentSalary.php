<?php
namespace App\studentSalary;
use PDO;
use App\Model\Database;
use App\Message\Message;

class studentSalary extends Database{
    public $id;
    public $sId;
    public $cId;
    public $grpId;
    public $user;
    public $monthId;
    public $yr;
    public $amount;
    public $total;
    public $discount;
    public $remarks;
    public $month;
    public $createdAt;
    public $updatedAt;
    public $takeAmount;

    public function setData($receieveDataArray){

        //here id further use for retrive data from database:
        if(array_key_exists("id",$receieveDataArray)){
            $this->id = $receieveDataArray['id'];
        }
        if(array_key_exists("sId",$receieveDataArray)){
            $this->sId = $receieveDataArray['sId'];
        }
        if(array_key_exists("cId",$receieveDataArray)){
            $this->cId = $receieveDataArray['cId'];
        }
        if(array_key_exists("grpId",$receieveDataArray)){
            $this->grpId = $receieveDataArray['grpId'];
        }
        if(array_key_exists("user",$receieveDataArray)){
            $this->user = $receieveDataArray['user'];
        }
        if(array_key_exists("monthId",$receieveDataArray)){
            $this->monthId = $receieveDataArray['monthId'];
        }
        if(array_key_exists("yr",$receieveDataArray)){
            $this->yr = $receieveDataArray['yr'];
        }
        if(array_key_exists("amount",$receieveDataArray)){
            $this->amount = $receieveDataArray['amount'];
        }
        if(array_key_exists("takeAmount",$receieveDataArray)){
            $this->takeAmount = $receieveDataArray['takeAmount'];
        }
		if(array_key_exists("total",$receieveDataArray)){
            $this->total = $receieveDataArray['total'];
        }
        if(array_key_exists("discount",$receieveDataArray)){
            $this->discount = $receieveDataArray['discount'];
        }
        if(array_key_exists("remarks",$receieveDataArray)){
            $this->remarks = $receieveDataArray['remarks'];
        }
        if(array_key_exists("createdAt",$receieveDataArray)){
            $this->createdAt = $receieveDataArray['createdAt'];
        }
        if(array_key_exists("updatedAt",$receieveDataArray)){
            $this->updatedAt = $receieveDataArray['updatedAt'];
        }
        if(array_key_exists("month",$receieveDataArray)){
            //Adding each value of checkbox in an string type variable:
            $monthArray = $receieveDataArray['month'];
            $chooseString = implode(",",$monthArray);
            $this->month = $chooseString;
        }

    }//end of setData()

    public function store(){
        
        $currentYear = date('Y');
        
        if ($this->month==''|| $this->sId=='' || $this->amount=='' || $this->total=='') {
            Message::message("Field Must Not Be Empty");
        } else {
            if(!isset($_SESSION)) session_start();
            $userId=$_SESSION['userId'];
            $createdAt =  date('Y-m-d', strtotime($this->createdAt));
            $sqlQuery = "INSERT INTO `student_salary` (s_id, month_id, amount, total,discount_fee, issued_by, created_at, remarks, user_id, yr) VALUES (?, ?, ?, ?, ?, ?, CusNow(), ?, ?, $currentYear)";
            $dataArray = array($this->sId, $this->month, $this->amount, $this->total,  $this->discount, $userId, $this->remarks, $this->user);
            $STH = $this->DBH->prepare($sqlQuery); //for data insert into database we have to use prepare//
            $result = $STH->execute($dataArray);
     
            if($result){
                Message::message("Success! data has been inserted.");
              // echo "Success! data has been inserted";
            }
            else{
                Message::message("Error! data has not been inserted.");
              // echo "Error! data has not been inserted";
            }
        }
    }//end of store() 

    public function takePayment(){
        if ($this->amount==''|| $this->id=='') {
            Message::message("Field Must Not Be Empty");
        }
        else{
            $takeAmount = $this->takeAmount;
            $setAmount = $this->amount+$takeAmount;
            if( $this->total>=$setAmount){
                $sqlQuery = "UPDATE student_salary SET amount = ?, updated_at = now(), user_id = '$this->user' WHERE id = $this->id;";
                $dataArray = array($setAmount);
                $STH = $this->DBH->prepare($sqlQuery);
                $result = $STH->execute($dataArray);
                if($result){
                    
                    $sqlQuery2 = "INSERT INTO due_collection(sal_id,due_amount,updated_at,issued_by) VALUES (?,?,now(),?)";
                    $dataArray2 = array($this->id,$takeAmount,$this->user);
                    $STH2 = $this->DBH->prepare($sqlQuery2);
                    $result2 = $STH2->execute($dataArray2);
                        
                    Message::message("Success! Data has been Updated.");
                }
                else{
                    Message::message("Error! Data has not been Updated.");
                }
            }
            else{ Message::message("Sorry! Please Check Amount.");}
        }
    }// end of takePayment()

    public function update(){
        if ($this->amount==''|| $this->id=='') {
            Message::message("Field Must Not Be Empty");
        }
        else{
//            $setAmount = $this->amount+$this->takeAmount;
            if( $this->total>=$this->amount){
                $sqlQuery = "UPDATE student_salary SET amount = ?, total = ?, updated_at = now(), remarks = ?, month_id=?, user_id = '$this->user' WHERE id = $this->id;";
                $dataArray = array($this->amount,$this->total,$this->remarks,$this->month);
                $STH = $this->DBH->prepare($sqlQuery);
                $result = $STH->execute($dataArray);
                if($result){
                    Message::message("Success! Data has been Updated.");
                }
                else{
                    Message::message("Error! Data has not been Updated.");
                }
            }
            else{ Message::message("Sorry! Please Check Amount.");}
        }
    }// end of update()

    public function index(){
        $sqlQuery = "SELECT y.id , y.s_id, f.name, y.amount, y.total, y.due, y.discount_fee, y.issued_by, y.created_at, y.remarks, u.id as user, u.name AS user_name
					FROM  `student_salary` y
					LEFT JOIN student_info f ON y.s_id=f.id
                    LEFT JOIN users u ON y.user_id=u.id
                    where y.total!=0
                    ORDER BY y.id DESC";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of index()
    
    
    
        public function paymentHistory($sId){
            
                $sqlQuery = "SELECT y.id , y.s_id, f.name, y.amount, y.total, y.due, y.created_at, y.remarks, y.issued_by, u.id as user, u.name AS user_name
					FROM  `student_salary` y
					LEFT JOIN student_info f ON y.s_id=f.id
                    LEFT JOIN users u ON y.user_id=u.id
                    where (y.total!=0) and (y.s_id ='$sId') order by y.id desc"; 
        
        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of index()
    
    

    public function view(){
        $sqlQuery = "SELECT i.id, i.s_id,s.name, i.amount,i.month_id, i.total, i.due,  i.created_at, i.remarks
FROM  `student_salary` i, student_info s where i.s_id = s.id and i.id= $this->id";
//echo $sqlQuery;
        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();

        return $singleData;
    }//end of view()

    public function StdWiseSummaryView(){
        $sqlQuery = "SELECT i.id, i.s_id,s.name, i.amount,i.month_id, i.total, i.due,  i.created_at, i.remarks
FROM  `student_salary` i, student_info s where i.s_id = s.id and s.id= $this->sId and i.yr= $this->yr and i.total!=0";
//echo $sqlQuery;
        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;
    }//end of view()

    public function monthName(){
        $sqlQueryA = "SELECT month_id FROM `student_salary` where id =$this->id";
        $STHA = $this->DBH->query($sqlQueryA);
        $STHA->setFetchMode(PDO::FETCH_OBJ);
        $singleDataA = $STHA->fetch();
        $monthArray = $singleDataA->month_id;

        $sqlQuery = "SELECT GROUP_CONCAT(m.month_name SEPARATOR ' + ') AS month_name FROM ( SELECT month_name FROM month WHERE id IN ($monthArray) ) m";
       // echo $sqlQuery;
        $STH = $this->DBH->query($sqlQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $monthNameData = $STH->fetch();
        return $monthNameData;
    }//end of view()

    public function monthlySingleStudent(){
        
        $sqlQuery = "SELECT id, s_id, GROUP_CONCAT( CONCAT( `month_id` ) SEPARATOR ',' ) AS month FROM student_salary where s_id= $this->sId and yr = $this->yr GROUP BY s_id";

        /*$sqlQuery = "SELECT id, s_id, GROUP_CONCAT( CONCAT(  `month_id` )
        SEPARATOR  ',' ) AS
        month
        FROM student_salary
        GROUP BY s_id HAVING s_id= $this->sId";
        */
        
        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleStdsalaryData = $STH->fetch();

        return $singleStdsalaryData;
    }//end of monthSingleStudent()



    public function monthlyAllStudent(){
        $sqlQuery = "SELECT id, s_id, GROUP_CONCAT( CONCAT(  `month_id` )
        SEPARATOR  ',' ) AS
        MONTH
        FROM student_salary
        GROUP BY s_id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allStdSalaryData = $STH->fetch();

        return $allStdSalaryData;
    }//end of monthAllStudent()
/*
    public function paymentList(){
        $array1 = array("a" => "1", "2", "3", "4", "5","6", "7", "8", "9", "10");
        $array2 = array("b" => "3", "2", "5");
        $result = array_diff($array1, $array2);
        $serial=0;

        echo "total_array = ";
        foreach ($result as $key => $val) {
           print "$val,\n";
            $serial++;
        }

        echo 'month= '.$serial;

        //$result = count(explode(',',$array4));
        //echo "count = ".$result;

    }//end of monthAllStudent()*/


    public function stdTotalPayList(){
        $sqlQueryA = "SELECT f.month_id,(f.len_total-LENGTH(f.len))+1 AS total_month FROM
                        (
                            SELECT m.month_id,LENGTH(m.month_id) AS len_total,REPLACE(m.month_id, ',', '') AS len FROM
                            (
                                SELECT GROUP_CONCAT(id SEPARATOR ',') as month_id FROM month WHERE id<='$this->monthId'
                            ) m
                        ) f";
        $STHA = $this->DBH->query($sqlQueryA);
        $STHA->setFetchMode(PDO::FETCH_OBJ);
        $singleDataA = $STHA->fetch();
        $totalMonth= $singleDataA->total_month;

        $sqlQuery = "SELECT t.s_id,t.s_name,t.yr,t.month_id,t.amount,t.c_id,t.c_name,t.roll,t.sec_id,t.sec_name,t.grp_id,t.group_name,t.discount_fee,t.tuition_fee,t.net_tuition_fee,(t.net_tuition_fee*'$totalMonth') AS net_total_fee,(t.net_tuition_fee*'$totalMonth')-t.amount AS net_due_fee FROM
                    (
                        SELECT g.s_id,g.s_name,g.yr,g.month_id,g.amount,g.total,g.due,c.c_id,c.c_name,g.roll,n.id AS sec_id,n.sec_name,gr.id AS grp_id,gr.group_name,g.discount_fee,cp.tuition_fee,(cp.tuition_fee-g.discount_fee) AS net_tuition_fee FROM
                        (
                        SELECT f.*,i.name AS s_name,p.c_id,p.roll,p.section_id,p.grp_id,p.discount_fee
                        FROM (
                            SELECT s_id,yr,GROUP_CONCAT(month_id SEPARATOR ',') AS month_id, SUM(amount) AS amount,SUM(total) AS total,SUM(due) AS due FROM `student_salary`
                            GROUP BY s_id,yr
                            ) f
                            LEFT JOIN student_promotion p ON (f.s_id=p.s_id AND f.yr=p.yr)
                            LEFT JOIN student_info i ON i.id=f.s_id
                        ) g LEFT JOIN class c ON g.c_id=c.c_id
                            LEFT JOIN section n ON n.id=g.section_id
                            LEFT JOIN grp gr ON gr.id=g.grp_id
							LEFT JOIN class_payment cp ON (cp.c_id=g.c_id AND cp.grp_id=g.grp_id)
                    ) t WHERE t.yr='$this->yr' AND t.c_id='$this->cId' AND t.grp_id='$this->grpId'
                        ORDER BY t.sec_id,t.grp_id,t.roll";
        // echo $sqlQuery;
        $STH = $this->DBH->query($sqlQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $stdTotalPayListData = $STH->fetchAll();
        return $stdTotalPayListData;
    }//end of view()

   
       public function singleStdTotalPayList(){
        $sqlQueryA = "SELECT f.month_id,(f.len_total-LENGTH(f.len))+1 AS total_month FROM
                        (
                            SELECT m.month_id,LENGTH(m.month_id) AS len_total,REPLACE(m.month_id, ',', '') AS len FROM
                            (
                                SELECT GROUP_CONCAT(id SEPARATOR ',') as month_id FROM month WHERE id<='$this->monthId'
                            ) m
                        ) f";
        $STHA = $this->DBH->query($sqlQueryA);
        $STHA->setFetchMode(PDO::FETCH_OBJ);
        $singleDataA = $STHA->fetch();
        $totalMonth= $singleDataA->total_month; 

        $sqlQuery = "SELECT t.s_id,t.s_name,t.yr,t.month_id,t.amount,t.c_id,t.c_name,t.roll,t.sec_id,t.sec_name,t.grp_id,t.group_name,t.discount_fee,t.tuition_fee,t.net_tuition_fee,(t.net_tuition_fee*'$totalMonth') AS net_total_fee,(t.net_tuition_fee*'$totalMonth')-t.amount AS net_due_fee FROM
                    (
                        SELECT g.s_id,g.s_name,g.yr,g.month_id,g.amount,g.total,g.due,c.c_id,c.c_name,g.roll,n.id AS sec_id,n.sec_name,gr.id AS grp_id,gr.group_name,g.discount_fee,cp.tuition_fee,(cp.tuition_fee-g.discount_fee) AS net_tuition_fee FROM
                        (
                        SELECT f.*,i.name AS s_name,p.c_id,p.roll,p.section_id,p.grp_id,p.discount_fee
                        FROM (
                            SELECT s_id,yr,GROUP_CONCAT(month_id SEPARATOR ',') AS month_id, SUM(amount) AS amount,SUM(total) AS total,SUM(due) AS due FROM `student_salary`
                            GROUP BY s_id,yr
                            ) f
                            LEFT JOIN student_promotion p ON (f.s_id=p.s_id AND f.yr=p.yr)
                            LEFT JOIN student_info i ON i.id=f.s_id
                        ) g LEFT JOIN class c ON g.c_id=c.c_id
                            LEFT JOIN section n ON n.id=g.section_id
                            LEFT JOIN grp gr ON gr.id=g.grp_id
							LEFT JOIN class_payment cp ON (cp.c_id=g.c_id AND cp.grp_id=g.grp_id)
                    ) t WHERE t.yr='$this->yr' and t.s_id=$this->sId
                        ORDER BY t.sec_id,t.grp_id,t.roll";
        // echo $sqlQuery;
        $STH = $this->DBH->query($sqlQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $stdTotalPayListData = $STH->fetch();
        return $stdTotalPayListData;
    }//end of view()

  public function setStudentForCalculationDue()
    {
        $sqlQuery = "INSERT INTO `student_salary` (s_id,month_id,created_at,yr,user_id)
select DISTINCT i.id,0 AS month_id,now(),'$this->yr' AS yr,1 AS user_id
   from student_info i
   LEFT join student_salary s
   on s.s_id = i.id
   where s.s_id is null";
        $dataArray = array();
        $STH = $this->DBH->prepare($sqlQuery); //for data insert into database we have to use prepare//
        $STH->execute($dataArray);
    } //end setStudentForCalculationDue

}//end of BookTitle Class