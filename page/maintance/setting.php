<?php 
    include 'status_maintance.php';
    session_start();
    if($_SESSION['go'] != "go"){
         header("location:../maintance");
    }
 ?>
<!DOCTYPE html>

<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
         <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/solarlab-logo.ico">
        <title>SOLARLAB CALCULATOR | V.01</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        
        <link rel="stylesheet" href="../assets/index/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/index/css/font-awesome.css">
        <link rel="stylesheet" href="../assets/index/css/animate.css">
        <link rel="stylesheet" href="../assets/index/css/templatemo_misc.css">
        <link rel="stylesheet" href="../assets/index/css/templatemo_style.css">

        <script src="../assets/index/js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>

        <style type="text/css">
            body{
                background-image: url(../assets/img/background2.png);
                background-repeat: no-repeat;
                background-size: cover;
                background-attachment: fixed;  
                background-position:center;
            }
        </style>
    </head>
    <body>
        <div class="content-section" id="services">
            <div class="container">
                <div class="row">
                    <div class="heading-section col-md-12 text-center">
                        <h2 style="border-bottom: 2px solid #FFF; padding-bottom: 0px;"><img width="220" src="../assets/img/solarlab-logo.png"></h2>
                        <p style="color: #FFF;font-weight: bold;font-size: 16px;">CALCULATOR MAINTANCE</p>
                    </div> <!-- /.heading-section -->
                </div> <!-- /.row -->
                <div class="row" >
                      <div class=" col-sm-6" style="width: 150px;">
                      </div>
                    <div class="col-md-3 col-sm-6">
                    </div> <!-- /.col-md-3 -->
                    <div class="col-md-3 col-sm-6">
                            <p style="color: #FFF;font-size: 16px; text-align: center;">STATUS :</p>
                            <?php 
                            if ($status_A == $status_B) {
                             ?>
                            <div class="service-item" id="service-3">
                                <div class="service-icon">
                                    <i class="fa fa-check-circle"></i>
                                     <p style="font-size: 25px;">Running</p>
                                </div> <!-- /.service-icon -->
                            </div> <!-- /#service-1 -->
                        <?php }else{ ?>
                            <div class="service-item" id="service-1">
                                <div class="service-icon">
                                    <i class="fa fa-wrench"></i>
                                     <p style="font-size: 25px;">Maintance</p>
                                </div> <!-- /.service-icon -->
                            </div> <!-- /#service-1 -->
                        <?php } ?>
                         <br>
                         <table border="1" width="100%">
                             <tr>
                                 <td width="45%">
                                    <?php 
                                        if ($status_A == $status_B) {
                                    ?>
                                    <button style="width: 100%; background-color: #2ecc71;" class="btn btn-success">Running</button>
                                    <?php }else{ ?>
                                     <button style="width: 100%; background-color: #006DE9;" class="btn btn-info">Maintance</button>
                                    <?php } ?>

                                </td>
                                 <td width="10%"></td>
                                 <td width="45%"><button style="width: 100%;" class="btn btn-danger">Logout</button></td>
                             </tr>
                         </table>
                    </div> <!-- /.col-md-3 -->
                    <div class="col-md-3 col-sm-6">
                    </div> <!-- /.col-md-3 -->
                     <div class=" col-sm-6" style="width: 150px;">
                      </div>
                </div> <!-- /.row -->
            </div> <!-- /.container -->
            <hr style="width: 1200px; margin-right: auto;margin-left: auto;">
             <div class="container">
                <div class="row">
                    <div class="col-md-8 col-xs-12 text-left">
                        <span style="color: #FFF;">&copy; Solar Lab Indonesia <?php echo date('Y') ?></span>
                  </div> <!-- /.text-center -->
                    <!--<div class="col-md-4 hidden-xs text-right">
                        <a href="#top" id="go-top">Back to top</a>
                    </div>--> <!-- /.text-center -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /#services -->
                   
        <script src="../assets/index/js/vendor/jquery-1.11.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="../assets/index/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
        <script src="../assets/index/js/bootstrap.js"></script>
        <script src="../assets/index/js/plugins.js"></script>
        <script src="../assets/index/js/main.js"></script>

        <script src="../assets/index/js/vendor/jquery.gmap3.min.js"></script>
    </body>
</html>