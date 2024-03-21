<?php 
 define("BASEPATH", dirname(__FILE__));
    session_start();
    include 'config/config.php';

$_SESSION['calculator_type'] = $_POST['calculator_type'];
$_SESSION['status_recommended'] = $_POST['status_recommended'];

	$_SESSION['province'] = $_POST['province'];
	$_SESSION['name_province'] = $_POST['name_province'];
	$_SESSION['link_province'] = $_POST['link_province'];
	$_SESSION['data_irradiance'] = $_POST['data_irradiance'];
	$_SESSION['electrical_power'] = $_POST['electrical_power'];
	$_SESSION['type'] = $_POST['type'];
	$_SESSION['avgbillidr'] = $_POST['avgbill'];
	$_SESSION['avgbill'] = str_replace('.', '', $_POST['avgbill']);
	$_SESSION['module_type'] = $_POST['module_type'];
	$_SESSION['form_page'] = $_POST['form_page'];

$date = date("d/m/Y");
if ($_SESSION['status_recommended'] == 'true') {
	mysqli_query($conn,"INSERT INTO calculate VALUES('','$prov_value[id_provinsi]','system_size','$date')");
		header("location:page/recommended");

}else if ($_SESSION['status_recommended'] == 'false'){
	if ($_POST['calculator_type'] == 'system_size') {
		header("location:page/system_size");
	}else if ($_POST['calculator_type'] == 'budget') {
	 	header("location:page/budget");
	}else if ($_POST['calculator_type'] == 'expected_saving') {
		 header("location:page/expected_saving");
	}
}



 ?>