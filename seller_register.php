<?php 
    $p_img = "assets/default_img/default_img.jpg";
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <!-- <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT"> -->
    <title>e-commerce - Seller Register</title>

    <?php include_once("includes/common/css-frontend-js.php"); ?>
    <style>
    .error-border {
        border: 1px solid #ea5455 !important; /* Red border for errors */
    }
    .error-border-image {
        border: 2px dashed #ea5455 !important; /* Red border for errors */
    }
    .image-preview-container {
    position: relative;
    width: 220px; /* Adjust as needed */
    height: 220px; /* Adjust as needed */
    /* border: 2px dashed rgb(178, 172, 248); */
    border: 2px dashed #d9d9d9;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    overflow: hidden; /* Ensure overflow is hidden */
    background-color:rgb(252, 246, 246); /* Optional: background color for container */
}

.image-preview {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    padding: 6px;
}

.image-preview img {
    width: 100%;
    height: 100%;
    
}

.remove-icon {
    position: absolute;
    top: 0px;
    right: 0px;
    width: 18px; /* Adjust size as needed */
    height: 18px;
    border-radius: 50%; /* Round shape */
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    color: white; /* Text color */
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 18px;
    font-weight: bold;
    text-align: center;
    line-height: 1;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    z-index: 10; /* Ensure it's above other content */
}

.remove-icon:hover {
    background-color: rgba(255, 0, 0, 0.7); /* Change background color on hover */
}

