<?php 

?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <!-- <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT"> -->
    <title>e-commerce - Customer Register</title>

    <?php 
    include_once("includes/common/css-frontend-js.php"); 
    ?>
    <style>
    .error-border {
        border: 1px solid #ea5455 !important; /* Red border for errors */
    }

    /* .select2-container--default .select2-selection--single {
        border: 1px solid red !important;
    } */
    
    </style>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">
     <?php
     include_once("includes/common/header-frontend.php"); 
     ?> -
	<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12">
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Customer Register Form</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <!-- <form class="form-horizontal" novalidate> -->
                                        <!-- <form class="form-horizontal" novalidate id="myForm" onsubmit="return fnvalidate()"> -->
                                        <form class="form-horizontal"  id="myForm" >
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="cus_first_name">First Name <span class="err">*</span> </label>
                                                            <input type="text" class="form-control" id="cus_first_name" name="cus_first_name" placeholder="Enter First Name" value="s">
                                                            <div id="fir_name_err" style="color:#ea5455;list-style-type:none;font-size: 0.875rem;padding-top: 0.2rem;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="cust_last_name">Last Name <span class="err">*</span></label>
                                                            <input type="text" class="form-control" id="cust_last_name" name="cust_last_name"  placeholder="Enter Last Name" value="s">
                                                            <div id="las_name_err" style="color:#ea5455;list-style-type:none;font-size: 0.875rem;padding-top: 0.2rem;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="cus_dob">Date of Birth <span class="err">*</span></label>
                                                            <!-- <input type="text" class="form-control date_picker" placeholder="Select the Date of Birth" id="cus_dob" name="cus_dob" required data-validation-required-message="This Date of Birth field is required" > -->
                                                            <input type="text" class="form-control pickadate-months-year" placeholder="Select the Date of Birth" id="cus_dob" name="cus_dob" value="20 March, 2001">
                                                            <div id="dob_error" style="color:#ea5455;list-style-type:none;font-size: 0.875rem;padding-top: 0.2rem;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="cus_mob_num">Mobile Number <span class="err">*</span></label>
                                                            <input type="tel" class="form-control number_only" maxlength="10" id="cus_mob_num" name="cus_mob_num" placeholder="Enter mobile number"  value="1111111111">
                                                        </div>
                                                        <div id="mob_error_mss" style="color:#ea5455;list-style-type:none;font-size: 0.875rem;padding-top: 0.2rem;"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                        <label for="cus_email">Email <span class="err">*</span></label>
                                                        <input type="email" class="form-control" id="cus_email" name="cus_email" placeholder="Enter Email" value="m@gmail.com">
                                                        <div id="email_error" style="color:#ea5455;list-style-type:none;font-size: 0.875rem;padding-top: 0.2rem;"></div>
                                                        <!-- <input type="email" class="form-control" id="cus_email" name="cus_email" placeholder="Enter email" required data-validation-required-message="This Email field is required" > -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="cus_gender">Gender <span class="err">*</span></label>
                                                            <select class="form-control select2" id="cus_gender" name="cus_gender" >
                                                                <option value="" disabled>Select gender</option>
                                                                <option value="Male" selected>Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                        <div id="error_mss" style="color:#ea5455;list-style-type:none;font-size: 0.875rem;padding-top: 0.2rem;"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="cus_add">Address <span class="err">*</span></label>
                                                            <textarea class="form-control" name="cus_add" id="cus_add" rows="1" placeholder="Enter address" >dsdgf</textarea>
                                                            <div id="add_error" style="color:#ea5455;list-style-type:none;font-size: 0.875rem;padding-top: 0.2rem;"></div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="cus_city">City <span class="err">*</span></label>
                                                            <input type="text" class="form-control" name="cus_city" id="cus_city" placeholder="Enter city" value="m">
                                                            <div id="city_error" style="color:#ea5455;list-style-type:none;font-size: 0.875rem;padding-top: 0.2rem;"></div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                        <label for="cus_state">State <span class="err">*</span></label>
                                                        <input type="text" class="form-control" name="cus_state" id="cus_state" placeholder="Enter state" value="m">
                                                            <div id="state_error" style="color:#ea5455;list-style-type:none;font-size: 0.875rem;padding-top: 0.2rem;"></div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="cus_pin_code">PinCode <span class="err">*</span></label>
                                                            <input type="text" class="form-control number_only" name="cus_pin_code" id="cus_pin_code" maxlength="6" placeholder="Enter Pincode" value="111111">
                                                            <div id="pincode_error" style="color:#ea5455; font-size: 0.875rem; padding-top: 0.2rem;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-12 mb-1">
                                                    <h4 class="card-title">User Form</h4>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="cus_login_name">User Login Name <span class="err">*</span></label>
                                                            <input type="text" class="form-control" id="cus_login_name" name="cus_login_name" placeholder="Enter User Name">
                                                            <div id="user_login_name_error" style="color:#ea5455; font-size: 0.875rem; padding-top: 0.2rem;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="cus_password">Password <span class="err">*</span></label>
                                                            <div style="position: relative; ">
                                                                <input type="password" class="form-control"  id="cus_password" name="cus_password" placeholder="Enter password" value="Munusamy@7019">
                                                                <i class="fa fa-eye" id="togglePassword" 
                                                                style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                                                            </div>
                                                            <div id="password_empty_error" style="color:#ea5455; font-size: 0.875rem; padding-top: 0.2rem;"></div>
                                                            <div id="password_error" style="color:#ea5455; font-size: 0.875rem; padding-top: 0.2rem;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="cus_confirm_password">Confirm Password <span class="err">*</span></label>
                                                            <div style="position: relative;">
                                                                <input type="password" class="form-control" id="cus_confirm_password" name="cus_confirm_password" placeholder="Enter Confirm password" value="Munusamy@7019">
                                                                <i class="fa fa-eye" id="toggleConfirmPassword" 
                                                                style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                                                            </div>
                                                            <div id="confirm_password_empty_error" style="color:#ea5455; font-size: 0.875rem; padding-top: 0.2rem;"></div>
                                                            <div id="confirm_password_match_error" style="color:#ea5455; font-size: 0.875rem; padding-top: 0.2rem;"></div>
                                                            <div id="confirm_password_error" style="color:#ea5455; font-size: 0.875rem; padding-top: 0.2rem;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="button" id="submitBtn" class="btn btn-primary">Submit</button>
                                                <button type="button" id="" class="btn btn-primary">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
