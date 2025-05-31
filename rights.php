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
	<title><?php echo PAGE_TITLE; ?> - Rights</title>
	<?php include_once("includes/common/css-js.php"); ?>
    <!-- <style>
        #example1 tbody tr {
    cursor: pointer;
}
#example1 tbody tr:hover td:first-child {
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
}

#example1 tbody tr:hover td:last-child {
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
}

#example1 tbody tr:hover td {
    background-color: #b8c2cc;
}
    </style> -->
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
                            <h2 class="content-header-title float-left mb-0">Rights</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Setup</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Rights</a>
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
                <!-- users edit start -->
                <section class="users-edit">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <!-- <ul class="nav nav-tabs mb-3" role="tablist"> -->
                                    <?php 

                                        // $sql = "SELECT * FROM mst_main_menu WHERE rec_del_status = 0";
                                        // $res = $conn->query($sql);
                                        // $res->execute();
                                        // $int = 1;
                                        // while($obj = $res->fetch(PDO::FETCH_OBJ))  {
                                        //     if($int == 1){
                                        //         $active = 'active';
                                                
                                        //     }else {
                                        //         $active = '';
                                        //     }
                                        //     $int++;
                                            
                                        //     echo '<li class="nav-item ">
                                        //         <a class="nav-link d-flex align-items-center '.$active.'" id="'.$obj->mm_name.'-tab" data-toggle="tab" href="#'.$obj->mm_name.'" aria-controls="'.$obj->mm_name.'" role="tab" aria-selected="true">
                                        //             <i class="'.$obj->mm_icon.' mr-25"></i><span class="d-none d-sm-block">'.$obj->mm_name.'</span>
                                        //         </a>
                                        //     </li>';
                                        // }

                                        
                                    ?>

                                    
                                    <!-- <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                            <i class="feather icon-users mr-25"></i><span class="d-none d-sm-block">Customer</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                            <i class="feather icon-shopping-bag mr-25"></i><span class="d-none d-sm-block">Seller</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" id="social-tab" data-toggle="tab" href="#social" aria-controls="social" role="tab" aria-selected="false">
                                            <i class="feather icon-truck mr-25"></i><span class="d-none d-sm-block">Transport</span>
                                        </a>
                                    </li> -->
                                <!-- </ul> -->
                                <!-- <div class="tab-content">
                                    <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel"> -->
                                        <form novalidate="">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="table-responsive border rounded px-1">
                                                        <?php 
                                                        $sql3 = "SELECT * FROM mst_main_menu WHERE rec_del_status = 0";
                                                        $res3 = $conn->query($sql3);
                                                        $res3->execute();
                                                        $a = 1;
                                                        
                                                        while($obj3 = $res3->fetch(PDO::FETCH_OBJ)) {
                                                            echo'<div class="d-flex align-items-center  border-bottom py-1 mx-1 mb-0">
                                                                <div class="custom-control custom-switch custom-switch-success">
                                                                    <input type="checkbox" class="custom-control-input" id="customSwitch'.$a.'">
                                                                    <label class="custom-control-label" for="customSwitch'.$a.'"></label>
                                                                </div>
                                                                <h6 class="mb-0 font-medium-2 ml-1">'.$obj3->mm_name.'</h6>
                                                            </div>
                                                            ';
                                                            $a++;

                                                            $sql1 = "SELECT * FROM mst_main_menu WHERE rec_del_status = 0";
                                                        $res1 = $conn->query($sql1);
                                                        $res1->execute();
                                                        $int1 = 1;

                                                        while($obj1 = $res1->fetch(PDO::FETCH_OBJ)) {
                                                            $menuId = $obj1->id;
                                                            echo'
                                                            <div class="row align-items-center mb-2 py-1 mx-1">
                                                                <div class="col-md-4">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="perm-'.$menuId.'-read">
                                                                        <label class="custom-control-label" for="perm-'.$menuId.'-read">Read</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="perm-'.$menuId.'-write">
                                                                        <label class="custom-control-label" for="perm-'.$menuId.'-write">Write</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="perm-'.$menuId.'-create">
                                                                        <label class="custom-control-label" for="perm-'.$menuId.'-create">Create</label>
                                                                    </div>
                                                                </div>
                                                            </div>';
                                                        }
                                                        }
                                                        ?>

                                                        <?php 
                                                        // $sql1 = "SELECT * FROM mst_main_menu WHERE rec_del_status = 0";
                                                        // $res1 = $conn->query($sql1);
                                                        // $res1->execute();
                                                        // $int1 = 1;

                                                        // while($obj1 = $res1->fetch(PDO::FETCH_OBJ)) {
                                                        //     $menuId = $obj1->id;
                                                        //     echo'
                                                        //     <div class="row align-items-center mb-2 py-1 mx-1">
                                                        //         <div class="col-md-4">
                                                        //             <div class="custom-control custom-checkbox">
                                                        //                 <input type="checkbox" class="custom-control-input" id="perm-'.$menuId.'-read">
                                                        //                 <label class="custom-control-label" for="perm-'.$menuId.'-read">Read</label>
                                                        //             </div>
                                                        //         </div>

                                                        //         <div class="col-md-4">
                                                        //             <div class="custom-control custom-checkbox">
                                                        //                 <input type="checkbox" class="custom-control-input" id="perm-'.$menuId.'-write">
                                                        //                 <label class="custom-control-label" for="perm-'.$menuId.'-write">Write</label>
                                                        //             </div>
                                                        //         </div>

                                                        //         <div class="col-md-4">
                                                        //             <div class="custom-control custom-checkbox">
                                                        //                 <input type="checkbox" class="custom-control-input" id="perm-'.$menuId.'-create">
                                                        //                 <label class="custom-control-label" for="perm-'.$menuId.'-create">Create</label>
                                                        //             </div>
                                                        //         </div>
                                                        //     </div>';
                                                        // }
                                                        ?>
                                                    </div>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-light">Save Changes</button>
                                                    <button type="reset" class="btn btn-outline-warning waves-effect waves-light">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                    <!-- </div> -->

                                    <!-- <div class="tab-pane" id="Seller" aria-labelledby="Seller-tab" role="tabpanel">
                                        <form novalidate="">
                                            <div class="row mt-1">
                                                <div class="col-12 col-sm-6">
                                                    <h5 class="mb-1"><i class="feather icon-user mr-25"></i>Personal Information</h5>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label>Birth date</label>
                                                                    <input type="text" class="form-control birthdate-picker picker__input" required="" placeholder="Birth date" data-validation-required-message="This birthdate field is required" readonly="" id="P1936642873" aria-haspopup="true" aria-readonly="false" aria-owns="P1936642873_root">
                                                                    <div class="picker" id="P1936642873_root" aria-hidden="true">
                                                                        <div class="picker__holder" tabindex="-1">
                                                                            <div class="picker__frame"><div class="picker__wrap">
                                                                                <div class="picker__box"><div class="picker__header">
                                                                                    <div class="picker__month">May</div>
                                                                                    <div class="picker__year">2025</div>
                                                                                    <div class="picker__nav--prev" data-nav="-1" tabindex="0" role="button" aria-controls="P1936642873_table" title="Previous month"> </div>
                                                                                    <div class="picker__nav--next" data-nav="1" tabindex="0" role="button" aria-controls="P1936642873_table" title="Next month"> </div>
                                                                                </div>
                                                                                <table class="picker__table" id="P1936642873_table" role="grid" aria-controls="P1936642873" aria-readonly="true"><thead><tr><th class="picker__weekday" scope="col" title="Sunday">Sun</th><th class="picker__weekday" scope="col" title="Monday">Mon</th><th class="picker__weekday" scope="col" title="Tuesday">Tue</th><th class="picker__weekday" scope="col" title="Wednesday">Wed</th><th class="picker__weekday" scope="col" title="Thursday">Thu</th><th class="picker__weekday" scope="col" title="Friday">Fri</th><th class="picker__weekday" scope="col" title="Saturday">Sat</th></tr></thead><tbody><tr><td><div class="picker__day picker__day--outfocus" data-pick="1745692200000" id="P1936642873_1745692200000" tabindex="0" role="gridcell" aria-label="April, 27, 2025">27</div></td><td><div class="picker__day picker__day--outfocus" data-pick="1745778600000" id="P1936642873_1745778600000" tabindex="0" role="gridcell" aria-label="April, 28, 2025">28</div></td><td><div class="picker__day picker__day--outfocus" data-pick="1745865000000" id="P1936642873_1745865000000" tabindex="0" role="gridcell" aria-label="April, 29, 2025">29</div></td><td><div class="picker__day picker__day--outfocus" data-pick="1745951400000" id="P1936642873_1745951400000" tabindex="0" role="gridcell" aria-label="April, 30, 2025">30</div></td><td><div class="picker__day picker__day--infocus" data-pick="1746037800000" id="P1936642873_1746037800000" tabindex="0" role="gridcell" aria-label="May, 1, 2025">1</div></td><td><div class="picker__day picker__day--infocus" data-pick="1746124200000" id="P1936642873_1746124200000" tabindex="0" role="gridcell" aria-label="May, 2, 2025">2</div></td><td><div class="picker__day picker__day--infocus" data-pick="1746210600000" id="P1936642873_1746210600000" tabindex="0" role="gridcell" aria-label="May, 3, 2025">3</div></td></tr><tr><td><div class="picker__day picker__day--infocus" data-pick="1746297000000" id="P1936642873_1746297000000" tabindex="0" role="gridcell" aria-label="May, 4, 2025">4</div></td><td><div class="picker__day picker__day--infocus" data-pick="1746383400000" id="P1936642873_1746383400000" tabindex="0" role="gridcell" aria-label="May, 5, 2025">5</div></td><td><div class="picker__day picker__day--infocus picker__day--today picker__day--highlighted" data-pick="1746469800000" id="P1936642873_1746469800000" tabindex="0" role="gridcell" aria-label="May, 6, 2025" aria-activedescendant="1746469800000">6</div></td><td><div class="picker__day picker__day--infocus" data-pick="1746556200000" id="P1936642873_1746556200000" tabindex="0" role="gridcell" aria-label="May, 7, 2025">7</div></td><td><div class="picker__day picker__day--infocus" data-pick="1746642600000" id="P1936642873_1746642600000" tabindex="0" role="gridcell" aria-label="May, 8, 2025">8</div></td><td><div class="picker__day picker__day--infocus" data-pick="1746729000000" id="P1936642873_1746729000000" tabindex="0" role="gridcell" aria-label="May, 9, 2025">9</div></td><td><div class="picker__day picker__day--infocus" data-pick="1746815400000" id="P1936642873_1746815400000" tabindex="0" role="gridcell" aria-label="May, 10, 2025">10</div></td></tr><tr><td><div class="picker__day picker__day--infocus" data-pick="1746901800000" id="P1936642873_1746901800000" tabindex="0" role="gridcell" aria-label="May, 11, 2025">11</div></td><td><div class="picker__day picker__day--infocus" data-pick="1746988200000" id="P1936642873_1746988200000" tabindex="0" role="gridcell" aria-label="May, 12, 2025">12</div></td><td><div class="picker__day picker__day--infocus" data-pick="1747074600000" id="P1936642873_1747074600000" tabindex="0" role="gridcell" aria-label="May, 13, 2025">13</div></td><td><div class="picker__day picker__day--infocus" data-pick="1747161000000" id="P1936642873_1747161000000" tabindex="0" role="gridcell" aria-label="May, 14, 2025">14</div></td><td><div class="picker__day picker__day--infocus" data-pick="1747247400000" id="P1936642873_1747247400000" tabindex="0" role="gridcell" aria-label="May, 15, 2025">15</div></td><td><div class="picker__day picker__day--infocus" data-pick="1747333800000" id="P1936642873_1747333800000" tabindex="0" role="gridcell" aria-label="May, 16, 2025">16</div></td><td><div class="picker__day picker__day--infocus" data-pick="1747420200000" id="P1936642873_1747420200000" tabindex="0" role="gridcell" aria-label="May, 17, 2025">17</div></td></tr><tr><td><div class="picker__day picker__day--infocus" data-pick="1747506600000" id="P1936642873_1747506600000" tabindex="0" role="gridcell" aria-label="May, 18, 2025">18</div></td><td><div class="picker__day picker__day--infocus" data-pick="1747593000000" id="P1936642873_1747593000000" tabindex="0" role="gridcell" aria-label="May, 19, 2025">19</div></td><td><div class="picker__day picker__day--infocus" data-pick="1747679400000" id="P1936642873_1747679400000" tabindex="0" role="gridcell" aria-label="May, 20, 2025">20</div></td><td><div class="picker__day picker__day--infocus" data-pick="1747765800000" id="P1936642873_1747765800000" tabindex="0" role="gridcell" aria-label="May, 21, 2025">21</div></td><td><div class="picker__day picker__day--infocus" data-pick="1747852200000" id="P1936642873_1747852200000" tabindex="0" role="gridcell" aria-label="May, 22, 2025">22</div></td><td><div class="picker__day picker__day--infocus" data-pick="1747938600000" id="P1936642873_1747938600000" tabindex="0" role="gridcell" aria-label="May, 23, 2025">23</div></td><td><div class="picker__day picker__day--infocus" data-pick="1748025000000" id="P1936642873_1748025000000" tabindex="0" role="gridcell" aria-label="May, 24, 2025">24</div></td></tr><tr><td><div class="picker__day picker__day--infocus" data-pick="1748111400000" id="P1936642873_1748111400000" tabindex="0" role="gridcell" aria-label="May, 25, 2025">25</div></td><td><div class="picker__day picker__day--infocus" data-pick="1748197800000" id="P1936642873_1748197800000" tabindex="0" role="gridcell" aria-label="May, 26, 2025">26</div></td><td><div class="picker__day picker__day--infocus" data-pick="1748284200000" id="P1936642873_1748284200000" tabindex="0" role="gridcell" aria-label="May, 27, 2025">27</div></td><td><div class="picker__day picker__day--infocus" data-pick="1748370600000" id="P1936642873_1748370600000" tabindex="0" role="gridcell" aria-label="May, 28, 2025">28</div></td><td><div class="picker__day picker__day--infocus" data-pick="1748457000000" id="P1936642873_1748457000000" tabindex="0" role="gridcell" aria-label="May, 29, 2025">29</div></td><td><div class="picker__day picker__day--infocus" data-pick="1748543400000" id="P1936642873_1748543400000" tabindex="0" role="gridcell" aria-label="May, 30, 2025">30</div></td><td><div class="picker__day picker__day--infocus" data-pick="1748629800000" id="P1936642873_1748629800000" tabindex="0" role="gridcell" aria-label="May, 31, 2025">31</div></td></tr><tr><td><div class="picker__day picker__day--outfocus" data-pick="1748716200000" id="P1936642873_1748716200000" tabindex="0" role="gridcell" aria-label="June, 1, 2025">1</div></td><td><div class="picker__day picker__day--outfocus" data-pick="1748802600000" id="P1936642873_1748802600000" tabindex="0" role="gridcell" aria-label="June, 2, 2025">2</div></td><td><div class="picker__day picker__day--outfocus" data-pick="1748889000000" id="P1936642873_1748889000000" tabindex="0" role="gridcell" aria-label="June, 3, 2025">3</div></td><td><div class="picker__day picker__day--outfocus" data-pick="1748975400000" id="P1936642873_1748975400000" tabindex="0" role="gridcell" aria-label="June, 4, 2025">4</div></td><td><div class="picker__day picker__day--outfocus" data-pick="1749061800000" id="P1936642873_1749061800000" tabindex="0" role="gridcell" aria-label="June, 5, 2025">5</div></td><td><div class="picker__day picker__day--outfocus" data-pick="1749148200000" id="P1936642873_1749148200000" tabindex="0" role="gridcell" aria-label="June, 6, 2025">6</div></td><td><div class="picker__day picker__day--outfocus" data-pick="1749234600000" id="P1936642873_1749234600000" tabindex="0" role="gridcell" aria-label="June, 7, 2025">7</div></td></tr></tbody></table><div class="picker__footer"><button class="picker__button--today" type="button" data-pick="1746469800000" disabled="" aria-controls="P1936642873">Today</button><button class="picker__button--clear" type="button" data-clear="1" disabled="" aria-controls="P1936642873">Clear</button><button class="picker__button--close" type="button" data-close="true" disabled="" aria-controls="P1936642873">Close</button></div></div></div></div></div></div>
                                                                <div class="help-block"></div></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Mobile</label>
                                                            <input type="text" class="form-control" value="+6595895857" placeholder="Mobile number here..." data-validation-required-message="This mobile number is required">
                                                        <div class="help-block"></div></div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Website</label>
                                                            <input type="text" class="form-control" required="" placeholder="Website here..." value="https://rowboat.com/insititious/Angelo" data-validation-required-message="This Website field is required">
                                                        <div class="help-block"></div></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Languages</label>
                                                        <select class="form-control select2-hidden-accessible" id="users-language-select2" multiple="" data-select2-id="users-language-select2" tabindex="-1" aria-hidden="true">
                                                            <option value="English" selected="" data-select2-id="2">English</option>
                                                            <option value="Spanish">Spanish</option>
                                                            <option value="French">French</option>
                                                            <option value="Russian">Russian</option>
                                                            <option value="German">German</option>
                                                            <option value="Arabic" selected="" data-select2-id="3">Arabic</option>
                                                            <option value="Sanskrit">Sanskrit</option>
                                                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-selection__choice" title="English" data-select2-id="4"><span class="select2-selection__choice__remove" role="presentation">×</span>English</li><li class="select2-selection__choice" title="Arabic" data-select2-id="5"><span class="select2-selection__choice__remove" role="presentation">×</span>Arabic</li><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <ul class="list-unstyled mb-0">
                                                            <li class="d-inline-block mr-2">
                                                                <fieldset>
                                                                    <div class="vs-radio-con">
                                                                        <input type="radio" name="vueradio" checked="" value="false">
                                                                        <span class="vs-radio">
                                                                            <span class="vs-radio--border"></span>
                                                                            <span class="vs-radio--circle"></span>
                                                                        </span>
                                                                        Male
                                                                    </div>
                                                                </fieldset>
                                                            </li>
                                                            <li class="d-inline-block mr-2">
                                                                <fieldset>
                                                                    <div class="vs-radio-con">
                                                                        <input type="radio" name="vueradio" value="false">
                                                                        <span class="vs-radio">
                                                                            <span class="vs-radio--border"></span>
                                                                            <span class="vs-radio--circle"></span>
                                                                        </span>
                                                                        Female
                                                                    </div>
                                                                </fieldset>
                                                            </li>
                                                            <li class="d-inline-block mr-2">
                                                                <fieldset>
                                                                    <div class="vs-radio-con">
                                                                        <input type="radio" name="vueradio" value="false">
                                                                        <span class="vs-radio">
                                                                            <span class="vs-radio--border"></span>
                                                                            <span class="vs-radio--circle"></span>
                                                                        </span>
                                                                        Other
                                                                    </div>
                                                                </fieldset>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Contact Options</label>
                                                        <ul class="list-unstyled mb-0">
                                                            <li class="d-inline-block mr-2">
                                                                <fieldset>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" checked="" name="customCheck1" id="customCheck1">
                                                                        <label class="custom-control-label" for="customCheck1">Email</label>
                                                                    </div>
                                                                </fieldset>
                                                            </li>
                                                            <li class="d-inline-block mr-2">
                                                                <fieldset>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" checked="" name="customCheck2" id="customCheck2">
                                                                        <label class="custom-control-label" for="customCheck2">Message</label>
                                                                    </div>
                                                                </fieldset>
                                                            </li>
                                                            <li class="d-inline-block mr-2">
                                                                <fieldset>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" name="customCheck3" id="customCheck3">
                                                                        <label class="custom-control-label" for="customCheck3">Phone</label>
                                                                    </div>
                                                                </fieldset>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <h5 class="mb-1 mt-2 mt-sm-0"><i class="feather icon-map-pin mr-25"></i>Address</h5>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Address Line 1</label>
                                                            <input type="text" class="form-control" value="A-65, Belvedere Streets" required="" placeholder="Address Line 1" data-validation-required-message="This Address field is required">
                                                        <div class="help-block"></div></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Address Line 2</label>
                                                            <input type="text" class="form-control" required="" placeholder="Address Line 2" data-validation-required-message="This Address field is required">
                                                        <div class="help-block"></div></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Postcode</label>
                                                            <input type="text" class="form-control" required="" placeholder="postcode" value="1868" data-validation-required-message="This Postcode field is required">
                                                        <div class="help-block"></div></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>City</label>
                                                            <input type="text" class="form-control" required="" value="New York" data-validation-required-message="This Time Zone field is required">
                                                        <div class="help-block"></div></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>State</label>
                                                            <input type="text" class="form-control" required="" value="New York" data-validation-required-message="This Time Zone field is required">
                                                        <div class="help-block"></div></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Country</label>
                                                            <input type="text" class="form-control" required="" value="United Kingdom" data-validation-required-message="This Time Zone field is required">
                                                        <div class="help-block"></div></div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-light">Save
                                                        Changes</button>
                                                    <button type="reset" class="btn btn-outline-warning waves-effect waves-light">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div> -->
                                    <!-- <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
                                        <form novalidate="">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">

                                                    <fieldset>
                                                        <label>Twitter</label>
                                                        <div class="input-group mb-75">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text feather icon-twitter" id="basic-addon3"></span>
                                                            </div>
                                                            <input type="text" class="form-control" value="https://www.twitter.com/adoptionism744" placeholder="https://www.twitter.com/" aria-describedby="basic-addon3">
                                                        </div>

                                                        <label>Facebook</label>
                                                        <div class="input-group mb-75">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text feather icon-facebook" id="basic-addon4"></span>
                                                            </div>
                                                            <input type="text" class="form-control" value="https://www.facebook.com/adoptionism664" placeholder="https://www.facebook.com/" aria-describedby="basic-addon4">
                                                        </div>
                                                        <label>Instagram</label>
                                                        <div class="input-group mb-75">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text feather icon-instagram" id="basic-addon5"></span>
                                                            </div>
                                                            <input type="text" class="form-control" value="https://www.instagram.com/adopt-ionism744" placeholder="https://www.instagram.com/" aria-describedby="basic-addon5">
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <label>Github</label>
                                                    <div class="input-group mb-75">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text feather icon-github" id="basic-addon9"></span>
                                                        </div>
                                                        <input type="text" class="form-control" value="https://www.github.com/madop818" placeholder="https://www.github.com/" aria-describedby="basic-addon9">
                                                    </div>
                                                    <label>Codepen</label>
                                                    <div class="input-group mb-75">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text feather icon-codepen" id="basic-addon12"></span>
                                                        </div>
                                                        <input type="text" class="form-control" value="https://www.codepen.com/adoptism243" placeholder="https://www.codepen.com/" aria-describedby="basic-addon12">
                                                    </div>
                                                    <label>Slack</label>
                                                    <div class="input-group mb-75">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text feather icon-slack" id="basic-addon11"></span>
                                                        </div>
                                                        <input type="text" class="form-control" value="@adoptionism744" placeholder="https://www.slack.com/" aria-describedby="basic-addon11">
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-light">Save
                                                        Changes</button>
                                                    <button type="reset" class="btn btn-outline-warning waves-effect waves-light">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users edit ends -->

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





