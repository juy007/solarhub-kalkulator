<?php 
session_start();
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
                        <p style="color: #FFF;font-weight: bold;font-size: 16px;">CALCULATOR V.01</p>
                    </div> <!-- /.heading-section -->
                </div> <!-- /.row --><br><br><br>
                <div class="row" >
                    <div class=" col-sm-6" style="width: 150px;">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div>
                            <div>
                            </div> <!-- /.service-icon -->
                        </div> <!-- /#service-1 -->
                    </div> <!-- /.col-md-3 -->
                    <div class="col-md-3 col-sm-6">
                        <div class="contact-form">
                            <form method="POST" action="cek_password">
                                <p>
                                    <input name="password" type="password" id="password" placeholder="Password" required>
                                </p>
                                <input type="submit" class="mainBtn" id="submit" value="Go">
                            </form>

                            <?php 
                                if(isset($_GET['password'])){
                                    if($_GET['password'] == "salah"){
                                        echo "<span style='color: #FFF; font-weight: bold;'>Password Salah.</span>";   
                                    }
                                }
                             ?>
                        </div> <!-- /.contact-form -->
                    </div> <!-- /.col-md-3 -->
                    <div class="col-md-3 col-sm-6">
                        <div>
                            <div>
                            </div> <!-- /.service-icon -->
                        </div> <!-- /#service-1 -->
                    </div> <!-- /.col-md-3 -->
                    <div class=" col-sm-6" style="width: 150px;">
                      </div>
                </div> <!-- /.row -->
            </div> <!-- /.container -->
            <br><br><br>
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