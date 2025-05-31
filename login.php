<?php
	ob_start();
	session_start();
	

	define ("BASEPATH","./");
	
	require_once(BASEPATH ."includes/common/userclass.php");
	
	
	$conn = new dbconnect();	
	$dbconn= new dbhandler();
	
	// ini_set('display_errors', '1');
	// ini_set('display_startup_errors', '1');
	// error_reporting(E_ALL);
	

	if(isset($_POST['LOGIN']))
	{
		$sql = "SELECT * FROM tbl_user WHERE rec_del_status=0 AND usr_logname = '".$_REQUEST['txtUserName']."' AND usr_logpwd
		LIKE BINARY '".StandardHash($_REQUEST['txtUserPwd'])."' ";
		
		$res = $conn->query($sql);
		$no = $res->rowCount();
		if ($no>0) 
		
		{

			$obj = $res->fetch(PDO::FETCH_OBJ);		
			$_SESSION['_user'] = "app_user";
			$_SESSION['_user_id'] = $obj->id;
			$_SESSION['_user_name'] = ucwords(strtolower($obj->usr_name));
			$_SESSION['_user_type'] = $obj->usr_type;	
			$_SESSION['_user_session_id'] = date("Ymd").date("His");
			$_SESSION['_user_avatar'] = $obj->usr_photo;
			$_SESSION['_info']="<h5>Welcome " . ucwords(strtolower($obj->usr_name)) ."...</h5>";
			if($obj->emp_id>0)
			{
				$desig_id = $dbconn->GetSingleReconrd("mst_employee","emp_desig_id","emp_id",$obj->emp_id);
				
				if($desig_id>0)
					$_SESSION['_user_desig'] = ucwords(strtolower($dbconn->GetSingleReconrd("mst_designation","desig_name","desig_id",$desig_id)));
				else
					$_SESSION['_user_desig'] = $obj->usr_designation;				
			}
			else
				$_SESSION['_user_desig'] = $obj->usr_designation;				
			
			$_SESSION['_msg']="";
			$_SESSION['_msg_err']="";			
			header("location:home.php");
			die();
		}
		else
		{		

            // echo StandardHash($_REQUEST['txtUserPwd']);die;
			$_SESSION['_user'] = "";
			$_SESSION['_user_id'] = "";		
			$_SESSION['_user_name'] = "";	
			$_SESSION['_user_type'] = "";				
			$_SESSION['_user_session_id'] = "";
			$_SESSION['_user_avatar'] = "";
			$_SESSION['_user_desig'] = "";
			$_SESSION['_info'] = "";
			$_SESSION['_msg'] = "Invalid User Name / Password. Please Try Again..!";	
			$_SESSION['_msg_err'] = "";

			header("location:login.php");
			die();
		}
	
	}

?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title>e-commerce - Login Page</title>
    <?php include_once("includes/common/css-js.php"); ?>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                    <img src="app-assets/images/pages/login.png" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Login</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">Welcome back, please login to your account.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form action="login.php" method="post">
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control" id="txtUserName" name="txtUserName" placeholder="Username" value="admin" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label >Username</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input type="password" class="form-control" id="user-password" name="txtUserPwd" placeholder="Password" value="Munusamy@7019" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="user-password">Password</label>
                                                    </fieldset>
                                                    <div class="form-group d-flex justify-content-between align-items-center">
                                                        <div class="text-left">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox">
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class="">Remember me</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="text-right"><a href="auth-forgot-password.html" class="card-link">Forgot Password?</a></div>
                                                    </div>
                                                    <a href="auth-register.html" class="btn btn-outline-primary float-left btn-inline">Register</a>
                                                    <button type="submit" name="LOGIN" class="btn btn-primary float-right btn-inline">Login</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="login-footer">
                                            <div class="divider">
                                                <div class="divider-text">OR</div>
                                            </div>
                                            <div class="footer-btn d-inline">
                                                <a href="#" class="btn btn-facebook"><span class="fa fa-facebook"></span></a>
                                                <a href="#" class="btn btn-twitter white"><span class="fa fa-twitter"></span></a>
                                                <a href="#" class="btn btn-google"><span class="fa fa-google"></span></a>
                                                <a href="#" class="btn btn-github"><span class="fa fa-github-alt"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->

	<?php include_once("includes/common/footer-css-js.php"); ?>

</body>
<!-- END: Body-->



<script>
	$(function() {
    <?php
		if (!empty($_SESSION['_info'])) {
			echo "setTimeout(function() {
				toastr.success('" . addslashes($_SESSION['_info']) . "');
			}, 1000);";
			unset($_SESSION['_info']); 
		}
		if(isset($_SESSION['msg_login']) && $_SESSION['msg_login']!=""){
			echo "setTimeout(function() {
				toastr.success('" . addslashes($_SESSION['msg_login']) . "');
			}, 1000);";
			$_SESSION['msg_login'] = "";
		}		
		if(isset($_SESSION['_msg']) && $_SESSION['_msg']!=""){
			echo "setTimeout(function() {
				toastr.error('" . addslashes($_SESSION['_msg']) . "');
			}, 100);";
			$_SESSION['_msg'] = "";
		}
        if (!empty($_SESSION['msg'])) {
            echo "setTimeout(function() {
                toastr.success('" . addslashes($_SESSION['msg']) . "');
            }, 2000);";
            unset($_SESSION['msg']);
        }
	?>
	$('#txtUserName').focus();
});
</script>

</html>
