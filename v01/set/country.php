<?php 
 define("BASEPATH", dirname(__FILE__));
include '../config/config.php';

$country =$_POST['country'];
mysqli_query($conn,"UPDATE lang SET status='true' WHERE country='$country'");
mysqli_query($conn,"UPDATE lang SET status='false' WHERE country!='$country'");



$query_langon=mysqli_query($conn,"SELECT * FROM lang WHERE status='true'");
$langon=mysqli_fetch_array($query_langon);
echo ucwords($langon['country']);
?>