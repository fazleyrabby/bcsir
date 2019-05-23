<?php
namespace App\firstKey;
use PDO;

class firstKey {
  
    public function firstKeyWord($keyInput){
    	$firstKeyOutput = substr(strtoupper($keyInput), 0, 1);
    	return $firstKeyOutput;
    }

}//end of firstKey class