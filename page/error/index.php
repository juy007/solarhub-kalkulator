<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/page/images/favicon.png">
    <title>SOLARLAB CALCULATOR | System Size</title>
    <!-- Custom CSS -->
   <!-- Custom CSS -->
    <link href="../assets/page/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../assets/page/dist/css/style.min.css" rel="stylesheet">



    <link rel="stylesheet" type="text/css" href="../assets/page/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/page/libs/jquery-minicolors/jquery.minicolors.css">
    <link rel="stylesheet" type="text/css" href="../assets/page/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/page/libs/quill/dist/quill.snow.css">


<style type="text/css">
    .marginmenu{
        margin-right: 7px;
        margin-left: 7px;
    }
    .outputtr{
        font-weight: bold;
    }
    .outputtd{
        width: 200px;
    }.outputtd2{
        width: 20px;
    }
</style>


</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="../">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-8">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img width="230" src="../assets/solarlab-logo.png" alt="homepage" class="light-logo" />
                           
                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text" style="margin-top: 15px;">
                             <!-- dark Logo text -->
                            <h4 class="light-logo"></h4>
                            
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="../assets/page/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <span class="d-none d-md-block"> Calculator V 0.1 </span>
                             <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>   
                            </a>
                            <!--<div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>-->
                        </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                       <!-- <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>-->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <!--<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell font-24"></i>
                            </a>
                             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>-->
                       
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="https://solarlab.id/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/page/images/users/1.jpg" alt="user" class="rounded-circle" width="31"> Website</a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> 
                            <a href="../" aria-expanded="false">
                                <div class="card card-hover marginmenu">
                                    <div class="box bg-info text-center">
                                        <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                        <h6 class="text-white">DASHBOARD</h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="sidebar-item"> 
                            <a href="../system_size" aria-expanded="false">
                                <div class="card card-hover marginmenu" style="border-right: 7px solid #FFF;">
                                    <div class="box bg-cyan text-center">
                                        <h1 class="font-light text-white"><i class="fa fa-puzzle-piece"></i></h1>
                                        <h6 class="text-white">SYSTEM SIZE</h6>
                                    </div> 
                                </div>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../budget" aria-expanded="false">
                                <div class="card card-hover marginmenu">
                                    <div class="box bg-warning text-center">
                                        <h1 class="font-light text-white"><i class="fa fa-database"></i></h1>
                                        <h6 class="text-white">BUDGET</h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../expected_saving" aria-expanded="false">
                                <div class="card card-hover marginmenu">
                                    <div class="box bg-success text-center">
                                        <h1 class="font-light text-white"><i class="fa fa-save"></i></h1>
                                        <h6 class="text-white">EXPECTED SAVING</h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                           <!--<li class="sidebar-item">
                            <a href="../roof_size" aria-expanded="false">
                                <div class="card card-hover marginmenu">
                                    <div class="box bg-danger text-center">
                                        <h1 class="font-light text-white"><i class="fa fa-cubes"></i></h1>
                                        <h6 class="text-white">ROOF SIZE</h6>
                                    </div>
                                </div>
                            </a>
                        </li>-->
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper"style="background-image: url(../assets/background3.png); background-repeat: no-repeat; background-position:right top; background-size: 75% 10%; ">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                  <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">404</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <!--<li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>-->
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div><hr>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="error-box"  style="width: 78%; ">
                    <div class="error-body text-center">
                        <h1 class="error-title text-danger">404</h1>
                        <h3 class="text-uppercase error-subtitle">PAGE NOT FOUND !</h3>
                    </div>
                </div>
                <!-- editor -->
            </div>--
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/page/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/page/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/page/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/page/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/page/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../assets/page/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../assets/page/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../assets/page/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="../dist/j/pages/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="../assets/page/libs/flot/excanvas.js"></script>
    <script src="../assets/page/libs/flot/jquery.flot.js"></script>
    <script src="../assets/page/libs/flot/jquery.flot.pie.js"></script>
    <script src="../assets/page/libs/flot/jquery.flot.time.js"></script>
    <script src="../assets/page/libs/flot/jquery.flot.stack.js"></script>
    <script src="../assets/page/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="../assets/page/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="../assets/page/dist/js/pages/chart/chart-page-init.js"></script>

    <!-- This Page JS -->
    <script src="../assets/page/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="../assets/page/dist/js/pages/mask/mask.init.js"></script>
    <script src="../assets/page/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="../assets/page/libs/select2/dist/js/select2.min.js"></script>
    <script src="../assets/page/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="../assets/page/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="../assets/page/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="../assets/page/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
    <script src="../assets/page/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/page/libs/quill/dist/quill.min.js"></script>

<script>
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();

        /*colorpicker*/
        $('.demo').each(function() {
       
        $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function(value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });
        });
        /*datwpicker*/
        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
</script>
<script type="text/javascript">
//mencari kota kabupaten per provinsi
$(document).ready(function(){
    $('#provinsi').change(function(){
        var id_prov =$('#provinsi').val();
        $.ajax({
            type: 'POST',
            url: 'kabupaten.php',
            data: 'id_prov='+id_prov,
            success: function(response){
                $('#kabupaten').html(response);
                //$('#kabupaten').html(response);
            }
        });
    })
});
//memasukan nama provinsi ke tag tertentu
$(document).ready(function(){
    $('#provinsi').change(function(){
        document.getElementById("kabupaten").disabled = false;
        var id_prov2 =$('#provinsi').val();

        $.ajax({
            type: 'POST',
            url: 'provinsi.php',
            data: 'id_prov='+id_prov2,
            success: function(response){
                $('#nama_provinsi').val(response);
                //$('#kabupaten').html(response);
            }
        });
    })
});
//memasukan nama kabupaten ke tag tertentu
$(document).ready(function(){
    $('#kabupaten').change(function(){

    var hasilkab = $("#kabupaten").val();
    document.getElementById("hasilkab").innerHTML = hasilkab;
    })
});
</script>

<script type="text/javascript">
    window.onload=aktiv();

  function aktiv(){
        document.getElementById("kabupaten").disabled = true;
        document.getElementById("notif").innerHTML = "";
        document.getElementById("reset").hidden = true;
  }

  function hitung() {

    var estimated_system_size;
    var adjusted_system_size1;
    var total_solar_modul;
    var adjusted_system_size2;
    var adjusted_system_price;
    var required_roof_space;
    var monthly_electricity_use;
    var monthly_solar_yield;
    var monthly_solar_use;
    var monthly_energy_fed_back_into_grid;
    var monthly_compensation;
    var monthly_energy_importen_from_pln;
    var new_monthly_bill;
    var expected_monthly_saving;
    var percent_saving;
    var payback_period;
    var emission_saved;

    
      if ($("#provinsi").val() == '' || $("#kabupaten").val() == '' || $("#electrical_power").val() == '' || $("#electrical_power_t").val() == '' ||  $("#average_monthly_bill").val() == '' || $("#solar_modul_type").val() == '' || $("#desired_system_size").val() == '' ) {
        document.getElementById("notif").innerHTML = "Form harus diisi semua.";
      }else{
        document.getElementById("notif").innerHTML = "";
        document.getElementById("reset").hidden = false;



      }
  }
</script>

</body>
</html>