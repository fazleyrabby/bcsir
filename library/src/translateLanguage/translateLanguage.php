<?php
namespace App\translateLanguage;
use PDO;
/*
 * Example of Use:
 *
 * $tcObj = new banglaDate(); *
 * $output = $tcObj->get_date("d M, Y"); * or
 * $output = $tcObj->translate("10 October, 1983"); * 
 * echo $output;
 */
class translateLanguage {
 
    public function __construct() {}
	

    /**
     * get_date function get the date format to pass the string date to the translate() function
     *
     * @param string $dt_frmt
     * @return string
     */
    function get_date( $dt_frmt='', $str_date='' ) {
        if ( !$dt_frmt || empty($dt_frmt) ) {
            $dt_frmt = "d F, Y";
        }
		if( empty($str_date) )
			return $this->translate( date($dt_frmt) );
		else {
			$var_strtotime = strtotime($str_date);
			
			if( is_numeric($var_strtotime) )
				return $this->translate( date($dt_frmt, $var_strtotime) );
			else
				return "";
		}
    }
	
	

    /**
     * translate function used to translate the string date
     *
     * @param string $str
     * @return string
     */
    function translate( $str ) {
        if ( !$str ) {
            return;
        }
 
        $str = $this->translate_number( $str );
        $str = $this->translate_day( $str );
        $str = $this->translate_am( $str );
 
        return $str;
    }



    /**
     * Translate numbers only
     *
     * @param string $str
     * @return string
     */
    function translate_number( $str ) {
        $en = array( 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 );
        $bn = array( '০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯' );
 
        $str = str_replace( $en, $bn, $str );
 
        return $str;
    }
 
    /**
     * Translate months only
     *
     * @param string $str
     * @return string
     */
    function translate_day( $str ) {
        $en = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
        $en_short = array( 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' );
        $bn = array( 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতি','শুক্রবার');
 
        $str = str_replace( $en, $bn, $str );
        $str = str_replace( $en_short, $bn, $str );
 
        return $str;
    }
 
    /**
     * Translate AM and PM
     *
     * @param string $str
     * @return string
     */
    function translate_am( $str ) {
        $en = array( 'am', 'pm' );
        $bn = array( 'পূর্বাহ্ন', 'অপরাহ্ন' );
 
        $str = str_replace( $en, $bn, $str );
 
        return $str;
    }
}