$(document).on('keyup', '#cus_password', function() {
    var password = document.getElementById('cus_password').value;
    var confirm_password = document.getElementById('cus_confirm_password').value;
    var password_error = document.getElementById('password_error');
    var confirm_password_error = document.getElementById('confirm_password_error');
    var password_empty_error = document.getElementById('password_empty_error');
    var confirm_password_empty_error = document.getElementById('confirm_password_empty_error');
    var confirm_password_match_error = document.getElementById('confirm_password_match_error');
    var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    var isValid = true;
    password_empty_error.innerText = "";
    if(password.length > 0 && !passwordPattern.test(password)){
        password_error.innerText = "Password must be at least 8 characters, include uppercase, lowercase, number, and special character.";
        $('#cus_password').attr('style', 'border: 1px solid #ea5455 !important;');
        isValid = false;

    }else{
        password_error.innerText = "";
        $('#cus_password').attr('style', '');
    }
    if(confirm_password.length > 0 && password !== confirm_password){
        confirm_password_match_error.innerText = "confirm Passwords do not match.";
        $('#cus_confirm_password').attr('style', 'border: 1px solid #ea5455 !important;');
        isValid = false;
    }else{
        confirm_password_match_error.innerText = "";
        $('#cus_confirm_password').attr('style', '');
    }
    return isValid;
});


