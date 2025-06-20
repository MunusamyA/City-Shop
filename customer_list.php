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
    <style>
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
    </style>
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
                            <h2 class="content-header-title float-left mb-0">Customer List</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Customer</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Customer List</a>
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
                    <div class="box box-solid search" >
                        <!-- <div class="box-body"> -->
                            <div class="row">
                                
                                <div class="col-md-4">
                                <input type="text" class="form-control" id="searchByCustomerName" name="searchByCustomerName" placeholder="Search Customer..." value="">
                                </div>

                            </div>
                        <!-- </div> -->
                    </div>
                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        <table id="example1" class="table data-list-view">
                            <thead>
                                <tr>
                                    <th>SI.No.</th>
                                    <th>Name</th>
                                    <th>Mobile No.</th>
                                    <th>Email</th>
                                    <th>Date of Birth</th>
                                    <th>Gender</th>
                                    <!-- <th>ACTION</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                
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

    $(function () {
    var dataTable = $('#example1').DataTable({
    //$('#example1').DataTable({
        'autoWidth'     : false,
        'responsive'    : true,
        'processing'    : true,
        'serverSide'    : true,
        'pageLength'    : 10,
        'searching'     : false,
        //'scrollY'       : '570px',
        //'scrollCollapse': true,
        //'dom'           : 'Bfrtip',
        'dom'           : "<'row'<'col-sm-12 d-flex col-md-6'lf>"
                            +
                            "<'col-sm-12 col-md-6 text-right'B>"
                            +
                            ">" 
                            +
                            "<'row'<'col-sm-12'tr>>"
                             +
                            "<'row m-2'<'col-sm-12 col-md-5'i>"
                            +
                            "<'col-sm-12 col-md-7'p>"
                            +
                            ">",
        
        
        'ajax'          : {
            'url':'datatables/customer_list.php',
            'type':'POST',
            'data': function(data){
                //alert(data);
                var searchByCustomerName = $('#searchByCustomerName').val();

                data.searchByCustomerName = searchByCustomerName;
            }
        },
        
        'columns'       : [
            { data: 'id' },
            { data: 'cus_first_name' },
            { data: 'cus_mob_num' },
            { data: 'cus_email' },
            { data: 'cus_dob' },
            { data: 'cus_gender' },
            // { data: 'action' },
        ],
        
        'order'         : [[ 1, "desc" ]],  // List Records in Descending Order
        
        // columnDefs      : [
        //     {
        //         targets: [0,1,2,4,6],
        //         className: 'text-center'
        //     },
        //     {
        //         targets: [5],
        //         className: 'text-right'
        //     },
        //     { 
        //         orderable: true, 
        //         className: 'reorder', 
        //         targets: [1,2,3,4,5],
        //         className: 'text-right'
        //     },
        //     { 
        //         orderable: false, 
        //         targets: '_all' 
        //     }],
        columnDefs: [
    {
        targets: [0,1,2,4],
     
    },
    {
        targets: [1,2,3,4,5],
        orderable: true,
    },
    { 
        orderable: false, 
        targets: '_all' 
    }
],
'rowCallback': function(row, data) {
        $(row).attr('data-href', 'customer_view.php?id=' + data.id);    
    },


        buttons         : ['copyHtml5','excelHtml5','csvHtml5','pdfHtml5','print']
    });

    // $('#searchByCustomerName').change(function(){  
    //     dataTable.draw();
    // });
    $(document).on('keyup','#searchByCustomerName', function() {
        dataTable.draw();
    });
    $(document).on('click', '#example1 tbody tr', function () {
        const url = $(this).data('href');
        if (url) {
            window.location.href = url;
        }
    });
//     $(document).on('keyup', '#searchByCustomerName', function() {
//     dataTable.search(this.value).draw();
// });
});
</script>




</html>





