

<?php 

?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <!-- <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT"> -->
    <title>e-commerce - Dashboard</title>

    <?php include_once("includes/common/css-frontend-js.php"); ?>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">
    <?php include_once("includes/common/header-frontend.php"); ?>
	<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Input</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Customer Register</a>
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
                <section class="simple-validation">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Customer Registration</h4>
                        </div>
                        <form class="form-horizontal" novalidate>
                            <div class="card-content">
                                <div class="card-body">
                                
                                    <div class="row">
                                        <div class="col-md-4 col-12 mb-2">
                                            <label for="cus_first_name">First Name</label>
                                            <input type="text" class="form-control" id="cus_first_name" name="cus_first_name" required data-validation-required-message="This First Name field is required" placeholder="Enter First Name">
                                        </div>
                                        <div class="col-md-4 col-12 mb-2">
                                            <label for="cust_last_name">Last Name</label>
                                            <input type="text" class="form-control" id="cust_last_name" name="cust_last_name" required data-validation-required-message="This aaaaFirst Name field is required" placeholder="Enter Last Name">
                                        </div>
                                        <div class="col-md-4 col-12 mb-2">
                                            <label for="cus_dob">Date of Birth</label>
                                            <input type="date" class="form-control" id="cus_dob" name="cus_dob">
                                        </div>
                                        <div class="col-md-4 col-12 mb-2">
                                            <label for="cus_mob_num">Mobile Number</label>
                                            <input type="tel" class="form-control" id="cus_mob_num" name="cus_mob_num" placeholder="Enter mobile number">
                                        </div>
                                        <div class="col-md-4 col-12 mb-2">
                                            <label for="cus_email">Email</label>
                                            <input type="email" class="form-control" id="cus_email" name="cus_email" placeholder="Enter email">
                                        </div>
                                        <div class="col-md-4 col-12 mb-2">
                                            <label for="customerGender">Gender</label>
                                            <select class="form-control select2" id="customerGender">
                                                <option value="" selected disabled>Select gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-12 mb-2">
                                            <label for="customerAddress">Address</label>
                                            <textarea class="form-control" id="customerAddress" rows="1" placeholder="Enter address"></textarea>
                                        </div>
                                        <div class="col-md-4 col-12 mb-2">
                                            <label for="customerCity">City</label>
                                            <input type="text" class="form-control" id="customerCity" placeholder="Enter city">
                                        </div>
                                        <div class="col-md-4 col-12 mb-2">
                                            <label for="customerState">State</label>
                                            <input type="text" class="form-control" id="customerState" placeholder="Enter state">
                                        </div>
                                        <div class="col-md-4 col-12 mb-2">
                                            <label for="customerZip">Zip Code</label>
                                            <input type="text" class="form-control" id="customerZip" placeholder="Enter zip code">
                                        </div>
                                        <div class="col-md-12 col-12 mb-2 card-header">
                                            <h4 class="card-title">User Form</h4>
                                        </div>
                                        <div class="col-md-4 col-12 mb-2">
                                            <label for="cus_user_name">User Name</label>
                                            <input type="text" class="form-control" id="cus_user_name" name="cus_user_name" placeholder="Enter User Name">
                                        </div>
                                        <div class="col-md-4 col-12 mb-2">
                                            <label for="cus_password">Password</label>
                                            <div style="position: relative;">
                                                <input type="password" class="form-control" id="cus_password" name="cus_password" placeholder="Enter password">
                                                <i class="fa fa-eye" id="togglePassword" 
                                                style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12 mb-2">
                                            <label for="cus_confirm_password">Confirm Password</label>
                                            <div style="position: relative;">
                                                <input type="password" class="form-control" id="cus_confirm_password" name="cus_confirm_password" placeholder="Enter Confirm password">
                                                <i class="fa fa-eye" id="toggleConfirmPassword" 
                                                style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-outline-warning">Reset</button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                <section>
            </div>

        </div>
    </div>
    <?php include_once("includes/common/footer-css-frontend-js.php"); ?>
</body>
<!-- END: Body-->
<script>
function togglePassword(inputId, iconId) {
    let passwordField = document.getElementById(inputId);
    let toggleIcon = document.getElementById(iconId);

    if (passwordField.type === "password") {
        passwordField.type = "text";
        toggleIcon.classList.remove("fa-eye");
        toggleIcon.classList.add("fa-eye-slash"); // Change to hide icon
    } else {
        passwordField.type = "password";
        toggleIcon.classList.remove("fa-eye-slash");
        toggleIcon.classList.add("fa-eye"); // Change to show icon
    }
}

document.getElementById('togglePassword').addEventListener('click', function () {
    togglePassword('cus_password', 'togglePassword');
});

document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
    togglePassword('cus_confirm_password', 'toggleConfirmPassword');
});
</script>
</html>





