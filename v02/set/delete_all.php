<?php 
 define("BASEPATH", dirname(__FILE__));
include '../config/config.php';

$calculator_type =$_GET['calculator_type'];
mysqli_query($conn,"DELETE FROM calculate WHERE calculator_type='$calculator_type'");
mysqli_query($conn,"DELETE FROM export_amount WHERE calculator_type='$calculator_type'");

header("location:cleaner");


?>