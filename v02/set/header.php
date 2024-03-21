<?php 
    defined("BASEPATH") or exit("No direct access allowed");
 ?>
 <html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Solarhub Indonesia | <?php echo ucwords(strtolower($lang['calculator'])); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A premium admin dashboard template by mannatthemes" name="description" />
        <meta content="Mannatthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/img/Picture2.png">

        <link href="../assets/index/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">

        <!-- App css -->
        <link href="../assets/page/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/page/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../assets/index/css/style.css" rel="stylesheet" type="text/css" />

        <script src="../assets/page/js/jquery.min.js"></script>

       <script>
          /*  $(window).bind('DOMContentLoaded load resize', function() {
               if($(window).innerWidth() <= 500) {
                  $('#mynavbar').removeClass('navbar-fixed');
               }else{
                  $('#mynavbar').addClass('navbar-fixed');
               }
            }); */
        </script>
        

        <style type="text/css">
             body{
                background-image: url(../assets/img/background5.png);
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size:cover;
                background-position:center;"
            }
            .example-input2-group1{
                color: #fff;
            }
            @media (min-width: 360px) {
                .form-line-sm {
                    width: 100%;
                }
            }

            @media (min-width: 768px) {
                .form-line-md {
                    width: 80%;
                }
            }

            @media (min-width: 992px) {
                .col-md-table {
                    width: 80%;
                }
            }

            @media (min-width: 1200px) {
                .col-lg-table {
                    width: 80%;
                    margin-left: 6px;
                }
            }
             @media (min-width: 700px) {
                .m-top {
                    padding-top: 50px;
                }
            }

            .img-zoom{
                width: 70px;
                height: 70px;
            }
            #text-th{
                color: #ffffff;
                text-align: center;
                vertical-align: middle;
            }
            #text-tr{
                color: #ffffff;
                text-align: left;
                vertical-align: middle;
            }
            .back-trans{
                background-color:rgba(0, 0, 0, 0.6);
            }
        </style>
    </head>

    <body>
     
        <div class="page-wrapper m-top">
            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid"> 
                    <div class="row back-trans">
                        <div class="col-lg-3">
                        </div><!--end col-->

                        <div class="col-lg-6"><br>
                            <div class="row col-lg-11 text-center" style="margin-right: auto;margin-left: auto;">
                                <div class="col-md-6" style="background-color: #fff; padding-top: 3px;">
                                    <img width="180" src="../assets/img/solarlab-logo2.png">
                                </div><!--end col-->
                                <div class="col-md-6" style="background-color: #275798; padding-top: 3px;">
                                    <h3 style="color: #FFF;font-weight: bold;font-size: 18px;"><i class="mdi mdi-calculator"></i><?php echo $lang['calculator']; ?></h3>
                                </div>
                            </div>
                            <br>
                            <p style="color: #fff;font-weight: bold;font-size: 20px;text-align: center;">Welcome Admin.</p>
                        </div><!--end col-->

                        <div class="col-lg-3">
                        </div><!--end col-->
                        <hr style="background-color: #fff;margin-top: -7px;" class="form-line-md form-line-sm">
                    </div><!--end row-->
                    <div class="row back-trans"> 
                        <div class="col-lg-10 back-trans" style="margin: auto;">
                            <div class="button-items" style="margin: 15px;">
                                <a href="dashboard" type="button" class="btn btn-outline-warning waves-effect waves-light"><i class="mdi mdi-desktop-mac-dashboard"></i> Dashboard</a>

                                <a href="cleaner" type="button" class="btn btn-outline-warning waves-effect waves-light"><i class="mdi mdi-broom"></i> Cleaner</a>

                                <a href="province" type="button" class="btn btn-outline-warning waves-effect waves-light"><i class="mdi mdi-flag-triangle"></i> Province</a>

                                 <a href="language" type="button" class="btn btn-outline-warning waves-effect waves-light"><i class="mdi mdi-flag"></i> Langauge</a>

                                <div class="dropdown d-inline-block float-right">
                                    <a class="nav-link dropdown-toggle arrow-none" id="dLabel4" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v font-20 text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel4">
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-key"></i> Change Password</a>
                                        <a class="dropdown-item" href="logout"><i class="mdi mdi-logout-variant"></i> Logout</a>
                                    </div>
                                </div>

                                <!--        <button type="button" class="btn btn-outline-primary waves-effect waves-light">Primary</button>
                                        <button type="button" class="btn btn-outline-secondary waves-effect">Secondary</button>
                                        <button type="button" class="btn btn-outline-success waves-effect waves-light">Success</button>
                                        <button type="button" class="btn btn-outline-info waves-effect waves-light">Info</button>
                                        <button type="button" class="btn btn-outline-danger waves-effect waves-light">Danger</button>
                                        <button type="button" class="btn btn-outline-purple waves-effect waves-light">Purple</button>
                                        <button type="button" class="btn btn-outline-pink waves-effect ">Pink</button>-->
                            </div> <hr style="background-color: #fff;margin-top: 5px;" class="form-line-sm">
                        </div><!--end col--><br><br><br>
                    </div><!--end row-->