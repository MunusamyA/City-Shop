<?php

	ob_start();
	session_start();
	define ("BASEPATH","./");

	
	require_once( "includes/common/userclass.php");
		  
	ini_set('display_errors', '1');
	ini_set('display_startup_errors', '1');
	error_reporting(E_ALL);

	isAdmin();
	// echo $_SERVER['DOCUMENT_ROOT'];die;
	// $conn = new dbconnect(1);	
	// $dbconn= new dbhandler(1);
			
	/* ----------------- Document Management Task Update Script	----------------- */
	$con = new dbconnect();
	$dbcon= new dbhandler();

	
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
	<title><?php echo PAGE_TITLE; ?> - Home</title>
	<?php include_once("includes/common/css-js.php"); ?>
</head>

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
	<?php include_once("includes/common/header.php"); ?>	

<!-- [ Main Content ] start -->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            
        </div>
    </div>
<!-- [ Main Content ] end -->


  <?php include_once("includes/common/footer-css-js.php"); ?>

</body>
<script>

	<?php
    if (!empty($_SESSION['_info'])) {
        echo "setTimeout(function() {
            toastr.success('" . addslashes($_SESSION['_info']) . "', 'Miracle Max Says');
        }, 2000);";
        unset($_SESSION['_info']);
    }
    ?>
    $('#txtUserName').focus();
</script>

</html>





