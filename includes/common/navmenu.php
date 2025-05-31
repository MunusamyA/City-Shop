<?php 
ob_start(); 
session_start(); 
define("BASEPATH", "./");

require_once(BASEPATH . "includes/common/userclass.php");

$conn = new dbconnect();
$dbconn = new dbhandler();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$usr_id = $_SESSION['_user_id'] ;

if (!$usr_id) {
    header("Location:login.php");
    exit;
}

$sql = "SELECT * FROM mst_menu_rights WHERE usr_id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$usr_id]);
$obj1 = $stmt->fetch(PDO::FETCH_OBJ);

$arr1 = array_map('intval', explode(",", $obj1->mm_id ?? ''));
$arr2 = array_map('intval', explode(",", $obj1->sub_menu_id ?? ''));

$root_url = 'home.php,';

if (!empty($arr1)) {
    $placeholders = implode(',', array_fill(0, count($arr1), '?'));
    $sql4 = "SELECT * FROM mst_main_menu WHERE id IN ($placeholders)";
    $stmt = $conn->prepare($sql4);
    $stmt->execute($arr1);
    $data = $stmt->fetchAll(PDO::FETCH_OBJ);
    foreach ($data as $url) {
        if ($url->mm_url != "has-sub") {
            $root_url .= $url->mm_url . ',';
        }
    }
}

if (!empty($arr2)) {
    $placeholders1 = implode(',', array_fill(0, count($arr2), '?'));
    $sql5 = "SELECT * FROM mst_sub_menu WHERE id IN ($placeholders1)";
    $stmt1 = $conn->prepare($sql5);
    $stmt1->execute($arr2);
    $data1 = $stmt1->fetchAll(PDO::FETCH_OBJ);
    foreach ($data1 as $url1) {
        $root_url .= $url1->sub_menu_url . ',';
    }
}

$str_url = rtrim($root_url, ",");
$root_urls = explode(",", $str_url);

$basename = strtok(basename($_SERVER['REQUEST_URI']), '?');

if (!in_array($basename, $root_urls)) {
    session_destroy();
    session_start();
    $_SESSION['_msg'] = "Access Denied to This URL";
    header("Location:login.php");
    exit;
}

// Fetch submenus and group by mm_id for quick lookup
$sql3 = "SELECT * FROM mst_sub_menu WHERE rec_del_status = 0";
$res3 = $conn->query($sql3);
$subMenusByMenuId = [];
while ($obj3 = $res3->fetch(PDO::FETCH_OBJ)) {
    if (in_array($obj3->id, $arr2)) {
        $subMenusByMenuId[$obj3->mm_id][] = $obj3;
    }
}

$sql2 = "SELECT * FROM mst_main_menu WHERE mm_show = 1 AND rec_del_status = 0";
$res2 = $conn->query($sql2);
?>

<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="#">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">E-Commerce</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                    <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>

    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <?php while ($obj2 = $res2->fetch(PDO::FETCH_OBJ)) {
                if (in_array($obj2->id, $arr1)) {
                    $hasSubmenus = !empty($subMenusByMenuId[$obj2->id]);
                    $issub = $hasSubmenus ? "has-sub" : "";
                    $not_issub = $hasSubmenus ? "#" : $obj2->mm_url;

                    echo '<li class="nav-item ' . $issub . '">
                            <a href="' . htmlspecialchars($not_issub) . '">
                                <i class="' . htmlspecialchars($obj2->mm_icon) . '"></i>
                                <span class="menu-title" data-i18n="Ecommerce">' . htmlspecialchars($obj2->mm_name) . '</span>
                            </a>';

                    if ($hasSubmenus) {
                        echo '<ul class="menu-content">';
                        foreach ($subMenusByMenuId[$obj2->id] as $obj3) {
                            if (!empty($obj3->sub_menu_url)) {
                                echo '<li><a href="' . htmlspecialchars($obj3->sub_menu_url) . '"><i class="feather icon-circle"></i><span class="menu-item">' . htmlspecialchars($obj3->sub_menu_name) . '</span></a></li>';
                            }
                        }
                        echo '</ul>';
                    }
                    echo '</li>';
                }
            } ?>
        </ul>
    </div>
</div>