.placeholder {
    position: absolute; /* Make sure it is positioned within the container */
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    color: #aaa;
    font-size: 14px;
    text-align: center; 
}
    
    </style>

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
                <div class="content-header-left col-md-9 col-12">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Input</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Seller Register</a>
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
                                    <h4 class="card-title">Seller Register Form</h4>
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
                                                            <label for="sell_first_name">First Name <span class="err">*</span> </label>
                                                            <input type="text" class="form-control" id="sell_first_name" name="sell_first_name" placeholder="Enter First Name" value="s">
                                                            <div id="fir_name_err" style="color:#ea5455;list-style-type:none;font-size: 0.875rem;padding-top: 0.2rem;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="sell_last_name">Last Name <span class="err">*</span></label>
                                                            <input type="text" class="form-control" id="sell_last_name" name="sell_last_name"  placeholder="Enter Last Name" value="s">
                                                            <div id="las_name_err" style="color:#ea5455;list-style-type:none;font-size: 0.875rem;padding-top: 0.2rem;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="sell_dob">Date of Birth <span class="err">*</span></label>
                                                            <!-- <input type="text" class="form-control date_picker" placeholder="Select the Date of Birth" id="sell_dob" name="sell_dob" required data-validation-required-message="This Date of Birth field is required" > -->
                                                            <input type="text" class="form-control pickadate-months-year" placeholder="Select the Date of Birth" id="sell_dob" name="sell_dob" value="20 March, 2001">
                                                            <div id="dob_error" style="color:#ea5455;list-style-type:none;font-size: 0.875rem;padding-top: 0.2rem;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="sell_mob_num">Mobile Number <span class="err">*</span></label>
                                                            <input type="tel" class="form-control number_only" maxlength="10" id="sell_mob_num" name="sell_mob_num" placeholder="Enter mobile number"  value="1111111111">
                                                        </div>
                                                        <div id="mob_error_mss" style="color:#ea5455;list-style-type:none;font-size: 0.875rem;padding-top: 0.2rem;"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                        <label for="sell_email">Email <span class="err">*</span></label>
                                                        <input type="email" class="form-control" id="sell_email" name="sell_email" placeholder="Enter Email" value="m@gmail.com">
                                                        <div id="email_error" style="color:#ea5455;list-style-type:none;font-size: 0.875rem;padding-top: 0.2rem;"></div>
                                                        <!-- <input type="email" class="form-control" id="sell_email" name="sell_email" placeholder="Enter email" required data-validation-required-message="This Email field is required" > -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="sell_gender">Gender <span class="err">*</span></label>
                                                            <select class="form-control select2" id="sell_gender" name="sell_gender" >
                                                                <option value="" disabled>Select gender</option>
                                                                <option value="male" selected>Male</option>
                                                                <option value="female">Female</option>
                                                                <option value="other">Other</option>
                                                            </select>
                                                        </div>
                                                        <div id="error_mss" style="color:#ea5455;list-style-type:none;font-size: 0.875rem;padding-top: 0.2rem;"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="sell_add">Address <span class="err">*</span></label>
                                                            <textarea class="form-control" name="sell_add" id="sell_add" rows="1" placeholder="Enter address" >dsdgf</textarea>
                                                            <div id="add_error" style="color:#ea5455;list-style-type:none;font-size: 0.875rem;padding-top: 0.2rem;"></div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="sell_city">City <span class="err">*</span></label>
                                                            <input type="text" class="form-control" name="sell_city" id="sell_city" placeholder="Enter city" value="m">
                                                            <div id="city_error" style="color:#ea5455;list-style-type:none;font-size: 0.875rem;padding-top: 0.2rem;"></div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                        <label for="sell_state">State <span class="err">*</span></label>
                                                        <input type="text" class="form-control" name="sell_state" id="sell_state" placeholder="Enter state" value="m">
                                                            <div id="state_error" style="color:#ea5455;list-style-type:none;font-size: 0.875rem;padding-top: 0.2rem;"></div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="sell_pin_code">PinCode <span class="err">*</span></label>
                                                            <input type="text" class="form-control number_only" name="sell_pin_code" id="sell_pin_code" maxlength="6" placeholder="Enter Pincode" value="111111">
                                                            <div id="pincode_error" style="color:#ea5455; font-size: 0.875rem; padding-top: 0.2rem;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="sell_aadhar_no">Aadhar Card No. <span class="err">*</span></label>
                                                            <input type="text" class="form-control number_only" name="sell_aadhar_no" id="sell_aadhar_no" maxlength="12" placeholder="Enter Aadhar Card No." value="111111111111">
                                                            <div id="aadhar_error" style="color:#ea5455; font-size: 0.875rem; padding-top: 0.2rem;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="sell_pan_no">Pan Card No. <span class="err">*</span></label>
                                                            <input type="text" class="form-control" name="sell_pan_no" id="sell_pan_no" maxlength="10" placeholder="Enter Pan Card No." value="1111111111">
                                                            <div id="pan_error" style="color:#ea5455; font-size: 0.875rem; padding-top: 0.2rem;"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label >Seller photo<span class="err">*</span></label>
                                                            <div class="image-preview-container" id="demo" onclick="$('#sell_photo').click()">
                                                                <div id="sell_photo_preview" class="image-preview">
                                                                    <img id="sell_initil_photo" class="initial-image" src="<?php echo $p_img; ?>">
                                                                    <div id="sell_placeholder" class="placeholder" >Drop an image or click to upload</div>
                                                                </div>
                                                                <div id="removeIcon" class="remove-icon">×</div>
                                                            </div>
                                                            <div id="sell_photo_error" style="color:#ea5455; font-size: 0.875rem; padding-top: 0.2rem;"></div>
                                                            <input type="file" id="sell_photo" name="sell_photo" accept="image/*" style="display:none">
                                                            <input type="hidden" value="<?php echo $pro_imge; ?>"  name="hidd_sell_photo" id="hidd_sell_photo">
                                                            <input type="hidden" value="" name="hidd_sell_photo_del" id="hidd_sell_photo_del">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label >Aadhar photo<span class="err">*</span></label>
                                                            <div class="image-preview-container" id="demo1" onclick="$('#sell_aadhar_photo').click()">
                                                                <div id="sell_aadhar_preview" class="image-preview">
                                                                    <img id="sell_initil_aadhar" class="initial-image" src="<?php echo $p_img; ?>">
                                                                    <div id="sell_aadhar_placeholder" class="placeholder" >Drop an image or click to upload</div>
                                                                </div>
                                                                <div id="aadar_removeIcon" class="remove-icon">×</div>
                                                            </div>
                                                            <div id="sell_aadhar_photo_error" style="color:#ea5455; font-size: 0.875rem; padding-top: 0.2rem;"></div>
                                                            <input type="file" id="sell_aadhar_photo" name="sell_aadhar_photo" accept="image/*" style="display:none">
                                                            <input type="hidden" value="<?php echo $pro_imge; ?>"  name="hidd_sell_aadhar_photo" id="hidd_sell_aadhar_photo">
                                                            <input type="hidden" value="" name="hidd_sell_aadhar_photo_del" id="hidd_sell_aadhar_photo_del">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-12 col-12 mb-1">
                                                    <h4 class="card-title">User Form</h4>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="sell_login_name">User Name <span class="err">*</span></label>
                                                            <input type="text" class="form-control" id="sell_login_name" name="sell_login_name" placeholder="Enter User Name">
                                                            <div id="user_name_error" style="color:#ea5455; font-size: 0.875rem; padding-top: 0.2rem;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="sell_password">Password <span class="err">*</span></label>
                                                            <div style="position: relative; ">
                                                                <input type="password" class="form-control"  id="sell_password" name="sell_password" placeholder="Enter password" value="Munusamy@7019">
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
                                                            <label for="sell_confirm_password">Confirm Password <span class="err">*</span></label>
                                                            <div style="position: relative;">
                                                                <input type="password" class="form-control" id="sell_confirm_password" name="sell_confirm_password" placeholder="Enter Confirm password" value="Munusamy@7019">
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
    togglePassword('sell_password', 'togglePassword');
});

