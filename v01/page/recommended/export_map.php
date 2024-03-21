<?php 
	define("BASEPATH", dirname(__FILE__));
	session_start();
	include '../../config/config.php';
	$date = date("d/m/Y");
	mysqli_query($conn,"INSERT INTO export_amount VALUES('','$_SESSION[calculator_type]','map','','$date')");
 ?>