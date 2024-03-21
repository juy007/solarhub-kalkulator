<?php 
 define("BASEPATH", dirname(__FILE__));
include '../config/config.php';

$calculator_type =$_POST['calculator_type'];
mysqli_query($conn,"DELETE FROM calculate WHERE calculator_type='$calculator_type'");
if ($calculator_type == 'system_size') {
	$query =mysqli_query($conn, "SELECT COUNT(*) AS calculate FROM calculate WHERE calculator_type='$calculator_type'");
    $value =mysqli_fetch_array($query);
    echo $value['calculate'];
}else if ($calculator_type == 'budget') {
	$query =mysqli_query($conn, "SELECT COUNT(*) AS calculate FROM calculate WHERE calculator_type='$calculator_type'");
    $value =mysqli_fetch_array($query);
    echo $value['calculate'];
}else if ($calculator_type == 'expected_saving') {
	$query =mysqli_query($conn, "SELECT COUNT(*) AS calculate FROM calculate WHERE calculator_type='$calculator_type'");
    $value =mysqli_fetch_array($query);
    echo $value['calculate'];
}else if ($calculator_type == 'best_performance') {
	$query =mysqli_query($conn, "SELECT COUNT(*) AS calculate FROM calculate WHERE calculator_type='$calculator_type'");
    $value =mysqli_fetch_array($query);
    echo $value['calculate'];
}

?>