document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
    togglePassword('sell_confirm_password', 'toggleConfirmPassword');
});
$(document).on('keyup', '#sell_password', function() {
    var password = document.getElementById('sell_password').value;
    var confirm_password = document.getElementById('sell_confirm_password').value;
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
        $('#sell_password').attr('style', 'border: 1px solid #ea5455 !important;');
        isValid = false;

    }else{
        password_error.innerText = "";
        $('#sell_password').attr('style', '');
    }
    if(confirm_password.length > 0 && password !== confirm_password){
        confirm_password_match_error.innerText = "confirm Passwords do not match.";
        $('#sell_confirm_password').attr('style', 'border: 1px solid #ea5455 !important;');
        isValid = false;
    }else{
        confirm_password_match_error.innerText = "";
        $('#sell_confirm_password').attr('style', '');
    }
    return isValid;
});

$(document).on('keyup', '#sell_confirm_password', function() {

    var password = document.getElementById('sell_password').value;
    var confirm_password = document.getElementById('sell_confirm_password').value;
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
        $('#sell_password').attr('style', 'border: 1px solid #ea5455 !important;');
        isValid = false;

    }else{
        password_error.innerText = "";
        $('#sell_password').attr('style', '');
    }
    if(confirm_password.length > 0 && password !== confirm_password){
        confirm_password_match_error.innerText = "confirm Passwords do not match.";
        $('#sell_confirm_password').attr('style', 'border: 1px solid #ea5455 !important;');
        isValid = false;
    }else{
        confirm_password_match_error.innerText = "";
        $('#sell_confirm_password').attr('style', '');
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
$(document).on('change', '#sell_gender', function() {
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

$(document).on('change', '#sell_dob', function() {
    dob_validate("sell_dob");
});
$(document).on('click', '#sell_dob', function() {
    $("#dob_error").text("");
    $("#sell_dob").removeClass("error-border");
    return true;
});

function email_validate(){
    var email = $('#sell_email').val();
    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    var isValid = true;
    if (email === '') {
        $('#email_error').text("This Email field is required.");
        $('#sell_email').addClass("error-border");
        isValid = false;
    } else if (!emailPattern.test(email)) {
        // $('#email_error').text("Enter a valid email address.");
        $('#sell_email').addClass("error-border");
        isValid = false;
    } else {
        $('#email_error').text("");  // Clear error message
        $('#sell_email').removeClass("error-border");
    }   
    return isValid;
}
$(document).on('keyup', '#sell_email', function() {
    $('#email_error').text("");  // Clear error message
    $('#sell_email').removeClass("error-border");
    email_validate();
});



$(document).on('click', '#sell_mob_num', function() {
    $("#mob_error_mss").text("");
    $("#sell_mob_num").removeClass("error-border");
    return true;
});

$(document).on('keyup', '#sell_mob_num', function() {
    var sell_mob_num = $('#sell_mob_num').val();
    if(sell_mob_num.length >=1 && sell_mob_num.length < 10){
        $('#mob_error_mss').text("Enter 10 Digit mobile Number required.");
        $("#sell_mob_num").addClass("error-border");
        return false;
    }else{
        $("#mob_error_mss").text("");
        $("#sell_mob_num").removeClass("error-border");
        return true;
    }
});

$(document).on('click', '#sell_aadhar_no', function() {
    $("#aadhar_error").text("");
    $("#sell_aadhar_no").removeClass("error-border");
    return true;
});

$(document).on('keyup', '#sell_aadhar_no', function() {
    var sell_aadhar_no = $('#sell_aadhar_no').val();
    if(sell_aadhar_no.length >=1 && sell_aadhar_no.length < 12){
        $('#aadhar_error').text("Enter 12 Digit Aadhar Card Number required.");
        $("#sell_aadhar_no").addClass("error-border");
        return false;
    }else{
        $("#aadhar_error").text("");
        $("#sell_aadhar_no").removeClass("error-border");
        return true;
    }
});

$(document).on('click', '#sell_pan_no', function() {
    $("#pan_error").text("");
    $("#sell_pan_no").removeClass("error-border");
    return true;
});

$(document).on('keyup', '#sell_pan_no', function() {
    var sell_pan_no = $('#sell_pan_no').val();
    if(sell_pan_no.length >=1 && sell_pan_no.length < 10){
        $('#pan_error').text("Enter 10 Digit Pan Card Number required.");
        $("#sell_pan_no").addClass("error-border");
        return false;
    }else{
        $("#pan_error").text("");
        $("#sell_pan_no").removeClass("error-border");
        return true;
    }
});

$(document).on('click', '#sell_pin_code', function() {
    $("#pincode_error").text("");
    $("#sell_pin_code").removeClass("error-border");
    return true;
});

$(document).on('keyup', '#sell_pin_code', function() {
    var sell_pin_code = $('#sell_pin_code').val();
    if(sell_pin_code.length >=1 && sell_pin_code.length < 6){
        $('#pincode_error').text("Enter 6 Digit mobile Pincode.");
        $("#sell_pin_code").addClass("error-border");
        return false;
    }else{
        $("#pincode_error").text("");
        $("#sell_pin_code").removeClass("error-border");
        return true;
    }
});

$(document).on('click', '#sell_password', function() {
    $("#password_empty_error").text("");
    $('#sell_password').attr('style', '');
    return true;
});

$(document).on('click', '#sell_confirm_password', function() {
    $("#confirm_password_empty_error").text("");
    $('#sell_confirm_password').attr('style', '');
    return true;
});

$(document).on('click', '#sell_first_name', function() {
    $("#fir_name_err").text("");
    $("#sell_first_name").removeClass("error-border");
    return true;
});

$(document).on('click', '#sell_last_name', function() {
    $("#las_name_err").text("");
    $("#sell_last_name").removeClass("error-border");
    return true;
});



$(document).on('click', '#sell_add', function() {
    $("#add_error").text("");
    $("#sell_add").removeClass("error-border");
    return true;
});
$(document).on('click', '#sell_city', function() {
    $("#city_error").text("");
    $("#sell_city").removeClass("error-border");
    return true;
});
$(document).on('click', '#sell_state', function() {
    $("#state_error").text("");
    $("#sell_state").removeClass("error-border");
    return true;
});
$(document).on('click', '#sell_email', function() {
    $("#email_error").text("");
    $("#sell_email").removeClass("error-border");
    return true;
});
$(document).on('click', '#sell_login_name', function() {
    $("#user_name_error").text("");
    $("#sell_login_name").removeClass("error-border");
    return true;
});


function fnvalidate() {
    var isValid = true; // Track validation status

    // Validate gender selection

    var sell_login_name = $('#sell_login_name').val();

    if (sell_login_name === '') {
        $('#user_name_error').text("This User Login Name field is required.");
        $("#sell_login_name").addClass("error-border");
        isValid = false;
    } else if (sell_login_name.length < 6) {
        $('#user_name_error').text("Enter 6 Letters User Login Name.");
        $("#sell_login_name").addClass("error-border");
        isValid = false;
    } else if(/^\d+$/.test(sell_login_name)){
        $('#user_name_error').text("Enter containe letters User Login Name.");
        $("#sell_login_name").addClass("error-border");
        isValid = false;
    }else{
        $('#user_name_error').text("");
        $("#sell_login_name").removeClass("error-border");
    }


    var sell_photo = $('#sell_photo').val();

    if(sell_photo === ''){
        $("#sell_photo_error").text("this Seller Photo field is sequired.");
        $("#demo").addClass("error-border-image");
        isValid = false;
    }

    var sell_aadhar_photo = $('#sell_aadhar_photo').val();

    if(sell_aadhar_photo === ''){
        $("#sell_aadhar_photo_error").text("this Aadhar Photo field is sequired.");
        $("#demo1").addClass("error-border-image");
        isValid = false;
    }

    if (!select_validate("sell_gender", "error_mss", "This Gender field is required.")) {
        isValid = false;
    }
    if (!email_validate()) {
        isValid = false;
    }
    

    if (!dob_validate("sell_dob")){
        isValid = false;
    };

    

    var sell_first_name = $('#sell_first_name').val();

    if (sell_first_name === '') {
        $('#fir_name_err').text("This First Name field is required.");
        $("#sell_first_name").addClass("error-border");
        isValid = false;
    }


    var sell_last_name = $('#sell_last_name').val();

    if (sell_last_name === '') {
        $('#las_name_err').text("This Last Name field is required.");
        $("#sell_last_name").addClass("error-border");
        isValid = false;
    }

    var sell_add = $('#sell_add').val();

    if (sell_add === '') {
        $('#add_error').text("This Address field is required.");
        $("#sell_add").addClass("error-border");
        isValid = false;
    }
    var sell_city = $('#sell_city').val();

    if (sell_city === '') {
        $('#city_error').text("This City field is required.");
        $("#sell_city").addClass("error-border");
        isValid = false;
    }

    var sell_state = $('#sell_state').val();

    if (sell_state === '') {
        $('#state_error').text("This Last Name field is required.");
        $("#sell_state").addClass("error-border");
        isValid = false;
    }

    var sell_mob_num = $('#sell_mob_num').val();

    if (sell_mob_num === '') {
        $('#mob_error_mss').text("This Mobile Number field is required.");
        $("#sell_mob_num").addClass("error-border");
        isValid = false;
    } else if (sell_mob_num.length < 10) {
        $('#mob_error_mss').text("Enter 10-digit mobile number.");
        $("#sell_mob_num").addClass("error-border");
        isValid = false;
    } else {
        $('#mob_error_mss').text("");
        $("#sell_mob_num").removeClass("error-border");
    }

    var sell_aadhar_no = $('#sell_aadhar_no').val();

    if (sell_aadhar_no === '') {
        $('#aadhar_error').text("This Aadhar Card No. field is required.");
        $("#sell_aadhar_no").addClass("error-border");
        isValid = false;
    } else if (sell_aadhar_no.length < 12) {
        $('#aadhar_error').text("Enter 12-digit Aadhar Card No. .");
        $("#sell_aadhar_no").addClass("error-border");
        isValid = false;
    } else {
        $('#aadhar_error').text("");
        $("#sell_aadhar_no").removeClass("error-border");
    }


    var sell_pan_no = $('#sell_pan_no').val();

    if (sell_pan_no === '') {
        $('#pan_error').text("This Pan Card No. field is required.");
        $("#sell_pan_no").addClass("error-border");
        isValid = false;
    } else if (sell_pan_no.length < 10) {
        $('#pan_error').text("Enter 12-digit Pan Card No. .");
        $("#sell_pan_no").addClass("error-border");
        isValid = false;
    } else {
        $('#pan_error').text("");
        $("#sell_pan_no").removeClass("error-border");
    }

    var sell_pin_code = $('#sell_pin_code').val();
    if (sell_pin_code === '') {
        $('#pincode_error').text("This Pincode field is required.");
        $("#sell_pin_code").addClass("error-border");
        isValid = false;
    } else if (sell_pin_code.length < 6) {
        $('#pincode_error').text("Enter 6-digit Pincode.");
        $("#sell_pin_code").addClass("error-border");
        isValid = false;
    } else {
        $('#pincode_error').text("");
        $("#sell_pin_code").removeClass("error-border");
    }

    

    var password = document.getElementById("sell_password").value;
    var confirm_password = document.getElementById("sell_confirm_password").value;
    var password_empty_error = document.getElementById('password_empty_error');
    var confirm_password_empty_error = document.getElementById('confirm_password_empty_error');
    var confirm_password_error = document.getElementById('confirm_password_error');
    var password_empty_error = document.getElementById('password_empty_error');
    var confirm_password_empty_error = document.getElementById('confirm_password_empty_error');
    var confirm_password_match_error = document.getElementById('confirm_password_match_error');

    var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    if(password == ''){
        password_empty_error.innerText = "password cannot be empty.";
        $('#sell_password').attr('style', 'border: 1px solid #ea5455 !important;');
        isValid = false;
    }else{
        password_empty_error.innerText = "";
        $('#sell_password').attr('style', '');

    }

    if(confirm_password == ''){
        confirm_password_empty_error.innerText = "Confirm password cannot be empty.";
        $('#sell_confirm_password').attr('style', 'border: 1px solid #ea5455 !important;');
        isValid = false;
    }else{
        confirm_password_empty_error.innerText = "";
        $('#sell_confirm_password').attr('style', '');
    }

    if(password.length > 0 && !passwordPattern.test(password)){
        password_error.innerText = "Password must be at least 8 characters, include uppercase, lowercase, number, and special character.";
        $('#sell_password').addClass('error-border');
        isValid = false;

    }else{
        password_error.innerText = "";
        $('#sell_password').removeClass('error-border');
    }
    if(confirm_password.length > 0 && password !== confirm_password){
        confirm_password_match_error.innerText = "confirm Passwords do not match.";
        $('#sell_confirm_password').addClass("error-border");
        isValid = false;
    }else{
        confirm_password_match_error.innerText = "";
        $('#sell_confirm_password').removeClass("error-border");
    }

    
    return isValid;
}

$('#sell_login_name').on('change', function() {

   var sell_login_name = $('#sell_login_name').val();

   alert(sell_login_name)
   consol.log(sell_login_name)

    $.ajax({
        url: 'includes/api/unique_data.php',
        type: 'POST',
        data: {'user_name':sell_login_name,'mode':'CHECK_USER_NAME'},
        success: function(response) {
            response = response.trim();
            if(response == 1){
                $('#user_name_error').text("This "+sell_login_name+" User Login Name Already Taken.");
                $("#sell_login_name").addClass("error-border");
                $('#sell_login_name').val('');
                // isValid = false;
            }else{
                $('#user_name_error').text("");
                $("#sell_login_name").removeClass("error-border");
                // isValid = true;
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
    formData.append('mode', 'SELLER_DETAILES_INSERT'); // Add custom data

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


$(document).ready(function() {

    if($("#sell_initil_photo").attr("src")){
        $("#removeIcon").show();
        $("#sell_placeholder").hide();
    }else{
        $("#removeIcon").hide();
        $("#sell_placeholder").show();
    }

    function showImagePreview(file) {
        let reader = new FileReader();
        reader.onload = function(e) {
            let image = new Image();
            image.src = e.target.result;
            image.onload = function() {
                $("#sell_photo_preview").html('');
                $("#sell_photo_preview").append(image);
                $("#removeIcon").show();
                $("#sell_placeholder").hide();
            }
        }
        reader.readAsDataURL(file);
    }
    function resetImagePreview() {
        $("#sell_photo_preview").html('<div id="sell_placeholder" class="placeholder">Drop an image or click to upload</div>');
        $("#removeIcon").hide();
        $("#imageDetails").text("");
        $("#sell_photo").val("");
    }
    function validateFile(file) {
        var allowedExtensions = [".jpeg", ".png", ".webp", ".jpg"];
        var fileExtension = '.' + file.type.split('/')[1];
        if (jQuery.inArray(fileExtension, allowedExtensions) === -1) {
            $("#sell_photo_error").text("Please upload a file type of jpeg, png, webp, or jpg.");
            $("#demo").addClass("error-border-image");
            resetImagePreview()
            return false;
        }
        if (file.size > 500 * 1024) {
            $("#sell_photo_error").text("Please upload a file size less than 500 KB.");
            $("#demo").addClass("error-border-image");
            resetImagePreview()
            return false;
        }
        $("#sell_photo_error").text("");
        $("#demo").removeClass("error-border-image");
        return true;
    }
    $(document).on('change','#sell_photo',function(event){
        let file = this.files[0];
        if (file && validateFile(file)) {
            showImagePreview(file);
            $("#imageDetails").text(`File name: ${file.name}`);
        } 
        else {
            // resetImagePreview();
        }
    });
    $("#removeIcon").click(function(event) {
        event.stopPropagation();
        resetImagePreview();
        var hidd_sell_photo = $('#hidd_sell_photo').val();
        $('#hidd_sell_photo_del').val(hidd_sell_photo);
    });
    $("#sell_photo_preview").on("dragover", function(event) {
        event.preventDefault();
        event.stopPropagation();
        $(this).addClass("drag-over");
    });

    $("#sell_photo_preview").on("dragleave", function(event) {
        event.preventDefault();
        event.stopPropagation();
        $(this).removeClass("drag-over");
    });

    $("#sell_photo_preview").on("drop", function(event) {
        event.preventDefault();
        event.stopPropagation();
        $(this).removeClass("drag-over");
        let files = event.originalEvent.dataTransfer.files;
        if (files.length > 0) {
            let file = files[0];
            if (validateFile(file)) {
                showImagePreview(file);
                $("#imageDetails").text(`File name: ${file.name}`);
                let dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                $("#sell_photo")[0].files = dataTransfer.files;
                $("#sell_photo").trigger("change");
            } 
            else {
            }
        }
    });

    if($("#sell_initil_aadhar").attr("src")){
        $("#aadar_removeIcon").show();
        $("#sell_aadhar_placeholder").hide();
    }else{
        $("#aadar_removeIcon").hide();
        $("#sell_aadhar_placeholder").show();
    }

    function showImagePreview1(file1) {
        let reader = new FileReader();
        reader.onload = function(e) {
            let image = new Image();
            image.src = e.target.result;
            image.onload = function() {
                $("#sell_aadhar_preview").html('');
                $("#sell_aadhar_preview").append(image);
                $("#aadar_removeIcon").show();
                $("#sell_aadhar_placeholder").hide();
            }
        }
        reader.readAsDataURL(file1);
    }
    function resetImagePreview1() {
        $("#sell_aadhar_preview").html('<div id="sell_aadhar_placeholder" class="placeholder">Drop an image or click to upload</div>');
        $("#aadar_removeIcon").hide();
        // $("#imageDetails").text("");
        $("#sell_aadhar_photo").val("");
    }
    function validateFile1(file1) {
        var allowedExtensions = [".jpeg", ".png", ".webp", ".jpg"];
        var fileExtension = '.' + file1.type.split('/')[1];
        if (jQuery.inArray(fileExtension, allowedExtensions) === -1) {
            $("#sell_aadhar_photo_error").text("Please upload a file1 type of jpeg, png, webp, or jpg.");
            $("#demo1").addClass("error-border-image");
            resetImagePreview1()
            return false;
        }
        if (file1.size > 500 * 1024) {
            $("#sell_aadhar_photo_error").text("Please upload a file1 size less than 500 KB.");
            $("#demo1").addClass("error-border-image");
            resetImagePreview1()
            return false;
        }
        $("#sell_aadhar_photo_error").text("");
        $("#demo1").removeClass("error-border-image");
        return true;
    }
    $(document).on('change','#sell_aadhar_photo',function(event){
        let file1 = this.files[0];
        if (file1 && validateFile1(file1)) {
            showImagePreview1(file1);
            // $("#imageDetails").text(`File name: ${file1.name}`);
        } 
        else {
            // resetImagePreview();
        }
    });
    $("#aadar_removeIcon").click(function(event) {
        event.stopPropagation();
        resetImagePreview1();
        var hidd_sell_aadhar_photo = $('#hidd_sell_aadhar_photo').val();
        $('#hidd_sell_aadhar_photo_del').val(hidd_sell_aadhar_photo);
    });
    $("#sell_aadhar_preview").on("dragover", function(event) {
        event.preventDefault();
        event.stopPropagation();
        $(this).addClass("drag-over");
    });

    $("#sell_aadhar_preview").on("dragleave", function(event) {
        event.preventDefault();
        event.stopPropagation();
        $(this).removeClass("drag-over");
    });

    $("#sell_aadhar_preview").on("drop", function(event) {
        event.preventDefault();
        event.stopPropagation();
        $(this).removeClass("drag-over");
        let files = event.originalEvent.dataTransfer.files;
        if (files.length > 0) {
            let file1 = files[0];
            if (validateFile1(file1)) {
                showImagePreview1(file1);
                // $("#imageDetails").text(`File name: ${file1.name}`);
                let dataTransfer = new DataTransfer();
                dataTransfer.items.add(file1);
                $("#sell_aadhar_photo")[0].files = dataTransfer.files;
                $("#sell_aadhar_photo").trigger("change");
            } 
            else {
            }
        }
    });
});


</script>
</html>





