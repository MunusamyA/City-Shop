<?php
ob_start();
session_start();
define ("BASEPATH","./");

// require_once(BASEPATH ."userclass.php");

require_once(BASEPATH ."includes/common/userclass.php");
	// echo StandardHash('admin@123');die;


	
$conn = new dbconnect();	
$dbconn= new dbhandler();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$usr_id = $_SESSION['_user_id'];

$sql1 = "SELECT * FROM mst_menu_rights WHERE usr_id = '".$usr_id."' ";
$res1 = $conn->query($sql1);
$obj1 = $res1->fetch(PDO::FETCH_OBJ);

$arr = array_map('intval', explode(",", $obj1->sup_mm_id));


$sql = "SELECT * FROM mst_sup_main_menu WHERE sup_mm_show = 1 AND rec_del_status = 0";
$res = $conn->query($sql);

$placeholders = implode(',', array_fill(0, count($arr), '?'));

$sql = "SELECT * FROM mst_sup_main_menu WHERE id IN ($placeholders)";
$stmt = $conn->prepare($sql);
$stmt->execute($arr);
$data = $stmt->fetchAll(PDO::FETCH_OBJ);
// print_r($data);
// echo $data->sup_menu_url;

$root_url='';
$root_url .= 'home.php,';

foreach($data as $url){

    $root_url .= $url->sup_menu_url.',';

}
$str_url = rtrim($root_url, ",");
$root_urls = explode(",", $str_url);
$basename = basename($_SERVER['REQUEST_URI']);

if(!(in_array($basename, $root_urls))) {
    session_destroy();
    session_start();
    $_SESSION['_msg']="Access Deniad This URL";
    header("Location:login.php");
}

?>
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="html/ltr/vertical-menu-template/index.html">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">E-Commerce</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>

    <div class="shadow-bottom"></div>
    
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <?php 
                while($obj = $res->fetch(PDO::FETCH_OBJ))  {
                    if(in_array($obj->id, $arr)) {
                        echo '<li class="nav-item"><a href="'. $obj->sup_menu_url .'"><i class="'. $obj->sup_mm_icon .'"></i><span class="menu-title" data-i18n="Dashboard">'.$obj->sup_mm_name .'</span></a>
                        </li>';
                    }
                }
            ?>
        </ul>
    </div>
</div>