<?php 
	define("BASEPATH", dirname(__FILE__));
	session_start();
	include '../../config/config.php';
	$id = $_SESSION['province'];
	$date = date("d/m/Y");
	mysqli_query($conn,"INSERT INTO calculate VALUES('','$id','system_size','$date')");
 ?>