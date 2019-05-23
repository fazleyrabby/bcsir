<?php
namespace App\commonCode;
use PDO;
class commonCode {
    public function addOrdinalNumberSuffix($num) {
    	if (!in_array(($num % 100),array(11,12,13))){
    		switch ($num % 10) {
    			// Handle 1st, 2nd, 3rd
    			case 1:  return $num.'st';
    			case 2:  return $num.'nd';
    			case 3:  return $num.'rd';
    		}
    	}
    	if($num==0 || $num=="")$num = "";
    	else $num = $num.'th';
    	return $num;
    }
    public function firstKeyWord($keyInput){
    	$firstKeyOutput = substr(strtoupper($keyInput), 0, 1);
    	return $firstKeyOutput;
    }
    public function gradeAverage($inputValue){
        if($inputValue>=5) $outputValue="A+";
        elseif($inputValue>=4) $outputValue="A";
        elseif($inputValue>=3.5) $outputValue="A-";
        elseif($inputValue>=3) $outputValue="B";
        elseif($inputValue>=2) $outputValue="C";
        elseif($inputValue>=1) $outputValue="D";
        elseif($inputValue==0 || $inputValue==0.00) $outputValue="F";
        else $gradeAverage="F";
    	return $outputValue;
    }
    public function gradeLetter($totalMarks,$fullMarks){
        if($fullMarks==100){
            if($totalMarks>=80) $outputValue="A+";
            elseif($totalMarks>=70) $outputValue="A";
            elseif($totalMarks>=60) $outputValue="A-";
            elseif($totalMarks>=50) $outputValue="B";
            elseif($totalMarks>=40) $outputValue="C";
            // elseif($totalMarks>=33) $outputValue="D";
            else $gradeAverage="F";
        } else {
            if($totalMarks>=40) $outputValue="A+";
            elseif($totalMarks>=35) $outputValue="A";
            elseif($totalMarks>=30) $outputValue="A-";
            elseif($totalMarks>=25) $outputValue="B";
            elseif($totalMarks>=20) $outputValue="C";
            // elseif($totalMarks>=17) $outputValue="D";
            else $gradeAverage="F";
        }
    	return $outputValue;
    }
    public function gradePoint($totalMarks,$fullMarks){
        if($fullMarks==100){
            if($totalMarks>=80) $outputValue=5.00;
            elseif($totalMarks>=70) $outputValue=4.00;
            elseif($totalMarks>=60) $outputValue=3.50;
            elseif($totalMarks>=50) $outputValue=3.00;
            elseif($totalMarks>=40) $outputValue=2.00;
            // elseif($totalMarks>=33) $outputValue=1.00;
            else $gradeAverage=0.00;
        } else {
            if($totalMarks>=40) $outputValue=5.00;
            elseif($totalMarks>=35) $outputValue=4.00;
            elseif($totalMarks>=30) $outputValue=3.50;
            elseif($totalMarks>=25) $outputValue=3.00;
            elseif($totalMarks>=20) $outputValue=2.00;
            // elseif($totalMarks>=17) $outputValue=1.00;
            else $gradeAverage=0.00;
        }
    	return $outputValue;
    }
    public function gradeLetter2($totalMarks,$fullMarks){
        if($fullMarks==100){
            if($totalMarks>=80) $outputValue="A+";
            elseif($totalMarks>=70) $outputValue="A";
            elseif($totalMarks>=60) $outputValue="A-";
            elseif($totalMarks>=50) $outputValue="B";
            elseif($totalMarks>=40) $outputValue="C";
            elseif($totalMarks>=33) $outputValue="D";
            else $gradeAverage="F";
        } else {
            if($totalMarks>=40) $outputValue="A+";
            elseif($totalMarks>=35) $outputValue="A";
            elseif($totalMarks>=30) $outputValue="A-";
            elseif($totalMarks>=25) $outputValue="B";
            elseif($totalMarks>=20) $outputValue="C";
            elseif($totalMarks>=17) $outputValue="D";
            else $gradeAverage="F";
        }
    	return $outputValue;
    }
    public function gradePoint2($totalMarks,$fullMarks){
        if($fullMarks==100){
            if($totalMarks>=80) $outputValue=5.00;
            elseif($totalMarks>=70) $outputValue=4.00;
            elseif($totalMarks>=60) $outputValue=3.50;
            elseif($totalMarks>=50) $outputValue=3.00;
            elseif($totalMarks>=40) $outputValue=2.00;
            elseif($totalMarks>=33) $outputValue=1.00;
            else $gradeAverage=0.00;
        } else {
            if($totalMarks>=40) $outputValue=5.00;
            elseif($totalMarks>=35) $outputValue=4.00;
            elseif($totalMarks>=30) $outputValue=3.50;
            elseif($totalMarks>=25) $outputValue=3.00;
            elseif($totalMarks>=20) $outputValue=2.00;
            elseif($totalMarks>=17) $outputValue=1.00;
            else $gradeAverage=0.00;
        }
    	return $outputValue;
    }
    public function resultStatus($inputValue){
        if($inputValue>=5) $outputValue="Excellent";
        elseif($inputValue>=4) $outputValue="Very Good";
        elseif($inputValue>=3.5) $outputValue="Good";
        elseif($inputValue>=3) $outputValue="Try More";
        elseif($inputValue>=2) $outputValue="Practise Again and Again";
        elseif($inputValue>=1) $outputValue="Not Improved";
        elseif($inputValue==0 || $inputValue==0.00) $outputValue="Sorry! Try Again";
        else $gradeAverage="Sorry! Try Again";
    	return $outputValue;
    }
}//end of commonCode class