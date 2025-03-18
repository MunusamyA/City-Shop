<?php


ob_start();
session_start();
define ("BASEPATH","./");

require_once(BASEPATH ."../common/userclass.php");
	
	
$conn = new dbconnect();	
$dbconn= new dbhandler();
	// ini_set('display_errors', '1');
	// ini_set('display_startup_errors', '1');
	// error_reporting(E_ALL);

if((isset($_REQUEST['mode'])) && $_REQUEST['mode'] == 'CHECK_USER_NAME'){
    try{
       $user_name = $_REQUEST['user_name'];

       $data = $conn->query("SELECT usr_logname , rec_del_status FROM tbl_user WHERE usr_logname = '".$user_name."' AND rec_del_status = 0"); 
       $count = $data->rowCount();
        // echo $count;
       if($count > 0){
        echo'1';
       }else{
        echo'0';
       }

    } catch (Exception $e) {
        $str = filter_var($e->getMessage(), FILTER_SANITIZE_STRING);
        echo $_SESSION['msg_err'] = $str;  
    }
}



?>