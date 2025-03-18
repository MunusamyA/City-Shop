<?php

require_once("inc/userclass.php");

$conn = new dbconnect();
$dbconn = new dbhandler();

class pmsfunc
{

    public function new_booking($StartFun, $EndFun, $InvTypeCodeFun, $bk_id)
    {
        $conn = new dbconnect();
        $dbconn = new dbhandler();


        $TimeStamp = (date('Ymd') . 'T' . date('H:i:s'));
        $EchoToken = date('Ymd') . 'kfl' . $bk_id;
        $MessagePassword = 'humminGBird!234'; //Avenues@123
        $ID = 'mukesh@digitaltekk.co.in'; //Resavenue Channel Manager
        $HotelName = 'La Palmera'; //La Palmera
        $HotelCode = '3159'; //3159
        $Start = date('Y-m-d', strtotime($StartFun));
        $End = date('Y-m-d', strtotime($EndFun . ' -1 day'));
        $Count = '0';
        $StopSell = 'False';
        $CloseOnArrival = 'False';
        $CloseOnDeparture = 'False';
        $CutOff = '1';

        $result = $conn->query("SELECT total_rooms,room_type_id FROM lapal_room_type WHERE room_type_id = " . $InvTypeCodeFun);
        $obj = $result->fetch();

        $nos = $obj->total_rooms;
        $check_in_date = date("Y-m-d H:i:s", strtotime($StartFun));
        $check_out_date = date("Y-m-d H:i:s", strtotime($EndFun));
        $arr_date = array();
        $period = new DatePeriod(new DateTime($check_in_date), new DateInterval('P1D'), new DateTime($check_out_date));
        foreach ($period as $key => $value) {
            $chk_dt =  $value->format('Y-m-d');

            $rooms_booked = $dbconn->GetSingleReconrd(
                "lapal_booking as a, lapal_booking_dets as b",
                "sum(no_of_rooms)",
                " b.booking_id = a.booking_id AND '" . $chk_dt . "' BETWEEN date(a.check_in_dtm) AND date(a.check_out_dtm) AND a.booking_status NOT IN (5,6) 
                AND b.amendment_status = 0 AND b.room_type_id",
                $obj->room_type_id
            );

            $today_out = $dbconn->GetSingleReconrd(
                "lapal_booking as a, lapal_booking_dets as b",
                "sum(no_of_rooms)",
                " b.booking_id = a.booking_id AND '" . $chk_dt . "' = date(a.check_out_dtm) AND b.booking_status NOT IN (5,6) 
                AND b.amendment_status = 0 AND b.room_type_id",
                $obj->room_type_id
            );

            $arr_date[] = $nos - $rooms_booked + $today_out;
        }
        $avail_rooms = min($arr_date);

        //$avail_rooms = $avail_rooms - 1;   
        /*  Deluxe Double	7919
            FAMILY ROOM A/C	7921
            Standard Twin Bed Non AC	7920
            Family Room Non A/C	7922

            1 	 	DD 	    Deluxe Double 	
            2 	 	STW 	Standard Twin Bed 
            3 	 	FR6 	Family Room Ac 	1 
            4 	 	FR5 	Family Room Non Ac
            5 	 	ST 	Standard
        */

        switch ($InvTypeCodeFun) {
            case 1:
                $avail_rooms = $avail_rooms - 1;
                $InvTypeCode = '7919'; //Deluxe Double - 
                break;
            case 2:
                $InvTypeCode = '7920'; //Standard Twin Bed Non AC
                break;
            case 3:
                $InvTypeCode = '7921'; //FAMILY ROOM A/C
                break;
            case 4:
                $InvTypeCode = '7922'; //Family Room Non A/C
                break;
        }

        $avail_rooms = ($avail_rooms > 0) ? $avail_rooms : 0;
        $Count = $avail_rooms;


        $postData = '<?xml version="1.0" encoding="UTF8"?>
                        <OTA_HotelInvCountNotifRQ Version="" Target="Production"
                            TimeStamp="' . $TimeStamp . '" EchoToken="' . $EchoToken . '"
                            xmlns="http://www.opentravel.org/OTA/2003/05"
                            xmlns:xsd="http://www.w3.org/2001/XMLSchema"
                            xmlns:xsi="http://www.w3.org/2001/XMLSchemainstance">
                            <POS>
                                <Source>
                                    <RequestorID MessagePassword="' . $MessagePassword . '" ID="' . $ID . '" />
                                </Source>
                            </POS>
                            <Inventories HotelName="' . $HotelName . '" HotelCode="' . $HotelCode . '">
                                <Inventory>
                                    <StatusApplicationControl End="' . $End . '" Start="' . $Start . '"
                                        InvTypeCode="' . $InvTypeCode . '" />
                                    <InvCounts>
                                        <InvCount Count="' . $Count . '" />
                                        <StopSell>' . $StopSell . '</StopSell>
                                        <CloseOnArrival>' . $CloseOnArrival . '</CloseOnArrival>
                                        <CloseOnDeparture>' . $CloseOnDeparture . '</CloseOnDeparture>
                                        <CutOff>' . $CutOff . '</CutOff>
                                    </InvCounts>
                                </Inventory>
                            </Inventories>
                        </OTA_HotelInvCountNotifRQ>';

        $status = "";
        /*
        try {

            $url = 'https://cm.resavenue.com/channelcontroller/PmsRateInventoryNotification';

            $headers = array(
                "Content-type: text/xml",
                "Content-length: " . strlen($postData),
                "Connection: close",
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $data = curl_exec($ch);
            $array_data = json_decode(json_encode(simplexml_load_string($data)), true);

            //print_r($array_data);
            if (curl_errno($ch)) {
                $status = 'failed - ' . curl_error($ch);
            } else {
                curl_close($ch);
            }

            if (array_key_exists("Success", $array_data)) {
                $status = '1';
            } else {
                $status = 'failed - ' . ($array_data['Errors']['Error']['@attributes']['ShortText']);
            }
        } catch (Exception $e) {
            $str = filter_var($e->getMessage(), FILTER_SANITIZE_STRING);
            $status = 'failed - ' . curl_error($str);
        }*/

        file_put_contents('inventory_udpate_data.log', $postData, FILE_APPEND);

        return $status . ' - ' . $Count;
    }


