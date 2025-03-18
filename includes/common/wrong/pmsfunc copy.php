<?php

/**
 * Class to handle all salesforce operations
 *  
 */
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

class sfhandler
{
    private $conn;
    public function __construct()
    {
        try {
            require_once dirname(__FILE__) . '/config.php';
            $this->conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException  $e) {
            echo "Error Connecting Host :" . $e->getMessage();
        } catch (Exception  $e) {
            echo $e->getMessage();
        }
    }

    public function sfAuth()
    {
        try {
            /* Get Config */
            $config_qry = "SELECT * from tbl_pms_config where config_id = 1";
            $config_res = $this->conn->query($config_qry);
            if ($config_res->rowCount() > 0) {
                $obj = $config_res->fetch(PDO::FETCH_OBJ);
            }

            // $config_qry1 = "SELECT * from tbl_url_settings where url_id = 1";
            // $config_res1 = $this->conn->query($config_qry1);
            // if ($config_res1->rowCount() > 0) {
                // $obj1 = $config_res1->fetch(PDO::FETCH_OBJ);
                // $date =  date('Y-m-d H:i:s');

                // if (($obj1->pms_token != '') && (strtotime($date) <= strtotime(($obj1->updated_dtm . '+ 30 minutes'))) && ($obj1->updated_dtm != '')) {
                //     return $response = json_decode($obj1->pms_token, true);
                // } else {
                    $params =
                        "grant_type=password"
                        . "&client_id=" . $obj->consumer_key
                        . "&client_secret=" . $obj->consumer_secret
                        . "&username=" . $obj->login_username
                        . "&password=" . $obj->login_password;

                    $curl = curl_init($obj->login_url);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_POST, true);
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
                    $json_response = curl_exec($curl);
                    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                    if ($status != 200) {
                        $_SESSION['_msg_err'] = $status . $json_response;
                        header("location:error_connection");
                        die;
                        //die("Error: call to token URL $token_url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
                    }
                    curl_close($curl);
                    return $response = json_decode($json_response, true);
                // }
            // }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }



    function update_inventory($instance_url, $access_token, $sf_exp_data)
    {
        $url = $instance_url . "/test?_HttpMethod=PATCH";
        $content = json_encode($sf_exp_data);
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Bearer $access_token", "Content-type: application/json"));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

        $json_response = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        // curl_close($curl);
        if ($status != 200) {
            die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
            $res = "error";
        } else {
            curl_close($curl);
            $res = "success";
        }
        return $res;
    }
}