$(document).on('keyup', '#cus_confirm_password', function() {

    var password = document.getElementById('cus_password').value;
    var confirm_password = document.getElementById('cus_confirm_password').value;
    var password_error = document.getElementById('password_error');
    var confirm_password_error = document.getElementById('confirm_password_error');
    var password_empty_error = document.getElementById('password_empty_error');
    var confirm_password_empty_error = document.getElementById('confirm_password_empty_error');
    var confirm_password_match_error = document.getElementById('confirm_password_match_error');
    var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    var isValid = true;
    confirm_password_empty_error.innerText = "";

    if(password.length > 0 && !passwordPattern.test(password)){
        password_error.innerText = "Password must be at least 8 characters, include uppercase, lowercase, number, and special character.";
        $('#cus_password').attr('style', 'border: 1px solid #ea5455 !important;');
        isValid = false;

    }else{
        password_error.innerText = "";
        $('#cus_password').attr('style', '');
    }
    if(confirm_password.length > 0 && password !== confirm_password){
        confirm_password_match_error.innerText = "confirm Passwords do not match.";
        $('#cus_confirm_password').attr('style', 'border: 1px solid #ea5455 !important;');
        isValid = false;
    }else{
        confirm_password_match_error.innerText = "";
        $('#cus_confirm_password').attr('style', '');
    }
    return isValid;
});

function select_validate(idname,error_mss,message){
    var select_val = $('#' + idname).val();
    if(select_val == "" || select_val == null){
        $('#' + error_mss).text(message);
        $('.select2-selection').css('border', '1px solid #ea5455');
        return false;
    }else{
        $('#' + error_mss).text("");
        $('.select2-selection').css('border', '');
        return true;
    }
}
$(document).on('change', '#cus_gender', function() {
    $('.select2-selection').css('border', '');
    $("#error_mss").text("");
});


function dob_validate(a){

    var dob = $('#' + a).val();
    var selectedDate = new Date(dob);
    var today = new Date();
    var minAllowedDate = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());
    var isValid = true;
    if(dob === ''){
        dob_error.innerText = "This Date of Birth field is required.";
        $('#' + a).addClass("error-border");
        
        isValid = false;
    }
    else if (selectedDate > minAllowedDate) {
        dob_error.innerText = "You must be at least 18 years of age to continue.";
        $('#' + a).addClass("error-border");
        isValid = false;
    }else{
        dob_error.innerText = "";
        $('#' + a).removeClass("error-border");
    }
    return isValid;

}

$(document).on('change', '#cus_dob', function() {
    dob_validate("cus_dob");
});
$(document).on('click', '#cus_dob', function() {
    $("#dob_error").text("");
    $("#cus_dob").removeClass("error-border");
    return true;
});

function email_validate(){
    var email = $('#cus_email').val();
    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    var isValid = true;
    if (email === '') {
        $('#email_error').text("This Email field is required.");
        $('#cus_email').addClass("error-border");
        isValid = false;
    } else if (!emailPattern.test(email)) {
        // $('#email_error').text("Enter a valid email address.");
        $('#cus_email').addClass("error-border");
        isValid = false;
    } else {
        $('#email_error').text("");  // Clear error message
        $('#cus_email').removeClass("error-border");
        // alert("Email is valid!");
    }   
    return isValid;
}
$(document).on('keyup', '#cus_email', function() {
    $('#email_error').text("");  // Clear error message
    $('#cus_email').removeClass("error-border");
    email_validate();
});



$(document).on('click', '#cus_mob_num', function() {
    $("#mob_error_mss").text("");
    $("#cus_mob_num").removeClass("error-border");
    return true;
});

$(document).on('keyup', '#cus_mob_num', function() {
    var cus_mob_num = $('#cus_mob_num').val();
    if(cus_mob_num.length >=1 && cus_mob_num.length < 10){
        $('#mob_error_mss').text("Enter 10 Digit mobile Number required.");
        $("#cus_mob_num").addClass("error-border");
        return false;
    }else{
        $("#mob_error_mss").text("");
        $("#cus_mob_num").removeClass("error-border");
        return true;
    }
});

$(document).on('click', '#cus_pin_code', function() {
    $("#pincode_error").text("");
    $("#cus_pin_code").removeClass("error-border");
    return true;
});

$(document).on('keyup', '#cus_pin_code', function() {
    var cus_pin_code = $('#cus_pin_code').val();
    if(cus_pin_code.length >=1 && cus_pin_code.length < 6){
        $('#pincode_error').text("Enter 6 Digit mobile Pincode.");
        $("#cus_pin_code").addClass("error-border");
        return false;
    }else{
        $("#pincode_error").text("");
        $("#cus_pin_code").removeClass("error-border");
        return true;
    }
});

