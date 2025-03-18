<?php


ob_start();
session_start();
define ("BASEPATH","./");

require_once(BASEPATH ."../common/userclass.php");
	
	
$conn = new dbconnect();	
$dbconn= new dbhandler();
	ini_set('display_errors', '1');
	ini_set('display_startup_errors', '1');
	error_reporting(E_ALL);

if((isset($_REQUEST['mode'])) && $_REQUEST['mode'] == 'CUSTOMER_DETAILES_INSERT'){
    try{
        // $created_by = 1;
        $created_dt = date('Y-m-d H:i:s');

        

        $date = DateTime::createFromFormat('d F, Y', $_REQUEST['cus_dob']);
        $stmt = $conn->prepare("INSERT INTO tbl_customer (cus_first_name, cust_last_name, cus_dob, cus_mob_num, cus_email, cus_gender, cus_add, cus_city, cus_state, cus_pin_code, created_dtm) 
                                VALUES (:cus_first_name, :cust_last_name, :cus_dob, :cus_mob_num, :cus_email, :cus_gender, :cus_add, :cus_city, :cus_state, :cus_pin_code, :created_dtm)");
        $data = array(
            ":cus_first_name" => $_REQUEST['cus_first_name'],
            ":cust_last_name" => $_REQUEST['cust_last_name'],
            ":cus_dob" =>  $date->format('Y-m-d'),
            ":cus_mob_num" => $_REQUEST['cus_mob_num'],
            ":cus_email" => $_REQUEST['cus_email'],
            ":cus_gender" => $_REQUEST['cus_gender'],
            ":cus_add" => $_REQUEST['cus_add'],
            ":cus_city" => $_REQUEST['cus_city'],
            ":cus_state" => $_REQUEST['cus_state'],
            ":cus_pin_code" => $_REQUEST['cus_pin_code'],
            // ":created_by" => $created_by,
            ":created_dtm" => $created_dt
        );
        $stmt->execute($data);

        $login_id = $conn->lastInsertId();

        $user_name = $_REQUEST['cus_first_name']." ".$_REQUEST['cust_last_name'];

        $stmt1 = $conn->prepare("INSERT INTO tbl_user (usr_name, usr_type, mobile_no, email, usr_logname, usr_logpwd, hint_password, created_dtm) 
                                VALUES (:usr_name, :usr_type, :mobile_no, :email, :usr_logname, :usr_logpwd, :hint_password, :created_dtm)");
        $data1 = array(
            ":usr_name" => $user_name,
            ":usr_type" => 'C',
            ":mobile_no" => $_REQUEST['cus_mob_num'],
            ":email" =>  $_REQUEST['cus_email'],
            ":usr_logname" => $_REQUEST['cus_login_name'],
            ":usr_logpwd" => StandardHash($_REQUEST['cus_password']),
            ":hint_password" => $_REQUEST['cus_password'],
            ":created_dtm" => $created_dt
        );
        $stmt1->execute($data1);

        $_SESSION["msg"] = "Successfully Registered";
        echo'SUCCESS';

    } catch (Exception $e) {
        $str = filter_var($e->getMessage(), FILTER_SANITIZE_STRING);
        echo $_SESSION['msg_err'] = $str;  
    }
}

if((isset($_REQUEST['mode'])) && $_REQUEST['mode'] == 'SELLER_DETAILES_INSERT'){
    try{
        // $created_by = 1;
        $full_name = $_REQUEST['sell_first_name']."_".$_REQUEST['sell_last_name'];
        $path = "../../assets/images/sellers/seller_photos/";
        $filename = $_FILES["sell_photo"]["name"];
        $extension  = pathinfo( $_FILES["sell_photo"]["name"], PATHINFO_EXTENSION );
        $_REQUEST['sell_photo'] = trim($full_name)."_seller_image_".trim($_REQUEST["sell_login_name"]).'.'.$extension;
        move_uploaded_file($_FILES["sell_photo"]["tmp_name"], $path . $_REQUEST['sell_photo']);


        $path1 = "../../assets/images/sellers/seller_aadhar_photos/";
        $filename1 = $_FILES["sell_aadhar_photo"]["name"];
        $extension1  = pathinfo( $_FILES["sell_aadhar_photo"]["name"], PATHINFO_EXTENSION );
        $_REQUEST['sell_aadhar_photo'] = trim($full_name)."_seller_aadhar_image_".trim($_REQUEST["sell_login_name"]).'.'.$extension1;
        move_uploaded_file($_FILES["sell_aadhar_photo"]["tmp_name"], $path1 . $_REQUEST['sell_aadhar_photo']);


        $created_dt = date('Y-m-d H:i:s');

        $date = DateTime::createFromFormat('d F, Y', $_REQUEST['sell_dob']);
        $stmt = $conn->prepare("INSERT INTO mst_seller (sell_first_name, sell_last_name, sell_dob, sell_mob_num, sell_email, sell_gender, sell_add, sell_city, sell_state, sell_pin_code, sell_aadhar_no, sell_pan_no, sell_photo, sell_aadhar_photo, created_dtm) 
                                VALUES (:sell_first_name, :sell_last_name, :sell_dob, :sell_mob_num, :sell_email, :sell_gender, :sell_add, :sell_city, :sell_state, :sell_pin_code, :sell_aadhar_no, :sell_pan_no, :sell_photo, :sell_aadhar_photo, :created_dtm)");
        $data = array(
            ":sell_first_name" => $_REQUEST['sell_first_name'],
            ":sell_last_name" => $_REQUEST['sell_last_name'],
            ":sell_dob" =>  $date->format('Y-m-d'),
            ":sell_mob_num" => $_REQUEST['sell_mob_num'],
            ":sell_email" => $_REQUEST['sell_email'],
            ":sell_gender" => $_REQUEST['sell_gender'],
            ":sell_add" => $_REQUEST['sell_add'],
            ":sell_city" => $_REQUEST['sell_city'],
            ":sell_state" => $_REQUEST['sell_state'],
            ":sell_pin_code" => $_REQUEST['sell_pin_code'],
            ":sell_aadhar_no" => $_REQUEST['sell_aadhar_no'],
            ":sell_pan_no" => $_REQUEST['sell_pan_no'],
            ":sell_photo" => $_REQUEST['sell_photo'],
            ":sell_aadhar_photo" => $_REQUEST['sell_aadhar_photo'],
            // ":created_by" => $created_by,
            ":created_dtm" => $created_dt
        );
        $stmt->execute($data);

        $user_name = $_REQUEST['sell_first_name']." ".$_REQUEST['sell_last_name'];

        $stmt1 = $conn->prepare("INSERT INTO tbl_user (usr_name, usr_type, mobile_no, email, usr_logname, usr_logpwd, hint_password, created_dtm) 
                                VALUES (:usr_name, :usr_type, :mobile_no, :email, :usr_logname, :usr_logpwd, :hint_password, :created_dtm)");
        $data1 = array(
            ":usr_name" => $user_name,
            ":usr_type" => "S",
            ":mobile_no" => $_REQUEST['sell_mob_num'],
            ":email" =>  $_REQUEST['sell_email'],
            ":usr_logname" => $_REQUEST['sell_login_name'],
            ":usr_logpwd" => StandardHash($_REQUEST['sell_password']),
            ":hint_password" => $_REQUEST['sell_password'],
            // ":created_by" => $created_by,
            ":created_dtm" => $created_dt
        );
        $stmt1->execute($data1);
        $_SESSION["msg"] = "Successfully Registered";
        echo'SUCCESS';
    } catch (Exception $e) {
        $str = filter_var($e->getMessage(), FILTER_SANITIZE_STRING);
        echo $_SESSION['msg_err'] = $str;  
    }
}

?>