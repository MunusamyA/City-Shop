<?php
ob_start();
date_default_timezone_set('Asia/Calcutta');

$ip=$_SERVER['REMOTE_ADDR']; 


function isAdmin()
{
	if(isset($_SESSION['_user']))
	{
	    if($_SESSION['_user'] != "app_user")
	    {
		    $_SESSION['_msg']="Session Expired. Please Relogin";	
			header("Location: ".$_SERVER['DOCUMENT_ROOT']."login.php");	
		    die();
	    }
	}
	else
	{
	    $_SESSION['_msg']="Session Expired. Please Relogin";	
		header("Location: ".$_SERVER['DOCUMENT_ROOT']."login.php");	
		die();
	}
}




function StandardHash($plain) {
	return md5("$plain:sollamudiyathu");
}	

// function VerifyPassword($plain, $hashedPassword) {
// 	return password_verify($plain.'sollamudiyathu', $hashedPassword);
// }
// function password_check($a,$b){
// 	return password_verify($a . 'sollamudiyathu', $b)
// }

// function SecureHash($plain) {
//     return password_hash($plain.'sollamudiyathu', PASSWORD_BCRYPT);
// }



// function SecureSHA512($plain) {
//     return hash("sha512", $plain . "sollamudiyathu"); // Using a salt
// }





function StrTruncate($str,$chars) {
	# returns $str, truncated by $chars characters
	return substr($str,0,strlen($str)-$chars);
}



function get_abbrv($str){
	$acronym ='';
	
	$words = explode(' ',$str);
	foreach($words as $w) {
		$acronym .= substr($w,0,1);
	}
	$word = $word . $acronym ;
	return $word;
}


function post_img($fileName,$tempFile,$targetFolder)
{	
 	if ($fileName!="")
	{
		if(!(is_dir($targetFolder)))

		mkdir($targetFolder);

		$counter=0;

		$NewFileName=$fileName;

		if(file_exists($targetFolder."/".$NewFileName))
		{
			do
			{ 
				$counter=$counter+1;
				$NewFileName=$counter."".$fileName;
			}
			while(file_exists($targetFolder."/".$NewFileName));
		}

		$NewFileName=str_replace(",","-",$NewFileName);
		$NewFileName=str_replace(" ","_",$NewFileName);		
		copy($tempFile, $targetFolder."/".$NewFileName);
		return $NewFileName;
	}
}

 

function removeFile($filename)
{
	if (file_exists($filename))
	{
		unlink($filename);
	}
}



function send_mail($strTo,$strFrom,$strSubject,$strContent)
{
	$to=$strTo;
	$subject=$strSubject; 
	$headers="MIME-Version: 1.0\r\n";
	$headers.="Content-type: text/html; charset=iso-8859-1\r\n";
	$headers.="From: KFOUR Team <".$strFrom."> \r\n";		
	$isSent = mail($to,$subject,$strContent,$headers);
}


function send_mail_cc($strTo,$strFrom,$strCC,$strSubject,$strContent)
{
	$to=$strTo;
	$subject=$strSubject; 
	$headers="MIME-Version: 1.0\r\n";
	$headers.="Content-type: text/html; charset=iso-8859-1\r\n";
	$headers.="From: KFOUR Team <".$strFrom."> \r\n";	
	$isSent = mail($to,$subject,$strContent,$headers);
}


function MyFormatDate($MyDate)
{
	/*
			Take a date in yyyy-mm-dd format and return it to the user
			in a PHP timestamp
	*/
	if($MyDate!="0000-00-00" && $MyDate!=""){
		
		$date_array = explode("-",$MyDate); // split the array
		
		$var_year = $date_array[0];
		$var_month = $date_array[1];
		$var_day = $date_array[2];

		$var_Dt =  $var_day."-".substr(date('F', mktime(0, 0, 0, $var_month,1)),0,3)."-".$var_year;		
		return($var_Dt); // return it to the user
	
	}
}