$(document).on('click', '#cus_password', function() {
    $("#password_empty_error").text("");
    $('#cus_password').attr('style', '');
    return true;
});

$(document).on('click', '#cus_confirm_password', function() {
    $("#confirm_password_empty_error").text("");
    $('#cus_confirm_password').attr('style', '');
    return true;
});

$(document).on('click', '#cus_first_name', function() {
    $("#fir_name_err").text("");
    $("#cus_first_name").removeClass("error-border");
    return true;
});

$(document).on('click', '#cust_last_name', function() {
    $("#las_name_err").text("");
    $("#cust_last_name").removeClass("error-border");
    return true;
});



$(document).on('click', '#cus_add', function() {
    $("#add_error").text("");
    $("#cus_add").removeClass("error-border");
    return true;
});
$(document).on('click', '#cus_city', function() {
    $("#city_error").text("");
    $("#cus_city").removeClass("error-border");
    return true;
});
$(document).on('click', '#cus_state', function() {
    $("#state_error").text("");
    $("#cus_state").removeClass("error-border");
    return true;
});

$(document).on('click', '#cus_email', function() {
    $("#email_error").text("");
    $("#cus_email").removeClass("error-border");
    return true;
});

$(document).on('click', '#cus_login_name', function() {
    $("#user_login_name_error").text("");
    $("#cus_login_name").removeClass("error-border");
    return true;
});

// function isNotOnlyNumbers($input) {
//     return !preg_match('/^\d+$/', $input);
// }