    public function cancel_booking($StartFun, $EndFun, $InvTypeCodeFun, $bk_id)
    {
        $conn = new dbconnect();
        $dbconn = new dbhandler();


        $TimeStamp = (date('Ymd') . 'T' . date('H:i:s'));
        $EchoToken = date('Ymd') . 'kfl' . $bk_id;
        $MessagePassword = 'humminGBird!234'; //Avenues@123
        $ID = 'mukesh@digitaltekk.co.in'; //Resavenue Channel Manager
        $HotelName = 'La Palmera'; //La Palmera
        $HotelCode = '3159'; //3159
        $Start = date('Y-m-d', strtotime($StartFun));
        $End = date('Y-m-d', strtotime($EndFun . ' -1 day'));
        $Count = '0';
        $StopSell = 'False';
        $CloseOnArrival = 'False';
        $CloseOnDeparture = 'False';
        $CutOff = '1';

        $result = $conn->query("SELECT total_rooms,room_type_id FROM lapal_room_type WHERE room_type_id = " . $InvTypeCodeFun);
        $obj = $result->fetch();

        $nos = $obj->total_rooms;
        $check_in_date = date("Y-m-d H:i:s", strtotime($StartFun));
        $check_out_date = date("Y-m-d H:i:s", strtotime($EndFun));
        $arr_date = array();
        $period = new DatePeriod(new DateTime($check_in_date), new DateInterval('P1D'), new DateTime($check_out_date));
        foreach ($period as $key => $value) {
            $chk_dt =  $value->format('Y-m-d');

            $rooms_booked = $dbconn->GetSingleReconrd(
                "lapal_booking as a, lapal_booking_dets as b",
                "sum(no_of_rooms)",
                " b.booking_id = a.booking_id AND '" . $chk_dt . "' BETWEEN date(a.check_in_dtm) AND date(a.check_out_dtm) AND a.booking_status NOT IN (5,6) 
                AND b.amendment_status = 0 AND b.room_type_id",
                $obj->room_type_id
            );

            $today_out = $dbconn->GetSingleReconrd(
                "lapal_booking as a, lapal_booking_dets as b",
                "sum(no_of_rooms)",
                " b.booking_id = a.booking_id AND '" . $chk_dt . "' = date(a.check_out_dtm) AND b.booking_status NOT IN (5,6) 
                AND b.amendment_status = 0 AND b.room_type_id",
                $obj->room_type_id
            );

            $arr_date[] = $nos - $rooms_booked + $today_out;
        }
        $avail_rooms = min($arr_date);

        //$avail_rooms = $avail_rooms - 1;   
        /*  Deluxe Double	7919
            FAMILY ROOM A/C	7921
            Standard Twin Bed Non AC	7920
            Family Room Non A/C	7922

            1 	 	DD 	    Deluxe Double 	
            2 	 	STW 	Standard Twin Bed 
            3 	 	FR6 	Family Room Ac 	1 
            4 	 	FR5 	Family Room Non Ac
            5 	 	ST 	Standard
        */

        switch ($InvTypeCodeFun) {
            case 1:
                $avail_rooms = $avail_rooms + 1;
                $InvTypeCode = '7919'; //Deluxe Double - 
                break;
            case 2:
                $InvTypeCode = '7920'; //Standard Twin Bed Non AC
                break;
            case 3:
                $InvTypeCode = '7921'; //FAMILY ROOM A/C
                break;
            case 4:
                $InvTypeCode = '7922'; //Family Room Non A/C
                break;
        }

        $avail_rooms = ($avail_rooms > 0) ? $avail_rooms : 0;
        $Count = $avail_rooms;


        $postData = '<?xml version="1.0" encoding="UTF8"?>
                        <OTA_HotelInvCountNotifRQ Version="" Target="Production"
                            TimeStamp="' . $TimeStamp . '" EchoToken="' . $EchoToken . '"
                            xmlns="http://www.opentravel.org/OTA/2003/05"
                            xmlns:xsd="http://www.w3.org/2001/XMLSchema"
                            xmlns:xsi="http://www.w3.org/2001/XMLSchemainstance">
                            <POS>
                                <Source>
                                    <RequestorID MessagePassword="' . $MessagePassword . '" ID="' . $ID . '" />
                                </Source>
                            </POS>
                            <Inventories HotelName="' . $HotelName . '" HotelCode="' . $HotelCode . '">
                                <Inventory>
                                    <StatusApplicationControl End="' . $End . '" Start="' . $Start . '"
                                        InvTypeCode="' . $InvTypeCode . '" />
                                    <InvCounts>
                                        <InvCount Count="' . $Count . '" />
                                        <StopSell>' . $StopSell . '</StopSell>
                                        <CloseOnArrival>' . $CloseOnArrival . '</CloseOnArrival>
                                        <CloseOnDeparture>' . $CloseOnDeparture . '</CloseOnDeparture>
                                        <CutOff>' . $CutOff . '</CutOff>
                                    </InvCounts>
                                </Inventory>
                            </Inventories>
                        </OTA_HotelInvCountNotifRQ>';

        $status = "";
        /*
        try {

            $url = 'https://cm.resavenue.com/channelcontroller/PmsRateInventoryNotification';

            $headers = array(
                "Content-type: text/xml",
                "Content-length: " . strlen($postData),
                "Connection: close",
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $data = curl_exec($ch);
            $array_data = json_decode(json_encode(simplexml_load_string($data)), true);

            //print_r($array_data);
            if (curl_errno($ch)) {
                $status = 'failed - ' . curl_error($ch);
            } else {
                curl_close($ch);
            }

            if (array_key_exists("Success", $array_data)) {
                $status = '1';
            } else {
                $status = 'failed - ' . ($array_data['Errors']['Error']['@attributes']['ShortText']);
            }
        } catch (Exception $e) {
            $str = filter_var($e->getMessage(), FILTER_SANITIZE_STRING);
            $status = 'failed - ' . curl_error($str);
        }*/

        file_put_contents('inventory_udpate_data.log', $postData, FILE_APPEND);

        return $status . ' - ' . $Count;
    }
}
