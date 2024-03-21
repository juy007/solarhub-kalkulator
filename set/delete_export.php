<?php 
 define("BASEPATH", dirname(__FILE__));
include '../config/config.php';

$calculator_type =$_POST['calculator_type'];
$export =$_POST['export'];
mysqli_query($conn,"DELETE FROM export_amount WHERE calculator_type='$calculator_type' AND export_type='$export'");
if ($calculator_type == 'system_size') {
	$query =mysqli_query($conn, "SELECT COUNT(*) AS calculate FROM export_amount WHERE calculator_type='$calculator_type' AND export_type='$export'");
     $value =mysqli_fetch_array($query);
    echo $value['calculate'];
}else if ($calculator_type == 'budget') {
	$query =mysqli_query($conn, "SELECT COUNT(*) AS calculate FROM export_amount WHERE calculator_type='$calculator_type' AND export_type='$export'");
     $value =mysqli_fetch_array($query);
    echo $value['calculate'];
}else if ($calculator_type == 'expected_saving') {
	$query =mysqli_query($conn, "SELECT COUNT(*) AS calculate FROM export_amount WHERE calculator_type='$calculator_type' AND export_type='$export'");
    $value =mysqli_fetch_array($query);
    echo $value['calculate'];
}else if ($calculator_type == 'best_performance') {
	$query =mysqli_query($conn, "SELECT COUNT(*) AS calculate FROM export_amount WHERE calculator_type='$calculator_type' AND export_type='$export'");
    $value =mysqli_fetch_array($query);
    echo $value['calculate'];
}

?>