<?php 
    define("BASEPATH", dirname(__FILE__));
    session_start();
    include '../config/config.php';
 ?>
<!DOCTYPE html>
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
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

        <style type="text/css">
             body{
                background-image: url(../assets/img/background5.png);
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size:cover;
                background-position:center;"
            }
            #iconform{
                background-color: #275798;
                border-radius: 100%;
                height: 24px;
                width: 24px; 
                margin-top:auto;
                margin-bottom: auto;
                margin-left: 3px;
            }
            #texticonform{
                font-size: 13px;
                font-weight: bold;
                color: #fff;
                margin-left: -4px;
                margin-top: -5px;

            }
            .satuanForm{
                font-size: 13px;
                background-color: #275798;
                color: #FFF;
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
        </style>
    </head>

    <body>
     
        <div class="page-wrapper">
            <div class="page-content">
                <div class="container-fluid"> 
                    <div class="row">
                    </div>
                </div>
            </div>
            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid"> 
                    <div class="row">
                        <div class="col-lg-3">
                        </div><!--end col-->

                        <div class="col-lg-6" style="background-color:rgba(0, 0, 0, 0.6);"><br>
                            <div class="row col-lg-11 text-center" style="margin-right: auto;margin-left: auto;">
                                <div class="col-md-6" style="background-color: #fff; padding-top: 3px;">
                                    <img width="180" src="../assets/img/solarlab-logo2.png">
                                </div><!--end col-->
                                <div class="col-md-6" style="background-color: #275798; padding-top: 3px;">
                                    <h3 style="color: #FFF;font-weight: bold;font-size: 18px;"><i class="mdi mdi-calculator"></i><?php echo $lang['calculator']; ?></h3>
                                </div>
                            </div>
                            <hr style="background-color: #fff;" class="form-line-md form-line-sm">
                                 <form style="margin-top: 90px;margin-bottom: 90px;" class="form-horizontal" method="POST" action="process" id="form-calculator">
                                            
                                            <div class="text-center mb-4">
                                                <div class="avatar-box thumb-xl align-self-center mr-2">
                                                    <span class="avatar-title bg-light rounded-circle text-dark"><i class="mdi mdi-lock"></i></span>
                                                </div>
                                            </div>

                                            <div style="margin-right: auto;margin-left: auto;" class="input-group  col-md-6">
                                                <input type="password" class="form-control text-center" name="password" placeholder="Password" aria-label="Password" aria-describedby="HideCard" required>
                                                <div class="input-group-append">
                                                    <button style="background-color: #275798;color:#fff;" class="btn" type="submit" id="HideCard"><i class="mdi mdi-key"></i></button>
                                                </div>
                                            </div>
                                            <br>
                                             <div class="text-center mb-4">
                                                <div class="avatar-box  align-self-center mr-2">
                                                    <?php 
                                                  if(isset($_GET['notif'])){
                                                    if($_GET['notif'] == "gagal"){
                                                      echo "<span class='badge badge-danger' style='font-size: 15px;width: 100%; margin-right: auto;text-align=center;'>Incorrect password</span>";
                                                    }
                                                  }
                                                ?>
                                                <br>
                                                 <a style="color: #fff;" href="../">< Back to the main page.</a>
                                                </div>
                                            </div>
                                             
                                        </form>
                            <footer class="footer text-center" style="color:#fff;">
                                Copyright &copy; <?php echo date('Y'); ?> Solar Hub Indonesia
                            </footer>
                        </div><!--end col-->

                        <div class="col-lg-3">
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!-- container -->

            <!--    <footer class="footer text-center text-sm-left" style="color:#fff;">
                Copyright &copy; <?php echo date('Y'); ?> Solar Hub Indonesia
                </footer>-->
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        <!-- jQuery  -->
<script src="../assets/page/js/bootstrap.bundle.min.js"></script>
<script src="../assets/page/js/waves.min.js"></script>
<script src="../assets/page/js/jquery.slimscroll.min.js"></script>

<script src="../assets/page/plugins/moment/moment.js"></script>
<script src="../assets/page/plugins/apexcharts/apexcharts.min.js"></script>
<script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
<script src="https://apexcharts.com/samples/assets/series1000.js"></script>
<script src="https://apexcharts.com/samples/assets/ohlc.js"></script>
<script src="../assets/page/plugins/dropify/js/dropify.min.js"></script>
<script src="../assets/page/plugins/ticker/jquery.jConveyorTicker.min.js"></script>
<script src="../assets/page/plugins/peity-chart/jquery.peity.min.js"></script>
<script src="../assets/page/plugins/chartjs/chart.min.js"></script>
<script src="../assets/page/pages/jquery.profile.init.js"></script>

<script src="../assets/page/plugins/tippy/tippy.all.min.js"></script> 
<script src="../assets/page/pages/jquery.tooltipster.js"></script>

   <!-- App js -->
<script src="../assets/page/js/jquery.core.js"></script>
   <!-- Chart JS -->
<script src="../assets/page/plugins/chartjs/chart.min.js"></script>
        <!--<script src="../assets/page/pages/jquery.chartjs.init.js"></script>-->

        <!-- App js -->
<script src="../assets/page/js/app.js"></script> 

    </body>
</html>                