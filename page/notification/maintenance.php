<?php 
include '../../config/config.php';

$maintenance_q=mysqli_query($conn,"SELECT * FROM maintenance WHERE id='1'");
$maintenance_v=mysqli_fetch_array($maintenance_q);

if($maintenance_v['status'] !="true"){
    header("location:../../");
 }
 ?>
<!DOCTYPE html>

<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
         <link rel="icon" type="image/png" sizes="16x16" href="../../assets/img/Picture2.png">
        <title>Solarlab Indonesia | Calculator</title>
    	<meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        
        <link rel="stylesheet" href="../../assets/index/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../assets/index/css/font-awesome.css">
        <link rel="stylesheet" href="../../assets/index/css/animate.css">
        <link rel="stylesheet" href="../../assets/index/css/templatemo_misc.css">
        <link rel="stylesheet" href="../../assets/index/css/templatemo_style.css">
         <link href="../../assets/page/css/icons.css" rel="stylesheet" type="text/css" />

        <script src="../../assets/index/js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>

        <style type="text/css">
            body{
                background-image: url(../../assets/img/background5.png);
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size:cover;
                background-position:center;
            }
        </style>
    </head>
    <body>
        <div class="content-section" id="services">
            <div class="container">
                 <div class="row">
                        <div class="col-md-3">
                        </div><!--end col-->

                        <div class="col-md-6 text-center">
                            <div class="row">
                                <div class="col-md-6" style="background-color: #fff; padding-top: 3px;">
                                    <img width="220" src="../../assets/img/solarlab-logo2.png">
                                </div><!--end col-->
                                <div class="col-md-6" style="background-color: #FA9933; padding-top: 20px;">
                                    <h3 style="color: #FFF;font-weight: bold;font-size: 23px;">CALCULATOR</h3>
                                </div>
                            </div>
                        </div><!--end col-->

                        <div class="col-md-3">
                        </div><!--end col-->
                </div><!--end row--><br><br><br><br><br><br>
                <div class="row" style="margin-left: auto;margin-right: auto;">
                      <!--<div class=" col-sm-6" style="width: 150px;">
                      </div>-->
                    <div class="col-md-4">
                        
                    </div> <!-- /.col-md-3 -->
                    <div class="col-md-4">
                         <h3 style="text-align: center; color: #fff;font-size: 30px;"><i class="mdi mdi-settings"></i> Maintenance.</h3>
                    </div> <!-- /.col-md-3 -->
                    <div class="col-md-4">
                          
                    </div> <!-- /.col-md-3 -->
                    <!-- <div class=" col-sm-6" style="width: 150px;">
                      </div>-->
                </div> <!-- /.row -->
            </div> <!-- /.container --><br><br><br>
            <hr style="width: 87%; margin-right: auto;margin-left: auto;">
             <div class="container">
                <div class="row">
                    <div class="col-md-8 col-xs-12 text-left">
                        <span style="color: #FFF;">Copyright &copy; <?php echo date('Y'); ?> Solar Lab Indonesia</span>
                  </div> <!-- /.text-center -->
                    <!--<div class="col-md-4 hidden-xs text-right">
                        <a href="page/#top" id="go-top">Back to top</a>
                    </div>--> <!-- /.text-center -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /#services -->
                   
        <script src="../../assets/index/js/vendor/jquery-1.11.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/index/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
        <script src="../../assets/index/js/bootstrap.js"></script>
        <script src="../../assets/index/js/plugins.js"></script>
        <script src="../../assets/index/js/main.js"></script>

        <script src="../../assets/index/js/vendor/jquery.gmap3.min.js"></script>
    </body>
</html>