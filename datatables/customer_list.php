<?php
ob_start();
session_start();
define ("BASEPATH","../");

require_once(BASEPATH ."includes/common/userclass.php");
// require_once("../includes/common/userclass.php");

// $con = new connection();
// $con = new dbconnect();
// $dbcon = new dbfunctions();
$con = new dbconnect();
$dbcon= new dbhandler();
$converter = new Encryption;

ini_set('display_errors', '1'); ini_set('display_startup_errors', '1'); error_reporting(E_ALL);

## Reading value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
//$searchValue = $_POST['search']['value']; // Search value

## Custom Search Field
$searchByValue = isset($_POST['searchByCustomerName'])? $_POST['searchByCustomerName'] : ''; //searchByValue
//$searchByDegree = isset($_POST['searchByDegree'])? $_POST['searchByDegree'] : ''; //searchByDegree
//echo $searchByValue;
//echo $searchByDegree;

## Search
$searchQuery = " ";

if($searchByValue != ''){
  $searchQuery = " AND (cus_first_name LIKE '%". $searchByValue ."%' OR 
        cust_last_name LIKE '%". $searchByValue ."%' OR
        cus_mob_num LIKE '%". $searchByValue ."%' OR 
        cus_email LIKE '%". $searchByValue ."%' OR 
        cus_dob LIKE '%". $searchByValue ."%' OR
        cus_gender LIKE '%". $searchByValue ."%') ";
}
// echo $searchQuery;

// if($searchByDegree != ''){
//   $searchQuery = " AND (degree = ". $searchByDegree .") ";
// }

## Column
if($columnName == '' || $columnName == 'id'){
  $columnName = " id ";
}

## Total number of records without filtering
$stmt = $con->query("SELECT COUNT(*) AS allcount FROM tbl_customer WHERE rec_del_status = 0".$searchQuery);
$records = $stmt->fetch();
$totalRecords = $records->allcount;

## Total number of records with filtering
$stmt = $con->query("SELECT COUNT(*) AS allcount FROM tbl_customer WHERE rec_del_status = 0 ".$searchQuery);
$records = $stmt->fetch();
$totalRecordwithFilter = $records->allcount;

## Fetch records
$data_sql = "SELECT * FROM tbl_customer where rec_del_status = 0 ".$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT ". $row .",". $rowperpage;
//echo $data_sql;
$stmt = $con->query($data_sql);
$studentRecords = $stmt->fetchAll();

$data = array();

$sno = 1;
foreach ($studentRecords as $row) {

  $action = $edit_link = $delete_link = "";

  // $edit_link = '<a href="customer.php?id='. $converter->encode($row->id) .'" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> &nbsp;&nbsp;';
  // $delete_link = '<a href="customer.php?did='. $converter->encode($row->id) .'" title="Delete" onclick="return confirm(\'Are You Sure Want To Delete?\');"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
  
  // $action = $edit_link . $delete_link;

  $data[] = array(
    "id" => $sno,
    "cus_first_name" => $row->cus_first_name." ".$row->cust_last_name,
    "cus_mob_num" => $row->cus_mob_num,
    "cus_email" =>  $row->cus_email,
    "cus_dob" =>$row->cus_dob,
    "cus_gender" => $row->cus_gender,
    // "action"=>$action
  );

  $sno++;
}

## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo json_encode($response);