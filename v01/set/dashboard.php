<?php 
define("BASEPATH", dirname(__FILE__));
session_start();
include '../config/config.php';
if($_SESSION['admin'] !="login"){
 header("location:../set");
}
include 'header.php';
?>
<div class="row back-trans">
    <div class="col-lg-10 back-trans" style="margin: auto;">
        <div class="col-lg-7" style="margin: auto;">
            <img style="width: 100%;" src="../assets/img/dash_set.jpg">
        </div>
    </div>
</div>
<?php 
include 'footer.php';
?>