<?php

	ob_start();
	session_start();
	define ("BASEPATH","./");

	
	require_once(BASEPATH ."includes/common/userclass.php");
		  
	// ini_set('display_errors', '1');
	// ini_set('display_startup_errors', '1');
	// error_reporting(E_ALL);

	isAdmin();
	// echo $_SERVER['DOCUMENT_ROOT'];die;
	// $conn = new dbconnect(1);	
	//  
			
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
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Seller List</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Seller</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Seller List</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Data list view starts -->
                <section id="data-list-view" class="data-list-view-header">
                    <div class="action-btns d-none">
                        <div class="btn-dropdown mr-1 mb-1">
                            <div class="btn-group dropdown actions-dropodown">
                                <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Actions
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"><i class="feather icon-trash"></i>Delete</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-archive"></i>Archive</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-file"></i>Print</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-save"></i>Another Action</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        <table class="table data-list-view">
                            <thead>
                                <tr>
                                    <th>SI.No.</th>
                                    <th>Name</th>
                                    <th>Mobile No.</th>
                                    <th>Email</th>
                                    <th>Date of Birth</th>
                                    <th>Gender</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM mst_seller WHERE rec_del_status = 0";
                                    $res = $conn->query($sql);
                                    $sno = 1;
                                    while($obj = $res->fetch(PDO::FETCH_OBJ))  {
                                        echo'
                                            <tr>
                                                <td>'.$sno.'</td>
                                                <td>'.$obj->sell_first_name." ".$obj->sell_last_name.'</td>
                                                <td>'.$obj->sell_mob_num.'</td>
                                                <td>'.$obj->sell_email.'</td>
                                                <td>'.$obj->sell_dob.'</td>   
                                                <td>'.$obj->sell_gender.'</td>
                                                <td>#</td>
                                            </tr>
                                        ';
                                        $sno++;
                                    }

                                ?>
                                
                                
                            </tbody>
                        </table>
                    </div>
                    <!-- DataTable ends -->

                    <!-- add new sidebar starts -->
                    <!-- add new sidebar ends -->
                </section>
                <!-- Data list view end -->

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
	// $_SESSION["msg"];

    ?>
    $('#txtUserName').focus();
</script>




</html>