function fnvalidate() {

    var isValid = true; // Track validation status

    var cus_login_name = $('#cus_login_name').val();

    if (cus_login_name === '') {
        $('#user_login_name_error').text("This User Login Name field is required.");
        $("#cus_login_name").addClass("error-border");
        isValid = false;
    } else if (cus_login_name.length < 6) {
        $('#user_login_name_error').text("Enter 6 Letters User Login Name.");
        $("#cus_login_name").addClass("error-border");
        isValid = false;
    } else if(/^\d+$/.test(cus_login_name)){
        $('#user_login_name_error').text("Enter containe letters User Login Name.");
        $("#cus_login_name").addClass("error-border");
        isValid = false;
    }else{
        $('#user_login_name_error').text("");
        $("#cus_login_name").removeClass("error-border");
    }
    

    if (!select_validate("cus_gender", "error_mss", "This Gender field is required.")) {
        isValid = false;
    }
    if (!email_validate()) {
        isValid = false;
    }
    

    if (!dob_validate("cus_dob")){
        isValid = false;
    };

    var cus_first_name = $('#cus_first_name').val();

    if (cus_first_name === '') {
        $('#fir_name_err').text("This First Name field is required.");
        $("#cus_first_name").addClass("error-border");
        isValid = false;
    }


    var cust_last_name = $('#cust_last_name').val();

    if (cust_last_name === '') {
        $('#las_name_err').text("This Last Name field is required.");
        $("#cust_last_name").addClass("error-border");
        isValid = false;
    }

    var cus_add = $('#cus_add').val();

    if (cus_add === '') {
        $('#add_error').text("This Address field is required.");
        $("#cus_add").addClass("error-border");
        isValid = false;
    }
    var cus_city = $('#cus_city').val();

    if (cus_city === '') {
        $('#city_error').text("This City field is required.");
        $("#cus_city").addClass("error-border");
        isValid = false;
    }

    var cus_state = $('#cus_state').val();

    if (cus_state === '') {
        $('#state_error').text("This Last Name field is required.");
        $("#cus_state").addClass("error-border");
        isValid = false;
    }

    var cus_mob_num = $('#cus_mob_num').val();

    if (cus_mob_num === '') {
        $('#mob_error_mss').text("This Mobile Number field is required.");
        $("#cus_mob_num").addClass("error-border");
        isValid = false;
    } else if (cus_mob_num.length < 10) {
        $('#mob_error_mss').text("Enter 10-digit mobile number.");
        $("#cus_mob_num").addClass("error-border");
        isValid = false;
    } else {
        $('#mob_error_mss').text("");
        $("#cus_mob_num").removeClass("error-border");
    }

    var cus_pin_code = $('#cus_pin_code').val();
    if (cus_pin_code === '') {
        $('#pincode_error').text("This Pincode field is required.");
        $("#cus_pin_code").addClass("error-border");
        isValid = false;
    } else if (cus_pin_code.length < 6) {
        $('#pincode_error').text("Enter 6-digit Pincode.");
        $("#cus_pin_code").addClass("error-border");
        isValid = false;
    } else {
        $('#pincode_error').text("");
        $("#cus_pin_code").removeClass("error-border");
    }

    

    var password = document.getElementById("cus_password").value;
    var confirm_password = document.getElementById("cus_confirm_password").value;
    var password_empty_error = document.getElementById('password_empty_error');
    var confirm_password_empty_error = document.getElementById('confirm_password_empty_error');
    var confirm_password_error = document.getElementById('confirm_password_error');
    var password_empty_error = document.getElementById('password_empty_error');
    var confirm_password_empty_error = document.getElementById('confirm_password_empty_error');
    var confirm_password_match_error = document.getElementById('confirm_password_match_error');

    var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    if(password == ''){
        password_empty_error.innerText = "password cannot be empty.";
        $('#cus_password').attr('style', 'border: 1px solid #ea5455 !important;');
        isValid = false;
    }else{
        password_empty_error.innerText = "";
        $('#cus_password').attr('style', '');

    }

    if(confirm_password == ''){
        confirm_password_empty_error.innerText = "Confirm password cannot be empty.";
        $('#cus_confirm_password').attr('style', 'border: 1px solid #ea5455 !important;');
        isValid = false;
    }else{
        confirm_password_empty_error.innerText = "";
        $('#cus_confirm_password').attr('style', '');
    }

    if(password.length > 0 && !passwordPattern.test(password)){
        password_error.innerText = "Password must be at least 8 characters, include uppercase, lowercase, number, and special character.";
        $('#cus_password').addClass('error-border');
        isValid = false;
    }else{
        password_error.innerText = "";
        $('#cus_password').removeClass('error-border');
    }
    if(confirm_password.length > 0 && password !== confirm_password){
        confirm_password_match_error.innerText = "confirm Passwords do not match.";
        $('#cus_confirm_password').addClass("error-border");
        isValid = false;
    }else{
        confirm_password_match_error.innerText = "";
        $('#cus_confirm_password').removeClass("error-border");
    }

    return isValid;
}


$('#cus_login_name').on('change', function() {
    var cus_login_name = $('#cus_login_name').val();
    $.ajax({
        url: 'includes/api/unique_data.php',
        type: 'POST',
        data: {'user_name':cus_login_name,'mode':'CHECK_USER_NAME'},
        success: function(response) {
            response = response.trim();
            if(response == 1){
                $('#user_login_name_error').text("This "+cus_login_name+" User Login Name Already Taken.");
                $("#cus_login_name").addClass("error-border");
                $('#cus_login_name').val('');
            }else{
                $('#user_login_name_error').text("");
                $("#cus_login_name").removeClass("error-border");
            }
        }
    });
});


$('#submitBtn').on('click', function(event) {
    if (!fnvalidate()) {
        event.preventDefault(); // Stop form submission
        return false; 
    }

    var formData = new FormData($('#myForm')[0]); // Get form data
    formData.append('mode', 'CUSTOMER_DETAILES_INSERT');
    // for (var pair of formData.entries()) {
    // console.log(pair[0] + ': ' + pair[1]);
    // }
    // return false; 
    $.ajax({
        url: 'includes/api/data_store.php', // Replace with your server-side script
        type: 'POST',
        data: formData,
        processData: false, 
        contentType: false,
        success: function(response) {
            response = response.trim();
            if (response === 'SUCCESS') {
                    window.location.href = "login.php";
            } else {

            }
        }
    });
});



</script>
</html>