function MyFormatDate_new($MyDate,$dateFormat)
{
	if($MyDate!="0000-00-00" && $MyDate!=""){
        $date_array = explode("-",$MyDate); // split the array
        $var_year = $date_array[0];
        $var_month = $date_array[1];
        $var_day = $date_array[2];
		
		  switch ($dateFormat) {
			case "dmy" :
			  $var_Dt =  $var_day.".".$var_month.".".$var_year;
			  return($var_Dt);
			case "ymd" :
			  $var_Dt =  $var_year."-".$var_month."-".$var_day;
			  return($var_Dt);
			case "mdy" :
			  $var_Dt =  $var_month."-".$var_day."-".$var_year;
			  return($var_Dt);
			case "MY" :
			  $var_Dt =  date('F', mktime(0, 0, 0, $var_month))."-".$var_year;
			  return($var_Dt);
			case "DMY" :
			  $var_Dt =  $var_day."-".substr(date('F', mktime(0, 0, 0, $var_month)),0,3)."-".$var_year;
			  return($var_Dt);
			case "D" :
			  $var_Dt =  $var_day;
			  return($var_Dt); 
			case "M" :
			  $var_Dt =  strtoupper(substr(date('F', mktime(0, 0, 0, $var_month)),0,3));
			  return($var_Dt); 
			case "m" :
			  $var_Dt =  $var_month;
			  return($var_Dt);  
			case "Y" :
			  $var_Dt =  $var_year;
			  return($var_Dt);  
			default :
			  $var_Dt =  $var_day."-".substr(date('F', mktime(0, 0, 0, $var_month)),0,3)."-".$var_year;
			  return($var_Dt);
		  }
        
	}   //return($var_Dt); // return it to the user
}

function MyFormatDateTime($MyDate)
{
        /*
                Take a date in yyyy-mm-dd format and return it to the user
                in a PHP timestamp
                Robin 06/10/1999
        */
        $date_array = explode("-",substr($MyDate,0,10)); // split the array
        
        $var_year = $date_array[0];
        $var_month = $date_array[1];
        $var_day = $date_array[2];

        $var_Dt =  $var_day."-".substr(date('F', mktime(0, 0, 0, $var_month)),0,3)."-".$var_year;
        
		$var_Tm = substr($MyDate,11,19); // split the array
		
		$var_Dt_Tm = $var_Dt . " &nbsp; " . $var_Tm ;
		
		return($var_Dt_Tm); // return it to the user
}

function Find_AGE($MyDate){
		
		$date_array = explode("-",substr($MyDate,0,10)); // split the array
        
        $var_year = $date_array[0];
        $var_month = $date_array[1];
        $var_day = $date_array[2];
		
		$ageTime = mktime(0, 0, 0, $var_month, $var_day, $var_year); // Get the person's birthday timestamp
		$t = time(); // Store current time for consistency
		$age = ($ageTime < 0) ? ( $t + ($ageTime * -1) ) : $t - $ageTime;
		$year = 60 * 60 * 24 * 365;
		$ageYears = round($age / $year);
		 
		return($ageYears);
}

function dateDiff($start, $end) 
{
	$start_ts = strtotime($start);
	$end_ts = strtotime($end);

	$diff = $end_ts - $start_ts;
	return round($diff / 86400);

}

function lastday($month,$year) 
{
   if (empty($month)) {
      $month = date('m');
   }
   if (empty($year)) {
      $year = date('Y');
   }
   $result = strtotime("{$year}-{$month}-01");
   $result = strtotime('-1 second', strtotime('+1 month', $result));
   return date('Y-m-d', $result);
}

function TodayDays4Month($month,$year)
{
	if (empty($month)) {
      $month = date('m');
   }
   if (empty($year)) {
      $year = date('Y');
   }
   $result = strtotime("{$year}-{$month}-01");
   $result = strtotime('-1 second', strtotime('+1 month', $result));
   return date('t', $result);
}


function GetMonthString($n)
{
    $timestamp = mktime(0, 0, 0, $n, 1, 2005);    
    return date("M", $timestamp);
}

function get_previous_month($date) 
{
	$date = str_replace("/", "-", $date);
	$year=date("Y",strtotime($date));
	$month=date("n",strtotime($date)) - 1;
	if ($month == 0)
	{
		$month = 12;
		$year = $year - 1;
	}
	return date("Y-m-d", mktime(0, 0, 0, $month, 1, $year));
}

function random_password()
{

    $chars = "abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ023456789";
	
	//echo strlen($chars);
	
    srand((double)microtime()*1000000);

    $i = 0;

    $pass = '' ;

    while ($i <= 8) 
	{

        $num = rand() % 60;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }
    return $pass;	
}

function random_captcha_code()
{
    $chars = "abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ023456789";
	
	//echo strlen($chars);
	
    srand((double)microtime()*1000000);

    $i = 0;

    $pass = '' ;

    while ($i <= 4) {

        $num = rand() % 60;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }
    return $pass;	
}


function getcurrentpath()
{   $curPageURL = "";
	if ($_SERVER["HTTPS"] != "on")
			$curPageURL .= "http://";
	 else
		$curPageURL .= "https://" ;
	if ($_SERVER["SERVER_PORT"] == "80")
		$curPageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	 else
		$curPageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		$count = strlen(basename($curPageURL));
		$path = substr($curPageURL,0, -$count);
	return $path ;
}	


