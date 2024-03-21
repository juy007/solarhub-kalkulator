<?php 
    defined("BASEPATH") or exit("No direct access allowed");
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Solarhub <?php echo ucwords(strtolower($lang['calculator'])); ?> | <?php echo $page_title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="IESR merancang Kalkulator Surya ini untuk mempermudah calon pengguna menghitung kebutuhan pemasangan PLTS atap di rumah atau bangunan lain." name="description" />
        <meta content="Solarhub.id" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="../../assets/img/Picture2.png">

        <link href="../../assets/page/plugins/ticker/jquery.jConveyorTicker.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/page/plugins/dropify/css/dropify.min.css" rel="stylesheet">
         <!--<link rel="stylesheet" href="../../assets/page/plugins/morris/morris.css">-->

         <!--<link href="../../assets/page/plugins/chartist/css/chartist.min.css">-->

        <!-- App css -->
        <link href="../../assets/page/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/page/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/page/css/style.css" rel="stylesheet" type="text/css" />

        <script src="../../assets/page/js/jquery.min.js"></script>

        <script src="../../assets/page/plugins/chartjs/chart.min.js"></script>

         <!-- screeshot-->
        <script type="text/javascript" src="../../assets/html2canvas/html2canvas.js"></script>
        <script type="text/javascript" src="../../assets/html2canvas/jquery.plugin.html2canvas.js"></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

        <style type="text/css">
            #iconform{
                background-color: #275798;
                border-radius: 100%;
                height: 24px;
                width: 24px; 
                margin-top:auto;
                margin-bottom: auto;
                margin-left: 2px;
                float: right;
            }
            #texticonform{
                font-size: 13px;
                font-weight: bold;
                text-align: center;
                color: #FFF;
                margin-left: -5px;
                margin-top: -3px;

            }
            .isiformrange{
                font-size: 13px;
                background-color: #275798;
                color: #FFF;
            }
            .example-input2-group1{
                color: #275798;
            }
            .output1{
                height: 90px;
            }
            @media (min-width: 360px) {
                .col-xs-table {
                    width: 100%;
                }
            }

            @media (min-width: 768px) {
                .col-sm-table {
                    width: 20%;
                }
            }

            @media (min-width: 992px) {
                .col-md-table {
                    width: 20%;
                }
            }

            @media (min-width: 1200px) {
                .col-lg-table {
                    width: 19%;
                    margin-left: 6px;
                }
            }
            .img-zoom:hover{
                width: 100px;
                height: 100px;
            }
            .img-zoom{
                width: 70px;
                height: 70px;
            }
        </style>

    </head>

    <body>

        <!-- Top Bar Start -->
        <div class="topbar">
             <!-- Navbar -->
            <nav class="navbar-custom">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="../../" class="logo">
                        <span>
                            <a href="https://solarhub.id" target="_blank"><img height="50" src="../../assets/img/solarlab-logo2.png" alt="logo-small" class="logo-sm"></a>
                        </span>
                         <!--<span>
                            <img src="../../assets/page/images/logo-dark.png" alt="logo-large" class="logo-lg">
                        </span>-->
                    </a>
                </div>
    
                <ul class="list-unstyled topbar-nav float-right mb-0">

                <!--    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="mdi mdi-bell-outline nav-icon"></i>
                            <span class="badge badge-danger badge-pill noti-icon-badge">2</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">
                           
                            <h6 class="dropdown-item-text">
                                Notifications (258)
                            </h6>
                            <div class="slimscroll notification-list">
                               
                                <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                    <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                    <p class="notify-details">Your order is placed<small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                                </a>
                              
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>
                                    <p class="notify-details">New Message received<small class="text-muted">You have 87 unread messages</small></p>
                                </a>
                             
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info"><i class="mdi mdi-glass-cocktail"></i></div>
                                    <p class="notify-details">Your item is shipped<small class="text-muted">It is a long established fact that a reader will</small></p>
                                </a>
                        
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                                    <p class="notify-details">Your order is placed<small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                                </a>
                           
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-danger"><i class="mdi mdi-message"></i></div>
                                    <p class="notify-details">New Message received<small class="text-muted">You have 87 unread messages</small></p>
                                </a>
                            </div>
                         
                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                                View all <i class="fi-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                -->
                <!--    <li class="dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <img src="../../assets/page/images/users/user-1.jpg" alt="profile-user" class="rounded-circle" /> 
                            <span class="ml-1 nav-user-name hidden-sm"> <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="dripicons-user text-muted mr-2"></i> Profile</a>
                            <a class="dropdown-item" href="#"><i class="dripicons-wallet text-muted mr-2"></i> My Wallet</a>
                            <a class="dropdown-item" href="#"><i class="dripicons-gear text-muted mr-2"></i> Settings</a>
                            <a class="dropdown-item" href="#"><i class="dripicons-lock text-muted mr-2"></i> Lock screen</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="dripicons-exit text-muted mr-2"></i> Logout</a>
                        </div>
                    </li>
                -->
                    <li class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link" id="mobileToggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>    
                </ul>
            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->
        <div class="page-wrapper-img" style="background-color: #275798;">
            <div class="page-wrapper-img-inner">
                
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="media-body">
                                <h3 class="text-light"> <span class="online-icon"><i class="mdi mdi-record text-success"></i> <?php echo $icon_menu; ?> <?php echo $page_title; ?></span> </h3> 
                            </div>                                  
                        </div><!--end page title box-->
                    </div><!--end col-->
                </div><!--end row-->
                <!-- end page title end breadcrumb -->
            </div><!--end page-wrapper-img-inner-->
        </div><!--end page-wrapper-img-->
        
        <div class="page-wrapper">
            <div class="page-wrapper-inner">

                <!-- Navbar Custom Menu -->
                <div class="navbar-custom-menu">
                    
                    <div class="container-fluid">
                        <div id="navigation">
                            <!-- Navigation Menu-->
                            <ul class="navigation-menu list-unstyled" style="background-color: #275798;">
                                <li class="submenu">
                                    <a style="color: #fff; font-size: 20px;" href="../system_size">
                                        <!--<i class="mdi mdi-cards-playing-outline"></i>-->
                                         <img style="height: 40px;margin-left: auto;margin-right: auto;margin-top: -12px;" src="../../assets/img/icon/1.png">
                                        System Size
                                    </a>
                                </li>

                                <li class="submenu">
                                    <a style="color: #fff; font-size: 20px;" href="../budget">
                                        <!--<i class="mdi mdi-buffer"></i>-->
                                        <img style="height: 40px;margin-left: auto;margin-right: auto;margin-top: -12px;" src="../../assets/img/icon/2.png">
                                        Budget
                                    </a>
                                </li>

                                <li class="submenu">
                                    <a style="color: #fff; font-size: 20px;" href="../expected_saving">
                                        <!--<i class="mdi mdi-content-save-all"></i>-->
                                         <img style="height: 40px;margin-left: auto;margin-right: auto;margin-top: -12px;" src="../../assets/img/icon/3.png">
                                        Expected Saving
                                    </a>
                                </li>
    
                                <!--    <li>
                                            <ul>
                                                <li><a href="page-faq.html">FAQs</a></li>
                                                <li><a href="page-starter.html">Starter Page</a></li>
                                                <li><a href="auth-login.html">Login</a></li>
                                                <li><a href="auth-register.html">Register</a></li>
                                                <li><a href="auth-recoverpw.html">Recover Password</a></li>
                                                <li><a href="auth-lock-screen.html">Lock Screen</a></li>
                                                <li><a href="auth-404.html">Error 404</a></li>
                                                <li><a href="auth-500.html">Error 500</a></li>
                                            </ul>
                                        </li>-->
                                    </ul>
                                </li>
                            </ul>
                            <!-- End navigation menu -->
                        </div> <!-- end navigation -->
                    </div> <!-- end container-fluid -->
                </div>
                <!-- end left-sidenav-->
            </div>
            <!--end page-wrapper-inner -->
            <!-- Page Content-->
            <div class="page-content">

              