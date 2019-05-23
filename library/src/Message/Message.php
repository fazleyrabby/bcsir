<?php
    namespace App\Message;

    if(!isset($_SESSION)){
        session_start();
    }

class Message{
        public static function message($containMessage = null){
            if(is_null($containMessage)){
                $returnMessage = self::getMessage();
                return $returnMessage;
            }
            else{
                self::setMessege($containMessage);
            }
        }//end of message()

        public static function setMessege($message){
            $_SESSION['message'] = $message;
        }//end of setMessage()

        public static function getMessage(){
            if(isset($_SESSION['message'])){
                $returnMessage = $_SESSION['message'];
            }
            else{
                $returnMessage = '';
            }

            $_SESSION['message'] = "";

            return $returnMessage;
        }//end of getMessage()

}//end of Message class