function moneyFormatIndia($rupee)
{
    $explrestunits = "" ;
	
	$num = (int) $rupee;  
	$paise = $rupee - (int)$num;	
	
    if(strlen($num)>3)
	{
		
        $lastthree = substr($num, strlen($num)-3, strlen($num));
        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for($i=0; $i<sizeof($expunit); $i++){
            // creates each of the 2's group and adds a comma to the end
            if($i==0)
            {
                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
            }else{
                $explrestunits .= $expunit[$i].",";
            }
        }
        $thecash = $explrestunits.$lastthree;
		
		
    } else {
        $thecash = $num;
    }	
	
	if ($paise ==0)
	  $thecash =$thecash . '.00';
	else		
	{	
		$str_rs = number_format($rupee,2)."";
		$data= explode('.',$str_rs);
		$thecash = $thecash .'.'.$data[1] ;
	}

    return $thecash; // writes the final format where $currency is the currency symbol.
}

function indian_number_format($num) {
    $num = "".$num;
    if( strlen($num) < 4) return $num;
    $tail = substr($num,-3);
    $head = substr($num,0,-3);
    $head = preg_replace("/\B(?=(?:\d{2})+(?!\d))/",",",$head);
    return $head.",".$tail;
}

function getStartAndEndDate($week, $year) 
{
  // Adding leading zeros for weeks 1 - 9.
  $date_string = $year . 'W' . sprintf('%02d', $week);
  $return[0] = date('Y-n-j', strtotime($date_string));
  $return[1] = date('Y-n-j', strtotime($date_string . '7'));
  return $return;
}	


/* --------------  NUMBER TO WORDS  ---------------- */
function number_to_words_paise($number)
{
	$decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
    $digits = array('', 'hundred','thousand','lakh', 'crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal) ? " " . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
}



function number_to_words($no)
{
	$words = array('0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five','6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten','11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen','16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty','30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy','80' => 'eighty','90' => 'ninty','100' => 'hundred &','1000' => 'thousand','100000' => 'lakh','10000000' => 'crore');
	if($no == 0)
	return ' ';
	else {
	$novalue='';
	$highno=$no;
	$remainno=0;
	$value=100;
	$value1=1000;
	while($no>=100) {
	if(($value <= $no) &&($no < $value1)) {
	$novalue=$words["$value"];
	$highno = (int)($no/$value);
	$remainno = $no % $value;
	break;
	}
	$value= $value1;
	$value1 = $value * 100;
	}
	if(array_key_exists("$highno",$words))
	return $words["$highno"]." ".$novalue." ".number_to_words($remainno);
	else {
	$unit=$highno%10;
	$ten =(int)($highno/10)*10;
	return $words["$ten"]." ".$words["$unit"]." ".$novalue." ".number_to_words($remainno);
	}
	}
}
 function GetVar($var) {
	# returns $var, whether it's from $_POST or $_GET
	if ($_GET[$var]) { return $_GET[$var]; }
	if ($_POST[$var]) { return $_POST[$var]; }

}

function leadingZeros($num,$numDigits) 
{
	return sprintf("%0".$numDigits."d",$num);
}


function roundofnum($num)
{	
	
	$num = floatval($num) * 1.00;
	$dec = fmod($num,1);
	if($dec >0)
		return round($num,1);
	else
		return round($num);
}	

function roundofstock($num)
{	
	
	$num = floatval($num) * 1.000;
	$dec = fmod($num,1);
	if($dec >0)
		return number_format($num,3,".","");
	else
		return round($num);
}

function getpath($url,$page){
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]".$url;
	$final_url =strstr($actual_link,$page,true);	
	return $final_url; 
}


class Encryption {
    public function encode($string){ 
		$encrypted = base64_encode($string);
		$encrypted = str_replace(array('+','/','='),array('-','_',''),$encrypted);
        return $encrypted;
    }
    public function decode($encrypted){
        $encrypted = str_replace(array('-','_'),array('+','/'),$encrypted);
        $mod4 = strlen($encrypted) % 4;
        if ($mod4) {
            $encrypted .= substr('====', $mod4);
        }
        $decrypted = rtrim(base64_decode($encrypted));
		return $decrypted;
    }
}

function iif($condition, $con_true, $con_false)
{
	if($condition){
		return $con_true;
	}
	else{
		return $con_false;
	}
}


?>

