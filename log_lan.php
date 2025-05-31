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
<script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(sendPosition, showError);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function sendPosition(position) {
            var lat = position.coords.latitude;
            var lon = position.coords.longitude;

            // Send location data to the backend using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "login.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("latitude=" + lat + "&longitude=" + lon);
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    alert("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("An unknown error occurred.");
                    break;
            }
        }
    </script>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body onload="getLocation()" class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">
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
                                        <form action="login.php" method="post">
                                            <label for="username">Username:</label>
                                            <input type="text" name="username" id="username" required><br><br>

                                            <label for="password">Password:</label>
                                            <input type="password" name="password" id="password" required><br><br>

                                            <input type="hidden" name="latitude" id="latitude">
                                            <input type="hidden" name="longitude" id="longitude">

                                            <input type="submit" name = "Location" value="Login">
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





</script>
</html>





